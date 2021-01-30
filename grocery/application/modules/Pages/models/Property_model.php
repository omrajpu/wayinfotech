<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Property_model extends CI_Model{
	
	
	 function save_enquiry($data){
      $res=$this->db->insert('booking_enquiry',$data);
      return $res;


    }
	 function get_property_data(){
         $this->db->select("*");
         $this->db->from("property_details");
         $query=$this->db->get();
         
         $res=$query->result();
         return $res;

	 } 
	 function get_property_single_data($pid){
         $this->db->select("*");
         $this->db->where('id',$pid);
         $this->db->from("property_details");
         $query=$this->db->get();
         $res=$query->row();
         return $res;

	 } 
	 function get_booking_date($pid){
      $this->db->select("*");
      $this->db->where('p_id',$pid);
      $this->db->from('booking_details');
      $query=$this->db->get();
      //echo $this->db->last_query();
      $res=$query->result();
      return $res;

	}
	 
	
}