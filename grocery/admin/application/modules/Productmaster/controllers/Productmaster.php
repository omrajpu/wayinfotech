<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Productmaster extends MX_Controller {

  function __construct(){
    parent::__construct();
    
    $this->load->library('ci_qr_code'); //for qr code generation
    $this->config->load('qr_code');
    //$this->load->helper(array('hotel'));
    $this->load->library('session');
    $this->load->library('pdf');
    $this->load->helper(array('form', 'url','new'));
    $this->load->model('../../Common/Crud_model');
    //$this->load->helper('delete');
    $this->load->model('Product_model');
    $this->load->library('form_validation');

  }
  public function index(){
      //echo phpinfo();

    //die;
    //   $data['cat_data']=$this->Shop_model->cat_list();
    //  //$data['product_data']=$this->Shop_model->get_all_product_data();
    //    $data['subview']="product-list";
    // $this->load->view('layout/default',$data);

  }

public function test(){
        $qr_code_config = array();
        $qr_code_config['cacheable'] = $this->config->item('cacheable');
        $qr_code_config['cachedir'] = $this->config->item('cachedir');
        $qr_code_config['imagedir'] = $this->config->item('imagedir');
        $qr_code_config['errorlog'] = $this->config->item('errorlog');
        $qr_code_config['ciqrcodelib'] = $this->config->item('ciqrcodelib');
        $qr_code_config['quality'] = $this->config->item('quality');
        $qr_code_config['size'] = $this->config->item('size');
        $qr_code_config['black'] = $this->config->item('black');
        $qr_code_config['white'] = $this->config->item('white');
        $this->ci_qr_code->initialize($qr_code_config);

          $customer_id=11;
          $image_name = $customer_id . ".png";
          $codeContents = "Order id:";
          $codeContents .= "1244";
          $codeContents .= "Customer Id:";
          $codeContents .= "11";
          $codeContents .= "Name:";
          $codeContents .= "om";
          $codeContents .= "Quality:";
          $codeContents .= "2";
          $codeContents .= "Price:";
          $codeContents .= "250 ";
          $codeContents .= "\n";
          $params['data'] = $codeContents;
          $params['level'] = 'H';
          $params['size'] = 2;
         //echo FCPATH . $qr_code_config['imagedir'] . $image_name;


          $params['savename'] = FCPATH . $qr_code_config['imagedir'] . $image_name;
          $this->ci_qr_code->generate($params);
          $this->data['qr_code_image_url'] = base_url() . $qr_code_config['imagedir'] . $image_name;
}  
public function set_status(){
     $order_id=$this->input->post('order_id');
     $status=$this->input->post('status');
     $_SESSION['order_status']= $status;
     $_SESSION['order_id']= $order_id;
     $update_data=array('order_status'=>$status);
     $this->Product_model->update_status($update_data,$order_id);
  }
public function pdfdetails()
    {
       //$pdfFilePath = FCPATH . "attach/pdf_name.pdf";
      
     // $file_name = md5(rand()) . '.pdf';
      $invoice_date=date('Y-m-d :H:i:s');
      $invoice_date2=explode(' ',$invoice_date);
      $invoice_date3=explode('-',$invoice_date2[0]);
      $invoice_date3=$invoice_date3[2].'.'.$invoice_date3[1].'.'.$invoice_date3[0];
      $customer_id = $this->uri->segment(3);
      $html_content = '<body style="font-family: "Montserrat", sans-serif;font-size: 13px;box-sizing: border-box;position: relative;min-width: 1024px;max-width: 1024px;margin: 0 auto;padding: 25px 45px;line-height: 1.5;">
      <div class="invoice-header" style="box-sizing: border-box;font-family: sans-serif;font-size: 13px;margin: 0;display: flex;justify-content: space-between;">
     <div class="brand-logo" style="box-sizing: border-box;font-family: sans-serif;font-size: 13px;margin: 0;">
      <img src="http://stage.wayinfotechsolutions.co/grocery/images/logo2.png" alt="" style="box-sizing: border-box;font-family: sans-serif;font-size: 13px;margin: 0;border-style: none;vertical-align: middle;width: 120px;">
      <div class="brand-extra-info" style="box-sizing: border-box;font-family:sans-serif;font-size: 10px;margin: 5px 0;">
        <p style="box-sizing: border-box;font-family:sans-serif;font-size: inherit;margin: 15px 0 5px;"><span>Digitally Signed by wayinfotechsolutions Pvt.Ltd</span></p>
        <div class="brand-date" style="box-sizing: border-box;font-family:sans-serif;font-size: 10px;margin: 0;"><span class="date" style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: inherit;margin: 0;margin-right: 5px;"> Date :'.$invoice_date3.'</span></div>
        <div class="reason" style="box-sizing: border-box;font-family:sans-serif;font-size: inherit;margin: 0;"></div>
      </div>
     </div>
     <div class="invoice-title" style="box-sizing: border-box;font-family:sans-serif;font-size: 13px;margin: 0;text-align: right;">
      <h1 style="box-sizing: border-box;font-family: &quot;Segoe UI&quot;,Arial,sans-serif;font-size: 24px;margin: 10px 0;font-weight: 600;margin-top: 0;">Tax Invoice/Bill of Supply/Cash Memo</h1>
      <span style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">(Original for Recipient)</span>
     </div>
     </div>';
      $html_content .= $this->Product_model->fetch_single_details($customer_id);
      $this->pdf->loadHtml($html_content);
      $this->pdf->render();
      $this->pdf->stream("invoice_cust_id_".$customer_id.".pdf", array("Attachment"=>1));
    }   
public function view_user() {
            $uid=$_POST['id'];
            $data["data"] = $this->Product_model->single_user_list($uid);
            $this->load->view("Productmaster/ajax/user-view", $data);
        
    }   
public function add_top_home_slider(){
       $eid=$this->uri->segment(3);
        if($eid){
        $data['single_cat_data']=$this->Product_model->single_brand_list($eid);
        }
       $data['subview']="add-top-home-slider";
       $this->load->view('layout/default',$data);
   }
public function save_silider_data(){
     //echo'<pre>';print_r($_POST);die;
     $create_date=date("Y-m-d H:i:s");
     $slider_id=$this->input->post('slider_id');
     if($slider_id){
         $file=@$_FILES['update_photo']['name'];
         $date=date('Y-m-d H:i:s');
         if($file!=''){ 
          $upload_file=$this->cat_update_do_upload();
          $update_data=array(
          'title_name'=>$this->input->post("title_name"),
          'description'=>$this->input->post("description"),
          'meta_title'=> $this->input->post("meta_title"),
          'meta_description'=>$this->input->post("meta_description"),
          'meta_keyword'=> $this->input->post("meta_keyword"),
          'sort_order'=>$this->input->post("sort_order"),
          'status'=> $this->input->post("status"),
          'top'=> $this->input->post("top"),
          'image_url'=> $upload_file,
          'created_date'=> $date
          );    
         // print_r($update_data);die;
      $msg=$this->Product_model->update_slider_data($update_data,$slider_id);
      redirect(base_url().'Productmaster/slider_list');
           }
         if($file==''){
          $update_data=array(
          'title_name'=>$this->input->post("title_name"),
          'description'=>$this->input->post("description"),
          'meta_title'=> $this->input->post("meta_title"),
          'meta_description'=>$this->input->post("meta_description"),
          'meta_keyword'=> $this->input->post("meta_keyword"),
          'sort_order'=>$this->input->post("sort_order"),
          'status'=> $this->input->post("status"),
          'top'=> $this->input->post("top"),
          'created_date'=> $date
          );  
          $msg=$this->Product_model->update_slider_data($update_data,$slider_id);
               redirect(base_url().'Productmaster/slider_list');
      }  
    }
    else{ 
      //echo'<pre>';print_r($_POST);die;
        $this->form_validation->set_rules('title_name', 'Title name', 'required');
        $this->form_validation->set_rules('meta_title', 'meta_title');
        $this->form_validation->set_rules('meta_description', 'meta_description');
      if($this->form_validation->run() == FALSE)
        {
         $data['subview']="add-home-slider";
         $this->load->view('layout/default',$data); 
        }else{

         $title_name=$this->input->post("title_name");
         $result=$this->Product_model->get_duplicate('top_home_silider','title_name',$title_name);
         if($result<=0){
         $file=@$_FILES['file']['name'];
         $date=date('Y-m-d H:i:s');
         $upload_file=$this->do_upload();
          $insert_data=array(
          'title_name'=>$this->input->post("title_name"),
          'description'=>$this->input->post("description"),
          'meta_title'=> $this->input->post("meta_title"),
          'meta_description'=>$this->input->post("meta_description"),
          'meta_keyword'=> $this->input->post("meta_keyword"),
          'sort_order'=>$this->input->post("sort_order"),
          'status'=> $this->input->post("status"),
          'top'=> $this->input->post("top"),
          'image_url'=> $upload_file,
          'created_date'=> $date
          );   
          $result=$this->Product_model->save_slider_data($insert_data);
          redirect(base_url().'Productmaster/slider_list');
        }
        else{
         $_SESSION['error_msg'] = 'Slider name alredy exist!';
         redirect(base_url().'Productmaster/add_home_slider'); 

        }

      }
    }
   }
   public function save_blog_data(){

    $title=$this->input->post("name");
    $slug=$this->get_url_title($title);
    $data_id=$this->input->post("data_id");
    $parent_id=$this->input->post("parent_id");
    
    $this->load->library('upload');
     $uploadStatus="";
      $file_upload_name="";
				if(isset($_FILES['image']) && $_FILES['image']['name'] != '')
				{
				    $config=array();
				    $config['upload_path'] = getcwd().'/upload/blog/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
          
					$this->upload->initialize($config);	
				
					if($this->upload->do_upload('image'))
					{
						$upload_data = $this->upload->data();
						$file_upload_name = $upload_data['file_name'];
						//echo $file_upload_name3;
			
					}else{
						$uploadStatus = $this->upload->display_errors('<br /><span class="error">', '</span>');
          
            $this->form_validation->set_rules('image', 'image','required',array('required'=>$uploadStatus));
          
          }
				}
				elseif($this->input->post('old_image') != '')
				{
					$file_upload_name = $this->input->post('old_image');
				}
    
    $data=array(
     'title'=>$title,
     'slug'=>$slug,
     'image'=>$file_upload_name,
     'parent_id'=>$parent_id,
     'description'=>$this->input->post("description"),
     'status'=>$this->input->post("status"),
     'meta_title'=> $this->input->post("meta_title"),
     'meta_description'=>$this->input->post("meta_description"),
     'meta_keyword'=> $this->input->post("meta_keyword"),
     'status'=> $this->input->post("status")
     ); 
    
     if(!empty($data_id)){
      
       
       $this->db->where('id',$data_id);
       $this->db->update('tbl_blog',$data);
       
 
     }else{
       $this->db->insert('tbl_blog',$data);
 
     }
     redirect(base_url().'Productmaster/manage_blogs?parent_id='.$parent_id);
 
 }

function deleteBlogs(){
  
  $parent_id=0;
  if(isset($_GET['parent_id']) && !empty($_GET['parent_id'])){
    $parent_id=$_GET['parent_id'];
  }
 
  $uri=$this->uri->segment(3);
  
  $this->db->where('id',$uri);
  $this->db->delete('tbl_blog');

  redirect(base_url().'Productmaster/manage_blogs?parent_id='.$parent_id);

} 

function delete_bin_win(){
  
  
  $uri=$this->uri->segment(3);
  
  $this->db->where('id',$uri);
  $this->db->delete('tbl_bin_win_product');

  redirect(base_url().'Productmaster/bin_win_product_list');

} 
public function save_email_data(){
    $created_date=date("Y-m-d H:i:s");
    $email_id=$this->input->post("email_id");
    $data=array(
    'subject'=>$this->input->post("subject"),
    'type_id'=>$this->input->post("type_id"),
    'message'=>$this->input->post("message"),
    'status'=>$this->input->post("status"),
    'created_date'=> $created_date
    ); 
    
    if(!empty($email_id)){
      $this->db->where('id',$email_id);
      $this->db->update('email_message',$data);
    
    }else{
      $this->db->insert('email_message',$data);

    }
    redirect(base_url().'Productmaster/email_list');

}

public function save_cms_data(){

   $name=$this->input->post("name");
   $slug=$this->input->post("slug");
   $cms_id=$this->input->post("cms_id");
   $description=$this->input->post("description");
   $meta_title=$this->input->post("meta_title");
   $meta_description=$this->input->post("meta_description");
   $meta_keyword=$this->input->post("meta_keyword");
   if(empty($cms_id)){
	   
       $slug=$this->get_url_title($name);
   }
   
   $data=array(
    'name'=>$this->input->post("name"),
    'slug'=>$slug,
    'description'=>$this->input->post("description"),
    'status'=>$this->input->post("status"),
    'meta_title'=> $this->input->post("meta_title"),
    'meta_description'=>$this->input->post("meta_description"),
    'meta_keyword'=> $this->input->post("meta_keyword"),
    'status'=> $this->input->post("status")
    ); 
    
    if(!empty($cms_id)){
     
      
      $this->db->where('id',$cms_id);
      $this->db->update('tbl_cms',$data);
      

    }else{
      $this->db->insert('tbl_cms',$data);

    }
    redirect(base_url().'Productmaster/cms_list');

}

public function save_bin_win_data(){

  $cat_id=$this->input->post("cat_id");
  $data_id=$this->input->post("data_id");
  $sub_cat_id=$this->input->post("sub_cat_id");
  $product_id=$this->input->post("product_id");
  $bin_id=$this->input->post("bin_id");
  $win_id=$this->input->post("win_id");
  $status=$this->input->post("status");
  
  
  $data=array(
   'cat_id'=>$cat_id,
   'sub_cat_id'=>$sub_cat_id,
   'product_id'=>$product_id,
   'bin_id'=>$bin_id,
   'win_id'=>$win_id,
   'is_status'=> $status
   ); 
   
   if(!empty($data_id)){
    
     
     $this->db->where('id',$data_id);
     $this->db->update('tbl_bin_win_product',$data);
     

   }else{
     $this->db->insert('tbl_bin_win_product',$data);

   }
   redirect(base_url().'Productmaster/bin_win_product_list');

}
public function save_charity_data(){

  $name=$this->input->post("name");
  $charity_id=$this->input->post("charity_id");
  $slug=$this->get_url_title($name);

  $this->load->library('upload');
  $uploadStatus="";
  $file_upload_name="";
				if(isset($_FILES['logo']) && $_FILES['logo']['name'] != '')
				{
				    $config=array();
				    $config['upload_path'] = getcwd().'/upload/charity/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
          
					$this->upload->initialize($config);	
				
					if($this->upload->do_upload('logo'))
					{
						$upload_data = $this->upload->data();
						$file_upload_name = $upload_data['file_name'];
						//echo $file_upload_name3;
			
					}else{
						$uploadStatus = $this->upload->display_errors('<br /><span class="error">', '</span>');
          
            $this->form_validation->set_rules('logo', 'Logo','required',array('required'=>$uploadStatus));
          
          }
				}
				elseif($this->input->post('old_logo') != '')
				{
					$file_upload_name = $this->input->post('old_logo');
				}

  $data=array(
   'name'=>$this->input->post("name"),
   'slug'=>$slug,
   'logo'=>$file_upload_name,
   'description'=>$this->input->post("description"),
   'status'=>$this->input->post("status"),
   'meta_title'=> $this->input->post("meta_title"),
   'meta_description'=>$this->input->post("meta_description"),
   'meta_keyword'=> $this->input->post("meta_keyword"),
   'status'=> $this->input->post("status")
   ); 
   
   if(!empty($charity_id)){
    
     
     $this->db->where('id',$charity_id);
     $this->db->update('tbl_charity',$data);
     

   }else{
     $this->db->insert('tbl_charity',$data);

   }
   redirect(base_url().'Productmaster/charity_list');

}
public function save_company_data(){
     //echo'<pre>';print_r($_POST);die;
     $create_date=date("Y-m-d H:i:s");
     $comp_id=$this->input->post('comp_id');
    if($comp_id){
         $file=@$_FILES['update_photo']['name'];
         $date=date('Y-m-d H:i:s');
         if($file!=''){ 
          $upload_file=$this->comp_update_do_upload();
          $update_data=array(
          'comp_name'=>$this->input->post("comp_name"),
          'email'=>$this->input->post("email"),
          'phone'=> $this->input->post("phone"),
          'gst'=>$this->input->post("gst"),
          'pan'=> $this->input->post("pan"),
          'address'=>$this->input->post("address"),
          'status'=>0,
          'image_url'=> $upload_file,
          'created_date'=> $date
          );    
          
      $msg=$this->Product_model->update_comp_data($update_data,$comp_id);
      redirect(base_url().'Productmaster/company_list');
           }
         if($file==''){

          $update_data=array(
          'comp_name'=>$this->input->post("comp_name"),
          'email'=>$this->input->post("email"),
          'phone'=> $this->input->post("phone"),
          'gst'=>$this->input->post("gst"),
          'pan'=> $this->input->post("pan"),
          'address'=>$this->input->post("address"),
          'status'=>0,
          'created_date'=> $date
          );  
          $msg=$this->Product_model->update_comp_data($update_data,$comp_id);
               redirect(base_url().'Productmaster/company_list');
      }  
    }
    else{ 
      //echo'<pre>';print_r($_POST);die;
        $this->form_validation->set_rules('comp_name', 'Company name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('phone', 'Phone Number ', 'required|regex_match[/^[0-9]{10}$/]');
        $this->form_validation->set_rules('gst', 'GST', 'required');
        $this->form_validation->set_rules('pan', 'PAN', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        //$this->form_validation->set_rules('file', 'Company Logo', 'required');
      if($this->form_validation->run() == FALSE)
        {
         $data['subview']="add-company";
         $this->load->view('layout/default',$data); 
        }else{
         $comp_name=$this->input->post("comp_name");
         $result=$this->Product_model->get_duplicate('company_details','comp_name',$comp_name);
         if($result<=0){
         $file=@$_FILES['file']['name'];
         $date=date('Y-m-d H:i:s');
         $upload_file=$this->comp_do_upload();
          $insert_data=array(
          'comp_name'=>$this->input->post("comp_name"),
          'email'=>$this->input->post("email"),
          'phone'=> $this->input->post("phone"),
          'gst'=>$this->input->post("gst"),
          'pan'=> $this->input->post("pan"),
          'address'=>$this->input->post("address"),
          'status'=>0,
          'image_url'=> $upload_file,
          'created_date'=> $date
          );   
          $result=$this->Product_model->save_company_data($insert_data);
          redirect(base_url().'Productmaster/company_list');
        }
        else{
         $_SESSION['error_msg'] = 'Company name alredy exist!';
         redirect(base_url().'Productmaster/add_company'); 

        }
      }
    }
   }


public function save_brand_data(){
     //echo'<pre>';print_r($_POST);die;
     $create_date=date("Y-m-d H:i:s");
     $brand_id=$this->input->post('brand_id');
    if($brand_id){
         $file=@$_FILES['update_photo']['name'];
         $date=date('Y-m-d H:i:s');
         if($file!=''){ 
          $upload_file=$this->cat_update_do_upload();
          $update_data=array(
          'brand_name'=>$this->input->post("brand_name"),
          'description'=>$this->input->post("description"),
          'meta_title'=> $this->input->post("meta_title"),
          'meta_description'=>$this->input->post("meta_description"),
          'meta_keyword'=> $this->input->post("meta_keyword"),
          'sort_order'=>$this->input->post("sort_order"),
          'status'=> $this->input->post("status"),
          'top'=> $this->input->post("top"),
          'image_url'=> $upload_file,
          'created_date'=> $date
          );    
         // print_r($update_data);die;
      $msg=$this->Product_model->update_brand_data($update_data,$brand_id);
      redirect(base_url().'Productmaster/brand_list');
           }
         if($file==''){
          $update_data=array(
          'brand_name'=>$this->input->post("brand_name"),
          'description'=>$this->input->post("description"),
          'meta_title'=> $this->input->post("meta_title"),
          'meta_description'=>$this->input->post("meta_description"),
          'meta_keyword'=> $this->input->post("meta_keyword"),
          'sort_order'=>$this->input->post("sort_order"),
          'status'=> $this->input->post("status"),
          'top'=> $this->input->post("top"),
          'created_date'=> $date
          );  
          $msg=$this->Product_model->update_brand_data($update_data,$brand_id);
               redirect(base_url().'Productmaster/brand_list');
      }  
    }
    else{ 
      //echo'<pre>';print_r($_POST);die;
        $this->form_validation->set_rules('brand_name', 'Brand name', 'required');
        $this->form_validation->set_rules('meta_title', 'meta_title');
        $this->form_validation->set_rules('meta_description', 'meta_description');
      if($this->form_validation->run() == FALSE)
        {
         $data['subview']="add-brand";
         $this->load->view('layout/default',$data); 
        }else{

         $brand_name=$this->input->post("brand_name");
         $result=$this->Product_model->get_duplicate('brand_details','brand_name',$brand_name);
         if($result<=0){
         $file=@$_FILES['file']['name'];
         $date=date('Y-m-d H:i:s');
         $upload_file=$this->do_upload();
          $insert_data=array(
          'brand_name'=>$this->input->post("brand_name"),
          'description'=>$this->input->post("description"),
          'meta_title'=> $this->input->post("meta_title"),
          'meta_description'=>$this->input->post("meta_description"),
          'meta_keyword'=> $this->input->post("meta_keyword"),
          'sort_order'=>$this->input->post("sort_order"),
          'status'=> $this->input->post("status"),
          'top'=> $this->input->post("top"),
          'image_url'=> $upload_file,
          'created_date'=> $date
          );   
          $result=$this->Product_model->save_brand_data($insert_data);
          redirect(base_url().'Productmaster/brand_list');
        }
        else{
         $_SESSION['error_msg'] = 'Brand name alredy exist!';
         redirect(base_url().'Productmaster/add_brand'); 

        }

      }
    }
   }

 public function save_attribute_data(){
     //echo'<pre>';print_r($_POST);die;
     $create_date=date("Y-m-d H:i:s");
     $attribute_id=$this->input->post('attribute_id');
    if($attribute_id){
          $date=date('Y-m-d H:i:s');
          $update_data=array(
          'attribute_name'=>$this->input->post("attribute_name"),
        
          'description'=>$this->input->post("description"),
          'meta_title'=> $this->input->post("meta_title"),
          'meta_description'=>$this->input->post("meta_description"),
          'meta_keyword'=> $this->input->post("meta_keyword"),
          'status'=> $this->input->post("status"),
           'created_date'=> $date
          );  
          $msg=$this->Product_model->update_attribute_data($update_data,$attribute_id);
          redirect(base_url().'Productmaster/attribute_list');
        
    }
    else{ 
      //echo'<pre>';print_r($_POST);die;
        $this->form_validation->set_rules('attribute_name', 'attribute name', 'required');
        $this->form_validation->set_rules('meta_title', 'meta_title');
        $this->form_validation->set_rules('meta_description', 'meta_description');
      if($this->form_validation->run() == FALSE)
        {
         $data['subview']="add-attribute";
         $this->load->view('layout/default',$data); 
        }else{

         $attribute_name=$this->input->post("attribute_name");
         $result=$this->Product_model->get_duplicate('attribute_details','attribute_name',$attribute_name);
         if($result<=0){
         $date=date('Y-m-d H:i:s');
         $insert_data=array(
          'attribute_name'=>$this->input->post("attribute_name"),
          
          'description'=>$this->input->post("description"),
          'meta_title'=> $this->input->post("meta_title"),
          'meta_description'=>$this->input->post("meta_description"),
          'meta_keyword'=> $this->input->post("meta_keyword"),
          'status'=> $this->input->post("status"),
          'created_date'=> $date
          );   
          $result=$this->Product_model->save_attribute_data($insert_data);
          redirect(base_url().'Productmaster/attribute_list');
        }
        else{
         $_SESSION['error_msg'] = 'attribute name alredy exist!';
         redirect(base_url().'Productmaster/add_attribute'); 

        }

      }
      
     }
   }  
 public function save_field_data(){
         $attribute_id=$this->input->post("attribute_id");
         //print_r($attribute_id);

        // echo @$_POST['field_id_1'];
         $total_field=$this->input->post("total_field");
         //$data['fields_data']=$this->Product_model->attribute_list();

         for($i = 1; $i<=$total_field; $i++) {

          $field_id= @$_POST['field_id_'.$i];
          if(in_array($field_id,$attribute_id)){
            $date=date('Y-m-d H:i:s');
            $update_data=array(
                'status'=>'1',
                'created_date'=>$date
            );
            //echo $id;
            $this->Product_model->update_fields($update_data,$field_id);
          }else{
            $date=date('Y-m-d H:i:s');
            $update_data=array(
                'status'=>'0',
                'created_date'=>$date
            );
            //echo $id;
            $this->Product_model->update_fields($update_data,$field_id);
          }


    }
    redirect(base_url().'Productmaster/set_fields');
 }
  public function save_attribute_group_data(){
     //echo'<pre>';print_r($_POST);die;
     $create_date=date("Y-m-d H:i:s");
     $attr_id=$this->input->post('attr_id');
        if($attr_id){
         $attribute_id=$this->input->post("attribute_id");
        
          $date=date('Y-m-d H:i:s');

          $update_data=array(
          'cat_id'=>$this->input->post("cat_id"),
          'sub_cat_id'=>$this->input->post("subcat_id"),
          'sub_cat_child_id'=>$this->input->post("sub_cat_child_id"),
          'description'=>$this->input->post("description"),
          'meta_title'=> $this->input->post("meta_title"),
          'meta_description'=>$this->input->post("meta_description"),
          'meta_keyword'=> $this->input->post("meta_keyword"),
          'status'=> $this->input->post("status"),
           'created_date'=> $date
          );   

          $this->Product_model->update_attribute_group_data($update_data,$attr_id);
          
          $attrArray=array();
          $i=0;
          $this->db->select('*');
          $this->db->from('tbl_attribute_category_relation');
          $this->db->where('cat_id',$this->input->post("cat_id"));
          //$this->db->where('sub_cat_id',$this->input->post("subcat_id"));
          //$this->db->where('sub_cat_child_id',$this->input->post("sub_cat_child_id"));
          $a=$this->db->get();
          
          if($a->num_rows()>0){
            $this->db->where('cat_id',$this->input->post("cat_id"));
            //$this->db->where('sub_cat_id',$this->input->post("subcat_id"));
            //$this->db->where('sub_cat_child_id',$this->input->post("sub_cat_child_id"));
            $this->db->delete('tbl_attribute_category_relation');
           
          
          foreach($attribute_id as $att){

            $attrArray[$i]['cat_id']=$this->input->post("cat_id");
            //$attrArray[$i]['sub_cat_id']=$this->input->post("subcat_id");
            //$attrArray[$i]['sub_cat_child_id']=$this->input->post("sub_cat_child_id");
            $attrArray[$i]['attr_id']=$att;

            $i++;

          }
        }
          $this->db->insert_batch('tbl_attribute_category_relation',@$attrArray);
         

          redirect(base_url().'Productmaster/attribute_group_list');
        
    }
    else{ 
      //echo'<pre>';print_r($_POST);die;
        $this->form_validation->set_rules('cat_id', 'cat_id', 'required');

        //$this->form_validation->set_rules('attribute_id', 'attribute_id','required');
        
      if($this->form_validation->run() == FALSE)
        {
         $data['subview']="add-attribute-group";
         $this->load->view('layout/default',$data); 
         }else{
          $attribute_id=$this->input->post("attribute_id");
          $msg=0;
          $cat_id=$this->input->post("cat_id");
          $subcat_id=$this->input->post("subcat_id");
          $sub_cat_child_id=$this->input->post("sub_cat_child_id");
          $this->db->select('attr_id');
          $this->db->from('tbl_attribute_category_relation');
          $this->db->where('cat_id',$cat_id);
          $this->db->where('sub_cat_id',$subcat_id);
          $this->db->where('sub_cat_child_id',$sub_cat_child_id);
          $a=$this->db->get();
          if($a->num_rows()>0){
            $_SESSION['msg']=" Please select another Category,Dupicacy occur!!";
            redirect(base_url().'Productmaster/add_attribute_group');
          }
          /*
          $finalAttr=array();  
          foreach($a as $b){

            $finalAttr[]=$b->attr_id;
            
          }
          /*if (array_diff($attr_id,$attribute_id) == array_diff($attribute_id,$attr_id)) {
                      
                $msg=1;
 
            }
          */
          $date=date('Y-m-d H:i:s');
          $insert_data=array(
          'cat_id'=>$this->input->post("cat_id"),
          'sub_cat_id'=>$this->input->post("subcat_id"),
          'sub_cat_child_id'=>$this->input->post("sub_cat_child_id"),
          'description'=>$this->input->post("description"),
          'meta_title'=> $this->input->post("meta_title"),
          'meta_description'=>$this->input->post("meta_description"),
          'meta_keyword'=> $this->input->post("meta_keyword"),
          'status'=> $this->input->post("status"),
          'created_date'=> $date
          );   
          $result=$this->Product_model->save_attribute_group_data($insert_data);
          $attrArray=array();
          $i=0;
          foreach($attribute_id as $att){
            $attrArray[$i]['cat_id']=$this->input->post("cat_id");
            $attrArray[$i]['sub_cat_id']=$this->input->post("subcat_id");
            $attrArray[$i]['sub_cat_child_id']=$this->input->post("sub_cat_child_id");
            $attrArray[$i]['attr_id']=$att;

            $i++;

          }
          $this->db->insert_batch('tbl_attribute_category_relation',$attrArray);
          redirect(base_url().'Productmaster/attribute_group_list');
        
       

      }
      
        
     
    }
   

 }    
 public function save_category_data(){
     //echo'<pre>';print_r($_POST);die;
     $create_date=date("Y-m-d H:i:s");
     $cat_id=$this->input->post('cat_id');
    if($cat_id){
         $variant=$this->input->post("variant");
         if(!empty($variant)){
             $varstr=implode(',',$variant);
         }
         $cat_name=$this->input->post('cat_name');
         $cat_desc=$this->input->post('cat_desc');
         $file=@$_FILES['update_photo']['name'];
         $date=date('Y-m-d H:i:s');
         if($file!=''){ 
          $upload_file=$this->cat_update_do_upload();
          $update_data=array(
          'category_name'=>$this->input->post("category_name"),
          'description'=>$this->input->post("description"),
          'meta_title'=> $this->input->post("meta_title"),
          'meta_description'=>$this->input->post("meta_description"),
          'meta_keyword'=> $this->input->post("meta_keyword"),
          'feature_category'=>$this->input->post("feature_category"),
          'store'=>$this->input->post("store"),
          'sort_order'=>$this->input->post("sort_order"),
          'status'=> $this->input->post("status"),
          'top'=> $this->input->post("top"),
          'image_url'=> $upload_file,
          'variant'=> $varstr,
          'created_date'=> $date
          );    
          
      $msg=$this->Product_model->update_product_data($update_data,$cat_id);
      redirect(base_url().'Productmaster/category');
           }
         if($file==''){
          $update_data=array(
          'category_name'=>$this->input->post("category_name"),
          'description'=>$this->input->post("description"),
          'meta_title'=> $this->input->post("meta_title"),
          'meta_description'=>$this->input->post("meta_description"),
          'meta_keyword'=> $this->input->post("meta_keyword"),
          'feature_category'=>$this->input->post("feature_category"),
          'store'=>$this->input->post("store"),
          'sort_order'=>$this->input->post("sort_order"),
          'status'=> $this->input->post("status"),
          'top'=> $this->input->post("top"),
          'variant'=> $varstr,
          'created_date'=> $date
          );  
          $msg=$this->Product_model->update_product_data($update_data,$cat_id);
               redirect(base_url().'Productmaster/category');
      }  
    }
    else{ 
      //echo'<pre>';print_r($_POST);die;
        $this->form_validation->set_rules('category_name', 'Category name', 'required');
        $this->form_validation->set_rules('meta_title', 'meta_title');
        $this->form_validation->set_rules('meta_description', 'meta_description');
        
        // if(empty($_FILES['file']['name']))
        //   {
        //       $this->form_validation->set_rules('file', 'file', 'required');
        //   }
        //$this->form_validation->set_rules('file', 'file', 'required');
    // $validation= $this->form_validation->run();
     if ($this->form_validation->run() == FALSE)
      {
         $data['subview']="add-categoery";
         $this->load->view('layout/default',$data); 
      }else{
          $category_name=$this->input->post("category_name");
          $result=$this->Product_model->get_duplicate('category_details','category_name',$category_name);
         if($result<=0){
         $file=@$_FILES['file']['name'];
         $variant=$this->input->post("variant");
         if(!empty($variant)){
             $varstr=implode(',',$variant);
         }
        
         $date=date('Y-m-d H:i:s');
         $upload_file=$this->do_upload();
          $insert_data=array(
          'category_name'=>$this->input->post("category_name"),
          'description'=>$this->input->post("description"),
          'meta_title'=> $this->input->post("meta_title"),
          'meta_description'=>$this->input->post("meta_description"),
          'meta_keyword'=> $this->input->post("meta_keyword"),
          'feature_category'=>$this->input->post("feature_category"),
          'store'=>$this->input->post("store"),
          'sort_order'=>$this->input->post("sort_order"),
          'status'=> $this->input->post("status"),
          'top'=> $this->input->post("top"),
          'image_url'=> $upload_file,
          'variant'=> @$varstr,
          'created_date'=> $date
          );    
         $result=$this->Product_model->save_cat_data($insert_data);
          }
        else{
         $_SESSION['error_msg'] = 'Categoery name alredy exist!';
         redirect(base_url().'Productmaster/add_category');
         }
        redirect(base_url().'Productmaster/category');
       } 

      }

    }

public function save_sub_category_data(){
     //echo'<pre>';print_r($_POST);die;
     $create_date=date("Y-m-d H:i:s");
     $sub_cat_id=$this->input->post('sub_cat_id');
    if($sub_cat_id){
         $variant=$this->input->post("variant");
         if(!empty($variant)){
             $varstr=implode(',',$variant);
         }
         
         $file=@$_FILES['update_photo']['name'];
         $date=date('Y-m-d H:i:s');
         if($file!=''){ 
          $upload_file=$this->cat_update_do_upload();
          $update_data=array(
          'sub_category_name'=>$this->input->post("sub_category_name"),
          'cat_id'=>$this->input->post("category_id"),
          'description'=>$this->input->post("description"),
          'meta_title'=> $this->input->post("meta_title"),
          'meta_description'=>$this->input->post("meta_description"),
          'meta_keyword'=> $this->input->post("meta_keyword"),
          'feature_category'=>$this->input->post("feature_category"),
          'store'=>$this->input->post("store"),
          'sort_order'=>$this->input->post("sort_order"),
          'status'=> $this->input->post("status"),
          'top'=> $this->input->post("top"),
          'image_url'=> $upload_file,
          'variant'=> $varstr,
          'created_date'=> $date
          );    
          
      $msg=$this->Product_model->update_sub_cat_data($update_data,$sub_cat_id);
      redirect(base_url().'Productmaster/subcategory');
           }
         if($file==''){
          $update_data=array(
          'sub_category_name'=>$this->input->post("sub_category_name"),
          'cat_id'=>$this->input->post("category_id"),
          'description'=>$this->input->post("description"),
          'meta_title'=> $this->input->post("meta_title"),
          'meta_description'=>$this->input->post("meta_description"),
          'meta_keyword'=> $this->input->post("meta_keyword"),
          'feature_category'=>$this->input->post("feature_category"),
          'store'=>$this->input->post("store"),
          'sort_order'=>$this->input->post("sort_order"),
          'status'=> $this->input->post("status"),
          'top'=> $this->input->post("top"),
          'variant'=> $varstr,
          'created_date'=> $date
          );  
          $msg=$this->Product_model->update_sub_cat_data($update_data,$sub_cat_id);
               redirect(base_url().'Productmaster/subcategory');
      }  
    }
    else{ 
      //echo'<pre>';print_r($_POST);die;
       $this->form_validation->set_rules('sub_category_name', 'Sub category name', 'required|trim');
        $this->form_validation->set_rules('meta_title', 'meta_title');
        $this->form_validation->set_rules('meta_description', 'meta_description');
        if ($this->form_validation->run() == FALSE)
         {
         $data['subview']="add-sub-categoery";
         $this->load->view('layout/default',$data); 
         }else{
         $sub_category_name=$this->input->post("sub_category_name");
         $variant=$this->input->post("variant");
         if(!empty($variant)){
          $varstr=implode(',',$variant);
        }
         $file=@$_FILES['file']['name'];
         //$result=$this->Product_model->get_duplicate('sub_category_details','sub_category_name',$sub_category_name);
         /*if($result<=0){
         $file=@$_FILES['file']['name'];
         $variant=$this->input->post("variant");
         if(!empty($variant)){
             $varstr=implode(',',$variant);
         }
        */
         $date=date('Y-m-d H:i:s');
         $upload_file=$this->do_upload();
         $insert_data=array(
          'sub_category_name'=>$this->input->post("sub_category_name"),
          'cat_id'=>$this->input->post("category_id"),
          'description'=>$this->input->post("description"),
          'meta_title'=> $this->input->post("meta_title"),
          'meta_description'=>$this->input->post("meta_description"),
          'meta_keyword'=> $this->input->post("meta_keyword"),
          'feature_category'=>$this->input->post("feature_category"),
          'store'=>$this->input->post("store"),
          'sort_order'=>$this->input->post("sort_order"),
          'status'=> $this->input->post("status"),
          'top'=> $this->input->post("top"),
          'image_url'=> $upload_file,
          'variant'=> @$varstr,
          'created_date'=> $date
          );  
          $result=$this->Product_model->save_sub_cat_data($insert_data);

          redirect(base_url().'Productmaster/subcategory');
          }
          /*else{

          $_SESSION['error_msg'] = 'Sub Categoery name alredy exist!';
          redirect(base_url().'Productmaster/add_sub_category');

          }
          */

         }
         
     } 
  

 
public function save_sub_child_category_data(){
     //echo'<pre>';print_r($_POST);die;
     $create_date=date("Y-m-d H:i:s");
     $sub_cat_id=$this->input->post('sub_cat_id');
    if($sub_cat_id){
         $variant=$this->input->post("variant");
         if(!empty($variant)){
             $varstr=implode(',',$variant);
         }
         
         $file=@$_FILES['update_photo']['name'];
         $date=date('Y-m-d H:i:s');
         if($file!=''){ 
          $upload_file=$this->cat_update_do_upload();
          $update_data=array(
          'sub_child_category_name'=>$this->input->post("sub_child_category_name"),
          'cat_id'=>$this->input->post("cat_id"),
          'sub_cat_id'=>$this->input->post("subcat_id"),
           'description'=>$this->input->post("description"),
          'meta_title'=> $this->input->post("meta_title"),
          'meta_description'=>$this->input->post("meta_description"),
          'meta_keyword'=> $this->input->post("meta_keyword"),
          'feature_category'=>$this->input->post("feature_category"),
          'store'=>$this->input->post("store"),
          'sort_order'=>$this->input->post("sort_order"),
          'status'=> $this->input->post("status"),
          'top'=> $this->input->post("top"),
          'image_url'=> $upload_file,
          'variant'=> $varstr,
          'created_date'=> $date
          );    
         //print_r($update_data);die; 
      $msg=$this->Product_model->update_sub_child_cat_data($update_data,$sub_cat_id);
      redirect(base_url().'Productmaster/childsubcategory');
           }
         if($file==''){
          $update_data=array(
          'sub_child_category_name'=>$this->input->post("sub_child_category_name"),
          'cat_id'=>$this->input->post("cat_id"),
          'sub_cat_id'=>$this->input->post("subcat_id"),
          'description'=>$this->input->post("description"),
          'meta_title'=> $this->input->post("meta_title"),
          'meta_description'=>$this->input->post("meta_description"),
          'meta_keyword'=> $this->input->post("meta_keyword"),
          'feature_category'=>$this->input->post("feature_category"),
          'store'=>$this->input->post("store"),
          'sort_order'=>$this->input->post("sort_order"),
          'status'=> $this->input->post("status"),
          'top'=> $this->input->post("top"),
          'variant'=> @$varstr,
          'created_date'=> $date
          ); 
          //print_r($update_data);die; 
          $msg=$this->Product_model->update_sub_child_cat_data($update_data,$sub_cat_id);
               redirect(base_url().'Productmaster/childsubcategory');
      }  
    }
    else{ 
      //echo'<pre>';print_r($_POST);die;
       $this->form_validation->set_rules('sub_child_category_name', 'Sub Child category name', 'required|trim');
       // $this->form_validation->set_rules('cat_id', 'Category');
        //$this->form_validation->set_rules('meta_description', 'meta_description');
        if ($this->form_validation->run() == FALSE)
         {
         $data['subview']="add-sub-child-categoery";
         $this->load->view('layout/default',$data); 
         }else{
         $sub_child_category_name=$this->input->post("sub_child_category_name");
         $file=@$_FILES['file']['name'];
         $variant=$this->input->post("variant");
         if(!empty($variant)){
             $varstr=implode(',',$variant);
         }
         //$result=$this->Product_model->get_duplicate('sub_child_category_details','sub_child_category_name',$sub_child_category_name);
         //if($result<=0){ 
        
         
        
         $date=date('Y-m-d H:i:s');
         $upload_file=$this->do_upload();
          $insert_data=array(
          'sub_child_category_name'=>$this->input->post("sub_child_category_name"),
          'cat_id'=>$this->input->post("cat_id"),
          'sub_cat_id'=>$this->input->post("subcat_id"),
          'description'=>$this->input->post("description"),
          'meta_title'=> $this->input->post("meta_title"),
          'meta_description'=>$this->input->post("meta_description"),
          'meta_keyword'=> $this->input->post("meta_keyword"),
          'feature_category'=>$this->input->post("feature_category"),
          'store'=>$this->input->post("store"),
          'sort_order'=>$this->input->post("sort_order"),
          'status'=> $this->input->post("status"),
          'top'=> $this->input->post("top"),
          'image_url'=> $upload_file,
          'variant'=> @$varstr,
          'created_date'=> $date
          );  
         $result=$this->Product_model->save_sub_child_cat_data($insert_data);
          redirect(base_url().'Productmaster/childsubcategory'); 
         }
         /*else{
           $_SESSION['error_msg'] = 'Sub Child Categoery name alredy exist!';
          redirect(base_url().'Productmaster/add_child_sub_category');

         }
         */
       }
         
     } 
  

 
public function cat_list(){
        $data['cat_data']=$this->Product_model->cat_list();
        $data['subview']="categoery-list";
        $this->load->view('layout/default',$data);

  }
public function brand_list(){
        $data['cat_data']=$this->Product_model->brand_list();
        $data['subview']="brand-list";
        $this->load->view('layout/default',$data);

  }
public function company_list(){
        $data['company_data']=$this->Product_model->company_list();
        $data['subview']="company-list";
        $this->load->view('layout/default',$data);

  }


  public function cms_list(){
    
    $data['cms_data']=$this->Product_model->cms_list();
    $data['subview']="cms-list";
    $this->load->view('layout/default',$data);

}
 public function email_list(){
    
    $data['email_data']=$this->Product_model->email_list();
    $data['subview']="email-list";
    $this->load->view('layout/default',$data);

}
public function charity_list(){
    
  $data['charity_data']=$this->Product_model->charity_list();
  $data['subview']="charity_list";
  $this->load->view('layout/default',$data);

}
public function contact_list(){
  $data['contact_data']=$this->Product_model->contact_list();
  $data['subview']="contact-list";
  $this->load->view('layout/default',$data);
}

 public function news_list(){
  $data['news_data']=$this->Product_model->news_list();
  $data['subview']="news-list";
  $this->load->view('layout/default',$data);

  }  
public function bin_win_product_list(){
    
  $data['bin_win_product_list']=$this->Product_model->bin_win_product_list();
  $data['subview']="bin_win_product_list";
  $this->load->view('layout/default',$data);

}
public function manage_blogs(){
    
  $data['manage_blogs']=$this->Product_model->blog_list();
  $data['subview']="manage_blogs";
  
  $this->load->view('layout/default',$data);

}
public function slider_list(){
        $data['cat_data']=$this->Product_model->slider_list();
        $data['subview']="slider-list";
        $this->load->view('layout/default',$data);

  }

public function attribute_list(){
        $data['cat_data']=$this->Product_model->attribute_list();
        $data['subview']="attribute-list";
        $this->load->view('layout/default',$data);

  }
public function attribute_group_list(){
        $data['cat_data']=$this->Product_model->attribute_group_list();
        $data['subview']="attribute-group-list";
        $this->load->view('layout/default',$data);

  }


public function view_slider() {
            $id=$_POST['id'];
            $data["data"] = $this->Product_model->single_slider_list($id);
            $this->load->view("Productmaster/ajax/slider-view", $data);
        
    }
public function cod_orders(){
     $data['checkout_data']=$this->Product_model->get_all_shopping_orders();
     $data['subview']="cod-order-list";
     $this->load->view('layout/default',$data);

  }
public function order_product_view(){
          $cart_id=$this->uri->segment(3);
          $data['product_details']=$this->Product_model->get_product_details($cart_id);
          $data['subview']="product-order-details";
      $this->load->view('layout/default',$data);

  }

public function invoice_view(){
          $data['checkout_data']=$this->Product_model->get_all_shopping_orders();
          $cart_id=$this->uri->segment(3);
          $data['product_details']=$this->Product_model->get_product_details($cart_id);
          $data['subview']="invoice-order-details";
         $this->load->view('layout/default',$data);
       }


public function view_brand() {
            $id=$_POST['id'];
            $data["data"] = $this->Product_model->single_brand_list($id);
            $this->load->view("Productmaster/ajax/brand-view", $data);
        
    }
public function view_cat() {
            $id=$_POST['id'];
            $data["data"] = $this->Product_model->single_cat_list($id);
            $this->load->view("Productmaster/ajax/cat-view", $data);
        
    }
public function view_sub_cat() {
            $id=$_POST['id'];
            $data["data"] = $this->Product_model->sub_cat_list($id);
            $this->load->view("Productmaster/ajax/sub-cat-view", $data);
        
    }
public function view_child_sub_cat() {
            $id=$_POST['id'];
            $data["data"] = $this->Product_model->sub_child_cat_list($id);
            $this->load->view("Productmaster/ajax/sub-child-cat-view", $data);
        
    }
public function view_attr() {
            $id=$_POST['id'];
            $data["data"] = $this->Product_model->attribute_list($id);
            $this->load->view("Productmaster/ajax/attr-view", $data);
        
    }
public function view_group() {
            $id=$_POST['id'];
            $data["data"] = $this->Product_model->attribute_group_list($id);
            $this->load->view("Productmaster/ajax/attr-group-view", $data);
        
    }
public function inactive_user($table, $field, $delete_id, $section){
        $section = @str_replace('_', '  ', $section);
        $result = $this->Product_model->inactive_user($table, $field, $delete_id);
        if ($result):
            // $this->session->set_flashdata('success', "$section record has been successfully deleted.");
            $_SESSION['success']='User status has been changed .';
        else:
            // $this->session->set_flashdata('error', "Error in delete record. Please try again.");
            $_SESSION['success']='Error in status has been changed. Please try again.';
        endif;
        redirect($_SERVER["HTTP_REFERER"]);
    }
public function deletes1($table, $field, $delete_id, $section){
        $section = @str_replace('_', '  ', $section);
        $result = $this->Product_model->deletes1($table, $field, $delete_id);
        if ($result):
            // $this->session->set_flashdata('success', "$section record has been successfully deleted.");
            $_SESSION['success']='Record has been successfully deleted.';
        else:
            // $this->session->set_flashdata('error', "Error in delete record. Please try again.");
            $_SESSION['success']='Error in delete record. Please try again.';
        endif;
        redirect($_SERVER["HTTP_REFERER"]);
    }    
public function ProductList(){
      $data['product_list']=$this->Product_model->product_list();
      $data['subview']="product-list";
      $this->load->view('layout/default',$data);
   }
 public function chek_duplicate(){
    $bar_code= $this->input->post('bar_code');
    if($bar_code){
    $num_row=$this->Product_model->get_duplicate('tbl_product_attribute','barcode',$bar_code);
    echo $num_row;
    }else{
      echo 'bk';;
    }
 }
  public function chek_item_duplicate(){
    $itemcode= $this->input->post('itemcode');
    if($itemcode){
    $num_row=$this->Product_model->get_duplicate('tbl_product_attribute','itemcode',$itemcode);
    echo $num_row;
    }else{
      echo 'bk';;
    }
 }   
 public function save_product_data(){
   if($_POST){
       //printarray($_POST); 
        //printarray($_FILES);

      //die;
    //$image_id=array();    
    // $count= count($_FILES);
    // for($i=0;$i<$count;$i++){
    //    $file_data=$_FILES['photo_'.$i];
    //    $imageid=@$_POST['imageid_'.$i];
    //    $fcnt=count($file_data);
    //     for($j=0;$j<$fcnt;$j++){
    //      if(@$file_data['name'][$j]!=''){
    //       echo @$file_data['name'][$j];
    //       echo $imageid[$j];
    //           //echo @$_POST['imageid_'.$j];
    //       }
    //     } 
    //    } 
         
      $eid=$this->input->post('eid');
      $upload_file=$this->do_uploads();
      if(is_array($upload_file) && count($upload_file) ) {
        $imgcnt=count($upload_file);
       }
      
      $currenttime=date('Y-m-d h:i:s'); 
      $insert_data=array(
        'product_name'=>$this->input->post('product_name'),
        'product_amu'=>$this->input->post('product_amu'),
        'hsn_code'=>$this->input->post('hsn_code'),
        'description'=>$this->input->post('description'),
        'fetures'=>$this->input->post('fetures'),
        'product_title'=>$this->input->post('product_title'),
        'meta_description'=>$this->input->post('meta_description'),
        'tag_keyword'=>$this->input->post('tag_keyword'),
        'product_tag'=>$this->input->post('product_tag'),
        'model'=>$this->input->post('model'),
        'sku'=>$this->input->post('sku'),
        'upc'=>$this->input->post('upc'),
        'ean'=>$this->input->post('ean'),
        'jan'=>$this->input->post('jan'),
        'isbn'=>$this->input->post('isbn'),
        'mpn'=>$this->input->post('mpn'),
        'location'=>$this->input->post('location'),
        'mrp_price'=>$this->input->post('mrp_price'),
        'purchase_price'=>$this->input->post('purchase_price'),
        'sale_price'=>$this->input->post('sale_price'),
        'margin_price'=>$this->input->post('margin_price'),
        'gst_per'=>$this->input->post('gst_per'),
        'gst_type'=>$this->input->post('gst_type'),
        
        'max_quantity'=>$this->input->post('max_quantity'),
        'subtract'=>$this->input->post('subtract'),
        'stock_status_id'=>$this->input->post('stock_status_id'),
        'date_available'=>$this->input->post('date_available'),
        'length'=>$this->input->post('length'),
        'width'=>$this->input->post('width'),
        'height'=>$this->input->post('height'),
        'length_class_id'=>$this->input->post('length_class_id'),
        'weight'=>0,
        'weight_class_id'=>$this->input->post('weight_class_id'),
        'status'=>$this->input->post('status'),
        'sort_order'=>$this->input->post('sort_order'),
        'brand_name'=>$this->input->post('brand_id'),
        'cat_id'=>$this->input->post('cat_id'),
        'sub_cat_id'=>$this->input->post('subcat_id'),
        'sub_cat_child_id'=>$this->input->post('sub_cat_child_id'),
        'store'=>$this->input->post('store'),
        'related_product'=>$this->input->post('related_product'),
        'link_product_id'=>$this->input->post('link_product_id')
         );
       //print_r($insert_data);
      //die;
      if($eid){
        $this->Product_model->update_product_details($insert_data,$eid);
        $this->Product_model->update_attribute_product_data($upload_file,$_POST,$eid);
       }else{
         $last_id=$this->Product_model->save_product($insert_data); 
         $this->Product_model->save_attribute_product_data($upload_file,$_POST,$last_id);
         }
        $this->session->set_flashdata('alert', array('message' => 'Product Added Successfully!.', 'class'=>'alert alert-success'));
        redirect(base_url().'Productmaster/ProductList');
        }
      }

function do_uploads(){
    //$file_datas=array();
    $file_name='';
   //print_r($_POST);die;
    //$count=count($_FILES['photo']['name']);
   //echo'<pre>';print_r($_FILES);die;
  
     $count= count($_FILES);
     for($i=0;$i<$count;$i++){
        $file_data=@$_FILES['photo_'.$i];
        $imageid=@$_POST['imageid_'.$i];
        if(is_array($file_data) && count($file_data) ) {
        $fcnt=count(@$file_data['name']);
        for($j=0;$j<$fcnt;$j++){
         if(@$file_data['name'][$j]!=''){
             $imageids=@$imageid[$j];
             $file_name =time().'_'.$file_data['name'][$j]; 
             if($imageids){
             $file_datas[$imageids][]=$file_name;
             }else{
              $file_datas[$i][]=$file_name;
             }
         $_FILES['userfile']['name']=time().'_'.$file_data['name'][$j];
         $_FILES['userfile']['type']= $file_data['type'][$j];
         $_FILES['userfile']['tmp_name']= $file_data['tmp_name'][$j];
         $_FILES['userfile']['error']= $file_data['error'][$j];
         $_FILES['userfile']['size']= $file_data['size'][$j];
         $path=$this->config->item('base_Url').'upload/product_images/';
         $config1['upload_path']=$path;
         $config1['allowed_types']='jpg|png|gif';
         $config1['min_hieght']='10';
         $config1['min_width']='10';
         $this->load->library('upload',$config1);
         $this->upload->initialize($config1);
         $this->upload->do_upload('userfile');
         }
      }
    }
   } 
  return @$file_datas;
 //echo'<pre>';print_r(@$file_datas);die;
  }

  public function addpromaster(){

        $data['brand_data']=$this->Product_model->get_brand_data();
        $data['fields_data']=$this->Product_model->master_field_list();
        $eid=$this->uri->segment(3);
       if($eid){
        $data['single_cat_data']=$this->Product_model->single_child_cat_list($eid);
        $data['single_pro_data']=$this->Product_model->single_pro_data($eid);
         }
        $data['cat_data']=$this->Product_model->cat_list();
        $data['sub_cat_data']=$this->Product_model->sub_cat_lists();
        $data['sub_child_cat_data']=$this->Product_model->sub_sub_cat_lists();
        $data['get_attr']=$this->Product_model->get_attr_list($eid);
        $data['only_prodcuct']=$this->Product_model->get_product();
        $data['subview']="add-product";
        $this->load->view('layout/default',$data);

   }
   public function add_cms(){
        $eid=$this->uri->segment(3);
         if($eid){
           $data['single_cat_data']=$this->Product_model->single_cms_list($eid);
         }
         $data['subview']="add_cms";
         $this->load->view('layout/default',$data); 
     }
 public function add_email(){
        $eid=$this->uri->segment(3);
         if($eid){
           $data['single_cat_data']=$this->Product_model->single_email_list($eid);
         }
         $data['subview']="add_email";
         $this->load->view('layout/default',$data); 
 }
 public function add_charity(){
  $eid=$this->uri->segment(3);
   if($eid){
     $data['single_cat_data']=$this->Product_model->single_charity_list($eid);
   }
   $data['subview']="add_charity";
   $this->load->view('layout/default',$data); 
}
public function add_bin_win(){
  $eid=$this->uri->segment(3);
  $data['cat_data']=$this->Product_model->cat_list();
  $data['sub_cat_data']=$this->Product_model->sub_cat_lists();
  $data['bin_p']=$this->Product_model->get_product();
  $data['win_p']=$this->Product_model->get_product();
  $data['product']=$this->Product_model->get_product();
 
   if($eid){
     $data['single_cat_data']=$this->Product_model->add_bin_win($eid);
   }
   $data['subview']="add_bin_win";
   $this->load->view('layout/default',$data); 
}
 public function add_manage_blogs(){
     $eid=$this->uri->segment(3);
   if($eid){
     $data['single_cat_data']=$this->Product_model->single_blog_list($eid);
   }
   $data['subview']="add-blog";
   $this->load->view('layout/default',$data); 
}

public function add_brand(){
   $eid=$this->uri->segment(3);
        if($eid){
        $data['single_cat_data']=$this->Product_model->single_brand_list($eid);
        }
        $data['subview']="add-brand";
        $this->load->view('layout/default',$data); 
}
public function add_company(){
   $eid=$this->uri->segment(3);
        if($eid){
        $data['single_cat_data']=$this->Product_model->single_comp_list($eid);
        }
        $data['subview']="add-company";
        $this->load->view('layout/default',$data); 
}
public function add_home_slider(){
   $eid=$this->uri->segment(3);
        if($eid){
        $data['single_cat_data']=$this->Product_model->single_slider_list($eid);
        }
        $data['subview']="add-home-slider";
        $this->load->view('layout/default',$data); 
}
public function add_attribute(){
       $eid=$this->uri->segment(3);
        if($eid){
        $data['single_cat_data']=$this->Product_model->single_attribute_list($eid);
        }
        $data['group_data']=$this->Product_model->attribute_group_list();
        $data['subview']="add-attribute";
        $this->load->view('layout/default',$data); 
}
public function set_fields(){
       $data['fields_data']=$this->Product_model->master_field_list();
        $data['subview']="set-fields";
        $this->load->view('layout/default',$data); 
}

public function add_attribute_group(){
        $data['field']='';
        $eid=$this->uri->segment(3);
        $finalAttr=array();
        if($eid){
          $data['single_pro_data']=$this->Product_model->single_attribute_group_list($eid);
          $data['field']='disabled';
          $this->db->select('*');
          $this->db->from('tbl_attribute_category_relation');
          $this->db->where('cat_id',$data['single_pro_data']->cat_id);
          if(@$data['single_pro_data']->sub_cat_id){
          $this->db->where('sub_cat_id',$data['single_pro_data']->sub_cat_id);
          }
          if(@$data['single_pro_data']->sub_cat_child_id){
           $this->db->where('sub_cat_child_id',$data['single_pro_data']->sub_cat_child_id);
          }
          $exce=$this->db->get();
         // echo $this->db->last_query();die;
          $result=$exce->result();
            
          if($exce->num_rows()>0){
          
          foreach($result as $b){

            $finalAttr[]=$b->attr_id;
            
          }
        
        }

        }
        $data['attribute_data']=$this->Product_model->all_attribute_list();
        $data['get_attr_data']=$finalAttr;
        $data['cat_data']=$this->Product_model->cat_list();
        $data['sub_cat_data']=$this->Product_model->sub_cat_lists();
        $data['sub_child_cat_data']=$this->Product_model->sub_sub_cat_lists();
       
        $data['subview']="add-attribute-group";
      
        $this->load->view('layout/default',$data); 
}



public function category(){
       $data['cat_data']=$this->Product_model->cat_list();
       $data['subview']="categoery-list";
       $this->load->view('layout/default',$data); 

    }
   public function add_category() {
        $eid=$this->uri->segment(3);
        if($eid){
        $data['single_cat_data']=$this->Product_model->single_cat_list($eid);
        }
        $data['subview']="add-categoery";
        $this->load->view('layout/default',$data); 
    }  
 
public function subcategory(){
        $data['cat_data']=$this->Product_model->sub_cat_list();
        $data['subview']="sub-categoery-list";
      $this->load->view('layout/default',$data); 

    }

public function add_sub_category() {
        $eid=$this->uri->segment(3);
        if($eid){
        $data['single_cat_data']=$this->Product_model->single_sub_cat_list($eid);
        }
        $data['cat_data']=$this->Product_model->cat_list();
        $data['subview']="add-sub-categoery";
        $this->load->view('layout/default',$data); 
    } 
public function childsubcategory(){
        $data['cat_data']=$this->Product_model->sub_child_cat_list();
        $data['subview']="child-sub-categoery-list";
      $this->load->view('layout/default',$data); 

    }
public function get_sub_cat()
        {
         $cat_id=$_POST['cat_id'];
         $this->db->select('*');
         $this->db->from('sub_category_details');
         $this->db->where('cat_id',$cat_id);
         $query=$this->db->get();
         $res=$query->result();
        // print_r($res);
         $html='';
         $html .='<option value="">--select sub categoery--</option>';
         foreach ($res as $value) {
          $html.='<option value="'.$value->id.'">'.$value->sub_category_name.'</option>';
         }
        echo $html;
     }
     public function get_product()
    {
         $cat_id=$_POST['cat_id'];
         //$sub_cat_id=$_POST['sub_cat_id'];
         $this->db->select('*');
         $this->db->from('tbl_products');
         $this->db->where('sub_cat_id',$cat_id);
        /*if(!empty($sub_cat_id)){
         $this->db->where('sub_cat_id',$cat_id);
         }
         */
         $query=$this->db->get();
         
         $res=$query->result();
        // print_r($res);
         $html='';
         $html .='<option value="">--select Product--</option>';
         foreach ($res as $value) {
          $html.='<option value="'.$value->id.'">'.$value->product_name.'</option>';
         }
        echo $html;
     }
public function delete_variant(){
    $attid=$this->input->post('attid');
    $this->db->where('id',$attid);
    $res=$this->db->delete('tbl_product_attribute');
    return $res;
      

}
public function get_attr_data()
{        //$p_id=@$_POST['pid'];
         $cat_id=$_POST['cat_id'];
         if($cat_id){
         $attr=array();
         $this->db->select('attr_id');
         $this->db->from('tbl_attribute_category_relation');
         $this->db->where('cat_id',$cat_id);
         $getattr=$this->db->get()->result();
         foreach(@$getattr as $gt){
           $arr[]=$gt->attr_id;
          }
         $res = $this->Product_model->get_att(@$arr); 
         // echo'<pre>';print_r($res);
          $j=0;
          $html=''; 
          ?>
          <table id="category_view" class="table table-bordered table-striped">
                                        <thead>
                                        </thead>
                                        <tbody>
                                          <tr><td>
                                          <table class="table table-bordered table-striped">
                              <thead style="background-color: antiquewhite;border: 1px solid;">
                                        <tr>
                                           <?php
                                           if(is_array($res)){
                                           $cnt=count(@$res);
                                              }
                                           if(@$cnt){
                                           foreach (@$res as $value) {?>
                                            <th><?php echo $value->attribute_name; ?></th>
                                           <?php } ?> 
                                           </tr>
                                           <a style="width:30px; float: left" onclick="set_tr()"   href="#"  class=" icon-plus icon-2x margin-top-8">Add(+)</a>
                                         <?php }?>
                                           </thead>
                                          <tbody id="AudioWrapper5">
                                          <tr>
                                          <input type="hidden" name="attr_id[]" value="<?php echo @$att_val->id; ?>"> 
                                         <?php
                                          if(is_array($res)){
                                             $cnt=count(@$res);
                                            }
                                           if(@$cnt){
                                           foreach (@$res as $value) {?>    
                                           <?php if($value->attribute_name=='Price'){?>
                                            <td>
                                                <table>
                                                    <tr>
                                                    <td><input value="<?php echo @$att_val->price_mrp; ?>" onclick="get_margin(0)" onkeyup="get_margin(0)" style="width:80px" placeholder="MRP"  type="text" id="mrp_price_0" name="price_0[]"></td>
                                                     <td><input onkeyup="get_margin(0)" value="<?php echo @$att_val->margin_price; ?>" id="margin_price_0"  style="width:80px" placeholder="Margin%" type="text" name="price_0[]"></td>
                                                    <td><input value="<?php echo @$att_val->sp_price; ?>"  style="width:80px" placeholder="SP" type="text" id="sp_price_0" name="price_0[]"></td>
                                           </tr>
                                    </table>
                                  </td>
                                      <?php }?>
                                          <?php if($value->attribute_name=='Image'){?>  
                                         <td>
                                         <table>
                                         <tr>
                                         <td><input id="audio4"  class="boxdd" onchange="loadFile1(event)"   type="file" name="photo_0[]" placeholder=""></td><td><input id="audio4"  class="boxdd" onchange="loadFile1(event)"   type="file" name="photo_0[]" placeholder=""></td><td><input id="audio4"  class="boxdd" onchange="loadFile1(event)"   type="file" name="photo_0[]" placeholder=""><td></td><td><input id="audio4"  class="boxdd" onchange="loadFile1(event)"   type="file" name="photo_0[]" placeholder=""></td></tr>
                                        </table>
                                         </td>
                                         <?php }if($value->attribute_name!='Price' && $value->attribute_name!='Image' && $value->attribute_name!=''){?>
                                         <td>
                                         <input  <?php if($value->attribute_name=='Barcode'){echo'style="width: 140px"';}?> <?php if($value->attribute_name=='Itemcode'){echo'style="width: 100px"';}?> <?php if($value->attribute_name=='Size'){echo'style="width: 100px"';}?> <?php if($value->attribute_name=='Qty'){echo'style="width: 100px"';}?><?php if($value->attribute_name=='Weight'){echo'style="width: 100px"';}?><?php if($value->attribute_name=='Color'){echo'style="width: 100px"';}?><?php if($value->attribute_name=='Style'){echo'style="width: 100px"';}?>value="" type="text" <?php if($value->attribute_name=='Barcode'){echo'onclick="check_duplicate(0,this.value)" onkeyup="check_duplicate(0,this.value)" onfocusout="gen_item_code(0)"';} ?> <?php if($value->attribute_name=='Itemcode'){echo'onclick="check_item_duplicate(0,this.value)" onkeyup="check_item_duplicate(0,this.value)"'; echo'readonly';} ?> id="<?php echo lcfirst($value->attribute_name); ?>_0"  name="<?php echo lcfirst($value->attribute_name); ?>[]"><?php if($value->attribute_name=='Barcode'){?>
                                           <br><span id="dup_error_0"></span>
                                         <?php }?>
                                         <?php if($value->attribute_name=='Itemcode'){?>
                                           <br><span id="item_dup_error_0"></span>
                                         <?php }?>
                                           </td> 
                                         
                                         <?php }} }?> 
                                         </tr>
                                 </table>
                               </td>
                             </tr>  
                          </tbody>
                  </table>
                </td></tr>
               </tbody>
              </table>   
                                            
<?php  } }
public function get_attr_by_javascript()
{         
         $cat_id=$_POST['cat_id'];
         if($cat_id){
         $attr=array();
         $this->db->select('attr_id');
         $this->db->from('tbl_attribute_category_relation');
         $this->db->where('cat_id',$cat_id);
         $getattr=$this->db->get()->result();
         foreach(@$getattr as $gt){
           $arr[]=$gt->attr_id;
          }
         $res = $this->Product_model->get_att(@$arr); 
         //print_r($res);
         
          //$return["json"] = json_encode($return);
         echo json_encode($res,true);        
               
       } 

}
public function get_sub_child_cat()
         {
         $cat_id=$_POST['cat_id'];
         $this->db->select('*');
         $this->db->from('sub_child_category_details');
         $this->db->where('sub_cat_id',$cat_id);
         $query=$this->db->get();
         $res=$query->result();
         //print_r($res);
         $html='';
         $html .='<option value="">--select sub categoery--</option>';
         foreach ($res as $value) {
          $html.='<option value="'.$value->id.'">'.$value->sub_child_category_name.'</option>';
         }
        echo $html;
     }   
public function add_child_sub_category() {
        $eid=$this->uri->segment(3);
        if($eid){
        $data['single_cat_data']=$this->Product_model->single_child_cat_list($eid);

        }
        $data['cat_data']=$this->Product_model->cat_list();
        $data['sub_cat_data']=$this->Product_model->sub_cat_lists();
        $data['subview']="add-sub-child-categoery";
        $this->load->view('layout/default',$data); 
    } 
  public function do_upload(){
    if($_FILES['file']['name']){
    $file_name =time().'_'.$_FILES['file']['name'];  
    $_FILES['userfile']['name']=time().'_'.$_FILES['file']['name'];
    $_FILES['userfile']['type']= $_FILES['file']['type'];
        $_FILES['userfile']['tmp_name']= $_FILES['file']['tmp_name'];
        $_FILES['userfile']['error']= $_FILES['file']['error'];
        $_FILES['userfile']['size']= $_FILES['file']['size'];
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
    
  }
public function comp_do_upload(){
    if($_FILES['file']['name']){
    $file_name =time().'_'.$_FILES['file']['name'];  
    $_FILES['userfile']['name']=time().'_'.$_FILES['file']['name'];
    $_FILES['userfile']['type']= $_FILES['file']['type'];
        $_FILES['userfile']['tmp_name']= $_FILES['file']['tmp_name'];
        $_FILES['userfile']['error']= $_FILES['file']['error'];
        $_FILES['userfile']['size']= $_FILES['file']['size'];
    $path=$this->config->item('base_Url').'upload/company_logo/';
    $config1['upload_path']=$path;
    $config1['allowed_types']='jpg|png|gif';
    $config1['min_hieght']='10';
    $config1['min_width']='10';
    $this->load->library('upload',$config1);
    $this->upload->initialize($config1);
    $this->upload->do_upload('userfile');
    return $file_name;
    }
    
  }
  function comp_update_do_upload(){
   if($_FILES['update_photo']['name']){
    $file_name =time().'_'.$_FILES['update_photo']['name'];  
    $_FILES['userfile']['name']=time().'_'.$_FILES['update_photo']['name'];
    $_FILES['userfile']['type']= $_FILES['update_photo']['type'];
        $_FILES['userfile']['tmp_name']= $_FILES['update_photo']['tmp_name'];
        $_FILES['userfile']['error']= $_FILES['update_photo']['error'];
        $_FILES['userfile']['size']= $_FILES['update_photo']['size'];
    $path=$this->config->item('base_Url').'upload/company_logo/';
    $config1['upload_path']=$path;
    $config1['allowed_types']='jpg|png|gif';
    $config1['min_hieght']='10';
    $config1['min_width']='10';
    $this->load->library('upload',$config1);
    $this->upload->initialize($config1);
    $this->upload->do_upload('userfile');
    return $file_name;
    }
  }
function update_do_upload(){
    $file_data=array();
    $file_name='';
    
    if(!empty($_FILES['update_photo']['name'])){
    $count=count($_FILES['update_photo']['name']);
    //print_r($_FILES);die;
    for($i=0;$i<$count;$i++){
    $file_name =time().'_'.$_FILES['update_photo']['name'][$i];  
    array_push($file_data,$file_name);
    $_FILES['userfile']['name']=time().'_'.$_FILES['update_photo']['name'][$i];
    $_FILES['userfile']['type']= $_FILES['update_photo']['type'][$i];
        $_FILES['userfile']['tmp_name']= $_FILES['update_photo']['tmp_name'][$i];
        $_FILES['userfile']['error']= $_FILES['update_photo']['error'][$i];
        $_FILES['userfile']['size']= $_FILES['update_photo']['size'][$i];
   $path=$this->config->item('base_Url').'upload/product_images/';

    $config1['upload_path']=$path;
    $config1['allowed_types']='jpg|png|gif';
    $config1['min_hieght']='10';
    $config1['min_width']='10';
    $this->load->library('upload',$config1);
    $this->upload->initialize($config1);
    $this->upload->do_upload('userfile');
    }
    return $file_data;
    }
  }
  public function get_url_title($title_url)
	{		$final='';
			$title_url=html_entity_decode($title_url);
			$title_url=trim($title_url);
			$title_url=strtolower($title_url);
			
			$title_url = str_replace(" ", "_", $title_url);

			$title_url = str_replace("/", "-", $title_url);
			
			$strlen_title = strlen($title_url);
			
			for($i=0;$i<$strlen_title;$i++)
			{
				$data = substr($title_url,$i,1);
			
				if(preg_match ("/^([a-z]||[A-Z]||[0-9]||[\-\s]||[\_\s])+$/", $data ))
				{		
					$final.=$data ;
				}
			}
				$final = preg_replace( "{[ \t]+}", ' ', $final );
				$final = preg_replace('/\s\s+/', ' ', $final);
				$final = trim($final);
				$final = str_replace(" ", "-", $final);
				$final = preg_replace('/\-\-+/', '-', $final);
				//$message = preg_replace('/\s\s+/', ' ', $message);
				
				$final = $this->trim_text($final,10);
				
				//$output = str_replace(" ", "-", $total);
				
					
		return  $final;			
  }
  
  public function trim_text($text, $count)
	{
    	$trimed='';
		$ar_string = explode("-", $text);
		if(sizeof($ar_string) < $count)
		{
			$count=sizeof($ar_string);
		}
		for($wordCounter=0; $wordCounter < $count ; $wordCounter++ )
		{ 
			$trimed .= $ar_string[$wordCounter];
			if ( $wordCounter < $count-1 )
				{$trimed .= "-"; }
		}
		return $trimed;
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
 public function all_win_product(){
      $data['user_data']=$this->Product_model->all_win_product();
       $data['subview']="all_win_by_product";
       $this->load->view('layout/default',$data); 

    }
    public function win_product()
    {

        $table_name = 'tbl_bin_win_product';
        $where_column = 'id';       
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
         
           // $logged_in_userDetail = $this->session->userdata('user_detail');
          // $user_id = $logged_in_userDetail[0]->user_id;
         // $user_roll_id = $this->input->post('id');
                     
            $data = array(
                'id' => $this->input->post('id'),                            
                'bin_id' =>$this->input->post('bin_id'),
                  'win_id' =>$this->input->post('win_id')
             
            );

            if ($this->input->post('id') != '') {
                $data['updated_by'] = 1;

            } else {
                $data['created_by'] =1;
              
            }
            //end

            $validation_array = array(
                array(
                    "field_name" => "bin_id",
                    "validate_type" => "trim|required|is_unique[tbl_bin_win_product.bin_id]",
                    "message" => 'Please select Win by product'
                ),
                array(
                    "field_name" => "win_id",
                    "validate_type" => "trim|required|is_unique[tbl_bin_win_product.win_id]",
                    "message" => 'Please select Win product'
                )
              
            );            
     
            @$file_upload = '';
            $save_data_id= $this->Crud_model->common_save_data($data, $validation_array, $table_name, $where_column, $file_upload,$folder_path='/upload/profile',$file_preffix='profile_','yes');
          //  echo $this->db->last_query();
           if(@$save_data_id!=''){
              $result['success'] = true;
              $result['save_data_id'] = $save_data_id;
              $result['search_url'] = base_url().'Productmaster/all_win_product';
              echo json_encode($result);
           }
         
        } else {
            
           $pageData = array();
            $user_id=$this->uri->segment(3);
        if($user_id){
       $pageData['list_data'] = $this->Crud_model->getCommonData('tbl_bin_win_product', 'id', $user_id);
        }else
        {
          $pageData['list_data']=array();  
        }    

          // print_r( $pageData['list_data']);die;
        $pageData['subview']="win_by_product";
        $this->load->view('layout/default',$pageData); 
            //echo $this->db->last_query();
           // $pageData['sqlquery'] = "SELECT * FROM `s_admin` WHERE is_deleted='0'";
           /// $this->loadViews("user/add_user", $this->global, $pageData, NULL);
        }
    }

public function delete_data($table, $field, $delete_id, $section){
        $section = @str_replace('_', '  ', $section);
        $result = $this->Product_model->delete_data($table, $field, $delete_id);
        if ($result):
            // $this->session->set_flashdata('success', "$section record has been successfully deleted.");
            $_SESSION['success']='Record has been successfully deleted.';
        else:
            // $this->session->set_flashdata('error', "Error in delete record. Please try again.");
            $_SESSION['success']='Error in delete record. Please try again.';
        endif;
        redirect($_SERVER["HTTP_REFERER"]);
    }  

}?>
