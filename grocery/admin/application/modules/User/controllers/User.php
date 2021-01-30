<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MX_Controller {

	public function __construct()
	     {
            parent::__construct();
            
            $this->load->model('User_model');
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->library('session');
            $this->load->database();
            
	  }
	
	public function index()
	     {
             //$data['subview']="user_dashboard";

              $data['checkout_data']=$this->User_model->get_all_shopping_orders();
              $data['checkout_data_total']=$this->User_model->get_all_shopping_total_orders();
              if(@$_SESSION['userid']){
                 $data['subview']="user_dashboard";
                 $this->load->view('layout/default',$data);
                }else{
	            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
                @$this->form_validation->set_rules('password', 'Password', 'required');
                
                if (@$this->form_validation->run() == FALSE)
                {
                   // $this->load->view('admin/login');
                	$data['subview']="login";
                    $this->load->view('layout/default_login',$data);
                }
                else
                {
                    $this->load->library('session');
                    $email = strtolower($this->input->post('email'));
                    $password = strtolower($this->input->post('password'));
                    $result = $this->User_model->login($email,$password);
					      if(@$result -> num_rows() > 0)
                     {
                        foreach (@$result->result() as $row)
                         { 
                            $this->session->userid = $row->id;
                            //$this->session->admin = $row->is_Admin;
                            $this->session->email =  $row->email;
                            //redirect('index.php/admin/dashboard');
                            $data['subview']="user_dashboard";
                            $this->load->view('layout/default',$data);
							
                        }
                    }
                    else
                       {
                        $this->session->set_flashdata('error','Email and Password is Wrong!!');
                        redirect(base_url().'');
                      }
                   }
               } 
	     }
      public function user_list(){
        $data['user_data']= $this->User_model->get_user_data();
        $data['subview']="user-list";
        $this->load->view('layout/default',$data);
        
      }
   public function profile(){
         if(@$_SESSION['userid']){
            $user_id=$_SESSION['userid'];
            $data['admin_data']= $this->User_model->get_admin_data($user_id);
          }
         $data['subview']="profile_page";
		 $this->load->view('layout/default',$data);
       }	

    
  public function update_profile(){
     //echo'<pre>';print_r($_POST);
      $user_id=$this->input->post('user_id');
      $data=array(
      'firstname'=>$this->input->post('name'),
      'email'=>$this->input->post('email'),
      'mobile'=>$this->input->post('mobile')
       );

       $this->User_model->update_user_data($data,$user_id);
       redirect(base_url().'User/profile');
     }  
   public function logout_sess(){

         //$this->session->unset_userdata($newdata);
         $this->session->sess_destroy();
         redirect(base_url());

   }     
}
