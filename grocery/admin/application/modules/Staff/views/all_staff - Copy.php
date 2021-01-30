 <div class="content-wrapper">
               <div class="content-header">
                <div class="container-fluid">
                <h2>Manage Staffs</h2>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a class="active" href="<?php echo base_url()?>Staff/all_staff">Manage Staffs</a></li>
                        
                       <div class="pull-right"><a href="<?php echo base_url()?>Staff/add_staff" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Add New"><i class="fa fa-plus"></i></a> <a href="#" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Rebuild"><i class="fa fa-refresh"></i></a>
                <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#form-category').submit() : false;" data-original-title="Delete"><i class="fa fa-trash-o"></i></button>
                </div>
                </ol>
                </div>
                </div>
                
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
                                            <th>Role</th>
                                            <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                         //print_r($cat_data);
                                        $i=1;
                                        foreach ($user_data as $row) {
                                          # code...
                                        
                                        ?>
                                          <tr>
                                           <!--  <td><?php echo $i;?></td> -->
                                            <td><?php echo $row->first_name;?> <?php echo $row->last_name;?></td>
                                            <td><?php echo $row->email;?></td>
                                            <td><?php echo $row->role_name;?></td>
                                            <td>
                                                            <a  style="padding-left: 2em;" href="<?php echo site_url();?>Staff/add_staff/<?php echo @$row->id;?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a> 
                                                            <a  style="padding-left: 2em;" onclick="deletes('s_admin','id','<?php echo $row->id; ?>','Blog_Category')"><span class="glyphicon glyphicon glyphicon-trash" aria-hidden="true"></span></a> 
                                                            <a  style="padding-left: 2em;" onclick="view('<?php echo $row->id; ?>')"><span class="glyphicon glyphicon glyphicon-zoom-in" aria-hidden="true"></span></a> 
                                                           
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
                    var url = "<?php echo base_url('Productmaster/view_cat'); ?>";
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
                          window.location.href = '<?php echo base_url();?>Staff/delete_data/' + table + '/' + field + '/' + delete_id + '/' + section;
                         } else {
                             return false;
                         }
                       });
                
            }
        </script>
    </body>
</html>

<!-- Start Div Blog Category-->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                      
    <div class="modal fade" id="show_view_page"  tabindex="-1" role="dialog" aria-labelledby="myModalLarge">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <center><h4 style="color:green" class="modal-title" id="myModalLarge">Category Details</h4></center>
                </div>
                <div class="modal-body" id="view_page">


                </div>                                                        
            </div>
        </div>
    </div>
</div>