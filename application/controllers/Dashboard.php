<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Dashboard extends CI_Controller {

	public function __construct() {
	    parent::__construct();
		$this->load->helper('url_helper');
		$this->load->library('session'); 
		$this->load->helper(array('form', 'url'));

		if($this->session->type!= 'admin' ){
			header('Location:'.base_url(''));
		}
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

 	public function users(){
 		$this->load->model('User_model');
 		$data['user'] = $this->User_model->getDetails();
 		$this->load->view('admin/pre');
 		$this->load->view('admin/header');
 		$this->load->view('admin/side_nav');
 		$this->load->view('admin/user_disp',$data);
 		$this->load->view('admin/post');
 	}

 	public function advts(){
 		$this->load->model('Advertise_model');
 		$data['advertisements'] = $this->Advertise_model->getDetails();
 		$this->load->view('admin/pre');
 		$this->load->view('admin/header');
 		$this->load->view('admin/side_nav');
 		$this->load->view('admin/advertisements_disp',$data);
 		$this->load->view('admin/post');
 	}

 	public function watermark(){
 		$this->load->library('image_lib');
 		$config['image_library'] = 'gd2';

 		for($i=5;$i<=9;$i++){

 		$config['source_image'] = './assets/images/gallary/'.$i.'.jpg';
 		echo base_url('assets/images/gallary/'.$i.'.jpg').'<br>';
		$this->load->library('image_lib');
	    $config['new_image'] = './assets/images/gallary/'.$i.'.jpg';
	    $config['wm_overlay_path'] = './assets/images/watermark.png';

	    $config['wm_type'] = 'overlay';
	    //the overlay image
	    $config['wm_opacity'] = 90;
	    $config['wm_vrt_alignment'] = 'bottom';
	    $config['wm_hor_alignment'] = 'right';
	    $this->image_lib->initialize($config);

	    $this->image_lib->watermark();

		}

 	}

 	public function upload($i){
 		$data = array('error' => '','advt_id'=>$i);;
 		$this->load->view('admin/pre');
 		$this->load->view('admin/header');
 		$this->load->view('admin/side_nav');
 		$this->load->view('admin/fileupload',$data);
 		$this->load->view('admin/post');
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
	        $this->load->view('admin/pre');
	 		$this->load->view('admin/header');
	 		$this->load->view('admin/side_nav');
	 		$this->load->view('admin/fileupload',$error);
	 		$this->load->view('admin/post');
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
		    $config['width'] = 480;
		    $config['width'] = 360;
		    $config['wm_type'] = 'overlay';
		    //the overlay image
		    $config['wm_opacity'] = 40;
		    $this->image_lib->clear();
		    $this->image_lib->initialize($config);
		    $this->image_lib->resize();
		    $this->image_lib->watermark();
		    header("Location:".base_url('index.php/advts/view/').$i);
        }

      }

    public function gallary(){
      	$this->load->view('admin/pre');
 		$this->load->view('admin/header');
 		$this->load->view('admin/side_nav');
 		$this->load->view('admin/gallary');
 		$this->load->view('admin/post');
    }

    public function memplan(){

    	$this->load->model('Memplan_model');
    	$data['memplan'] = $this->Memplan_model->getDetails();

    	$this->load->view('admin/pre');
 		$this->load->view('admin/header');
 		$this->load->view('admin/side_nav');
 		$this->load->view('admin/memplan_disp',$data);
 		$this->load->view('admin/post');
    }

    public function transactionsPaid(){

    	$this->load->model('Transaction_model');
    	$data['transactions'] = $this->Transaction_model->getDetailsPaid();

    	$this->load->view('admin/pre');
 		$this->load->view('admin/header');
 		$this->load->view('admin/side_nav');
 		$this->load->view('admin/transactions_disp',$data);
 		$this->load->view('admin/post');
    }

    public function transactionsPending(){

    	$this->load->model('Transaction_model');
    	$data['transactions'] = $this->Transaction_model->getDetailsPending();

    	$this->load->view('admin/pre');
 		$this->load->view('admin/header');
 		$this->load->view('admin/side_nav');
 		$this->load->view('admin/transactions_disp_pending',$data);
 		$this->load->view('admin/post');
    }
 }