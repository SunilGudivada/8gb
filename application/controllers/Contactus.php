<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactus extends CI_Controller {

	public function __construct() {
	    parent::__construct();
		$this->load->helper('url_helper');
		$this->load->library('session'); 
 	}

 	public function index(){
 		$this->load->view('user/pre');
		$this->load->view('user/header');		
		$this->load->view('user/contact');
		$this->load->view('user/footer');
		$this->load->view('user/post');
 	}

 	public function submit(){
 		$username = $this->input->post('username');
 		$email = $this->input->post('email');
 		$desc = $this->input->post('description');

 		// $username = 'sunil';
 		// $email = 'sunilgudivada369@gmail.com';
 		// $desc = 'Something will be written here.';
 		
 		if($username == ''){
 			$status = 'failure';
 			$desc = 'Please Enter username';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc)));
 		}

 		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
 			$status = 'failure';
 			$desc = 'Email Incorrect';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc)));
 		}

 		if($desc == ''){
 			$status = 'failure';
 			$desc = 'Please Describe your problem';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc)));
 		}

 		$this->load->model('Analytics_model');
 		$data=$this->Analytics_model->addContactDetails($username,$email,$desc);

 		if($data){
	 		$status = 'success';
			$desc = 'Contact form submitted';
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