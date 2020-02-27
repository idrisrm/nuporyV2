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

        // //cek apakah method = post
        // if ($this->input->method()== "post") {
        // //tampilkan data
        //     echo "nama : " . $this->input->post ("nama").'<br>';
        //     echo "email : ". $this->input->post ("email");

        // }
        // $this->load->view("HomeView");

        // $error = "";
        // $data = "";

        // if ($this->input->method() == "post") {
        //     //konfigurasi
        // $config ['upload_path'] = './gambar';
        // $config ['allowed_types'] = 'gif|jpg|png';
        // $config ['max_size'] = 1000;
        // $config ['max_width'] = 1024;
        // $config ['max_height'] = 1680;

        // //panggil library
        // $this->load->library('upload', $config);

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
        

        // //memanggil library session
        // $this->load->library("session");
        // //set session
        // $this->session->set_userdata("nama", "Politeknik");
        // //show session
        // echo 'Nama anda : '. $this->session->userdata("nama");
        // echo '<br>Session di hapus <br>';
        // //hapus session nama
        // $this->session->unset_userdata("nama");
        // echo 'Nama anda: '. $this->session->userdata("nama");




        // $this->load->library('table'); //memanggil library tabel
        // $template = array (
        //     "table_open" => "<table border=1 cellpadding=3>"
        // );




        // //set table template
        // $this->table->set_template($template);
        // $this->table->set_caption
        // ("<h1>Menampilkan Table dengan HTML Table Class </h1>"); //caption
        // $data = array (//data yang akan dimasukkan ke tabel
        // array ('Nama', 'Email', 'Jenis Kelamin'),
        // array ('Frengki', 'Frengki@gmail.com', 'laki-laki'),
        // array('lutfi', 'lutfi@gmail.com', 'laki-laki'),
        // array('kholiq','kholiq@gmail.com', 'laki-laki')
        // );
        // echo $this->table->generate ($data); //tampilkan table




        // $this->load->model("UserModel"); //memanggil UserModel
        // echo '<pre>';
        // print_r($this->UserModel->get());
        // echo'</pre>';




        // $this->load->model("UserModel"); 
        // $tambah = $this->UserModel->tambah(array(
        //     //data yang akan ditambahkan
        // 'nama' => 'Udin',
        // 'email' => 'Udin@gamil.com',
        // 'alamat' => 'Gending'
        // ));
        // if ($tambah) {
        //     echo "Tambah data berhasil";
        // }




        // $this->load->model("UserModel");
        // $ubah = $this->UserModel->ubah(array(
        // 'nama' => 'ryan',
        // 'email' => 'ryan@gmail.com',
        // 'alamat' => 'Jember'),1);
        // if ($ubah){
        //     echo "Ubah Data Berhasil";
        // }



        $this->load->model("UserModel");
        $hapus = $this->UserModel->hapus(11);
        if($hapus){
            echo "Hapus Data Berhasil";
        }
    }   
}
?>