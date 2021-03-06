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
        if ($email && $password) {
            $cek = $this->db->get_where('user', ['email' => $email])->row_array();
            if ($cek) {
                if ($cek['aktivasi'] == 0) {
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
        } else {
            $result['success'] = 0;
            $result['message'] = 'Key dan Value wajib diisi';
            echo json_encode($result);
        }
    }


    function daftar_post()
    {
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $alamat = $this->input->post('alamat');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $password = $this->input->post('password');
        $nomor_telepon = $this->input->post('nomor_telepon');
        
        $data = [                
            'nama' => $nama,
            'email' => $email,
            'alamat' => $alamat,
            'jenis_kelamin' => $jenis_kelamin,
            'no_telepon' => $nomor_telepon,
            'foto' => 'default.jpg',
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'status' => 3,
            'aktivasi' => 0,
            'waktu_pembuatan' => time()
        ];

        if($nama && $email && $alamat && $jenis_kelamin && $password && $nomor_telepon){
            
            //buat token
            $token = base64_encode(random_bytes(32));
            $datatoken = [
                'email' => $email,
                'token' => $token,
                'tipe' => 'verify',
                'waktubuat' => time()
            ];

            //masukan akun kedalam DB
            $this->db->insert('user', $data);
            $this->db->insert('token', $datatoken);
        
        
            //kirim email
            $this->kirim($token, 'verify'); 

            $result['success'] = 1;
            $result['message'] = 'Pendaftaran berhasil. Silahkan cek email anda untuk melakukan aktivasi.';
            echo json_encode($result);


            //kirim server respon
            $result['success'] = 1;
            $result['message'] = 'Akun Berhasil Didaftarkan';
            echo json_encode($result);

        } else {

            //kirim server respon gagal daftar
            $result['success'] = 0;
            $result['message'] = 'Key dan Value wajib diisi';
            echo json_encode($result);
        }

    }

    function lupa_post()
    {
        $email = $this->input->post('email');
        if ($email) {
            $cekk = $this->db->get_where('user', ['email' => $email, 'aktivasi' => 1])->row_array();
            if ($cekk) {
                $cektoken = $this->db->get_where('token', ['email' => $email, 'tipe' => 'lupapassword']);

                //menyiapkan token
                $token = base64_encode(random_bytes(32));
                $data = [
                    'email' => $email,
                    'token' => $token,
                    'tipe' => 'lupapassword',
                    'waktubuat' => time()
                ];
                if ($cektoken == null) {
                    $this->db->insert('token', $data);

                    //kirim email
                    $this->kirim($token, 'lupapassword');

                    //respon rest api
                    $result['success'] = 1;
                    $result['message'] = 'silakan cek email anda untuk aktifasi ';
                    echo json_encode($result);
                } else {
                    //menghapus token yang sebelumnya sudah ada
                    $this->db->delete('token', ['email' => $email]);

                    //memasukan token kedalam database
                    $this->db->insert('token', $data);

                    //kirim email
                    $this->kirim($token, 'lupapassword');

                    //respon rest api
                    $result['success'] = 1;
                    $result['message'] = 'silakan cek email anda untuk reset password ';
                    echo json_encode($result);
                }
            } else {
                $result['success'] = 0;
                $result['message'] = 'Email Belum Terdaftar';
                echo json_encode($result);
            }
        } else {
            $result['success'] = 0;
            $result['message'] = 'Key dan Value wajib diisi';
            echo json_encode($result);
        }
    }

    function kirim($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'idristifa2020@gmail.com',
            'smtp_pass' => 'ronaldo1604',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('idristifa2020@gmail.com', 'Nursery Polije');
        $this->email->to($this->input->post('email'));
        if ($type == 'verify') {
            $this->email->subject('Aktivasi akun');
            $this->email->message('Aktivasi akun anda 
            <a href="' . base_url() . 'auth/verifikasi?email=' 
            . $this->input->post('email') . '&token=' . urlencode($token) . '">disini</a>');
        } else if ($type == 'lupapassword') {
            $this->email->subject('Reset password');
            $this->email->message('Reset password anda 
            <a href="' . base_url() . 'auth/resetpassword?email=' 
            . $this->input->post('email') . '&token=' . urlencode($token) . '">disini</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
}
