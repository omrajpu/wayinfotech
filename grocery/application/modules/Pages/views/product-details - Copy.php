


         <div itemscope='' itemtype='http://schema.org/ImageObject' style='display: none;'>
            <h2 itemprop='name'>Fancy Fawn Patterned Indo-Western Set</h2>
            <img alt='Fancy Fawn Patterned Indo-Western Set' src='images.manyavar.com/product_images/18212/qty_30/Manyavar_Ranveer_singh_853x12802730.html?1570983028'>
            <meta content='2019-12-13' itemprop='datePublished'>
            Oct 23, 2019</meta>
            <span itemprop='description'>&lt;p&gt;Reflect your personal style with Fancy Fawn patterned Indo-Western Set from the house of Manyavar! Color, Material and Work - The fancy Fawn patterned Indo-Western Set is made from jacquard material, and has a classic neckline with an embroidered mandarin collar. The indo-western set has small motifs all over the kurta, and the buttons in the button panel are in the tone of silver colour. The regal ensemble includes one indo-western kurta jacket, one beige lowers and one pocket square. The lowers are in a patiala style, which suits the indo-western kurta jacket. &lt;/p&gt;</span>
         </div>
         <main class='product-detail-wrapper' id='main-wrapper'>
            <section class='bread-cum-heading'>
               <div class='container'>
                  <ul class='bread-cum'>
                     <!-- <li>
                        <a href='index.html'>Home</a>
                     </li>
                     <li>
                        <a href='men.html'>Men</a>
                     </li>
                     <li>
                        <a href='men/indo-western.html'>INDO - WESTERN</a>
                     </li>
                     <li>Fancy Fawn Patterned Indo-Western Set</li> -->
                  </ul>
               </div>
            </section><br>
            <?php
          //echo'<pre>';print_r($products_data);
            ?>
            <section class='product-detail-section'>
                <div class='container'>
                   <div class='product-detail-img-box'>
                      <div class='product-img-box'>
                         <div class='product-big-img fix-img-box'>
                            <div class='prod-dlt-slider' data-slider-id='1'>
                              <?php
                              foreach ($products_data as $key => $value) {?>
                               <div>
                                  <img alt='' class='big-img' data-zoom-image='<?php echo base_url();?>admin/upload/product_images/<?php echo @$value['image'];?>' id='img_01' src='<?php echo base_url();?>admin/upload/product_images/<?php echo @$value['image'];?>'>
                               </div>
                              <?php }?> 
                              
                            </div>
                         </div>
                         <div class='product-thumb-box' id='gal1'>
                            <div class='owl-thumbs' data-slider-id='1'>
                               <?php
                              foreach ($products_data as $key => $value) {?>
                               <a data-image='<?php echo base_url();?>admin/upload/product_images/<?php echo @$value['image'];?>' data-zoom-image='<?php echo base_url();?>admin/upload/product_images/<?php echo @$value['image'];?>' href='#'>
                               <img style="padding: 1px" alt='' class='thumb-img' id='img_01' src='<?php echo base_url();?>admin/upload/product_images/<?php echo @$value['image'];?>'>
                               </a>
                             <?php }?>
                              
                            </div>
                         </div>
                         <div class='clear'></div>
                         <div class='detail-social-box'>
                            <label>Share :</label>
                            <a class='fa fa-facebook' href="##" title="facebook"></a>
                            <a class='fa fa-twitter' href="##" title='Twitter'></a>
                            <a class='fa fa-whatsapp' href='##' title="Whatsapp"></a>
                         </div>
                      </div>
                   </div>
                  <div class='product-details'>
                     <div class='detail-top-box'>
                        <div class='product-header'>
                           <div class='product-dlt-box'>
                              <h1 class='product-name'><?php echo @$products_data[0]['product_name'];?></h1>
                              <p class='product-code'>
                                 <span>SKU :</span>
                                 <span class='code-no'><?php echo @$products_data[0]['sku'];?></span>
                              </p>
                              <div class='product-price'>
                                 <span class='update-price'>
                                 <i class='rupee'>₹</i> <?php echo @$products_data[0]['mrp_price'];?>.00 
                                 </span>
                              </div>
                              <span class='inclusive_all_taxes'>inclusive of all taxes</span>
                           </div>
                           <div class='clear'></div>
                           <div class='clear'></div>
                        </div>
                       
                        <div class='product-dlt-info'></div>
                        <div class='product-dlt-info'>
                           <h3 class='heading03'>size</h3>
                            <form action="<?php echo site_url(); ?>Cart/add" method="post" name="productformcart" id="addcartform">
                             
                              <ul class='filter-list size-filter-list'>
                                 <li class='not-available11'>
                                    <input  class='size-radio' data-for='18650' id='s-size' name='size' value="S" type='radio'>
                                    <label class='size-radio-label' for='s-size'>s</label>
                                 </li>
                                 <li class=''>
                                    <input  class='size-radio' data-for='18651' id='m-size' name='size' type='radio' value="M" >
                                    <label class='size-radio-label' for='m-size'>m</label>
                                 </li>
                                 <li class=''>
                                    <input  class='size-radio'value="L" data-for='18652' id='l-size' name='size' type='radio'>
                                    <label class='size-radio-label' for='l-size'>l</label>
                                 </li>
                                 <li class=''>
                                    <input  class='size-radio'value="XL"  data-for='18653' id='xl-size' name='size' type='radio'>
                                    <label class='size-radio-label' for='xl-size'>xl</label>
                                 </li>
                                 <li class='not-available11'>
                                    <input  class='size-radio' value="XXL" data-for='18654' id='xxl-size' name='size' type='radio'>
                                    <label class='size-radio-label' for='xxl-size'>xxl</label>
                                 </li>
                              </ul>
                              <p class='size_error hide'>Please select your size.</p>
                              <div class='size-guide'>
                                 <div class='calculate_your_size' style='display: inline-block;'>
                                 </div>
                                <!--  <a class='indo_western_btn size-chart-link size-guide-box' href='javascript:;'>
                                 <span>Size Guide</span>
                                 </a> -->
                              </div>
                            <script type="text/javascript">
                                 function get_qty() {
                                    $('.ajax-loader').css('display','block');
                                    var pro_id=$("#pro_id").val();
                                    $.ajax({
                                           url:"<?php echo base_url();?>Pages/save_wish_list",
                                           type:"POST",
                                           data:{pid:pro_id},
                                           success:function(res){
                                            setTimeout(function () {
                                               $('.ajax-loader').css('display','none');
                                                if(res=='not login'){
                                                alert("Please login then add to wishlist!");
                                               }else{
                                                $(".msg").html("<span style='color:green;margin-left:50px;'>Succcessfully add in wishlist!</span>");
                                               }
                                             }, 2000);

                                             setTimeout(function () {

                                              $(".msg").html('');
                                              }, 5000);

                                           }

                                    })
                                 }
                              </script>
                           <div class='product-dlt-info'>
                              <h3 class='heading03'>Quantity</h3>
                              <div class='quantity-box'>
                                
                                 <div class='quantity-count'>
                                    <button class='less-btn'>
                                    <i class='sprite minus-icon'></i>
                                    </button>
                                    <input min="1" and step="1"class='count-input' name='qty' type='number' value='1'>
                                    <button class='add-bnt'>
                                    <i class='sprite plus-icon'></i>
                                    </button>
                                 </div>
                                 <div class='product-dlt-btn'>
                                  <div class="ajax-loader" style="display: none;width:30px;height:30px; margin-left: 100px;">
                                <img src="<?php echo base_url();?>common/images/ajax-loader.gif" class="img-responsive" />
                              </div> 
                              <div class="msg"></div>
                                  <a id="wish" onclick="get_qty()" class="btn yellow-btn wishlist_btn_details">Wishlist
                                    </a>
                                   <input type="hidden" id="pro_id" value="<?php echo @$products_data[0]['id'];?>">
                                   <input type="hidden" name="name" value="<?php echo @$products_data[0]['product_name'];?>">
                                    <input type="hidden" name="price" value="<?php echo @$products_data[0]['mrp_price'];?>">
                                    <input type="hidden" name="id" value="<?php echo @$products_data[0]['id'];?>">
                                    <input type="hidden" name="image" value="<?php echo @$products_data[0]['image'];?>">
                                    <input type="hidden" name="gst_per" value="<?php echo @$products_data[0]['gst_per'];?>">
                                    <input type="hidden" name="gst_type" value="<?php echo @$products_data[0]['gst_type'];?>">
                                      <button type="submit" class="btn ps-cart-btn red-btn show_cart_button">Add to Cart</button> 
                                  
                                   
                                    <!-- <a class='btn hide hide_cart_button red-btn' href='carts.html'>
                                    <span>Go to Cart</span>
                                    </a> -->
                                   <!--  <button class='btn red-btn hide enquiry'>Out Of Stock</button> -->
                                 </div>

                              </div>
                           </div>
                        </div>
                         </form>
                    <!--     <div class='product-dlt-info mob-hide'>
                           <h3 class='heading03'>CHECK DELIVERY AVAILABILITY</h3>
                           <div class='pincode-box'>
                              <form accept-charset="UTF-8" action="https://www.manyavar.com/check-pincode-delivery" data-remote="true" method="get">
                                 <div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /></div>
                                 <input id="p_id" name="p_id" type="hidden" value="3612" />
                                 <input class="set_product_size_id_pincode_check" id="ps_id" name="ps_id" type="hidden" />
                                 <input id="pincode" name="pincode" placeholder="Enter Pincode" required="required" type="text" />
                                 <input class="check-pincode" data-disable-with="Wait..." name="commit" type="submit" value="Check" />
                              </form>
                           </div>
                           <div class='pincode-text'>
                              <p>
                                 * COD available only on product price upto
                                 <i class='rupee'>`</i> 9999
                                 and total cart value upto
                                 <i class='rupee'>`</i> 9999
                              </p>
                           </div>
                           <div class='delivery-para'>
                              <p class='red'>
                                 <i class='fa fa-times-circle-o'></i>
                                 COD not applicable for this product
                              </p>
                           </div>
                        </div> -->
                        <div class='product-dlt-info'></div>
                     </div>
                     <div class='product-dlt-info check-service-box desk-hide'>
                        <h2 class='heading03'>CHECK DELIVERY AVAILABILITY</h2>
                        <div class='service-box'>
                           <div class='pincode-box'>
                              <form accept-charset="UTF-8" action="https://www.manyavar.com/check-pincode-delivery" data-remote="true" method="get">
                                 <div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /></div>
                                 <input id="p_id" name="p_id" type="hidden" value="3612" />
                                 <input class="set_product_size_id_pincode_check" id="ps_id" name="ps_id" type="hidden" />
                                 <input id="pincode" name="pincode" placeholder="Enter Pincode" required="required" type="text" />
                                 <input class="check-pincode" data-disable-with="Wait..." name="commit" type="submit" value="Check" />
                              </form>
                           </div>
                           <div class='delivery-para'>
                              <p class='red'>
                                 <i class='fa fa-times-circle-o'></i>
                                 COD not applicable for this product
                              </p>
                           </div>
                           <div class='pincode-text'>
                              <p>
                                 * COD available only on product price upto
                                 <i class='rupee'>`</i> 9999
                                 and total cart value upto
                                 <i class='rupee'>`</i> 9999
                              </p>
                           </div>
                        </div>
                     </div>
                     <div class='product-dlt-info description-toggel-box'>
                        <div class='toggle-wrap'>
                           <div class='toggle-box'>
                              <h3 class='heading03 show-toggle-box'>
                                 Features
                                 <span class='comma-wrap'>
                                 [<span class='show-toggle hide-toggle'>-</span>]
                                 </span>
                              </h3>
                              <div class='toggle-show' style='display: block;'>
                                <?php
                                 echo $products_data[0]['fetures'];
                             
                                ?>
                                <!--  <ul class='toggle-inner-list'>
                                    <li>
                                       <p>Color: Fawn</p>
                                    </li>
                                    <li>
                                       <p>Garment Type: Indo Western</p>
                                    </li>
                                    <li>
                                       <p>Fabric: Jacquard</p>
                                    </li>
                                    <li>
                                       <p>Neck: Mandarin Collar</p>
                                    </li>
                                    <li>
                                       <p>Length: Knee Length</p>
                                    </li>
                                    <li>
                                       <p>Design Type: Patterned</p>
                                    </li>
                                    <li>
                                       <p>Occasion: Wedding</p>
                                    </li>
                                 </ul> -->
                              </div>
                           </div>
                           <div class='toggle-box'>
                              <h3 class='heading03 show-toggle-box'>
                                 Description
                                 <span class='comma-wrap'>
                                 [<span class='show-toggle'>+</span>]
                                 </span>
                              </h3>
                              <div class='toggle-show'>
                                 <ul class='toggle-inner-list'>
                                    <p>
                                    <?php
                                 echo $products_data[0]['description'];
                                      ?>
                                    </p>
                                 </ul>
                              </div>
                              <!-- toggle-show close -->
                           </div>
                           <!-- toggle-box close -->
                           <!-- <div class='toggle-box'>
                              <h3 class='heading03 show-toggle-box'>
                                 Details
                                 <span class='comma-wrap'>
                                 [<span class='show-toggle'>+</span>]
                                 </span>
                              </h3>
                              <div class='toggle-show'>
                                 <ul class='toggle-inner-list'>
                                    <li>
                                       <p>The Product Price is inclusive of: 1 Indo-western , 1 beige lower and 1 pocket square</p>
                                    </li>
                                    <li>
                                       <p>The Product Price is not Inclusive of: Juti</p>
                                    </li>
                                    <li>
                                       <p>Care: Dry Clean</p>
                                    </li>
                                 </ul>
                              </div>
                           </div> -->
                        </div>
                     </div>
                  </div>
                  <div class='clear'></div>
               </div>
            </section>
           
            <section class='trending-arriaval-section similar-section' id='gamooga-similar-products'>
               <h2 class='heading-title'>Similar Products</h2>
               <div class='tab-container'>
                  <div class='tab-box active' id='trending'>
                     <div class='similar-product-slider'>
                      <?php
                      // print_r($similar_data);
                    
                                // print_r($home_buy_products);
                                 foreach ($similar_data as $key => $bdata) {
                                     # code...
                                 
                              
                      ?>
                        <figure class='product-box'>
                           <div class='prodcut-img fix-img-box'>
                              <a href='<?php echo base_url();?>Pages/product_details/<?php echo $bdata['id'];?>'>
                              <img alt='Luxurious Embroidered Sherwani' src='<?php echo site_url(); ?>admin/upload/product_images/<?php echo @$bdata['image'];?>'>
                              </a>
                           </div>
                           <figcaption>
                              <div class='inner-product-desc'>
                                 <h2 class='product-title'><?php echo @$bdata['product_name']?></h2>
                                 <p class='product-price'>
                                    <i class='rupee'>₹</i> <?php echo @$bdata['mrp_price']?>
                                 </p>
                                 <a class='btn' href='<?php echo base_url();?>Pages/product_details/<?php echo $bdata['id'];?>'>
                                 Shop Now
                                 </a>
                              </div>
                           </figcaption>
                        </figure>
                      <?php }?>
                        
                     </div>
                  </div>
               </div>
               <div class='clear'></div>
            </section>
            <section class='section tnc-info' style='background: #fff;padding-bottom: 20px;'>
               <p style='min-height: 25px;'></p>
            </section>
            <section class='usp-section listingpage-usp-section mob-hide'>
               <div class='usp-wrapper'>
                  <figure class='usp-box'>
                     <div class='ups-icon'>
                        <i class='sprite star-icon'></i>
                     </div>
                     <figcaption>
                        <h2 class='usp-heading'>satisfied Customers</h2>
                        <p class='usp-content'>3,00,000+</p>
                     </figcaption>
                  </figure>
                  <!-- usp-box close -->
                  <figure class='usp-box'>
                     <div class='ups-icon'>
                        <i class='sprite ethnic-icon'></i>
                     </div>
                     <figcaption>
                        <h2 class='usp-heading'>Ethnic Wear</h2>
                        <p class='usp-content'>Made in India</p>
                     </figcaption>
                  </figure>
                  <!-- usp-box close -->
                  <figure class='usp-box'>
                     <div class='ups-icon'>
                        <i class='sprite shipping-icon'></i>
                     </div>
                     <figcaption>
                        <h2 class='usp-heading'>
                           Free Shipping in India
                        </h2>
                        <p class='usp-content'>Fast Delivery</p>
                     </figcaption>
                  </figure>
                  <figure class='usp-box'>
                     <div class='ups-icon'>
                        <i class='sprite flight-icon'></i>
                     </div>
                     <figcaption>
                        <h2 class='usp-heading'>International Shipping</h2>
                        <p class='usp-content'>6 Countries</p>
                     </figcaption>
                  </figure>
                  <!-- usp-box close -->
               </div>
            </section>
            <section class='mob-usp-section mobile-view listing-usp'>
               <div class='container'>
                  <div class='mob-usp-box'>
                     <i class='sprite mob-usp-icon star-icon'></i>
                     <p>happy &amp; satisfied Customers</p>
                  </div>
                  <div class='mob-usp-box'>
                     <i class='sprite mob-usp-icon del-icon'></i>
                     <p>Cash on Delivery in India</p>
                  </div>
                  <div class='mob-usp-box'>
                     <i class='sprite mob-usp-icon ship-icon'></i>
                     <p>
                        Free Shipping in India
                     </p>
                  </div>
                  <div class='mob-usp-box'>
                     <i class='sprite mob-usp-icon int-icon'></i>
                     <p>International Shipping</p>
                  </div>
               </div>
            </section>
         </main>
         <div class='size-guide-popup'>
            <span class='close-sg-popup'>x</span>
            <h2 class='heading02'>Manyavar Size Guide</h2>
            <div class='measure-img'>
               <img alt='' src='assets/size_charts/indo-western.png'>
            </div>
            <p class='popup-para'>We provide a standard loosing as per the style/pattern of the product.</p>
            <div class='measure-note'>
               <div class='size-btn'>
                  <span class='active' data-tab='in-size'>in</span>
                  <span data-tab='cm-size'>cm</span>
               </div>
               <div class='clear'></div>
               <div class='size-tab-box active' id='in-size'>
                  <div class='measure-head'>
                     <h3 class='heading03'>Indo Western</h3>
                     <span>All Size are in Inches</span>
                  </div>
                  <div class='sg-table-box'>
                     <table class='sg-table'>
                        <tbody>
                           <tr class='sg-tr'>
                              <th class='sg-th'>SIZE</th>
                              <td class='sg-th'>S-36</td>
                              <td class='sg-th'>M-38</td>
                              <td class='sg-th'>L-40</td>
                              <td class='sg-th'>XL-42</td>
                              <td class='sg-th'>XXL-44</td>
                              <td class='sg-th'>3XL-46</td>
                           </tr>
                           <tr class='sg-tr'>
                              <th class='sg-td'>LENGTH</th>
                              <td class='sg-td'>
                                 37
                              </td>
                              <td class='sg-td'>
                                 37
                              </td>
                              <td class='sg-td'>
                                 37
                              </td>
                              <td class='sg-td'>
                                 38
                              </td>
                              <td class='sg-td'>
                                 38
                              </td>
                              <td class='sg-td'>
                                 38
                              </td>
                           </tr>
                           <tr class='sg-tr'>
                              <th class='sg-td'>CHEST</th>
                              <td class='sg-td'>
                                 39.5
                              </td>
                              <td class='sg-td'>
                                 41.5
                              </td>
                              <td class='sg-td'>
                                 43.5
                              </td>
                              <td class='sg-td'>
                                 45.5
                              </td>
                              <td class='sg-td'>
                                 47.5
                              </td>
                              <td class='sg-td'>
                                 49.5
                              </td>
                           </tr>
                           <tr class='sg-tr'>
                              <th class='sg-td'>BELLY</th>
                              <td class='sg-td'>
                                 36.5
                              </td>
                              <td class='sg-td'>
                                 38.5
                              </td>
                              <td class='sg-td'>
                                 40.5
                              </td>
                              <td class='sg-td'>
                                 42.5
                              </td>
                              <td class='sg-td'>
                                 45
                              </td>
                              <td class='sg-td'>47.5</td>
                           </tr>
                           <tr class='sg-tr'>
                              <th class='sg-td'>HIP</th>
                              <td class='sg-td'>
                                 40.5
                              </td>
                              <td class='sg-td'>
                                 42.5
                              </td>
                              <td class='sg-td'>
                                 44.5
                              </td>
                              <td class='sg-td'>
                                 46.5
                              </td>
                              <td class='sg-td'>
                                 47.5
                              </td>
                              <td class='sg-td'>
                                 49.5
                              </td>
                           </tr>
                           <tr class='sg-tr'>
                              <th class='sg-td'>SHOULDER</th>
                              <td class='sg-td'>
                                 17.5
                              </td>
                              <td class='sg-td'>
                                 18
                              </td>
                              <td class='sg-td'>
                                 18.5
                              </td>
                              <td class='sg-td'>
                                 19.5
                              </td>
                              <td class='sg-td'>
                                 20.5
                              </td>
                              <td class='sg-td'>
                                 21
                              </td>
                           </tr>
                           <tr class='sg-tr'>
                              <th class='sg-td'>NECK</th>
                              <td class='sg-td'>
                                 16.5
                              </td>
                              <td class='sg-td'>
                                 17
                              </td>
                              <td class='sg-td'>
                                 17.5
                              </td>
                              <td class='sg-td'>
                                 18
                              </td>
                              <td class='sg-td'>
                                 18.5
                              </td>
                              <td class='sg-td'>
                                 19
                              </td>
                           </tr>
                           <tr class='sg-tr'>
                              <th class='sg-td'>SLEEVE LENGTH</th>
                              <td class='sg-td'>
                                 24.5
                              </td>
                              <td class='sg-td'>
                                 25
                              </td>
                              <td class='sg-td'>
                                 25.5
                              </td>
                              <td class='sg-td'>
                                 26
                              </td>
                              <td class='sg-td'>
                                 26.5
                              </td>
                              <td class='sg-td'>
                                 27
                              </td>
                           </tr>
                           <tr class='sg-tr'>
                              <th class='sg-td'>MOHRI</th>
                              <td class='sg-td'>
                                 10.5
                              </td>
                              <td class='sg-td'>
                                 11
                              </td>
                              <td class='sg-td'>
                                 11
                              </td>
                              <td class='sg-td'>
                                 11.5
                              </td>
                              <td class='sg-td'>
                                 12
                              </td>
                              <td class='sg-td'>
                                 12
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
               <div class='size-tab-box' id='cm-size'>
                  <div class='measure-head'>
                     <h3 class='heading03'>Indo Western</h3>
                     <span>All Size are in CM</span>
                  </div>
                  <div class='sg-table-box'>
                     <table class='sg-table'>
                        <tbody>
                           <tr class='sg-tr'>
                              <th class='sg-th'>SIZE</th>
                              <td class='sg-th'>S-36</td>
                              <td class='sg-th'>M-38</td>
                              <td class='sg-th'>L-40</td>
                              <td class='sg-th'>XL-42</td>
                              <td class='sg-th'>XXL-44</td>
                              <td class='sg-th'>3XL-46</td>
                           </tr>
                           <tr class='sg-tr'>
                              <th class='sg-td'>LENGTH</th>
                              <td class='sg-td'>
                                 94
                              </td>
                              <td class='sg-td'>
                                 94
                              </td>
                              <td class='sg-td'>
                                 94
                              </td>
                              <td class='sg-td'>
                                 94
                              </td>
                              <td class='sg-td'>
                                 94
                              </td>
                              <td class='sg-td'>
                                 94
                              </td>
                           </tr>
                           <tr class='sg-tr'>
                              <th class='sg-td'>CHEST</th>
                              <td class='sg-td'>
                                 100
                              </td>
                              <td class='sg-td'>
                                 105
                              </td>
                              <td class='sg-td'>
                                 110
                              </td>
                              <td class='sg-td'>
                                 116
                              </td>
                              <td class='sg-td'>
                                 121
                              </td>
                              <td class='sg-td'>
                                 126
                              </td>
                           </tr>
                           <tr class='sg-tr'>
                              <th class='sg-td'>BELLY</th>
                              <td class='sg-td'>
                                 93
                              </td>
                              <td class='sg-td'>
                                 98
                              </td>
                              <td class='sg-td'>
                                 103
                              </td>
                              <td class='sg-td'>
                                 108
                              </td>
                              <td class='sg-td'>
                                 114
                              </td>
                              <td class='sg-td'>121</td>
                           </tr>
                           <tr class='sg-tr'>
                              <th class='sg-td'>HIP</th>
                              <td class='sg-td'>
                                 103
                              </td>
                              <td class='sg-td'>
                                 108
                              </td>
                              <td class='sg-td'>
                                 113
                              </td>
                              <td class='sg-td'>
                                 118
                              </td>
                              <td class='sg-td'>
                                 121
                              </td>
                              <td class='sg-td'>
                                 126
                              </td>
                           </tr>
                           <tr class='sg-tr'>
                              <th class='sg-td'>SHOULDER</th>
                              <td class='sg-td'>
                                 44
                              </td>
                              <td class='sg-td'>
                                 46
                              </td>
                              <td class='sg-td'>
                                 47
                              </td>
                              <td class='sg-td'>
                                 50
                              </td>
                              <td class='sg-td'>
                                 52
                              </td>
                              <td class='sg-td'>
                                 53
                              </td>
                           </tr>
                           <tr class='sg-tr'>
                              <th class='sg-td'>NECK</th>
                              <td class='sg-td'>
                                 42
                              </td>
                              <td class='sg-td'>
                                 43
                              </td>
                              <td class='sg-td'>
                                 44
                              </td>
                              <td class='sg-td'>
                                 46
                              </td>
                              <td class='sg-td'>
                                 47
                              </td>
                              <td class='sg-td'>
                                 48
                              </td>
                           </tr>
                           <tr class='sg-tr'>
                              <th class='sg-td'>SLEEVE LENGTH</th>
                              <td class='sg-td'>
                                 62
                              </td>
                              <td class='sg-td'>
                                 64
                              </td>
                              <td class='sg-td'>
                                 65
                              </td>
                              <td class='sg-td'>
                                 66
                              </td>
                              <td class='sg-td'>
                                 67
                              </td>
                              <td class='sg-td'>
                                 69
                              </td>
                           </tr>
                           <tr class='sg-tr'>
                              <th class='sg-td'>MOHRI</th>
                              <td class='sg-td'>
                                 27
                              </td>
                              <td class='sg-td'>
                                 28
                              </td>
                              <td class='sg-td'>
                                 28
                              </td>
                              <td class='sg-td'>
                                 29
                              </td>
                              <td class='sg-td'>
                                 30
                              </td>
                              <td class='sg-td'>
                                 30
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            <div class='measure-note'>
               <div class='measure-head'>
                  <h3 class='heading03'>Pant</h3>
                  <span>All Size are in Inches</span>
               </div>
               <div class='sg-table-box'>
                  <table class='sg-table'>
                     <tbody>
                        <tr class='sg-tr'>
                           <th class='sg-th'>SIZE</th>
                           <th class='sg-th'>30</th>
                           <th class='sg-th'>32</th>
                           <th class='sg-th'>34</th>
                           <th class='sg-th'>36</th>
                           <th class='sg-th'>38</th>
                           <th class='sg-th'>40</th>
                           <th class='sg-th'>42</th>
                        </tr>
                        <tr class='sg-tr'>
                           <th class='sg-td'>LENGTH</th>
                           <td class='sg-td'>45</td>
                           <td class='sg-td'>45</td>
                           <td class='sg-td'>45</td>
                           <td class='sg-td'>45</td>
                           <td class='sg-td'>45</td>
                           <td class='sg-td'>45</td>
                           <td class='sg-td'>45</td>
                        </tr>
                        <tr class='sg-tr'>
                           <th class='sg-td'>WAIST</th>
                           <td class='sg-td'>30+2</td>
                           <td class='sg-td'>32+2</td>
                           <td class='sg-td'>34+2</td>
                           <td class='sg-td'>36+2</td>
                           <td class='sg-td'>38+2</td>
                           <td class='sg-td'>40+2</td>
                           <td class='sg-td'>42+2</td>
                        </tr>
                        <tr class='sg-tr'>
                           <th class='sg-td'>HIP</th>
                           <td class='sg-td'>34</td>
                           <td class='sg-td'>36</td>
                           <td class='sg-td'>38</td>
                           <td class='sg-td'>40</td>
                           <td class='sg-td'>42</td>
                           <td class='sg-td'>44</td>
                           <td class='sg-td'>46</td>
                        </tr>
                        <tr class='sg-tr'>
                           <th class='sg-td'>CROTCH</th>
                           <td class='sg-td'>10¼</td>
                           <td class='sg-td'>10½</td>
                           <td class='sg-td'>10¾</td>
                           <td class='sg-td'>11</td>
                           <td class='sg-td'>11½</td>
                           <td class='sg-td'>11¾</td>
                           <td class='sg-td'>12</td>
                        </tr>
                        <tr class='sg-tr'>
                           <th class='sg-td'>THIGH</th>
                           <td class='sg-td'>24</td>
                           <td class='sg-td'>24½</td>
                           <td class='sg-td'>25</td>
                           <td class='sg-td'>25½</td>
                           <td class='sg-td'>26</td>
                           <td class='sg-td'>26½</td>
                           <td class='sg-td'>27</td>
                        </tr>
                        <tr class='sg-tr'>
                           <th class='sg-td'>BOTTOM</th>
                           <td class='sg-td'>16</td>
                           <td class='sg-td'>16</td>
                           <td class='sg-td'>17</td>
                           <td class='sg-td'>17</td>
                           <td class='sg-td'>17½</td>
                           <td class='sg-td'>17½</td>
                           <td class='sg-td'>18</td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
            <div class='measure-note'>
               <div class='measure-head'>
                  <h3 class='heading03'>Dhoti</h3>
                  <span>All Size are in Inches</span>
               </div>
               <div class='sg-table-box'>
                  <table class='sg-table'>
                     <tbody>
                        <tr class='sg-tr'>
                           <th class='sg-th'>SIZE</th>
                           <td class='sg-th'>S-36</td>
                           <td class='sg-th'>M-38</td>
                           <td class='sg-th'>L-40</td>
                           <td class='sg-th'>XL-42</td>
                           <td class='sg-th'>XXL-44</td>
                           <td class='sg-th'>3XL-46</td>
                        </tr>
                        <tr class='sg-tr'>
                           <th class='sg-td'>LENGTH</th>
                           <td class='sg-td'>38</td>
                           <td class='sg-td'>40</td>
                           <td class='sg-td'>42</td>
                           <td class='sg-td'>44</td>
                           <td class='sg-td'>45</td>
                           <td class='sg-td'>46</td>
                        </tr>
                        <tr class='sg-tr'>
                           <th class='sg-td'>WAIST</th>
                           <td class='sg-td'>46</td>
                           <td class='sg-td'>48</td>
                           <td class='sg-td'>50</td>
                           <td class='sg-td'>52</td>
                           <td class='sg-td'>54</td>
                           <td class='sg-td'>55</td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
            <div class='measure-note'>
               <div class='measure-head'>
                  <h3 class='heading03'>Brijes</h3>
                  <span>All Size are in Inches</span>
               </div>
               <div class='sg-table-box'>
                  <table class='sg-table'>
                     <tbody>
                        <tr class='sg-tr'>
                           <th class='sg-th'>SIZE</th>
                           <td class='sg-th'>S-36</td>
                           <td class='sg-th'>M-38</td>
                           <td class='sg-th'>L-40</td>
                           <td class='sg-th'>XL-42</td>
                           <td class='sg-th'>XXL-44</td>
                           <td class='sg-th'>3XL-46</td>
                        </tr>
                        <tr class='sg-tr'>
                           <th class='sg-td'>LENGTH</th>
                           <td class='sg-td'>55</td>
                           <td class='sg-td'>55</td>
                           <td class='sg-td'>55</td>
                           <td class='sg-td'>55</td>
                           <td class='sg-td'>55</td>
                           <td class='sg-td'>55</td>
                        </tr>
                        <tr class='sg-tr'>
                           <th class='sg-td'>WAIST</th>
                           <td class='sg-td'>42</td>
                           <td class='sg-td'>44</td>
                           <td class='sg-td'>46</td>
                           <td class='sg-td'>48</td>
                           <td class='sg-td'>50</td>
                           <td class='sg-td'>52</td>
                        </tr>
                        <tr class='sg-tr'>
                           <th class='sg-td'>HIP</th>
                           <td class='sg-td'>56</td>
                           <td class='sg-td'>58</td>
                           <td class='sg-td'>60</td>
                           <td class='sg-td'>62</td>
                           <td class='sg-td'>64</td>
                           <td class='sg-td'>66</td>
                        </tr>
                        <tr class='sg-tr'>
                           <th class='sg-td'>THIGH</th>
                           <td class='sg-td'>32</td>
                           <td class='sg-td'>34</td>
                           <td class='sg-td'>36</td>
                           <td class='sg-td'>38</td>
                           <td class='sg-td'>40</td>
                           <td class='sg-td'>42</td>
                        </tr>
                        <tr class='sg-tr'>
                           <th class='sg-td'>CROTCH</th>
                           <td class='sg-td'>15</td>
                           <td class='sg-td'>15.5</td>
                           <td class='sg-td'>16</td>
                           <td class='sg-td'>16.5</td>
                           <td class='sg-td'>17</td>
                           <td class='sg-td'>17.5</td>
                        </tr>
                        <tr class='sg-tr'>
                           <th class='sg-td'>BOTTOM</th>
                           <td class='sg-td'>12.5</td>
                           <td class='sg-td'>13</td>
                           <td class='sg-td'>13.5</td>
                           <td class='sg-td'>14</td>
                           <td class='sg-td'>14.5</td>
                           <td class='sg-td'>15</td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            </div>
            <div class='measure-note'>
               <div class='measure-head'>
                  <h3 class='heading03'>Ballon Brijes</h3>
                  <span>All Size are in Inches</span>
               </div>
               <div class='sg-table-box'>
                  <table class='sg-table'>
                     <tbody>
                        <tr class='sg-tr'>
                           <th class='sg-th'>Details</th>
                           <th class='sg-th'>Sizes: S-2XL(Free size)</th>
                        </tr>
                        <tr class='sg-tr'>
                           <th class='sg-td'>Length</th>
                           <td class='sg-td'>44</td>
                        </tr>
                        <tr class='sg-tr'>
                           <th class='sg-td'>Waist</th>
                           <td class='sg-td'>42</td>
                        </tr>
                     </tbody>
                  </table>
               </div>
               <div class='your-size-box'>
                  <div class='size-left-box'>
                     <i class='size-img'>
                     <img alt='' src=' images.manyavar.com/static_images/45/original/size_img.png'>
                     </i>
                     <p>
                        Still not sure about
                        <br>
                        your perfect size
                        <br>
                        and fit?
                     </p>
                  </div>
                  <div class='size-right-box'>
                     <p>Our advisors can provide detailed information for any of our product</p>
                     <label>
                     Email us :
                     <a href='mailto:customercare@manyavar.com'>customercare@manyavar.com</a>
                     </label>
                     <label>
                     Call Toll Free :
                     <a href='tel:1800 120 000 500'>1800 120 000 500</a>
                     </label>
                  </div>
               </div>
            </div>
         </div>
         <div class='overlay'></div>
         <div class='sucess-loader-overlay'></div>
         <div id='loader'>
            <img alt='main loader' src=' images.manyavar.com/assets/loading_icon.gif'>
         </div>
         <div class='clear'></div>
         <div class='alteration-popup-overlay'></div>
         <div class='alteration-popup' id='women_alt'></div>
         <div class='alteration-popup' id='men_alt'></div>
         <div class='addcart-poup'>
            <span>
            <img src=' images.manyavar.com/product_images/18942/original/KSS_5737dcb4.jpg?1571893869'>
            </span>
            <label>
            added to cart
            </label>
         </div>
         <form accept-charset="UTF-8" action="##" data-remote="true" id="change_price" method="post">
            <div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /></div>
            <input class="product_size_id_change_price" id="product_size_id" name="product_size_id" type="hidden" value="" />
            <input class="product_qty_change_price" id="cproduct_qty" name="cproduct_qty" type="hidden" value="" />
            <input id="change_price_submit" name="commit" style="display: none;" type="submit" value="submit" />
         </form>
         
        <script type="text/javascript">
    $(document).ready(function(){
      
      if ($(window).width() > 767){
        $("#img_01").elevateZoom({gallery:'gal1', cursor: 'pointer', galleryActiveClass: 'active', imageCrossfade: true});
    
        $("#img_01").bind("click", function(e) {
          var ez =   $('#img_01').data('elevateZoom');
          $.fancybox(ez.getGalleryList());
          return false;
        });
      }
    
      $(".select-size").change(function(){
        $(".btn.red-btn.added").hide();
        $(".btn.red-btn.add").show();
      });
    
      //var winW = $(window).width();
      //if(winW <= 767){
        //$(".complete-look-section").insertBefore(".description-toggel-box");
      //}
     
    });

        </script>