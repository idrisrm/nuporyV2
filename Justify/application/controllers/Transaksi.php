<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belumlogin();
        $this->load->model('TransaksiModels');
        $this->load->library('form_validation');
        // cekadmin();
    }

    public function Tagihan()
    {
        $data['tagihan'] = $this->TransaksiModels->Tagihan();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('tamplates/headeruser', $data);
        $this->load->view('tamplates/sidebaruser');
        $this->load->view('Transaksi/Tagihan');
        $this->load->view('tamplates/footeruser');
    }

    public function DetailTagihan($id_transaksi = ''){
        if($id_transaksi == ''){
            redirect('Transaksi/Tagihan');
        }
        $data['DetailTagihan'] = $this->TransaksiModels->DetailTagihan($id_transaksi);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('tamplates/headeruser', $data);
        $this->load->view('tamplates/sidebaruser');
        $this->load->view('Transaksi/Detailtagihan', $data);
        $this->load->view('tamplates/footeruser');
    }
}
