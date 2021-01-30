<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop_model extends CI_Model{
	
   function delete_product_single_data($tab_name,$col_name,$cond_name){
           $this->db->where($col_name,$cond_name);
           $this->db->delete($tab_name);
          // echo $this->db->last_query();
           return true;
 
     }
	 function cat_list(){
         $this->db->select("*");
         $this->db->from("tbl_category");
         $query=$this->db->get();
         //echo $this->db->last_query();
         $res=$query->result();
         return $res;
       } 

     function sub_cat_list($cat_id){
     	 $this->db->select("*");
         $this->db->from("tbl_subcategory");
          $this->db->where('cat_id',$cat_id);
         $query=$this->db->get();
         //echo $this->db->last_query();
         $res=$query->result();
         return $res;
     }
     
	public function save_product_data($insert_data,$upload_file,$upload_spiral_file,$cat_id){
		  $this->db->insert('tbl_products',$insert_data);
		  $insert_id=$this->db->insert_id();
		  $cnt=count($upload_file);
      $cnts=count($upload_spiral_file);
		  for($i=0;$i<$cnt;$i++){
			  $up_file=$upload_file[$i];
			  $date=date('Y-m-d h:i:s');
			  $insert_data=array('p_id'=>$insert_id,'photo'=>$up_file,'created_date'=>$date,'cat_id'=>$cat_id);
			  $msg=$this->db->insert('product_photo_details',$insert_data);  
		    }
       for($i=0;$i<$cnts;$i++){
        $up_file=$upload_spiral_file[$i];
        $date=date('Y-m-d h:i:s');
        $insert_data=array('p_id'=>$insert_id,'photo'=>$up_file,'created_date'=>$date,'cat_id'=>$cat_id);
        $msg=$this->db->insert('product_spiral_photo_details',$insert_data);  
        } 
		   return $msg;
	    }


	  public function update_product_data($e_id,$file_updata,$photo_id,$cat_id){
	  	    if($photo_id[0]!='' && $photo_id[1]!='' &$photo_id[2]!=''){
               // echo"dfgfjgj";
	  	     	$data=implode(',',$photo_id);
	  	     	$ptid=$data;
                //$ptid=substr($data,0,-1);
	  	        $this->db->query("delete from product_photo_details where id in(".$ptid.")");
                 //echo $this->db->last_query();
	  	     }else{ 
            if($photo_id[0]!=''){
            	//echo "0";
                $data=implode(',',$photo_id);
                $ptid=substr($data,0,-2);
	  	        $this->db->query("delete from product_photo_details where id in(".$ptid.")");
                 //echo $this->db->last_query();
	  	     }
          else if($photo_id[1]!=''){
                //echo"1";
	  	     	$data=implode(',',$photo_id);
                $ptid=substr($data,1,2);
	  	        $this->db->query("delete from product_photo_details where id in(".$ptid.")");
                // echo $this->db->last_query();
	  	     }
	  	     else if($photo_id[2]!=''){
                //echo"2";
	  	     	$data=implode(',',$photo_id);
                $ptid=substr($data,2,2);
	  	        $this->db->query("delete from product_photo_details where id in(".$ptid.")");
                 //echo $this->db->last_query();
	  	        }

            }
       
	         
	  	  //echo $this->db->last_query();
	  	 
		 $date=date('Y-m-d h:i:s');
		 foreach($file_updata as $val){
			$insert_data=array('p_id'=>$e_id,'photo'=>$val,'created_date'=>$date,'cat_id'=>$cat_id);
			$this->db->insert('product_photo_details',$insert_data); 
		  }
		
	   } 
   
    public function update_product_sprial_data($e_id,$file_updata,$photo_id,$cat_id){
          //print_r($photo_id);
          if($photo_id[0]!='' && $photo_id[1]!='' &$photo_id[2]!=''){
               // echo"dfgfjgj";
            $data=implode(',',$photo_id);
            $ptid=$data;
                // $ptid=substr($data,0,-1);die;
              $this->db->query("delete from product_spiral_photo_details where id in(".$ptid.")");
                 //echo $this->db->last_query();
           }
           else{ 
            if($photo_id[0]!=''){
              //echo "0";
                $data=implode(',',$photo_id);
                $ptid=substr($data,0,-2);
              $this->db->query("delete from product_spiral_photo_details where id in(".$ptid.")");
                 //echo $this->db->last_query();
           }
          else if($photo_id[1]!=''){
                //echo"1";
            $data=implode(',',$photo_id);
                $ptid=substr($data,1,2);
              $this->db->query("delete from product_spiral_photo_details where id in(".$ptid.")");
                // echo $this->db->last_query();
           }
           else if($photo_id[2]!=''){
                //echo"2";
            $data=implode(',',$photo_id);
                $ptid=substr($data,2,2);
              $this->db->query("delete from product_spiral_photo_details where id in(".$ptid.")");
                 //echo $this->db->last_query();
              }

            }
       
           
        //echo $this->db->last_query();
       
     $date=date('Y-m-d h:i:s');
     foreach($file_updata as $val){
      $insert_data=array('p_id'=>$e_id,'photo'=>$val,'created_date'=>$date,'cat_id'=>$cat_id);
      $this->db->insert('product_spiral_photo_details',$insert_data); 
      }
    
     }     
	public function update_all_product_data($e_id,$update_data){
	  $this->db->where('id',$e_id);

	  $this->db->update('tbl_products',$update_data);
	   
      }
	 public function insert_product_data($e_id,$file_photo,$cat_id){
		 $date=date('Y-m-d h:i:s');
		 foreach($file_photo as $val){
			 $insert_data=array('p_id'=>$e_id,'photo'=>$val,'created_date'=>$date,'cat_id'=>$cat_id);
			 $this->db->insert('product_photo_details',$insert_data); 
		 }
	}
  public function insert_spiral_product_data($e_id,$file_photo,$cat_id){
     $date=date('Y-m-d h:i:s');
     foreach($file_photo as $val){
       $insert_data=array('p_id'=>$e_id,'photo'=>$val,'created_date'=>$date,'cat_id'=>$cat_id);
       $this->db->insert('product_spiral_photo_details',$insert_data); 
     }
  }
	 public function get_all_product_data(){
       $this->db->select("tbl_products.*,product_photo_details.p_id,product_photo_details.photo,tbl_category.cat_name");
       $this->db->where('tbl_products.status','1');
       $this->db->from("tbl_products");
       $this->db->join('product_photo_details','product_photo_details.p_id=tbl_products.id');
       $this->db->join('tbl_category','tbl_category.id=tbl_products.category_id');
       $this->db->group_by('product_photo_details.p_id');
       $this->db->order_by('tbl_products.id','desc');
       $query=$this->db->get();
       //echo $this->db->last_query();die;
       $res=$query->result();
       //print_r($res);die;
      return $res;

	 } 
  public function get_product_image_data($pid){
       $this->db->select("*");
       $this->db->where('p_id',$pid);
       $this->db->from("product_photo_details");
       $this->db->limit(4);
       $query=$this->db->get();
       //echo $this->db->last_query();
       $res=$query->result();
       return $res;
       }  
	 public function get_product_spiral_image_data($pid){
       $this->db->select("*");
       $this->db->where('p_id',$pid);
       $this->db->from("product_spiral_photo_details");
       $this->db->limit(4);
       $query=$this->db->get();

       $res=$query->result();
       return $res;
       } 
     public function get_product_single_data($pid){
       $this->db->select("*");
       $this->db->where('id',$pid);
       $this->db->from("tbl_products");
       $query=$this->db->get();
       //echo $this->db->last_query();die;
       $res=$query->row();
       //print_r($res);die;
       return $res;

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
       $this->db->select("tbl_cart_product.custom_image,tbl_cart_product.page_number,tbl_cart_product.p_image,tbl_cart_product.p_type,tbl_cart_product.product_price as p_price,tbl_cart_product.quantity as product_qty,tbl_products.*,tbl_category.*");
       $this->db->where('product_cart_id',$cart_id);
       $this->db->from("tbl_cart_product");
       $this->db->join('tbl_products','tbl_products.id=tbl_cart_product.product_id');
       $this->db->join('tbl_category','tbl_category.id=tbl_products.category_id');
       //echo $this->db->last_query();die;
       $query=$this->db->get();
       $res=$query->result();
       return $res;

   } 	
	
}