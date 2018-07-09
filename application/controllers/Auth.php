<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Auth extends CI_Controller {

	public function __construct() {
	    parent::__construct();
		$this->load->helper('url_helper');
		$this->load->library('session'); 
		$this->load->model('Auth_model');
 	}

 	/**
 	* signup function to feed the data into the Database through the Auth_model.
 	* @param string $uname is the username and cannot be null, unique.
 	* @param string $email is the Email, cannot be null, unique.
 	* @param string $pass is the password, cannot be null,lessthan 8, must contain letters and numbers.
 	* @param string $cpass is the confirm password, checks this password.
 	* @return array object if the data is validated and verified to be unique.
 	*/

 	public function signup(){

 		$uname = $this->input->post('uname');
 		$email = $this->input->post('cemail');
 		$pass = $this->input->post('password');
 		$cpass = $this->input->post('cpassword');


 		/**
	    * sample Data set to check all the conditions and satisfies all the conditions
	    * unit Test successfully qualified.
	    */

 		// $uname = 'sunil';
 		// $email = 'sunilgudivada369@gmail.com';
 		// $pass = 'sunil@123';
 		// $cpass = 'sunil@123';


 		/**
	    * @param string $uname is the username and cannot be null,
	    * @return array object if username is null.
	    */
 		if($uname == ''){
 			$status = 'failure';
 			$desc = 'Please Enter username';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc,'uname'=>$uname,'email'=> $email)));
 		}

 		/**
	    * @param string $uname is the username and check if the username already exist in the database,
	    * @return array object if username already exists.
	    */
 		if(!$this->Auth_model->check_username($uname)){
 			$status = 'failure';
 			$desc = 'Username already exist';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc,'uname'=>$uname,'email'=> $email)));
 		}

 		/**
	    * @param string $email is the email and cannot be null,
	    * @return array object if email is invalid.
	    */
 		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
 			$status = 'failure';
 			$desc = 'Email Incorrect';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc,'uname'=>$uname,'email'=> $email)));
 		}

 		/**
	    * @param string $email is the email and check if the email already exist in the database,
	    * @return array object if email already exists.
	    */
 		if(!$this->Auth_model->check_email($email)){
 			$status = 'failure';
 			$desc = 'Username already exist';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc,'uname'=>$uname,'email'=> $email)));
 		}

 		/**
	    * @param string $pass is the password set for the user and cannot be null, check alphabet [0-9]
	    * @return array object if password length is lessthan 6.
	    */
 		if(strlen($pass)<6){
 			$status = 'failure';
 			$desc = 'Password too Short. <br>Password Length should be more than 6.';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc,'uname'=>$uname,'email'=> $email)));
 		}

 		/**
	    * @param string $pass is the password set for the user and cannot be null, check alphabet [0-9]
	    * @return array object if password is not having any number.
	    */
 		if(!preg_match("#[0-9]+#", $pass)){
 			$status = 'failure';
 			$desc = 'Password Must include one number';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc,'uname'=>$uname,'email'=> $email)));
 		}

 		/**
	    * @param string $pass is the password set for the user and cannot be null, check alphabet [a-zA-Z]
	    * @return array object if password is not having any letter.
	    */
 		if(!preg_match("#[a-zA-Z]+#", $pass)){
 			$status = 'failure';
 			$desc = 'Password Must include one letter';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc,'uname'=>$uname,'email'=> $email)));
 		}

 		/**
	    * @param string $pass cannot be null [0-9a-zA-Z],check the password and confirm Password.
	    * @return array object incase of password mismatch.
	    */
 		if($pass != $cpass){
 			$status = 'failure';
 			$desc = 'Password Mismatch.';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc,'uname'=>$uname,'email'=> $email)));
 		}

 		/**
	    * @param string $uname cannot be null and is unique
	    * @param string $email cannot be null and is unique
	    * @param string $pass is the password set for the user and cannot be null [0-9a-zA-Z]
	    * @return array object with Data validation.
	    */
 		$this->Auth_model->signup($uname,$email,$pass);
		$status = 'success';
		$desc = 'Data Validated.';
		header('Content-Type: application/json');
		die(json_encode(array('status'=>$status,'desc' => $desc,'uname'=>$uname,'email'=> $email)));
 	}

 	public function signin(){

 		$email = $this->input->post('sia');
 		$pass = $this->input->post('sib');


 		/**
	    * sample Data set to check all the conditions and satisfies all the conditions
	    * unit Test successfully qualified.
	    */

 		 // $email = 'sunilgudivada369@gmail.com';
 		 // $pass = 'sunil@123';

 		/**
	    * @param string $email is the email and check if the email exist in the database or not,
	    * @return array object if email doesnot exists.
	    */
 		if($this->Auth_model->check_email($email)){
 			$status = 'failure';
 			$desc = 'EmailId Incorrect';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc,'email'=> $email)));
 		}

 		/**
	    * @param string $pass is the password set for the user and cannot be null, check alphabet [0-9]
	    * @return array object if password length is lessthan 6.
	    */
 		if(strlen($pass)<6){
 			$status = 'failure';
 			$desc = 'Password incorrect';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc,'email'=> $email)));
 		}

 		/**
	    * @param string $pass is the password set for the user and cannot be null, check alphabet [0-9]
	    * @return array object if password is not having any number.
	    */
 		if(!preg_match("#[0-9]+#", $pass)){
 			$status = 'failure';
 			$desc = 'Password Incorrect';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc,'email'=> $email)));
 		}

 		/**
	    * @param string $pass is the password set for the user and cannot be null, check alphabet [a-zA-Z]
	    * @return array object if password is not having any letter.
	    */
 		if(!preg_match("#[a-zA-Z]+#", $pass)){
 			$status = 'failure';
 			$desc = 'Password Incorrect';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc,'email'=> $email)));
 		}

 		$data = $this->Auth_model->signin($email,$pass);

 		if($data){
	 		$status = 'success';
			$desc = 'Data Validated.';
			header('Content-Type: application/json');
			die(json_encode(array('status'=>$status,'desc' => $desc,'email'=> $email)));
		}else{
			$status = 'failure';
 			$desc = 'Something went wrong';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc,'email'=> $email)));
		}
 	}

 	public function logout(){
 		$this->load->view('logout');
 	}

 	public function access(){
 		$this->load->view('admin/pre');
 		$this->load->view('admin/access');
 		$this->load->view('admin/post');
 	}

 	public function accessCheck(){
 		$userid = $this->input->post('userid');
 		$pass = $this->input->post('pass');

 		$this->load->model('Auth_model');
 		$data = $this->Auth_model->checkAdminAccess($userid,$pass);

 		if($data){
	 		$status = 'success';
			$desc = 'Access Granted';
			header('Content-Type: application/json');
			die(json_encode(array('status'=>$status,'desc' => $desc)));
		}else{
			$status = 'failure';
 			$desc = 'Access Denied';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc)));
		}
 	}

 	public function changePassKey(){

 		if($this->session->type == 'admin'){
	 		$this->load->view('admin/pre');
	 		$this->load->view('admin/updatepassword');
	 		$this->load->view('admin/post');
	 	}else{
	 		header('location:'.base_url('index.php/auth/access'));
	 	}

 	}



 	public function updateAdminPass(){
 		$pass = $this->input->post('pass');

 		$this->load->model('Auth_model');
 		$data = $this->Auth_model->updateAdminPassword($pass);

 		if($data){
	 		$status = 'success';
			$desc = 'Password Changed';
			header('Content-Type: application/json');
			die(json_encode(array('status'=>$status,'desc' => $desc)));
		}else{
			$status = 'failure';
 			$desc = 'Something went wrong';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc)));
		}
 	}
 }