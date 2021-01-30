<?php

class Checkout_model extends CI_Model
 {

	function __construct() {

        // Call the Model constructor

        parent::__construct();

      }
function update_customer_data($user_id,$postdata){
      $this -> db -> where('id', $user_id);
      $res=$this->db->update('delivery_boy_signup',$postdata);
     //echo $this->db->last_query();die;
      return $res;
      } 
 function save_suggestion_data($insert_data){
      //print_r($insert_data);die;
      $res=$this->db->insert('fp_suggestion',$insert_data);
      return $res;
      //echo $this->db->last_query();
     }        
function update_user_checkout_data($update_data,$address_edit_id,$user_id){
      $this -> db -> where('fp_customer_address.custid', $user_id);
       $this -> db -> where('fp_customer_address.id', $address_edit_id);
      $res=$this->db->update('fp_customer_address',$update_data);
     //echo $this->db->last_query();die;
      return $res;
      }
public function delete_user_checkout_data($address_delete_id,$user_id){
     //$this -> db -> where('fp_customer_address.custid', $user_id);
     $this -> db -> where('fp_customer_address.id', $address_delete_id);
     $this -> db -> delete('fp_customer_address');
     // echo $this->db->last_query();die;
}      
function check_user_exist($user_id,$old_pass){
            $this -> db -> select(' * ');
            $this -> db -> from('fp_customer');
            $this -> db -> where('id', $user_id);
            $this -> db -> where('password', $old_pass);
            $this -> db -> limit(1);
            $query = $this -> db -> get();
            //echo $this->db->last_query();
            $res=$query->num_rows();
           return $res;            
        }      
function update_password($user_id,$postdata){
      $this -> db -> where('id', $user_id);
      $res=$this->db->update('fp_customer',$postdata);
     //echo $this->db->last_query();die;
      return $res;
 }      
public function checkTableData($table){
		$query = $this->db->get($table);
		return $query->num_rows();

	}
public function LastOrderId(){
		$query = $this->db->query("SELECT id,orderid FROM fp_order ORDER BY id DESC LIMIT 0,1");
		return $query->row_array();
	}	
   public function checkDataById($table,$whereAssoc){
    $this->db->where($whereAssoc);
    $query = $this->db->get($table);
    return $query->num_rows();
  }  
  public function getSignleRow($table,$whereAssoc){
     $this->db->where($whereAssoc);
     $query = $this->db->get($table);
     return $query->row();
  } 
  public function countOffer($cdt,$pid,$kid){
    $query = $this->db->query("SELECT * FROM `fp_special_offer` WHERE (STR_TO_DATE(offer_dt_tm,'%Y-%m-%d %H:%i:%s')>=STR_TO_DATE('$cdt','%Y-%m-%d %H:%i:%s') AND status='1') AND (pid='$pid' AND pvs_id='$kid')");
    return $query->num_rows();
  }
  public function OfferRow($cdt,$pid,$kid){
    $query = $this->db->query("SELECT * FROM `fp_special_offer` WHERE (STR_TO_DATE(offer_dt_tm,'%Y-%m-%d %H:%i:%s')>=STR_TO_DATE('$cdt','%Y-%m-%d %H:%i:%s') AND status='1') AND (pid='$pid' AND pvs_id='$kid')");
    return $query->row_array();
  }
  public function getPVairant_value($pid,$val_id){
    $query = $this->db->query("SELECT v.id,v.pid,v.variant,l.vname,p.product_name,p.purl FROM `fp_product_variant` as v INNER JOIN fp_products as p ON v.pid=p.id INNER JOIN fp_variant_val as l ON v.variant_val=l.id WHERE (v.pid='$pid' and l.id='$val_id')");
    return $query->result();
  }
  public function cartVariantNames($vins,$lins){
    $query = $this->db->query("SELECT v.name,l.vname FROM `fp_variant` as v INNER JOIN fp_variant_val as l ON v.id=l.vid WHERE v.id IN($vins) AND l.id IN($lins)");
    return $query->result();
  }
  public function getColorList($color){
    $query = $this->db->query("SELECT l.id,l.vid,l.vname FROM `fp_variant` as v INNER JOIN fp_variant_val as l ON v.id=l.vid WHERE (v.name LIKE '%$color%' AND v.status='1' AND l.status='1') GROUP BY l.vname ORDER BY l.id");
    return $query->result_array();
  }
  public function chkProductColor($colorid){
    $querys = "SELECT p.id as pid,k.id as kid FROM fp_products as p INNER JOIN fp_product_variant_sku as k ON p.id=k.pid WHERE p.status='1' AND k.variants_val like '%$colorid%'";
      $query = $this->db->query($querys);
      return $query->num_rows();
  } 
  function get_state(){
   	        $this -> db -> select(' * ');
            $this -> db -> from('states');
            $this -> db -> where('country_id', 101);
            $query = $this -> db -> get();
		    $res=$query->result();
		    return $res;  		   
	      }       
function get_city_data($st_id){
   	        $this -> db -> select(' * ');
            $this -> db -> from('cities');
            $this -> db -> where('state_id', $st_id);
            $query = $this -> db -> get();
		    $res=$query->result();
		    return $res;  		   
	      }
        
     function save_customer_data($insert_data){
     	//print_r($insert_data);die;
     	$res=$this->db->insert('delivery_boy_signup',$insert_data);
     	return $res;
     	//echo $this->db->last_query();
     }
      function save_user_checkout_data($insert_data){
     	//print_r($insert_data);die;
     	$res=$this->db->insert('fp_customer_address',$insert_data);
     	return $res;
     	echo $this->db->last_query();
     }
function login($email,$password){
		  
			$query = $this->db->query("SELECT * FROM `delivery_boy_signup` WHERE `email` = '$email' AND `password` = '$password' LIMIT 1");
			 //echo $this->db->last_query();die;
			return $query;
 
		 }
   function check_reg_user($email){
   	        $this -> db -> select(' * ');
            $this -> db -> from('delivery_boy_signup');
            $this -> db -> where('email', $email);
           // $this->db->or_where('mobile', $email);
            $this -> db -> limit(1);
            $query = $this -> db -> get();
            //echo $this->db->last_query();
		    $res=$query->row();
		   return $res;  		   
	    }
      function check_reg_fb_user($fb_user_id){
   	        $this -> db -> select(' * ');
            $this -> db -> from('fp_customer');
            $this -> db -> where('fb_user_id', $fb_user_id);
           // $this->db->or_where('mobile', $email);
            $this -> db -> limit(1);
            $query = $this -> db -> get();
            //echo $this->db->last_query();
		    $res=$query->row();
		   return $res;  		   
	    } 
      function check_user_email_activecode_exist($customer_id,$active_code){
            $this -> db -> select(' * ');
            $this -> db -> from('fp_customer');
            $this -> db -> where('id', $customer_id);
            $this -> db -> where('active_code', $active_code);
            $this -> db -> limit(1);
            $query = $this -> db -> get();
            //echo $this->db->last_query();
        $res=$query->row();
       return $res;        
      }   
     function get_customer_data($cust_id){
   	        $this -> db -> select(' * ');
            $this -> db -> from('tbl_customers');
            $this -> db -> where('customer_id', $cust_id);
            $this -> db -> limit(1);
            $query = $this -> db -> get();
		    $res=$query->row();
		   return $res;  		   
	    }	    
	 

       function insert_payment_details($insert_data){

        $this->db->insert('orders',$insert_data);
        $last_insert_id= $this->db->insert_id();
        return $last_insert_id;
        }

       function addcheckout($country,$city,$province,$postcode,$add1,$fname,$phone,$email,$uid)
          {

            $this->db->set('country',$country);
        	$this->db->set('city',$city);
         	$this->db->set('province','test');

		   $this->db->set('postcode',$postcode);
           $this->db->set('province',$province);
            $this->db->set('address1',$add1);
            $this->db->set('address2','noida');
             $this->db->set('firstname',$fname);
            $this->db->set('lastname','singh');

			 $this->db->set('phone',$phone);
             $this->db->set('payment_option','cash');
			  $this->db->set('email',$email);

			   $this->db->set('customer_id',$uid);

			    $this->db->set('order_date',date('Y-m-d H:i:s'));

            //$this->db->set('buyer_name','test');

           $this->db->set('sale_id','0');

				 //$this->db->where('customer_id',$uid);

          		 $this->db->insert('tbl_checkout');              

        

        }

		function addpayment($payment,$in,$uid)

        {

            

           

				   $this->db->set('payment_option',$payment);

				   $this->db->where('checkout_id',$in);

				   //$this->db->where('customer_id',$uid);

          		   $this->db->update('tbl_checkout');              

        

        }

		function addcheckoutcart($cid,$in,$uid)

        {

            

            

                                $this->db->set('sale_id',$cid);
                                
                                $this->db->where('checkout_id',$in);

                                //$this->db->where('customer_id',$uid);

                                $this->db->update('tbl_checkout');              

        

        }

		public function get_countries()

		{

			$this->db->from("tbl_countries");

			$query = $this->db->get();

			return $query->result();

		}

		public function get_city()

		{

			$this->db->from("tbl_cities");

			$query = $this->db->get();

			return $query->result();

		}

		function getcartdata($uid)

		{

			//$query = $this->db->select('tbl_cart.*,tbl_cart_product.*,tbl_products.product_code');
			$query = $this->db->select('tbl_cart.*,tbl_cart_product.*');

			$query = $this->db->from('tbl_cart');

			$query= $this->db->join('tbl_cart_product','tbl_cart.cart_id = tbl_cart_product.product_cart_id');

			//$query= $this->db->join('product_details','product_details.id = tbl_cart_product.product_id');

			$query = $this->db->where('tbl_cart.userid',$uid);

			$query = $this->db->where('tbl_cart.is_shipped',0);

			$query = $this->db->get();

			

			return $query->result();

		}

		

		function addsale($byname,$total1,$createby,$qu)

        {

            

            

            $this->db->set('buyer_name','test');

			$this->db->set('grand_amount',$total1);

			$this->db->set('created_by',$createby);

			$this->db->set('issue_date',date('Y-m-d'));

			$this->db->set('total_quantity',$qu);

		   	$this->db->set('status','active');

		   	$this->db->set('cash_discount','0');
            $this->db->set('description','test');
            $date=date('Y-m-d H:i:s');
             $this->db->set('shipped_status',1);
           $this->db->set('due_date',$date);
            

			$this->db->insert('tbl_sales');              

        

        }

        function addsaledetail($insert,$select4)

        {

                $this->db->set('sale_id',$insert);

                $this->db->set('product_code','123');
                $this->db->set('selling_rate','123');
                $this->db->set('discount','123');
                

                $this->db->set('quantity',$select4->quantity);

                $this->db->set('color_id',$select4->color_id);

                $this->db->set('size_id',$select4->size_id);

                $this->db->set('product_price',$select4->product_price);

                $this->db->insert('tbl_sales_detail');   

        }

		function insertcart($total_cart)

        {

            

            	$userid	= $this->session->userdata('userid');

				 $this->db->set('created_date',date('Y-m-d'));

				$this->db->set('userid',$userid);

				$this->db->set('total_cart',$total_cart);

				$this->db->insert('tbl_cart');     

			

			

        

        }
		function insertcartproductdetail($insert_id,$pid,$price,$qty,$ip,$color,$size)

        {

                                $this->db->set('product_cart_id',$insert_id);

                                $this->db->set('product_id',$pid);

                                $this->db->set('product_price',$price);

                                $this->db->set('quantity',$qty);

                                $this->db->set('ip',$ip);

                                $this->db->set('color_id','12');

                                $this->db->set('size_id','5');

                                $this->db->insert('tbl_cart_product');  

        }

		

		

}