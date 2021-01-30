<div class="modal-body">
    <?php
         $attributes = array('class'=>'form_submit');
         echo form_open('admin/edit_slug_submit', $attributes);
    ?>
    <input type="hidden" name="id" value="<?php echo $data["id"];?>">
    <div class="list-group-item">
        <div class="row">
            <div class="col-md-3">
                <label>Slug</label>
            </div>
            <div class="col-md-9">
                <?php echo $data["custom_title"];?>
            </div>
        </div>
    </div>
    
    <div class="list-group-item">
        <div class="row">
            <div class="col-md-3">
                <label>Edit Slug</label>
            </div>
            <div class="col-md-9">
                <input type="text" class="form-control" id="custom_title" name="custom_title" value="<?php echo $data["custom_title"]?>" placeholder="Enter Slug" required="required"/>
            </div>
        </div>
    </div>

    <div class="modal-footer">
        <div id="loading"></div>
        <button type="submit" class="btn btn-success" style="margin-top: 15px;" id="btnSaveIt">Save</button>
        <button type="button" class="btn btn-default" style="margin-top: 15px;"  id="btnCloseIt" data-dismiss="modal">Close</button>
    </div>
</div>
<script type="text/javascript">
 $('.form_submit').on('submit',function (e) 
 {
        e.preventDefault();
        var formData = new FormData();
        var form = $(".form_submit");
        var params = form.serializeArray();
        var baseurl ='<?php echo base_url()?>';
        var url  = baseurl+"admin/edit_slug_submit";
        var type = $(this).attr('method'); 
        $('#btnSaveIt').prop('disabled', true);
        
        $.ajax({
            url: url,
            type: type,
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) 
            {
                var response = jQuery.parseJSON(data);
                if(response["status"] == 'exists')
                {
                    $('#btnSaveIt').prop('disabled', false);
                    swal('Oops', "Slug already exists. Please try other name", "error");
                } 
                else if(response["status"] == 'success')
                {
                   $('#btnSaveIt').prop('disabled', false);
                   swal('Hurray', "Record has been successfully udpated", "success");
                   setTimeout(function(){
                        window.location.reload(); 
                    },150);
                }
                else if(response["status"] == 'fail')
                {
                    $('#btnSaveIt').prop('disabled', false);
                    swal('Oops', "error in Blog insertion. Please try again", "error");
                } 
           }
        });
   });
</script> 

