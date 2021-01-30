<?php
//echo APPPATH;
header('Access-Control-Allow-Origin: *');
require APPPATH . '/libraries/REST_Controller.php';
class Upload_profile_pic_api extends REST_Controller {
	function __construct($config = 'rest') {
		parent::__construct($config);
		$this->load->database();
        $this->load->model('Checkout_model');
	  }
function index_post(){
        $user_id=@$_POST['userId'];
	    $login_type=@$_POST['login_type'];
	    $data=@$_POST['imageURI'];
	    $img = str_replace('data:image/jpeg;base64,', '', $data);
	    //echo $iname=base64_decode($img);
	    $path='profile_pic/';
        $time = time();
        $file_name='fb_user_img_'.$time.'_'.$user_id.'.jpeg';
        file_put_contents($path.$file_name, base64_decode($img));
        if(($file_name)){
              //$file_name=$_FILES['file']['name'];
             //$target_file = 'profile_pic/' . $file_name;
            //echo  @$target_file = $target_dir .$file_name;
            // move_uploaded_file(@$_FILES["file"]["tmp_name"], $target_file);
           // echo $_FILES['file']['name'];die;
            // $file_name=$this->update_do_upload();
            $date=date('Y-m-d H:i:s');
           
              if($file_name){
                 $file_data=array('photo'=>$file_name,'modify_dt_tm'=>$date);
                 if($login_type=='facebook'){
                  $this -> db -> where('fb_user_id', $user_id);  
                 }else{
                 $this -> db -> where('id', $user_id);
                 }
                 $res=$this->db->update('fp_customer',$file_data); 
                 $msg=array('msg'=>'Photo details','status'=>1,'image_path'=>'http://stage.wayinfotechsolutions.co/lugyimin/api/profile_pic/','image'=>$file_name);
                 $this->response($msg); 
                }else{
                 $msg=array('msg'=>'Photo details','status'=>0,'image_path'=>'http://stage.wayinfotechsolutions.co/lugyimin/api/profile_pic/','image'=>'');
                 $this->response($msg); 
                }
        }
}
    
function update_do_upload(){
    //$file_data=array();
    //$file_name='';
    //print_r($_FILES);die;
   if(!empty($_FILES['file']['name'])){
    //$count=count($_FILES['file']['name']);
    //print_r($_FILES);die;
   
     $file_name =time().'_'.$_FILES['file']['name'];  
   // array_push($file_data,$file_name);
    $_FILES['userfile']['name']=time().'_'.$_FILES['file']['name'];
    $_FILES['userfile']['type']= $_FILES['file']['type'];
        $_FILES['userfile']['tmp_name']= $_FILES['file']['tmp_name'];
        $_FILES['userfile']['error']= $_FILES['file']['error'];
        $_FILES['userfile']['size']= $_FILES['file']['size'];
  // $path=$this->config->item('http://stage.wayinfotechsolutions.co/lugyimin/api/profile_pic/');
     $path='profile_pic/';

    $config1['upload_path']=$path;
    $config1['allowed_types']='jpg|png|gif|jpeg';
    $config1['min_hieght']='10';
    $config1['min_width']='10';
    $this->load->library('upload',$config1);
    $this->upload->initialize($config1);
    $this->upload->do_upload('userfile');
   // echo $this->upload->display_errors();
    
   
     return $file_name;
    }
  }    
    
    
    
    
}


