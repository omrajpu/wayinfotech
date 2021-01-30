
<?php include ("header.php") ?>
<div class="clearfix"></div>
 <div class="inner-bg">      
          <div class="container">
                	
                    <div class="row">
                        <div class="col-sm-12  text text-center">
                            <h1>Login &amp; Register Forms</h1>
                            <div class="description">
                            	<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-5">
                        	
                        	<div class="form-box">
	                        	<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Login to our site</h3>
	                            		<p>Enter username and password to log on:</p>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-lock"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
	                            <?php 
								if($this->session->flashdata('login_error')) { ?>
                                                    <div role="alert" class="alert alert-danger">
                                                            <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
                                                          <?php   echo $_SESSION['login_error'];?>
                                                    </div>
                                            <?php } ?>
				                    <form role="form" action="<?=base_url();?>index.php/login/sumbit_check" method="post" class="login-form">
				                    	<div class="form-group">
				                    		<label class="sr-only" for="form-username">Email</label>
				                        	<input type="text" name="email" required="" placeholder="Email..." class="box" id="form-username">
				                        </div>
				                        <div class="form-group">
				                        	<label class="sr-only" for="form-password">Password</label>
				                        	<input type="password" name="password" required="" placeholder="Password..." class="box" id="form-password">
				                        </div>
				                        <input type="hidden" name="action" value="Login">
				                        <input type="submit" value="Login" class="btnew box">
										
				                    </form>
			                    </div>
		                    </div>
		                
		                	<div class="social-login">
	                        	<h3>...or login with:</h3>
	                        	   <div class="social-login-buttons">
		                        	<a class="socialbt btn-link-2" href="#">
		                        	<i class="fa fa-facebook"></i> Facebook
		                        	</a>
		                        	<a class="socialbt btn-link-2" href="#">
		                        	<i class="fa fa-twitter"></i> Twitter
		                        	</a>
		                        	<a class="socialbt btn-link-2" href="#">
		                        	<i class="fa fa-google-plus"></i> Google Plus
		                        	</a>
	                        	</div>
	                        </div>
	                        
                        </div>
                        
                        <div class="col-sm-1 middle-border"></div>
                        <div class="col-sm-1"></div>
                       
                       <div class="col-sm-5">
                        	
                        	<div class="form-box">
                        		<div class="form-top">
	                        		<div class="form-top-left">
	                        			<h3>Sign up now</h3>
	                            		<p>Fill in the form below to get instant access:</p>
	                            		<?php
                                         
	                            		 if($this->session->flashdata('reg_msg')) { ?>
                                                    <div role="alert" class="alert alert-danger">
                                                            <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
                                                          <?php   echo $_SESSION['reg_msg'];?>
                                                    </div>
                                            <?php } ?>
	                        		</div>
	                        		<div class="form-top-right">
	                        			<i class="fa fa-pencil"></i>
	                        		</div>
	                            </div>
	                            <div class="form-bottom">
				                    <form role="form" action="<?php echo base_url();?>index.php/login/sumbit_check" method="post" class="registration-form">
				                    	<div class="form-group">
				                    		<label class="sr-only" for="form-first-name">User Name</label>
				                        	<input type="text" name="user_name" value="<?php echo set_value('user_name'); ?>" placeholder="User name..." class="box" id="form-first-name">
											<div style="margin-top: 0px; color: red;"><?php echo form_error('user_name'); ?></div>
										</div>
										<div class="form-group">
				                        	<label class="sr-only" for="form-email">Email</label>
				                        	<input type="text" name="email" value="<?php echo set_value('email'); ?>" placeholder="Email..." class="box" id="form-email">
				                            <div style="margin-top: 0px; color: red;"><?php echo form_error('email'); ?></div>
										
										</div>
										<div class="form-group">
				                        	<label class="sr-only" for="form-phone">Mobile</label>
				                        	<input type="text" name="phone" value="<?php echo set_value('phone'); ?>" placeholder="Mobile..." class="box" id="form-phone">
				                        <div style="margin-top: 0px; color: red;"><?php echo form_error('phone'); ?></div>
										</div>
										<div class="form-group">
				                        	<label class="sr-only" for="form-password">Password</label>
				                        	<input type="password" name="password" value="<?php echo set_value('password'); ?>" placeholder="Password..." class="box" id="form-password">
				                        <div style="margin-top: 0px; color: red;"><?php echo form_error('password'); ?></div>
										</div>
										<div class="form-group">
				                        	<label class="sr-only" for="form-email">Confirm Password</label>
				                        	<input type="password" name="cpassword" value="<?php echo set_value('cpassword'); ?>" placeholder="Confirm Password..." class="box" id="form-email">
				                        <div style="margin-top: 0px; color: red;"><?php echo form_error('cpassword'); ?></div>
										</div>
										<!--<div class="form-top-left">
	                        			<h3>LOGIN INFORMATION</h3>
	                            		<br>
	                        		</div>-->
										<!--<div class="form-group">
										
				                        	<label class="sr-only" for="form-email">Password</label>
				                        	<input type="text" value="<?php //echo set_value('password'); ?>" name="password" placeholder="password..." class="box" id="form-email">
											 <div style="margin-top: 0px; color: red;"><?php //echo form_error('password'); ?></div>
				                        </div>-->
										<!--<div class="form-group">
				                        	<label class="sr-only" for="form-email">Confirm Password</label>
				                        	<input type="text" value="<?php //echo set_value('cpassword'); ?>" name="cpassword" placeholder="cpassword..." class="box" id="form-email">
											<div style="margin-top: 0px; color: red;"><?php //echo form_error('cpassword'); ?></div>
				                        </div>-->
										
				                        <input type="hidden" name="action" value="Register">
				                        <input type="submit" value="Register" class="btnew box">
				                    </form>
			                    </div>
                        	</div>
                        	
                        </div>
						
						
					
					
                    </div>
                    
                </div>          
             
          </div>  
             
   
                    
       
        
        
        
       
        <div class="clearfix"></div>
        <?php include ("footer.php") ?>