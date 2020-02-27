<?php
class Home extends CI_Controller {//mengextend CI_Controller
public function index () {
    $this->load->helper ("url"); //memanggil mengextends
    echo site_url () . '<br>'; //lokasi Website
    echo base_url ()  . '<br>'; // folder lokasi website
    echo current_url () . '<br>'; // url yang sedang dibuka
    echo anchor ('http://google.com' , 'google.com') . '<br>';
    //membuat url
    echo anchor ('http://polije.ac.id' , 'polije.ac.id');
    

  }
}
?> 
