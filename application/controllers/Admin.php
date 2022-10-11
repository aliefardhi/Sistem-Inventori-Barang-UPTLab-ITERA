<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_simukPegawai');
        $this->load->model('M_laboratorium');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['pagetitle'] = 'Dashboard';
        $data['subtitle'] = 'Dashboard';
        $this->load->view('partials/page-title', $data);
        $this->load->view('admin/index', $data);
    }

    // User management
    public function profile()
    {
        $data['title'] = 'Halaman Profile';
        $data['pagetitle'] = 'Profile';
        $data['subtitle'] = 'Pengaturan profile';
        $this->load->view('partials/page-title', $data);
        $this->load->view('admin/profile', $data);
    }

    public function userManagement()
    {
        $data['title'] = 'Halaman Kelola Pengguna';
        $data['pagetitle'] = 'Admin';
        $data['subtitle'] = 'Kelola pengguna';
        $this->load->view('partials/page-title', $data);
        $this->load->view('admin/usermanagement', $data);
    }

    public function userDetail()
    {
        $data['title'] = 'Halaman Kelola Pengguna';
        $data['pagetitle'] = 'Admin';
        $data['subtitle'] = 'Detail pengguna';
        $this->load->view('partials/page-title', $data);
        $this->load->view('admin/userdetail', $data);
    }

    public function addUser()
    {
        $data['title'] = 'Halaman Kelola Pengguna';
        $data['pagetitle'] = 'Admin';
        $data['subtitle'] = 'Tambah Pengguna';
        $this->load->view('partials/page-title', $data);
        $this->load->view('admin/adduser', $data);
    }

    // Pegawai
    public function daftarPegawai()
    {
        $data['title'] = 'Halaman Daftar Pegawai';
        $data['pagetitle'] = 'Admin';
        $data['subtitle'] = 'Daftar Pegawai';
        $data['all_pegawai'] = $this->M_simukPegawai->getAllPegawai();
        $this->load->view('partials/page-title', $data);
        $this->load->view('admin/daftarpegawai', $data);
    }

    public function detailPegawai()
    {
        $data['title'] = 'Halaman Detail Pegawai';
        $data['pagetitle'] = 'Admin';
        $data['subtitle'] = 'Detail Pegawai';
        $this->load->view('partials/page-title', $data);
        $this->load->view('admin/detailpegawai', $data);
    }

    // Laboratorium
    public function daftarLaboratorium()
    {
        $data['title'] = 'Halaman Daftar Laboratorium ITERA';
        $data['pagetitle'] = 'Admin';
        $data['subtitle'] = 'Daftar Laboratorium';
        $data['all_lab'] = $this->M_laboratorium->getAllLab();
        $data['no'] = 1;
        $this->load->view('partials/page-title', $data);
        $this->load->view('admin/daftarlab', $data);
    }

    public function addLab()
    {
        $data = [
            'nama_lab' => $this->input->post('namaLab'),
        ];

        if ($this->M_laboratorium->addLab($data)) {
            // $this->session->set_flashdata('success', 'Data Laboratorium <strong>Berhasil</strong> Ditambahkan!');
            redirect('admin/daftarlaboratorium');
        } else {
            // $this->session->set_flashdata('error', 'Data Laboratorium <strong>Gagal</strong> Ditambahkan!');
            redirect('admin/daftarlaboratorium');
        }
    }

    public function deleteLab($idLab)
    {
        if ($this->M_laboratorium->deleteLab($idLab)) {
            redirect('admin/daftarlaboratorium');
        } else {
            redirect('admin/daftarlaboratorium');
        }
    }
}
