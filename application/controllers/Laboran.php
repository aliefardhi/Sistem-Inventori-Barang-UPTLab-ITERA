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
}