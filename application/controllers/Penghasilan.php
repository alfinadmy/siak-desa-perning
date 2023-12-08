<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penghasilan extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') == FALSE) {
            redirect(base_url("login"));
        }
		$this->load->model('m_penduduk');
		$this->load->model('m_penghasilan');
        $this->load->helper('tanggal_helper');
		$this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = "SK Penghasilan - Desa Perning";
		$data['penghasilan'] = $this->m_penghasilan->index();

		$mutasi = $this->load->view('templates/header', $data);
		$this->load->view('penghasilan/index_penghasilan');
		$this->load->view('templates/footer');
    }
    
    public function tambah() {
        $data['title'] = "SK Penghasilan - Desa Perning";
		$data['penduduk'] = $this->m_penduduk->index();
		$data['pejabat'] = $this->m_penghasilan->pejabat();

		$this->load->view('templates/header', $data);
		$this->load->view('penghasilan/tambah_penghasilan', $data);
		$this->load->view('templates/footer');
    }

    public function proses_tambah() {
        $nik = $this->input->post('nik');
        $id_pejabat = $this->input->post('id_pejabat');
        $jumlah_penghasilan = $this->input->post('jumlah_penghasilan');
        $keperluan_penghasilan = $this->input->post('keperluan_penghasilan');
        $tanggal_penghasilan = $this->input->post('tanggal_penghasilan');

        $data = array(
            'nik' => $this->input->post('nik'),
            'id_pejabat' => $this->input->post('pejabat'),
            'jumlah_penghasilan' => $this->input->post('jumlah'),
            'keperluan_penghasilan' => $this->input->post('keperluan'),
            'tanggal_penghasilan' => date('Y-m-d'),
        );
        $this->m_penghasilan->tambah($data);
        $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
        redirect(base_url('penghasilan/'));
    }

    public function edit($id) {
        $data['title'] = "SK Penghasilan - Desa Perning";
		$data['penduduk'] = $this->m_penduduk->index();
		$data['pejabat'] = $this->m_penghasilan->pejabat();
		$data['penghasilan'] = $this->m_penghasilan->edit($id);

		$this->load->view('templates/header', $data);
		$this->load->view('penghasilan/edit_penghasilan', $data);
		$this->load->view('templates/footer');
    }

    public function proses_edit() {
        $nik = $this->input->post('nik');
        $id_pejabat = $this->input->post('id_pejabat');
        $jumlah_penghasilan = $this->input->post('jumlah_penghasilan');
        $keperluan_penghasilan = $this->input->post('keperluan_penghasilan');
        $tanggal_penghasilan = $this->input->post('tanggal_penghasilan');

        $data = array(
            'nik' => $this->input->post('nik'),
            'id_pejabat' => $this->input->post('pejabat'),
            'jumlah_penghasilan' => $this->input->post('jumlah'),
            'keperluan_penghasilan' => $this->input->post('keperluan'),
            'tanggal_penghasilan' => date('Y-m-d'),
        );
        $where = array('id_penghasilan' => $this->input->post('id'));
        $this->m_penghasilan->proses_edit($where, $data);
        $this->session->set_flashdata('sukses', 'Data berhasil diedit.');
        redirect(base_url('penghasilan/'));
    }

    public function cetak($id) {
        $data['title'] = "SK Penghasilan - Desa Perning";
        $data['penghasilan'] = $this->m_penghasilan->cetak($id);
		
        $this->load->view('penghasilan/cetak_penghasilan', $data);
    }

    public function hapus($id) {
        $this->m_penghasilan->hapus($id);
		$this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
		redirect(base_url('penghasilan'));
    }
}