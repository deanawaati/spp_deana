<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_m');
        $this->load->model('Transaksi_m');
    }

    public function index()
    {
        $data['title'] = 'Transaksi';
        $data['user'] = $this->Auth_m->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nis', 'NIS', 'required|trim', ['required' => 'NIS wajib di isi!.']);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('header', $data);
            $this->load->view('sidebar', $data);
            $this->load->view('topbar', $data);
            $this->load->view('admin/transaksi/index', $data);
            $this->load->view('footer');
        } else {
            $this->cariTransaksi();
        }
    }

    public function cariTransaksi()
    {
        $data['title'] = 'Transaksi';
        $data['user'] = $this->Auth_m->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $nis = $this->input->post('nis', true);
        $where = ['nis' => $nis];
        $data['siswa'] = $this->Transaksi_m->get_where('siswa', $where)->row_array();
        $idSiswa = $data['siswa']['id_siswa'];

        if ($data['siswa'] == null) {
            $this->session->set_flashdata('pesans3', '<div class="alert alert-danger" role="alert"><i class="fas fa-info-circle"></i> NIS Siswa <strong>' . $nis . '</strong> Tidak Terdaftar.</div>');
            redirect('admin/transaksi');
        }

        $where = ['id_siswa' => $idSiswa];
        $data['spp'] = $this->Transaksi_m->get_where('spp', $where)->result_array();
        $this->load->view('header', $data);
        $this->load->view('sidebar', $data);
        $this->load->view('topbar', $data);
        $this->load->view('admin/transaksi/index', $data);
        $this->load->view('footer');
    }

    public function bayar($nis, $id)
    {
        $hariIini = date('Y-m-d');
        $today = date('ymd');

        // membuat no bayar acak
        $today = date('ymd');
        $query = "SELECT max(no_bayar) AS last FROM spp WHERE no_bayar LIKE '$today%'";
        $data = $this->db->query($query)->result_array();
        $lastNoBayar = $data['last'];
        $lastNoUrut = substr($lastNoBayar, 6, 4);
        $nextNoUrut = $lastNoUrut;
        $nextNoBayar = $today . sprintf('%04s', $nextNoUrut);

        $where = ['id_spp' => $id];
        $data = [
            'no_bayar' => $nextNoBayar,
            'tgl_bayar' => $hariIini,
            'ket' => 'Lunas'
        ];
        $this->Transaksi_m->update_where('spp', $data, $where);
        $this->session->set_flashdata('pesans3', '<div class="alert alert-success" role="alert"><i class="fas fa-info-circle"></i> NIS <strong>' . $nis . '</strong> Berhasil Di Bayar.</div>');
        redirect('admin/transaksi');
    }
    public function batal($nis, $idSpp)
    {
        $where = ['id_spp' => $idSpp];
        $data = [
            'no_bayar' => null,
            'tgl_bayar' => null,
            'ket' => 'Belum Lunas'
        ];
        $this->Transaksi_m->update_where('spp', $data, $where);
        $this->session->set_flashdata('pesans3', '<div class="alert alert-danger" role="alert"><i class="fas fa-info-circle"></i>PEMBAYARAN dengan NIS <strong>' . $nis . '</strong> SPP Berhasil dibatalkan.</div>');
        redirect('admin/transaksi');
    }

    public function cetak($nis, $idSpp)
    {
        $where = ['nis' => $nis];
        $data['siswa'] = $this->Transaksi_m->get_where('siswa', $where)->row_array();
        $data['title'] = 'Laporan ' . $data['siswa']['nama_siswa'];
        $where = ['id_spp' => $idSpp];
        $data['bayar'] = $this->Transaksi_m->get_join_where('spp', $where)->result_array();
        $this->load->view('header', $data);
        $this->load->view('admin/laporan/laporan_pembayaran_cetak', $data);
        $this->load->view('footer');
    }
}
