<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BarangHP extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Barang Habis Pakai';
        $data['pagetitle'] = 'Pilih ruangan';
        $data['subtitle'] = '';
        $this->load->view('partials/page-title', $data);
        $this->load->view('baranghp/pilihruangan', $data);
    }

    public function daftarBarang()
    {
        $data['title'] = 'Barang Habis Pakai';
        $data['pagetitle'] = 'Daftar barang habis pakai';
        $data['subtitle'] = 'Daftar barang habis pakai';
        $this->load->view('partials/page-title', $data);
        $this->load->view('baranghp/daftarbarang', $data);
    }
}
