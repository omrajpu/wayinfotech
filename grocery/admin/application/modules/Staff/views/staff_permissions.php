 <div class="content-wrapper">
               <div class="content-header">
                <div class="container-fluid">
                <h2>Manage Permissions</h2>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a class="active" href="<?php echo base_url()?>Staff/all_staff">Manage Permissions</a></li>
                        
                       <div class="pull-right"> <a href="#" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Rebuild"><i class="fa fa-refresh"></i></a>
                
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
                                                           
                                                 <td>
 <form  id="frmAdd" name="frmAdd" method="POST" action="<?php echo base_url(); ?>Staff/addpermissionrecord" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <?php if($this->session->flashdata('success')){ ?>
                                    <div class="alert alert-success successflash text-center" role="alert">
                                        Data Saved! Your Data has Been updated successfully Saved
                                    </div>
                                <?php } ?>
                                <?php if($this->session->flashdata('error')){ ?>
                                    <div class="alert alert-danger error text-center" role="alert">
                                        Error occored while creating new Admin.
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label>User Type<?php $id=$this->uri->segment('3'); if($id==''){$id=1;}?><span>*</span></label>
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-control selectpicker" name="type" id="type" onchange="reloadWithtype(this.value);">
                                            <option value="">Select Type</option>
                                            <?php
                                            $state = $this->Staff_model->getAdminTypeRecord();
                                            foreach($state as $value){
                                                if($id == $value['id']){

                                                    $sel = "selected";
                                                }else{
                                                    $sel = "";
                                                }
                                                ?>
                                                <option value="<?php echo $value['id']; ?>" <?php echo $sel?>><?php echo $value['role_name']?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <?php echo form_error('type'); ?>
                                    </div>
                                </div>
                            </div>
                            <script>

                                function reloadWithtype(val){

                                    if(val!=''){

                                        window.location.href= "<?php echo base_url()?>Staff/staff_permissions/"+val;

                                    }

                                }

                            </script>
                            <div class="w-100">
                                <table id="persmission" class="table table-bordered table-hover" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Menu Name</th>
                                        <th>View Record</th>
                                        <th>Add Record</th>
                                        <th>Update Record</th>
                                        <th>Delete Record</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $meuu = $this->Staff_model->getMenuRecord();
                                    $i=1;
                                    foreach($meuu as $value){
                                        ?>
                                        <tr>
                                            <td><?php echo $value['id']?></td>
                                            <td><?php echo $value['menu_name']?></td>
                                            <td class="text-center">
                                                <div class="border-checkbox-section">
                                                    <div class="custom-control custom-checkbox">
                                                        <?php
                                                        $checked = $this->Staff_model->checkPermissionRecord($id,$value['id'],'view_record');
                                                        ?>
                                                        <input <?php if($checked == '1'){?> checked="checked" <?php }?> class="custom-control-input" type="checkbox" id="checkbox<?php echo $i;?>" name="view_<?php echo $value['id'];?>" value="1">
                                                        <label class="custom-control-label text-xs" for="checkbox<?php echo $i;?>"></label>
                                                    </div>
                                                </div>
                                            </td>
                                            <?php $i = $i+1;?>
                                            <td class="text-center">
                                                <div class="border-checkbox-section">
                                                    <div class="custom-control custom-checkbox">
                                                        <?php
                                                        $checked = $this->Staff_model->checkPermissionRecord($id,$value['id'],'add_record');
                                                        ?>
                                                        <input <?php if($checked == '1'){?> checked="checked" <?php }?> class="custom-control-input" type="checkbox" id="checkbox<?php echo $i;?>" name="add_<?php echo $value['id'];?>" value="1">
                                                        <label class="custom-control-label text-xs" for="checkbox<?php echo $i;?>"></label>
                                                    </div>
                                                </div>
                                            </td>
                                            <?php $i = $i+1;?>
                                            <td class="text-center">
                                                <div class="border-checkbox-section">
                                                    <div class="custom-control custom-checkbox">
                                                        <?php
                                                        $checked = $this->Staff_model->checkPermissionRecord($id,$value['id'],'edit_record');
                                                        ?>
                                                        <input <?php if($checked == '1'){?> checked="checked" <?php }?> class="custom-control-input" type="checkbox" id="checkbox<?php echo $i;?>" name="edit_<?php echo $value['id'];?>" value="1">
                                                        <label class="custom-control-label text-xs" for="checkbox<?php echo $i;?>"></label>
                                                    </div>
                                                </div>
                                            </td>
                                            <?php $i = $i+1;?>
                                            <td class="text-center">
                                                <div class="border-checkbox-section">
                                                    <div class="custom-control custom-checkbox">
                                                        <?php
                                                        $checked = $this->Staff_model->checkPermissionRecord($id,$value['id'],'delete_record'); ?>
                                                        <input <?php if($checked == '1'){?> checked="checked" <?php }?> class="custom-control-input" type="checkbox" id="checkbox<?php echo $i;?>" name="delete_<?php echo $value['id'];?>" value="1">
                                                        <label class="custom-control-label text-xs" for="checkbox<?php echo $i;?>"></label>
                                                    </div>
                                                </div>
                                            </td>
                                            <?php $i = $i+1;?>
                                        </tr>
                                    <?php } ?>
                                    </tbody>

                                </table>
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary waves-effect waves-light ">Save</button>
                            </div>
                        </div><!--row-->
                    </form>
                                                        </td>
                                           </tr>
                                         
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
                          window.location.href = '<?php echo base_url();?>Productmaster/deletes1/' + table + '/' + field + '/' + delete_id + '/' + section;
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