<?php

class Home extends CI_Controller
{
    public function index()
    {
        $error = "";
        $data = "";

        if ($this->input->method() == "post") {
            //konfigurasi
            $config['upload_path']='./gambar';
            $config['allowed_types']='gif|jpg|png';
            $config['max_size']=5000;
            $config['max_width']=5000;
            $config['max_height']=5000;


            //panggil library
            $this->load->library('upload', $config);

            //cek apakah gagal upload
            if(!$this->upload->do_upload('gambar')){
                $error = $this->upload->display_errors();
            }else{
                $data = $this->upload->data();
            }
        }
        $this->load->view("HomeView", array(
            'error' => $error,
            'data' => $data
        ));


        // if ($this->input->method() == "post") {
        //     echo "nama :" . $this->input->post("nama") . '<br>';
        //     echo "email :" . $this->input->post("email");
        // }
        // $this->load->view("HomeView");

        // $this->load->helper('belajar');
        // tampilkantebal("Politeknik Negeri Jember");

        // $this->load->helper("html");
        // echo heading('Selamat Datang', 1);
        // echo ul(array('kesatu', 'kedua', 'ketiga'));
        // echo ol(array('kesatu', 'kedua', 'ketiga'));

        // $this->load->helper("number");
        // echo "ukuran GB :" . byte_format(634326564) . '<br>';

        // $this->load->helper("url");
        // echo base_url() .'<br>';
        // echo site_url() .'<br>';
        // echo current_url() .'<br>';
        // echo anchor('http://nursery.polije.com', 'nursery.polije.com') .'<br>';

        // $this->load->helper("form");
        // echo form_open('/');
        // echo form_label('Nama:').'<br>';
        // echo form_input('Nama') .'<br>';
        // echo form_label('Alamat:').'<br>';
        // echo form_textarea('Alamat').'<br>';
        // echo form_submit('submit', 'Kirim Data');
        // echo form_close();


        // echo "Selamat Datang";
        // $this->load->model("DataModel");
        // $dataArr = $this->DataModel->getData();
        // echo "Nama: ". $dataArr["nama"] . '<br>';
        // echo "Status: ". $dataArr["Status"] . '<br>';
        // echo "Website: ". $dataArr["Website"] . '<br>';
        // $this->load->view("HomeView", array("data" => $dataArr));

    }
}
?>
