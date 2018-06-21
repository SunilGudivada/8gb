<?php

class User_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getDetails(){
        $sql = "SELECT * from user";
        $this->load->database();
        $query=$this->db->query($sql);
        return $query;
    }

    public function block($id){
        $sql = "UPDATE user set status = 2 where id = $id";
        $this->load->database();
        $this->db->query($sql);
        return true;
    }

    public function unblock($id){
        $sql = "UPDATE user set status = 1 where id = $id";
        $this->load->database();
        $this->db->query($sql);
        return true;
    }


}