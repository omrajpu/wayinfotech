
         <main id='main-wrapper'>
            <section class='listing-banner-section desktop-view'>
               <img alt='Kids Kurta' src='<?php echo base_url();?>/category_detail_banner/34/original/Manyavar_Listing_Banner_Kids_Kurtas034e.jpg?1559647370'>
               <div class='innerpage-banner-text'></div>
            </section>
            <section class='inner-section-heading'>
               <div class='container'>
                  <ul class='bread-cum'>
                     <?php
                     
                     if($_SESSION['cat_name']=='Men'){
                        $cai_id=5;
                     }
                     if($_SESSION['cat_name']=='Kids'){
                        $cai_id=6;
                     }
                      if($_SESSION['cat_name']=='Accessories'){
                        $cai_id=7;
                     }
                     if($_SESSION['cat_name']=='blazer/suit collections'){
                        $cai_id=8;
                     }
                     ?>
                     <li>
                        <a href='<?php echo base_url();?>'>Home<?php echo @$cai_id;?></a>
                     </li>
                     <li>
                        <a href='<?php echo base_url();?>Pages/cat_page/<?php echo @$cai_id;?>'><?php echo $_SESSION['cat_name'];?></a>
                     </li>
                     <li> <?php echo @$child_name;?></li>
                  </ul>
                  <h1 class='section-heading'>
                     <span class='heading02'>
                     <?php echo @$child_name;?>
                     </span>
                     <span class='heading03'>Collection</span>
                  </h1>
               </div>
               <!-- <div class='product-listin-header'>
                  <div class='container'>
                     <div class='product-found'>
                        <p>
                           <span class='product-cnt'>51</span>
                           Products found
                        </p>
                     </div>
                     <div class='sort-product'>
                        <label>Sort -</label>
                        <div class='product-list'>
                           <p class='sorted-cat'>Bestseller</p>
                           <ul class='sort-product-list'>
                              <li dta='bestseller'>Bestseller</li>
                              <li dta='newarrival'>New Arrival</li>
                              <li dta='popularity'>Popularity</li>
                              <li dta='htl'>Price: High to Low</li>
                              <li dta='lth'>Price: Low to High</li>
                           </ul>
                        </div>
                        <span class='sprite show-list'></span>
                     </div>
                  </div>
               </div> -->
            </section>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
            <div id='product-listing-wrapper'>
               <div class='container'>
                  <form accept-charset="UTF-8" action="https://www.manyavar.com/v1/stores" class="filter" data-remote="true" method="get">
                     <div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /></div>
                     <input id="parent_category" name="parent_category" type="hidden" value="kids" />
                     <input id="price_low" name="price_low" type="hidden" value="" />
                     <input id="price_high" name="price_high" type="hidden" value="" />
                     <input id="page" name="page" type="hidden" />
                     <input class="sort_by" id="sort_by" name="sort_by" type="hidden" value="" />
                     <input id="searchs" name="commit" style="display: none;" type="submit" value="submit" />
                     <input id="sub_category" name="sub_category" type="hidden" value="kids-kurta" />
                     <aside class='listing-filter'>
                        <!-- <div class='filter-header'>
                           <h2 class='heading02'>Filter</h2>
                           <a class='clear-all desktop-view' href='kids-kurta.html'>Clear All</a>
                           <p class='close-filter mobile-view'>
                              <i class='sprite close-filter-icon'></i>
                           </p>
                        </div> -->
                        <script type="text/javascript">
                           $(document).ready(function () {
                             
                               $(".price-range-slider").click(function() {
                                 var price=$("#price-range").text();
                                  //alert(price);
                                  var cat_ids = [];
                                    var cat_ids = [];
                              $('input:checked').each(function() {
                                   cat_ids.push($(this).val());
                               });
                              var cat_idsobj=Object.assign({}, cat_ids);
                             //console.log(cat_idsobj);
                               $.ajax({
                                    url: "<?php echo base_url();?>" + 'Pages/common_search',
                                    type: 'POST',
                                    data: {catdata:cat_idsobj,price_range:price},
                                    success: function(result) {
                                      // alert("dfgfhg");
                                       $("#product_data").html(result);
                                    }
                                })

                              });


  
                           });
                           
                         </script>
                        <script type="text/javascript">
                           $(document).ready(function () {
                             $('input').on('click', function(){
                              var cat_ids = [];
                              $('input:checked').each(function() {
                                   cat_ids.push($(this).val());
                               });
                              var cat_idsobj=Object.assign({}, cat_ids);
                           //console.log(cat_idsobj);
                            $.ajax({
                                    url: "<?php echo base_url();?>" + 'Pages/common_search',
                                    type: 'POST',
                                    data: {catdata:cat_idsobj},
                                    success: function(result) {
                                      // alert("dfgfhg");
                                       $("#product_data").html(result);
                                    }
                                })
                              });
                        


  
                           });
                           
                         </script>
                        <div class='filter-box-wrap'>
                           <div class='filter-box'>
                              <h3 class='heading03'>
                                 <span>Categories</span>
                                 <span class='sprite show-filter hide-filter'></span>
                              </h3>
                              
                              <ul class='filter-list' style='display: block;'>
                                 <li>
                                    <input  class="checkbox fliter_ids" id="kurta_kids" name="attribute_kids[]" type="checkbox" value="5" />

                                    <label class='checkbox-label' for='kurta_kids'>MEN</label>
                                 </li>
                                 <li>
                                    <input class="checkbox fliter_ids" id="jackets_kids" name="attribute_kids[]" type="checkbox" value="6" />
                                    <label class='checkbox-label' for='jackets_kids'>KIDS</label>
                                 </li>
                                 <li>
                                    <input class="checkbox fliter_ids" id="Pathani" name="attribute_kids[]" type="checkbox" value="7" />
                                    <label class='checkbox-label' for='Pathani'>Accessories</label>
                                 </li>

                                 <li>
                                    <input class="checkbox fliter_ids" id="blazer" name="attribute_kids[]" type="checkbox" value="8" />
                                    <label class='checkbox-label' for='blazer'>blazer/suit collections</label>
                                 </li>
                              </ul>
                           </div>
                           <!-- <div class='filter-box'>
                              <h3 class='heading03'>
                                 <span>Color</span>
                                 <span class='sprite show-filter'></span>
                              </h3>
                              <ul class='filter-list'>
                                 <li>
                                    <input class="checkbox Beige fliter_ids" id="Beige" name="colors[]" type="checkbox" value="Beige" />
                                    <label class='checkbox-label' for='Beige'>Beige (4)</label>
                                 </li>
                                 <li>
                                    <input class="checkbox Blue fliter_ids" id="Blue" name="colors[]" type="checkbox" value="Blue" />
                                    <label class='checkbox-label' for='Blue'>Blue (17)</label>
                                 </li>
                                 <li>
                                    <input class="checkbox Cream fliter_ids" id="Cream" name="colors[]" type="checkbox" value="Cream" />
                                    <label class='checkbox-label' for='Cream'>Cream (1)</label>
                                 </li>
                                 <li>
                                    <input class="checkbox Green fliter_ids" id="Green" name="colors[]" type="checkbox" value="Green" />
                                    <label class='checkbox-label' for='Green'>Green (5)</label>
                                 </li>
                                 <li>
                                    <input class="checkbox Grey fliter_ids" id="Grey" name="colors[]" type="checkbox" value="Grey" />
                                    <label class='checkbox-label' for='Grey'>Grey (1)</label>
                                 </li>
                                 <li>
                                    <input class="checkbox Maroon fliter_ids" id="Maroon" name="colors[]" type="checkbox" value="Maroon" />
                                    <label class='checkbox-label' for='Maroon'>Maroon (3)</label>
                                 </li>
                                 <li>
                                    <input class="checkbox Orange fliter_ids" id="Orange" name="colors[]" type="checkbox" value="Orange" />
                                    <label class='checkbox-label' for='Orange'>Orange (7)</label>
                                 </li>
                                 <li>
                                    <input class="checkbox Pink fliter_ids" id="Pink" name="colors[]" type="checkbox" value="Pink" />
                                    <label class='checkbox-label' for='Pink'>Pink (2)</label>
                                 </li>
                                 <li>
                                    <input class="checkbox Purple fliter_ids" id="Purple" name="colors[]" type="checkbox" value="Purple" />
                                    <label class='checkbox-label' for='Purple'>Purple (1)</label>
                                 </li>
                                 <li>
                                    <input class="checkbox Red fliter_ids" id="Red" name="colors[]" type="checkbox" value="Red" />
                                    <label class='checkbox-label' for='Red'>Red (6)</label>
                                 </li>
                                 <li>
                                    <input class="checkbox Yellow fliter_ids" id="Yellow" name="colors[]" type="checkbox" value="Yellow" />
                                    <label class='checkbox-label' for='Yellow'>Yellow (4)</label>
                                 </li>
                              </ul>
                           </div> -->
                           <div class='filter-box price-filter-box'>
                              <h3 class='heading03'>
                                 <span>Price</span>
                                 <span class='sprite show-filter'></span>
                              </h3>
                              <div class='filter-list'>
                                 <div id='price-range'></div>
                                 <div class='price-range-slider'></div>
                              </div>
                           </div>
                           <!-- <div class='filter-box'>
                              <h3 class='heading03'>
                                 <span>Size</span>
                                 <span class='sprite show-filter'></span>
                              </h3>
                              <ul class='filter-list size-filter-list'>
                                 <li>
                                    <input class="size-radio fliter_ids" id="34-size" name="size[]" type="checkbox" value="34" />
                                    <label class='size-radio-label' for='34-size'>2-3 YRS</label>
                                 </li>
                                 <li>
                                    <input class="size-radio fliter_ids" id="35-size" name="size[]" type="checkbox" value="35" />
                                    <label class='size-radio-label' for='35-size'>4-5 YRS</label>
                                 </li>
                                 <li>
                                    <input class="size-radio fliter_ids" id="36-size" name="size[]" type="checkbox" value="36" />
                                    <label class='size-radio-label' for='36-size'>6-7 YRS</label>
                                 </li>
                                 <li>
                                    <input class="size-radio fliter_ids" id="37-size" name="size[]" type="checkbox" value="37" />
                                    <label class='size-radio-label' for='37-size'>7-8 YRS</label>
                                 </li>
                                 <li>
                                    <input class="size-radio fliter_ids" id="38-size" name="size[]" type="checkbox" value="38" />
                                    <label class='size-radio-label' for='38-size'>8-9 YRS</label>
                                 </li>
                                 <li>
                                    <input class="size-radio fliter_ids" id="39-size" name="size[]" type="checkbox" value="39" />
                                    <label class='size-radio-label' for='39-size'>9-10 YRS</label>
                                 </li>
                                 <li>
                                    <input class="size-radio fliter_ids" id="40-size" name="size[]" type="checkbox" value="40" />
                                    <label class='size-radio-label' for='40-size'>10-11 YRS</label>
                                 </li>
                                 <li>
                                    <input class="size-radio fliter_ids" id="41-size" name="size[]" type="checkbox" value="41" />
                                    <label class='size-radio-label' for='41-size'>11-13 YRS</label>
                                 </li>
                                 <li>
                                    <input class="size-radio fliter_ids" id="108-size" name="size[]" type="checkbox" value="108" />
                                    <label class='size-radio-label' for='108-size'>20/50CM</label>
                                 </li>
                                 <li>
                                    <input class="size-radio fliter_ids" id="109-size" name="size[]" type="checkbox" value="109" />
                                    <label class='size-radio-label' for='109-size'>22/55CM</label>
                                 </li>
                                 <li>
                                    <input class="size-radio fliter_ids" id="110-size" name="size[]" type="checkbox" value="110" />
                                    <label class='size-radio-label' for='110-size'>24/60CM</label>
                                 </li>
                                 <li>
                                    <input class="size-radio fliter_ids" id="111-size" name="size[]" type="checkbox" value="111" />
                                    <label class='size-radio-label' for='111-size'>26/65CM</label>
                                 </li>
                                 <li>
                                    <input class="size-radio fliter_ids" id="112-size" name="size[]" type="checkbox" value="112" />
                                    <label class='size-radio-label' for='112-size'>28/70CM</label>
                                 </li>
                                 <li>
                                    <input class="size-radio fliter_ids" id="113-size" name="size[]" type="checkbox" value="113" />
                                    <label class='size-radio-label' for='113-size'>30/75CM</label>
                                 </li>
                                 <li>
                                    <input class="size-radio fliter_ids" id="114-size" name="size[]" type="checkbox" value="114" />
                                    <label class='size-radio-label' for='114-size'>32/80CM</label>
                                 </li>
                                 <li>
                                    <input class="size-radio fliter_ids" id="115-size" name="size[]" type="checkbox" value="115" />
                                    <label class='size-radio-label' for='115-size'>34/85CM</label>
                                 </li>
                              </ul>
                           </div> -->
                           <!-- <div class='filter-box'>
                              <h3 class='heading03'>
                                 <span>Fabric</span>
                                 <span class='sprite show-filter'></span>
                              </h3>
                              <ul class='filter-list'>
                                 <li>
                                    <input class="checkbox Cotton fliter_ids" id="Cotton" name="fabrics[]" type="checkbox" value="Cotton" />
                                    <label class='checkbox-label' for='Cotton'>
                                    Cotton (10)
                                    </label>
                                 </li>
                                 <li>
                                    <input class="checkbox Jacquard fliter_ids" id="Jacquard" name="fabrics[]" type="checkbox" value="Jacquard" />
                                    <label class='checkbox-label' for='Jacquard'>
                                    Jacquard (13)
                                    </label>
                                 </li>
                                 <li>
                                    <input class="checkbox Linen fliter_ids" id="Linen" name="fabrics[]" type="checkbox" value="Linen" />
                                    <label class='checkbox-label' for='Linen'>
                                    Linen (1)
                                    </label>
                                 </li>
                                 <li>
                                    <input class="checkbox Silk fliter_ids" id="Silk" name="fabrics[]" type="checkbox" value="Silk" />
                                    <label class='checkbox-label' for='Silk'>
                                    Silk (5)
                                    </label>
                                 </li>
                              </ul>
                           </div> -->
                        </div>
                        <!-- <p class='mob-clear-all mobile-view'>
                           <a href='kids-kurta.html'>Clear All</a>
                        </p> -->
                        <button class='apply-btn mobile-view close-filter' onclick='javascript:void(0);' type='button'>Apply</button>
                     </aside>
                  </form>
                  <section class='product-listing-section' id="product_data">
                      <?php
                                // print_r($home_buy_products);
                                 foreach ($home_buy_products as $key => $bdata) {
                                     # code...
                                 
                                ?>
                     <figure class='product-box'>
                        <!-- <a class="wishlist-icon" data-remote="true" href="#" onClick="OpenLoader();"><i class='; fa fa-heart-o' id='wishlist_1511'></i>
                        </a> -->
                        <div class='prodcut-img fix-img-box'>
                           <a href='<?php echo base_url();?>Pages/product_details/<?php echo $bdata['id'];?>'>
                           <img alt='Charming  Blue Kurta' src='<?php echo site_url(); ?>admin/upload/product_images/<?php echo @$bdata['image'];?>'>
                           </a>
                        </div>
                        <figcaption>
                           <div class='inner-product-desc'>
                              <h2 class='product-title'><?php echo @$bdata['product_name']?></h2>
                              <p class='product-price'>
                                 <i class='rupee'>₹</i> <?php echo @$bdata['mrp_price']?>.00
                              </p>
                              <a class='btn' href='<?php echo base_url();?>Pages/product_details/<?php echo $bdata['id'];?>'>
                              Shop Now
                              </a>
                           </div>
                        </figcaption>
                     </figure>

                  <?php }?>
                     
                     <div class='clear'></div>
                  </section>
                  <div class='clear'></div>
                <!--   <div id='pagination'>
                     <a class='btn red-btn' href='javascript:void(0);' onclick='set_pagination()'>Load more</a>
                     <nav class="pagination">
                        <span class="page current">
                        1
                        </span>
                        <span class="page">
                        <a href="kids-kurta4658.html?page=2" rel="next">2</a>
                        </span>
                        <span class="page">
                        <a href="kids-kurta9ba9.html?page=3">3</a>
                        </span>
                        <span class="next">
                        <a href="kids-kurta4658.html?page=2" rel="next">Next &rsaquo;</a>
                        </span>
                        <span class="last">
                        <a href="kids-kurta9ba9.html?page=3">Last &raquo;</a>
                        </span>
                     </nav>
                  </div> -->
                  <div class='sucess-loader-overlay'></div>
                  <div id='loader'>
                     <img alt='main loader' src=' <?php echo base_url();?>/assets/loading_icon.gif'>
                  </div>
                  <div class='clear'></div>
               </div>
            </div>
           <!--  <section class='listing-description desktop-view'>
               <div class='container'>
                  <p>
                     A perfect blend of royal and festive designs emulated into trendy traditional wear for your little ones! Give your kids a princely feel with our imperial collection of kurtas, churidaars and more. With many appealing colours and fabrics to choose from, your kids will surely outshine everyone else.
                     <a class='list-read-more' href='javascript:;'>read more</a>
                  </p>
               </div>
            </section> -->
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
         <div class='overlay'></div>
         <div class='mobile-sort-box'>
            <h2 class='heading02'>Sort</h2>
            <ul class='mob-product-list sort-product-list-mob'>
               <li dta='bestseller'>Bestseller</li>
               <li dta='newarrival'>New Arrival</li>
               <li dta='popularity'>Popularity</li>
               <li dta='htl'>Price: High to Low</li>
               <li dta='lth'>Price: Low to High</li>
            </ul>
         </div>
         <div class='filter-sort-wrapper mobile-view'>
            <p class='show-mob-filter w-50'>filter</p>
            <p class='show-mob-sort w-50'>sort</p>
         </div>
         <div class='list-desc-popup'>
            <span class='close-desc-popup'>
            X
            </span>
            <h2>Kids Kurta</h2>
            <div class='vertical-scroll'>
               <p>
                  A perfect blend of royal and festive designs emulated into trendy traditional wear for your little ones! Give your kids a princely feel with our imperial collection of kurtas, churidaars and more. With many appealing colours and fabrics to choose from, your kids will surely outshine everyone else.
               </p>
               <p>Occasions are never ending and every parent wants to dress up their child in the best of the clothes. Be it parties, anniversaries, weddings or festivals, on every occasion, the family wants their child to look the best. Manyavar has an exquisite range of Indian clothing with outfits for young boys for every occasion. The Indian wear includes Kurtas, Sherwanis, <a href="../men/jacket.html">Jackets</a> and accessories to go with it.</p>
               <p>Manyavar&rsquo;s apparel caters to kids from the ages of 4-12 years. With kids of this age, dressing is never an easy task because they want to get out of the outfit as soon as possible. Manyavar offers comfort and designer clothing for kids, which makes this ordeal easier. The kids have a wide range of designs and exclusive patterns to choose from. The types of apparel range from classy Kurta Pajamas, Dhoti Kurtas, Sherwanis, Kurtas with Brijes, Kurtas with <a href="../men/jacket.html">Nehru Jacket</a> to Indo-Westerns. The apparels are available in the colours of Princely Blue, Earthy Brown, Happy Yellow, Elegant White, Classic Beiges, and Flamboyant Red.</p>
               <p>The all-new addition to the kid&#39;s wardrobe for the festive season is the set of trendy fusion wear. These outfits are a combination of a kurta with a stylish pair of brijes and a contrast shade designer jacket. Manyavar&rsquo;s <a href="kids-kurta.html">kurtas for kids</a> consist of intricate floral embroidery with &#39;keri&#39; designs and thread work around the collars and a mild touch of sequins, which completes the look for the garment. The Royal Indo Western is a special piece crafted with gold floral motif work all over along with a contrast coloured collar and sleeves, which makes the outfit a royal one for the youngster.</p>
               <p>Manyavar promises value by delivering high quality outfits for the youngsters. Dress your young one with a classy style statement for festivals and wedding ceremonies this year. Our exclusive styles and patterns are available for sale on our online store.&nbsp;</p>
            </div>
         </div>
         