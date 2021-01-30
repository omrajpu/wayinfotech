    
        <link href="<?php echo site_url(); ?>common/cart/cart_css/owl.carousel.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>common/cart/cart_css/owl.theme.css" rel="stylesheet">
        <!-- Main Stylesheet -->
        <link href="<?php echo site_url(); ?>common/cart/cart_css/style.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>common/cart/cart_css/style01.css" rel="stylesheet">
        <!--Favicon-->
        <link rel="shortcut icon" href="<?php echo site_url(); ?>common/images/favicon.ico" type="image/x-icon">
  <main class='product-detail-wrapper' id='main-wrapper'>
            
             <section class='product-detail-section'>
                <section class="section checkout" style="padding: 0px;">
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="clearfix"></div>
                                        <div class="checkout_box">
                                            <div class="checkout_box_heading">
                                              <h2>Login or Signup</h2>
                                            </div>
                                            <?php if(@$_SESSION['userid']==''){
                                            ?>
                                            <div class="checkout_box_content">
                                                <?php
                                                if($this->session->flashdata('login_error_show')) { ?>
                                                <div role="alert" class="alert alert-danger">
                                                    <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
                                                    <?php   echo $_SESSION['login_error_show'];?>
                                                </div>
                                                <?php }
                                                if($this->session->flashdata('reg_error')) { ?>
                                                <div role="alert" class="alert alert-danger">
                                                    <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
                                                    <?php   echo $_SESSION['reg_error'];?>
                                                </div>
                                                <?php }?>
                                                 <form id="loginCheckout" method="post" action="<?php echo site_url()?>Checkout/login">
                                                    <div class="form-group">
                                                        <input type="text" name="email" required="" class="form-control" placeholder="Your Email *" value="" />
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="password" id="cpassword" name="password" required="" class="form-control" placeholder="Your Password *" value="" />
                                                        <span toggle="#cpassword" class="fa fa-fw mdi mdi-eye-settings field-icon toggle-password"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <a href="<?php echo  base_url();?>User/forget_pass" class="btnForgetPwd copf-0 pull-right">Forget Password?</a>

                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="form-group">
                                                        <input type="submit" class="btnSubmit" value="Login" />
                                                    </div>
                                                </form>
                                                
                                                <div class="rgstr-btn-show-form">
                                                    
                                                    <a href="Javascript:void(0)" id="checkoutRegisterBtn">
                                                        <p class="checkout_login_register_btn_txt">Not an user please click here to <u>Register</u></p>
                                                        <p class="checkout_login_register_btn_txt" style="display: none;">Already registered click here to <u>Login</u></p>
                                                    </a>
                                                    
                                                    <?php if($this->session->flashdata('reg_msg')) { ?>
                                                    <div role="alert"  style="color:green" class="alert alert-success">
                                                        <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
                                                        <?php   echo $_SESSION['reg_msg'];?>
                                                    </div>
                                                    <?php }
                                                    if($this->session->flashdata('alredy_reg_error')) { ?>
                                                    <div role="alert"  style="color:green" class="alert alert-danger">
                                                        <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
                                                        <?php   echo $_SESSION['alredy_reg_error'];?>
                                                    </div>
                                                    <?php }
                                                    ?>
                                                    
                                                </div>
                                                <form id="registerCheckout" action="<?php echo site_url()?>Checkout/Signup_user" method="post">
                                                    
                                                    <div class="form-group">
                                                        <input required onkeypress="return /[a-z]/i.test(event.key)" type="text" name="Name" class="form-control" placeholder="Your Name *" value="" />
                                                    </div>
                                                    <div class="form-group">
                                                        <input required type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" placeholder="Your Email *" value="" />
                                                    </div>
                                                    <div class="form-group">
                                                        <input pattern="^\d{10}$" maxlength="10"  type="tel" name="phone" class="form-control" placeholder="Your Phone *" value="" />
                                                    </div>
                                                    <div class="form-group">
                                                         <input  required  type="password" name="password" class="form-control" placeholder="Your Password *" value="" /> 
                                                        <!-- <input  required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" type="password" name="password" class="form-control" placeholder="Your Password *" value="" /> -->
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <input  type="password" name="confpassword" class="form-control" placeholder="Retype Password *" value="" />
                                                    </div> -->
                                                    <div class="form-group">
                                                        <input type="submit" class="btnSubmit" value="Sign Up" />
                                                    </div>
                                                </form>
                                            </div>
                                            <?php }?>
                                        </div>
                                    </div>
                                    <!-- Login End -->
                                    <?php
                                    $this->load->library('cart');
                                    $cart = $this->cart->contents();
                                    $grand_total_cart = 0;
                                    foreach ($cart as $item){
                                    $grand_total_cart = $grand_total_cart + $item['price']*$item['qty'];
                                    }
                                    $grand_total_cartc=$grand_total_cart;
                                    ?>
                                    <div class="col-12">
                                     <?php
                                        if($this->session->flashdata('login_msg')) { ?>
                                                <div role="alert" class="alert alert-danger">
                                                    <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
                                                    <?php   echo $_SESSION['login_msg'];?>
                                                </div>
                                                <?php }
                                                if($this->session->flashdata('ship_msg')) { ?>
                                                <div role="alert" style="background-color: green" class="alert alert-danger">
                                                    <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
                                                    <?php   echo $_SESSION['ship_msg'];?>
                                                </div>
                                                <?php } ?>                          
        <form class="delivery_address" method="post" action="<?php echo base_url();?>Checkout/login_check">
        <div class="row">
            <div class="col-md-6">
                <div class="checkout_box">
                   <div class="checkout_box_heading">
                      <h2>Delivery Address</h2>
                   </div>
                   <div class="checkout_box_content" style="margin-top: 25px;">
                      <div class="delivery_address">
                         <div class="form-group">
                            <?php

                                                        if($count_order<10){
                                                            $ordr_id='0'.$count_order;
                                                        }else{
                                                          $ordr_id=$count_order;  
                                                        }
                                                        //$order_ids =sprintf("%06d", rand(0,999999));
                                                        $today = date("Ymd");
                                                        $order_id='WAYINFO-'.$today.'-'.$ordr_id;
                                                        $tid = sprintf("%06d", rand(0,999999));
                                                        //$tid ='#AAMKU'.$tids;

                                                        //$tid= rand();
                                                        ?>
                           <!--  <label>Full Name</label> -->
                           
                                                        <input  required="" type="text" id="billing_name" name="billing_name" class="form-control" placeholder="Name" value="<?php echo @$cust_data->firstname;?>" />
                                                        <input type="hidden" name="tid" id="tid" value="<?php echo $tid;?>" readonly />
                                                        <input type="hidden" name="merchant_id" value="238214"/>
                                                        <input type="hidden" name="order_id" value="<?php echo $order_id;?>"/>

                                                       <input type="hidden" name="amount" value="<?php echo number_format($grand_total_cartc,2)?>"/>
                                                          <!--  <input type="hidden" name="amount" value="1.00"> -->
                                                        <input type="hidden" name="currency" value="INR"/>
                                                        <input type="hidden" name="redirect_url" value="<?php echo base_url();?>Pages/payment_success"/>
                                                        <input type="hidden" name="cancel_url" value="<?php echo base_url();?>Pages/payment_success"/>
                                                        <input type="hidden" name="language" value="EN"/>
                         </div>
                         <div class="form-group">
                           <!--  <label for="comment">Address</label> -->
                           
                            <textarea style="height: 50px;" required="" placeholder="Address" name="billing_address" id="billing_address" class="form-control" rows="5" id="comment"><?php echo @$cust_data->address1;?></textarea>
                         </div>
                         <div class="row">
                            <div class="col-md-12">
                               <div class="form-group">
                                  <!-- <label>Country</label> -->
                                  <input placeholder="Country" readonly="" required="" type="text" id="billing_country" name="billing_country" class="form-control" value="India" />
                               </div>
                            </div>
                            <div class="col-md-12">
                               <div class="form-group">
                                  <!-- <label>State</label> -->
                                  <!-- <input required="" type="text" name="billing_state" class="form-control" value="" /> -->
                                   <select required="" class="form-control" id="billing_state" name="billing_state" id="billing_state">
                                                                    <option value="">Select state</option>
                                                                    <?php
                                                                    foreach ($state as $value) {
                                                                     ?>
                                                                    <option value="<?php echo $value->name;?>" <?php if( @$cust_data->state==$value->name){ echo 'selected="selected"';}?>><?php echo $value->name;?></option>
                                                                 <?php }?>
                                                                </select>
                               </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-md-6">
                               <div class="form-group">
                                 <!--  <label>City</label> -->
                                 <input required="" placeholder="City"  type="text" name="billing_city" id="billing_city" class="form-control" value="<?php echo @$cust_data->city;?>" />
                               </div>
                            </div>
                            <div class="col-md-6">
                               <div class="form-group">
                                 <!--  <label>Zip</label> -->
                                 <input pattern="(\d{6}([\-]\d{4})?)" placeholder="Zip" required=""  type="text" id="billing_zip" name="billing_zip" class="form-control" value="<?php echo @$cust_data->postcode;?>" />
                               </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-md-12">
                               <div class="form-group">
                                  <!-- <label>Phone No.</label> -->
                                   <input required="" pattern="^\d{10}$" maxlength="10"  type="text" id="billing_tel" name="billing_tel" class="form-control"  placeholder="Mobile" value="<?php echo @$cust_data->phone;?>" />
                               </div>
                            </div>
                            <div class="col-md-12">
                               <div class="form-group">
                                 <!--  <label>Email</label> -->
                                 <input required="" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" type="email" id="billing_email" name="billing_email" class="form-control" value="<?php echo @$cust_data->email;?>" />
                               </div>
                            </div>
                         </div>
                        </div>
                   </div>
                </div>
             </div>
            <script type="text/javascript">
                function get_billing_status(){
                   // if($('#billing_status').prop('checked', true)){
                    if($("#billing_status").prop('checked') == true){
                   // if($('#billing_status').attr('checked', true)){
                      $("#billing_name2").val($("#billing_name").val());
                       $("#billing_address2").val($("#billing_address").val());
                       $("#billing_country2").val($("#billing_country").val());
                       $("#billing_state2").val($("#billing_state").val());
                       $("#billing_city2").val($("#billing_city").val());
                       $("#billing_zip2").val($("#billing_zip").val());
                       $("#billing_tel2").val($("#billing_tel").val());
                       $("#billing_email2").val($("#billing_email").val());

                    }
                      if($("#billing_status").prop('checked') == false){
                       
                       $("#billing_name2").val('');
                       $("#billing_address2").val('');
                       $("#billing_country2").val('');
                       $("#billing_state2").val('');
                       $("#billing_city2").val('');
                       $("#billing_zip2").val('');
                       $("#billing_tel2").val('');
                       $("#billing_email2").val('');
  
                    }
                }
            </script>
             <div class="col-md-6">
                <div class="checkout_box">
                   <div class="checkout_box_heading">
                      <h2>Billing Address</h2>
                   </div>
                   <div class="checkout_box_content">
                      <div class="delivery_address">
                        <div class="same-as-bill">
                            <div class="pay__option">
                               <input type="checkbox"  onclick="get_billing_status()" name="billing_status" id="billing_status">

                               <label for="payment_mode"><b>Same As Delivery</b></label>
                            </div>
                         </div>
                         <div class="form-group">
                            <!-- <label>Full Name</label> -->
                            <input required="" placeholder="Full Name" type="text" name="billing_name2" id="billing_name2" class="form-control" value="">
                            
                         </div>
                         <div class="form-group">
                           <!--  <label for="comment">Address</label> -->
                            <textarea style="height: 50px;" required="" placeholder="Address" name="billing_address2" id="billing_address2" class="form-control" rows="5" id="comment"></textarea>
                         </div>
                         <div class="row">
                            <div class="col-md-12">
                               <div class="form-group">
                                  <!-- <label>Country</label> -->
                                  <input required="" placeholder="Country" type="text" name="billing_country2" id="billing_country2" class="form-control" value="">
                               </div>
                            </div>
                            <div class="col-md-12">
                               <div class="form-group">
                                <!--   <label>State</label> -->
                                  <!-- <input required="" type="text" name="billing_state" class="form-control" value="" /> -->
                                  <select required="" class="form-control" id="billing_state2" name="billing_state2">
                                     <option value="">Select state</option>
                                     <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                     <option value="Andhra Pradesh">Andhra Pradesh</option>
                                     <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                     <option value="Assam">Assam</option>
                                     <option value="Bihar">Bihar</option>
                                     <option value="Chandigarh">Chandigarh</option>
                                     <option value="Chhattisgarh">Chhattisgarh</option>
                                     <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                     <option value="Daman and Diu">Daman and Diu</option>
                                     <option value="Delhi">Delhi</option>
                                     <option value="Goa">Goa</option>
                                     <option value="Gujarat">Gujarat</option>
                                     <option value="Haryana">Haryana</option>
                                     <option value="Himachal Pradesh">Himachal Pradesh</option>
                                     <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                     <option value="Jharkhand">Jharkhand</option>
                                     <option value="Karnataka">Karnataka</option>
                                     <option value="Kenmore">Kenmore</option>
                                     <option value="Kerala">Kerala</option>
                                     <option value="Lakshadweep">Lakshadweep</option>
                                     <option value="Madhya Pradesh">Madhya Pradesh</option>
                                     <option value="Maharashtra">Maharashtra</option>
                                     <option value="Manipur">Manipur</option>
                                     <option value="Meghalaya">Meghalaya</option>
                                     <option value="Mizoram">Mizoram</option>
                                     <option value="Nagaland">Nagaland</option>
                                     <option value="Narora">Narora</option>
                                     <option value="Natwar">Natwar</option>
                                     <option value="Odisha">Odisha</option>
                                     <option value="Paschim Medinipur">Paschim Medinipur</option>
                                     <option value="Pondicherry">Pondicherry</option>
                                     <option value="Punjab">Punjab</option>
                                     <option value="Rajasthan">Rajasthan</option>
                                     <option value="Sikkim">Sikkim</option>
                                     <option value="Tamil Nadu">Tamil Nadu</option>
                                     <option value="Telangana">Telangana</option>
                                     <option value="Tripura">Tripura</option>
                                     <option value="Uttar Pradesh">Uttar Pradesh</option>
                                     <option value="Uttarakhand">Uttarakhand</option>
                                     <option value="Vaishali">Vaishali</option>
                                     <option value="West Bengal">West Bengal</option>
                                  </select>
                               </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-md-6">
                               <div class="form-group">
                                  <!-- <label>City</label> -->
                                  <input placeholder="City" required="" type="text" name="billing_city2" id="billing_city2" class="form-control" value="">
                               </div>
                            </div>
                            <div class="col-md-6">
                               <div class="form-group">
                                  <!-- <label>Zip</label> -->
                                  <input pattern="(\d{6}([\-]\d{4})?)" placeholder="Zip" required="" type="text" name="billing_zip2" id="billing_zip2" class="form-control" value="">
                               </div>
                            </div>
                         </div>
                         <div class="row">
                            <div class="col-md-12">
                               <div class="form-group">
                                  <!-- <label>Phone No.</label> -->
                                  <input required="" placeholder="Phone" pattern="^\d{10}$" maxlength="10" type="text" name="billing_tel2" class="form-control" id="billing_tel2" value="">

                               </div>
                            </div>
                            <div class="col-md-12">
                               <div class="form-group">
                                 <!--  <label>Email</label> -->
                                  <input required="" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" type="email" name="billing_email2" id="billing_email2" class="form-control" value="">
                               </div>
                            </div>
                         </div>
                        </div>
                   </div>
                </div>
             </div>
            
             <div class="col-md-12">
                <div class="checkout_box">
                   <div class="checkout_box_content" style="padding-top: 0;">
                      <div class="delivery_address">
                         <div class="row">
                            <div class="checkout_box_heading">
                               <h2>Payment Mode</h2>
                            </div>
                            <div class="col-md-4">
                               <div class="pay__option">
                                  <input type="radio" value="COD" checked="" onclick="ccavenue_click();" name="payment_mode">
                                  <label for="payment_mode"><b>COD</b></label>
                               </div>
                               <div class="pay__option">
                                  <input type="radio" value="online"  name="payment_mode">
                                  <label for="payment_mode"><b>Online</b></label>
                               </div>
                            </div>
                            <div class="col-md-4">
                               <!--  <div class="pay__option"><br>
                                  <input type="radio" value="cash"  onclick="cash_delivery_click();" name="payment_mode">
                                  <label for="payment_mode"><b>Cash on delivery</b></label>
                                  </div> -->
                            </div>
                         </div>
                         <div class="cr__btn" id="ccavenue_btn" style="display: none">
                            <input type="submit" class="btnSubmit" name="ccavenue_btn" value="Place Order">
                         </div>
                         <div class="cr__btn" id="cod_btn">
                            <input type="submit" class="btnSubmit" name="ccavenue_btn" value="Place Order">
                         </div>
                        </div>
                   </div>
                </div>
             </div>
        </div>
    </form>      
                                    </div>
                                    <?php //}?>
                                
                            <!-- Delivery Address End -->
                            <script type="text/javascript">
                            function get_city(st_id){
                            //alert(st_id);
                            $.ajax({
                            url:"<?php echo base_url();?>"+'Checkout/get_city',
                            type:"POST",
                            data:{st_id:st_id},
                            success:function(res){
                            $("#city_show").html(res);
                            }
                            });
                            }
                            function cash_delivery_click(){
                                //alert("hfghg");

                             $("#shipping_charge").hide();
                             $("#cc_details").hide();
                             $("#total_cod").show();
                             $("#total_ccavunue").hide();
                             $("#cash_delivery").show();
                             $("#ccavenue_btn").hide();
                             $("#cod_btn").show();
                            }
                            function ccavenue_click(){
                            $("#cash_delivery").hide();
                            $("#total_cod").hide();
                            $("#shipping_charge").show();
                            $("#cc_details").show();
                            $("#total_cod").hide();
                            $("#total_ccavunue").show();
                            $("#ccavenue_btn").show();
                            $("#cod_btn").hide();

                            }
                            </script>
                            <!-- Delivery Address End -->
                            
                        </div>
                    </div>
                    <div class="col-md-4">
                        <?php
                        $this->load->library('cart');
                        $cart = $this->cart->contents();
                        //print_r($cart);die;
                        $pcnt=count($cart);
                        ?>
                        <div class="checkout_box">
                            <div class="checkout_box_heading">
                                <h2>Order summary</h2>
                            </div>
                            <div class="checkout_box_content">
                                <?php
                                $grand_total = 0;
                                foreach($cart as $item){
                                    //print_r($item);
                                 ?>
                                <div class="row">
                                    <div class="col-4">
                                              <img class="quicklook" id="<?=$item['id']?>" src="<?=base_url();?>admin/upload/product_images/<?php echo $item['image']?>" alt="">
                                    </div>
                                    <div class="col-8">
                                        <div class="checkout_cart">
                                            <h6><?php echo $item['name']; ?></h6>
                                            <div class="checkout_qty">
                                                Qty:&nbsp;<?php echo $item['qty']; ?>
                                            </div>
                                            <div class="checkout_qty">
                                                Weight:&nbsp;<?php echo $item['weight']; ?>&nbsp;<?php echo $item['product_amu']; ?>
                                            </div>
                                            <div class="checkout_price">
                                                <p><i class="fa fa-inr"></i>₹
                                                    <?php
                                                    $grand_total = $grand_total + $item['margin_price']*$item['qty'];
                                                    $margin_price=$item['margin_price']*$item['qty'];
                                                echo number_format($margin_price, 2); ?> 
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div><br>
                            <?php }?>
                        </div>
                    </div>
                    <div class="checkout_box">
                        <div class="checkout_box_content">
                            <?php
                              if(@$pcnt>0){
                            ?>
                            <div class="checkout_price_description">
                                <div class="row">
                                    <div class="col-7">
                                        <h5>Subtotal</h5>
                                    </div>
                                    <div class="col-5">
                                        <p><i class="fa fa-inr"></i>₹ <?= number_format($grand_total,2)?></p>
                                    </div>
                                </div>
                                <div style="display: none" id="shipping_charge" class="row">
                                    <div class="col-7">
                                        <h5>Shipping</h5>
                                    </div>
                                    <div class="col-5">
                                        <p>Free Shipping</p>
                                    </div>
                                </div>
                               
                                <div class="row" id="total_cod">
                                    <div class="col-7">
                                        <h5>Total</h5>
                                    </div>
                                    <div class="col-5">
                                       
                                      <p> <i class="fa fa-inr"></i>₹ <?= number_format($grand_total,2)?></p>

                                   
                                    </div>
                                </div>
                                <div class="row" id="total_ccavunue" style="display: none;">
                                    <div class="col-7">
                                        <h5>Total</h5>
                                    </div>
                                    <div class="col-5">
                                        <?php
                                        if(@$_SESSION['coupon_code']){
                                        $grand_totalc=$grand_total-100;
                                        }else{
                                        $grand_totalc=$grand_total;
                                        }
                                        ?>
                                        <p> <i class="fa fa-inr"></i>&nbsp;<?= number_format($grand_totalc,2)?></p>
                                    </div>
                                </div>
                                
                            </div>
                        <?php }?>
                          <div class="checkout_box_heading">
                                    <a style="font-size: 16px;width: 300px; padding: 10px;" href="<?php echo site_url();?>" class="btn btn-primary my-cart-btn my-cart-b">Continue Shoping</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <!-- //row -->
    </section>

             </section>
         
         </main>
          <script src="<?php echo site_url(); ?>common/cart/plugins/jQuery/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="<?php echo site_url(); ?>common/cart/cart_js/owl.carousel.js"></script>
    <script src="<?php echo site_url(); ?>common/cart/plugins/bootstrap/bootstrap.min.js"></script>

    <script src="<?php echo site_url(); ?>common/cart/plugins/slick/slick.min.js"></script>
    <!-- filter -->
    <script src="<?php echo site_url(); ?>common/cart/plugins/shuffle/shuffle.min.js"></script>
    <!-- Main Script -->
    <script src="<?php echo site_url(); ?>common/cart/cart_js/script.js"></script>
    <script src="<?php echo site_url(); ?>common/cart/cart_js/menu-tab.js"></script>       
  <script>
    $('.navToggle').click(function() {
    $('.menu').toggleClass('menuOn');
    $('.mega-menu').toggleClass('navOn');
    });
    $('#checkoutRegisterBtn').click(function() {
    $('#loginCheckout').slideToggle('slow');
    $('#registerCheckout').slideToggle('slow');
    $('.checkout_login_register_btn_txt').toggle();
    })
    $(document).ready(function () {
    
    $("#submenu_switch").click(function () {
    //alert("sdjhfhdfh");
    $(".submenu").toggleClass("oppen_sub");
    });
    });

    $(document).ready(function () {       
            $("#submenu_switch_mobile").click(function () {  
            // alert("Hello! I am an alert box!!");                  
                $(".submenu_mobile").toggleClass("oppen_sub");
            });
        });

    // Increment - Decrement
    var $input = $("#txtAcrescimo");
    $input.val(1);
    $(".altera").click(function() {
    if ($(this).hasClass('acrescimo'))
    $input.val(parseInt($input.val()) + 1);
    else if ($input.val() >= 1)
    $input.val(parseInt($input.val()) - 1);
    });
    </script>
    <style type="text/css">
        form.delivery_address .form-group .form-control {
    padding: 8px 15px;
   
}
    </style>