<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shopping_model extends CI_Model{
  
  public function get_all_product_data(){
       $this->db->select("tbl_products.*,product_photo_details.p_id,product_photo_details.photo");
       $this->db->where('tbl_products.status','1');
       $this->db->from("tbl_products");
       $this->db->join('product_photo_details','product_photo_details.p_id=tbl_products.id');
       $this->db->group_by('product_photo_details.p_id');
       $this->db->order_by('product_photo_details.id','desc');
       $this->db->where('category_id',9);
      // $this->db->like('product_photo_details.photo','_1.jpg','before');
       $query=$this->db->get();
       $res=$query->result();
       //print_r($res);die;
      return $res;

    }
public function profile_data($uid){
       $this->db->select("*");
       $this->db->where('customer_id',$uid);
       $this->db->from("tbl_customers");
       $query=$this->db->get();
       //echo $this->db->last_query();die;
       $res=$query->row();
       //print_r($res);die;
      return $res;

    } 
 public function get_all_related_product_data(){
       $this->db->select("*");
       $this->db->where('cat_id',9);
       $this->db->from("product_photo_details");
       $this->db->order_by('product_photo_details.id','desc');
       $query=$this->db->get();
       $res=$query->result();
       //print_r($res);die;
      return $res;

    }
    public function notebook_silider_data($cat_id){
       $this->db->select("tbl_products.id,tbl_products.product_name,tbl_products.product_price,tbl_products.sku_id,product_photo_details.photo");
       $this->db->from("tbl_products");
       $this->db->join('product_photo_details','product_photo_details.p_id=tbl_products.id');
       $this->db->group_by('product_photo_details.p_id');
       $this->db->order_by('tbl_products.id','desc');
       $this->db->where('category_id',$cat_id);

       //$this->db->like('product_photo_details.photo','_1.jpg','before');
       $query=$this->db->get();
        //echo $this->db->last_query();die;
       $res=$query->result();
       $ret_data=array();
       /*foreach ($res as $value) {
       $ret_data['product_name']=$value->product_name;
       $ret_data['product_id']=$value->id;
       $ret_data['product_photo']=$value->photo;
       }*/
       //$ret_data=array('id'=>10,'name'=>'rahul');
       //echo'<pre>';print_r($ret_data);die;
      return $res;
  }
public function notebook_silider_sub_data($cat_id){
       $this->db->select("tbl_products.*,product_photo_details.p_id,product_photo_details.photo");
       $this->db->from("tbl_products");
       $this->db->join('product_photo_details','product_photo_details.p_id=tbl_products.id');
       $this->db->group_by('product_photo_details.p_id');
       $this->db->order_by('tbl_products.id','desc');
       $this->db->where('sub_category_id',$cat_id);
       $query=$this->db->get();
        //echo $this->db->last_query();die;
       $res=$query->result();
      foreach ($res as $value) {
       $ret_data['product_name']=$value->product_name;
       $ret_data['product_id']=$value->id;
       $ret_data['product_photo']=$value->photo;
       }
      return $ret_data;
  }


 public function get_photo_detail_product_wise_all($pid){
    $this->db->select("*");
    $this->db->from('product_photo_details');
    $this->db->order_by('id','desc');
    $this->db->where('p_id',$pid);
    $this->db->limit(2);
    $query=$this->db->get();
    $res=$query->result();
    return $res;

  }
  public function get_photo_detail_product_wise($pid){
    $this->db->select("*");
    $this->db->from('product_photo_details');
    $this->db->order_by('id','desc');
    $this->db->where('p_id',$pid);
    $this->db->limit(1);
    $query=$this->db->get();
    $res=$query->result();
    return $res;

  }
  public function get_all_product_office_data(){
       $this->db->select("tbl_products.*,product_photo_details.p_id,product_photo_details.photo");
       $this->db->from("tbl_products");
       $this->db->join('product_photo_details','product_photo_details.p_id=tbl_products.id');
       $this->db->group_by('product_photo_details.p_id');
       $this->db->order_by('tbl_products.id','desc');
       $this->db->where('category_id',13);
      $this->db->like('product_photo_details.photo','_1.jpg','before');
       $query=$this->db->get();
       $res=$query->result();
       //print_r($res);die;
      return $res;

    }
    
    public function get_all_personal_data(){
       $this->db->select("tbl_products.*,product_photo_details.p_id,product_photo_details.photo");
       $this->db->from("tbl_products");
       $this->db->join('product_photo_details','product_photo_details.p_id=tbl_products.id');
       $this->db->group_by('product_photo_details.p_id');
       $this->db->order_by('tbl_products.id','desc');
       $this->db->where('category_id',10);
       //$this->db->like('product_photo_details.photo','_1.jpg','before');
       $query=$this->db->get();
       $res=$query->result();
       //print_r($res);die;
      return $res;

    }
   public function save_query_data(){
    //echo"dfjgjg";
    //print_r($_POST);
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mob'];
    $desc=$_POST['desc'];
    $query_type=$_POST['query_type'];
    
    $date=date('Y-m-d h:i:s');
    $insert_data=array('name'=>$name,'email'=>$email,'mobile'=>$mobile,'comment'=>$desc,'created_date'=>$date,'query_type'=>$query_type);
    $msg=$this->db->insert('coporate_query_details',$insert_data);  
        

   } 

public function save_contact_data($insert_data){
    
      print_r($insert_data);
    //$msg=$this->db->insert('tbl_contact',$insert_data);  
        

   } 
public function profile_data_update($POST){
   // print_r($POST);
    $date=date('Y-m-d h:i:s');
    $update_data=array('first_name'=>$POST['first_name'],'email'=>$POST['email'],'phone'=>$POST['mobile_no'],'last_name'=>$POST['last_name'],'modified_date'=>$date,'gender'=>$POST['gender']);
    $this->db->where('customer_id',$POST['cust_id']);
    $msg=$this->db->update('tbl_customers',$update_data); 
    return $msg;
        

   } 

   
 public function get_all_gift_data(){
       $this->db->select("*");
       $this->db->from("coporate_gift_logo");
       $this->db->order_by('id','desc');
       $query=$this->db->get();
       $res=$query->result();
       //print_r($res);die;
      return $res;

    } 
  public function wedding_notebook_data(){
       $this->db->select("tbl_products.*,product_photo_details.p_id,product_photo_details.photo");
       $this->db->from("tbl_products");
       $this->db->join('product_photo_details','product_photo_details.p_id=tbl_products.id');
       $this->db->group_by('product_photo_details.p_id');
       $this->db->order_by('tbl_products.id','desc');
       $this->db->where('category_id',12);
       $query=$this->db->get();
       $res=$query->result();
       //print_r($res);die;
      return $res;

    }  
  public function get_personalizable_product_data(){
       $this->db->select("*");
       $this->db->where("status", '1');
       $this->db->from("tbl_subcategory");
       $this->db->order_by('tbl_subcategory.subcat_id','desc');
       $this->db->where('cat_id',10);
       $query=$this->db->get();
       $res=$query->result();
       //print_r($res);die;
      return $res;

    }
 
public function interest_notebook_data(){
       $this->db->select("*");
       $this->db->from("tbl_subcategory");
       $this->db->order_by('tbl_subcategory.subcat_id','desc');
       $this->db->where('cat_id',11);
       $query=$this->db->get();
       $res=$query->result();
       //print_r($res);die;
      return $res;
    }
 public function get_product_image_data($pid){
       $this->db->select("*");
       $this->db->where('p_id',$pid);
       $this->db->from("product_photo_details");
       $query=$this->db->get();
       $res=$query->result();
       return $res;
       }  
    public function get_mother_product_data($cat_id,$scat_id){
       $this->db->select("tbl_products.*,product_photo_details.p_id,product_photo_details.photo");
       $this->db->from("tbl_products");
       $this->db->join('product_photo_details','product_photo_details.p_id=tbl_products.id');
       $this->db->group_by('product_photo_details.p_id');
       $this->db->order_by('tbl_products.id','desc');
       $this->db->where('category_id',$cat_id);
       $this->db->where('sub_category_id',$scat_id);
       $query=$this->db->get();
       $res=$query->result();
       //print_r($res);die;
      return $res;

    }
     public function get_product_single_data($pid){
       $this->db->select("*");
       $this->db->where('id',$pid);
       $this->db->from("product_details");
       $query=$this->db->get();
       //echo $this->db->last_query();die;
       $res=$query->row();
       //print_r($res);die;
      return $res;

    } 
 public function get_single_product_customizesd_details($pid){
       $this->db->select("*");
       $this->db->where('p_id',$pid);
       $this->db->order_by('id','desc');
       $this->db->from("custom_product_details");
       $query=$this->db->get();
       //echo $this->db->last_query();die;
       $res=$query->row();
       //print_r($res);die;
      return $res;

    } 

   public function get_single_product_details($pid){
       $this->db->select("tbl_products.id,tbl_products.sku_id,tbl_products.product_name,tbl_products.product_price,group_concat(product_photo_details.photo) as product_image");
       $this->db->from("tbl_products");
       $this->db->join('product_photo_details','product_photo_details.p_id=tbl_products.id');
       $this->db->group_by('product_photo_details.p_id');
       $this->db->order_by('product_photo_details.id','desc');
       $this->db->where('tbl_products.id',$pid);
       $this->db->limit(4);
       $query=$this->db->get();
       //echo $this->db->last_query();die;
       $res=$query->result();
       //print_r($res);die;
       $img=explode(',',$res[0]->product_image);
       $imgcnt= count($img);
       for ($i=0; $i < $imgcnt; $i++) { 
          $imgarr[]=$img[$i];
       }
       
       //echo count($img);
      
         # code...
       
       foreach ($res as $value) {
        $product_name=$value->product_name;
        $product_id=$value->id;
        $product_price=$value->product_price;
        $sku_id=$value->sku_id;
         # code...
       }
     
       //$res_data=array('product_name'=>$product_name);
        $imgarr=array_unique($imgarr);
        //print_r($imgarr);die;
        $result_data2=array((object)array('SKU id'=>$sku_id,'product_id'=>$product_id,'product_name'=>$product_name,'product_price'=>$product_price,'image'=>$imgarr));
      //print_r($result_data2);  die;
      return $result_data2;

    }
    public function get_single_product_sprial_details($pid){
     //   $this->db->select("tbl_products.*,product_spiral_photo_details.id as photo_id,product_spiral_photo_details.photo");
     //   $this->db->from("tbl_products");
     //   $this->db->join('product_spiral_photo_details','product_spiral_photo_details.p_id=tbl_products.id');
     //   $this->db->order_by('product_spiral_photo_details.id','asc');
     //   $this->db->where('tbl_products.id',$pid);
     //   //$this->db->limit(1);
     //   $query=$this->db->get();
     //   //echo $this->db->last_query();
     //   $res=$query->result();
     // // print_r($res);die;
     //  return $res;


  $this->db->select("tbl_products.id,tbl_products.sku_id,tbl_products.product_name,tbl_products.product_price,group_concat(product_spiral_photo_details.photo) as product_image");
       $this->db->from("tbl_products");
       $this->db->join('product_spiral_photo_details','product_spiral_photo_details.p_id=tbl_products.id');
       $this->db->group_by('product_spiral_photo_details.p_id');
       $this->db->order_by('product_spiral_photo_details.id','asc');
       $this->db->where('tbl_products.id',$pid);
       $this->db->limit(4);
       //$this->db->limit(1);
       $query=$this->db->get();
       //echo $this->db->last_query();
       $res=$query->result();
       //print_r($res);die;
       $img=explode(',',$res[0]->product_image);
       $imgcnt= count($img);
       for ($i=0; $i < $imgcnt-1; $i++) { 
          $imgarr[]=$img[$i];
       }
       foreach ($res as $value) {
        $product_name=$value->product_name;
        $product_id=$value->id;
        $product_price=$value->product_price;
        $sku_id=$value->sku_id;
       
         # code...
       }
       //$res_data=array('product_name'=>$product_name);
        $result_data2=array((object)array('Sku id'=>$sku_id,'product_id'=>$product_id,'product_name'=>$product_name,'product_price'=>$product_price,'image'=>$imgarr));
      //print_r($result_data2);  die;
      return $result_data2;




    }
    public function save_custom_product_data_without($photo_desc,$file_photo,$pid){
       $date=date('Y-m-d h:i:s');
       $insert_data=array('p_custom_image'=>$file_photo,'created_date'=>$date,'p_desc'=>$photo_desc,'p_id'=>$pid);
       $this->db->insert('custom_product_details',$insert_data); 
      }
    public function save_custom_product_data($photo_desc,$file_photo,$pid){
     $date=date('Y-m-d h:i:s');
     foreach($file_photo as $val){
       $insert_data=array('p_custom_image'=>$val,'created_date'=>$date,'p_desc'=>$photo_desc,'p_id'=>$pid);
       $this->db->insert('custom_product_details',$insert_data); 
     }
  }
}