<?php

use function PHPSTORM_META\type;

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_m');
        $this->load->model('User_m');
        //Codeigniter : Write Less Do More
    }

    function index()
    {
        $data['title'] = 'Profil Saya';
        $data['user'] = $this->Auth_m->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header', $data);
            $this->load->view('sidebar', $data);
            $this->load->view('topbar', $data);
            $this->load->view('admin/profil', $data);
            $this->load->view('footer');
        }
    }
    public function ubahProfil()
    {
        $data['title'] = 'Ubah Profil';
        $data['user'] = $this->Auth_m->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim', ['required' => 'Nama tidak Boleh Kosong']);
        $this->form_validation->set_rules('email', 'Email', 'required|trim', ['required' => 'Email tidak Boleh Kosong']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', ['required' => 'Alamat tidak Boleh Kosong']);
        $this->form_validation->set_rules('nohp', 'No Hp', 'required|trim', ['required' => 'Nama tidak Boleh Kosong']);

        if ($this->form_validation->run() == false) {
            $this->load->view('header', $data);
            $this->load->view('sidebar');
            $this->load->view('topbar');
            $this->load->view('admin/ubahprofil', $data);
            $this->load->view('footer');
        } else {
            $this->ubahDataProfil();
        }
    }
    public function ubahDataProfil()
    {
        $idUser = $this->input->post('id_user');
        $data = [
            'nama_lengkap' => html_escape($this->input->post('nama_lengkap', true)),
            'email' => html_escape($this->input->post('email', true)),
            'alamat' => html_escape($this->input->post('alamat', true)),
            'nohp' => html_escape($this->input->post('nohp', true)),
        ];

        $this->db->where('id_user', $idUser);
        $this->User_m->update('users', $data);
        $this->session->set_flashdata('pesan8', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Profil Berhasil Diubah.</div>');
        redirect('admin/user');
    }

    public function ubahPassword()
    {
        $data['title'] = 'Ubah Password';
        $data['user'] = $this->User_m->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|max_length[12]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header', $data);
            $this->load->view('sidebar', $data);
            $this->load->view('topbar', $data);
            $this->load->view('admin/ubahpassword', $data);
            $this->load->view('footer');
        } else {
            $this->ubahDataPassword();
        }
    }
    public function ubahDataPassword()
    {
        $idUser = $this->input->post('id_user');
        $data = [
            'password' => html_escape(sha1($this->input->post('password', true))),
        ];
        $this->db->where('id_user', $idUser);
        $this->User_m->update('users', $data);
        $this->session->set_flashdata('pesans', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Password Berhasil Diubah.</div>');
        redirect('dashboard');
    }
}
