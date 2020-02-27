<?php
    class UserModel extends CI_Model{
        public function get (){
            //memanggil database
            $this->load->database();

            //select data
            $this->db->select("*");

            //ambil data dengan query
            $query = $this->db->get('pegawai');
            return $query->result();//untuk menampilkan hasil
        }

        public function tambah($data){
            $this->load->database();
            $query = $this->db->insert('pegawai', $data);
        }

        public function ubah($data = array(), $id){
            $this->load->database();
            $this->db->where('id', $id);
            return $this->db->update('pegawai', $data);
        }

        public function hapus($id){
            $this->load->database();
            $this->db->where('id', $id);
            return $this->db->delete('pegawai');
        }
    }
?>