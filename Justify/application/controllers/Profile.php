<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        belumlogin();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $judul['judul'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('tamplates/headeruser', $data);
        $this->load->view('tamplates/sidebaruser', $judul);
        $this->load->view('Profile/index', $data);
        $this->load->view('tamplates/footeruser');
    }

    public function ubahpassword()
    {
        $judul['judul'] = 'Ubah Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('passwordlama', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('passwordbaru', 'Password baru', 'required|trim|min_length[5]|matches[konfirmasipassword]');
        $this->form_validation->set_rules('konfirmasipassword', 'Konfirmasi password', 'required|trim|matches[passwordbaru]');
        if ($this->input->method() == 'post') {
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                Gagal Merubah Password
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                $judul['judul'] = 'My Profile';
                $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
                $this->load->view('tamplates/headeruser', $data);
                $this->load->view('tamplates/sidebaruser', $judul);
                $this->load->view('Profile/index', $data);
                $this->load->view('tamplates/footeruser');
            } else {
                $passwordsekarang = $data['user']['password'];
                $password = $this->input->post('passwordlama');
                $passwordbaru = $this->input->post('passwordbaru');

                if (!password_verify($password, $data['user']['password'])) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                    Password Salah.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                    redirect('profile/index');
                }

                if ($password == $passwordbaru) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                    Password Baru Tidak Boleh Sama Dengan Password Sekarang.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
                    redirect('profile/index');
                } else {
                    $ubahpassword = password_hash($passwordbaru, PASSWORD_DEFAULT);

                    $this->db->set('password', $ubahpassword);
                    $this->db->where('email', $data['user']['email']);
                    $this->db->update('user');
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">
                    Password Berhasil Diubah.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
                    redirect('profile/index');
                }
            }
        } else {
            redirect('profile/index');
        }
    }

    public function ubahprofile()
    {
        $judul['judul'] = 'Edit Profile';
        $email = $this->session->userdata('email');
        $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('nohp', 'No HP', 'required|trim|numeric');
        if ($this->input->method() == 'post') {
            if ($this->form_validation->run() == false) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
                Profile Gagal Diubah.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                $this->load->view('tamplates/headeruser', $data);
                $this->load->view('tamplates/sidebaruser', $judul);
                $this->load->view('profile/index');
                $this->load->view('tamplates/footeruser');
            } else {
                $nama = $this->input->post('nama');
                $nohp = $this->input->post('nohp');
                $alamat = $this->input->post('alamat');
                $data = [
                    'nama' => $nama,
                    'no_telepon' => $nohp,
                    'alamat' => $alamat
                ];



                //jika ada foto yang mau diubah
                $ubahfoto = str_replace(' ', '', $_FILES['foto']['name']);
                if ($ubahfoto) {
                    $config['allowed_types'] = 'jpg|png|gif|jpeg';
                    $config['max_size'] = '2048';
                    $config['upload_path'] = './assets/img/foto/';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('foto')) {

                        $fotolama = $data['user']['foto'];
                        if ($fotolama != 'default.jpg') {
                            unlink(FCPATH . 'assets/img/foto/' . $fotolama);
                        }
                        $fotobaru = $this->upload->data('file_name');
                        $this->db->set('foto', $fotobaru);
                    } else {
                        $this->session->set_flashdata('pesan', '<div class="alert text-center alert-danger alert-dismissible fade show" role="alert">'. $this->upload->display_errors() .'
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        </div>');
                        redirect('profile/index');
                    }
                }

                $this->db->set($data);
                $this->db->where('email', $email);
                $this->db->update('user');

                $this->session->set_flashdata('pesan', '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">Profile Berhasil Diubah.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                redirect('profile/index');
            }
        } else {
            redirect('profile/index');
        }
    }
}
