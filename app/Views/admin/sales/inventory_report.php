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
</div>
<h1>Inventory Reports</h1>
<ul class="breadcrumb">
<li><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
<li><a href="<?php echo base_url('admin/inventory_reports'); ?>">Inventory Reports</a></li>
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
 <button type="button" id="export" class="btn btn-success pull-right" style="padding: 5px;margin-top: -6px;" ><i class="fa fa-download"></i> Export Order</button>
</div>
<div class="panel-body">
<div class="form-group">
<label class="control-label" for="input-date-added">Product Name</label>
<div class="input-group date">
<input type="text" name="name" value="<?php echo @$_GET['name']; ?>" placeholder="Product Name" id="input-date-added" class="form-control" />
</div>
</div>
<div class="form-group">
<label class="control-label" for="input-date-added">Order Date</label>
<div class="input-group date">
<input type="date" name="date_added" value="<?php echo @$_GET['date_added']; ?>" placeholder="Order Date" data-date-format="YYYY-MM-DD" id="input-date-added" class="form-control"/>
</div>
</div>
<div class="form-group text-right">
<a href="<?php echo base_url('admin/inventory_reports'); ?>"><button type="button" class="btn btn-default">Reset</button></a> &nbsp;
<button type="submit" id="button-filter" class="btn btn-info"><i class="fa fa-filter"></i> Filter</button>
</div>
</div>
</div>
</form>
</div>
<div class="col-md-9 col-md-pull-3 col-sm-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title"><i class="fa fa-list"></i>Inventory Reports</h3>
</div>
<div class="panel-body">
<form method="post" action="" enctype="multipart/form-data" id="form-order">
<table class="table table-bordered table-hover">
<thead>
<tr>
<!-- <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td> -->
<td class="text-left">Date</td>
<td class="text-left">Product Name</td>

<td class="text-left">Variant title</td>
<td class="text-left">Variant SKU</td>
<td class="text-left">Quantity sold</td>
<td class="text-left">Current quantity</td>
<td class="text-left">Percent sold</td>
</tr>
</thead>
<tbody>
<?php if (!empty($detail)) {foreach ($detail as $key => $value) {?>
<tr>
<!-- <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $value->id; ?>" /></td> -->
<td class="text-left"><?php echo date('d M Y',strtotime($value->date_added)); ?></td>
<td class="text-left"><?php echo $value->p_name; ?></td>

<td class="text-left"><?php echo strtoupper($value->option); ?></td>

<td class="text-left"><?= $value->sku; ?></td>

<td class="text-left"><?php echo $value->quantity; ?></td>

<?php 
$option_id = json_decode($value->option_id); 
if(!empty($option_id[0])){
 $row = $this->AdminModel->fs('product_option_value',array('id'=>$option_id[0])); ?>
<td class="text-left"><?php echo @$row->quantity; ?></td>
<?php }  else {?>
 <td class="text-left"><?php echo  $value->product_qty; ?></td>
<?php }  ?>

<td class="text-left"><?= @round($value->quantity * 100 / $value->product_qty,1);?> %</td>

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
    $('form#filter_form').attr('action','admin/export_inventory_report');
    $('form#filter_form').submit();
  });

 $('#button-filter').on('click',function(){
    $('form#filter_form').attr('method','GET');
    $('form#filter_form').attr('action','admin/inventory_reports',true);
    $('form#filter_form').submit();
  });


</script>
<?php echo $this->endSection();?>