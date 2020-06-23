<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
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

    public function HapusKategori()
    {
        $idB = $this->input->post('id');
        $hapus = $this->KategoriModels->HapusKategori($idB);
        if($hapus = true){
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Data Berhasi di Hapus!
            </div>');
            redirect('Kategori');
        }else{
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
			Data gagal di Hapus!
            </div>');
            redirect('Kategori');
        }
    }
    
    public function tambah()
    {
        
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|is_unique[kategori.nama_kategori]');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
        $this->form_validation->set_rules('gambar_kategori', 'Gambar Kategori', 'trim');

        if ($this->form_validation->run() == false) {
            $judul['judul'] = 'Tambah Kategori';
            $dataB['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('tamplates/headeruser', $dataB);
            $this->load->view('tamplates/sidebaruser', $judul);
            $this->load->view('Kategori/tambahkategori');
            $this->load->view('tamplates/footeruser');
        } else {
            $gambarkategori = $_FILES['gambar_kategori']['name'];

                $config['allowed_types'] = 'jpg|png|gif|jpeg';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/fotokategori/';
        
                $this->load->library('upload' , $config);
                if ($this->upload->do_upload('gambar_kategori')) {
                    $dataPost = array(
                        'nama_kategori' => $this->input->post('nama'),
                        'deskripsi' => $this->input->post('deskripsi'),
                        'gambar_kategori' => $gambarkategori,
                        
                        
                    );
                        $this->KategoriModels->tambahkategori($dataPost);
                        $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
                        Kategori berhasil ditambahkan
                        </div>');
                        redirect('Kategori/tambah');
                    }else{
                        $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
                        '. $this->upload->display_errors().'
                        </div>');
                        redirect('Kategori/tambah');        
                    }
        }
    }

    public function EditKategori()
    {
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Kategori', 'trim|required');
        $this->form_validation->set_rules('gambar_kategori', 'Foto Kategori', 'trim');

        if ($this->form_validation->run() == false) {
            $judul['judul'] = 'Edit Kategori';
            $data['dataB'] = $this->KategoriModels->DataKategori();
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('tamplates/headeruser', $data);
            $this->load->view('tamplates/sidebaruser', $judul);
            $this->load->view('Kategori/index', $data);
            $this->load->view('tamplates/footeruser');
        }else {
            $gambarkategori = $_FILES['gambar_kategori']['name'];

            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/fotokategori/';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar_kategori')) {
                $id_kategori = $this->input->post('id_kategori');
                $nama_kategori = $this->input->post('nama_kategori');
                $deskripsi = $this->input->post('deskripsi');
                $gambar_kategori = $gambarkategori;

                $this->KategoriModels->EditKategori($id_kategori, $nama_kategori, $deskripsi, $gambar_kategori);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Kategori Berhasil Diedit
                 </div>');
                redirect('Kategori');
            }else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                        '. $this->upload->display_errors() .'
                        </div>');
                redirect('Kategori');
                
            }

        }
    }
}