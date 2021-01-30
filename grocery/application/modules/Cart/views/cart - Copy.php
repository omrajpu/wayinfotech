   <?php
       $this->load->library('cart');
          $cart = $this->cart->contents();
        // echo'<pre>';print_r($cart);
          ?>

       <main id='main-wrapper'>
   <div class='desktop-view'></div>
   <!-- desktop-view close -->
   <div class='mobile-view'></div>
   <!-- mobile-view close -->
   <section class='checkout-section'>
      <h2 class='section-heading inner-heading mobile-heading-section'>
         <span class='heading02'>Cart</span>
         <span class='heading03'>Your Items</span>
      </h2>
      <div class='container checkout-wrapper'>
         <div class='checkout-left'>
            <div class='order-confirm-section cart-section'>
               <div class='order-confirm-wrapper'>
                  <div class='my-order-detail'>
                     <div class='my-order-description'>
                        <div class='order-confirm-header'>
                           <div class='order-img'>Items</div>
                           <div class='order-desc-dlt'>
                              <div class='order-product-dlt'>Description</div>
                              <div class='order-price'>Price</div>
                              <div class='order-size'>Size</div>
                              <div class='order-qty'>Qty</div>
                              <div class='order-subtotal'>Subtotal</div>
                           </div>
                           <div class='clear'></div>
                        </div>
                        <?php
                             if($cart = $this->cart->contents()){
                              $grand_total = 0;
                              $i = 1;
                              foreach($cart as $item)
                                {
                                  $rowid="'".$item['rowid']."'";
                                echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                                echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                                echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                                echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
                                echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
                                 ?>
                        <div class='order-desc-box'>
                         
                           
                           <div class='order-img'>
                              <a href=''>
                              <img alt='Elegant Black Juti' src='<?php echo base_url();?>admin/upload/product_images/<?php echo $item['image']?>'>
                              </a>
                           </div>

                           <div class='order-desc-dlt'>
                              <div class='order-product-dlt'>
                                 <h3 class='heading03'>
                                    <a href='/elegant-black-juti-JUTI113-310'><?php echo $item['name'];?></a>
                                 </h3>
                              </div>
                              <div class='order-price'>
                                 <p><i class='rupee'></i> ₹ <?php
                                   echo number_format(@$item['price'],2);
                                 ?>
                                </p>
                              </div>
                              <div class='order-size size_edit_755452'>
                                <div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /><input name="_method" type="hidden" value="put" /></div>
                                    <input id="product_id" name="product_id" type="hidden" value="781" />
                                    <input id="quantity" name="quantity" type="hidden" value="1" />
                                    <div class='form-box'>
                                       <div class='input-box'>
                                          <div class='custom-select'>
                                             <select class="change_size_cart_page" id="product_size_id" name="product_size_id">
                                               <option value="S" <?php if(@$item['size']=='S'){ echo'selected="selected"';}?>>S</option>
                                                <option value="M" <?php if(@$item['size']=='M'){ echo'selected="selected"';}?>>M</option>
                                                <option value="L" <?php if(@$item['size']=='L'){ echo'selected="selected"';}?>>L</option>
                                                <option value="XL" <?php if(@$item['size']=='XL'){ echo'selected="selected"';}?>>XL</option>
                                                <option value="XXL" <?php if(@$item['size']=='XXL'){ echo'selected="selected"';}?>>XXL</option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                              </div>
                              <div class='order-qty quantity_edit_755452'>
                                  <div class="value-button" id="decrease"style="float:left;" onclick="decrement_quantity(<?php echo $item['id'];?>,<?php echo $rowid;?>,<?php echo $item['price'];?>,<?php echo $item['qty'];?>)" value="Decrease Value">-</div>
                                 <div class='quantity-count'>
                                 
                                <input readonly style="height:100%;" class="qty" type="text" id="cart_<?php echo $item['id'];?>" name="cart[<?php echo $item['id'];?>]" value="<?php echo $item['qty'];?>" maxlength="3" size="1">
                                 
                              </div>
                              <div class="value-button" id="increase"style="float:right;" onclick="increment_val(<?php echo $item['id'];?>,<?php echo $rowid;?>,<?php echo @$item['price'];?>)" value="Increase Value">+</div>
                              </div>
                              <div class='order-subtotal'>
                                 <p class='cart-price' id='item_subtotal_755452'>
                                    <!-- <i class='fa fa-inr'></i> -->
                                  <span id="row_subtotal_<?php echo $item['id'];?>">₹ <?php
                                      $subtotal=$item['qty']*$item['price'];
                                    echo number_format(@$subtotal,2);
                                   ?></span>
                                 </p>
                              </div>
                              <div class='clear'></div>
                              <div class='product-dlt' style="margin-bottom: 0px!important;">
                                 <p>
                                    <span>SKU  :</span>
                                    <span class='grey'>KURTA113-310-6</span>
                                 </p>
                               <!--   <p>
                                    <span>Colour  :</span>
                                    <span>Black</span>
                                 </p> -->
                                 <p>
                                    <span>Size  :</span>
                                    <span id="size"><?php echo @$item['size'];?></span>
                                 </p>
                                 <p>
                                    <span>Net Quantity  :</span>
                                    <span id="net"><?php echo @$item['qty'];?> N</span>
                                 </p>
                                 
                              </div>
                               <!-- <a style="float: right;" data-confirm="Are you sure you would like to remove this item from the shopping cart?" href="<?php echo base_url();?>Cart/remove/<?php echo @$item['rowid'];?>" type="button"><button style="color: red" type="button" class="close" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button></a> --><a style="float: right; position: absolute; right: 10px; top: 7px;" data-confirm="Are you sure you would like to remove this item from the shopping cart?" href="<?php echo base_url();?>Cart/remove/<?php echo @$item['rowid'];?>" type="button"><button style="color: red" type="button" class="close" aria-label="Close">
      <span aria-hidden="true" style="font-weight: 900;">&times;</span>
    </button></a>
                           </div>
                           <div class='clear'></div>

                        </div>
                       <?php  $grand_total = $grand_total + $item['price'] * $item['qty'];?>
                     <?php } }?>
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class='checkout-right cart-right'>
            <h2 class='summary-heading mob-hide'>
               <span>Order Summary</span>
            </h2>
            <div class='order-summary-total'>
               <ul>
                  <li>
                     <label>Subtotal</label>
                     <span  id="allamnt">
                     <i class='fa fa-inr'></i>
                    <?php echo number_format(@$grand_total,2);?>
                     </span>
                  </li>
                  <li class='order-total'>
                     <label>ORDER TOTAL</label>
                     <span  class="allamnt2" id='grand_total'>
                     <i class='fa fa-inr'></i>
                     <?php echo number_format(@$grand_total,2);?>
                     </span>
                  </li>
               </ul>
               <p class='inclusive-text'>Inclusive of all taxes</p>
               <div class='buy_free_shipping'>
               </div>
               <a class='btn red-btn l-btn checkout-btn' href='<?php echo base_url();?>Checkout/checkout'>
               Checkout
               <i class='sprite arrow-icon'></i>
               </a>
               <a class='btn red-btn l-btn checkout-btn' href='<?php echo base_url();?>'>
               Shoping
               <i class='sprite arrow-icon'></i>
               </a>
            </div>
         </div>
         <div class='clear'></div>
         <!-- %button.btn.border-btn.l-border-btn.shopping-btn -->
         <!-- %span.frst-span -->
         <!-- %span.scnd-span -->
         <!-- %i.sprite.arrow-icon -->
         <!-- %a{href: url} -->
         <!-- Continue Shopping -->
         <!-- .secure-box.desk-hide -->
         <!-- %ul -->
         <!-- %li -->
         <!-- %a 100% Secure -->
      </div>
   </section>
   <p style='min-height: 25px;'></p>
   <section class='usp-section listingpage-usp-section mob-hide'>
      <div class='usp-wrapper'>
         <figure class='usp-box'>
            <div class='ups-icon'>
               <i class='sprite star-icon'></i>
            </div>
            <figcaption>
               <h2 class='usp-heading'>satisfied Customers</h2>
               <p class='usp-content'>3,00,000+</p>
            </figcaption>
         </figure>
         <!-- usp-box close -->
         <figure class='usp-box'>
            <div class='ups-icon'>
               <i class='sprite ethnic-icon'></i>
            </div>
            <figcaption>
               <h2 class='usp-heading'>Ethnic Wear</h2>
               <p class='usp-content'>Made in India</p>
            </figcaption>
         </figure>
         <!-- usp-box close -->
         <figure class='usp-box'>
            <div class='ups-icon'>
               <i class='sprite shipping-icon'></i>
            </div>
            <figcaption>
               <h2 class='usp-heading'>
                  Free Shipping in India
               </h2>
               <p class='usp-content'>Fast Delivery</p>
            </figcaption>
         </figure>
         <figure class='usp-box'>
            <div class='ups-icon'>
               <i class='sprite flight-icon'></i>
            </div>
            <figcaption>
               <h2 class='usp-heading'>International Shipping</h2>
               <p class='usp-content'>6 Countries</p>
            </figcaption>
         </figure>
         <!-- usp-box close -->
      </div>
   </section>
   <section class='mob-usp-section mobile-view listing-usp'>
      <div class='container'>
         <div class='mob-usp-box'>
            <i class='sprite mob-usp-icon star-icon'></i>
            <p>happy &amp; satisfied Customers</p>
         </div>
         <div class='mob-usp-box'>
            <i class='sprite mob-usp-icon del-icon'></i>
            <p>Cash on Delivery in India</p>
         </div>
         <div class='mob-usp-box'>
            <i class='sprite mob-usp-icon ship-icon'></i>
            <p>
               Free Shipping in India
            </p>
         </div>
         <div class='mob-usp-box'>
            <i class='sprite mob-usp-icon int-icon'></i>
            <p>International Shipping</p>
         </div>
      </div>
   </section>
</main>
<div class='sucess-loader-overlay'></div>
<div id='loader'>
   <img alt='main loader' src='https://images.manyavar.com/assets/loading_icon.gif'>
</div>
<div class='clear'></div>

 <script type="text/javascript">
    function increment_val(cart_id,rowid,price,qty){
    //alert(cart_id);
     var da=$("#cart_"+cart_id).val();
     var inputQuantityElement = $("#cart_"+cart_id);
     var newQuantity = parseInt(da)+1;
     var row_subtotal=Math.floor(price*newQuantity);
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