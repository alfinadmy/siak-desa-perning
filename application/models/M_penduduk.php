<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_penduduk extends CI_Model
{
    public function index()
    {
        return $this->db->get('penduduk')->result();
    }

    public function cari($nik)
    {
        $this->db->where('nik', $nik);
        $query = $this->db->get('penduduk');
        if ($query->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function tambah($data)
    {
        return $this->db->insert('penduduk', $data);
    }

    public function edit($nik)
    {
        $this->db->where('nik', $nik);
        return $this->db->get('penduduk')->row();
    }

    public function proses_edit($where, $data)
    {
        $this->db->where($where);
        return $this->db->update('penduduk', $data);
    }
    
    public function detail($nik = NULL)
    {
        $query = $this->db->get_where('penduduk', array('nik' => $nik))->row();
        return $query;
    }
    
    public function hapus($nik)
    {
        $this->db->where('nik', $nik);
        return $this->db->delete('penduduk');
    }

    public function hapus_semua()
    {
        // Hapus semua data dari tabel yang sesuai (gantilah 'nama_tabel' dengan nama tabel yang benar)
        $this->db->empty_table('sktm');
        $this->db->empty_table('domisili');
        $this->db->empty_table('belum_menikah');
        $this->db->empty_table('menikah');
        $this->db->empty_table('cerai_mati');
        $this->db->empty_table('usaha');
        $this->db->empty_table('penghasilan');
        $this->db->empty_table('pemasangan_listrik');
        $this->db->empty_table('penduduk');
    }

    function get_penduduk() {     
        $query = $this->db->get('penduduk');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }
    
    function insert_csv($data) {
        $this->db->insert('penduduk', $data);
    }

    public function data_penduduk()
    {
        $this->db->select('*');
        $this->db->from('penduduk');
        $this->db->order_by('nik', 'asc');
        $data = $this->db->get('');
        return $data;
    }

    public function isDuplicate($nik) {
        // Check if the record with the same 'nik' already exists
        $this->db->where('nik', $nik);
        $query = $this->db->get('penduduk'); // Change 'your_table_name' to your actual table name
    
        return $query->num_rows() > 0;
    }
    
}