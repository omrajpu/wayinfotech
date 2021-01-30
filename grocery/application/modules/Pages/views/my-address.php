
         <!-- ========Mobile View Navbar End========= -->
         <!-- =======Header End======== -->
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
                     <ul>
                        <li>
                           <a class="active" href="<?php echo site_url();?>Pages/profile">Profile</a>
                        </li>
                        <li>
                           <a class="" href="<?php echo site_url();?>Pages/myaddress">My Address</a>
                        </li>
                        <li>
                           <a class="" href="<?php echo site_url();?>Pages/order">My Orders</a>
                        </li>
                        <li>
                           <a class="" href="<?php echo site_url();?>Pages/wishlist">My Wishlist</a>
                        </li>
                        <li>
                           <a class="" href="<?php echo site_url();?>Pages/changepass">Change Password</a>
                        </li>
                     </ul>
                  </aside>
                 <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <a class="active" href="<?php echo site_url();?>Pages/profile">Profile</a>
                    <a class="" href="<?php echo site_url();?>Pages/myaddress">My Address</a>
                    <a class="" href="<?php echo site_url();?>Pages/order">My Orders</a>
                    <a class="" href="<?php echo site_url();?>Pages/wishlist">My Wishlist</a>
                    <a class="" href="<?php echo site_url();?>Pages/changepass">Change Password</a>
                  </div>
                  <section class="account-section">
                     <div class="heading02">
                        <span class="ac-back-1 desk-hide" style="font-size:30px;cursor:pointer" onclick="openNav()"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
                        My Addresses
                     </div>
                     <p class="sucees"></p>
                     <div class="profile-detail-box">
                        <div class="address-box-wrapper">
                           <address class="address-box">
                              <h5 class="address-heading">
                                 <div class="custom-radio">
                                    <label>Address</label>
                                 </div>
                              </h5>
                              <div class="customer-address">
                                 <h6 class="cust-name">Deepak Sharma</h6>
                                 <p>
                                    B-175 B block delta 1, Greater Noida, Uttar Pradesh
                                    <br>
                                    India - 201308
                                    <br>
                                    Ph :
                                    <a href="tel:7011677763">7011677763</a>
                                 </p>
                              </div>
                              <div class="address-btn">
                                 <a data-confirm="Do you want to delete this address?" data-method="delete" href="/order_addresses/63073" rel="nofollow"><i class="fa fa-trash"></i>
                                 Remove
                                 </a>
                              </div>
                           </address>
                        </div>
                        <div class="clear"></div>
                        <div class="profile-box prf-edit-btn">
                           <a href="add-adress.html">
                           <p class="btn red-btn l-btn add-address" data-remote="true" style="color: #fff;">Add New</p>
                           </a>
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
         