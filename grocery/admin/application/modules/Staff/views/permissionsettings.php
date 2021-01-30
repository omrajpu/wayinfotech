<div class="container-top1 content-page">
    <div class="header-page">
        <ul>
            <li class="heading-pr activeTab">
                <span>
                    <i class="ion-ios-checkbox-outline"></i>
                    <span class="zmTabTitle">Manage Pemission</span>
                </span>
            </li>
        </ul>
    </div>
    <div class="child-content-page">
        <div class="col-md-12 out-padding">
            <!-- <div class="title-heading mt-0">
                <h4 class="m-t-0 header-title mb-0">Provider Information</h4>
            </div> -->
            <div class="card-body table-responsive mt-40 table-body">
                <div class="col-md-12">
                    <form  id="frmAdd" name="frmAdd" method="POST" action="<?php echo base_url(); ?>masters/addpermissionrecord" accept-charset="utf-8" enctype="multipart/form-data">
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
                                        <label>User Type<span>*</span></label>
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-control selectpicker" name="type" id="type" onchange="reloadWithtype(this.value);">
                                            <option value="">Select Type</option>
                                            <?php
                                            $state = $this->CrudModel->getAdminTypeRecord();
                                            foreach($state as $value){
                                                if($id == $value['id']){

                                                    $sel = "selected";
                                                }else{
                                                    $sel = "";
                                                }
                                                ?>
                                                <option value="<?php echo $value['id']; ?>" <?php echo $sel?>><?php echo $value['type']?></option>
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

                                        window.location.href= "<?php echo base_url()?>masters/permissionsettings/"+val;

                                    }

                                }

                            </script>
                            <div class="w-100">
                                <table id="persmission" class="table table-bordered table-hover" width="100%">
                                    <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Menu Name</th>
                                        <th>View Record</th>
                                        <th>Add Record</th>
                                        <th>Update Record</th>
                                        <th>Delete Record</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $meuu = $this->CrudModel->getMenuRecord();
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
                                                        $checked = $this->CrudModel->checkPermissionRecord($id,$value['id'],'view_record');
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
                                                        $checked = $this->CrudModel->checkPermissionRecord($id,$value['id'],'add_record');
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
                                                        $checked = $this->CrudModel->checkPermissionRecord($id,$value['id'],'edit_record');
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
                                                        $checked = $this->CrudModel->checkPermissionRecord($id,$value['id'],'delete_record'); ?>
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
                </div><!--col-md-12-->
            </div><!--card body-->
        </div><!--col-md-12-->
    </div><!--child-content-page-->
</div><!--container top-->
<script>
    $(document).ready(function() {
        $('#persmission').DataTable( {
            "order": [[ 0, "asc" ]],
            "lengthMenu": [[50, 60, 70, -1], [50, 60, 70, "All"]]
        } );
    } );
</script>