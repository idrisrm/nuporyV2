<?php 
class Home extends CI_Controller 
{
    //mengextends CI_Controller
    public function index(){
        //echo "Selamat Datang";
        // $this->load->model ("DataModel"); //Memanggil DataModel
        // $dataArr = $this->DataModel->getData();
        //Menampung Fungsi getData()

        // echo "nama :" . $dataArr["nama"] . '<br>';
        // echo "status :" . $dataArr["status"] . '<br>';
        // echo "website :" . $dataArr["website"] . '<br>';

        // $this->load->view ("HomeView", array("data" => $dataArr));
        //memanggil data home view dan data array


        // $this->load->helper("html"); //memanggil helper html
        // echo heading ('Selamat Datang', 1); //heading
        // echo ul (array(
        //     'kesatu',
        //     'kedua',
        //     'ketiga'
        // ));
        // echo ol(array( //ol
        //     'kesatu',
        //     'kedua',
        //     'ketiga'
        // ));

        // $this->load->helper("number"); //memanggil helper number
        // echo 'Ukuran GB: '. byte_format (4512244422). '<br>';
        // echo 'Ukuran MB: '. byte_format (52245023).'<br>';
        // echo 'Ukuran KB: '. byte_format (145023).'<br>';


        // $this->load->helper("url");//memanggil helper url
        // echo site_url (). '<br>'; //lokasi website
        // echo base_url(). '<br>'; // folder Lokasi website
        // echo current_url(). '<br>'; //url yang sedang dibuka
        // echo anchor ('http://google.com','google.com'). '<br>';
        // //membuat url
        // echo anchor ('http://polije.ac.id','polije.ac.id');


        // $this->load->helper ("form"); // memanggil helper form
        // echo form_open ('/'); //membuka form
        // echo form_label ('Nama :'). '<br>';//membuat label
        // echo form_input ('nama').'<br>'; //membuat textbox
        // echo form_label ('Alamat : '). '<br>'; //mebuat label
        // echo form_textarea ('alamat').'<br>'; //membuat textbox
        // echo form_submit('submit', 'Kirim Data'); //membuat tombol
        // echo form_close(); //menutup form
        
        // $this->load->helper ("belajar");
        // tampilkanTebal ("Politeknik Negeri Jember <br>");
        // tampilkanMiring ("Jurusan Teknologi Inforamsi <br>");
        // tampilkanBergaris ("2020 <br>");

        //cek apakah method = post
        // if ($this->input->method()== "post") {
        //     //tampilkan data
        //     echo "nama : " . $this->input->post ("nama").'<br>';
        //     echo "email : ". $this->input->post ("email");

        // }
        // $this->load->view("HomeView");

        // $error = "";
        // $data = "";

        // if ($this->input->method() == "post") {
        //     //konfigurasi
        // $config ['upload_path'] = './gambar/';
        // $config ['allowed_types'] = 'gif|jpg|png';
        // $config ['max_size'] = 100;
        // $config ['max_widht'] = 1024;
        // $config ['max_height'] = 768;

        // //panggil library
        // $this->load->libarary('upload', $config);

        // //cek apakah gagal upload
        // if (!$this->upload->do_upload('gambar')){
        //     $error = $this->upload->display_errors();
        // }else {
        //     $data = $this->upload->data();
        // }
        // }
        // $this->load->view("HomeView", array(
        //     'error' => $error,
        //     'data' => $data
        // ));
        

        //memanggil library session
        $this->load->library("session");
        //set session
        $this->session->set_userdata("nama", "Politeknik");
        //show session
        echo 'Nama anda : '. $this->session->userdata("nama");
        echo '<br>Session di hapus <br>';
        //hapus session nama
        $this->session->unset_userdata("nama");
        echo 'Nama anda: '. $this->session->userdata("nama");

    }
    
}

 

?>