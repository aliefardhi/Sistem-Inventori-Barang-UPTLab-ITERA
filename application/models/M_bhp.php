<?php

class M_bhp extends CI_Model
{
    protected $_table = 'tbl_bhp';

    public function getLab()
    {
        $query = $this->db->get('tbl_lab');
        return $query->result();
    }

    public function getThisLab($idPegawai)
    {
        $query = $this->db->query("SELECT * FROM tbl_lab LEFT JOIN tbl_pegawai_upt ON tbl_lab.id_lab = tbl_pegawai_upt.id_lab WHERE id_pegawai = '$idPegawai'");
        return $query->row_array();
    }

    // get barang from which lab
    public function daftarBarang($idLab)
    {
        $query = $this->db->query("SELECT * from tbl_bhp where id_lab = '$idLab'");
        return $query->result();
    }

    public function detailBarang($idBhp)
    {
        $query = $this->db->query("SELECT * FROM tbl_bhp WHERE id_bhp = '$idBhp'");
        return $query->row_array();
    }
}
