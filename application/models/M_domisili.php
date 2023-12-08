<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_domisili extends CI_Model
{
    public function pejabat()
    {
        return $this->db->query("SELECT * FROM pejabat")->result();
    }
    public function index()
    {
        $this->db->from('domisili');
        $this->db->join('penduduk', 'domisili.nik=penduduk.nik');
        $this->db->join('pejabat', 'domisili.id_pejabat=pejabat.id_pejabat');
        return $this->db->get()->result();
    }

    public function tambah($data)
    {
        return $this->db->insert('domisili', $data);
    }

    public function edit($id)
    {
        $this->db->where('id_domisili', $id);
        return $this->db->get('domisili')->row();
    }

    public function proses_edit($where, $data)
    {
        $this->db->where($where);
        return $this->db->update('domisili', $data);
    }

    public function cetak($id)
    {
        $this->db->from('domisili');
        $this->db->where('id_domisili', $id);
        $this->db->join('penduduk', 'domisili.nik=penduduk.nik');
        $this->db->join('pejabat', 'domisili.id_pejabat=pejabat.id_pejabat');
        return $this->db->get()->row();
    }

    public function hapus($id)
    {
        $this->db->where('id_domisili', $id);
        return $this->db->delete('domisili');
    }
}
