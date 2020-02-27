<?php
class Home extends CI_Controller {//mengextend CI_Controller
public function index () {
    $this->load->helper ("form"); //mengextends CI_Controller
    echo form_open ('/'); // membuka form
    echo form_label ('Nama : ')  . '<br>'; // membuat label
    echo form_input ('nama') . '<br>'; // membuat textbox
    echo form_label ('Alamat : ') . '<br>' // membuat label
    echo form_input ('alamat') . '<br>'; // membuat texbox
    echo form_submit ('submit' , 'Kirim Data') // membuat tombol
    echo form_close (); // menutup form

  }
}
?> 
