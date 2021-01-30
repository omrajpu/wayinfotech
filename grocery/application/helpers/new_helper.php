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
           //echo $CI->db->last_query();
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
function getcatname($table,$colum){
  $CI = &get_instance();
  $CI->db->select($colum);
  $CI->db->from($table);
  $exce=$CI->db->get();
if($exce->result()){
     $result=$exce->result();
     return $result;
  }else{

    return "";
  }

}

function getsubcatname($table,$colum,$where){

  $CI = &get_instance();
  $CI->db->select($colum);
  $CI->db->where('cat_id',$where);
  $CI->db->from($table);
  $exce=$CI->db->get();
if($exce->result()){
     $result=$exce->result();
     return $result;
  }else{

    return "";
  }

}
function get_variant($pid){
  $CI = &get_instance();
  $CI->db->select("*");
  $CI->db->where('tbl_products.id',$pid);
  $CI->db->from('tbl_products');
  $CI->db->join('tbl_product_attribute','tbl_product_attribute.product_id=tbl_products.id');
  $exce=$CI->db->get();
  //echo $CI->db->last_query();  
if($exce->result()){
     $result=$exce->result();
     return $result;
  }else{

    return "";
  }

}
function get_cart_product($pid,$vid){

                $CI = &get_instance();
                $CI->load->library('cart');
                //echo $vid;
                if($cart =  $CI->cart->contents()){
                 //echo'<pre>';print_r($item);die;
                   foreach ($cart as $item)
                    {
                      //echo'<pre>';print_r($item);
                      $pids=explode('_',$item['id']);
                     // print_r($pid);
                      //echo $pids[1];
                      //echo $pid;
                      if($pids[0]==$pid && $pids[1]==$vid){
                        return $item;
                         //echo'<pre>';print_r($item);
                      }

                   } 
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
    $CI->load->model('Home_model');
    $result = $CI->Home_model->get_product_gallery_details($product_id);  
    return $result; 
}
function Get_Productgallery_related_details($product_id,$att_id)
{
   //echo $att_id;
    
     $CI = &get_instance();
     $CI->load->model('Shopping_model');
     $result = $CI->Home_model->Get_related_details($product_id,$att_id);  
     return $result; 
}
function Get_Productgallery_details_attr($product_id,$attr_id)
{
    //echo "test"; die; 
    $CI = &get_instance();
    $CI->load->model('Home_model');
    $result = $CI->Home_model->get_product_gallery_details_attr($product_id,$attr_id);  
    return $result; 
} 
function Get_Productgallery_detailss($product_id,$att_id)
  {
    //echo "test"; die; 
    $CI = &get_instance();
    $CI->load->model('Shopping_model');
    $result = $CI->Shopping_model->get_product_gallery_details($product_id,$att_id);  
    return $result; 
  } 
function Get_attribute_details($product_id)
{
  //echo "test"; die; 
    $CI = &get_instance();
    $CI->load->model('Home_model');
    $result = $CI->Home_model->get_attribute_details($product_id); 
    //echo'<pre>';print_r($result); 
    return $result; 
} 
function Get_attribute_image_details($attr_id)
{
  //echo "test"; die; 
    $CI = &get_instance();
    $CI->load->model('Home_model');
    $result = $CI->Home_model->Get_attribute_image_details($attr_id);  
    return $result; 
}


function get_invoice($cart_id)
   {
  
    

 
     // $this->db->where('CustomerID', $customer_id);
     // $data = $this->db->get('tbl_customer');
       $CI = &get_instance();
       $CI->db-> select(' * ');
       $CI->db-> from('company_details');
       $query = $CI -> db -> get();
       $ress=$query->row();
       $CI->db->select("*");
       $CI->db->where('tbl_checkout.sale_id',$cart_id);
       $CI->db->from("tbl_checkout");
       $queryc=$CI->db->get();
       $checkout_res=$queryc->result();
       $order_date=@$checkout_res[0]->order_date;

       $invoice_date=date('Y-m-d :H:i:s');
       $invoice_date2=explode(' ',$invoice_date);
       $invoice_date3=explode('-',$invoice_date2[0]);
       $invoice_date3=$invoice_date3[2].'.'.$invoice_date3[1].'.'.$invoice_date3[0];
       $order_date2=explode(' ',$order_date);
       $order_date_format3=explode('-',$order_date2[0]);
       $order_date_format=$order_date_format3[2].'.'.$order_date_format3[1].'.'.$order_date_format3[0];
       $CI->db->select("tbl_cart_product.hsn_code,tbl_cart_product.gst_per,tbl_cart_product.gst_type as gsttype,tbl_cart_product.discount,tbl_cart_product.winprice,tbl_cart_product.win_image,tbl_cart_product.custom_image,tbl_cart_product.page_number,tbl_cart_product.p_image,tbl_cart_product.p_type,tbl_cart_product.product_price as p_price,tbl_cart_product.quantity as product_qty,tbl_products.*,category_details.*");
       $CI->db->where('product_cart_id',$cart_id);
       $CI->db->from("tbl_cart_product");
       $CI->db->join('tbl_products','tbl_products.id=tbl_cart_product.product_id');
       $CI->db->join('category_details','category_details.id=tbl_products.cat_id');

       //echo $this->db->last_query();die;
       $query=$CI->db->get();
       $res=$query->result();
       //echo'<pre>';print_r($res);die;
     $output ='<div class="order-products-details" style="box-sizing: border-box;font-family: sans-serif;font-size: 13px;margin: 0;margin-top: 25px;">
    <table style="overflow-x: auto;box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;width: 100%;border: 1px solid #000;border-collapse: collapse;padding: 3px; text-align:center;">
      <tr style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">
        <th style="box-sizing: border-box;font-family: sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;background: #e0e0e0;">S.No.</th>
        <th style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;background: #e0e0e0;">HSN Code</th>
        <th class="t-l-align" style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;background: #e0e0e0;text-align: left!important;">Description</th>
        <th style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;background: #e0e0e0;">Qty</th>
        <th style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;background: #e0e0e0;">MRP</th>
        
        <th style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;background: #e0e0e0;">Discount(%)</th>
        <th style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: px;background: #e0e0e0;">&nbsp;Discount &nbsp;Amount</th>
        <th style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;background: #e0e0e0;">Net Amount</th>';
        $state=@$checkout_res[0]->state;
          $state='Uttar Pradesh';
          if($state=='Uttar Pradesh'){
             
        $output.='<th style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;background: #e0e0e0;"> SGST</th>
        <th style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;background: #e0e0e0;"> CGST</th>';
        }else{

         $output.='<th style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;background: #e0e0e0;"> IGST</th>';
        }
 
       $output.='<th style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;background: #e0e0e0;">Total Amount</th>
      </tr>';
       //$state=@$checkout_res[0]->state;
       //$gst_per=@$checkout_res[0]->gst_per;
      // $gst_type=@$checkout_res[0]->gst_type;
       
       
       //$gst_per=18;
       //$gst_type='Inclusive';

      $i=1;
      $total=0;
      $gtotal_p=0;
      foreach ($res as $val) {
        $gst_per=$val->gst_per;
        $gsttype=$val->gst_type;
        $total = $total + $val->p_price;
         if($state=='Uttar Pradesh'){
            $pp=$val->product_qty*@$val->p_price;
            $dis_amt=$pp*@$val->discount/100;
             $net_amt=$pp-$dis_amt;
              $tax_type='CGST';
                    if(@$gsttype=='Inclusive'){
                                             // $cgst=$gst_per/2;
                                             // $dd=100/(100+$cgst);
                                             // $ss=$net_amt*$dd;
                                             // $cgst_val=number_format($net_amt-$ss,2); 
                                             // $sgst=$gst_per/2;
                                             // $kk=100/(100+$sgst);
                                             // $hh=$net_amt*$kk;
                                             // $sgst_val=number_format($net_amt-$hh,2);; 
                                             $total_gst=$gst_per;
                                             $mm=100/(100+$total_gst);
                                             $zz=$net_amt*$mm;
                                             $total_gst_val=number_format($net_amt-$zz,2); 
                                              
                                             $cgst_val=$total_gst_val/2;
                                             $sgst_val=$total_gst_val/2;
                                         

                                             $grand_total=$net_amt-$total_gst_val;
                                             $total_p=@$grand_total;

          }
           if(@$gsttype=='Exclusive'){
              $cgst=$gst_per/2;
              $cgst_val=$net_amt*$cgst/100;
              $sgst=$gst_per/2;
              $sgst_val=($net_amt*$sgst)/100;
              $total_gst=$gst_per;
              $total_gst_val=($net_amt*$gst_per)/100; 
              $grand_total=$net_amt+$total_gst_val;
              $total_p=@$grand_total;
              }
       
        $gtotal_p=$gtotal_p+@$total_p;                            
        }else{
             $tax_type='IGST';
             $cgst=$gst_per;
             $cgst_val=($total*$cgst)/100;
             $sgst=$gst_per;
             $sgst_val=($total*$sgst)/100;
             $total_gst=$gst_per;
             $total_gst_val=($total*$gst_per)/100; 
             $grand_total=$total+$total_gst_val;
             $total_p=@$net_amt+$cgst_val+$sgst_val;
             $gtotal_p=$gtotal_p+$total_p;
            }
      
      $output.='<tr style="box-sizing: border-box;font-family:  sans-serif;font-size: 13px;margin: 0;">
        <td style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;text-align: center;">'.$i.'</td>
        <td style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;text-align: center;">'.@$val->hsn_code.'</td>
        <td style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;text-align: left;">'.@$val->product_name.'</td>
         <td style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;text-align: center;">'.@$val->product_qty.'</td>
        <td style="box-sizing: border-box;font-family: sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;text-align: center;">₹'.number_format(@$val->p_price,2).'</td>
       
        <td style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;text-align: center;">₹'.number_format(@$val->discount,2).'</td>
         <td style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;text-align: center;">₹'.number_format(@$dis_amt,2).'</td>
         <td style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;text-align: center;">₹'.number_format($net_amt,2).'</td>';
        if($state=='Uttar Pradesh'){
        $output.='<td style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;text-align: center;">'.number_format(@$sgst_val, 2).' @'.@$cgst.'%</td>
       <td style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;text-align: center;">'.number_format(@$cgst_val, 2).' @'.@$cgst.'%</td>';
        }else{
          $output.='<td style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;text-align: center;">1232</td>';
          }
       $output.='<td style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;text-align: center;">'.number_format(@$total_p,2).'</td>
      </tr>';
      $i++; }
      $output.='<tr style=" background:#c8c8c8c8;box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">
        <td colspan="7" class="t-l-align heading-col" style="font-weight: 600;box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;text-align: left!important;"></td>
        <td style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;background: #e0e0e0;"></td>
        <td style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;background: #e0e0e0;"></td>
        <td style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;background: #e0e0e0;"><b>Total </td>

        <td style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;background: #e0e0e0;">INR&nbsp;'.number_format(@$gtotal_p,2).'</td>
      </tr>
      <tr style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">
        <td colspan="10" class="no-border t-l-align heading-col" style="font-weight: 600;box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 11px;margin: 0;border: none!important;border-collapse: collapse;padding: 3px;text-align: left!important;"></td>
      </tr>
      <tr style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">
        <td colspan="10" class="no-border t-l-align heading-col" style="font-weight: 600;box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 11px;margin: 0;border: none!important;border-collapse: collapse;padding: 3px;text-align: left!important;"></td>
      </tr>
      
     
     </table>
   </div>'; 

 
    //}
    
    return $output;
  }


  function printarray($value){
  echo '<pre>';
  print_r($value);
  echo '</pre>';
  }

  
}

