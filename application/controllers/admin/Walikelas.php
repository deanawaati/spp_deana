<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Walikelas extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Wali_m');
		$this->load->model('Auth_m');
	}

	public function index()
	{
		$data['title'] = 'Wali Kelas';
		$data['user'] = $this->Auth_m->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$data['guruWali'] = $this->Wali_m->get_join('guru', 'wali_kelas')->result_array();
		$data['guru'] = $this->Wali_m->get('guru')->result_array();
		$this->form_validation->set_rules('nama', 'Nama Wali Kelas', 'required|trim', ['required' => 'Nama Wali Kelas wajib di isi!.']);
		$this->form_validation->set_rules('kelas', 'Kelas', 'required|trim', ['required' => 'Kelas wajib di isi!.']);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('header', $data);
			$this->load->view('sidebar', $data);
			$this->load->view('topbar', $data);
			$this->load->view('admin/wali_kelas/index', $data);
			$this->load->view('footer');
		}
	}

	public function tambah()
	{
		$data['title'] = 'Wali Kelas';
		$data['user'] = $this->Auth_m->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$data['guruWali'] = $this->Wali_m->get_join('guru', 'wali_kelas')->result_array();
		$data['guru'] = $this->Wali_m->get('guru')->result_array();
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('header', $data);
			$this->load->view('sidebar', $data);
			$this->load->view('topbar', $data);
			$this->load->view('admin/wali_kelas/tambahwalikelas', $data);
			$this->load->view('footer');
		} else {
			$data = [
				'kelas' => html_escape($this->input->post('kelas', true)),
				'id_guru' => html_escape($this->input->post('nama', true))
			];
			$this->Wali_m->insert('wali_kelas', $data);
			$this->session->set_flashdata('pesans4', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Data Wali Kelas Berhasil Ditambahkan.</div>');
			redirect('admin/walikelas');
		}
	}

	public function ubahWali($kelas)
	{
		$data['user'] = $this->Auth_m->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$where = ['kelas' => $kelas];
		$data['guruWali'] = $this->Wali_m->get_where('wali_kelas', $where)->row_array();
		$data['guruWali'] = $this->Wali_m->get_join('guru', 'wali_kelas')->result_array();
		$data['guru'] = $this->Wali_m->get('guru')->result_array();
		$data['title'] = 'Ubah Data Wali Kelas ';
		$this->form_validation->set_rules('nama', 'Nama Guru', 'required|trim', ['required' => 'Nama guru wajib di isi!.']);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('header', $data);
			$this->load->view('sidebar', $data);
			$this->load->view('topbar', $data);
			$this->load->view('admin/wali_kelas/ubah', $data);
			$this->load->view('footer');
		} else {
			$this->ubahDataWali();
		}
	}

	public function ubahDataWali()
	{
		$kelas = $this->input->post('kelas');
		$data = [
			'id_guru' => html_escape($this->input->post('nama', true))
		];
		$this->db->where('kelas', $kelas);
		$this->Wali_m->update('wali_kelas', $data);
		$this->session->set_flashdata('pesans4', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Data Wali Kelas Berhasil Diubah.</div>');
		redirect('admin/walikelas');
	}

	public function hapus($kelas)
	{
		$this->db->delete('wali_kelas', ['kelas' => $kelas]);
		$this->session->set_flashdata('pesans4', '<div class="alert alert-success" role="alert"><i class="fas fa-trash"></i> Data Wali Kelas Berhasil Dihapus.</div>');
		redirect('admin/walikelas');
	}
}
