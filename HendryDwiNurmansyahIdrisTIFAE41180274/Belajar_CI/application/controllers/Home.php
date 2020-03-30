<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("ArtikelModel");
        $this->load->view("header.php");
    }
    public function index()
    {

        $data = array("artikel" => $this->ArtikelModel->get());
        $this->load->view("HomeView", $data);
    }

    public function detail($id)
    {
        $data = array("artikel" => $this->ArtikelModel->get());
        $this->load->view("DetailView", $data);
    }

    public function tambah()
    {
        $h = base_url();
        if ($this->input->method() == "post") {
            $insert = $this->ArtikelModel->tambah(array(
                'judul' => $this->input->post("judul"),
                'penulis' => $this->input->post("penulis"),
                'tanggal' => date("Y-m-d H:i:s"),
                'isi' => $this->input->post("isi")
            ));
            if ($insert) {
                echo "Data berhasil ditambahkan";
                $this->session->set_flashdata('data', 'Ditambahkan');
                redirect($h);
            } else {
                echo "Data gagal ditambahkan";
            }
        }
        $this->load->view("FormView");
    }
    public function ubah($id)
    {
        $h = base_url();
        $data["artikel"] = $this->ArtikelModel->detail($id);
        if ($this->input->method() == "post") {
            $ubah = $this->ArtikelModel->ubah(array(
                'judul' => $this->input->post("judul"),
                'penulis' => $this->input->post("penulis"),
                'tanggal' => date("Y-m-d H:i:s"),
                'isi' => $this->input->post("isi")
            ), $id);
            if ($ubah) {
                echo "Data berhasil diubah";
                $this->session->set_flashdata('data', 'Diubah');
                redirect($h);
            } else {
                echo "Data gagal diubah";
            }
        }
        $this->load->view("UbahView", $data);
    }

    public function hapus($id)
    {
        $kembali = base_url();
        $data = $this->ArtikelModel->hapus($id);
        $this->load->view("HomeView", $data);
        $this->session->set_flashdata('data1', 'Dihapus');
        redirect($kembali);
    }


    public function edit($nik)
    {
        $data["akun"] = $this->EjscModel->detail($nik);
        if ($this->form_validation->run() == false) {
            $this->load->view("admin/administrator/editadministrator", $data);
        } else {
            $foto = $_FILES['foto']['name'];
            $config['allowed_types'] = 'jpg|png|gif|pdf';
            $config['max_size'] = '2048';
            $config['upload_path'] = './uploads';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {

                $data = $this->EjscModel->ubahadmin(array(
                    'NIK' => $this->input->post("nik"),
                    'LEVEL' => '1',
                    'FOTO_KTP' => $foto,
                    'NAMA_LENGKAP' => $this->input->post("nama"),
                    'EMAIL' => $this->input->post("email"),
                    'NO_TELEPON' => $this->input->post("no_telpon"),
                    'ALAMAT' => $this->input->post("alamat"),
                    'KOMUNITAS' => '',
                    'PASSWORD' => $this->input->post("password1")
                ), $nik);
                if ($data) {
                    $this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
					Berhasil Menambahkan Akun!
				  </div>');
                    redirect('admin/administrator');
                } else {
                    $this->session->set_flashdata('Pesan', '<div class="alert alert-danger" role="alert">
					Gagal Menambahkan Akun!
					</div>');
                    redirect('admin/administrator');
                }
            } else {
                $this->session->set_flashdata('Pesan', '<div class="alert alert-danger" role="alert">'
                    . $this->upload->display_errors() .
                    '</div>');
                redirect('admin/administrator');
            }
        }
    }




    // $this->load->model("UserModel");

    // $tambah = $this->UserModel->tambah(array(
    //     'nama' => 'huhu',
    //     'email' => 'huhu',
    //     'alamat' => 'huhu'
    // ));
    // if($tambah){
    //     echo "Data Berhasil ditambahkan";
    // }



    // $ubah = $this->UserModel->ubah(array(
    //     'nama' => 'hehe',
    //     'email' => 'hehe',
    //     'alamat' => 'hehe'
    // ), 2);
    // if($ubah){
    //     echo "Data Berhasil diubah";
    // }



    // $hapus = $this->UserModel->hapus(13);
    // if(isset($hapus)){
    //     echo "Data Berhasil dihapus";
    // }else{
    //     echo"Tidak ada data yang akan dihapus";
    // }



    // echo '<pre>';
    // print_r($this->UserModel->get());
    // echo '</pre>';



    // $this->load->library('table');
    // $template = array(
    //     "table_open"=>"<table border=1 cellpadding=3>"
    // );
    // //set table tamplate
    // $this->table->set_template($template);
    // $this->table->set_caption("<h1>Menampilkan table dengan HTML table Class</h1>");
    // $data = array(
    //     array('Nama', 'Email', 'Jenis Kelamin'),
    //     array('Idris', 'idristifa@gmail.com', 'laki-laki'),
    //     array('sayyid', 'sayyid@gmail.com', 'laki-laki')
    // );
    // echo $this->table->generate($data);







    // $this->load->library("session");
    // $this->session->set_userdata("nama", "Polije");

    // echo 'Nama Anda : ' . $this->session->userdata("nama");
    // echo '<br>Session di Hapus</br>';

    // $this->session->unset_userdata("nama", "Polije");
    // echo 'Nama Anda :' . $this->session->set_userdata("nama");





    // $error = "";
    // $data = "";

    // if ($this->input->method() == "post") {
    //     //konfigurasi
    //     $config['upload_path']='./gambar';
    //     $config['allowed_types']='gif|jpg|png';
    //     $config['max_size']=5000;
    //     $config['max_width']=5000;
    //     $config['max_height']=5000;


    //     //panggil library
    //     $this->load->library('upload', $config);

    //     //cek apakah gagal upload
    //     if(!$this->upload->do_upload('gambar')){
    //         $error = $this->upload->display_errors();
    //     }else{
    //         $data = $this->upload->data();
    //     }
    // }
    // $this->load->view("HomeView", array(
    //     'error' => $error,
    //     'data' => $data
    // ));


    // if ($this->input->method() == "post") {
    //     echo "nama :" . $this->input->post("nama") . '<br>';
    //     echo "email :" . $this->input->post("email");
    // }
    // $this->load->view("HomeView");

    // $this->load->helper('belajar');
    // tampilkantebal("Politeknik Negeri Jember");

    // $this->load->helper("html");
    // echo heading('Selamat Datang', 1);
    // echo ul(array('kesatu', 'kedua', 'ketiga'));
    // echo ol(array('kesatu', 'kedua', 'ketiga'));

    // $this->load->helper("number");
    // echo "ukuran GB :" . byte_format(634326564) . '<br>';

    // $this->load->helper("url");
    // echo base_url() .'<br>';
    // echo site_url() .'<br>';
    // echo current_url() .'<br>';
    // echo anchor('http://nursery.polije.com', 'nursery.polije.com') .'<br>';

    // $this->load->helper("form");
    // echo form_open('/');
    // echo form_label('Nama:').'<br>';
    // echo form_input('Nama') .'<br>';
    // echo form_label('Alamat:').'<br>';
    // echo form_textarea('Alamat').'<br>';
    // echo form_submit('submit', 'Kirim Data');
    // echo form_close();


    // echo "Selamat Datang";
    // $this->load->model("DataModel");
    // $dataArr = $this->DataModel->getData();
    // echo "Nama: ". $dataArr["nama"] . '<br>';
    // echo "Status: ". $dataArr["Status"] . '<br>';
    // echo "Website: ". $dataArr["Website"] . '<br>';
    // $this->load->view("HomeView", array("data" => $dataArr));


}
