<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Advts extends CI_Controller {

	public function __construct() {
	    parent::__construct();
		$this->load->helper('url_helper');
		$this->load->library('session'); 

		// if($this->session->type!= 'user' ){
		// 	header('Location:'.base_url(''));
		// }
 	}

	public function index()
	{
		$this->load->view('user/Pre.php');
		$this->load->view('user/header_icon.php');	
		$this->load->view('user/advertise.php');	
		$this->load->view('user/featured_ad.php');	
		$this->load->view('user/footer.php');
		$this->load->view('user/Post.php');
	}

	public function add(){

		$adName = $this->input->post('adname');
		$adDesc = $this->input->post('desc');
		$adPrice = $this->input->post('price');
		$adCat = $this->input->post('cat');
		$adSubCat = $this->input->post('subcat');

		$this->load->model('advertise_model');

		$this->advertise_model->addData($adName,$adDesc,$adPrice,$adCat,$adSubCat,'free');

	}
	public function success()
	{
		$this->load->view('user/Pre.php');
		$this->load->view('user/header_icon.php');	
		$this->load->view('user/Post.php');
	}

	public function view($i){
		$this->load->model('Advertise_model');
 		$data['advertisements'] = $this->Advertise_model->getDetailsbyId($i);
 		$data['images'] = $this->Advertise_model->getImageIds($i);
 		$this->load->view('admin/pre');
 		$this->load->view('admin/header');
 		$this->load->view('admin/side_nav');
 		$this->load->view('admin/advertisements_ind_disp',$data);
 		$this->load->view('admin/post');
	}

	public function archive ($i){
		$this->load->model('Advertise_model');
		$data = $this->Advertise_model->archive($i);
		if($data){
			header("location:".base_url('index.php/dashboard/advts'));
		}
	}

	public function unarchive ($i){
		$this->load->model('Advertise_model');
		$data = $this->Advertise_model->unarchive($i);
		if($data){
			header("location:".base_url('index.php/dashboard/advts'));
		}
	}

	public function edit($i){
		$this->load->model('Advertise_model');
		$data['advertisements'] = $this->Advertise_model->getDetailsbyId($i);
		$this->load->view('admin/pre');
 		$this->load->view('admin/header');
 		$this->load->view('admin/side_nav');
 		$this->load->view('admin/advertisements_ind_disp',$data);
 		$this->load->view('admin/post');
	}

	public function update($i){

		$this->load->model('Advertise_model');
		
		$startdate = $this->input->post('startdate');
		$enddate = $this->input->post('enddate');
		$memplan = $this->input->post('memplan');

		if($startdate == ''){
			$status = 'failure';
 			$desc = 'Something Went Wrong';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc)));
		}

		if($enddate == ''){
			$status = 'failure';
 			$desc = 'Something Went Wrong';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc)));
		}

		if($memplan == ''){
			$status = 'failure';
 			$desc = 'Something Went Wrong';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc)));
		}

		$data = $this->Advertise_model->updateById($i,$startdate,$enddate,$memplan);
		if($data){
			$status = 'success';
 			$desc = 'Advertisement Updated.';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc,)));
		}else{
			$status = 'failure';
 			$desc = 'Something Went Wrong';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc)));
		}
	}

	public function removeImg(){
		$imgadd = $this->input->post('imgval');
		$this->load->model('Advertise_model');
		$data = $this->Advertise_model->deleteImage($imgadd);
		if($data){
			$status = 'success';
 			$desc = 'Advertisement Updated.';
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
