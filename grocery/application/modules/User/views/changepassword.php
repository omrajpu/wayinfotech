       <script type="text/javascript">
     function conf_pass_validate(){
       var new_pass=$("#new_pass").val();
       var conf_pass=$("#conf_pass").val();
       if(new_pass!='' && conf_pass!=''){
       if(new_pass!=conf_pass){
         alert("Confirm password does not match!");
         return false;
       }else{
         return true;
       }
      }

     }
  </script>

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
                    <?php $this->load->view('left_sidebar.php');?>
                  </aside>
                 <!--  <div id="mySidenav" class="sidenav">
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
                        Change Password
                     </h2>
                     <div class="profile-detail-box">
                        <?php
                                                      if($this->session->flashdata('msg')){?>
                                                      <div class="alert alert-success alert-dismissible"><i class="fa fa-exclamation-circle"></i>
                                                         <?php
                                                          echo $this->session->flashdata('msg');
                                                          unset($_SESSION['msg']);
                                                          ?>
                                                        <button type="button" class="close" data-dismiss="alert">×</button>
                                                      </div>
                                                     <?php } ?>
                  <form accept-charset="UTF-8" action="<?php echo base_url();?>User/dochangepassword" class="form-container" id="new_user" method="post">
                      <div class='form-box'>
                        <div class='input-box'>
                          <input required name="old_pass" id="old_pass" value="<?php echo @$user_data->first_name;?>" type="password" class="form-control bg-clr" id="Old Password">
                        </div>
                        <label>Old Password</label>
                     </div>

                    <div class='form-box'>
                        <div class='input-box'>
                         <input required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="new_pass" id="new_pass" value="<?php echo @$user_data->first_name;?>" type="password" class="form-control bg-clr">
                        </div>
                        <label>New Password</label>
                     </div>
                   <div class='form-box'>
                        <div class='input-box'>
                          <input required name="conf_pass" id="conf_pass" value="<?php echo @$user_data->first_name;?>" type="password" class="form-control bg-clr">
                        </div>
                        <label>Confirm Password</label>
                     </div>
                     
                  <button onclick="return conf_pass_validate();" class='btn red-btn l-btn mt-25' type='submit'>Save Changes</button>
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


            <!-- ==============Footer Area Start============= -->
         <!-- ==========Footer sow on desk========== -->
      