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
<a href="<?php echo base_url('admin/blogs'); ?>" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
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
<!-- <legend>upload Loader (GIF,MP4 VIDEO,IMAGE)</legend> -->
<div class="form-group required">
<label class="col-sm-2 control-label">Upload Blog (IMAGE)</label>
<div class="col-sm-10"> 
<?php if($image){ ?>
<img src="<?php echo base_url($image); ?>" width="100" height="100">
<?php } ?>
<div class="input-group"><span class="input-group-addon"></span>
<input type="file" name="image" class="form-control" />
</div>
</div>
</div>


<div class="form-group">
   <label class="col-sm-2 control-label" for="input-sort-order">Select Category</label>
    <div class="col-sm-10">
    
    <select name="category_id" class="form-control" required>
        <option value="">Select</option>
        <?php foreach($blog_category as $value){?>
        <option value="<?php echo $value->id; ?>" <?php echo $category_id==$value->id?'selected':'';?>><?php echo $value->name; ?></option>
        <?php } ?>
    </select>
    
    <?php echo $validation->hasError('category_id')?$validation->showError('category_id','my_single'):''; ?>
    </div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label" for="input-sort-order">Title</label>
<div class="col-sm-10">
<input type="text" name="title" value="<?= $title?>" class="form-control">
<?php echo $validation->hasError('title')?$validation->showError('title','my_single'):''; ?>
</div>
</div>



<div class="form-group">
<label class="col-sm-2 control-label" for="input-sort-order">Desciption</label>
<div class="col-sm-10">
<textarea name="descri" class="form-control summernote" data-toggle="summernote" id="summernote"><?= $descri?></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label" for="input-sort-order">Quote Line</label>
<div class="col-sm-10">
<input type="text" name="note" value="<?= $note ?>" class="form-control">

</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label" for="input-sort-order">Desciption 2</label>
<div class="col-sm-10">
<textarea name="description2" class="form-control summernote" data-toggle="summernote" id="summernote1"><?= $description2 ?></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label" for="input-sort-order">Seo Url (optional)</label>
<div class="col-sm-10">
<input type="text" name="link" value="<?= $link?>" class="form-control">

</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label" for="input-sort-order">Featured</label>
<div class="col-sm-10">
<input type="checkbox" name="featured" value="1" <?php echo $featured==1?'checked':''; ?> class="form-control">
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label" for="input-sort-order">Related Blogs</label>
<div class="col-sm-10">
<select name="related[]" class="form-control multiple" multiple>
    <option value="">Select</option>
    <?php foreach ($blogList as $key => $value): ?>
        <option value="<?php echo $value->id; ?>" <?php echo @in_array($value->id,$related)?'selected':''; ?> ><?php echo $value->title; ?></option>
    <?php endforeach ?>
</select>
</div>
</div>



<div class="form-group">
<label class="col-sm-2 control-label" for="input-sort-order">Meta Title</label>
<div class="col-sm-10">
<input type="text" name="meta_title" value="<?= $meta_title?>" class="form-control">

</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label" for="input-sort-order">Meta Keyword</label>
<div class="col-sm-10">
<input type="text" name="meta_keyword" value="<?= $meta_keyword?>" class="form-control">

</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="input-sort-order">Meta Desciption</label>
<div class="col-sm-10">
<textarea name="meta_description" class="form-control" rows="4" ><?= @$meta_description?></textarea>
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

</div>
</div>



</fieldset>
</form>
</div>
</div>
</div>
</div>

<?php $this->endSection(); ?>