<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Transaksi extends REST_Controller
{
    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
        $this->load->model('RestTransaksiModels');
    }

    function keranjang_post()
    {
        $email = $this->post('email');
        $id_status_transaksi = $this->post('id_status_transaksi');
        $id_bunga = $this->post('id_bunga');
        $jumlah = $this->post('jumlah');
        $total_harga = $this->post('total_harga');
        if ($email && $id_status_transaksi && $id_bunga && $jumlah && $total_harga) {
            //cek sudah ada data keranjang atau tidak
            $keranjang = $this->db->get_where('transaksi', ["email" => $email, "id_status_transaksi" => 1])->row_array();

            if ($keranjang) {
                $id_transaksi = $keranjang["id_transaksi"];
                $this->RestTransaksiModels->DetailTransaksi(array(
                    'id_detail_transaksi' => '',
                    'id_transaksi' => $id_transaksi,
                    'id_bunga' => $id_bunga,
                    'jumlah' => $jumlah,
                    'total_harga' => $total_harga
                ));

                //mengirim respon
                $result['success'] = 1;
                $result['message'] = 'Bunga Berhasil Dimasukan Kedalam Keranjang';
                echo json_encode($result);
            } else {
                $this->RestTransaksiModels->transaksi(array(
                    'id_transaksi' => '',
                    'id_pembayaran' => '',
                    'id_status_transaksi' => $id_status_transaksi,
                    'email' => $email,
                    'tanggal_transaksi' => time(),
                    'alamat' => '',
                    'total' => '',
                    'bukti' => ''
                ));

                //ambil id transaksi yang baru saja di tambahkan
                $ambil_ID = $this->db->get_where('transaksi', ["email" => $email, "id_status_transaksi" => 1])->row_array();
                $id_transaksi = $ambil_ID["id_transaksi"];

                //masukan data kedalam detail transaksi
                $this->RestTransaksiModels->DetailTransaksi(array(
                    'id_detail_transaksi' => '',
                    'id_transaksi' => $id_transaksi,
                    'id_bunga' => $id_bunga,
                    'jumlah' => $jumlah,
                    'total_harga' => $total_harga
                ));

                //mengirim respon
                $result['success'] = 1;
                $result['message'] = 'Bunga Berhasil Dimasukan Kedalam Keranjang';
                echo json_encode($result);

            }
        } else {
            $result['success'] = 0;
            $result['message'] = 'Key dan Value Harus Diisi';
            echo json_encode($result);
        }
    }
}
