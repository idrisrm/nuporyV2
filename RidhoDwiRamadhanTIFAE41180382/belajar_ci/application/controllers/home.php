<?php
class Home extends CI_Controller { //Mengextends CI_Controller
    public function index(){
        //memanggil library session
        $this->load->library("session");
        //set session
        $this->session->set_userdata("nama", "Politeknik");
        //show session
        echo 'Nama anda : ' . $this->session->userdata("nama");
        echo '<br>Sesion ini di hapus<br>';
        //hapus session nama
        $this->session->unset_userdata("nama");
        echo 'Nama anda : ' . $this->session->userdata("nama");
        
    }
}
?>