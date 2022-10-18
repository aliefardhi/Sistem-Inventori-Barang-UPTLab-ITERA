<?php

class M_pegawaiUpt extends CI_Model
{
    protected $_table = 'tbl_pegawai_upt';

    public function addPegawai($data)
    {
        return $this->db->insert($this->_table, $data);
    }

    public function getPegawaiUpt()
    {
        $query = $this->db->query('SELECT * FROM tbl_pegawai_upt left join v_simuk_pegawai on tbl_pegawai_upt.id_pegawai = v_simuk_pegawai.id_pegawai left join tbl_lab on tbl_pegawai_upt.id_lab = tbl_lab.id_lab');

        return $query->result();
    }

    public function getDetailPegawaiUpt($id)
    {
        $query = $this->db->query("SELECT * FROM tbl_pegawai_upt left join v_simuk_pegawai on tbl_pegawai_upt.id_pegawai = v_simuk_pegawai.id_pegawai left join tbl_lab on tbl_pegawai_upt.id_lab = tbl_lab.id_lab WHERE tbl_pegawai_upt.id_pegawai = '$id' ");

        return $query->row();
    }

    public function getDetailPegawaiUptObj($id)
    {
        $query = $this->db->query("SELECT * FROM tbl_pegawai_upt left join v_simuk_pegawai on tbl_pegawai_upt.id_pegawai = v_simuk_pegawai.id_pegawai left join tbl_lab on tbl_pegawai_upt.id_lab = tbl_lab.id_lab WHERE tbl_pegawai_upt.id_pegawai = '$id' ");

        return $query->result();
    }

    public function getDetailPegawaiUptId($id)
    {
        $query = $this->db->query("SELECT * FROM tbl_pegawai_upt left join v_simuk_pegawai on tbl_pegawai_upt.id_pegawai = v_simuk_pegawai.id_pegawai left join tbl_lab on tbl_pegawai_upt.id_lab = tbl_lab.id_lab WHERE tbl_pegawai_upt.id = '$id' ");

        return $query->result();
    }

    public function deletePegawai($idPegawai)
    {
        return $this->db->delete($this->_table, ['id_pegawai' => $idPegawai]);
    }

    public function editPegawai($data, $id)
    {
        $query = $this->db->set($data);
        $query = $this->db->where(['id' => $id]);
        $query = $this->db->update($this->_table);
        return $query;
    }
}
