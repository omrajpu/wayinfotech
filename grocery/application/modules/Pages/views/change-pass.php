

         <main id="main-wrapper" style="padding-top: 125px; font-family: Arial, Helvetica, sans-serif;">
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
                     <h2 class="heading02">
                        <span class="ac-back-1 desk-hide" style="font-size:30px;cursor:pointer" onclick="openNav()"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
                        Change Password
                     </h2>
                     <div class="profile-detail-box">
                        <form accept-charset="UTF-8" action="index.html" method="get">
                           <div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="✓"></div>
                           <div class="w-50 form-box">
                              <div class="input-box">
                                 <input id="password" name="password" required="required" type="password" value="">
                              </div>
                              <label>Old Password</label>
                           </div>
                           <div class="w-50 form-box">
                              <div class="input-box">
                                 <input id="password" name="password" required="required" type="password" value="">
                              </div>
                              <label>New Password</label>
                           </div>
                           <div class="clear"></div>
                           <div class="w-50 form-box">
                              <div class="input-box">
                                 <input id="password_confirmation" name="password_confirmation" required="required" type="password" value="">
                              </div>
                              <label>Confirm Password</label>
                           </div>
                           <div class="clear"></div>
                           <div class="profile-box prf-edit-btn prf-save-btn">
                              <button class="btn red-btn m-btn" data-disable-with="Please wait..." style="submit">Update</button>
                           </div>
                        </form>
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


            