<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <?php
   $cat_name=$this->uri->segment(1);
   $p_name=str_replace('-', ' ',$this->uri->segment(2));
   $pid=$this->uri->segment(3);
  if($cat_name=='general' && $p_name==''){?>
  <title><?php echo ucwords(@$cat_name);?> Aamku-Largest Online General Stationery Store</title>
  <meta name="title" content="<?php echo ucwords(@$cat_name);?> "/>
  <meta name="Keywords" content=""/>
  <meta name="Description" property="description" content=""/>  
 <?php }
 if($cat_name=='personalizable' && $p_name==''){?>
  <title><?php echo ucwords(@$cat_name);?> Aamku-Largest Online Personalizable Stationery Store</title>
  <meta name="title" content="<?php echo ucwords(@$cat_name);?> "/>
  <meta name="Keywords" content=""/>
  <meta name="Description" property="description" content=""/>
 <?php }
if($cat_name=='wedding'){?>
  <title><?php echo ucwords(@$cat_name);?> Aamku-Largest Online Wedding Stationery Store</title>
  <meta name="title" content="<?php echo ucwords(@$cat_name);?> "/>
  <meta name="Keywords" content=""/>
  <meta name="Description" property="description" content=""/>
 <?php }
 if($cat_name=='office'){?>
  <title><?php echo ucwords(@$cat_name);?> Aamku-Largest Online Office Stationery Store</title>
  <meta name="title" content="<?php echo ucwords(@$cat_name);?> "/>
  <meta name="Keywords" content=""/>
  <meta name="Description" property="description" content=""/>
 <?php }
 if($cat_name==''){?>
  <title>Aamku-Largest Online Home Stationery Store</title>
  <meta name="title" content="Aamku-Largest Online Home Stationery Store"/>
   <meta name="Keywords" content="Aamku-Largest Online Home Stationery Store"/>
  <meta name="Description" property="description" content="Aamku-Largest Online Home Stationery Store"/>
 <?php }
 if(is_numeric($pid)){?>
    <title><?php 
    if( @$product_data[0]->page_title!=''){
    echo @$p_name;
    echo @$product_data[0]->page_title;
     }else{
       echo @$p_name;
     }
    ?></title>
    <meta name="title" content="<?php if( @$product_data[0]->page_title!=''){echo @$p_name;echo @$product_data[0]->page_title;}else{echo @$p_name;}
    ?>"/>
    <meta name="Keywords" content="<?php if(@$product_data[0]->keyword!=''){echo @$product_data[0]->keyword;}else{ echo @$p_name;}?>"/>
    <meta name="Description" property="description" content="<?php if(@$product_data[0]->meta_desc!=''){echo @$product_data[0]->meta_desc;}else{echo @$p_name;};?>"/>
<?php }
 ?>
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
    <link href="<?php echo site_url(); ?>common/css/book.css" rel="stylesheet">
    <link href="<?php echo site_url(); ?>common/css/style.css" rel="stylesheet">
    <link href="<?php echo site_url(); ?>common/css/style01.css" rel="stylesheet">
    <link href="<?php echo site_url(); ?>common/css/contact.css" rel="stylesheet">
    <!--Favicon-->
    <link rel="shortcut icon" href="<?php echo site_url(); ?>common/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo site_url(); ?>common/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo site_url(); ?>common/css/xzoom.css">

    !-- Global site tag (gtag.js) - Google Ads: 685729496 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-685729496"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'AW-685729496');
        </script>
        <!-- Event snippet for Purchase conversion page -->
            <script>
              gtag('event', 'conversion', {
                  'send_to': 'AW-685729496/lUBrCNvc5LcBENjN_cYC',
                  'transaction_id': ''
              });
            </script>
            <!-- Global site tag (gtag.js) - Google Analytics -->
                <script async src="https://www.googletagmanager.com/gtag/js?id=UA-151947128-1"></script>
                <script>
                  window.dataLayer = window.dataLayer || [];
                  function gtag(){dataLayer.push(arguments);}
                  gtag('js', new Date());

                  gtag('config', 'UA-151947128-1');
                </script>

                <!-- Facebook Pixel Code -->
                <script>
                  !function(f,b,e,v,n,t,s)
                  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                  n.queue=[];t=b.createElement(e);t.async=!0;
                  t.src=v;s=b.getElementsByTagName(e)[0];
                  s.parentNode.insertBefore(t,s)}(window, document,'script',
                  'https://connect.facebook.net/en_US/fbevents.js');
                  fbq('init', '806827279743131');
                  fbq('track', 'PageView');
                </script>
                <noscript><img height="1" width="1" style="display:none"
                  src="https://www.facebook.com/tr?id=806827279743131&ev=PageView&noscript=1"
                /></noscript>
                <!-- End Facebook Pixel Code -->
                                



</head>

<body>
    <header class="navigation fixed-top">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <a class="navbar-brand font-tertiary h3" href="<?php echo site_url();?>"><img src="<?php echo site_url(); ?>common/images/logo.png" alt="Myself"></a>
                <div class="show-nav-on-mobile">
                        <?php if(@$_SESSION['userid']){
                              ?>
                            <li class="nav-item has_submenu">
                                <a id="submenu_switch_mobile" class="nav-link" href="JavaScript:void(0)">
                                    <i class="fa fa-user"></i> <span><i class="fa fa-sort"></i></span>
                                </a>
                                <ul class="submenu_mobile">
                                    <!--<li>-->
                                    <!--    <a class="nav-link" href="<?php echo site_url(); ?>Pages/order">My Order</a>-->
                                    <!--</li>-->
                                    <!--<li>-->
                                    <!--    <a class="nav-link" href="<?php echo site_url(); ?>Pages/coupon">My Coupon</a>-->
                                    <!--</li>-->      
                                    <li>
                                        <a class="nav-link" href="<?php echo site_url(); ?>Pages/profile">My Account</a>
                                    </li>                              
                                    <li>
                                        <a class="nav-link" href="<?php echo site_url(); ?>Cart/add">My Cart</a>
                                    </li>
                                    <!--<li>-->
                                    <!--<a class="nav-link" href="<?php echo site_url(); ?>Pages/wish_list">My Wishlist</a>-->
                                    <!--</li>-->                                    
                                    <li>
                                        <a class="nav-link" href="<?php echo site_url();?>Cart/logout_sess">Logout</a>
                                    </li>
                                </ul>
                            </li>
                            <?php } else{?>
                                <li class="nav-item has_submenu">
                                    <a id="submenu_switch_mobile" class="nav-link" href="JavaScript:void(0)">
                                        <i class="fa fa-user"></i> <span><i class="fa fa-sort"></i></span> 
                                    </a>
                                    <ul class="submenu_mobile">

                                        <li>
                                            <a class="nav-link" href="<?php echo site_url();?>Checkout/front_login">Login / Sign Up</a>
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
                                            echo $this->cart->total_items();?>
                                        </span>
                                    </a>
                                </li>
                    </div>
            
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php
            $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $page_arr=explode('/', $actual_link);
            $page_name=$page_arr[3];

            ?>
            <div class="collapse navbar-collapse text-center" id="navigation">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php if($page_name=='general'){echo"menu_active";} ?>" href="<?php echo site_url(); ?>general">General</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($page_name=='personalizable'){echo"menu_active";} ?>" href="<?php echo site_url(); ?>personalizable">Personalizable</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($page_name=='wedding'){echo"menu_active";} ?>" href="<?php echo site_url(); ?>wedding">Wedding</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link <?php if($page_name=='interest'){echo"menu_active";} ?>" href="<?php echo site_url(); ?>interest">By Interest</a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link <?php if($page_name=='office'){echo"menu_active";} ?>"  href="<?php echo site_url(); ?>office">Office Use</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($page_name=='corporate'){echo"menu_active";} ?>"  href="<?php echo site_url(); ?>corporate">Corporate Query</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($page_name=='dealer'){echo"menu_active";} ?>" href="<?php echo site_url(); ?>dealer">Dealers Enquiry</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($page_name=='contact'){echo"menu_active";} ?>" href="<?php echo site_url(); ?>contact">Contact Us</a>
                    </li>
                        <?php
                        //echo'<pre>';print_r($_SESSION);
                         if(@$_SESSION['userid']){
                              ?>
                            <li class="nav-item has_submenu hide-nav-on-mobile">
                                <a id="submenu_switch" class="nav-link" href="JavaScript:void(0)">
                                    <i class="fa fa-user"></i> <span class="login__user_name"><?php echo @$_SESSION['user_name'];?></span>
                                </a>
                                <ul class="submenu">
                                    <li>
                                        <a class="nav-link" href="<?php echo site_url(); ?>Pages/profile">My Account</a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="<?php echo site_url(); ?>Cart/add">My Cart</a>
                                    </li>

                                    <!--<li>-->
                                    <!--<a class="nav-link" href="<?php echo site_url(); ?>Pages/wish_list">My Wishlist</a>-->
                                    <!--</li>-->                                    
                                    <li>
                                        <a class="nav-link" href="<?php echo site_url();?>Cart/logout_sess">Logout</a>
                                    </li>
                                </ul>
                            </li>
                            <?php } else{?>
                                <li class="nav-item has_submenu hide-nav-on-mobile">
                                    <a id="submenu_switch" class="nav-link" href="JavaScript:void(0)">
                                        <i class="fa fa-user"></i> <span><i class="fa fa-sort"></i></span>
                                    </a>
                                    <ul class="submenu">
                                        <li>
                                            <a class="nav-link" href="<?php echo site_url();?>Checkout/front_login">Login / Sign Up</a>
                                        </li>
                                  </ul>
                                </li>
                                <?php }?>
                                <li class="nav-item hide-nav-on-mobile">
                                    <a class="nav-link" href="javascript:void(0)" onclick="openNav()">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span class="cart-item--qty"><?php 
                                            $this->load->library('cart');
                                            $cart = $this->cart->contents();
                                            echo $this->cart->total_items();?>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                  <?php
                                    if(@$_SESSION['keys']){
                                      $keys=$_SESSION['keys'];
                                    }
                                  ?>
                                  <div class="signin search">
                                    <button type="submit" class="nav-link"><i class="h6 fa fa-search"></i></button>
                                    <form name="global_serach" method="post" action="<?php echo site_url();?>Pages/search_result">
                                      <input name="global_serach" value="<?php echo @$keys;?>" type="text" placeholder="Search...">
                                      <!-- <button type="submit"><i class="h6 icofont-search">Search</i></button> -->
                                    </form>
                                  </div>
                                </li>
                </ul>
            </div>
        </nav>
    </header>
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
                                <a href="<?php echo site_url(); ?>Pages/view_product/<?php echo $item['id'];?>">
                                    <?php
                       if($item['color']=='Spiral'){
                       ?>
                                        <img class="quicklook" id="<?=$item['id']?>" src="<?=base_url();?>admin/upload/product_images/spiral_images/<?php echo $item['image']?>" alt="">
                                        <?php } else{?>
                                            <img class="quicklook" id="<?=$item['id']?>" src="<?=base_url();?>admin/upload/product_images/general/<?php echo $item['image']?>" alt="">
                                            <?php }?>
                                                <!--<img class="quicklook" id="<?=$item['id']?>" src="<?=base_url();?>admin/upload/product_images/general/<?php echo $item['image']?>" alt="">-->

                                </a>
                            </div>
                            <div class="cart__product_title">
                                <p>
                                    <?php echo $item['name']; ?>
                                </p>
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
                    <a href="<?php echo site_url();?>Cart/add">
                        <button type="button" class="btn btn-primary btn-sm btn-block">View Cart</button>
                    </a>
                    <br>
                    <a href="<?php echo site_url();?>Cart/clear_all">
                        <button type="button" class="btn btn-primary btn-sm btn-block"> Clear Cart</button>
                    </a>

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

            function delete_item(rowid) {
                //alert(cart_id);
                $.ajax({
                    url: "<?php echo base_url();?>" + 'Cart/remove_item',
                    type: 'POST',
                    data: {
                        row_id: rowid
                    },
                    success: function(result) {
                        $("#myCart").html(result);
                    }
                })

            }
        </script>
        <!-- //Header -->