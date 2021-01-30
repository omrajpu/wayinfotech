<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Property_model extends CI_Model{
	
	
	function save_property_data($insert_data){
         $res=$this->db->insert('tbl_category',$insert_data);
         return $res;

	  }
	 function single_sub_cat_list($cat_id,$subcat_id){
     	 $this->db->select("*");
         $this->db->from("tbl_subcategory");
         $this->db->where('cat_id',$cat_id);
         $this->db->where('subcat_id',$subcat_id);
         $query=$this->db->get();
         //echo $this->db->last_query();
         $res=$query->row();
         return $res;
     } 
     function update_sub_cat_data($update_data,$sub_cat_id){
		 $this->db->where('subcat_id',$sub_cat_id);
         $res=$this->db->update('tbl_subcategory',$update_data);
        // echo $this->db->last_query();
         return $res;
     } 
	function update_property_data($update_data,$cat_id){
		//echo"dfgkfg";
         //print_r($update_data);
		//die;
		 $this->db->where('id',$cat_id);
         $res=$this->db->update('tbl_category',$update_data);
        // echo $this->db->last_query();
         return $res;
     }  
    function save_sub_cat_data($insert_data){
         $res=$this->db->insert('tbl_subcategory',$insert_data);
         return $res;

	  }

   function get_booking_enquiry_data(){
         $this->db->select("*");
         $this->db->from("booking_enquiry");
         $query=$this->db->get();
         //echo $this->db->last_query();
         $res=$query->result();
         return $res;

	 }
	 function cat_list(){
         $this->db->select("*");
         $this->db->from("tbl_category");
         $this->db->order_by("id","desc");
         $this->db->where('status','1');
         $query=$this->db->get();
         $res=$query->result();
         return $res;

	 } 
  function single_cat_list($cat_id){
         $this->db->select("*");
         $this->db->from("tbl_category");
         $this->db->where('id',$cat_id);
         $query=$this->db->get();
         //echo $this->db->last_query();
         $res=$query->row();
         return $res;
        } 
   function sub_cat_list(){
         $this->db->select('*');
         $this->db->from('tbl_subcategory');
         $this->db->where('tbl_subcategory.status','1');
         $this->db->join('tbl_category', 'tbl_category.id= tbl_subcategory.cat_id');
         $this->db->order_by('tbl_subcategory.subcat_id','desc');
         $query=$this->db->get();
         //echo $this->db->last_query();
         $res=$query->result();
         return $res;
       } 
	 function get_booking_date($pid){
      $this->db->select("*");
      $this->db->where('p_id',$pid);
      $this->db->from('booking_details');
      $query=$this->db->get();
     // echo $this->db->last_query();
      $res=$query->result();
      return $res;

	}
	 function save_booking_data($insertdata){
            $res=$this->db->insert('booking_details',$insertdata);


	 }
	function get_data($tabel)
	{
		$this->db->order_by('id','desc');
		$this->db->where('status','yes');
		$query=$this->db->get($tabel);
		if($query->num_rows()==' '){
			return false;
		}else{
			 return $query->result();
		}
	}
	function get_hotellist($tabel,$id)
	{
		
		$this->db->where('sub_slug',$id);
		$this->db->where('status','yes');
		$query=$this->db->get($tabel);
		if($query->num_rows()==' '){
			return false;
		}else{
			 return $query->result();
		}
	}
	function get_allhotellist($tabel,$id)
	{
		
		$this->db->where('sub_categoryid',$id);
		$this->db->where('status','yes');
		$this->db->where('admin_approved','Approved');
		$query=$this->db->get($tabel);
		if($query->num_rows()==' '){
			return false;
		}else{
			 return $query->result();
		}
	}
	
	
	function get_hoteldetails($id)
	  {
		$this->db->where('id',$id);
		$this->db->where('status','yes');
		$query=$this->db->get('add_hotels');
		if($query->num_rows()==' '){
			return false;
		}else{
			 return $query->row();
		}

	  }
	function get_hotelroomdetails($id)
	{
		
		$this->db->where('room_hotel_id',$id);
		$this->db->where('admin_approved','Approved');
		$this->db->where('status','yes');
		$query=$this->db->get('tbl_room_extra');
		
		if($query->num_rows()==' '){
			return false;
		}else{
			 return $query->result();
		}

	}

	function get_hotelcategory($tabel,$id)
	{
		$this->db->where('country_slug',$id);
		$query=$this->db->get($tabel);
		if($query->num_rows()==' '){
			return false;
		}else{
			 return $query->row();
		}

	}

	function get_allsubcategory($tabel,$id)
	{
		$this->db->where('country_id',$id);
		$query=$this->db->get($tabel);
		if($query->num_rows()==' '){
			return false;
		}else{
			 return $query->result();
		}

	}
		function hotelreview_image() {
		
        $path = FCPATH . 'uploads/hotel/review/';
			if (!is_dir($path)){
			mkdir($path);         
			}
			
     	 $config = array(
			'allowed_types' => 'jpg|jpeg|gif|png',
			'upload_path' => $path,
			'max_size' => 20000
		);

		$this->load->library('upload', $config);
		$this->upload->do_upload('images');
	    $image_data = $this->upload->data();
		return $names=$image_data['file_name'];
		
	}

   function inser_hotereviwe($table,$data)
	{
          $this->db->insert($table,$data);
    }
	function calenderdatafatch($id)
	{
		$this->db->where('room_id',$id);
		$this->db->where('rate_title','Nonresidential');	
		$query=$this->db->get('room_price_calender');
		if($query->num_rows() ==''){
			return false;
		}else{
			
			return $query->result();
		}		
	}
	
	function calenderdatafatch_resident($id,$resident)
	{

		$this->db->where('room_id',$id);
		$this->db->where('rate_title',$resident);	
		$query=$this->db->get('room_price_calender');
		if($query->num_rows() ==''){
			return '';
		}else{
			return $query->result();
		}		
	}
	
	function get_room_data_byid($id)
	 {
		
		$this->db->where('r_id',$id);
		$query=$this->db->get('tbl_room_extra');
		if($query->num_rows() ==''){
			return false;
		}else{
			return $query->row();
		}
		
		
	}

	function get_room_detilsbooking($roomid)
	{
		$this->db->where('r_id',$roomid);
		$query=$this->db->get('tbl_room_extra');
		if($query->num_rows()==' '){
			return false;
		}else{
			
			return $query->row();
		}
	}
	function get_hotel_detilsbooking($hotelid)
	{
		$this->db->where('id',$hotelid);
		$query=$this->db->get('add_hotels');
		if($query->num_rows()==' '){
			return false;
		}else{
			
			return $query->row();
		}
	}
	function get_roomcategory()
	{
		$this->db->where('type','rctypes');
		$query=$this->db->get('amenities');
		if($query->num_rows()==' '){
			return false;
		}else{
			
			return $query->result();
		}
	}
	
	function get_hotelcountry($id){

		$this->db->where('id',$id);
		$query=$this->db->get('tbl_hotel_categories');
		if($query->num_rows()==' '){
			return false;
		}else{
			
			return $query->row();
		}

	}
	function get_hotelcity($id){

		$this->db->where('id',$id);
		$query=$this->db->get('tbl_hotel_subcategories');
		if($query->num_rows()==' '){
			return false;
		}else{
			
			return $query->row();
		}

	}

	function insert_hotel($data)
	{
		$inserted=$this->db->insert('hotel_booking_list',$data);
		if($inserted){ 
		return	$last_id= $this->db->insert_id();
		
		}else{
			return false;
		}
	}
	function update_package_booking($data,$id)
	{
		$this->db->where('id',$id);
		$this->db->update('hotel_booking_list',$data);
	}
	
	function get_txnid($txnid)
	{
		$this->db->where("transaction_id",$txnid);
		$query=$this->db->get('online_payment_info');
		if($query->num_rows() ==1){
		return	$query->row();
		}else{
		return false;
		}
	}

	function get_booking($id)
	{  
		$this->db->where('payment_id',$id);
		$query=$this->db->get('hotel_booking_list');
		if($query->num_rows() ==1){
			return $query->row();
		}else{
			return false;
		}
	}
	function get_booking_details($r_id)
	{
		
		$this->db->where('booking_ref_id',$r_id);
		$query=$this->db->get('hotel_booking_list');
		if($query->num_rows() ==1){
			return $query->row();
		}else{
			return false;
		}
	}

	function get_hotelreview($id)
	{
		
		$this->db->where('hotel_id',$id);
		//$this->db->limit('5');
		$this->db->where('status','Yes');	
		$query=$this->db->get('hotelreview');
		if($query->num_rows() ==''){
			return '';
		}else{
			
			return $query->result();
		}		
	}
	
	function get_hotel_cancel($id,$data)
	{
		$this->db->where('booking_ref_id',$id);
		$this->db->update('hotel_booking_list',$data);
		return true;
	}

	function get_search_hotel($data){
	     
	   
      
		$this->db->where('status','yes');
		$this->db->like('hotel_name', $data);		
        $this->db->or_like('hotel_location', $data);
        $query=$this->db->get('add_hotels');
	
		if($query->num_rows()==' '){
			return false;
		}else{
			 return $query->result();
		}
		
	}
	
}