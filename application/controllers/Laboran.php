<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laboran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->login['username']) {
            redirect('login');
        }
        $this->load->model('M_pengguna');
    }

    public function index()
    {
        if ($this->session->login['role_id'] == 'laboran') {
            $data['title'] = 'Dashboard';
            $data['pagetitle'] = 'Dashboard';
            $data['subtitle'] = 'Dashboard';
            $data['userdata'] = $this->session->userdata('login');
            $this->load->view('partials/header', $data);
            $this->load->view('partials/topbar', $data);
            $this->load->view('partials/page-title', $data);
            $this->load->view('laboran/index', $data);
        } else {
            redirect('login/blocked');
        }
    }

    // Profile laboran
    public function profile()
    {
        if ($this->session->login['role_id'] == 'laboran') {
            $data['title'] = 'Halaman Profile';
            $data['pagetitle'] = 'Profile';
            $data['subtitle'] = 'Pengaturan profile';
            $data['userdata'] = $this->session->userdata('login');
            $this->load->view('partials/header', $data);
            $this->load->view('partials/topbar', $data);
            $this->load->view('partials/page-title', $data);
            $this->load->view('laboran/profile', $data);
        } else {
            redirect('login/blocked');
        }
    }

    public function editProfile()
    {
        if ($this->session->login['role_id'] == 'laboran') {
            $data['title'] = 'Halaman Profile';
            $data['pagetitle'] = 'Profile';
            $data['subtitle'] = 'Edit profile';
            $data['userdata'] = $this->session->userdata('login');
            $this->load->view('partials/header', $data);
            $this->load->view('partials/topbar', $data);
            $this->load->view('partials/page-title', $data);
            $this->load->view('laboran/editprofile', $data);
        } else {
            redirect('login/blocked');
        }
    }

    public function editProfileProcess()
    {
        $username = $this->session->login['username'];

        $config['upload_path'] = './assets/images/users/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = '2000';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
            redirect('laboran/editprofile');
        } else {
            $old_image = $this->session->login['image'];
            if ($old_image != 'default.jpg') {
                unlink(FCPATH . 'assets/images/users/' . $old_image);
            }

            $upload_data = $this->upload->data();
            $data = array(
                'image' => $upload_data['file_name'],
            );

            if ($this->M_pengguna->editPenggunaByUsername($data, $username)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil berhasil diubah! Silahkan login kembali untuk memperbaharui profil</div>');
                redirect('laboran/profile');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Profile gagal diperbaharui!</div>');
                redirect('laboran/profile');
            }
        }
    }

    public function changePassword()
    {
        if ($this->session->login['role_id'] == 'laboran') {
            $this->form_validation->set_rules('currentPassword', 'Current Password', 'required|trim');
            $this->form_validation->set_rules('newPassword1', 'New Password', 'required|trim|min_length[3]|matches[newPassword2]');
            $this->form_validation->set_rules('newPassword2', 'Confirm New Password', 'required|trim|min_length[3]|matches[newPassword1]');

            if ($this->form_validation->run() == false) {
                $data['title'] = 'Halaman Profile';
                $data['pagetitle'] = 'Profile';
                $data['subtitle'] = 'Ganti Password';
                $data['userdata'] = $this->session->userdata('login');
                $this->load->view('partials/header', $data);
                $this->load->view('partials/topbar', $data);
                $this->load->view('partials/page-title', $data);
                $this->load->view('laboran/changepassword', $data);
            } else {
                $currentPassword = md5($this->input->post('currentPassword'));
                $newPassword = md5($this->input->post('newPassword1'));

                if ($currentPassword != $this->session->login['password']) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                    redirect('laboran/changepassword');
                } else {
                    if ($currentPassword == $newPassword) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password saat ini!</div>');
                        redirect('laboran/changepassword');
                    } else {
                        $this->db->set('password', $newPassword);
                        $this->db->where('username', $this->session->login['username']);
                        $this->db->update('tbl_pengguna');

                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diperbaharui!</div>');
                        redirect('laboran/changepassword');
                    }
                }
            }
        } else {
            redirect('login/blocked');
        }
    }

    // Barang persediaan
    public function tambahDataBP()
    {
        $data['title'] = 'Tambah Data Barang Persediaan';
        $data['pagetitle'] = 'Daftar Barang Persediaan';
        $data['subtitle'] = 'Tambah Data Barang';
        $data['userdata'] = $this->session->userdata('login');
        $this->load->view('partials/header', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('partials/page-title', $data);
        $this->load->view('barangpersediaan/tambahdatabp', $data);
    }

    public function importDataBP()
    {
        $data['title'] = 'Tambah Data Barang Persediaan';
        $data['pagetitle'] = 'Tambah Data Barang Persediaan';
        $data['subtitle'] = 'Import Data Barang';
        $data['userdata'] = $this->session->userdata('login');
        $this->load->view('partials/header', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('partials/page-title', $data);
        $this->load->view('barangpersediaan/importdatabp', $data);
    }

    // Barang habis pakai
    public function tambahDataHP()
    {
        $data['title'] = 'Tambah Data Barang Habis Pakai';
        $data['pagetitle'] = 'Daftar Barang Habis Pakai';
        $data['subtitle'] = 'Tambah Data Barang';
        $data['userdata'] = $this->session->userdata('login');
        $this->load->view('partials/header', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('partials/page-title', $data);
        $this->load->view('baranghp/tambahdatahp', $data);
    }

    public function importDataHP()
    {
        $data['title'] = 'Tambah Data Barang Habis Pakai';
        $data['pagetitle'] = 'Tambah Data Barang Habis Pakai';
        $data['subtitle'] = 'Import Data Barang';
        $data['userdata'] = $this->session->userdata('login');
        $this->load->view('partials/header', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('partials/page-title', $data);
        $this->load->view('baranghp/importdatahp', $data);
    }
}
