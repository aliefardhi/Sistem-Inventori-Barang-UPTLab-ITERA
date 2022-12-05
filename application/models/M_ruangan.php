<?php

class M_ruangan extends CI_Model
{
    protected $_table = 'tbl_ruangan';

    public function getAllRuangan()
    {
        $query = $this->db->get($this->_table);
        return $query->result();
    }

    public function getLabRuangan($idLab)
    {
        $query = $this->db->query("SELECT * FROM tbl_ruangan WHERE id_lab = '$idLab'");
        return $query->result();
    }

    public function getAllRuanganInfo()
    {
        $query = $this->db->query("SELECT * FROM `tbl_ruangan`
        LEFT JOIN tbl_pegawai_upt ON tbl_ruangan.id_pegawai = tbl_pegawai_upt.id_pegawai
        LEFT JOIN v_simuk_pegawai ON tbl_pegawai_upt.id_pegawai = v_simuk_pegawai.id_pegawai
        LEFT JOIN tbl_lab ON tbl_ruangan.id_lab = tbl_lab.id_lab");
        return $query->result();
    }

    public function getDetailRuangan($idRuang)
    {
        $query = $this->db->query("SELECT * FROM tbl_ruangan 
        LEFT JOIN tbl_pegawai_upt ON tbl_ruangan.id_pegawai = tbl_pegawai_upt.id_pegawai
        LEFT JOIN v_simuk_pegawai ON tbl_pegawai_upt.id_pegawai = v_simuk_pegawai.id_pegawai
        LEFT JOIN tbl_lab ON tbl_ruangan.id_lab = tbl_lab.id_lab
        WHERE id_ruang = '$idRuang'");

        return $query->row_array();
    }

    public function getPicRuangan($idRuang)
    {
        $query = $this->db->query("SELECT * FROM `tbl_ruangan`
        LEFT JOIN tbl_pegawai_upt ON tbl_ruangan.id_pegawai = tbl_pegawai_upt.id_pegawai
        LEFT JOIN v_simuk_pegawai ON tbl_pegawai_upt.id_pegawai = v_simuk_pegawai.id_pegawai
        WHERE tbl_ruangan.id_ruang = '$idRuang'");

        return $query->row_array();
    }

    public function addRuangan($data)
    {
        return $this->db->insert($this->_table, $data);
    }

    public function editRuangan($data, $idRuang)
    {
        $query = $this->db->set($data);
        $query = $this->db->where('id_ruang', $idRuang);
        $query = $this->db->update($this->_table);
        return $query;
    }

    public function deleteRuangan($idRuang)
    {
        return $this->db->delete($this->_table, ['id_ruang' => $idRuang]);
    }

    public function countRuangan()
    {
        return $this->db->query("SELECT COUNT(id_ruang) as id_ruang FROM tbl_ruangan")->row();
    }

    public function countRuanganLab($idLab)
    {
        return $this->db->query("SELECT COUNT(id_ruang) as id_ruang, nama_lab 
        FROM `tbl_ruangan`
        LEFT JOIN tbl_lab ON tbl_ruangan.id_lab = tbl_lab.id_lab
        WHERE tbl_ruangan.id_lab = '$idLab'")->row();
    }
}
