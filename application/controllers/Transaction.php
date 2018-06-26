<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Transaction extends CI_Controller {

	public function __construct() {
	    parent::__construct();
		$this->load->helper('url_helper');
		$this->load->library('session'); 
		$this->load->helper(array('form', 'url'));
 	}

 	public function cnfTrans(){
 		$id = $this->input->post('id');
 		$this->load->model('Transaction_model');
 		$data = $this->Transaction_model->cnfPaytment($id);
 		if($data){
			$status = 'success';
 			$desc = 'Transaction Updated.';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc,)));
		}else{
			$status = 'failure';
 			$desc = 'Something Went Wrong';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc)));
		}
 	}
 }