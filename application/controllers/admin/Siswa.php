<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Siswa_m');
		$this->load->model('Wali_m');
		$this->load->model('Auth_m');
	}
	//--Alamat indeks utama--//
	public function index()
	{
		$data['title'] = 'Siswa';
		$data['user'] = $this->Auth_m->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$data['siswa'] = $this->Siswa_m->get('siswa')->result_array();
		$data['kelas'] = $this->Wali_m->get('wali_kelas')->result_array();
		if ($this->input->post('keyword')) {
			$data['siswa'] = $this->Siswa_m->cariDataSiswa();
		}
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('header', $data);
			$this->load->view('sidebar', $data);
			$this->load->view('topbar', $data);
			$this->load->view('admin/siswa/index', $data);
			$this->load->view('footer');
		}
	}

	public function tambah()
	{
		$data['title'] = 'Siswa';
		$data['user'] = $this->Auth_m->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$data['siswa'] = $this->Siswa_m->get('siswa')->result_array();
		$data['kelas'] = $this->Wali_m->get('wali_kelas')->result_array();
		if ($this->input->post('keyword')) {
			$data['siswa'] = $this->Siswa_m->cariDataSiswa();
		}
		$this->form_validation->set_rules('nama', 'Nama Siswa', 'required|trim', ['required' => 'Nama Siswa wajib di isi!.']);
		$this->form_validation->set_rules('kelas', 'Kelas', 'required|trim', ['required' => 'Kelas wajib di isi!.']);
		$this->form_validation->set_rules('nis', 'NIS', 'required|trim', ['required' => 'NIS wajib di isi!.']);
		$this->form_validation->set_rules('tahun_ajaran', 'Tahun Ajaran', 'required|trim', ['required' => 'Tahun Ajaran wajib di isi!.']);
		$this->form_validation->set_rules('biaya', 'Biaya', 'required|trim', ['required' => 'Biaya wajib di isi!.']);
		$this->form_validation->set_rules('alamat', 'alamat', 'required|trim', ['required' => 'Biaya wajib di isi!.']);
		$this->form_validation->set_rules('nohp', 'nohp', 'required|trim', ['required' => 'Biaya wajib di isi!.']);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('header', $data);
			$this->load->view('sidebar', $data);
			$this->load->view('topbar', $data);
			$this->load->view('admin/siswa/tambahsiswa', $data);
			$this->load->view('footer');
		} else {
			$biaya = html_escape($this->input->post('biaya', true));
			$data = [
				'nis' => html_escape($this->input->post('nis', true)),
				'nama_siswa' => html_escape($this->input->post('nama', true)),
				'kelas' => html_escape($this->input->post('kelas', true)),
				'tahun_ajaran' => html_escape($this->input->post('tahun_ajaran', true)),
				'biaya' => $biaya,
				'alamat' => html_escape($this->input->post('alamat', true)),
				'nohp' => html_escape($this->input->post('nohp', true)),
			];

			$AwalJatuhTempo = $this->input->post('jatuh_tempo', true);

			// Tampil bulan berdasarkan bhs indonesia
			$bulanIndo = [
				'01' => 'Januari',
				'02' => 'Februari',
				'03' => 'Maret',
				'04' => 'April',
				'05' => 'Mei',
				'06' => 'Juni',
				'07' => 'Juli',
				'08' => 'Agustus',
				'09' => 'September',
				'10' => 'Oktober',
				'11' => 'November',
				'12' => 'Desember'
			];

			// tambah data siswa
			$tbSiswa = $this->db->insert('siswa', $data);
			// if(!$tbSiswa) {
			// 	$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Data Wali Kelas Berhasil Ditambahkan.</div>');
			// 	redirect('admin/siswa');
			// }

			// Amil data DB siswa berdasarkan id_siswa
			$this->db->limit(1);
			$this->db->order_by('id_siswa', 'desc');
			$siswa = $this->db->get('siswa')->row_array();
			$idSiswa = $siswa['id_siswa'];

			$user = $this->db->get('users')->row_array();
			$iduser = $user['id_user'];

			// tagihan (12 bulan dimulai dari Juli 2017 dan menyimpan tagihan ditabel spp)
			for ($i = 0; $i < 12; $i++) {
				// membuat tgl jatuh tempo nya setiap tanggal 10
				$jatuhTempo = date('Y-m-d', strtotime("+$i month", strtotime($AwalJatuhTempo)));
				$bulan = $bulanIndo[date('m', strtotime($jatuhTempo))] . " " . date('Y', strtotime($jatuhTempo));

				$data = [
					'id_siswa' => $idSiswa,
					'jatuh_tempo' => $jatuhTempo,
					'bulan' => $bulan,
					'jml' => $biaya,
					'id_user' => $iduser,
				];
				$this->Siswa_m->insert('spp', $data);
			}


			// $this->Wali_m->insert('wali_kelas', $data);
			$this->session->set_flashdata('pesans2', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Data Siswa Berhasil Ditambahkan.</div>');
			redirect('admin/siswa');
		}
	}

	public function lihat($id)
	{
		$data['judul'] = "Detail Siswa";
		$data['user'] = $this->Auth_m->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$data['siswa'] = $this->Siswa_m->getSiswaById($id);
		$this->load->view('header', $data);
		$this->load->view('sidebar');
		$this->load->view('topbar', $data);
		$this->load->view('admin/siswa/lihat', $data);
		$this->load->view('footer');
	}

	public function ubahSiswa($id)
	{
		$data['user'] = $this->Auth_m->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$where = ['id_siswa' => $id];
		$data['siswa'] = $this->Siswa_m->get_where('siswa', $where)->row_array();
		$data['kelas'] = $this->Wali_m->get('wali_kelas')->result_array();
		$data['title'] = 'Ubah Data Siswa ' . $data['siswa']['nama_siswa'];

		// Rules Form
		$this->form_validation->set_rules('nama', 'Nama Siswa', 'required|trim', ['required' => 'Nama Siswa wajib di isi!.']);
		$this->form_validation->set_rules('kelas', 'Kelas', 'required|trim', ['required' => 'Kelas wajib di isi!.']);
		$this->form_validation->set_rules('nis', 'NIS', 'required|trim', ['required' => 'NIS wajib di isi!.']);
		$this->form_validation->set_rules('tahun_ajaran', 'Tahun Ajaran', 'required|trim', ['required' => 'Tahun Ajaran wajib di isi!.']);
		$this->form_validation->set_rules('biaya', 'Biaya', 'required|trim', ['required' => 'Biaya wajib di isi!.']);
		$this->form_validation->set_rules('nohp', 'nohp', 'required|trim', ['required' => 'nohp wajib di isi!.']);
		$this->form_validation->set_rules('alamat', 'alamat', 'required|trim', ['required' => 'alamat wajib di isi!.']);
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('header', $data);
			$this->load->view('sidebar', $data);
			$this->load->view('topbar');
			$this->load->view('admin/siswa/ubah', $data);
			$this->load->view('footer');
		} else {
			$this->ubahDataSiswa();
		}
	}

	public function ubahDataSiswa()
	{
		$idSiswa = $this->input->post('id_siswa');
		$data = [
			'nis' => html_escape($this->input->post('nis', true)),
			'nama_siswa' => html_escape($this->input->post('nama', true)),
			'kelas' => html_escape($this->input->post('kelas', true)),
			'tahun_ajaran' => html_escape($this->input->post('tahun_ajaran', true)),
			'biaya' => html_escape($this->input->post('biaya', true)),
			'nohp' => html_escape($this->input->post('nohp', true)),
			'alamat' => html_escape($this->input->post('alamat', true))
		];
		$this->db->where('id_siswa', $idSiswa);
		$this->Siswa_m->update('siswa', $data);
		$this->session->set_flashdata('pesans2', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> Data Siswa Berhasil Diubah.</div>');
		redirect('admin/siswa');
	}

	public function hapus($id)
	{
		$this->db->delete('siswa', ['id_siswa' => $id]);
		$this->session->set_flashdata('pesans2', '<div class="alert alert-success" role="alert"><i class="fas fa-trash"></i> Data Siswa Berhasil Dihapus.</div>');
		redirect('admin/siswa');
	}
}
