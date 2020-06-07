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
                $cek['foto'] = 'http://192.168.43.11/nuporyV2/Justify/assets/img/foto/' . $cek['foto'];
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

    function ubah_put()
    {
        
        $email = $this->put('email');
        $cek = $this->db->get_where('user', ['email' => $email])->row_array();
        $password = $this->put('password');
        $passwordbaru = $this->put('passwordbaru');
        $konfirmasi = $this->put('konfirmasi');


        if (password_verify($password, $cek['password'])) {

            
            if ($password !== $passwordbaru) {
                    

                if ($passwordbaru == $konfirmasi) {

                    $ubahpassword = password_hash($konfirmasi, PASSWORD_DEFAULT);

                    $this->db->set('password', $ubahpassword);
                    $this->db->where('email', $cek['email']);
                    $this->db->update('user');

                    $result['success'] = 1;
                    $result['message'] = 'Password Berhasil Diubah';
                    echo json_encode($result);
                    
                }else {
                    $result['success'] = 0;
                    $result['message'] = 'Konfirmasi Password Salah';
                    echo json_encode($result);

                }
                
            }else {
                $result['success'] = 0;
                $result['message'] = 'Password Sudah Digunakan';
                echo json_encode($result);
                
            }
            
            // if ($password == $passwordbaru) {
            //     $result['success'] = 0;
            //     $result['message'] = 'Password Sudah Digunakan';
            //     echo json_encode($result);
                
            // }else {
            //     $ubahpassword = password_hash($konfirmasi, PASSWORD_DEFAULT);

            //     $this->db->set('password', $ubahpassword);
            //     $this->db->where('email', $cek['email']);
            //     $this->db->update('user');

            //     $result['success'] = 1;
            //     $result['message'] = 'Password Berhasil Diubah';
            //     echo json_encode($result);  
            // }

            
        }else {
            $result['success'] = 0;
            $result['message'] = 'Password Salah';
            echo json_encode($result);
        }
         
    }

    function ubahProfil_post()
    {
        $email = $this->input->post('email');
        $cek = $this->db->get_where('user', ['email' => $email])->row_array();
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $notel = $this->input->post('notel');
        $jk = $this->input->post('jk');

        $this->db->set('nama', $nama);
        $this->db->set('alamat', $alamat);
        $this->db->set('no_telepon', $notel);
        $this->db->set('jenis_kelamin', $jk);
        $this->db->where('email', $cek['email']);
        $this->db->update('user');

        $result['success'] = 1;
        $result['message'] = 'Profil berhasil diperbarui';
        echo json_encode($result);
    }
}
