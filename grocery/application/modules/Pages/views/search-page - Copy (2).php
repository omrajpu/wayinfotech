<script type="text/javascript">
  function add_to_cart(cnt){
          //alert("hi...");
         var p_ids=$("#p_id_"+cnt).val();
         var v_id=$("#v_id_"+cnt).val();
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
         var margin_price=$("#margin_price_"+cnt).val();
         var product_amu=$("#product_amu_"+cnt).val();
         var hsn_code=$("#hsn_code_"+cnt).val();
         $.ajax({
          url:"<?php echo base_url();?>"+'Cart/add',
          type:'POST',
          data:{hsn_code:hsn_code,p_id:p_id,p_qty:p_qty,p_name:p_name,p_price:p_price,p_image:p_image,p_weight:p_weight,mrp_price:mrp_price,gst_per:gst_per,gst_type:gst_type,discount:discount,margin_price:margin_price,product_amu:product_amu},
          success:function(result){
              $(".cart-value").html(result);
              $("#text_success").html('('+result+')');
              $("#add_cart_"+cnt).css("display", "none");
              $("#remove_cart_"+cnt).css("display", "block");
            }
         })
     }
       function add_to_cart_save(cnt){
          //alert("hi...");
         var p_ids=$("#p_id_"+cnt).val();
         var v_id=$("#save_v_id_"+cnt).val();
         var p_id=p_ids+'_'+v_id;
         var p_qty=$("#save_p_qty_"+cnt).val();
         var p_name=$("#save_p_name_"+cnt).val();
         var p_price=$("#save_p_price_"+cnt).val();
         var mrp_price=$("#save_mrp_price_"+cnt).val();
         var p_image=$("#save_p_image_"+cnt).val();
         var p_weight=$("#save_p_weight_"+cnt).val();
         var gst_per=$("#save_gst_per_"+cnt).val();
         var gst_type=$("#save_gst_type_"+cnt).val();
         var discount=$("#save_p_price_"+cnt).val();
         var margin_price=$("#save_margin_price_"+cnt).val();
         var product_amu=$("#save_product_amu_"+cnt).val();
         var hsn_code=$("#save_hsn_code_"+cnt).val();
         $.ajax({
          url:"<?php echo base_url();?>"+'Cart/add',
          type:'POST',
          data:{hsn_code:hsn_code,p_id:p_id,p_qty:p_qty,p_name:p_name,p_price:p_price,p_image:p_image,p_weight:p_weight,mrp_price:mrp_price,gst_per:gst_per,gst_type:gst_type,discount:discount,margin_price:margin_price,product_amu:product_amu},
          success:function(result){
              $(".cart-value").html(result);
              $("#text_success").html('('+result+')');
              $("#add_cart_save_"+cnt).css("display", "none");
              $("#remove_cart_save_"+cnt).css("display", "block");
            }
         })
     } 
 function remove_to_cart(cnt){
     var p_ids=$("#p_id_"+cnt).val();
     var v_id=$("#v_id_"+cnt).val();
     var p_id=p_ids+'_'+v_id;     
     $.ajax({
          url:"<?php echo base_url();?>"+'Cart/remove_to_cart',
          type:'POST',
          data:{p_id:p_id},
          success:function(result){
             //alert(result);
             //$("#add_cart").displ
             $(".cart-value").html(result);
             $("#text_success").html('('+result+')');
             $("#add_cart_"+cnt).css("display", "block");
             $("#remove_cart_"+cnt).css("display", "none");
            }
        })
  }
function remove_to_cart_save(cnt){
    var p_ids=$("#p_id_"+cnt).val();
    var v_id=$("#v_id_"+cnt).val();
    var p_id=p_ids+'_'+v_id; 
     $.ajax({
          url:"<?php echo base_url();?>"+'Cart/remove_to_cart',
          type:'POST',
          data:{p_id:p_id},
          success:function(result){
             //$("#add_cart").displ
              $(".cart-value").html(result);
              $("#text_success").html('('+result+')');
              $("#add_cart_save_"+cnt).css("display", "block");
              $("#remove_cart_save_"+cnt).css("display", "none");
              }
        })
  }

function get_variant(pid,vid){
          $.ajax({
                url:"<?php echo base_url();?>"+'Pages/get_variant_cat',
                type:"post",
                data:{pid:pid,vid:vid},
                success:function(res){
                   $("#res_data_"+pid).html(res);
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
                  <a href="#"><strong><span class="mdi mdi-home"></span> Home</strong></a> <span class="mdi mdi-chevron-right"></span> <a href="#">Shop</a>
               </div>
            </div>
         </div>
      </section>
      <section class="shop-list section-padding">
         <div class="container">
            <div class="row">
               <div class="col-md-3">
               <div class="shop-filters">
                 <div id="accordion">
                   <div class="card category-title">
                     <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                          <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                           Category
                          </button>
                        </h5>
                     </div>
                  
                   </div>
                  <?php
                   $cat_data=getcatname('category_details','id,category_name');
                      foreach ($cat_data as $key => $value) {
                           $sss=str_replace(' ', '', @$value->category_name);
                           $ss=str_replace('&', '', @$sss);
                        ?>
                     <div class="card">
                           <div class="card-header" id="headingThree">
                              <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsefour-<?php echo @$ss;?>" aria-expanded="false" aria-controls="collapsefour-1">
                                <?php echo @$value->category_name;?> <span class="mdi mdi-chevron-down float-right"></span>
                                </button>
                              </h5>
                           </div>
                           <div id="collapsefour-<?php echo @$ss;?>" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                              <div class="card-body">
                                <div class="list-group">
                                  <?php
                                  $cat_id=@$value->id;
                                  $scat_data=getsubcatname('sub_category_details','id,sub_category_name',$cat_id);
                                  foreach ($scat_data as $key => $value){  
                                  ?>
                                  <a href="<?php echo base_url();?>Pages/common_page/sub_id/<?php echo @$value->id;?>" class="list-group-item list-group-item-action"><?php echo @$value->sub_category_name;?></a>
                                <?php }?>
                                
                                </div>
                              </div>
                           </div>
                         </div>

                      <?php } ?>   
                      
                 </div>
               </div>
              
            </div>
               <div class="col-md-9">
                  <a href="#"><img class="img-fluid mb-3" src="<?php echo base_url();?>images/shop.jpg" alt=""></a>
                  <div class="shop-head">
                   
                  </div>
               <div class="row no-gutters">
                    <?php
               if(!empty($product_list)){
                //print_r($product_list);die;
               foreach($product_list as $key=>$product_lists){
                     $image=Get_Productgallery_detailss(@$product_lists->id,@$product_lists->attr_id);
                     $image_url=@$image[0]->image;
                     $price_mrp=@$image[0]->price_mrp;
                     $sp_price=@$image[0]->sp_price;
                     $margin_price=@$image[0]->margin_price;
                     $weight=@$image[0]->weight;
                    ?>
                  <div class="col-md-4" id="res_data_<?php echo @$product_lists->id;?>">
                        <div class="product">
                           <a href="<?php echo base_url();?>Pages/product_details/<?php echo @$product_lists->id; ?>">
                              <div class="product-header">
                                 <input type="hidden" id="p_id_<?php echo @$product_lists->id;?>" value="<?php echo @$product_lists->id;?>">
                      <input type="hidden" id="p_qty_<?php echo @$product_lists->id;?>" value="1">
                       <input type="hidden" id="p_name_<?php echo @$product_lists->id;?>" name="name" value="<?php echo @$product_lists->product_name;?>">
                        <input type="hidden" id="p_weight_<?php echo @$product_lists->id;?>" name="p_weight" value="<?php echo @$weight;?>">
                       <input type="hidden" id="p_price_<?php echo @$product_lists->id;?>" name="price" value="<?php echo @$sp_price;?>">
                        <input type="hidden" id="mrp_price_<?php echo @$product_lists->id;?>" name="mrp_price" value="<?php echo @$price_mrp;?>">
                        <input type="hidden" id="p_image_<?php echo @$product_lists->id;?>" name="image" value="<?php echo @$image_url; ?>">
                        <input type="hidden" id="gst_per_<?php echo @$product_lists->id;?>" name="gst_per" value="<?php echo @$product_lists->gst_per;; ?>">
                        <input type="hidden" id="gst_type_<?php echo @$product_lists->id;?>" name="gst_type" value="<?php echo @$product_lists->gst_type;; ?>">
                       <input type="hidden" id="margin_price_<?php echo @$product_lists->id;?>" name="margin_price" value="<?php echo @$margin_price; ?>">
                       <input type="hidden" id="product_amu_<?php echo @$product_lists->id;?>" name="product_amu" value="<?php echo @$product_lists->product_amu;?>">
                                 <span class="badge badge-success"><?php echo @$sp_price;?>% OFF</span>
                                 <img class="img-fluid" src="<?php echo site_url(); ?>admin/upload/product_images/<?php echo @$image_url; ?>" alt="">
                                 <span class="veg text-success mdi mdi-circle"></span>
                              </div>
                              <div class="product-body">
                                 <h5><?php echo @$product_lists->product_name;?></h5>
                                 </a>
                              <h6><strong><span class="mdi mdi-approval"></span> Available in</strong>
                                   <select id="available" name="available" onchange="get_variant(<?php echo @$product_lists->id?>,this.value)">
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
                              
                           
                           <div class="product-footer">
                           <button id="add_cart_<?php echo @$product_lists->id;?>" type="button" onclick="add_to_cart(<?php echo @$product_lists->id;?>);" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                           <button style="display: none" id="remove_cart_<?php echo @$product_lists->id;?>" type="button" onclick="remove_to_cart(<?php echo @$product_lists->id;?>);" class="btn btn-secondary btn-sm float-right remove-cart-btn"><i class="mdi mdi-cart-outline"></i> Delete Item</button>
                           <p class="offer-price mb-0">₹ <?php echo number_format(@$margin_price,2);?><i class="mdi mdi-tag-outline"></i><br><span class="regular-price">₹ <?php echo number_format(@$price_mrp,2);?></span></p>
                            <!-- <p class="offer-price mb-0">$<?php echo @$product_lists->price_mrp;?>$450.99 <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">$<?php echo @$product_lists->sp_price;?>$800.99</span></p> -->
                        </div>
                           
                        </div>
                     </div>
                      <?php }}?>
                   </div>
                
                  
                  <nav>
                     <ul class="pagination justify-content-center mt-4">
                        <li class="page-item disabled">
                           <span class="page-link">Previous</span>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active">
                           <span class="page-link">
                           2
                           <span class="sr-only">(current)</span>
                           </span>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                           <a class="page-link" href="#">Next</a>
                        </li>
                     </ul>
                  </nav>
               </div>
            </div>
         </div>
      </section>
   
      <!-- <section class="product-items-slider section-padding bg-white border-top">
         <div class="container">
            <div class="section-header">
               <h5 class="heading-design-h5">Top New Products <span class="badge badge-primary">20% OFF</span>
                  <?php
                 //print_r($cat_product_list);

                  ?>
                  <!-- <a class="float-right text-secondary" href="shop.html">View All</a> -->
               </h5>
            </div>
            <div class="owl-carousel owl-carousel-featured">
                <?php
               if(!empty($cat_product_list)){
                foreach($cat_product_list as $product_lists){
                  //print_r($product_lis);
                //  $image=Get_Productgallery_detailss(@$product_lists->id);
                //  $image_url=@$image[0]->image;
                //  $price_mrp=@$image[0]->price_mrp;
                //  $sp_price=@$image[0]->sp_price;
                 
                 $image=Get_Productgallery_detailss(@$product_lists->id,@$product_lists->attr_id);
                 $image_url=@$image[0]->image;
                 $price_mrp=@$image[0]->price_mrp;
                 $sp_price=@$image[0]->sp_price;
                 $weight=@$image[0]->weight;
                  $margin_price=@$image[0]->margin_price;
                 ?>
                <div class="item">
                  <div class="product">
                       <a href="<?php echo base_url();?>Pages/product_details/<?php echo @$product_lists->id; ?>">
                        <div class="product-header">
                           <span class="badge badge-success"><?php echo @$sp_price;?>% OFF</span>
                           <img class="img-fluid" src="<?php echo site_url(); ?>admin/upload/product_images/<?php echo @$image_url; ?>" alt="">
                           <span class="veg text-success mdi mdi-circle"></span>
                        </div>
                        </a>
                        <div class="product-body">
                           <h5><?php echo @$product_lists->product_name;?></h5>
                           <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> 
                            <select id="available" name="available" onchange="get_variant(<?php echo @$product_lists->id?>,this.value)">
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
                           <button id="add_cart_related_<?php echo @$product_lists->id;?>" type="button" onclick="add_to_cart_related(<?php echo @$product_lists->id;?>);" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                           <button style="display: none" id="remove_cart_related_<?php echo @$product_lists->id;?>" type="button" onclick="remove_to_cart_related(<?php echo @$product_lists->id;?>);" class="btn btn-secondary btn-sm float-right remove-cart-btn"><i class="mdi mdi-cart-outline"></i> Delete Item</button>
                           <p class="offer-price mb-0">₹ <?php echo number_format(@$margin_price,2);?><i class="mdi mdi-tag-outline"></i><br><span class="regular-price">₹ <?php echo number_format(@$price_mrp,2);?></span></p>
                            <!-- <p class="offer-price mb-0">$<?php echo @$product_lists->price_mrp;?>$450.99 <i class="mdi mdi-tag-outline"></i><br><span class="regular-price">$<?php echo @$product_lists->sp_price;?>$800.99</span></p> -->
                        </div>
                     <!--</a>-->
                  </div>
               </div>
              <?php } }?>
               
            </div>
         </div>
      </section> -->
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

    