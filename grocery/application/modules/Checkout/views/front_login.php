
    <!-- /page title -->
    <!-- about -->
    <script type="text/javascript">
     function validateEmail(emailField){
        //alert(emailField);
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(emailField.value) == false) 
        {
            alert('Invalid Email Address');
            return false;
        }

        return true;

}   

    </script>
     <section class="section">
        <div class="container login-form">
              
                <div class="row">

                    <div class="col-md-6 login-form-1">
                         <?php 
                                if($this->session->flashdata('login_error_show')) { ?>
                                                    <div role="alert" class="alert alert-danger">
                                                            <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
                                                          <?php   echo $_SESSION['login_error_show'];
                                                                  unset($_SESSION['login_error_show']);
                                                          ?>
                                                    </div>
                                            <?php }
                                            if($this->session->flashdata('reg_error')) { ?>
                                                    <div role="alert" class="alert alert-danger">
                                                            <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
                                                          <?php   echo $_SESSION['reg_error'];
                                                                 unset($_SESSION['reg_error']);
                                                          ?>
                                                    </div>
                                            <?php }?>
                      <form method="post" action="<?php echo site_url()?>Checkout/login_front_check" name="login_user">
                        <h3>Login</h3>
                        <div class="form-group">
                            <input type="text" onblur="validateEmail(this);" name="email" required="" class="form-control" placeholder="Your Email *" value="" />
                        </div>
                        <div class="form-group">
                           <input type="password" name="password" required="" class="form-control" placeholder="Your Password *" value="" />
                        </div>
                       <!--  <div class="form-group remember-check">
                            <input type="checkbox" id="remember" name="rememberMe" value="Remember me">
                            <label for="remember">Remember me</label>
                        </div> -->
                        <div class="form-group">
                            <input type="submit"  class="btnSubmit" value="Login" />
                        </div>
                        <!-- <div class="form-group">
                            <a href="#" class="btnForgetPwd">Forget Password?</a>
                        </div> -->
                        <div class="form-note">
                            <h6>Not an user, Sign up Now</h6>
                        </div>
                        </form>
                    </div>
                    
                        
                    <div class="col-md-6 login-form-2">
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
                        <form action="<?php echo site_url()?>Checkout/Signup_user_front" method="post">
                        <div class="login-logo">
                            <img src="<?php echo site_url(); ?>common/images/logo.png" alt="" />
                        </div>
                        <h3>Register</h3>
                        <div class="form-group">
                           <input type="text" required="" name="name" class="form-control" placeholder="Your Name *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="email" required="" name="email" class="form-control" placeholder="Your Email *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="tel" required="" name="phone" class="form-control" placeholder="Your Phone *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" required="" name="password" class="form-control" placeholder="Your Password *" value="" />
                        </div>
                        <div class="form-group">
                             <input type="password" required="" name="confpassword" class="form-control" placeholder="Retype Password *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Sign Up" />
                        </div>
                        </form>
                    </div>
                     
                </div>
           
        </div>
        <!-- //row -->
    </section>
   
  
    <div id="corporate-query" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">

                <div class="modal-body">
                    <div class="container contact">
                        <div class="row">
                            
                            <h4>Corporate Query</h4>
                            <div id="res_msg"></div>
                            <div class="col-md-12">
                           
                                <div class="contact-form">
                                    <div class="form-group">
                                        <label class="control-label col-md-3" for="fname">Full Name:</label>
                                        <div class="col-md-12">
                                            <input required type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname">
                                            <input type="hidden" id="cat_query_name" name="cat_query_name" value="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3" for="lname">Mobile:</label>
                                        <div class="col-md-12">
                                            <input required type="text" class="form-control"  id="mobile" placeholder="Mobile" name="mobile">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3" for="email">Email:</label>
                                        <div class="col-md-12">
                                            <input required type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-4" for="comment">Your meassage</label>
                                        <div class="col-md-12">
                                            <textarea required class="form-control" rows="5" id="desc"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-md-10">
                                           
                                          <button  onclick="get_fom_data11()">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                     
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

    <!--modal strat-->
    <!--==========================
      Footer
   