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
		if($this->session->type!= 'user' ){
			header('Location:'.base_url(''));
		}else{
			$this->load->view('user/pre.php');
			$this->load->view('user/header_icon.php');	
			$this->load->view('user/advertise.php');	
			// $this->load->view('user/featured_ad.php');	
			$this->load->view('user/footer.php');
			$this->load->view('user/post.php');
		}
	}

	public function add(){

		$adName = $this->input->post('adname');
		$adDesc = $this->input->post('desc');
		$adPrice = $this->input->post('price');
		$adCat = $this->input->post('cat');
		$adSubCat = $this->input->post('subcat');

		$this->load->model('advertise_model');
		$this->load->helper('string');
		$tempid = random_string('alnum', 16);

		$data = $this->advertise_model->tempAddData($tempid,$adName,$adDesc,$adPrice,$adCat,$adSubCat);

		if($data){
				$status = 'success';
	 			$desc = 'Data Validated. Please select Plan';
	 			header('Content-Type: application/json');
		    	die(json_encode(array('status'=>$status,'desc' => $desc,'tempid'=>$tempid)));
			}else{
				$status = 'failure';
	 			$desc = 'Something Went Wrong';
	 			header('Content-Type: application/json');
		    	die(json_encode(array('status'=>$status,'desc' => $desc)));
			}
	}

	

	public function view($i){

		if($this->session->type!= 'admin' ){
			header('Location:'.base_url(''));
		}else{
			$this->load->model('Advertise_model');
	 		$data['advertisements'] = $this->Advertise_model->getDetailsbyId($i);
	 		$data['images'] = $this->Advertise_model->getImageIds($i);
	 		$this->load->view('admin/pre');
	 		$this->load->view('admin/header');
	 		$this->load->view('admin/side_nav');
	 		$this->load->view('admin/advertisements_ind_disp',$data);
	 		$this->load->view('admin/post');
 		}
	}

	public function archive ($i){
		if($this->session->type!= 'admin' ){
			header('Location:'.base_url(''));
		}else{
			$this->load->model('Advertise_model');
			$data = $this->Advertise_model->archive($i);
			if($data){
				header("location:".base_url('index.php/dashboard/advts'));
			}
		}
	}

	public function unarchive ($i){
		if($this->session->type!= 'admin' ){
			header('Location:'.base_url(''));
		}else{
			$this->load->model('Advertise_model');
			$data = $this->Advertise_model->unarchive($i);
			if($data){
				header("location:".base_url('index.php/dashboard/advts'));
			}
		}
	}

	public function edit($i){

		if($this->session->type!= 'admin' ){
			header('Location:'.base_url(''));
		}else{
			$this->load->model('Advertise_model');
			$data['advertisements'] = $this->Advertise_model->getDetailsbyId($i);
			$data['images'] = $this->Advertise_model->getImageIds($i);
			$this->load->view('admin/pre');
	 		$this->load->view('admin/header');
	 		$this->load->view('admin/side_nav');
	 		$this->load->view('admin/advertisements_ind_edit',$data);
	 		$this->load->view('admin/post');
 		}
	}

	public function update($i){

		if($this->session->type!= 'admin' ){
			header('Location:'.base_url(''));
		}else{

			$this->load->model('Advertise_model');
			
			$startdate = $this->input->post('startdate');
			$enddate = $this->input->post('enddate');
			 
			$memplan = $this->input->post('memplan');
			$adstatus = $this->input->post('adstatus');

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

			if($adstatus == ''){
				$status = 'failure';
	 			$desc = 'Something Went Wrong';
	 			header('Content-Type: application/json');
		    	die(json_encode(array('status'=>$status,'desc' => $desc)));
			}

			$data = $this->Advertise_model->updateById($i,$startdate,$enddate,$memplan,$adstatus);
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

	public function payment($i,$j){
		$this->load->model('Advertise_model');
		$data = $this->Advertise_model->verifyIdPlan($i,$j);
		if($data){
			header('location:'.base_url('index.php/advts/cnfrmadvt/').$j);
		}else{
			$status = 'failure';
 			$desc = 'Something Went Wrong';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc)));
		}
	}

	public function cnfrmadvt($i){
		$this->load->model('Advertise_model');
		$data['advertisement'] = $this->Advertise_model->getTempAdvtData($i);
		$this->load->view('user/pre');
 		$this->load->view('user/header');
 		$this->load->view('user/advts_cnf_ind_disp',$data);
 		$this->load->view('user/post');
	}

	public function payRequest($i,$j){
		$this->load->model('Advertise_model');
		$data['info']=$this->Advertise_model->payRqstDetails($i);
		$data['cost'] = $this->Advertise_model->getAmount($j);
		$this->load->view('user/pre');
		$this->load->view('user/pay_rqst.php',$data);
	}

	public function transaction(){
		$a = $this->input->post('a');
		$b = $this->input->post('b');
		$c = $this->input->post('c');
		$d = $this->input->post('d');
		$this->load->model('Advertise_model');

		$data = $this->Advertise_model->addTransactionDetails($a,$b,$c,$d);
		if($data){
			$status = 'success';
 			$desc = 'added succesfully';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc)));		}else{
			$status = 'failure';
 			$desc = 'Something Went Wrong';
 			header('Content-Type: application/json');
	    	die(json_encode(array('status'=>$status,'desc' => $desc)));
		}
	}

	public function success(){
		$pId = $_GET['payment_id'];
		$prId = $_GET['payment_request_id'];
		$this->load->model('Advertise_model');
		$data = $this->Advertise_model->UpdateTransactionDetails($pId,$prId);
	
	if($data){
			$status = 'success';
 			$desc = 'Payment succesfully added';
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
