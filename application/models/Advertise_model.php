<?php

class Advertise_model extends CI_Model {

        public function __construct()
        {
            parent::__construct();
        }

        public function addData($adname,$addesc,$adprice,$adcategory,$adsubcat,$adtype){
        	
        	if($adtype == 'free'){
        		$adendtime = time() + 7*24*60*60;
        	}else if($adtype =='professional'){
        		$adendtime = time() + 30*24*60*60;
        	}else if($adtype == 'premium'){
        		$adendtime = time() + 90*24*60*60;
        	}else{  
        		$adendtime = time() - 9000*24*60*60;
        	}

        	$adstarttime = time();
        	$adstatus =0;
        	$this->load->database();
        	$query = "INSERT INTO addata (ad_name,ad_desc,ad_price,ad_cat,ad_subcat,ad_starttime,ad_endtime,ad_type,ad_status) values('$adname','$addesc','$adprice','$adcategory','$adsubcat','$adstarttime','$adendtime','$adtype','$adstatus')";
        	$this->db->query($query);

        }

        public function getData($type){
            $sql = "SELECT * from addata where ad_type ='$type' AND ad_status=1 limit 5";
            $this->load->database();
            $query=$this->db->query($sql);
            return $query;
        }
    }