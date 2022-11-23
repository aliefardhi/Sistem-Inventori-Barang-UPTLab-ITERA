<?php

class M_barangmodal extends CI_Model
{
    protected $_table = 'tbl_baranglab';

    public function getBarangLab($idRuang)
    {
        // get specific column only
        $query = $this->db->query("SELECT tbl_baranglab.id_barang_bmn, tbl_baranglab.kondisi, tbl_baranglab.status, tbl_baranglab.keterangan, created_at, updated_at, nama_barang, harga_satuan, tahun_perolehan, deskripsi
        FROM `tbl_baranglab`
        LEFT JOIN v_simona_barang_bmn ON tbl_baranglab.id_barang_bmn = v_simona_barang_bmn.id_barang_bmn
        LEFT JOIN v_simona_barang ON v_simona_barang_bmn.kode_barang = v_simona_barang.kode_barang
        WHERE id_ruang = '$idRuang'");

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
}
