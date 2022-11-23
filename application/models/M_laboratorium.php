<?php

class M_laboratorium extends CI_Model
{
    protected $_table = 'tbl_lab';

    public function getAllLab()
    {
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function addLab($data)
    {
        return $this->db->insert($this->_table, $data);
    }

    public function deleteLab($idLab)
    {
        return $this->db->delete($this->_table, ['id_lab' => $idLab]);
    }

    public function namaLab($idLab)
    {
        return $this->db->query("SELECT nama_lab FROM tbl_lab WHERE id_lab = '$idLab'")->row_array();
    }
}
