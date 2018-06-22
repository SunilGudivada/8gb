<?php

class Upload_model extends CI_Model {

	public function __construct()
        {
            parent::__construct();
        }

    public function addImage($imagename,$userid){
    	$status =0;
    	$sql="INSERT INTO image (img_value,user_id,status) values('$imagename',$userid,$status)";
    	$this->load->database();
        $this->db->query($sql);
        return true;
    }
}