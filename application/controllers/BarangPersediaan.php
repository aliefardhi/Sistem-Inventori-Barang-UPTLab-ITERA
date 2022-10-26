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
    }

    public function index()
    {
        $data['title'] = 'Barang Persediaan';
        $data['pagetitle'] = 'Pilih ruangan';
        $data['subtitle'] = '';
        $data['userdata'] = $this->session->userdata('login');
        $this->load->view('partials/topbar', $data);
        $this->load->view('partials/page-title', $data);
        $this->load->view('barangpersediaan/pilihruangan', $data);
    }

    public function daftarBarang()
    {
        $data['title'] = 'Barang Persediaan';
        $data['pagetitle'] = 'Daftar barang persediaan';
        $data['subtitle'] = 'Daftar barang persediaan';
        $data['userdata'] = $this->session->userdata('login');
        $this->load->view('partials/topbar', $data);
        $this->load->view('partials/page-title', $data);
        $this->load->view('barangpersediaan/daftarbarang', $data);
    }

    public function detailBarangPersediaan()
    {
        $data['title'] = 'Barang Persediaan';
        $data['pagetitle'] = 'Daftar barang persediaan';
        $data['subtitle'] = 'Detail barang persediaan';
        $data['userdata'] = $this->session->userdata('login');
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
        $this->load->view('partials/topbar', $data);
        $this->load->view('partials/page-title', $data);
        $this->load->view('barangpersediaan/daftarrusakpersediaan', $data);
    }
}
