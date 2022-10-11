<?php

class M_simukPegawai extends CI_Model
{

    protected $_table = 'v_simuk_pegawai';

    public function getAllPegawai()
    {
        $query = $this->db->get($this->_table);
        return $query->result();
    }
}
