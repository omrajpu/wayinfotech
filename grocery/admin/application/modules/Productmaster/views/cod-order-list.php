 <script type="text/javascript">
   function change_order_status(order_id,status){
        $.ajax({
              url:"<?php echo base_url();?>"+'Productmaster/set_status',
               type:"post",
               data:{order_id:order_id,status:status},
               success:function(res){
                 window.location="<?php echo base_url();?>Productmaster/cod_orders";
               }


        })

   }

 </script>

 <div class="content-wrapper">
               <div class="content-header">
                <div class="container-fluid">
                <h2>Order list</h2>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a class="active" href="<?php echo base_url()?>Productmaster/brand_list">COD Orders</a></li>
                 </ol>
                </div>
                </div>
                <?php //$this->load->view('include/alert-box'); 
                if(@$_SESSION['success']){?>
                    <div id="suc_msg" class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i>
                    <a class="close" data-dismiss="alert" href="#">X</a>
                     <?php echo $_SESSION['success'];
                    unset($_SESSION['success']);?>
                   </div>
                <?php }?>
                
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <!-- /.box-header -->
                                <div class="box-body">

                                    <table id="category_view" class="table table-bordered table-striped">
                                        <thead style="">
                                            <tr>
                                          <!--   <th>Sr.no</th> -->
                                             <th>Order id</th>
                                             
        <th>Name</th>
      <!--  <th>Address</th> -->
        <th>Phone</th>
        <th>Email</th>
       <th>Order date</th>
        <!-- <th>Pay mode</th>
        <th>Pay status</th> -->
        <th>Order status</th>
        
         <th>Action</th>
        <th>View</th>
         <th>Invoice </th>
         
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
     //print_r($property_data);
    $i=1;
    foreach ($checkout_data as $val) {
      # code...
    
    ?>
      <tr>
        <td><?php echo @$val->province;?></td>
        <td><?php echo $val->firstname;?></td>
       <!--  <td><?php echo $val->address1;?></td> -->
        <td><?php echo $val->phone;?></td>
        <td><?php echo $val->email;?></td>
        <td><?php echo $val->order_date;?></td>
       <!--  <td><?php echo $val->payment_option;?></td>
        <td><span style="color: #17a2b8"><?php echo $val->pay_status;?></span></td> -->
        <td><span <?php if($val->order_status=='pendding'){ echo'style="color: #17a2b8"';}  if($val->order_status=='processing'){ echo'style="color: orange"';}if($val->order_status=='delivered'){ echo'style="color: green"';}?>><?php echo $val->order_status;?></span></td>
        <td>
        <select name="dd" id="dd" onchange="change_order_status('<?php echo @$val->province ?>',this.value);">
        <option value="">--change order status--</option>  
        <option value="pendding"<?php if(@$_SESSION['order_status']=='pendding' && @$_SESSION['order_id']== @$val->province){ echo 'selected="selected"';} ?>>Pendding</option>
        <option value="processing" <?php if(@$_SESSION['order_status']=='processing' && @$_SESSION['order_id']== @$val->province){ echo 'selected="selected"';} ?>>Processing</option>
        <option value="delivered" <?php if(@$_SESSION['order_status']=='delivered' && @$_SESSION['order_id']== @$val->province){ echo 'selected="selected"';} ?>>Delivered</option>  
       </td>
         <td><a href="<?php base_url();?>order_product_view/<?php echo @$val->sale_id;?>"><span class="glyphicon glyphicon glyphicon-zoom-in" aria-hidden="true"></span></a>  </td>
 <td><a href="<?php echo base_url();?>/Productmaster/pdfdetails/<?php echo @$val->sale_id;?>"><img style="height:40px;with:400px;" src="http://stage.wayinfotechsolutions.co/grocery/images/down.png"></a></td>
      
        
      </tr>
      <?php $i++;}?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </section>
                <!-- /.content -->
            </div>

         <script src="<?php echo base_url() . "assets" ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo base_url() . "assets" ?>/bootstrap/js/bootstrap.min.js"></script>
        <!-- DataTables -->
        <script src="<?php echo base_url() . "assets" ?>/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() . "assets" ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <!-- SlimScroll -->
        <script src="<?php echo base_url() . "assets" ?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url() . "assets" ?>/plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url() . "assets" ?>/dist/js/app.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url() . "assets" ?>/dist/js/demo.js"></script>
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

         function view(id)
            {
                if (id)
                {
                    //alert("dfggf");
                    var url = "<?php echo base_url('Productmaster/view_brand'); ?>";
                    $.ajax({
                        url: url,
                        data: {'id': id},
                        type: "POST",
                        success: function (response)
                        {
                            $('#show_view_page').modal();
                            $('#view_page').html(response);
                        }
                    });
                }
                else
                {
                      swal ( "Oops" ,  "Page id not found!" ,  "error" );
                      return false;
                }
            }
            
            function deletes(table, field, delete_id, section)
            {
               
                    swal({
                         title: "Are you sure?",
                         text: "Do you really want to delete this record?",
                         icon: "warning",
                         buttons: true,
                         dangerMode: true,
                       })
                       .then((willDelete) => {
                         if (willDelete) {
                              swal("Your record has been successfully deleted!", {
                              icon: "success",
                           });
                          window.location.href ='<?php echo base_url();?>/Productmaster/deletes1/' + table + '/' + field + '/' + delete_id + '/' + section;
                         } else {
                             return false;
                         }
                       });
                
            }
        </script>
    </body>
</html>
<!-- Start add Category-->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                      
    <div class="modal fade" id="show_add_page"  tabindex="-1" role="dialog" aria-labelledby="myModalLarge">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <center><h4 class="modal-title" id="myModalLarge">Add Category</h4></center>
                </div>
                <div class="modal-body" id="add_page">


                </div>                                                        
            </div>
        </div>
    </div>
</div>
<!-- End Add Category-->

<!-- Start Div Blog Category-->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                      
    <div class="modal fade" id="show_edit_page"  tabindex="-1" role="dialog" aria-labelledby="myModalLarge">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <center><h4 class="modal-title" id="myModalLarge">Edit Category</h4></center>
                </div>
                <div class="modal-body" id="edit_page">


                </div>                                                        
            </div>
        </div>
    </div>
</div>
<!-- Edit Div Blog Category-->

<!-- Start Div Blog Category-->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                      
    <div class="modal fade" id="show_view_page"  tabindex="-1" role="dialog" aria-labelledby="myModalLarge">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <center><h4  style="color:green"class="modal-title" id="myModalLarge">Brand Details</h4></center>
                </div>
                <div class="modal-body" id="view_page">


                </div>                                                        
            </div>
        </div>
    </div>
</div>

