 <style type="text/css">
   .btn-success {
   background-color: #65B688;
   border-color: #65B688;
   }
   .btn-danger {
   color: #fff;
   background-color: #d9534f;
   border-color: #d43f3a;
   }
   .btn {
   color: white;
   display: inline-block;
   margin-bottom: 0;
   font-weight: 400;
   text-align: center;
   vertical-align: middle;
   cursor: pointer;
   background-image: none;
   border: 1px solid transparent;
   white-space: nowrap;
   padding: 6px 12px;
   font-size: 14px;
   line-height: 1.42857143;
   border-radius: 4px;
   -webkit-user-select: none;
   -moz-user-select: none;
   -ms-user-select: none;
   user-select: none;
   }

 </style>
 <div class="content-wrapper">
               <div class="content-header">
                <div class="container-fluid">
                <h2>Users List</h2>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a class="active" href="<?php echo base_url()?>User/user_list">Users List</a></li>
                        
                       <!-- <div class="pull-right"><a href="<?php //echo base_url()?>Productmaster/add_brand" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Add New"><i class="fa fa-plus"></i></a> <a href="#" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Rebuild"><i class="fa fa-refresh"></i></a>
                <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#form-category').submit() : false;" data-original-title="Delete"><i class="fa fa-trash-o"></i></button>
                </div> -->
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
                                        <thead>
                                            <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                             <th>Address</th>
                                            <th>Status</th>
                                             <th>Delete</th>
                                             <th>View</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                         //print_r($user_data);
                                        $i=1;
                                        foreach($user_data as $row) {
                                         //echo $row->status;
                                        ?>
                                          <tr>
                                           <!--  <td><?php echo $i;?></td> -->
                                              <td><?php echo @$row->first_name;?></td>
                                              <td><?php echo @$row->email;?></td>
                                              <td><?php echo @$row->phone;?></td>
                                              <td><?php echo @$row->billing_address1;?></td>
                                              <td>
                                                <a class="status_checks btn <?php if($row->status=='active'){ echo'btn-success';} else{ echo 'btn-danger';}?>" style="padding-left: 2em;" onclick="inactive_user('tbl_customers','<?php echo @$row->status; ?>','<?php echo @$row->customer_id; ?>','Blog_Category')"><?php if($row->status=='active'){ echo'Active';} else{ echo 'Inactive';}?></a>  
                                                </td>
                                                 <td>      
                                                  <a  style="padding-left: 2em;" onclick="deletes('tbl_customers','customer_id','<?php echo $row->customer_id; ?>','Blog_Category')"><span class="glyphicon glyphicon glyphicon-trash" aria-hidden="true"></span></a> 
                                                          </td>
                                                           <td>
                                                            <a  style="padding-left: 2em;" onclick="view('<?php echo $row->customer_id; ?>')"><span class="glyphicon glyphicon glyphicon-zoom-in" aria-hidden="true"></span></a> 
                                                           
                                                        </td>
                                           </tr>
                                          <?php    }?>
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
                    "order": [[1, "desc"]]
                })
            });

         function view(id)
            {
                if (id)
                {
                    //alert("dfggf");
                    var url = "<?php echo base_url('Productmaster/view_user'); ?>";
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
                          window.location.href ='<?php echo base_url();?>Productmaster/deletes1/' + table + '/' + field + '/' + delete_id + '/' + section;
                         } else {
                             return false;
                         }
                       });
                
            }
            function inactive_user(table, field, delete_id, section)
            {
               
                    swal({
                         title: "Are you sure?",
                         text: "Do you really want to change status?",
                         icon: "warning",
                         buttons: true,
                         dangerMode: true,
                       })
                       .then((willDelete) => {
                         if (willDelete) {
                              swal("User status has been changed!", {
                              icon: "success",
                           });
                          window.location.href ='<?php echo base_url();?>Productmaster/inactive_user/' + table + '/' + field + '/' + delete_id + '/' + section;
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
                    <center><h4  style="color:green"class="modal-title" id="myModalLarge">User Details</h4></center>
                </div>
                <div class="modal-body" id="view_page">


                </div>                                                        
            </div>
        </div>
    </div>
</div>

