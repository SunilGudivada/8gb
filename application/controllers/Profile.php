<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Profile extends CI_Controller {

	public function __construct() {
	    parent::__construct();
		$this->load->helper('url_helper');
		$this->load->library('session'); 

		if($this->session->type!= 'user' ){
			header('Location:'.base_url(''));
		}
 	}

 	public function index(){
 		
 		$this->load->model('Advertise_model');
		$data['ads'] = $this->Advertise_model->getMyData();

		$this->load->model('Auth_model');
		$data['userDetails'] = $this->Auth_model->getUserDetails();

		$this->load->view('user/pre');
		$this->load->view('user/header_icon');	
		$this->load->view('user/profile',$data);
		$this->load->view('user/footer');
		$this->load->view('user/post');
 	}

 	public function update(){
 		
 		$firstname = $this->input->post('firstname');
 		$middlename = $this->input->post('middlename');
 		$lastname = $this->input->post('lastname');
 		$email = $this->input->post('email');
 		$phone = $this->input->post('phone');

 		// $firstname = 'sunil';
 		// $middlename = '';
 		// $lastname = 'gudivada';
 		// $email = 'sunil@8gb.io';
 		// $phone = '9493174617';

 		if($firstname == ''){
 			$status = 'failure';
 			$desc = 'First name cannot be empty';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc)));
 		}

 		if($lastname == ''){
 			$status = 'failure';
 			$desc = 'last name cannot be empty';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc)));
 		}

 		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
 			$status = 'failure';
 			$desc = 'Email Incorrect';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc)));
 		}

		if($phone == ''){
			$status = 'failure';
 			$desc = 'Phone number field cannot be empty';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc)));
 		} 		



		$this->load->model('Auth_model');
		$data = $this->Auth_model->updateUserDetails($firstname,$middlename,$lastname,$email,$phone);

		if($data){
			$status = 'success';
 			$desc = 'Data updated';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc)));
		}else{
			$status = 'failure';
 			$desc = 'Something Went Wrong';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc)));
		}

 	}
 }