<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Property extends MX_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();
		
		$this->load->model('Property_model');
		//$this->load->helper(array('hotel'));
		$this->load->library('session');
	    $this->load->helper(array('form', 'url','new'));
        
	}
	public function property_page()
	    {   
	  	 $cat_id=$this->uri->segment(2);
		 $data['single_cat_data']=$this->Property_model->single_cat_list($cat_id); 
		 $data['subview']="property";
		 $this->load->view('layout/default',$data);
	    }
  public function subcategory_page()
	    { 

	     $sub_cat_id=$this->uri->segment(2); 
	     $cat_id=$this->uri->segment(3);
		 $data['cat_data']=$this->Property_model->cat_list();
		 $data['sub_cat_data']=$this->Property_model->single_sub_cat_list($cat_id,$sub_cat_id);
		//print_r($data);die;
		 $data['subview']="subcategory";
		 $this->load->view('layout/default',$data);
	    }
	  
   public function booking_enquiry(){
   	     $data['enquiry_data']=$this->Property_model->get_booking_enquiry_data();
         $data['subview']="booking-enquiry";
		 $this->load->view('layout/default',$data);

    }
  public function cat_list(){
  	    $data['cat_data']=$this->Property_model->cat_list();
        $data['subview']="cat-list";
		$this->load->view('layout/default',$data);

	}
  public function sub_cat_list(){
		$data['cat_data']=$this->Property_model->sub_cat_list();
        $data['subview']="sub-cat-list";
		$this->load->view('layout/default',$data);

	}
 public function delete_cat_data(){
 	    $table_name=$_POST['tab_name'];
		$col_name=$_POST['col_name'];
		$cond_val=$_POST['cond_val'];
		$res=delete_product_single_data($table_name,$col_name,$cond_val);
		
 }	
public function add_property(){
         $cat_id=$this->input->post('cat_id');
         if($cat_id){
         $cat_name=$this->input->post('cat_name');
		 $cat_desc=$this->input->post('cat_desc');
         $file=@$_FILES['update_photo']['name'];
         $date=date('Y-m-d H:i:s');
         if($file!=''){ 
         	      $upload_file=$this->cat_update_do_upload();
				  $update_data=array('cat_name'=>$cat_name,'cat_desc'=>$cat_desc,'created_date'=>$date,'cat_image'=>$upload_file);	
					
			$msg=$this->Property_model->update_property_data($update_data,$cat_id);
			redirect(base_url().'catlist');
           }
         if($file==''){
         	   $update_data=array('cat_name'=>$cat_name,'cat_desc'=>$cat_desc,'created_date'=>$date);
               $msg=$this->Property_model->update_property_data($update_data,$cat_id);
               redirect(base_url().'catlist');
			}  
        }
        else{	
		 $cat_name=$this->input->post('cat_name');
		 $cat_desc=$this->input->post('cat_desc');
         $file=@$_FILES['photo']['name'];
         $date=date('Y-m-d H:i:s');
         if($file!=''){ 
				  $upload_file=$this->do_upload();
				  $insert_data=array('cat_name'=>$cat_name,'cat_desc'=>$cat_desc,'created_date'=>$date,'cat_image'=>$upload_file);		
			$msg=$this->Property_model->save_property_data($insert_data);
          }

         $data['msg']='Successfully add category.';
         $data['subview']="property";
		 $this->load->view('layout/default', $data);  
	   }
   }
   public function add_subcat(){
   	     $sub_cat_id=$this->input->post('sub_cat_id');
   	     if($sub_cat_id){
		         $cat_id=$this->input->post('cat_id');
		         $sub_cat_name=$this->input->post('sub_cat_name');
		         $sub_cat_desc=$this->input->post('sub_cat_desc');
		         $file=@$_FILES['update_photo']['name'];
		         $date=date('Y-m-d H:i:s');
		         if($file!=''){ 
		         	      $upload_file=$this->sub_cat_update_do_upload();
					      $update_data=array('cat_id'=>$cat_id,'sub_cat_name'=>$sub_cat_name,'sub_cat_desc'=>$sub_cat_desc,'created_date'=>$date,'sub_cat_image'=>$upload_file);		
					$msg=$this->Property_model->update_sub_cat_data($update_data,$sub_cat_id);
					redirect(base_url().'Property/sub_cat_list');
		           }
		         if($file==''){
		         	   $update_data=array('cat_id'=>$cat_id,'sub_cat_name'=>$sub_cat_name,'sub_cat_desc'=>$sub_cat_desc,'created_date'=>$date);	
		               $msg=$this->Property_model->update_sub_cat_data($update_data,$sub_cat_id);
		               redirect(base_url().'Property/sub_cat_list');
		            }		
		  }  
   	     else{	
         $cat_id=$this->input->post('cat_id');
		 $sub_cat_name=$this->input->post('sub_cat_name');
		 $sub_cat_desc=$this->input->post('sub_cat_desc');
         $file=@$_FILES['photo']['name'];
         $date=date('Y-m-d H:i:s');
         if($file!=''){ 
				  $upload_file=$this->sub_do_upload();
				  $insert_data=array('cat_id'=>$cat_id,'sub_cat_name'=>$sub_cat_name,'sub_cat_desc'=>$sub_cat_desc,'created_date'=>$date,'sub_cat_image'=>$upload_file);		
			     $msg=$this->Property_model->save_sub_cat_data($insert_data);
          }
        $data['cat_data']=$this->Property_model->cat_list();
        $data['msg']='Successfully add sub category.';  
        $data['subview']="subcategory";
		$this->load->view('layout/default', $data); 
		} 
	}

public function cat_update_do_upload(){
		
		$file_name =time().'_'.$_FILES['update_photo']['name'];	
		$_FILES['userfile']['name']=time().'_'.$_FILES['update_photo']['name'];
		$_FILES['userfile']['type']= $_FILES['update_photo']['type'];
        $_FILES['userfile']['tmp_name']= $_FILES['update_photo']['tmp_name'];
        $_FILES['userfile']['error']= $_FILES['update_photo']['error'];
        $_FILES['userfile']['size']= $_FILES['update_photo']['size'];
		$path=$this->config->item('base_Url').'upload/cat_images/';
		$config1['upload_path']=$path;
		$config1['allowed_types']='jpg|png|gif';
		$config1['min_hieght']='10';
		$config1['min_width']='10';
		$this->load->library('upload',$config1);
		$this->upload->initialize($config1);
		$this->upload->do_upload('userfile');
		return $file_name;
	  }
public function sub_cat_update_do_upload(){
		
		$file_name =time().'_'.$_FILES['update_photo']['name'];	
		$_FILES['userfile']['name']=time().'_'.$_FILES['update_photo']['name'];
		$_FILES['userfile']['type']= $_FILES['update_photo']['type'];
        $_FILES['userfile']['tmp_name']= $_FILES['update_photo']['tmp_name'];
        $_FILES['userfile']['error']= $_FILES['update_photo']['error'];
        $_FILES['userfile']['size']= $_FILES['update_photo']['size'];
		$path=$this->config->item('base_Url').'upload/sub_cat_images/';
		$config1['upload_path']=$path;
		$config1['allowed_types']='jpg|png|gif';
		$config1['min_hieght']='10';
		$config1['min_width']='10';
		$this->load->library('upload',$config1);
		$this->upload->initialize($config1);
		$this->upload->do_upload('userfile');
		return $file_name;
	  }


	public function do_upload(){
		
		$file_name =time().'_'.$_FILES['photo']['name'];	
		$_FILES['userfile']['name']=time().'_'.$_FILES['photo']['name'];
		$_FILES['userfile']['type']= $_FILES['photo']['type'];
        $_FILES['userfile']['tmp_name']= $_FILES['photo']['tmp_name'];
        $_FILES['userfile']['error']= $_FILES['photo']['error'];
        $_FILES['userfile']['size']= $_FILES['photo']['size'];
		$path=$this->config->item('base_Url').'upload/cat_images/';
		$config1['upload_path']=$path;
		$config1['allowed_types']='jpg|png|gif';
		$config1['min_hieght']='10';
		$config1['min_width']='10';
		$this->load->library('upload',$config1);
		$this->upload->initialize($config1);
		$this->upload->do_upload('userfile');
		return $file_name;
		
		
	}
	public function sub_do_upload(){
		
		$file_name =time().'_'.$_FILES['photo']['name'];	
		$_FILES['userfile']['name']=time().'_'.$_FILES['photo']['name'];
		$_FILES['userfile']['type']= $_FILES['photo']['type'];
        $_FILES['userfile']['tmp_name']= $_FILES['photo']['tmp_name'];
        $_FILES['userfile']['error']= $_FILES['photo']['error'];
        $_FILES['userfile']['size']= $_FILES['photo']['size'];
		$path=$this->config->item('base_Url').'upload/sub_cat_images/';
		$config1['upload_path']=$path;
		$config1['allowed_types']='jpg|png|gif';
		$config1['min_hieght']='10';
		$config1['min_width']='10';
		$this->load->library('upload',$config1);
		$this->upload->initialize($config1);
		$this->upload->do_upload('userfile');
		return $file_name;
		
		
	}
	public function add_booking(){
		 $data['property_name']=$this->Property_model->get_property_name();
         $data['subview']="booking";
		 $this->load->view('layout/default',$data);

	}
public function savebooking(){
	//echo phpinfo();
	//print_r($_POST); die;
	$p_id=$this->input->post('p_id');
    $to_date=$this->input->post('to_date');
    $to_date=explode('/',$to_date);
    $to_date=$to_date[2].'-'.$to_date[0].'-'.$to_date[1];
    $from_date2=$this->input->post('from_date');
    $from_date3=explode('/',$from_date2);
    $from_date=$from_date3[2].'-'.$from_date3[0].'-'.$from_date3[1];
    $date=date('Y-m-d H:i:s');
    $data=array(
             'p_id'=>$p_id,
             'b_to_date'=>$to_date,
             'b_from_date'=>$from_date,
             'b_create_date'=>$date
             );
    $res=$this->Property_model->save_booking_data($data);
    
    //$msg=$this->set_flashdata('msg','Successfully save');
    //echo"Successfully save.";
    redirect(base_url().'addbooking');
   }
  public function check_availability(){
  	$pid=$this->uri->segment(2);
  	$data['booking_date']=$this->Property_model->get_booking_date($pid);
  	$data['subview']="check-ability";
    $this->load->view('layout/default',$data);

  }
}
