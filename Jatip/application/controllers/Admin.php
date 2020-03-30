<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        belumlogin();
        cekadmin();
    }

    public function index()
    {
        $judul['judul'] = 'Halaman Admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('tamplates/sidebaruser', $judul);
        $this->load->view('tamplates/headeruser', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('tamplates/footeruser');
    }



    public function ubahdata($id)
    {

        $this->form_validation->set_rules('nama_komunitas', 'Nama Komunitas', 'required');
        $this->form_validation->set_rules('email_komunitas', 'Email Komunitas', 'required|valid_email|is_unique[komunitas.EMAIL]|trim');
        $this->form_validation->set_rules('ketua_komunitas', 'Ketua Komunitas', 'required');
        $this->form_validation->set_rules('kategori_komunitas', 'Kategori Komunitas', 'required');
        $this->form_validation->set_rules('alamat_komunitas', 'Alamat Komunitas', 'required');
        $this->form_validation->set_rules('deskripsi_komunitas', 'Deskripsi Komunitas', 'required');
        $this->form_validation->set_rules('no_komunitas', 'No Komunitas', 'required');

        $kategori['jeniskomunitas'] = $this->model_komunitas->jeniskomunitas();
        $kategori['komunitas'] = $this->model_komunitas->relasi($id);
        $kategori['data'] = $this->model_komunitas->getdetail($id);


        if ($this->form_validation->run() == false) {
            $this->load->view("admin/komunitas/editkomunitas", $kategori);
        } else {
            if ($this->input->method() == "post") {
                $update = $this->model_komunitas->updatedata(array(
                    'NAMA' => $this->input->post('nama_komunitas'),
                    'EMAIL' => $this->input->post('email_komunitas'),
                    'NAMA_KETUA' => $this->input->post('ketua_komunitas'),
                    'ID_KATEGORI' => $this->input->post('kategori_komunitas'),
                    'ALAMAT' => $this->input->post('alamat_komunitas'),
                    'DESKRIPSI_KOMUNITAS' => $this->input->post('deskripsi_komunitas'),
                    'NO_TELEPON' => $this->input->post('no_komunitas'),
                    'TWITTER' => $this->input->post('twitter_komunitas'),
                    'FACEBOOK' => $this->input->post('facebook_komunitas'),
                    'INSTAGRAM' => $this->input->post('ig_komunitas')
                ), $id);

                if ($update) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
						Berhasil Mengubah Data!
					</div>');
                    redirect('admin/komunitas');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
						Gagal Mengubah Data!
					</div>');
                    redirect('admin/komunitas');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
			    Gagal Banget !
                   </div>');
                redirect('admin/komunitas');
            }
        }
        // var_dump($kategori);
    }
}
