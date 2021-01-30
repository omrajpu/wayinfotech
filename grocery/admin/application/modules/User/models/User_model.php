<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{
	  function get_user_data(){
        $this->db->select("*");
         $this->db->from("tbl_customers");
         $this->db->order_by("customer_id","desc");
         $query=$this->db->get();
         $res=$query->result();

         //echo $this->db->last_query();die;
         return $res;
  } 
  public function get_all_shopping_orders($user_id=0){

       //$date=CURDATE();
       $this->db->select("*");
       // $this->db->where(date('tbl_checkout.order_date'),$date);
       $this->db->where('date_format(tbl_checkout.order_date,"%Y-%m-%d")', 'CURDATE()', FALSE);
       $this->db->from("tbl_checkout");
       $this->db->order_by('tbl_checkout.checkout_id','desc');

       $query=$this->db->get();
       //echo $this->db->last_query();
       $res=$query->result();
       return $res;

   }
  public function get_all_shopping_total_orders($user_id=0){

       //$date=CURDATE();
       $this->db->select("*");
       // $this->db->where(date('tbl_checkout.order_date'),$date);
       //$this->db->where('date_format(tbl_checkout.order_date,"%Y-%m-%d")', 'CURDATE()', FALSE);
       $this->db->from("tbl_checkout");
       $this->db->order_by('tbl_checkout.checkout_id','desc');

       $query=$this->db->get();
       //echo $this->db->last_query();
       $res=$query->result();
       return $res;

   }


	function login($email,$password){
		        $this -> db -> select(' * ');
            $this -> db -> from('user_detail');
            $this -> db -> where('email', $email);
            $this -> db -> where('password', md5($password));
            $this -> db -> limit(1);
			$query = $this -> db -> get();
			//echo $this->db->last_query();
			//exit;
			return $query;  		   
		 }
  function get_admin_data($user_id){
            $this -> db -> from('user_detail');
            $this -> db -> where('id', $user_id);
            $this -> db -> limit(1);
			$query = $this -> db -> get();
			//echo $this->db->last_query();
			//exit;
			$row=$query->row();
			return $row;  		   

  }	
  function update_user_data($data,$user_id){
  	$this->db->where('id',$user_id);
  	$res=$this->db->update('user_detail',$data);
  	return $res;
  }
	
}