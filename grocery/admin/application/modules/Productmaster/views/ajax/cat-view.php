<div class="main-container">
    <div class="list-group-item">
        <div class="row">
            <div class="col-md-4" style="border-right: 1px solid #eee;">
                <label>Categoery Name</label>
            </div>
            <div class="col-md-8">
                <?php 
                 //print_r($data);

                ?>
                <label><?php echo @$data->category_name; ?></label>
            </div>
        </div>
    </div>
    <div class="list-group-item">
        <div class="row">
            <div class="col-md-4" style="border-right: 1px solid #eee;">
                <label>Description</label>
            </div>
            <div class="col-md-8">
                <label><?php echo @$data->description; ?></label>
            </div>
        </div>
    </div>
    <div class="list-group-item">
        <div class="row">
            <div class="col-md-4" style="border-right: 1px solid #eee;">
                <label>Meta title</label>
            </div>
            <div class="col-md-8">
                <label>
                    <?php echo @$data->meta_title; ?>
                </label>
            </div>
        </div>
    </div>
    <div class="list-group-item">
        <div class="row">
            <div class="col-md-4" style="border-right: 1px solid #eee;">
                <label>Meta description</label>
            </div>
            <div class="col-md-8">
                <label>
                    <?php echo @$data->meta_description; ?>
                </label>
            </div>
        </div>
    </div>
    <div class="list-group-item">
        <div class="row">
            <div class="col-md-4" style="border-right: 1px solid #eee;">
                <label>Meta Tag</label>
            </div>
            <div class="col-md-8">
                <label>
                    <?php echo @$data->meta_keyword; ?>
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
                    <a target="_blank" href="<?php echo base_url();?>upload/cat_images/<?php echo @$data->image_url; ?>"><img  height="50px" width="50px;" src="<?php echo base_url();?>upload/cat_images/<?php echo @$data->image_url; ?>"></a>


                </label>
            </div>
        </div>
    </div>
     <div class="modal-footer">
        <button type="button" class="btn btn-success" style="margin-top: 15px;"  id="btnCloseIt" data-dismiss="modal">Close</button>
    </div>
</div>
