    
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
                                                        <input type="password" name="password" required="" class="form-control" placeholder="Your Password *" value="" />
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
                                                        <input required onkeypress="return /[a-z]/i.test(event.key)" type="text" name="name" class="form-control" placeholder="Your Name *" value="" />
                                                    </div>
                                                    <div class="form-group">
                                                        <input required type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" placeholder="Your Email *" value="" />
                                                    </div>
                                                    <div class="form-group">
                                                        <input pattern="^\d{10}$" maxlength="10"  type="tel" name="phone" class="form-control" placeholder="Your Phone *" value="" />
                                                    </div>
                                                    <div class="form-group">
                                                        <input  required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" type="password" name="password" class="form-control" placeholder="Your Password *" value="" />
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
                                    <div class="col-md-12">
                                        <div class="checkout_box">
                                            <div class="checkout_box_heading">
                                                <h2>Delivery Address</h2>
                                            </div>
                                            <?php
                                            if(@$_SESSION['userid']!=''){ 
                                               // echo'<pre>';print_r($_SESSION);
                                            
                                            ?>
                                            <div class="checkout_box_content">
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

                                                <?php
                                              //echo'<pre>';print_r($cust_data);
                                              //echo"dfg";


                                                ?>
                                                <form class="delivery_address" method="post" action="<?php echo site_url();?>Checkout/login_check">
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
                                                       
                                                        <input  required="" type="text" name="billing_name" class="form-control" placeholder="Name" value="<?php echo @$cust_data->firstname;?>" />
                                                        <input type="hidden" name="tid" id="tid" value="<?php echo $tid;?>" readonly />
                                                        <input type="hidden" name="merchant_id" value="238214"/>
                                                        <input type="hidden" name="order_id" value="<?php echo $order_id;?>"/>

                                                       <input type="hidden" name="amount" value="<?php echo number_format($grand_total_cartc,2)?>"/>
                                                          <!--  <input type="hidden" name="amount" value="1.00"> -->
                                                        <input type="hidden" name="currency" value="INR"/>
                                                        <input type="hidden" name="redirect_url" value="http://aamku.com/Pages/payment_success"/>
                                                        <input type="hidden" name="cancel_url" value="http://aamku.com/Pages/payment_success"/>
                                                        <input type="hidden" name="language" value="EN"/>
                                                    </div>
                                                    <div class="form-group">
                                                        <input placeholder="Address"  required="" type="text" name="billing_address" class="form-control" value="<?php echo @$cust_data->address1;?>" />
                                                        <!-- <textarea required="" name="billing_address" class="form-control" rows="5" id="comment"><?php echo @$cust_data->address1;?></textarea> -->
                                                    </div>
                                                    <div class="row">
                                                         <div class="col-md-6">
                                                            <div class="form-group">
                                                                 <input placeholder="Country" readonly="" required="" type="text" name="billing_country" class="form-control" value="India" />
                                                            </div>
                                                        </div>


                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                
                                                                <!-- <input required="" type="text" name="billing_state" class="form-control" value="" /> -->
                                                                <select required="" class="form-control" id="billing_state" name="billing_state">
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
                                                               
                                                                <input required="" placeholder="City"  type="text" name="billing_city" class="form-control" value="<?php echo @$cust_data->city;?>" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                
                                                                <input pattern="(\d{6}([\-]\d{4})?)" required=""  type="text" name="billing_zip" class="form-control" value="<?php echo @$cust_data->postcode;?>" />
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                
                                                                <input required="" pattern="^\d{10}$" maxlength="10"  type="text" name="billing_tel" class="form-control" value="<?php echo @$cust_data->phone;?>" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                
                                                                <input required="" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" type="email" name="billing_email" class="form-control" value="<?php echo @$cust_data->email;?>" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mtb-30">
                                                        <div class="checkout_box_heading">
                                                            <h2>Payment Mode</h2>
                                                         </div>
                                                        
                                                        <?php
                                                      $this->load->library('cart');
                                                      $cart = $this->cart->contents();
                                                      //print_r($cart);
                                                       //if(in_array('user_custom',$cart)){
                                                        //echo"ok";
                                                       //}
                                                       $u_custom='';
                                                       foreach ($cart as  $item) {
                                                         $u_custom .= @$item['custom'];
                                                         }
                                                      // echo  $u_custom; 
                                                      //print_r($u_custom); 
                                                       if($u_custom){  
                                                        ?>
                                                        <div class="col-md-4">
                                                           <!--  <div class="pay__option"><br>
                                                                 <input type="radio" value="online" checked onclick="ccavenue_click();" name="payment_mode">
                                                                <label for="2"><b>Online Payment</b></label>
                                                            </div> -->
                                                            <div class="pay__option"><br>
                                                                 <input type="radio" value="COD" checked onclick="ccavenue_click();" name="payment_mode">
                                                                <label for="2"><b>COD</b></label>
                                                            </div>
                                                        </div>
                                                         <?php }else{?>
                                                            <div class="col-md-4">
                                                            <div class="pay__option"><br>
                                                                 <input type="radio" value="COD" checked onclick="ccavenue_click();" name="payment_mode">
                                                                <label for="payment_mode"><b>COD</b></label>
                                                            </div>
                                                        </div>
                                                            <div class="col-md-4">
                                                           <!--  <div class="pay__option"><br>
                                                                <input type="radio" value="cash"  onclick="cash_delivery_click();" name="payment_mode">
                                                                <label for="payment_mode"><b>Cash on delivery</b></label>
                                                            </div> -->
                                                        </div>
                                                         

                                                         <?php }?>
                                                    </div>
                                                   
                                            <div class="cr__btn" id="ccavenue_btn" style="display: none">
                                                <input type="submit" class="btnSubmit" name="ccavenue_btn" value="Place Order" />
                                            </div>
                                            <div class="cr__btn" id="cod_btn">
                                                <input type="submit" class="btnSubmit" name="ccavenue_btn" value="Place Order" />
                                            </div>
                                        </form>
                                    </div>
                                    <?php }?>
                                </div>
                                
                            </div>
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
                                                    $grand_total = $grand_total + $item['price']*$item['qty'];
                                                    $price=$item['price']*$item['qty'];
                                                echo number_format($price, 2); ?> 
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
    height: 35px;
}
    </style>