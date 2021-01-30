<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{


function get_checkout($cart_id){
       $this -> db -> select(' * ');
       $this -> db -> from('company_details');
       $query = $this -> db -> get();
       $ress=$query->row();
       $this->db->select("*");
       $this->db->where('tbl_checkout.sale_id',$cart_id);
       $this->db->from("tbl_checkout");
       $queryc=$this->db->get();
       $checkout_res=$queryc->result();
       return  $checkout_res;
      }
  function fetch_single_details($cart_id)
     {
       // $this->db->where('CustomerID', $customer_id);
       // $data = $this->db->get('tbl_customer');
       $this -> db -> select(' * ');
       $this -> db -> from('company_details');
       $query = $this -> db -> get();
       $ress=$query->row();
       $this->db->select("*");
       $this->db->where('tbl_checkout.sale_id',$cart_id);
       $this->db->from("tbl_checkout");
       $queryc=$this->db->get();
       $checkout_res=$queryc->result();
       $order_date=@$checkout_res[0]->order_date;

       $invoice_date=date('Y-m-d :H:i:s');
       $invoice_date2=explode(' ',$invoice_date);
       $invoice_date3=explode('-',$invoice_date2[0]);
       $invoice_date3=$invoice_date3[2].'.'.$invoice_date3[1].'.'.$invoice_date3[0];
       $order_date2=explode(' ',$order_date);
       $order_date_format3=explode('-',$order_date2[0]);
       $order_date_format=$order_date_format3[2].'.'.$order_date_format3[1].'.'.$order_date_format3[0];
       $this->db->select("tbl_cart_product.hsn_code,tbl_cart_product.gst_per,tbl_cart_product.gst_type as gsttype,tbl_cart_product.discount,tbl_cart_product.winprice,tbl_cart_product.win_image,tbl_cart_product.custom_image,tbl_cart_product.page_number,tbl_cart_product.p_image,tbl_cart_product.p_type,tbl_cart_product.product_price as p_price,tbl_cart_product.quantity as product_qty,tbl_products.*,category_details.*");
       $this->db->where('product_cart_id',$cart_id);
       $this->db->from("tbl_cart_product");
       $this->db->join('tbl_products','tbl_products.id=tbl_cart_product.product_id');
       $this->db->join('category_details','category_details.id=tbl_products.cat_id');

       //echo $this->db->last_query();die;
       $query=$this->db->get();
       $res=$query->result();
       //echo'<pre>';print_r($res);die;
     $output ='<div class="invoice-buyer-seller-details" style="box-sizing: border-box;font-family:sans-serif;font-size: 13px;margin: 0;">
    <table style="box-sizing: border-box;font-family:sans-serif;font-size: 13px;margin: 0;width: 100%;">
      <tr style="box-sizing: border-box;font-family:sans-serif;font-size: 13px;margin: 0;">
        <td class="b-s-d-box seller-details" style="box-sizing: border-box;font-family:sans-serif;font-size: 13px;margin: 0;width: 40%;">
          <table style="box-sizing: border-box;font-family:sans-serif;font-size: 13px;margin: 0;width: 100%;">
            <tr style="box-sizing: border-box;font-family:sans-serif;font-size: 13px;margin: 0;"><td class="heading-col" style="font-weight: 600;box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">Sold By :'.@$ress->comp_name.'</td></tr>
            <tr style="box-sizing: border-box;font-family:sans-serif;font-size: 13px;margin: 0;"><td style="box-sizing: border-box;font-family:sans-serif;font-size: 13px;margin: 0;">'.@$ress->address.'
              </td></tr>
          </table>
        </td>
        <td class="b-s-d-box buyer-details" style="box-sizing: border-box;font-family: sans-serif;font-size: 13px;margin: 0;text-align: right;width: 40%;">
          <table style="box-sizing: border-box;font-family: sans-serif;font-size: 13px;margin: 0;width: 100%;">
            <tr style="box-sizing: border-box;font-family: sans-serif;font-size: 13px;margin: 0;"><td colspan="2" class="heading-col" style="font-weight: 600;box-sizing: border-box;font-family:sans-serif;font-size: 13px;margin: 0;">Billing Address :</td></tr>
            <tr style="box-sizing: border-box;font-family:  sans-serif;font-size: 13px;margin: 0;"><td colspan="2" style="box-sizing: border-box;font-family:  sans-serif;font-size: 13px;margin: 0;">'.@$checkout_res[0]->firstname.' '.@$checkout_res[0]->address1.'
             </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </div><div class="invoice-buyer-seller-details" style="box-sizing: border-box;font-family:  sans-serif;font-size: 13px;margin: 0;">
    <table style="box-sizing: border-box;font-family:  sans-serif;font-size: 13px;margin: 0;width: 100%;">
      <tr style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">
        <td class="b-s-d-box seller-details" style="box-sizing: border-box;font-family: sans-serif;font-size: 13px;margin: 0;width: 40%;">
          <table style="box-sizing: border-box;font-family:  sans-serif;font-size: 13px;margin: 0;width: 100%;">
            <tr class="a-w-r" style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;display: flex;width: 100%;justify-content: flex-start;"><td class="heading-col" style="font-weight: 600;box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">PAN No:</td><td style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">'.@$ress->pan.'</td></tr>
            <tr class="a-w-r" style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;display: flex;width: 100%;justify-content: flex-start;"><td class="heading-col" style="font-weight: 600;box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">GST Registration No:</td><td style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">'.@$ress->gst.'</td></tr>
          </table>
        </td>
        <td class="b-s-d-box buyer-details" style="box-sizing: border-box;font-family:  sans-serif;font-size: 13px;margin: 0;text-align: right;width: 40%;">
          <table style="box-sizing: border-box;font-family:  sans-serif;font-size: 13px;margin: 0;width: 100%;">
            <tr style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;"><td colspan="2" class="heading-col" style="font-weight: 600;box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">Shipping Address :</td></tr>
            <tr style="box-sizing: border-box;font-family: sans-serif;font-size: 13px;margin: 0;"><td colspan="2" style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">'.@$checkout_res[0]->firstname.' '.@$checkout_res[0]->address1.'
              </td>
            </tr>
           </table>
        </td>
      </tr>
    </table>
  </div><div class="invoice-buyer-seller-details" style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">
    <table style="box-sizing: border-box;font-family:  sans-serif;font-size: 13px;width: 100%;">
      <tr style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">
        <td class="b-s-d-box seller-details" style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;width: 40%;">
          <table style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;width: 100%;">
            <tr class="a-w-r" style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;display: flex;width: 100%;justify-content: flex-start;"><td class="heading-col" style="font-weight: 600;box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">Order No:</td><td style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">'.@$checkout_res[0]->checkout_id .'</td></tr>
            <tr class="a-w-r" style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;display: flex;width: 100%;justify-content: flex-start;"><td class="heading-col" style="font-weight: 600;box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">Order Date:</td><td style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">'.$order_date_format.'</td></tr>
            <tr class="a-w-r" style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;display: flex;width: 100%;justify-content: flex-start;"><td class="heading-col" style="font-weight: 600;box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">PO Number:</td><td style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">10</td></tr>
          </table>
        </td>
        <td class="b-s-d-box buyer-details" style="box-sizing: border-box;font-family: sans-serif;font-size: 13px;margin: 0;text-align: right;width: 40%;">
          <table style="box-sizing: border-box;font-family:  sans-serif;font-size: 13px;margin-left:-50px;width: 100%;">
            <tr class="a-w-r" style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;display: flex;width: 100%;justify-content: flex-end;"><td class="heading-col" style="font-weight: 600;box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">Place of supply:</td><td style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">Uttar Pradesh</td></tr>
            <tr class="a-w-r" style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;display: flex;width: 100%;justify-content: flex-end;"><td class="heading-col" style="font-weight: 600;box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">Place of delivery::</td><td style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">Uttar Pradesh</td></tr>
            <tr class="a-w-r" style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;display: flex;width: 100%;justify-content: flex-end;"><td class="heading-col" style="font-weight: 600;box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">Invoice Number:</td><td style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">'.@$checkout_res[0]->province.'</td></tr>
            
            <tr class="a-w-r" style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;display: flex;width: 100%;justify-content: flex-end;"><td class="heading-col" style="font-weight: 600;box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">Invoice Date:</td><td style="box-sizing: border-box;font-family: , sans-serif;font-size: 13px;margin: 0;">'.$invoice_date3.'</td></tr>
          </table>
        </td>
      </tr>
    </table>
  </div><div class="order-products-details" style="box-sizing: border-box;font-family: sans-serif;font-size: 13px;margin: 0;margin-top: 25px;">
    <table style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;width: 100%;border: 1px solid #000;border-collapse: collapse;padding: 3px; text-align:center;">
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
        <td colspan="7" class="t-l-align heading-col" style="font-weight: 600;box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;text-align: left!important;">Total</td>
        <th style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;background: #e0e0e0;"></th>
        <th style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;background: #e0e0e0;"></th>
        <th style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;background: #e0e0e0;"></th>

        <th style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;background: #e0e0e0;">INR '.number_format(@$gtotal_p,2).'</th>
      </tr>
      <tr style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">
        <td colspan="10" class="no-border t-l-align heading-col" style="font-weight: 600;box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 11px;margin: 0;border: none!important;border-collapse: collapse;padding: 3px;text-align: left!important;"></td>
      </tr>
      <tr style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">
        <td colspan="10" class="no-border t-l-align heading-col" style="font-weight: 600;box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 11px;margin: 0;border: none!important;border-collapse: collapse;padding: 3px;text-align: left!important;"></td>
      </tr>
      <tr style="border-top: 1px solid #000;box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">
        <td colspan="9" class="no-border t-r-align heading-col" style="font-weight: 600;box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 11px;margin: 0;border: none!important;border-collapse: collapse;padding: 3px;text-align: right!important;">For wayinfotechsolutions India Private Limited:</td>
      </tr>
      <tr style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">
        <td colspan="10" class="no-border" style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 11px;margin: 0;border: none!important;border-collapse: collapse;padding: 3px;text-align: center;"></td>
      </tr>
      
      <tr style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">
        <td colspan="10" class="no-border t-r-align heading-col" style="font-weight: 600;box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 11px;margin: 0;border: none!important;border-collapse: collapse;padding: 3px;text-align: right!important;">Authorized Signatory</td>
      </tr>
    </table>
    <span class="note" style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">Whether tax is payable under reverse charge - No</span>
  </div>'; 

 
    //}
    
    return $output;
  }
  function get_comp_data(){
            $this -> db -> select(' * ');
            $this -> db -> from('company_details');
             $query = $this -> db -> get();
             $res=$query->row();
            return $res;
  }
  function check_reg_user($email,$phone){
            $this -> db -> select(' * ');
            $this -> db -> from('tbl_customers');
            $this -> db -> where('email', $email);
            $this -> db -> or_where('phone', $phone);
            $this -> db -> limit(1);
            $query = $this -> db -> get();
            //echo $this->db->last_query();
        $res=$query->row();
       return $res;        
      }
    function update_photo_data($file_data,$user_id){
      $this -> db -> where('customer_id', $user_id);
      $res=$this->db->update('tbl_customers',$file_data);
     // echo $this->db->last_query();die;
      return $res;
     }
    public function deletes1($table, $field, $delete_id) {
        $this->db->trans_start();
        $this->db->delete($table, array($field => $delete_id));
        $this->db->trans_complete();
        return ($this->db->trans_status() === FALSE) ? FALSE : TRUE;
    }  
    function check_user_email_activecode_exist($customer_id,$active_code){
            $this -> db -> select(' * ');
            $this -> db -> from('tbl_customers');
            $this -> db -> where('customer_id', $customer_id);
            $this -> db -> where('active_code', $active_code);
            $this -> db -> limit(1);
            $query = $this -> db -> get();
           // echo $this->db->last_query();die;
        $res=$query->row();
       return $res;        
      }   
      
function check_reg_user_by_email($email){
            $this -> db -> select(' * ');
            $this -> db -> from('tbl_customers');
            $this -> db -> where('email', $email);
            $this -> db -> limit(1);
            $query = $this -> db -> get();
            //echo $this->db->last_query();
            $res=$query->row();
           return $res;            
        }
  public function get_all_wish_orders($user_id){
       $this->db->select("*");
       $this->db->from("tbl_wishlist");
       $this->db->where('tbl_wishlist.user_id',$user_id);
       $this->db->order_by('tbl_wishlist.id','desc');
       $query=$this->db->get();
       $res=$query->result();
       return $res;

   }   
public function get_wish_orders($pid){
       $this->db->select("*");
       $this->db->from("tbl_wishlist");
       $this->db->where('tbl_wishlist.id',$pid);
       $this->db->order_by('tbl_wishlist.id','desc');
       $query=$this->db->get();
       $res=$query->result();
       return $res;

   }   


function check_user_exist($user_id,$old_pass){
            $this -> db -> select(' * ');
            $this -> db -> from('tbl_customers');
            $this -> db -> where('customer_id', $user_id);
            $this -> db -> where('password', $old_pass);
            $this -> db -> limit(1);
            $query = $this -> db -> get();
            //echo $this->db->last_query();
            $res=$query->num_rows();
           return $res;            
        }

function check_user_email_exist($email){
            $this -> db -> select(' * ');
            $this -> db -> from('tbl_customers');
            $this -> db -> where('email', $email);
            $this -> db -> limit(1);
            $query = $this -> db -> get();
            //echo $this->db->last_query();
            $res=$query->row();
           return $res;            
        }

public function get_all_shopping_orders($user_id){
       $this->db->select("*");
       $this->db->from("tbl_checkout");
       $this ->db -> where('customer_id', $user_id);
       $this->db->order_by('tbl_checkout.checkout_id','desc');
       $query=$this->db->get();
       $res=$query->result();
       return $res;

   }  
  public function get_product_details($cart_id){
       $this->db->select("tbl_cart_product.winprice,tbl_cart_product.win_image,tbl_cart_product.custom_image,tbl_cart_product.page_number,tbl_cart_product.p_image,tbl_cart_product.p_type,tbl_cart_product.product_price as p_price,tbl_cart_product.quantity as product_qty,tbl_products.*,category_details.*");
       $this->db->where('product_cart_id',$cart_id);
       $this->db->from("tbl_cart_product");
       $this->db->join('tbl_products','tbl_products.id=tbl_cart_product.product_id');
       $this->db->join('category_details','category_details.id=tbl_products.cat_id');
       //echo $this->db->last_query();die;
       $query=$this->db->get();
       $res=$query->result();
       return $res;

   }  
   function save_customer_data($insert_data){
        $res=$this->db->insert('tbl_customers',$insert_data);
        $insert_id = $this->db->insert_id();
      return $insert_id;
      //echo $this->db->last_query();
     }
function save_news_data($insert_data){
        $res=$this->db->insert('news_latter',$insert_data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
      //echo $this->db->last_query();
      }

function update_customer_data($insert_data,$user_id){
      $this -> db -> where('customer_id', $user_id);
      $res=$this->db->update('tbl_customers',$insert_data);
      // echo $this->db->last_query();die;
      return $res;
 }
function update_password($user_id,$postdata){
      $this -> db -> where('customer_id', $user_id);
      $res=$this->db->update('tbl_customers',$postdata);
     //echo $this->db->last_query();die;
      return $res;
 }

function login($email,$password){
            $this -> db -> select(' * ');
            $this -> db -> from('tbl_customers');
            $this -> db -> where('email', $email);
            $this -> db -> where('password', md5($password));
            $this -> db -> limit(1);
      $query = $this -> db -> get();
      return $query;         
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
    function get_country_data(){
            $this -> db -> select(' * ');
            $this -> db -> from('tbl_countries');
            $query = $this -> db -> get();
            $res=$query->result();
            return $res;            
           }
    function get_state_data(){
            $this -> db -> select(' * ');
            $this -> db -> from('tbl_states');
            $query = $this -> db -> get();
            $res=$query->result();
            return $res;            
           }  
    function get_city_data(){
            $this -> db -> select(' * ');
            $this -> db -> from('tbl_cities');
            $query = $this -> db -> get();
            $res=$query->result();
            return $res;            
           }                        
}