<?php

class AdminModels extends CI_Model
{

    public function DataAdmin(){
       return $this->db->get_where('user', ['status' => 2])->result_array();
    }

    public function TambahAdmin($data = array()){
        $this->db->insert('user', $data);
    }

    public function HapusAdmin($id){
        $this->db->delete('user', ['id' => $id]);
    }

    public function DetailAdmin($id){
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }
}
