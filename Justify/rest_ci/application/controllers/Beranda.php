<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Beranda extends REST_Controller
{
    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    function index_post()
    {
        $id_bunga = $this->post('id_bunga');
        $id_kategori = $this->post('id_kategori');
        $nama_bunga = $this->post('nama_bunga');

        if ($id_bunga) {
            $hasil = $this->db->get_where('bunga', ['id_bunga' => $id_bunga])->row_array();

            $result['bunga'] = array();
            $index = $hasil;
            array_push($result['bunga'], $index);
            $result['success'] = 1;
            $result['message'] = 'success';
            echo json_encode($result);
        } else if ($id_kategori) {
            $hasil = $this->db->get_where('bunga', ['id_kategori' => $id_kategori])->result();

            $result['bunga'] = $hasil;
            $result['success'] = 1;
            $result['message'] = 'success';
            echo json_encode($result);
        } else if ($nama_bunga) {
            $this->db->like('nama_bunga', $nama_bunga, 'both');
            $hasil = $this->db->get('bunga')->result();

            if ($hasil) {

                $result['bunga'] = $hasil;
                $result['success'] = 1;
                $result['message'] = 'success';
                echo json_encode($result);
            } else {

                $result['success'] = 0;
                $result['message'] = 'Bunga yang anda cari tidak ditemukan';
                echo json_encode($result);
            }
        } else {
            $hasil = $this->db->get('bunga')->result();

            $result['bunga'] = $hasil;
            $result['success'] = 1;
            $result['message'] = 'success';
            echo json_encode($result);
        }
    }
}
