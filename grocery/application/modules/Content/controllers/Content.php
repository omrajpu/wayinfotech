<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends MX_Controller {
    function __construct(){
		
		parent::__construct();
		 $this->load->model('Shopping_model');
		$this->load->helper(array('form', 'url','new'));
		
}
    
    
 function _remap($method)
 {
 	$data['category_data']=$this->Shopping_model->getDirectQueryCommonData('SELECT id,category_name,image_url  FROM `category_details` ORDER BY `id` ASC');
   //print_r($data);die;
 	//die;
	
 	$contnt=$this->getContent($method);
	if(!empty($contnt)){
 		$data['title']=@$contnt->name;
		$data['contents']=@$contnt->description;
	
 		$data['subview']="page";
         $this->load->view('layout/default',$data);
		
 	}else{
 		show_404();
		
 	}
 
	     

    
  }

 public function getContent($slug){
	 
	 $this->db->select('*');
	 $this->db->from('tbl_cms');
	 $this->db->where('slug',$slug);
	 $this->db->where('status',1);
	 $q=$this->db->get();
	
	
	 if($q->num_rows()>0){
		 
		 return $q->row();
		 
	 }
	 return (object)array();
  }

}  
		