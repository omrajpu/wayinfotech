<?php
//print_r($order_data);

?>

<section class="account-page section-padding">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 mx-auto">
                  <div class="row no-gutters">
                     <div class="col-md-4">
                        <div class="card account-left">
                          <?php $this->load->view('left_sidebar.php');?>
                        </div>
                     </div>
                     <div class="col-md-8">
                        <div class="card card-body account-right">
                           <div class="o-t-block">
            <div class="o-t-card o-t-header">
               <div class="o-t-h-left1">
                  <h5 class="track-heading">Order No. <span><?php echo  @$order_data[0]->province;?></span> </h5>
               </div>
              
            </div>
            <div class="o-t-card o-t-ship-body">
               <div>
                  <h5 class="track-heading">Delivery Status <span>Arriving <?php echo $newdateformat = date("D, d M Y H:i:s", strtotime($order_data[0]->order_date.' + 2 days'));?></span> </h5>
                  <div class="o-t-shipping-block">
                     <div class="track-stage t-s-order-confirm">
                        <div class="t-s-circle" style="background-color: green;"></div>
                        <div class="track-slider-g">
                           <div class="track-slider-current"<?php if($order_data[0]->order_status=='pendding'){ echo'style="width: 10%;"';} if($order_data[0]->order_status=='processing'){ echo'style="width: 104%;"';} if($order_data[0]->order_status=='delivered'){ echo'style="width: 204%;"';}?>></div>
                        </div>
                        <div class="t-s-title">
                           <h4>Order Confirmed</h4>
                           <div class="t-s-time">
                              <span><?php echo $newdateformat = date("D, d M Y H:i:s", strtotime($order_data[0]->order_date));?></span>
                           </div>
                        </div>
                     </div>
                     <div class="track-stage t-s-shipping yet-to-reach">
                        <div class="t-s-circle" <?php if($order_data[0]->order_status=='processing'){echo'style="background-color: #e1e1e1;"';}if($order_data[0]->order_status=='delivered'){echo'style="background-color: green;"';}?>></div>
                        <div class="track-slider-g" <?php if($order_data[0]->order_status=='processing'){echo'style="background-color: #e1e1e1;"';}if($order_data[0]->order_status=='delivered'){echo'style="background-color: green;"';}?>>
                           <div class="track-slider-current" style="width: 0%; display: none;"></div>
                        </div>
                        <div class="t-s-title">
                           <h4>Shipping</h4>
                           <div class="t-s-time">
                              <span>04.06 EST</span><span>Jan 26, 2020</span>
                           </div>
                        </div>
                     </div>
   
                     <div class="track-stage t-s-order-deliver yet-to-reach">
                        <div class="t-s-circle"  <?php if($order_data[0]->order_status=='processing'){echo'style="background-color: #e1e1e1;"';}if($order_data[0]->order_status=='delivered'){echo'style="background-color: green;"';}?>></div>
                        <div class="t-s-title">
                           <h4>To Deliver</h4>
                           <div class="t-s-time">
                              <span>EST Date</span><span>Jan 26, 2020</span>
                           </div>
                        </div>
                     </div>
   
                  </div>

               </div>
               <div class="order-items-details">
                 
                  <div class="o-i-d-item"><br>
 <h5 class="track-heading">Order Details</h5>
                    <?php
                $cart_id=$this->uri->segment(3);
               echo get_invoice($cart_id);


 ?>
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
      </section>
      <section class="section-padding bg-white border-top">
         <div class="container">
            <div class="row">
               <div class="col-lg-4 col-sm-6">
                  <div class="feature-box">
                     <i class="mdi mdi-truck-fast"></i>
                     <h6>Free & Next Day Delivery</h6>
                     <p>Lorem ipsum dolor sit amet, cons...</p>
                  </div>
               </div>
               <div class="col-lg-4 col-sm-6">
                  <div class="feature-box">
                     <i class="mdi mdi-basket"></i>
                     <h6>100% Satisfaction Guarantee</h6>
                     <p>Rorem Ipsum Dolor sit amet, cons...</p>
                  </div>
               </div>
               <div class="col-lg-4 col-sm-6">
                  <div class="feature-box">
                     <i class="mdi mdi-tag-heart"></i>
                     <h6>Great Daily Deals Discount</h6>
                     <p>Sorem Ipsum Dolor sit amet, Cons...</p>
                  </div>
               </div>
            </div>
         </div>
      </section>

     