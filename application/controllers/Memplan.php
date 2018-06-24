<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Memplan extends CI_Controller {

	public function __construct() {
	    parent::__construct();
		$this->load->helper('url_helper');
		$this->load->library('session'); 
		$this->load->helper(array('form', 'url'));
 	}

 	public function edit($i){
 		$this->load->model('Memplan_model');
 		$data['memplan'] = $this->Memplan_model->getDetailsById($i);
 		$this->load->view('admin/pre');
 		$this->load->view('admin/header');
 		$this->load->view('admin/side_nav');
 		$this->load->view('admin/memplan_edit',$data);
 		$this->load->view('admin/post');
 	}

 	public function update($i){
 		$value = $this->input->post('value');
 		$this->load->model('Memplan_model');
 		$data = $this->Memplan_model->update($i,$value);
 		if($data){
			$status = 'success';
 			$desc = 'Membership Plan updated.';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc,)));
		}else{
			$status = 'failure';
 			$desc = 'Something Went Wrong';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc)));
		}
 	}

 	public function add(){
 		$memplan = $this->input->post('memplan');
 		$desc = $this->input->post('desc');

 		// $memplan = 'free';
 		// $desc ="its working";
 		if($memplan == ''){
 			$status = 'failure';
 			$desc = 'Please select Membership plan';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc)));
 		}

 		if($desc == ''){
 			$status = 'failure';
 			$desc = 'Please Enter some value';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc)));
 		}
 		$this->load->model('Memplan_model');
 		$data = $this->Memplan_model->add($memplan,$desc);
 		if($data){
			$status = 'success';
 			$desc = 'Membership Plan updated.';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc,)));
		}else{
			$status = 'failure';
 			$desc = 'Something Went Wrong';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc)));
		}
 	}

 	public function delete($i){
 		$this->load->model('Memplan_model');
 		$data = $this->Memplan_model->delete($i);
 		if($data){
			header('location:'.base_url('index.php/dashboard/memplan'));
		}else{
			$status = 'failure';
 			$desc = 'Something Went Wrong';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc)));
		}
 	}

 }