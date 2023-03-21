<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{
    public function get_where($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function get($table)
    {
        return $this->db->get($table);
    }
    public function simpanData($data = null)
    {
        $this->db->insert('users', $data);
    }
    public function cekData()
    {
        return $this->db->get_where('users');
    }
    public function insert($table, $data)
    {
        $this->db->insert($table, $data);
    }
    public function getUserById($id)
    {
        return $this->db->get_where('users', ['id_user' => $id])->row_array();
    }

    public function update($table, $data)
    {
        $this->db->update($table, $data);
    }

    public function getGuruId($idGuru)
    {
        return $this->db->get_where('guru', $idGuru)->row_array();
    }
    public function cariDataUser()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->or_like('nama_lengkap', $keyword);
        $this->db->or_like('email', $keyword);
        $this->db->or_like('alamat', $keyword);
        return $this->db->get('users')->result_array();
    }
}
