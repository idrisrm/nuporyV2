<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

use Restserver\Libraries\REST_Controller;

class Kritik extends REST_Controller
{
    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->database();
    }

    //kritik
    function index_post()
    {
        $nama = $this->input->post('nama');
        $isi_kritik = $this->input->post('isi_kritik');

        $data = [
            'nama' => $nama,
            'isi_kritik' => $isi_kritik
        ];

        if ($nama && $isi_kritik) {
            //input kritik dalam db
            $this->db->insert('kritik', $data);

            //pesan berhasil
            $result['success'] = 1;
            $result['message'] = 'Kritik Anda Berhasil Dikirim';
            echo json_encode($result);
        }else {
            //Pesan gagal
            $result['success'] = 0;
            $result['message'] = 'Kritik Anda Gagal Dikirim, Silakan Coba Kembali';
            echo json_encode($result);
        }
        
    }

}
