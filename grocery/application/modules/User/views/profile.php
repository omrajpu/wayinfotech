  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script type="text/javascript">
         $.noConflict()
          jQuery(document).ready(function() {
          jQuery("#state_onchange_div").hide();
          jQuery("#city_onchange_div").hide();
      });
      </script>
 <script type="text/javascript">
  function get_state_id(val){
     $("#state_onchange_div").show();
     $("#load_state_div").hide();
     $.ajax({
          url:"<?php echo base_url();?>"+'User/get_state_id',
          type:'POST',
          data:{country_id:val},
          success:function(result){
            $("#state_id").html(result);
            
          }
      })
  } 
function get_city_id(val){
     
     $("#city_onchange_div").show();
     $("#load_city_div").hide();

     $.ajax({
          url:"<?php echo base_url();?>"+'User/get_city_id',
          type:'POST',
          data:{state_id:val},
          success:function(result){
            $("#city_id").html(result);
          }
      })
  } 
 </script>
 <section class="account-page section-padding">
         <div class="container">
            <div class="row">
               <div class="col-lg-9 mx-auto">
                  <div class="row no-gutters">
                     <div class="col-md-4">
                        <div class="card account-left">
                          <?php $this->load->view('left_sidebar.php');?>
                        </div>
                     </div>
                     <div class="col-md-8">
                        <div class="card card-body account-right">
                           <div class="widget">
                              <div class="section-header">
                                 <h5 class="heading-design-h5">
                                    My Profile
                                    <?php //print_r($user_data);
                                     $_SESSION['photo']=@$user_data->photo;
                                     $country_arr[]=@$user_data->billing_country;
                                     $state_arr[]=@$user_data->billing_state;
                                     $city_arr[]=@$user_data->billing_city;
                                    ?>
                                 </h5>
                              </div>
                              <form accept-charset="UTF-8"  action="<?php echo site_url()?>User/edit_user_save" method="POST" enctype="multipart/form-data">
                                 <div class="row">
                                    <div class="col-sm-6">
                                       <div class="form-group">
                                          <label class="control-label">First Name </label>
                                          <input name="first_name" class="form-control border-form-control" value="<?php echo @$user_data->first_name;?>" placeholder="" type="text">
                                       </div>
                                    </div>
                                    <div class="col-sm-6">
                                       <div class="form-group">
                                          <label class="control-label">Last Name </label>
                                          <input name="last_name" class="form-control border-form-control" value="<?php echo @$user_data->last_name;?>" placeholder="" type="text">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-sm-6">
                                       <div class="form-group">
                                          <label class="control-label">Phone </label>
                                          <input name="phone" class="form-control border-form-control" value="<?php echo @$user_data->phone;?>" placeholder="" type="number">
                                       </div>
                                    </div>
                                    <div class="col-sm-6">
                                       <div class="form-group">
                                          <label class="control-label">Email Address </label>
                                          <input  name="email" class="form-control border-form-control " value="<?php echo @$user_data->email;?>" placeholder="" type="email">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-sm-6">
                                       <div class="form-group">
                                          <label class="control-label">Country</label>
                                          <select name="country_id" onchange="get_state_id(this.value)"  class="select2 form-control border-form-control">
                                             <option value="">Select Country</option>
                                             <?php
                                             foreach ($country_data as  $value) {?>
                                                <option value="<?php echo $value->id; ?>"<?php  if(in_array($value->id,$country_arr)){ echo'selected="selected"';}?>><?php echo $value->name; ?></option>
                                             
                                            <?php }?>
                                          </select>
                                       </div>
                                    </div>
                                   <div class="col-sm-6" id="load_state_div">
                                       <div class="form-group">
                                          <label class="control-label">State <span class="required">*</span></label>
                                          <select name="state_id" onchange="get_city_id(this.value)"  class="select2 form-control border-form-control">
                                             <option value="">Select state</option>
                                             <?php
                                             foreach ($state_data as  $value) {?>
                                                <option value="<?php echo $value->id; ?>"<?php  if(in_array($value->id,$state_arr)){ echo'selected="selected"';}?>><?php echo $value->name; ?></option>
                                             
                                            <?php }?>
                                          </select>
                                       </div>
                                    </div>


                                     <div class="col-sm-6" id="state_onchange_div">
                                       <div class="form-group">
                                          <label class="control-label">State <span class="required">*</span></label>
                                          <select name="state_id"  onchange="get_city_id(this.value)" id="state_id"  class="select2 form-control border-form-control">
                                             
                                          </select>
                                       </div>
                                    </div>

                                      <div class="col-sm-6" id="load_city_div">
                                       <div class="form-group">
                                          <label class="control-label">City <span class="required">*</span></label>
                                          <select name="city_id" onchange="get_city_id(this.value)"  class="select2 form-control border-form-control">
                                             <option value="">Select city</option>
                                             <?php
                                             foreach($city_data as  $value) {?>
                                                <option value="<?php echo $value->id; ?>"<?php  if(in_array($value->id,$city_arr)){ echo'selected="selected"';}?>><?php echo $value->name; ?></option>
                                             
                                            <?php }?>
                                          </select>
                                       </div>
                                    </div>
                                    <div class="col-sm-6" id="city_onchange_div">
                                       <div class="form-group">
                                          <label class="control-label">City</label>
                                          <select name="city_id" id="city_id"  class="select2 form-control border-form-control">
                                            
                                          </select>
                                       </div>
                                    </div>
                                     <div class="col-sm-6">
                                       <div class="form-group">
                                          <label class="control-label">Zip Code <span class="required">*</span></label>
                                          <input name="zip_code" class="form-control border-form-control" value="<?php echo @$user_data->billing_zip;?>" placeholder="" type="text">
                                       </div>
                                    </div>
                                 </div>
                                 
                                <!--  <div class="row">
                                    <div class="col-sm-12">
                                       <div class="form-group">
                                          <label class="control-label">Address <span class="required">*</span></label>
                                          <textarea class="form-control border-form-control"></textarea>
                                       </div>
                                    </div>
                                 </div> -->
                                 <div class="row">
                                    <div class="col-sm-12">
                                       <div class="form-group">
                                          <label class="control-label">Update Profile </label>
                                          <input style="padding: 10px;" type="file" cclass="form-control border-form-control" name="update_photo[]">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-sm-12 text-right">
                                       <!-- <button type="button" class="btn btn-danger btn-lg"> Cencel </button> -->
                                       <input type="submit" class="btn btn-success btn-lg"> </button>
                                    </div>
                                 </div>
                             </form>
                           </div>

                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="section-padding bg-white border-top">
         <div class="container">
            <div class="row">
               <div class="col-lg-4 col-sm-6">
                  <div class="feature-box">
                     <i class="mdi mdi-truck-fast"></i>
                     <h6>Free & Next Day Delivery</h6>
                     <p>Lorem ipsum dolor sit amet, cons...</p>
                  </div>
               </div>
               <div class="col-lg-4 col-sm-6">
                  <div class="feature-box">
                     <i class="mdi mdi-basket"></i>
                     <h6>100% Satisfaction Guarantee</h6>
                     <p>Rorem Ipsum Dolor sit amet, cons...</p>
                  </div>
               </div>
               <div class="col-lg-4 col-sm-6">
                  <div class="feature-box">
                     <i class="mdi mdi-tag-heart"></i>
                     <h6>Great Daily Deals Discount</h6>
                     <p>Sorem Ipsum Dolor sit amet, Cons...</p>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Footer -->

      