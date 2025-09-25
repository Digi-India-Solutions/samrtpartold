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
<h1>Payments finance report</h1>
<ul class="breadcrumb">
<li><a href="">Home</a></li>
<li><a href="<?php echo base_url('admin/payment_finance_report'); ?>">Payments finance report</a></li>
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
 <button type="button" id="export" class="btn btn-success pull-right" style="padding: 5px;margin-top: -6px;" ><i class="fa fa-download"></i> Export Reports</button>
</div>
<div class="panel-body">
<div class="form-group">
<label class="control-label" for="input-date-added">First Name</label>
<div class="input-group date">
<input type="text" name="f_name" value="<?php echo @$_GET['f_name']; ?>" placeholder="First Name" id="input-date-added" class="form-control" />
</div>
</div>
<div class="form-group">
<label class="control-label" for="input-date-added">Last Name</label>
<div class="input-group date">
<input type="text" name="l_name" value="<?php echo @$_GET['l_name']; ?>" placeholder="Last Name" id="input-date-added" class="form-control" />
</div>
</div>
<div class="form-group">
<label class="control-label" for="input-date-added">Order Date</label>
<div class="input-group date">
<input type="date" name="date_added" value="<?php echo @$_GET['date_added']; ?>" placeholder="Order Date" data-date-format="YYYY-MM-DD" id="input-date-added" class="form-control"/>
</div>
</div>
<div class="form-group text-right">
<a href="<?php echo base_url('admin/payment_finance_report'); ?>"><button type="button" class="btn btn-default">Reset</button></a> &nbsp;
<button type="submit" id="button-filter" class="btn btn-info"><i class="fa fa-filter"></i> Filter</button>
</div>
</div>
</div>
</form>
</div>
<div class="col-md-9 col-md-pull-3 col-sm-12">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title"><i class="fa fa-list"></i>Payments finance report</h3>

</div>
<div class="panel-body">
<form method="post" action="" enctype="multipart/form-data" id="form-order">
<table class="table table-bordered table-hover">
<thead>
<tr>
<!-- <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td> -->
<td class="text-left">Date</td>
<td class="text-left">User Name</td>
<td class="text-left">Payment Methods</td>
<td class="text-left">Product Price</td>
<td class="text-left">Quantity</td>
<td class="text-left">Total Amount</td>
</tr>
</thead>
<tbody>
<?php if (!empty($detail)) {foreach ($detail as $key => $value) {?>
<tr>
<!-- <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $value->id; ?>" /></td> -->
<td class="text-left"><?php echo date('d M Y',strtotime($value->date_added)); ?></td>
<td class="text-left"><?php echo $value->firstname.' '.$value->lastname; ?></td>
<td class="text-left"><?= $value->payment_method; ?></td>
<td class="text-left"><?php echo $value->tprice; ?></td>
<td class="text-left"><?php echo $value->tquantity; ?></td>
<td class="text-left"><?= $value->tamount;?></td>
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
    $('form#filter_form').attr('action','admin/export_payment_report');
    $('form#filter_form').submit();
  });

 $('#button-filter').on('click',function(){
    $('form#filter_form').attr('method','GET');
    $('form#filter_form').attr('action','admin/payment_finance_report',true);
    $('form#filter_form').submit();
  });


</script>
<?php echo $this->endSection();?>