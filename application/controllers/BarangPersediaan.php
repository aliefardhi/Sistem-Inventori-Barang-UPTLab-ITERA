<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BarangPersediaan extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Barang Persediaan';
        $data['pagetitle'] = 'Pilih ruangan';
        $data['subtitle'] = '';
        $this->load->view('partials/page-title', $data);
        $this->load->view('barangpersediaan/pilihruangan', $data);
    }

    public function daftarBarang()
    {
        $data['title'] = 'Barang Persediaan';
        $data['pagetitle'] = 'Daftar barang persediaan';
        $data['subtitle'] = 'Daftar barang persediaan';
        $this->load->view('partials/page-title', $data);
        $this->load->view('barangpersediaan/daftarbarang', $data);
    }
}
