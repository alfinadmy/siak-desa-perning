<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menikah extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') == FALSE) {
            redirect(base_url("login"));
        }
		$this->load->model('m_penduduk');
		$this->load->model('m_menikah');
        $this->load->helper('tanggal_helper');
		$this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = "SK Menikah - Desa Perning";
		$data['menikah'] = $this->m_menikah->index();

		$mutasi = $this->load->view('templates/header', $data);
		$this->load->view('menikah/index_menikah');
		$this->load->view('templates/footer');
    }
    
    public function tambah() {
        $data['title'] = "SK Menikah - Desa Perning";
		$data['penduduk'] = $this->m_penduduk->index();
		$data['pejabat'] = $this->m_menikah->pejabat();

		$this->load->view('templates/header', $data);
		$this->load->view('menikah/tambah_menikah', $data);
		$this->load->view('templates/footer');
    }

    public function proses_tambah() {
        $nik = $this->input->post('nik');
        $id_pejabat = $this->input->post('id_pejabat');
        $tanggal_menikah = $this->input->post('tanggal_menikah');

        $data = array(
            'nik' => $this->input->post('nik'),
            'id_pejabat' => $this->input->post('pejabat'),
            'tanggal_menikah' => date('Y-m-d'),
        );
        $this->m_menikah->tambah($data);
        $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
        redirect(base_url('menikah/'));
    }

    public function edit($id) {
        $data['title'] = "SK Menikah - Desa Perning";
		$data['penduduk'] = $this->m_penduduk->index();
		$data['pejabat'] = $this->m_menikah->pejabat();
		$data['menikah'] = $this->m_menikah->edit($id);

		$this->load->view('templates/header', $data);
		$this->load->view('menikah/edit_menikah', $data);
		$this->load->view('templates/footer');
    }

    public function proses_edit() {
        $nik = $this->input->post('nik');
        $id_pejabat = $this->input->post('id_pejabat');

        $data = array(
            'nik' => $this->input->post('nik'),
            'id_pejabat' => $this->input->post('pejabat'),
        );
        $where = array(
            'id_menikah' => $this->input->post('id'),
        );
        $this->m_menikah->proses_edit($where, $data);
        $this->session->set_flashdata('sukses', 'Data berhasil diedit.');
        redirect(base_url('menikah/'));
    }

    public function cetak($id) {
        $data['title'] = "SK Menikah - Desa Perning";
        $data['menikah'] = $this->m_menikah->cetak($id);

		$this->load->view('menikah/cetak_menikah', $data);
    }

    public function hapus($id) {
        $this->m_menikah->hapus($id);
		$this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
		redirect(base_url('menikah'));
    }
}