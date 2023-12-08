<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_sktm extends CI_Model
{
    public function pejabat()
    {
        return $this->db->query("SELECT * FROM pejabat")->result();
    }
    public function index()
    {
        $this->db->from('sktm');
        $this->db->join('penduduk', 'sktm.nik=penduduk.nik');
        $this->db->join('pejabat', 'sktm.id_pejabat=pejabat.id_pejabat');
        return $this->db->get()->result();
    }

    public function tambah($data)
    {
        return $this->db->insert('sktm', $data);
    }

    public function edit($id)
    {
        $this->db->where('id_sktm', $id);
        return $this->db->get('sktm')->row();
    }

    public function proses_edit($where, $data)
    {
        $this->db->where($where);
        return $this->db->update('sktm', $data);
    }

    public function cetak($id)
    {
        $this->db->from('sktm');
        $this->db->where('id_sktm', $id);
        $this->db->join('penduduk', 'sktm.nik=penduduk.nik');
        $this->db->join('pejabat', 'sktm.id_pejabat=pejabat.id_pejabat');
        return $this->db->get()->row();
    }

    public function hapus($id)
    {
        $this->db->where('id_sktm', $id);
        return $this->db->delete('sktm');
    }
}