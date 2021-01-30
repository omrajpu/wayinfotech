    
     <link rel="stylesheet" href="<?php echo site_url(); ?>common/cart/plugins/font-awesome/css/font-awesome.min.css">
     
        <link rel="stylesheet" href="<?php echo site_url(); ?>common/cart/plugins/slick/slick.css">
        <!-- themefy-icon -->
        <link rel="stylesheet" href="<?php echo site_url(); ?>common/cart/plugins/themify-icons/themify-icons.css">
        <link href="<?php echo site_url(); ?>common/cart/cart_css/owl.carousel.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>common/cart/cart_css/owl.theme.css" rel="stylesheet">
        <!-- Main Stylesheet -->
        <link href="<?php echo site_url(); ?>common/cart/cart_css/style.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>common/cart/cart_css/style01.css" rel="stylesheet">
        <!--Favicon-->
        <link rel="shortcut icon" href="<?php echo site_url(); ?>common/images/favicon.ico" type="image/x-icon">
    <section class="section" style="">
        <div class="container mt-5">
            <div class="header-custom email-signup-thankyou">
                <div class="content">
                    <div class="left-hole"></div>
                    <div class="right-hole"></div>
                    <div class="main-content">
                        <p class="site-header__title" data-lead-id="site-header-title">THANK YOU!</p>
                        <i class="fa fa-check main-content__checkmark" id="checkmark"></i>
                        <p class="invite-text invite-text-succcess">Order Placed Successfully</p>
             <?php  $i=0;
    $total=0;
    foreach ($product_details as $val) {
      # code...
      $total = $total + $val->p_price;
      $i++;}
     ?>
               <p class="invite-text invite-sub-text">Total price for <?php echo @$i;?> item :INR <?php echo number_format(@$total,2);?></p> 
<a href="<?php echo base_url();?>" class="card__header_thank_btn">Continue Shopping</a><br>
               <div class="row order-item-section">
                  <div class="col-12 order-item-heading">
                     <p>Order Details</p> 
                  </div>

                    <table id="category_view" class="table table-bordered table-striped">
                                        <thead>
                                             <tr>
       <!--  <th>Sr.no</th> -->
      <!--  <th>Categoery name</th> -->
      <!--  <th>Product SKU</th> -->
      <th>Sr no.</th>
        <th> Name</th>
         <th>Qty</th>
        <th>Price</th>
        <th>Image</th>
       
       </tr>
                                        </thead>
                                        <tbody>
                  <?php
    // echo'<pre>';print_r($product_details);die;
    $i=1;
    $total=0;
    foreach ($product_details as $val) {
      # code...
      $total = $total + $val->p_price;
     ?>
                 <tr>
         <td><?php echo @$i;?></td> 
        <!-- <td><?php echo @$val->product_name;?></td> -->

        <td><?php echo @$val->product_name;?></td>
         <td><?php echo @$val->product_qty;?></td>
        <td>INR <?php echo number_format($val->p_price,2);?></td>
        <td>
        <img class="quicklook" id="" style="width: 100px;" src="<?=base_url();?>admin/upload/product_images/<?php echo @$val->p_image;?>" alt="">
       
     </td>

        

     
     
       </tr>
               <?php $i++;}?> 
                </tbody>
                                    </table>

<storng><b>Total price INR </b><?php echo number_format(@$total,2);?></storng>
                                              </div> 
                
               </div>

                       
                    </div>
                </div>
            </div>
        </div>
    </section>