<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pindah extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') == FALSE) {
            redirect(base_url("login"));
        }
        $this->load->model('m_pindah');
        $this->load->helper('tanggal_helper');
		$this->load->library('form_validation');
    }

    public function index() {
        $data['title'] = "Data Pindah - Desa Perning";
        $data['pindah'] = $this->m_pindah->index();

        $mutasi = $this->load->view('templates/header', $data);
        $this->load->view('pindah/tampil_pindah');
        $this->load->view('templates/footer');
    }
    
    public function tambah() {
        $data['title'] = "Tambah Pindah - Desa Perning";

        $this->load->view('templates/header', $data);
        $this->load->view('pindah/tambah_pindah');
        $this->load->view('templates/footer');
    }

    public function proses_tambah() {
        $no_kk = $this->input->post('no_kk');
        $nama_kepala_keluarga = $this->input->post('nama_kepala_keluarga');
        $alamat = $this->input->post('alamat');
        $rt = $this->input->post('rt');
        $rw = $this->input->post('rw');
        $nik = $this->input->post('nik');
        $nama = $this->input->post('nama');
        $agama = $this->input->post('agama');
        $pekerjaan = $this->input->post('pekerjaan');
        $alasan_pindah = $this->input->post('alasan_pindah');
        $tanggal_pindah = $this->input->post('tanggal_pindah');
        $alamat_tujuan = $this->input->post('alamat_tujuan');
        $jenis_pindah = $this->input->post('jenis_pindah');
        $klasifikasi_pindah = $this->input->post('klasifikasi_pindah');

        $data = array(
            'no_kk' => $no_kk,
            'nama_kepala_keluarga' => $nama_kepala_keluarga,
            'alamat' => ucwords($alamat),
            'rt' => $rt,
            'rw' => $rw,
            'nik' => $nik,
            'nama' => ucwords($nama),
            'agama' => $agama,
            'pekerjaan' => $pekerjaan,
            'alasan_pindah' => ucwords($alasan_pindah),
            'tanggal_pindah' => $tanggal_pindah,
            'alamat_tujuan' => $alamat_tujuan,
            'jenis_pindah' => $jenis_pindah,
            'klasifikasi_pindah' => $klasifikasi_pindah,
        );
        $this->m_pindah->tambah($data);

        $this->session->set_flashdata('sukses', 'Data dengan NIK' . $nik . ' berhasil ditambahkan.');
        redirect(base_url('pindah'));
    }

    public function edit($nik) {
        $data['title'] = "Edit Pindah - Desa Perning";
        $data['pindah'] = $this->m_pindah->edit($nik);

        $this->load->view('templates/header', $data);
        $this->load->view('pindah/edit_pindah');
        $this->load->view('templates/footer');
    }

    public function proses_edit() {
        $no_kk = $this->input->post('no_kk');
        $nik = $this->input->post('nik');
        $nama = $this->input->post('nama');
        $agama = $this->input->post('agama');
        $pekerjaan = $this->input->post('pekerjaan');
        $alamat = $this->input->post('alamat');
        $rt = $this->input->post('rt');
        $rw = $this->input->post('rw');
        $alasan_pindah = $this->input->post('alasan_pindah');
        $tanggal_pindah = $this->input->post('tanggal_pindah');
        $alamat_tujuan = $this->input->post('alamat_tujuan');
        $jenis_pindah = $this->input->post('jenis_pindah');
        $klasifikasi_pindah = $this->input->post('klasifikasi_pindah');

        $data = array(
            'no_kk' => $no_kk,
            'nik' => $nik,
            'nama' => ucwords($nama),
            'agama' => $agama,
            'pekerjaan' => ucwords($pekerjaan),
            'alamat' => ucwords($alamat),
            'rt' => $rt,
            'rw' => $rw,
            'alasan_pindah' => ucwords($alasan_pindah),
            'tanggal_pindah' => $tanggal_pindah,
            'alamat_tujuan' => $alamat_tujuan,
            'jenis_pindah' => $jenis_pindah,
            'klasifikasi_pindah' => $klasifikasi_pindah,
        );
        $where = array('nik' => $nik);
        $this->m_pindah->proses_edit($where, $data);
        $this->session->set_flashdata('sukses', "Data dengan NIK" . $nik .' berhasil di edit.');
        redirect(base_url('pindah/index/' . $nik));
    }

    public function detail($nik) {
        $data['title'] = "Detail Pindah - Desa Perning";
        $this->load->model('m_pindah');
        $detail = $this->m_pindah->detail($nik);
        $data['detail'] = $detail;
        $this->load->view('templates/header', $data);
        $this->load->view('pindah/detail_pindah');
        $this->load->view('templates/footer');
    }

    public function hapus($nik) {
        $this->m_pindah->hapus($nik);
        $this->session->set_flashdata('sukses', 'Data dengan NIK' . $nik . ' berhasil dihapus.');
        redirect(base_url('pindah'));
    }

    public function hapus_semua()
    {
        // Panggil model yang diperlukan untuk menghapus semua data
        $this->m_pindah->hapus_semua();

        // Set flashdata untuk memberi pesan sukses kepada pengguna
        $this->session->set_flashdata('sukses', 'Semua data penduduk pindah berhasil dihapus.');

        // Redirect kembali ke halaman tampil data penduduk
        redirect(base_url('pindah'));
    }

    public function excel()
    {
        $data = $this->m_pindah->data_pindah();
        $this->load->view('pindah/export_pindah', ['data'=>$data]);
    }
}