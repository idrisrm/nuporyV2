<?php
class DataModel extends CI_Model
{
    //mengextends CI_Model
    public function getData(){
        $data = array(
            'nama' => 'Sayyid',
            'status' => 'Mahasiswa',
            'website' => 'http://Sayyid.ky'
        );
        return $data;
    }
}

?>