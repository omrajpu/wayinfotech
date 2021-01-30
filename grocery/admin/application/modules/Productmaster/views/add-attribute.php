
               <div class="content-wrapper">
                <div class="container-fluid">
                <h2>Attribute</h2>
                
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a class="active" href="<?php echo base_url()?>Productmaster/attribute_list">Attribute</a></li>
                       <?php
                        $group_array[]= @$single_cat_data->attribute_group_id;
                       ?> 
                       <div class="pull-right">
                    <!-- <button type="submit" form="form-category" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Save"><i class="fa fa-save"></i></button> -->
                    <a href="<?php echo base_url();?>/Productmaster/attribute_list" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Cancel"><i class="fa fa-reply"></i></a></div>
                </ol>
                
                </div>
                
                <!-- Main content -->
                <section class="content">
                <div class="row">
              
                       
             <div class="col-md-12">

                  <?php
                //print_r($_SESSION);
                  if(@$_SESSION['error_msg']){?>
                    <div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> <?php echo $_SESSION['error_msg'];
                      unset($_SESSION['error_msg']);
                    ?>
                    <button type="button" class="close" data-dismiss="alert">×</button>
                  </div>
                <?php }?>
                 
             <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
               
                <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                  <div class="panel panel-default">
                <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil"></i> Add Attribute</h3>
                 </div>
                <div class="panel-body">
                <form action="<?php echo base_url();?>/Productmaster/save_attribute_data" method="post" enctype="multipart/form-data" id="form-category" class="form-horizontal">
                <ul class="nav nav-tabs">
                <input type="hidden" name="attribute_id" value="<?php echo @$this->uri->segment(3);?>">
                <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
                <li><a href="#tab-data" data-toggle="tab">Details</a></li>
                </ul>
                <div class="tab-content">
                <div class="tab-pane active" id="tab-general">
                
                <div class="tab-content">
                <div class="tab-pane active" id="language1">
                  <br>
                <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-name1">Attribute Name <span style="color:red">*</span></label>
                <div class="col-sm-10">
                <input type="text" name="attribute_name" id="attribute_name" value="<?php echo set_value('attribute_name'); ?><?php echo @$single_cat_data->attribute_name;?>" placeholder="Attribute Name" class="form-control">
                <?php echo form_error('attribute_name', '<div class="error"><p style="color:red">', '</p></div>'); ?>
                </div>
                </div>

                <!-- <div class="form-group">
                <label class="col-sm-2 control-label" for="input-subtract">Attribute Group</label>
                <div class="col-sm-10">
                <select name="attribute_group_id" id="attribute_group_id" class="form-control">
                <option value="">Select Attribute Group</option>
                   <?php 
                   foreach ($group_data as $value) {?>
                    <option value="<?php echo $value->id;?>" <?php if(in_array($value->id,$group_array)){ echo 'selected="selected"';}?>><?php echo $value->attribute_group_name;?></option>
                   <?php } ?>
                 </select>
                </div>
                </div> -->
                <div class="form-group">
                <label class="col-sm-2 control-label" for="input-description1">Description</label>
                <div class="col-sm-10">
                <textarea  name="description" id="description" class="tincyeditor"><?php echo @$single_cat_data->description;?></textarea>
                </div>
                </div>
                <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-meta-title1">Meta Tag Title</label>
                <div class="col-sm-10">
                <input type="text" id="meta_title" name="meta_title" value="<?php echo set_value('meta_title'); ?><?php echo @$single_cat_data->meta_title;?>" placeholder="Meta Tag Title" id="input-meta-title1" class="form-control">
                </div>
                </div>
                <div class="form-group">
                <label class="col-sm-2 control-label" for="input-meta-description1">Meta Tag Description</label>
                <div class="col-sm-10">
                <textarea name="meta_description" rows="5" placeholder="Meta Tag Description" id="input-meta-description1" class="form-control"><?php echo set_value('meta_description'); ?><?php echo @$single_cat_data->meta_description;?></textarea>
                </div>
                </div>
                <div class="form-group">
                <label class="col-sm-2 control-label" for="input-meta-keyword1">Meta Tag Keywords</label>
                <div class="col-sm-10">
                <textarea name="meta_keyword" rows="5" placeholder="Meta Tag Keywords" id="input-meta-keyword1" class="form-control"><?php echo set_value('meta_keyword'); ?><?php echo @$single_cat_data->meta_keyword;?></textarea>
                </div>
                </div>
                </div>
                </div>
                </div>
                <div class="tab-pane" id="tab-data">
                  <br>
                <div class="form-group">
                <label class="col-sm-2 control-label" for="input-sort-order">Sort Order</label>
                <div class="col-sm-10">
                <input type="text" name="sort_order" value="<?php echo @$single_cat_data->sort_order;?>" placeholder="Sort Order" id="input-sort-order" class="form-control">
                </div>
                </div>
                <div class="form-group">
                <label class="col-sm-2 control-label" for="input-status">Status</label>
                <div class="col-sm-10">
                <select name="status" id="input-status" class="form-control">
                <option value="Enabled" <?php if(@$single_cat_data->status == 'Enabled') echo 'selected="selected"'; ?> >Enabled</option>
                <option <?php if (@$single_cat_data->status == 'Disabled') echo 'selected="selected"'; ?> value="Disabled">Disabled</option>
                </select>
                </div>
            </div>
            </div>


     </div>
     <?php
     if($this->uri->segment(3)){?>
       <button style="float: right;" type="submit" class="btn btn-success" style="margin-top: 15px;" id="btnSaveIt">Update</button>
      <?php } else{?>  
     <button style="float: right;" type="submit" class="btn btn-success" style="margin-top: 15px;" id="btnSaveIt">Save</button>
 <?php }?>
</form>
</div>
</div>  


              <script>
                    var loadFile = function(event) {
                      var reader = new FileReader();
                      reader.onload = function(){
                        var output = document.getElementById('output');
                        output.src = reader.result;
                      };
                      reader.readAsDataURL(event.target.files[0]);
                    };
          </script>
       <script>
                    var loadFile = function(event) {
                      var reader = new FileReader();
                      reader.onload = function(){
                        var output = document.getElementById('output');
                        output.src = reader.result;
                      };
                      reader.readAsDataURL(event.target.files[0]);
                    };
          </script>
       
        <script type="text/javascript">
        $(document).ready(function(){
            tinyMCE.triggerSave();
            tinymce.init({
                selector: '.tincyeditor',
                height: 150,
                menubar: false,
                plugins: [
                  'advlist autolink lists link image charmap print preview anchor textcolor',
                  'searchreplace visualblocks code fullscreen',
                  'insertdatetime media table paste code help wordcount'
                ],
                toolbar1: "bold italic underline | alignleft aligncenter alignright alignjustify | styleselect | fontselect | fontsizeselect",
                toolbar2: "cut copy | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime | table ",
                content_css: [
                  '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                  '//www.tiny.cloud/css/codepen.min.css'
                ]
          });
        });
        </script>
 
 <script src="<?php echo base_url(); ?>assets/js/tinymce/js/tinymce/jquery.tinymce.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/tinymce/js/tinymce/tinymce.min.js"></script>
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
        <?php ?>
        
        


        
        