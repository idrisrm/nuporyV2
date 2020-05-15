<?php

    class RestTransaksiModels extends CI_Model
    {

        public function transaksi($data = array()){
            $this->db->insert('transaksi', $data);
        }

        public function DetailTransaksi($data = array()){
            $this->db->insert('detail_transaksi', $data);
        }

    }