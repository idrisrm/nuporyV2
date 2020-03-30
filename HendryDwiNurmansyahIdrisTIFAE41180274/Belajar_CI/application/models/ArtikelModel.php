<?php
class ArtikelMOdel extends CI_Model
{
    public function __construct(){
        parent:: __construct();
        $this->load->database();
    }
    public function get()
    {
        return $this->db->get("artikel")->result();
    }
    public function detail($id)
    {
        $this->db->where("id", $id);
        return $this->db->get("artikel")->result();
    }
    public function tambah($data = array())
    {
        return $this->db->insert("artikel", $data);
    }
    public function ubah($data = array(), $id)
    {
        $this->db->where("id", $id);
        return $this->db->update("artikel", $data);
    }
    public function hapus($id)
    {
        $this->db->where("id", $id);
        return $this->db->delete("artikel");
    }
}
