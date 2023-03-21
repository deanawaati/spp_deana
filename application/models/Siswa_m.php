<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_m extends CI_Model
{
	public function get_where($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	public function get($table)
	{
		return $this->db->get($table);
	}

	public function insert($table, $data)
	{
		$this->db->insert($table, $data);
	}
	public function getSiswaById($id)
	{
		return $this->db->get_where('siswa', ['id_siswa' => $id])->row_array();
	}

	public function update($table, $data)
	{
		$this->db->update($table, $data);
	}

	public function getGuruId($idGuru)
	{
		return $this->db->get_where('guru', $idGuru)->row_array();
	}

	public function cariDataSiswa()
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->or_like('nama_siswa', $keyword);
		$this->db->or_like('nis', $keyword);
		return $this->db->get('siswa')->result_array();
	}
}
