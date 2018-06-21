<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User extends CI_Controller {

	public function __construct() {
	    parent::__construct();
		$this->load->helper('url_helper');
		$this->load->library('session'); 

		// if($this->session->type!= 'admin' ){
		// 	header('Location:'.base_url(''));
		// }
 	}

 	public function block($i){
 		$this->load->model('User_model');
 		$data = $this->User_model->block($i);
 		if($data){
 			header("Location:".base_url('index.php/dashboard/users'));
 		}
 		 	
 	}

 	public function unblock($i){
 		$this->load->model('User_model');
 		$data = $this->User_model->unblock($i);
 		if($data){
 			header("Location:".base_url('index.php/dashboard/users'));
 		}
 		
 	}
 }