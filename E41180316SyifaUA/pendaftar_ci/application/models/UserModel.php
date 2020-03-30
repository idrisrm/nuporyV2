<?php
class UserModel extends CI_Model {
    public function get () {
        $this->load->database(); //memanggil database
        //select data tabel pegawai
        $this->db->select("*");
//select data, apabila semua data tulis *
$thi->db->select("*");
//ambil data tabel pegawai
$query = $this->db->get('pegawai');
return $query->result(); //untuk menampilkan
    }
}