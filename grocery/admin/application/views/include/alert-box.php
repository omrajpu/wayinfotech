
<?php if ($this->session->flashdata('success')) { ?>
<div id="suc_msg" class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i>
             <a class="close" data-dismiss="alert" href="#">X</a>
             <?php echo $this->session->flashdata('success'); ?>
             
      </div>
<?php }
      if ($this->session->flashdata('error')) { ?>
        <div class="alert alert-block alert-error">
             <a class="close" data-dismiss="alert" href="#">X</a>
             <div class="text-center"> 
                <h4 class="alert-heading">Error!</h4>
                <?php echo $this->session->flashdata('error'); ?>
             </div>
        </div>
<?php }
      if ($this->session->flashdata('alert')) { ?>
        <div class="alert alert-block alert-error">
<!--             <a class="close" data-dismiss="alert" href="#">X</a>-->
             <div class="text-center"> 
                <h4 class="alert-heading">Alert!</h4>
                <?php echo $this->session->flashdata('alert'); ?>
            </div>
        </div>
<?php }
      if (validation_errors()) { ?>
        <div class="alert alert-block alert-error">
             <!--<a class="close" data-dismiss="alert" href="#">X</a>-->
             <p class="text-center"><?php echo validation_errors(); ?></p>
        </div>
<?php }
       