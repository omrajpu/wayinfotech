
      <!--Search popup start-->
      <div id="myOverlay" class="overlay_1">
         <span class="closebtn" onclick="closeSearch()" title="Close Overlay">x</span>
         <div class="overlay-content">
            <form action="/action_page.php">
               <input type="text" placeholder="Search.." name="search">
               <button type="submit"><i class="fa fa-search"></i></button>
            </form>
         </div>
      </div>
      <!--Search popup End-->
      <section class="vc_custom1 about-m">
         <div id="spc"></div>
         <div class="about-title">
            <h1>Details</h1>
            <h4 id="link"><a href="">Home</a>&nbsp;&nbsp; > &nbsp;&nbsp;My Account</h4>
         </div>
         <div id="spc"></div>
      </section>
      <div style="height: 70px;"></div>
      <div class="container">
         <div class="row">
             
                     <?php $this->load->view('include/left_sidebar'); ?>
            <div class="col-md-9 col-sm-9 useraccount">
               <div class="details-area bg-white mycredit">
                  <h4>Invite Friend's</h4>
                  <hr>
                  <div class="col-xs-12 ">
                     <nav>
                        <div class="nav nav-tabs nav-fill invite-tab" id="nav-tab" role="tablist">
                           <a class="nav-item nav-link active invite-tab" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true"style="color: rgba(0,0,0,.54);">Refer a friend - Mobile</a>
                           <a class="nav-item nav-link invite-tab" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"style="color: rgba(0,0,0,.54);">Refer a friend - Email</a>
                           <a class="nav-item nav-link invite-tab" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"></a>
                           <a class="nav-item nav-link invite-tab" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false"></a>
                        </div>
                     </nav>
                     <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                           <div class="flex-column">
                              <span class="refer-friend-info"> Enjoy using Jeweller Fashion Jewelry? Share the experience with your friends too.</span><span class="refer-friend-info"> Total friends referred: 0 </span><span class="refer-friend-info"> Your unique referral link: <span class="blue-text cursor-pointer">https://www.test.co/Jewellery</span> </span><span class="refer-friend-info"> Enter the Mobile Number of friends you wish to refer.<span class="asterisk">*</span></span>
                              <div class="flex-row textfield-flex">
                            <form>
                                <div class="md-form link-input">
                                    <input type="text" id="form100" class="form-control invite-mob">
                                    <label for="form100">Enter the Mobile Number</label>
                                  </div>
                                  </form>
                              </div>
                              <button type="button" class="btn btn_feature" data-toggle="button" aria-pressed="false" autocomplete="off">
                                Refer a Friend
                            </button>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="flex-column">
                                <span class="refer-friend-info"> Enjoy using Jeweller Fashion Jewelry? Share the experience with your friends too.</span><span class="refer-friend-info"> Total friends referred: 0 </span><span class="refer-friend-info"> Your unique referral link: <span class="blue-text cursor-pointer">https://www.test.co/Jewellery</span> </span><span class="refer-friend-info">Enter the Email of friends you wish to refer.<span class="asterisk">*</span></span>
                                <div class="flex-row textfield-flex">
                              <form>
                                  <div class="md-form link-input">
                                      <input type="text" id="form100" class="form-control invite-mob">
                                      <label for="form100">Enter the Mobile Email</label>
                                    </div>
                                    </form>
                                </div>
                                <button type="button" class="btn btn_feature" data-toggle="button" aria-pressed="false" autocomplete="off">
                                  Refer a Friend
                              </button>
                             </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div style="height: 70px;"></div>
      <!-- Footer -->
      <div class="g-bg-black-opacity-0_9 g-color-white-opacity-0_8 g-py-60">
         <div class="container">
            <div class="row">
               <!-- Footer Content -->
               <div class="col-lg-3 col-md-6 g-mb-40 g-mb-0--lg">
                  <div class="u-heading-v3-1 g-brd-white-opacity-0_3 g-mb-25">
                     <h2 class="u-heading-v3__title h6 text-uppercase g-brd-primary">About-us</h2>
                  </div>
                  <p>About Unify dolor sit amet, consectetur adipiscing elit. Maecenas eget nisl id libero tincidunt sodales.</p>
                  <p class="mb-0">Duis eleifend fermentum ante ut aliquam. Cras mi risus, dignissim sed adipiscing ut, placerat non arcu.</p>
               </div>
               <!-- End Footer Content -->
               <!-- Footer Content -->
               <div class="col-lg-3 col-md-6 g-mb-40 g-mb-0--lg">
                  <div class="u-heading-v3-1 g-brd-white-opacity-0_3 g-mb-25">
                     <h2 class="u-heading-v3__title h6 text-uppercase g-brd-primary">Latest Posts</h2>
                  </div>
                  <article>
                     <h3 class="h6 g-mb-2">
                        <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">Incredible template</a>
                     </h3>
                     <div class="small g-color-white-opacity-0_6">May 8, 2017</div>
                  </article>
                  <hr class="g-brd-white-opacity-0_1 g-my-10">
                  <article>
                     <h3 class="h6 g-mb-2">
                        <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">New features</a>
                     </h3>
                     <div class="small g-color-white-opacity-0_6">June 23, 2017</div>
                  </article>
                  <hr class="g-brd-white-opacity-0_1 g-my-10">
                  <article>
                     <h3 class="h6 g-mb-2">
                        <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">New terms and conditions</a>
                     </h3>
                     <div class="small g-color-white-opacity-0_6">September 15, 2017</div>
                  </article>
               </div>
               <!-- End Footer Content -->
               <!-- Footer Content -->
               <div class="col-lg-3 col-md-6 g-mb-40 g-mb-0--lg">
                  <div class="u-heading-v3-1 g-brd-white-opacity-0_3 g-mb-25">
                     <h2 class="u-heading-v3__title h6 text-uppercase g-brd-primary">Useful Links</h2>
                  </div>
                  <nav class="text-uppercase1">
                     <ul class="list-unstyled g-mt-minus-10 mb-0">
                        <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                           <h4 class="h6 g-pr-20 mb-0">
                              <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">About Us</a>
                              <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
                           </h4>
                        </li>
                        <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                           <h4 class="h6 g-pr-20 mb-0">
                              <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">Portfolio</a>
                              <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
                           </h4>
                        </li>
                        <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                           <h4 class="h6 g-pr-20 mb-0">
                              <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">Our Services</a>
                              <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
                           </h4>
                        </li>
                        <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                           <h4 class="h6 g-pr-20 mb-0">
                              <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">Latest Jobs</a>
                              <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
                           </h4>
                        </li>
                        <li class="g-pos-rel g-py-10">
                           <h4 class="h6 g-pr-20 mb-0">
                              <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">Contact Us</a>
                              <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
                           </h4>
                        </li>
                     </ul>
                  </nav>
               </div>
               <!-- End Footer Content -->
               <!-- Footer Content -->
               <div class="col-lg-3 col-md-6">
                  <div class="u-heading-v3-1 g-brd-white-opacity-0_3 g-mb-25">
                     <h2 class="u-heading-v3__title h6 text-uppercase g-brd-primary">Our Contacts</h2>
                  </div>
                  <address class="g-bg-no-repeat g-font-size-12 mb-0" style="background-image: url(img/map2.png);">
                     <!-- Location -->
                     <div class="d-flex g-mb-20">
                        <div class="g-mr-10">
                           <span class="u-icon-v3 u-icon-size--xs g-bg-white-opacity-0_1 g-color-white-opacity-0_6">
                           <i class="fa fa-map-marker"></i>
                           </span>
                        </div>
                        <p class="mb-0">795 Folsom Ave, Suite 600,
                           <br>
                           San Francisco, CA 94107 795
                        </p>
                     </div>
                     <!-- End Location -->
                     <!-- Phone -->
                     <div class="d-flex g-mb-20">
                        <div class="g-mr-10">
                           <span class="u-icon-v3 u-icon-size--xs g-bg-white-opacity-0_1 g-color-white-opacity-0_6">
                           <i class="fa fa-phone"></i>
                           </span>
                        </div>
                        <p class="mb-0">(+123) 456 7890
                           <br>
                           (+123) 456 7891
                        </p>
                     </div>
                     <!-- End Phone -->
                     <!-- Email and Website -->
                     <div class="d-flex g-mb-20">
                        <div class="g-mr-10">
                           <span class="u-icon-v3 u-icon-size--xs g-bg-white-opacity-0_1 g-color-white-opacity-0_6">
                           <i class="fa fa-globe"></i>
                           </span>
                        </div>
                        <p class="mb-0">
                           <a class="g-color-white-opacity-0_8 g-color-white--hover" href="mailto:info@htmlstream.com">info@htmlstream.com</a>
                           <br>
                           <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">www.htmlstream.com</a>
                        </p>
                     </div>
                     <!-- End Email and Website -->
                  </address>
               </div>
               <!-- End Footer Content -->
            </div>
         </div>
      </div>
      <!-- End Footer -->
      <!-- Copyright Footer -->
     