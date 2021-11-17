<?php

class M_Mahasiswa extends CI_Model
{
    public function getMhs($nrp = false)
    {
        // jika nilai id tetap false (tidak diisi)
        if ($nrp) {
            $this->db->select('*');
            $this->db->from('mahasiswa');
            $this->db->where('nrp', $nrp);
            $query = $this->db->get()->result();
            return $query;
        } else {
            $this->db->select('*');
            $this->db->from('mahasiswa');
            $query = $this->db->get()->result();
            return $query;
        }
    }

    public function getMhsByDsn($nidn)
    {
        return $this->db->select('npm, nama, email,foto')->get_where('mahasiswa', ['nidn_wali' => $nidn])->result_array();
    }
}
