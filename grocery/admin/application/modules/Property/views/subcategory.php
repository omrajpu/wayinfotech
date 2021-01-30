 <section class="usr">
  <div class="">
	<?php //include ("sidemenu.php") ?>
  <?php $this->load->view('include/sidemenu'); ?>
	<div class="col-sm-9">
	<div class="user_data">
	<div class="ustitle text-uppercase">
  <script type="text/javascript">
  function get_cat_id(cat_id){
    //alert(cat_id);
    if(cat_id==9){
      $("#sub_cat_div").hide();
    }else{
       $("#sub_cat_div").show();
    }

  }  

  </script>  
 
  Add sub Category details</div>
  <div class="text-center" style="color:green; text-align: center;"><?php
  echo @$msg;
 ?></div><br>
 <?php
  //print_r($product_single_data);
  $subcat_array = array();
  //$subcat_array[]= $this->uri->segment(2);
  $cat_array[]= $this->uri->segment(3);
 // print_r($sub_cat_data);
  ?>
	 <form method="post" name="add_property" enctype="multipart/form-data"  action="<?php echo base_url();?>Property/add_subcat" class="form-horizontal" role="form">
    <input type="hidden" name="sub_cat_id" value="<?php echo @$sub_cat_data->subcat_id;?>">
     <div class="form-group">
           <label class="col-lg-3 control-label">Category Name:</label>
            <div class="col-lg-7">
            <select onchange="get_cat_id(this.value)" required="" name="cat_id" class="form-control" id="cat_id">
              <option value="">--Select Category--</option>
             <?php
             foreach ($cat_data as $value) {
             ?>
            <option value="<?php echo @$value->id;?>"<?php if(in_array($value->id,$cat_array)){echo 'selected="selected"';}?>><?php echo $value->cat_name;?></option>
            <?php }?>
           </select>
            </div>
          </div>
        <div class="form-group" id="sub_cat_div">
           <label class="col-lg-3 control-label">Sub Category Name :</label>
            <div class="col-lg-7">
              <input required="" name="sub_cat_name" class="form-control" type="text" value="<?php echo @$sub_cat_data->sub_cat_name;?>">
            </div>
          </div>
        

         <div class="form-group">
            <label class="col-lg-3 control-label">Sub Category Description :</label>
            <div class="col-lg-7">
              <textarea style="height:100px;" name="sub_cat_desc" class="form-control"><?php echo @$sub_cat_data->sub_cat_desc;?></textarea> 
            </div>
          </div>
		 
         <?php
        if(@$sub_cat_data->subcat_id){ 
          ?> 
        <div id="AudioWrapper5">
           <label class="col-lg-3 control-label">Sub Category  logo:</label>
            <div class="col-lg-7">
            <input id="audio5"  class="boxdd"  type="file" name="update_photo" placeholder="">
            <img style="height:30px;width:30px;" src="<?php echo base_url();?>upload/sub_cat_images/<?php echo @$sub_cat_data->sub_cat_image;?>"><br>
             </div>
             </div>
           <?php }else{?> 
            <div id="AudioWrapper5">
           <label class="col-lg-3 control-label">Sub Category  logo :</label>
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
 