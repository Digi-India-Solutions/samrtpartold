<?php 
$this->extend('layout/master_admin');
$this->section('page');
$validation = \Config\Services::validation(); 
?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-attribute-group" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo base_url('admin/attribute_group'); ?>" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $page_title; ?> </h1>
      <ul class="breadcrumb">
                <li><a href="">Home</a></li>
                <li><a href=""><?php echo $page_title; ?> </a></li>
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
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $page_title; ?> </h3>
      </div>
      <div class="panel-body">
     
       <?php echo form_open_multipart($form_action,'id="form-attribute-group" class="form-horizontal"'); ?> 
         
        <div class="form-group required">
            <label class="col-sm-2 control-label">Attribute Group Name</label>
            <div class="col-sm-10">
                <div class="input-group"><span class="input-group-addon"></span>
                <input type="text" name="name" value="<?php echo set_value('name',$name); ?>" placeholder="Attribute Group Name" class="form-control" />
              </div>
              <?php echo $validation->hasError('name')?$validation->showError('name','my_single'):''; ?>
             </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-sort-order">Sort Order</label>
            <div class="col-sm-10">
              <input type="number" name="sort_order" value="<?php echo set_value('sort_order',$sort_order); ?>" placeholder="Sort Order" id="input-sort-order" class="form-control" />
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
<?php echo $this->endSection();?>
