 script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/jquery.min.js"></script>
    <!-- Custom styling plus plugins -->
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    
    <script src="js/editor.js"></script>
    
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js">
    </script>
    <script type="text/javascript" class="init">
    

/* Custom filtering function which will search data in column four between two values */
$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = parseInt( $('#min').val(), 10 );
        var max = parseInt( $('#max').val(), 10 );
        var age = parseFloat( data[3] ) || 0; // use data for the age column

        if ( ( isNaN( min ) && isNaN( max ) ) ||
             ( isNaN( min ) && age <= max ) ||
             ( min <= age   && isNaN( max ) ) ||
             ( min <= age   && age <= max ) )
        {
            return true;
        }
        return false;
    }
);

$(document).ready(function() {
    var table = $('#example').DataTable();
     
    // Event listener to the two range filtering inputs to redraw on input
    $('#min, #max').keyup( function() {
        table.draw();
    } );
} );
</script>
 <section class="usr">
  <div class="">
	<?php //include ("sidemenu.php") ?>
  <?php $this->load->view('include/sidemenu'); ?>
	<div class="col-sm-9">
	<div class="user_data">
	<div class="ustitle text-uppercase">
 
  Sub Category List</div>
  <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>Sr.no</th>
        <th>Category Name</th>
        <th>Sub Category Name</th>
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
        <td><?php echo $val->sub_cat_name;?></td>
        <td><img style="width:80px;height:80px;"src="<?php echo base_url(); ?>upload/sub_cat_images/<?php echo $val->sub_cat_image;?>"></td>
        <td><?php echo substr($val->sub_cat_desc,0,50);?></td>
        <td><a href="<?php echo site_url();?>subcategory/<?php echo $val->subcat_id;?>/<?php echo $val->cat_id;?>"><img  style="height:50px;width:50px;"src="<?php echo site_url();?>/images/edit.png"></a>|<a href="#" onClick="return doconfirm('tbl_subcategory','subcat_id',<?php echo $val->subcat_id; ?>);"><img  style="height:50px;width:50px;"src="<?php echo site_url();?>/images/delete.png"></a></a></td>
      </tr>
      <?php  $i++; }?>
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
               window.location.href ="<?php echo base_url();?>"+'Property/sub_cat_list';
               }
        });

    }
}
</script>