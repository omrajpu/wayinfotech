<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shopping_model extends CI_Model{
	
	public function get_all_product_data(){
       $this->db->select("tbl_products.*,product_photo_details.p_id,product_photo_details.photo");
       $this->db->where('tbl_products.status','1');
       $this->db->from("tbl_products");
       $this->db->join('product_photo_details','product_photo_details.p_id=tbl_products.id');
       $this->db->group_by('product_photo_details.p_id');
       $this->db->order_by('product_photo_details.id','asc');
       //$this->db->order_by('tbl_products.id','desc');
       $this->db->where('category_id',9);
      // $this->db->like('product_photo_details.photo','_1.jpg','before');
       $query=$this->db->get();
       $res=$query->result();
       //print_r($res);die;
      return $res;
      

    }
  public function get_search_data($search_text){
      echo"fdghgfh"; 

   }
   public function get_all_shopping_orders(){
       $this->db->select("*");
       $this->db->from("tbl_checkout");
       $this->db->order_by('tbl_checkout.checkout_id','desc');
       $query=$this->db->get();
       $res=$query->result();
       return $res;

   }  
    
  public function get_product_details($cart_id){
       $this->db->select("tbl_cart_product.winprice,tbl_cart_product.win_image,tbl_cart_product.custom_image,tbl_cart_product.page_number,tbl_cart_product.p_image,tbl_cart_product.p_type,tbl_cart_product.product_price as p_price,tbl_cart_product.quantity as product_qty,tbl_products.*,category_details.*");
       $this->db->where('product_cart_id',$cart_id);
       $this->db->from("tbl_cart_product");
       $this->db->join('tbl_products','tbl_products.id=tbl_cart_product.product_id');
       $this->db->join('category_details','category_details.id=tbl_products.cat_id');
       //echo $this->db->last_query();die;
       $query=$this->db->get();
       $res=$query->result();
       return $res;

   }  
  public function get_order_customer_data($cust_id){
  $this->db->select("*");
  $this->db->where("customer_id",$cust_id);
  $this->db->from("tbl_checkout");
  $this->db->order_by("tbl_checkout.checkout_id",'desc');
  $query=$this->db->get();
  //echo $this->db->last_query();die;
  $res=$query->result();
  return $res;

}
// public function get_product_details($cart_id){
//        $this->db->select("tbl_products.*,tbl_cart_product.*");
//        $this->db->where('product_cart_id',$cart_id);
//        $this->db->from("tbl_cart_product");
//        $this->db->join('tbl_products','tbl_products.id=tbl_cart_product.product_id');
//        //$this->db->join('product_weight_price','product_weight_price.product_id=tbl_cart_product.product_id');
//        $this->db->join('tbl_checkout','tbl_checkout.sale_id=tbl_cart_product.product_cart_id');
//        //$this->db->join('tbl_category','tbl_category.id=tbl_products.category_id');
//        $query=$this->db->get();
//         //echo $this->db->last_query();die;
//        $res=$query->result();
//        return $res;

//    }
  
  public function get_checkout_details($checkout_id){
            $this -> db -> select(' * ');
            $this -> db -> from('tbl_checkout');
            $this -> db -> where('checkout_id', $checkout_id);
            $query = $this -> db -> get();
            //echo $this->db->last_query();die;
            $res=$query->result();
            return $res;           
          }
  public function update_checkout_details($checkout_id,$order_statu){
             $this -> db -> where('checkout_id', $checkout_id);
             $data=array('order_status'=>$order_statu);
             $this->db->update('tbl_checkout',$data);
             //$query = $this -> db -> get();
            //echo $this->db->last_query();die;
             //$res=$query->result();
             //return $res;           
          } 
 


 public function get_single_product_sprial_details($pid){
       $this->db->select("tbl_products.*,product_spiral_photo_details.id as photo_id,product_spiral_photo_details.photo");
       $this->db->from("tbl_products");
       $this->db->join('product_spiral_photo_details','product_spiral_photo_details.p_id=tbl_products.id');
       $this->db->order_by('product_spiral_photo_details.id','desc');
       $this->db->where('tbl_products.id',$pid);
       $this->db->limit(4);
       $query=$this->db->get();
       //echo $this->db->last_query();
       $res=$query->result();
     // print_r($res);die;
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
       //echo'<pre>';print_r($res);die;
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
public function billing_address($uid){
       $this->db->select("*");
       $this->db->where('tbl_checkout.customer_id',$uid);
       $this->db->from("tbl_checkout");
       $this->db->join("tbl_customers",'tbl_customers.customer_id=tbl_checkout.customer_id');
       $this->db->order_by('tbl_checkout.checkout_id','desc');
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
       $this->db->select("tbl_products.*,product_photo_details.p_id,product_photo_details.photo");
       $this->db->from("tbl_products");
       $this->db->join('product_photo_details','product_photo_details.p_id=tbl_products.id');
       $this->db->group_by('product_photo_details.p_id');
       $this->db->order_by('tbl_products.id','desc');
       $this->db->where('category_id',$cat_id);

       //$this->db->like('product_photo_details.photo','_1.jpg','before');
       $query=$this->db->get();
        //echo $this->db->last_query();die;
       $res=$query->result();
       //echo'<pre>';print_r($res);die;
      return $res;
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
 /* public function get_all_product_office_data(){
       $this->db->select("tbl_products.*,product_photo_details.p_id,product_photo_details.photo");
       $this->db->from("tbl_products");
       $this->db->join('product_photo_details','product_photo_details.p_id=tbl_products.id');
       $this->db->group_by('product_photo_details.p_id');
       $this->db->order_by('tbl_products.id','desc');
       $this->db->where('category_id',10);
       $this->db->where('sub_category_id',36);
       $this->db->like('product_photo_details.photo','_1.jpg','before');
       $query=$this->db->get();
       $res=$query->result();
       //print_r($res);die;
      return $res;

    }*/
    public function get_all_product_office_data(){
       $this->db->select("tbl_products.*,product_photo_details.p_id,product_photo_details.photo");
       $this->db->where('tbl_products.status','1');
       $this->db->from("tbl_products");
       $this->db->join('product_photo_details','product_photo_details.p_id=tbl_products.id');
       $this->db->group_by('product_photo_details.p_id');
       $this->db->order_by('product_photo_details.id','asc');
       //$this->db->order_by('tbl_products.id','desc');
       $this->db->where('category_id',13);
      // $this->db->like('product_photo_details.photo','_1.jpg','before');
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
    
        $to = "info@aamku.com";
        $subject = "Contact details";

$message = "
<html>

<body>
<table style='border-collapse:'>
  <tbody>
    <tr>
    <td style='background: #1da1f2; color: white; padding: 6px; border: 1px solid #ccc; text-align: left; font-size: 14px;'>Name</td>
      <td style='padding: 6px; border: 1px solid #ccc; text-align: left; font-size: 14px;'>".$name."</td>
      </tr>
      <tr>
      <td style='background: #1da1f2; color: white; padding: 6px; border: 1px solid #ccc; text-align: left; font-size: 14px;'>Email</td>
      <td style='padding: 6px; border: 1px solid #ccc; text-align: left; font-size: 14px;'>".$email."</td>
      </tr>
      <tr>
      <td style='background: #1da1f2; color: white; padding: 6px; border: 1px solid #ccc; text-align: left; font-size: 14px;'>Mobile</td>
      <td style='padding: 6px; border: 1px solid #ccc; text-align: left; font-size: 14px;'>".$mobile."</td>
    </tr>
    <tr>
    <td style='background: #1da1f2; color: white; padding: 6px; border: 1px solid #ccc; text-align: left; font-size: 14px;'>Message</td>
    <td style='padding: 6px; border: 1px solid #ccc; text-align: left; font-size: 14px;'>".$desc."</td>
    </tr>
    <tr>
      <td style='background: #1da1f2; color: white; padding: 6px; border: 1px solid #ccc; text-align: left; font-size: 14px;'>Query Type</td>
      <td style='padding: 6px; border: 1px solid #ccc; text-align: left; font-size: 14px;'>".$query_type."</td>
    </tr>
  </tbody>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <webmaster@example.com>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);
    
        

   } 

public function save_contact_data($insert_data){
    
    //   print_r($insert_data);
    $msg=$this->db->insert('tbl_contact',$insert_data);  
        

   } 
public function profile_data_update($POST,$profile_pic){
   // print_r($POST);
  if($profile_pic!=''){
    $date=date('Y-m-d h:i:s');
    $update_data=array('first_name'=>$POST['first_name'],'email'=>$POST['email'],'phone'=>$POST['mobile_no'],'last_name'=>$POST['last_name'],'created_date'=>$date,'photo'=>$profile_pic);
    $this->db->where('customer_id',$POST['cust_id']);
    $msg=$this->db->update('tbl_customers',$update_data); 
    return $msg;
    }else{
    $date=date('Y-m-d h:i:s');
    $update_data=array('first_name'=>$POST['first_name'],'email'=>$POST['email'],'phone'=>$POST['mobile_no'],'last_name'=>$POST['last_name'],'created_date'=>$date);
    $this->db->where('customer_id',$POST['cust_id']);
    $msg=$this->db->update('tbl_customers',$update_data); 
    return $msg;

    }    

   } 

 public function billing_data_update($POST){
    //print_r($POST);die;
    $date=date('Y-m-d h:i:s');
    $update_data=array('firstname'=>$POST['firstname'],'email'=>$POST['email'],'phone'=>$POST['phone'],'country'=>$POST['country'],'order_date'=>$date,'city'=>$POST['city'],'postcode'=>$POST['postcode'],'address1'=>$_POST['address1']);
    $this->db->where('customer_id',$POST['cust_id']);
    $msg=$this->db->update('tbl_checkout',$update_data); 
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
       $this->db->select("tbl_products.*,product_photo_details.id as photo_id,product_photo_details.photo");
       $this->db->from("tbl_products");
       $this->db->join('product_photo_details','product_photo_details.p_id=tbl_products.id');
       $this->db->order_by('product_photo_details.id','desc');
       $this->db->where('tbl_products.id',$pid);
       $this->db->limit(4);
       $query=$this->db->get();
       //echo $this->db->last_query();die;
       $res=$query->result();
     // print_r($res);die;
      return $res;

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
public function set_recent_view_product($pid,$product_data,$ip,$user_agent){

  //echo'<pre>'; print_r($product_data);die;
  //$agent_data=explode('/', $user_agent);
 // print_r($agent_data);
  if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== false) {
 $agent_data='Chrome';
 }else{
 $agent_data='Firefox';
 }
  $pro_id=$product_data->id;
  $product_name=$product_data->product_name;
  $product_description=$product_data->product_description;
  $product_price=$product_data->product_price;
  $product_image=$product_data->photo;
  $category_id=$product_data->category_id;
  $sub_category_id=$product_data->sub_category_id;
  $sku_no=$product_data->sku_id;
  $date=date('Y-m-d h:i:s');
  $insert_data=array('agent'=>$agent_data,
                     'ip'=>$ip,
                     'pro_id'=>$pro_id,
                     'product_name'=>$product_name,
                     'product_description'=>$product_description,
                     'product_price'=>$product_price,
                     'product_type'=>'Slim',
                     'product_image'=>$product_image,
                     'quantity'=>1,
                     'category_id'=>$category_id,
                     'sub_category_id'=>$sub_category_id,
                     'sku_no'=>$sku_no,
                     'created_date'=>$date
                     );
//echo $this->db->last_query();
$this->db->insert('recent_view_details',$insert_data);
}

public function recent_product_data($pid,$ip,$user_agent,$date){
       if(strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') !== false) {
        $agent_data='Chrome';
       }else{
       $agent_data='Firefox';
       }
       $this->db->select("*");
       $this->db->where('ip',$ip);
       $this->db->where('agent',$agent_data);
       $this->db->where('created_date>=',$date);
       $this->db->where('pro_id!=',$pid);
       $this->db->group_by('recent_view_details.pro_id');
       $this->db->order_by('id','desc');
       $this->db->from("recent_view_details");
       $query=$this->db->get();
      // echo $this->db->last_query();die;
       $res=$query->result();
       //print_r($res);die;
      return $res;
 }
 public function get_serach_result($keyword){

       $this->db->select("tbl_products.*,product_photo_details.p_id,product_photo_details.photo");
       $this->db->where('tbl_products.status','1');
       $this->db->from("tbl_products");
       $this->db->join('product_photo_details','product_photo_details.p_id=tbl_products.id');
       $this->db->group_by('product_photo_details.p_id');
       $this->db->order_by('product_photo_details.id','asc');
       $this->db->like('tbl_products.product_name', $keyword);
       $query=$this->db->get();
       //echo $this->db->last_query();

      //die;
       //$this->db->order_by('tbl_products.id','desc');
       //$this->db->where('category_id',9);
      // $this->db->like('product_photo_details.photo','_1.jpg','before');
       
       $res=$query->result();
       //print_r($res);die;
      return $res;
      

    } 



}