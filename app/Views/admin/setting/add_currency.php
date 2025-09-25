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
        <a href="<?php echo base_url('admin/currency'); ?>" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $page_title; ?></h1>
      <ul class="breadcrumb">
     <li><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
<li><a href="javascript:void();"><?php echo $page_title; ?></a></li>
      </ul>
    </div>
  </div>
  <div class="container-fluid">     <div class="panel panel-default">
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

                <div class="form-group required">
                    <label class="col-sm-2 control-label" for="input-name">Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" value="<?php echo set_value('title',$title); ?>" placeholder="title" id="input-name" class="form-control" />
                        <?php echo $validation->hasError('title')?$validation->showError('title','my_single'):''; ?>
                    </div>
                </div>

                  <div class="form-group ">
                    <label class="col-sm-2 control-label" for="input-name">code</label>
                    <div class="col-sm-10">
                        <input type="text" name="code" value="<?php echo set_value('code',$code); ?>" placeholder="code" id="input-name" class="form-control" />
                    </div>
                </div>

                <div class="form-group ">
                    <label class="col-sm-2 control-label" for="input-rate">Symbol Left</label>
                    <div class="col-sm-10">
                        <input type="text" name="symbol_left" value="<?php echo set_value('symbol_left',$symbol_left); ?>" placeholder="Symbol Left" id="input-rate" class="form-control" />
                    </div>
                </div>

                 <div class="form-group ">
                    <label class="col-sm-2 control-label" for="input-rate">Symbol Right</label>
                    <div class="col-sm-10">
                        <input type="text" name="symbol_right" value="<?php echo set_value('symbol_right',$symbol_right); ?>" placeholder="Symbol Left" id="input-rate" class="form-control" />
                    </div>
                </div>
               
               
                 <div class="form-group ">
                    <label class="col-sm-2 control-label" for="input-rate">Decimal Places</label>
                    <div class="col-sm-10">
                        <input type="number" name="decimal_place" value="<?php echo set_value('decimal_place',$decimal_place); ?>" placeholder="Symbol Left" id="input-rate" class="form-control" />
                    </div>
                </div>

                 <div class="form-group ">
                    <label class="col-sm-2 control-label" for="input-rate">Value </label>
                    <div class="col-sm-10">
                        <input type="number" name="value" value="<?php echo set_value('value',$value); ?>" placeholder="Fraction Value" id="input-rate" class="form-control" />
                    </div>
                </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-status">Status</label>
                <div class="col-sm-10">
                  <select name="status" id="input-status" class="form-control">
                    <option value="0" <?php echo $status==0?'selected':''; ?>>Disabled</option>
                    <option value="1" <?php echo $status==1?'selected':''; ?>>Enabled</option>
                  </select>
                </div>
              </div>
              
            </form>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection(); ?>
