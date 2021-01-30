<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Property_model extends CI_Model{
	
	function get_property_data(){
         $this->db->select("*");
         $this->db->from("property_details");
         $query=$this->db->get();
         
         $res=$query->result();
         return $res;

	 } 
	 
}