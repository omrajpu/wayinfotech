

 <div class="content-wrapper">
               <div class="content-header">
                <div class="container-fluid">
                <h2>Products</h2>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a class="active" href="<?php echo base_url()?>productmaster/ProductList">Products</a></li>
                        
                       <div class="pull-right"><a href="<?php echo base_url()?>Productmaster/addpromaster" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Add New"><i class="fa fa-plus"></i></a> <a href="#" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Rebuild"><i class="fa fa-refresh"></i></a>
                <button  data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#form-category').submit() : false;" data-original-title="Delete"><i class="fa fa-trash-o"></i></button>
               
                </div>
                </ol>
                </div>
                </div>
                <?php //$this->load->view('include/alert-box'); ?>
                <!-- Main content -->
                <section class="content">
                   <div class="row">

<div class="col-md-12 col-md-pull1-3 col-sm-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title"><i class="fa fa-list"></i> Product List</h3>
</div>
<div class="panel-body">
<form action="" method="post" enctype="multipart/form-data" id="form-product">
<div class="table-responsive">
 <table id="category_view" class="table table-bordered table-striped">
<thead>
<tr>
<td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);"></td>
<td class="text-center">S.No.</td>

<td class="text-left"> <a href="https://demo.opencart.com/admin/index.php?route=catalog/product&amp;user_token=cW8i9YfDoyMdNBdc5Crdw2s7fsQBfarg&amp;sort=pd.name&amp;filter_status=1&amp;order=DESC" class="asc">Product Name</a> </td>
<td class="text-center">Image</td>
<!-- <td class="text-left"> <a href="#">Brand</a> </td> -->
<!-- <td class="text-left"> <a href="#">Model</a> </td> -->
<td class="text-right"> <a href="#">Price</a> </td>
<td class="text-right"> <a href="#">Quantity</a> </td>
<td class="text-left"> <a href="#">Status</a> </td>
<td class="text-right">Action</td>
</tr>
</thead>
<tbody>
<?php
//echo'<pre>';print_r($product_list);
 if(!empty($product_list)){
foreach($product_list as $key=>$product_lists){
  $image=Get_Productgallery_details(@$product_lists->id);
  $image_url=@$image[0]->image;
 ?>
<tr>
<td class="text-center"><input type="checkbox" name="selected[]" value="42">
</td>

<td class="text-left"><?php echo $key+1;?></td>
<td class="text-left"><?php echo @$product_lists->product_name;?></td>
<td class="text-center"> <img src="<?php echo site_url(); ?>/upload/product_images/<?php echo @$image_url; ?>" alt="Apple Cinema 30&quot;" style="
    height: 100px;
    width: 100px;
" class="img-thumbnail"> </td>

<!-- <td class="text-left"><?php echo @$product_lists->brand_name;?></td> -->
<!-- <td class="text-left"><?php echo @$product_lists->model;?></td> -->
<td class="text-right"> <span style="text-decoration: line-through;"><?php echo number_format(@$image[0]->price_mrp,2);?></span><br>
<div class="text-danger"><?php echo number_format(@$image[0]->margin_price,2);?></div> 
</td>
<td class="text-center"> <span class="label label-success"><?php echo @$image[0]->qty;?></span> </td>
<td class="text-left"><?php echo @$product_lists->status;?></td>
<td class="text-right">

    <a href="<?php echo base_url();?>Productmaster/addpromaster/<?php echo$product_lists->id; ?>" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a>

  <a onclick="deletes('tbl_products','id','<?php echo @$product_lists->id;?>','Blog_Category')" data-toggle="tooltip" title="" class="btn btn-danger" aria-hidden="true"><i class="fa fa-trash-o"></i></a>
  
    
</td>
</tr>
<?php }}else{ echo"No Data Found !"; }?>


</tbody>
</table>
</div>
</form>
<div class="row">
<div class="col-sm-6 text-left"></div>
<div class="col-sm-6 text-right">Showing 1 to 19 of 19 (1 Pages)</div>
</div>
</div>
</div>
</div>
</div>
                    <!-- /.row -->
                </section>
                <!-- /.content -->
            </div>

        <script src="<?php echo base_url() . "assets" ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo base_url() . "assets" ?>/bootstrap/js/bootstrap.min.js"></script>
        <!-- DataTables -->
        <script src="<?php echo base_url() . "assets" ?>/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() . "assets" ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <!-- SlimScroll -->
        <script src="<?php echo base_url() . "assets" ?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url() . "assets" ?>/plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url() . "assets" ?>/dist/js/app.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url() . "assets" ?>/dist/js/demo.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <?php ?>
        script>
        <!-- page script -->
        <script>
            $(function () {
                $("#category_view").DataTable({
                    "order": [[1, "desc"]]
                })
            });
       function deletes(table, field, delete_id, section)
            {
               
                    swal({
                         title: "Are you sure?",
                         text: "Do you really want to delete this record?",
                         icon: "warning",
                         buttons: true,
                         dangerMode: true,
                       })
                       .then((willDelete) => {
                         if (willDelete) {
                              swal("Your record has been successfully deleted!", {
                              icon: "success",
                           });
                          window.location.href ='<?php echo base_url();?>/Productmaster/deletes1/' + table + '/' + field + '/' + delete_id + '/' + section;
                         } else {
                             return false;
                         }
                       });
                
            }
</script>
<style type="text/css">
    #category_view_filter{
        float: right !important;
    }
</style>
    </body>
</html>
