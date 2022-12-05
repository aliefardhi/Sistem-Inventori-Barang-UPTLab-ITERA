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

    public function addBhp($data)
    {
        return $this->db->insert($this->_table, $data);
    }

    public function addBatch($data)
    {
        $this->db->insert_batch($this->_table, $data);
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function editBhp($data, $idBhp)
    {
        $query = $this->db->set($data);
        $query = $this->db->where('id_bhp', $idBhp);
        $query = $this->db->update($this->_table);
        return $query;
    }

    public function deleteBhp($idBhp)
    {
        return $this->db->delete($this->_table, ['id_bhp' => $idBhp]);
    }

    public function getBarangRusak($idLab)
    {
        return $this->db->query("SELECT * FROM `tbl_bhp` WHERE kondisi = 'rusak' AND id_lab = '$idLab'")->result();
    }

    public function getBarangHilang($idLab)
    {
        return $this->db->query("SELECT * FROM `tbl_bhp` WHERE kondisi = 'hilang' AND id_lab = '$idLab'")->result();
    }

    public function countBhp()
    {
        return $this->db->query("SELECT COUNT(id_bhp) as id_bhp FROM `tbl_bhp`")->row();
    }

    public function bhpBaik()
    {
        return $this->db->query("SELECT COUNT(id_bhp) as baik FROM `tbl_bhp`
        WHERE kondisi = 'baik'")->row();
    }

    public function bhpRusak()
    {
        return $this->db->query("SELECT COUNT(id_bhp) as rusak FROM `tbl_bhp`
        WHERE kondisi = 'rusak'")->row();
    }

    public function bhpHilang()
    {
        return $this->db->query("SELECT COUNT(id_bhp) as hilang FROM `tbl_bhp`
        WHERE kondisi = 'hilang'")->row();
    }

    public function nilaiBhpLab($idLab)
    {
        return $this->db->query("SELECT SUM(harga_satuan) as harga_satuan FROM `tbl_bhp`
        WHERE id_lab = '$idLab'")->row();
    }

    public function countBhpLab($idLab)
    {
        return $this->db->query("SELECT COUNT(id_bhp) as id_bhp FROM `tbl_bhp` WHERE id_lab = '$idLab'")->row();
    }

    public function bhpBaikLab($idLab)
    {
        return $this->db->query("SELECT COUNT(id_bhp) as baik FROM `tbl_bhp`
        WHERE kondisi = 'baik' AND id_lab = '$idLab'")->row();
    }

    public function bhpRusakLab($idLab)
    {
        return $this->db->query("SELECT COUNT(id_bhp) as rusak FROM `tbl_bhp`
        WHERE kondisi = 'rusak' AND id_lab = '$idLab'")->row();
    }

    public function bhpHilangLab($idLab)
    {
        return $this->db->query("SELECT COUNT(id_bhp) as hilang FROM `tbl_bhp`
        WHERE kondisi = 'hilang' AND id_lab = '$idLab'")->row();
    }
}
