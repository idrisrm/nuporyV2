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

    public function Kemas()
    {
        $data['kemas'] = $this->TransaksiModels->Kemas();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('tamplates/headeruser', $data);
        $this->load->view('tamplates/sidebaruser');
        $this->load->view('Transaksi/Kemas');
        $this->load->view('tamplates/footeruser');
    }

    public function Dikirim()
    {
        $data['dikirim'] = $this->TransaksiModels->Dikirim();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('tamplates/headeruser', $data);
        $this->load->view('tamplates/sidebaruser');
        $this->load->view('Transaksi/Dikirim');
        $this->load->view('tamplates/footeruser');
    }
    
    public function Selesai()
    {
        $data['selesai'] = $this->TransaksiModels->Selesai();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('tamplates/headeruser', $data);
        $this->load->view('tamplates/sidebaruser');
        $this->load->view('Transaksi/Selesai');
        $this->load->view('tamplates/footeruser');
    }
}
