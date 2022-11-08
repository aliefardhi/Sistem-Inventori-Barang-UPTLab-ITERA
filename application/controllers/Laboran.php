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
        $this->form_validation->set_rules('idBp', 'ID Barang', 'required');
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
            $this->load->view('partials/header', $data);
            $this->load->view('partials/topbar', $data);
            $this->load->view('partials/page-title', $data);
            $this->load->view('barangpersediaan/tambahdatabp', $data);
        } else {
            $idLab = $this->session->login['id_lab'];
            $idBp = $this->input->post('idBp');
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
                'id_persediaan' => $idBp,
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
        $this->form_validation->set_rules('editIdBp', 'ID BHP', 'required');
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
            $this->load->view('partials/header', $data);
            $this->load->view('partials/topbar', $data);
            $this->load->view('partials/page-title', $data);
            $this->load->view('laboran/editpersediaan', $data);
        } else {
            $idLab = $this->session->login['id_lab'];
            $idBp = $this->input->post('editIdBp');
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
                'id_persediaan' => $idBp,
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
        $this->load->view('partials/header', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('partials/page-title', $data);
        $this->load->view('barangpersediaan/importdatabp', $data);
    }

    // Barang habis pakai
    public function tambahDataHP()
    {
        $this->form_validation->set_rules('idBhp', 'ID Barang', 'required');
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
            $this->load->view('partials/header', $data);
            $this->load->view('partials/topbar', $data);
            $this->load->view('partials/page-title', $data);
            $this->load->view('baranghp/tambahdatahp', $data);
        } else {
            $idLab = $this->session->login['id_lab'];
            $idBhp = $this->input->post('idBhp');
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
                'id_bhp' => $idBhp,
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
        $this->form_validation->set_rules('editIdBhp', 'ID BHP', 'required');
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
            $this->load->view('partials/header', $data);
            $this->load->view('partials/topbar', $data);
            $this->load->view('partials/page-title', $data);
            $this->load->view('laboran/editbhp', $data);
        } else {
            $idLab = $this->session->login['id_lab'];
            $idBhp = $this->input->post('editIdBhp');
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
                'id_bhp' => $idBhp,
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
        $this->load->view('partials/header', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('partials/page-title', $data);
        $this->load->view('baranghp/importdatahp', $data);
    }
}
