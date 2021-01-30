<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_menu_data'))
{
    function get_menu_data(){
    	   $CI =& get_instance();
           $CI->db->select("*");
           $CI->db->where('status','1');
	       $CI->db->from("tbl_category");
	       $query=$CI->db->get();
	       $res=$query->result();
         // echo $CI->db->last_query();
           return $res;
	      
 
     }  


}

 function get_sub_cat($cat_id){
      $CI =& get_instance();
           $CI->db->select("*");
           $CI->db->where('cat_id',$cat_id);
           $CI->db->from("sub_category_details");
           $query=$CI->db->get();
           $res=$query->result();
         // echo $CI->db->last_query();
           return $res;
 }
 function get_child_cat($cat_id,$sub_cat_id){
           $CI =& get_instance();
           $CI->db->select("*");
           $CI->db->where('cat_id',$cat_id);
           $CI->db->where('sub_cat_id',$sub_cat_id);
           $CI->db->from("sub_child_category_details");
           $query=$CI->db->get();
           $res=$query->result();
         // echo $CI->db->last_query();
           return $res;
         } 