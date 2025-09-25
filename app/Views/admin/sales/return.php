<?php 
$this->extend('layout/master_admin');
$this->section('page');
$validation = \Config\Services::validation(); 
?>
<div id="content">
 <div class="page-header">
  <div class="container-fluid">
   <div class="pull-right">
    <button type="button" data-toggle="tooltip" title="Filter" onclick="$('#filter-return').toggleClass('hidden-sm hidden-xs');" class="btn btn-default hidden-md hidden-lg"><i class="fa fa-filter"></i></button>
    <a href="<?= base_url('admin/add_return'); ?>" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a>
    <button type="button" data-toggle="tooltip" title="Delete" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#form-return').submit() : false;"><i class="fa fa-trash-o"></i></button>
   </div>
   <h1>Product Returns</h1>
   <ul class="breadcrumb">
    <li><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
    <li><a href="<?php echo base_url('admin/return_order'); ?>">Product Returns</a></li>
   </ul>
  </div>
 </div>
 <div class="container-fluid">
  <div class="row">
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
    
   <div id="filter-return" class="col-md-3 col-md-push-9 col-sm-12 hidden-sm hidden-xs">
    <div class="panel panel-default">
     <div class="panel-heading">
         

    <form action="" method="get">  
         
      <h3 class="panel-title"><i class="fa fa-filter"></i> Filters</h3>
     </div>
     <div class="panel-body">
      <div class="form-group">
       <label class="control-label" for="input-return-id">Return ID</label>
       <input type="text" name="id" value="" placeholder="Return ID" id="input-return-id" class="form-control" />
      </div>
      
      <div class="form-group">
       <label class="control-label" for="input-order-id">Order ID</label>
       <input type="text" name="order_id" value="" placeholder="Order ID" id="input-order-id" class="form-control" />
      </div>
      <div class="form-group">
       <label class="control-label" for="input-customer">Customer</label>
       <input type="text" name="customer" value="" placeholder="Customer" id="input-customer" class="form-control" />
      </div>
      <div class="form-group">
       <label class="control-label" for="input-product">Product</label>
       <input type="text" name="product" value="" placeholder="Product" id="input-product" class="form-control" />
      </div>
      <div class="form-group">
       <label class="control-label" for="input-model">Model</label>
       <input type="text" name="model" value="" placeholder="Model" id="input-model" class="form-control" />
      </div>
      <div class="form-group">
       <label class="control-label" for="input-return-status">Return Status</label>
       <select name="return_status_id" id="input-return-status" class="form-control">
        <option value=""></option>
        <option value="2">Awaiting Products</option>
        <option value="3">Complete</option>
        <option value="1">Pending</option>
       </select>
      </div>
  

      <div class="form-group text-right">
       <button type="submit" id="button-filter" class="btn btn-success"><i class="fa fa-filter"></i> Filter</button>
      <a href="<?php echo current_url(); ?>"> <button type="button" id="button-filter" class="btn btn-default"><i class="fa fa-reply"></i> Reset</button></a>
      </div>
     </form>
     </div>
    </div>
   </div>
   <div class="col-md-9 col-md-pull-3 col-sm-12">
    <div class="panel panel-default">
     <div class="panel-heading">
      <h3 class="panel-title"><i class="fa fa-list"></i> Product Return List</h3>
     </div>
     <div class="panel-body">
      <?php echo form_open('admin/delete_return_order','id="form-return"'); ?>  
       <div class="table-responsive">
        <table class="table table-bordered table-hover">
         <thead>
          <tr>
           <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
           <td class="text-right">Return ID</td>
           <td class="text-right">Order ID</td>
           <td class="text-left">Customer</td>
           <td class="text-left">Product</td>
           <td class="text-left">Model</td>
           <td class="text-left">Status</td>
           <td class="text-left">Date Added</td>
           <td class="text-left">Date Modified</td>
           <td class="text-right">Action</td>
          </tr>
         </thead>
         <tbody>
          <?php if (!empty($returns)) {foreach ($returns as $key => $value) {?>
          <tr>
          <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $value->id; ?>" /></td>
          <td class="text-center"><?php echo $value->id; ?></td>
          <td class="text-center"><?php echo $value->order_id; ?></td>
          <td class="text-center"><?php echo strtoupper($value->firstname.' '.$value->lastname); ?></td>
          <td class="text-center"><?php echo $value->product; ?></td>
          <td class="text-center"><?php echo $value->model; ?></td>
          <td class="text-center"><?php echo $value->return_status_id; ?></td>
          <td class="text-center"><?php echo date('d/m/Y',strtotime($value->date_added)); ?></td>
          <td class="text-center"><?php echo date('d/m/Y',strtotime($value->date_modified)); ?></td>
          <td class="text-center">
              <div style="min-width: 120px;">
                <div class="btn-group"><a href="<?php echo base_url('admin/add_return/'.$value->id); ?>" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="View"><i class="fa fa-pencil"></i></a>
                </div>
                </div>
           </td>
       </tr>   
          <?php } }else{?>
         <tr>
          <td class="text-center" colspan="10">No results!</td>
         </tr>
          <?php } ?>
         </tbody>
        </table>
       </div>
      </form>
      <div class="row">
      <!--  <div class="col-sm-6 text-left"></div>
       <div class="col-sm-6 text-right">Showing 0 to 0 of 0 (0 Pages)</div> -->
      </div>
     </div>
    </div>
   </div>
  </div>
 </div>


 <script type="text/javascript">
  <!--
  $('.date').datetimepicker({
    language: 'en-gb',
    pickTime: false
  });
  //-->
 </script>
</div>
<?php echo $this->endSection();?>