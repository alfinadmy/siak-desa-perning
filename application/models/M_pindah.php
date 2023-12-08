<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pindah extends CI_Model
{
    public function index()
    {
        return $this->db->get('pindahdatang')->result();
    }

    public function cari($nik)
    {
        $this->db->where('nik', $nik);
        $query = $this->db->get('pindahdatang');
        if ($query->num_rows() > 0) {
            return false;
        } else {
            return true;
        }
    }

    public function tambah($data)
    {
        return $this->db->insert('pindahdatang', $data);
    }

    public function edit($nik)
    {
        $this->db->where('nik', $nik);
        return $this->db->get('pindahdatang')->row();
    }

    public function proses_edit($where, $data)
    {
        $this->db->where($where);
        return $this->db->update('pindahdatang', $data);
    }
    
    public function detail($nik = null)
    {
        $query = $this->db->get_where('pindahdatang', array('nik' => $nik))->row();
        return $query;
    }

    public function hapus($nik)
    {
        $this->db->where('nik', $nik);
        return $this->db->delete('pindahdatang');
    }

    public function hapus_semua()
    {
        // Hapus semua data dari tabel yang sesuai (gantilah 'nama_tabel' dengan nama tabel yang benar)
        $this->db->empty_table('pindahdatang');
    }
    
    public function data_pindah()
    {
        $this->db->select('*');
        $this->db->from('pindahdatang');
        $this->db->order_by('no_kk', 'asc');
        $data = $this->db->get('');
        return $data;
    }

}