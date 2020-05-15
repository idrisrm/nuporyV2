<?php

    class TransaksiModels extends CI_Model
    {
        public function Tagihan(){
            $this->db->join('pembayaran', 'pembayaran.id = transaksi.id_pembayaran');
            $this->db->join('status_transaksi', 'status_transaksi.id = transaksi.id_status_transaksi');
            return $this->db->get_where('transaksi', ["id_status_transaksi" => 2])->result_array();
        }

        public function DetailTagihan($id_transaksi){
            return $this->db->get_where('transaksi', ["id_transaksi" => $id_transaksi])->row_array();
        }

        public function Kemas()
        {
            $this->db->join('pembayaran', 'pembayaran.id = transaksi.id_pembayaran');
            $this->db->join('status_transaksi', 'status_transaksi.id = transaksi.id_status_transaksi');
            return $this->db->get_where('transaksi', ["id_status_transaksi" => 3])->result_array();
        }

        public function Dikirim(){
            $this->db->join('pembayaran', 'pembayaran.id = transaksi.id_pembayaran');
            $this->db->join('status_transaksi', 'status_transaksi.id = transaksi.id_status_transaksi');
            return $this->db->get_where('transaksi', ["id_status_transaksi" => 4])->result_array();
        }

        public function Selesai(){
            $this->db->join('pembayaran', 'pembayaran.id = transaksi.id_pembayaran');
            $this->db->join('status_transaksi', 'status_transaksi.id = transaksi.id_status_transaksi');
            return $this->db->get_where('transaksi', ["id_status_transaksi" => 5])->result_array();
        }
    }



?>