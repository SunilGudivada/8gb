<?php

class Analytics_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function getTotalUsers(){
    	$sql = "SELECT COUNT(*)as 'count' FROM `user` WHERE 1";
    	$this->load->database();
    	$query = $this->db->query($sql);
    	return $query;
    }

    public function getNewSignUps(){
    	date_default_timezone_set('Asia/Kolkata');
    	$today = date("Y-m-d");
    	$yestarday = date('Y-m-d',(strtotime ( '-1 day' , strtotime ( $today) ) ));
    	$sql = "SELECT COUNT(*)as 'count' FROM `user` WHERE time<'$today' ";
    	$this->load->database();
    	$query = $this->db->query($sql);
    	return $query;
    }

    public function getTotalAdvertisements(){
    	$sql = "SELECT COUNT(*)as 'count' FROM `addata`";
    	$this->load->database();
    	$query = $this->db->query($sql);
    	return $query;
    }

    public function getFreeAdvertisements(){
    	$sql = "SELECT COUNT(*)as 'count' FROM `addata` where ad_type ='free'";
    	$this->load->database();
    	$query = $this->db->query($sql);
    	return $query;
    }

    public function getProfessionalAdvertisements(){
    	$sql = "SELECT COUNT(*)as 'count' FROM `addata` where ad_type ='professional'";
    	$this->load->database();
    	$query = $this->db->query($sql);
    	return $query;
    }

    public function getPremiumAdvertisements(){
    	$sql = "SELECT COUNT(*)as 'count' FROM `addata` where ad_type ='premium'";
    	$this->load->database();
    	$query = $this->db->query($sql);
    	return $query;
    }

    public function getTotalRevenue(){
    	$sql = "SELECT SUM(t_amt)as 'count' FROM `transaction` where t_payment_id !=''";
    	$this->load->database();
    	$query = $this->db->query($sql);
    	return $query;
    }

    public function getTodayRevenue(){
    	$today = date("Y-m-d");
    	$sql = "SELECT SUM(t_amt)as 'count' FROM `transaction` where t_payment_id !='' and timestamp < '$today'";
    	$this->load->database();
    	$query = $this->db->query($sql);
    	return $query;
    }

    public function addContactDetails($a,$b,$c){
        $sql ="INSERT INTO contactform (Name,Email_id,Description) Values('$a','$b','$c')";
        $this->load->database();
        $this->db->query($sql);
        return true;
    }
}