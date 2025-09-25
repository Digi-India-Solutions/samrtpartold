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
        <a href="<?php echo base_url('admin/user_group');?>" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
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
            <label class="col-sm-2 control-label" for="input-username">User Group Name</label>
            <div class="col-sm-10">
              <input type="text" name="name" value="<?php echo set_value('name',$name); ?>" placeholder="name"  class="form-control" />

              <?php echo $validation->hasError('name')?$validation->showError('name','my_single'):''; ?>
           </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">User Permission</label>
            <div class="col-sm-10">
              <div class="well well-sm" style="height: 150px; overflow: auto;">
            
            <?php if(!empty($menu_list)){ foreach ($menu_list as $key => $value){ ?>

                <!--<div class="checkbox">-->
                <!--  <label>-->
                 
                <!--    <input type="checkbox" name="permission[]" value="<?php echo $value->id; ?>" <?php echo @in_array($value->id, $menu_id)?'checked':''; ?> />-->
                <!--   <?php echo $value->name; ?>-->
                
                <!--  </label>-->
                <!--</div>-->
           
            <?php $level1 = $this->AdminModel->all_fetch('menu',array('parent_id'=>$value->id));
            if ($level1) {
              foreach ($level1 as $key => $l1) {?>

                 <div class="checkbox">
                  <label>
                 
                    <input type="checkbox" name="permission[]" value="<?php echo @$l1->id; ?>" <?php echo @in_array($l1->id, $menu_id)?'checked':''; ?> />
                   <?php echo $value->name.' > '.@$l1->name; ?>
                
                  </label>
                </div>

           <?php 
           $level2 = $this->AdminModel->all_fetch('menu',array('parent_id'=>$l1->id));
           if ($level2) {
          foreach ($level2 as $key => $l2) {?>  

               <div class="checkbox">
                  <label>
                 
                    <input type="checkbox" name="permission[]" value="<?php echo $l2->id; ?>" <?php echo @in_array($l2->id, $menu_id)?'checked':''; ?> />
                   <?php echo $value->name.' > '.$l1->name.' > '.$l2->name; ?>
                
                  </label>
                </div>

        <?php 
        $level3 = $this->AdminModel->all_fetch('menu',array('parent_id'=>$l2->id));
        if ($level3) {
          foreach ($level3 as $key => $l3) {?>
             <div class="checkbox">
                  <label>
                 
                    <input type="checkbox" name="permission[]" value="<?php echo @$l3->id; ?>" <?php echo @in_array($l3->id, $menu_id)?'checked':''; ?> />
                  <?php echo $value->name.' > '.$l1->name.' > '.$l2->name.' > '.@$l3->name; ?>
                
                  </label>
                </div>



                <?php }} ?>
                <?php }} ?> 
                <?php }} ?>   
                <?php }} ?>
              </div>
              <button type="button" onclick="$(this).parent().find(':checkbox').prop('checked', true);" class="btn btn-link">select all</button> / <button type="button" onclick="$(this).parent().find(':checkbox').prop('checked', false);" class="btn btn-link">Unselect all</button></div>
          </div>
          
             
        </form>
      </div>
    </div>
  </div>
</div>
<?php $this->endSection(); ?>