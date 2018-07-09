<?php

class Contact_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getDetails(){
            $sql = "SELECT * from contactform";
            $this->load->database();
            $query=$this->db->query($sql);
            return $query;
    }
}