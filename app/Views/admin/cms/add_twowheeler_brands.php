<?php 
$this->extend('layout/master_admin');
$this->section('page');
$validation = \Config\Services::validation(); 
?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-manufacturer" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo base_url('admin/twowheeler_brands'); ?>" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $page_title; ?></h1>
      <ul class="breadcrumb">
                <li><a href="">Home</a></li>
                <li><a href=""><?php echo $page_title; ?></a></li>
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
        
        <?php echo form_open_multipart($form_action,'id="form-manufacturer" class="form-horizontal"'); ?>
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
            <li><a href="#tab-seo" data-toggle="tab">SEO</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab-general">
              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-name">Brand Name</label>
                <div class="col-sm-10">
                  <input type="text" name="name" value="<?php echo set_value('name',$name); ?>" placeholder="Brand Name" id="input-name" class="form-control" />
                  <?php echo $validation->hasError('naem')?$validation->showError('name','my_single'):''; ?>
                  </div>
              </div>
          
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-image">Image</label>
                <div class="col-sm-10">
                  <?php if ($image): ?>
                    <img src="<?php echo base_url($image); ?>" alt="" width="100" height="100"  />
                  <?php endif ?>
                                     
                  <input type="file" name="image" value="" id="input-image" class="form-control" />
                </div>
              </div>

               <div class="form-group">
                <label class="col-sm-2 control-label" for="input-sort-order">Sort Order</label>
                 <div class="col-sm-10">
                  <input type="text" name="sort_order" value="<?php echo set_value('sort_order',$sort_order); ?>" placeholder="Sort Order" id="input-sort-order" class="form-control" />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-status">Status</label>
                <div class="col-sm-10">
                <select name="status" id="input-status" class="form-control">
                <option value="1" <?php echo $status==1?'selected':''; ?>>Enabled</option>
                <option value="0" <?php echo $status=="0"?'selected':''; ?>>Disabled</option>
                </select>
                </div>
            </div>

            </div>
            <div class="tab-pane" id="tab-seo">
              <div class="alert alert-info"><i class="fa fa-info-circle"></i> Do not use spaces, instead replace spaces with - and make sure the SEO URL is globally unique.</div>
              <div class="table-responsive">
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <td class="text-left">Stores</td>
                      <td class="text-left">Keyword</td>
                    </tr>
                   </thead>
                  <tbody>
                
                  <tr>
                    <td class="text-left">Default</td>
                     <td class="text-left"> 
                       <div class="input-group"><span class="input-group-addon"></span>
                        <input type="text" name="seo_url" value="<?php echo set_value('seo_url',$seo_url); ?>" placeholder="Keyword" class="form-control" />
                      </div>
                    </td>
                  </tr>

                 </tbody>
                </table>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php echo $this->endSection();?>