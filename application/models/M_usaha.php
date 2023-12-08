<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_usaha extends CI_Model
{
    public function pejabat()
    {
        return $this->db->query("SELECT * FROM pejabat")->result();
    }
    
    public function index()
    {
        $this->db->from('usaha');
        $this->db->join('penduduk', 'usaha.nik=penduduk.nik');
        $this->db->join('pejabat', 'usaha.id_pejabat=pejabat.id_pejabat');
        return $this->db->get()->result();
    }

    public function tambah($data)
    {
        return $this->db->insert('usaha', $data);
    }

    public function edit($id)
    {
        $this->db->where('id_usaha', $id);
        return $this->db->get('usaha')->row();
    }

    public function proses_edit($where, $data)
    {
        $this->db->where($where);
        return $this->db->update('usaha', $data);
    }

    public function cetak($id)
    {
        $this->db->from('usaha');
        $this->db->where('id_usaha', $id);
        $this->db->join('penduduk', 'usaha.nik=penduduk.nik');
        $this->db->join('pejabat', 'usaha.id_pejabat=pejabat.id_pejabat');
        return $this->db->get()->row();
    }

    public function hapus($id)
    {
        $this->db->where('id_usaha', $id);
        return $this->db->delete('usaha');
    }
}