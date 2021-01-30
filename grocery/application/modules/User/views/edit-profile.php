

         <main id="main-wrapper" style="padding-top: 125px;">
            <header class="account-header">
            <div class="container" id="menu-header"></div>
            </header>
            <!-- header close -->
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
            <!-- <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a class="active" href="profile.html">Profile</a>
                <a class="" href="my-address.html">My Address</a>
                <a class="" href="my-orders.html">My Orders</a>
                <a class="" href="mywishlist.html">My Wishlist</a>
                <a class="" href="change-password.html">Change Password</a>
              </div> -->
            <section class="account-section">
            <h2 class="heading02">
            <!-- <a class="sprite ac-back desk-hide" href="javascript:void(0);"></a> -->
            <span class="ac-back-1 desk-hide" style="font-size:30px;cursor:pointer" onclick="openNav()"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
            My Profile
            </h2>
            <p style="text-align: center;color: red;font-size: 20px;padding: 5px 0;"></p>
            <div class="profile-detail-box">
            <form accept-charset="UTF-8"  action="<?php echo site_url()?>User/edit_user_save" method="post" enctype="multipart/form-data">
            <div class="w-50 form-box">
            <div class="input-box">
             <input name="first_name" value="<?php echo @$user_data->first_name;?>" type="text" class="form-control bg-clr" id="inputEmail4" placeholder="First Name">
            </div>
            <label>First Name</label>
            </div>
           
            <div class="w-50 form-box">
            <div class="input-box">
            <input name="last_name" value="<?php echo @$user_data->last_name;?>" type="text" class="form-control bg-clr" id="inputEmail4" placeholder="Last Name">
            </div>
            <label>Last Name</label>
            </div>
            <div class="w-50 form-box">
            <div class="input-box">
          <input name="email" type="email" value="<?php echo @$user_data->email;?>" class="form-control" id="inputEmail4" placeholder="Email">
            </div>
            <label>Email</label>
            </div>
            <div class="w-50 form-box">
            <div class="input-box">
           <input value="<?php echo @$user_data->phone;?>" name="phone" id="phone" class="form-control bg-clr"  type="text">
            </div>
            <label>Mobile No.</label>
            </div>
            <div class="w-50 form-box">
            <div class="input-box">
           <!-- <input value="<?php echo @$user_data->phone;?>" name="phone" id="phone" class="form-control bg-clr"  type="text"> -->
           <input style="padding: 10px;" type="file" class="form-control bg-clr" name="update_photo[]">
            </div>
            <label>Upload Photo</label>
            </div>

            <div class="clear"></div>
            <div class="profile-box prf-edit-btn prf-save-btn">
             <button class='btn red-btn l-btn mt-25' type="submit">Update Profile</button>
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

          <!-- ==============Footer Area Start============= -->
       