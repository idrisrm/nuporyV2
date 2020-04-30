<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bunga extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        belumlogin();
        $this->load->model('BungaModels');
        $this->load->library('form_validation');
        // cekadmin();
    }

    public function index()
    {
        $judul['judul'] = 'Halaman Bunga';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['dataB'] = $this->BungaModels->DataBunga();
        $data['kategori'] = $this->BungaModels->kategoribunga();
        $this->load->view('tamplates/headeruser', $data);
        $this->load->view('tamplates/sidebaruser', $judul);
        $this->load->view('Bunga/index', $data);
        $this->load->view('tamplates/footeruser');
    }

    public function HapusBunga()
    {
        $idB = $this->input->post('id');
        $hapus = $this->BungaModels->HapusBunga($idB);
        if ($hapus = true) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Data Berhasi di Hapus!
            </div>');
            redirect('bunga');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
			Data gagal di Hapus!
            </div>');
            redirect('bunga');
        }
    }

    public function tambahbunga()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|is_unique[bunga.nama_bunga]');
        $this->form_validation->set_rules('kategori', 'Kategori Bunga', 'trim|required');
        $this->form_validation->set_rules('harga', 'Harga', 'trim|required|numeric');
        $this->form_validation->set_rules('stok', 'Stok Bunga', 'trim|required|numeric');
        $this->form_validation->set_rules('foto', 'Foto Bunga', 'trim');
        $this->form_validation->set_rules('cara', 'Cara perawatan', 'trim|required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Bunga', 'trim|required');

        if ($this->form_validation->run() == false) {
            $judul['judul'] = 'Tambah Bunga';
            $data['kategori'] = $this->db->get('kategori')->result_array();
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('tamplates/headeruser', $data);
            $this->load->view('tamplates/sidebaruser', $judul);
            $this->load->view('Bunga/tambahbunga');
            $this->load->view('tamplates/footeruser');
        } else {
            $fotobunga = $_FILES['foto']['name'];

            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '2048';
            $config['upload_path'] = './assets/img/fotobunga/';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto')) {
                $dataPost = array(
                    'nama_bunga' => $this->input->post('nama'),
                    'id_kategori' => $this->input->post('kategori'),
                    'harga' => $this->input->post('harga'),
                    'stok' => $this->input->post('stok'),
                    'foto_bunga' => $fotobunga,
                    'cara_perawatan' => $this->input->post('cara'),
                    'deskripsi_bunga' => $this->input->post('deskripsi'),


                );
                $this->BungaModels->tambahbunga($dataPost);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                        Bunga Berhasil Ditambahkan
                        </div>');
                redirect('bunga/tambahbunga');
            }else{
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                        '. $this->upload->display_errors() .'
                        </div>');
                redirect('bunga/tambahbunga');
            }
        }
    }
    
    public function EditBunga()
    {
        $id_bunga = $this->input->post('id_bunga');
        $nama_bunga = $this->input->post('nama_bunga');
        $kategori = $this->input->post('kategori');
        $harga = $this->input->post('harga');
        $stok = $this->input->post('stok');
        $foto_bunga = $this->input->post('foto_bunga');
        $cara_perawatan = $this->input->post('cara_perawatan');
        $deskripsi = $this->input->post('deskripsi');
        $this->BungaModels->EditBunga($id_bunga, $nama_bunga, $kategori, $harga, $stok, $foto_bunga, $cara_perawatan, $deskripsi);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Bunga Berhasil Diedit
        </div>');
        redirect('bunga');
    }
}
