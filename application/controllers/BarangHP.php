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
    }

    public function index()
    {
        $data['title'] = 'Barang Habis Pakai';
        $data['pagetitle'] = 'Pilih ruangan';
        $data['subtitle'] = '';
        $data['userdata'] = $this->session->userdata('login');
        $this->load->view('partials/topbar', $data);
        $this->load->view('partials/page-title', $data);
        $this->load->view('baranghp/pilihruangan', $data);
    }

    public function daftarBarang()
    {
        $data['title'] = 'Barang Habis Pakai';
        $data['pagetitle'] = 'Daftar barang habis pakai';
        $data['subtitle'] = 'Daftar barang habis pakai';
        $data['userdata'] = $this->session->userdata('login');
        $this->load->view('partials/topbar', $data);
        $this->load->view('partials/page-title', $data);
        $this->load->view('baranghp/daftarbarang', $data);
    }

    public function detailBarangHP()
    {
        $data['title'] = 'Barang Habis Pakai';
        $data['pagetitle'] = 'Daftar barang habis pakai';
        $data['subtitle'] = 'Detail barang habis pakai';
        $data['userdata'] = $this->session->userdata('login');
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
        $this->load->view('partials/topbar', $data);
        $this->load->view('partials/page-title', $data);
        $this->load->view('baranghp/daftarrusakbhp', $data);
    }
}
