<?php
class Home extends CI_Controller { //Mengextends CI_Controller
    public function index(){
        $this->load->model("ArtikelModel");
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

    public function tambah(){
        $this->load->model("ArtikelModel");
        if ($this->input->method() == "post"){
            $insert = $this->ArtikelModel->tambah(array(
                'judul' => $this->input->post("judul"),
                'penulis' => $this->input->post("penulis"),
                'isi' => $this->input->post("isi"),
                'tanggal' => date ("Y-m-d H:i:s")
            ));
        if ($insert){
            echo "Sukses tambah artikel.";
        }else {
            echo "Gagal tambah artikel.";
        }
        }
        $this->load->view("FormView");
    }

    public function ubah($id){
        $this->load->model("ArtikelModel");
        $data ["artikel"] = $this->ArtikelModel->detail($id);
        if ($this->input->method()=="post"){
            $ubah = $this->ArtikelModel->ubah(array(
                'judul' => $this->input->post("judul"),
                'penulis' => $this->input->post("penulis"),
                'tanggal' => date("Y-m-d H:i:s"),
                'isi' => $this->input->post("isi")
            ), $id);
            if($ubah){
                $data ["artikel"] = $this->ArtikelModel->detail($id);
                echo "Data berhasil diubah.";
            } else {
                echo "Data gagal diubah.";
            }
        }
        $this->load->view("UbahView", $data);
    }

    public function hapus($id){
        $kembali = base_url();
        $this->load->model("ArtikelModel");
        $data = $this->ArtikelModel->hapus($id);
        $this->load->view("HomeView", $data);
        redirect($kembali);
    }
}
?>