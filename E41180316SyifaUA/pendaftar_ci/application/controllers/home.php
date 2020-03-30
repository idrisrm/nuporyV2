<?php
class Home extends CI_Controller {//mengextend CI_Controller
public function index () {
  $this->load->model("ArtikelModel"); //memanggil UserModel
  $data = array(
    "artikel" => $this->ArtikelModel->get()

  );
  $this->load->view("HomeView", $data);
}
public function detail($id){
  $this->load->model("ArtikelModel");
  $data = array(
      "artikel" => $this->ArtikelModel->detail($id)
  );
  $this->load->view("DetailView", $data);

}
}
?> 
