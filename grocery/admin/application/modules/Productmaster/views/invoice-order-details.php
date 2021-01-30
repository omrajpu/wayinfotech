      <html>
      <body>
      <table width='750' border='0' align='center' cellpadding='0' cellspacing='0'>
        <tbody>
            
            <tr>
                <td align='left' valign='top' class='maincontainer' style='font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #373737; background-color: #fff; padding: 20px; border: solid 1px #bcc2cf'>
                    
                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                        <tbody>
                            <tr>
                                <td align='left' valign='top' class='innercontainer' style='background-color: #fff; padding:9px; border: solid 1px #dbdfe6'>
                                  <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                <tbody>
                                    <tr><td> 
  <?php //print_r(@$product_details);
    $order_date=explode(' ',@$checkout_data[0]->order_date);
  ?>
<img src='http://stage.wayinfotechsolutions.co/jamairaja/images/jamai1.png' style='width:150px'></td><td align='right'><strong>GST: 09AADCB0282B2Z5</strong>&nbsp;<button onclick="window.print()">Print Invoice/Pdf</button></td></tr>
                                    <tr><td colspan='2' align='center'><h2 style='font-size:36px; margin-top:0; color:#000'>Invoice # <?php echo @$checkout_data[0]->province?></h2></td></tr>
                                    <tr><td colspan='2'>
                                    </td></tr>
                                 </tbody>
                            </table>


                                    <table width='100%' border='0' cellspacing='0' cellpadding='6' class='innerborder' style='border: solid 1px #E4E6EB; font-size: 11px; color: #373737;'>
                                        <tbody>
                                            <tr class='tableinner'>
                                                <td width='50%' height='18' align='left' valign='middle' style='background-color: #f7f7f7'><strong>Order id</strong></td>
                                                
                                                <td width='25%' height='18' align='left' valign='middle' style='background-color: #f7f7f7; border-left: solid 1px #E4E6EB'><strong>Order Date</strong></td>
                                                <td width='25%' height='18' align='left' valign='middle' style='background-color: #f7f7f7; border-left: solid 1px #E4E6EB'><strong>Order Time</strong></td>
                                            </tr>
                                            <tr>
                                                <td colspan='3' align='left' valign='middle' class='divider' height='1' style='background-color: #E4E6EB; padding:0px'></td>
                                            </tr>
                                            <tr>
                                                <td width='47%' height='18' align='left' valign='middle'><?php echo @$checkout_data[0]->province?></td>
                                                <td width='18%' height='18' align='left' valign='middle' style='border-left: solid 1px #E4E6EB'><?php echo @$order_date[0]?></td>
                                                <td width='18%' height='18' align='left' valign='middle' style='border-left: solid 1px #E4E6EB'><?php echo @$order_date[1]?></td>
                                            </tr>
                                        </tbody>
                                    </table><br>
                                    <table width='100%' border='0' cellspacing='0' cellpadding='6' style='border: solid 1px #E4E6EB'>
                                        <tbody>
                                            <tr>
                                                <td width='50%' height='25' align='left' valign='middle' class='title' style='font-size: 15px; color: #0072c6; border-bottom: solid 1px #dbdfe6'>Billing Details</td>
                                                <td width='50%' height='25' align='left' valign='middle' class='title' style='font-size: 15px; color: #0072c6; border-bottom: solid 1px #dbdfe6; border-left: solid 1px #E4E6EB'>Delivery Details</td>
                                            </tr>
                                            <tr>
                                                <td width='50%' align='left' valign='top'>
                                                    <table width='100%' style='font-size: 11px; color: #373737' border='0' cellspacing='0' cellpadding='4'>
                                                        <tbody>
                                                            <tr>
                                                                <td valign='top'><strong>Name:</strong><?php echo @$checkout_data[0]->firstname;?></td>
                                                            </tr>
                                                            <tr>
                                                                <td valign='top' style='font-size: 11px; color: #373737'><strong>Mobile:</strong><?php echo @$checkout_data[0]->phone;?></td>
                                                            </tr>
                                                            <tr>
                                                                <td valign='top'><strong>Email:</strong> <?php echo @$checkout_data[0]->email;?></td>
                                                            </tr>
                                                            <tr>
                                                                <td valign='top'><strong>Address:</strong><?php echo @$checkout_data[0]->billing_address1;?><?php echo @$checkout_data[0]->billing_city;?><?php echo @$checkout_data[0]->billing_state;?><?php echo @$checkout_data[0]->billing_country;?><?php echo @$checkout_data[0]->billing_zip;?></td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td valign='top'><strong>Payment Mode:</strong>COD</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td width='50%' style='border-left: solid 1px #E4E6EB;' align='left' valign='top'>
                                                    <table width='100%' style='font-size: 11px; color: #373737' border='0' cellspacing='0' cellpadding='4'>
                                                        <tbody>
                                                            <tr>
                                                                <td valign='top'><strong>Name:</strong><?php echo @$checkout_data[0]->firstname;?></td>
                                                            </tr>
                                                            <tr>
                                                                <td valign='top' style='font-size: 11px; color: #373737'><strong>Mobile:</strong><?php echo @$checkout_data[0]->phone;?></td>
                                                            </tr>
                                                            <tr>
                                                                <td valign='top'><strong>Email:</strong> <?php echo @$checkout_data[0]->email;?></td>
                                                            </tr>
                                                            <tr>
                                                                <td valign='top'><strong>Address:</strong><?php echo @$checkout_data[0]->billing_address1;?><?php echo @$checkout_data[0]->billing_city;?><?php echo @$checkout_data[0]->billing_state;?><?php echo @$checkout_data[0]->billing_country;?><?php echo @$checkout_data[0]->billing_zip;?></td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td valign='top'><strong>Payment Mode:</strong>COD</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                              </tr>
                                        </tbody>
                                    </table><br>
                                    <table width='100%' border='0' cellspacing='0' cellpadding='6' class='innerborder' style='border: solid 1px #E4E6EB'>
                                        <tbody>
                                            <tr>
                                                <td height='25' colspan='4' align='left' valign='middle' class='title' style='font-size: 15px; color: #0072c6; border-bottom: solid 1px #dbdfe6'>Product Details</td>
                                            </tr>
                                            <tr class='tableinner' style='font-size: 12px; color: #373737;'>
                                                <td width='50%' height='18' align='left' valign='middle' style='background-color: #f7f7f7'><strong>Product images</strong></td>
                                                <td width='60%' height='18' align='left' valign='middle' style='font-size: 15px; color: #0072c6; border-bottom: solid 1px #dbdfe6'>Product Information</td>
                                            </tr>
                                            <tr>
                                                <td colspan='2' align='left' valign='middle' class='divider' height='1' style='background-color: #E4E6EB; padding: 0px'></td>
                                            </tr>
                                            <?php $i=1;
                                            $total=0;
                                            foreach ($product_details as $val) {
                                             $total = $total + $val->p_price;
                                             ?>
                                          <tr style='font-size: 11px; color: #373737;'>
                                                <td align='left' valign='middle'><img src='http://stage.wayinfotechsolutions.co/jamairaja/admin/upload/product_images/<?php echo @$val->p_image;?>'style='height:120px'></td>
                                                <td align='left' valign='middle' style='border-left: solid 1px #E4E6EB; line-height:20px'>
                                                    <h3 style='margin:5px 0 0; font-size:13px'><?php echo @$val->product_name;?><span style='font-weight: normal;'></span></h3>
                                                    <strong>SKU ID:</strong> <?php echo @$val->sku;?><br>
                                                    <strong>Qty:</strong> <?php echo @$val->product_qty;?><br>
                                                    <strong>Size:</strong>L<br>
                                                    <strong>Price:</strong> INR <?php echo @$val->product_qty * @$val->p_price;?>.00<br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan='4' align='left' valign='middle' class='divider' height='1' style='background-color: #E4E6EB; padding: 0px'></td>
                                            </tr>
                                          <?php 
                                            $gst_per=@$val->gst_per;
                                            $gst_type=@$val->gst_type;
                                            }
                                            if($gst_type=='Enclusive'){
                                            $cgst=$gst_per/2;
                                            $cgst_val=($total*$cgst)/100; 
                                            $sgst=$gst_per/2;
                                            $sgst_val=($total*$sgst)/100; 
                                            $total_gst=$gst_per;
                                            $total_gst_val=($total*$gst_per)/100; 
                                            $grand_total=$total+$total_gst_val;
                                           }
                                           if($gst_type=='Exclusive'){
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
                                           ?>
                                          <tr class='tableinner'>
                                                <td width='27%' height='22' align='left' valign='middle' style='font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #373737; background-color: #f7f7f7'><strong>GST type</strong></td>
                                                <td width='18%' height='22' align='left' valign='middle' style='font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #373737; background-color: #f7f7f7; border-left: solid 1px #E4E6EB'><strong><?php echo @$gst_type;?></strong></td>
                                            </tr><tr class='tableinner'>
                                                <td width='27%' height='22' align='left' valign='middle' style='font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #373737; background-color: #f7f7f7'><strong>CGST <?php @$cgst;?> </strong></td>
                                                <td width='18%' height='22' align='left' valign='middle' style='font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #373737; background-color: #f7f7f7; border-left: solid 1px #E4E6EB'><strong>INR <?php echo number_format(@$cgst_val, 2);?></strong></td>
                                            </tr>
                                            <tr class='tableinner'>
                                                <td width='27%' height='22' align='left' valign='middle' style='font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #373737; background-color: #f7f7f7'><strong>SGST <?php @$sgst;?>% </strong></td>
                                                <td width='18%' height='22' align='left' valign='middle' style='font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #373737; background-color: #f7f7f7; border-left: solid 1px #E4E6EB'><strong>INR <?php echo number_format(@$sgst_val, 2);?></strong></td>
                                            </tr>
                                            <tr class='tableinner'>
                                                <td width='27%' height='22' align='left' valign='middle' style='font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #373737; background-color: #f7f7f7'><strong>Total GST <?php @$total_gst;?> % </strong></td>
                                                <td width='18%' height='22' align='left' valign='middle' style='font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #373737; background-color: #f7f7f7; border-left: solid 1px #E4E6EB'><strong>INR <?php echo number_format(@$total_gst_val, 2);?></strong></td>
                                            </tr>
                                            <tr class='tableinner'>
                                                <td width='27%' height='22' align='left' valign='middle' style='font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #373737; background-color: #f7f7f7'><strong>Grand Total </strong></td>
                                                <td width='18%' height='22' align='left' valign='middle' style='font-family: Arial, Helvetica, sans-serif; font-size: 12px; color: #373737; background-color: #f7f7f7; border-left: solid 1px #E4E6EB'><strong> INR <?php echo number_format(@$grand_total, 2);?></strong></td>
                                            </tr>
                                        </tbody>
                                    </table><br>
                                    <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                        <tbody>
                                            <tr>
                                                <td height='25' align='left' valign='top' class='title' style='font-size: 15px; color: #0072c6; border-bottom: solid 1px #dbdfe6'>Support Details</td>
                                            </tr>
                                            <tr>
                                                <td align='left' valign='top'>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td width='412' align='left' valign='top'>
                                                    <table width='100%' border='0' cellspacing='0' cellpadding='4' style='font-family: Arial, Helvetica, sans-serif; font-size: 11px; color: #373737'>
                                                        <tbody>
                                                            <tr>
                                                                <td width='16%' valign='middle'><strong>Contact email:</strong></td>
                                                                <td width='84%' valign='middle'> <a href='mailto:jamairaja.ethnic@gmail.com'>jamairaja.ethnic@gmail.com</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td valign='top'><strong>Contact Address:</strong></td>
                                                                <td valign='middle' style='line-height:18px'>HARISHABHA COMMERCIAL COMPLEX,SABZI BAGH,PATNA,BIHAR,800004(7070886788) 
</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>

  </body>
      </html>
     