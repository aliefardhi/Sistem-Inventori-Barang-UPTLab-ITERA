<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_simukPegawai');
        $this->load->model('M_laboratorium');
        $this->load->model('M_pegawaiUpt');
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
        $data['title'] = 'Halaman Daftar Pegawai UPT Lab. ITERA';
        $data['pagetitle'] = 'Admin';
        $data['subtitle'] = 'Daftar Pegawai';
        $data['all_pegawai_simuk'] = $this->M_simukPegawai->getAllPegawai();
        $data['all_laboratorium'] = $this->M_laboratorium->getAllLab();
        $data['all_pegawai_upt'] = $this->M_pegawaiUpt->getPegawaiUpt();
        $this->load->view('partials/page-title', $data);
        $this->load->view('admin/daftarpegawai', $data);
    }

    public function detailPegawai($id)
    {
        $data['title'] = 'Halaman Detail Pegawai';
        $data['pagetitle'] = 'Admin';
        $data['subtitle'] = 'Detail Pegawai';
        $data['detail_pegawai_upt'] = $this->M_pegawaiUpt->getDetailPegawaiUpt($id);
        $this->load->view('partials/page-title', $data);
        $this->load->view('admin/detailpegawai', $data);
    }

    public function addPegawai()
    {
        $data = [
            'id_pegawai' => $this->input->post('id_pegawai'),
            'status' => $this->input->post('status_kepegawaian'),
            'jabatan' => $this->input->post('jabatan'),
            'id_lab' => $this->input->post('nama_lab'),
            'role_id' => $this->input->post('role'),
            'kontak' => $this->input->post('kontak'),
        ];

        if ($this->M_pegawaiUpt->addPegawai($data)) {
            // $this->session->set_flashdata('success', 'Data Laboratorium <strong>Berhasil</strong> Ditambahkan!');
            redirect('admin/daftarpegawai');
        } else {
            // $this->session->set_flashdata('error', 'Data Laboratorium <strong>Gagal</strong> Ditambahkan!');
            redirect('admin/daftarpegawai');
        }
    }

    public function deletePegawai($idPegawai)
    {
        if ($this->M_pegawaiUpt->deletePegawai($idPegawai)) {
            redirect('admin/daftarpegawai');
        } else {
            redirect('admin/daftarpegawai');
        }
    }

    public function getAllPegawai()
    {
        $data = $this->M_simukPegawai->getAllPegawai($_POST['pilihPegawaiSimuk']);
        echo json_encode($data);
    }

    public function getIdPegawai()
    {
        $namaPegawai = $this->input->post('pilihPegawaiSimuk', true);
        $data = $this->M_simukPegawai->getIdPegawai($namaPegawai);
        echo json_encode($data);
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
