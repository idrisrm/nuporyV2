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

    function Keranjang_post()
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
                    'alamat_pengiriman' => '',
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
        $this->load->model('RestTransaksiModels');
    }

    function KeranjangUser_get()
    {
        $email = $this->get('email');
        $keranjang = $this->db->get_where('transaksi', ["email" => $email, "id_status_transaksi" => 1])->row_array();
        if ($keranjang) {
            $id_transaksi = $keranjang['id_transaksi'];
            $this->db->join('bunga', 'bunga.id_bunga = detail_transaksi.id_bunga');
            $bunga = $this->db->get_where('detail_transaksi', ['id_transaksi' => $id_transaksi])->result();

            $result['keranjang'] = $bunga;
            $result['success'] = 1;
            $result['message'] = 'Berhasil';
            echo json_encode($result);
        } else {
            $result['success'] = 0;
            $result['message'] = 'Kamu Belum Memasukan Barang Ke Dalam Keranjang';
            echo json_encode($result);
        }
    }

    function CheckOut_put()
    {
        $id_transaksi = $this->put('id_transaksi');
        $alamat = $this->put('alamat');
        if ($id_transaksi && $alamat) {

            $this->RestTransaksiModels->CheckOut($id_transaksi, array(
                'alamat_pengiriman' => $alamat,
                'id_status_transaksi' => 2
            ));
            $result['success'] = 1;
            $result['message'] = 'Berhasil';
            echo json_encode($result);
        } else {
            $result['success'] = 0;
            $result['message'] = 'Key dan Value Wajib Diisi';
            echo json_encode($result);
        }
    }

    function CheckOut_get()
    {
        $email = $this->get('email');
        if ($email) {
            $data = $this->db->get_where('transaksi', ['email' => $email])->result();

            $result['data'] = $data;
            $result['success'] = 1;
            $result['message'] = 'success';
            echo json_encode($result);
        } else {
            $result['success'] = 0;
            $result['message'] = 'Key dan Value Wajib Diisi';
            echo json_encode($result);
        }
    }

    function Tagihan_get()
    {
        $email = $this->get('email');
        if ($email) {
            $tagihan = $this->db->get_where('transaksi', ['email' => $email, 'id_status_transaksi' => 2])->result();
            if ($tagihan) {
                $result['tagihan'] = $tagihan;
                $result['success'] = 1;
                $result['message'] = 'success';
                echo json_encode($result);
            } else {
                $result['success'] = 0;
                $result['message'] = 'Anda masih belum memiliki tagihan barang';
                echo json_encode($result);
            }
        } else {
            $result['success'] = 0;
            $result['message'] = 'Key dan Value Wajib Diisi';
            echo json_encode($result);
        }
    }

    function DetailTagihan_get()
    {
        $id_transaksi = $this->get('id_transaksi');
        if ($id_transaksi) {
            $this->db->join('detail_transaksi', 'detail_transaksi.id_transaksi = transaksi.id_transaksi');
            $hasil = $this->db->get_where('transaksi', ["transaksi.id_transaksi" => $id_transaksi])->result();

            $result['tagihan'] = $hasil;
            $result['success'] = 1;
            $result['message'] = 'success';
            echo json_encode($result);
        } else {
            $result['success'] = 0;
            $result['message'] = 'Key dan Value Wajib Diisi';
            echo json_encode($result);
        }
    }

    function Tagihan_post()
    {
        $id_transaksi = $this->post('id_transaksi');
        $bukti = $_POST['bukti'];
        $target_dir = '../assets/img/fotobukti/';

        // echo json_encode($id_transaksi);
        // echo $bukti;
        if ($id_transaksi && $bukti) {
            $namaFile = rand() . "_" . time() . ".jpeg";
            $target_dir = $target_dir . "/" . $namaFile;
            if (file_put_contents($target_dir, base64_decode($bukti))) {

                $this->db->set('bukti', $namaFile);
                $this->db->where('id_transaksi', $id_transaksi);
                $this->db->update('transaksi');

                $result['success'] = 1;
                $result['message'] = 'Berhasil';
                echo json_encode($result);
            } else {
                $result['success'] = 0;
                $result['message'] = 'Gagal Upload Gambar';
                echo json_encode($result);
            }
        } else {
            $result['success'] = 0;
            $result['message'] = 'Key dan Value Wajib Diisi';
            echo json_encode($result);
        }





        // $id_transaksi = $this->post('id_transaksi');
        // $ubahfoto = $_FILES['bukti']['name'];
        // if ($id_transaksi && $ubahfoto) {
        //     $config['allowed_types'] = 'jpg|png|gif|jpeg';
        //     $config['max_size'] = '2048';
        //     $config['upload_path'] = '../assets/img/fotobukti/';

        //     $this->load->library('upload', $config);

        //     if ($this->upload->do_upload('bukti')) {

        //         // $fotolama = $data['user']['foto'];
        //         // if ($fotolama != 'default.jpg') {
        //         //     unlink(FCPATH . 'assets/img/foto/' . $fotolama);
        //         // }
        //         $namaFileBukti = $this->upload->data('file_name');
        //         $this->db->set('bukti', $namaFileBukti);
        //         $this->db->where('id_transaksi', $id_transaksi);
        //         $this->db->update('transaksi');

        //         $result['success'] = 1;
        //         $result['message'] = 'Bukti Berhasil DiUpload';
        //         echo json_encode($result);
        //     } else {
        //         $result['success'] = 0;
        //         $result['message'] = $this->upload->display_errors();
        //         echo json_encode($result);
        //     }
        // } else {
        //     $result['success'] = 0;
        //     $result['message'] = 'Key dan Value Wajib Diisi';
        //     echo json_encode($result);
        // }
    }

    function Dikemas_get()
    {
        $email = $this->get('email');
        if ($email) {
            $dikemas = $this->db->get_where('transaksi', ['email' => $email, 'id_status_transaksi' => 3])->result();

            if ($dikemas) {
                $result['dikemas'] = $dikemas;
                $result['success'] = 1;
                $result['message'] = 'success';
                echo json_encode($result);
            } else {
                $result['success'] = 0;
                $result['message'] = 'Anda masih belum memiliki barang yang dikemas';
                echo json_encode($result);
            }
        } else {
            $result['success'] = 0;
            $result['message'] = 'Key dan Value Wajib Diisi';
            echo json_encode($result);
        }
    }

    function Dikirim_get()
    {
        $email = $this->get('email');
        if ($email) {
            $dikemas = $this->db->get_where('transaksi', ['email' => $email, 'id_status_transaksi' => 4])->result();

            if ($dikemas) {
                $result['dikemas'] = $dikemas;
                $result['success'] = 1;
                $result['message'] = 'success';
                echo json_encode($result);
            } else {
                $result['success'] = 0;
                $result['message'] = 'Anda masih belum memiliki barang yang dikirm';
                echo json_encode($result);
            }
        } else {
            $result['success'] = 0;
            $result['message'] = 'Key dan Value Wajib Diisi';
            echo json_encode($result);
        }
    }
}
