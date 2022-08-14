<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BarangModal extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Barang Modal';
        $data['pagetitle'] = 'Daftar barang modal';
        $data['subtitle'] = 'Daftar barang modal';
        $this->load->view('partials/page-title', $data);
        $this->load->view('barangmodal/daftarbarang', $data);
    }
}
