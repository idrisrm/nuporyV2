<?php 

class DataModel extends CI_Model{
    public function getData(){
        $Data = array(
            'nama' => 'Idris',
            'Status' => 'Programer',
            'Website' => 'nursery.polije.com'
        );
        return $Data;
    }
}

?>