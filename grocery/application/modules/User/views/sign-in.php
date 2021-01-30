 <div class='hidden-overlay'></div>
         <script async='' defer='defer' src='../../apis.google.com/js/platform.js'></script>
         <meta content='1011673762143-tt04snelu0otv5vrogs2apvsjlh74no7.apps.googleusercontent.com' name='google-signin-client_id'>
         <main id='main-wrapper'>
            <section class='login-section'>
               <h2 class='section-heading inner-heading mobile-heading-section'>
                  <span class='heading02'>Welcome</span>
                  <span class='heading03'>Login / Signup</span>
               </h2>
               <div class='login-box'>
                  <h3 class='login-title'>Registered User</h3>
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
                  <form accept-charset="UTF-8" action="<?php echo site_url()?>User/login_front_check" class="form-container" id="new_user" method="post">
                     <div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /><input name="authenticity_token" type="hidden" value="pdeByJ0v9AS7V0oSWzaa7Tssm5k2OZtD+wLrNxTgROM=" /></div>
                     <div class='form-box'>
                        <div class='input-box'>
                           <input  required type="email"  name="email" id="name" />
                        </div>
                        <label>Email</label>
                     </div>
                     <div class='form-box'>
                        <div class='input-box'>
                           <input required type="password" name="password" id="password"/>
                        </div>
                        <label>Password</label>
                     </div>
                     <a class='forgot-password mt-25' href='http://stage.wayinfotechsolutions.co/jamairaja/User/forget_pass'>Forgot Password?</a>
                     <button class='btn red-btn l-btn mt-25' type='submit'>Login</button>
                  </form>
               </div>
               <div class='or-box text-center'>
                  <span class='or-text'>Or use</span>
               </div>
               <!--<div class='login-social-box text-center'>-->
               <!--   <a class='btn l-btn fb-btn' href='https://www.facebook.com/'>-->
               <!--   <i class='fa fa-facebook'></i>-->
               <!--   <span>Login with Facebook</span>-->
               <!--   </a>-->
               <!--   <a class='btn l-btn google-btn' href='##'>-->
               <!--   <span class='g-icon'>-->
               <!--   <img src='<?php echo base_url();?>images/gplus.png'>-->
               <!--   </span>-->
               <!--   <span>Login with Google</span>-->
               <!--   </a>-->
               <!--</div>-->
               <div class='not-member-box'>
                  <p>
                     <span>Not a member? </span>
                     <a href='<?php echo base_url();?>User/signup'>Register Now</a>
                    
                     
                  </p>
               </div>
            </section>
         </main>
 