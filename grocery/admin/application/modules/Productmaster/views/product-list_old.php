 <div class="content-wrapper">
               <div class="content-header">
                <div class="container-fluid">
                <h2>Products</h2>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a class="active" href="<?php echo base_url()?>Productmaster/ProductList">Products</a></li>
                        
                       <div class="pull-right"><a href="<?php echo base_url()?>Productmaster/addpromaster" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Add New"><i class="fa fa-plus"></i></a> <a href="#" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Rebuild"><i class="fa fa-refresh"></i></a>
                <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#form-category').submit() : false;" data-original-title="Delete"><i class="fa fa-trash-o"></i></button>
                </div>
                </ol>
                </div>
                </div>
                <?php //$this->load->view('include/alert-box'); ?>
                <!-- Main content -->
                <section class="content">
                   <div class="row">
<div id="filter-product" class="col-md-3 col-md-push-9 col-sm-12 hidden-sm hidden-xs">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title"><i class="fa fa-filter"></i> Filter</h3>
</div>
<div class="panel-body">
<div class="form-group">
<label class="control-label" for="input-name">Product Name</label>
<input type="text" name="filter_name" value="" placeholder="Product Name" id="input-name" class="form-control" autocomplete="off"><ul class="dropdown-menu"></ul>
</div>
<div class="form-group">
<label class="control-label" for="input-model">Model</label>
<input type="text" name="filter_model" value="" placeholder="Model" id="input-model" class="form-control" autocomplete="off"><ul class="dropdown-menu"></ul>
</div>
<div class="form-group">
<label class="control-label" for="input-price">Price</label>
<input type="text" name="filter_price" value="" placeholder="Price" id="input-price" class="form-control">
</div>
<div class="form-group">
<label class="control-label" for="input-quantity">Quantity</label>
<input type="text" name="filter_quantity" value="" placeholder="Quantity" id="input-quantity" class="form-control">
</div>
<div class="form-group">
<label class="control-label" for="input-status">Status</label>
<select name="filter_status" id="input-status" class="form-control">
<option value=""></option>
<option value="1" selected="selected">Enabled</option>
<option value="0">Disabled</option>
</select>
</div>
<div class="form-group text-right">
<button type="button" id="button-filter" class="btn btn-default"><i class="fa fa-filter"></i> Filter</button>
</div>
</div>
</div>
</div>
<div class="col-md-9 col-md-pull-3 col-sm-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title"><i class="fa fa-list"></i> Product List</h3>
</div>
<div class="panel-body">
<form action="" method="post" enctype="multipart/form-data" id="form-product">
<div class="table-responsive">
<table class="table table-bordered table-hover">
<thead>
<tr>
<td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);"></td>
<td class="text-center">Image</td>
<td class="text-left"> <a href="https://demo.opencart.com/admin/index.php?route=catalog/product&amp;user_token=cW8i9YfDoyMdNBdc5Crdw2s7fsQBfarg&amp;sort=pd.name&amp;filter_status=1&amp;order=DESC" class="asc">Product Name</a> </td>
<td class="text-left"> <a href="https://demo.opencart.com/admin/index.php?route=catalog/product&amp;user_token=cW8i9YfDoyMdNBdc5Crdw2s7fsQBfarg&amp;sort=p.model&amp;filter_status=1&amp;order=DESC">Model</a> </td>
<td class="text-right"> <a href="https://demo.opencart.com/admin/index.php?route=catalog/product&amp;user_token=cW8i9YfDoyMdNBdc5Crdw2s7fsQBfarg&amp;sort=p.price&amp;filter_status=1&amp;order=DESC">Price</a> </td>
<td class="text-right"> <a href="https://demo.opencart.com/admin/index.php?route=catalog/product&amp;user_token=cW8i9YfDoyMdNBdc5Crdw2s7fsQBfarg&amp;sort=p.quantity&amp;filter_status=1&amp;order=DESC">Quantity</a> </td>
<td class="text-left"> <a href="https://demo.opencart.com/admin/index.php?route=catalog/product&amp;user_token=cW8i9YfDoyMdNBdc5Crdw2s7fsQBfarg&amp;sort=p.status&amp;filter_status=1&amp;order=DESC">Status</a> </td>
<td class="text-right">Action</td>
</tr>
</thead>
<tbody>
<tr>
<td class="text-center"> <input type="checkbox" name="selected[]" value="42">
</td>
<td class="text-center"> <img src="https://demo.opencart.com/image/cache/catalog/demo/apple_cinema_30-40x40.jpg" alt="Apple Cinema 30&quot;" class="img-thumbnail"> </td>
<td class="text-left">Apple Cinema 30"</td>
<td class="text-left">Product 15</td>
<td class="text-right"> <span style="text-decoration: line-through;">$100.00</span><br>
<div class="text-danger">$90.00</div>
</td>
<td class="text-right"> <span class="label label-success">446</span> </td>
<td class="text-left">Enabled</td>
<td class="text-right"><a href="https://demo.opencart.com/admin/index.php?route=catalog/product/edit&amp;user_token=cW8i9YfDoyMdNBdc5Crdw2s7fsQBfarg&amp;product_id=42&amp;filter_status=1" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a></td>
</tr>
<tr>
<td class="text-center"> <input type="checkbox" name="selected[]" value="30">
</td>
<td class="text-center"> <img src="https://demo.opencart.com/image/cache/catalog/demo/canon_eos_5d_1-40x40.jpg" alt="Canon EOS 5D" class="img-thumbnail"> </td>
<td class="text-left">Canon EOS 5D</td>
<td class="text-left">Product 3</td>
<td class="text-right"> <span style="text-decoration: line-through;">$100.00</span><br>
<div class="text-danger">$80.00</div>
</td>
<td class="text-right"> <span class="label label-warning">0</span> </td>
<td class="text-left">Enabled</td>
<td class="text-right"><a href="https://demo.opencart.com/admin/index.php?route=catalog/product/edit&amp;user_token=cW8i9YfDoyMdNBdc5Crdw2s7fsQBfarg&amp;product_id=30&amp;filter_status=1" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a></td>
</tr>
<tr>
<td class="text-center"> <input type="checkbox" name="selected[]" value="47">
</td>
<td class="text-center"> <img src="https://demo.opencart.com/image/cache/catalog/demo/hp_1-40x40.jpg" alt="HP LP3065" class="img-thumbnail"> </td>
<td class="text-left">HP LP3065</td>
<td class="text-left">Product 21</td>
<td class="text-right"> $100.00
</td>
<td class="text-right"> <span class="label label-success">1000</span> </td>
<td class="text-left">Enabled</td>
<td class="text-right"><a href="https://demo.opencart.com/admin/index.php?route=catalog/product/edit&amp;user_token=cW8i9YfDoyMdNBdc5Crdw2s7fsQBfarg&amp;product_id=47&amp;filter_status=1" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a></td>
</tr>
<tr>
<td class="text-center"> <input type="checkbox" name="selected[]" value="28">
</td>
<td class="text-center"> <img src="https://demo.opencart.com/image/cache/catalog/demo/htc_touch_hd_1-40x40.jpg" alt="HTC Touch HD" class="img-thumbnail"> </td>
<td class="text-left">HTC Touch HD</td>
<td class="text-left">Product 1</td>
<td class="text-right"> $100.00
</td>
<td class="text-right"> <span class="label label-warning">0</span> </td>
<td class="text-left">Enabled</td>
<td class="text-right"><a href="https://demo.opencart.com/admin/index.php?route=catalog/product/edit&amp;user_token=cW8i9YfDoyMdNBdc5Crdw2s7fsQBfarg&amp;product_id=28&amp;filter_status=1" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a></td>
</tr>
<tr>
<td class="text-center"> <input type="checkbox" name="selected[]" value="41">
</td>
<td class="text-center"> <img src="https://demo.opencart.com/image/cache/catalog/demo/imac_1-40x40.jpg" alt="iMac" class="img-thumbnail"> </td>
<td class="text-left">iMac</td>
<td class="text-left">Product 14</td>
<td class="text-right"> $100.00
</td>
<td class="text-right"> <span class="label label-warning">0</span> </td>
<td class="text-left">Enabled</td>
<td class="text-right"><a href="https://demo.opencart.com/admin/index.php?route=catalog/product/edit&amp;user_token=cW8i9YfDoyMdNBdc5Crdw2s7fsQBfarg&amp;product_id=41&amp;filter_status=1" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a></td>
</tr>
<tr>
<td class="text-center"> <input type="checkbox" name="selected[]" value="40">
</td>
<td class="text-center"> <img src="https://demo.opencart.com/image/cache/catalog/demo/iphone_1-40x40.jpg" alt="iPhone" class="img-thumbnail"> </td>
<td class="text-left">iPhone</td>
<td class="text-left">product 11</td>
<td class="text-right"> $101.00
</td>
<td class="text-right"> <span class="label label-warning">0</span> </td>
<td class="text-left">Enabled</td>
<td class="text-right"><a href="https://demo.opencart.com/admin/index.php?route=catalog/product/edit&amp;user_token=cW8i9YfDoyMdNBdc5Crdw2s7fsQBfarg&amp;product_id=40&amp;filter_status=1" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a></td>
</tr>
<tr>
<td class="text-center"> <input type="checkbox" name="selected[]" value="48">
</td>
<td class="text-center"> <img src="https://demo.opencart.com/image/cache/catalog/demo/ipod_classic_1-40x40.jpg" alt="iPod Classic" class="img-thumbnail"> </td>
<td class="text-left">iPod Classic</td>
<td class="text-left">product 20</td>
<td class="text-right"> $100.00
</td>
<td class="text-right"> <span class="label label-warning">0</span> </td>
<td class="text-left">Enabled</td>
<td class="text-right"><a href="https://demo.opencart.com/admin/index.php?route=catalog/product/edit&amp;user_token=cW8i9YfDoyMdNBdc5Crdw2s7fsQBfarg&amp;product_id=48&amp;filter_status=1" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a></td>
</tr>
<tr>
<td class="text-center"> <input type="checkbox" name="selected[]" value="36">
</td>
<td class="text-center"> <img src="https://demo.opencart.com/image/cache/catalog/demo/ipod_nano_1-40x40.jpg" alt="iPod Nano" class="img-thumbnail"> </td>
<td class="text-left">iPod Nano</td>
<td class="text-left">Product 9</td>
<td class="text-right"> $100.00
</td>
<td class="text-right"> <span class="label label-warning">0</span> </td>
<td class="text-left">Enabled</td>
<td class="text-right"><a href="https://demo.opencart.com/admin/index.php?route=catalog/product/edit&amp;user_token=cW8i9YfDoyMdNBdc5Crdw2s7fsQBfarg&amp;product_id=36&amp;filter_status=1" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a></td>
</tr>
<tr>
<td class="text-center"> <input type="checkbox" name="selected[]" value="34">
</td>
<td class="text-center"> <img src="https://demo.opencart.com/image/cache/catalog/demo/ipod_shuffle_1-40x40.jpg" alt="iPod Shuffle" class="img-thumbnail"> </td>
<td class="text-left">iPod Shuffle</td>
<td class="text-left">Product 7</td>
<td class="text-right"> $100.00
</td>
<td class="text-right"> <span class="label label-warning">0</span> </td>
<td class="text-left">Enabled</td>
<td class="text-right"><a href="https://demo.opencart.com/admin/index.php?route=catalog/product/edit&amp;user_token=cW8i9YfDoyMdNBdc5Crdw2s7fsQBfarg&amp;product_id=34&amp;filter_status=1" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a></td>
</tr>
<tr>
<td class="text-center"> <input type="checkbox" name="selected[]" value="32">
</td>
<td class="text-center"> <img src="https://demo.opencart.com/image/cache/catalog/demo/ipod_touch_1-40x40.jpg" alt="iPod Touch" class="img-thumbnail"> </td>
<td class="text-left">iPod Touch</td>
<td class="text-left">Product 5</td>
<td class="text-right"> $100.00
</td>
<td class="text-right"> <span class="label label-warning">0</span> </td>
<td class="text-left">Enabled</td>
<td class="text-right"><a href="https://demo.opencart.com/admin/index.php?route=catalog/product/edit&amp;user_token=cW8i9YfDoyMdNBdc5Crdw2s7fsQBfarg&amp;product_id=32&amp;filter_status=1" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a></td>
</tr>
 <tr>
<td class="text-center"> <input type="checkbox" name="selected[]" value="43">
</td>
<td class="text-center"> <img src="https://demo.opencart.com/image/cache/catalog/demo/macbook_1-40x40.jpg" alt="MacBook" class="img-thumbnail"> </td>
<td class="text-left">MacBook</td>
<td class="text-left">Product 16</td>
<td class="text-right"> $500.00
</td>
<td class="text-right"> <span class="label label-warning">0</span> </td>
<td class="text-left">Enabled</td>
<td class="text-right"><a href="https://demo.opencart.com/admin/index.php?route=catalog/product/edit&amp;user_token=cW8i9YfDoyMdNBdc5Crdw2s7fsQBfarg&amp;product_id=43&amp;filter_status=1" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a></td>
</tr>
<tr>
<td class="text-center"> <input type="checkbox" name="selected[]" value="44">
</td>
<td class="text-center"> <img src="https://demo.opencart.com/image/cache/catalog/demo/macbook_air_1-40x40.jpg" alt="MacBook Air" class="img-thumbnail"> </td>
<td class="text-left">MacBook Air</td>
<td class="text-left">Product 17</td>
<td class="text-right"> $1,000.00
</td>
<td class="text-right"> <span class="label label-warning">0</span> </td>
<td class="text-left">Enabled</td>
<td class="text-right"><a href="https://demo.opencart.com/admin/index.php?route=catalog/product/edit&amp;user_token=cW8i9YfDoyMdNBdc5Crdw2s7fsQBfarg&amp;product_id=44&amp;filter_status=1" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a></td>
</tr>
<tr>
<td class="text-center"> <input type="checkbox" name="selected[]" value="45">
</td>
<td class="text-center"> <img src="https://demo.opencart.com/image/cache/catalog/demo/macbook_pro_1-40x40.jpg" alt="MacBook Pro" class="img-thumbnail"> </td>
<td class="text-left">MacBook Pro</td>
<td class="text-left">Product 18</td>
<td class="text-right"> $2,000.00
</td>
<td class="text-right"> <span class="label label-warning">0</span> </td>
<td class="text-left">Enabled</td>
<td class="text-right"><a href="https://demo.opencart.com/admin/index.php?route=catalog/product/edit&amp;user_token=cW8i9YfDoyMdNBdc5Crdw2s7fsQBfarg&amp;product_id=45&amp;filter_status=1" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a></td>
</tr>
<tr>
<td class="text-center"> <input type="checkbox" name="selected[]" value="31">
</td>
<td class="text-center"> <img src="https://demo.opencart.com/image/cache/catalog/demo/nikon_d300_1-40x40.jpg" alt="Nikon D300" class="img-thumbnail"> </td>
<td class="text-left">Nikon D300</td>
<td class="text-left">Product 4</td>
<td class="text-right"> $80.00
</td>
<td class="text-right"> <span class="label label-warning">0</span> </td>
<td class="text-left">Enabled</td>
<td class="text-right"><a href="https://demo.opencart.com/admin/index.php?route=catalog/product/edit&amp;user_token=cW8i9YfDoyMdNBdc5Crdw2s7fsQBfarg&amp;product_id=31&amp;filter_status=1" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a></td>
</tr>
<tr>
<td class="text-center"> <input type="checkbox" name="selected[]" value="29">
</td>
<td class="text-center"> <img src="https://demo.opencart.com/image/cache/catalog/demo/palm_treo_pro_1-40x40.jpg" alt="Palm Treo Pro" class="img-thumbnail"> </td>
<td class="text-left">Palm Treo Pro</td>
<td class="text-left">Product 2</td>
<td class="text-right"> $279.99
</td>
<td class="text-right"> <span class="label label-warning">0</span> </td>
<td class="text-left">Enabled</td>
<td class="text-right"><a href="https://demo.opencart.com/admin/index.php?route=catalog/product/edit&amp;user_token=cW8i9YfDoyMdNBdc5Crdw2s7fsQBfarg&amp;product_id=29&amp;filter_status=1" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a></td>
</tr>
<tr>
<td class="text-center"> <input type="checkbox" name="selected[]" value="35">
</td>
<td class="text-center"> <img src="https://demo.opencart.com/image/cache/no_image-40x40.png" alt="Product 8" class="img-thumbnail"> </td>
<td class="text-left">Product 8</td>
<td class="text-left">Product 8</td>
<td class="text-right"> $100.00
</td>
<td class="text-right"> <span class="label label-success">975</span> </td>
<td class="text-left">Enabled</td>
<td class="text-right"><a href="https://demo.opencart.com/admin/index.php?route=catalog/product/edit&amp;user_token=cW8i9YfDoyMdNBdc5Crdw2s7fsQBfarg&amp;product_id=35&amp;filter_status=1" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a></td>
</tr>
<tr>
<td class="text-center"> <input type="checkbox" name="selected[]" value="49">
</td>
<td class="text-center"> <img src="https://demo.opencart.com/image/cache/catalog/demo/samsung_tab_1-40x40.jpg" alt="Samsung Galaxy Tab 10.1" class="img-thumbnail"> </td>
<td class="text-left">Samsung Galaxy Tab 10.1</td>
<td class="text-left">SAM1</td>
<td class="text-right"> $199.99
</td>
<td class="text-right"> <span class="label label-warning">0</span> </td>
<td class="text-left">Enabled</td>
<td class="text-right"><a href="https://demo.opencart.com/admin/index.php?route=catalog/product/edit&amp;user_token=cW8i9YfDoyMdNBdc5Crdw2s7fsQBfarg&amp;product_id=49&amp;filter_status=1" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a></td>
</tr>
<tr>
<td class="text-center"> <input type="checkbox" name="selected[]" value="33">
</td>
<td class="text-center"> <img src="https://demo.opencart.com/image/cache/catalog/demo/samsung_syncmaster_941bw-40x40.jpg" alt="Samsung SyncMaster 941BW" class="img-thumbnail"> </td>
<td class="text-left">Samsung SyncMaster 941BW</td>
<td class="text-left">Product 6</td>
<td class="text-right"> $200.00
</td>
<td class="text-right"> <span class="label label-warning">0</span> </td>
<td class="text-left">Enabled</td>
<td class="text-right"><a href="https://demo.opencart.com/admin/index.php?route=catalog/product/edit&amp;user_token=cW8i9YfDoyMdNBdc5Crdw2s7fsQBfarg&amp;product_id=33&amp;filter_status=1" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a></td>
</tr>
<tr>
<td class="text-center"> <input type="checkbox" name="selected[]" value="46">
</td>
<td class="text-center"> <img src="https://demo.opencart.com/image/cache/catalog/demo/sony_vaio_1-40x40.jpg" alt="Sony VAIO" class="img-thumbnail"> </td>
<td class="text-left">Sony VAIO</td>
<td class="text-left">Product 19</td>
<td class="text-right"> $1,000.00
</td>
<td class="text-right"> <span class="label label-warning">0</span> </td>
<td class="text-left">Enabled</td>
<td class="text-right"><a href="https://demo.opencart.com/admin/index.php?route=catalog/product/edit&amp;user_token=cW8i9YfDoyMdNBdc5Crdw2s7fsQBfarg&amp;product_id=46&amp;filter_status=1" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Edit"><i class="fa fa-pencil"></i></a></td>
</tr>
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
        <?php ?>
        script>
        <!-- page script -->
        <script>
            $(function () {
                $("#category_view").DataTable({
                    "order": [[1, "desc"]]
                })
            });

</script>
    </body>
</html>
