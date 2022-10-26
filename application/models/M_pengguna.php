<?php

class M_pengguna extends CI_Model
{
    protected $_table = 'tbl_pengguna';

    public function addUser($data)
    {
        return $this->db->insert($this->_table, $data);
    }

    public function getPengguna()
    {
        $query = $this->db->query("SELECT * FROM tbl_pengguna LEFT JOIN tbl_pegawai_upt ON tbl_pengguna.id_pegawai = tbl_pegawai_upt.id_pegawai LEFT JOIN v_simuk_pegawai ON tbl_pegawai_upt.id_pegawai = v_simuk_pegawai.id_pegawai LEFT JOIN tbl_lab ON tbl_pegawai_upt.id_lab = tbl_lab.id_lab");

        return $query->result();
    }

    public function getPenggunaDetail($id)
    {
        $query = $this->db->query("SELECT * FROM tbl_pengguna LEFT JOIN tbl_pegawai_upt ON tbl_pengguna.id_pegawai = tbl_pegawai_upt.id_pegawai LEFT JOIN v_simuk_pegawai ON tbl_pegawai_upt.id_pegawai = v_simuk_pegawai.id_pegawai LEFT JOIN tbl_lab ON tbl_pegawai_upt.id_lab = tbl_lab.id_lab WHERE tbl_pengguna.id_pegawai = '$id'");

        return $query->row();
    }

    public function getPenggunaByUsername($username)
    {
        $query = $this->db->query("SELECT * FROM tbl_pengguna LEFT JOIN tbl_pegawai_upt ON tbl_pengguna.id_pegawai = tbl_pegawai_upt.id_pegawai LEFT JOIN v_simuk_pegawai ON tbl_pegawai_upt.id_pegawai = v_simuk_pegawai.id_pegawai LEFT JOIN tbl_lab ON tbl_pegawai_upt.id_lab = tbl_lab.id_lab WHERE username = '$username'");

        return $query->row();
    }

    public function editPenggunaByUsername($data, $username)
    {
        $query = $this->db->set($data);
        $query = $this->db->where(['username' => $username]);
        $query = $this->db->update($this->_table, $data);
        return $query;
    }

    public function deleteUser($id_pegawai)
    {
        return $this->db->delete($this->_table, ['id_pegawai' => $id_pegawai]);
    }

    public function editPengguna($data, $id)
    {
        $query = $this->db->set($data);
        $query = $this->db->where(['id_pegawai' => $id]);
        $query = $this->db->update($this->_table, $data);
        return $query;
    }

    public function login_user($username, $password)
    {
        $this->db->where('username', $username);
        $result = $this->db->get('tbl_pengguna');

        $db_password = $result->row('password');

        if (password_verify($password, $db_password)) {
            // return $result->row(0)->id;
            return $result->row();
        } else {
            return false;
        }
    }

    public function getUsername($username)
    {
        $query = $this->db->get_where($this->_table, ['username' => $username]);
        return $query->row();
    }
}
