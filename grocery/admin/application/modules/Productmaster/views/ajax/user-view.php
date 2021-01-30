<div class="main-container">
    <div class="list-group-item">
        <div class="row">
            <div class="col-md-4" style="border-right: 1px solid #eee;">
                <label>User Name</label>
            </div>
            <div class="col-md-8">
              
                <?php echo @$data->first_name; ?>

                
                <label><?php //echo @$data->brand_name; ?></label>
            </div>
        </div>
    </div>
    <div class="list-group-item">
        <div class="row">
            <div class="col-md-4" style="border-right: 1px solid #eee;">
                <label>Gender</label>
            </div>
            <div class="col-md-8">
                <label><?php echo @$data->gender; ?></label>
            </div>
        </div>
    </div>
    <div class="list-group-item">
        <div class="row">
            <div class="col-md-4" style="border-right: 1px solid #eee;">
                <label>DOB</label>
            </div>
            <div class="col-md-8">
                <label>
                    <?php echo @$data->dob; ?>
                </label>
            </div>
        </div>
    </div>
   
    <div class="list-group-item">
        <div class="row">
            <div class="col-md-4" style="border-right: 1px solid #eee;">
                <label>Photo</label>
            </div>
            <div class="col-md-8">
                <label>
                    <?php
                    if(@$data->photo){?>
                     <a target="_blank" href="<?php echo base_url();?>upload/user_images/<?php echo @$data->photo; ?>"><img  height="50px" width="50px;" src="<?php echo base_url();?>upload/user_images/<?php echo @$data->photo; ?>"></a>
                    <?php } else{?>
                    <a target="_blank" href="<?php echo base_url();?>upload/cat_images/user.png"><img  height="50px" width="50px;" src="<?php echo base_url();?>upload/cat_images/user.png"></a>
                <?php }?>
             </label>
            </div>
        </div>
    </div>
     <div class="modal-footer">
        <button type="button" class="btn btn-success" style="margin-top: 15px;"  id="btnCloseIt" data-dismiss="modal">Close</button>
    </div>
</div>
