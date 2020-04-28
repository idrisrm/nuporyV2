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
        $cek = $this->db->get_where('user', ['id' => $id])->result_array();

        if ($cek) {
            $cek = $cek[0];
            $result['profile'] = array();
            array_push($result['profile'], $cek);
            $result['success'] = 1;
            $result['message'] = 'Berhasil';
            echo json_encode($result);
        } else {
            $result['login'] = array();
            array_push($result['profile']);
            $result['success'] = 0;
            $result['message'] = 'Akun Tidak Ditemukan';
            echo json_encode($result);
        }
    }
}
