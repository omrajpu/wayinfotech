
<!-- Stripe JavaScript library -->
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
//set your publishable key
Stripe.setPublishableKey('pk_test_co0LX3t2EXYP6a1YIFMkt5ev');

//callback to handle the response from stripe
function stripeResponseHandler(status, response) {
    if (response.error) {
        //enable the submit button
        $('#payBtn').removeAttr("disabled");
        //display the errors on the form
        $(".payment-errors").html(response.error.message);
    } else {
        var form$ = $("#paymentFrm");
        //get token id
        var token = response['id'];
        //insert the token into the form
        form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
        //submit form to the server
        form$.get(0).submit();
    }
}
$(document).ready(function() {
    //on form submit
    $("#paymentFrm").submit(function(event) {
        //disable the submit button to prevent repeated clicks
        $('#payBtn').attr("disabled", "disabled");
        
        //create single-use token to charge the user
        Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
        }, stripeResponseHandler);
        
        //submit from callback
        return false;
    });
});
</script>

<div class="container">

<div class="col-sm-10">
<div class="stipp">
<br>
<div class="col-sm-12 text-center"><img src="<?php echo base_url();?>common/images/card.png" class="center-bolck img-response"></div>
<div class="clearfix"></div>
<br><br>
<!-- display errors returned by createToken -->
<span class="payment-errors"></span>

<!-- stripe payment form -->
<form action="<?php echo base_url();?>Checkout/payment_submit" method="POST" id="paymentFrm">
    
						<div class="col-sm-6">
						<div class="white"><br><br>
						<div class="form-group col-sm-12">
						 <div class="col-sm-4 padd fst_name">Card Holder Name</div>
						 <div class="col-sm-8"><input type="text" placeholder="Card Holder Name" name="name" class="chtbox2" required>
					 </div>
					 <div class="clearfix"></div>
					 </div>
	
					 
					 <div class="form-group col-sm-12">
						 <div class="col-sm-4 padd fst_name">Card Number</div>
						 <div class="col-sm-8">
						 <input type="text" name="card_num" size="20" autocomplete="off" placeholder="Card Number" class="card-number chtbox2" required />
						</div>
					 <div class="clearfix"></div>
					 </div>
					 
					 <div class="form-group col-sm-12">
						 <div class="col-sm-4 padd fst_name">Expiry Date</div>
						 <div class="col-sm-8">
						 <input type="text" name="exp_month" size="2" class="card-expiry-month mm" placeholder="MM" required>
							<span> / </span>
						<input type="text" name="exp_year" size="4" class="card-expiry-year mm" placeholder="YYY" required>
					 </div>
					 <div class="clearfix"></div>
					 </div>
					 
					 
					 <div class="form-group col-sm-12">
						 <div class="col-sm-4 padd fst_name">CVV</div>
						 <div class="col-sm-8">
						 <input type="text" name="cvc" size="4" autocomplete="off" class="card-cvc mm"  placeholder="CVV" required >
						</div>
					 <div class="clearfix"></div>
					 </div>
					 
					 <div class="clearfix"></div>
					 </div>
					 </div>
					 
					 <div class="col-sm-6">
					 <div class="white">
						<h3>Payment Details</h3><br>
                                                       <?php
$this->load->library('cart');
$cart = $this->cart->contents();
$grand_total = 0;
foreach ($cart as $item)
{
$grand_total = $grand_total + $item['subtotal'];
}?>
							<div class="subtotal">
							<b>Subtotal (2 items)</b> <span> € <?= number_format($grand_total,2)?></span>
							</div>
							
							<div class="subtotal">
							Home Delevery Cost <span> Free </span>
							</div>
							
							<div class="total">
							<b>TOTAL AMOUNT</b> <span><b> € <?= number_format($grand_total,2)?></b></span>
							</div>
							
							<hr>
							<div class="col-sm-12 text-center">
							<button type="submit" id="payBtn" class="conf_bt">CONFIRM PAYMENT</button>
							</div>
							
							<div class="clearfix"></div>
					 </div>
					 </div>
					 
					 
					 
	<div class="clearfix"></div>
	
	<hr>
	
	
	
	
	
    
</form>

</div>
</div>
</div>

