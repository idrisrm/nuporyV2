<?php

class KategoriModels extends CI_Model
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

    public function EditKategori($id_kategori, $nama_kategori, $deskripsi, $gambar_kategori)
    {
        $hasil = $this->db->query("UPDATE kategori SET id_kategori='$id_kategori', nama_kategori='$nama_kategori',  deskripsi='$deskripsi', gambar_kategori='$gambar_kategori'  WHERE id_kategori='$id_kategori' ");
        return $hasil;
    }

}
