<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
	    parent::__construct();
		$this->load->helper('url_helper');
		$this->load->library('session'); 
 	}

	public function index()
	{
		$this->load->model('Advertise_model');
		$data['ads'] = $this->Advertise_model->getData('premium');
		// $data['ads'] = $this->Advertise_model->getImageData();
		$this->load->view('user/pre.php');
		$this->load->view('user/header.php');		
		$this->load->view('user/home.php');
		$this->load->view('user/slider.php');		
		$this->load->view('user/featured_ad.php',$data);
		$this->load->view('user/footer.php');
		$this->load->view('user/post.php');
	}
}
