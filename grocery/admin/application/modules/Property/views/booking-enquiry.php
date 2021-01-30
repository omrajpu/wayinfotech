 <section class="usr">
  <div class="">
	<?php //include ("sidemenu.php") ?>
  <?php $this->load->view('include/sidemenu'); ?>
	<div class="col-sm-9">
	<div class="user_data">
	<div class="ustitle text-uppercase">
 
  Booking Enquiry List</div>
  <table class="table">
    <thead>
      <tr>
        <th>Sr.no</th>
        <th>Name</th>
        <th>Email</th>
        <th>Contact Number</th>
        <th>Adults</th>
        <th>Children</th>
        <th>Check In </th>
        <th>Check Out</th>
        
      </tr>
    </thead>
    <tbody>
    <?php
     //print_r($enquiry_data);
    $i=1;
    foreach ($enquiry_data as $val) {
      # code...
    
    ?>
      <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $val->name;?></td>
        <td><?php echo $val->email;?></td>
        <td><?php echo $val->contact_no;?></td>
        <td><?php echo $val->adults;?></td>
        <td><?php echo $val->children;?></td>
        <td><?php echo $val->form_date;?></td>
         <td><?php echo $val->to_date;?></td>
        </tr>
      <?php $i++;}?>
    </tbody>
  </table>
<div class="clearfix"></div>
	</div>
	
	</div>
	
	
  </div>
  <div class="clearfix"></div>
  </section>
 