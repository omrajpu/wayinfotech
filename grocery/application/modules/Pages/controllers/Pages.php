<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends MX_Controller {
    function __construct(){
		parent::__construct();
		$this->load->model('Shopping_model');
	  $this->load->model('../../Common/Crud_model');
    $this->load->helper('crypto_helper');
		$this->load->library('session');
		$this->load->helper(array('form', 'url','new'));
    $this->load->library('cart');
   }
   public function save_wish_list(){
      if(@$_SESSION['userid']){
          $user_id=$_SESSION['userid'];
          $pid=$this->input->post('pid');
          $product_data=$this->Shopping_model->get_single_product_sprial_details($pid);
          $bin_data=$this->Shopping_model->bin_data($pid);
          //echo'<pre>';print_r($product_data);
         $insert_data=array(
        'product_name'=>$product_data[0]->product_name,
        'user_id'=>$user_id,
        'pro_id'=>$product_data[0]->id,
        'description'=>$product_data[0]->description,
        'product_title'=>$product_data[0]->product_title,
        'meta_description'=>$product_data[0]->meta_description,
        'tag_keyword'=>$product_data[0]->tag_keyword,
        'product_tag'=>$product_data[0]->product_tag,
        'model'=>$product_data[0]->model,
        'sku'=>$product_data[0]->sku,
        'upc'=>$product_data[0]->upc,
        'ean'=>$product_data[0]->ean,
        'jan'=>$product_data[0]->jan,
        'isbn'=>$product_data[0]->isbn,
        'mpn'=>$product_data[0]->mpn,
        'location'=>$product_data[0]->location,
        'mrp_price'=>$product_data[0]->mrp_price,
        'purchase_price'=>$product_data[0]->purchase_price,
        'sale_price'=>$product_data[0]->sale_price,
        'margin_price'=>$product_data[0]->margin_price,
        'gst_per'=>$product_data[0]->gst_per,
        'gst_type'=>$product_data[0]->gst_type,
        'max_quantity'=>$product_data[0]->max_quantity,
        'subtract'=>$product_data[0]->subtract,
        'stock_status_id'=>$product_data[0]->stock_status_id,
        'date_available'=>$product_data[0]->date_available,
        'length'=>$product_data[0]->length,
        'width'=>$product_data[0]->width,
        'height'=>$product_data[0]->height,
        'length_class_id'=>$product_data[0]->length_class_id,
        'weight'=>$product_data[0]->weight,
        'weight_class_id'=>$product_data[0]->weight_class_id,
        'status'=>$product_data[0]->status,
        'sort_order'=>$product_data[0]->sort_order,
        'brand_name'=>$product_data[0]->brand_name,
        'cat_id'=>$product_data[0]->cat_id,
        'sub_cat_id'=>$product_data[0]->sub_cat_id,
        'sub_cat_child_id'=>$product_data[0]->sub_cat_child_id,
        'store'=>$product_data[0]->store,
        'related_product'=>$product_data[0]->related_product,
        'link_product_id'=>$product_data[0]->link_product_id,
        'image'=>$product_data[0]->image,
        );
     //echo'<pre>';print_r($insert_data);
         $res= $this->Shopping_model->save_pro_data($insert_data);
         if($res){
          $res="Successfull insert";
          echo $res;
         }
      }else{
        $msg='not login';
        echo $msg;
       }
    } 
public function search(){

       //print_r($_SESSION);

    $search_text=$_POST['serach_product'];   
    //$search_text=$this->uri->segment(3);
      //$search_text.replaceAll("\\+","%20");
    $search_text=str_replace('%20'," ", $search_text);
    if($search_text){
      $_SESSION['search_text']=$search_text;
     }
    
  $data['cat_product_list']=$this->Shopping_model->cat_all_product_list();
  $data['product_list']=$this->Crud_model->getDirectQueryCommonData2("SELECT tbl_products.*,tbl_product_attribute.id as attr_id
 FROM
  `tbl_products` 
  JOIN tbl_product_attribute 
  ON tbl_product_attribute.product_id=tbl_products.id
  JOIN category_details ON category_details.id=tbl_products.cat_id
  WHERE product_name LIKE '%$search_text%'  OR category_name LIKE '%$search_text%'
  GROUP BY tbl_product_attribute.product_id
  ");

  $data['subview']="search-page";
  $this->load->view('layout/default', $data);

   }
public function payment_success_cod(){
     $this->load->library('cart');
     @$this->cart->destroy();
     $cart_id=$_SESSION['cart_id'];
    $data['product_details']=$this->Shopping_model->get_product_details($cart_id);  
    $data['subview']="payment-success-cod";
    $this->load->view('layout/default', $data);  
    }

    public function blog_page(){
          $data['subview']="blog";
          $this->load->view('layout/default',$data);

      } 
     public function signup(){

          $data['subview']="sign-up";
          $this->load->view('layout/default',$data);

     }  
    public function signin(){

          $data['subview']="sign-in";
          $this->load->view('layout/default',$data);

     }  

    public function profile(){

          $data['subview']="profile";
          $this->load->view('layout2/default',$data);

     }  
   public function myaddress(){

          $data['subview']="my-address";
          $this->load->view('layout2/default',$data);

     } 
 public function order(){

          $data['subview']="order";
          $this->load->view('layout2/default',$data);

     } 
public function wishlist(){

          $data['subview']="wish-list";
          $this->load->view('layout2/default',$data);

     } 
public function changepass(){

          $data['subview']="change-pass";
          $this->load->view('layout2/default',$data);

     } 
 public function productDetails(){

         $data['subview']="product-details";
          $this->load->view('layout2/default',$data);


 } 
 public function cart(){

         $data['subview']="cart";
          $this->load->view('layout2/default',$data);


 }
 public function checkout(){

          $data['subview']="checkout";
          $this->load->view('layout2/default',$data);
         }
public function wishlistdetails(){

          $data['subview']="wish-list-details";
          $this->load->view('layout2/default',$data);


 } 
public function about()
        {
         //echo"gfhgh";die;
        $data['subview']="about";
        $this->load->view('layout2/default', $data);
        }
       public function storelocator()
        {
        $data['category_data']=$this->Crud_model->getDirectQueryCommonData('SELECT id,category_name,image_url  FROM `category_details` ORDER BY `id` ASC');
        $data['subview']="store-locator";
        $this->load->view('layout/default', $data);
        }

        public function contactus()
        {
        // $data['product_data']=$this->Shopping_model->get_all_product_office_data();
         //$data['category_data']=$this->Crud_model->getDirectQueryCommonData('SELECT id,category_name,image_url  FROM `category_details` ORDER BY `id` ASC');
        $data['subview']="contact-us";
        $this->load->view('layout/default', $data);
        }
        public function faq()
        {
        // $data['product_data']=$this->Shopping_model->get_all_product_office_data();
         $data['category_data']=$this->Crud_model->getDirectQueryCommonData('SELECT id,category_name,image_url  FROM `category_details` ORDER BY `id` ASC');
        $data['subview']="faq";
        $this->load->view('layout/default', $data);
        }
      public function common_search(){
           $cat_id=@$this->input->post('catdata');
           $price_range=@$this->input->post('price_range');
           $combin=explode(' ',$price_range);
           $min_price=@$combin[1];
           $max_price=@$combin[3];
           if($cat_id){
              $data=implode(',',$cat_id);
              $where='where tp.cat_id IN ('.$data.')';
           }else{
            $where='';
           }
           if($min_price){
             $where2='and mrp_price>='.$min_price.' and  mrp_price<='.$max_price;
            }else{
              @$where2='';
            }
          
          //   echo "SELECT 
          //   tp.*,
          //   pg.`image` 
           
          // FROM
          //   `tbl_products` AS tp 
          //   INNER JOIN `product_gallery` AS pg 
          //     ON tp.id = pg.`pdt_id` 
          //    $where
          //    $where2
          //  GROUP BY pg.`pdt_id` 
          // ORDER BY pg.`id` ASC 
          //  ";
          //  die;
           $home_buy_products= $this->Crud_model->getDirectQueryCommonData("SELECT 
            tp.*,
            pg.`image` 
           
          FROM
            `tbl_products` AS tp 
            INNER JOIN `product_gallery` AS pg 
              ON tp.id = pg.`pdt_id` 
             $where
             $where2
           GROUP BY pg.`pdt_id` 
          ORDER BY pg.`id` ASC 
           ");
      if(!empty($home_buy_products)){
           $home_buy_products_data=$home_buy_products;
           }else{
           $home_buy_productss= $this->Crud_model->getDirectQueryCommonData("SELECT 
          tp.*,
          pg.`image` 
         
        FROM
          `tbl_products` AS tp 
          INNER JOIN `product_gallery` AS pg 
            ON tp.id = pg.`pdt_id` 
          GROUP BY pg.`pdt_id` 
        ORDER BY pg.`id` ASC 
         ");
         $home_buy_products_data=$home_buy_productss;
         }         
      foreach ($home_buy_products_data as $key => $bdata) {
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

                  <?php }
  } 
public function common_page(){
          $cat_id=$this->uri->segment(3);
         if($cat_id!='sub_id'){
          $data['product_list']=$this->Shopping_model->product_cat_data($cat_id);

          }else{
          $sub_cat_id=$this->uri->segment(4);
          $data['product_list']=$this->Shopping_model->product_scat_data($sub_cat_id);
          //$product_list=$this->Shopping_model->product_scat_data($sub_cat_id);
          //print_r($product_list);die;

         }
         $data['cat_product_list']=$this->Shopping_model->cat_all_product_list(); 
         $data['subview']="common-page";
         $this->load->view('layout/default', $data);
    }
 public function get_common_page_data(){
                                 $cat_id=$this->input->post('cat_id');
                                  $this->db->select('id');
                                  $this->db->where('cat_id',$cat_id);
                                  $this->db->from('sub_category_details');
                                  $query=$this->db->get();
                                  $res=$query->result();
                               //print_r($res);
                                  echo json_encode($res);

 }      
 public function common_page_data(){
 $sub_cat_id=$_POST['subid'];
 //$cat_data=getcatname('category_details','id,category_name');
 $product_list=$this->Shopping_model->product_scat_data($sub_cat_id);
 //print_r($product_list);die;
 //$image=Get_Productgallery_detailss(@$product_lists->id,@$product_lists->attr_id);
  ?>
    
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
                           <a href="<?php echo base_url();?>Pages/product_details/<?php echo @$product_lists->id; ?>/<?php echo @$product_lists->attr_id;?>">
                              <div class="product-header">
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
                                 <span class="badge badge-success"><?php echo @$sp_price;?>% OFF</span>
                                 <img class="img-fluid" src="<?php echo site_url(); ?>admin/upload/product_images/<?php echo @$image_url; ?>" alt="">
                                 <span class="veg text-success mdi mdi-circle"></span>
                              </div>
                              <div class="product-body">
                                 <h5><?php echo @$product_lists->product_name;?></h5>
                                 </a>
                              <h6><strong><span class="mdi mdi-approval"></span> Available in</strong>
                                   <select id="available" class="custom-select" name="available" onchange="get_variant(<?php echo @$product_lists->id?>,this.value)">
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
                           
                        </div>
                     </div>
                      <?php }}?>
                  

 <?php }       
 public function cat_page(){
        $cat_id=$this->uri->segment(3);
        if($cat_id){
           $data['category_data']=$this->Crud_model->getDirectQueryCommonData('SELECT id,category_name,image_url  FROM `category_details` ORDER BY `id` ASC');
           
       $data['home_buy_products']=$this->Crud_model->getDirectQueryCommonData("SELECT tp.*,
          pg.`image` 
         
        FROM
          `tbl_products` AS tp 
          INNER JOIN `product_gallery` AS pg 
            ON tp.id = pg.`pdt_id` 
          where tp.cat_id=$cat_id
          GROUP BY pg.`pdt_id` 
        ORDER BY pg.`id` DESC 
         ");
   
        $data['subview']="common-page";
        $this->load->view('layout/default', $data);

          }
        }
 public function product_details(){
       
          $pid=$this->uri->segment(3);
           $data['product_list']=$this->Shopping_model->product_list($pid);
          $res=$this->Shopping_model->product_list($pid);
          //if($res[0]->cat_id){
          //$data['cat_product_list']=$this->Shopping_model->cat_product_list($res[0]->cat_id);

          //$cat_product_list=$this->Shopping_model->cat_product_list($res[0]->cat_id);
         // echo'<pre>';print_r($cat_product_list);die;
          // }
          $data['cat_product_list']=$this->Shopping_model->cat_all_product_list();  
          $data['subview']="product-details";
          $this->load->view('layout/default',$data);
         } 
public function get_variant()
  {
 $pid=$this->input->post('pid');  
 $vid=$this->input->post('vid');
 $product_list=$this->Shopping_model->single_product_list($pid);
 //print_r($product_list);die;
 ?>
<div class="row" id="details_data_<?php echo @$pid;?>">
               <div class="col-md-6">
                  <div class="shop-detail-left">
                     <div class="preview shop-detail-slider">
                        <div class="preview-pic tab-content">
                            <?php
                            $att_id=$vid;
                             if(!empty($product_list)){
                             foreach($product_list as $key=>$product_lists){
                             $image=Get_Productgallery_detailss(@$product_lists->id,$att_id);
                             $i=1;
                            foreach($image as $key => $image){
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
                              //print_r($image);
                             
                             $image_url=@$image->image;
                             $price_mrp=@$image->price_mrp;
                             $sp_price=@$image->sp_price;
                             $weight=@$image->weight;
                             $margin_price=@$image->margin_price;
                             //$margin_price=@$image->margin_price;
                             ?>
                         <input type="hidden" id="p_id_<?php echo @$product_lists->id;?>" value="<?php echo @$product_lists->id;?>">
                        <input type="hidden" id="save_v_id_<?php echo @$product_lists->id;?>" value="<?php echo@$image->id;;?>">
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
                              <option value="<?php echo @$value->id;?>" <?php if($vid==@$value->id){ echo 'selected="selected"';}?>><?php  echo @$value->weight;?> <?php echo @$product_lists->product_amu; ?> - Rs <?php  echo number_format(@$value->margin_price,2);?></option>
                             <?php } }?>
                            </select>
                       <?php //echo @$weight;?> <?php //echo @$product_lists->product_amu;?></h6>
                     <p class="regular-price"><i class="mdi mdi-tag-outline"></i> MRP : ₹ <?php  echo number_format(@$price_mrp,2);?></p>
                     <p class="offer-price mb-0">Discounted price : <span class="text-success">₹ <?php
                                   echo number_format(@$margin_price,2);
                                 ?></span></p>

                         <div class="product-footer prod-i-c-btns">         
                          <?php  
                          //$product_variant=get_variant(@$product_lists->id);
                          //echo'<pre>';print_r($product_variant);
                          //echo $vid=$product_variant[0]->id;
                          //echo $vid;
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
                           <button <?php if($cart_product_data){ echo 'style="display: none;"';} else{ echo 'style="display: block;"';} ?> id="add_cart_save_detail_<?php echo @$product_lists->id;?>" type="button" onclick="add_to_cart_save(<?php echo @$product_lists->id;?>);" class="btn btn-secondary btn-sm float-right add-cat-qty"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                          <div <?php if($cart_product_data){ echo 'style="display: flex;"';} else{ echo 'style="display: none;"';} ?> class="input-group s-c-qty a-c-qty-drop_save_<?php echo @$product_lists->id;?>">
                            <span class="input-group-btn"><button onclick="decrement_quantity(<?php echo @$item_id;?>,<?php echo @$rowid;?>,<?php echo @$item['margin_price'];?>,<?php echo @$item['qty'];?>)" class="btn btn-theme-round btn-number" type="button">-</button></span>

                            <input readonly="" class="form-control border-form-control form-control-sm input-number" type="text" id="fcart_<?php echo @$item['id'];?>" name="cart[<?php echo @$item['id'];?>]" value="<?php echo @$qty; ?>">
                                       <span class="input-group-btn">
                            <button onclick="increment_val(<?php echo @$item_id;?>,<?php echo @$rowid;?>,<?php echo @$item['margin_price'];?>,<?php echo @$item['qty'];?>)" class="btn btn-theme-round btn-number" type="button">+</button>
                                       </span>
                          </div>
                        </div>
                     <!-- <a href="<?php echo base_url();?>Cart/"><button    type="button" class="btn btn-secondary"><i class="mdi mdi-cart-outline"></i>View Cart</button></a> -->
                     <div class="short-description">
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


 <?php }
public function get_variant_cat(){
  $pid=$this->input->post('pid'); 
  $vid=$this->input->post('vid');
  $product_list=$this->Shopping_model->single_product_list($pid);
  //print_r($product_list);die;
  if(!empty($product_list)){
                //echo'<pre>';print_r($product_list);
               foreach($product_list as $key=>$product_lists){
                     $image=Get_Productgallery_detailss(@$product_lists->id,@$vid);
                     //print_r($image);
                     $image_url=@$image[0]->image;
                     $price_mrp=@$image[0]->price_mrp;
                     $sp_price=@$image[0]->sp_price;
                     $margin_price=@$image[0]->margin_price;
                     $weight=@$image[0]->weight;
                 ?>
                       
                        <div class="product" id="res_data_<?php echo @$product_lists->id;?>">
                           <a href="<?php echo base_url();?>Pages/product_details/<?php echo @$product_lists->id; ?>">
                              <div class="product-header">
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
                                 <span class="badge badge-success"><?php echo @$sp_price;?>% OFF</span>
                                 <img class="img-fluid" src="<?php echo site_url(); ?>admin/upload/product_images/<?php echo @$image_url; ?>" alt="">
                                 <span class="veg text-success mdi mdi-circle"></span>
                              </div>
                              <div class="product-body">
                                 <h5><?php echo @$product_lists->product_name;?></h5>
                                 </a>
                              <h6><strong><span class="mdi mdi-approval"></span> Available in</strong>
                                   <select style="width: 200px;" class="custom-select" id="available" name="available" onchange="get_variant(<?php echo @$product_lists->id?>,this.value)">
                            <?php
                              $product_variant=get_variant(@$product_lists->id);
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
                          
                        
                     </div>
              <?php } }

}

public function savers_get_variant(){

 $pid=$this->input->post('pid');  
 $vid=$this->input->post('vid');
 $product_list=$this->Shopping_model->single_product_list($pid);
 //print_r($product_list);die;
    if(!empty($product_list)){
                //echo'<pre>';print_r($product_list);
               foreach($product_list as $key=>$product_lists){
                 $image=Get_Productgallery_detailss(@$product_lists->id,$vid);
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
                          //$product_variant=get_variant(@$product_lists->id);
                          //echo'<pre>';print_r($product_variant);
                          //$vid=$product_variant[0]->id;
                          //echo $vid;
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
                         </div>
                    </form>
                  </div>
               </div>
              <?php } }






}
 
}	