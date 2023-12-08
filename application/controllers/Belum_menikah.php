<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Belum_menikah extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') == FALSE) {
            redirect(base_url("login"));
        }
		$this->load->model('m_penduduk');
		$this->load->model('m_belum_menikah');
        $this->load->helper('tanggal_helper');
		$this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = "SK Belum Menikah - Desa Perning";
		$data['belum_menikah'] = $this->m_belum_menikah->index();

		$mutasi = $this->load->view('templates/header', $data);
		$this->load->view('belum_menikah/index_belum_menikah');
		$this->load->view('templates/footer');
    }
    
    public function tambah() {
        $data['title'] = "SK Belum Menikah - Desa Perning";
		$data['penduduk'] = $this->m_penduduk->index();
		$data['pejabat'] = $this->m_belum_menikah->pejabat();

		$this->load->view('templates/header', $data);
		$this->load->view('belum_menikah/tambah_belum_menikah', $data);
		$this->load->view('templates/footer');
    }

    public function proses_tambah() {
        $nik = $this->input->post('nik');
        $id_pejabat = $this->input->post('id_pejabat');
        $tanggal_belum_menikah = $this->input->post('tanggal_belum_menikah');

        $data = array(
            'nik' => $this->input->post('nik'),
            'id_pejabat' => $this->input->post('pejabat'),
            'tanggal_belum_menikah' => date('Y-m-d'),
        );
        $this->m_belum_menikah->tambah($data);
        $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan.');
        redirect(base_url('belum_menikah/'));
    }

    public function edit($id) {
        $data['title'] = "SK Belum Menikah - Desa Perning";
		$data['penduduk'] = $this->m_penduduk->index();
		$data['pejabat'] = $this->m_belum_menikah->pejabat();
		$data['belum_menikah'] = $this->m_belum_menikah->edit($id);

		$this->load->view('templates/header', $data);
		$this->load->view('belum_menikah/edit_belum_menikah', $data);
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
            'id_belum_menikah' => $this->input->post('id'),
        );
        $this->m_belum_menikah->proses_edit($where, $data);
        $this->session->set_flashdata('sukses', 'Data berhasil diedit.');
        redirect(base_url('belum_menikah/'));
    }

    public function cetak($id) {
        $data['title'] = "SK Belum Menikah - Desa Perning";
        $data['belum_menikah'] = $this->m_belum_menikah->cetak($id);

		$this->load->view('belum_menikah/cetak_belum_menikah', $data);
    }

    public function hapus($id) {
        $this->m_belum_menikah->hapus($id);
		$this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
		redirect(base_url('belum_menikah'));
    }
}