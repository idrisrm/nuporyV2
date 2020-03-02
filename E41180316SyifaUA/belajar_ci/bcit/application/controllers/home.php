<?php
class Home extends CI_Controller {//mengextend CI_Controller
public function index () {
  $this->load->library("sesion");
  //set session
  $this->session->set_userdata("nama" , "Politeknik");
  //show session
  echo 'Nama anda : ' . $this->session->userdata("nama")
  echo '<br>Sesion di hapus <br>';
  //hapus session nama
  $this->session->unset_userdata("nama");
  echo "Nama anda : " . $this->session->userdata("nama");

}
}
?> 
