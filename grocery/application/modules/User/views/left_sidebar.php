 <div class="user-profile-header">
                              <?php
                              if(@$user_data->photo){?>
                              <img class="user-img" src="<?php echo base_url();?>/admin/upload/profile/<?php echo @$user_data->photo;?>">
                              <?php } else{?>
                                <img class="user-img" src="http://stage.wayinfotechsolutions.co/grocery/admin/upload/profile/1606218735_user.png">
                              <?php }?>
                              <h5 class="mb-1 text-secondary"><strong>Hi </strong> <?php echo @$user_data->first_name;?></h5>
                              <p><?php echo @$user_data->phone;?></p>
                           </div>
                           <div class="list-group">
                              <a href="<?php echo base_url();?>User/profile" class="list-group-item list-group-item-action active"><i aria-hidden="true" class="mdi mdi-account-outline"></i>  My Profile</a>
                              <a href="<?php echo base_url();?>User/order_history" class="list-group-item list-group-item-action"><i aria-hidden="true" class="mdi mdi-map-marker-circle"></i> Order List</a>
                             <!--  <a href="<?php echo base_url();?>User/wish_history" class="list-group-item list-group-item-action"><i aria-hidden="true" class="mdi mdi-heart-outline"></i>  Wish List </a> -->
                              <!-- <a href="orderlist.html" class="list-group-item list-group-item-action"><i aria-hidden="true" class="mdi mdi-format-list-bulleted"></i>  Order List</a>  -->
                              <a href="<?php echo base_url();?>User/logout_sess" class="list-group-item list-group-item-action"><i aria-hidden="true" class="mdi mdi-lock"></i>  Logout</a> 
                           </div>