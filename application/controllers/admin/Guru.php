<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Guru_m');
		$this->load->model('Auth_m');
	}

	public function index()
	{
		$data['title'] = 'Data Guru';
		$data['user'] = $this->Auth_m->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$data['guru'] = $this->Guru_m->get('guru')->result_array();
		if ($this->input->post('keyword')) {
			$data['guru'] = $this->Guru_m->cariDataGuru();
		}
		$this->form_validation->set_rules('nama', 'Nama Guru', 'required|trim', ['required' => 'Nama guru wajib di isi!.']);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('header', $data);
			$this->load->view('sidebar', $data);
			$this->load->view('topbar', $data);
			$this->load->view('admin/guru/index', $data);
			$this->load->view('footer');
		}
	}

	public function tambah()
	{
		$data['title'] = 'Data Guru';
		$data['user'] = $this->Auth_m->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$data['guru'] = $this->Guru_m->get('guru')->result_array();
		$this->form_validation->set_rules('nama', 'Nama Guru', 'required|trim', ['required' => 'Nama guru wajib di isi!.']);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('header', $data);
			$this->load->view('sidebar', $data);
			$this->load->view('topbar', $data);
			$this->load->view('admin/guru/tambahguru', $data);
			$this->load->view('footer');
		} else {
			$data = [
				'nama_guru' => html_escape($this->input->post('nama', true))
			];
			$this->Guru_m->insert('guru', $data);
			$this->session->set_flashdata('pesans1', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Data Guru Berhasil Ditambahkan.</div>');
			redirect('admin/guru');
		}
	}

	public function getguruid()
	{
		// $where = ['id_guru' => $_POST['id']];
		echo json_encode($this->Guru_m->getGuruId($_POST['id']));
	}

	public function ubahGuru($id)
	{
		$data['user'] = $this->Auth_m->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$where = ['id_guru' => $id];
		$data['guru'] = $this->Guru_m->get_where('guru', $where)->row_array();
		$data['title'] = 'Ubah Data Guru ' . $data['guru']['nama_guru'];
		$this->form_validation->set_rules('nama', 'Nama Guru', 'required|trim', ['required' => 'Nama guru wajib di isi!.']);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('header', $data);
			$this->load->view('sidebar', $data);
			$this->load->view('topbar', $data);
			$this->load->view('admin/guru/ubah', $data);
			$this->load->view('footer');
		} else {
			$this->ubahDataGuru();
		}
	}

	public function ubahDataGuru()
	{
		$idGuru = $this->input->post('id_guru');
		$data = [
			'nama_guru' => html_escape($this->input->post('nama', true))
		];
		$this->db->where('id_guru', $idGuru);
		$this->Guru_m->update('guru', $data);
		$this->session->set_flashdata('pesans1', '<div class="alert alert-success alert-message" role="alert"><i class="fas fa-info-circle"></i> Data Guru Berhasil Diubah.</div>');
		redirect('admin/guru');
	}

	public function hapus($id)
	{
		$this->db->delete('guru', ['id_guru' => $id]);
		$this->session->set_flashdata('pesans1', '<div class="alert alert-danger" role="alert"><i class="fas fa-trash"></i> Data Guru Berhasil Dihapus.</div>');
		redirect('admin/guru');
	}
}
