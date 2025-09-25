<?php 
$this->extend('layout/master_admin');
$this->section('page');
$validation = \Config\Services::validation(); 
?>
<div id="content">
 <div class="page-header">
  <div class="container-fluid">
   <div class="pull-right">
    <a href="<?php echo base_url('admin/add_heading'); ?>" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a>
   
    <button type="button" data-toggle="tooltip" title="Delete" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#form-category').submit() : false;"><i class="fa fa-trash-o"></i></button>
   </div>
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
    
    <h3 class="panel-title"><i class="fa fa-list"></i> Services List</h3>
   </div>
   <div class="panel-body">
    
    <?php echo form_open('admin/delete_heading','id="form-category"'); ?>  

     <div class="table-responsive">
      <!-- <table id="example" class="display" style="width:100%"> -->
      <table class="table table-bordered table-hover">
       <thead>
        <tr>
         <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
           <td class="text-left"><a href="" class="asc">Heading</a></td>
           <td class="text-right"><a href="">Description</a></td>
          
          <td class="text-right"><a href="">Status</a></td>
         <td class="text-right">Action</td>
        </tr>
       </thead>
       <tbody>
   
         <?php foreach ($detail as $key => $value){?>
           
         <tr>
         <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $value->id; ?>" /></td>
         <td class="text-left"><?php echo $value->heading; ?>  </td>
         <td class="text-left"><?php echo substr($value->description,0,100); ?></td>
  
         <td class="text-right"><?php echo $value->status==1?'Active':'Deactive'; ?></td>
         <td class="text-right">
          <a href="<?php echo base_url('admin/add_heading/'.$value->id); ?>" data-toggle="tooltip" title="Edit" class="btn btn-primary">
           <i class="fa fa-pencil"></i>
          </a>
         </td>
        </tr>
       <?php } ?>
      
       </tbody>
      </table>
     </div>
    </form>
  
   </div>
  </div>
 </div>
</div>

<?php $this->endSection(); ?>