<?php

class M_pkh extends CI_Model {
    
    
    public function data_pkh()
    {
        $this->db->select('*');
        $this->db->from('pkh');
        $this->db->order_by('no_kk', 'asc');
        $data = $this->db->get('');
        return $data;
    }

    public function data_pkh_layak()
    {
        $this->db->select('*');
        $this->db->from('pkh');
        $this->db->where('keputusan', 'Layak'); // Hanya ambil data dengan keputusan 'Layak'
        $this->db->order_by('no_kk', 'asc');
        $data = $this->db->get();
        return $data;
    }


    function get_pkh() {     
        $query = $this->db->get('pkh');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return FALSE;
        }
    }

    function simpan_pkh($pkh) {
        $this->db->insert('pkh', $pkh);
    }

    public function tampil()
    {
        return $this->db->get('pkh')->result();
    }

    public function get_pkh_data()
{
    // Sesuaikan dengan query yang Anda gunakan untuk mengambil data
    $query = $this->db->get('pkh'); // Gantilah dengan nama tabel yang sesuai

    return $query->result();
}

    public function hapus_semua()
    {
        // Hapus semua data dari tabel yang sesuai (gantilah 'nama_tabel' dengan nama tabel yang benar)
        $this->db->empty_table('pkh');
    }

    // Di model m_pkh
    public function cek_kk($no_kk) {
        $this->db->where('no_kk', $no_kk);
        $query = $this->db->get('pkh'); // Gantilah 'nama_tabel_anda' dengan nama tabel sesungguhnya
        return $query->num_rows() > 0;
    }


}
/*END OF FILE*/