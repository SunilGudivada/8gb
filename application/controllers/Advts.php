<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Advts extends CI_Controller {

	public function __construct() {
	    parent::__construct();
		$this->load->helper('url_helper');
		$this->load->library('session'); 
		$this->load->helper(array('form', 'url'));


		// if($this->session->type!= 'user' ){
		// 	header('Location:'.base_url(''));
		// }
 	}

	public function index()
	{	
		if($this->session->type!= 'user' ){
			header('Location:'.base_url(''));
		}else{
			$this->load->view('user/pre');
			$this->load->view('user/header_icon');	
			$this->load->view('user/advertise');	
			// $this->load->view('user/featured_ad.php');	
			$this->load->view('user/footer');
			$this->load->view('user/post');
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
			$this->load->model('Advertise_model');
	 		$data['advertisements'] = $this->Advertise_model->getDetailsbyId($i);
	 		$data['images'] = $this->Advertise_model->getImageIds($i);
	 		$this->load->view('user/pre');
	 		$this->load->view('user/header');
	 		$this->load->view('user/advertisements_ind_disp',$data);
	 		$this->load->view('user/post');
		}elseif($this->session->type== 'admin'){
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

			$this->load->model('Advertise_model');
			$this->load->model('Subcategory_model');

			$data['advertisements'] = $this->Advertise_model->getDetailsbyId($i);
			$data['images'] = $this->Advertise_model->getImageIds($i);
			$data['subcat'] = $this->Subcategory_model->getDetails();
			$type = $this->Advertise_model->getAdType($i);
			if($type != 'premium'){
				$data['countMaxImages'] = $this->Advertise_model->getMaxImageCount($type);
			}else{
				$data['countMaxImages'] = 999;

			}

			$this->load->view('user/pre');
	 		$this->load->view('user/header');
	 		$this->load->view('user/advertisements_ind_edit',$data);
	 		$this->load->view('user/post');

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

		if($this->session->type== 'user' ){
			
			$adName = $this->input->post('adname');
			$adDesc = $this->input->post('desc');
			$adPrice = $this->input->post('price');
			$adCat = $this->input->post('cat');
			$adSubCat = $this->input->post('subcat');

			// $adName = 'Some Name';
			// $adDesc = 'Some Description';
			// $adPrice = 250;
			// $adCat = 'motor';
			// $adSubCat = 'house';



			if($adName == ''){
				$status = 'failure';
	 			$desc = 'Advertisement title <br> should not be empty';
	 			header('Content-Type: application/json');
		    	die(json_encode(array('status'=>$status,'desc' => $desc)));
			}

			if($adDesc == ''){
				$status = 'failure';
	 			$desc = 'Advertisement Description <br>should not be empty';
	 			header('Content-Type: application/json');
		    	die(json_encode(array('status'=>$status,'desc' => $desc)));
			}

			if($adPrice == ''){
				$status = 'failure';
	 			$desc = 'Please add some price <br> to your advertisement';
	 			header('Content-Type: application/json');
		    	die(json_encode(array('status'=>$status,'desc' => $desc)));
			}

			if($adCat == ''){
				$status = 'failure';
	 			$desc = 'Please Select your category';
	 			header('Content-Type: application/json');
		    	die(json_encode(array('status'=>$status,'desc' => $desc)));
			}

			if($adSubCat == ''){
				$status = 'failure';
	 			$desc = 'Please select your subcategory';
	 			header('Content-Type: application/json');
		    	die(json_encode(array('status'=>$status,'desc' => $desc)));
			}

			$this->load->model('advertise_model');

			$data = $this->advertise_model->updateAddData($i,$adName,$adDesc,$adPrice,$adCat,$adSubCat);

			if($data){
				$status = 'success';
	 			$desc = 'Data Updated';
	 			header('Content-Type: application/json');
		    	die(json_encode(array('status'=>$status,'desc' => $desc)));
			}else{
				$status = 'failure';
	 			$desc = 'Something Went Wrong';
	 			header('Content-Type: application/json');
		    	die(json_encode(array('status'=>$status,'desc' => $desc)));
			}

		}elseif($this->session->type== 'admin'){

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

	public function upload($i){
 		$data = array('error' => '','advt_id'=>$i);;
 		$this->load->view('user/pre');
 		$this->load->view('user/header');
 		$this->load->view('user/fileupload',$data);
 		$this->load->view('user/post');
 	}

 	public function do_upload($i)
    {
        $config['upload_path']          = './assets/images/upload/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2048;
        $config['encrypt_name']         = TRUE;
		$new_name                       = time();
		$config['file_name']            = $new_name;
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());
	        $this->load->view('user/pre');
	 		$this->load->view('user/header');
	 		$this->load->view('user/fileupload',$error);
	 		$this->load->view('user/post');
        }
        else
        {
            $data = array('upload_data' => $this->upload->data(),'advt_id'=>$i);
            $imageName= $data['upload_data']['file_name'];
            $this->load->model('Upload_model');
            $this->Upload_model->addImage($imageName,1,$i);

            $this->load->library('image_lib');
	 		$config['image_library'] = 'gd2';


	 		$config['source_image'] = './assets/images/upload/'.$imageName;
			$this->load->library('image_lib');
		    $config['new_image'] = './assets/images/upload/'.$imageName;
		    $config['wm_overlay_path'] = './assets/images/logo_wm.png';
		    $config['maintain_ratio']= TRUE;
		    $config['width'] = 500;
		    $config['width'] = 500;
		    $config['wm_type'] = 'overlay';
		    //the overlay image
		    $config['wm_opacity'] = 40;
		    $this->image_lib->clear();
		    $this->image_lib->initialize($config);
		    $this->image_lib->resize();
		    $this->image_lib->watermark();
		    header("Location:".base_url('index.php/advts/edit/').$i);
        }

      }



}
