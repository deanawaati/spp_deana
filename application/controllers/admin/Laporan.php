<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_m');
		$this->load->model('Transaksi_m');
	}

	public function index()
	{
		$data['user'] = $this->Auth_m->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = 'Laporan';
		$this->load->view('header', $data);
		$this->load->view('sidebar', $data);
		$this->load->view('topbar', $data);
		$this->load->view('admin/laporan/index', $data);
		$this->load->view('footer');
	}

	public function guru()
	{
		$data['title'] = 'Laporan Guru';
		$data['guru'] = $this->db->get('guru')->result_array();
		$this->load->view('header', $data);
		$this->load->view('admin/laporan/laporan_guru', $data);
		$this->load->view('footer');
	}

	public function siswa()
	{
		$data['title'] = 'Laporan Siswa';
		$data['siswa'] = $this->db->get('siswa')->result_array();
		$this->load->view('header', $data);
		$this->load->view('admin/laporan/laporan_siswa', $data);
		$this->load->view('footer');
	}

	public function pembayaran()
	{
		$mulaiTgl = $this->input->post('mulai_tgl');
		$sampaiTgl = $this->input->post('sampai_tgl');
		$data = [
			'mulaiTgl' => $mulaiTgl,
			'sampaiTgl' => $sampaiTgl
		];
		$data['title'] = 'Laporan Pembayaran';
		$data['bayar'] = $this->Transaksi_m->get_join($mulaiTgl, $sampaiTgl)->result_array();
		$this->load->view('header', $data);
		$this->load->view('admin/laporan/laporan_pembayaran', $data);
		$this->load->view('footer');
	}

	public function pembayaranExcel($mulaiTgl, $sampaiTgl)
	{
		$data = [
			'mulaiTgl' => $mulaiTgl,
			'sampaiTgl' => $sampaiTgl
		];
		$data['title'] = 'Laporan Excel Pembayaran';
		$data['bayar'] = $this->Transaksi_m->get_join($mulaiTgl, $sampaiTgl)->result_array();
		$this->load->view('header', $data);
		$this->load->view('admin/laporan/laporan_pembayaran_excel', $data);
		$this->load->view('footer');
	}

	public function tunggakan()
	{
		$data['title'] = 'Laporan Tunggakan Pemabayaran';
		$where = [
			'ket' => ''
		];
		$data['tunggakan'] = $this->Transaksi_m->get_join_where('spp', $where)->result_array();
		$this->load->view('header', $data);
		$this->load->view('admin/laporan/laporan_tunggakan', $data);
		$this->load->view('footer');
	}
}
