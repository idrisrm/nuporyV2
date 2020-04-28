<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Auth extends REST_Controller
{
    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    function index_post()
    {
        $email = $this->post('email');
        $password = $this->post('password');
        $cek = $this->db->get_where('user', ['email' => $email])->result_array();
        
        if ($cek) {
            $cek = $cek[0];
            if ($cek['aktivasi'] == 0) {
                // $this->response('Akun Anda belum di Aktifasi');
                $result['login'] = array();
                array_push($result['login']);
                $result['success'] = 0;
                $result['message'] = 'Akun Anda Belum Diaktivasi';

                echo json_encode($result);
            } else {
                if (password_verify($password, $cek['password'])) {

                    $result['login'] = array();
                    $index = $cek;
                    array_push($result['login'], $index);
                    $result['success'] = 1;
                    $result['message'] = 'success';

                    echo json_encode($result);
                } else {
                    // $this->response('Password Salah');

                    $result['login'] = array();
                    array_push($result['login']);
                    $result['success'] = 0;
                    $result['message'] = 'Password Salah';
                    echo json_encode($result);
                }
            }
        } else {
            $result['login'] = array();
            array_push($result['login']);
            $result['success'] = 0;
            $result['message'] = 'Akun Anda Belum Terdaftar';
            echo json_encode($result);
        }
    }
}