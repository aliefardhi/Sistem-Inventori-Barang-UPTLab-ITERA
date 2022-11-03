<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BarangModal extends CI_Controller
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
        $data['title'] = 'Barang Modal';
        $data['pagetitle'] = 'Daftar barang modal';
        $data['subtitle'] = 'Daftar barang modal';
        $data['userdata'] = $this->session->userdata('login');
        $this->load->view('partials/header', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('partials/page-title', $data);
        $this->load->view('barangmodal/daftarbarang', $data);
    }

    public function detailBarangModal()
    {
        $data['title'] = 'Barang Modal';
        $data['pagetitle'] = 'Daftar barang modal';
        $data['subtitle'] = 'Detail barang modal';
        $data['userdata'] = $this->session->userdata('login');
        $this->load->view('partials/header', $data);
        $this->load->view('partials/topbar', $data);
        $this->load->view('partials/page-title', $data);
        $this->load->view('barangmodal/detailbarangmodal', $data);
    }
}
