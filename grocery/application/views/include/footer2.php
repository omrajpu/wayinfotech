
 <script type="text/javascript">
   function delete_item(rowid) {
                                //alert(cart_id);
                                $.ajax({
                                    url: "<?php echo base_url();?>" + 'Cart/remove_item',
                                    type: 'POST',
                                    data: {
                                        row_id: rowid
                                    },
                                    success: function(result) {
                                        $(".cart-sidebar").html(result);
                                    }
                                })

                            }
 </script>
 <section class="section-padding footer bg-white border-top">
         <div class="container">
            <div class="row">
               <div class="col-lg-3 col-md-3">
                  <h4 class="mb-5 mt-0"><a class="logo" href="index.html"><img src="<?php echo base_url();?>images/logo-footer.png" alt="Groci"></a></h4>
                  <p class="mb-0"><a class="text-dark" href="#"><i class="mdi mdi-phone"></i> +61 525 240 310</a></p>
                  <p class="mb-0"><a class="text-dark" href="#"><i class="mdi mdi-cellphone-iphone"></i> 12345 67890, 56847-98562</a></p>
                  <p class="mb-0"><a class="text-success" href="#"><i class="mdi mdi-email"></i> iamgrocery@gmail.com</a></p>
                  <p class="mb-0"><a class="text-primary" href="#"><i class="mdi mdi-web"></i> www.wayinfotechsolutions.com</a></p>
               </div>
               <!-- <div class="col-lg-2 col-md-2">
                  <h6 class="mb-4">TOP CITIES </h6>
                  <ul>
                  <li><a href="#">New Delhi</a></li>
                  <li><a href="#">Bengaluru</a></li>
                  <li><a href="#">Hyderabad</a></li>
                  <li><a href="#">Kolkata</a></li>
                  <li><a href="#">Gurugram</a></li>
                  <ul>
               </div> -->
               <div class="col-lg-2 col-md-2">
                  <h6 class="mb-4">CATEGORIES</h6>
                  <ul>
                    <?php
                       $cat_data=getcatname('category_details','id,category_name');
                        $i=1;
                  foreach ($cat_data as $key => $value) {
                         if($i<=4){
                    ?>
                  <li><a href="<?php echo base_url();?>Pages/common_page/<?php echo @$value->id;?>"> <?php echo @$value->category_name;?></a></li>
                  <?php }$i++;}?>
                  <!--<li><a href="#">Breakfast & Dairy</a></li>
                  <li><a href="#">Soft Drinks</a></li>
                  <li><a href="#">Biscuits & Cookies</a></li> -->
                  <ul>
               </div>
                <div class="col-lg-2 col-md-2">
                  <h6 class="mb-4">CATEGORIES</h6>
                  <ul>
                    <?php
                       $cat_data=getcatname('category_details','id,category_name');
                        $i=1;
                  foreach ($cat_data as $key => $value) {
                         if($i>=5 ){
                    ?>
                  <li><a href="<?php echo base_url();?>Pages/common_page/<?php echo @$value->id;?>"> <?php echo @$value->category_name;?></a></li>
                  <?php }$i++;}?>
                  <!--<li><a href="#">Breakfast & Dairy</a></li>
                  <li><a href="#">Soft Drinks</a></li>
                  <li><a href="#">Biscuits & Cookies</a></li> -->
                  <ul>
               </div>
               <div class="col-lg-2 col-md-2">
                  <h6 class="mb-4">ABOUT US</h6>
                  <ul>
                  <li><a href="#">Company Information</a></li>
                  <li><a href="#">Careers</a></li>
                  <li><a href="#">Store Location</a></li>
                  <li><a href="#">Affillate Program</a></li>
                  <li><a href="#">Copyright</a></li>
                  <ul>
               </div>
               <div class="col-lg-3 col-md-3">
                  <h6 class="mb-4">USEFULL LINK</h6>
                  <ul>
                     <li><a href="<?php echo base_url();?>Content/about_us">About-us</a></li>
                     <li><a href="<?php echo base_url();?>Pages/contactus">Contact-us</a></li>
                     <li><a href="<?php echo base_url();?>Content/faq">FAQ</a></li>
                     <li><a href="<?php echo base_url();?>Content/terms_and_conditions">Terms & Conditions</a></li>
                     <li><a href="<?php echo base_url();?>Content/privacy_policy">Privacy Policy</a></li>
                     <ul>
                  <div class="footer-social">
                     <a class="btn-facebook" href="#"><i class="mdi mdi-facebook"></i></a>
                     <a class="btn-twitter" href="#"><i class="mdi mdi-twitter"></i></a>
                     <a class="btn-instagram" href="#"><i class="mdi mdi-instagram"></i></a>
                     <a class="btn-whatsapp" href="#"><i class="mdi mdi-whatsapp"></i></a>
                     <a class="btn-messenger" href="#"><i class="mdi mdi-facebook-messenger"></i></a>
                     <a class="btn-google" href="#"><i class="mdi mdi-google"></i></a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End Footer -->
      <!-- Copyright -->
      <section class="pt-4 pb-4 footer-bottom">
         <div class="container">
            <div class="row no-gutters">
               <div class="col-lg-6 col-sm-6">
                  <p class="mt-1 mb-0">&copy; Copyright 2020 <strong class="text-dark">Grociry</strong>. All Rights Reserved<br>
                  <small class="mt-0 mb-0">Made with <i class="mdi mdi-heart text-danger"></i> by <a href="##" target="_blank" class="text-primary">Wayinfotech Solutions</a>
                  </small>
                  </p>
               </div>
               <div class="col-lg-6 col-sm-6 text-right">
                  <img alt="grocery logo" src="<?php echo base_url();?>images/payment_methods.png">
               </div>
            </div>
         </div>
      </section>
      <!-- End Copyright -->

      <!-- Cart Slider -->
       <a class="float-right remove-cart" href="#"><i class="mdi mdi-close"></i></a>
      <div class="cart-sidebar">
         <div class="cart-sidebar-header">
            <?php 
                $this->load->library('cart');
                $cart = $this->cart->contents();
                 //echo $this->cart->total_items();
                   if($cart = $this->cart->contents()){
                     $i = 0;
                    foreach($cart as $item){
                     $i++;} }?>
            <h5>
               My Cart <span id="text_success" class="text-success">(<?php echo @$i;?>)</span> <a data-toggle="offcanvas" class="float-right" href="#"><i class="mdi mdi-close"></i>
               </a>
            </h5>
         </div>
         <div class="cart-sidebar-body">
           
             <a href="<?php echo base_url();?>/Cart/clear_all"><button class="btn btn-secondary btn-lg btn-block text-left" type="button"><span class="float-left"><i class="mdi mdi-cart-outline"></i> Remove all items</button></a>
            <?php
                 $this->load->library('cart');
                 if($cart = $this->cart->contents()){
                  $grand_total = 0;
                  $i = 1;
                  foreach ($cart as $item)
                  {
                    //print_r($item);
                    $grand_total = $grand_total + $item['subtotal'];
                    
                 ?>
            <div class="cart-list-product">
              
               <img class="img-fluid" src="<?php echo site_url(); ?>admin/upload/product_images/<?php echo @$item['image'];?>" alt="">
               <span class="badge badge-success">50% OFF</span>
               <h5><a href="#"><?php echo $item['name'];?></a></h5>
               <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> : <?php echo $item['weight'];?> <?php echo $item['product_amu'];?></h6>
               <h6><strong><span class="mdi mdi-approval"></span> Quantity</strong> : <?php echo $item['qty'];?></h6>
            
                <h6><strong><span class="mdi mdi-approval"></span></strong> :₹<?php echo $item['price'];?> <i class="mdi mdi-tag-outline"></i> <span class="regular-price">₹ <?php echo $item['mrp_price'];?></span></h6>
            </div>

         <?php } }?>
         </div>
         <div class="cart-sidebar-footer">
            <div class="cart-store-details">
               <p>Sub Total <strong class="float-right">₹ <?= number_format(@$grand_total,2)?></strong></p>
               <p>Delivery Charges <strong class="float-right text-danger">0.00</strong></p>
               <h6>Grand Total <strong class="float-right text-danger">₹ <?= number_format(@$grand_total,2)?></strong></h6>
            </div>
           <!--  <a href="checkout.html"><button class="btn btn-secondary btn-lg btn-block text-left" type="button"><span class="float-left"><i class="mdi mdi-cart-outline"></i> Proceed to Checkout </span><span class="float-right"><strong>$1200.69</strong> <span class="mdi mdi-chevron-right"></span></span></button></a> -->
             <a href="<?php echo base_url();?>Checkout/checkout"><button class="btn btn-secondary btn-lg btn-block text-left" type="button"><span class="float-left"><i class="mdi mdi-cart-outline"></i> Proceed to Checkout</button></a><br>
             <a href="<?php echo base_url();?>/Cart/"><button class="btn btn-secondary btn-lg btn-block text-left" type="button"><span class="float-left"><i class="mdi mdi-cart-outline"></i> View Cart</button></a>
         </div>
      </div>
    

      
      </body>
</html>
      <!-- <script src="<?php echo site_url(); ?>common/js/jquery/jquery.min.js"></script> -->
      <script src="<?php echo site_url(); ?>common/js/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Owl Carousel -->
      <script src="<?php echo site_url(); ?>common/js/owl-carousel/owl.carousel.js"></script>
      <script src="<?php echo site_url(); ?>common/js/custom.js"></script> 