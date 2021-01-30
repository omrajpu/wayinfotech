<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

	function __construct()
	{
	    parent::__construct();
           
            //$this->load->model('Dashboard_Model');
           // $this->load->model('Category_Model');
           // $this->load->model('Subcategory_Model');
            $this->load->library('cart');
            $this->load->helper('url');  
            $this->load->helper('form');
            $this->load->helper('crypto');  
            $this->load->library('session');
            $this->load->database();
            //$this->load->library('encrypt');
            $this->load->library('form_validation');
            $this->load->library('encryption');
            $this->load->model('Checkout_model');
            
           
        }
        public function index()
	      {     //echo'<pre>'; print_r($_SESSION);die;
             //echo $userid=$_SESSION['cart_contents']['email'];
             foreach ($_SESSION as $value) {
              // print_r($value);
             }
             
            if(@$userid){
              $data['cust_data']=$this->Checkout_model->get_customer_data($userid);

            }
           $data['state'] = $this->Checkout_model->get_state();
            //$data['subcate'] = $this->Subcategory_Model->viewSubCategoryList();
            //$this->load->view('checkout');
            //
         // print_r($_SESSION);die;
            //echo $_SESSION['cart_total'];die;

            

            //$data['subview']="checkout";
            $this->load->view('Checkout/checkout',$data);
            $this->step_1();
        }

       public function get_city(){
                 $st_id=$_POST['st_id'];
                 $city_details= $this->Checkout_model->get_city_data($st_id);
                // echo'<pre>';print_r($city_details);

                 foreach ($city_details as $value) {?>
                    <option value="<?php echo $value->id;?>"><?php echo $value->name;?></option>
                <?php }
           
        }
       public function Signup_user_front(){
               $name=$this->input->post('name');
               $email=$this->input->post('email');
               $phone=$this->input->post('phone');
               $check_reg_user = $this->Checkout_model->check_reg_user($email);
              // print_r($check_reg_user);die;
               if(@$check_reg_user->customer_id!=''){
                $this->session->set_flashdata('alredy_reg_error','You already register by this email id!');
                unset($_SESSION['reg_error']);
                unset($_SESSION['reg_msg']);
                unset($_SESSION['login_succ_show']);
                unset($_SESSION['login_error_show']);
                redirect(base_url().'Checkout/front_login');
               }else{

               $password= md5($this->input->post('password'));
               $created_date=date('Y-m-d H:i:s');
               $insert_data=array(
                    'first_name'=>$name,
                    'email'=>$email,
                    'password'=>$password,
                    'phone'=>$phone,
                    'created_date'=>$created_date
                   );
              // print_r($insert_data);die;
              $this->Checkout_model->save_customer_data($insert_data);
              $this->session->set_flashdata('reg_msg','You are successfully register.');
              unset($_SESSION['reg_error']);
              unset($_SESSION['login_succ_show']);
              redirect(base_url().'Checkout/front_login');
              }

        }
        public function Signup_user(){
               $name=$this->input->post('name');
               $email=$this->input->post('email');
               $phone=$this->input->post('phone');
               $check_reg_user = $this->Checkout_model->check_reg_user($email);
               //print_r($check_reg_user);die;
               if(@$check_reg_user->customer_id!=''){
                $this->session->set_flashdata('alredy_reg_error','You already register by this email id!');
                unset($_SESSION['reg_error']);
                unset($_SESSION['reg_msg']);
                unset($_SESSION['login_succ_show']);
                unset($_SESSION['login_error_show']);
                redirect(base_url().'Checkout/checkout');
               }else{
               $password= md5($this->input->post('password'));
               $created_date=date('Y-m-d H:i:s');
               $insert_data=array(
                    'first_name'=>$name,
                    'email'=>$email,
                    'password'=>$password,
                    'phone'=>$phone,
                    'created_date'=>$created_date
                   );
              $this->Checkout_model->save_customer_data($insert_data);
              $this->session->set_flashdata('reg_msg','You are successfully register.');
              unset($_SESSION['reg_error']);
              unset($_SESSION['login_succ_show']);
              redirect(base_url().'Checkout/checkout');
              }

        }
         public function login_check(){
            if ($this->session->userdata('userid')== "")
               {
                $this->session->set_flashdata('login_msg','You are  not login user!');
                redirect(base_url().'Checkout/checkout');
               }else{
                 

                    //echo'<pre>';print_r($_POST);
                   // error_reporting(0);
    
      $merchant_data='238214';
      $working_key='4171EB653FF82BB5F311A66E9B92303D';//Shared by CCAVENUES
      $access_code='AVDW88GK75AW19WDWA';//Shared by CCAVENUES
      
      foreach ($_POST as $key => $value){
        $merchant_data.=$key.'='.urlencode($value).'&';
      }

      $encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.

      //echo '<pre>';print_r($encrypted_data);die;

    ?>
    <form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
    <?php
    echo "<input type=hidden name=encRequest value=$encrypted_data>";
    echo "<input type=hidden name=access_code value=$access_code>";
    ?>
    </form>
    </center>
    <script language='javascript'>document.redirect.submit();</script>
 <?php
     }
            
        }
    public function front_login(){
       $data['subview']="front_login";
       $this->load->view('layout/default',$data);

     }  
     public function login_front_check(){

                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
                $this->form_validation->set_rules('password', 'Password', 'required');
                
                if ($this->form_validation->run() == FALSE)
                   {
                   // $this->load->view('admin/login');
                    //$data['subview']="login";
                    //$this->load->view('layout/default',$data);
                     redirect(base_url().'Checkout/front_login');
                   }
                else
                   { 
                    $this->load->library('session');
                    $email = strtolower($this->input->post('email'));
                    $password = strtolower($this->input->post('password'));
                    $check_reg_user = $this->Checkout_model->check_reg_user($email);
                    if($check_reg_user->email!=''){
                    $result = $this->Checkout_model->login($email,$password);
                    if($result -> num_rows() > 0)
                      { 
                        foreach ($result->result() as $row)
                        { 
                            $this->session->userid = $row->customer_id;
                            //$this->session->admin = $row->is_Admin;
                            $this->session->email =  $row->email;
                            
                            $this->session->set_flashdata('login_succ_show','Successfully login');
                            unset($_SESSION['login_error_show']);
                            unset($_SESSION['login_msg']);
                            unset($_SESSION['reg_error']);
                            unset($_SESSION['reg_msg']);
                            unset($_SESSION['ship_msg']);
                            unset($_SESSION['alredy_reg_error']);
                            
                            
                            redirect(base_url().'Pages/general_notebook');
                            
                            //$data['subview']="user_dashboard";
                            //$this->load->view('layout/default',$data);
                            
                        }
                     }
                    else
                     {
                        //echo"3"; die;
                        $this->session->set_flashdata('login_error_show','Email and Password is Wrong!!');
                         unset($_SESSION['reg_error']);
                         unset($_SESSION['login_succ_show']);
                         unset($_SESSION['reg_msg']);
                         redirect(base_url().'Checkout/front_login');
                      }

                   }else{

                    $this->session->set_flashdata('reg_error','Your email id does not exist please register now!');
                    unset($_SESSION['login_error_show']);
                    unset($_SESSION['login_msg']);
                    unset($_SESSION['login_succ_show']);

                    redirect(base_url().'Checkout/front_login');

                   }




                  }



      }
      public function login(){

                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
                $this->form_validation->set_rules('password', 'Password', 'required');
                
                if ($this->form_validation->run() == FALSE)
                   {
                   // $this->load->view('admin/login');
                    //$data['subview']="login";
                    //$this->load->view('layout/default',$data);
                     redirect(base_url().'Checkout/checkout');
                   }
                else
                   { 
                    $this->load->library('session');
                    $email = strtolower($this->input->post('email'));
                    $password = strtolower($this->input->post('password'));
                    $check_reg_user = $this->Checkout_model->check_reg_user($email);
                    if($check_reg_user->email!=''){
                    $result = $this->Checkout_model->login($email,$password);
                    if($result -> num_rows() > 0)
                      { 
                        foreach ($result->result() as $row)
                        { 
                            $this->session->userid = $row->customer_id;
                            //$this->session->admin = $row->is_Admin;
                            $this->session->email =  $row->email;
                            
                            $this->session->set_flashdata('login_succ_show','Successfully login');
                            unset($_SESSION['login_error_show']);
                            unset($_SESSION['login_msg']);
                            unset($_SESSION['reg_error']);
                            unset($_SESSION['reg_msg']);
                            unset($_SESSION['ship_msg']);
                            unset($_SESSION['alredy_reg_error']);
                            
                            
                            redirect(base_url().'Checkout/checkout');
                            
                            //$data['subview']="user_dashboard";
                            //$this->load->view('layout/default',$data);
                            
                        }
                     }
                    else
                     {
                        //echo"3"; die;
                        $this->session->set_flashdata('login_error_show','Email and Password is Wrong!!');
                         unset($_SESSION['reg_error']);
                         unset($_SESSION['login_succ_show']);
                          unset($_SESSION['reg_msg']);

                        redirect(base_url().'Checkout/checkout');
                      }

                   }else{

                    $this->session->set_flashdata('reg_error','Your email id does not exist please register now!');
                    unset($_SESSION['login_error_show']);
                    unset($_SESSION['login_msg']);
                    unset($_SESSION['login_succ_show']);

                    redirect(base_url().'Checkout/checkout');

                   }




                  }



      }
       public function step_1()
       {
             // print_r($_POST);die;
			if($this->input->post('cdetail'))
			 {
                                    if(!empty($_POST))
                                      {
                                        $uid=$this->session->userdata('userid');
                                        $country = $this->input->post('country');
                                        $city = $this->input->post('city');
                                        $province = $this->input->post('province');
                            			      $postcode = $this->input->post('postcode');
                                        $add1 = $this->input->post('add1');
                            			      $add2 = $this->input->post('add2');
                                        $fname = $this->input->post('fname');
                            			      $lname= $this->input->post('lname');
                                        $phone = $this->input->post('phone');
                            			      $email = $this->input->post('email');
							                          $insert_id = $this->Checkout_Model->addcheckout($country,$city,$postcode,$add1,$fname,$phone,$email,$uid);
                          							$in=$this->db->insert_id();
                          							$checkout_id=$this->session->userdata('checkout_id');
                          							$this->session->set_userdata('checkout_id',$in);
                                        $payment='Cash';
                                        $checkout_id=$this->session->userdata('checkout_id');
                                        $this->Checkout_model->addpayment($payment,$checkout_id,$uid);
                                        $uid=$this->session->userdata('userid');
                                        $total=0;
                                        $qu=0;
                                        //add to cart in database
                                        if(!empty($this->cart->contents()))
                                        {
                                                    $total = 0;
                                                    $total_cart=$this->cart->total_items();
                                                    $this->Checkout_model->insertcart($total_cart);
                                                    $insert_id=$this->db->insert_id();
                                                    $checkout_id=$this->session->userdata('checkout_id');
                                                    $this->Checkout_model->addcheckoutcart($insert_id,$checkout_id,$uid);
                                                    foreach ($this->cart->contents() as $items):
                                                            $ip = $_SERVER['REMOTE_ADDR'];
                                                            $total = $total + (($items['qty']) * ($items['price']));
                                                            $qu = $qu + $items['qty'];
                                                            $this->Checkout_model->insertcartproductdetail($insert_id,$items['id'],$items['price'],$items['qty'],$ip,$items['color'],$items['size']);
                                                    endforeach;
                                        }
                                        //add sales detail to database
                                        $byname=$this->session->userdata('firstname');
                                        //$createby=$this->session->userdata('mem_id');
                                        $createby= '0';
                                        $this->Checkout_model->addsale($byname,$total,$createby,$qu);
                                        $insert=$this->db->insert_id();
                                        $this->Checkout_model->addcheckoutcart($insert,$checkout_id,$uid);
                                        $output['cartdetail'] = $this->Checkout_model->getcartdata($uid);
                                        foreach ($output['cartdetail'] as $select4):
                                                        $this->Checkout_model->addsaledetail($insert,$select4);
                                        endforeach;   
                                        $this->cart->destroy();
                                        $this->db->set('is_shipped',1);
                                        $this->db->where('userid',$uid);
                                        $this->db->update('tbl_cart');
                                        $this->session->set_flashdata('SUCCESSMSG','Your Order Successfully Placed!!');
                                       // redirect('index.php/cart/add');
                                        redirect(base_url().'Cart/add');
								//redirect(base_url().'Checkout/step_3');
							
							
					}
			}
                    
	}
	public function step_2()
        {
            $category =  $this->subcategory_model->getCategoryList();
            foreach($category as $cat)
            {
                $cat_list['cat'] = $cat->category_name;
                $cat_list['cat_id'] = $cat->id;
                $subcategory = $this->subcategory_model->getSubCategoryList($cat->id);

                $cat_list['sub'] = $subcategory;
                $result[] = $cat_list;
            }
            $data['result'] = $result;
            $footer['footer'] = $this->page_model->getPagedata();
            $this->load->view($this->config->item('fronttemplate').'/front_header',$data);
            $this->load->view($this->config->item('fronttemplate').'/step-2');
            $this->load->view($this->config->item('fronttemplate').'/front_footer',$footer);
			 

             //redirect('front/checkout/step_3');       
	}
        
	public function step_3()
        {
            //print_r($_POST);die;
            //$data['category_list'] = $this->Category_Model->get_list();
           // $data['subcate'] = $this->Subcategory_Model->viewSubCategoryList();
            //$this->load->view('step_3');
            //$data['subview']="step_3";
            //$this->load->view('layout/default', $data);

            if($this->input->post('paymentdetail'))
            {
                      if(!empty($_POST))
                      {
                                    $uid=$this->session->userdata('userid');

                                    $payment = $this->input->post('payment');
                                    $checkout_id=$this->session->userdata('checkout_id');
                                    $this->Checkout_Model->addpayment($payment,$checkout_id,$uid);
                                    redirect(base_url().'Checkout/step_4');
                    }
            }
			     
	}

public function payment_submit(){
         //check whether stripe token is not empty
if(!empty($_POST['stripeToken'])){
    $this->load->library('cart');
    $cart = $this->cart->contents();
     $grand_total = 0;
     foreach ($cart as $item)
      { 
      $grand_total = $grand_total + $item['subtotal'];
      }                                               
    //get token, card and user info from the form
    //echo phpinfo();
   //echo dirname(__FILE__);
    //die;
    $token  = $_POST['stripeToken'];
    $name = $_POST['name'];
    //$email = $_POST['email'];
    $card_num = $_POST['card_num'];
    $card_cvc = $_POST['cvc'];
    $card_exp_month = $_POST['exp_month'];
    $card_exp_year = $_POST['exp_year'];
    
    //include Stripe PHP library
    
    //echo dirname(__FILE__); die;
    require_once APPPATH."third_party/stripe/init.php";
    //require_once APPPATH."init.php";
    //$this->load->view('init');
   
    //set api key
    $stripe = array(
      "secret_key"      => "sk_test_Pjt8AevAKduckYXXfcou4Wjl",
      "publishable_key" => "pk_test_co0LX3t2EXYP6a1YIFMkt5ev"
    );
    
    \Stripe\Stripe::setApiKey($stripe['secret_key']);
    
    //add customer to stripe
    $customer = \Stripe\Customer::create(array(
        'email' => 'test@gmail.com',
        'source'  => $token
    ));
    
    //item information
    $itemName = "Product Item";
    $itemNumber = "PS123456";
    $itemPrice = $grand_total;
    $currency = "usd";
    $orderID = "SKA92712382139";
    
    //charge a credit or a debit card
    $charge = \Stripe\Charge::create(array(
        'customer' => $customer->id,
        'amount'   => $itemPrice,
        'currency' => $currency,
        'description' => $itemName,
        'metadata' => array(
            'order_id' => $orderID
        )
    ));
    
    //retrieve charge details
    $chargeJson = $charge->jsonSerialize();

    //check whether the charge is successful
    if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1){

        //order details 
        $amount = $chargeJson['amount'];
        $balance_transaction = $chargeJson['balance_transaction'];
        $currency = $chargeJson['currency'];
        $status = $chargeJson['status'];
        $date = date("Y-m-d H:i:s");
        
        //include database config file
        //include_once 'dbConfig.php';
        
        //insert tansaction data into the database
       // $sql = "INSERT INTO orders(name,email,card_num,card_cvc,card_exp_month,card_exp_year,item_name,item_number,item_price,item_price_currency,paid_amount,paid_amount_currency,txn_id,payment_status,created,modified) VALUES('".$name."','".$email."','".$card_num."','".$card_cvc."','".$card_exp_month."','".$card_exp_year."','".$itemName."','".$itemNumber."','".$itemPrice."','".$currency."','".$amount."','".$currency."','".$balance_transaction."','".$status."','".$date."','".$date."')";
        //$insert = $db->query($sql);
        $insert_data=array(
                  'name'=>$name,
                  'email'=>'est@gmail.com',
                  'card_num'=>$card_num,
                  'card_cvc'=>$card_cvc,
                  'card_exp_month'=>$card_exp_month,
                  'card_exp_year'=>$card_exp_year,
                  'item_name'=>$itemName,
                  'item_number'=>$itemNumber,
                  'item_price'=>$itemPrice,
                  'item_price_currency'=>$currency,
                  'paid_amount'=>$amount,
                  'paid_amount_currency'=>$currency,
                  'txn_id'=>$balance_transaction,
                  'payment_status'=>$status,
                  'created'=>$date,
                  'modified'=>$date
              );
        $last_insert_id=$this->Checkout_Model->insert_payment_details($insert_data);
        //$last_insert_id = $db->insert_id;
        
        //if order inserted successfully





        //if($last_insert_id && $status == 'succeeded'){
           $data['statusMsg']= "<h2>The transaction was successful.</h2><h4>Order ID: {$last_insert_id}</h4>";
        //}else{
           // $statusMsg = "Transaction has been failed";
       // }
    }else{
        $data['statusMsg'] = "Transaction has been failed";
    }
}else{
    $data['statusMsg'] = "Form submission error.......";
}

//show success or error message
$data['subview']="statusmsg";
$this->load->view('layout/default', $data);


    }
	public function step_4()
        {
                              if($this->input->post('confirm'))
                                {
                                        $uid=$this->session->userdata('userid');
                                        $total=0;
                                        $qu=0;
                                        //add to cart in database
                                        if(!empty($this->cart->contents()))
                                        {
                                                    $total = 0;
                                                    $total_cart=$this->cart->total_items();
                                                    $this->Checkout_Model->insertcart($total_cart);
                                                    $insert_id=$this->db->insert_id();
                                                    $checkout_id=$this->session->userdata('checkout_id');
                                                    $this->Checkout_Model->addcheckoutcart($insert_id,$checkout_id,$uid);
                                                    foreach ($this->cart->contents() as $items):
                                                             $ip = $_SERVER['REMOTE_ADDR'];
                                                            $total = $total + (($items['qty']) * ($items['price']));
                                                            $qu = $qu + $items['qty'];
                                                            $this->Checkout_Model->insertcartproductdetail($insert_id,$items['id'],$items['price'],$items['qty'],$ip,$items['color'],$items['size']);
                                                    endforeach;
                                        }
                                        //add sales detail to database
                                        $byname=$this->session->userdata('firstname');
                                        //$createby=$this->session->userdata('mem_id');
                                        $createby= '0';
                                        $this->Checkout_Model->addsale($byname,$total,$createby,$qu);
                                        $insert=$this->db->insert_id();
                                        $this->Checkout_Model->addcheckoutcart($insert,$checkout_id,$uid);
                                        $output['cartdetail'] = $this->Checkout_Model->getcartdata($uid);
                                        foreach ($output['cartdetail'] as $select4):
                                                        $this->Checkout_Model->addsaledetail($insert,$select4);
                                        endforeach;		
                                        $this->cart->destroy();
                                        $this->db->set('is_shipped',1);
                                        $this->db->where('userid',$uid);
                                        $this->db->update('tbl_cart');
                                        $this->session->set_flashdata('SUCCESSMSG','Your Order Successfully Placed!!');
                                       // redirect('index.php/cart/add');
                                        redirect(base_url().'Cart/add');
				}     
            //$data['category_list'] = $this->Category_Model->get_list();
            //$data['subcate'] = $this->Subcategory_Model->viewSubCategoryList();
            $this->load->view('step_4');		
       }
	
	
}
