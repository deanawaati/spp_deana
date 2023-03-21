<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_m');
        $this->load->model('User_m');
    }

    public function index()
    {
        $data['title'] = 'Dashboard ADMIN';
        $data['user'] = $this->Auth_m->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa_aktif'] = $this->Auth_m->countTotalSiswa();
        $data['user_aktif'] = $this->Auth_m->countTotalUser();
        $data['guru_aktif'] = $this->Auth_m->countTotalGuru();
        $data['walikelas_aktif'] = $this->Auth_m->countTotalWali();
        $this->load->view('header', $data);
        $this->load->view('sidebar');
        $this->load->view('topbar', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('footer', $data);
    }

    public function sidebar()
    {
        $this->load->view('header');
        $this->load->view('errors/sidebar');
    }
}
