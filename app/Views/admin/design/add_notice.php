<div id="content">
 <div class="page-header">
  <div class="container-fluid">
   <div class="pull-right">
    <button type="submit" form="form-banner" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa fa-save"></i></button>
    <a href="<?php echo base_url('admin/notice'); ?>" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a>
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
    <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $page_title; ?></h3>
   </div>
   <div class="panel-body">
  
    <?php echo form_open_multipart($form_action,'id="form-banner" class="form-horizontal"'); ?>

  
      <div class="form-group required">
      <label class="col-sm-2 control-label" for="input-name">Notice </label>
      <div class="col-sm-10">
     
      <textarea name="description" data-toggle="summernote" class="form-control ckeditor"><?php echo set_value('description',$description); ?></textarea>
      
      </div>
     </div>

      <div class="form-group required">
      <label class="col-sm-2 control-label" for="input-name">Sort </label>
      <div class="col-sm-10">
      <input type="number" name="sort_order" value="<?php echo set_value('sort_order',$sort_order); ?>" placeholder="" class="form-control" />
      
      </div>
     </div>

    

     <div class="form-group required">
      <label class="col-sm-2 control-label" for="input-name">Status</label>
      <div class="col-sm-10">
     <select name="status" class="form-control">

       <option value="1" <?php echo $status==1?'selected':'';?>>Enabled</option>
       <option value="0" <?php echo $status=='0'?'selected':'';?>>Disabled</option>
     </select>
      
      </div>
     </div>

    <div class="form-group">
      
      <div class="col-sm-10">
        <label class="col-sm-2 control-label" for="input-name"></label>
      <button type="submit" class="btn btn-primary">Save</button>
      
      </div>
     </div>
    
    
    </form>
   </div>
  </div>
 </div>
 </div>
