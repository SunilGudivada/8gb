<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Advertise extends CI_Controller {

	public function __construct() {
	    parent::__construct();
		$this->load->helper('url_helper');
		$this->load->library('session'); 

		if($this->session->type!= 'user' ){
			header('Location:'.base_url(''));
		}
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

}
