<?php

class BungaModels extends CI_Model
{

    public function DataKategori()
    {
        return $this->db->get('kategori')->result_array();
    }

    public function TambahKategori($dataK = array())
    {
        $this->db->insert('kategori', $dataK);
    }

    public function HapusKategori($idB)
    {
        $this->db->delete('kategori', ['id_kategori' => $idB]);
    }

}
