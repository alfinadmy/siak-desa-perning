<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pemasangan_listrik extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') == FALSE) {
            redirect(base_url("login"));
        }
		$this->load->model('m_penduduk');
		$this->load->model('m_pemasangan_listrik');
        $this->load->helper('tanggal_helper');
		$this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = "pemasangan_listrik - Desa Perning";
		$data['pemasangan_listrik'] = $this->m_pemasangan_listrik->index();

		$mutasi = $this->load->view('templates/header', $data);
		$this->load->view('pemasangan_listrik/index_listrik');
    	$this->load->view('templates/footer');
    }
    
    public function tambah() {
        $data['title'] = "pemasangan_listrik - Desa Perning";
		$data['penduduk'] = $this->m_penduduk->index();
		$data['pendudukk'] = $this->m_penduduk->index();
		$data['pejabat'] = $this->m_pemasangan_listrik->pejabat();

		$this->load->view('templates/header', $data);
		$this->load->view('pemasangan_listrik/tambah_listrik', $data);
		$this->load->view('templates/footer');
    }

    public function proses_tambah() {
        $id_pejabat = $this->input->post('id_pejabat');
        $nik = $this->input->post('nik');
        $daya = $this->input->post('daya');
        $tanggal_pemasangan_listrik = $this->input->post('tanggal_pemasangan_listrik');

        $data = array(
            'id_pejabat' => $this->input->post('pejabat'),
            'nik' => $this->input->post('nik'),
            'daya' => $this->input->post('daya'),
            'tanggal_pemasangan_listrik' => date('Y-m-d'),
        );
        $this->m_pemasangan_listrik->tambah($data);
        $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
        redirect(base_url('pemasangan_listrik/'));
    }

    public function edit($id) {
        $data['title'] = "pemasangan_listrik - Desa Perning";
		$data['penduduk'] = $this->m_penduduk->index();
		$data['pendudukk'] = $this->m_penduduk->index();
		$data['pejabat'] = $this->m_pemasangan_listrik->pejabat();
		$data['pemasangan_listrik'] = $this->m_pemasangan_listrik->edit($id);

		$this->load->view('templates/header', $data);
		$this->load->view('pemasangan_listrik/edit_listrik', $data);
		$this->load->view('templates/footer');
    }

    public function proses_edit() {
        $id_pejabat = $this->input->post('id_pejabat');
        $nik = $this->input->post('nik');
        $daya = $this->input->post('daya');

        $data = array(
            'id_pejabat' => $this->input->post('pejabat'),
            'nik' => $this->input->post('nik'),
            'daya' => $this->input->post('daya'),
        );
        $where = array('id_pemasangan_listrik' => $this->input->post('id'));
        $this->m_pemasangan_listrik->proses_edit($where, $data);
        $this->session->set_flashdata('sukses', 'Data berhasil diedit.');
        redirect(base_url('pemasangan_listrik/'));
    }

    public function cetak($id) {
        $data['title'] = "pemasangan_listrik - Desa Perning";
        $data['pemasangan_listrik'] = $this->m_pemasangan_listrik->cetak($id);

		$this->load->view('pemasangan_listrik/cetak_listrik', $data);
    }

    public function hapus($id) {
        $this->m_pemasangan_listrik->hapus($id);
		$this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
		redirect(base_url('pemasangan_listrik'));
    }
}