<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Askbootstrap">
      <meta name="author" content="Askbootstrap">
      <title>Organic Food & Grocery Market</title>
      <link rel="icon" type="image/png" href="<?php echo base_url();?>images/favicon.png">
      <link href="<?php echo site_url(); ?>common/js/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="<?php echo site_url(); ?>common/js/icons/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
      <link href="<?php echo site_url(); ?>common/css/style.css" rel="stylesheet">
      <!-- Owl Carousel -->
        <link rel="stylesheet" href="<?php echo site_url(); ?>common/Icons/icon.css">
       <!-- <script src="<?php //echo site_url(); ?>common/js/jquery/jquery.min.js"></script> -->
      <link rel="stylesheet" href="<?php echo site_url(); ?>common/js/owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="<?php echo site_url(); ?>common/js/owl-carousel/owl.theme.css">

   </head>
   <body>
     <!-- Modal -->
      <div class="modal fade location-modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-body">
               <div class="location-body__top-container">
                  <div style="">
                     <div><i class="mdi mdi-map-marker-circle" aria-hidden="true"></i></div>
                     <div class="n-l-add-box">
                        <div class="delivery-location">Delivery Location</div>
                        <div class="prev-address">
                           <div class="ellipsis">1221, Tower B, i-Thum, Sector 62, Noida</div>
                        </div>
                     </div>
                     <div style="display: flex; vertical-align: middle; align-items: center;">
                        <div class="location-box change-button"><button class="btn mask-button" onclick="nLDBoxRect()">Change</button></div>
                     </div>
                  </div>
               </div>
               <div class="n-l-d-box-rectangle" id="nldboxrectangle">
                  <div class="location-body__top-container">
                     <div style="">
                        <div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
                           <div style="color: rgb(51, 51, 51); font-weight: 600; font-size: 16px;">Change Location</div>
                           <button style="background-color: transparent; border: none; cursor: pointer; margin-top: 0; margin-right: 0; position: absolute; right: 4px; padding: 2px 10px; top: 5px; font-size: 18px;" onclick="closenLDBoxRect()">X</button>
                        </div>
                        <div style="display: flex; height: 100%;">
                           <button onclick="getLocation()" class="btn location-box mask-button">Detect my location</button>
                           <div class="oval-container">
                              <div class="oval">
                                 <span class="separator-text">
                                    <div class="or">OR</div>
                                 </span>
                              </div>
                           </div>
                           <div style="width: 220px;">
                              <div class="modal-right__input-wrapper">
                                 <div class="n-l-inp-box">
                                    <input type="text" placeholder="Type your city Society/Colony/Area">
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
      </div>


      <div class="modal fade login-modal-main" id="bd-example-modal">
         <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-body">
                  <div class="login-modal">
                     <div class="row">
                        <div class="col-lg-5 pad-right-0">
                           <div class="login-modal-left">
                           </div>
                        </div>
                       <script>
    document.onkeydown=function(evt){
       var keyCode = evt ? (evt.which ? evt.which : evt.keyCode) : event.keyCode;
        if(keyCode == 13)
        {
            //your function call here
            document.test.submit();
                    
        // window.location.href="<?php echo base_url();?>Pages/search/"+serach_key;
        }
    }
</script>
                        <script type="text/javascript">
                          
                           function serach_data(){
                              var serach_key=$("#serach_product").val();
                              //alert(serach_key);
                              window.location.href="<?php echo base_url();?>Pages/search/"+serach_key;
                           }
                           function get_user_email(){
                            var email=$("#flemail").val();
                            if(email==''){
                                $("#error_flemail").html('<span style="color:red">Please enter email </span>');
                                 
                               }else{
                                  $.ajax({
                                         url:"<?php echo base_url();?>User/send_mail",
                                         type:"post",
                                         data:{email:email},
                                         success:function(res){
                                            $("#forget_pass_msg").html(res);
                                             $("#error_flemail").html(' ');
                                           }
                                       });
                                       
                                      }   
                                  }
                          function get_cart_data(){
                                  $.ajax({
                                         url:"<?php echo base_url();?>Cart/get_cart_info",
                                         type:"post",
                                         data:{id:10},
                                         success:function(res){
                                            $(".cart-sidebar").html(res);
                                           }
                                       });
                              }

                           function get_user_login_info(submit=''){
                              //alert("ghjhj");
                              var email=$("#lemail").val();
                               //alert(email);
                               var password= $("input[name=lpassword]").val();
                              if(email==''){
                                $("#error_lemail").html('<span style="color:red">Please enter email </span>');
                                 
                               }else{
                                 $("#error_lemail").html('');
                                var eflag=1;
                               }
                               if(password==''){
                                $("#error_lpassword").html('<span style="color:red">Please enter password </span>');
                                
                               }else{
                                 $("#error_lpassword").html('');
                                var ppflag=1;
                               }
                           if(eflag==1 &&  ppflag==1 && submit=='submit'){
                                   $.ajax({
                                          url:"<?php echo base_url();?>User/login_front_check",
                                          type:"post",
                                          data:{email:email,password:password},
                                          success:function(res){
                                             var objJSON = JSON.parse(res);
                                                
                                             //alert(objJSON.login_success);
                                             if(objJSON.login_success){
                                                //alert(objJSON.login_success);
                                               window.location.href="<?php echo base_url();?>";
                                             }
                                             if(objJSON.login_error_show){
                                                $("#login_error_show").html('<span style="color:red">'+objJSON.login_error_show+'</span>');
                                             }
                                             if(objJSON.login_error_db_exist){
                                              //alert(objJSON.login_error_db_exist);
                                                $("#login_error_db_exist").html('<span style="color:red">'+objJSON.login_error_db_exist+'</span>');
                                             }
                                             

                                          }
                                     })
                              } 
                           }
                           function get_user_info(submit=''){
                              //alert("ghjhj");
                              var name=$("#first_name").val();
                              var phone=$("#phone").val();
                              var email=$("#email").val();
                              var password= $("input[name=password]").val();
                              if(name==''){
                                $("#error_name").html('<span style="color:red">Please enter name </span>');
                                
                               }else{
                                 $("#error_name").html('');
                                 var nflag=1;
                               }
                               if(phone==''){
                                $("#error_phone").html('<span style="color:red">Please enter phone </span>');
                                 
                               }else{
                                 $("#error_phone").html('');
                                   var pflag=1;
                               }
                               if(email==''){
                                $("#error_email").html('<span style="color:red">Please enter email </span>');
                                }else{
                                 $("#error_email").html('');
                                 var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                                  if(regex.test(email)){
                                      $("#error_email").html('');
                                      var eflag=1;
                                  }else{
                                    $("#error_email").html('<span style="color:red">Please enter valid email </span>');
                                     
                                  }
                               }
                               if(password==''){
                                $("#error_password").html('<span style="color:red">Please enter password </span>');
                                
                               }else{
                                 $("#error_password").html('');
                                   var ppflag=1;
                                 }
                           if(nflag==1 && eflag==1 && pflag==1 && ppflag==1 && submit=='submit'){
                                   $.ajax({
                                          url:"<?php echo base_url();?>User/Signup_user_front",
                                          type:"post",
                                          data:{first_name:name,phone:phone,email:email,password:password},
                                          success:function(res){
                                             var objJSON = JSON.parse(res);
                                            // alert(res);
                                             if(objJSON.email_error){
                                                $("#error_email").html('<span style="color:red">'+objJSON.email_error+'</span>');
                                             }
                                             if(objJSON.mobile_error){
                                                $("#error_phone").html('<span style="color:red">'+objJSON.mobile_error+'</span>');
                                             }
                                             if(objJSON.reg_msg_success){
                                                $("#reg_msg_success").html('<span style="color:green">'+objJSON.reg_msg_success+'</span>');
                                                $("#first_name").val('');
                                                $("#phone").val('');
                                                $("#email").val('');
                                                $("#password").val('');
                                                
                                             }

                                          }
                                     })
                              } 
                           }
                        </script>
                        <div class="col-lg-7 pad-left-0">
                           <button type="button" class="close close-top-right" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
                           <span class="sr-only">Close</span>
                           </button>
                          
                              <div class="login-modal-right">
                                 <!-- Tab panes -->
                                 <div class="tab-content">
                                    <div class="tab-pane" id="forgot" role="tabpanel">
                                       <h5 class="heading-design-h5">FORGET PASSWORD</h5>
                                       <div id="forget_pass_msg"></div>
                                        <form name="login_form" id="login_form" method="post">
                                         <fieldset class="form-group">
                                          <label>Enter Email</label>
                                           <input  type="email" class="form-control" name="lemail" id="flemail" />
                                           <div id="error_flemail"></div>
                                       </fieldset>
                                       
                                       <fieldset class="form-group">
                                          <!-- <button type="submit" class="btn btn-lg btn-secondary btn-block">Enter to your account</button> -->
                                           <!-- <a onclick="get_user_info('submit');" class="btn btn-lg btn-secondary btn-block"><i class="mdi mdi-pencil"></i>Enter to your account</a> -->
                                           <a style="color:black" onclick="get_user_email('submit');" class="btn btn-lg btn-secondary btn-block"  role="tab1"><i class="mdi mdi-pencil"></i>Send</a>
                                       </fieldset>
                                        </form>
                                       
                                       
                                    </div>
                                    
                                    <div class="tab-pane active" id="login" role="tabpanel">
                                       <h5 class="heading-design-h5">Login to your account</h5>
                                        <div id="login_error_show"></div>
                                         <div id="login_error_db_exist"></div>
                                       <form name="login_form" id="login_form" method="post">
                                       <fieldset class="form-group">
                                          <label>Enter Email</label>
                                           <input onchange="get_user_login_info()" type="email" class="form-control" name="lemail" id="lemail" />
                                           <div id="error_lemail"></div>
                                       </fieldset>
                                       <fieldset class="form-group">
                                          <label>Enter Password</label>
                                           <input onchange="get_user_login_info()" class="form-control" type="password" name="lpassword" id="lpassword"/>
                                            <div id="error_lpassword"></div>
                                            <span toggle="#lpassword" class="fa fa-fw mdi mdi-eye-settings field-icon toggle-password"></span>
                                       </fieldset>
                                       <fieldset class="form-group">
                                          <!-- <button type="submit" class="btn btn-lg btn-secondary btn-block">Enter to your account</button> -->
                                           <!-- <a onclick="get_user_info('submit');" class="btn btn-lg btn-secondary btn-block"><i class="mdi mdi-pencil"></i>Enter to your account</a> -->
                                           <a style="color:black" onclick="get_user_login_info('submit');" class="btn btn-lg btn-secondary btn-block"  role="tab1"><i class="mdi mdi-pencil"></i>Login</a>
                                       </fieldset>
                                        </form>
                                       <div class="login-with-sites text-center">
                                          <p>or Login with your social profile:</p>
                                          <button class="btn-facebook login-icons btn-lg"><i class="mdi mdi-facebook"></i> Facebook</button>
                                          <button class="btn-google login-icons btn-lg"><i class="mdi mdi-google"></i> Google</button>
                                          <button class="btn-twitter login-icons btn-lg"><i class="mdi mdi-twitter"></i> Twitter</button>
                                       </div>
                                       <div class="custom-control custom-checkbox">
                                          <input type="checkbox" class="custom-control-input" id="customCheck1">
                                          <label class="custom-control-label" for="customCheck1">Remember me</label>
                                       </div>
                                    </div>
                                
                                    <div class="tab-pane" id="register" role="tabpanel">
                                       <div id="reg_msg_success"></div>
                                       <form  id="user_registration" name="user_registration" method="post">
                                       <h5 class="heading-design-h5">Register Now!</h5>
                                       <fieldset class="form-group">
                                          <!-- <label>Mobile number</label> -->
                                          <input class="form-control" onkeypress="return /[a-z]/i.test(event.key)" placeholder="Name" type="text" onchange="get_user_info()"   name="first_name" id="first_name" >
                                          <div id="error_name"></div>
                                       </fieldset>
                                       <fieldset class="form-group">
                                          <!-- <label>Mobile number</label> -->
                                          <input class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57'  placeholder="Mobile number" type="text" pattern="^\d{10}$" maxlength="10" onchange="get_user_info()" name="phone" id="phone" >
                                          <div id="error_phone"></div>
                                       </fieldset>
                                       <fieldset class="form-group">
                                         <!--  <label>Enter email</label> -->
                                          <input class="form-control" type="text" onchange="get_user_info()" placeholder="Enter email"  name="email" id="email">
                                           <div id="error_email"></div>
                                       </fieldset>
                                       <fieldset class="form-group">
                                         <!--  <label>Enter Password</label> -->
                                         <input class="form-control" onchange="get_user_info()" placeholder="Enter Password" title="" type="password" name="password" id="password" >
                                          <div id="error_password"></div>
                                       </fieldset>
                                      <!--  <fieldset class="form-group">
                                          <label>Enter Confirm Password </label>
                                          <input type="password" class="form-control" placeholder="********">
                                       </fieldset> -->
                                       <fieldset class="form-group">
                                         <!--  <button  class="btn btn-lg btn-secondary btn-block">Create Your Account</button> -->
                                           <a onclick="get_user_info('submit');" class="btn btn-lg btn-secondary btn-block" data-toggle="tab" href="#register" role="tab"><i class="mdi mdi-pencil"></i> Create Your Account</a>
                                       </fieldset>
                                       <div class="custom-control custom-checkbox">
                                          <input type="checkbox" class="custom-control-input" id="customCheck2">
                                          <label class="custom-control-label" for="customCheck2">I Agree with <a href="#">Term and Conditions</a></label>
                                       </div>
                                    </div>
                                 </form>
                                 </div>
                                 <div class="clearfix"></div>
                                 <div class="text-center login-footer-tab">
                                    <ul class="nav nav-tabs" role="tablist">
                                       <li class="nav-item">
                                          <a class="nav-link active" data-toggle="tab" href="#login" role="tab"><i class="mdi mdi-lock"></i> LOGIN</a>
                                       </li>
                                       <li class="nav-item">
                                          <a class="nav-link"  data-toggle="tab" href="#register" role="tab"><i class="mdi mdi-pencil"></i> REGISTER</a>
                                           <!-- <button class='btn red-btn l-btn mt-25' type="submit">Signup</button> -->
                                       </li>
                                       <li class="nav-item">
                                           <a class="nav-link" data-toggle="tab" href="#forgot" role="tab"><i class="mdi mdi-lock"></i> Forgot Password?</a>
                                           </li>
                                    </ul>
                                 </div>
                                 <div class="clearfix"></div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="navbar-top bg-success pt-2 pb-2">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-12 text-center">
                  <a href="shop.html" class="mb-0 text-white">
                  20% cashback for new users | Code: <strong><span class="text-light">GROCERY-12 <span class="mdi mdi-tag-faces"></span></span> </strong>  
                  </a>
               </div>
            </div>
         </div>
      </div>
      <nav class="navbar navbar-light navbar-expand-lg bg-dark bg-faded grocery-menu" style="z-index: 101;">
         <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo base_url();?>"> <img src="<?php echo base_url();?>images/logo.png" alt="logo"> </a>
         <!-- <a class="location-top" href="#"><i class="mdi mdi-map-marker-circle" aria-hidden="true"></i> India</a> -->
         <div class="location-block-h">
            <button type="button" class="location-top" data-toggle="modal" data-target="#exampleModal">
            <i class="mdi mdi-map-marker-circle" aria-hidden="true"></i> India
            </button>
         </div>
            <button class="navbar-toggler navbar-toggler-white" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse" id="navbarNavDropdown">

               <div class="navbar-nav mr-auto mt-2 mt-lg-0 margin-auto top-categories-search-main">
                 <div class="top-categories-search">
                     <div class="input-group">
                        <!-- <span class="input-group-btn categories-dropdown">
                           <select class="form-control-select">
                              <option selected="selected">Your City</option>
                              <option value="0">New Delhi</option>
                              <option value="2">Bengaluru</option>
                              <option value="3">Hyderabad</option>
                              <option value="4">Kolkata</option>
                           </select>
                        </span> -->
                      <form style="width:100%"  name="search" action="<?php echo base_url();?>Pages/search" method="post">
                        <input class="form-control" name="serach_product" id="serach_product" placeholder="Search products" aria-label="Search products" type="text" value="<?php echo @$_SESSION['search_text']?>">
                        <span style="position: absolute;top:0;right: 0" class="input-group-btn">
                        <button type="submit" onclick="serach_data();" class="btn btn-secondary" type="button"><i class="mdi mdi-file-find"></i> Search</button>
                        </span>
                      </form>
                     </div>
                  </div>
               </div>
               <div class="my-2 my-lg-0">
                  <ul class="list-inline main-nav-right">
                     <?php
                        if(@$_SESSION['userid']==''){
                         
                     ?>
                       <li class="list-inline-item">
                        <a href="#" data-target="#bd-example-modal" data-toggle="modal" class="btn btn-link"><i class="mdi mdi-account-circle"></i> Login/Sign Up</a>
                     </li>
                      <?php }?>
                      <!-- After login my profile dropdown --->
                     <?php
                        if(@$_SESSION['userid']!=''){
                         
                     ?>

                     <li class="list-inline-item dropdown grocery-top-dropdown">
                        <a class="btn btn-theme-round dropdown-toggle dropdown-toggle-top-user" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php
                            if(@$_SESSION['photo']){?>
                        <img alt="logo" src="<?php echo base_url();?>admin/upload/profile/<?php echo @$_SESSION['photo']; ?>">
                        <?php } else{?>
                        <img alt="logo" src="http://stage.wayinfotechsolutions.co/grocery/admin/upload/profile/1606218735_user.png">
                        <?php }?>
                        
                        <strong></strong><?php echo @$_SESSION['user_name']; ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-list-design">
                           <!-- <a href="<?php echo base_url();?>User/profile" class="dropdown-item"><i aria-hidden="true" class="mdi mdi-account-outline"></i>  My Profile</a> -->
                           <!-- <a href="my-address.html" class="dropdown-item"><i aria-hidden="true" class="mdi mdi-map-marker-circle"></i>  My Address</a> -->
                           <a href="<?php echo base_url();?>User/profile" class="dropdown-item"><i aria-hidden="true" class="mdi mdi-account-outline"></i>  My Profile</a>
                           <!-- <a href="<?php echo base_url();?>User/wish_history" class="dropdown-item"><i aria-hidden="true" class="mdi mdi-heart-outline"></i>  Wish List </a> -->
                           <a href="<?php echo base_url();?>User/order_history" class="dropdown-item"><i aria-hidden="true" class="mdi mdi-format-list-bulleted"></i>  Order List</a>
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item" href="<?php echo base_url();?>User/logout_sess"><i class="mdi mdi-lock"></i> Logout</a>  
                        </div>
                     </li>
                     <?php }?>
                      <!-- After login my profile dropdown --->
                     <?php 
                     $this->load->library('cart');
                     $cart = $this->cart->contents();
                      // print_r($cart);
                    //echo $this->cart->total_items();
                    if($cart = $this->cart->contents()){
                      $i = 0;
                    foreach($cart as $item){
                     $i++;} }?>
                     <li class="list-inline-item cart-btn">
                        <a href="#" data-toggle="offcanvas" onclick="get_cart_data()" class="btn btn-link border-none"><i class="mdi mdi-cart"></i> My Cart <small class="cart-value">
                          <?php 
                          if(@$i){
                          echo @$i;
                           }else{
                            echo '0';
                           }

                          ?></small></a>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </nav>
      
      <nav class="navbar navbar-expand-lg navbar-light grocery-menu-2 pad-none-mobile nav-fixed">
         <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarText">
               <ul class="navbar-nav mr-auto mt-2 mt-lg-0 margin-auto">
                  <li class="nav-item">
                     <a class="nav-link shop" href="<?php echo base_url();?>"><span class="mdi mdi-store"></span> Super Store</a>
                  </li>
              <li class="nav-item">
                     <a href="<?php echo base_url();?>" class="nav-link">Home</a>
                  </li>
                <li class="nav-item">
                     <a href="<?php echo base_url();?>Content/about_us" class="nav-link">About Us</a>
                  </li>
                    <?php
                       $cat_data=getcatname('category_details','id,category_name');
                        $i=1;
                        foreach ($cat_data as $key => $value) {
                         if($i<=3){ 
                       ?>
                  <li class="nav-item">
                     <a class="nav-link" href="<?php echo base_url();?>Pages/common_page/<?php echo @$value->id;?>"><?php echo @$value->category_name;?></a>
                  </li>
                <?php  } $i++;}?>
                  <!-- <li class="nav-item">
                     <a class="nav-link" href="<?php echo base_url();?>Pages/common_page">Grocery & Staples</a>
                  </li> -->
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     More
                     </a>
                     <div class="dropdown-menu">
                      <?php
                       $cat_data=getcatname('category_details','id,category_name');
                        $i=1;
                        foreach ($cat_data as $key => $value) {
                          
                          if($i>3){ 
                          ?>
                        <a class="dropdown-item" href="<?php echo base_url();?>Pages/common_page/<?php echo @$value->id;?>"><i class="mdi mdi-chevron-right" aria-hidden="true"></i> <?php echo @$value->category_name;?></a>
                      <?php } $i++;}?>
                        <!-- <a class="dropdown-item" href="#"><i class="mdi mdi-chevron-right" aria-hidden="true"></i> Grocery</a>
                        <a class="dropdown-item" href="#"><i class="mdi mdi-chevron-right" aria-hidden="true"></i> Fashion</a>
                        <a class="dropdown-item" href="#"><i class="mdi mdi-chevron-right" aria-hidden="true"></i> Kitchen</a> --> 
                     </div>
                  </li>
                 
                 <!--  <li class="nav-item">
                     <a class="nav-link" href="<?php echo base_url();?>Pages/blog_page">Blog Page </a>
                  </li> -->
             
                  <li class="nav-item">
                     <a class="nav-link" href="<?php echo base_url();?>Pages/contactus">Contact</a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
      <div class="groci-spc"></div>
      <style type="text/css">
  .field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}

.container{
  padding-top:50px;
  margin: auto;
}

</style>
<script>
function remove_togle(){
   $("body").removeClass('toggled');
}
</script>
 <script type="text/javascript">
    function increment_val(cart_id,rowid,price,qty){
    //alert(cart_id);

    //return false;
     var daa=$("#cart_"+cart_id).val();
     var dss=$("#fcart_"+cart_id).val();
     if(daa){
      var da=daa;
     }
    if(dss){
      var da=dss;
     }

     //var da=$("#fcart_"+cart_id).val();
     //var inputQuantityElement = $("#cart_"+cart_id);
     var newQuantity = parseInt(da)+1;
     var row_subtotal=Math.floor(price*newQuantity);
    // alert(row_subtotal);
       $("#row_subtotal_"+cart_id).html('₹ '+row_subtotal+'.00');
       $("#fcart_"+cart_id).val(newQuantity);
       $("#cart_"+cart_id).val(newQuantity);
     $.ajax({
          url:"<?php echo base_url();?>"+'Cart/update_cart_ajax',
          type:'POST',
          data:{cart_id:cart_id,row_id:rowid,price:price,qty:newQuantity},
          success:function(result){
            //alert(result);
            $("#allamnt").html(result);
            $(".allamnt2").html(result);
            //window.location.href="<?php echo base_url();?>Cart/add";
          }
      })
     
   } 
 function decrement_quantity(cart_id,rowid,price,qty){
    // alert(cart_id);
     //var da=$("#cart_"+cart_id).val();
     var daa=$("#cart_"+cart_id).val();
     var dss=$("#fcart_"+cart_id).val();
     if(daa){
      var da=daa;
     }
    if(dss){
      var da=dss;
     }
     // var inputQuantityElement = $("#fcart_"+cart_id);
      //var inputQuantityElement = $("#cart_"+cart_id);


     if(da > 1) 
     {
      var newQuantity = parseInt(da)-1;
      //alert(newQuantity);
      $("#cart_"+cart_id).val(newQuantity);
     var row_subtotal=Math.floor(price*newQuantity);
     $("#row_subtotal_"+cart_id).html('₹ '+row_subtotal+'.00');
     $("#cart_"+cart_id).val(newQuantity);
     $("#fcart_"+cart_id).val(newQuantity);
      $.ajax({
          url:"<?php echo base_url();?>"+'Cart/update_cart_ajax',
          type:'POST',
          data:{cart_id:cart_id,row_id:rowid,price:price,qty:newQuantity},
          success:function(result){
            $("#allamnt").html(result);
            $(".allamnt2").html(result);
            //window.location.href="<?php echo base_url();?>Cart/add";
          }
      })
     }
   } 

 
  </script>

<script>
         function nLDBoxRect() {
                 var element = document.getElementById("nldboxrectangle");
                 element.classList.toggle("n-l-d-show");
              }
              function closenLDBoxRect() {
               var element = document.getElementById("nldboxrectangle");
                element.classList.toggle("n-l-d-show");
               }
           
         
      </script>
      <script>
var x = document.getElementById("demo");
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
 // alert(position.coords.latitude,position.coords.longitude);
 $.ajax({
         url:"<?php echo base_url();?>"+'Home/get_current_address',
         type:"post",
         data:{lat:position.coords.latitude,lang:position.coords.longitude},
         success:function(res){
         $(".ellipsis").html(res);
        $("#nldboxrectangle").removeClass("n-l-d-show");

         }
})
 
}
</script>