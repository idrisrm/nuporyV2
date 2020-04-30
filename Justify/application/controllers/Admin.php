<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        belumlogin();
        $this->load->model('AdminModels');
        $this->load->library('form_validation');
        // cekadmin();
    }

    public function index()
    {
        $judul['judul'] = 'Halaman Admin';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data'] = $this->AdminModels->DataAdmin();
        $this->load->view('tamplates/headeruser', $data);
        $this->load->view('tamplates/sidebaruser', $judul);
        $this->load->view('Admin/index', $data);
        $this->load->view('tamplates/footeruser');
    }

    public function tambah()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required|is_unique[user.nama]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('jeniskelamin', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('nohp', 'No Hp', 'trim|required|is_unique[user.no_telepon]|numeric');

        if ($this->form_validation->run() == false) {
            $judul['judul'] = 'Tambah Admin';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('tamplates/headeruser', $data);
            $this->load->view('tamplates/sidebaruser', $judul);
            $this->load->view('Admin/tambah', $data);
            $this->load->view('tamplates/footeruser');
        } else {
            $this->AdminModels->TambahAdmin(array(
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'jenis_kelamin' => $this->input->post('jeniskelamin'),
                'no_telepon' => $this->input->post('nohp'),
                'alamat' => '',
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'foto' => 'default.jpg',
                'status' => 2,
                'aktivasi' => 0,
                'waktu_pembuatan' => time()
            ));

            $email = $this->input->post('email');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Admin Baru</strong> Berhasil Ditambahkan, Email verifikasi telah dikirim ke '. $email .' !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>');

            //buat token 
            $token = base64_encode(random_bytes(32));
            $datatoken = [
                'email' => $this->input->post('email'),
                'token' => $token,
                'tipe' => 'tambahadmin',
                'waktubuat' => time()
            ];
            $this->db->insert('token', $datatoken);
            $this->_kirimemail($token);
            redirect('admin/tambah');
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
        $this->email->message('Aktivasi akun anda <a href="' . base_url() . 'auth/verifikasi?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">disini. Jika ini bukan anda jangan lakukan aktivasi. Mungkin data anda akan disalahgunakan oleh pihak yang tidak bertanggungjawab.</a>');

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function HapusAdmin(){
        $id = $this->input->post('id');
        $hapus = $this->AdminModels->HapusAdmin($id);
        if($hapus = true){
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Data Berhasi di Hapus!
            </div>');
            redirect('admin');
        }else{
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
			Data gagal di Hapus!
            </div>');
            redirect('admin');
        }
    }

}
