<?php
//echo'<pre>';print_r($child_category_data);
?>

        <main id='main-wrapper'>
            <?php foreach($home_top_silider_data as $key=>$value){?>
            <section class='banner-section'>
                <div class='banner-box'>
                    <div class='banner-item'>
                        <a href='#'>
                            <img alt='' class='mob-hide' src='<?php echo site_url(); ?>admin/upload/cat_images/<?php echo @$value['image_url'];?>'>
                            <img alt='' class='desk-hide' src='<?php echo site_url(); ?>admin/upload/cat_images/<?php echo @$value['image_url'];?>'>
                        </a>
                    </div>
                </div>
            </section>
        <?php }?>
         
            <section class='section men-accessories-section men-section'>
                <div class='accessory-para'>
                    <div class='inner-container'>
                        <h2 class='section-heading'>
                          <span class='heading02'>
                          Jamai Raja
                          </span>
                          <span class='heading03'>Celebration Wear for Men</span>
                          </h2>
                        <div class='men-access-product-wrap'>
                            <!-- mens-access-box close -->
                            <?php if(!empty($child_category_data)){  
                   $i=1; foreach($child_category_data as $key=>$rowprd){?> 
                            <figure class='mens-access-box'>
                                <a href='<?php echo base_url();?>/Pages/common_page/<?php echo @$rowprd['id'];?>'>
                                    <div class='frame-box'>
                                        <img alt='' src='<?php echo site_url();?>images/mens_pro_bg.png'>
                                    </div>
                                    <div class='inner-access-box'>
                                        <div class='access-img-box'>
                                            <img alt='' src='<?php echo site_url(); ?>admin/upload/cat_images/<?php echo @$rowprd['image_url'];?>'>
                                        </div>
                                        <figcaption>
                                            <div>
                                                <a href="<?php echo base_url();?>/Pages/common_page/<?php echo @$rowprd['id'];?>"><h2 class='heading02'><?php echo @$rowprd['sub_child_category_name'];?></h2></a>
                                                <a class='view-btn' href='<?php echo base_url();?>/Pages/common_page/<?php echo @$rowprd['id'];?>'>
                                                View
                                                <i class='sprite view-arrow'></i>
                                                </a>
                                            </div>
                                        </figcaption>
                                    </div>
                                </a>
                            </figure>
                            <?php $i++;}}?>
                           
                            <!-- mens-access-box close -->
                            
                            <!-- mens-access-box close -->
                            <div class='clear'></div>
                        </div>
                    </div>
                </div>
            </section>
            <section class='trending-arriaval-section arrival-section men-arrival mob-hide'>
                <div class='trending-box'>
                    <h3 class='heading02'>New Arrivals</h3>
                    <div class='tab-container'>
                        <div class='tab-box active'>
                            <div class='product-slider'>
                                <?php
                                // print_r($home_buy_products);
                                 foreach ($home_buy_products as $key => $bdata) {
                                     # code...
                                 
                                ?>
                                <figure class='product-box'>
                                    <a class="wishlist-icon" data-remote="true" href="sign_in.html" onClick="OpenLoader();"><i class='fa fa-heart-o' id='wishlist_3612'></i>
                                      </a>
                                    <div class='prodcut-img fix-img-box'>
                                        <a href='<?php echo base_url();?>Pages/product_details/<?php echo $bdata['id'];?>'>
                                            <img alt='Fancy Fawn Patterned Indo-Western Set' src='<?php echo site_url(); ?>admin/upload/product_images/<?php echo @$bdata['image'];?>'>
                                        </a>
                                    </div>
                                    <figcaption>
                                        <div class='inner-product-desc'>
                                           <a href="<?php echo base_url();?>Pages/product_details/<?php echo $bdata['id'];?>"><h2 class='product-title'><?php echo @$bdata['product_name']?></h2></a>
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
                </div>
            </section>
            <section class='section view-accessories-section mob-hide'>
                <div class='container'>
                	<?php
                    // print_r($accessories_category_data);
                	?>
                    <div class='men-acc-box-wrapper'>
                         <?php if(!empty($accessories_category_data)){  
                          $i=1; foreach($accessories_category_data as $key=>$rowprd){?> 
                        <figure class='men-acc-box w-25'>
                            <p class='top-left-strip'></p>
                            <p class='top-right-strip'></p>
                            <p class='bottom-left-strip'></p>
                            <p class='bottom-right-strip'></p>
                            <a href='<?php echo base_url();?>/Pages/common_page/<?php echo @$rowprd['id'];?>'>
                                <div class='img-box fix-img-box'>
                                    <img alt='' src='<?php echo site_url(); ?>admin/upload/cat_images/<?php echo @$rowprd['image_url'];?>'>
                                </div>
                                <figcaption>
                                    <h2 class='heading02'><?php echo @$rowprd['sub_child_category_name'];?></h2>
                                    <span class='view-btn'>
                                    View
                                    <i class='sprite view-arrow'></i>
                                    </span>
                                </figcaption>
                            </a>
                        </figure>
                    <?php } }?>
                        <!-- men-acc-box close -->
                        
                        <!-- men-acc-box close -->
                        <div class='clear'></div>
                    </div>
                    <!-- <a class='btn red-btn' href='../accessories.html'>View Accessories</a> -->
                </div>
                <div class='clear'></div>
            </section>
            <!-- view-accessories-section close -->
            <section class='men-compelete-section desk-hide'>
                <a href='javascript:;'>
                    <img alt='' src='<?php echo site_url();?>images/men_complete_lookc4f5.jpg'>
                </a>
            </section>
            <section class='kurta-banner-section'>
                <a href='#'>
                    <img alt='' class='mob-hide' src='images/Manyavar_Web_Men_Wedding_Category01c6.jpg'>
                    <img alt='' class='desk-hide' src='images/Manyavar_mWeb_Men_Wedding3fcc.jpg'>
                </a>
            </section>
         
            <section class='section mob-trending-section mob-mohey-trending pt-0 desk-hide'>
                <div class='tab-header'>
                    <ul class='tab-list'>
                        <li class='active' data-tab='new-arrivals'>
                            <h2>New Arrivals</h2>
                        </li>
                        <li data-tab='best-sellers'>
                            <h2>BEST SELLERS</h2>
                        </li>
                    </ul>
                    <div class='clear'></div>
                </div>
                <div class='mobile-container tab-container'>
                    <div class='tab-box active' id='new-arrivals'>
                        <div class='mob-trendy-slider'>
                            <figure class='product-box'>
                                <a class="wishlist-icon" data-remote="true" href=" sign_in.html" onClick="OpenLoader();"><i class='fa fa-heart-o' id='wishlist_3578'></i>
                                  </a>
                                <div class='prodcut-img fix-img-box'>
                                    <img alt='Studded Blue Suit Set' src='<?php echo site_url();?>images/KSS_8009b27a.jpg'>
                                </div>
                                <figcaption>
                                    <div class='inner-product-desc'>
                                        <h2 class='product-title'>Studded Blue Suit Set</h2>
                                        <p class='product-price'>
                                            <i class='rupee'>`</i> 9999
                                        </p>
                                        <a class='btn red-btn' href='<?php echo site_url();?>pages/productDetails'>Shop Now</a>
                                    </div>
                                </figcaption>
                            </figure>
                            <figure class='product-box'>
                                <a class="wishlist-icon" data-remote="true" href=" sign_in.html" onClick="OpenLoader();"><i class='fa fa-heart-o' id='wishlist_3323'></i>
                                  </a>
                                <div class='prodcut-img fix-img-box'>
                                    <img alt='Fashionable Beige Indo Western kurta set' src='<?php echo site_url();?>images/KSS_5574a4e4.jpg'>
                                </div>
                                <figcaption>
                                    <div class='inner-product-desc'>
                                        <h2 class='product-title'>Fashionable Beige Indo Western kurta set</h2>
                                        <p class='product-price'>
                                            <i class='rupee'>`</i> 17999
                                        </p>
                                        <a class='btn red-btn' href='<?php echo site_url();?>pages/productDetails'>Shop Now</a>
                                    </div>
                                </figcaption>
                            </figure>
                            <figure class='product-box'>
                                <a class="wishlist-icon" data-remote="true" href=" sign_in.html" onClick="OpenLoader();"><i class='fa fa-heart-o' id='wishlist_3579'></i>
                                    </a>
                                <div class='prodcut-img fix-img-box'>
                                    <img alt='Perfectly Stitched Velvet Blue Indo Western Set' src='<?php echo site_url();?>images/KSS_78319c00.jpg'>
                                </div>
                                <figcaption>
                                    <div class='inner-product-desc'>
                                        <h2 class='product-title'>Perfectly Stitched Velvet Blue Indo Western Set</h2>
                                        <p class='product-price'>
                                            <i class='rupee'>`</i> 10999
                                        </p>
                                        <a class='btn red-btn' href='<?php echo site_url();?>pages/productDetails'>Shop Now</a>
                                    </div>
                                </figcaption>
                            </figure>
                            <figure class='product-box'>
                                <a class="wishlist-icon" data-remote="true" href=" sign_in.html" onClick="OpenLoader();"><i class='fa fa-heart-o' id='wishlist_3324'></i>
                                  </a>
                                <div class='prodcut-img fix-img-box'>
                                    <img alt='Black Glam Indo Western kurta set' src='<?php echo site_url();?>images/KSS_5394c6cb.jpg'>
                                </div>
                                <figcaption>
                                    <div class='inner-product-desc'>
                                        <h2 class='product-title'>Black Glam Indo Western kurta set</h2>
                                        <p class='product-price'>
                                            <i class='rupee'>`</i> 14999
                                        </p>
                                        <a class='btn red-btn' href='<?php echo site_url();?>pages/productDetails'>Shop Now</a>
                                    </div>
                                </figcaption>
                            </figure>
                            <figure class='product-box'>
                                <a class="wishlist-icon" data-remote="true" href=" sign_in.html" onClick="OpenLoader();"><i class='fa fa-heart-o' id='wishlist_3580'></i>
                                    </a>
                                <div class='prodcut-img fix-img-box'>
                                    <img alt='Smart And Ethnic Deep Blue Indo Western Set' src='<?php echo site_url();?>images/KSS_807123b1.jpg'>
                                </div>
                                <figcaption>
                                    <div class='inner-product-desc'>
                                        <h2 class='product-title'>Smart And Ethnic Deep Blue Indo Western Set</h2>
                                        <p class='product-price'>
                                            <i class='rupee'>`</i> 12999
                                        </p>
                                        <a class='btn red-btn' href='<?php echo site_url();?>pages/productDetails'>Shop Now</a>
                                    </div>
                                </figcaption>
                            </figure>
                            <figure class='product-box'>
                                <a class="wishlist-icon" data-remote="true" href=" sign_in.html" onClick="OpenLoader();"><i class='fa fa-heart-o' id='wishlist_3325'></i>
                                      </a>
                                <div class='prodcut-img fix-img-box'>
                                    <img alt='Delightful Beige Indo Western kurta set' src='<?php echo site_url();?>images/KSS_5772d60b.jpg'>
                                </div>
                                <figcaption>
                                    <div class='inner-product-desc'>
                                        <h2 class='product-title'>Delightful Beige Indo Western kurta set</h2>
                                        <p class='product-price'>
                                            <i class='rupee'>`</i> 11999
                                        </p>
                                        <a class='btn red-btn' href='<?php echo site_url();?>pages/productDetails'>Shop Now</a>
                                    </div>
                                </figcaption>
                            </figure>
                            <figure class='product-box'>
                                <a class="wishlist-icon" data-remote="true" href=" sign_in.html" onClick="OpenLoader();"><i class='fa fa-heart-o' id='wishlist_3326'></i>
                                  </a>
                                <div class='prodcut-img fix-img-box'>
                                    <img alt='Stellar Cream Kurta' src='<?php echo site_url();?>images/KSS_5795dc70.jpg'>
                                </div>
                                <figcaption>
                                    <div class='inner-product-desc'>
                                        <h2 class='product-title'>Stellar Cream Kurta</h2>
                                        <p class='product-price'>
                                            <i class='rupee'>`</i> 2999
                                        </p>
                                        <a class='btn red-btn' href='<?php echo site_url();?>pages/productDetails'>Shop Now</a>
                                    </div>
                                </figcaption>
                            </figure>
                            <figure class='product-box'>
                                <a class="wishlist-icon" data-remote="true" href=" sign_in.html" onClick="OpenLoader();"><i class='fa fa-heart-o' id='wishlist_3582'></i>
                                  </a>
                                <div class='prodcut-img fix-img-box'>
                                    <img alt='Contemporary Blue Side Buttoned Suit Set' src='<?php echo site_url();?>images/KSS_77829abf.jpg'>
                                </div>
                                <figcaption>
                                    <div class='inner-product-desc'>
                                        <h2 class='product-title'>Contemporary Blue Side Buttoned Suit Set</h2>
                                        <p class='product-price'>
                                            <i class='rupee'>`</i> 11999
                                        </p>
                                        <a class='btn red-btn' href='<?php echo site_url();?>pages/productDetails'>Shop Now</a>
                                    </div>
                                </figcaption>
                            </figure>
                            <figure class='product-box'>
                                <a class="wishlist-icon" data-remote="true" href=" sign_in.html" onClick="OpenLoader();"><i class='fa fa-heart-o' id='wishlist_3327'></i>
                                  </a>
                                <div class='prodcut-img fix-img-box'>
                                    <img alt='Azure Blue Indo Western Kurta Set' src='<?php echo site_url();?>images/KSS_53473f79.jpg'>
                                </div>
                                <figcaption>
                                    <div class='inner-product-desc'>
                                        <h2 class='product-title'>Azure Blue Indo Western Kurta Set</h2>
                                        <p class='product-price'>
                                            <i class='rupee'>`</i> 19999
                                        </p>
                                        <a class='btn red-btn' href='<?php echo site_url();?>pages/productDetails'>Shop Now</a>
                                    </div>
                                </figcaption>
                            </figure>
                            <figure class='product-box'>
                                <a class="wishlist-icon" data-remote="true" href="##" onClick="OpenLoader();"><i class='fa fa-heart-o' id='wishlist_3583'></i>
                                  </a>
                                <div class='prodcut-img fix-img-box'>
                                    <img alt='Green Regalia Sherwani' src='<?php echo site_url();?>images/KSS_7947768e.jpg'>
                                </div>
                                <figcaption>
                                    <div class='inner-product-desc'>
                                        <h2 class='product-title'>Green Regalia Sherwani</h2>
                                        <p class='product-price'>
                                            <i class='rupee'>`</i> 15999
                                        </p>
                                        <a class='btn red-btn' href='<?php echo site_url();?>pages/productDetails'>Shop Now</a>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <div class='tab-box' id='best-sellers'>
                        <div class='mob-trendy-slider'>
                            <figure class='product-box'>
                                <a class="wishlist-icon" data-remote="true" href=" sign_in.html" onClick="OpenLoader();"><i class='fa fa-heart-o' id='wishlist_125'></i>
                                  </a>
                                <div class='prodcut-img fix-img-box'>
                                    <a href='##'>
                                        <img alt='Classic Silk Jacquard Kurta Set for Festival' src='<?php echo site_url();?>images/S952195-303_-_1_19df6.jpg'>
                                    </a>
                                </div>
                                <figcaption>
                                    <div class='inner-product-desc'>
                                        <h2 class='product-title'>Classic Silk Jacquard Kurta Set for Festival</h2>
                                        <p class='product-price'>
                                            <i class='rupee'>`</i> 1999
                                        </p>
                                        <a class='btn' href='<?php echo site_url();?>pages/productDetails'>
                                      Shop Now
                                      </a>
                                    </div>
                                </figcaption>
                            </figure>
                            <figure class='product-box'>
                                <a class="wishlist-icon" data-remote="true" href=" sign_in.html" onClick="OpenLoader();"><i class='fa fa-heart-o' id='wishlist_166'></i>
                                  </a>
                                <div class='prodcut-img fix-img-box'>
                                    <a href='##'>
                                        <img alt='Casual Maroon Kurta' src='<?php echo site_url();?>images/ML11830-3071b18.jpg'>
                                    </a>
                                </div>
                                <figcaption>
                                    <div class='inner-product-desc'>
                                        <h2 class='product-title'>Casual Maroon Kurta</h2>
                                        <p class='product-price'>
                                            <i class='rupee'>`</i> 1199
                                        </p>
                                        <a class='btn' href='<?php echo site_url();?>pages/productDetails'>
                                        Shop Now
                                        </a>
                                    </div>
                                </figcaption>
                            </figure>
                            <figure class='product-box'>
                                <a class="wishlist-icon" data-remote="true" href="##" onClick="OpenLoader();"><i class='fa fa-heart-o' id='wishlist_921'></i>
                                  </a>
                                <div class='prodcut-img fix-img-box'>
                                    <a href='##'>
                                        <img alt='Classic Grey Kurta' src='<?php echo site_url();?>images/KSS_991171c8.jpg'>
                                    </a>
                                </div>
                                <figcaption>
                                    <div class='inner-product-desc'>
                                        <h2 class='product-title'>Classic Grey Kurta</h2>
                                        <p class='product-price'>
                                            <i class='rupee'>`</i> 1699
                                        </p>
                                        <a class='btn' href='<?php echo site_url();?>pages/productDetails'>
                                        Shop Now
                                        </a>
                                    </div>
                                </figcaption>
                            </figure>
                            <figure class='product-box'>
                                <a class="wishlist-icon" data-remote="true" href=" sign_in.html" onClick="OpenLoader();"><i class='fa fa-heart-o' id='wishlist_1762'></i>
                                  </a>
                                <div class='prodcut-img fix-img-box'>
                                    <a href='##'>
                                        <img alt='Green Cotton Kurta for Festival' src='<?php echo site_url();?>images/14364.jpg'>
                                    </a>
                                </div>
                                <figcaption>
                                    <div class='inner-product-desc'>
                                        <h2 class='product-title'>Green Cotton Kurta for Festival</h2>
                                        <p class='product-price'>
                                            <i class='rupee'>`</i> 1599
                                        </p>
                                        <a class='btn' href='<?php echo site_url();?>pages/productDetails'>
                                        Shop Now
                                        </a>
                                    </div>
                                </figcaption>
                            </figure>
                            <figure class='product-box'>
                                <a class="wishlist-icon" data-remote="true" href="##" onClick="OpenLoader();"><i class='fa fa-heart-o' id='wishlist_1850'></i>
                                      </a>
                                <div class='prodcut-img fix-img-box'>
                                    <a href='##'>
                                        <img alt='Green Velvety Kurta And Churidar' src='<?php echo site_url();?>images/10cab.jpg'>
                                    </a>
                                </div>
                                <figcaption>
                                    <div class='inner-product-desc'>
                                        <h2 class='product-title'>Green Velvety Kurta And Churidar</h2>
                                        <p class='product-price'>
                                            <i class='rupee'>`</i> 2999
                                        </p>
                                        <a class='btn' href='<?php echo site_url();?>pages/productDetails'>
                                        Shop Now
                                        </a>
                                    </div>
                                </figcaption>
                            </figure>
                            <figure class='product-box'>
                                <a class="wishlist-icon" data-remote="true" href=" sign_in.html" onClick="OpenLoader();"><i class='fa fa-heart-o' id='wishlist_2071'></i>
                                </a>
                                <div class='prodcut-img fix-img-box'>
                                    <a href='##'>
                                        <img alt='Floral Printed Blue Kurta' src='<?php echo site_url();?>images/1f0e7.jpg'>
                                    </a>
                                </div>
                                <figcaption>
                                    <div class='inner-product-desc'>
                                        <h2 class='product-title'>Floral Printed Blue Kurta</h2>
                                        <p class='product-price'>
                                            <i class='rupee'>`</i> 2999
                                        </p>
                                        <a class='btn' href='<?php echo site_url();?>pages/productDetails'>
                                        Shop Now
                                        </a>
                                    </div>
                                </figcaption>
                            </figure>
                            <figure class='product-box'>
                                <a class="wishlist-icon" data-remote="true" href=" sign_in.html" onClick="OpenLoader();"><i class='fa fa-heart-o' id='wishlist_2079'></i>
                                  </a>
                                <div class='prodcut-img fix-img-box'>
                                    <a href='##'>
                                        <img alt='Trendy Light Cream Kurta Churidar' src='<?php echo site_url();?>images/1e5f7.jpg'>
                                    </a>
                                </div>
                                <figcaption>
                                    <div class='inner-product-desc'>
                                        <h2 class='product-title'>Trendy Light Cream Kurta Churidar</h2>
                                        <p class='product-price'>
                                            <i class='rupee'>`</i> 1499
                                        </p>
                                        <a class='btn' href='<?php echo site_url();?>pages/productDetails'>
                                        Shop Now
                                        </a>
                                    </div>
                                </figcaption>
                            </figure>
                            <figure class='product-box'>
                                <a class="wishlist-icon" data-remote="true" href=" sign_in.html" onClick="OpenLoader();"><i class='fa fa-heart-o' id='wishlist_2722'></i>
                                  </a>
                                <div class='prodcut-img fix-img-box'>
                                    <a href='../assymetrical-yellow-kurta-set-s952830-328.html'>
                                        <img alt='Asymmetrical Yellow  Kurta' src='<?php echo site_url();?>images/MLOSK305-3284c83.jpg'>
                                    </a>
                                </div>
                                <figcaption>
                                    <div class='inner-product-desc'>
                                        <h2 class='product-title'>Asymmetrical Yellow  Kurta</h2>
                                        <p class='product-price'>
                                            <i class='rupee'>`</i> 2999
                                        </p>
                                        <a class='btn' href='<?php echo site_url();?>pages/productDetails'>
                                        Shop Now
                                        </a>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section kid-father-section kids-fathson-section">
                <div class="inner-container">
                    <figure class="kids-father-box">
                        <!-- / %p.like-fat-mob.desk-hide Fathers Day Collection -->
                        <p class="fat-son-mob desk-hide">

                            New Arrivals for
                            <br> this Festive Season
                        </p>
                        <div class="son-img">
                            <div>
                                <img alt="" src="<?php echo base_url(); ?>admin/upload/charity/<?php echo  @$festive_season[0]->logo;?>">
                            </div>
                            <a class="btn l-btn red-btn desk-hide" href="/kids/new-arrivals-kids">View Collection</a>
                        </div>
                        <figcaption>
                            <p class="heading-strip">
                                <img alt="" src="https://images.manyavar.com/<?php echo site_url();?>images/son_heading_strip.png">
                            </p>
                            <h2 class="heading02">

                          <?php 
                         
                          echo @$festive_season[0]->name;?>
                           
                              </h2>
                            <p>
                               <?php echo @$festive_season[0]->description;?>
                            </p>
                            <!-- <a class="btn red-btn l-btn" href="/kids/new-arrivals-kids">View All</a> -->
                        </figcaption>
                    </figure>
                </div>
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
                            <h2 class='usp-heading'>National Shipping</h2>
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

        