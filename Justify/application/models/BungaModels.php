<?php

class BungaModels extends CI_Model
{

    public function DataBunga()
    {
        return $this->db->get('bunga')->result_array();
    }

    public function TambahBunga($data = array())
    {
        $this->db->insert('bunga', $data);
    }

    public function HapusBunga($idB)
    {
        $this->db->delete('bunga', ['id_bunga' => $idB]);
    }

    public function EditBunga($id_bunga, $nama_bunga, $kategori, $harga, $stok, $foto_bunga, $cara_perawatan, $deskripsi)
    {
        $hasil = $this->db->query("UPDATE bunga SET id_bunga='$id_bunga', nama_bunga='$nama_bunga',  harga='$harga', stok='$stok', foto_bunga='$foto_bunga', cara_perawatan='$cara_perawatan', deskripsi='$deskripsi'  WHERE id_bunga='$id_bunga' ");
        return $hasil;
    }

}
