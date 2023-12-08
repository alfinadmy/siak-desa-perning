<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usaha extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') == FALSE) {
            redirect(base_url("login"));
        }
		$this->load->model('m_penduduk');
		$this->load->model('m_usaha');
        $this->load->helper('tanggal_helper');
		$this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = "SK Usaha - Desa Perning";
		$data['usaha'] = $this->m_usaha->index();

		$mutasi = $this->load->view('templates/header', $data);
		$this->load->view('usaha/index_usaha');
		$this->load->view('templates/footer');
    }
    
    public function tambah() {
        $data['title'] = "SK Usaha - Desa Perning";
		$data['penduduk'] = $this->m_penduduk->index();
		$data['pejabat'] = $this->m_usaha->pejabat();

		$this->load->view('templates/header', $data);
		$this->load->view('usaha/tambah_usaha', $data);
		$this->load->view('templates/footer');
    }

    public function proses_tambah() {
        $nik = $this->input->post('nik');
        $id_pejabat = $this->input->post('id_pejabat');
        $nama_usaha = $this->input->post('nama_usaha');
        $sejak_usaha = $this->input->post('sejak_usaha');
        $tanggal_usaha = $this->input->post('tanggal_usaha');

        $data = array(
            'nik' => $this->input->post('nik'),
            'id_pejabat' => $this->input->post('pejabat'),
            'nama_usaha' => $this->input->post('nama_usaha'),
			'sejak_usaha' => $this->input->post('sejak_usaha'),
			'tanggal_usaha' => date('Y-m-d'),
        );
        $this->m_usaha->tambah($data);
        $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
        redirect(base_url('usaha/'));
    }

    public function edit($id) {
        $data['title'] = "SK Usaha - Desa Perning";
		$data['penduduk'] = $this->m_penduduk->index();
		$data['pejabat'] = $this->m_usaha->pejabat();
		$data['usaha'] = $this->m_usaha->edit($id);

		$this->load->view('templates/header', $data);
		$this->load->view('usaha/edit_usaha', $data);
		$this->load->view('templates/footer');
    }

    public function proses_edit() {
        $nik = $this->input->post('nik');
        $id_pejabat = $this->input->post('id_pejabat');
        $nama_usaha = $this->input->post('nama_usaha');
        $sejak_usaha = $this->input->post('sejak_usaha');

        $data = array(
            'nik' => $this->input->post('nik'),
            'id_pejabat' => $this->input->post('pejabat'),
            'nama_usaha' => $this->input->post('nama_usaha'),
            'sejak_usaha' => $this->input->post('sejak_usaha'),
        );
        $where = array('id_usaha' => $this->input->post('id'));
        $this->m_usaha->proses_edit($where, $data);
        $this->session->set_flashdata('sukses', 'Data berhasil diedit.');
        redirect(base_url('usaha/'));
    }

    public function cetak($id) {
        $data['title'] = "SK Usaha - Desa Perning";
        $data['usaha'] = $this->m_usaha->cetak($id);
		
        $this->load->view('usaha/cetak_usaha', $data);
    }

    public function hapus($id) {
        $this->m_usaha->hapus($id);
		$this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
		redirect(base_url('usaha'));
    }
}