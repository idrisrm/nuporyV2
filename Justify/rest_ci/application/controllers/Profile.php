<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Profile extends REST_Controller
{
    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    function index_post()
    {
        $id = $this->post('id');
        if ($id) {
            $cek = $this->db->get_where('user', ['id' => $id])->row_array();

            if ($cek) {
                $cek['foto'] = 'http://192.168.43.243/nuporyV2/Justify/assets/img/foto/' . $cek['foto'];
                $cek['waktu_pembuatan'] = date('d F Y', $cek['waktu_pembuatan']);
                // $cek['foto'] = base_url('assets/img/foto/') . $cek['foto'];
                $result['profile'] = array();
                array_push($result['profile'], $cek);
                $result['success'] = 1;
                $result['message'] = 'Berhasil';
                echo json_encode($result);
            } else {
                $result['success'] = 0;
                $result['message'] = 'Akun Tidak Ditemukan';
                echo json_encode($result);
            }
        } else {
            $result['success'] = 0;
            $result['message'] = 'key dan Value wajib diisi';
            echo json_encode($result);
        }
    }
}
