<?php 
$this->extend('layout/master_admin');
$this->section('page');
$validation = \Config\Services::validation(); 
?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
         <a  href="<?php echo base_url('admin/add_customer_group'); ?>" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        <button type="button" data-toggle="tooltip" title="Delete" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#form-customer').submit() : false;"><i class="fa fa-trash-o"></i></button>
      </div>
      <h1>Customers Groups</h1>
      <ul class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>
        <li><a href="<?php echo base_url('admin/customer_group'); ?>">Customers Groups</a></li>
      </ul>
    </div>
  </div>
  <div class="container-fluid">  
    <div class="row">
      
      <div class="col-md-12 col-sm-12">
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
            
            <h3 class="panel-title"><i class="fa fa-list"></i> Customer Group List</h3>
          </div>
          <div class="panel-body">
            <form action="<?php echo $form_action; ?>" method="post" enctype="multipart/form-data" id="form-customer">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                    <td class="text-left">Customer Group Name</td>
                    <td class="text-left">Sort Order</td>
                     <td class="text-left">Action</td>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($list)) {foreach ($list as $key => $value) {?>
               <tr>   
              <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $value->id; ?>" /></td>
               <td class="text-left"><?php echo $value->group_name; ?></td>
              <td class="text-left"><?php echo $value->sort_order; ?></td>
              <td class="text-left"><a href="<?php echo base_url('admin/add_customer_group/'.$value->id); ?>"><button type="button" class="btn btn-info"><i class="fa fa-pencil"></i></button></a></td>
              </tr>
                  <?php } } else{ ?>
               <tr>
                  <td class="text-center" colspan="8">No results!</td>
                </tr>
                  <?php } ?>
                  
             </tbody>
                
              </table>
            </form>
            <div class="row">
              <div class="col-sm-6 text-left"></div>
              <div class="col-sm-6 text-right">Showing 0 to 0 of 0 (0 Pages)</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php echo $this->endSection();?>
