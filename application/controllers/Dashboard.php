<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Dashboard extends CI_Controller {

	public function __construct() {
	    parent::__construct();
		$this->load->helper('url_helper');
		$this->load->library('session'); 

		// if($this->session->type!= 'admin' ){
		// 	header('Location:'.base_url(''));
		// }
 	}

 	public function index(){
 		$this->load->view('admin/pre');
 		$this->load->view('admin/header');
 		$this->load->view('admin/side_nav');
 		$this->load->view('admin/post');
 	}

 	public function category(){
 		$this->load->model('Category_model');
 		$data['cat'] = $this->Category_model->getDetails();
 		$this->load->view('admin/pre');
 		$this->load->view('admin/header');
 		$this->load->view('admin/side_nav');
 		$this->load->view('admin/category_disp',$data);
 		$this->load->view('admin/post');
 	}

 	public function Subcategory(){
 		$this->load->model('Subcategory_model');
 		$data['subcat'] = $this->Subcategory_model->getDetails();
 		$this->load->view('admin/pre');
 		$this->load->view('admin/header');
 		$this->load->view('admin/side_nav');
 		$this->load->view('admin/subcategory_disp',$data);
 		$this->load->view('admin/post');
 	}

 	public function ContactForm(){
 		$this->load->model('Contact_model');
 		$data['contact'] = $this->Contact_model->getDetails();
 		$this->load->view('admin/pre');
 		$this->load->view('admin/header');
 		$this->load->view('admin/side_nav');
 		$this->load->view('admin/contact_disp',$data);
 		$this->load->view('admin/post');
 	}

 }