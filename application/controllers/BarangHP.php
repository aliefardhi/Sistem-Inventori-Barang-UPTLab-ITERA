<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BarangHP extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->login['username']) {
            redirect('index.php/login');
        }

        $this->load->model('M_bhp');
        $this->load->model('M_pengguna');
        $this->load->model('M_laboratorium');
    }

    public function index()
    {
        $data['title'] = 'Barang Habis Pakai';
        $data['pagetitle'] = 'Pilih ruangan';
        $data['subtitle'] = '';
        $data['userdata'] = $this->session->userdata('login');
        $data['lab'] = $this->M_bhp->getLab();
        $data['no'] = 1;
        $idPegawai = $this->session->login['id_pegawai'];
        $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
        $this->load->view('partials/header', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('partials/page-title', $data);
        $this->load->view('baranghp/pilihruangan', $data);
    }

    public function daftarBarang($idLab)
    {
        $idPegawai = $this->session->login['id_pegawai'];
        $data['title'] = 'Barang Habis Pakai';
        $data['pagetitle'] = 'Daftar barang habis pakai';
        $data['subtitle'] = 'Daftar barang habis pakai';
        $data['userdata'] = $this->session->userdata('login');
        $data['barang_habis_pakai'] = $this->M_bhp->daftarBarang($idLab);
        $data['data_lab'] = $this->M_bhp->getThisLab($idPegawai);
        $data['nama_lab'] = $this->M_laboratorium->namaLab($idLab);
        $data['no'] = 1;
        $idPegawai = $this->session->login['id_pegawai'];
        $data['thisLab'] = $idLab;
        $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
        $this->load->view('partials/header', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('partials/page-title', $data);
        $this->load->view('baranghp/daftarbarang', $data);
    }

    public function detailBarangHP($idBhp)
    {
        $data['title'] = 'Barang Habis Pakai';
        $data['pagetitle'] = 'Daftar barang habis pakai';
        $data['subtitle'] = 'Detail barang habis pakai';
        $data['userdata'] = $this->session->userdata('login');
        $data['detail_bhp'] = $this->M_bhp->detailBarang($idBhp);
        $idPegawai = $this->session->login['id_pegawai'];
        $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
        $this->load->view('partials/header', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('partials/page-title', $data);
        $this->load->view('baranghp/detailbaranghp', $data);
    }

    public function bhpHilang()
    {
        $data['title'] = 'Halaman Barang Habis Pakai Hilang';
        $data['pagetitle'] = 'Barang habis pakai';
        $data['subtitle'] = 'Daftar hilang barang habis pakai';
        $data['userdata'] = $this->session->userdata('login');
        $idPegawai = $this->session->login['id_pegawai'];
        $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
        $this->load->view('partials/header', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('partials/page-title', $data);
        $this->load->view('baranghp/daftarhilangbhp', $data);
    }

    public function bhpRusak()
    {
        $data['title'] = 'Halaman Barang Habis Pakai Rusak';
        $data['pagetitle'] = 'Barang habis pakai';
        $data['subtitle'] = 'Daftar rusak barang habis pakai';
        $data['userdata'] = $this->session->userdata('login');
        $idPegawai = $this->session->login['id_pegawai'];
        $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
        $this->load->view('partials/header', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('partials/page-title', $data);
        $this->load->view('baranghp/daftarrusakbhp', $data);
    }
}
