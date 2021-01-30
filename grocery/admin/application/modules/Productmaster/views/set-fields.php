                <?php
                
                $attribute_id= explode(',',@$single_pro_data->attribute_id);

                ?>

      <style type="text/css">
        .checkbox-grid li {
            display: block;
            float: left;
            width: 25%;
          }
      </style>          
      <script>
       $(document).ready(function() {
         $("#onchange_div").hide();
         $("#onchange_div2").hide();
         });
  
  
  
  </script>
               <div class="content-wrapper">
                <div class="container-fluid">
                <h2>Manage Product Master Field</h2>
                
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a class="active" href="<?php echo base_url()?>Productmaster/set_fields">Manage Product Master Field</a></li>
                        
                       <div class="pull-right">
                    <!-- <button type="submit" form="form-category" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Save"><i class="fa fa-save"></i></button> -->
                    <!-- <a href="<?php echo base_url();?>/Productmaster/attribute_group_list" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Cancel"><i class="fa fa-reply"></i></a> --></div>
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
                <h3 class="panel-title"><i class="fa fa-pencil"></i>Manage Product Master Fields</h3>
                 </div>
                <div class="panel-body">
                <?php 
                if(!empty($_SESSION['msg'])){
                ?>
                  <span style="color:red"><?php echo $_SESSION['msg'];?></span>
                <?php
                  unset($_SESSION['msg']);
                }

                $cnt=count(@$fields_data);
                ?>
                <form action="<?php echo base_url();?>/Productmaster/save_field_data" method="post" enctype="multipart/form-data" id="form-category" class="form-horizontal">
                  <input type="hidden" name="total_field" value="<?php echo @$cnt;?>">
                
                <div class="tab-content">
                <div class="tab-pane active" id="tab-general">
                
                <div class="tab-content">
                <div class="tab-pane active" id="language1">
                
                <div class="form-group">
                <!-- <label class="col-sm-2 control-label" for="input-description1">Select Fields</label> -->
                <div class="col-sm-10">
    <ul class="checkbox-grid">
     <?php
    // print_r($fields_data)
     if(!empty($fields_data)){
      $i=1;
      foreach ($fields_data as $value) {?>
      <li>
       <input type="hidden" name="field_id_<?php echo $i;?>" value="<?php echo @$value->id;?>">
        <input type="checkbox" id="attribute_id"<?php if(@$value->status=='1'){echo'checked="checked"';}?> name="attribute_id[]" value="<?php echo @$value->id;?>" /><label for="text1">&nbsp; <?php echo @$value->field_name;?></label></li>
        <?php  $i++;} }?> 
    </ul>
                </div>
                </div>

                
                </div>
                </div>
                </div>
                <div class="tab-pane" id="tab-data">
                  <br>
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
        
        


        
        