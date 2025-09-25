<div id="content">
<div class="page-header">
<div class="container-fluid">

<h1><?php echo $page_title; ?></h1>
<ul class="breadcrumb">
<li><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
<li><a href="javascript:void();"><?php echo $page_title; ?></a></li>
</ul>
</div>
</div>
<div class="container-fluid">
<div class="panel panel-default">
<div class="panel-heading">
<?php if (validation_errors()): ?>
<div class="alert alert-danger">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<strong>Warning: Please check the form carefully for errors!</strong> </a>
</div>
<?php endif ?>
<?php if ($success = $this->session->flashdata('success')): ?>
<div class="alert alert-success">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<strong><?php echo $success; ?></strong> </a>
</div>
<?php endif ?>
<?php if ($error = $this->session->flashdata('error')): ?>
<div class="alert alert-danger">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
<strong><?php echo $error; ?></strong> </a>
</div>
<?php endif ?>
<h3 class="panel-title"><i class="fa fa-list"></i> Coupon Uses List</h3>
</div>
<div class="panel-body">
 
<div class="table-responsive">

<form action="" id="coupon_filter1" method="get">
<div class="form-group required">
 <label class="col-sm-2 control-label" for="input-name">Select Coupon</label>
   <div class="col-sm-10">
    <select class="form-control" name="coupon_id" id="coupon_id">
		<option value="">Select</option>
		<?php foreach ($coupon_list as $key => $value): ?>
			<option value="<?php echo $value->id; ?>" <?php echo @$_GET['coupon_id']==$value->id?'selected':''; ?>><?php echo $value->coupon_name; ?></option>
		<?php endforeach ?>
	</select>
  </div>
</div>

</form>
<br><br><br>
<?php if (!empty($detail)): ?>
<p>No of Coupon uses:  <?php echo count($detail); ?></p>	
<?php endif ?>





<?php echo form_open('admin/delete_coupon','id="form-coupon"'); ?> 

<table class="table table-bordered table-hover">
<thead>
<tr>
<td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>

<td class="text-left">Coupon Code</td>
<td class="text-left">Customer</td>
<td class="text-right">Email</td>
<td class="text-right">Phone</td>
<td class="text-right">Address 1</td>
<td class="text-right">Discount</td>
<td class="text-right">Order Total</td>
<td class="text-left">Date</td>
<td class="text-right">Action</td>
</tr>
</thead>
<tbody>
  <?php if(!empty($detail)){
foreach ($detail as $key => $value) { ?>
<tr>
<td class="text-center"><input type="checkbox" name="selected[]" value="<?= $value->id; ?>"/>
</td>

<td class="text-left"><?= $value->coupon_code; ?></td>
<td class="text-left"><?= $value->firstname.' '.$value->lastname; ?></td>
<td class="text-right"><?= $value->email; ?></td>
<td class="text-left"><?= $value->telephone; ?></td>
<td class="text-left"><?= $value->payment_address_1; ?></td>
<td class="text-left"><?= $value->amount; ?></td>
<td class="text-left"><?= $value->total; ?></td>
<td class="text-left"><?= $value->create_date; ?></td>
<td class="text-right"><a target="_blank" href="<?= base_url(); ?>admin/view_order/<?= $value->order_id; ?>" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
</tr>
<?php }} ?>
</tbody>
</table>
</div>
</form>

</div>
</div>
</div>
</div>

<script type="text/javascript">
	$('select#coupon_id').on('change',function(){
		$('form#coupon_filter1').submit();
	});
</script>