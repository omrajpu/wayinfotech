<?php
//echo APPPATH;
header('Access-Control-Allow-Origin: *');
require APPPATH . '/libraries/REST_Controller.php';
class User_login_api extends REST_Controller {
  function __construct($config = 'rest') {
    parent::__construct($config);
    $this->load->model('Checkout_model');
    $this->load->database();
  }
  function index_post(){ 
                      $data = json_decode(file_get_contents('php://input'));
                       $email=@$data->email;
                       $password=@$data->password;
                       $password=md5($password);
                       $check_reg_user = $this->Checkout_model->check_reg_user($email);
                   // print_r($check_reg_user);die;
                     if(@$check_reg_user->email!=''){
                     $result = $this->Checkout_model->login($email,$password);
                   // print_r($result);die;
                      $result -> num_rows();
                    
                    if($result -> num_rows() > 0)
                       { 
                       foreach ($result->result() as $row)
                          { 
                            $user_id = $row->id;
                            //$this->session->admin = $row->is_Admin;
                            $email=  $row->email;
                            $phone=  $row->phone;
                            $full_name=  $row->full_name;
                            $gender=  $row->gender;
                            $msg=array('msg'=>'Successfully Login','status'=>'1','phone'=>$phone,'email'=>$email,'user_id'=>$user_id,'full_name'=>$full_name,'gender'=>$gender);
                            $this->response($msg,200); 
                            
                           }
                        }
                    else
                        {
                        //echo"3"; die;
                         $msg=array('msg'=>'Your Login Details Does Not Match','status'=>'0','login_details'=>'');
                         $this->response($msg);
                       }

                   }else{

                     $msg=array('msg'=>'Your email id does not exist please register now!','status'=>'0','login_details'=>'');
                     $this->response($msg);
                     }
    
  }
  
  
  
}