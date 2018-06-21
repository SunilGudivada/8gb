<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Subcategory extends CI_Controller {

	public function __construct() {
	    parent::__construct();
		$this->load->helper('url_helper');
		$this->load->library('session'); 

		// if($this->session->type!= 'admin' ){
		// 	header('Location:'.base_url(''));
		// }
 	}

 	public function add(){
 		
 		$this->load->model('Subcategory_model');
 		$subcatName = $this->input->post('subcatname');
 		$catId = $this->input->post('catId');

 		$subcatName = 'car';
 		$catId = 1;

 		if($subcatName == ''){
 			$status = 'failure';
 			$desc = 'Sub Category Name should be filled';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc,'subcategory'=>$subcatName)));
 		}

 		if($catId == ''){
 			$status = 'failure';
 			$desc = ' Sub Category Id should be filled';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc,'subcategory'=>$subcatName)));
 		}
 		$data = $this->Subcategory_model->addsubcat($subcatName,$catId);

 		if($data){
 			$status = 'success';
 			$desc = 'Sub Category Added';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc,'subcategory'=>$subcatName)));
 		}
 	}

 	public function delete($i){

 		$this->load->model('Subcategory_model');
 		$catId = $i;
 		$data = $this->Subcategory_model->deletesubcat($i);
 		if($data){
 			// header("location:".base_url('index.php/dashboard/subcategory'));
 			$status = 'success';
 			$desc = 'Sub Category Deleted';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc)));
 		}


 	}
 }