<?php 
$this->extend('layout/master_admin');
$this->section('page');
$validation = \Config\Services::validation(); 
use App\Models\CommonModel;
$adminModel = new CommonModel();
?>
<div id="content">
<div class="page-header">
<div class="container-fluid">
<div class="pull-right">
<!--<button type="button" data-toggle="tooltip" title="Filter" onclick="$('#filter-order').toggleClass('hidden-sm hidden-xs');" class="btn btn-default hidden-md hidden-lg"><i class="fa fa-filter"></i></button>-->
<!--<button type="submit" id="button-shipping" form="form-order" formaction="" formtarget="_blank" data-toggle="tooltip" title="Print Shipping List" class="btn btn-info"><i class="fa fa-truck"></i></button>-->
<!--<button type="submit" id="button-invoice" form="form-order" formaction="" formtarget="_blank" data-toggle="tooltip" title="Print Invoice" class="btn btn-info"><i class="fa fa-print"></i></button>-->
<!--<a href="<?php echo base_url('add_order'); ?>" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a>-->
</div>
<h1>Orders Reports</h1>
<ul class="breadcrumb">
<li><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
<li><a href="<?php echo base_url('admin/order_report'); ?>">Orders Reports</a></li>
</ul>
</div>
</div>

<div class="container-fluid">
<div class="row">
<div id="filter-order" class="col-md-3 col-md-push-9 col-sm-12 hidden-sm hidden-xs">
<form action="" id="filter_form">    
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title"><i class="fa fa-filter"></i> Filter</h3>
 <button type="button" id="export" class="btn btn-success pull-right" style="    padding: 5px; margin-top: -6px; margin-right: -16px;" ><i class="fa fa-download"></i> Export Report</button>
</div>
<div class="panel-body">
<div class="form-group">
<label class="control-label" for="input-date-added">Start Date</label>
<div class="input-group date">
<input type="date" name="start_date" value="<?php echo @$_GET['start_date']; ?>" placeholder="Start Date" data-date-format="YYYY-MM-DD" id="input-date-added" class="form-control" />
</div>
</div>
<div class="form-group">
<label class="control-label" for="input-date-added">End Date</label>
<div class="input-group date">
<input type="date" name="end_date" value="<?php echo @$_GET['end_date']; ?>" placeholder="Date Date" data-date-format="YYYY-MM-DD" id="input-date-added" class="form-control"/>
</div>
</div>
<div class="form-group text-right">
<a href="<?php echo base_url('admin/order_report'); ?>"><button type="button"  class="btn btn-default">Reset</button></a> &nbsp;
<button type="submit" id="button-filter" class="btn btn-info"><i class="fa fa-filter"></i> Filter</button>
</div>
</div>
</div>
</form>
</div>
<div class="col-md-9 col-md-pull-3 col-sm-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title"><i class="fa fa-list"></i> Order Reports</h3>
</div>
<div class="panel-body">
<form method="post" action="" enctype="multipart/form-data" id="form-order">
<table class="table table-bordered table-hover">
<thead>
<tr>
<!-- <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td> -->
<td class="text-left">Date</td>
<td class="text-left">Orders</td>
<td class="text-left">Products</td>
<td class="text-left">Gross sales</td>
<td class="text-left">Discounts</td>
<!-- <td class="text-right">Order Status</td> -->
<!-- <td class="text-left">Return</td> -->
<td class="text-left">Total sales</td>
<!-- <td class="text-right">Action</td> -->
</tr>
</thead>
<tbody>
<?php if (!empty($detail)) {foreach ($detail as $key => $value) {?>
<tr>
<!-- <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $value->id; ?>" /></td> -->
<td class="text-left"><?php echo date('d M Y',strtotime($value->date_added)); ?></td>
<td class="text-left"><?php echo $value->tdate; ?></td>
<?php 
$product = $adminModel->all_fetch('order_product', array('order_id'=> $value->id));
?>
<td class="text-left"><?php echo $product[0]->name; ?></td>
<td class="text-left"><?php echo $value->ttotall; ?></td>
<td class="text-left"><?php echo $value->tdiscount; ?></td>
<!-- <td class="text-center"><?php echo $value->current_status; ?></td> -->
<!-- <td class="text-center"><?php echo $value->txnid; ?></td> -->
<td class="text-left"><?php echo $value->ttotall-$value->tdiscount; ?></td>
<!-- <td class="text-center" style="min-width: 120px;">
<div class="btn-group">
<a href="<?php echo base_url('admin/view_order/'.$value->id); ?>" data-toggle="tooltip" title="view Order" class="btn btn-primary" data-original-title="View"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
<a href="<?php echo base_url('admin/delete_order/'.$value->id); ?>" data-toggle="tooltip" title="delete" class="btn btn-danger" data-original-title="View"  onclick="return confirm('Are you sure to delete');"><i class="fa fa-trash"></i></a>
</div>
</td> -->
</tr>   
<?php } }else{?>
<tr>
<td class="text-center" colspan="8">No results!</td>
</tr>
<?php } ?>
</tbody>
</table>
</form>
<div class="row">
<div class="col-sm-6 text-left"></div>
<div class="col-sm-6 text-right">Showing 0 to 0 of 0 (0 Pages)</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>



<script type="text/javascript">
  
  $('#export').on('click',function(){

    $('form#filter_form').attr('type','submit',true);
    $('form#filter_form').attr('method','POST');
    $('form#filter_form').attr('action','admin/export_order_report');
    $('form#filter_form').submit();
  });

 $('#button-filter').on('click',function(){
    $('form#filter_form').attr('method','GET');
    $('form#filter_form').attr('action','admin/order_report',true);
    $('form#filter_form').submit();
  });


</script>
<?php echo $this->endSection();?>