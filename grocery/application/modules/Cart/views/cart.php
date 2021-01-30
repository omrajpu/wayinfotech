<?php
//error_reporting(1);
//echo"ghhj";
//die;
//echo phpinfo();
//die;
?>
 <section class="pt-3 pb-3 page-info section-padding border-bottom bg-white">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <a href="#"><strong><span class="mdi mdi-home"></span> Home</strong></a> <span class="mdi mdi-chevron-right"></span> <a href="#">Cart</a>
               </div>
            </div>
         </div>
      </section>
      <section class="cart-page section-padding">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="card card-body cart-table">
                     <div class="table-responsive">
                        <table class="table cart_summary">
                           <thead>
                              <tr>
                                 <th class="cart_product">Product</th>
                                 <th>Description</th>
                                 <th>Avail.</th>
                                 <th>Unit price</th>
                                 <th>Qty</th>
                                 <th>Total</th>
                                 <th class="action"><i class="mdi mdi-delete-forever"></i></th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php 
                               $this->load->library('cart');
                               $cart = $this->cart->contents();
                               //print_r($cart);
                                //echo $this->cart->total_items();
                                  if($cart = $this->cart->contents()){
                                    $i = 0;
                                   foreach($cart as $item){
                                     $rowid="'".$item['rowid']."'";
                                echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                                echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                                echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                                echo form_hidden('cart[' . $item['id'] . '][margin_price]', $item['margin_price']);
                                echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
                                  $item_id="'".$item['id']."'";
                                    ?>
                              <tr>
                                 <td class="cart_product"><a href="#"><img class="img-fluid" src="<?php echo site_url(); ?>admin/upload/product_images/<?php echo @$item['image'];?>" alt=""></a></td>
                                 <td class="cart_description">
                                    <h5 class="product-name"><a href="#"><?php echo $item['name'];?> </a></h5>
                                    <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - <?php echo $item['weight'];?> <?php echo $item['product_amu'];?></h6>
                                 </td>
                                 <td class="availability in-stock"><span class="badge badge-success">In stock</span></td>
                                 <td class="price"><span>₹ <?php echo number_format($item['margin_price'],2);?></span></td>

                                 <td class="qty">

                                    <div class="input-group">
                                       <span class="input-group-btn"><button  onclick="decrement_quantity(<?php echo $item_id;?>,<?php echo $rowid;?>,<?php echo $item['margin_price'];?>,<?php echo $item['qty'];?>)" class="btn btn-theme-round btn-number" type="button">-</button></span>

                                       <input readonly  class="form-control border-form-control form-control-sm input-number" type="text" id="cart_<?php echo $item['id'];?>" name="cart[<?php echo $item['id'];?>]" value="<?php echo $item['qty'];?>">
                                       <span class="input-group-btn">
                                       <button onclick="increment_val(<?php echo $item_id;?>,<?php echo $rowid;?>,<?php echo @$item['margin_price'];?>)"class="btn btn-theme-round btn-number" type="button">+</button>
                                       </span>
                                    </div>
                                 </td>
                                 <td class="price">
                                 <span id="row_subtotal_<?php echo $item['id'];?>">₹ <?php
                                      $subtotal=$item['qty']*$item['margin_price'];
                                    echo number_format(@$subtotal,2);
                                   ?></span>
                                </td>
                                 <td class="action">
                                    <a class="btn btn-sm btn-danger" data-original-title="Remove" href="<?php echo base_url();?>Cart/remove/<?php echo @$item['rowid'];?>" title="" data-placement="top" data-toggle="tooltip"><i class="mdi mdi-close-circle-outline"></i></a>
                                 </td>
                              </tr>
                              <?php  @$grand_total = $grand_total + $item['margin_price'] * $item['qty'];?>
                           <?php }}?>
                            </tbody>
                           <tfoot>
                              <!-- <tr>
                                 <td colspan="1"></td>
                                 <td colspan="4">
                                    <form class="form-inline float-right">
                                       <div class="form-group">
                                          <input type="text" placeholder="Enter discount code" class="form-control border-form-control form-control-sm">
                                       </div>
                                       &nbsp;
                                       <button class="btn btn-success float-left btn-sm" type="submit">Apply</button>
                                    </form>
                                 </td>
                                 <td colspan="2">Discount : $237.88 </td>
                              </tr> -->
                              <!-- <tr>
                                 <td colspan="2"></td>
                                 <td class="text-right"  colspan="3">Total products (tax incl.)</td>
                                 <td colspan="2">$437.88 </td>
                              </tr> -->
                              <tr>
                                 <td class="text-right" colspan="5"><strong>Grand Total</strong></td>
                                 <td class="text-danger" colspan="2"><strong> <span  id="allamnt_old">
                               <i class='fa fa-inr'>₹</i>
                               <?php echo number_format(@$grand_total,2);?>
                            </span> </strong></td>
                              </tr>
                           </tfoot>
                        </table>
                     </div>
                     <a href="<?php echo base_url();?>Checkout/checkout"><button class="btn btn-secondary btn-lg btn-block text-left" type="button"><span class="float-left"><i class="mdi mdi-cart-outline"></i> Proceed to Checkout </span><span class="float-right"><strong> <span  class="allamnt2_old">
                     <i class='fa fa-inr'>₹ </i>
                    <?php echo number_format(@$grand_total,2);?>
                     </span></strong><span class="mdi mdi-chevron-right"></span></span></button></a>
                  </div>
                 
               </div>
            </div>
         </div>
      </section>
      <section class="section-padding bg-white border-top">
         <div class="container">
            <div class="row">
               <div class="col-lg-4 col-sm-6">
                  <div class="feature-box">
                     <i class="mdi mdi-truck-fast"></i>
                     <h6>Free & Next Day Delivery</h6>
                     <p>Lorem ipsum dolor sit amet, cons...</p>
                  </div>
               </div>
               <div class="col-lg-4 col-sm-6">
                  <div class="feature-box">
                     <i class="mdi mdi-basket"></i>
                     <h6>100% Satisfaction Guarantee</h6>
                     <p>Rorem Ipsum Dolor sit amet, cons...</p>
                  </div>
               </div>
               <div class="col-lg-4 col-sm-6">
                  <div class="feature-box">
                     <i class="mdi mdi-tag-heart"></i>
                     <h6>Great Daily Deals Discount</h6>
                     <p>Sorem Ipsum Dolor sit amet, Cons...</p>
                  </div>
               </div>
            </div>
         </div>
      </section>
       <script type="text/javascript">
    function increment_val(cart_id,rowid,price,qty){
    //alert(cart_id);

    //return false;
     var da=$("#cart_"+cart_id).val();
     var inputQuantityElement = $("#cart_"+cart_id);
     var newQuantity = parseInt(da)+1;
     var row_subtotal=Math.floor(price*newQuantity);
    // alert(row_subtotal);
     $("#row_subtotal_"+cart_id).html('₹ '+row_subtotal+'.00');
     $("#cart_"+cart_id).val(newQuantity);
     $.ajax({
          url:"<?php echo base_url();?>"+'Cart/update_cart_ajax',
          type:'POST',
          data:{cart_id:cart_id,row_id:rowid,price:price,qty:newQuantity},
          success:function(result){
            //alert(result);
            $("#allamnt").html(result);
            $(".allamnt2").html(result);
            //window.location.href="<?php echo base_url();?>Cart/add";
          }
      })
     
   } 
 function decrement_quantity(cart_id,rowid,price,qty){
    // alert(cart_id);
     var da=$("#cart_"+cart_id).val();
     var inputQuantityElement = $("#cart_"+cart_id);
     if($(inputQuantityElement).val() > 1) 
     {
      var newQuantity = parseInt(da)-1;
      //alert(newQuantity);
      $("#cart_"+cart_id).val(newQuantity);
     var row_subtotal=Math.floor(price*newQuantity);
     $("#row_subtotal_"+cart_id).html('₹ '+row_subtotal+'.00');
     $("#cart_"+cart_id).val(newQuantity);
      $.ajax({
          url:"<?php echo base_url();?>"+'Cart/update_cart_ajax',
          type:'POST',
          data:{cart_id:cart_id,row_id:rowid,price:price,qty:newQuantity},
          success:function(result){
            $("#allamnt").html(result);
            $(".allamnt2").html(result);
            //window.location.href="<?php echo base_url();?>Cart/add";
          }
      })
     }
   } 

  </script>