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
<a href="<?php echo base_url('admin/flip'); ?>" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
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
<h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $page_title; ?></h3>
</div>
<div class="panel-body">
<?php echo form_open_multipart($form_action,'id="form-filter" class="form-horizontal"'); ?>  
<fieldset id="option-value">
<legend>Front Side</legend>

<div class="form-group required">
<label class="col-sm-2 control-label" for="input-sort-order">Title</label>
<div class="col-sm-10">
<input type="text" name="title" class="form-control" value="<?= $title; ?>" placeholder="Heading"/>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label" for="input-sort-order">Sub Title</label>
<div class="col-sm-10">
<input type="text" name="subtitle" class="form-control" value="<?= $subtitle; ?>" placeholder="Sub Title :"/>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Image</label>
  <div class="col-sm-10"> 
    <?php if($image){ ?>
    <img src="<?php echo base_url($image); ?>" width="100" height="100">
    <?php }  ?>
    <div class="input-group"><span class="input-group-addon"></span>
    <input type="file" name="image" class="form-control" />
    </div>
  </div>
</div>

<legend>Back Side</legend>

<div class="form-group required">
<label class="col-sm-2 control-label" for="input-sort-order">Title</label>
<div class="col-sm-10">
<input type="text" name="btitle" class="form-control" value="<?= $btitle; ?>" placeholder="Heading"/>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label" for="input-sort-order">Sub Title</label>
<div class="col-sm-10">
<input type="text" name="bsubtitle" class="form-control" value="<?= $bsubtitle; ?>" placeholder="Sub Title :"/>
</div>
</div>

<div class="form-group ">
<label class="col-sm-2 control-label">Image</label>
  <div class="col-sm-10"> 
    <?php if($bimage){ ?>
    <img src="<?php echo base_url($bimage); ?>" width="100" height="100">
    <?php }  ?>
    <div class="input-group"><span class="input-group-addon"></span>
    <input type="file" name="bimage" class="form-control" />
    </div>
  </div>
</div>





<div class="form-group">
<label class="col-sm-2 control-label" for="input-sort-order">Sort Order</label>
<div class="col-sm-10">
<input type="text" name="sort_order" class="form-control" value="<?= $sort_order; ?>" placeholder="Sort Order :"/>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label" for="input-sort-order">Status</label>
<div class="col-sm-10">
<select class="form-control" name="status" id="status">
<option value=""> Select option </option>
<option value="1" <?php echo $status==1?'selected':''; ?>> Active </option>
<option value="0" <?php echo $status==0?'selected':''; ?>> Deactive </option>
</select>

</div>
</div>
</fieldset>
</form>
</div>
</div>
</div>
</div>
<?php $this->endSection(); ?>
