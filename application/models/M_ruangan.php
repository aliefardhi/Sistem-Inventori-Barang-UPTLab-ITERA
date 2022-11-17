<?php

class M_ruangan extends CI_Model
{
    protected $_table = 'tbl_ruangan';

    public function getAllRuangan()
    {
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function getDetailRuangan($idRuang)
    {
        $query = $this->db->query("SELECT * FROM tbl_ruangan WHERE id_ruang = '$idRuang'");
        return $query->row_array();
    }

    public function getPicRuangan($idPegawai)
    {
        $query = $this->db->query("SELECT * FROM `tbl_ruangan`
        LEFT JOIN tbl_pegawai_upt ON tbl_ruangan.id_pegawai = tbl_pegawai_upt.id_pegawai
        LEFT JOIN v_simuk_pegawai ON tbl_pegawai_upt.id_pegawai = v_simuk_pegawai.id_pegawai
        WHERE tbl_ruangan.id_pegawai = '$idPegawai'");

        return $query->row_array();
    }

    public function addRuangan($data)
    {
        return $this->db->insert($this->_table, $data);
    }
}
