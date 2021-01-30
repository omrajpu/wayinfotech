     <main id='main-wrapper'>
            <section class='listing-banner-section desktop-view'>
               <img alt='Kids Kurta' src='<?php echo base_url();?>/category_detail_banner/34/original/Manyavar_Listing_Banner_Kids_Kurtas034e.jpg?1559647370'>
               <div class='innerpage-banner-text'></div>
            </section>
            <section class='inner-section-heading'>
               <div class='container'>
                  <ul class='bread-cum'>
                     <li>
                        <a href='../index.html'>Home</a>
                     </li>
                     <li>
                        <a href='../kids.html'>KIDS</a>
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
               <div class='product-listin-header'>
                  <div class='container'>
                     <div class='product-found'>
                        <p>
                           <span class='product-cnt'>51</span>
                           Products found
                        </p>
                     </div>
                     <!-- <div class='sort-product'>
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
                     </div> -->
                  </div>
               </div>
            </section>
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
                           <a class='clear-all desktop-view' href='#'>Clear All</a>
                           <p class='close-filter mobile-view'>
                              <i class='sprite close-filter-icon'></i>
                           </p>
                        </div> -->
                        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
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
                          
                        </div>
                        <p class='mob-clear-all mobile-view'>
                           <a href='kids-kurta.html'>Clear All</a>
                        </p>
                        <button class='apply-btn mobile-view close-filter' onclick='javascript:void(0);' type='button'>Apply</button>
                     </aside>
                  </form>
                  <section class='product-listing-section' id="product_data">
                      <?php
                        // print_r($home_buy_products);
                       if(!empty(@$home_buy_products)){
                        foreach (@$home_buy_products as $key => $bdata) {
                          ?>
                     <figure class='product-box'>
                        <a class="wishlist-icon" data-remote="true" href="#" onClick="OpenLoader();"><i class='; fa fa-heart-o' id='wishlist_1511'></i>
                        </a>
                        <div class='prodcut-img fix-img-box'>
                           <a href='<?php echo base_url();?>Pages/product_details/<?php echo $bdata['id'];?>'>
                           <img alt='Charming  Blue Kurta' src='<?php echo site_url(); ?>admin/upload/product_images/<?php echo @$bdata['image'];?>'>
                           </a>
                        </div>
                        <figcaption>
                           <div class='inner-product-desc'>
                              <h2 class='product-title'><?php echo @$bdata['product_name']?></h2>
                              <p class='product-price'>
                                 <i class='rupee'>`</i> <?php echo @$bdata['mrp_price']?>
                              </p>
                              <a class='btn' href='<?php echo base_url();?>Pages/product_details/<?php echo $bdata['id'];?>'>
                              Shop Now
                              </a>
                           </div>
                        </figcaption>
                     </figure>

                  <?php } } else{?>
                    
                       <h4>Your search returns ‘0’ results.</h4>
<p>Please check the spelling or try searching something else</p>


                     
                      
                  <?php }?>
                    
                     <div class='clear'></div>
                  </section>
                  <div class='clear'></div>
                 <!--  <div id='pagination'>
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
            <!-- <section class='listing-description desktop-view'>
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
        <!--  <div class='mobile-sort-box'>
            <h2 class='heading02'>Sort</h2>
            <ul class='mob-product-list sort-product-list-mob'>
               <li dta='bestseller'>Bestseller</li>
               <li dta='newarrival'>New Arrival</li>
               <li dta='popularity'>Popularity</li>
               <li dta='htl'>Price: High to Low</li>
               <li dta='lth'>Price: Low to High</li>
            </ul>
         </div> -->
         <!-- <div class='filter-sort-wrapper mobile-view'>
            <p class='show-mob-filter w-50'>filter</p>
            <p class='show-mob-sort w-50'>sort</p>
         </div> -->
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
         