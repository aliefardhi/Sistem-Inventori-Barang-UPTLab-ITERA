<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BarangPersediaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->login['username']) {
            redirect('index.php/login');
        }

        $this->load->model('M_persediaan');
        $this->load->model('M_pengguna');
        $this->load->model('M_laboratorium');
    }

    public function index()
    {
        $data['title'] = 'Barang Persediaan';
        $data['pagetitle'] = 'Pilih laboratorium';
        $data['subtitle'] = '';
        $data['lab'] = $this->M_persediaan->getLab();
        $data['no'] = 1;
        $data['userdata'] = $this->session->userdata('login');
        $idPegawai = $this->session->login['id_pegawai'];
        $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
        $this->load->view('partials/header', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('partials/page-title', $data);
        $this->load->view('barangpersediaan/pilihlab', $data);
    }

    public function daftarBarang($idLab)
    {
        $idPegawai = $this->session->login['id_pegawai'];
        $data['title'] = 'Barang Persediaan';
        $data['pagetitle'] = 'Daftar persediaan';
        $data['subtitle'] = 'Daftar persediaan';
        $data['userdata'] = $this->session->userdata('login');
        $data['barang_persediaan'] = $this->M_persediaan->daftarBarang($idLab);
        $data['nama_lab'] = $this->M_laboratorium->namaLab($idLab);
        $data['data_lab'] = $this->M_persediaan->getThisLab($idPegawai);
        $idPegawai = $this->session->login['id_pegawai'];
        $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
        $data['no'] = 1;
        $data['thisLab'] = $idLab;
        $this->load->view('partials/header', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('partials/page-title', $data);
        $this->load->view('barangpersediaan/daftarbarang', $data);
    }

    public function detailBarangPersediaan($idPersediaan)
    {
        $data['title'] = 'Barang Persediaan';
        $data['pagetitle'] = 'Daftar barang persediaan';
        $data['subtitle'] = 'Detail barang persediaan';
        $data['userdata'] = $this->session->userdata('login');
        $data['detail_persediaan'] = $this->M_persediaan->detailBarang($idPersediaan);
        $idPegawai = $this->session->login['id_pegawai'];
        $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
        $this->load->view('partials/header', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('partials/page-title', $data);
        $this->load->view('barangpersediaan/detailbarangbp', $data);
    }

    public function persediaanHilang()
    {
        $data['title'] = 'Halaman Barang Persediaan Hilang';
        $data['pagetitle'] = 'Barang Persediaan';
        $data['subtitle'] = 'Daftar hilang barang persediaan';
        $data['userdata'] = $this->session->userdata('login');
        $idPegawai = $this->session->login['id_pegawai'];
        $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
        $this->load->view('partials/header', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('partials/page-title', $data);
        $this->load->view('barangpersediaan/daftarhilangpersediaan', $data);
    }

    public function persediaanRusak()
    {
        $data['title'] = 'Halaman Barang Persediaan Rusak';
        $data['pagetitle'] = 'Barang Persediaan';
        $data['subtitle'] = 'Daftar rusak barang persediaan';
        $data['userdata'] = $this->session->userdata('login');
        $idPegawai = $this->session->login['id_pegawai'];
        $data['user_session'] = $this->M_pengguna->getPenggunaDetailBySession($idPegawai);
        $this->load->view('partials/header', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('partials/page-title', $data);
        $this->load->view('barangpersediaan/daftarrusakpersediaan', $data);
    }
}
