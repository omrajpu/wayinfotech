<!--header-->
		<?php
               // require_once 'header.php';

$this->load->view('include/header');
                ?>
			<!--header-->
<!-- checkout -->
<div class="content">
<div class="cart-items">
	<div class="container">
            <h2>3. Confirm Orded</h2>
			<form class="checkout_form clearfix" action="<?php echo base_url()?>Checkout/step_4" method="post"> 
                    <?php $i = 1; ?>
                <?php
                if(!empty($this->cart->contents()))
                {
                            $total = 0;
                            foreach ($this->cart->contents() as $item){
                            echo form_hidden('rowid[]', $item['rowid']);
                                    $total = $total + (($item['qty']) * ($item['price']));
                                ?>
			 <div class="cart-header">
                              
				 <div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc">
                                                    <img  style="height:100px;width:100px;" src="<?=base_url();?>admin/upload/product_images/<?=$item['image']?>" style="width: 100%; height: 300px; cursor: pointer;" alt="">
						</div>
					   <div class="cart-item-info">
                                               <h3><a style="text-transform: capitalize; cursor: pointer;"><?php echo $item['name']; ?></a></h3>
                                               <br>
						<ul class="qty">
							<li><p>Qty: <span><?php echo $item['qty'] ; ?></span></p></li>
							<li><p>FREE delivery</p></li>
                         </ul>
							 <div class="delivery">
                                <p style="color: #333333;">Rs. <?php echo number_format($item['price'], 2); ?> </p>
							 <span  style="color: #333333;">Rs. <?php echo ($item['qty']) * ($item['price']); ?></span>
							 <div class="clearfix"></div>
				        </div>	
					   </div>
					   <div class="clearfix"></div>
											
				  </div>
			 </div>
                         
                 <hr class="style-one">       
                    <?php } 
                    ?>
                         <div class="col-md-12" >
                            <div class="col-md-8" style="text-align: right;">
                                <!--Sub Total--> 
                            </div>   
                            <div class="col-md-2" style="text-align: left;">
                                <b>Sub Total:</b>
                            </div>   
                            <div class="col-md-2" style="text-align: right;">
                                Rs. <?php echo $total;?>
                            </div>   
                         </div>
                         <div class="col-md-12">
                             <div class="col-md-8" style="text-align: right;">
                                <!--Sub Total--> 
                            </div>   
                            <div class="col-md-2" style="text-align: left;">
                                <b>Total:</b>
                            </div>   
                            <div class="col-md-2" style="text-align: right;">
                                Rs. <?php echo $total;?>
                            </div>   
                         </div>
                         <br>
                         <br>
                         <br>
                         <div class="col-md-12" style="text-align: right;">
                         <input style="background: #333333; color: #ffffff;" class="btn btn-danger my-cart-btn my-cart-b" type="submit" name="confirm" value="Confirm">
                         </div>
                        </form>
                               
                 <?php }?>
                 </div>
		 </div>
<!-- checkout -->	

</div>
 	<!--footer-->
		