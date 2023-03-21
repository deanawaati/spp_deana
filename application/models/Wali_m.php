<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wali_m extends CI_Model
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

	public function get_join($table1, $table2)
	{
		$this->db->join("$table1", "$table1.id_guru = $table2.id_guru");
		return $this->db->get("$table2");
	}
}
