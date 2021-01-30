<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    public function __construct()
	      {
            parent::__construct();
            //load model
            //$this->load->model('dashboard_model');
            //$this->load->model('Category_Model');
            //$this->load->model('Subcategory_Model');
            $this->load->model('Cart_model');
            //$this->load->model('Product_Model',"product_model");
            $this->load->library('cart');
            $this->load->helper('url');  
            $this->load->helper('form');  
            $this->load->library('form_validation');
            $this->load->library('session');
            $this->load->database();
            //$this->load->library('encrypt');
            $this->load->library('encryption');
            $this->cart->product_name_rules = '[:print:]';
            $this->load->library('cart');
            $this->load->model('../../Common/Crud_model');
            //$this->load->helper(array('form', 'url','menu_helper'));
            $this->load->helper(array('form', 'url','new'));
        }
   public function index()
         {
         //$this->load->view('cart');
            $data['subview']="cart";
            $this->load->view('layout/default', $data);
         }
        public function login(){
            
            $data['subview']="login";
            $this->load->view('layout/default', $data);  
        }
       public function logout_sess(){

         //$this->session->unset_userdata($newdata);
         $this->session->sess_destroy();
         redirect(base_url());

       }
      public function cat_item(){
          $cat_name=$this->input->post('cat_val');
          $_SESSION['cat_name']=$cat_name;
      } 
      
      public function coupon_add(){

           $cop_code=$this->input->post('cop_code');
           $copdata=$this->Cart_model->coupon_add($cop_code);
           $cart = $this->cart->contents();
           //print_r($copdata);die;
           
           $cart = $this->cart->contents();
           //print_r($cart);die;
            $grand_total = 0;
            foreach ($cart as $item)
                  {
                 $grand_total = $grand_total + $item['subtotal'];
                }    
           if(@$copdata->user_id==''){
              unset($_SESSION['coupon_code']);
              $status='0';
              echo $status;
           }else{
            //echo'<span> Net amount:5465757</span>';
              $_SESSION['coupon_code']=$copdata->coupon_code;
              $status='1'; 
              echo $status;                          
            }
          //  echo json_encode($data);  
         }
      public function login_check(){
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
                $this->form_validation->set_rules('password', 'Password', 'required');
                if ($this->form_validation->run() == FALSE)
                  {
                   // $this->load->view('admin/login');
                    $data['subview']="login";
                    $this->load->view('layout/default',$data);
                  }
                else
                  { 
                    $this->load->library('session');
                    $email = strtolower($this->input->post('email'));
                    $password = strtolower($this->input->post('password'));
                    $result = $this->Cart_model->login($email,$password);
                    //print_r($result);die;
                    if($result -> num_rows() > 0)
                      { 
                       foreach ($result->result() as $row)
                           { 
                            $this->session->userid = $row->id;
                            //$this->session->admin = $row->is_Admin;
                            $this->session->email =  $row->email;
                            redirect(base_url().'Checkout/checkout');
                            }
                    }
                    else
                    {
                        //echo"3"; die;
                        $this->session->set_flashdata('login_error_msg','Email and Password is Wrong!!');
                        redirect(base_url().'Cart/login');
                    }
                }

      } 
    function add_custom(){
        //echo'<pre>';print_r($_SESSION['custom']);die;
        $insert_data = array(
                        'id' =>$_SESSION['custom']['id'],
                        'name' => $_SESSION['custom']['name'],
                        'price' =>$_SESSION['custom']['price'],
                        'image' => $_SESSION['custom']['image'],
                        'cust_image' => $_SESSION['custom_src_url'],
                        'cus_text' => @$_SESSION['cus_text'],
                        'custom' =>'user_custom',
                        'color' => $_SESSION['custom']['book_desgin'],
                        'size' => $_SESSION['custom']['book_size'],
                        'qty' => $_SESSION['custom']['pack_off'],
                        'product_description'=>$_SESSION['custom']['product_description'],
                        'number_of_pages' => $_SESSION['custom']['number_of_pages'],
                        'pack_off' => $_SESSION['custom']['pack_off'],
                        'sku_no' => $_SESSION['custom']['sku_no'],
                         );
                //'product_description'=>$this->input->post('product_description')
               //print_r($insert_data);die;
                $this->cart->insert($insert_data);
                
                  //redirect('cart');
                 $data['custom_msg']='Thanks for customization';
                 $data['subview']="cart";
                 $this->load->view('layout/default', $data);

     }  
    function add()
             {
              //echo'<pre>';print_r($_POST);die;
                $insert_data = array(
                        'id' => $this->input->post('p_id'),
                        'qty' => $this->input->post('p_qty'),
                        'name' => $this->input->post('p_name'),
                        'weight' => $this->input->post('p_weight'),
                        'price' => $this->input->post('mrp_price'),
                        'mrp_price' => $this->input->post('p_price'),
                        'margin_price' => $this->input->post('margin_price'),
                        'image' => $this->input->post('p_image'),
                        'gst_per' => $this->input->post('gst_per'),
                        'gst_type' => $this->input->post('gst_type'),
                        'discount' => $this->input->post('discount'),
                        'product_amu' => $this->input->post('product_amu'),
                        'hsn_code' => $this->input->post('hsn_code')
                         );
                 $this->cart->insert($insert_data);
                 $cart = $this->cart->contents();
                 //print_r($cart);die;
                 //$data_array=array();
                  if($cart = $this->cart->contents()){
                     $i = 0;
                    foreach($cart as $item){
                     $i++;} }
                     //$data_array['itemcnt']=$i;
                   
                    $rowid="'".@$item['rowid']."'";
                    $item_id="'".@$item['id']."'";?>
                     <span class="input-group-btn"><button onclick="decrement_quantity(<?php echo @$item_id;?>,<?php echo @$rowid;?>,<?php echo @$item['margin_price'];?>,<?php echo @$item['qty'];?>)" class="btn btn-theme-round btn-number" type="button">-</button></span>

                                       <input readonly="" class="form-control border-form-control form-control-sm input-number" type="text" id="fcart_<?php echo @$item['id'];?>" name="cart[<?php echo @$item['id'];?>]" value="<?php echo @$item['qty']; ?>">
                                       <span class="input-group-btn">
                                       <button onclick="increment_val(<?php echo @$item_id;?>,<?php echo @$rowid;?>,<?php echo @$item['margin_price'];?>,<?php echo @$item['qty'];?>)" class="btn btn-theme-round btn-number" type="button">+</button>
                                       </span>
                   <?php

			         }

function get_item_count(){
    $cart = $this->cart->contents();
                 //print_r($cart);die;
                 //$data_array=array();
                  if($cart = $this->cart->contents()){
                     $i = 0;
                    foreach($cart as $item){
                     $i++;} }
                    echo $i; 

 }              
 function clear_all(){
       $this->cart->destroy();
       //redirect(base_url().'Cart');
       redirect(base_url());
      }           
  function remove() {
          $rowid=$this->uri->segment(3);          
		if ($rowid==="all"){
                   	$this->cart->destroy();
		}else{
                $data = array(
				'rowid'   => $rowid,
				'qty'     => 0
			);
                   	$this->cart->update($data);
		 }
       redirect(base_url().'Cart/');
	  }
   function remove_to_cart() {
              $pid=$this->input->post('p_id');
              $cart = $this->cart->contents();
                if($cart = $this->cart->contents()){
                     $i = 0;
                  foreach($cart as $item){
                    if($pid==$item['id']){
                      $rowid=$item['rowid'];
                    }
                  $i++;} 
               }    
         $data = array(
        'rowid'   => $rowid,
        'qty'     => 0
         );
       $this->cart->update($data);
       if($cart = $this->cart->contents()){
                     $i = 0;
                    foreach($cart as $item){
                      $cnt=count($cart);
                     if($cnt>0){
                        $i++;

                          }
                     } 
                     echo $i;
       }
    }
  function get_cart_info(){?>
    <div class="cart-sidebar-header">
            <?php 
                $this->load->library('cart');
                $cart = $this->cart->contents();
                 //echo $this->cart->total_items();
                   if($cart = $this->cart->contents()){
                     $i = 0;
                    foreach($cart as $item){
                     $i++;} }?>
            <h5>
               My Cart <span id="text_success" class="text-success">(<?php if(@$i>0){echo @$i;} else{echo '0';}?>)</span>
               <a data-toggle="offcanvas" onclick="remove_togle()" class="float-right" href="#">X</a>
            </h5>
         </div>
         <div class="cart-sidebar-body">
            <button class="btn btn-secondary btn-lg btn-block text-left" type="button"><span class="float-left"><i class="mdi mdi-cart-outline"></i> <a href="<?php echo base_url();?>/Cart/clear_all"><span style="color:white">Remove all items</span></a><a href="<?php echo base_url();?>/Cart/"><span style="color:white;margin-left:150px;">View Cart</span></a></button>
            <?php
                 $this->load->library('cart');
                 if($cart = $this->cart->contents()){
                  $grand_total = 0;
                  $i = 1;
                  foreach ($cart as $item)
                  {
                    //print_r($item);
                    //$grand_total = $grand_total + $item['subtotal'];
                    $rowid="'".$item['rowid']."'";
                    $item_id="'".$item['id']."'";
                    $grand_total= $grand_total+$item['qty']*$item['margin_price'];
                 ?>
            <div class="cart-list-product">
               <a onclick="delete_item('<?php echo $item['rowid'];?>')" href="javascript:void(0)" class="float-right remove-cart" href=""><i class="mdi mdi-close"></i></a>
             <!--   <a onclick="delete_item('<?php echo $item['rowid'];?>')" href="javascript:void(0)" class="mt-2" role="button">
                                REMOVE
                            </a> -->
               <img class="img-fluid" src="<?php echo site_url(); ?>admin/upload/product_images/<?php echo @$item['image'];?>" alt="">
               <span class="badge badge-success"><?php echo $item['discount'];?>% OFF</span>
               <h5><a href="#"><?php echo $item['name'];?></a></h5>
               <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> : <?php echo $item['weight'];?> <?php echo $item['product_amu'];?></h6>
               <!-- <h6><strong><span class="mdi mdi-approval"></span> Quantity</strong> : <?php echo $item['qty'];?></h6> -->
                <div class="input-group s-c-qty">
                                       <span class="input-group-btn"><button  onclick="decrement_quantity(<?php echo @$item_id;?>,<?php echo @$rowid;?>,<?php echo @$item['margin_price'];?>,<?php echo @$item['qty'];?>)" class="btn btn-theme-round btn-number" type="button">-</button></span>

                                       <input readonly  class="form-control border-form-control form-control-sm input-number" type="text" id="cart_<?php echo $item['id'];?>" name="cart[<?php echo $item['id'];?>]" value="<?php echo $item['qty'];?>">
                                       <span class="input-group-btn">
                                       <button onclick="increment_val(<?php echo @$item_id;?>,<?php echo @$rowid;?>,<?php echo @$item['margin_price'];?>)"class="btn btn-theme-round btn-number" type="button">+</button>
                                       </span>
                                    </div>
            
                <h6><strong><span class="mdi mdi-approval"></span></strong> :₹<?php echo number_format($item['margin_price'],2)?> <i class="mdi mdi-tag-outline"></i> <span class="regular-price">₹ <?php echo number_format($item['price'],2);?></span>
                  <span style="margin-left: 8px; font-size:13px;" id="row_subtotal_<?php echo $item['id'];?>">₹ <?php
                                      $subtotal=$item['qty']*$item['margin_price'];
                                    echo number_format(@$subtotal,2);
                                   ?></span>
                </h6>

            </div>
         

         <?php } }?>
         </div>
         <div class="cart-sidebar-footer">
            <div class="cart-store-details">
                <h6><span class="mdi mdi-approval"></span>Sub Total <strong  id="allamnt"class="float-right">₹ <?= number_format(@$grand_total,2)?></strong></h6>
               <h6><span class="mdi mdi-approval">Delivery Charges <strong class="float-right">0.00</strong></h6>
               <h6><span class="mdi mdi-approval">Grand Total <strong  class="float-right allamnt2">₹ <?= number_format(@$grand_total,2)?></strong></h6>
            </div>
           <!--  <a href="checkout.html"><button class="btn btn-secondary btn-lg btn-block text-left" type="button"><span class="float-left"><i class="mdi mdi-cart-outline"></i> Proceed to Checkout </span><span class="float-right"><strong>$1200.69</strong> <span class="mdi mdi-chevron-right"></span></span></button></a> -->
             <a href="<?php echo base_url();?>Checkout/checkout"><button class="btn btn-secondary btn-lg btn-block text-left" type="button"><span class="float-left"><i class="mdi mdi-cart-outline"></i> Proceed to Checkout</button></a><br>
              <a href="<?php echo base_url();?>/Cart/"><button class="btn btn-secondary btn-lg btn-block text-left" type="button"><span class="float-left"><i class="mdi mdi-cart-outline"></i> View Cart</button></a>
               <!--  <a href="<?php echo base_url();?>/Cart/clear_all"><button class="btn btn-secondary btn-lg btn-block text-left" type="button"><span class="float-left"><i class="mdi mdi-cart-outline"></i> Clear all items</button></a> -->
         </div>


  <?php }    
	function remove_item(){?>
    <div class="cart-sidebar-header">
       <?php 
      $rowid=$_POST['row_id'];
      if ($rowid==="all"){
         $this->cart->destroy();
          }else{
                $data = array(
                'rowid'   => $rowid,
                'qty'     => 0
               );
            $this->cart->update($data);
           } ?>
            <?php 
                $this->load->library('cart');
                $cart = $this->cart->contents();
                 //echo $this->cart->total_items();
                   if($cart = $this->cart->contents()){
                     $i = 0;
                    foreach($cart as $item){
                     $i++;} }?>
            <h5>
               My Cart <span id="text_success" class="text-success">(<?php if(@$i>0){echo @$i;} else{echo '0';}?>)</span>
               <a data-toggle="offcanvas" onclick="remove_togle()" class="float-right" href="#">X</a>
            </h5>
         </div>
         <div class="cart-sidebar-body">
            <button class="btn btn-secondary btn-lg btn-block text-left" type="button"><span class="float-left"><i class="mdi mdi-cart-outline"></i> <a href="<?php echo base_url();?>/Cart/clear_all"><span style="color:white">Remove all items</span></a><a href="<?php echo base_url();?>/Cart/"><span style="color:white;margin-left:150px;">View Cart</span></a></button>
            <?php
                 $this->load->library('cart');
                 if($cart = $this->cart->contents()){
                  $grand_total = 0;
                  $i = 1;
                  foreach ($cart as $item)
                  {
                    //print_r($item);
                    //$grand_total = $grand_total + $item['subtotal'];
                    $rowid="'".$item['rowid']."'";
                    $item_id="'".$item['id']."'";
                    $grand_total= $grand_total+$item['qty']*$item['margin_price'];
                 ?>
            <div class="cart-list-product">
               <a onclick="delete_item('<?php echo $item['rowid'];?>')" href="javascript:void(0)" class="float-right remove-cart" href=""><i class="mdi mdi-close"></i></a>
             <!--   <a onclick="delete_item('<?php echo $item['rowid'];?>')" href="javascript:void(0)" class="mt-2" role="button">
                                REMOVE
                            </a> -->
               <img class="img-fluid" src="<?php echo site_url(); ?>admin/upload/product_images/<?php echo @$item['image'];?>" alt="">
               <span class="badge badge-success"><?php echo $item['discount'];?>% OFF</span>
               <h5><a href="#"><?php echo $item['name'];?></a></h5>
               <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> : <?php echo $item['weight'];?> <?php echo $item['product_amu'];?></h6>
               <!-- <h6><strong><span class="mdi mdi-approval"></span> Quantity</strong> : <?php echo $item['qty'];?></h6> -->
                <div class="input-group s-c-qty">
                                       <span class="input-group-btn"><button  onclick="decrement_quantity(<?php echo @$item_id;?>,<?php echo @$rowid;?>,<?php echo @$item['margin_price'];?>,<?php echo @$item['qty'];?>)" class="btn btn-theme-round btn-number" type="button">-</button></span>

                                       <input readonly  class="form-control border-form-control form-control-sm input-number" type="text" id="cart_<?php echo $item['id'];?>" name="cart[<?php echo $item['id'];?>]" value="<?php echo $item['qty'];?>">
                                       <span class="input-group-btn">
                                       <button onclick="increment_val(<?php echo @$item_id;?>,<?php echo @$rowid;?>,<?php echo @$item['margin_price'];?>)"class="btn btn-theme-round btn-number" type="button">+</button>
                                       </span>
                                    </div>
            
                <h6><strong><span class="mdi mdi-approval"></span></strong> :₹<?php echo number_format($item['margin_price'],2)?> <i class="mdi mdi-tag-outline"></i> <span class="regular-price">₹ <?php echo number_format($item['price'],2);?></span>
                  <span style="margin-left: 8px; font-size:13px;" id="row_subtotal_<?php echo $item['id'];?>">₹ <?php
                                      $subtotal=$item['qty']*$item['margin_price'];
                                    echo number_format(@$subtotal,2);
                                   ?></span>
                </h6>

            </div>
         

         <?php } }?>
         </div>
         <div class="cart-sidebar-footer">
            <div class="cart-store-details">
                <h6><span class="mdi mdi-approval"></span>Sub Total <strong  id="allamnt"class="float-right">₹ <?= number_format(@$grand_total,2)?></strong></h6>
               <h6><span class="mdi mdi-approval">Delivery Charges <strong class="float-right">0.00</strong></h6>
               <h6><span class="mdi mdi-approval">Grand Total <strong  class="float-right allamnt2">₹ <?= number_format(@$grand_total,2)?></strong></h6>
            </div>
           <!--  <a href="checkout.html"><button class="btn btn-secondary btn-lg btn-block text-left" type="button"><span class="float-left"><i class="mdi mdi-cart-outline"></i> Proceed to Checkout </span><span class="float-right"><strong>$1200.69</strong> <span class="mdi mdi-chevron-right"></span></span></button></a> -->
             <a href="<?php echo base_url();?>Checkout/checkout"><button class="btn btn-secondary btn-lg btn-block text-left" type="button"><span class="float-left"><i class="mdi mdi-cart-outline"></i> Proceed to Checkout</button></a><br>
              <a href="<?php echo base_url();?>/Cart/"><button class="btn btn-secondary btn-lg btn-block text-left" type="button"><span class="float-left"><i class="mdi mdi-cart-outline"></i> View Cart</button></a>
               <!--  <a href="<?php echo base_url();?>/Cart/clear_all"><button class="btn btn-secondary btn-lg btn-block text-left" type="button"><span class="float-left"><i class="mdi mdi-cart-outline"></i> Clear all items</button></a> -->
         </div>


  <?php } 
      function update_cart_ajax(){
              // print_r($_POST);
                $rowid = $_POST['row_id'];
                $price = $_POST['price'];
                $amount = $price * $_POST['qty'];
                $qty = $_POST['qty'];
                $data = array(
                            'rowid'   => $rowid,
                            'mrp_price'   => $price,
                            'amount' =>  $amount,
                            'qty'     => $qty
                    );
                // print_r($data);die;   
                $this->cart->update($data);
                
            //redirect(base_url().'Cart');
                if($cart = $this->cart->contents()){
                  //echo'<pre>';print_r($cart);
                  $grand_total = 0;
                  $i = 1;
                  foreach ($cart as $item)
                  {
                      $grand_total = $grand_total + $item['margin_price'] * $item['qty'];


                  } 
                 } 
               echo  ' ₹&nbsp; '.number_format(@$grand_total,2);   

         }  
        function update_cart(){
           // echo'<pre>';print_r($_POST);die;

            // Recieve post values,calcute them and update
            $cart_info =  $_POST['cart'] ;
			//print_r($cart_info);die;
            foreach( $cart_info as $id => $cart)
                {	
                $rowid = $cart['rowid'];
                $price = $cart['price'];
                $amount = $price * $cart['qty'];
                $qty = $cart['qty'];

                    $data = array(
                            'rowid'   => $rowid,
                            'price'   => $price,
                            'amount' =>  $amount,
                            'qty'     => $qty
                    );
                // print_r($data);die;   
                $this->cart->update($data);
                }
              redirect(base_url().'Cart');       
	          }
       
	
}
