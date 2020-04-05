<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        belumlogin();
        $this->load->library('form_validation');
    }


    public function index()
    {
        $judul['judul'] = 'Halaman User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('tamplates/sidebaruser', $judul);
        $this->load->view('tamplates/headeruser', $data);
        $this->load->view('user/index', $data);
        $this->load->view('tamplates/footeruser');
    }

    public function editprofile()
    {
        $error = '';
        $judul['judul'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('tamplates/sidebaruser', $judul);
            $this->load->view('tamplates/headeruser', $data);
            $this->load->view('user/editprofile', array(
                'error' => $error,
                'data' => $data
            ));
            $this->load->view('tamplates/footeruser');
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');


            //jika ada foto yang mau diubah
            $ubahfoto = $_FILES['image']['name'];

            if ($ubahfoto) {
                $config['allowed_types'] = 'jpg|png|gif';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/foto/';
                $config['max_width'] = 200;
                $config['max_height']  = 200;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $fotolama = $data['user']['foto'];
                    if ($fotolama != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/foto/' . $fotolama);
                    }
                    $fotobaru = $this->upload->data('file_name');
                    $this->db->set('foto', $fotobaru);
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'
                        . $this->upload->display_errors() .
                        '</div>');
                    redirect('user/editprofile');
                }
            } else {
            }

            $this->db->set('nama', $nama);
            $this->db->where('email', $email);
            $this->db->update('user');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Profile berhasil diubah
          </div>');
            redirect('user/editprofile');
        }
    }


    public function ubahpassword()
    {
        $judul['judul'] = 'Ubah Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        $this->form_validation->set_rules('passwordbaru', 'Password baru', 'required|trim|min_length[5]|matches[konfirmasipassword]');
        $this->form_validation->set_rules('konfirmasipassword', 'Konfirmasi password', 'required|trim|matches[passwordbaru]');

        if ($this->form_validation->run() == false) {
            $this->load->view('tamplates/sidebaruser', $judul);
            $this->load->view('tamplates/headeruser', $data);
            $this->load->view('user/ubahpassword', $data);
            $this->load->view('tamplates/footeruser');
        } else {
            $passwordsekarang = $data['user']['password'];
            $password = $this->input->post('password');
            $passwordbaru = $this->input->post('passwordbaru');

            if (!password_verify($password, $data['user']['password'])) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Password salah!
          </div>');
                redirect('user/ubahpassword');
            }

            if ($password == $passwordbaru) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Password baru tidak boleh sama dengan password sekarang!
          </div>');
                redirect('user/ubahpassword');
            } else {
                $ubahpassword = password_hash($passwordbaru, PASSWORD_DEFAULT);

                $this->db->set('password', $ubahpassword);
                $this->db->where('email', $data['user']['email']);
                $this->db->update('user');
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Password berhasil diubah!
          </div>');
                redirect('user/ubahpassword');
            }
        }
    }

    public function tambah()
    {
        $this->load->model("usermodel");
        $judul['judul'] = 'Tambah Admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');

        if ($this->form_validation->run() == false) {
            $this->load->view('tamplates/sidebaruser', $judul);
            $this->load->view('tamplates/headeruser', $data);
            $this->load->view('user/tambahadmin');
            $this->load->view('tamplates/footeruser');
        } else {
            if ($this->input->method() == "post") {
                $this->usermodel->tambahadmin(array(
                    'nama' => $this->input->post("nama"),
                    'email' => $this->input->post("email"),
                    'foto' => 'default.jpg',
                    'password' => password_hash('admin', PASSWORD_DEFAULT),
                    'level' => 2,
                    'aktivasi' => 0,
                    'waktubuat' => time()
                ));
                $email = $this->input->post("email");
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Admin berhasil ditambahkan, Email verifikasi telah dikirim ke '. $email .' !
                </div>');


                $token = base64_encode(random_bytes(32));
                $isi = [
                    'email' => $email,
                    'token' => $token,
                    'waktubuat' => time()
                ];
                $this->db->insert('token', $isi);
                $this->_kirimemail($token);
                redirect('user/tambah');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Gagal menambahkan data!
                </div>');
                redirect('user/tambah');
            }
        }
    }



    private function _kirimemail($token)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'idristifa2020@gmail.com',
            'smtp_pass' => 'ronaldo1604',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"

        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('idristifa2020@gmail.com', 'Justify');
        $this->email->to($this->input->post('email'));

        $this->email->subject('Aktivasi akun');
        $this->email->message('Akun anda telah dibuat, silahkan aktivasi akun anda <a href="' . base_url() . 'auth/verifikasi?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">disini</a> Anda akan diarahkan kehalaman verifikasi. Untuk login akun gunakan password "admin", harap untuk segera merubah password anda agar tidak disalahgunakan oleh pihak tidak bertanggung jawab.');


        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }


    public function datauser()
    {
        $judul['judul'] = 'Halaman User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('tamplates/sidebaruser', $judul);
        $this->load->view('tamplates/headeruser', $data);
        $this->load->view('user/input');
        $this->load->view('user/edit');
        $this->load->view('user/datauser');
        $this->load->view('tamplates/footeruser');
    }
}
