<?php
class Home extends CI_Controller
{
    public function _construct()
    {
        parent::_construct();
    }
    public function index()
    {
        $this->load->view("admin/header");
        $this->load->view("admin/home");
        $this->load->view("admin/footer");
    }
}
?>