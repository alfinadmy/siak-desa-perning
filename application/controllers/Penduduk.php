<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') == FALSE) {
            redirect(base_url("login"));
        }
        $this->load->model('m_penduduk');
        $this->load->helper('tanggal_helper');
        $this->load->library('form_validation');
        $this->load->library('csvimport');
    }
    
    public function index()
    {
        $data['title'] = "Data Penduduk - Desa Perning";
        $data['penduduk'] = $this->m_penduduk->index();

        $mutasi = $this->load->view('templates/header', $data);
        $this->load->view('penduduk/tampil_penduduk');
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data['title'] = "Tambah Penduduk - Desa Perning";

        $this->load->view('templates/header', $data);
        $this->load->view('penduduk/tambah_penduduk');
        $this->load->view('templates/footer');
    }

    public function proses_tambah()
    {
        $nik = $this->input->post('nik');
        $no_kk = $this->input->post('no_kk');
        $nama = $this->input->post('nama');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $hubungan_keluarga = $this->input->post('hubungan_keluarga');
        $alamat = $this->input->post('alamat');
        $rt = $this->input->post('rt');
        $rw = $this->input->post('rw');
        $agama = $this->input->post('agama');
        $pendidikan = $this->input->post('pendidikan');
        $pekerjaan = $this->input->post('pekerjaan');
        $status_perkawinan = $this->input->post('status_perkawinan');
        $kewarganegaraan = $this->input->post('kewarganegaraan');

        $data = array(
            'nik' => $nik,
            'no_kk' => $no_kk,
            'nama' => ucwords($nama),
            'tempat_lahir' => ucwords($tempat_lahir),
            'tanggal_lahir' => $tanggal_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'hubungan_keluarga' => $hubungan_keluarga,
            'alamat' => ucwords($alamat),
            'rt' => $rt,
            'rw' => $rw,
            'agama' => $agama,
            'pendidikan' => $pendidikan,
            'pekerjaan' => ucwords($pekerjaan),
            'status_perkawinan' => $status_perkawinan,
            'kewarganegaraan' => $kewarganegaraan
        );
        $this->m_penduduk->tambah($data);

        $this->session->set_flashdata('sukses', 'Data dengan NIK' . $nik . ' berhasil ditambahkan.');
        redirect(base_url('penduduk'));
    }

    public function edit($nik)
    {
        $data['title'] = "Edit Penduduk - Desa Perning";
        $data['penduduk'] = $this->m_penduduk->edit($nik);

        $this->load->view('templates/header', $data);
        $this->load->view('penduduk/edit_penduduk');
        $this->load->view('templates/footer');
    }

    public function proses_edit()
    {
        $nik = $this->input->post('nik');
        $no_kk = $this->input->post('no_kk');
        $tempat_lahir = $this->input->post('tempat_lahir');
        $tanggal_lahir = $this->input->post('tanggal_lahir');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $hubungan_keluarga = $this->input->post('hubungan_keluarga');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $rt = $this->input->post('rt');
        $rw = $this->input->post('rw');
        $agama = $this->input->post('agama');
        $pendidikan = $this->input->post('pendidikan');
        $pekerjaan = $this->input->post('pekerjaan');
        $status_perkawinan = $this->input->post('status_perkawinan');
        $kewarganegaraan = $this->input->post('kewarganegaraan');

        $data = array(
            'nik' => $nik,
            'no_kk' => $no_kk,
            'nama' => ucwords($nama),
            'tempat_lahir' => ucwords($tempat_lahir),
            'tanggal_lahir' => $tanggal_lahir,
            'jenis_kelamin' => $jenis_kelamin,
            'alamat' => ucwords($alamat),
            'rt' => $rt,
            'rw' => $rw,
            'agama' => $agama,
            'pendidikan' => $pendidikan,
            'pekerjaan' => ucwords($pekerjaan),
            'status_perkawinan' => $status_perkawinan,
            'kewarganegaraan' => $kewarganegaraan
        );
        $where = array('nik' => $nik);
        $this->m_penduduk->proses_edit($where, $data);
        $this->session->set_flashdata('sukses', "Data dengan NIK" . $nik . ' berhasil di edit.');
        redirect(base_url('penduduk/index/' . $nik));
    }

    public function detail($nik)
    {
        $data['title'] = "Detail Penduduk - Desa Perning";
        $this->load->model('m_penduduk');
        $detail = $this->m_penduduk->detail($nik);
        $data['detail'] = $detail;
        $this->load->view('templates/header', $data);
        $this->load->view('penduduk/detail_penduduk');
        $this->load->view('templates/footer');
    }

    public function hapus($nik)
    {
        $this->m_penduduk->hapus($nik);
        $this->session->set_flashdata('sukses', 'Data dengan NIK' . $nik . ' berhasil dihapus.');
        redirect(base_url('penduduk'));
    }

    public function hapus_semua()
    {
        // Panggil model yang diperlukan untuk menghapus semua data
        $this->m_penduduk->hapus_semua();

        // Set flashdata untuk memberi pesan sukses kepada pengguna
        $this->session->set_flashdata('sukses', 'Semua data penduduk berhasil dihapus.');

        // Redirect kembali ke halaman tampil data penduduk
        redirect(base_url('penduduk'));
    }

    public function importcsv()
    {
    $data['penduduk'] = $this->m_penduduk->get_penduduk();

    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'csv';
    $config['max_size'] = '1000';

    $this->load->library('upload', $config);

        try {
            // Jika upload gagal, tampilkan pesan error
            if (!$this->upload->do_upload()) {
                $this->session->set_flashdata('error', 'Terjadi kesalahan saat mengunggah file CSV. File harus bertipe CSV, pilih kembali file yang benar.');
                redirect(base_url() . 'penduduk');
            } else {
                $file_data = $this->upload->data();
                $file_path = './uploads/' . $file_data['file_name'];

                if ($this->csvimport->get_array($file_path)) {
                    $csv_array = $this->csvimport->get_array($file_path);
                    foreach ($csv_array as $row) {
                        // Insert the data into the database
                        $insert_data = array(
                            'nik' => $row['nik'],
                            'no_kk' => $row['no_kk'],
                            'nama' => $row['nama'],
                            'tempat_lahir' => $row['tempat_lahir'],
                            'tanggal_lahir' => $row['tanggal_lahir'],
                            'jenis_kelamin' => $row['jenis_kelamin'],
                            'hubungan_keluarga' => $row['hubungan_keluarga'],
                            'alamat' => $row['alamat'],
                            'rt' => $row['rt'],
                            'rw' => $row['rw'],
                            'agama' => $row['agama'],
                            'pendidikan' => $row['pendidikan'],
                            'pekerjaan' => $row['pekerjaan'],
                            'status_perkawinan' => $row['status_perkawinan'],
                            'kewarganegaraan' => $row['kewarganegaraan'],
                        );

                        try {
                            $this->m_penduduk->insert_csv($insert_data);
                            $this->session->set_flashdata('sukses', 'Data Penduduk berhasil ditambahkan!');
                    
                        } catch (Exception $e) {
                            // Tangani duplikat entry di sini
                            if ($e->getCode() === 1062) { // MySQL error code for duplicate entry
                                $this->session->set_flashdata('error', "Terjadi duplikat penduduk saat dilakukan penambahan!");
                            } else {
                                throw $e; // lempar kembali exception jika bukan duplikat entry
                            }
                        }
                    }
                    redirect(base_url() . 'penduduk');
                } else {
                    $this->session->set_flashdata('error', 'Terjadi kesalahan saat membaca file CSV.');
                    redirect(base_url() . 'penduduk');
                }
            }
        } catch (Exception $e) {
            // Tangani exception umum di sini
            $this->session->set_flashdata('error', 'Terjadi kesalahan saat membaca file CSV. Periksa kembali isi file termasuk format penulisan yang benar!');
            redirect(base_url() . 'penduduk');
        }

        $data['title'] = "Tambah Penduduk - Desa Perning";
        $this->load->view('templates/header', $data);
        $this->load->view('penduduk/tampil_penduduk', $data);
        $this->load->view('templates/footer');
    }


    public function excel()
    {
        $data = $this->m_penduduk->data_penduduk();
        $this->load->view('penduduk/export_penduduk', ['data'=>$data]);
    }


}
