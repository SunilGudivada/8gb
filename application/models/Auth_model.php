<?php

class Auth_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function signup($uname,$cemail,$pass){
    	$sql = "INSERT INTO user (username,email,pass)values('$uname','$cemail','$pass')";
    	$this->load->database();
       	$this->db->query($sql);
    }

     public function signin($email,$pass){
    	$sql = "SELECT * from user where email = '$email' AND pass = '$pass'";
    	$this->load->database();
       	$query = $this->db->query($sql);
       	$data = ($query->num_rows() > 0)? true : false;

       	$result = $query->result_array();
       	if($data){
       		$this->session->id = $result[0]['id'] ;
       		$this->session->email = $result[0]['email'] ;
          $this->session->type = 'user';
       	}
       	return $data;
    }

    public function check_username($uname){
    	$sql = "SELECT * from user where username = '$uname'";
    	$this->load->database();
       	$query = $this->db->query($sql);
       	$data = ($query->num_rows() > 0)? false : true;
       	return $data;
    }

    public function check_email($email){
    	$sql = "SELECT * from user where email = '$email'";
    	$this->load->database();
       	$query = $this->db->query($sql);
       	$data = ($query->num_rows() > 0)? false : true;
       	return $data;
    }
}