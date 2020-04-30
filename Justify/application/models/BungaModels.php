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

    public function UpdateBunga($data = array())
    {
        $this->db->update('bunga', $data);
    }

}
