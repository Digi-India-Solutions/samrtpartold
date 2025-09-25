
<?php 
$this->extend('layout/master_admin');
$this->section('page');
$validation = \Config\Services::validation(); 
?>
<div id="content">
 <div class="page-header">
  <div class="container-fluid">
   <div class="pull-right">
    
    <button type="button" data-toggle="tooltip" title="Delete" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#form-category').submit() : false;"><i class="fa fa-trash-o"></i></button>
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
    
    <?php echo form_open('admin/delete_career_enquiry','id="form-category"'); ?>  

     <div class="table-responsive">
      <!-- <table id="example" class="display" style="width:100%"> -->
      <table class="table table-bordered table-hover">
       <thead>
        <tr>
         <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
            <!--<td class="text-left">Job Title</td>-->
           <td class="text-left">Name</td>
           <td class="text-left">Email</td>
           <td class="text-left">Phone</td>
           <td class="text-left">Resume</td>
           <td class="text-left">Date</td>
      
        </tr>
       </thead>
       <tbody>
   
         <?php foreach ($detail as $key => $value){?>
           
         <tr>
         <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $value->id; ?>" /></td>
       
         <!--<td class="text-left"><?php echo $value->job_title; ?></td>-->
         <td class="text-left"><?php echo $value->name; ?></td>
      <td class="text-left"><?php echo $value->email; ?></td>
        <td class="text-left"><?php echo $value->phone; ?></td>
          <td class="text-left">
            <?php if (!empty($value->resume)): ?>
              <a target="_blank" href="<?php echo $value->resume; ?>"><i class="fa fa-file-o fa-2x"></i></a>
            <?php endif ?>

          </td>

         <td class="text-right"><?php echo $value->create_date; ?></td>
        
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
