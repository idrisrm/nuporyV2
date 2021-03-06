<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kritik extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belumlogin();
        $this->load->model('KritikModels');
        $this->load->library('form_validation');
        
    }

    public function index()
    {
        $judul['judul'] = 'Halaman Kritik';
        $dataK['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $dataK['dataK'] = $this->KritikModels->DataKritik();
        $this->load->view('tamplates/headeruser', $dataK);
        $this->load->view('tamplates/sidebaruser', $judul);
        $this->load->view('Kritik/index');
        $this->load->view('tamplates/footeruser');
    }

    public function HapusKritik()
    {
        $id = $this->input->post('id');
        $hapus = $this->KritikModels->HapusKritik($id);
        if ($hapus = true) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Data Berhasi di Hapus!
            </div>');
            redirect('kritik');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
			Data gagal di Hapus!
            </div>');
            redirect('kritik');
        }
    }
}