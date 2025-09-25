
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-filter" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo base_url('admin/city'); ?>" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $page_title; ?></h1>
      <ul class="breadcrumb">
       <li><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
<li><a href="javascript:void();"><?php echo $page_title; ?></a></li>
      </ul>
    </div>
  </div>
  <div class="container-fluid">     <div class="panel panel-default">
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
  
        <?php echo form_open_multipart($form_action,'id="form-filter" class="form-horizontal"'); ?>  

            <div class="form-group">
              <label class="col-sm-2 control-label" for="input-sort-order">Country</label>
              <div class="col-sm-10">
                <select name="country_id" class="form-control" required="required">
                	<option value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option>
                </select>
                <?php echo form_error('country_id'); ?>
              </div>
            </div> 
            
            <div class="form-group">
              <label class="col-sm-2 control-label" for="input-sort-order">State</label>
              <div class="col-sm-10">
                <select name="state_id" class="form-control" required="required">
                	<?php foreach ($state_list as $key => $value): ?>
                		<option value="<?php echo @$value->id; ?>" <?php echo @$state_id==$value->id?'selected':''; ?>><?php echo $value->name; ?></option>
                	<?php endforeach ?>
                	
                </select>
                <?php echo form_error('state_id'); ?>
              </div>
            </div> 
            
              <div class="form-group">
              <label class="col-sm-2 control-label" for="input-sort-order">Name</label>
              <div class="col-sm-10">
                <input type="text" name="name" value="<?php echo set_value('name',$name); ?>" class="form-control">
                <?php echo form_error('name'); ?>
              </div>
            </div>           
            
             <div class="form-group">
              <label class="col-sm-2 control-label" for="input-sort-order">Status</label>
              <div class="col-sm-10">
                <select class="form-control" name="status">
                  <option value="1" <?php echo $status==1?'selected':''; ?>>Active</option>
                  <option value="0" <?php echo $status==0?'selected':''; ?>>Deactive</option>
                </select>
                <?php echo form_error('status'); ?>
              </div>
            </div> 

 
        </form>
      </div>
    </div>
  </div>

</div>
