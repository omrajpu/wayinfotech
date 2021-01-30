<section class="account-page section-padding">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 mx-auto">
                  <div class="row no-gutters">
                     <div class="col-md-3">
                        <div class="card account-left">
                          <?php $this->load->view('left_sidebar.php');?>
                        </div>
                     </div>
                     <div class="col-md-9">
                        <div class="card card-body account-right">
                           <div class="widget">
                              <div class="section-header">
                                 <h5 class="heading-design-h5">
                                    Order List
                                 </h5>
                              </div>
                              <div class="order-list-tabel-main table-responsive">
                                <table  style="margin-bottom: 0" id="category_view" class="table table-bordered table-striped">
                                        <thead style="">
                                            <tr>
                                          
                                          <th>Order id</th>
                                             
        <th>Name</th>
      <!--  <th>Address</th> -->
        <th>Phone</th>
       <!--  <th>Email</th> -->
       <th>Order date</th>
       
       <th>Order status</th>
        <th>View</th>
       <!--  <th>View</th> -->
         <th>Invoice</th>
         <th>Track Order</th>
       </tr>
       </thead>
      <tbody>
    <?php
     //print_r($property_data);
    $i=1;
    foreach($checkout_data as $val) {
      # code...
    
    ?>
      <tr>
        
        <td><?php echo @$val->province;?></td>
        <td><?php echo $val->firstname;?></td>
       <!--  <td><?php echo $val->address1;?></td> -->
        <td><?php echo $val->phone;?></td>
       <!--  <td><?php echo $val->email;?></td> -->
        <td><?php echo $val->order_date;?></td>
        <td><?php echo $val->payment_option;?></td>
         <!-- <option value="pendding"<?php if(@$_SESSION['order_status']=='pendding' && @$_SESSION['order_id']== @$val->province){ echo 'selected="selected"';} ?>>Pendding</option> -->
        <!-- <td><span style="color: #17a2b8"><?php echo $val->pay_status;?></span></td>
        <td><span <?php if($val->order_status=='pendding'){ echo'style="color: #17a2b8"';}  if($val->order_status=='processing'){ echo'style="color: orange"';}if($val->order_status=='delivered'){ echo'style="color: green"';}?>><?php echo $val->order_status;?></span></td> -->
        <td><a style="color:green" href="<?php base_url();?>order_product_view/<?php echo @$val->sale_id;?>" class="btn1 btn-view">View</a></td>
        <!--  <td><a href="<?php base_url();?>order_product_view/<?php echo @$val->sale_id;?>"><span class="glyphicon glyphicon glyphicon-zoom-in" aria-hidden="true"></span></a></td> -->
         <td><a href="<?php echo base_url();?>/User/pdfdetails/<?php echo @$val->sale_id;?>"><img style="height:40px;with:400px;" src="http://stage.wayinfotechsolutions.co/grocery/images/down.png"></a></td>
<td><a style="color:green" href="<?php echo base_url();?>User/track_order/<?php echo @$val->sale_id;?>">Track order</a></td>
       </tr>
      <?php $i++;}?>
                                        </tbody>
                                    </table>
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

      <script src="<?php echo base_url() . "admin/assets" ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo base_url() . "admin/assets" ?>/bootstrap/js/bootstrap.min.js"></script>
        <!-- DataTables -->
        <script src="<?php echo base_url() . "admin/assets" ?>/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() . "admin/assets" ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <!-- SlimScroll -->
        <script src="<?php echo base_url() . "admin/assets" ?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url() . "admin/assets" ?>/plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url() . "admin/assets" ?>/dist/js/app.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url() . "admin/assets" ?>/dist/js/demo.js"></script>
         <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!-- page script -->
        <script>
            $(function () {
                $("#category_view").DataTable({
                    "order": [[0, "desc"]],
                    "scrollX": true,
                    "pageLength": 6
                })
            });
          </script>