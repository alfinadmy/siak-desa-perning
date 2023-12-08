<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pkh extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('login') == FALSE) {
            redirect(base_url("login"));
        }
        $this->load->model('m_penduduk');
        $this->load->model('m_pkh');
        $this->load->helper('tanggal_helper');
        $this->load->library('form_validation');
        $this->load->library('csvimport');
    }

    public function index()
    {
        $data['title'] = "PKH - Desa Perning";
        $data['pkh'] = $this->m_pkh->get_pkh_data();

        $this->load->view('templates/header', $data);
        $this->load->view('pkh/tampil_pkh', $data);
        $this->load->view('templates/footer');
    }

    public function importcsv() {
        $data['pkh'] = $this->m_pkh->get_pkh();
        $data['error'] = '';    // inisialisasi array error upload gambar menjadi kosong
    
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'csv';
        $config['max_size'] = '1000';
    
        $this->load->library('upload', $config);
        
            // Jika upload gagal, tampilkan error
            if (!$this->upload->do_upload()) {
                $this->session->set_flashdata('error', 'Terjadi kesalahan saat mengunggah file CSV. File harus bertipe CSV, pilih kembali file yang benar.');
                redirect(base_url() . 'pkh/tampil');
            } else {
                $file_data = $this->upload->data();
                $file_path = './uploads/' . $file_data['file_name'];
        
                if ($this->csvimport->get_array($file_path)) {
                    $csv_array = $this->csvimport->get_array($file_path);
        
                    // Inisialisasi array untuk menyimpan data unik per keluarga
                    $uniqueFamilies = array();
                    
                    // Periksa apakah kolom yang diharapkan ada dalam setiap baris
                    $expectedColumns = ['no_kk', 'rt', 'rw', 'tanggal_lahir', 'hubungan_keluarga', 'pekerjaan', 'nama'];
                    foreach ($csv_array as $row) {
                        foreach ($expectedColumns as $column) {
                            if (!isset($row[$column])) {
                                $this->session->set_flashdata('error', 'Terjadi kesalahan saat membaca file CSV. Periksa kembali isi file termasuk format penulisan yang benar!');
                                redirect(base_url() . 'pkh/tampil');
                            }
                        }
                        $no_kk = $row['no_kk'];
                        $nama_kepala_keluarga = ''; // Inisialisasi variabel untuk menyimpan nama kepala keluarga
                        $rt = $row['rt']; // Tambahkan baris ini untuk mendapatkan informasi RT
                        $rw = $row['rw']; // Tambahkan baris ini untuk mendapatkan informasi RW
        
                        // Cek apakah keluarga sudah tercatat
                        if (!isset($uniqueFamilies[$no_kk])) {
                            // Inisialisasi status keluarga
                            $hasLansia = false;
                            $hasAnakSekolah = false;
                            $hasBalita = false;
        
                            // Loop ulang untuk setiap anggota keluarga
                            foreach ($csv_array as $member) {
                                if ($member['no_kk'] == $no_kk) {
                                    // Hitung usia berdasarkan tanggal_lahir
                                    $tanggalLahir = $member['tanggal_lahir'];
                                    $usia = date_diff(date_create($tanggalLahir), date_create('today'))->y;
        
                                    // Logika untuk menentukan status keluarga berdasarkan usia anggota tertua
                                    if ($usia >= 60) {
                                        $hasLansia = true;
                                    }
        
                                    if ($usia >= 6 && $usia <= 18) {
                                        $hasAnakSekolah = true;
                                    }
        
                                    if ($usia <= 5) {
                                        $hasBalita = true;
                                    }

                                    // Jika hubungan keluarga adalah "Kepala Keluarga", maka simpan nama sebagai nama kepala keluarga
                                    if ($member['hubungan_keluarga'] == 'Kepala Keluarga') {
                                        $nama_kepala_keluarga = $member['nama'];
                                    }
                                }
                            }
        
                            // Memulai logika pohon keputusan
                            $pekerjaan = $row['pekerjaan'];
                            $decision = '';
        
                            switch ($pekerjaan) {
                                case 'Tentara Nasional Indonesia (Tni)':
                                case 'Bidan':
                                    $decision = 'Tidak Layak';
                                    break;
                                case 'Mengurus Rumah Tangga':
                                case 'Pelajar/Mahasiswa':
                                case 'Belum/Tidak Bekerja':
                                    $decision = 'Layak';
                                    break;
                                case 'Petani/Pekebun':
                                    if ($hasLansia == false) {
                                        $decision = 'Tidak Layak';
                                        if ($hasBalita == false) {
                                            $decision = 'Tidak Layak';
                                            if ($hasAnakSekolah == false) {
                                                $decision = 'Tidak Layak';
                                            } elseif ($hasAnakSekolah == true) {
                                                $decision = 'Layak';
                                            }
                                        } elseif ($hasBalita == true) {
                                            $decision = 'Layak';
                                        }
                                    } elseif ($hasLansia == true) {
                                        $decision = 'Layak';
                                    }
                                    break;
                                case 'Buruh Harian Lepas':
                                    if ($hasLansia == false) {
                                        $decision = 'Tidak Layak';
                                        if ($hasAnakSekolah == false) {
                                            $decision = 'Tidak Layak';
                                            if ($hasBalita == false) {
                                                $decision = 'Tidak Layak';
                                            } elseif ($hasBalita == true) {
                                                $decision = 'Layak';
                                            }
                                        } elseif ($hasAnakSekolah == true) {
                                            $decision = 'Layak';
                                        }
                                    } elseif ($hasLansia == true) {
                                        $decision = 'Layak';
                                    }
                                    break;
                                case 'Karyawan Swasta':
                                    $decision = 'Tidak Layak';
                                    break;
                                case 'Buruh Tani/Perkebunan':
                                case 'Wiraswasta':
                                    if ($hasAnakSekolah == false) {
                                        $decision = 'Tidak Layak';
                                        if ($hasLansia == false) {
                                            $decision = 'Tidak Layak';
                                            if ($hasBalita == false) {
                                                $decision = 'Tidak Layak';
                                            } elseif ($hasBalita == true) {
                                                $decision = 'Layak';
                                            }
                                        } elseif ($hasLansia == true) {
                                            $decision = 'Layak';
                                        }
                                    } elseif ($hasAnakSekolah == true) {
                                        $decision = 'Layak';
                                    }
                                    break;
                                default:
                                    $decision = 'Tidak Layak';
                                    break;
                            }
        
                            // Simpan informasi per keluarga
                            $uniqueFamilies[$no_kk] = array(
                                'no_kk' => $no_kk,
                                'nama_kk' => $nama_kepala_keluarga, // Simpan nama kepala keluarga
                                'rt' => $rt, // Simpan nama kepala keluarga
                                'rw' => $rw, // Simpan nama kepala keluarga
                                'lansia' => $hasLansia,
                                'anak_sekolah' => $hasAnakSekolah,
                                'balita' => $hasBalita,
                                'keputusan' => $decision,  // Menambahkan kunci untuk keputusan per keluarga
                            );
                        }
                    }
        
                    // Simpan data per keluarga ke database
                    foreach ($uniqueFamilies as $familyData) {
                        // Periksa apakah keluarga dengan "no_kk" yang sama sudah ada
                        if (!$this->m_pkh->cek_kk($familyData['no_kk'])) {
                            $this->m_pkh->simpan_pkh($familyData);
                        } else {
                            // Atur pesan kesalahan untuk entri duplikat
                            $this->session->set_flashdata('error', 'Terjadi duplikat data saat dilakukan penambahan!');
                            redirect(base_url() . 'pkh/tampil');
                        }
                    }

                $this->session->set_flashdata('sukses', 'Data penduduk berhasil diklasifikasi!');
                redirect(base_url() . 'pkh/tampil');
 

                } else {
                    $this->session->set_flashdata('error', 'Terjadi kesalahan saat membaca file CSV.');
                    redirect(base_url() . 'pkh/tampil');

                    $data['title'] = "Tambah pkh - Desa Perning";

                    $this->load->view('templates/header', $data);
                    $this->load->view('pkh/tabel_hasil', $data);
                    $this->load->view('templates/footer');
                }
            }
        
    }
    
                 
    public function excel()
    {
        $data = $this->m_pkh->data_pkh();
        $this->load->view('pkh/export_pkh', ['data'=>$data]);
    }

    public function excel_layak()
    {
        $data = $this->m_pkh->data_pkh_layak();
        $this->load->view('pkh/export_layak', ['data'=>$data]);
    }

    public function tampil()
    {
        $data['title'] = "PKH - Desa Perning";
        $data['pkh'] = $this->m_pkh->tampil();

        $mutasi = $this->load->view('templates/header', $data);
        $this->load->view('pkh/tabel_hasil');
        $this->load->view('templates/footer');
    }

    public function hapus_semua()
    {
        // Panggil model yang diperlukan untuk menghapus semua data
        $this->m_pkh->hapus_semua();

        // Set flashdata untuk memberi pesan sukses kepada pengguna
        $this->session->set_flashdata('sukses', 'Semua data berhasil dihapus.');

        // Redirect kembali ke halaman tampil data penduduk
        redirect(base_url('pkh/tampil'));
    }
   
}
