<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_cerai_mati extends CI_Model
{
    public function pejabat()
    {
        return $this->db->query("SELECT * FROM pejabat")->result();
    }

    public function index()
    {
        $this->db->from('cerai_mati');
        $this->db->join('penduduk', 'cerai_mati.nik=penduduk.nik');
        $this->db->join('pejabat', 'cerai_mati.id_pejabat=pejabat.id_pejabat');
        return $this->db->get()->result();
    }

    public function tambah($data)
    {
        return $this->db->insert('cerai_mati', $data);
    }

    public function edit($id)
    {
        $this->db->where('id_cerai_mati', $id);
        return $this->db->get('cerai_mati')->row();
    }

    public function proses_edit($where, $data)
    {
        $this->db->where($where);
        return $this->db->update('cerai_mati', $data);
    }

    public function cetak($id)
    {
        $this->db->from('cerai_mati');
        $this->db->where('id_cerai_mati', $id);
        $this->db->join('penduduk', 'cerai_mati.nik=penduduk.nik');
        $this->db->join('pejabat', 'cerai_mati.id_pejabat=pejabat.id_pejabat');
        return $this->db->get()->row();
    }

    public function hapus($id)
    {
        $this->db->where('id_cerai_mati', $id);
        return $this->db->delete('cerai_mati');
    }
}