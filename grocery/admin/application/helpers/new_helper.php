<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('delete_product_single_data'))
{
   function delete_product_single_data($tab_name,$col_name,$cond_name){
      
          $data = array(
               'status' => 0,
              );
           $CI =& get_instance();
           $CI->db->where($col_name,$cond_name);
           $CI->db->update($tab_name,$data);
           echo $CI->db->last_query();
           return true;
 
     }

function getParentChildCatgeory($id=NULL){
if(!empty($id)){
    $CI =& get_instance();
    $CI->db->select('parent_id');
    $CI->db->from('tbl_blog');;
    $CI->db->where('id',$id);
    $pr=$CI->db->get()->row();
    if(empty($pr->parent_id)){
       
       $str ="Blog Sub Category";

    }else{
        
      $str ="Blogs";

    }
  }else{

    $str ="Blog Category";

  }
  return $str;
}

function getname($id,$table,$colum){

  $CI = &get_instance();
  $CI->db->select($colum);
  $CI->db->from($table);
  $CI->db->where('id',$id);
  $exce=$CI->db->get();
if($exce->num_rows()>0){
     $result=$exce->row();
     return $result->$colum;
  }else{

    return "";
  }

}

function get_att($cat_id){
   
  //$CI->load->model('Product_model');
  //$attr_ids=explode();
  $CI = &get_instance();

  $CI->db->select('*');
  $CI->db->from('tbl_attribute_category_relation');
  $CI->db->where('cat_id',$cat_id);
  //$CI->db->order_by('tbl_attribute_category_relation.id','asc');
  $exce=$CI->db->get();
  //echo $CI->db->last_query();die;
  $result=$exce->result();
  $finalAttr=array();
  if($exce->num_rows()>0){
        
    foreach($result as $b){

      $finalAttr[]=$b->attr_id;
      
    }
      
}
//print_r($finalAttr);
if(!empty($finalAttr)){
$res = $CI->Product_model->get_att(@$finalAttr); 
return implode(', ',array_map(function ($entry) {
  return @$entry->attribute_name;
}, $res));
//print_r($res);
     
}
}
function displaystreamlink($LocationID)
{
  $CI = &get_instance();
  if($LocationID){
  
    $last="false";
    $LocID;
    $LocName;
    $i=0;
    $k=0;
    while(true)
    {
      $destinations_query = $CI->db->query("select c.id, c.title, c.parent_id from tbl_blog c where c.id = '" . (int)$LocationID . "'");

      foreach($destinations_query->result() as $t_link)
      {
        $LocID[$i] = site_url('Productmaster/manage_blogs?parent_id='.$t_link->id);	//"index.php?cPath=".$t_link->categories_id;
        $LocName[$i]=$t_link->title;
        $LocationID=$t_link->parent_id;
        $i=$i+1;
      }
      if ($LocationID==0)
      {
        break;
      }
    }
    echo '<a class="paging_nav" href="'.site_url("Productmaster/manage_blogs").'">Blog Category </a>&nbsp;&nbsp;&raquo;&nbsp;&nbsp;';
    for($k=sizeof($LocName)-1;$k>=0;$k--)
    {
      if ($k!=0)
      {
        echo("<a class='paging_nav' href=$LocID[$k]>$LocName[$k]</a>");
        echo("&nbsp;&nbsp;&raquo;&nbsp;&nbsp;");
      }
      else
      {
        if ($last=="false")
        {	
          echo("$LocName[$k]<br>");
        }
        else
        {
          echo("<a href=$LocID[$k]>$LocName[$k]</a>");
        }
      }
    }
  }else{

    echo 'Blog category';
  }
  
}
function Get_Productgallery_details($product_id)
{
  //echo "test"; die; 
    $CI = &get_instance();
    $CI->load->model('Product_model');
    $result = $CI->Product_model->get_product_gallery_details($product_id);  
    return $result; 
}  
function Get_attribute_details($product_id)
{
  //echo "test"; die; 
    $CI = &get_instance();
    $CI->load->model('Product_model');
    $result = $CI->Product_model->get_attribute_details($product_id); 
    //echo'<pre>';print_r($result); 
    return $result; 
} 
function Get_attribute_image_details($attr_id)
{
  //echo "test"; die; 
    $CI = &get_instance();
    $CI->load->model('Product_model');
    $result = $CI->Product_model->Get_attribute_image_details($attr_id);  
    return $result; 
}

  function printarray($value){
  echo '<pre>';
  print_r($value);
  echo '</pre>';
  }

  
}

