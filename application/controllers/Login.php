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
                        'username' => $user['username'],
                        'nama_pegawai' => $user['nama_pegawai'],
                        'role_id' => $user['role_id'],
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
                        redirect('index.php/admin');
                    } else if ($user['role_id'] == 'laboran') {
                        // laboran
                        redirect('index.php/laboran');
                    }
                } else {
                    // jika password salah
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                    redirect('index.php/login');
                }
            } else {
                // jika user tidak aktif
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User has not been activated!</div>');
                redirect('index.php/login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">User is not available!</div>');
            redirect('index.php/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->sess_destroy();

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil logout!</div>');
        redirect('index.php/login');
    }

    public function userLogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user_data = $this->M_pengguna->login_user($username, $password);

        if ($user_data) {
            $login_data = array(

                'user_data' => $user_data,
                'id_pegawai' => $user_data->id_pegawai,
                'username'  => $username,
                'role_id'   => $user_data->role_id,

            ); // Data keeps in SESSION

            $this->session->set_userdata($login_data);

            if ($user_data->role_id == 'admin') // Admin
            {

                $this->session->set_flashdata('login_success', 'Login Berhasil. Sekarang anda berada di halaman Admin.');
                redirect('admin/index');
            } elseif ($user_data->role_id == 'laboran') // Laboran
            {
                $this->session->set_flashdata('login_success', 'Selamat datang, <a href = "user-home" class = "text-primary">' . $this->session->userdata('name') . '</a>. Login anda berhasil');
                redirect('laboran/index');
            }
        } else {
            $this->session->set_flashdata('login_fail', '<i class="fas fa-exclamation-triangle"></i> Login gagal. Username atau Password anda salah, Silahkan Coba Lagi. ');

            redirect($_SERVER['HTTP_REFERER']); // Redirect at same page.
        }
    }

    public function loginProcess()
    {
        if ($this->input->post('role_id') === 'admin') $this->adminLogin($this->input->post('username'));
        // elseif ($this->input->post('role') === 'admin') $this->_proses_login_admin($this->input->post('username'));
        else {
?>
            <script>
                alert('role tidak tersedia!')
            </script>
<?php
        }
    }

    public function adminLogin($username)
    {
        $get_petugas = $this->M_pengguna->getUsername($username);
        if ($get_petugas) {
            if ($get_petugas->password == md5($this->input->post('password'))) {
                $session = [
                    'id_pegawai' => $get_petugas->id_pegawai,
                    'username' => $get_petugas->username,
                    'password' => $get_petugas->password,
                    'role' => $get_petugas->role_id,
                ];

                $this->session->set_userdata('login', $session);
                $this->session->set_flashdata('success', '<strong>Login</strong> Berhasil!');
                redirect('admin');
            } else {
                $this->session->set_flashdata('error', 'Password Salah!');
                redirect();
            }
        } else {
            $this->session->set_flashdata('error', 'Username Salah!');
            redirect();
        }
    }
}
