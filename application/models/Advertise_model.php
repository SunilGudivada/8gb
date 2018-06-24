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

        public function getDetails(){
             $sql = "SELECT * from addata limit 50";
            $this->load->database();
            $query=$this->db->query($sql);
            return $query;
        }

         public function getDetailsById($id){
             $sql = "SELECT * from addata where ad_id = $id ";
            $this->load->database();
            $query=$this->db->query($sql);
            return $query;
        }

        public function archive($id){
            $sql ="UPDATE addata set ad_action = 1 where ad_id = $id";
            $this->load->database();
            $this->db->query($sql);
            return true;
        }

        public function unarchive($id){
            $sql ="UPDATE addata set ad_action = 0 where ad_id = $id";
            $this->load->database();
            $this->db->query($sql);
            return true;
        }

        public function updateById($i,$startdate,$enddate,$memplan,$status){
            $sql = "UPDATE addata set ad_starttime = '$startdate' , ad_endtime='$enddate' , ad_type = '$memplan' , ad_status = '$status' where ad_id=$i";
            $this->load->database();
            $this->db->query($sql);
            return true;
        }

        public function getImageIds($i){
            $sql = "SELECT * from image where advt_id = $i and status = 0";
            $this->load->database();
            $query=$this->db->query($sql);
            return $query;
        }

        public function deleteImage($i){
            $sql = "UPDATE image set status= 1 where img_value = '$i'";
            $this->load->database();
            $this->db->query($sql);
            return true;
        }

    }