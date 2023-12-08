<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Domisili extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') == FALSE) {
            redirect(base_url("login"));
        }
		$this->load->model('m_penduduk');
		$this->load->model('m_domisili');
        $this->load->helper('tanggal_helper');
		$this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = "SK Domisili - Desa Perning";
		$data['domisili'] = $this->m_domisili->index();

		$mutasi = $this->load->view('templates/header', $data);
		$this->load->view('domisili/index_domisili');
		$this->load->view('templates/footer');
    }
    
    public function tambah() {
        $data['title'] = "SK Domisili - Desa Perning";
		$data['penduduk'] = $this->m_penduduk->index();
		$data['pejabat'] = $this->m_domisili->pejabat();

		$this->load->view('templates/header', $data);
		$this->load->view('domisili/tambah_domisili', $data);
		$this->load->view('templates/footer');
    }

    public function proses_tambah() {
        $nik = $this->input->post('nik');
        $id_pejabat = $this->input->post('id_pejabat');
        $no_surat_rt = $this->input->post('no_surat_rt');
        $tanggal_domisili = $this->input->post('tanggal_domisili');

        $data = array(
            'nik' => $this->input->post('nik'),
            'id_pejabat' => $this->input->post('pejabat'),
            'no_surat_rt' => $this->input->post('pengantar'),
            'tanggal_domisili' => date('Y-m-d'),
        );
        $this->m_domisili->tambah($data);
        $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
        redirect(base_url('domisili/'));
    }

    public function edit($id) {
        $data['title'] = "SK Domisili - Desa Perning";
		$data['penduduk'] = $this->m_penduduk->index();
		$data['pejabat'] = $this->m_domisili->pejabat();
		$data['domisili'] = $this->m_domisili->edit($id);

		$this->load->view('templates/header', $data);
		$this->load->view('domisili/edit_domisili', $data);
		$this->load->view('templates/footer');
    }

    public function proses_edit() {
        $nik = $this->input->post('nik');
        $id_pejabat = $this->input->post('id_pejabat');
        $no_surat_rt = $this->input->post('no_surat_rt');

        $data = array(
            'nik' => $this->input->post('nik'),
            'id_pejabat' => $this->input->post('pejabat'),
            'no_surat_rt' => $this->input->post('pengantar'),
        );
        $where = array('id_domisili' => $this->input->post('id'));
        $this->m_domisili->proses_edit($where, $data);
        $this->session->set_flashdata('sukses', 'Data berhasil diedit.');
        redirect(base_url('domisili/'));
    }

    public function cetak($id) {
        $data['title'] = "SK Domisili - Desa Perning";
        $data['domisili'] = $this->m_domisili->cetak($id);
		
        $this->load->view('domisili/cetak_domisili', $data);
    }

    public function hapus($id) {
        $this->m_domisili->hapus($id);
		$this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
		redirect(base_url('domisili'));
    }
}