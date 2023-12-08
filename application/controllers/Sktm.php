<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sktm extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') == FALSE) {
            redirect(base_url("login"));
        }
		$this->load->model('m_penduduk');
		$this->load->model('m_sktm');
        $this->load->helper('tanggal_helper');
		$this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = "SKTM - Desa Perning";
		$data['sktm'] = $this->m_sktm->index();

		$mutasi = $this->load->view('templates/header', $data);
		$this->load->view('sktm/index_sktm');
    	$this->load->view('templates/footer');
    }
    
    public function tambah() {
        $data['title'] = "SKTM - Desa Perning";
		$data['penduduk'] = $this->m_penduduk->index();
		$data['pendudukk'] = $this->m_penduduk->index();
		$data['pejabat'] = $this->m_sktm->pejabat();

		$this->load->view('templates/header', $data);
		$this->load->view('sktm/tambah_sktm', $data);
		$this->load->view('templates/footer');
    }

    public function proses_tambah() {
        $nik = $this->input->post('nik');
        $id_pejabat = $this->input->post('id_pejabat');
        $keterangan = $this->input->post('keterangan');
        $tanggal_sktm = $this->input->post('tanggal_sktm');

        $data = array(
            'nik' => $this->input->post('nik'),
            'id_pejabat' => $this->input->post('pejabat'),
            'keterangan' => $this->input->post('keterangan'),
            'tanggal_sktm' => date('Y-m-d'),
        );
        $this->m_sktm->tambah($data);
        $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
        redirect(base_url('sktm/'));
    }

    public function edit($id) {
        $data['title'] = "SKTM - Desa Perning";
		$data['penduduk'] = $this->m_penduduk->index();
		$data['pendudukk'] = $this->m_penduduk->index();
		$data['pejabat'] = $this->m_sktm->pejabat();
		$data['sktm'] = $this->m_sktm->edit($id);

		$this->load->view('templates/header', $data);
		$this->load->view('sktm/edit_sktm', $data);
		$this->load->view('templates/footer');
    }

    public function proses_edit() {
        $nik = $this->input->post('nik');
        $id_pejabat = $this->input->post('id_pejabat');
        $keterangan = $this->input->post('keterangan');

        $data = array(
            'nik' => $this->input->post('nik'),
            'keterangan' => $this->input->post('keterangan'),
            'id_pejabat' => $this->input->post('pejabat'),
        );
        $where = array('id_sktm' => $this->input->post('id'));
        $this->m_sktm->proses_edit($where, $data);
        $this->session->set_flashdata('sukses', 'Data berhasil diedit.');
        redirect(base_url('sktm/'));
    }

    public function cetak($id) {
        $data['title'] = "SKTM - Desa Perning";
        $data['sktm'] = $this->m_sktm->cetak($id);

		$this->load->view('sktm/cetak_sktm', $data);
    }

    public function hapus($id) {
        $this->m_sktm->hapus($id);
		$this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
		redirect(base_url('sktm'));
    }
}