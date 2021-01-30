<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome to admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<link href="<?php echo base_url();?>admin_asset/css/bootstrap.min.css" rel="stylesheet">       
<link href="<?php echo base_url();?>admin_asset/css/custom.min.css" rel="stylesheet"> 
      
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
</head>

<style>

.loname{width: 28%; margin:8% auto;  color:#FFF;}


.logo {
    margin-top: 20px;
}
.panelpart {
    color: #000;
}
.access {
    margin-bottom: 20px;
}
.error {
    text-align: center;
    color: #fb3951;
    font-size: 14px;
    margin-bottom: 20px;
}
.form-group {
    margin-bottom: 15px;
}
.input-group {
    position: relative;
    display: table;
    border-collapse: separate;
    width: 100%;
}
.input-group-addon {
    padding: 0px!important;
    font-size: 14px;
    font-weight: 400;
    line-height: 1;
    color: #555;
    text-align: center;
    background-color: #fff!important;
    border: 1px solid #fff!important;
    border-radius: 0px 4px 4px 0px!important;
    width: 50px!important;
}


.logbtt {
    border: none;
    margin-left: 6px;
}
.bc{background:#496bb1; font-family: "Roboto Slab","Helvetica Neue",Helvetica,Arial,sans-serif!important;}

@media screen and (min-width:200px) and (max-width: 768px) { 
    
.loname{width: 80%!important; margin:8% auto;  color:#FFF;}	
	
}


</style>
<script>

   function validate_from()
   {
   
      if(document.form1.username.value=='')
	   {
	     alert('Please Enter Username');
		 document.form1.username.focus();
		 return false;
	   }
  else  if(document.form1.password.value=='')
	   {
	     alert('Please Enter Password');
		 document.form1.password.focus();
		 return false;
	   }
	   }

</script>

<body class="bcad">
<div class="loname">

<div class="user">
	
    <div class="panelpart">
    	<div class="text-center access">
		<div class="error">	
		<?php if($this->session->flashdata('error')) { ?>
                                                    <div role="alert" class="alert alert-danger">
                                                            <button data-dismiss="alert" class="close" type="button"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
                                                            <?=$this->session->flashdata('error')?>
                                                    </div>
                                            <?php } ?>
		
		</div>
		</div>
        
        <div class="error"><? //echo @$_SESSION['sess_msg'];?>	</div>
       
        <form action="<?php echo base_url();?>User/" method="POST" name="form1">
        
		<div class="col-sm-12 text-center logg">
		<img src="<?php base_url();?>admin_asset/images/logo_Africa_Events__.png" class="img-responsive center-block">
		<p>Admin Login</p>
		</div>
		
        <div class="form-group fontst">
		<div style="margin-top: 0px; color: red;" class="error_ad"><?php echo form_error('email'); ?></div>
								<div class="clearfix"></div>
							<div class="input-group">
								<input type="text" name="email"  class="form-control siz" placeholder="Email">
								<div class="input-group-addon"><i class="fa fa-user" style="color:#1fbbc8  !important"></i></div>
								
							</div>
						</div>
                        
                <div class="form-group fontst">
							<div style="margin-top: 0px; color: red;" class="error_ad"><?php echo form_error('password'); ?></div>
								<div class="clearfix"></div>
							<div class="input-group">
								
								<input type="password" name="password"  class="form-control siz" placeholder="Password">
								<div class="input-group-addon"><i class="fa fa-lock" style="color:#1fbbc8  !important"></i></div>
								
							</div>
						</div>        
                        
                        
                        <div class="row" style="margin-bottom:12px;"><br>
							
							
							<div class="col-xs-12">
								<div class="form-group ">
                                
                               <div class="text-center">
										 <input name="submit" type="submit" value="Log in" class="logbtt log">                                  
                                    </div>    
                                       
								</div>
							</div>
						</div>
                        
                        </form>
    </div>
</div>
</div>
</body>
</html>