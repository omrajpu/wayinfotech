<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model{
	  function fetch_single_details($cart_id)
   {
    // $this->db->where('CustomerID', $customer_id);
    // $data = $this->db->get('tbl_customer');
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
       $this->db->select("tbl_cart_product.gst_per,tbl_cart_product.gst_type as gsttype,tbl_cart_product.discount,tbl_cart_product.winprice,tbl_cart_product.win_image,tbl_cart_product.custom_image,tbl_cart_product.page_number,tbl_cart_product.p_image,tbl_cart_product.p_type,tbl_cart_product.product_price as p_price,tbl_cart_product.quantity as product_qty,tbl_products.*,category_details.*");
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
            <tr style="box-sizing: border-box;font-family:sans-serif;font-size: 13px;margin: 0;"><td class="heading-col" style="font-weight: 600;box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">Sold By :</td></tr>
            <tr style="box-sizing: border-box;font-family:sans-serif;font-size: 13px;margin: 0;"><td style="box-sizing: border-box;font-family:sans-serif;font-size: 13px;margin: 0;">1221, iThum Tower-B, A 40, Industrial Area, Sector 62 Noida, Uttar Pradesh 201301, India
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
            <tr class="a-w-r" style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;display: flex;width: 100%;justify-content: flex-start;"><td class="heading-col" style="font-weight: 600;box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">PAN No:</td><td style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">AAQCS4259Q</td></tr>
            <tr class="a-w-r" style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;display: flex;width: 100%;justify-content: flex-start;"><td class="heading-col" style="font-weight: 600;box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">GST Registration No:</td><td style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">36AAQCS4259Q1ZB</td></tr>
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
            <tr class="a-w-r" style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;display: flex;width: 100%;justify-content: flex-start;"><td class="heading-col" style="font-weight: 600;box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">Order No:</td><td style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">'.@$checkout_res[0]->province.'</td></tr>
            <tr class="a-w-r" style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;display: flex;width: 100%;justify-content: flex-start;"><td class="heading-col" style="font-weight: 600;box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">Order Date:</td><td style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">'.$order_date_format.'</td></tr>
            <tr class="a-w-r" style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;display: flex;width: 100%;justify-content: flex-start;"><td class="heading-col" style="font-weight: 600;box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">PO Number:</td><td style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">10</td></tr>
          </table>
        </td>
        <td class="b-s-d-box buyer-details" style="box-sizing: border-box;font-family: sans-serif;font-size: 13px;margin: 0;text-align: right;width: 40%;">
          <table style="box-sizing: border-box;font-family:  sans-serif;font-size: 13px;margin-left:-50px;width: 100%;">
            <tr class="a-w-r" style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;display: flex;width: 100%;justify-content: flex-end;"><td class="heading-col" style="font-weight: 600;box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">Place of supply:</td><td style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">Uttar Pradesh</td></tr>
            <tr class="a-w-r" style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;display: flex;width: 100%;justify-content: flex-end;"><td class="heading-col" style="font-weight: 600;box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">Place of delivery::</td><td style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">Uttar Pradesh</td></tr>
            <tr class="a-w-r" style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;display: flex;width: 100%;justify-content: flex-end;"><td class="heading-col" style="font-weight: 600;box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">Invoice Number:</td><td style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">IN-SDEI-200598</td></tr>
            
            <tr class="a-w-r" style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;display: flex;width: 100%;justify-content: flex-end;"><td class="heading-col" style="font-weight: 600;box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">Invoice Date:</td><td style="box-sizing: border-box;font-family: , sans-serif;font-size: 13px;margin: 0;">'.$invoice_date3.'</td></tr>
          </table>
        </td>
      </tr>
    </table>
  </div><div class="order-products-details" style="box-sizing: border-box;font-family: sans-serif;font-size: 13px;margin: 0;margin-top: 25px;">
    <table style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;width: 100%;border: 1px solid #000;border-collapse: collapse;padding: 3px;">
      <tr style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">
        <th style="box-sizing: border-box;font-family: sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;background: #e0e0e0;">S.No.</th>
        <th style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;background: #e0e0e0;">HSN</th>
        <th class="t-l-align" style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;background: #e0e0e0;text-align: left!important;">Description</th>
        <th style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;background: #e0e0e0;">Rate/Item</th>
        <th style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;background: #e0e0e0;">Qty</th>
        <th style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;background: #e0e0e0;">Discount(%)</th>
        <th style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: px;background: #e0e0e0;">Discount Amount</th>
        <th style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;background: #e0e0e0;">Net Amount</th>
        <th style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;background: #e0e0e0;">GST(%)</th>';
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
        $gsttype=$val->gsttype;
        $total = $total + $val->p_price;
         if($state=='Uttar Pradesh'){
            $pp=$val->product_qty*@$val->p_price;
            $dis_amt=$pp*@$val->discount/100;
            $net_amt=$pp-$dis_amt;
            
             $tax_type='CGST';
           if(@$gsttype=='Inclusive'){
             $cgst=$gst_per/2;
             $cgst_val=($total*$cgst)/100;
             $sgst=$gst_per/2;
             $sgst_val=($total*$sgst)/100;
             $total_gst=$gst_per;
             $total_gst_val=($total*$gst_per)/100; 
             $grand_total=$total+$total_gst_val;
             }
           if(@$gsttype=='Exclusive'){
                                             $cgst=$gst_per/2;
                                             $dd=100/(100+$cgst);
                                             $ss=$total*$dd;
                                             $cgst_val=number_format($total-$ss,2); 
                                             $sgst=$gst_per/2;
                                             $kk=100/(100+$cgst);
                                             $hh=$total*$dd;
                                             $sgst_val=number_format($total-$hh,2);; 
                                             $total_gst=$gst_per;
                                             $mm=100/(100+$total_gst);
                                             $zz=$total*$mm;
                                             $total_gst_val=number_format($total-$zz,2); 
                                             $grand_total=$total-$total_gst_val;
                                           }
        $total_p=@$net_amt+@$cgst_val+@$sgst_val;
        $gtotal_p=$gtotal_p+$total_p;                            
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
        <td style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;text-align: center;">234343</td>
        <td style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;text-align: left;">'.@$val->product_name.'</td>
        <td style="box-sizing: border-box;font-family: sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;text-align: center;">₹'.number_format(@$val->p_price,2).'</td>
        <td style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;text-align: center;">'.@$val->product_qty.'</td>
        <td style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;text-align: center;">₹'.number_format(@$val->discount,2).'</td>
         <td style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;text-align: center;">₹'.number_format(@$dis_amt,2).'</td>
         <td style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;text-align: center;">₹'.number_format($net_amt,2).'</td>
        <td style="box-sizing: border-box;font-family:  sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;text-align: center;">'.@$gst_per.'%</td>';
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
        <td colspan="8" class="t-l-align heading-col" style="font-weight: 600;box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 11px;margin: 0;border: 1px solid #000;border-collapse: collapse;padding: 3px;text-align: left!important;">Total</td>
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
        <td colspan="10" class="no-border t-r-align heading-col" style="font-weight: 600;box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 11px;margin: 0;border: none!important;border-collapse: collapse;padding: 3px;text-align: right!important;">For wayinfotechsolutions India Private Limited:</td>
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
   function save_cat_data($insert_data){
         $res=$this->db->insert('category_details',$insert_data);
         return $res;
      }
 function update_status($update_data,$id){
      $this->db->where('province',$id);
      $res=$this->db->update('tbl_checkout',$update_data);
     // echo $this->db->last_query();
      return $res;
  } 

    function update_fields($update_data,$id){
      $this->db->where('id',$id);
      $res=$this->db->update('tbl_fields',$update_data);
      echo $this->db->last_query();
      return $res;
  } 
function update_all_fields($update_data){
      //$this->db->where('1');
      $res=$this->db->update('tbl_fields',$update_data);
      echo $this->db->last_query();
      return $res;
  } 
function single_user_list($u_id){
         $this->db->select("*");
         $this->db->from("tbl_customers");
         $this->db->where('customer_id',$u_id);
         $query=$this->db->get();
         //echo $this->db->last_query();
         $res=$query->row();
         return $res;
        }
public function inactive_user($table, $field, $delete_id) {
        if($field=='active'){
          $status='inactive';
        }else{
          $status='active';
        }
        $update_data=array(
                'status'=>$status
        );
         $this->db->where('customer_id',$delete_id);
         $res=$this->db->update('tbl_customers',$update_data);
        //echo $this->db->last_query();
         return $res;
       }
    function save_brand_data($insert_data){
         $res=$this->db->insert('brand_details',$insert_data);
         return $res;
     }
function save_company_data($insert_data){
         $res=$this->db->insert('company_details',$insert_data);
         return $res;
       }

     function save_slider_data($insert_data){
         $res=$this->db->insert('top_home_silider',$insert_data);
         return $res;
     }

function get_brand_data(){
         $this->db->select("*");
         $this->db->from("brand_details");
         $this->db->order_by("id","desc");
         //$this->db->where('status','1');
         $query=$this->db->get();
         $res=$query->result();

         //echo $this->db->last_query();die;
         return $res;

   } 
 public function get_all_shopping_orders(){
       $this->db->select("*");
       $this->db->from("tbl_checkout");
       //$this->db->order_by('tbl_checkout.checkout_id','desc');
       $query=$this->db->get();
       //echo $this->db->last_query();die;
       $res=$query->result();
       return $res;

   }  
  public function get_product_details($cart_id){
       $this->db->select("tbl_cart_product.gst_type,tbl_cart_product.gst_per,tbl_cart_product.winprice,tbl_cart_product.win_image,tbl_cart_product.custom_image,tbl_cart_product.page_number,tbl_cart_product.p_image,tbl_cart_product.p_type,tbl_cart_product.product_price as p_price,tbl_cart_product.quantity as product_qty,tbl_products.*,category_details.*");
       $this->db->where('product_cart_id',$cart_id);
       $this->db->from("tbl_cart_product");
       $this->db->join('tbl_products','tbl_products.id=tbl_cart_product.product_id');
       $this->db->join('category_details','category_details.id=tbl_products.cat_id');
       //echo $this->db->last_query();die;
       $query=$this->db->get();
       $res=$query->result();
       return $res;
 }  
function get_product(){
         $this->db->select("*");
         $this->db->from("tbl_products");
         $this->db->order_by("id","asc");
        // $this->db->where('pdt_id',$cat_id);
         $query=$this->db->get();
       
         return $res=$query->result();

}
   function get_product_gallery_details($p_id){
         $this->db->select("product_attribute_image.image,tbl_product_attribute.price_mrp,tbl_product_attribute.sp_price,tbl_product_attribute.margin_price,tbl_product_attribute.qty,tbl_product_attribute.weight");
         $this->db->from("tbl_product_attribute");
         $this->db->join("product_attribute_image","tbl_product_attribute.id=product_attribute_image.attr_id");
         $this->db->where('tbl_product_attribute.product_id',$p_id);
        $this->db->group_by("product_attribute_image.attr_id","asc");
         $query=$this->db->get();
        //echo $this->db->last_query();die;
         $res=$query->result();
         return $res;

   }
   function get_product_gallery_details2($cat_id){
      $this->db->select("product_gallery.image");
         $this->db->from("product_gallery");
         $this->db->order_by("id","desc");
         $this->db->where('pdt_id',$cat_id);
         $query=$this->db->get();
         //echo $this->db->last_query();
         $res=$query->row();
         return $res;

   }
   
     function save_attribute_data($insert_data){
         $res=$this->db->insert('attribute_details',$insert_data);
         return $res;
     }
     function save_attribute_group_data($insert_data){
         $res=$this->db->insert('attribute_allocation',$insert_data);
         return $res;
     } 
    function save_sub_cat_data($insert_data){
         $res=$this->db->insert('sub_category_details',$insert_data);
        // echo $this->db->last_query();
         //$res=$query->row();
         return $res;

    }
    function save_sub_child_cat_data($insert_data){
         $res=$this->db->insert('sub_child_category_details',$insert_data);
        // echo $this->db->last_query();
         //$res=$query->row();
         return $res;

    } 	
    function product_list(){
         $this->db->select("*");
         $this->db->from("tbl_products");
         //$this->db->order_by("id","desc");
         //$this->db->where('status','1');
         $query=$this->db->get();
         $res=$query->result();
         return $res;

   } 

   public function get_attr_list($product_id){

    $this->db->select("*");
    $this->db->from("tbl_item_master_attribute");
    $this->db->where("product_id",$product_id);
    $query=$this->db->get();
    $res=$query->result();
      return $res;
        
   }
   public function save_product($insert_data){
        $this->db->insert('tbl_products',$insert_data);
        $insert_id=$this->db->insert_id();
        return $insert_id;
    }

  public function save_attribute_product_data($upload_file,$post_data,$insertid){
     // printarray($upload_file);die;
      
    $barcode=@$post_data['barcode'];
    $itemcode=@$post_data['itemcode'];
    $color=@$post_data['color'];
    $size=@$weight['size'];
    $weight=@$post_data['weight'];
    $storage=@$post_data['storage'];
    $memory=@$post_data['memory'];
    $style=@$post_data['style'];
    $stock=@$post_data['stock'];
    $style=@$post_data['style'];
    $style_extra1=@$post_data['extra1'];
    $style_extra2=@$post_data['extra2'];
    $style_extra3=@$post_data['extra3'];
    $qty=@$post_data['qty'];
    $cnt=count($barcode);
        for($j=0;$j<$cnt;$j++){
          if($barcode[$j]){
            $date=date('Y-m-d H:i:s');
            $price_data=$_POST['price_'.$j];
            $price_mrp=($price_data[0]) ? $price_data[0]:0;
            $sp_price=($price_data[1]) ? $price_data[1]:0;
            $margin_price=($price_data[2]) ? $price_data[2]:0;
            $insert_data=array('product_id'=>$insertid,
                             'barcode'=>$barcode[$j],
                             'itemcode'=>$itemcode[$j],
                             'color'=>$color[$j],
                             'size'=>$size[$j],
                             'weight'=>$weight[$j],
                             'storage'=>$storage[$j],
                             'memory'=>$memory[$j],
                             'stock'=>$stock[$j],
                             'qty'=>$qty[$j],
                             'status'=>1,
                             'style'=>$style[$j],
                             'style_extra1'=>$style_extra1[$j],
                             'style_extra2'=>$style_extra2[$j],
                             'style_extra3'=>$style_extra3[$j],
                             'price_mrp'=>$price_mrp,
                             'margin_price'=>$margin_price,
                             'sp_price'=>$sp_price,
                             'created_date'=>$date

                           );
           //echo'<pre>';print_r($insert_data);

          $this->db->insert('tbl_product_attribute',$insert_data);
          $insert_id=$this->db->insert_id();
          $fcnt=count($upload_file[$j]);
          if($insert_id){
               for($k=0;$k<$fcnt;$k++) {
                      $date=date('Y-m-d H:i:s');
                              $insert_data=array(
                             'attr_id'=>$insert_id,   
                             'image'=>$upload_file[$j][$k],
                             'created_date'=>$date
                             ) ; 
                              //echo'<pre>';print_r($insert_data);
                           $this->db->insert('product_attribute_image',$insert_data);    
                           }
                      }

                      }

         }

         
        

  }  
  public function update_attribute_product_data($upload_file,$post_data,$eid){
      //printarray($post_data);die;
      
   
    $barcode=@$post_data['barcode'];
    $edit_barcode=@$post_data['edit_barcode'];
    $itemcode=@$post_data['itemcode'];
    $color=@$post_data['color'];
    $size=@$post_data['size'];
    $weight=@$post_data['weight'];
    $storage=@$post_data['storage'];
    $memory=@$post_data['memory'];
    $style=@$post_data['style'];
    $style_extra1=@$post_data['style_extra1'];
    $style_extra2=@$post_data['style_extra2'];
    $style_extra3=@$post_data['style_extra3'];
    $stock=@$post_data['stock'];
    $qty=@$post_data['qty'];
    $attrids=@$post_data['attr_id'];
    if(is_array($barcode) && count($barcode)){
      $bcnt=count($barcode); 
      for($j=0;$j<$bcnt;$j++){
          if($barcode[$j]){
            $date=date('Y-m-d H:i:s');
            $style_data=@$_POST['style_extra_'.$j];
            $price_data=@$_POST['price_'.$j];
            $price_mrp=$price_data[0];
            $sp_price=$price_data[1];
            $margin_price=$price_data[2];
            $update_data=array(
                             'barcode'=>$barcode[$j],
                             'itemcode'=>$itemcode[$j],
                             'color'=>$color[$j],
                             'size'=>$size[$j],
                             'weight'=>$weight[$j],
                             'storage'=>$storage[$j],
                             'memory'=>$memory[$j],
                             'stock'=>$stock[$j],
                             'qty'=>$qty[$j],
                             'status'=>1,
                             'style'=>$style[$j],
                             'style_extra1'=>$style_extra1[$j],
                             'style_extra2'=>$style_extra2[$j],
                             'style_extra3'=>$style_extra3[$j],
                             'price_mrp'=>$price_mrp,
                             'margin_price'=>$margin_price,
                             'sp_price'=>$sp_price,
                             'created_date'=>$date
                       );
                        //echo'<pre>';print_r($update_data);
                       $attrid=@$attrids[$j];
                       $this->db->where('id',$attrid);
                       $this->db->update('tbl_product_attribute',$update_data);
                       }//end barcode
                        foreach(@$upload_file as $key=>$value){
                            //echo $key;
                             if(is_array($value) && count($value)>1){
                              
                             }
                            else{
                              //echo'update';echo'<pre>';print_r($value);
                              $date=date('Y-m-d H:i:s');
                              $update_data=array(
                             'image'=>$value[0],
                             'created_date'=>$date
                             ) ;
                            //print_r($update_data); 
                           // echo $key; 
                             $this->db->where('id',$key); 
                             $this->db->update('product_attribute_image',$update_data);
                            // echo $this->db->last_query();
                             }
                             
                            }
                       
                }
              }

         if(is_array($edit_barcode) && count($edit_barcode)){
           $ebcnt=count($edit_barcode);       
          for($j=0;$j<$ebcnt;$j++){
          if($edit_barcode[$j]){
            $date=date('Y-m-d H:i:s');
            $style_data=@$_POST['style_extra_'.$j];
            $edit_itemcode=@$_POST['edit_itemcode'];
            $edit_weight=@$_POST['edit_weight'];
            $edit_price=@$_POST['edit_price'];
            $price_mrp=@$edit_price[0];
            $sp_price=@$edit_price[1];
            $margin_price=@$edit_price[2];
            $update_data=array(
                             'product_id'=>$eid,
                             'barcode'=>$edit_barcode[$j],
                             'itemcode'=>@$edit_itemcode[$j],
                             'color'=>$color[$j],
                             'size'=>$size[$j],
                             'weight'=>$edit_weight[$j],
                             'storage'=>$storage[$j],
                             'memory'=>$memory[$j],
                             'stock'=>$stock[$j],
                             'qty'=>$qty[$j],
                             'status'=>1,
                             'style'=>$style[$j],
                             'style_extra1'=>$style_extra1[$j],
                             'style_extra2'=>$style_extra2[$j],
                             'style_extra3'=>$style_extra3[$j],
                             'price_mrp'=>$price_mrp,
                             'margin_price'=>$margin_price,
                             'sp_price'=>$sp_price,
                             'created_date'=>$date
                       );
                        //echo'edit';echo'<pre>';print_r($update_data); die;
                       $attrid=@$attrids[$j];
                       //$this->db->where('id',$attrid);
                       $this->db->insert('tbl_product_attribute',$update_data);
                       $attr_insert_id=$this->db->insert_id();

                       // echo'<pre>';print_r(@$upload_file);
                        foreach(@$upload_file as $key=>$value){
                            //echo $key;
                             if(is_array($value) && count($value)>1){
                              //echo'add';echo'<pre>';print_r($value);
                              $icnt=count($value);
                              for($k=0;$k<$icnt;$k++){
                              $date=date('Y-m-d H:i:s');
                              $attr_insert_data=array(
                             'attr_id'=>$attr_insert_id,   
                             'image'=>$value[$k],
                             'created_date'=>$date
                             ) ;
                             //echo'<pre>';print_r($attr_insert_data); 
                             // echo $key; 
                              $this->db->insert('product_attribute_image',$attr_insert_data);
                              } 
                            }
                            else{
                              //echo'update';echo'<pre>';print_r($value);
                              $date=date('Y-m-d H:i:s');
                              $update_data=array(
                             'image'=>$value[0],
                             'created_date'=>$date
                             ) ;
                            //print_r($update_data); 
                           // echo $key; 
                             $this->db->where('id',$key); 
                             $this->db->update('product_attribute_image',$update_data);
                             //echo $this->db->last_query();
                             }
                             
                            }  

                       }//end barcode


                }
              }
           // echo'<pre>';print_r(@$upload_file);
               // die;
             // foreach(@$upload_file as $key=>$value){
             //                //echo $key;
             //                 if(is_array($value) && count($value)>1){
             //                      //echo'add';echo'<pre>';print_r($value);
             //                  $icnt=count($value);
             //                  for($k=0;$k<$icnt;$k++){
             //                  $date=date('Y-m-d H:i:s');
             //                  $update_data=array(
             //                 'image'=>$value[$k],
             //                 'created_date'=>$date
             //                 ) ;
             //                 echo'<pre>';print_r($update_data); 
             //                 // echo $key; 
             //                  //$this->db->insert('product_attribute_image',$update_data);
                             
             //                  } 
             //                }
             //                else{
             //                  //echo'update';echo'<pre>';print_r($value);
             //                 $date=date('Y-m-d H:i:s');
             //                  $update_data=array(
             //                 'image'=>$value[0],
             //                 'created_date'=>$date
             //                 ) ;
             //                //print_r($update_data); 
             //               // echo $key; 
             //                 $this->db->where('id',$key); 
             //                // $this->db->update('product_attribute_image',$update_data);
             //                 }
             //                 //echo $this->db->last_query();
             //                }   
        
      
  }  
   public function update_product_details($insert_data,$eid){
        $this->db->where('id',$eid);
        $res=$this->db->update('tbl_products',$insert_data);
        
    }

    function update_product($update_data,$id){
         $this->db->where('id',$id);
         $res=$this->db->update('tbl_products',$update_data);
        //echo $this->db->last_query();
         return $res;
     }   
   function cat_list(){
         $this->db->select("*");
         $this->db->from("category_details");
         $this->db->order_by("id","desc");
         //$this->db->where('status','1');
         $query=$this->db->get();
         $res=$query->result();
         return $res;

   } 
   function brand_list(){
         $this->db->select("*");
         $this->db->from("brand_details");
         $this->db->order_by("id","desc");
         $query=$this->db->get();
         $res=$query->result();
         return $res;

   }
function company_list(){
         $this->db->select("*");
         $this->db->from("company_details");
         $this->db->order_by("id","desc");
         $query=$this->db->get();
         $res=$query->result();
         return $res;

   }
   function cms_list(){
    $this->db->select("*");
    $this->db->from("tbl_cms");
    $this->db->order_by("id","desc");
    $query=$this->db->get();
    
    $res=$query->result();
    return $res;
  }
  function email_list(){
    $this->db->select("*");
    $this->db->from("email_message");
    $this->db->order_by("id","desc");
    $query=$this->db->get();
    
    $res=$query->result();
    return $res;
  } 
  function contact_list(){
    $this->db->select("*");
    $this->db->from("tbl_contact");
    $this->db->order_by("id","desc");
    $query=$this->db->get();
    
    $res=$query->result();
    return $res;
  }  
function charity_list(){
  $this->db->select("*");
  $this->db->from("tbl_charity");
  $this->db->order_by("id","desc");
  $query=$this->db->get();
  $res=$query->result();
  return $res;

}
function news_list(){
  $this->db->select("*");
  $this->db->from("news_latter");
  $this->db->group_by('news_latter.email');
  $this->db->order_by("id","desc");
  $query=$this->db->get();
  $res=$query->result();
  return $res;

}
function bin_win_product_list(){
  $this->db->select("*");
  $this->db->from("tbl_bin_win_product");

  $this->db->order_by("id","desc");
  $query=$this->db->get();
  $res=$query->result();
  return $res;

}
function blog_list(){
  $this->db->select("*");
  $this->db->from("tbl_blog");
  if(isset($_GET['parent_id']) && !empty($_GET['parent_id'])){
    $this->db->where('parent_id',$_GET['parent_id']);
  }else{
    $this->db->where('parent_id',0);
  }
  $this->db->order_by("id","desc");
  $query=$this->db->get();
  $res=$query->result();
  return $res;

}
     function slider_list(){
         $this->db->select("*");
         $this->db->from("top_home_silider");
         $this->db->order_by("id","desc");
         $query=$this->db->get();
         $res=$query->result();
         return $res;

   }
    function all_attribute_list(){
         $this->db->select("*");
         $this->db->from("attribute_details");
         // $this->db->join ("attribute_group_details",'attribute_group_details.id=attribute_details.attribute_group_id');
         $this->db->order_by("id","desc");
         $query=$this->db->get();
         $res=$query->result();
         return $res;
      }
    function attribute_list(){
         $this->db->select("*");
         $this->db->from("attribute_details");
         // $this->db->join ("attribute_group_details",'attribute_group_details.id=attribute_details.attribute_group_id');
         $this->db->order_by("id","desc");
         $query=$this->db->get();
         $res=$query->result();
         return $res;
      } 
       function master_field_list(){
         $this->db->select("*");
         $this->db->from("tbl_fields");
         // $this->db->join ("attribute_group_details",'attribute_group_details.id=attribute_details.attribute_group_id');
         $this->db->order_by("id","desc");
         $query=$this->db->get();
         $res=$query->result();
         return $res;
      } 
function attribute_group_list(){
         $this->db->select("attribute_allocation.id,attribute_allocation.cat_id,attribute_allocation.sub_cat_id,attribute_allocation.sub_cat_child_id,attribute_allocation.attribute_id,category_details.category_name");
         $this->db->from("attribute_allocation");
         $this->db->join("category_details","category_details.id=attribute_allocation.cat_id");
         $this->db->order_by("attribute_allocation.id","desc");
         $query=$this->db->get();
       //echo $this->db->last_query();
         $res=$query->result();
         return $res;
      }  

function get_att($att_id){
  if(!empty($att_id)){ 
  $this->db->select("*");
  $this->db->from("attribute_details");
  $this->db->where_in("id",$att_id);
  //$this->db->order_by('attribute_details.id','desc');
  $query=$this->db->get();
  // echo $this->db->last_query();
  $res=$query->result();
  return $res;
   }
 }

  function sub_cat_lists(){
         $this->db->select("sub_category_details.id,sub_category_details.sub_category_name");
         $this->db->from("sub_category_details");
         $this->db->order_by("id","desc");
         //$this->db->where('status','1');
         $query=$this->db->get();
         $res=$query->result();
         return $res;
} 
 function sub_sub_cat_lists(){
         $this->db->select("*");
         $this->db->from("sub_child_category_details");
         $this->db->order_by("id","desc");
         //$this->db->where('status','1');
         $query=$this->db->get();
         $res=$query->result();
         return $res;

   }

 function sub_cat_list(){
         $this->db->select("sub_category_details.id,category_details.category_name,sub_category_details.sub_category_name,sub_category_details.image_url,sub_category_details.description,sub_category_details.meta_title,sub_category_details.meta_description,sub_category_details.meta_keyword,category_details.category_name");
         $this->db->from("sub_category_details");
         $this->db->join("category_details",'category_details.id=sub_category_details.cat_id');
         $this->db->order_by("sub_category_details.id","desc");
         //$this->db->where('status','1');
         $query=$this->db->get();
         $res=$query->result();
         return $res;
   } 
 public function deletes1($table, $field, $delete_id) {
        $this->db->trans_start();
        $this->db->delete($table, array($field => $delete_id));
        $this->db->trans_complete();
        return ($this->db->trans_status() === FALSE) ? FALSE : TRUE;
    }  

 function sub_child_cat_list(){
         $this->db->select("category_details.category_name,sub_child_category_details.id,sub_child_category_details.sub_child_category_name,sub_child_category_details.image_url,sub_child_category_details.description,sub_child_category_details.meta_title,sub_child_category_details.meta_description,sub_child_category_details.meta_keyword,sub_child_category_details.sub_child_category_name");
         $this->db->from("sub_child_category_details");
         //$this->db->join ("sub_category_details",'sub_child_category_details.cat_id=sub_category_details.sub_cat_id');
         $this->db->join ("category_details",'category_details.id=sub_child_category_details.cat_id');
         $this->db->order_by("sub_child_category_details.id","desc");
         //echo $this->db->last_query();
         //$this->db->where('status','1');
         $query=$this->db->get();
         $res=$query->result();
         return $res;
   } 


 function single_cat_list($cat_id){
         $this->db->select("*");
         $this->db->from("category_details");
         $this->db->where('id',$cat_id);
         $query=$this->db->get();
         //echo $this->db->last_query();
         $res=$query->row();
         return $res;
        }
      function single_brand_list($cat_id){
         $this->db->select("*");
         $this->db->from("brand_details");
         $this->db->where('id',$cat_id);
         $query=$this->db->get();
         //echo $this->db->last_query();
         $res=$query->row();
         return $res;
        }
        function single_comp_list($cat_id){
         $this->db->select("*");
         $this->db->from("company_details");
         $this->db->where('id',$cat_id);
         $query=$this->db->get();
         //echo $this->db->last_query();
         $res=$query->row();
         return $res;
        }
        function single_cms_list($id){
          $this->db->select("*");
          $this->db->from("tbl_cms");
          $this->db->where('id',$id);
          $query=$this->db->get();
         
          $res=$query->row();
          return $res;
         }
          function single_email_list($id){
          $this->db->select("*");
          $this->db->from("email_message");
          $this->db->where('id',$id);
          $query=$this->db->get();
         
          $res=$query->row();
          return $res;
         }
         function single_charity_list($id){
          $this->db->select("*");
          $this->db->from("tbl_charity");
          $this->db->where('id',$id);
          $query=$this->db->get();
         
          $res=$query->row();
          return $res;
         }
         function add_bin_win($id){
          $this->db->select("*");
          $this->db->from("tbl_bin_win_product");
          $this->db->where('id',$id);
          $query=$this->db->get();
         
          $res=$query->row();
          return $res;
         }

         function single_blog_list($id){
          $this->db->select("*");
          $this->db->from("tbl_blog");
          $this->db->where('id',$id);
          $query=$this->db->get();
         
          $res=$query->row();
          return $res;
         }
        
    function single_slider_list($cat_id){
         $this->db->select("*");
         $this->db->from("top_home_silider");
         $this->db->where('id',$cat_id);
         $query=$this->db->get();
         //echo $this->db->last_query();
         $res=$query->row();
         return $res;
        }
        function single_attribute_list($cat_id){
         $this->db->select("*");
         $this->db->from("attribute_details");
         $this->db->where('id',$cat_id);
         $query=$this->db->get();
         //echo $this->db->last_query();
         $res=$query->row();
         return $res;
        }
        
        function single_attribute_group_list($cat_id){
         $this->db->select("*");
         $this->db->from("attribute_allocation");
         $this->db->where('id',$cat_id);
         $query=$this->db->get();
         //echo $this->db->last_query();die;
         $res=$query->row();
         return $res;
        }

  

       function single_sub_cat_list($cat_id){
         $this->db->select("*");
         $this->db->from("sub_category_details");
         $this->db->where('id',$cat_id);
         $query=$this->db->get();
         //echo $this->db->last_query();
         $res=$query->row();
         return $res;
        }
      function single_child_cat_list($cat_id){
         $this->db->select("*");
         $this->db->from("sub_child_category_details");
         $this->db->where('id',$cat_id);
         $query=$this->db->get();
         //echo $this->db->last_query();
         $res=$query->row();
         return $res;
        }
        function single_pro_data($cat_id){
         $this->db->select("*");
         $this->db->from("tbl_products");
         $this->db->where('id',$cat_id);
         $query=$this->db->get();
         //echo $this->db->last_query();
         $res=$query->row();
         return $res;
        }
function get_attribute_details($p_id){
         $this->db->select("*");
         $this->db->from("tbl_product_attribute");
         $this->db->where('product_id',$p_id);
         $query=$this->db->get();
         //echo $this->db->last_query();
         $res=$query->result();
         return $res;
        }
function Get_attribute_image_details($attr_id){
         $this->db->select("*");
         $this->db->from("product_attribute_image");
         $this->db->where('attr_id',$attr_id);
         $query=$this->db->get();
         //echo $this->db->last_query();
         $res=$query->result();
         return $res;
        }
 function get_duplicate($tab,$col,$value){
         $this->db->select("*");
         $this->db->from("$tab");
         $this->db->where($col,$value);
         $query=$this->db->get();
         //echo $this->db->last_query();
         $res=$query->num_rows();
         return $res;
        }


  function update_product_data($update_data,$cat_id){
         $this->db->where('id',$cat_id);
         $res=$this->db->update('category_details',$update_data);
        // echo $this->db->last_query();
         return $res;
     }  
    function update__data($update_data,$cat_id){
         $this->db->where('id',$cat_id);
         $res=$this->db->update('brand_details',$update_data);
        //echo $this->db->last_query();
         return $res;
     }
     
     function save_cms_data($update_data,$id=""){
      $this->db->where('id',$cat_id);
      $res=$this->db->update('brand_details',$update_data);
     //echo $this->db->last_query();
      return $res;
  }
    function update_slider_data($update_data,$cat_id){
         $this->db->where('id',$cat_id);
         $res=$this->db->update('top_home_silider',$update_data);
       // echo $this->db->last_query();
         return $res;
     }  
  function update_attribute_data($update_data,$cat_id){
         $this->db->where('id',$cat_id);
         $res=$this->db->update('attribute_details',$update_data);
        echo $this->db->last_query();
         return $res;
     }  
  function update_attribute_group_data($update_data,$attr_id){
         $this->db->where('id',$attr_id);
         $res=$this->db->update('attribute_allocation',$update_data);
        //echo $this->db->last_query();
         return $res;
     }        
  function update_sub_cat_data($update_data,$cat_id){
         $this->db->where('id',$cat_id);
         $res=$this->db->update('sub_category_details',$update_data);
        // echo $this->db->last_query();
         return $res;
     } 
function update_sub_child_cat_data($update_data,$cat_id){
         $this->db->where('id',$cat_id);
         $res=$this->db->update('sub_child_category_details',$update_data);
         echo $this->db->last_query();
         return $res;
     } 

    function update_brand_data($update_data,$cat_id){
         $this->db->where('id',$cat_id);
         $res=$this->db->update('brand_details',$update_data);
        //echo $this->db->last_query();
         return $res;
     }
function update_comp_data($update_data,$cat_id){
         $this->db->where('id',$cat_id);
         $res=$this->db->update('company_details',$update_data);
        //echo $this->db->last_query();
         return $res;
     }
     function all_win_product(){
        // $this->db->select("*");
       //  $this->db->from("tbl_bin_win_product");
       //  $this->db->order_by("id","desc");
         //$this->db->join('system_role', 'system_role.id = system_admin.user_role');
         //$this->db->where('status','1');
         //$query=$this->db->get();
         $query = $this->db->query("SELECT 
  twin.id,
  twin.`bin_id`,
  twin.`win_id`,
  tp.`product_name` as primary_name ,
  tps.`product_name` as seconday_name
FROM
  `tbl_bin_win_product` AS twin 
  LEFT JOIN `tbl_products` AS tp 
    ON tp.`id` = twin.`bin_id` 
    LEFT JOIN `tbl_products` AS tps 
    ON tps.`id` = twin.`win_id` ORDER BY twin.id DESC");
         $res=$query->result();
         return $res;


   } 
   // Code added by Vinod Kumar Pal on 27062020
    public function getAllProductRecord()
    {
        $result = array();
       // $this->db->where("is_deleted",'0');
        $this->db->select('product_name,id');
        $query=$this->db->get('tbl_products');

        if($query->num_rows()>0)
        {
            return $query->result_array();
        }else{
            return false;
        }
    }
     public function delete_data($table, $field, $delete_id) {
        $this->db->trans_start();
        $this->db->delete($table, array($field => $delete_id));
        $this->db->trans_complete();
        return ($this->db->trans_status() === FALSE) ? FALSE : TRUE;
    }  

}