<?php 
$this->extend('layout/master_admin');
$this->section('page');
$validation = \Config\Services::validation(); 
use App\Models\CommonModel;
$this->AdminModel = new CommonModel();

?>
<div id="content">
 <div class="page-header">
  <div class="container-fluid">
   <div class="pull-right">
    <button type="button" data-toggle="tooltip" title="Filter" onclick="$('#filter-product').toggleClass('hidden-sm hidden-xs');" class="btn btn-default hidden-md hidden-lg"><i class="fa fa-filter"></i></button>
    <a href="<?php echo base_url('admin/add_product'); ?>" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a>
   
    <button type="button" form="form-product" formaction="" data-toggle="tooltip" title="Delete" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#form-product').submit() : false;"><i class="fa fa-trash-o"></i></button>
   </div>
   <h1><?php echo $page_title; ?></h1>
   <ul class="breadcrumb">
    <li><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
    <li><a href="<?php echo base_url('admin/product'); ?>"><?php echo $page_title; ?></a></li>
   </ul>
  </div>
 </div>
 <div class="container-fluid">
  <div class="row">
   <div id="filter-product" class="col-md-3 col-md-push-9 col-sm-12 hidden-sm hidden-xs">
    <div class="panel panel-default">
     <div class="panel-heading">
      <h3 class="panel-title"><i class="fa fa-filter"></i> Filter</h3>
     </div>

     <form action="<?php echo base_url('admin/product'); ?>" method="GET" >
     <div class="panel-body">
      <div class="form-group">
       <label class="control-label" for="input-name">Product Name</label>
       <input type="text" name="name" value="<?php echo @$_GET['name']; ?>" placeholder="Product Name" id="input-name" class="form-control" />
      </div>
      <div class="form-group">
       <label class="control-label" for="input-model">Part no</label>
       <input type="text" name="part_no" value="<?php echo @$_GET['part_no']; ?>" placeholder="Part no" id="input-model" class="form-control" />
      </div>

      <div class="form-group">
       <label class="control-label" for="input-status">Brand</label>
       <select name="brand" id="input-status" class="form-control">
        <option value="">Select</option>
        <?php  
        
        foreach ($brand_list as $key => $brand['category']){ 
            if($brand['category']['list']){foreach ($brand['category']['list'] as $key => $row) {  ?>
        
           <option value="<?php echo $row->id; ?>" <?php echo @$_GET['brand']==$row->id?'selected':''; ?>><?php echo $brand['category']['category']->name .' > '.$row->name; ?></option>

        <?php } } } ?>
        
         </select>
      </div>


      <div class="form-group">
       <label class="control-label" for="input-price">Price</label>
       <input type="text" name="price" value="<?php echo @$_GET['price']; ?>" placeholder="Price" id="input-price" class="form-control" />
      </div>
      <div class="form-group">
       <label class="control-label" for="input-quantity">Quantity</label>
       <input type="text" name="quantity" value="<?php echo @$_GET['quantity']; ?>" placeholder="Quantity" id="input-quantity" class="form-control" />
      </div>


      <div class="form-group">
       <label class="control-label" for="input-status">Status</label>
       <select name="status" id="input-status" class="form-control">
        
        <option value="1" <?php echo @$_GET['status']==1?'selected':''; ?>>Enabled</option>

        <option value="2" <?php echo @$_GET['status']==2?'selected':''; ?>>Disabled</option>
       </select>
      </div>
      <div class="form-group text-right">
       <button type="submit" id="button-filter" class="btn btn-info"><i class="fa fa-filter"></i> Filter</button>&nbsp;
       <a href="<?php echo base_url('admin/product'); ?>"> <button type="button" id="button-filter" class="btn btn-default"><i class="fa fa-reply"></i> Reset</button></a>
      </div>
     </div>

   </form>
    </div>
   </div>
   <div class="col-md-9 col-md-pull-3 col-sm-12">
    <div class="panel panel-default">
     <div class="panel-heading">
     <?php if ($success = session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <strong><?php echo $success; ?></strong> </a>
    </div>
    <?php endif ?>

    <?php if ($error = session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <strong><?php echo $error; ?></strong> </a>
    </div>
    <?php endif ?>
      <h3 class="panel-title"><i class="fa fa-list"></i> Product List</h3>
        <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#myModal" style="padding: 3px;margin-top: -4px;"><i class="fa fa-upload"></i>&nbsp; Import Product</button>
 
     </div>
     <div class="panel-body">

    <?php echo form_open_multipart('admin/delete_product','id="form-product"'); ?>  
       <div class="table-responsive">
        <table class="table table-bordered table-hover">
         <thead>
          <tr>
           <th style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></th>
           <th class="text-center">Image</th>
           <th class="text-left">Product Name</th>
           <th class="text-left">Part no</th>
           <th class="text-left">Price</th>
           <th class="text-left">Quantity</th>
           <th class="text-left">Brand</th>
           <th class="text-left">Status</th>
           <th class="text-right">Action</th>
          </tr>
         </thead>
         <tbody>
         
          <?php if ($detail) {foreach ($detail as $key => $value) { ?>
           
          <tr>
           <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $value['id']; ?>" /></td>
           <td class="text-center">
            <a href="<?php echo base_url('product-detail/'.$value['seo_url']); ?>" target="_blank" title="click to view">
            <img src="<?php echo @$value['image']?base_url($value['image']):base_url($config_logo); ?>" alt='<?php echo $value['name']; ?>"' class="img-thumbnail" width="100" height="100" /></a>
          </td>
           <td class="text-left"><?php echo $value['name']; ?></td>
           <td class="text-left"><?php echo $value['part_no']?$value['part_no']:'N/A'; ?></td>

           <td class="text-right">
            <span <?php echo $value['special_price']==""?:'style="text-decoration:line-through;"'; ?> ><?php echo $value['price']; ?></span><br />
            <div class="text-danger"><?php echo $value['special_price']?$value['special_price']:''; ?></div>
           </td>

           <td class="text-right"><span class="label <?php echo  $value['quantity'] < 5?'label-danger':'label-success'; ?>"><?php echo $value['quantity']; ?></span></td>
           <td class="text-left"><?php echo $value['brand_name']?$value['brand_name']:'N/A'; ?></td>

           <td class="text-left"><?php echo $value['status']==1?'Enabled':'Disabled'; ?></td>
           <td class="text-right">
            <a href="<?php echo base_url('admin/add_product/'.$value['id']); ?>" data-toggle="tooltip" title="Edit" class="btn btn-primary">
             <i class="fa fa-pencil"></i>
            </a>
           </td>
          </tr>
          <?php } } ?>
        
         </tbody>
        </table>
       </div>
      </form>
           <div class="row">
              <div class="col-sm-6 text-left">
        <ul class="pagination">
        <?php if ($pager):?>    
        <?php echo $pager->links(); ?>
         <?php endif; ?>
        </ul>
        </div>
              <div class="col-sm-6 text-right">Showing <?php echo $offset; ?> to <?php echo $offset+count($detail); ?> of <?php echo $total_rows; ?> (<?php echo $pages; ?> Pages)</div>
            </div>
     </div>
    </div>
   </div>
  </div>
 </div>


</div>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Bulk Product uploads </h4>
      </div>
      <?php echo form_open_multipart('admin/import_products','class="form-inline"');?>

      <div class="modal-body">
        <div class="row">
          <div class="col-sm-6">
        <p>Follow this steps.</p>

        <p>Step 1: Download file</p>
        <p>Step 2: Fill entry</p>
        <p>Step 3: upload fill file</p>
         <p> <a href="<?php echo ADMIN_CATALOG.'product.csv'; ?>"><button type="button" class="btn btn-primary"> Download </button></a></p> 
          </div>
         
          
        </div>
       
      
        
        <div class="form-group">
            <h6>Note: Maximum 2500 - 3000 records per csv file only</h6>
          <label  for="email">Upload Csv</label>
          <input type="file" name="csv" class="form-control" required >
        </div>
        
        <div class="form-group">
           
          <label  for="email">Select Method</label>
          <input type="radio" name="type" value="update" checked> Update &nbsp;  
           <input type="radio" name="type" value="insert"> Insert
        </div>
        
       
        
      </div>
      <div class="modal-footer">

        <button type="submit" class="btn btn-success" id="btn_submit">Submit</button>
      
      </div>
      </form>
    </div>

  </div>
</div>


<script>
$('#btn_submit').on('click',function(){
      $('#btn_submit').html('<i class="fa fa-spinner fa-spin"></i> Processing...');  
});    
    
</script>


<?php echo $this->endSection();?>