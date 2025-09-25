
<div id="content">
<div class="page-header">
<div class="container-fluid">
<div class="pull-right">
<button type="submit" form="form-coupon" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa fa-save"></i></button>
<a href="<?= base_url('admin/flase_sale'); ?>" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
<h1><?= $page_title; ?></h1>
<ul class="breadcrumb">
<li><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
<li><a href="javascript:void();"><?php echo $page_title; ?></a></li>
</ul>
</div>
</div>
<div class="container-fluid"><div class="panel panel-default">
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
<h3 class="panel-title"><i class="fa fa-pencil"></i><?= $page_title; ?></h3>
</div>
<div class="panel-body">
<?php echo form_open_multipart($form_action,'id="form-coupon" class="form-horizontal"'); ?>
<ul class="nav nav-tabs">
<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
</ul>
<div class="tab-content">
<div class="tab-pane active" id="tab-general">
<div class="form-group required">
<label class="col-sm-2 control-label" for="input-name">Flash Sale Name</label>
<div class="col-sm-10">
<input type="text" name="name" placeholder="Name" id="input-name" class="form-control" value="<?php echo set_value('name',$name); ?>"/>
<?php echo form_error('name'); ?>
</div>
</div>

<div class="form-group discount">
<label class="col-sm-2 control-label" for="input-discount">Discount</label>
<div class="col-sm-10">
<input type="text" name="discount" placeholder="Discount" id="input-discount" class="form-control" value="<?= @$discount; ?>" />
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="input-type"><span data-toggle="tooltip" title="Percentage or Fixed Amount.">Discount Type</span></label>
<div class="col-sm-10">
<select name="type" id="input-type" class="form-control percentage">
<option value="P" <?= ($type=='P')? 'selected="selected"':'';?>>Percentage</option>
<option value="F" <?= ($type=='F')? 'selected="selected"':'';?>>Fixed Amount</option>
</select>
</div>
</div>


<!-- <div class="form-group required">
<label class="col-sm-2 control-label" for="input-code"><span data-toggle="tooltip" title="The code the customer enters to get the discount.">Sale Banner</span></label>
<div class="col-sm-10">
<input type="file" name="" class="form-control">
</div>
</div> -->

<div class="form-group">
<label class="col-sm-2 control-label" for="input-date-start">Start Date</label>
<div class="col-sm-3">
<div class="input-group date">
<input type="text" name="start_date" value="<?= $start_date; ?>" placeholder="Date Start" data-date-format="YYYY-MM-DD" id="input-date-start" class="form-control" />
<span class="input-group-btn">
<button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
</span></div>
</div><label class="col-sm-2 control-label" for="input-date-end">Start Time</label>
<div class="col-sm-3">
<div class="input-group date">
<input type="time" name="start_time" value="<?= $start_time; ?>" placeholder="Date End" data-date-format="HH:MM" id="input-date-end" class="form-control" />
</div>
</div>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="input-date-end">End Date </label>
<div class="col-sm-3">
<div class="input-group date">
<input type="text" name="end_date" value="<?= $end_date; ?>" placeholder="Date End" data-date-format="YYYY-MM-DD" id="input-date-end" class="form-control" />
<span class="input-group-btn">
<button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
</span>
</div>
</div>
<label class="col-sm-2 control-label" for="input-date-end">End Time</label>
<div class="col-sm-3">
<div class="input-group date">
<input type="time" name="end_time" value="<?= $end_time; ?>" placeholder="Date End" data-date-format="HH:MM" id="input-date-end" class="form-control" />
</div>
</div>
</div>



<div class="form-group">
<label class="col-sm-2 control-label" for="input-product"><span data-toggle="tooltip" title="Choose specific products for flash sale.">Products</span></label>
<div class="col-sm-10">
<select name="product_id[]" class="form-control multiple" multiple>
<?php if(!empty($product_list)){
foreach ($product_list as $key => $value) { ?>
<option value="<?= $value->id; ?>" <?php echo @in_array($value->id, $product_id)?'selected':''; ?>><?= $value->name; ?></option>
<?php } } ?>
</select>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label" for="input-category"><span data-toggle="tooltip" title="Choose specific category for flash sale.">Category</span></label>
<div class="col-sm-10">
<select name="category_id[]" class="form-control multiple" multiple>
<?php if(!empty($category_list)){
foreach ($category_list as $key => $value) { ?>
<option value="<?= $value->id; ?>" <?php echo @in_array($value->id, $category_id)?'selected':''; ?>><?= $value->name; ?></option>
<?php } } ?>
</select>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label" for="input-status">Status</label>
<div class="col-sm-10">
<select name="status" id="input-status" class="form-control">
<option value="1" <?= ($status=='1')? 'selected':'';?>>Enabled</option>
<option value="0" <?= ($status=='0')? 'selected':'';?>>Disabled</option>
</select>
</div>
</div>
</div>
</div>
</form>
</div>
</div>
</div>


<script type="text/javascript">
$('.date').datetimepicker({
language: 'en-gb',
pickTime: false
});
</script>
