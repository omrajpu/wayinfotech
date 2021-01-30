

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
                           <a class="active" href="<?php echo site_url();?>pages/profile">Profile</a>
                        </li>
                        <li>
                           <a class="" href="<?php echo site_url();?>pages/myaddress">My Address</a>
                        </li>
                        <li>
                           <a class="" href="<?php echo site_url();?>pages/order">My Orders</a>
                        </li>
                        <li>
                           <a class="" href="<?php echo site_url();?>pages/wishlist">My Wishlist</a>
                        </li>
                        <li>
                           <a class="" href="<?php echo site_url();?>pages/changepass">Change Password</a>
                        </li>
                     </ul>
                  </aside>
                  <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <a class="active" href="<?php echo site_url();?>pages/profile">Profile</a>
                    <a class="" href="<?php echo site_url();?>pages/myaddress">My Address</a>
                    <a class="" href="<?php echo site_url();?>pages/order">My Orders</a>
                    <a class="" href="<?php echo site_url();?>pages/wishlist">My Wishlist</a>
                    <a class="" href="<?php echo site_url();?>pages/changepass">Change Password</a>
                  </div>
                  
                  <section class="account-section my-wish-section">
                     <h2 class="heading02">
                        <span class="ac-back-1 desk-hide" style="font-size:30px;cursor:pointer" onclick="openNav()"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
                        My Wishlist
                     </h2>
                     <div class="profile-detail-box wishlist-wrapper">
                        <div class="wishlist-header">
                           <div class="mob-hide">
                              <div class="wishlist-item">
                                 items
                              </div>
                              <div class="wishlist-dlt">
                                 <div class="wishlist-des">
                                    Description
                                 </div>
                                 <div class="wishlist-price">
                                    Price
                                 </div>
                                 <div class="wishlist-cart">
                                    &nbsp;
                                 </div>
                              </div>
                              <div class="clear"></div>
                           </div>
                           <div class="desk-hide">
                              <p class="update-wishlist">1 Items in your Wishlist</p>
                           </div>
                           <div class="clear"></div>
                        </div>
                        <div class="my-wishlist-box">
                           <a data-confirm="Are you sure?" href="/add-remove-wishlist/O951D490-303"><span class="sprite close-wishlist"></span>
                           </a>
                           <div class="wishlist-item">
                              <div class="wishlist-img">
                                 <a href="product-details.html">
                                 <img alt="Refined Classic Heavy Embroidered Sherwani" src="https://images.manyavar.com/product_images/12579/qty_30/3.jpg?1548137206">
                                 </a>
                              </div>
                           </div>
                           <div class="wishlist-dlt">
                              <div class="wishlist-des">
                                 <h3 class="heading03">
                                    <a href="product-details.html">Refined Classic Heavy Embroidered Sherwani</a>
                                 </h3>
                                 <p>
                                    <span>SKU  :</span>
                                    <span>O951D490-303</span>
                                 </p>
                                 <p>
                                    <span>Colour  :</span>
                                    <span>Beige</span>
                                 </p>
                              </div>
                              <div class="wishlist-price">
                                 <p>
                                    <i class="rupee">`</i> 11999
                                 </p>
                                 <br>
                                 <select class="select1" id="size" name="size">
                                    <option value="">Select Size</option>
                                    <option value="11162">S</option>
                                    <option value="11163">M</option>
                                    <option value="11164">L</option>
                                    <option value="11165">XL</option>
                                 </select>
                                 <div class="note message" style="display:none;">Select Size</div>
                              </div>
                              <div class="wishlist-cart">
                                 <a class="btn red-btn m-btn move_to_crt_btna" href="carts.html">Move to Cart</a>
                              </div>
                           </div>
                           <div class="clear"></div>
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


         