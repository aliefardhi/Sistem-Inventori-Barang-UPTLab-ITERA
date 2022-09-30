<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['pagetitle'] = 'Dashboard';
        $data['subtitle'] = 'Dashboard';
        $this->load->view('partials/page-title', $data);
        $this->load->view('admin/index', $data);
    }

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

    public function daftarPegawai()
    {
        $data['title'] = 'Halaman Daftar Pegawai';
        $data['pagetitle'] = 'Admin';
        $data['subtitle'] = 'Daftar Pegawai';
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
}
