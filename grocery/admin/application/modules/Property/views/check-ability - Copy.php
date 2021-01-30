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
  Check Availability</div>
   
   
<?php
   //print_r($booking_date);
  $str=array();
  foreach ($booking_date as $val) {
                $todat=$val->b_to_date;
                $fdat=$val->b_from_date;
                $date1=date_create($todat);
                $date2=date_create($fdat);
                //difference between two dates
                $diff = date_diff($date1,$date2);
                $nDays=$diff->format("%a");
                $booking_date_new=date_create($todat)->modify('-1 days')->format('Y-m-d');
                for($i=1; $i<=$nDays+1;$i++){
                $fiveDaysf = date("m/d/Y", strtotime ($booking_date_new . '+ '.$i.'days'));
                 
                $str[]=$fiveDaysf;
                }

                //$todate=explode('-',$val->b_to_date);
                //echo $tdate=$todate[1].'/'.$todate[2].'/'.$todate[0];
                //$str[]=$tdate;

     }
   //echo  $len=count($str);

    ?>
<script type="text/javascript">

$( function(){
    // An array of dates
    var eventDates = {};
     var arrayFromPHP = <?php echo json_encode($str) ?>;
    //alert(arrayFromPHP);
    for (var i = 0; i < arrayFromPHP.length; i++) {
       //alert(arrayFromPHP[i]);
       eventDates[ new Date( arrayFromPHP[i] )] = new Date( arrayFromPHP[i] );
    }
   //alert(str);
    //eventDates[ new Date( '09/13/2018' )] = new Date( '09/13/2018' );
   
    // datepicker
    $('#datepicker').datepicker({
      

        beforeShowDay: function( date ) {
            var highlight = eventDates[date];
            if( highlight ) {

                 return [true, "event", 'Tooltip text'];
            } else {
                 return [true, '', ''];
            }
        }
    });
});
  </script>
<style type="text/css">
    .event a {
    background-color: #ff0000 !important;
    color: #ffffff !important;
    }
</style>

<div class="clearfix"></div>
<div style="height:15px;width:15px;background-color: red"></div><span>Not Available</span>
<div class="clearfix"></div>
<div id="datepicker"></div>


</div>
  </div>
  </div>
  <div class="clearfix"></div>
  </section>
 