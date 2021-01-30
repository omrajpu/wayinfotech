<?php
  //echo'<pre>';print_r($checkout_data);
?>
         <main id="main-wrapper" style="padding-top: 139px; font-family: Arial, Helvetica, sans-serif;">
            <header class="account-header">
               <div class="container" id="menu-header"></div>
            </header>
            <div class="container mob-hide">
               <ul class="bread-cum">
                  <li>
                     <a href="/">Home</a>
                  </li>
                  <li>My Account</li>
               </ul>
               <h2 class="section-heading inner-heading account-heading">
                  <span class="heading02">My Account</span>
                  <span class="heading03">Hello,  </span>
               </h2>
               <p class="account-para">From your My Account you have the ability to view your recent account activity and update your account information.</p>
            </div>
            <div id="account-wrapper">
               <div class="container">
                  <aside class="account-sidebar mob-hide">
                    <?php $this->load->view('left_sidebar.php');?>
                  </aside>
                <!--   <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <a class="active" href="profile.html">Profile</a>
                    <a class="" href="my-address.html">My Address</a>
                    <a class="" href="my-orders.html">My Orders</a>
                    <a class="" href="mywishlist.html">My Wishlist</a>
                    <a class="" href="change-password.html">Change Password</a>
                  </div> -->
                  <section class="account-section">
                     <h2 class="heading02">
                        <span class="ac-back-1 desk-hide" style="font-size:30px;cursor:pointer" onclick="openNav()"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
                        My Orders
                     </h2>
                     <div class="profile-detail-box order-detail-box">
                     </div>
                     <div class="profile-detail-box order-detail-box">
                        <div class="my-order-box">
                           <div class="my-order-header" for="75861">
                             
                              <div class="clear"></div>
                           </div>
                           <div class="my-order-detail" id="M132355532451731591079612">
                               <table id="category_view" class="table table-bordered table-striped">
                                        <thead style="background-color: #a37e2b;">
                                            <tr>
                                          <!--   <th>Sr.no</th> -->
                                             <th>Order id</th>
                                             
        <th>Name</th>
      <!--  <th>Address</th> -->
      <th>Phone</th> 
        <th>Email</th>
       <!--  <th>City</th> -->
        <th>Mode</th>
        
        <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
     //print_r($property_data);
    $cnt=count($checkout_data);
    if($cnt>0){                                        
    $i=1;
    foreach ($checkout_data as $val) {
      # code...
    
    ?>
      <tr>
         <td><?php echo @$val->province;?></td> 
       <td><?php echo $val->firstname;?></td>
       <!--  <td><?php echo $val->address1;?></td> -->
       <td><?php echo $val->phone;?></td> 
        <td><?php echo $val->email;?></td>
       <!--  <td><?php echo $val->city;?></td> -->
        <td><?php echo $val->payment_option;?></td>
      
        <td><!-- <a href="<?php base_url();?>order_product_view/<?php echo @$val->sale_id;?>"><span class="glyphicon glyphicon glyphicon-zoom-in" aria-hidden="true"></span><b>View details</b></a> -->
      <div class="action product_add"><a href="<?php base_url();?>order_product_view/<?php echo @$val->sale_id;?>" class="btn1 btn-view">View Product</a></div>
        </td>
        
      </tr>
      <?php $i++;} } else{?><tr><td colspan="6">No order genrated!</td></tr><?php }?>
                                        </tbody>
                                    </table>
                           </div>
                        </div>
                     </div>
                  </section>
                  <div class="clear"></div>
               </div>
            </div>
            <section class="usp-section listingpage-usp-section mob-hide">
               <div class="usp-wrapper">
                  <figure class="usp-box">
                     <div class="ups-icon">
                        <i class="sprite star-icon"></i>
                     </div>
                     <figcaption>
                        <h2 class="usp-heading">satisfied Customers</h2>
                        <p class="usp-content">3,00,000+</p>
                     </figcaption>
                  </figure>
                  <!-- usp-box close -->
                  <figure class="usp-box">
                     <div class="ups-icon">
                        <i class="sprite ethnic-icon"></i>
                     </div>
                     <figcaption>
                        <h2 class="usp-heading">Ethnic Wear</h2>
                        <p class="usp-content">Made in India</p>
                     </figcaption>
                  </figure>
                  <!-- usp-box close -->
                  <figure class="usp-box">
                     <div class="ups-icon">
                        <i class="sprite shipping-icon"></i>
                     </div>
                     <figcaption>
                        <h2 class="usp-heading">
                           Free Shipping in India
                        </h2>
                        <p class="usp-content">Fast Delivery</p>
                     </figcaption>
                  </figure>
                  <figure class="usp-box">
                     <div class="ups-icon">
                        <i class="sprite flight-icon"></i>
                     </div>
                     <figcaption>
                        <h2 class="usp-heading">International Shipping</h2>
                        <p class="usp-content">6 Countries</p>
                     </figcaption>
                  </figure>
                  <!-- usp-box close -->
               </div>
            </section>
            <section class="mob-usp-section mobile-view listing-usp">
               <div class="container">
                  <div class="mob-usp-box">
                     <i class="sprite mob-usp-icon star-icon"></i>
                     <p>happy &amp; satisfied Customers</p>
                  </div>
                  <div class="mob-usp-box">
                     <i class="sprite mob-usp-icon ship-icon"></i>
                     <p>
                        Free Shipping in India
                     </p>
                  </div>
                  <div class="mob-usp-box">
                     <i class="sprite mob-usp-icon int-icon"></i>
                     <p>International Shipping</p>
                  </div>
               </div>
            </section>
         </main>
         <!-- ==============Footer Area Start============= -->
         <!-- ==========Footer sow on desk========== -->
        <script src="<?php echo base_url() . "admin/assets" ?>/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() . "admin/assets" ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
          <script>
            $(function () {
                $("#category_view").DataTable({
                    "order": [[1, "desc"]]
                })
            });
          </script>