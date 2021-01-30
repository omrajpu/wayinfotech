 <section class="usr">
  <div class="">
	<?php //include ("sidemenu.php") ?>
  <?php $this->load->view('include/sidemenu'); ?>
	<div class="col-sm-9">
	<div class="user_data">
	<div class="ustitle text-uppercase">Add Category details</div>
  <div class="text-center" style="color:green; text-align: center;"><?php
  echo @$msg;
 ?></div><br>
 
<form method="post" name="add_property" enctype="multipart/form-data"  action="<?php echo base_url();?>addproperty" class="form-horizontal" role="form">
      <div class="form-group">

            <label class="col-lg-3 control-label">Category  Name :</label>
            <div class="col-lg-7">
              <input  required name="cat_name" value="<?php echo @$single_cat_data->cat_name;?>" class="form-control" type="text" value="">
              <input type="hidden" name="cat_id" value="<?php echo @$single_cat_data->id;?>">
            </div>
          </div>
         <div class="form-group">
            <label class="col-lg-3 control-label">Category  Description :</label>
            <div class="col-lg-7">
              <textarea required style="height:200px;" name="cat_desc" class="form-control"><?php echo @$single_cat_data->cat_desc;?></textarea> 
            </div>
          </div>
		 
          <div class="form-group">
        <?php
        if(@$single_cat_data->id){
          ?> 
        <div id="AudioWrapper5">
           <label class="col-lg-3 control-label">Category  logo:</label>
            <div class="col-lg-7">
            <input id="audio5"  class="boxdd"  type="file" name="update_photo" placeholder="">
            <img style="height:30px;width:30px;" src="<?php echo base_url();?>upload/cat_images/<?php echo @$single_cat_data->cat_image;?>"><br>
             </div>
             </div>
           <?php }else{?> 
            <div id="AudioWrapper5">
           <label class="col-lg-3 control-label">Category  logo :</label>
            <div class="col-lg-7">
              <input name="photo"  type="file">
            </div>
          </div>
          
         <?php }?>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-7">
              <input  name="update" type="submit" class="btn btn-primary sub" value="Save">
              
            </div>
          </div>
        </form>
<div class="clearfix"></div>
	</div>
	
	</div>
	
	
  </div>
  <div class="clearfix"></div>
  </section>
 