<?php
header('Access-Control-Allow-Origin: *');
require APPPATH . '/libraries/REST_Controller.php';
class User_signup_api extends REST_Controller {
  function __construct($config = 'rest') {
    parent::__construct($config);
    $this->load->model('Checkout_model');
    $this->load->database();
  }
  function index_post(){ 
              $data = json_decode(file_get_contents('php://input'));
               //print_r($data);die;
              $device_type=@$data->device_type;
              $full_name=@$data->full_name;
              $gender=@$data->gender;
              $dob=@$data->dob;
              $email=@$data->email;
              $phone=@$data->phone;
              $passoword=@$data->passoword;
              $password=md5($passoword);

              // $email=$_POST['email'];
              // $mobile=$_POST['mobile'];
              // $fname=$_POST['fname'];
              // $lname=$_POST['lname'];
              // $password= md5(@$_POST['password']);       
              $check_reg_user = $this->Checkout_model->check_reg_user($email);
               //print_r($check_reg_user);die;
               if(@$check_reg_user->id!=''){
                 $msg=array('msg'=>'You are already register by this email id!','status'=>'0','user_details'=>'');
               $this->response($msg,200);
               }else{
               $created_date=date('Y-m-d H:i:s');
               $insert_data=array(
                    'full_name'=>$full_name,
                    'gender'=>$gender,
                    'device_type'=>$device_type,
                    'dob'=>$dob,
                    'email'=>$email,
                    'phone'=>$phone,
                    'password'=>$password,
                    'create_date'=>$created_date
                   );
              // print_r($insert_data);die;
              $this->Checkout_model->save_customer_data($insert_data);
              $msg=array('msg'=>'You are successfully register','status'=>'1','full_name'=>$full_name,'gender'=>$gender,'email'=>$email,'phone'=>$phone);
              $this->response($msg,200);
              }
              
              
                    
  }
  
  
  
}