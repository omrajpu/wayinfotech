<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
         function __construct(){
			parent::__construct();
			$this->load->model('Home_model');
			$this->load->library('session');
      $this->load->model('../../Common/Crud_model');
			$this->load->helper(array('form', 'url','new'));

		   }

 public function index()
	        { 
	   	    $data['home_top_silider_data']=$this->Crud_model->getDirectQueryCommonData('SELECT * FROM `top_home_silider` order by id desc');
	        $data['product_list']=$this->Home_model->product_list();
          $data['product_list2']=$this->Home_model->product_list2();
          $data['subview']="home_page";
		      $this->load->view('layout/default', $data);
	       }
public function get_current_address(){
  $latitude=$this->input->post('lat');
  $longitude=$this->input->post('lang');
  // $geocodeFromLatLong = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($latitude).','.trim($longitude).'&sensor=true_or_false&key=AIzaSyCd1tXT-s5A0fx9DfVG-K4TCJQz9mJR3LU');
$geocodeFromLatLong = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($latitude).','.trim($longitude).'&sensor=true_or_false&key=AIzaSyDW-MNsJkIli84no9ZFtyx5uJrEUFPCACE');

// echo'<pre>';print_r($file_contents);
// $geocodeFromLatLong = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($latitude).','.trim($longitude).'&sensor=false'); 
$output = json_decode($geocodeFromLatLong);
$status = $output->status;
$address = ($status=="OK")?$output->results[1]->formatted_address:'';
echo $address;
}
public function get_variant(){
  $pid=$this->input->post('pid');	
  $vid=$this->input->post('vid');
  $product_list=$this->Home_model->single_product_list($pid);
  //print_r($product_list);die;
  if(!empty($product_list)){
                //echo'<pre>';print_r($product_list);
               foreach($product_list as $key=>$product_lists){
                 $image=Get_Productgallery_details_attr(@$product_lists->id,$vid);
                 //print_r($image);
                 $image_url=@$image[0]->image;
                 $price_mrp=@$image[0]->price_mrp;
                 $sp_price=@$image[0]->sp_price;
                 $margin_price=@$image[0]->margin_price;
                 $weight=@$image[0]->weight;
                 ?>
               <div class="item" id="res_data_<?php echo @$product_lists->id;?>">
                  <form name="add_cart" method="post" id="add_cart">
                      <input type="hidden" id="p_id_<?php echo @$product_lists->id;?>" value="<?php echo @$product_lists->id;?>">
                       <input type="hidden" id="v_id_<?php echo @$product_lists->id;?>" value="<?php echo@$image[0]->id;?>">
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
                       <input type="hidden" id="hsn_code_<?php echo @$product_lists->id;?>" name="hsn_code" value="<?php echo @$product_lists->hsn_code;?>">
                      <div class="product">
                     <a href="<?php echo base_url();?>Pages/product_details/<?php echo @$product_lists->id; ?>/<?php echo @$image[0]->id; ?>">
                        <div class="product-header">
                           <span class="badge badge-success"><?php echo @$sp_price;?>% OFF</span>
                           <img class="img-fluid" src="<?php echo site_url(); ?>admin/upload/product_images/<?php echo @$image_url; ?>" alt="">
                           <span class="veg text-success mdi mdi-circle"></span>
                        </div>
                        <div class="product-body">
                           <h5><?php echo @$product_lists->product_name;
                           ?></h5>
                            </a>
                           <h6><strong><span class="mdi mdi-approval"></span> Available in</strong>
                            <select id="available" class="custom-select" name="available" onchange="get_variant(<?php echo @$product_lists->id;?>,this.value)">
                            <?php
                              $product_variant=get_variant(@$product_lists->id);
                              //print_r($product_variant);
                              if(is_array($product_variant) && count($product_variant)){
                                   foreach ($product_variant as $value) {
                                  ?>
                              <option value="<?php echo @$value->id;?>" <?php if($vid==@$value->id){ echo 'selected="selected"';}?>><?php  echo @$value->weight;?> <?php echo @$product_lists->product_amu; ?> - Rs <?php  echo number_format(@$value->margin_price,2);?></option>
                             <?php } }?>
                            </select>
                            <?php //echo @$weight;?> <?php //echo @$product_lists->product_amu;?></h6>
                        </div>
                        
                       <!--  <div class="product-footer">
                           <button id="add_cart_<?php echo @$product_lists->id;?>" type="button" onclick="add_to_cart(<?php echo @$product_lists->id;?>);" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                           <button style="display: none" id="remove_cart_<?php echo @$product_lists->id;?>" type="button" onclick="remove_to_cart(<?php echo @$product_lists->id;?>);" class="btn btn-secondary btn-sm float-right remove-cart-btn"><i class="mdi mdi-cart-outline"></i> Delete Item</button>
                           <p class="offer-price mb-0">₹ <?php echo number_format(@$margin_price,2);?><i class="mdi mdi-tag-outline"></i><br><span class="regular-price">₹ <?php echo number_format(@$price_mrp,2);?></span></p>
                         </div> -->
                         <div class="product-footer">
                          <?php  
                          //$product_variant=get_variant(@$product_lists->id);
                          //echo'<pre>';print_r($product_variant);
                          //$vid=$product_variant[0]->id;
                          $item=get_cart_product(@$product_lists->id,$vid);

                        // echo'<pre>';print_r($item);
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
                           <button <?php if($cart_product_data){ echo 'style="display: none;"';} else{ echo 'style="display: block;"';} ?> id="add_cart_<?php echo @$product_lists->id;?>" type="button" onclick="add_to_cart(<?php echo @$product_lists->id;?>);" class="btn btn-secondary btn-sm float-right add-cat-qty"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                         
                           <div <?php if($cart_product_data){ echo 'style="display: flex;"';} else{ echo 'style="display: none;"';} ?> class="input-group s-c-qty a-c-qty-drop_<?php echo @$product_lists->id;?>">
                                            <span class="input-group-btn"><button onclick="decrement_quantity(<?php echo @$item_id;?>,<?php echo @$rowid;?>,<?php echo @$item['margin_price'];?>,<?php echo @$item['qty'];?>)" class="btn btn-theme-round btn-number" type="button">-</button></span>

                                       <input readonly="" class="form-control border-form-control form-control-sm input-number" type="text" id="fcart_<?php echo @$item['id'];?>" name="cart[<?php echo @$item['id'];?>]" value="<?php echo @$qty; ?>">
                                       <span class="input-group-btn">
                                       <button onclick="increment_val(<?php echo @$item_id;?>,<?php echo @$rowid;?>,<?php echo @$item['margin_price'];?>,<?php echo @$item['qty'];?>)" class="btn btn-theme-round btn-number" type="button">+</button>
                                       </span>
                                       
                           </div>
                         </div>  
                    </form>
                  </div>
               </div>
              <?php } }

}

public function savers_get_variant(){

 $pid=$this->input->post('pid');	
 $vid=$this->input->post('vid');
 $product_list=$this->Home_model->single_product_list($pid);
 //print_r($product_list);die;
    if(!empty($product_list)){
                //echo'<pre>';print_r($product_list);
               foreach($product_list as $key=>$product_lists){
                 $image=Get_Productgallery_details_attr(@$product_lists->id,$vid);
                 //print_r($image);die;
                 $image_url=@$image[0]->image;
                 $price_mrp=@$image[0]->price_mrp;
                 $sp_price=@$image[0]->sp_price;
                 $margin_price=@$image[0]->margin_price;
                 $weight=@$image[0]->weight;
                 ?>
               <div class="item" id="savers_res_data_<?php echo @$product_lists->id;?>">
                  <form name="add_cart" method="post" id="add_cart">
                      <input type="hidden" id="p_id_<?php echo @$product_lists->id;?>" value="<?php echo @$product_lists->id;?>">
                       <input type="hidden" id="save_v_id_<?php echo @$product_lists->id;?>" value="<?php echo@$image[0]->id;?>">
                      <input type="hidden" id="save_p_qty_<?php echo @$product_lists->id;?>" value="1">
                       <input type="hidden" id="save_p_name_<?php echo @$product_lists->id;?>" name="name" value="<?php echo @$product_lists->product_name;?>">
                        <input type="hidden" id="save_p_weight_<?php echo @$product_lists->id;?>" name="p_weight" value="<?php echo @$weight;?>">
                       <input type="hidden" id="save_p_price_<?php echo @$product_lists->id;?>" name="price" value="<?php echo @$sp_price;?>">
                        <input type="hidden" id="save_mrp_price_<?php echo @$product_lists->id;?>" name="mrp_price" value="<?php echo @$price_mrp;?>">
                        <input type="hidden" id="save_p_image_<?php echo @$product_lists->id;?>" name="image" value="<?php echo @$image_url; ?>">
                        <input type="hidden" id="save_gst_per_<?php echo @$product_lists->id;?>" name="gst_per" value="<?php echo @$product_lists->gst_per;; ?>">
                        <input type="hidden" id="save_gst_type_<?php echo @$product_lists->id;?>" name="gst_type" value="<?php echo @$product_lists->gst_type;; ?>">
                       <input type="hidden" id="save_margin_price_<?php echo @$product_lists->id;?>" name="margin_price" value="<?php echo @$margin_price; ?>">
                       <input type="hidden" id="save_product_amu_<?php echo @$product_lists->id;?>" name="product_amu" value="<?php echo @$product_lists->product_amu;?>">
                       <input type="hidden" id="save_hsn_code_<?php echo @$product_lists->id;?>" name="hsn_code" value="<?php echo @$product_lists->hsn_code;?>">
                    <div class="product">
                     <a href="<?php echo base_url();?>Pages/product_details/<?php echo @$product_lists->id; ?>/<?php echo @$image[0]->id; ?>">
                        <div class="product-header">
                           <span class="badge badge-success"><?php echo @$sp_price;?>% OFF</span>
                           <img class="img-fluid" src="<?php echo site_url(); ?>admin/upload/product_images/<?php echo @$image_url; ?>" alt="">
                           <span class="veg text-success mdi mdi-circle"></span>
                        </div>
                        <div class="product-body">
                           <h5><?php echo @$product_lists->product_name;
                           ?></h5>
                            </a>
                           <h6><strong><span class="mdi mdi-approval"></span> Available in</strong>
                            <select id="available" class="custom-select" name="available" onchange="savers_get_variant(<?php echo @$product_lists->id;?>,this.value)">
                            <?php
                              $product_variant=get_variant(@$product_lists->id);
                              //print_r($product_variant);
                              if(is_array($product_variant) && count($product_variant)){
                                   foreach ($product_variant as $value) {
                                  ?>
                              <option value="<?php echo @$value->id;?>" <?php if($vid==@$value->id){ echo 'selected="selected"';}?>><?php  echo @$value->weight;?> <?php echo @$product_lists->product_amu; ?> - Rs <?php  echo number_format(@$value->margin_price,2);?></option>
                             <?php } }?>
                            </select>
                            <?php //echo @$weight;?> <?php //echo @$product_lists->product_amu;?></h6>
                        </div>
                        <div class="product-footer">
                          <?php  
                          $product_variant=get_variant(@$product_lists->id);
                          //echo'<pre>';print_r($product_variant);
                          $vid=$product_variant[0]->id;
                          $item=get_cart_product(@$product_lists->id,$vid);

                        // echo'<pre>';print_r($item);
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
                           <button <?php if($cart_product_data){ echo 'style="display: none;"';} else{ echo 'style="display: block;"';} ?> id="add_cart_save_<?php echo @$product_lists->id;?>" type="button" onclick="add_to_cart_save(<?php echo @$product_lists->id;?>);" class="btn btn-secondary btn-sm float-right add-cat-qty"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                         
                           <div <?php if($cart_product_data){ echo 'style="display: flex;"';} else{ echo 'style="display: none;"';} ?> class="input-group s-c-qty a-c-qty-drop_save_<?php echo @$product_lists->id;?>">
                                            <span class="input-group-btn"><button onclick="decrement_quantity(<?php echo @$item_id;?>,<?php echo @$rowid;?>,<?php echo @$item['margin_price'];?>,<?php echo @$item['qty'];?>)" class="btn btn-theme-round btn-number" type="button">-</button></span>

                                       <input readonly="" class="form-control border-form-control form-control-sm input-number" type="text" id="fcart_<?php echo @$item['id'];?>" name="cart[<?php echo @$item['id'];?>]" value="<?php echo @$qty; ?>">
                                       <span class="input-group-btn">
                                       <button onclick="increment_val(<?php echo @$item_id;?>,<?php echo @$rowid;?>,<?php echo @$item['margin_price'];?>,<?php echo @$item['qty'];?>)" class="btn btn-theme-round btn-number" type="button">+</button>
                                       </span>
                                       
                           </div>
                         </div>
                        <!-- <div class="product-footer">
                           <button id="add_cart_<?php echo @$product_lists->id;?>" type="button" onclick="add_to_cart_save(<?php echo @$product_lists->id;?>);" class="btn btn-secondary btn-sm float-right"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                           <button style="display: none" id="remove_cart_<?php echo @$product_lists->id;?>" type="button" onclick="remove_to_cart_save(<?php echo @$product_lists->id;?>);" class="btn btn-secondary btn-sm float-right remove-cart-btn"><i class="mdi mdi-cart-outline"></i> Delete Item</button>
                           <p class="offer-price mb-0">₹ <?php echo number_format(@$margin_price,2);?><i class="mdi mdi-tag-outline"></i><br><span class="regular-price">₹ <?php echo number_format(@$price_mrp,2);?></span></p>
                         </div> -->
                    </form>
                  </div>
               </div>
              <?php } }






}
   

}
