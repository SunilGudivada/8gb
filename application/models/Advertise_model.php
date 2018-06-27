<?php

class Advertise_model extends CI_Model {

        public function __construct()
        {
            parent::__construct();
        }

        public function tempAddData($tempid,$adname,$addesc,$adprice,$adcategory,$adsubcat){
            
            // if($adtype == 'free'){
            //  $adendtime = time() + 7*24*60*60;
            // }else if($adtype =='professional'){
            //  $adendtime = time() + 30*24*60*60;
            // }else if($adtype == 'premium'){
            //  $adendtime = time() + 90*24*60*60;
            // }else{  
            //  $adendtime = time() - 9000*24*60*60;
            // }

            // $adstarttime = time();
         //    $adendtime = '';
            $adstatus =0;
            $user_id = $this->session->id;
            $this->load->database();
            $query = "INSERT INTO tempaddata (ad_id,user_id,ad_name,ad_desc,ad_price,ad_cat,ad_subcat,ad_status) values('$tempid',$user_id,'$adname','$addesc','$adprice','$adcategory','$adsubcat',$adstatus)";
            $this->db->query($query);
            return true;

        }

         public function addData($adname,$addesc,$adprice,$adcategory,$adsubcat,$adtype){
            
            // if($adtype == 'free'){
            //  $adendtime = time() + 7*24*60*60;
            // }else if($adtype =='professional'){
            //  $adendtime = time() + 30*24*60*60;
            // }else if($adtype == 'premium'){
            //  $adendtime = time() + 90*24*60*60;
            // }else{  
            //  $adendtime = time() - 9000*24*60*60;
            // }

            // $adstarttime = time();
         //    $adendtime = '';
            $adstatus =0;
            $this->load->database();
            $query = "INSERT INTO tempaddata (ad_name,ad_desc,ad_price,ad_cat,ad_subcat,ad_type,ad_status) values('$adname','$addesc','$adprice','$adcategory','$adsubcat','$adtype',$adstatus)";
            $this->db->query($query);
            return true;

        }

        public function verifyIdPlan($i,$j){
            $sql = "UPDATE tempaddata set ad_type = '$i'where ad_id = '$j'";
             $this->load->database();
           $this->db->query($sql);
            return true;
        }

        public function getData($type){
            $sql = "SELECT * from addata where ad_type ='$type' AND ad_status=1 limit 5";
            $this->load->database();
            $query=$this->db->query($sql);
            return $query;
        }

        public function getMyData(){
            $id = $this->session->id;
            $sql = "SELECT * from addata where user_id ='$id'";
            $this->load->database();
            $query=$this->db->query($sql);
            return $query;
        }

        public function getDetails(){
             $sql = "SELECT * from addata";
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

        public function getTempAdvtData($id){
             $sql = "SELECT * from tempaddata where ad_id = '$id' ";
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

        public function payRqstDetails($i){
            $sql = "SELECT * from tempaddata T join user U on U.id = T.user_id where T.ad_id = '$i'";
            $this->load->database();
            $query=$this->db->query($sql);
            return $query;
        }

        public function getAmount($i){
            $i = $i.'.cost';
            $sql = "SELECT * from memplan where value = '$i'";
            $this->load->database();
            $query=$this->db->query($sql);
            foreach($query->result() as $row):
                return $row->desp;
            endforeach;
        }

        public function addTransactionDetails($a,$b,$c,$d){
            $sql = "INSERT INTO transaction (t_ad_id,t_pay_rqst_id,t_amt,t_url)values('$a','$b','$c','$d')";
            $this->load->database();
            $this->db->query($sql);
            return true;
        }

        public function UpdateTransactionDetails($pid,$prid){
            $sql = "UPDATE transaction set t_payment_id = '$pid' where t_pay_rqst_id = '$prid'";
            $this->load->database();
            $this->db->query($sql);
            return true;
        }

        public function updateAddData($id,$adname,$addesc,$adprice,$adcategory,$adsubcat){
            $sql = "UPDATE addata set ad_name = '$adname',ad_desc = '$addesc',ad_price = '$adprice',ad_cat = '$adcategory',ad_subcat = '$adsubcat' where ad_id = $id";
            $this->load->database();
            $this->db->query($sql);
            return true;
        }

       public function getAdType($i){
            $sql = "SELECT * from addata where ad_id = $i";
            $this->load->database();
            $query = $this->db->query($sql);
            $type = '';
            foreach ($query->result() as $row) {
                $type = $row->ad_type;
            }
            return $type;
       }

       public function getMaxImageCount($type){
            $i = $type.'.photos';
            $sql = "SELECT * from memplan where value = '$i'";
            $this->load->database();
            $query=$this->db->query($sql);
            foreach($query->result() as $row):
                return $row->desp;
            endforeach;
       }

    }