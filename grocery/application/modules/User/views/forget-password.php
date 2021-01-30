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
 <div class='hidden-overlay'></div>
         <script async='' defer='defer' src='../../apis.google.com/js/platform.js'></script>
         <meta content='1011673762143-tt04snelu0otv5vrogs2apvsjlh74no7.apps.googleusercontent.com' name='google-signin-client_id'>
         <main id='main-wrapper'>
            <section class='login-section'>
               <h2 class='section-heading inner-heading mobile-heading-section'>
                  <span class='heading02'>Welcome</span>
                  <span class='heading03'>Forget password</span>
               </h2>
               <div class='login-box'>
                  <h3 class='login-title'>Forget password</h3>
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
                  <form accept-charset="UTF-8" action="<?php echo base_url();?>User/send_mail" class="form-container" id="new_user" method="post">
                      <div class='form-box'>
                        <div class='input-box'>
                          <input required name="email" id="old_pass" value="<?php echo @$user_data->email;?>" type="email" class="form-control bg-clr" id="Enter Email">
                        </div>
                        <label>Enter Email</label>
                     </div>
   <button onclick="return conf_pass_validate();" class='btn red-btn l-btn mt-25' type='submit'>Send</button>
                  </form>
               </div>
               <div class='or-box text-center'>
                  <span class='or-text'></span>
               </div>
              
            </section>
         </main>
 