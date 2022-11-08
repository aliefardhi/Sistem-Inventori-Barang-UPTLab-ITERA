<?php

class M_persediaan extends CI_Model
{
    protected $_table = 'tbl_persediaan';

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
        $query = $this->db->query("SELECT * from tbl_persediaan where id_lab = '$idLab'");
        return $query->result();
    }

    public function detailBarang($idPersediaan)
    {
        $query = $this->db->query("SELECT * FROM tbl_persediaan WHERE id_persediaan = '$idPersediaan'");
        return $query->row_array();
    }

    public function addPersediaan($data)
    {
        return $this->db->insert($this->_table, $data);
    }

    public function editPersediaan($data, $idPersediaan)
    {
        $query = $this->db->set($data);
        $query = $this->db->where('id_persediaan', $idPersediaan);
        $query = $this->db->update($this->_table);
        return $query;
    }

    public function deletePersediaan($idPersediaan)
    {
        return $this->db->delete($this->_table, ['id_persediaan' => $idPersediaan]);
    }
}
