<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_simukPegawai');
        $this->load->model('M_laboratorium');
        $this->load->model('M_pegawaiUpt');
        $this->load->model('M_pengguna');
        $this->load->library('session');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Sistem Inventori UPT Lab ITERA';
            $this->load->view('login/index', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $user = $this->db->query("SELECT * from tbl_pengguna LEFT JOIN tbl_pegawai_upt ON tbl_pengguna.id_pegawai = tbl_pegawai_upt.id_pegawai LEFT JOIN v_simuk_pegawai ON tbl_pegawai_upt.id_pegawai = v_simuk_pegawai.id_pegawai WHERE username = '$username'")->row_array();

        if ($user) {
            if ($user['is_active'] == 'Aktif') {
                if ($password == $user['password']) {
                    // berhasil login
                    $data = [
                        'id_pegawai' => $user['id_pegawai'],
                        'username' => $user['username'],
                        'password' => $user['password'],
                        'nama_pegawai' => $user['nama_pegawai'],
                        'role_id' => $user['role_id'],
                        'id_lab' => $user['id_lab'],
                        'image' => $user['image'],
                        'nama_unit' => $user['nama_unit'],
                        'kontak' => $user['kontak'],
                        'jabatan' => $user['jabatan'],
                        'created_at' => $user['created_at'],
                        'updated_at' => $user['updated_at'],
                    ];
                    $this->session->set_userdata('login', $data);

                    // cek role
                    if ($user['role_id'] == 'admin') {
                        // admin
                        redirect('admin');
                    } else if ($user['role_id'] == 'laboran') {
                        // laboran
                        redirect('laboran');
                    }
                } else {
                    // jika password salah
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                    redirect('login');
                }
            } else {
                // jika user tidak aktif
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User has not been activated!</div>');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User is not available!</div>');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->sess_destroy();

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil logout!</div>');
        redirect('login');
    }

    public function blocked()
    {
        $data['title'] = 'Access Blocked!';
        $this->load->view('login/blocked', $data);
    }
}
