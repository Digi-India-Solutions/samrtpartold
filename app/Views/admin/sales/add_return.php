<?php 
$this->extend('layout/master_admin');
$this->section('page');
$validation = \Config\Services::validation(); 
?>
<div id="content">
<div class="page-header">
<div class="container-fluid">
<div class="pull-right">
  <button type="submit" form="form-filter" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa fa-save"></i></button>
<a href="<?php echo base_url('admin/return_order'); ?>"><i class="fa fa-reply"></i> Cancel</a>
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
         
<h3 class="panel-title"><i class="fa fa-pencil"></i> Add Product Returns</h3>
</div>
<div class="panel-body">
<?php echo form_open_multipart($form_action,'id="form-filter" class="form-horizontal"'); ?> 
<fieldset>
<legend>Order Information</legend>
<div class="form-group required">
<label class="col-sm-2 control-label" for="input-order-id">Order ID</label>
<div class="col-sm-10">
<input type="text" name="order_id" value="<?= $order_id; ?>" placeholder="Order ID" id="input-order-id" class="form-control" required="" />
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="input-date-ordered">Order Date</label>
<div class="col-sm-3">
<div class="input-group date">
<input type="date" name="date_ordered" value="<?= $date_ordered; ?>" placeholder="Order Date" data-date-format="YYYY-MM-DD" id="input-date-ordered" class="form-control" />
<span class="input-group-btn">
<!-- <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button> -->
</span>
</div>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="input-customer">Customer</label>
<div class="col-sm-10">
<input type="text" name="customer" value="<?= $customer; ?>" placeholder="Customer" id="input-customer" class="form-control" />
</div>
</div>
<div class="form-group required">
<label class="col-sm-2 control-label" for="input-firstname">First Name</label>
<div class="col-sm-10">
<input type="text" name="firstname" value="<?= $firstname; ?>" placeholder="First Name" id="input-firstname" class="form-control" required/>
</div>
</div>
<div class="form-group required">
<label class="col-sm-2 control-label" for="input-lastname">Last Name</label>
<div class="col-sm-10">
<input type="text" name="lastname" value="<?= $lastname; ?>" placeholder="Last Name" id="input-lastname" class="form-control" required/>
</div>
</div>
<div class="form-group required">
<label class="col-sm-2 control-label" for="input-email">E-Mail</label>
<div class="col-sm-10">
<input type="text" name="email" value="<?= $email; ?>" placeholder="E-Mail" id="input-email" class="form-control" required/>
</div>
</div>
<div class="form-group required">
<label class="col-sm-2 control-label" for="input-telephone">Telephone</label>
<div class="col-sm-10">
<input type="text" name="telephone" value="<?= $telephone; ?>" placeholder="Telephone" id="input-telephone" class="form-control" required/>
</div>
</div>
</fieldset>
<fieldset>
<legend>Product Information &amp; Reason for Return</legend>
<div class="form-group required">
<label class="col-sm-2 control-label" for="input-product"><span data-toggle="tooltip" title="(Autocomplete)">Product</span></label>
<div class="col-sm-10">
<input type="text" name="product" value="<?= $product; ?>" placeholder="Product" id="input-product" class="form-control" required/>
</div>
</div>
<div class="form-group required">
<label class="col-sm-2 control-label" for="input-model">Model</label>
<div class="col-sm-10">
<input type="text" name="model" value="<?= $model; ?>" placeholder="Model" id="input-model" class="form-control" required/>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="input-quantity">Quantity</label>
<div class="col-sm-10">
<input type="text" name="quantity" value="<?= $quantity; ?>" placeholder="Quantity" id="input-quantity" class="form-control" />
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="input-return-reason">Return Reason</label>
<div class="col-sm-10">
<select name="return_reason_id" id="input-return-reason" class="form-control">
<option value="1" <?= $return_reason_id==1? 'selected="selected"':'';?>>Dead On Arrival</option>
<option value="4" <?= $return_reason_id==4? 'selected="selected"':'';?>>Faulty, please supply details</option>
<option value="3" <?= $return_reason_id==3? 'selected="selected"':'';?>>Order Error</option>
<option value="5" <?= $return_reason_id==5? 'selected="selected"':'';?>>Other, please supply details</option>
<option value="2" <?= $return_reason_id==2? 'selected="selected"':'';?>>Received Wrong Item</option>
</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="input-opened">Opened</label>
<div class="col-sm-10">
<select name="opened" id="input-opened" class="form-control">
<option value="1" <?= $opened==1? 'selected="selected"':'';?>>Opened</option>
<option value="0" <?= $opened==0? 'selected="selected"':'';?>>Unopened</option>
</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="input-comment">Comment</label>
<div class="col-sm-10">
<textarea name="comment" rows="5" placeholder="Comment" id="input-comment" class="form-control"><?= $comment; ?></textarea>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="input-return-action">Return Action</label>
<div class="col-sm-10">
<select name="return_action_id" id="input-return-action" class="form-control">
<option value="0" <?= $return_action_id==0? 'selected="selected"':'';?>></option>
<option value="2" <?= $return_action_id==2? 'selected="selected"':'';?>>Credit Issued</option>
<option value="1" <?= $return_action_id==1? 'selected="selected"':'';?>>Refunded</option>
<option value="3" <?= $return_action_id==3? 'selected="selected"':'';?>>Replacement Sent</option>
</select>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="input-return-status">Return Status</label>
<div class="col-sm-10">
<select name="return_status_id" id="input-return-status" class="form-control">
<option value="2" <?= $return_action_id==2? 'selected="selected"':'';?>>Awaiting Products</option>
<option value="3" <?= $return_action_id==3? 'selected="selected"':'';?>>Complete</option>
<option value="1" <?= $return_action_id==1? 'selected="selected"':'';?>>Pending</option>
</select>
</div>
</div>
</fieldset>
</form>
</div>
</div>
</div>


</div>
<?php echo $this->endSection();?>