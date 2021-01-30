<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <title>Aamku</title>
    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- ** Plugins Needed for the Project ** -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo site_url(); ?>common/plugins/bootstrap/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo site_url(); ?>common/plugins/font-awesome/css/font-awesome.min.css">
    <!-- slick slider -->
    <link rel="stylesheet" href="<?php echo site_url(); ?>common/plugins/slick/slick.css">
    <!-- themefy-icon -->
    <link rel="stylesheet" href="<?php echo site_url(); ?>common/plugins/themify-icons/themify-icons.css">
    <link href="<?php echo site_url(); ?>common/css/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo site_url(); ?>common/css/owl.theme.css" rel="stylesheet">
    <!-- Main Stylesheet -->
    <link href="<?php echo site_url(); ?>common/css/style.css" rel="stylesheet">
    <link href="<?php echo site_url(); ?>common/css/style01.css" rel="stylesheet">
    <!--Favicon-->
    <link rel="shortcut icon" href="<?php echo site_url(); ?>common/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo site_url(); ?>common/images/favicon.ico" type="image/x-icon">
    
</head>

<body>
    <header class="navigation fixed-top">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand font-tertiary h3" href="<?php echo site_url(); ?>"><img src="<?php echo site_url(); ?>common/images/logo.png" alt="Myself"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-center" id="navigation">
           
                 <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url(); ?>Pages/general_notebook">General</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url(); ?>Pages/personalizable_notebook">Personalizable</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url(); ?>Pages/interest_notebook">By Interest</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url(); ?>Pages/office_use_notebook">Office Use</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url(); ?>Pages/corporate_query">Corporate Query</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url(); ?>Pages/dealers_enquiry">Dealers Enquiry</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="<?php echo site_url(); ?>Pages/contact_page">Contact Us</a>
                    </li>
                    <?php if(@$_SESSION['userid']){
                              ?>
                   <li class="nav-item has_submenu">
                        <a id="submenu_switch" class="nav-link" href="JavaScript:void(0)">
                            <i class="fa fa-user-o"></i>
                        </a>
                        <ul class="submenu">
                            <li>
                                <a class="nav-link" href="<?php echo site_url(); ?>Pages/order">My Order</a>
                            </li>
                            <li>
                                <a class="nav-link" href="<?php echo site_url(); ?>Pages/coupon">My Coupon</a>
                            </li>
                            <li>
                                <a class="nav-link" href="<?php echo site_url(); ?>Cart/add">My Cart</a>
                            </li>
                            
                            <li>
                            <a class="nav-link" href="<?php echo site_url(); ?>Pages/wish_list">My Wishlist</a>
                            </li>
                            <li>
                                <a class="nav-link" href="<?php echo site_url(); ?>Pages/profile">My Account</a>
                            </li>
                            <li>
                                <a class="nav-link" href="<?php echo site_url();?>Cart/logout_sess">Logout</a>
                            </li>
                        </ul>
                    </li>
                    <?php  } else{?>
                    <li class="nav-item has_submenu">
                        <a id="submenu_switch" class="nav-link" href="JavaScript:void(0)">
                            <i class="fa fa-user-o"></i>
                        </a>
                        <ul class="submenu">
                            
                            <li>
                                <a class="nav-link" href="<?php echo site_url();?>Checkout/checkout">Sign/Sinup</a>
                            </li>
                           
                       </ul>
                    </li>
                    
                    <?php }?>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0)" onclick="openNav()">                        
                            <i class="fa fa-shopping-cart"></i>
                            <span class="cart-item--qty"><?php 
                           $this->load->library('cart');
                           $cart = $this->cart->contents();
                          echo $this->cart->total_items();?></span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- //Header -->
    <section class="mega-menu">
        <div class="container-fluid mt-110">
            <div class="row">
                <ul class="tabs">
                    <li class="active" rel="tab1"><img src="<?php echo site_url(); ?>common/images/notebook-icon01.png" alt="Aamku Notebook"> General Notebooks</li>
                    <li rel="tab2"><img src="<?php echo site_url(); ?>common/images/notebook-icon02.png" alt="Aamku Notebook">Personalised Notebooks</li>
                    <li rel="tab3"><img src="<?php echo site_url(); ?>common/images/notebook-icon03.png" alt="Aamku Notebook">Office Use Notebooks</li>
                    <li rel="tab4"><img src="<?php echo site_url(); ?>common/images/notebook-icon04.png" alt="Aamku Notebook">Notebooks by Interest</li>
                    <li rel="tab5"><img src="<?php echo site_url(); ?>common/images/notebook-icon05.png" alt="Aamku Notebook">Wedding Notebooks</li>
                </ul>
                <div class="tab_container">
                    <h3 class="d_active tab_drawer_heading" rel="tab1">Tab 1</h3>
                    <div id="tab1" class="tab_content">
                        <h2 class="text-center mt-5">General</h2>
                    </div>
                    <!-- #tab1 -->
                    <h3 class="tab_drawer_heading" rel="tab2">Tab 2</h3>
                    <div id="tab2" class="tab_content">
                        <section class="">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="personalizable-friendship.html">
                                            <div class="personalizable-box for-menu">
                                                <div class="pull-left relation-image">
                                                    <img src="<?php echo site_url(); ?>common/images/personalizable/icon/friends.png">
                                                </div>
                                                <div class="relation-name">
                                                    <h4>Friendship</h4>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="personalizable-travel.html">
                                            <div class="personalizable-box for-menu">
                                                <div class="pull-left relation-image">
                                                    <img src="<?php echo site_url(); ?>common/images/personalizable/icon/travel.png">
                                                </div>
                                                <div class="relation-name">
                                                    <h4>Travel</h4>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="personalizable-sister.html">
                                            <div class="personalizable-box for-menu">
                                                <div class="pull-left relation-image">
                                                    <img src="<?php echo site_url(); ?>common/images/personalizable/icon/sister.png">
                                                </div>
                                                <div class="relation-name">
                                                    <h4>Sister</h4>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="personalizable-mother.html">
                                            <div class="personalizable-box for-menu">
                                                <div class="pull-left relation-image">
                                                    <img src="<?php echo site_url(); ?>common/images/personalizable/icon/mother.png">
                                                </div>
                                                <div class="relation-name">
                                                    <h4>Mother</h4>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="personalizable-brother.html">
                                            <div class="personalizable-box for-menu">
                                                <div class="pull-left relation-image">
                                                    <img src="<?php echo site_url(); ?>common/images/personalizable/icon/brother.png">
                                                </div>
                                                <div class="relation-name">
                                                    <h4>Brother</h4>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="personalizable-father.html">
                                            <div class="personalizable-box for-menu">
                                                <div class="pull-left relation-image">
                                                    <img src="<?php echo site_url(); ?>common/images/personalizable/icon/father.png">
                                                </div>
                                                <div class="relation-name">
                                                    <h4>Father</h4>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="personalizable-school.html">
                                            <div class="personalizable-box for-menu">
                                                <div class="pull-left relation-image">
                                                    <img src="<?php echo site_url(); ?>common/images/personalizable/icon/back-to-school.png">
                                                </div>
                                                <div class="relation-name">
                                                    <h4>Back to School</h4>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="personalizable-birthday.html">
                                            <div class="personalizable-box for-menu">
                                                <div class="pull-left relation-image">
                                                    <img src="<?php echo site_url(); ?>common/images/personalizable/icon/birthday.png">
                                                </div>
                                                <div class="relation-name">
                                                    <h4>Birthday</h4>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="personalizable-quotes.html">
                                            <div class="personalizable-box for-menu">
                                                <div class="pull-left relation-image">
                                                    <img src="<?php echo site_url(); ?>common/images/personalizable/icon/quotes.png">
                                                </div>
                                                <div class="relation-name">
                                                    <h4>Quotes</h4>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="personalizable-scrapbook.html">
                                            <div class="personalizable-box for-menu">
                                                <div class="pull-left relation-image">
                                                    <img src="<?php echo site_url(); ?>common/images/personalizable/icon/scrapbook.png">
                                                </div>
                                                <div class="relation-name">
                                                    <h4>Scrapbook</h4>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="personalizable-wedding.html">
                                            <div class="personalizable-box for-menu">
                                                <div class="pull-left relation-image">
                                                    <img src="<?php echo site_url(); ?>common/images/personalizable/icon/wedding.png">
                                                </div>
                                                <div class="relation-name">
                                                    <h4>Wedding</h4>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="personalizable-sports.html">
                                            <div class="personalizable-box for-menu">
                                                <div class="pull-left relation-image">
                                                    <img src="<?php echo site_url(); ?>common/images/personalizable/icon/sport.png">
                                                </div>
                                                <div class="relation-name">
                                                    <h4>Sports</h4>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="personalizable-corporate.html">
                                            <div class="personalizable-box for-menu">
                                                <div class="pull-left relation-image">
                                                    <img src="<?php echo site_url(); ?>common/images/personalizable/icon/corporate.png">
                                                </div>
                                                <div class="relation-name">
                                                    <h4>Corporate</h4>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="personalizable-love.html">
                                            <div class="personalizable-box for-menu">
                                                <div class="pull-left relation-image">
                                                    <img src="<?php echo site_url(); ?>common/images/personalizable/icon/express-love.png">
                                                </div>
                                                <div class="relation-name">
                                                    <h4>Love</h4>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="personalizable-doctor.html">
                                            <div class="personalizable-box for-menu">
                                                <div class="pull-left relation-image">
                                                    <img src="<?php echo site_url(); ?>common/images/personalizable/icon/doctor.png">
                                                </div>
                                                <div class="relation-name">
                                                    <h4>Doctor</h4>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="personalizable-music.html">
                                            <div class="personalizable-box for-menu">
                                                <div class="pull-left relation-image">
                                                    <img src="<?php echo site_url(); ?>common/images/personalizable/icon/music.png">
                                                </div>
                                                <div class="relation-name">
                                                    <h4>Music</h4>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="personalizable-animal-lover.html">
                                            <div class="personalizable-box for-menu">
                                                <div class="pull-left relation-image">
                                                    <img src="<?php echo site_url(); ?>common/images/personalizable/icon/animal-lover.png">
                                                </div>
                                                <div class="relation-name">
                                                    <h4>Animal-Lover</h4>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                        </section>
                    </div>
                    <!-- #tab2 -->
                    <h3 class="tab_drawer_heading" rel="tab3">Tab 3</h3>
                    <div id="tab3" class="tab_content">
                        <h2 class="text-center mt-5">Office Use Notebooks</h2>
                    </div>
                    <!-- #tab3 -->
                    <h3 class="tab_drawer_heading" rel="tab4">Tab 4</h3>
                    <div id="tab4" class="tab_content">
                        <section class="">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="by-interest-all.html">
                                            <div class="personalizable-box for-menu">
                                                <div class="pull-left relation-image">
                                                    <img src="<?php echo site_url(); ?>common/images/personalizable/icon/Settings-icon.png">
                                                </div>
                                                <div class="relation-name">
                                                    <h4>All</h4>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="personalizable-quotes.html">
                                            <div class="personalizable-box for-menu">
                                                <div class="pull-left relation-image">
                                                    <img src="<?php echo site_url(); ?>common/images/personalizable/icon/quotes.png">
                                                </div>
                                                <div class="relation-name">
                                                    <h4>Quotes</h4>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="personalizable-sports.html">
                                            <div class="personalizable-box for-menu">
                                                <div class="pull-left relation-image">
                                                    <img src="<?php echo site_url(); ?>common/images/personalizable/icon/sport.png">
                                                </div>
                                                <div class="relation-name">
                                                    <h4>Sports</h4>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="personalizable-corporate.html">
                                            <div class="personalizable-box for-menu">
                                                <div class="pull-left relation-image">
                                                    <img src="<?php echo site_url(); ?>common/images/personalizable/icon/corporate.png">
                                                </div>
                                                <div class="relation-name">
                                                    <h4>Corporate</h4>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="personalizable-love.html">
                                            <div class="personalizable-box for-menu">
                                                <div class="pull-left relation-image">
                                                    <img src="<?php echo site_url(); ?>common/images/personalizable/icon/express-love.png">
                                                </div>
                                                <div class="relation-name">
                                                    <h4>Love</h4>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="personalizable-doctor.html">
                                            <div class="personalizable-box for-menu">
                                                <div class="pull-left relation-image">
                                                    <img src="<?php echo site_url(); ?>common/images/personalizable/icon/doctor.png">
                                                </div>
                                                <div class="relation-name">
                                                    <h4>Doctor</h4>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="personalizable-music.html">
                                            <div class="personalizable-box for-menu">
                                                <div class="pull-left relation-image">
                                                    <img src="<?php echo site_url(); ?>common/images/personalizable/icon/music.png">
                                                </div>
                                                <div class="relation-name">
                                                    <h4>Music</h4>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="personalizable-animal-lover.html">
                                            <div class="personalizable-box for-menu">
                                                <div class="pull-left relation-image">
                                                    <img src="<?php echo site_url(); ?>common/images/personalizable/icon/animal-lover.png">
                                                </div>
                                                <div class="relation-name">
                                                    <h4>Animal-Lover</h4>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                        </section>
                    </div>
                    <!-- #tab4 -->
                    <h3 class="tab_drawer_heading" rel="tab5">Tab 5</h3>
                    <div id="tab5" class="tab_content">
                        <h2 class="text-center mt-5">Wedding Notebooks</h2>
                    </div>
                    <!-- #tab5 -->
                </div>
                <!-- .tab_container -->
            </div>
        </div>
    </section>
    <!-- page title -->
    <!-- /page title -->
    <!-- about -->
    <section class="section checkout">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="checkout_box">
                                <div class="checkout_box_heading">
                                    <h2>Login or Signup</h2>
                                </div>

                                 <?php if(@$_SESSION['userid']==''){    
                                 ?>
                                <div class="checkout_box_content">
                                    <?php 
                                if($this->session->flashdata('login_error_show')) { ?>
                                                    <div role="alert" class="alert alert-danger">
                                                            <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
                                                          <?php   echo $_SESSION['login_error_show'];?>
                                                    </div>
                                            <?php } 
                                        if($this->session->flashdata('reg_error')) { ?>
                                                    <div role="alert" class="alert alert-danger">
                                                            <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
                                                          <?php   echo $_SESSION['reg_error'];?>
                                                    </div>
                                            <?php }?>
                                      
                                       
                                   
                                  
                                
                                    <form id="loginCheckout" method="post" action="<?php echo site_url()?>Checkout/login">
                                        <div class="form-group">
                                            <input type="text" name="email" required="" class="form-control" placeholder="Your Email *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" required="" class="form-control" placeholder="Your Password *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <a href="#" class="btnForgetPwd copf-0 pull-right">Forget Password?</a>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="form-group">
                                            <input type="submit" class="btnSubmit" value="Login" />
                                        </div>
                                    </form>
                                
                                    <div class="rgstr-btn-show-form">
                                        
                                        <a href="Javascript:void(0)" id="checkoutRegisterBtn">
                                            <p class="checkout_login_register_btn_txt">Not an user please click here to <u>Register</u></p>
                                            <p class="checkout_login_register_btn_txt" style="display: none;">Already registered click here to <u>Login</u></p>
                                        </a> 
                                  
                                         <?php if($this->session->flashdata('reg_msg')) { ?>
                                                    <div role="alert"  style="color:green" class="alert alert-danger">
                                                            <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
                                                          <?php   echo $_SESSION['reg_msg'];?>
                                                    </div>
                                            <?php } 

                                            if($this->session->flashdata('alredy_reg_error')) { ?>
                                                    <div role="alert"  style="color:green" class="alert alert-danger">
                                                            <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
                                                          <?php   echo $_SESSION['alredy_reg_error'];?>
                                                    </div>
                                            <?php } 

                                            ?>
                                       
                                    </div>
                                    <form id="registerCheckout" action="<?php echo site_url()?>Checkout/Signup_user" method="post">
                                       
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" placeholder="Your Name *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Your Email *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="tel" name="phone" class="form-control" placeholder="Your Phone *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" placeholder="Your Password *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="confpassword" class="form-control" placeholder="Retype Password *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btnSubmit" value="Sign Up" />
                                        </div>
                                    </form>
                                </div>
                            <?php }?>
                            </div>
                        </div>
                        <!-- Login End -->
                       
                        <div class="col-md-12">
                            <div class="checkout_box">
                                <div class="checkout_box_heading">
                                    <h2>Delivery Address</h2>
                                </div>
                                 <?php
                                 if(@$_SESSION['userid']!=''){
                                    
                                 ?>
                                <div class="checkout_box_content">
                                    <?php 
                                if($this->session->flashdata('login_msg')) { ?>
                                                    <div role="alert" class="alert alert-danger">
                                                            <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
                                                          <?php   echo $_SESSION['login_msg'];?>
                                                    </div>
                                            <?php } 
                                   if($this->session->flashdata('ship_msg')) { ?>
                                                    <div role="alert" style="background-color: green" class="alert alert-danger">
                                                            <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
                                                          <?php   echo $_SESSION['ship_msg'];?>
                                                    </div>
                                            <?php } ?>         
                                    <form class="delivery_address" method="post" action="<?php echo site_url();?>Checkout/login_check">
                                      <table width="50%" height="100" border='1' align="center">
                <tr>
                    <td>Parameter Name:</td><td>Parameter Value:</td>
                </tr>
                <tr>
                    <td colspan="2"> Compulsory information</td>
                </tr>
                <tr>
                    <td>TID :</td><td><input type="text" name="tid" id="tid" value="238214355" readonly /></td>
                </tr>
                <tr>
                    <td>Merchant Id :</td><td><input type="text" name="merchant_id" value=""/></td>
                </tr>
                <tr>
                    <td>Order Id    :</td><td><input type="text" name="order_id" value="123654789"/></td>
                </tr>
                <tr>
                    <td>Amount  :</td><td><input type="text" name="amount" value="1.00"/></td>
                </tr>
                <tr>
                    <td>Currency    :</td><td><input type="text" name="currency" value="INR"/></td>
                </tr>
                <tr>
                    <td>Redirect URL    :</td><td><input type="text" name="redirect_url" value="http://localhost/ccavResponseHandler.php"/></td>
                </tr>
                <tr>
                    <td>Cancel URL  :</td><td><input type="text" name="cancel_url" value="http://localhost/ccavResponseHandler.php"/></td>
                </tr>
                <tr>
                    <td>Language    :</td><td><input type="text" name="language" value="EN"/></td>
                </tr>
                <tr>
                    <td colspan="2">Billing information(optional):</td>
                </tr>
                <tr>
                    <td>Billing Name    :</td><td><input type="text" name="billing_name" value="Charli"/></td>
                </tr>
                <tr>
                    <td>Billing Address :</td><td><input type="text" name="billing_address" value="Room no 1101, near Railway station Ambad"/></td>
                </tr>
                <tr>
                    <td>Billing City    :</td><td><input type="text" name="billing_city" value="Indore"/></td>
                </tr>
                <tr>
                    <td>Billing State   :</td><td><input type="text" name="billing_state" value="MH"/></td>
                </tr>
                <tr>
                    <td>Billing Zip :</td><td><input type="text" name="billing_zip" value="425001"/></td>
                </tr>
                <tr>
                    <td>Billing Country :</td><td><input type="text" name="billing_country" value="India"/></td>
                </tr>
                <tr>
                    <td>Billing Tel :</td><td><input type="text" name="billing_tel" value="9999999999"/></td>
                </tr>
                <tr>
                    <td>Billing Email   :</td><td><input type="text" name="billing_email" value="test@test.com"/></td>
                </tr>
               
                 
                 <tr>
                    <td colspan="2">Payment information:</td>
                </tr>
                 <tr> <td> Payment Option: </td> 
                      <td> 
                            <input class="payOption" type="radio" name="payment_option" value="OPTCRDC">Credit Card
                            <input class="payOption" type="radio" name="payment_option" value="OPTDBCRD">Debit Card  <br/>
                            <input class="payOption" type="radio" name="payment_option" value="OPTNBK">Net Banking 
                            <input class="payOption" type="radio" name="payment_option" value="OPTCASHC">Cash Card <br/>
                            <input class="payOption" type="radio" name="payment_option" value="OPTMOBP">Mobile Payments
                            <input class="payOption" type="radio" name="payment_option" value="OPTEMI">EMI
                        <input class="payOption" type="radio" name="payment_option" value="OPTWLT">Wallet
                       </td>
                 </tr>
                 
                 <!-- EMI section start -->
                 
                 <tr >
                 <td  colspan="2">
                  <div id="emi_div" style="display: none">
                     <table border="1" width="100%">
                     <tr> <td colspan="2">EMI Section </td></tr>
                     <tr> <td> Emi plan id: </td>
                        <td><input readonly="readonly" type="text" id="emi_plan_id"  name="emi_plan_id" value=""/> </td>
                     </tr>
                     <tr> <td> Emi tenure id: </td>
                        <td><input readonly="readonly" type="text" id="emi_tenure_id" name="emi_tenure_id" value=""/>  </td>
                     </tr>
                     <tr><td>Pay Through</td>
                         <td>
                             <select name="emi_banks"  id="emi_banks">
                             </select>
                         </td>
                    </tr>
                    <tr><td colspan="2">
                         <div id="emi_duration" class="span12">
                            <span class="span12 content-text emiDetails">EMI Duration</span>
                            <table id="emi_tbl" cellpadding="0" cellspacing="0" border="1" >
                            </table> 
                        </div>
                        </td>
                    </tr>
                    <tr>
                         <td id="processing_fee" colspan="2">
                        </td>
                    </tr>
                    </table>
                </div>
                </td>
                </tr>
                <!-- EMI section end -->
                 
                 
                 <tr> <td> Card Type: </td>
                     <td><input type="text" id="card_type" name="card_type" value="" readonly="readonly"/></td>
                 </tr>
                
                <tr> <td> Card Name: </td>
                     <td> <select name="card_name" id="card_name"> <option value="">Select Card Name</option> </select> </td>
                </tr>
                
                <tr> <td> Data Accepted At </td>
                     <td><input type="text" id="data_accept" name="data_accept" readonly="readonly"/></td>
                </tr>
                 
                 <tr> <td> Card Number: </td>
                    <td> <input type="text" id="card_number" name="card_number" value=""/>e.g. 4111111111111111 </td>
                 </tr>
                  <tr> <td> Expiry Month: </td>
                       <td> <input type="text" name="expiry_month" value=""/>e.g. 07 </td>
                 </tr>
                  <tr> <td> Expiry Year: </td>
                       <td> <input type="text" name="expiry_year" value=""/>e.g. 2027</td>
                 </tr>
                  <tr> <td> CVV Number:</td>
                       <td> <input type="text" name="cvv_number" value=""/>e.g. 328</td>
                 </tr>
                 <tr> <td> Issuing Bank:</td>
                    <td><input type="text" name="issuing_bank" value=""/>e.g. State Bank Of India</td>
                 </tr>
             <tr> 
                <td> Mobile Number:</td>
                        <td><input type="text" name="mobile_number" value=""/>e.g. 9770707070</td>
                 </tr>
            <tr> 
                <td> MMID:</td>
                        <td><input type="text" name="mm_id" value=""/>e.g. 1234567</td>
                 </tr>
            <tr> 
                <td> OTP:</td>
                        <td><input type="text" name="otp" value=""/>e.g. 123456</td>
                 </tr>
             <tr> 
                <td> Promotions:</td>
                        <td> <select name="promo_code" id="promo_code"> <option value="">All Promotions &amp; Offers</option> </select> </td>
                 </tr>
                 
                <!-- <tr>
                    <td></td><td><INPUT TYPE="submit" value="CheckOut"></td>
                </tr> -->
            </table>
                                        <div class="form-group">
                                            <input type="submit" class="btnSubmit" value="Save and Deliver  Here" />
                                        </div>
                                    </form>
                                </div>
                                <?php }?>
                            </div>
                             
                        </div>

                        <!-- Delivery Address End -->
                     <script type="text/javascript">
                       function get_city(st_id){
                        //alert(st_id);
                          $.ajax({
                                  url:"<?php echo base_url();?>"+'Checkout/get_city',
                                  type:"POST",
                                  data:{st_id:st_id},
                                  success:function(res){
                                     $("#city_show").html(res); 
                                  }

                          });
                       } 

                       function hide_ship_charge(){
                            $("#shipping_charge").hide();
                            $("#cash_delivery").show();
                          }
                       function hide_delivery_charge(){
                            $("#cash_delivery").hide();
                            $("#shipping_charge").show();
                          }       
                     </script>
                        <!-- Delivery Address End -->
                        <div class="col-md-12">
                            <div class="checkout_box">
                                <div class="checkout_box_heading">
                                    <h2>Payment Mode </h2><br>
                                    <input type="radio" checked onclick="hide_ship_charge();" name="payment_mode">&nbsp;Cash on delivery
                                    <input type="radio" onclick="hide_delivery_charge();" name="payment_mode">&nbsp;Ccavenue
                                    <!--<span style="text-align: center;"><img src="https://www.nicalu.com/common/images/card.png"></span>-->

                                </div>
                                <div class="checkout_box_content">
                                    <form method="post" name="redirect" action="https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
<?php
//echo "<input type=hidden name=encRequest value=$encrypted_data>";
//echo "<input type=hidden name=access_code value=$access_code>";
?>
</form>
</center>

                                </div>
                            </div>
                        </div>
                        <!-- Payment Method End -->
                    </div>
                </div>
                <div class="col-md-4">
                    <?php
                    $this->load->library('cart');
                    $cart = $this->cart->contents();
                    //print_r($cart);
                    ?>
                    <div class="checkout_box">
                        <div class="checkout_box_heading">
                            <h2>Product Details</h2>
                        </div>
                        <div class="checkout_box_content">
                            <?php
                             $grand_total = 0;
                             foreach ($cart as $item){
                             ?>
                            <div class="row">
                                <div class="col-4">
                                    <?php
                                    if($item['color']=='Spiral'){
                                    ?>
                                    <img src="<?=base_url();?>admin/upload/product_images/spiral_images/<?php echo $item['image']?>">
                                    <?php } else{?>
                                     <img src="<?=base_url();?>admin/upload/product_images/general/<?php echo $item['image']?>">
                                <?php }?>    
                                </div>
                                <div class="col-8">
                                    <div class="checkout_cart">
                                        <h5>Product Name</h5>
                                        <p><?php echo $item['name']; ?></p>
                                        <div class="checkout_qty">
                                            Qty:&nbsp;<?php echo $item['pack_off']; ?>
                                        </div>
                                        <div class="checkout_price">
                                            <p><i class="fa fa-inr"></i>
                                             
                    <?php
                     $grand_total = $grand_total + $item['price']*$item['pack_off'];
                     $price=$item['price']*$item['pack_off'];
                     echo number_format($price, 2); ?> </p>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                    <div class="checkout_box">
                        <div class="checkout_box_content">
                            <div class="checkout_price_description">
                                <div class="row">
                                    <div class="col-7">
                                        <h5>Subtotal</h5>
                                    </div>
                                    <div class="col-5">
                                        <p><i class="fa fa-inr"></i>&nbsp; <?= number_format($grand_total,2)?></p>
                                    </div>
                                </div>
                                <div id="shipping_charge" class="row">
                                    <div class="col-7">
                                        <h5>Shipping</h5>
                                    </div>
                                    <div class="col-5">
                                        <p>Free Shipping</p>
                                    </div>
                                </div>
                                <div id="cash_delivery" class="row">
                                    <div class="col-7">
                                        <h5>Cash on delivery</h5>
                                    </div>
                                    <div class="col-5">
                                        <p><i class="fa fa-inr"></i>&nbsp; 50.00</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-7">
                                        <h5>Total</h5>
                                    </div>
                                    <div class="col-5">
                                        <?php
                                         if(@$_SESSION['coupon_code']){
                                            $grand_totalc=$grand_total-100;
                                         }else{
                                           $grand_totalc=$grand_total; 
                                         }
                                        ?>
                                        <p> <i class="fa fa-inr"></i>&nbsp;<?= number_format($grand_totalc+50,2)?></p>
                                    </div>
                                </div>
                                
                                 <div class="checkout_box_heading">
                                 <a style="font-size: 16px;width: 300px;" href="<?php echo site_url();?>Pages/general_notebook" class="btn btn-primary my-cart-btn my-cart-b">Continue Shoping</a>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //row -->
    </section>
    <!-- /about -->
    <!--==========================
    Footer
    ============================-->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="social-media">
                        <ul class="list-unstyled">
                            <a href="#">
                                <li><i class="fa fa-facebook"></i></li>
                            </a>
                            <a href="#">
                                <li><i class="fa fa-twitter"></i></li>
                            </a>
                            <a href="#">
                                <li><i class="fa fa-google-plus"></i></li>
                            </a>
                            <a href="#">
                                <li><i class="fa fa-linkedin"></i></li>
                            </a>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-4">
                    <div class="footer-logo">
                        <a class="navbar-brand" href="index.php"> <img src="<?php echo site_url(); ?>common/images/logo.png" width="150" alt="img"> </a>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the.</p>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-2">
                    <div class="list-menu">
                        <h4>About</h4>
                        <ul class="list-unstyled">
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="about.html">About Aamku</a></li>
                            <li><a href="#">Press</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-2">
                    <div class="list-menu">
                        <h4>Help</h4>
                        <ul class="list-unstyled">
                            <li><a href="#">Payments</a></li>
                            <li><a href="#">Shiping</a></li>
                            <li><a href="#">Cancellation &amp; Returns</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-2">
                    <div class="list-menu">
                        <h4>Policy</h4>
                        <ul class="list-unstyled">
                            <li><a href="#">Return Policy</a></li>
                            <li><a href="#">Terms Of Use</a></li>
                            <li><a href="#">Security</a></li>
                            <li><a href="#">Privacy</a></li>
                            <li><a href="#">Sitemap</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-2">
                    <div class="list-menu">
                        <h4>Social</h4>
                        <ul class="list-unstyled">
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Instagram</a></li>
                            <li><a href="#">Twitter</a></li>
                            <li><a href="#">YouTube</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyrights">
            <div class="container">
                <p>&copy;
                    <script>
                    var CurrentYear = new Date().getFullYear()
                    document.write(CurrentYear)
                    </script> Aamku</p>
            </div>
        </div>
    </footer>
    <!-- /footer -->
    <!-- jQuery -->
    <script src="<?php echo site_url(); ?>common/plugins/jQuery/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="<?php echo site_url(); ?>common/js/owl.carousel.js"></script>
    <script src="<?php echo site_url(); ?>common/plugins/bootstrap/bootstrap.min.js"></script>
    <!-- slick slider -->
    <script src="<?php echo site_url(); ?>common/plugins/slick/slick.min.js"></script>
    <!-- filter -->
    <script src="<?php echo site_url(); ?>common/plugins/shuffle/shuffle.min.js"></script>
    <!-- Main Script -->
    <script src="js/script.js"></script>
    <script src="js/menu-tab.js"></script>
    <script>
    $('.navToggle').click(function() {
        $('.menu').toggleClass('menuOn');
        $('.mega-menu').toggleClass('navOn');
    });

    $('#checkoutRegisterBtn').click(function() {
        $('#loginCheckout').slideToggle('slow');
        $('#registerCheckout').slideToggle('slow');
        $('.checkout_login_register_btn_txt').toggle();
    })
 $(document).ready(function () {
       
            $("#submenu_switch").click(function () {
                //alert("sdjhfhdfh");
                $(".submenu").toggleClass("oppen_sub");
            });
        });
    // Increment - Decrement
    var $input = $("#txtAcrescimo");

    $input.val(1);

    $(".altera").click(function() {
        if ($(this).hasClass('acrescimo'))
            $input.val(parseInt($input.val()) + 1);
        else if ($input.val() >= 1)
            $input.val(parseInt($input.val()) - 1);
    });
    </script>
 <?php
$this->load->library('cart');
$cart = $this->cart->contents();
//print_r(expression)
?>
    <div id="myCart" class="cart-box">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="cart__box__containt">
            <ul>
                <?php
                 if($cart = $this->cart->contents()){
                  $grand_total = 0;
                  $i = 1;
                  foreach ($cart as $item)
                  {
                    //print_r($item);
                 ?>
                <li class="cart--product clearfix">
                    <div class="cart__product_img">
                       <!-- <img src="<?php echo site_url();?>/common/images/nb/2/3.jpg" alt="img">-->
                       <a href="<?php echo site_url(); ?>Pages/view_product/<?php echo $item['id'];?>"> <img class="quicklook" id="<?=$item['id']?>" src="<?=base_url();?>admin/upload/product_images/general/<?php echo $item['image']?>" alt=""></a>
                    </div>
                    <div class="cart__product_title">
                        <p><?php echo $item['name']; ?></p>
                        <p class="mt-2 mb-2"><i class="fa fa-inr"></i>
                        <?php $grand_total = $grand_total + $item['subtotal']; 
                         $amount = $item['price'] * $item['qty'];
                        echo number_format($amount, 2);

                        ?>

                        </p>
                        <div class="cart__product_qyt">
                            <input type="number" value="<?php echo $item['qty']?>" name="" max="10" min="1">
                        </div>
                        <div class="cart__product_remove">
                            <a onclick="delete_item('<?php echo $item['rowid'];?>')" href="javascript:void(0)" class="mt-2" role="button">
                                REMOVE
                            </a>
                        </div>
                    </div>
                </li>
            <?php }

             }?>
                
            </ul>
             <div class="cart_page_total">
                                                Total price: <b> <?= number_format(@$grand_total,2)?></b>
                                            </div>
            <div class="checkout__btn">
                <a href="<?php echo site_url();?>Cart/add"><button type="button" class="btn btn-primary btn-sm btn-block">Viwe Cart</button></a><br>
                  <a href="<?php echo site_url();?>Cart/clear_all"><button type="button" class="btn btn-primary btn-sm btn-block"> Clear Cart</button></a>

            </div>
              
        </div>
    </div>
    <script type="text/javascript">
    // Cart-Box
    function openNav() {
        document.getElementById("myCart").style.width = "320px";
    }

    function closeNav() {
        document.getElementById("myCart").style.width = "0";
    }
    function delete_item(rowid){
    //alert(cart_id);
    $.ajax({
          url:"<?php echo base_url();?>"+'Cart/remove_item',
          type:'POST',
          data:{row_id:rowid},
          success:function(result){
            $("#myCart").html(result);
          }
      })
     
   }
    </script>



     <script language="javascript" type="text/javascript" src="json.js"></script>
 <script src="jquery-1.7.2.min.js"></script>
<script type="text/javascript">
  $(function(){
   // alert("fghgkhj");
     /* json object contains
        1) payOptType - Will contain payment options allocated to the merchant. Options may include Credit Card, Net Banking, Debit Card, Cash Cards or Mobile Payments.
        2) cardType - Will contain card type allocated to the merchant. Options may include Credit Card, Net Banking, Debit Card, Cash Cards or Mobile Payments.
        3) cardName - Will contain name of card. E.g. Visa, MasterCard, American Express or and bank name in case of Net banking. 
        4) status - Will help in identifying the status of the payment mode. Options may include Active or Down.
        5) dataAcceptedAt - It tell data accept at CCAvenue or Service provider
        6)error -  This parameter will enable you to troubleshoot any configuration related issues. It will provide error description.
     */   
      var jsonData;
      var access_code="" // shared by CCAVENUE 
      var amount="6000.00";
      var currency="INR";
      
      $.ajax({
           url:'https://secure.ccavenue.com/transaction/transaction.do?command=getJsonData&access_code='+access_code+'&currency='+currency+'&amount='+amount,
           dataType: 'jsonp',
           jsonp: false,
           jsonpCallback: 'processData',
           success: function (data) { 
                 jsonData = data;
                 // processData method for reference
                 processData(data); 
         // get Promotion details
                 $.each(jsonData, function(index,value) {
            if(value.Promotions != undefined  && value.Promotions !=null){  
                var promotionsArray = $.parseJSON(value.Promotions);
                        $.each(promotionsArray, function() {
                    console.log(this['promoId'] +" "+this['promoCardName']);    
                    var promotions= "<option value="+this['promoId']+">"
                    +this['promoName']+" - "+this['promoPayOptTypeDesc']+"-"+this['promoCardName']+" - "+currency+" "+this['discountValue']+"  "+this['promoType']+"</option>";
                    $("#promo_code").find("option:last").after(promotions);
                });
            }
        });
           },
           error: function(xhr, textStatus, errorThrown) {
               alert('An error occurred! ' + ( errorThrown ? errorThrown :xhr.status ));
               //console.log("Error occured");
           }
        });
        
        $(".payOption").click(function(){
            var paymentOption="";
            var cardArray="";
            var payThrough,emiPlanTr;
            var emiBanksArray,emiPlansArray;
            
            paymentOption = $(this).val();
            $("#card_type").val(paymentOption.replace("OPT",""));
            $("#card_name").children().remove(); // remove old card names from old one
            $("#card_name").append("<option value=''>Select</option>");
            $("#emi_div").hide();
            
            //console.log(jsonData);
            $.each(jsonData, function(index,value) {
                //console.log(value);
                  if(paymentOption !="OPTEMI"){
                     if(value.payOpt==paymentOption){
                        cardArray = $.parseJSON(value[paymentOption]);
                        $.each(cardArray, function() {
                            $("#card_name").find("option:last").after("<option class='"+this['dataAcceptedAt']+" "+this['status']+"'  value='"+this['cardName']+"'>"+this['cardName']+"</option>");
                        });
                     }
                  }
                  
                  if(paymentOption =="OPTEMI"){
                      if(value.payOpt=="OPTEMI"){
                        $("#emi_div").show();
                        $("#card_type").val("CRDC");
                        $("#data_accept").val("Y");
                        $("#emi_plan_id").val("");
                        $("#emi_tenure_id").val("");
                        $("span.emi_fees").hide();
                        $("#emi_banks").children().remove();
                        $("#emi_banks").append("<option value=''>Select your Bank</option>");
                        $("#emi_tbl").children().remove();
                        
                        emiBanksArray = $.parseJSON(value.EmiBanks);
                        emiPlansArray = $.parseJSON(value.EmiPlans);
                        $.each(emiBanksArray, function() {
                            payThrough = "<option value='"+this['planId']+"' class='"+this['BINs']+"' id='"+this['subventionPaidBy']+"' label='"+this['midProcesses']+"'>"+this['gtwName']+"</option>";
                            $("#emi_banks").append(payThrough);
                        });
                        
                        emiPlanTr="<tr><td>&nbsp;</td><td>EMI Plan</td><td>Monthly Installments</td><td>Total Cost</td></tr>";
                            
                        $.each(emiPlansArray, function() {
                            emiPlanTr=emiPlanTr+
                            "<tr class='tenuremonth "+this['planId']+"' id='"+this['tenureId']+"' style='display: none'>"+
                                "<td> <input type='radio' name='emi_plan_radio' id='"+this['tenureMonths']+"' value='"+this['tenureId']+"' class='emi_plan_radio' > </td>"+
                                "<td>"+this['tenureMonths']+ "EMIs. <label class='merchant_subvention'>@ <label class='emi_processing_fee_percent'>"+this['processingFeePercent']+"</label>&nbsp;%p.a</label>"+
                                "</td>"+
                                "<td>"+this['currency']+"&nbsp;"+this['emiAmount'].toFixed(2)+
                                "</td>"+
                                "<td><label class='currency'>"+this['currency']+"</label>&nbsp;"+ 
                                    "<label class='emiTotal'>"+this['total'].toFixed(2)+"</label>"+
                                    "<label class='emi_processing_fee_plan' style='display: none;'>"+this['emiProcessingFee'].toFixed(2)+"</label>"+
                                    "<label class='planId' style='display: none;'>"+this['planId']+"</label>"+
                                "</td>"+
                            "</tr>";
                        });
                        $("#emi_tbl").append(emiPlanTr);
                     } 
                  }
            });
            
         });
   
      
      $("#card_name").click(function(){
        if($(this).find(":selected").hasClass("DOWN")){
            alert("Selected option is currently unavailable. Select another payment option or try again later.");
        }
        if($(this).find(":selected").hasClass("CCAvenue")){
            $("#data_accept").val("Y");
        }else{
            $("#data_accept").val("N");
        }
      });
          
     // Emi section start      
          $("#emi_banks").live("change",function(){
               if($(this).val() != ""){
                    var cardsProcess="";
                    $("#emi_tbl").show();
                    cardsProcess=$("#emi_banks option:selected").attr("label").split("|");
                    $("#card_name").children().remove();
                    $("#card_name").append("<option value=''>Select</option>");
                    $.each(cardsProcess,function(index,card){
                        $("#card_name").find("option:last").after("<option class=CCAvenue value='"+card+"' >"+card+"</option>");
                    });
                    $("#emi_plan_id").val($(this).val());
                    $(".tenuremonth").hide();
                    $("."+$(this).val()+"").show();
                    $("."+$(this).val()).find("input:radio[name=emi_plan_radio]").first().attr("checked",true);
                    $("."+$(this).val()).find("input:radio[name=emi_plan_radio]").first().trigger("click");
                     
                     if($("#emi_banks option:selected").attr("id")=="Customer"){
                        $("#processing_fee").show();
                     }else{
                        $("#processing_fee").hide();
                     }
                     
                }else{
                    $("#emi_plan_id").val("");
                    $("#emi_tenure_id").val("");
                    $("#emi_tbl").hide();
                }
                
                
                
                $("label.emi_processing_fee_percent").each(function(){
                    if($(this).text()==0){
                        $(this).closest("tr").find("label.merchant_subvention").hide();
                    }
                });
                
         });
         
         $(".emi_plan_radio").live("click",function(){
            var processingFee="";
            $("#emi_tenure_id").val($(this).val());
            processingFee=
                    "<span class='emi_fees' >"+
                        "Processing Fee:"+$(this).closest('tr').find('label.currency').text()+"&nbsp;"+
                        "<label id='processingFee'>"+$(this).closest('tr').find('label.emi_processing_fee_plan').text()+
                        "</label><br/>"+
                            "Processing fee will be charged only on the first EMI."+
                    "</span>";
             $("#processing_fee").children().remove();
             $("#processing_fee").append(processingFee);
             
             // If processing fee is 0 then hiding emi_fee span
             if($("#processingFee").text()==0){
                $(".emi_fees").hide();
             }
              
        });
        
        
        $("#card_number").focusout(function(){
            /*
             emi_banks(select box) option class attribute contains two fields either allcards or bin no supported by that emi 
            */ 
            if($('input[name="payment_option"]:checked').val() == "OPTEMI"){
                if(!($("#emi_banks option:selected").hasClass("allcards"))){
                  if(!$('#emi_banks option:selected').hasClass($(this).val().substring(0,6))){
                      alert("Selected EMI is not available for entered credit card.");
                  }
               }
           }
          
        });
            
            
    // Emi section end      
   
   
   // below code for reference 
 
   function processData(data){
         var paymentOptions = [];
         var creditCards = [];
         var debitCards = [];
         var netBanks = [];
         var cashCards = [];
         var mobilePayments=[];
         $.each(data, function() {
             // this.error shows if any error       
             console.log(this.error);
              paymentOptions.push(this.payOpt);
              switch(this.payOpt){
                case 'OPTCRDC':
                    var jsonData = this.OPTCRDC;
                    var obj = $.parseJSON(jsonData);
                    $.each(obj, function() {
                        creditCards.push(this['cardName']);
                    });
                break;
                case 'OPTDBCRD':
                    var jsonData = this.OPTDBCRD;
                    var obj = $.parseJSON(jsonData);
                    $.each(obj, function() {
                        debitCards.push(this['cardName']);
                    });
                break;
                case 'OPTNBK':
                    var jsonData = this.OPTNBK;
                    var obj = $.parseJSON(jsonData);
                    $.each(obj, function() {
                        netBanks.push(this['cardName']);
                    });
                break;
                
                case 'OPTCASHC':
                  var jsonData = this.OPTCASHC;
                  var obj =  $.parseJSON(jsonData);
                  $.each(obj, function() {
                    cashCards.push(this['cardName']);
                  });
                 break;
                   
                  case 'OPTMOBP':
                  var jsonData = this.OPTMOBP;
                  var obj =  $.parseJSON(jsonData);
                  $.each(obj, function() {
                    mobilePayments.push(this['cardName']);
                  });
              }
              
            });
           
           //console.log(creditCards);
          // console.log(debitCards);
          // console.log(netBanks);
          // console.log(cashCards);
         //  console.log(mobilePayments);
            
      }
  });
</script>
</body>

</html>