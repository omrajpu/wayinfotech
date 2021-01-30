 <ul><li><img class="user-img" src="<?php echo base_url();?>/admin/upload/profile/<?php echo @$user_data->photo;?>"></li>
                    <li>
                       <a class="active" href="<?php echo base_url();?>User/profile">Profile</a>
                    </li>
                   <!--  <li>
                       <a class="" href="<?php echo base_url();?>User/profile">My Address</a>
                    </li> -->
                    <li>
                       <a class="" href="<?php echo base_url();?>User/order_history">My Orders</a>
                    </li>
                    <li>
                       <a class="" href="<?php echo base_url();?>User/wish_history">My Wishlist</a>
                    </li>
                    <li>
                       <a class="" href="<?php echo base_url();?>User/changepassword">Change Password</a>
                    </li>
                 </ul>
                 <style type="text/css">
                   .user-img{
                 border-radius: 50%;
                 width: 100px;
                position: relative;
               box-shadow: 0 8px 18px rgba(0, 0, 0, 0.32), 0 67px 5px rgba(253, 249, 249, 0.05);
}
                 </style>