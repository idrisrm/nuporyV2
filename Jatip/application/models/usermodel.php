<?php
class Usermodel extends CI_Model
{


    public function get()
    {
        return $this->db->get('user')->result();
    }

    //tambah admin
    public function tambahadmin($data = array())
    {
        $this->db->insert('user', $data);
    }
}
