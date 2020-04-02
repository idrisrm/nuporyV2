<?php 
class Usermodel extends CI_Model 
{
    public function get ()
    {
        $this->load->database();
        return this->db->get('user')->result();
    }
}
?>