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
      <section class="section-padding bg-dark inner-header">
         <div class="container">
            <div class="row">
               <div class="col-md-12 text-center">
                  <h1 class="mt-0 mb-3 text-white">Forgot Password</h1>
                  <div class="breadcrumbs">
                     <p class="mb-0 text-white"><a class="text-white" href="#">Home</a>  /  <span class="text-success">Forgot Password</span></p>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End Inner Header -->
      <!-- Contact Us -->
      <section class="section-padding">
        
      </section>
      <!-- End Contact Us -->
      <!-- Contact Me -->
      <section class="section-padding  bg-white">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12 section-title text-left mb-4">
                  <h2>Change Password</h2>
               </div>
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
               <form action="<?php echo base_url();?>User/forget_save_password" method="post" class="col-lg-12 col-md-12" class="col-lg-12 col-md-12" name="sentMessage" id="contactForm">
                   <input type="hidden" name="user_id" value="<?php echo $this->uri->segment(3); ?>">
                     <input type="hidden" name="key" value="<?php echo $this->uri->segment(4); ?>">
                  <div class="control-group form-group">
                     <div class="controls">
                        <label>New Password <span class="text-danger">*</span></label>
                        <input type="password" style="width:100%" class="form-control" name="new_pass" id="new_pass" required data-validation-required-message="Please enter your name.">
                        <p class="help-block"></p>
                     </div>
                  </div>
             <div class="control-group form-group">
                     <div class="controls">
                        <label>Confirm Password <span class="text-danger">*</span></label>
                        <input type="password" style="width:100%" class="form-control"  required name="conf_pass" id="conf_pass" value="<?php echo @$user_data->first_name;?>" type="password">
                        <p class="help-block"></p>
                     </div>
                  </div>
                  <div id="success"></div>
                  <!-- For success/fail messages -->
                  <button onclick="return conf_pass_validate();" type="submit" class="btn btn-success">Send Message</button>
               </form>
            </div>
         </div>
      </section>
      <!-- End Contact Me -->

     