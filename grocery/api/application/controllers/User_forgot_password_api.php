<?php
header('Access-Control-Allow-Origin: *');
require APPPATH . '/libraries/REST_Controller.php';
class User_forgot_password_api extends REST_Controller {
  function __construct($config = 'rest') {
    parent::__construct($config);
    $this->load->model('Checkout_model');
    $this->load->database();
  }
  function index_post(){ 
              //$data = json_decode(file_get_contents('php://input'));
      $email=$_POST['email'];
      $res=$this->Checkout_model->check_reg_user($email);
      if(@$res->id){
        $active_code=md5(uniqid(rand(5, 15), true));
        $link = 'http://stage.wayinfotechsolutions.co/lugyimin/api/Regenrate_pass_api/'.$res->id.'/'.$active_code;
        $fetch=$this->db->query("UPDATE `fp_customer` SET `active_code` = '$active_code' 
        WHERE `email`='$email' ");
        $message = 'Password Recovery Link :'.$link;  
        
       $to=$email; 
       $subject="Password Recovery Link";
       $headers = "MIME-Version: 1.0" . "\r\n";
       $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

      // More headers
      $headers .= 'From: <Lugyimin@example.com>' . "\r\n";
      // $headers .= 'Cc: yash@mematdigi.com' . "\r\n";
      //$headers .= 'Cc: dinesh@mematdigi.com' . "\r\n";

      $headers .= 'Cc: omprakash.php@wayinfotechsolutions.com' . "\r\n";

      $mail= mail($to,$subject,$message,$headers);
      if($mail){
         $msg=array('msg'=>'Please check your inbox we have send password recovery link','status'=>1,'user_id'=>@$res->id,'active_code'=>$active_code);
      $this->response($msg); 

      }else{
       $msg=array('msg'=>'Sorry mail send issue!','status'=>0);
      $this->response($msg);
      }
     }else{
      $msg=array('msg'=>'Sorry your email does not exist!','status'=>0);
      $this->response($msg);

     } 
              
                    
  }
  
  
  
}