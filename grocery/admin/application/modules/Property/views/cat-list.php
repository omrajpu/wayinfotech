 <section class="usr">
  <div class="">
	<?php //include ("sidemenu.php") ?>
  <?php $this->load->view('include/sidemenu'); ?>
	<div class="col-sm-9">
	<div class="user_data">
	<div class="ustitle text-uppercase">
 
  Category List</div>
  <table class="table">
    <thead>
      <tr>
        <th>Sr.no</th>
        <th>Category  Name</th>
        <th>Photo</th>
        <th>Description</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
     //print_r($cat_data);
    $i=1;
    foreach ($cat_data as $val) {
      # code...
    
    ?>
      <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $val->cat_name;?></td>
        <td><img style="width:80px;height:80px;"src="<?php echo base_url(); ?>upload/cat_images/<?php echo $val->cat_image;?>"></td>
        <td><?php echo substr($val->cat_desc,0,50);?></td>
        <td><a href="<?php echo site_url();?>category/<?php echo @$val->id;?>"><img  style="height:50px;width:50px;"src="<?php echo site_url();?>/images/edit.png"></a>|<a href="#" onClick="return doconfirm('tbl_category','id',<?php echo $val->id; ?>);"><img  style="height:50px;width:50px;"src="<?php echo site_url();?>/images/delete.png"></a></a></td>
       </tr>
      <?php  $i++;  }?>
    </tbody>
  </table>
<div class="clearfix"></div>
	</div>
	
	</div>
	
	
  </div>
  <div class="clearfix"></div>
  </section>
 <script>
function doconfirm(tab_name,col_name,cond_val)
{

    job=confirm("Are you sure to delete permanently?");
    if(job==true)
     {
        $.ajax({
          
               url:"<?php echo base_url();?>"+'Property/delete_cat_data',
               type:"POST",
               data:{tab_name:tab_name,col_name:col_name,cond_val:cond_val},
               success:function(res){
               window.location.href ="<?php echo base_url();?>"+'catlist';
               }
        });

    }
}
</script>