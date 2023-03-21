<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_m extends CI_Model
{
    public function get_where($table, $where)
    {
        return $this->db->get_where($table, $where);
    }
    public function countTotalSiswa()
    {
        $sql = "SELECT * FROM siswa";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
    public function countTotalUser()
    {
        $sql = "SELECT * FROM users";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
    public function countTotalGuru()
    {
        $sql = "SELECT * FROM guru";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
    public function countTotalWali()
    {
        $sql = "SELECT * FROM wali_kelas";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
}
