<?php

    class RestTransaksiModels extends CI_Model
    {

        public function transaksi($data = array()){
            $this->db->insert('transaksi', $data);
        }

        public function DetailTransaksi($data = array()){
            $this->db->insert('detail_transaksi', $data);
        }

        public function CheckOut($id_transaksi, $data = array()){
            $this->db->set($data);
            $this->db->where('id_Transaksi', $id_transaksi);
            $this->db->update('transaksi');
        }

    }