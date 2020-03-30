<?php
class DataModel extends CI_Model {//mengextend CI_Model
    public function getdata () {
        $data = array(
            'nama' => 'frengki',
            'status' => 'Mahasiswa',
            'website' => 'https://freng.com'

        );
        return $data;
    }

}
?>