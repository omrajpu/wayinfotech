<?php
//echo APPPATH;
header('Access-Control-Allow-Origin: *');
require APPPATH . '/libraries/REST_Controller.php';
class Profile_update_api extends REST_Controller {
	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->database();
       $this->load->model('Checkout_model');
	}
	function index_post() {

       //rint_r($_GET);die;
       $data = json_decode(file_get_contents('php://input'));
              
              $delivery_boy_id=@$data->delivery_boy_id;
              $device_type=@$data->device_type;
              $full_name=@$data->full_name;
              $gender=@$data->gender;
              $dob=@$data->dob;
              $email=@$data->email;
              $phone=@$data->phone;
              $created_date=date('Y-m-d H:i:s');
              $update_data=array(
                    'device_type'=>$device_type,
                    'full_name'=>$full_name,
                    'gender'=>$gender,
                    'dob'=>$dob,
                    'email'=>$email,
                    'phone'=>$phone,
                    'create_date'=>$created_date
                   );
               //print_r($update_data);die;
      $this->Checkout_model->update_customer_data($delivery_boy_id,$update_data);
      $data_cnt=count($update_data);
      if($data_cnt>0){
          //print_r($service_data);
          $msg=array('msg'=>'Successfully update','status'=>1,'user_data'=>$update_data);
            $this->response($msg); 
          }else{
          $msg=array('msg'=>'Successfully update','status'=>0,'user_data'=>'');
           $this->response($msg);  
          } 
    //   //echo $this->db->last_query();
    // }
    }



    
}


