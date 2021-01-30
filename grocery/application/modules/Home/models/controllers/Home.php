<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
         function __construct(){
			parent::__construct();
			$this->load->model('Home_model');
			$this->load->library('session');
			$this->load->helper(array('form', 'url'));

		   }

 public function index()
	   { 
	       //echo phpinfo();
       //error_reporting(1); 
        $data['home_top_silider_data']=$this->Home_model->home_top_silider_data();
        $data['spacial_note_silider_data']=$this->Home_model->spacial_note_silider_data();
        $data['wedding_silider_data']=$this->Home_model->wedding_silider_data();
        $data['notebook_silider_data']=$this->Home_model->notebook_silider_data();
        $data['personal_silider_data']=$this->Home_model->personal_silider_data();
        $data['interest_silider_data']=$this->Home_model->interest_silider_data();
        $data['officeuse_silider_data']=$this->Home_model->officeuse_silider_data();
        $data['wedding_home_banner']=$this->Home_model->wedding_home_banner_data();
        $data['notebook_home_banner']=$this->Home_model->notebook_home_banner();
        $data['personal_home_banner']=$this->Home_model->personal_home_banner();
        $data['interest_home_banner']=$this->Home_model->interest_home_banner();
        $data['officeuse_home_banner']=$this->Home_model->officeuse_home_banner();

        $data['subview']="home_page";
		$this->load->view('layout/default', $data);
	  }

  public function homelist($id){
		echo $id;
	}
}
