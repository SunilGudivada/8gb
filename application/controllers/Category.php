<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Category extends CI_Controller {

	public function __construct() {
	    parent::__construct();
		$this->load->helper('url_helper');
		$this->load->library('session'); 

		// if($this->session->type!= 'admin' ){
		// 	header('Location:'.base_url(''));
		// }
 	}

 	public function add(){
 		
 		$this->load->model('Category_model');
 		$catName = $this->input->post('catname');
 		$catId = $this->input->post('catid');

 		if($catName == ''){
 			$status = 'failure';
 			$desc = 'Category Name should be filled';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc,'category'=>$catName)));
 		}

 		if($$catId == ''){
 			$status = 'failure';
 			$desc = 'Category Id should be filled';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc,'category'=>$catName)));
 		}
 		$data = $this->Category_model->addcat($catName,$catId);

 		if($data){
 			$status = 'success';
 			$desc = 'Category Added';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc,'category'=>$catName)));
 		}
 	}

 	public function delete($i){

 		$this->load->model('Category_model');
 		$catId = $i;
 		$data = $this->Category_model->deletecat($i);
 		if($data){
 			header("location:".base_url('index.php/dashboard/category'));
 		}


 	}
 }