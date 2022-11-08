<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->login['username'] && !$this->session->login['role_id'] == 'admin') {
            redirect('login');
        }
        $this->load->model('M_simukPegawai');
        $this->load->model('M_laboratorium');
        $this->load->model('M_pegawaiUpt');
        $this->load->model('M_pengguna');
    }

    public function index()
    {
        if ($this->session->login['role_id'] == 'admin') {
            // $username = $this->session->userdata('username');
            $data['title'] = 'Dashboard';
            $data['pagetitle'] = 'Dashboard';
            $data['subtitle'] = 'Dashboard';
            $data['userdata'] = $this->session->userdata('login');
            $this->load->view('partials/header', $data);
            $this->load->view('partials/topbar', $data);
            $this->load->view('partials/page-title', $data);
            $this->load->view('admin/index', $data);
        } else {
            redirect('login/blocked');
        }
    }

    // Profile admin
    public function profile()
    {
        if ($this->session->login['role_id'] == 'admin') {
            $data['title'] = 'Halaman Profile';
            $data['pagetitle'] = 'Profile';
            $data['subtitle'] = 'My profile';
            $data['userdata'] = $this->session->userdata('login');
            $this->load->view('partials/header', $data);
            $this->load->view('partials/topbar', $data);
            $this->load->view('partials/page-title', $data);
            $this->load->view('admin/profile', $data);
        } else {
            redirect('login/blocked');
        }
    }
    public function editProfile()
    {
        if ($this->session->login['role_id'] == 'admin') {
            $data['title'] = 'Halaman Profile';
            $data['pagetitle'] = 'Profile';
            $data['subtitle'] = 'Edit profile';
            $data['userdata'] = $this->session->userdata('login');
            $this->load->view('partials/header', $data);
            $this->load->view('partials/topbar', $data);
            $this->load->view('partials/page-title', $data);
            $this->load->view('admin/editprofile', $data);
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
            redirect('admin/editprofile');
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
                redirect('admin/profile');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Profile gagal diperbaharui!</div>');
                redirect('admin/profile');
            }
        }
    }

    public function changePassword()
    {
        if ($this->session->login['role_id'] == 'admin') {
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
                $this->load->view('admin/changepassword', $data);
            } else {
                $currentPassword = md5($this->input->post('currentPassword'));
                $newPassword = md5($this->input->post('newPassword1'));

                if ($currentPassword != $this->session->login['password']) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                    redirect('admin/changepassword');
                } else {
                    if ($currentPassword == $newPassword) {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password saat ini!</div>');
                        redirect('admin/changepassword');
                    } else {
                        $this->db->set('password', $newPassword);
                        $this->db->where('username', $this->session->login['username']);
                        $this->db->update('tbl_pengguna');

                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diperbaharui!</div>');
                        redirect('admin/changepassword');
                    }
                }
            }
        } else {
            redirect('login/blocked');
        }
    }

    // User management
    public function userManagement()
    {
        $data['title'] = 'Halaman Kelola Pengguna';
        $data['pagetitle'] = 'Admin';
        $data['subtitle'] = 'Kelola pengguna';
        $data['all_pegawai_upt'] = $this->M_pegawaiUpt->getPegawaiUpt();
        $data['pengguna'] = $this->M_pengguna->getPengguna();
        $data['userdata'] = $this->session->userdata('login');
        $data['aktif'] = 'usermanagement';
        $this->load->view('partials/header', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('partials/page-title', $data);
        $this->load->view('admin/usermanagement', $data);
    }

    public function addUser()
    {
        $password = $this->input->post('password');
        $data = [
            'id_pegawai' => $this->input->post('id_pegawai'),
            'role_id' => $this->input->post('role_id'),
            'username' => $this->input->post('username'),
            'password' => md5($password),
            'image' => 'default.jpg',
        ];

        if ($this->M_pengguna->addUser($data)) {
            redirect('admin/usermanagement');
        } else {
            redirect('admin/usermanagement');
        }
    }

    public function userEdit($id)
    {
        if ($this->session->login['role_id'] == 'admin') {
            $data['title'] = 'Halaman Edit Pengguna';
            $data['pagetitle'] = 'Admin';
            $data['subtitle'] = 'Edit pengguna';
            $data['userdetail'] = $this->M_pengguna->getPenggunaDetail($id);
            $data['userdata'] = $this->session->userdata('login');
            $this->load->view('partials/header', $data);
            $this->load->view('partials/topbar', $data);
            $this->load->view('partials/page-title', $data);
            $this->load->view('admin/useredit', $data);
        } else {
            redirect('login/blocked');
        }
    }

    public function userEditProcess($id)
    {
        $data = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'role_id' => $this->input->post('role_id'),
        );

        if ($this->M_pengguna->editPengguna($data, $id)) {
            redirect('admin/usermanagement');
        } else {
            redirect('admin/usermanagement');
        }
    }

    public function deleteUser($idUser)
    {
        if ($this->M_pengguna->deleteUser($idUser)) {
            redirect('admin/usermanagement');
        } else {
            redirect('admin/usermanagement');
        }
    }

    // Pegawai
    public function daftarPegawai()
    {
        if ($this->session->login['role_id'] == 'admin') {
            $this->form_validation->set_rules('id_pegawai', 'Pilih pegawai', 'required');
            $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
            $this->form_validation->set_rules('status_kepegawaian', 'Status kepegawaian', 'required');
            $this->form_validation->set_rules('isactive', 'Status aktif', 'required');
            $this->form_validation->set_rules('nama_lab', 'Nama unit', 'required');
            $this->form_validation->set_rules('kontak', 'Kontak', 'required');

            if ($this->form_validation->run() == false) {
                $data['title'] = 'Halaman Daftar Pegawai UPT Lab. ITERA';
                $data['pagetitle'] = 'Admin';
                $data['subtitle'] = 'Daftar Pegawai';
                $data['all_pegawai_simuk'] = $this->M_simukPegawai->getPegawaiUptLab();
                $data['all_laboratorium'] = $this->M_laboratorium->getAllLab();
                $data['all_pegawai_upt'] = $this->M_pegawaiUpt->getPegawaiUpt();
                $data['userdata'] = $this->session->userdata('login');
                $this->load->view('partials/header', $data);
                $this->load->view('partials/topbar', $data);
                $this->load->view('partials/page-title', $data);
                $this->load->view('admin/daftarpegawai', $data);
            } else {
                $data = [
                    'id_pegawai' => $this->input->post('id_pegawai'),
                    'status' => $this->input->post('status_kepegawaian'),
                    'jabatan' => $this->input->post('jabatan'),
                    'id_lab' => $this->input->post('nama_lab'),
                    'is_active' => $this->input->post('isactive'),
                    'kontak' => $this->input->post('kontak'),
                    'created_at' => time(),
                    'updated_at' => time(),
                ];

                if ($this->M_pegawaiUpt->addPegawai($data)) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data pegawai berhasil ditambahkan!</div>');
                    redirect('admin/daftarpegawai');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan data pegawai!</div>');
                    redirect('admin/daftarpegawai');
                }
            }
        } else {
            redirect('login/blocked');
        }
    }

    public function detailPegawai($id)
    {
        if ($this->session->login['role_id'] == 'admin') {
            $data['title'] = 'Halaman Detail Pegawai';
            $data['pagetitle'] = 'Admin';
            $data['subtitle'] = 'Detail Pegawai';
            $data['detail_pegawai_upt'] = $this->M_pegawaiUpt->getDetailPegawaiUpt($id);
            $data['userdata'] = $this->session->userdata('login');
            $this->load->view('partials/header', $data);
            $this->load->view('partials/topbar', $data);
            $this->load->view('partials/page-title', $data);
            $this->load->view('admin/detailpegawai', $data);
        } else {
            redirect('login/blocked');
        }
    }

    public function editPegawai($id)
    {
        $data['title'] = 'Halaman Edit Pegawai';
        $data['pagetitle'] = 'Admin';
        $data['subtitle'] = 'Edit Pegawai';
        $data['detail_pegawai_upt'] = $this->M_pegawaiUpt->getDetailPegawaiUpt($id);
        $data['detail_pegawai_upt_obj'] = $this->M_pegawaiUpt->getDetailPegawaiUptObj($id);
        $data['all_laboratorium'] = $this->M_laboratorium->getAllLab();
        $data['userdata'] = $this->session->userdata('login');
        $this->load->view('partials/header', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('partials/page-title', $data);
        $this->load->view('admin/editpegawai', $data);
    }

    public function editPegawaiProcess($id)
    {
        $data = [
            'status' => $this->input->post('status'),
            'jabatan' => $this->input->post('jabatan'),
            'kontak' => $this->input->post('kontak'),
            'id_lab' => $this->input->post('nama_lab'),
            'is_active' => $this->input->post('isactive'),
            'updated_at' => time(),
        ];

        if ($this->M_pegawaiUpt->editPegawai($data, $id)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data pegawai berhasil diubah!</div>');
            redirect('admin/daftarpegawai');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal mengubah data pegawai!</div>');
            redirect('admin/daftarpegawai');
        }
    }

    public function addPegawai()
    {
        $data = [
            'id_pegawai' => $this->input->post('id_pegawai'),
            'status' => $this->input->post('status_kepegawaian'),
            'jabatan' => $this->input->post('jabatan'),
            'id_lab' => $this->input->post('nama_lab'),
            'is_active' => $this->input->post('isactive'),
            'kontak' => $this->input->post('kontak'),
        ];

        if ($this->M_pegawaiUpt->addPegawai($data)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data pegawai berhasil ditambahkan!</div>');
            redirect('admin/daftarpegawai');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan data pegawai!</div>');
            redirect('admin/daftarpegawai');
        }
    }

    public function deletePegawai($idPegawai)
    {
        if ($this->M_pegawaiUpt->deletePegawai($idPegawai)) {
            redirect('admin/daftarpegawai');
        } else {
            redirect('admin/daftarpegawai');
        }
    }

    public function getAllPegawai()
    {
        $data = $this->M_simukPegawai->getAllPegawai($_POST['pilihPegawaiSimuk']);
        echo json_encode($data);
    }

    public function getIdPegawai()
    {
        $namaPegawai = $this->input->post('pilihPegawaiSimuk', true);
        $data = $this->M_simukPegawai->getIdPegawai($namaPegawai);
        echo json_encode($data);
    }

    // Laboratorium
    public function daftarLaboratorium()
    {
        if ($this->session->login['role_id'] == 'admin') {
            $data['title'] = 'Halaman Daftar Laboratorium ITERA';
            $data['pagetitle'] = 'Admin';
            $data['subtitle'] = 'Daftar Laboratorium';
            $data['all_lab'] = $this->M_laboratorium->getAllLab();
            $data['no'] = 1;
            $data['userdata'] = $this->session->userdata('login');
            $this->load->view('partials/header', $data);
            $this->load->view('partials/topbar', $data);
            $this->load->view('partials/page-title', $data);
            $this->load->view('admin/daftarlab', $data);
        } else {
            redirect('login/blocked');
        }
    }

    public function addLab()
    {
        $data = [
            'nama_lab' => $this->input->post('namaLab'),
        ];

        if ($this->M_laboratorium->addLab($data)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data laboratorium berhasil ditambahkan!</div>');
            redirect('admin/daftarlaboratorium');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan data laboratorium!</div>');
            redirect('admin/daftarlaboratorium');
        }
    }

    public function deleteLab($idLab)
    {
        if ($this->M_laboratorium->deleteLab($idLab)) {
            redirect('admin/daftarlaboratorium');
        } else {
            redirect('admin/daftarlaboratorium');
        }
    }
}
