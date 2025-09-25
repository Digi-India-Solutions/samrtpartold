<div id="content">
<div class="page-header">
<div class="container-fluid">
<div class="pull-right"><a href="<?= base_url(); ?>admin/add_flase_sale" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a>
<button type="button" data-toggle="tooltip" title="Delete" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#form-coupon').submit() : false;"><i class="fa fa-trash-o"></i></button>
</div>
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
<h3 class="panel-title"><i class="fa fa-list"></i> Flash Sale List</h3>
</div>
<div class="panel-body">
<?php echo form_open('admin/delete_flase_sale','id="form-coupon"'); ?>  
<div class="table-responsive">
<table class="table table-bordered table-hover">
<thead>
<tr>
<td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
<td class="text-left">Name</td>
<td class="text-left">Start Date</td>
<td class="text-right">Start Time</td>
<td class="text-left">End Date</td>
<td class="text-left">End Time</td>
<td class="text-left">Status</td>
<td class="text-right">Action</td>
</tr>
</thead>
<tbody>
  <?php if(!empty($detail)){
foreach ($detail as $key => $value) { ?>
<tr>
<td class="text-center"><input type="checkbox" name="selected[]" value="<?= $value->id; ?>"/>
</td>
<td class="text-left"><?= $value->name; ?></td>
<td class="text-left"><?= $value->start_date; ?></td>
<td class="text-right"><?= $value->start_time; ?></td>
<td class="text-left"><?= $value->end_date; ?></td>
<td class="text-left"><?= $value->end_time; ?></td>
<td class="text-left"><?= $value->status?'Active':'Deactive'; ?></td>
<td class="text-right"><a href="<?= base_url(); ?>admin/add_flase_sale/<?= $value->id; ?>" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
</tr>
<?php }} ?>
</tbody>
</table>
</div>
</form>
<div class="row">
<div class="col-sm-6 text-left"></div>
<div class="col-sm-6 text-right">Showing 1 to 3 of 3 (1 Pages)</div>
</div>
</div>
</div>
</div>
</div>

