<?php 
$this->extend('layout/master_admin');
$this->section('page');
$validation = \Config\Services::validation(); 
use App\Models\CommonModel;
$this->AdminModel = new CommonModel();
?>

<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-user" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo base_url('admin/user');?>" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1>Users</h1>
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
       
      
      <form action="<?php echo $form_action; ?>" method="post" enctype="multipart/form-data" id="form-user" class="form-horizontal">
          
      
           <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-username">Username</label>
            <div class="col-sm-10">
              <input type="text" name="username" value="<?php echo set_value('username',$username); ?>" placeholder="Username"  class="form-control" />

              <?php echo $validation->hasError('username')?$validation->showError('username','my_single'):''; ?>
           </div>
          </div>

          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-username">Username</label>
            <div class="col-sm-10">
             
              <select name="user_group_id" class="form-control" required="required">
                <option value="">Select</option>
                <?php foreach ($user_list as $key => $value): ?>
                  <option value="<?php echo $value->id; ?>" <?php echo $user_group_id==$value->id?'selected':''; ?> ><?php echo $value->name; ?></option>
                <?php endforeach ?>
              </select>

              <?php echo $validation->hasError('user_group_id')?$validation->showError('user_group_id','my_single'):''; ?>
           </div>
          </div>
      
          
          <div class="form-group ">
            <label class="col-sm-2 control-label" for="input-firstname">First Name</label>
            <div class="col-sm-10">
              <input type="text" name="firstname" value="<?php echo set_value('firstname',$firstname); ?>" placeholder="First Name" class="form-control" />
              <?php echo $validation->hasError('firstname')?$validation->showError('firstname','my_single'):''; ?>
            </div>
          </div>
          <div class="form-group ">
            <label class="col-sm-2 control-label" for="input-lastname">Last Name</label>
            <div class="col-sm-10">
              <input type="text" name="lastname" value="<?php echo set_value('lastname',$lastname); ?>" placeholder="Last Name"  class="form-control" />
              <?php echo $validation->hasError('lastname')?$validation->showError('lastname','my_single'):''; ?> 
            </div>
          </div>
          <div class="form-group ">
            <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
            <div class="col-sm-10">
              <input type="text" name="email" value="<?php echo set_value('email',$email); ?>" placeholder="E-Mail"  class="form-control" />

              <?php echo $validation->hasError('email')?$validation->showError('email','my_single'):''; ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-image">Image</label>
            <div class="col-sm-10">
              <?php if (@$photo): ?>
                <img src="<?php echo base_url($photo); ?>" width="100" height="100">
              <?php endif ?>
              <input type="file" name="photo"  id="input-image" class="form-control" />
            </div>
          </div>
             <div class="form-group ">
            <label class="col-sm-2 control-label" for="input-password">Password</label>
            <div class="col-sm-10">
              <input type="password" name="password" value="<?php echo set_value('password'); ?>"  placeholder="Password"  class="form-control" autocomplete="off"  />
              </div>
              
          </div>
          <div class="form-group ">
            <label class="col-sm-2 control-label" for="input-confirm">Confirm</label>
            <div class="col-sm-10">
              <input type="password" name="confirm" value="<?php echo set_value('confirm'); ?>"  placeholder="Confirm" class="form-control" autocomplete="off" />

              <?php echo $validation->hasError('confirm')?$validation->showError('confirm','my_single'):''; ?>
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