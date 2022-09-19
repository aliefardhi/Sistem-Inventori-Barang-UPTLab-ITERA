<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laboran extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['pagetitle'] = 'Dashboard';
        $data['subtitle'] = 'Dashboard';
        $this->load->view('partials/page-title', $data);
        $this->load->view('laboran/index', $data);
    }

    public function tambahDataBP()
    {
        $data['title'] = 'Tambah Data Barang Persediaan';
        $data['pagetitle'] = 'Daftar Barang Persediaan';
        $data['subtitle'] = 'Tambah Data Barang';
        $this->load->view('partials/page-title', $data);
        $this->load->view('barangpersediaan/tambahdatabp', $data);
    }

    public function importDataBP()
    {
        $data['title'] = 'Tambah Data Barang Persediaan';
        $data['pagetitle'] = 'Tambah Data Barang Persediaan';
        $data['subtitle'] = 'Import Data Barang';
        $this->load->view('partials/page-title', $data);
        $this->load->view('barangpersediaan/importdatabp', $data);
    }

    public function tambahDataHP()
    {
        $data['title'] = 'Tambah Data Barang Habis Pakai';
        $data['pagetitle'] = 'Daftar Barang Habis Pakai';
        $data['subtitle'] = 'Tambah Data Barang';
        $this->load->view('partials/page-title', $data);
        $this->load->view('baranghp/tambahdatahp', $data);
    }

    public function importDataHP()
    {
        $data['title'] = 'Tambah Data Barang Habis Pakai';
        $data['pagetitle'] = 'Tambah Data Barang Habis Pakai';
        $data['subtitle'] = 'Import Data Barang';
        $this->load->view('partials/page-title', $data);
        $this->load->view('baranghp/importdatahp', $data);
    }
}
