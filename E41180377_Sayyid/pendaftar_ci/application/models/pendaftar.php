<?php
class Pendaftar extends CI_Model
{
    //menampilkan data
    public function get()
    {
        $this->load->database();
        return $this->db->get("pendaftar")->result();
    }
    //mendapatkan 4 data random
    public function getRandom()
    {
        $this->load->database();
        $this->db->order_by("id", "RANDOM");
        $this->db->limit(4);
        return $this->db->get("Pendaftar")->result();
    }
    // detail data
    public function detail($id)
    {
        $this->load->database();
        $this->db->where("id", $id);
        return $this->db->get("Pendaftar")->result();
    }
    //menambah data
    public function insert( $data = array())
    {
        $this->load->database();
        return $this->db->insert("pendaftar", $data);
    }
}
?>