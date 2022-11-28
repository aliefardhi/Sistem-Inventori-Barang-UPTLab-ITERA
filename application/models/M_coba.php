<?php

class M_coba extends CI_Model
{
    public function addData($data)
    {
        $this->db->insert_batch('tbl_coba', $data);
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getData()
    {
        return $this->db->get('tbl_coba')->result();
    }
}
