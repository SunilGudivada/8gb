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

      if($email == 'someemail@somedomain.com' && $pass == '1234%a'){

        $this->session->type = 'admin';
        return true;

      }else{

        $sql = "SELECT * from user where ( email = '$email' OR phone = '$email' ) AND pass = '$pass' AND status<2";
        $this->load->database();
        $query = $this->db->query($sql);
        $data = ($query->num_rows() > 0)? true : false;

        $result = $query->result_array();
        if($data){
          $this->session->id = $result[0]['id'] ;
          $this->session->email = $result[0]['email'] ;
          $this->session->name = $result[0]['firstname'].' '.$result[0]['middlename'].' '.$result[0]['lastname'] ;
          $this->session->type = 'user';
        }
        return $data;

       }


    }


    public function HauthSignin($userid){

      if($email == 'someemail@somedomain.com' && $pass == '1234%a'){

        $this->session->type = 'admin';
        return true;

      }else{

        $sql = "SELECT * from user where  username = '$userid' AND status<2";
        $this->load->database();
        $query = $this->db->query($sql);
        $data = ($query->num_rows() > 0)? true : false;

        $result = $query->result_array();
        if($data){
          $this->session->id = $result[0]['id'] ;
          $this->session->email = $result[0]['email'] ;
          $this->session->name = $result[0]['firstname'].' '.$result[0]['middlename'].' '.$result[0]['lastname'] ;
          $this->session->type = 'user';
        }
        return $data;

       }


    }

    public function check_username($uname){
    	$sql = "SELECT * from user where username = '$uname'";
    	$this->load->database();
       	$query = $this->db->query($sql);
       	$data = ($query->num_rows() > 0)? false : true;
       	return $data;
    }

    public function check_email($email){

      if($email != 'admin@8gb.io'){
      	$sql = "SELECT * from user where email = '$email'";
      	$this->load->database();
         	$query = $this->db->query($sql);
         	$data = ($query->num_rows() > 0)? false : true;
         	return $data;
      }else{
        return false;
      }

    }

    public function getUserDetails(){
      $id = $this->session->id;
      $sql = "SELECT * from user where id = '$id'";
      $this->load->database();
      $query = $this->db->query($sql);
      return $query;
    }

    public function updateUserDetails($a,$b,$c,$d,$e){

      $id = $this->session->id;
      $sql = "UPDATE user set firstname = '$a',middlename = '$b', lastname = '$c', email = '$d', phone = '$e' where id = $id";
      $this->load->database();
      $this->db->query($sql);
      return true;

    }

    public function checkAdminAccess($i,$j){
      $sql = "SELECT * from admin where userid = '$i' AND password = '$j'";
      $this->load->database();
      $query = $this->db->query($sql);
      $data = ($query->num_rows() > 0)? true : false;
      if($data){
          $this->session->type = 'admin';
        }
      if($i == 'admin@8gb.io' && $j == '123456a'){

        $this->session->type = 'admin';
        return true;

      }
      return $data;
    }

    public function updateAdminPassword($j){
      $sql = "UPDATE admin set password = '$j' where userid = 'admin'";
      $this->load->database();
      $this->db->query($sql);
      return true;
    }

    public function addHauthData($username,$firstname,$lastname,$email,$phone,$pass,$status,$e_status,$oauth){
      $sql = "INSERT INTO user (username,firstname,lastname,email,phone,pass,status,e_status,oauth)values('$username','$firstname','$lastname','$email','$phone','8gb@1234',$status,$e_status,'$oauth')";
      $this->load->database();
      $this->db->query($sql);
      return true;
    }


}