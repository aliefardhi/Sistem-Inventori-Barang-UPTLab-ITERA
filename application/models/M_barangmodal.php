<?php

class M_barangmodal extends CI_Model
{
    protected $_table = 'tbl_baranglab';

    public function getBarangLab($idRuang)
    {
        // get specific column only
        $query = $this->db->query("SELECT tbl_baranglab.id_barang_bmn, tbl_baranglab.kondisi, tbl_baranglab.status, tbl_baranglab.keterangan, tbl_baranglab.created_at, tbl_baranglab.updated_at, nama_barang, harga_satuan, tahun_perolehan, deskripsi, nama_lab, nama_ruangan
        FROM `tbl_baranglab`
        LEFT JOIN v_simona_barang_bmn ON tbl_baranglab.id_barang_bmn = v_simona_barang_bmn.id_barang_bmn
        LEFT JOIN v_simona_barang ON v_simona_barang_bmn.kode_barang = v_simona_barang.kode_barang
        LEFT JOIN tbl_lab ON tbl_baranglab.id_lab = tbl_lab.id_lab
        LEFT JOIN tbl_ruangan ON tbl_baranglab.id_ruang = tbl_ruangan.id_ruang
        WHERE tbl_baranglab.id_ruang = '$idRuang'");

        return $query->result();
    }

    public function getHargaSum()
    {
        return $this->db->query("SELECT SUM(harga_satuan) as harga_satuan
        FROM `tbl_baranglab`
        LEFT JOIN v_simona_barang_bmn ON tbl_baranglab.id_barang_bmn = v_simona_barang_bmn.id_barang_bmn
        LEFT JOIN v_simona_barang ON v_simona_barang_bmn.kode_barang = v_simona_barang.kode_barang
        LEFT JOIN tbl_lab ON tbl_baranglab.id_lab = tbl_lab.id_lab
        LEFT JOIN tbl_ruangan ON tbl_baranglab.id_ruang = tbl_ruangan.id_ruang")->row();
    }

    public function getCountBarang()
    {
        return $this->db->query("SELECT COUNT(id_barang_bmn) as id_barang_bmn FROM `tbl_baranglab`")->row();
    }

    public function getCountBarangRusak()
    {
        return $this->db->query("SELECT COUNT(id_barang_bmn) as rusak FROM `tbl_baranglab` WHERE kondisi = 'Rusak'")->row();
    }

    public function getCountBarangBaik()
    {
        return $this->db->query("SELECT COUNT(id_barang_bmn) as baik FROM `tbl_baranglab` WHERE kondisi = 'Baik'")->row();
    }

    public function getCountBarangHilang()
    {
        return $this->db->query("SELECT COUNT(id_barang_bmn) as hilang FROM `tbl_baranglab` WHERE kondisi = 'Hilang'")->row();
    }

    public function getBarangLabRusak($idRuang)
    {
        // get specific column only
        $query = $this->db->query("SELECT tbl_baranglab.id_barang_bmn, tbl_baranglab.kondisi, tbl_baranglab.status, tbl_baranglab.keterangan, tbl_baranglab.created_at, tbl_baranglab.updated_at, nama_barang, harga_satuan, tahun_perolehan, deskripsi, nama_lab, nama_ruangan
        FROM `tbl_baranglab`
        LEFT JOIN v_simona_barang_bmn ON tbl_baranglab.id_barang_bmn = v_simona_barang_bmn.id_barang_bmn
        LEFT JOIN v_simona_barang ON v_simona_barang_bmn.kode_barang = v_simona_barang.kode_barang
        LEFT JOIN tbl_lab ON tbl_baranglab.id_lab = tbl_lab.id_lab
        LEFT JOIN tbl_ruangan ON tbl_baranglab.id_ruang = tbl_ruangan.id_ruang
        WHERE tbl_baranglab.id_ruang = '$idRuang' AND tbl_baranglab.kondisi = 'Rusak'");

        return $query->result();
    }

    public function getBarangLabHilang($idRuang)
    {
        // get specific column only
        $query = $this->db->query("SELECT tbl_baranglab.id_barang_bmn, tbl_baranglab.kondisi, tbl_baranglab.status, tbl_baranglab.keterangan, tbl_baranglab.created_at, tbl_baranglab.updated_at, nama_barang, harga_satuan, tahun_perolehan, deskripsi, nama_lab, nama_ruangan
        FROM `tbl_baranglab`
        LEFT JOIN v_simona_barang_bmn ON tbl_baranglab.id_barang_bmn = v_simona_barang_bmn.id_barang_bmn
        LEFT JOIN v_simona_barang ON v_simona_barang_bmn.kode_barang = v_simona_barang.kode_barang
        LEFT JOIN tbl_lab ON tbl_baranglab.id_lab = tbl_lab.id_lab
        LEFT JOIN tbl_ruangan ON tbl_baranglab.id_ruang = tbl_ruangan.id_ruang
        WHERE tbl_baranglab.id_ruang = '$idRuang' AND tbl_baranglab.kondisi = 'Hilang'");

        return $query->result();
    }

    public function getExistingBarang($idRuang)
    {
        $query = $this->db->query("SELECT id_barang_bmn, id_ruang FROM tbl_baranglab WHERE id_ruang = '$idRuang'");
        return $query->result();
    }

    public function getBarangBmn()
    {
        $query = $this->db->query("SELECT * FROM `v_simona_barang_bmn`  
        LEFT JOIN v_simona_barang ON v_simona_barang_bmn.kode_barang = v_simona_barang.kode_barang");

        return $query->result();
    }

    public function addBarangLab($data)
    {
        return $this->db->insert($this->_table, $data);
    }

    public function getBarangDetail($idBarangLab)
    {
        $query = $this->db->query("SELECT tbl_baranglab.id_barang_bmn, tbl_baranglab.kondisi, tbl_baranglab.status, tbl_baranglab.keterangan, created_at, updated_at, nama_barang, harga_satuan, tahun_perolehan, deskripsi 
        FROM `tbl_baranglab`
        LEFT JOIN v_simona_barang_bmn ON tbl_baranglab.id_barang_bmn = v_simona_barang_bmn.id_barang_bmn
        LEFT JOIN v_simona_barang ON v_simona_barang_bmn.kode_barang = v_simona_barang.kode_barang
        WHERE tbl_baranglab.id_barang_bmn = '$idBarangLab'");

        return $query->row_array();
    }

    public function editBarangLab($idBarangLab, $data)
    {
        $query = $this->db->set($data);
        $query = $this->db->where('id_barang_bmn', $idBarangLab);
        $query = $this->db->update($this->_table);

        return $query;
    }

    public function deleteBarangLab($idBarangLab)
    {
        return $this->db->delete($this->_table, ['id_barang_bmn' => $idBarangLab]);
    }

    public function getNilaiBarangLab($idLab)
    {
        return $this->db->query("SELECT SUM(harga_satuan) as harga_satuan
        FROM `tbl_baranglab`
        LEFT JOIN v_simona_barang_bmn ON tbl_baranglab.id_barang_bmn = v_simona_barang_bmn.id_barang_bmn
        LEFT JOIN v_simona_barang ON v_simona_barang_bmn.kode_barang = v_simona_barang.kode_barang
        LEFT JOIN tbl_lab ON tbl_baranglab.id_lab = tbl_lab.id_lab
        LEFT JOIN tbl_ruangan ON tbl_baranglab.id_ruang = tbl_ruangan.id_ruang
        WHERE tbl_baranglab.id_lab = '$idLab'")->row();
    }

    public function countBarangModalLab($idLab)
    {
        return $this->db->query("SELECT COUNT(id_barang_bmn) as id_barang_bmn FROM `tbl_baranglab` WHERE id_lab = '$idLab'")->row();
    }

    public function getCountBarangRusakLab($idLab)
    {
        return $this->db->query("SELECT COUNT(id_barang_bmn) as rusak FROM `tbl_baranglab` WHERE kondisi = 'Rusak' AND id_lab = '$idLab'")->row();
    }

    public function getCountBarangBaikLab($idLab)
    {
        return $this->db->query("SELECT COUNT(id_barang_bmn) as baik FROM `tbl_baranglab` WHERE kondisi = 'Baik' AND id_lab = '$idLab'")->row();
    }

    public function getCountBarangHilangLab($idLab)
    {
        return $this->db->query("SELECT COUNT(id_barang_bmn) as hilang FROM `tbl_baranglab` WHERE kondisi = 'Hilang' AND id_lab = '$idLab'")->row();
    }
}
