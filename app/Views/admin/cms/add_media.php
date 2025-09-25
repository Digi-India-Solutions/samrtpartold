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
<a href="<?php echo base_url('admin/media'); ?>" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
<h1><?php echo $page_title; ?></h1>
<ul class="breadcrumb">
<li><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
         <li>
         <a href="javascript:void();"><?php echo $page_title; ?></a>
        </li>
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
<h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $page_title; ?></h3>
</div>
<div class="panel-body">
    
<?php echo form_open_multipart($form_action,'id="form-filter" class="form-horizontal"'); ?>  
<fieldset id="option-value">

<div class="form-group required">
<label class="col-sm-2 control-label">Upload Images </label>
<div class="col-sm-10"> 

<?php if(@$image){ ?>
<img src="<?php echo base_url($image); ?>" width="100" height="100" style="">
<input type="hidden" name="old_image" class="form-control" value="<?php echo $image; ?>"  />
<?php } ?>

<div class="input-group"><span class="input-group-addon"></span>
<input type="file" name="image[]" class="form-control"  multiple  />
</div>
<?php echo $validation->hasError('image')?$validation->showError('image','my_single'):''; ?>
</div>
</div>



<div class="form-group">
<label class="col-sm-2 control-label" for="input-sort-order">Status</label>
<div class="col-sm-10">
<select class="form-control" name="status" id="status" required="required">
<option value=""> Select option </option>
<option value="1" <?php echo $status==1?'selected':''; ?>> Active </option>
<option value="0" <?php echo $status==0?'selected':''; ?>> Deactive </option>
</select>
<?php echo $validation->hasError('status')?$validation->showError('status','my_single'):''; ?>
</div>
</div>
</fieldset>
</form>
</div>
</div>
</div>
</div>

<?php $this->endSection(); ?>