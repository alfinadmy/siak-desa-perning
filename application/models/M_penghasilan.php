<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_penghasilan extends CI_Model
{
    public function pejabat()
    {
        return $this->db->query("SELECT * FROM pejabat")->result();
    }
    public function index()
    {
        $this->db->from('penghasilan');
        $this->db->join('penduduk', 'penghasilan.nik=penduduk.nik');
        $this->db->join('pejabat', 'penghasilan.id_pejabat=pejabat.id_pejabat');
        return $this->db->get()->result();
    }

    public function tambah($data)
    {
        return $this->db->insert('penghasilan', $data);
    }

    public function edit($id)
    {
        $this->db->where('id_penghasilan', $id);
        return $this->db->get('penghasilan')->row();
    }

    public function proses_edit($where, $data)
    {
        $this->db->where($where);
        return $this->db->update('penghasilan', $data);
    }

    public function cetak($id)
    {
        $this->db->from('penghasilan');
        $this->db->where('id_penghasilan', $id);
        $this->db->join('penduduk', 'penghasilan.nik=penduduk.nik');
        $this->db->join('pejabat', 'penghasilan.id_pejabat=pejabat.id_pejabat');
        return $this->db->get()->row();
    }

    public function hapus($id)
    {
        $this->db->where('id_penghasilan', $id);
        return $this->db->delete('penghasilan');
    }
}