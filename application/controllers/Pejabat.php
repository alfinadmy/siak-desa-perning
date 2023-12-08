<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pejabat extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_pejabat');
	}

	public function index()
	{
		$data['title'] = "Pejabat - Desa Perning";
		$data['pejabat'] = $this->m_pejabat->tampil();

		$mutasi = $this->load->view('templates/header', $data);
		$this->load->view('pejabat/tampil_pejabat');
		$this->load->view('templates/footer');
	}

	public function edit()
	{
		$data['title'] = "Edit Pejabat - Desa Perning";
		$data['pejabat'] = $this->m_pejabat->edit($this->uri->segment(3));

		$this->load->view('templates/header', $data);
		$this->load->view('pejabat/edit_pejabat');
		$this->load->view('templates/footer');
	}

	public function proses_edit()
	{
		$data = array(
			'nama_pejabat' => $this->input->post('nama'),
			'jabatan_pejabat' => $this->input->post('jabatan'),
		);
		$where = array(
			'id_pejabat' => $this->input->post('id'),
		);
		$this->m_pejabat->proses_edit($where, $data);
		$this->session->set_flashdata('sukses', 'Data pejabat berhasil diedit.');
		redirect(base_url('pejabat/'));
	}
}