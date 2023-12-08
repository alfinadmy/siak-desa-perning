<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_pemasangan_listrik extends CI_Model
{
    public function pejabat()
    {
        return $this->db->query("SELECT * FROM pejabat")->result();
    }
    
    public function index()
    {
        $this->db->from('pemasangan_listrik');
        $this->db->join('penduduk', 'pemasangan_listrik.nik=penduduk.nik');
        $this->db->join('pejabat', 'pemasangan_listrik.id_pejabat=pejabat.id_pejabat');
        return $this->db->get()->result();
    }

    public function tambah($data)
    {
        return $this->db->insert('pemasangan_listrik', $data);
    }

    public function edit($id)
    {
        $this->db->where('id_pemasangan_listrik', $id);
        return $this->db->get('pemasangan_listrik')->row();
    }

    public function proses_edit($where, $data)
    {
        $this->db->where($where);
        return $this->db->update('pemasangan_listrik', $data);
    }

    public function cetak($id)
    {
        $this->db->from('pemasangan_listrik');
        $this->db->where('id_pemasangan_listrik', $id);
        $this->db->join('penduduk', 'pemasangan_listrik.nik=penduduk.nik');
        $this->db->join('pejabat', 'pemasangan_listrik.id_pejabat=pejabat.id_pejabat');
        return $this->db->get()->row();
    }

    public function hapus($id)
    {
        $this->db->where('id_pemasangan_listrik', $id);
        return $this->db->delete('pemasangan_listrik');
    }
}