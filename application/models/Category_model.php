<?php

class Category_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getDetails(){
    	$sql = "SELECT * from category";
    	$this->load->database();
    	$query = $this->db->query($sql);
    	return $query;
    }

    public function addcat($catname,$catid){
    	$status = 1;
    	$sql = "INSERT INTO category (cat_name,cat_id,cat_status)values('$catname','$catid',$status)";
    	$this->load->database();
    	$this->db->query($sql);
    	return true;
    }

    public function deletecat($catid){
    	$sql = "DELETE from category where id = $catid";
    	$this->load->database();
    	$this->db->query($sql);
    	return true;
    }

}