<?php
class Home extends CI_Controller {//mengextend CI_Controller
public function index () {
    $this->load->helper ("belajar"); //memanggil helper belajar
    tampilkanTebal ("Politeknik Negeri Jember <br>");
    tampilkanMiring ("Jurusan Teknologi Informasi <br>");
    tampilkanBergaris ("2020 <br>");
  }
}
?> 
