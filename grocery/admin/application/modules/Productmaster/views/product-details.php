 <section class="usr">
  <div class="">
	<?php //include ("sidemenu.php") ?>
  <?php $this->load->view('include/sidemenu'); ?>
	<div class="col-sm-9">
	<div class="user_data">
	<div class="ustitle text-uppercase">
 
  Product Details View</div>
  <table class="table">
    <thead>
      <tr>
       <!--  <th>Sr.no</th> -->
       <th>Categoery name</th>
       <th>Product SKU</th>
        <th>Product name</th>
        <th>Product price</th>
        <th>Product qty</th>
        <th>Page number</th>
        <th>Size</th>
        <th>Type</th>
        <th>Product image</th>
       </tr>
    </thead>
    <tbody>
    <?php
     //echo'<pre>';print_r($product_details);die;
    $i=1;
    $total=0;
    foreach ($product_details as $val) {
      # code...
      $total = $total + $val->p_price;
     ?>
      <tr>
        <td><?php echo @$val->cat_name;?></td>
        <td><?php echo @$val->sku_id;?></td>
        <td><?php echo @$val->product_name;?></td>
        <td>INR <?php echo number_format($val->p_price,2);?></td>
        <td><?php echo @$val->product_qty;?></td>
        <td><?php echo @$val->page_number;?></td>
         <td><?php echo @$val->size;?></td>
         <td><?php echo @$val->p_type;?></td>
        <?php 
        if(@$val->p_type=='Slim'){?>
       <td><?php
       if(@$val->custom_image!=''){
            ?>
         <img class="quicklook" id="" style="width: 70px;" src="<?=base_url();?>upload/custom_product_images/<?php echo @$val->custom_image;?>" alt="">
       <?php }else{?> 
        <img class="quicklook" id="" style="width: 100px;" src="<?=base_url();?>upload/product_images/general/<?php echo @$val->p_image;?>" alt="">
        <?php } ?>
     </td>

      <?php } else{?>
      <td>
        
         <?php
       if(@$val->custom_image!=''){
            ?>
         <img class="quicklook" id="" style="width: 70px;" src="<?=base_url();?>upload/custom_product_images/<?php echo @$val->custom_image;?>" alt="">
       <?php }else{?> 
        <img class="quicklook" id="" style="width: 100px;" src="<?=base_url();?>upload/product_images/spiral_images/<?php echo @$val->p_image;?>" alt="">
        <?php } ?>


      </td>
      <?php }?>
       </tr>
      <?php $i++;}?>

    </tbody>

  </table>
 <span>Total price <b>INR <?php echo number_format(@$total,2);?></b></span>
<div class="clearfix"></div>
	</div>
	
	</div>
	
	
  </div>
  <div class="clearfix"></div>
  </section>
 