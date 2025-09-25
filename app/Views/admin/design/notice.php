<div id="content">
 <div class="page-header">
  <div class="container-fluid">
   <div class="pull-right">
    <a href="<?php echo base_url('admin/add_notice'); ?>" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a>
    <button type="submit" data-toggle="tooltip" title="Delete" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#form-banner').submit() : false;"><i class="fa fa-trash-o"></i></button>
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

    
    <h3 class="panel-title"><i class="fa fa-list"></i> <?php echo $page_title; ?> </h3>

   </div>
   <div class="panel-body">
     <?php echo form_open_multipart('admin/Design/delete_notice','id="form-option"') ?>  
     <div class="table-responsive">
      <table class="table table-bordered table-hover">
       <thead>
        <tr>
         <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
         <td class="text-left"><a href="" class="asc">Notice</a></td>
         <td class="text-left"><a href="" class="asc">Sort Order</a></td>
         <td class="text-left"><a href="" class="asc">Status</a></td>
         <td class="text-right">Action</td>
        </tr>
       </thead>
       <tbody>
        <?php if (!empty($detail)) {foreach ($detail as $key => $value) {?>
         
        <tr>
         <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $value->id; ?>" /></td>
         <td class="text-left"><?php echo $value->description; ?></td>
         <td class="text-left"><?php echo $value->sort_order; ?></td>
         <td class="text-left"><?php echo $value->status==1?'Enabled':'Disabled'; ?></td>
         <td class="text-right">
          <a href="<?php echo base_url('admin/add_notice/'.$value->id); ?>" data-toggle="tooltip" title="Edit" class="btn btn-primary">
           <i class="fa fa-pencil"></i>
          </a>
         </td>
        </tr>
       <?php } } ?>
       </tbody>
      </table>
     </div>
    </form>
 
   </div>
  </div>
 </div>
</div>
