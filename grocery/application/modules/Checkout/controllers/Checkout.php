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
            $this->load->library('session');
            $this->load->database();
            //$this->load->library('encrypt');
            $this->load->helper('crypto_helper');
            $this->load->library('form_validation');
            $this->load->library('encryption');
            $this->load->model('Checkout_model');
            $this->load->model('../../Common/Crud_model');
           $this->load->helper(array('form', 'url','new'));
            
           
        }
        public function index()
        {    //echo'<pre>'; print_r($_SESSION);die;
            $data['category_data']=$this->Crud_model->getDirectQueryCommonData('SELECT id,category_name,image_url  FROM `category_details` ORDER BY `id` ASC');
            $userid=@$_SESSION['userid'];  
            if(@$userid){
              $data['cust_data']=$this->Checkout_model->get_checkout_data($userid);

            }
            $data['state'] = $this->Checkout_model->get_state();
            $data['count_order'] = $this->Checkout_model->count_order();

            $data['subview']="checkout";
            $this->load->view('layout2/default',$data);
           // $this->load->view('Checkout/checkout',$data);
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
        public function Signup_user(){
               $name=$this->input->post('name');
               $email=$this->input->post('email');
               $phone=$this->input->post('phone');
               $this->load->library('session');
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
              $user_id=$this->Checkout_model->save_customer_data($insert_data);
              //$this->session->userid = $user_id;
              //$this->session->email =  $email;
              //$this->session->user_name = $name;
              $this->session->set_flashdata('reg_msg','You are successfully register.');
              unset($_SESSION['reg_error']);
              unset($_SESSION['login_succ_show']);
              unset($_SESSION['alredy_reg_error']);
              unset($_SESSION['login_error_show']);
              redirect(base_url().'Checkout/checkout');
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
                             $this->session->user_name =  $row->first_name;
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
public function login_check(){
           //echo'<pre>'; print_r($_POST);die;
            if ($this->session->userdata('userid')== "")
               {
                $this->session->set_flashdata('login_msg','You are  not login user!');
                redirect(base_url().'Checkout/checkout');
               }else{
                     if(!empty($_POST))
                                      {
                                      if($_POST['payment_mode']=='online'){
                                        $_SESSION['mode']='online';
                                        $order_date=date('Y-m-d :H:i:s');
                                        $uid=$this->session->userdata('userid');
                                        $country = $this->input->post('billing_country');
                                        $country2 = $this->input->post('billing_country2');
                                        $city = $this->input->post('billing_city');
                                        $city2 = $this->input->post('billing_city2');
                                        $province = $this->input->post('order_id');
                                        //$postcode = 0111;
                                        $billing_zip = $this->input->post('billing_zip');
                                        $billing_zip2 = $this->input->post('billing_zip2');
                                        $add1 = $this->input->post('billing_address');
                                        $address2 = $this->input->post('billing_address2');
                                        $billing_state = $this->input->post('billing_state');
                                        $billing_state2 = $this->input->post('billing_state2');
                                        $add2 = $this->input->post('add2');
                                        $fname = $this->input->post('billing_name');
                                        $fname2 = $this->input->post('billing_name2');
                                        //$lname= $this->input->post('order_id');
                                        $phone = $this->input->post('billing_tel');
                                        $phone2 = $this->input->post('billing_tel2');
                                        $email = $this->input->post('billing_email');
                                        $email2 = $this->input->post('billing_email2');
                                        $optradio=$this->input->post('optradio');
                                        $insert_id = $this->Checkout_model->addcheckout($country2,$city2,$billing_zip2,$add2,$fname2,$phone2,$email2,$billing_state2,$country,$city,$province,$billing_zip,$add1,$fname,$phone,$email,$uid,$billing_state);
                                        $in=$this->db->insert_id();
                                      
                                        $checkout_id=$this->session->userdata('checkout_id');
                                        $checkout_id=$this->session->userdata('checkout_id');
                                        $this->session->set_userdata('checkout_id',$in);
                                        $payment='Online payment';
                                        $checkout_id=$this->session->userdata('checkout_id');
                                        $this->Checkout_model->addpayment($payment,$checkout_id,$uid);
                                        $uid=$this->session->userdata('userid');
                                        $total=0;
                                        $qu=0;
                                        //add to cart in database
                                        $cart=$this->cart->contents();
                                        //echo'<pre>';print_r($cart);die;
                                        if(!empty($this->cart->contents()))
                                         {
                                                    $total = 0;
                                                    $total_cart=$this->cart->total_items();
                                                    $this->Checkout_model->insertcart($total_cart);
                                                    $insert_id=$this->db->insert_id();
                                                    $_SESSION['cart_id']=$insert_id;
                                                    $checkout_id=$this->session->userdata('checkout_id');
                                                    $this->Checkout_model->addcheckoutcart($insert_id,$checkout_id,$uid);
                                                    foreach($this->cart->contents() as $items){
                                                           $file_name=$items['image'];
                                                               $total = $total + (($items['qty']) * ($items['price']));
                                                               $price=(($items['qty']) * ($items['price']));
                                                               $qu = $qu + $items['qty'];
                                                               $this->Checkout_model->insertcartproductdetail(@$items['hsn_code'],@$items['discount'],@$items['gst_per'],@$items['gst_type'],$insert_id,$items['id'],$price,$items['qty'],@$items['color'],@$items['size'],$items['image'],@$items['color'],@$items['number_of_pages'],$file_name);
                                                           }
                                        }
                                        
                                        //add sales detail to database
                                        $byname=$this->session->userdata('firstname');
                                        //$createby=$this->session->userdata('mem_id');
                                        $createby= '0';
                                        $this->Checkout_model->addsale($byname,$total,$createby,$qu);
                                        $insert=$this->db->insert_id();
                                       //$this->Checkout_model->addcheckoutcart($insert,$checkout_id,$uid);
                                        $output['cartdetail'] = $this->Checkout_model->getcartdata($uid);
                                        foreach ($output['cartdetail'] as $select4):
                                                        $this->Checkout_model->addsaledetail($insert,$select4);
                                        endforeach;   
                                        //$this->cart->destroy();
                                        $this->db->set('is_shipped',1);
                                        $this->db->where('userid',$uid);
                                        $this->db->update('tbl_cart');
                                        $this->session->set_userdata('checkout_id',$in);
                              
                                     
                //$merchant_data='238214';
                $merchant_data='';                        
                $working_key='4171EB653FF82BB5F311A66E9B92303D';//Shared by CCAVENUES
                $access_code='AVDW88GK75AW19WDWA';//Shared by CCAVENUES
                foreach ($_POST as $key => $value){
                  $merchant_data.=$key.'='.urlencode($value).'&';
                 }

                 $encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.

               // echo '<pre>';print_r($merchant_data);die;

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
             
                 }else{


                  
                      //echo"Cash on Delivery";
                 // $cart=$this->cart->contents();
                                        //echo'<pre>';print_r($cart);die;
                    // echo'<pre>'; print_r($_POST);die;
                                       $_SESSION['mode']='COD';
                                        // echo'<pre>'; print_r($_POST);die;
                                        $order_date=date('Y-m-d :H:i:s');
                                        $uid=$this->session->userdata('userid');
                                        $country = $this->input->post('billing_country');
                                        $country2 = $this->input->post('billing_country2');
                                        $city = $this->input->post('billing_city');
                                        $city2 = $this->input->post('billing_city2');
                                        $province = $this->input->post('order_id');
                                        //$postcode = 0111;
                                        $billing_zip = $this->input->post('billing_zip');
                                        $billing_zip2 = $this->input->post('billing_zip2');
                                        $add1 = $this->input->post('billing_address');
                                        $address2 = $this->input->post('billing_address2');
                                        $billing_state = $this->input->post('billing_state');
                                        $billing_state2 = $this->input->post('billing_state2');
                                        $add2 = $this->input->post('add2');
                                        $fname = $this->input->post('billing_name');
                                        $fname2 = $this->input->post('billing_name2');
                                        //$lname= $this->input->post('order_id');
                                        $phone = $this->input->post('billing_tel');
                                        $phone2 = $this->input->post('billing_tel2');
                                        $email = $this->input->post('billing_email');
                                        $email2 = $this->input->post('billing_email2');
                                        $optradio=$this->input->post('optradio');
                                        $insert_id = $this->Checkout_model->addcheckout($country2,$city2,$billing_zip2,$add2,$fname2,$phone2,$email2,$billing_state2,$country,$city,$province,$billing_zip,$add1,$fname,$phone,$email,$uid,$billing_state);
                                        $in=$this->db->insert_id();
                                      
                                        $checkout_id=$this->session->userdata('checkout_id');
                                        $checkout_id=$this->session->userdata('checkout_id');
                                        $this->session->set_userdata('checkout_id',$in);
                                        $payment='COD';
                                        $checkout_id=$this->session->userdata('checkout_id');
                                        $this->Checkout_model->addpayment($payment,$checkout_id,$uid);
                                        $uid=$this->session->userdata('userid');
                                        $total=0;
                                        $qu=0;
                                        //add to cart in database
                                        $cart=$this->cart->contents();
                                       // echo'<pre>';print_r($cart);
                                        if(!empty($this->cart->contents()))
                                         {
                                                    $total = 0;
                                                    $total_cart=$this->cart->total_items();
                                                    $this->Checkout_model->insertcart($total_cart);
                                                    $insert_id=$this->db->insert_id();
                                                    $_SESSION['cart_id']=$insert_id;
                                                    $checkout_id=$this->session->userdata('checkout_id');
                                                    $this->Checkout_model->addcheckoutcart($insert_id,$checkout_id,$uid);
                                                    foreach($this->cart->contents() as $items){
                                                           $file_name=$items['image'];
                                                               $total = $total + (($items['qty']) * ($items['price']));
                                                               $price=(($items['price']));
                                                               $qu = $qu + $items['qty'];
                                                               $this->Checkout_model->insertcartproductdetail(@$items['hsn_code'],@$items['discount'],@$items['gst_per'],@$items['gst_type'],$insert_id,$items['id'],$price,$items['qty'],@$items['color'],@$items['size'],$items['image'],@$items['color'],@$items['number_of_pages'],$file_name);
                                                           }
                                        }
                                        
                                        //add sales detail to database
                                        $byname=$this->session->userdata('firstname');
                                        //$createby=$this->session->userdata('mem_id');
                                        $createby= '0';
                                        $this->Checkout_model->addsale($byname,$total,$createby,$qu);
                                        $insert=$this->db->insert_id();
                                       //$this->Checkout_model->addcheckoutcart($insert,$checkout_id,$uid);
                                        $output['cartdetail'] = $this->Checkout_model->getcartdata($uid);
                                        foreach ($output['cartdetail'] as $select4):
                                                        $this->Checkout_model->addsaledetail($insert,$select4);
                                        endforeach;   
                                        //$this->cart->destroy();
                                        $this->db->set('is_shipped',1);
                                        $this->db->where('userid',$uid);
                                        $this->db->update('tbl_cart');
                                        $this->session->set_userdata('checkout_id',$in);
                     

                                      //send mail
      $res= $this->Checkout_model->get_comp_data();                                 
      $file_name ='Invoice_'. md5(rand()) . '.pdf';                               
      $invoice_date=date('Y-m-d :H:i:s');
      $invoice_date2=explode(' ',$invoice_date);
      $invoice_date3=explode('-',$invoice_date2[0]);
      $invoice_date3=$invoice_date3[2].'.'.$invoice_date3[1].'.'.$invoice_date3[0];
      $customer_id = $_SESSION['cart_id'];
      $html_content = '<body style="font-family: "Montserrat", sans-serif;font-size: 13px;box-sizing: border-box;position: relative;min-width: 1024px;max-width: 1024px;margin: 0 auto;padding: 25px 45px;line-height: 1.5;">
      <div class="invoice-header" style="box-sizing: border-box;font-family: sans-serif;font-size: 13px;margin: 0;display: flex;justify-content: space-between;">
     <div class="brand-logo" style="box-sizing: border-box;font-family: sans-serif;font-size: 13px;margin: 0;">
      <img src="http://stage.wayinfotechsolutions.co/grocery/images/logo2.png" alt="" style="box-sizing: border-box;font-family: sans-serif;font-size: 13px;margin: 0;border-style: none;vertical-align: middle;width: 120px;">
      <div class="brand-extra-info" style="box-sizing: border-box;font-family:sans-serif;font-size: 10px;margin: 5px 0;">
        <p style="box-sizing: border-box;font-family:sans-serif;font-size: inherit;margin: 15px 0 5px;"><span>Digitally Signed by'.@$res->comp_name.'</span></p>
        <div class="brand-date" style="box-sizing: border-box;font-family:sans-serif;font-size: 10px;margin: 0;"><span class="date" style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: inherit;margin: 0;margin-right: 5px;"> Date :'.@$invoice_date3.'</span></div>
        <div class="reason" style="box-sizing: border-box;font-family:sans-serif;font-size: inherit;margin: 0;"></div>
      </div>
     </div>
     <div class="invoice-title" style="box-sizing: border-box;font-family:sans-serif;font-size: 13px;margin: 0;text-align: right;">
      <h1 style="box-sizing: border-box;font-family: &quot;Segoe UI&quot;,Arial,sans-serif;font-size: 24px;margin: 10px 0;font-weight: 600;margin-top: 0;">Tax Invoice/Bill of Supply/Cash Memo</h1>
      <span style="box-sizing: border-box;font-family: "Montserrat", sans-serif;font-size: 13px;margin: 0;">(Original for Recipient)</span>
     </div>
     </div>';
      $html_content .= $this->Checkout_model->fetch_single_details($customer_id);
      $this->pdf->loadHtml($html_content);
      $this->pdf->render();
      $file = $this->pdf->output();
      file_put_contents($file_name, $file);
      //$this->pdf->stream("test.pdf", array("Attachment"=>0));
     //$this->pdf->stream("test.pdf");
      $to = $email;
      $from = 'Grocery@example.com';
      $subject = 'Grocery Order';
      $message = "<h2>Thanks for your order!</h2><br><p>We are sending invoice with attachment please enclosed attachment!</p>";
      $separator = md5(time());
      $eol = PHP_EOL;
      
    $attachment = chunk_split(base64_encode($file));




    $headers = "From: " . $from . $eol;
    $headers .= "MIME-Version: 1.0" . $eol;
    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol . $eol;

    $body = '';

    $body .= "Content-Transfer-Encoding: 7bit" . $eol;
    $body .= "This is a MIME encoded message." . $eol; //had one more .$eol


    $body .= "--" . $separator . $eol;
    $body .= "Content-Type: text/html; charset=\"iso-8859-1\"" . $eol;
    $body .= "Content-Transfer-Encoding: 8bit" . $eol . $eol;
    $body .= $message . $eol;


    $body .= "--" . $separator . $eol;
    $body .= "Content-Type: application/octet-stream; name=\"" . $file_name . "\"" . $eol;
    $body .= "Content-Transfer-Encoding: base64" . $eol;
    $body .= "Content-Disposition: attachment" . $eol . $eol;
    $body .= $attachment . $eol;
    $body .= "--" . $separator . "--";

    if (mail($to, $subject, $body, $headers)) {

        echo $msgsuccess = 'Mail Send Successfully';
    } else {

       echo  $msgerror = 'Main not send';
       }
    
   
     redirect(base_url().'Pages/payment_success_cod');

                                        
                                        

                      }
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
                    $email = $this->input->post('email');
                    $password = $this->input->post('password');
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
                            $this->session->user_name =  $row->first_name;
                            
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
