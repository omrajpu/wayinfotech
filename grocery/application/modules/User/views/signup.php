
         <div class='hidden-overlay'></div>
         <main id='main-wrapper'>
            <section class='login-section'>
               <h2 class='section-heading inner-heading mobile-heading-section'>

                  <span class='heading02'>Welcome</span>
                  <span class='heading03'>Login / Signup</span>
               </h2>
               <div class='login-box signup-box'>
                  <h3 class='login-title'>Signup</h3>
                   <?php if($this->session->flashdata('alredy_reg_error')){?>
                    <div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i>
                     <?php
                      echo $_SESSION['alredy_reg_error'];
                      unset($_SESSION['reg_msg']);
                      unset($_SESSION['alredy_reg_error']);
                     
                    ?>
                    <button type="button" class="close" data-dismiss="alert">×</button>
                  </div>
                <?php }
                 if($this->session->flashdata('reg_msg')){?>
                    <div class="alert alert-success alert-dismissible"><i class="fa fa-exclamation-circle"></i>
                     <?php
                      echo $_SESSION['reg_msg'];
                      unset($_SESSION['alredy_reg_error']);
                      unset($_SESSION['reg_msg']);
                      unset($_SESSION['login_error_show']);
                     
                    ?>
                    <button type="button" class="close" data-dismiss="alert">×</button>
                  </div>

              <?php }  ?>
                  <form accept-charset="UTF-8" action="<?php echo site_url()?>User/Signup_user_front" class="form-container" id="new_user" method="post">
                    
                    <div class='form-box'>
                        <div class='input-box'>
                           <input onkeypress="return /[a-z]/i.test(event.key)" type="text" name="first_name" id="FirstName"   required>
                        </div>
                        <label for=''>First Name</label>
                     </div>
                     <div class='form-box'>
                        <div class='input-box'>
                          <input onkeypress="return /[a-z]/i.test(event.key)" type="text" onkeypress="return IsAlphaNumeric(event);"   name="last_name" id="LastName" required>
                        </div>
                        <label for=''>Last NAme</label>
                     </div>
                       <div class='form-box'>
                        <div class='input-box'>
                         <input type="tel" pattern="^\d{10}$" maxlength="10"  name="phone" id="Mobile"  required >
                        </div>
                        <label for=''>Mobile</label>
                     </div>
                     <div class='form-box'>
                        <div class='input-box'>
                           <input type="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email" id="Email"  required>
                           <div class='email_err_msg'></div>
                           <a class="email_err_login" href="sign_in.html"> Click here to Login</a>
                        </div>
                        <label for=''>Email*</label>
                     </div>
                     <div class='form-box'>
                        <div class='input-box' type='password'>
                            <input pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" type="password" name="password" id="CreatePassword"   required >
                           </div>
                        <label for=''>Password*</label>
                        <div class='password_err_msg'></div>
                     </div>
                     <!-- <button class='btn red-btn l-btn mt-25' type='submit'>Signup</button> -->
                     <button class='btn red-btn l-btn mt-25' type="submit">Signup</button>
                  </form>
               </div>
               <div class='or-box text-center'>
                  <span class='or-text'>Or use</span>
               </div>
               <div class='login-social-box text-center'>
                  <a class='btn l-btn fb-btn' href='##'>
                  <i class='fa fa-facebook'></i>
                  <span>Sign up with Facebook</span>
                  </a>
                  <a class='btn l-btn google-btn' href='##'>
                  <span class='g-icon'>
                  <img src='<?php echo base_url();?>images/gplus.png'>
                  </span>
                  <span>Sign up with Google</span>
                  </a>
               </div>
               <div class='not-member-box'>
                  <p>
                     <span>Already a member?</span>
                     <a href='<?php echo base_url();?>User/signin'>Login</a>
                  </p>
               </div>
            </section>
         </main>
         <div class='sucess-loader-overlay'></div>
         <div class='sucess-loader' id='loader'>
            <img alt='main loader' src='images/loading_icon.gif'>
         </div>
         <div class='clear'></div>