<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        belumlogin();
        $this->load->model('KategoriModels');
        $this->load->library('form_validation');
        // cekadmin();
    }

    public function index()
    {
        $judul['judul'] = 'Halaman Kategori';
        $dataB['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $dataB['dataB'] = $this->KategoriModels->DataKategori();
        $this->load->view('tamplates/headeruser', $dataB);
        $this->load->view('tamplates/sidebaruser', $judul);
        $this->load->view('Kategori/index', $dataB);
        $this->load->view('tamplates/footeruser');
    }

    public function HapusKategori(){
        $idB = $this->input->post('id_Kategori');
        $hapus = $this->KategoriModels->HapusKategori($idB);
        if($hapus = true){
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Data Berhasi di Hapus!
            </div>');
            redirect('kategori');
        }else{
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
			Data gagal di Hapus!
            </div>');
            redirect('Kategori');
        }
    }
    
    // public function tambah()
    // {

    //     $this->form_validation->set_rules('nama', 'Nama', 'trim|required|is_unique[user.nama]');
    //     $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]');
    //     $this->form_validation->set_rules('jeniskelamin', 'Jenis Kelamin', 'trim|required');
    //     $this->form_validation->set_rules('nohp', 'No Hp', 'trim|required|is_unique[user.no_telepon]|numeric');

    //     if ($this->form_validation->run() == false) {
    //         $judul['judul'] = 'Tambah Bunga';
    //         $dataB['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    //         $this->load->view('tamplates/headeruser', $data);
    //         $this->load->view('tamplates/sidebaruser', $judul);
    //         $this->load->view('Bunga/tambahbunga', $dataB);
    //         $this->load->view('tamplates/footeruser');
    //     } else {
    //         $fotobunga = $_FILES['foto_bunga']['name'];

    //             $config['allowed_types'] = 'jpg|png|gif|jpeg';
    //             $config['max_size'] = '2048';
    //             $config['upload_path'] = './assets/img/foto/';
        
    //             $this->load->library('upload' , $config);
    //             if ($this->upload->do_upload('foto_bunga')) {
    //                 $dataPost = array(
    //                     'id_bunga' =>$this->input->post('id_bunga'),
    //                     'id_kategori' => $this->input->post('id_kategori'),
    //                     'nama_bunga' => $this->input->post('nama_bunga'),
    //                     'harga' => $this->input->post('harga'),
    //                     'stok' => $this->input->post('stok'),
    //                     'foto_bunga' => $fotobunga,
    //                     'cara_perawatan' => $this->input->post('cara_perawatan'),
    //                     'deskripsi' => $this->input->post('deskripsi'),
                        
                        
    //                 );
    //                 if ($this->BungaModels->tambahbunga($dataPost)) {
    //                     $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
    //                     Data Kasus Berhasil Dikirim , Silahkan Tunggu Konfirmasi Dari Admin
    //                     </div>');
    //                     redirect('bunga');
    //                 }else{
    //                     $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">GAGAL</div>');
    //                     redirect('bunga');
    //                 }
    //     }
    // }
}