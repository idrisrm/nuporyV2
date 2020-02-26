<?php
class home extends CI_Controller { //mengextends CI_controller
	public function index()
	$this->load->model("DataModel");//memanggil DataModel
	$dataArr = $this->DataModel->getData ();
	//menampung fungsi getData()

	// echo "nama : " . $dataArr["nama"] . '<br>';
	// echo "status : " . $dataArr["status"] . '<br>';
	// echo "website : " . $dataArr["website"] . '<br>';
$this->load->view("HomeView", array ("data" => $dataArr));//memanggil HomeView dan data array

	$this->load->helper("html");//memanggil helper html
	echo heading (' Selamat Datang!', 1); //heading
	echo ul (array ( //ul
	  'kesatu',
	  'kedua',
	  'ketiga'
	));
	echo ol (array ( //ol
	  'kesatu',
	  'kedua',
	  'ketiga'
	));

	$this->load->helper("number");//memanggil helper number
	echo 'ukuran GB : ' . byte_format (121355) .'<br>';
	echo 'ukuran GB : ' . byte_format (12143) .'<br>';
	echo 'ukuran GB : ' . byte_format (113);
	
	
	public function Index () {
	$this->load->helper("url");//memanggil helper url
	echo base_url () .'<br>;
	echo site_url () .'<br>;
	echo current_url () .'<br>;
	echo anchor('http//nursery.polije.com', 'nursery.polje.com') .'<br>;

	$this->load->helper("form"); //memanggil helper form
	echo form_open ('/'); //membuka form
	echo form_label ('Nama : '). '<br>'; //membuka label
	echo form_input ('nama : '). '<br>'; //membuka textbox
	echo form_label ('Alamat : '). '<br>'; //membuka label
	echo form_input ('Alamat : '). '<br>'; //membuka textbox
	echo form_submit ('submit' , Kirim Data'); //membuka tombol
	echo form_close (); //menutup form
	 

    $this->load->helper("nama"); //memanggil helper nama
	  tampilkanTebal (" Politeknik Negeri Jember ");
	  tampilkanMiring (" Teknologi Informasi ");
	  tampilkanBergaris (" 2020 <br>);
	
	//cek apakah method = post
	if ($this->input->method() -- "post") {
	//tampilkan data
	echo "nama : " .  $this->input->post("nama"). '<br>';
	echo "email : " .  $this->input->post("email");
	  }
	  $this->load->view("HomeView");

}
?>
