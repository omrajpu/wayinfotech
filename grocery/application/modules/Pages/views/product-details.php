<script type="text/javascript">
 function add_to_cart_save(cnt){
          //alert("hi...");
         var p_ids=$("#p_id_"+cnt).val();
         var v_id=$("#save_v_id_"+cnt).val();
         //alert(v_id);
         var p_id=p_ids+'_'+v_id;
         var p_qty=$("#p_qty_"+cnt).val();
         var p_name=$("#p_name_"+cnt).val();
         var p_price=$("#p_price_"+cnt).val();
         var mrp_price=$("#mrp_price_"+cnt).val();
         var p_image=$("#p_image_"+cnt).val();
         var p_weight=$("#p_weight_"+cnt).val();
         var gst_per=$("#gst_per_"+cnt).val();
         var gst_type=$("#gst_type_"+cnt).val();
         var discount=$("#p_price_"+cnt).val();
         var product_amu=$("#product_amu_"+cnt).val();
          var hsn_code=$("#hsn_code_"+cnt).val();
            var margin_price=$("#margin_price_"+cnt).val();
         $.ajax({
          url:"<?php echo base_url();?>"+'Cart/add',
          type:'POST',
          data:{p_id:p_id,p_qty:p_qty,p_name:p_name,p_price:p_price,p_image:p_image,p_weight:p_weight,mrp_price:mrp_price,gst_type:gst_type,discount:discount,product_amu:product_amu,hsn_code:hsn_code,margin_price:margin_price},
          success:function(result){
              $("#add_cart_save_detail_"+cnt).css("display", "none");
              $("#remove_cart_save_"+cnt).css("display", "block");
              $(".a-c-qty-drop_save_"+cnt).css("display", "flex");
              $(".a-c-qty-drop_save_"+cnt).html(result);
              $itemcnt=get_item_count();
            }
         })
     } 
   function  get_item_count(){
          $.ajax({
          url:"<?php echo base_url();?>"+'Cart/get_item_count',
          type:'POST',
          data:{},
          success:function(result){
             $(".cart-value").html(result);
             }
         })

      }  
  function remove_to_cart_save(cnt){
    var p_id=$("#p_id_"+cnt).val();
     $.ajax({
          url:"<?php echo base_url();?>"+'Cart/remove_to_cart',
          type:'POST',
          data:{p_id:p_id},
          success:function(result){
             //$("#add_cart").displ
             $(".cart-value").html(result);
             $("#text_success").html('('+result+')');
             $("#add_cart_save_detail_"+cnt).css("display", "inline-block");
             $("#remove_cart_save_detail_"+cnt).css("display", "none");

            }
        })
  }
  function add_to_cart_related(cnt){
          //alert("hi...");
         var p_ids=$("#p_id_"+cnt).val();
         var v_id=$("#related_v_id_"+cnt).val();
         var p_id=p_ids+'_'+v_id;
         var p_qty=$("#p_qty_"+cnt).val();
         var p_name=$("#p_name_"+cnt).val();
         var p_price=$("#p_price_"+cnt).val();
         var mrp_price=$("#mrp_price_"+cnt).val();
         var p_image=$("#p_image_"+cnt).val();
         var p_weight=$("#p_weight_"+cnt).val();
         var gst_per=$("#gst_per_"+cnt).val();
         var gst_type=$("#gst_type_"+cnt).val();
         var discount=$("#p_price_"+cnt).val();
         var product_amu=$("#product_amu_"+cnt).val();
          var hsn_code=$("#hsn_code_"+cnt).val();
            var margin_price=$("#margin_price_"+cnt).val();
         $.ajax({
          url:"<?php echo base_url();?>"+'Cart/add',
          type:'POST',
          data:{p_id:p_id,p_qty:p_qty,p_name:p_name,p_price:p_price,p_image:p_image,p_weight:p_weight,mrp_price:mrp_price,gst_type:gst_type,discount:discount,product_amu:product_amu,hsn_code:hsn_code,margin_price:margin_price},
          success:function(result){
              $("#add_cart_save_"+cnt).css("display", "none");
              $("#remove_cart_save_"+cnt).css("display", "block");
              $(".a-c-qty-drop_save_"+cnt).css("display", "flex");
              $(".a-c-qty-drop_save_"+cnt).html(result);
            }
         })
     }
  function remove_to_cart_related(cnt){
    var p_id=$("#p_id_"+cnt).val();
    //alert(p_id);
     $.ajax({
          url:"<?php echo base_url();?>"+'Cart/remove_to_cart',
          type:'POST',
          data:{p_id:p_id},
          success:function(result){
             //$("#add_cart").displ
             $(".cart-value").html(result);
             $("#text_success").html('('+result+')');
             $("#add_cart_related_"+cnt).css("display", "inline-block");
             $("#remove_cart_related_"+cnt).css("display", "none");

            }
        })
  }
 function get_variant(pid,vid){
          $.ajax({
                url:"<?php echo base_url();?>"+'Pages/get_variant',
                type:"post",
                data:{pid:pid,vid:vid},
                success:function(res){
                  //alert(res);
                   $("#details_data_"+pid).html(res);
                }
            });
    }
  function savers_get_variant(pid,vid){
       $.ajax({
                
                url:"<?php echo base_url();?>"+'Pages/savers_get_variant',
                type:"post",
                data:{pid:pid,vid:vid},
                success:function(res){
                   $("#savers_res_data_"+pid).html(res);
                }
        });
    }      
 </script>

   <section class="pt-3 pb-3 page-info section-padding border-bottom bg-white">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <a href="#"><strong><span class="mdi mdi-home"></span> Home</strong></a> <span class="mdi mdi-chevron-right"></span> <a href="#">Fruits & Vegetables</a> <span class="mdi mdi-chevron-right"></span> <a href="#">Fruits</a>
               </div>
            </div>
         </div>
      </section>
      <?php
        $pid=$this->uri->segment(3);
        ?>
      <section class="shop-single section-padding pt-3">
         <div class="container">
            <div class="row" id="details_data_<?php echo @$pid;?>">
               <div class="col-md-6">
                  <div class="shop-detail-left">
                     <div class="preview shop-detail-slider">
                        <div class="preview-pic tab-content">
                            <?php
                            $att_id=$this->uri->segment(4);
                             if(!empty($product_list)){
                             foreach($product_list as $key=>$product_lists){
                             $image=Get_Productgallery_detailss(@$product_lists->id,$att_id);
                             $i=1;
                            foreach ($image as $key => $image){
                             $image_url=@$image->image;
                             $price_mrp=@$image->price_mrp;
                             $sp_price=@$image->sp_price;
                             $margin_price=@$image->margin_price;
                             ?>
                           <div class="tab-pane <?php if($i==1){ echo'active';}?>" id="pic-<?php echo $i;?>"><img src="<?php echo site_url(); ?>admin/upload/product_images/<?php echo @$image_url; ?>" /></div>
                          <?php $i++;} }}?>
                           </div>
                         <ul class="preview-thumbnail nav nav-tabs">
                           <?php
                             if(!empty($product_list)){
                            foreach($product_list as $key=>$product_lists){
                               //print_r($product_lists);die;
                             $image=Get_Productgallery_detailss(@$product_lists->id,$att_id);
                             $i=1;
                             foreach ($image as $key => $image) {
                              
                             $image_url=@$image->image;
                             $price_mrp=@$image->price_mrp;
                             $sp_price=@$image->sp_price;
                             $weight=@$image->weight;
                             $margin_price=@$image->margin_price;
                             //$margin_price=@$image->margin_price;
                             ?>
                         <input type="hidden" id="p_id_<?php echo @$product_lists->id;?>" value="<?php echo @$product_lists->id;?>">
                         <input type="hidden" id="save_v_id_<?php echo @$product_lists->id;?>" value="<?php echo@$image->id;?>">
                         <input type="hidden" id="p_qty_<?php echo @$product_lists->id;?>" value="1">
                         <input type="hidden" id="p_name_<?php echo @$product_lists->id;?>" name="name" value="<?php echo @$product_lists->product_name;?>">
                         <input type="hidden" id="p_weight_<?php echo @$product_lists->id;?>" name="p_weight" value="<?php echo @$weight;?>">
                         <input type="hidden" id="p_price_<?php echo @$product_lists->id;?>" name="price" value="<?php echo @$sp_price;?>">
                         <input type="hidden" id="mrp_price_<?php echo @$product_lists->id;?>" name="mrp_price" value="<?php echo @$price_mrp;?>">
                         <input type="hidden" id="p_image_<?php echo @$product_lists->id;?>" name="image" value="<?php echo @$image_url; ?>">
                         <input type="hidden" id="gst_per_<?php echo @$product_lists->id;?>" name="gst_per" value="<?php echo @$product_lists->gst_per;; ?>">
                        <input type="hidden" id="gst_type_<?php echo @$product_lists->id;?>" name="gst_type" value="<?php echo @$product_lists->gst_type;; ?>">
                        <input type="hidden" id="product_amu_<?php echo @$product_lists->id;?>" name="product_amu" value="<?php echo @$product_lists->product_amu;?>">
                       <input type="hidden" id="hsn_code_<?php echo @$product_lists->id;?>" name="hsn_code" value="<?php echo @$product_lists->hsn_code;?>">
                        <input type="hidden" id="margin_price_<?php echo @$product_lists->id;?>" name="margin_price" value="<?php echo @$margin_price; ?>">
                         <li class="active"><a data-target="#pic-<?php echo $i;?>" data-toggle="tab"><img src="<?php echo site_url(); ?>admin/upload/product_images/<?php echo @$image_url; ?>" /></a></li>
                        <?php $i++;}} }?>
                         </ul>
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="shop-detail-right">
                     <span class="badge badge-success"><?php echo @$sp_price;?>% OFF</span>
                     <h2><?php echo @$product_lists->product_name;?></h2>
                     <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> 
                       <select style="width: 200px;" class="custom-select" id="available" name="available" onchange="get_variant(<?php echo @$product_lists->id?>,this.value)">
                            <?php
                              $product_variant=get_variant(@$product_lists->id);
                              if(is_array($product_variant) && count($product_variant)){
                                   foreach ($product_variant as $value) {
                                  ?>
                              <option value="<?php echo @$value->id;?>"><?php  echo @$value->weight;?> <?php echo @$product_lists->product_amu; ?> - Rs <?php  echo number_format(@$value->margin_price,2);?></option>
                             <?php } }?>
                            </select>
                       <?php //echo @$weight;?> <?php //echo @$product_lists->product_amu;?></h6>
                     <p class="regular-price"><i class="mdi mdi-tag-outline"></i> MRP : ₹ <?php  echo number_format(@$price_mrp,2);?></p>
                     <p class="offer-price mb-0">Discounted price : <span class="text-success">₹ <?php
                                   echo number_format(@$margin_price,2);
                                 ?></span></p>

                                
                    <!--  <button  id="add_cart_save_detail_<?php echo @$product_lists->id;?>" onclick="add_to_cart_save(<?php echo @$product_lists->id;?>);" type="button" class="btn btn-secondary btn-lg"><i class="mdi mdi-cart-outline"></i> Add To Cart</button> 
                     <button   style="display: none" id="remove_cart_save_detail_<?php echo @$product_lists->id;?>"  onclick="remove_to_cart_save(<?php echo @$product_lists->id;?>);" type="button" class="btn btn-secondary btn-lg remove-cart-btn"><i class="mdi mdi-cart-outline"></i> Delete Item</button> --> 
                     
                  <div class="product-footer prod-i-c-btns">
                          <?php  
                          $product_variant=get_variant(@$product_lists->id);
                          //echo'<pre>';print_r($product_variant);
                          $vid=$product_variant[0]->id;
                          $item=get_cart_product(@$product_lists->id,$vid);
                             //echo'<pre>';print_r($item);die;
                          $cart_product_data= @$item['id'];
                          $item_id= "'".@$item['id']."'";
                          $rowid="'".@$item['rowid']."'";
                          if($item['qty']){
                            $qty=$item['qty'];
                          }else{
                             $qty=1;
                          }
                         //cart_product_data
                            ?>
                           <button <?php if($cart_product_data){ echo 'style="display: none;"';} else{ echo 'style="display: block;"';} ?> id="add_cart_save_detail_<?php echo @$product_lists->id;?>" type="button" onclick="add_to_cart_save(<?php echo @$product_lists->id;?>);" class="btn btn-secondary btn-sm float-right add-cat-qty"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                          <div <?php if($cart_product_data){ echo 'style="display: flex;"';} else{ echo 'style="display: none;"';} ?> class="input-group s-c-qty a-c-qty-drop_save_<?php echo @$product_lists->id;?>">
                            <span class="input-group-btn"><button onclick="decrement_quantity(<?php echo @$item_id;?>,<?php echo @$rowid;?>,<?php echo @$item['margin_price'];?>,<?php echo @$item['qty'];?>)" class="btn btn-theme-round btn-number" type="button">-</button></span>

                            <input readonly="" class="form-control border-form-control form-control-sm input-number" type="text" id="fcart_<?php echo @$item['id'];?>" name="cart[<?php echo @$item['id'];?>]" value="<?php echo @$qty; ?>">
                                       <span class="input-group-btn">
                            <button onclick="increment_val(<?php echo @$item_id;?>,<?php echo @$rowid;?>,<?php echo @$item['margin_price'];?>,<?php echo @$item['qty'];?>)" class="btn btn-theme-round btn-number" type="button">+</button>
                                       </span>
                                       
                           </div>
                         </div>



                        <?php echo @$product_lists->description;?>
                      
                     </div>
                     <h6 class="mb-3 mt-4">Why shop from Groci?</h6>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="feature-box">
                              <i class="mdi mdi-truck-fast"></i>
                              <h6 class="text-info">Free Delivery</h6>
                              <p>Lorem ipsum dolor...</p>
                           </div>
                        </div>
                        <div class="col-md-6">
                           <div class="feature-box">
                              <i class="mdi mdi-basket"></i>
                              <h6 class="text-info">100% Guarantee</h6>
                              <p>Rorem Ipsum Dolor sit...</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="product-items-slider section-padding bg-white border-top">
         <div class="container">
            <div class="section-header">
               <h5 class="heading-design-h5">Related Products 
                  <?php
                // print_r($cat_product_list);

                  ?>
                  <!-- <a class="float-right text-secondary" href="shop.html">View All</a> -->
               </h5>
            </div>
            <div class="owl-carousel owl-carousel-featured">
                <?php
               
               if(!empty($cat_product_list)){
                foreach($cat_product_list as $product_lists){
                  //print_r($product_lis);
                 $image=Get_Productgallery_detailss(@$product_lists->id,@$product_lists->attr_id);
                 $image_url=@$image[0]->image;
                 $price_mrp=@$image[0]->price_mrp;
                 $sp_price=@$image[0]->sp_price;
                 $margin_price=@$image[0]->margin_price;
                 $weight=@$image[0]->weight;
                 
                    
                 ?>
               <div class="item">
                 <div class="item" id="savers_res_data_<?php echo @$product_lists->id;?>">
                  <div class="product">
                       <a href="<?php echo base_url();?>Pages/product_details/<?php echo @$product_lists->id; ?>/<?php echo @$product_lists->attr_id;?>">
                        <div class="product-header">
                           <span class="badge badge-success"><?php echo @$sp_price;?>% OFF</span>
                           <img class="img-fluid" src="<?php echo site_url(); ?>admin/upload/product_images/<?php echo @$image_url; ?>" alt="">
                           <span class="veg text-success mdi mdi-circle"></span>
                        </div>
                        </a>
                        <div class="product-body">
                           <h5><?php echo @$product_lists->product_name;?></h5>
                           <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> 
                            <select  class="custom-select" id="available" name="available" onchange="savers_get_variant(<?php echo @$product_lists->id?>,this.value)">
                            <?php
                              $product_variant=get_variant(@$product_lists->id);
                              if(is_array($product_variant) && count($product_variant)){
                                   foreach ($product_variant as $value) {
                                  ?>
                              <option value="<?php echo @$value->id;?>"><?php  echo @$value->weight;?> <?php echo @$product_lists->product_amu; ?> - Rs <?php  echo number_format(@$value->margin_price,2);?></option>
                             <?php } }?>
                            </select> 
                            <?php //echo @$weight;?> <?php //echo @$product_lists->product_amu;?></h6>
                        </div>
                        <input type="hidden" id="p_id_<?php echo @$product_lists->id;?>" value="<?php echo @$product_lists->id;?>">
                         <input type="hidden" id="related_v_id_<?php echo @$product_lists->id;?>" value="<?php echo@$image[0]->id;?>">
                         <input type="hidden" id="p_qty_<?php echo @$product_lists->id;?>" value="1">
                         <input type="hidden" id="p_name_<?php echo @$product_lists->id;?>" name="name" value="<?php echo @$product_lists->product_name;?>">
                         <input type="hidden" id="p_weight_<?php echo @$product_lists->id;?>" name="p_weight" value="<?php echo @$weight;?>">
                         <input type="hidden" id="p_price_<?php echo @$product_lists->id;?>" name="price" value="<?php echo @$sp_price;?>">
                         <input type="hidden" id="mrp_price_<?php echo @$product_lists->id;?>" name="mrp_price" value="<?php echo @$price_mrp;?>">
                         <input type="hidden" id="p_image_<?php echo @$product_lists->id;?>" name="image" value="<?php echo @$image_url; ?>">
                         <input type="hidden" id="gst_per_<?php echo @$product_lists->id;?>" name="gst_per" value="<?php echo @$product_lists->gst_per;; ?>">
                        <input type="hidden" id="gst_type_<?php echo @$product_lists->id;?>" name="gst_type" value="<?php echo @$product_lists->gst_type;; ?>">
                        <input type="hidden" id="product_amu_<?php echo @$product_lists->id;?>" name="product_amu" value="<?php echo @$product_lists->product_amu;?>">
                       <input type="hidden" id="hsn_code_<?php echo @$product_lists->id;?>" name="hsn_code" value="<?php echo @$product_lists->hsn_code;?>">
                        <input type="hidden" id="margin_price_<?php echo @$product_lists->id;?>" name="margin_price" value="<?php echo @$margin_price; ?>">
                       
                        <div class="product-footer">
                          <?php  
                          $product_variant=get_variant(@$product_lists->id);
                          //echo'<pre>';print_r($product_variant);
                          $vid=$product_variant[0]->id;
                          $item=get_cart_product(@$product_lists->id,$vid);
                             //echo'<pre>';print_r($item);
                          $cart_product_data= @$item['id'];
                          $item_id= "'".@$item['id']."'";
                          $rowid="'".@$item['rowid']."'";
                          if($item['qty']){
                            $qty=$item['qty'];
                          }else{
                             $qty=1;
                          }
                         //cart_product_data
                            ?>
                           <button <?php if($cart_product_data){ echo 'style="display: none;"';} else{ echo 'style="display: block;"';} ?> id="add_cart_save_<?php echo @$product_lists->id;?>" type="button" onclick="add_to_cart_related(<?php echo @$product_lists->id;?>);" class="btn btn-secondary btn-sm float-right add-cat-qty"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                           <div <?php if($cart_product_data){ echo 'style="display: flex;"';} else{ echo 'style="display: none;"';} ?> class="input-group s-c-qty a-c-qty-drop_save_<?php echo @$product_lists->id;?>">
                            <span class="input-group-btn"><button onclick="decrement_quantity(<?php echo @$item_id;?>,<?php echo @$rowid;?>,<?php echo @$item['margin_price'];?>,<?php echo @$item['qty'];?>)" class="btn btn-theme-round btn-number" type="button">-</button></span>

                            <input readonly="" class="form-control border-form-control form-control-sm input-number" type="text" id="fcart_<?php echo @$item['id'];?>" name="cart[<?php echo @$item['id'];?>]" value="<?php echo @$qty; ?>">
                                       <span class="input-group-btn">
                            <button onclick="increment_val(<?php echo @$item_id;?>,<?php echo @$rowid;?>,<?php echo @$item['margin_price'];?>,<?php echo @$item['qty'];?>)" class="btn btn-theme-round btn-number" type="button">+</button>
                                       </span>
                                       
                           </div>
                          <!--  <button id="add_cart_related_<?php echo @$product_lists->id;?>" type="button" onclick="add_to_cart_related(<?php echo @$product_lists->id;?>);" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i> Add To Cart</button> -->
                          
                           <p class="offer-price mb-0">₹ <?php echo number_format(@$margin_price,2);?><i class="mdi mdi-tag-outline"></i><br><span class="regular-price">₹ <?php echo number_format(@$price_mrp,2);?></span></p>
                            <!-- <p class="offer-price mb-0">$<?php echo @$product_lists->price_mrp;?>$450.99 <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">$<?php echo @$product_lists->sp_price;?>$800.99</span></p> -->
                        </div>
                    
                  </div>
                </div>
               </div>
              <?php } }?>
           
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
