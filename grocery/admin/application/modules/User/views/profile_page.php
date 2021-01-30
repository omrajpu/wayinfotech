            <div class="content-wrapper">
                <div class="container-fluid">
                <h2>Profile  Details</h2>
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
                <h3 class="panel-title"><i class="fa fa-pencil"></i> Update  Profile</h3>
                 </div>
                <div class="panel-body">
                <form action="<?php echo base_url();?>User/update_profile" method="post" enctype="multipart/form-data" id="form-category" class="form-horizontal">
                <ul class="nav nav-tabs">
                <input type="hidden" name="user_id" value="<?php echo @$_SESSION['userid']?>">
                <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
                <li><a href="#tab-data" data-toggle="tab">Details</a></li>
               </ul>
                <div class="tab-content">
                <div class="tab-pane active" id="tab-general">
                
                <div class="tab-content">
                <div class="tab-pane active" id="language1">
                  <br>
                <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-name1"> Name <span style="color:red">*</span></label>
                <div class="col-sm-10">
                   
                <input   type="text" name="name" id="name" value="<?php echo @$admin_data->firstname;?>" placeholder="Name" class="form-control">
                
                </div>
                </div>
                
                <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-meta-title1">Mobile</label>
                <div class="col-sm-10">
                <input type="text" id="mobile" name="mobile" value="<?php echo @$admin_data->mobile;?>" placeholder="Mobile" id="input-meta-title1" class="form-control">
                </div>
                </div>
               
                <div class="form-group">
                <label class="col-sm-2 control-label" for="input-meta-keyword1">Email</label>
                <div class="col-sm-10">
                <input type="text" name="email" value="<?php echo @$admin_data->email;?>" placeholder="Email" id="input-meta-keyword1" class="form-control">
                </div>
                </div>
                </div>
                </div>
                </div>
                <div class="tab-pane" id="tab-data">
                  <br>
              
                <?php
                if($this->uri->segment(3)){?>
                <div class="form-group">    
                <label class="col-sm-2 control-label">Image</label>
                <div class="col-sm-10">
                
                <input type="file" name="update_photo"  onchange="loadFile(event)">
            </div>
        </div>
                <div class="list-group-item" style="border: 0px !important;">
                       <div class="row">
                                           <div class="col-md-3">
                                           </div>
                                           <div class="col-md-9"> 
                                               <img id="output" style="width: 40px;" src="<?php echo base_url();?>upload/cat_images/<?php echo @$single_cat_data->image_url; ?>">
                                           </div>
                                       </div>
                                   </div>
                
            <?php } else{?>
                  <div class="form-group">
                <label class="col-sm-2 control-label">Image</label>
                <div class="col-sm-10">
                
                <input type="file" name="file"  onchange="loadFile(event)">
            
        
                </div>
                </div>

            <?php } ?>
                <div class="list-group-item" style="border: 0px !important;">
                                       <div class="row">
                                           <div class="col-md-3">
                                           </div>
                                           <div class="col-md-9"> 
                                               <img width="40%" id="output"/>
                                           </div>
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
     <button style="float: right;" type="submit" class="btn btn-success" style="margin-top: 15px;" id="btnSaveIt">Update</button>
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
        
        


        
        