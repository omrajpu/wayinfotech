
               <div class="content-wrapper">
                <div class="container-fluid">
                <h2>Manage Staffs</h2>
                
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a class="active" href="<?php echo base_url()?>Productmaster/brand_list">Manage Staffs</a></li>
                        
                       <div class="pull-right">
                    <!-- <button type="submit" form="form-category" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Save"><i class="fa fa-save"></i></button> -->
                    <a href="<?php echo base_url();?>/Productmaster/brand_list" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Cancel"><i class="fa fa-reply"></i></a></div>
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
                <h3 class="panel-title"><i class="fa fa-pencil"></i>Manage Staffs</h3>
                 </div>
                <div class="panel-body">
                 <form method="post" class="md-form1" name="standard_common_frm" id="standard_common_frm" enctype="multipart/form-data">
                                              <div class="row mt-3" id="inp_head">
                           
                            <div class="col-md-12 collapse multi-collapse collapse show" id="card_print_details_collapse">
                                <div class="row">

                                     <div class="col-md-6">
                                        <div class="form-group row"><?php $id=$this->uri->segment('3'); ?>
                                            <label class="col-sm-4 col-form-label">User Type<span style="color:red">*</span></label>
                                            <div class="col-sm-8">
                                             <select class="form-control selectpicker" name="type" id="type" >
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
                                                 <div id="type_error_message"></div>

                                             <!--    <select class="form-control form-control-sm" name="type" id="type">
                                                    <option value="">Select Type</option>
                                                  
                                                </select>
                                                <?php //echo form_error('type'); ?> -->
                                            </div>
                                        </div>
                                    </div> 
          
          
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Username<span style="color:red">*</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control form-control-sm" name="username" id="username" value="<?php echo @$list_data['username'];?>" placeholder="Username">
                                                <div id="username_error_message"></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                     <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">First Name<span style="color:red">*</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control form-control-sm" name="first_name" id="first_name" value="<?php echo @$list_data['first_name'];?>" placeholder="First Name">
                                               <div id="first_name_error_message"></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                     <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Last Name<span style="color:red">*</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control form-control-sm" name="last_name" id="last_name" value="<?php echo @$list_data['last_name'];?>" placeholder="Last Name">
                                                <div id="last_name_error_message"></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">User Email<span style="color:red">*</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control form-control-sm" name="email" id="email" value="<?php echo @$list_data['email'];?>" placeholder="User Email">
                                                 <div id="email_error_message"></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Phone<span style="color:red">*</span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control form-control-sm" name="phone" id="phone" value="<?php echo @$list_data['phone'];?>" placeholder="Phone">
                                                 <div id="phone_error_message"></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">User Password<span style="color:red">*</span></label>
                                            <div class="col-sm-8">
                                                <input type="password" class="form-control form-control-sm" name="password" id="password"  value="<?php echo @$list_data['password'];?>">
                                                <div id="password_error_message"></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Confirm Password<span style="color:red">*</span></label>
                                            <div class="col-sm-8">
                                                <input type="password" class="form-control form-control-sm" name="cnfpassword" id="cnfpassword"  value="<?php echo @$list_data['cnfpassword'];?>">
                                                <div id="cnfpassword_error_message"></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                   <!--   <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Location<span>*</span></label>
                                            <div class="col-sm-8">
                                               <?php //echo select_dropdown_html('office_id', 'office_id', $dropdown_css_class = 'form-control selectpicker', $choose_one = 'Choose One', 'm_office', $value_field = 'id', $display_field = 'office_title', @$list_data['office_id'], $condition = '', $c_match = '', $dropdown_custom_css = '', $extra_option = ''); ?> 
                                        <div id="office_id_error_message"></div>
                                            </div>
                                        </div>
                                    </div>  -->

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Profile Photo</label>
                                            <div class="col-sm-8">
                                               <input type="file" name="user_profile" id="user_profile" placeholder="User Profile Pic" class="form-control file_input" value="<?php echo @$list_data['user_profile']; ?>" data-jfiler-name="files">
                                                <div id="user_profile_error_message"></div><br>
                                                <?php if(@$list_data['user_profile']!=''){?>
                                                <a href="<?php echo siteUrl.'assets/uploads/profile/'.@$list_data['user_profile'];?>" target="_blank">
                                                    <img src="<?php echo siteUrl.'assets/uploads/profile/'.@$list_data['user_profile'];?>" alt="kpts_tpa" width="40" height="40">
                                                </a><?php } ?>
                                       
                                            </div>
                                        </div>
                                    </div> 

                                          
                                    

                                </div><!-- row -->
                            </div><!--col-md-12 collapse-->
                        </div><!--row inp head-->                        
                        <div class="row">
                            <div class="col-md-12 text-center mt-4 mb-2">
                                   <input type="hidden" name="id" id="id" value="<?php echo $this -> uri -> segment('3');?>">
                                <input type="hidden" name="action_ajax_url" id="action_ajax_url" value="add_staff">
                                  <button type="reset" class="btn btn-default waves-effect " data-dismiss="modal">Cancel</button>
                                <button type="submit" formnovalidate="formnovalidate" id="submit_frm" name="submit" class="btn btn-info double_form_disabled">Save</button>
                            </div>
                        </div>
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

         <div class="notify-corner text-center hide show_result" style="display: none" id="dataSaved">
            <div class="notify-wrapper">
                <div class="notify-arrow"></div>
                <div class="notify-container" style="">
                    <div class="notify-metro-base notify-metro-info">
                        <div class="image animated flash" data-notify-html="image"><i class="fa fa-check"></i></div>
                        <div class="text-wrapper">
                            <div class="title" data-notify-html="title">Data Saved</div>
                            <div class="text" data-notify-html="text">Your Data has Been successfully Saved</div>
                        </div>
                        <div class="save_info_progressbar">
                            <span style="width: 100%;"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- notify-corner -->
        <script>
          $(document).ready(function () {
// Code added by Vinod Kumar Pal on 21022019 Use common all application
$('#standard_common_frm,#standard_common_frm1,#standard_common_frm2,#standard_common_frm3,#standard_common_frm4,#standard_common_frm5,#standard_common_frm6,#standard_common_frm7,#standard_common_frm8,#standard_common_frm9,#standard_common_frm10').submit(function (e) {
    var frmattid = $(this).attr('attid');

    e.preventDefault(); // Prevent Default Submission
    e.currentTarget.classList.add('submitted'); // Validation Class by Ankit
    var action_url = $("#action_ajax_url").val();
      $(".double_form_disabled").prop('disabled', true);
            setTimeout(function(){$(".double_form_disabled").prop('disabled', false); }, 5000);
   // var frm_id = 'standard_common_frm';
    //var formData = new FormData($(frm_id)[0]); // Create an arbitrary FormData instance
    $.ajax({
        url: action_url,
        type: 'POST',
        dataType: 'json',
       data: new FormData(this),
        //data: formData,
        processData: false,
        contentType: false,
        cache: false,
        async: false,
    })

    .done(function (result) {
       // alert(result);
        if (result.success == true) {
            if(result.save_data_id>0)
            {
                if (frmattid=='medical_frm') {
                    $('#cta_id').val(result.save_data_id);//Use For Medical Entry View (Claim Total Amount) Part
                }
            }

            $(".text-danger").empty();
           $(".show_result").show();
            /* Code added by Vinod Kumar Pal on 01062020 */
            if(result.search_url!='')
            {
                setTimeout(function(){
                    window.location.href=result.search_url; // The URL that will be redirected too.
                }, 100); // The bigger the number the longer the delay.

            }else {
                $(".show_result").show();
                // Relode Page
                setTimeout(function () {
                    location.reload();
                }, 500);
            }
        } else {
            $(".text-danger").empty();
            $.each(result.messages, function (key, value) {
                //alert("khaskjd")
                var result = key;
                var errorDivId = result.concat("_error_message");
                var errorResult = '#'.concat(errorDivId);
                $(errorResult).css({"color": "red"});
                $(errorResult).append(value);
            });
        }
    })
    .fail(function () {
        $("#final_result").html("Ajax Submit Failed ...");
    });
});
});
        </script>