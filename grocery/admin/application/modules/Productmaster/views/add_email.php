
               <div class="content-wrapper">
                <div class="container-fluid">
                <h2>Email</h2>
                
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a class="active" href="<?php echo base_url()?>Productmaster/brand_list">Email</a></li>
                        
                       <div class="pull-right">
                    <!-- <button type="submit" form="form-category" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Save"><i class="fa fa-save"></i></button> -->
                    <a href="<?php echo base_url();?>/Productmaster/email_list" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Cancel"><i class="fa fa-reply"></i></a></div>
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
                 

        <div style="display: none" id="glob_msg" class="alert alert-block alert-error">
             <a class="close" data-dismiss="alert" href="#">X</a>
             <div class="text-center"> 
                <h4 class="alert-heading">Error!</h4>
                <?php //echo $this->session->flashdata('error'); ?>
             </div>
        </div>
              <!-- Custom Tabs -->
              <div class="nav-tabs-custom">
               
                <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                  <div class="panel panel-default">
                <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-pencil"></i> Add Email Message</h3>
                 </div>
                <div class="panel-body">
                <form action="<?php echo base_url();?>/Productmaster/save_email_data" method="post" enctype="multipart/form-data" id="form-category" class="form-horizontal">
                
                <input type="hidden" name="cms_id" value="<?php echo @$this->uri->segment(3);?>">
				        <input type="hidden" name="email_id" value="<?php echo @$single_cat_data->id;?>">
                
                <div class="tab-content">
                <div class="tab-pane active" id="tab-general">
                
                <div class="tab-content">
                <div class="tab-pane active" id="language1">
                  <br>
                 <div class="form-group">
                <label class="col-sm-2 control-label" for="input-status">Type</label>
                <div class="col-sm-10">
                <select name="type_id" id="type_id" class="form-control">
                <option value="">--Select type--</option>  
                <option value="1" <?php if(@$single_cat_data->type_id == '1') echo 'selected="selected"'; ?> >Registration</option>
                <option value="2" <?php if (@$single_cat_data->type_id == '2') echo 'selected="selected"'; ?>>Login</option>
                 <option value="3" <?php if (@$single_cat_data->type_id == '2') echo 'selected="selected"'; ?>>Change Password</option>
                  
                </select>
                </div>
               </div>  
                <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-name1">Subject<span style="color:red">*</span></label>
                <div class="col-sm-10">
                <input type="text" required="" name="subject" id="subject" value="<?php echo @$single_cat_data->subject;?>" placeholder="Subject" class="form-control">
                </div>
                </div>
                <div class="form-group">
                <label class="col-sm-2 control-label" for="input-description1">Email Message</label>
                <div class="col-sm-10">
                <textarea  name="message" id="message" class="tincyeditor"><?php echo @$single_cat_data->message;?></textarea>
                </div>
                </div>
              
                </div>
                </div>
                </div>
                
                <div class="form-group">
                <label class="col-sm-2 control-label" for="input-status">Status</label>
                <div class="col-sm-10">
                <select name="status" id="input-status" class="form-control">
                <option value="1" <?php if(@$single_cat_data->status == '1') echo 'selected="selected"'; ?> >Active</option>
                <option value="0" <?php if (@$single_cat_data->status == '0') echo 'selected="selected"'; ?>>Inactive</option>
                </select>
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
        
        


        
        