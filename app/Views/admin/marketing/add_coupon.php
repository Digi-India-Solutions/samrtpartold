<?php 
$this->extend('layout/master_admin');
$this->section('page');
$validation = \Config\Services::validation(); 
?>
<div id="content">
<div class="page-header">
<div class="container-fluid">
<div class="pull-right">
<button type="submit" form="form-coupon" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa fa-save"></i></button>
<a href="<?= base_url('admin/coupon'); ?>" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
<h1><?= $page_title; ?></h1>
<ul class="breadcrumb">
<li><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
<li><a href="javascript:void();"><?php echo $page_title; ?></a></li>
</ul>
</div>
</div>
<div class="container-fluid"><div class="panel panel-default">
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

<h3 class="panel-title"><i class="fa fa-pencil"></i> Add Coupon</h3>
</div>
<div class="panel-body">
<?php echo form_open_multipart($form_action,'id="form-coupon" class="form-horizontal"'); ?>
<ul class="nav nav-tabs">
<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
</ul>
<div class="tab-content">
<div class="tab-pane active" id="tab-general">

<div class="form-group required">
    <label class="col-sm-2 control-label" for="input-name">Coupon Name</label>
      <div class="col-sm-10">
       <input type="text" name="coupon_name" placeholder="Coupon Name" id="input-name" class="form-control" value="<?php echo set_value('coupon_name',$coupon_name); ?>"/>
     <?php echo $validation->hasError('coupon_name')?$validation->showError('coupon_name','my_single'):''; ?>
    </div>
</div>


<div class="form-group required">
    <label class="col-sm-2 control-label" for="input-code"><span data-toggle="tooltip" title="The code the customer enters to get the discount.">Code</span></label>
      <div class="col-sm-10">
       <input type="text" name="coupon_code" placeholder="Coupon Code" id="input-code" class="form-control" value="<?php echo set_value('coupon_code',$coupon_code); ?>"/>
     <?php echo $validation->hasError('coupon_code')?$validation->showError('coupon_code','my_single'):''; ?>
    </div>
</div>


<div class="form-group">
    <label class="col-sm-2 control-label" for="input-type"><span data-toggle="tooltip" title="Percentage or Fixed Amount.">Coupon Type</span></label>
        <div class="col-sm-10">
        <select name="coupon_type" id="input-type" class="form-control percentage">
        <option value="P" <?= ($coupon_type=='P')? 'selected="selected"':'';?>>Percentage</option>
        <option value="F" <?= ($coupon_type=='F')? 'selected="selected"':'';?>>Fixed Amount</option>
    </select>
    </div>
</div>

<div class="form-group discount">
    <label class="col-sm-2 control-label" for="input-discount">Discount</label>
    <div class="col-sm-10">
    <input type="number" name="coupon_discount" placeholder="Discount" id="input-discount" class="form-control" value="<?= $coupon_discount; ?>" />
    </div>
</div>




<div class="form-group">
<label class="col-sm-2 control-label"><span data-toggle="tooltip" title="Customer must be logged in to use the coupon.">Customer Login</span></label>
<div class="col-sm-10">


<label class="radio-inline"><input type="radio" name="user_login" value="1" <?php echo $user_login?'checked':''; ?> />
Yes
</label>

<label class="radio-inline"><input type="radio" name="user_login" value="0" <?php echo $user_login?'':'checked'; ?> />
No
</label>

</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label">Free Shipping</label>
<div class="col-sm-10">
<?php if($free_shiping=='1'){ ?>
<label class="radio-inline"><input type="radio" name="free_shiping" value="1" checked/>
<?php } else{ ?>
<label class="radio-inline"><input type="radio" name="free_shiping" value="1"/>
<?php } ?>
Yes
</label>
<?php if($free_shiping=='0'){ ?>
<label class="radio-inline"><input type="radio" name="free_shiping" value="0" checked/>
<?php } else{ ?>
<label class="radio-inline"><input type="radio" name="free_shiping" value="0"/>
<?php } ?>
No
</label>
</div>
</div>
<div class="form-group d-none" style="display:none">
<label class="col-sm-2 control-label" for="input-product"><span data-toggle="tooltip" title="Choose specific products the coupon will apply to. Select no products to apply coupon to entire cart.">Products</span></label>
<div class="col-sm-10">
<select name="product[]" class="form-control multiple" multiple>
<?php if(!empty($product_list)){
foreach ($product_list as $key => $value) { ?>
<option value="<?= $value->id; ?>" <?php echo @in_array($value->id, $product)?'selected':''; ?>><?= $value->name; ?></option>
<?php } } ?>
</select>
</div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label" for="input-category"><span data-toggle="tooltip" title="Choose all products under selected category.">Category</span></label>
    <div class="col-sm-10">
    <select name="category[]" class="form-control multiple" multiple>
        
    <option value="all">All Category</option>
    <?php if(!empty($category_list)){
    foreach ($category_list as $key => $value) { ?>
    <option value="<?= $value->id; ?>" <?php echo @in_array($value->id, $category)?'selected':''; ?>><?= $value->name; ?></option>
    <?php } } ?>
    </select>
    </div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label" for="input-date-start">Date Start</label>
<div class="col-sm-3">
<div class="input-group date">
<input type="text" name="start_date" value="<?= $start_date; ?>" placeholder="Date Start" data-date-format="YYYY-MM-DD" id="input-date-start" class="form-control" />
<span class="input-group-btn">
<button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
</span></div>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="input-date-end">Date End</label>
<div class="col-sm-3">
<div class="input-group date">
<input type="text" name="end_date" value="<?= $end_date; ?>" placeholder="Date End" data-date-format="YYYY-MM-DD" id="input-date-end" class="form-control" />
<span class="input-group-btn">
<button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
</span></div>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label" for="input-uses-customer"><span data-toggle="tooltip" title="The maximum number of times the coupon can be used by a single customer. Leave blank for unlimited">Uses Per Customer</span></label>
<div class="col-sm-10">
<input type="text" name="user_coupon" value="<?= $user_coupon; ?>" placeholder="Uses Per Customer" id="input-uses-customer" class="form-control" />
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="input-status">Status</label>
<div class="col-sm-10">
<select name="status" id="input-status" class="form-control">
<option value="1" <?= ($status=='1')? 'selected="selected"':'';?>>Enabled</option>
<option value="0" <?= ($status=='0')? 'selected="selected"':'';?>>Disabled</option>
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
<?php echo $this->endSection();?>