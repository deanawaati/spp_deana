<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_m extends CI_Model {
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

	public function update_where($table, $data, $where)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function getGuruId($idGuru)
	{
		return $this->db->get_where('guru', $idGuru)->row_array();
	}

	public function get_join($mulaiTgl, $sampaiTgl)
	{
		$query = "SELECT spp.*, siswa.nis, siswa.nama_siswa, siswa.kelas FROM spp INNER JOIN siswa ON siswa.id_siswa = spp.id_siswa WHERE tgl_bayar BETWEEN '$mulaiTgl' AND '$sampaiTgl' ORDER BY tgl_bayar ASC";
		return $this->db->query($query);
	}

	public function get_join_where($table, $where)
	{
		// $query = "SELECT spp.*, siswa.nis, siswa.nama_siswa, siswa.kelas FROM spp INNER JOIN siswa ON siswa.id_siswa = spp.id_siswa WHERE id_spp = '$' ORDER BY tgl_bayar ASC";
		// return $this->db->query($query);
		$this->db->join('siswa', 'siswa.id_siswa = spp.id_siswa');
		return $this->db->get_where($table, $where);
	}

}