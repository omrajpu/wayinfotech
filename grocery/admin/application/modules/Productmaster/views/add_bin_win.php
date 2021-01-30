<?php
   $cat_array[]= @$single_pro_data->cat_id;
                $sub_cat_array[]= @$single_pro_data->sub_cat_id;
                $sub_chid_cat_array[]= @$single_pro_data->sub_cat_child_id;
                
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
  
  
  function get_cat_id(val){
 
    $("#onchange_div").show();
    $.ajax({
          url:"<?php echo base_url();?>"+'Productmaster/get_sub_cat',
          type:'POST',
          data:{cat_id:val},
          success:function(result){
            $("#sub_cat_id").html(result);
            $("#sub_cat_child_id").html('');
          }
      })
  }
   function get_product(val){

    $("#onchange_div2").show();
    $.ajax({
          url:"<?php echo base_url();?>"+'Productmaster/get_product',
          type:'POST',
          data:{cat_id:val},
          success:function(result){
            $("#product_id").html(result);
          }
      })
  }
 function get_id(id){
   $("#photo_"+id).val(id);
  } 
  </script>
               <div class="content-wrapper">
                <div class="container-fluid">
                <h2>Manage Bin/Win</h2>
                
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a class="active" href="<?php echo base_url()?>Productmaster/bin_win_product_list"> Manage Bin/Win Product</a></li>
                        
                       <div class="pull-right">
                    <!-- <button type="submit" form="form-category" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Save"><i class="fa fa-save"></i></button> -->
                    <a href="<?php echo base_url();?>/Productmaster/attribute_group_list" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Cancel"><i class="fa fa-reply"></i></a></div>
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
                <h3 class="panel-title"><i class="fa fa-pencil"></i> Manage Bin/Win111</h3>
                 </div>
                <div class="panel-body">
                <?php 
                if(!empty($_SESSION['msg'])){
                ?>
                  <span style="color:red"><?php echo $_SESSION['msg'];?></span>
                <?php
                  unset($_SESSION['msg']);
                }
                ?>
                <form action="<?php echo base_url();?>/Productmaster/save_bin_win_data" method="post" enctype="multipart/form-data" id="form-category" class="form-horizontal">
                <ul class="nav nav-tabs">
                <input type="hidden" name="data_id" value="<?php echo @$this->uri->segment(3);?>">
               
                <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
                <li><a href="#tab-data" data-toggle="tab">Details</a></li>
                </ul>
                <div class="tab-content">
                <div class="tab-pane active" id="tab-general">
                
                <div class="tab-content">
                <div class="tab-pane active" id="language1">
                  <br>
  
                <div class="form-group">
                <label class="col-sm-2 control-label"  for="input-subtract">Category<span style="color:red">*</span></label>
                <div class="col-sm-10">
                <select required="" <?php echo $field;?>  onchange="get_cat_id(this.value)" name="cat_id" id="cat_id" class="form-control">
                <option value="">Select Category</option>
                   <?php 
                   foreach ($cat_data as $value) {?>
                    <option value="<?php echo $value->id;?>" <?php if($single_cat_data->cat_id==$value->id) echo "selected"?> ><?php echo @$value->category_name;?></option>
                   <?php } ?>
                 </select>
                
                </div>
                </div>

                <div class="form-group" >
                <label class="col-sm-2 control-label" for="input-subtract">Sub Category<span style="color:red">*</span></label>
                <div class="col-sm-10">
                <select <?php echo $field;?>  onchange="get_product(this.value)" name="sub_cat_id" id="sub_cat_id" class="form-control">
                <option value="">Select Sub Category</option>
                   <?php 
                  foreach ($sub_cat_data as $value) {?>
                    <option value="<?php echo $value->id;?>" <?php if($single_cat_data->sub_cat_id==$value->id) echo "selected"?> ><?php echo @$value->sub_category_name;?></option>
                   <?php } ?>
                 </select>
                </div>
                </div> 


                <div class="form-group" >
                <label class="col-sm-2 control-label" for="input-subtract">Product<span style="color:red">*</span></label>
                <div class="col-sm-10">
                <select <?php echo $field;?>  name="product_id" id="product_id" class="form-control">
                <option value="">Select Product</option>
                   <?php 
                  foreach ($product as $value) {
                    
                    ?>
                    <option value="<?php echo $value->id;?>" <?php if($single_cat_data->id==$value->id) echo "selected"?>><?php echo @$value->product_name;?></option>
                   <?php } ?>
                 </select>
                </div>
                </div> 
               

                <div class="form-group" >
                <label class="col-sm-2 control-label" for="input-subtract">Select Bin Product</label>
                <div class="col-sm-10">
                <select <?php echo $field;?>  name="bin_id" id="bin_id" class="form-control">
                <option value="">Select Bin Product</option>
                   <?php 
                  foreach ($bin_p as $value) {?>
                    <option value="<?php echo $value->id;?>" <?php if($single_cat_data->bin_id==$value->id) echo "selected"?>><?php echo $value->product_name?></option>
                   <?php } ?>
                 </select>
                </div>
                </div> 

                <div class="form-group" >
                <label class="col-sm-2 control-label" for="input-subtract">Select Win Product</span></label>
                <div class="col-sm-10">
                <select <?php echo $field;?>  name="win_id" id="win_id" class="form-control">
                <option value="">Select Win Product</option>
                   <?php 
                  foreach ($win_p as $value) {?>
                    <option value="<?php echo $value->id;?>" <?php if($single_cat_data->win_id==$value->id) echo "selected"?>><?php echo $value->product_name?></option>
                   <?php } ?>
                 </select>
                </div>
                </div> 
               
       
                <div class="form-group">
                <label class="col-sm-2 control-label" for="input-status">Status</label>
                <div class="col-sm-10">
                <select name="status" id="input-status" class="form-control">
                <option value="1" <?php if(@$single_cat_data->status == '1') echo 'selected="selected"'; ?> >Enabled</option>
                <option value ="0" <?php if (@$single_cat_data->status == '0') echo 'selected="selected"'; ?>>Disabled</option>
                </select>
                </div>


                
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
        
        


        
        