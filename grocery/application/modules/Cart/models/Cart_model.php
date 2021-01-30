<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends CI_Model{
	
	function login($email,$password){
		    $this -> db -> select(' * ');
            $this -> db -> from('user_detail');
            $this -> db -> where('email', $email);
            $this -> db -> where('password', md5($password));
            $this -> db -> limit(1);
			$query = $this -> db -> get();
			return $query;  		   
		 }
  function coupon_add($cop_code){

  	        //$data=array('status'=>1);
  	        //$this->db->where('coupon_code',$cop_code);
  	        //$this->db->update('tbl_coupan',$data);
               
            $this->db->select("*");
			$this ->db->where('coupon_code', $cop_code);
			$this->db->from("tbl_coupan");
            $query=$this->db->get();
            //echo $this->db->last_query();
            $res=$query->row();
            
           
            if(@$res->status=='0'){
               $data=array('status'=>'1');
  	           $this->db->where('coupon_code',$cop_code);
  	           $res=$this->db->update('tbl_coupan',$data);
  	           unset($_SESSION['coupon_code']);
  	           
              }
              else{
              $this->db->select("*");
			  $this ->db->where('coupon_code', $cop_code);
			  $this->db->from("tbl_coupan");
              $query=$this->db->get();
              $this->db->last_query();
              $res=$query->row();
               
              }
         return $res;
			
        }
}