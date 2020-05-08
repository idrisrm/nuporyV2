<?php

class KritikModels extends CI_Model
{
    public function DataKritik()
    {
        return $this->db->get('kritik')->result_array();
    }

    public function HapusKritik($id)
    {
        $this->db->delete('kritik', ['id_kritik' => $id]);
    }

    // public function status()
    // {
    //     return $this->db->get('status_kritik', ['id_status_kritik'=>2])->result_array();
    // }
}