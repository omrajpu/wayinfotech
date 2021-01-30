
            
         <main id="PageContainer" class="main-content index" id="MainContent" role="main">


          

            <section class="winners">
                <div class="content-indent default">
                    <div class="section-cover">
                       <div class="page-width latest-blog wow fadeIn" id="blogSlider-1561784548899" data-section-id="1561784548899" data-section-type="carousel" style="visibility: visible; animation-name: fadeIn;">  
                          </div>
                          <div class="container">
                              <div class="row">
                                  <div class="col-md-12 full-details">
                                     
                                          <div class="col-md-8">
                                              <div class="user-from">
                                                      <div class="container-form">
                                                         <div class="txt-head">
                                                            <h4>Sign In</h4>
                                                            </div>
                         
 <?php
                  if($this->session->flashdata('login_error_show')){?>
                    <div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i>
                     <?php
                      echo $_SESSION['login_error_show'];
                      unset($_SESSION['login_succ_show']);
                      unset($_SESSION['login_error_db_exist']);
                      //unset($_SESSION['alredy_reg_error']);
                     
                    ?>
                    <button type="button" class="close" data-dismiss="alert">×</button>
                  </div>
                <?php }
                 if($this->session->flashdata('login_succ_show')){?>
                    <div class="alert alert-success alert-dismissible"><i class="fa fa-exclamation-circle"></i>
                     <?php
                      echo $_SESSION['login_succ_show'];
                      unset($_SESSION['login_error_show']);
                      unset($_SESSION['login_error_db_exist']);
                      
                    ?>
                    <button type="button" class="close" data-dismiss="alert">×</button>
                  </div>
                  
              <?php } 
                if($this->session->flashdata('login_error_db_exist')){?>
                    <div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i>
                     <?php
                      echo $_SESSION['login_error_db_exist'];
                      unset($_SESSION['login_error_show']);
                      unset($_SESSION['login_error_show']);
                      
                    ?>
                    <button type="button" class="close" data-dismiss="alert">×</button>
                  </div>

             <?php } ?>
    <form action="<?php echo site_url()?>User/login_front_check" method="post" class="form-signin">                                                 
    <div class="form-row">
        <div class="form-group col-md-5">
            <label for="name">Email</label>
            <input  required type="email"  name="email"class="form-control bg-clr" id="name" placeholder="Email" />
        </div>
        <div class="form-group col-md-5">
            <label for="password">Password</label>
            <input required type="password" name="password" class="form-control bg-clr" id="password" placeholder="Password" />
        </div>
       
       <div class="form-group col-md-5">
                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">Remember password</label>
                  </div>
      
    <button class="btn btn-lg btn-12 btn-block text-uppercase"  type="submit">Sign in</button>
                 
</form>



                                                       </div>
                                                  </div>
                                              </div>
                                      </div>
                        
                          </div>
                          </div>
                       </div>
                    </div>
                </section>

     <!----===========:SHIPPING BLOG SECTION 5 :=========---->

            <div id="shopify-section-1561784085337" class="shopify-section index-section">
               <div class="content-indent none">
                  <div class="section-cover small-pd" style="background-color:#131313;">
                     <div class="page-width wow fadeIn">
                        <ul class="display-table store-info style2">
                           <li class="display-table-cell">
                              <i class="ad ad-free-delivery" aria-hidden="true"></i>
                              <h5>FREE SHIPPING & RETURN</h5>
                              <span class="sub-text">
                                 <p>Free shipping on all US orders</p>
                              </span>
                           </li>
                           <li class="display-table-cell">
                              <i class="ad ad-money" aria-hidden="true"></i>
                              <h5>MONEY GAURNTEE</h5>
                              <span class="sub-text">
                                 <p>30 days money back guarantee</p>
                              </span>
                           </li>
                           <li class="display-table-cell">
                              <i class="ad ad-phone-24" aria-hidden="true"></i>
                              <h5>ONLINE SUPPORT</h5>
                              <span class="sub-text">
                                 <p>We support online 24/7 on day</p>
                              </span>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </main>

    <!----===========:SHIPPING BLOG SECTION 5 END :=========---->

    <!----===========:FOOTER:=========---->

         <div id="shopify-section-footer" class="shopify-section">
            




    <div class="container">
        <div class="row">
            <p class="card-head">If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing section.</p>
            <?php if($this->session->flashdata('reg_msg')) { ?>
                                                    <div role="alert"  style="color:green" class="alert alert-danger">
                                                            <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
                                                          <?php   echo $_SESSION['reg_msg'];
                                                                  unset($_SESSION['reg_msg']);
                                                          ?>
                                                    </div>
                                            <?php } 

                                            if($this->session->flashdata('alredy_reg_error')) { ?>
                                                    <div role="alert"  style="color:green" class="alert alert-danger">
                                                            <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
                                                          <?php   echo $_SESSION['alredy_reg_error'];
                                                          unset($_SESSION['alredy_reg_error']);

                                                          ?>
                                                    </div>
                                            <?php } 

                                            ?>
          <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
              <div class="card-body">
                <h5 class="card-title text-center">Sign Up</h5>
                <form action="<?php echo site_url()?>User/Signup_user_front" class="form-signin">
                  <div class="form-label-group">
                    <input type="text" onkeypress="return IsAlphaNumeric(event);" ondrop="return false;" onpaste="return false;"  name="name" id="name" class="form-control" placeholder="Name" required autofocus>
                    <label for="name">User Name</label>
                  </div>
                  <div class="form-label-group">
                    <input type="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email" id="email" class="form-control" placeholder="Email" required autofocus>
                    <label for="email">User Email</label>
                  </div>
                   <div class="form-label-group">
                    <input type="tel" name="phone" id="phone" class="form-control" placeholder="Mobile" required autofocus>
                    <label for="phone">Mobile Number</label>
                   </div>
                  <div class="form-label-group">
                    <input type="password" name="password" id="password" class="form-control" placeholder="password" required autofocus>
                    <label for="password">Password</label>
                   </div>
                 <!--  <a href="index.html"> <button class="btn btn-lg btn-12 btn-block text-uppercase" type="submit">Register</button></a> -->

                  <input type="submit" class="btn btn-lg btn-12 btn-block text-uppercase" value="Sign Up" />
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    


