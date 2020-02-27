<?php
class Home extends CI_Controller {//mengextend CI_Controller
public function index () {
  $error = "";
  $data = "";
    if ($this->input->method () == "post") {
    //konfigurasi
  $config ['upload_path'] = './gambar/';
  $config ['allowed_types'] = 'gif|jpg|png';
  $config ['max_size'] = 2000;
  $config ['max_width'] = 1024;
  $config ['max_height'] = 1768;

  //panggil library
  $this->load->library('upload', $config);

  //cek apakah gagal upload
  if (!$this->upload->do_upload('gambar')) {
    $error = $this->upload->display_errors();
  }else {//jika file berhasil di upload
    $data = $this->upload->data();
  }
  }
  $this->load->view("HomeView", array(
    'error' => $error,
    'data' => $data
  ));
}
}
?> 
