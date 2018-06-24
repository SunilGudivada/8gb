<?php

class Memplan_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getDetails(){
    	$sql = "SELECT * from memplan";
    	$this->load->database();
       	$query = $this->db->query($sql);
       	return $query;
    }

    public function getDetailsById($i){
    	$sql = "SELECT * from memplan where id = $i";
    	$this->load->database();
       	$query = $this->db->query($sql);
       	return $query;
    }

    public function update($i,$j){
    	$sql = "UPDATE memplan set desp = '$j' where id =$i";
    	$this->load->database();
       	$this->db->query($sql);
       	return true;
    }

    public function add($i,$j){
    	if($i == 'free'){
    		$value = 'free.attr';
    	}elseif($i == 'professional'){
    		$value = 'professional.attr';
    	}elseif($i == 'premium'){
    		$value = 'premium.attr';
    	}
    	$sql = "INSERT INTO memplan (type,value,desp)values('$i','$value','$j')";
    	$this->load->database();
       	$this->db->query($sql);
       	return true;
    }

    public function delete($i){
    	$sql = "DELETE from memplan where id = $i";
    	$this->load->database();
       	$this->db->query($sql);
       	return true;
    }
}