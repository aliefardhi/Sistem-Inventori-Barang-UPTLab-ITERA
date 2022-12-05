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
        $this->load->model('M_ruangan');
        $this->load->model('M_barangmodal');
        $this->load->model('M_persediaan');
        $this->load->model('M_bhp');
    }

    public function index()
    {
        if ($this->session->login['role_id'] == 'admin') {
            $data['title'] = 'Dashboard';
            $data['pagetitle'] = 'Admin';
            $data['subtitle'] = 'Dashboard';
            $data['userdata'] = $this->session->userdata('login');
            $idPegawai = $this->session->login['id_pegawai'];
            $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
            $data['jumlahPegawai'] = $this->M_pegawaiUpt->getCountPegawaiUpt();
            $data['sumHarga'] = $this->M_barangmodal->getHargaSum();
            $data['countBarangModal'] = $this->M_barangmodal->getCountBarang();
            $data['countBarangRusak'] = $this->M_barangmodal->getCountBarangRusak();
            $data['countBarangHilang'] = $this->M_barangmodal->getCountBarangHilang();
            $data['countBarangBaik'] = $this->M_barangmodal->getCountBarangBaik();
            $data['countRuang'] = $this->M_ruangan->countRuangan();
            $data['countLab'] = $this->M_laboratorium->countLab();
            $data['countPersediaan'] = $this->M_persediaan->countPersediaan();
            $data['persediaanBaik'] = $this->M_persediaan->countPersediaanBaik();
            $data['persediaanRusak'] = $this->M_persediaan->countPersediaanRusak();
            $data['persediaanHilang'] = $this->M_persediaan->countPersediaanHilang();
            $data['countBhp'] = $this->M_bhp->countBhp();
            $data['bhpBaik'] = $this->M_bhp->bhpBaik();
            $data['bhpRusak'] = $this->M_bhp->bhpRusak();
            $data['bhpHilang'] = $this->M_bhp->bhpHilang();
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
            $idPegawai = $this->session->login['id_pegawai'];
            $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
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
            $idPegawai = $this->session->login['id_pegawai'];
            $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
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
                'updated_at' => time(),
            );

            if ($this->M_pengguna->editPenggunaByUsername($data, $username)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil berhasil diperbaharui!</div>');
                redirect('admin/profile');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal memperbaharui profil!</div>');
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
                $idPegawai = $this->session->login['id_pegawai'];
                $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
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
                        $this->db->set('updated_at', time());
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
    // end of profile admin

    // User management
    public function userManagement()
    {
        $data['title'] = 'Halaman Kelola Pengguna';
        $data['pagetitle'] = 'Admin';
        $data['subtitle'] = 'Kelola pengguna';
        $data['all_pegawai_upt'] = $this->M_pegawaiUpt->getPegawaiUpt();
        $data['pengguna'] = $this->M_pengguna->getPengguna();
        $data['userdata'] = $this->session->userdata('login');
        $idPegawai = $this->session->login['id_pegawai'];
        $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
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
            'created_at' => time(),
            'updated_at' => time(),
        ];

        if ($this->M_pengguna->addUser($data)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data pengguna berhasil ditambahkan!</div>');
            redirect('admin/usermanagement');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan data pengguna!</div>');
            redirect('admin/usermanagement');
        }
    }

    public function userEdit($id)
    {
        if ($this->session->login['role_id'] == 'admin') {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('role_id', 'Role Pengguna', 'required');

            if ($this->form_validation->run() == false) {
                $data['title'] = 'Halaman Edit Pengguna';
                $data['pagetitle'] = 'Admin';
                $data['subtitle'] = 'Edit pengguna';
                $data['userdetail'] = $this->M_pengguna->getPenggunaDetail($id);
                $data['userdata'] = $this->session->userdata('login');
                $idPegawai = $this->session->login['id_pegawai'];
                $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
                $this->load->view('partials/header', $data);
                $this->load->view('partials/topbar', $data);
                $this->load->view('partials/page-title', $data);
                $this->load->view('admin/useredit', $data);
            } else {
                // get current user password
                $currentPassword = $this->input->post('currentPassword');
                $newPassword = $this->input->post('password');
                // check if current password == new password
                if ($newPassword == $currentPassword) {
                    // then don't update password
                    $data = array(
                        'username' => $this->input->post('username'),
                        'role_id' => $this->input->post('role_id'),
                        'updated_at' => time(),
                    );

                    if ($this->M_pengguna->editPengguna($data, $id)) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data pengguna berhasil diubah!</div>');
                        redirect('admin/usermanagement');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal mengubah data pengguna!</div>');
                        redirect('admin/usermanagement');
                    }
                } else if ($newPassword != $currentPassword) { // check if current password != new password
                    $data = array( // then update new password
                        'username' => $this->input->post('username'),
                        'role_id' => $this->input->post('role_id'),
                        'password' => md5($this->input->post('password')),
                        'updated_at' => time(),
                    );

                    if ($this->M_pengguna->editPengguna($data, $id)) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data pengguna berhasil diubah!</div>');
                        redirect('admin/usermanagement');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal mengubah data pengguna!</div>');
                        redirect('admin/usermanagement');
                    }
                }
            }
        } else {
            redirect('login/blocked');
        }
    }

    public function deleteUser($idUser)
    {
        if ($this->M_pengguna->deleteUser($idUser)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data pengguna berhasil dihapus!</div>');
            redirect('admin/usermanagement');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menghapus data pengguna!</div>');
            redirect('admin/usermanagement');
        }
    }
    // end of user management

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
                $idPegawai = $this->session->login['id_pegawai'];
                $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
                $this->load->view('partials/header', $data);
                $this->load->view('partials/topbar', $data);
                $this->load->view('partials/page-title', $data);
                $this->load->view('admin/daftarpegawai', $data);
            } else {
                // tambah data pegawai
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
            $idPegawai = $this->session->login['id_pegawai'];
            $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
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
        $idPegawai = $this->session->login['id_pegawai'];
        $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
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
    // end of pegawai

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
            $idPegawai = $this->session->login['id_pegawai'];
            $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
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
    // end of laboratorium

    // Ruangan
    public function daftarRuangan()
    {
        if ($this->session->login['role_id'] == 'admin') {
            $this->form_validation->set_rules('namaRuangan', 'Nama Ruangan', 'required');
            $this->form_validation->set_rules('gedung', 'Gedung', 'required');
            $this->form_validation->set_rules('lantai', 'Lantai', 'required|numeric');
            $this->form_validation->set_rules('laboratorium', 'Laboratorium', 'required');
            $this->form_validation->set_rules('pegawai', 'Penanggung Jawab', 'required');
            $this->form_validation->set_rules('waktuOperasional', 'Waktu Operasional', 'required');
            $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required|numeric');

            if ($this->form_validation->run() == false) {
                $data['title'] = 'Halaman Daftar Ruangan';
                $data['pagetitle'] = 'Admin';
                $data['subtitle'] = 'Daftar Ruangan';
                $data['all_ruangan'] = $this->M_ruangan->getAllRuanganInfo();
                $data['no'] = 1;
                $data['userdata'] = $this->session->userdata('login');
                $idPegawai = $this->session->login['id_pegawai'];
                $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
                $data['pegawai_upt'] = $this->M_pegawaiUpt->getPegawaiUpt();
                $data['laboratorium'] = $this->M_laboratorium->getAllLab();
                $this->load->view('partials/header', $data);
                $this->load->view('partials/topbar', $data);
                $this->load->view('partials/page-title', $data);
                $this->load->view('admin/daftarruangan', $data);
            } else {
                // tambah data ruangan
                $idLab = $this->input->post('laboratorium');
                $namaRuangan = $this->input->post('namaRuangan');
                $gedung = $this->input->post('gedung');
                $lantai = $this->input->post('lantai');
                $penanggungJawab = $this->input->post('pegawai');
                $waktuOperasional = $this->input->post('waktuOperasional');
                $kapasitas = $this->input->post('kapasitas');
                $keterangan = $this->input->post('keteranganRuangan');

                $data = [
                    'id_lab' => $idLab,
                    'nama_ruangan' => $namaRuangan,
                    'gedung' => $gedung,
                    'lantai' => $lantai,
                    'id_pegawai' => $penanggungJawab,
                    'waktu_operasional' => $waktuOperasional,
                    'kapasitas' => $kapasitas,
                    'keterangan' => $keterangan,
                    'created_at' => time(),
                    'updated_at' => time(),
                ];

                if ($this->M_ruangan->addRuangan($data)) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data ruangan berhasil ditambahkan!</div>');
                    redirect('admin/daftarruangan');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan data ruangan!</div>');
                    redirect('admin/daftarruangan');
                }
            }
        } else {
            redirect('login/blocked');
        }
    }

    public function detailRuangan($idRuang)
    {
        $data['title'] = 'Data Ruangan';
        $data['pagetitle'] = 'Daftar ruangan';
        $data['subtitle'] = 'Detail ruangan';
        $data['userdata'] = $this->session->userdata('login');
        $data['detail_ruang'] = $this->M_ruangan->getDetailRuangan($idRuang);
        $idPegawai = $this->session->login['id_pegawai'];
        $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
        $data['pic_ruang'] = $this->M_ruangan->getPicRuangan($idRuang);
        $this->load->view('partials/header', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('partials/page-title', $data);
        $this->load->view('admin/detailruangan', $data);
    }

    public function editDataRuangan($idRuang)
    {
        $this->form_validation->set_rules('namaRuangan', 'Nama Ruangan', 'required');
        $this->form_validation->set_rules('gedung', 'Gedung', 'required');
        $this->form_validation->set_rules('lantai', 'Lantai', 'required|numeric');
        $this->form_validation->set_rules('laboratorium', 'Laboratorium', 'required|numeric');
        $this->form_validation->set_rules('pegawai', 'Penanggung Jawab', 'required');
        $this->form_validation->set_rules('waktuOperasional', 'Waktu Operasional', 'required');
        $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required|numeric');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Data Ruangan';
            $data['pagetitle'] = 'Edit data ruangan';
            $data['subtitle'] = 'Edit data ruangan';
            $data['userdata'] = $this->session->userdata('login');
            $data['detail_ruangan'] = $this->M_ruangan->getDetailRuangan($idRuang);
            $idPegawai = $this->session->login['id_pegawai'];
            $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
            $data['pegawai_upt'] = $this->M_pegawaiUpt->getPegawaiUpt();
            $data['laboratorium'] = $this->M_laboratorium->getAllLab();
            $this->load->view('partials/header', $data);
            $this->load->view('partials/topbar', $data);
            $this->load->view('partials/page-title', $data);
            $this->load->view('admin/editruangan', $data);
        } else {
            $namaRuangan = $this->input->post('namaRuangan');
            $gedung = $this->input->post('gedung');
            $lantai = $this->input->post('lantai');
            $laboratorium = $this->input->post('laboratorium');
            $pegawai = $this->input->post('pegawai');
            $waktuOperasional = $this->input->post('waktuOperasional');
            $kapasitas = $this->input->post('kapasitas');
            $keterangan = $this->input->post('keterangan');

            $data = [
                'nama_ruangan' => $namaRuangan,
                'gedung' => $gedung,
                'lantai' => $lantai,
                'id_lab' => $laboratorium,
                'id_pegawai' => $pegawai,
                'waktu_operasional' => $waktuOperasional,
                'kapasitas' => $kapasitas,
                'keterangan' => $keterangan,
                'updated_at' => time(),
            ];

            if ($this->M_ruangan->editRuangan($data, $idRuang)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data ruangan berhasil diubah!</div>');
                redirect('admin/daftarruangan');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal mengubah data ruangan!</div>');
                redirect('admin/daftarruangan');
            }
        }
    }

    public function deleteRuangan($idRuang)
    {
        if ($this->M_ruangan->deleteRuangan($idRuang)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data ruangan berhasil dihapus!</div>');
            redirect('admin/daftarruangan');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Gagal menghapus data ruangan!</div>');
            redirect('admin/daftarruangan');
        }
    }
    // end of ruangan

    // Barang Lab
    public function pilihLab()
    {
        if ($this->session->login['role_id'] == 'admin') {
            $data['title'] = 'Barang Modal Laboratorium';
            $data['pagetitle'] = 'Admin';
            $data['subtitle'] = 'Pilih Laboratorium';
            $data['all_lab'] = $this->M_laboratorium->getAllLab();
            $data['no'] = 1;
            $data['userdata'] = $this->session->userdata('login');
            $idPegawai = $this->session->login['id_pegawai'];
            $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
            $data['pegawai_upt'] = $this->M_pegawaiUpt->getPegawaiUpt();
            $this->load->view('partials/header', $data);
            $this->load->view('partials/topbar', $data);
            $this->load->view('partials/page-title', $data);
            $this->load->view('admin/pilihlab', $data);
        } else {
            redirect('login/blocked');
        }
    }
    public function pilihLabBarangRusak()
    {
        if ($this->session->login['role_id'] == 'admin') {
            $data['title'] = 'Barang Modal Laboratorium (Rusak)';
            $data['pagetitle'] = 'Admin';
            $data['subtitle'] = 'Pilih Laboratorium';
            $data['all_lab'] = $this->M_laboratorium->getAllLab();
            $data['no'] = 1;
            $data['userdata'] = $this->session->userdata('login');
            $idPegawai = $this->session->login['id_pegawai'];
            $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
            $data['pegawai_upt'] = $this->M_pegawaiUpt->getPegawaiUpt();
            $this->load->view('partials/header', $data);
            $this->load->view('partials/topbar', $data);
            $this->load->view('partials/page-title', $data);
            $this->load->view('admin/pilihlabbarangmodalrusak', $data);
        } else {
            redirect('login/blocked');
        }
    }
    public function pilihLabBarangHilang()
    {
        if ($this->session->login['role_id'] == 'admin') {
            $data['title'] = 'Barang Modal Laboratorium (Hilang)';
            $data['pagetitle'] = 'Admin';
            $data['subtitle'] = 'Pilih Laboratorium';
            $data['all_lab'] = $this->M_laboratorium->getAllLab();
            $data['no'] = 1;
            $data['userdata'] = $this->session->userdata('login');
            $idPegawai = $this->session->login['id_pegawai'];
            $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
            $data['pegawai_upt'] = $this->M_pegawaiUpt->getPegawaiUpt();
            $this->load->view('partials/header', $data);
            $this->load->view('partials/topbar', $data);
            $this->load->view('partials/page-title', $data);
            $this->load->view('admin/pilihlabbarangmodalhilang', $data);
        } else {
            redirect('login/blocked');
        }
    }

    public function pilihRuangan($idLab)
    {
        if ($this->session->login['role_id'] == 'admin') {
            $data['title'] = 'Barang Modal Laboratorium';
            $data['pagetitle'] = 'Admin';
            $data['subtitle'] = 'Pilih Ruangan';
            $data['all_ruangan'] = $this->M_ruangan->getLabRuangan($idLab);
            $data['nama_lab'] = $this->M_laboratorium->namaLab($idLab);
            $data['no'] = 1;
            $data['userdata'] = $this->session->userdata('login');
            $idPegawai = $this->session->login['id_pegawai'];
            $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
            $data['pegawai_upt'] = $this->M_pegawaiUpt->getPegawaiUpt();
            $this->load->view('partials/header', $data);
            $this->load->view('partials/topbar', $data);
            $this->load->view('partials/page-title', $data);
            $this->load->view('admin/pilihruangan', $data);
        } else {
            redirect('login/blocked');
        }
    }
    public function pilihRuanganBarangRusak($idLab)
    {
        if ($this->session->login['role_id'] == 'admin') {
            $data['title'] = 'Barang Modal Laboratorium (Rusak)';
            $data['pagetitle'] = 'Admin';
            $data['subtitle'] = 'Pilih Ruangan';
            $data['all_ruangan'] = $this->M_ruangan->getLabRuangan($idLab);
            $data['nama_lab'] = $this->M_laboratorium->namaLab($idLab);
            $data['no'] = 1;
            $data['userdata'] = $this->session->userdata('login');
            $idPegawai = $this->session->login['id_pegawai'];
            $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
            $data['pegawai_upt'] = $this->M_pegawaiUpt->getPegawaiUpt();
            $this->load->view('partials/header', $data);
            $this->load->view('partials/topbar', $data);
            $this->load->view('partials/page-title', $data);
            $this->load->view('admin/pilihruanganbarangmodalrusak', $data);
        } else {
            redirect('login/blocked');
        }
    }
    public function pilihRuanganBarangHilang($idLab)
    {
        if ($this->session->login['role_id'] == 'admin') {
            $data['title'] = 'Barang Modal Laboratorium (Hilang)';
            $data['pagetitle'] = 'Admin';
            $data['subtitle'] = 'Pilih Ruangan';
            $data['all_ruangan'] = $this->M_ruangan->getLabRuangan($idLab);
            $data['nama_lab'] = $this->M_laboratorium->namaLab($idLab);
            $data['no'] = 1;
            $data['userdata'] = $this->session->userdata('login');
            $idPegawai = $this->session->login['id_pegawai'];
            $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
            $data['pegawai_upt'] = $this->M_pegawaiUpt->getPegawaiUpt();
            $this->load->view('partials/header', $data);
            $this->load->view('partials/topbar', $data);
            $this->load->view('partials/page-title', $data);
            $this->load->view('admin/pilihruanganbarangmodalhilang', $data);
        } else {
            redirect('login/blocked');
        }
    }

    public function daftarBarangLab($idRuang)
    {
        $idPegawai = $this->session->login['id_pegawai'];
        $data['title'] = 'Barang Modal';
        $data['pagetitle'] = 'Daftar barang modal';
        $data['subtitle'] = 'Daftar barang modal';
        $data['userdata'] = $this->session->userdata('login');
        $data['barang_lab'] = $this->M_barangmodal->getBarangLab($idRuang);
        $idPegawai = $this->session->login['id_pegawai'];
        $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
        $data['thisRuang'] = $idRuang;
        $data['ruangan_detail'] = $this->M_ruangan->getDetailRuangan($idRuang);
        $data['barang_bmn'] = $this->M_barangmodal->getBarangBmn();
        $this->load->view('partials/header', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('partials/page-title', $data);
        $this->load->view('admin/daftarbarangmodal', $data);
    }
    public function daftarBarangLabRusak($idRuang)
    {
        $idPegawai = $this->session->login['id_pegawai'];
        $data['title'] = 'Barang Modal (Rusak)';
        $data['pagetitle'] = 'Daftar barang modal';
        $data['subtitle'] = 'Daftar barang modal (Rusak)';
        $data['userdata'] = $this->session->userdata('login');
        $data['barang_lab'] = $this->M_barangmodal->getBarangLabRusak($idRuang);
        $idPegawai = $this->session->login['id_pegawai'];
        $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
        $data['thisRuang'] = $idRuang;
        $data['ruangan_detail'] = $this->M_ruangan->getDetailRuangan($idRuang);
        $data['barang_bmn'] = $this->M_barangmodal->getBarangBmn();
        $this->load->view('partials/header', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('partials/page-title', $data);
        $this->load->view('admin/daftarbarangmodalrusak', $data);
    }
    public function daftarBarangLabHilang($idRuang)
    {
        $idPegawai = $this->session->login['id_pegawai'];
        $data['title'] = 'Barang Modal (Hilang)';
        $data['pagetitle'] = 'Daftar barang modal';
        $data['subtitle'] = 'Daftar barang modal (Hilang)';
        $data['userdata'] = $this->session->userdata('login');
        $data['barang_lab'] = $this->M_barangmodal->getBarangLabHilang($idRuang);
        $idPegawai = $this->session->login['id_pegawai'];
        $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
        $data['thisRuang'] = $idRuang;
        $data['ruangan_detail'] = $this->M_ruangan->getDetailRuangan($idRuang);
        $data['barang_bmn'] = $this->M_barangmodal->getBarangBmn();
        $this->load->view('partials/header', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('partials/page-title', $data);
        $this->load->view('admin/daftarbarangmodalhilang', $data);
    }

    public function detailBarangLab($idBarangLab)
    {
        $data['title'] = 'Barang Modal';
        $data['pagetitle'] = 'Daftar barang modal';
        $data['subtitle'] = 'Detail barang modal';
        $data['userdata'] = $this->session->userdata('login');
        $data['detail_barang'] = $this->M_barangmodal->getBarangDetail($idBarangLab);
        $idPegawai = $this->session->login['id_pegawai'];
        $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
        $this->load->view('partials/header', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('partials/page-title', $data);
        $this->load->view('admin/detailbarangmodal', $data);
    }
    // end of barang lab
}
