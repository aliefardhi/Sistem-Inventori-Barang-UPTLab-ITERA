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

    public function addBatch($data)
    {
        $this->db->insert_batch($this->_table, $data);
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function editPersediaan($data, $idPersediaan)
    {
        $query = $this->db->set($data);
        $query = $this->db->where('id_persediaan', $idPersediaan);
        $query = $this->db->update($this->_table);
        return $query;
    }

    public function getBarangRusak($idLab)
    {
        return $this->db->query("SELECT * FROM `tbl_persediaan` WHERE kondisi = 'rusak' AND id_lab = '$idLab'")->result();
    }

    public function getBarangHilang($idLab)
    {
        return $this->db->query("SELECT * FROM `tbl_persediaan` WHERE kondisi = 'hilang' AND id_lab = '$idLab'")->result();
    }

    public function deletePersediaan($idPersediaan)
    {
        return $this->db->delete($this->_table, ['id_persediaan' => $idPersediaan]);
    }

    public function countPersediaan()
    {
        return $this->db->query("SELECT COUNT(id_persediaan) as id_persediaan FROM `tbl_persediaan`")->row();
    }

    public function countPersediaanBaik()
    {
        return $this->db->query("SELECT COUNT(id_persediaan) as baik FROM tbl_persediaan
        WHERE kondisi = 'baik'")->row();
    }

    public function countPersediaanRusak()
    {
        return $this->db->query("SELECT COUNT(id_persediaan) as rusak FROM tbl_persediaan
        WHERE kondisi = 'rusak'")->row();
    }

    public function countPersediaanHilang()
    {
        return $this->db->query("SELECT COUNT(id_persediaan) as hilang FROM tbl_persediaan
        WHERE kondisi = 'hilang'")->row();
    }

    public function nilaiPersediaanLab($idLab)
    {
        return $this->db->query("SELECT SUM(harga_satuan) as harga_satuan FROM `tbl_persediaan`
        WHERE id_lab = '$idLab'")->row();
    }

    public function countPersediaanLab($idLab)
    {
        return $this->db->query("SELECT COUNT(id_persediaan) as id_persediaan FROM `tbl_persediaan` WHERE id_lab = '$idLab'")->row();
    }

    public function countPersediaanBaikLab($idLab)
    {
        return $this->db->query("SELECT COUNT(id_persediaan) as baik FROM tbl_persediaan
        WHERE kondisi = 'baik' AND id_lab = '$idLab'")->row();
    }

    public function countPersediaanRusakLab($idLab)
    {
        return $this->db->query("SELECT COUNT(id_persediaan) as rusak FROM tbl_persediaan
        WHERE kondisi = 'rusak' AND id_lab = '$idLab'")->row();
    }

    public function countPersediaanHilangLab($idLab)
    {
        return $this->db->query("SELECT COUNT(id_persediaan) as hilang FROM tbl_persediaan
        WHERE kondisi = 'hilang' AND id_lab = '$idLab'")->row();
    }
}
