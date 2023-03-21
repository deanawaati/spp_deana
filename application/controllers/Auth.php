<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_m');
        $this->load->model('User_m');
    }

    public function index()
    {

        $data['title'] = 'Halaman Login';
        $this->form_validation->set_rules('email', 'email', 'required|trim', ['required' => 'email wajib di isi!.']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => 'Password wajib di isi!.']);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);

        $user = $this->Auth_m->get_where('users', ['email' => $email])->row_array();
        if ($user != null) {
            if (sha1($password) == $user['password']) {
                $data = [
                    'email' => $user['email'],
                ];
                $this->session->set_userdata($data);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password Salah!.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akun Belum Terdaftar!.</div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        $data['judul'] = 'Registrasi';
        $this->form_validation->set_rules('nama_lengkap', 'Nama_lengkap', 'required|trim');
        $this->form_validation->set_rules('email', 'email', 'required|trim', ['required' => 'email wajib di isi!.']);
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim');
        $this->form_validation->set_rules('nohp', 'nohp', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|max_length[12]');
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/registrasi');
        } else {
            $data = [
                'nama_lengkap' => html_escape($this->input->post('nama_lengkap', true)),
                'email' => html_escape($this->input->post('email', true)),
                'alamat' => html_escape($this->input->post('alamat', true)),
                'nohp' => html_escape($this->input->post('nohp', true)),
                'password' => html_escape(sha1($this->input->post('password', true))),
                'image' => html_escape($this->input->post('image', true)),
            ];
            $this->db->insert('users', $data);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil Register silahkan login.</div>');
            redirect('auth');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-white" role="alert">Anda Telah Logout.</div>');
        redirect('auth');
    }
}
