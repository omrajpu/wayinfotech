<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
   <?php include ("header.php") ?>

  
  <section class="usr">
  <div class="container">
	
	<div class="col-sm-3 padd">
	<div class="user_info">
	<ul>
	<li><a href="#"><i class="fa fa-user"></i> Personal Information</a></li>
	<li><a href="#"><i class="fa fa-graduation-cap"></i> Educational Infomation</a></li>
	<li><a href="#"><i class="fa fa-history"></i> Exam History</a></li>
	<li><a href="#"><i class="fa fa-lock"></i> Change Password</a></li>
	<li><a href="#"><i class="fa fa-sign-out"></i> Logout</a></li>
	</ul>
	</div>
	</div>
	
	<div class="col-sm-9">
	<div class="user_data">
	<div class="ustitle">PERSONAL INFORMATION</div>
	    
        <form class="form-horizontal" role="form">
         <div class="form-group">
            <label class="col-lg-3 control-label">Role Profile :</label>
            <div class="col-lg-8 mpt">
             
				<label class="customradio"><span class="radiotextsty">Student</span>
					  <input type="radio" checked="checked" name="radio">
					  <span class="checkmark"></span>
					</label>        
					<label class="customradio"><span class="radiotextsty">Teacher</span>
					  <input type="radio" name="radio">
					  <span class="checkmark"></span>
					</label>
					
					<label class="customradio"><span class="radiotextsty">Teacher</span>
					  <input type="radio" name="radio">
					  <span class="checkmark"></span>
					</label>
			 
            </div>
          </div>
		  
		  <div class="form-group">
            <label class="col-lg-3 control-label">Full Name :</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">DOB :</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="">
            </div>
          </div>
		  
		  
		  
          <div class="form-group">
            <label class="col-lg-3 control-label">Mobile :</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email :</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="">
            </div>
          </div>
          
		  
          <div class="form-group">
            <label class="col-md-3 control-label">Address :</label>
            <div class="col-md-8">
              <input class="form-control" type="text" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">State :</label>
            <div class="col-md-8">
              <input class="form-control" type="text" value="">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">City :</label>
            <div class="col-md-8">
              <input class="form-control" type="text" value="">
            </div>
          </div>
		  
		  <div class="form-group">
            <label class="col-lg-3 control-label">Gender :</label>
            <div class="col-lg-8 mpt">
             
				<label class="customradio"><span class="radiotextsty">Male</span>
					  <input type="radio" checked="checked" name="radio">
					  <span class="checkmark"></span>
					</label>        
					<label class="customradio"><span class="radiotextsty">Female</span>
					  <input type="radio" name="radio">
					  <span class="checkmark"></span>
					</label>
			 
            </div>
          </div>
		  
		  
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="button" class="btn btn-primary sub" value="Update">
              <span></span>
              <input type="reset" class="btn btn-default sub" value="Cancel">
            </div>
          </div>
        </form>
     
  
  
	
	
	
	<div class="clearfix"></div>
	</div>
	
	</div>
	
	
  </div>
  </section>
  

  

  
  
  

   
   

   
  

   <?php include ("footer.php") ?>