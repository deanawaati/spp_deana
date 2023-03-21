<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru_m extends CI_Model
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

	public function update($table, $data)
	{
		$this->db->update($table, $data);
	}

	public function getGuruId($idGuru)
	{
		return $this->db->get_where('guru', $idGuru)->row_array();
	}
	public function cariDataGuru()
	{
		$keyword = $this->input->post('keyword', true);
		$this->db->or_like('nama_guru', $keyword);
		return $this->db->get('guru')->result_array();
	}
}
