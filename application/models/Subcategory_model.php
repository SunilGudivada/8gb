<?php

class Subcategory_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getDetails(){
    	$sql = "SELECT * from sub_cat S JOIN category C where S.cat_id = C.id";
    	$this->load->database();
    	$query = $this->db->query($sql);
    	return $query;
    }

    public function addsubcat($subcatname,$catid){
    	$status = 1;
    	$sql = "INSERT INTO sub_cat (subcat_name,cat_id)values('$subcatname',$catid)";
    	$this->load->database();
    	$this->db->query($sql);
    	return true;
    }

    public function deletesubcat($subcatid){
    	$sql = "DELETE from sub_cat where subcat_id = $subcatid";
    	$this->load->database();
    	$this->db->query($sql);
    	return true;
    }

}