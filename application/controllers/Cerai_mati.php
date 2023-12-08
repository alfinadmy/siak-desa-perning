<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cerai_mati extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') == FALSE) {
            redirect(base_url("login"));
        }
		$this->load->model('m_penduduk');
		$this->load->model('m_cerai_mati');
        $this->load->helper('tanggal_helper');
		$this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = "SK Cerai Mati - Desa Perning";
		$data['cerai_mati'] = $this->m_cerai_mati->index();

		$mutasi = $this->load->view('templates/header', $data);
		$this->load->view('cerai_mati/index_cerai_mati');
		$this->load->view('templates/footer');
    }
    
    public function tambah() {
        $data['title'] = "SK Cerai Mati - Desa Perning";
		$data['penduduk'] = $this->m_penduduk->index();
		$data['pejabat'] = $this->m_cerai_mati->pejabat();

		$this->load->view('templates/header', $data);
		$this->load->view('cerai_mati/tambah_cerai_mati', $data);
		$this->load->view('templates/footer');
    }

    public function proses_tambah() {
        $nik = $this->input->post('nik');
        $id_pejabat = $this->input->post('id_pejabat');
        $no_surat_rt = $this->input->post('no_surat_rt');
        $tanggal_cerai_mati = $this->input->post('tanggal_cerai_mati');

        $data = array(
            'nik' => $this->input->post('nik'),
            'id_pejabat' => $this->input->post('pejabat'),
            'tanggal_cerai_mati' => date('Y-m-d'),
        );
        $this->m_cerai_mati->tambah($data);
        $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
        redirect(base_url('cerai_mati/'));
    }

    public function edit($id) {
        $data['title'] = "SK Cerai Mati - Desa Perning";
		$data['penduduk'] = $this->m_penduduk->index();
		$data['pejabat'] = $this->m_cerai_mati->pejabat();
		$data['cerai_mati'] = $this->m_cerai_mati->edit($id);

		$this->load->view('templates/header', $data);
		$this->load->view('cerai_mati/edit_cerai_mati', $data);
		$this->load->view('templates/footer');
    }

    public function proses_edit() {
        $nik = $this->input->post('nik');
        $id_pejabat = $this->input->post('id_pejabat');
        $no_surat_rt = $this->input->post('no_surat_rt');

        $data = array(
            'nik' => $this->input->post('nik'),
            'id_pejabat' => $this->input->post('pejabat'),
        );
        $where = array('id_cerai_mati' => $this->input->post('id'));
        $this->m_cerai_mati->proses_edit($where, $data);
        $this->session->set_flashdata('sukses', 'Data berhasil diedit.');
        redirect(base_url('cerai_mati/'));
    }

    public function cetak($id) {
        $data['title'] = "SK Cerai Mati - Desa Perning";
        $data['cerai_mati'] = $this->m_cerai_mati->cetak($id);
		
        $this->load->view('cerai_mati/cetak_cerai_mati', $data);
    }

    public function hapus($id) {
        $this->m_cerai_mati->hapus($id);
		$this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
		redirect(base_url('cerai_mati'));
    }
}