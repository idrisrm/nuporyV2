<?php
class Home extends CI_Controller { //Mengextends CI_Controller
    public function index(){
        $this->load->model("UserModel");
        $hapus = $this->UserModel->hapus (3);
        if($hapus){
            echo "Hapus data berhasil";
        }
    }
}
?>