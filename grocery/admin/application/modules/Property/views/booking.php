 
 <section class="usr">
  <div class="">
	<?php //include ("sidemenu.php") ?>
  <?php $this->load->view('include/sidemenu'); ?>
	<div class="col-sm-9">
	<div class="user_data">
	<div class="ustitle text-uppercase">
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  $( function() {
    $( "#datepicker1" ).datepicker();
  } );
  </script>
  Block Dates</div>
   <?php
              $msg=$this->session->flashdata('message');
                //print_r($property_name);
              ?>
	 <form method="post" name="add_property" enctype="multipart/form-data"  action="<?php echo base_url();?>Property/savebooking" class="form-horizontal" role="form">
      <div class="form-group">
            <label class="col-lg-3 control-label">Property Name :</label>
            <div class="col-lg-7">
              <?php echo @$msg;?>
              <select name="p_id" class="form-control prot">
                <option value="sdfdf">Select Property Name</option>
                <?php
                foreach ($property_name as $val) {?>
                  <option value="<?php echo $val->id; ?>"><?php echo $val->p_title;?></option>
              <?php   } ?>

              </select>
            </div>
            <label class="col-lg-3 control-label">Block Dates :</label>
            <div class="col-lg-7">
             To <input id="datepicker" name="to_date" class="form-control" type="text" value=""><br>
             Form <input id="datepicker1" name="from_date" class="form-control" type="text" value="">
            </div>
          </div>
         
         <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-7">
              <input  name="update" type="submit" class="btn btn-primary sub" value="Save">
              
            </div>
          </div>
        </form>
<div class="clearfix"></div>
	</div>
	
	</div>
	
	
  </div>
  <div class="clearfix"></div>
  </section>
 