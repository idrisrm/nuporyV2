<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        belumlogin();
        $this->load->model('TransaksiModels');
        $this->load->library('form_validation');
        // cekadmin();
    }

    public function Tagihan()
    {
        $data['tagihan'] = $this->TransaksiModels->Tagihan();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('tamplates/headeruser', $data);
        $this->load->view('tamplates/sidebaruser');
        $this->load->view('Transaksi/Tagihan', $data);
        $this->load->view('tamplates/footeruser');
    }

    public function DetailTagihan($id_transaksi = '')
    {
        if ($id_transaksi == '') {
            redirect('Transaksi/Tagihan');
        }
        $data['DetailTagihan'] = $this->TransaksiModels->DetailTagihan($id_transaksi);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('tamplates/headeruser', $data);
        $this->load->view('tamplates/sidebaruser');
        $this->load->view('Transaksi/Detailtagihan', $data);
        $this->load->view('tamplates/footeruser');
    }

    public function Kemas()
    {
        $data['kemas'] = $this->TransaksiModels->Kemas();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('tamplates/headeruser', $data);
        $this->load->view('tamplates/sidebaruser');
        $this->load->view('Transaksi/Kemas');
        $this->load->view('tamplates/footeruser');
    }

    public function DetailDikemas($id_transaksi = '')
    {
        if ($id_transaksi == '') {
            redirect('Transaksi/Tagihan');
        }
        $data['DetailTagihan'] = $this->TransaksiModels->DetailDikemas($id_transaksi);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('tamplates/headeruser', $data);
        $this->load->view('tamplates/sidebaruser');
        $this->load->view('Transaksi/DetailDikemas', $data);
        $this->load->view('tamplates/footeruser');
    }

    public function Dikirim()
    {
        $data['dikirim'] = $this->TransaksiModels->Dikirim();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('tamplates/headeruser', $data);
        $this->load->view('tamplates/sidebaruser');
        $this->load->view('Transaksi/Dikirim');
        $this->load->view('tamplates/footeruser');
    }

    public function DetailDikirim($id_transaksi = '')
    {
        if ($id_transaksi == '') {
            redirect('Transaksi/Tagihan');
        }
        $data['DetailTagihan'] = $this->TransaksiModels->DetailDikirim($id_transaksi);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('tamplates/headeruser', $data);
        $this->load->view('tamplates/sidebaruser');
        $this->load->view('Transaksi/DetailDikirim', $data);
        $this->load->view('tamplates/footeruser');
    }

    public function Selesai()
    {
        $data['selesai'] = $this->TransaksiModels->Selesai();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('tamplates/headeruser', $data);
        $this->load->view('tamplates/sidebaruser');
        $this->load->view('Transaksi/Selesai');
        $this->load->view('tamplates/footeruser');
    }

    public function DetailSelesai($id_transaksi = '')
    {
        if ($id_transaksi == '') {
            redirect('Transaksi/Tagihan');
        }
        $data['DetailTagihan'] = $this->TransaksiModels->DetailSelesai($id_transaksi);
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('tamplates/headeruser', $data);
        $this->load->view('tamplates/sidebaruser');
        $this->load->view('Transaksi/DetailSelesai', $data);
        $this->load->view('tamplates/footeruser');
    }

    public function TerimaPesanan()
    {
        $id_transaksi = $this->input->post('id_transaksi');

        $this->db->set('id_status_transaksi', 3);
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi');

        $this->session->set_flashdata('pesan', '<div class="alert text-center alert-success alert-dismissible fade show" role="alert">Pesanan dengan ID transaksi ' . $id_transaksi . ' telah terima.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        </div>');
        redirect('Transaksi/Tagihan');
    }

    public function KirimPesanan()
    {
        $id_transaksi = $this->input->post('id_transaksi');

        $this->db->set('id_status_transaksi', 4);
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi');

        $this->session->set_flashdata('pesan', '<div class="alert text-center alert-success alert-dismissible fade show" role="alert">Pesanan dengan ID transaksi ' . $id_transaksi . ' telah dikirim.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        </div>');
        redirect('Transaksi/kemas');
    }

    public function PesananTerkirim()
    {
        $id_transaksi = $this->input->post('id_transaksi');

        $this->db->set('id_status_transaksi', 5);
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('transaksi');

        $this->session->set_flashdata('pesan', '<div class="alert text-center alert-success alert-dismissible fade show" role="alert">Pesanan dengan ID transaksi ' . $id_transaksi . ' telah Diterima Atau Terkirim.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        </div>');
        redirect('Transaksi/Dikirim');
    }
}
