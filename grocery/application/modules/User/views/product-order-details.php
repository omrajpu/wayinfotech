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
                           <div class="widget">
                              <div class="section-header">
                                 <h5 class="heading-design-h5">
                                    Product Order Details
                                 </h5>
                                 <h5><a style="float:right" href="<?php echo base_url();?>/User/order_history" data-toggle="tooltip" title="" class="btn11 btn-default" data-original-title="Cancel"><i class="fa fa-reply"></i>Back</a></h5>
                              </div>
                              <div class="order-list-tabel-main table-responsive">
                                 <table class="datatabel table table-striped table-bordered order-list-tabel" width="100%" cellspacing="0">
                                    <thead>
                                      <tr>
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

     