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
        $this->load->model('M_bhp');
        $this->load->model('M_persediaan');
        $this->load->model('M_ruangan');
        $this->load->model('M_pegawaiUpt');
    }

    public function index()
    {
        if ($this->session->login['role_id'] == 'laboran') {
            $data['title'] = 'Dashboard';
            $data['pagetitle'] = 'Dashboard';
            $data['subtitle'] = 'Dashboard';
            $data['userdata'] = $this->session->userdata('login');
            $idPegawai = $this->session->login['id_pegawai'];
            $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
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
            $idPegawai = $this->session->login['id_pegawai'];
            $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
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
            $idPegawai = $this->session->login['id_pegawai'];
            $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
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
                'updated_at' => time(),
            );

            if ($this->M_pengguna->editPenggunaByUsername($data, $username)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profil berhasil diperbaharui!</div>');
                redirect('laboran/profile');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal memperbaharui profil!</div>');
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
                $idPegawai = $this->session->login['id_pegawai'];
                $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
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
                        $this->db->set('updated_at', time());
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
    // end of profile laboran

    // Barang persediaan
    public function tambahDataBP()
    {
        $this->form_validation->set_rules('namaBp', 'Nama Barang', 'required');
        $this->form_validation->set_rules('jenisBp', 'Jenis Barang', 'required');
        $this->form_validation->set_rules('jumlahBp', 'Jumlah Barang', 'required|numeric');
        $this->form_validation->set_rules('sisaBp', 'Sisa Barang', 'required|numeric');
        $this->form_validation->set_rules('satuanBp', 'Satuan', 'required');
        $this->form_validation->set_rules('tahunAnggaranBp', 'Tahun Anggaran', 'required');
        $this->form_validation->set_rules('tanggalTerimaBp', 'Tanggal Terima', 'required');
        $this->form_validation->set_rules('vendorBp', 'Vendor', 'required');
        $this->form_validation->set_rules('kondisiBp', 'Kondisi ', 'required');
        $this->form_validation->set_rules('hargaSatuanBp', 'Harga Satuan', 'required|numeric');
        $this->form_validation->set_rules('spesifikasiBp', 'Spesifikasi', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Data Barang Persediaan';
            $data['pagetitle'] = 'Daftar Barang Persediaan';
            $data['subtitle'] = 'Tambah Data Barang';
            $data['userdata'] = $this->session->userdata('login');
            $idPegawai = $this->session->login['id_pegawai'];
            $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
            $this->load->view('partials/header', $data);
            $this->load->view('partials/topbar', $data);
            $this->load->view('partials/page-title', $data);
            $this->load->view('barangpersediaan/tambahdatabp', $data);
        } else {
            $idLab = $this->session->login['id_lab'];
            $namaBp = $this->input->post('namaBp');
            $jenisBp = $this->input->post('jenisBp');
            $jumlahBp = $this->input->post('jumlahBp');
            $sisaBp = $this->input->post('sisaBp');
            $satuanBp = $this->input->post('satuanBp');
            $tahunAnggaranBp = $this->input->post('tahunAnggaranBp');
            $tanggalTerimaBp = $this->input->post('tanggalTerimaBp');
            $vendorBp = $this->input->post('vendorBp');
            $kondisiBp = $this->input->post('kondisiBp');
            $hargaSatuanBp = $this->input->post('hargaSatuanBp');
            $spesifikasiBp = $this->input->post('spesifikasiBp');
            $keteranganBp = $this->input->post('keteranganBp');

            $data = [
                'id_lab' => $idLab,
                'nama_barang' => $namaBp,
                'jenis_barang' => $jenisBp,
                'jumlah' => $jumlahBp,
                'sisa_barang' => $sisaBp,
                'satuan' => $satuanBp,
                'tahun_anggaran' => $tahunAnggaranBp,
                'tanggal_terima' => $tanggalTerimaBp,
                'vendor' => $vendorBp,
                'kondisi' => $kondisiBp,
                'harga_satuan' => $hargaSatuanBp,
                'spesifikasi' => $spesifikasiBp,
                'keterangan' => $keteranganBp,
                'created_at' => time(),
                'updated_at' => time(),
            ];

            if ($this->M_persediaan->addPersediaan($data)) {
                $idLab = $this->session->login['id_lab'];
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data barang berhasil ditambahkan!</div>');
                redirect('barangpersediaan/daftarbarang/' . $idLab);
            } else {
                $idLab = $this->session->login['id_lab'];
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan data barang!</div>');
                redirect('barangpersediaan/daftarbarang/' . $idLab);
            }
        }
    }

    public function editDataPersediaan($idBp)
    {
        $this->form_validation->set_rules('editNamaBp', 'Nama Barang', 'required');
        $this->form_validation->set_rules('editJenisBp', 'Jenis Barang', 'required');
        $this->form_validation->set_rules('editJumlahBp', 'Jumlah Barang', 'required|numeric');
        $this->form_validation->set_rules('editSisaBp', 'Sisa Barang', 'required|numeric');
        $this->form_validation->set_rules('editSatuanBp', 'Satuan', 'required');
        $this->form_validation->set_rules('editTahunAnggaranBp', 'Tahun Anggaran', 'required');
        $this->form_validation->set_rules('editTanggalTerimaBp', 'Tanggal Terima', 'required');
        $this->form_validation->set_rules('editVendorBp', 'Vendor', 'required');
        $this->form_validation->set_rules('editKondisiBp', 'Kondisi ', 'required');
        $this->form_validation->set_rules('editHargaSatuanBp', 'Harga Satuan', 'required|numeric');
        $this->form_validation->set_rules('editSpesifikasiBp', 'Spesifikasi', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Barang Habis Pakai';
            $data['pagetitle'] = 'Daftar barang habis pakai';
            $data['subtitle'] = 'Edit barang habis pakai';
            $data['userdata'] = $this->session->userdata('login');
            $data['detail_persediaan'] = $this->M_persediaan->detailBarang($idBp);
            $idPegawai = $this->session->login['id_pegawai'];
            $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
            $this->load->view('partials/header', $data);
            $this->load->view('partials/topbar', $data);
            $this->load->view('partials/page-title', $data);
            $this->load->view('laboran/editpersediaan', $data);
        } else {
            $idLab = $this->session->login['id_lab'];
            $namaBp = $this->input->post('editNamaBp');
            $jenisBp = $this->input->post('editJenisBp');
            $jumlahBp = $this->input->post('editJumlahBp');
            $sisaBp = $this->input->post('editSisaBp');
            $satuanBp = $this->input->post('editSatuanBp');
            $tahunAnggaranBp = $this->input->post('editTahunAnggaranBp');
            $tanggalTerimaBp = $this->input->post('editTanggalTerimaBp');
            $vendorBp = $this->input->post('editVendorBp');
            $kondisiBp = $this->input->post('editKondisiBp');
            $hargaSatuanBp = $this->input->post('editHargaSatuanBp');
            $spesifikasiBp = $this->input->post('editSpesifikasiBp');
            $keteranganBp = $this->input->post('editKeteranganBp');

            $data = [
                'id_lab' => $idLab,
                'nama_barang' => $namaBp,
                'jenis_barang' => $jenisBp,
                'jumlah' => $jumlahBp,
                'sisa_barang' => $sisaBp,
                'satuan' => $satuanBp,
                'tahun_anggaran' => $tahunAnggaranBp,
                'tanggal_terima' => $tanggalTerimaBp,
                'vendor' => $vendorBp,
                'kondisi' => $kondisiBp,
                'harga_satuan' => $hargaSatuanBp,
                'spesifikasi' => $spesifikasiBp,
                'keterangan' => $keteranganBp,
                'updated_at' => time(),
            ];

            if ($this->M_persediaan->editPersediaan($data, $idBp)) {
                $idLab = $this->session->login['id_lab'];
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data barang berhasil diubah!</div>');
                redirect('barangpersediaan/daftarbarang/' . $idLab);
            } else {
                $idLab = $this->session->login['id_lab'];
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal mengubah data barang!</div>');
                redirect('barangpersediaan/daftarbarang/' . $idLab);
            }
        }
    }

    public function deletePersediaan($idBp)
    {
        if ($this->M_persediaan->deletePersediaan($idBp)) {
            $idLab = $this->session->login['id_lab'];
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data barang berhasil dihapus!</div>');
            redirect('barangpersediaan/daftarbarang/' . $idLab);
        } else {
            $idLab = $this->session->login['id_lab'];
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Gagal menghapus data barang!</div>');
            redirect('barangpersediaan/daftarbarang/' . $idLab);
        }
    }

    public function importDataBP()
    {
        $data['title'] = 'Tambah Data Barang Persediaan';
        $data['pagetitle'] = 'Tambah Data Barang Persediaan';
        $data['subtitle'] = 'Import Data Barang';
        $data['userdata'] = $this->session->userdata('login');
        $idPegawai = $this->session->login['id_pegawai'];
        $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
        $this->load->view('partials/header', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('partials/page-title', $data);
        $this->load->view('barangpersediaan/importdatabp', $data);
    }
    // end of barang persediaan

    // Barang habis pakai
    public function tambahDataHP()
    {
        $this->form_validation->set_rules('namaBhp', 'Nama Barang', 'required');
        $this->form_validation->set_rules('jenisBhp', 'Jenis Barang', 'required');
        $this->form_validation->set_rules('jumlahBhp', 'Jumlah Barang', 'required|numeric');
        $this->form_validation->set_rules('sisaBhp', 'Sisa Barang', 'required|numeric');
        $this->form_validation->set_rules('satuanBhp', 'Satuan', 'required');
        $this->form_validation->set_rules('tahunAnggaranBhp', 'Tahun Anggaran', 'required');
        $this->form_validation->set_rules('tanggalTerimaBhp', 'Tanggal Terima', 'required');
        $this->form_validation->set_rules('vendorBhp', 'Vendor', 'required');
        $this->form_validation->set_rules('kondisiBhp', 'Kondisi ', 'required');
        $this->form_validation->set_rules('hargaSatuanBhp', 'Harga Satuan', 'required|numeric');
        $this->form_validation->set_rules('spesifikasiBhp', 'Spesifikasi', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Data Barang Habis Pakai';
            $data['pagetitle'] = 'Daftar Barang Habis Pakai';
            $data['subtitle'] = 'Tambah Data Barang';
            $data['userdata'] = $this->session->userdata('login');
            $idPegawai = $this->session->login['id_pegawai'];
            $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
            $this->load->view('partials/header', $data);
            $this->load->view('partials/topbar', $data);
            $this->load->view('partials/page-title', $data);
            $this->load->view('baranghp/tambahdatahp', $data);
        } else {
            $idLab = $this->session->login['id_lab'];
            $namaBhp = $this->input->post('namaBhp');
            $jenisBhp = $this->input->post('jenisBhp');
            $jumlahBhp = $this->input->post('jumlahBhp');
            $sisaBhp = $this->input->post('sisaBhp');
            $satuanBhp = $this->input->post('satuanBhp');
            $tahunAnggaranBhp = $this->input->post('tahunAnggaranBhp');
            $tanggalTerimaBhp = $this->input->post('tanggalTerimaBhp');
            $vendorBhp = $this->input->post('vendorBhp');
            $kondisiBhp = $this->input->post('kondisiBhp');
            $hargaSatuanBhp = $this->input->post('hargaSatuanBhp');
            $spesifikasiBhp = $this->input->post('spesifikasiBhp');
            $keteranganBhp = $this->input->post('keteranganBhp');

            $data = [
                'id_lab' => $idLab,
                'nama_barang' => $namaBhp,
                'jenis_barang' => $jenisBhp,
                'jumlah' => $jumlahBhp,
                'sisa_barang' => $sisaBhp,
                'satuan' => $satuanBhp,
                'tahun_anggaran' => $tahunAnggaranBhp,
                'tanggal_terima' => $tanggalTerimaBhp,
                'vendor' => $vendorBhp,
                'kondisi' => $kondisiBhp,
                'harga_satuan' => $hargaSatuanBhp,
                'spesifikasi' => $spesifikasiBhp,
                'keterangan' => $keteranganBhp,
                'created_at' => time(),
                'updated_at' => time(),
            ];

            if ($this->M_bhp->addBhp($data)) {
                $idLab = $this->session->login['id_lab'];
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data barang berhasil ditambahkan!</div>');
                redirect('baranghp/daftarbarang/' . $idLab);
            } else {
                $idLab = $this->session->login['id_lab'];
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan data barang!</div>');
                redirect('baranghp/daftarbarang/' . $idLab);
            }
        }
    }

    public function editDataBhp($idBhp)
    {
        $this->form_validation->set_rules('editNamaBhp', 'Nama Barang', 'required');
        $this->form_validation->set_rules('editJenisBhp', 'Jenis Barang', 'required');
        $this->form_validation->set_rules('editJumlahBhp', 'Jumlah Barang', 'required|numeric');
        $this->form_validation->set_rules('editSisaBhp', 'Sisa Barang', 'required|numeric');
        $this->form_validation->set_rules('editSatuanBhp', 'Satuan', 'required');
        $this->form_validation->set_rules('editTahunAnggaranBhp', 'Tahun Anggaran', 'required');
        $this->form_validation->set_rules('editTanggalTerimaBhp', 'Tanggal Terima', 'required');
        $this->form_validation->set_rules('editVendorBhp', 'Vendor', 'required');
        $this->form_validation->set_rules('editKondisiBhp', 'Kondisi ', 'required');
        $this->form_validation->set_rules('editHargaSatuanBhp', 'Harga Satuan', 'required|numeric');
        $this->form_validation->set_rules('editSpesifikasiBhp', 'Spesifikasi', 'required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Barang Habis Pakai';
            $data['pagetitle'] = 'Daftar barang habis pakai';
            $data['subtitle'] = 'Edit barang habis pakai';
            $data['userdata'] = $this->session->userdata('login');
            $data['detail_bhp'] = $this->M_bhp->detailBarang($idBhp);
            $idPegawai = $this->session->login['id_pegawai'];
            $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
            $this->load->view('partials/header', $data);
            $this->load->view('partials/topbar', $data);
            $this->load->view('partials/page-title', $data);
            $this->load->view('laboran/editbhp', $data);
        } else {
            $idLab = $this->session->login['id_lab'];
            $namaBhp = $this->input->post('editNamaBhp');
            $jenisBhp = $this->input->post('editJenisBhp');
            $jumlahBhp = $this->input->post('editJumlahBhp');
            $sisaBhp = $this->input->post('editSisaBhp');
            $satuanBhp = $this->input->post('editSatuanBhp');
            $tahunAnggaranBhp = $this->input->post('editTahunAnggaranBhp');
            $tanggalTerimaBhp = $this->input->post('editTanggalTerimaBhp');
            $vendorBhp = $this->input->post('editVendorBhp');
            $kondisiBhp = $this->input->post('editKondisiBhp');
            $hargaSatuanBhp = $this->input->post('editHargaSatuanBhp');
            $spesifikasiBhp = $this->input->post('editSpesifikasiBhp');
            $keteranganBhp = $this->input->post('editKeteranganBhp');

            $data = [
                'id_lab' => $idLab,
                'nama_barang' => $namaBhp,
                'jenis_barang' => $jenisBhp,
                'jumlah' => $jumlahBhp,
                'sisa_barang' => $sisaBhp,
                'satuan' => $satuanBhp,
                'tahun_anggaran' => $tahunAnggaranBhp,
                'tanggal_terima' => $tanggalTerimaBhp,
                'vendor' => $vendorBhp,
                'kondisi' => $kondisiBhp,
                'harga_satuan' => $hargaSatuanBhp,
                'spesifikasi' => $spesifikasiBhp,
                'keterangan' => $keteranganBhp,
                'updated_at' => time(),
            ];

            if ($this->M_bhp->editBhp($data, $idBhp)) {
                $idLab = $this->session->login['id_lab'];
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data barang berhasil diubah!</div>');
                redirect('baranghp/daftarbarang/' . $idLab);
            } else {
                $idLab = $this->session->login['id_lab'];
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal mengubah data barang!</div>');
                redirect('baranghp/daftarbarang/' . $idLab);
            }
        }
    }

    public function deleteBhp($idBhp)
    {
        if ($this->M_bhp->deleteBhp($idBhp)) {
            $idLab = $this->session->login['id_lab'];
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data barang berhasil dihapus!</div>');
            redirect('baranghp/daftarbarang/' . $idLab);
        } else {
            $idLab = $this->session->login['id_lab'];
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Gagal menghapus data barang!</div>');
            redirect('baranghp/daftarbarang/' . $idLab);
        }
    }

    public function importDataHP()
    {
        $data['title'] = 'Tambah Data Barang Habis Pakai';
        $data['pagetitle'] = 'Tambah Data Barang Habis Pakai';
        $data['subtitle'] = 'Import Data Barang';
        $data['userdata'] = $this->session->userdata('login');
        $idPegawai = $this->session->login['id_pegawai'];
        $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
        $this->load->view('partials/header', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('partials/page-title', $data);
        $this->load->view('baranghp/importdatahp', $data);
    }
    // end of barang habis pakai

    // Ruangan
    public function daftarRuangan()
    {
        if ($this->session->login['role_id'] == 'laboran') {
            $this->form_validation->set_rules('namaRuangan', 'Nama Ruangan', 'required');
            $this->form_validation->set_rules('gedung', 'Gedung', 'required');
            $this->form_validation->set_rules('lantai', 'Lantai', 'required');
            $this->form_validation->set_rules('pegawai', 'Penanggung Jawab', 'required');
            $this->form_validation->set_rules('waktuOperasional', 'Waktu Operasional', 'required');
            $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required');

            if ($this->form_validation->run() == false) {
                $data['title'] = 'Halaman Daftar Ruangan';
                $data['pagetitle'] = 'Laboran';
                $data['subtitle'] = 'Daftar Ruangan';
                $idLab = $this->session->login['id_lab'];
                $data['all_ruangan'] = $this->M_ruangan->getLabRuangan($idLab);
                $data['no'] = 1;
                $data['userdata'] = $this->session->userdata('login');
                $idPegawai = $this->session->login['id_pegawai'];
                $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
                $data['pegawai_upt'] = $this->M_pegawaiUpt->getPegawaiUpt();
                $this->load->view('partials/header', $data);
                $this->load->view('partials/topbar', $data);
                $this->load->view('partials/page-title', $data);
                $this->load->view('laboran/daftarruangan', $data);
            } else {
                // tambah data ruangan
                $idLab = $this->input->post('idLab');
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
                    redirect('laboran/daftarruangan');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan data ruangan!</div>');
                    redirect('laboran/daftarruangan');
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
        $this->load->view('laboran/detailruangan', $data);
    }

    public function editDataRuangan($idRuang)
    {
        $this->form_validation->set_rules('namaRuangan', 'Nama Ruangan', 'required');
        $this->form_validation->set_rules('gedung', 'Gedung', 'required');
        $this->form_validation->set_rules('lantai', 'Lantai', 'required|numeric');
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
            $this->load->view('partials/header', $data);
            $this->load->view('partials/topbar', $data);
            $this->load->view('partials/page-title', $data);
            $this->load->view('laboran/editruangan', $data);
        } else {
            $namaRuangan = $this->input->post('namaRuangan');
            $gedung = $this->input->post('gedung');
            $lantai = $this->input->post('lantai');
            $pegawai = $this->input->post('pegawai');
            $waktuOperasional = $this->input->post('waktuOperasional');
            $kapasitas = $this->input->post('kapasitas');
            $keterangan = $this->input->post('keterangan');

            $data = [
                'nama_ruangan' => $namaRuangan,
                'gedung' => $gedung,
                'lantai' => $lantai,
                'id_pegawai' => $pegawai,
                'waktu_operasional' => $waktuOperasional,
                'kapasitas' => $kapasitas,
                'keterangan' => $keterangan,
                'updated_at' => time(),
            ];

            if ($this->M_ruangan->editRuangan($data, $idRuang)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data ruangan berhasil diubah!</div>');
                redirect('laboran/daftarruangan');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal mengubah data ruangan!</div>');
                redirect('laboran/daftarruangan');
            }
        }
    }

    public function deleteRuangan($idRuang)
    {
        if ($this->M_ruangan->deleteRuangan($idRuang)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data ruangan berhasil dihapus!</div>');
            redirect('laboran/daftarruangan');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Gagal menghapus data ruangan!</div>');
            redirect('laboran/daftarruangan');
        }
    }
    // end of ruangan
}
