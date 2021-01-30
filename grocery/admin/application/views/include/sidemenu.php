<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url() . "assets/dist/img/user2-160x160.jpg" ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>om<?php //echo $this->session->userdata('user_name');?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Master</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                <li><a href="<?php echo base_url() . "Productmaster/company_list" ?>"><i class="fa fa-circle-o text-aqua"></i>Company</a>
                  </li>
                  <li><a href="<?php echo base_url() . "Productmaster/brand_list" ?>"><i class="fa fa-circle-o text-aqua"></i>Brands</a>
                  </li>
                  
                   
                  <li><a href="<?php echo base_url() . "Productmaster/category" ?>"><i class="fa fa-circle-o text-aqua"></i>Categories</a></li>
                  <li><a href="<?php echo base_url() . "Productmaster/subcategory" ?>"><i class="fa fa-circle-o text-aqua"></i>Sub Categories</a></li>
                  <li><a href="<?php echo base_url() . "Productmaster/childsubcategory" ?>"><i class="fa fa-circle-o text-aqua"></i>Sub Child Categories</a></li>
                  <li><a href="#"><i class="fa fa-circle-o text-aqua"></i>Attributes</a>
                       <ul class="treeview-menu">
                       <li><a href="<?php echo base_url() . "Productmaster/attribute_list" ?>"><i class="fa fa-circle-o text-aqua"></i>Attributes</a></li>
                        <li><a href="<?php echo base_url() . "Productmaster/attribute_group_list" ?>"><i class="fa fa-circle-o text-aqua"></i>Attribute Allocation</a></li>
                       </ul>

                    </li>
                    <li><a href="<?php echo base_url() . "Productmaster/ProductList" ?>"><i class="fa fa-circle-o text-aqua"></i>Products</a></li>
                     <li><a href="<?php echo base_url() . "Productmaster/slider_list" ?>"><i class="fa fa-circle-o text-aqua"></i>Slider List</a>
                  </li>
                   <li><a href="<?php echo base_url() . "Productmaster/add_home_slider" ?>"><i class="fa fa-circle-o text-aqua"></i>Add Home Slider</a>
                  </li>
                 </ul>
            </li>
          <!--   <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Manage Win Products</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url();?>Productmaster/all_win_product"><i class="fa fa-circle-o text-aqua"></i>Win Products List</a></li>    
                                    
                  
                </ul>
            </li> -->
              <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Manage Master Fields</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url() . "Productmaster/set_fields" ?>"><i class="fa fa-circle-o text-aqua"></i>Master Fields List</a></li>    
                                    
                  
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Manage User</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url() . "User/user_list" ?>"><i class="fa fa-circle-o text-aqua"></i>User List</a></li>    
                                    
                  
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Festive Season</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url() . "Productmaster/charity_list" ?>"><i class="fa fa-circle-o text-aqua"></i>Festive List</a></li>    
                                    
                  
                </ul>
            </li>

       

              <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Manage Cms</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url();?>Productmaster/add_cms"><i class="fa fa-circle-o text-aqua"></i>Add Cms Page</a></li>    
                  <li><a href="<?php echo base_url() . "Productmaster/cms_list" ?>"><i class="fa fa-circle-o text-aqua"></i> List Cms Page</a></li>                  
                  
                </ul>
            </li>
			<li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Manage Staffs</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url() . "Staff/all_staff" ?>"><i class="fa fa-circle-o text-aqua"></i>All Staff</a>
                  </li>    
                  <li><a href="<?php echo base_url() . "Staff/staff_roles" ?>"><i class="fa fa-circle-o text-aqua"></i> Manage Roles</a></li>                  
                  <li><a href="<?php echo base_url() . "Staff/staff_permissions" ?>"><i class="fa fa-circle-o text-aqua"></i> Staff Permissions</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Manage Order</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url() . "Productmaster/cod_orders" ?>"><i class="fa fa-circle-o text-aqua"></i>Orders List</a>
                  </li>    
                                  
                  
                </ul>
              </li>
               <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i> <span>News Latter</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url() . "Productmaster/news_list" ?>"><i class="fa fa-circle-o text-red"></i>Listing</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Email Config</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url();?>Productmaster/add_email"><i class="fa fa-circle-o text-aqua"></i>Add Email Message</a></li>    
                  <li><a href="<?php echo base_url() . "Productmaster/email_list" ?>"><i class="fa fa-circle-o text-aqua"></i> List Email Message</a></li>                  
                  
                </ul>
            </li>
                 <li class="treeview">
                <a href="#">
                    <i class="fa fa-envelope"></i> <span>Contact</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo base_url() . "Productmaster/contact_list" ?>"><i class="fa fa-circle-o text-yellow"></i>Contact email</a></li>
                    
                </ul>
            </li>
           <!-- <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i> <span>Author</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o text-red"></i>Author Listing</a></li>
                </ul>
            </li> -->
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
<script src="<?php echo base_url()."assets"?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript">
    var url = window.location;
// for sidebar menu but not for treeview submenu
$('ul.sidebar-menu a').filter(function() {
    return this.href == url;
}).parent().siblings().removeClass('active').end().addClass('active');
// for treeview which is like a submenu
$('ul.treeview-menu a').filter(function() {
    return this.href == url;
}).parentsUntil(".sidebar-menu > .treeview-menu").siblings().removeClass('active menu-open').end().addClass('active menu-open');
</script>


