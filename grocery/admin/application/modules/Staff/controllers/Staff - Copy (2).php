<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends MX_Controller {

	public function __construct()
	     {
            parent::__construct();
            
            $this->load->model('Staff_model');     
            $this->load->model('../../third_party/common/CrudModel');      
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->library('session');
            $this->load->database();
            
	  }
	

public function all_staff(){
      $data['user_data']=$this->Staff_model->user_list_data();
       $data['subview']="all_staff";
       $this->load->view('layout/default',$data); 

    }

    public function staff_permissions(){
      $data['user_data']=$this->Staff_model->user_list_data();
       $data['subview']="staff_permissions";
       $this->load->view('layout/default',$data); 

    }
    public function staff_roles(){
      $data['user_role_list_data']=$this->Staff_model->user_role_list_data();
       $data['subview']="staff_roles";
       $this->load->view('layout/default',$data); 

    }
    
      public function permissionsettings()
    {
        if($this->uri->segment('3')){
            $pageData['id'] = $this->uri->segment('3');
        }else{
            $pageData['id'] = 1;
        }
        $data['subview']="staff_permissions";
       $this->load->view('layout/default',$data); 
    }

    /* public function add_staff(){
        $eid=$this->uri->segment(3);
        if($eid){
        $data['single_staff_data']=$this->Staff_model->single_staff_data($eid);
        }
        $data['subview']="add_staff";
        $this->load->view('layout/default',$data); 
}*/

public function add_staff()
    {

        $table_name = 'system_admin';
        $where_column = 'id';      
        $user_roll_id='1';
        $user_id='1';
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
         
            //$logged_in_userDetail = $this->session->userdata('user_detail');
          //  $user_id = $logged_in_userDetail[0]->user_id;
         //   $user_roll_id = $this->input->post('id');
            $password = sha1($this->input->post('user_password'));             
            $data = array(
               // 'id' => $this->input->post('id'),
              //  'office_id' => $this->input->post('office_id'), 
                'id' => '',               
                'user_role' =>$this->input->post('type'),
                'username' =>$this->input->post('username'),
                'first_name' =>$this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'password' =>$password,
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
               // 'joing_date' => dateConvertUItoDB($this->input->post('joing_date')),
               // 'leaving_date' => dateConvertUItoDB($this->input->post('leaving_date')),
                'color_theme' => $this->input->post('color_theme')
            );

            if ($user_roll_id != '') {
                $data['updated_by'] = $user_id;

            } else {
                $data['created_by'] = $user_id;
              
            }
            //end

            $validation_array = array(
                
                array(
                    "field_name" => "type",
                    "validate_type" => "trim|required",
                    "message" => 'Please select User Type'
                ),
                array(
                    "field_name" => "username",
                    "validate_type" => "trim|required",
                    "message" => 'Please enter User Name'
                ),
                array(
                    "field_name" => "first_name",
                    "validate_type" => "trim|required",
                    "message" => 'Please enter First Name'
                ),
                array(
                    "field_name" => "last_name",
                    "validate_type" => "trim|required",
                    "message" => 'Please enter Last Name'
                ),
                array(
                    "field_name" => "email",
                    "validate_type" => "trim|required",
                    "message" => 'Please enter Email'
                ),

                array(
                    "field_name" => "password",
                    "validate_type" => "trim|required",
                    "message" => 'Please enter Password.'
                ),

                array(
                    "field_name" => "cnfpassword",
                    "validate_type" => "trim|required|matches[password]",
                    "message" => 'Please enter Confirm Password'
                )/*,
                array(
                    "field_name" => "office_id",
                    "validate_type" => "trim|required",
                    "message" => ' Please select location'
                )*/,
                 array(
                    "field_name" => "phone",
                    "validate_type" => "trim|required",
                    "message" => 'Please enter Phone'
                ),
              
            );
            
          if($user_roll_id == '') {
                array_push($validation_array,
                    array(
                        "field_name" => "username",
                        "validate_type" => "trim|required|edit_unique[s_admin.username.id.'.$user_roll_id.']",
                        "message" => 'Please enter User Name.'
                    ));
                array_push($validation_array,
                    array(
                        "field_name" => "email",
                        "validate_type" => "trim|required|edit_unique[s_admin.email.id.'.$user_roll_id.']",
                        "message" => 'Please enter valid email id.'
                    ));
            }

            
            @$file_upload = 'user_profile,profile_photo';
            $this->CrudModel->common_save_data($data, $validation_array, $table_name, $where_column, $file_upload,$folder_path='/upload/profile',$file_preffix='profile_');
          //  echo $this->db->last_query();
        } else {
            
             $eid=$this->uri->segment(3);
        if($eid){
        $data['single_staff_data']=$this->Staff_model->single_staff_data($eid);
        }
        

            $pageData = array();
            if($user_roll_id!=''){
           /// $pageData['list_data'] = $this->CrudModel->getCommonData($table_name, $where_column, $user_roll_id);
        }else
        {
            $pageData['list_data']=array();
        }
        $data['subview']="add_staff";
        $this->load->view('layout/default',$data); 
            //echo $this->db->last_query();
           // $pageData['sqlquery'] = "SELECT * FROM `s_admin` WHERE is_deleted='0'";
           /// $this->loadViews("user/add_user", $this->global, $pageData, NULL);
        }
    }




public function delete_data($table, $field, $delete_id, $section){
        $section = @str_replace('_', '  ', $section);
        $result = $this->Staff_model->delete_data($table, $field, $delete_id);
        if ($result):
            // $this->session->set_flashdata('success', "$section record has been successfully deleted.");
            $_SESSION['success']='Record has been successfully deleted.';
        else:
            // $this->session->set_flashdata('error', "Error in delete record. Please try again.");
            $_SESSION['success']='Error in delete record. Please try again.';
        endif;
        redirect($_SERVER["HTTP_REFERER"]);
    }    
    // Code added by Vinod Kumar Pal on 08042019
    public function addpermissionrecord(){
        //  $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
        /*$this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="text-danger">','</p>');
        $this->form_validation->set_rules('type', ' Type ', 'trim|required');
       */ //$this->quatationType_validations();
        //   if ($this->form_validation->run())
      //  if($this->form_validation->run() == TRUE)
       // {
            $typeId = $this->input->post('type');
            $this->Staff_model->deleteMenuPermission($typeId);
            $this->Staff_model->insertMenuPermission($_POST,$typeId);
            //$this->session->set_flashdata('success', 'success');
            redirect(base_url().'Staff/permissionsettings/'.$typeId);
        /*}else{
            $pageData = array();
           if($this->uri->segment('3')){
            $pageData['id'] = $this->uri->segment('3');
        }else{
            $pageData['id'] = 1;
        }
        $this->loadViews("masters/permissionsettings", $this->global, $pageData , NULL);
        */   // $this->permissionsettings();
             //$this->loadViews("masters/permissionsettings", $this->global, $pageData , NULL);
        //}
    }

	/*public function index()
	     {
            die('wwwwwwwwwwwww');
         //$data['subview']="user_dashboard";
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
   public function profile(){
         $data['subview']="profile_page";
		 $this->load->view('layout/default',$data);
     }	
   public function logout_sess(){

         //$this->session->unset_userdata($newdata);
         $this->session->sess_destroy();
         redirect(base_url());

   }     */  

}
