<?php

class BungaModels extends CI_Model
{

    public function DataBunga()
    {
        return $this->db->get('bunga')->result_array();
    }

    public function TambahBunga($dataB = array())
    {
        $this->db->insert('bunga', $dataB);
    }

    public function HapusBunga($idB)
    {
        $this->db->delete('bunga', ['id_bunga' => $idB]);
    }
}
