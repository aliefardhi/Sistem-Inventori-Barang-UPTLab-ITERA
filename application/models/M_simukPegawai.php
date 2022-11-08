<?php

class M_simukPegawai extends CI_Model
{

    protected $_table = 'v_simuk_pegawai';

    public function getAllPegawai()
    {
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function getPegawaiUptLab()
    {
        $query = $this->db->query("SELECT * FROM v_simuk_pegawai WHERE kd_unit = 'ITR-001'");
        return $query->result();
    }

    public function getIdPegawai($namaPegawai)
    {
        $query = $this->db->get_where('v_simuk_pegawai', array('id_pegawai' => $namaPegawai));
        return $query->result();
    }
}
