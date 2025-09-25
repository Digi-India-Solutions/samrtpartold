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
    <button type="button" data-toggle="tooltip" title="Filter" onclick="$('#filter-product').toggleClass('hidden-sm hidden-xs');" class="btn btn-default hidden-md hidden-lg"><i class="fa fa-filter"></i></button>
    <a href="<?php echo base_url('admin/add_category'); ?>" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a>
   
    <button type="button" form="form-product" formaction="" data-toggle="tooltip" title="Delete" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#form-product').submit() : false;"><i class="fa fa-trash-o"></i></button>
   </div>
   <h1><?php echo $page_title; ?></h1>
   <ul class="breadcrumb">
    <li><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
    <li><a href="<?php echo base_url('admin/product'); ?>"><?php echo $page_title; ?></a></li>
   </ul>
  </div>
 </div>
 <div class="container-fluid">
  <div class="row">
   <div id="filter-product" class="col-md-3 col-md-push-9 col-sm-12 hidden-sm hidden-xs">
    <div class="panel panel-default">
     <div class="panel-heading">
      <h3 class="panel-title"><i class="fa fa-filter"></i> Filter</h3>
     </div>

     <form action="" method="GET" >
     <div class="panel-body">
      <div class="form-group">
       <label class="control-label" for="input-name">Category Name</label>
       <input type="text" name="name" value="<?php echo @$_GET['name']; ?>" placeholder="Category Name" id="input-name" class="form-control" />
      </div>
  
      <div class="form-group">
       <label class="control-label" for="input-status">Status</label>
       <select name="status" id="input-status" class="form-control">
        
        <option value="1" <?php echo @$_GET['status']==1?'selected':''; ?>>Enabled</option>

        <option value="2" <?php echo @$_GET['status']==2?'selected':''; ?>>Disabled</option>
       </select>
      </div>
      <div class="form-group text-right">
       <button type="submit" id="button-filter" class="btn btn-info"><i class="fa fa-filter"></i> Filter</button>&nbsp;
       <a href="<?php echo base_url('admin/category'); ?>"> <button type="button" id="button-filter" class="btn btn-default"><i class="fa fa-reply"></i> Reset</button></a>
      </div>
     </div>

   </form>
    </div>
   </div>
   <div class="col-md-9 col-md-pull-3 col-sm-12">
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
      <h3 class="panel-title"><i class="fa fa-list"></i> Category List</h3>
      
     </div>
     <div class="panel-body">

    <?php echo form_open_multipart('admin/delete_category','id="form-product"'); ?>  
       <div class="table-responsive">
        <table class="table table-bordered table-hover">
         <thead>
          <tr>
         <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
         <td class="text-left">Category ID</td>
         <td class="text-left">Category Name</td>
         <td class="text-left">Icon</td>
         <td class="text-right">Sort Order</td>
          <td class="text-right">Status</td>
         <td class="text-right">Action</td>
        </tr>
         </thead>
         <tbody>
         
           <?php if (!empty($detail)): ?>
         <?php foreach ($detail as $key => $value){  ?>
           
         <tr>
         <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $value->id; ?>" /></td>
          <td class="text-left"><?php echo $value->id; ?></td>
         <td class="text-left"><?php echo $value->name; ?></td>
         <td class="text-left"><img src="<?php echo $value->thumbnail?base_url($value->thumbnail):base_url($config_logo); ?>" width="80" height="80"></td>
         <td class="text-right"><?php echo $value->sort_order; ?></td>
          <td class="text-right"><?php echo $value->status?'Active':'Deactive';; ?></td>
         <td class="text-right">
          <a href="<?php echo base_url('admin/add_category/'.$value->id); ?>" data-toggle="tooltip" title="Edit" class="btn btn-primary">
           <i class="fa fa-pencil"></i>
          </a>
         </td>
        </tr>

        <?php 
        $level1 = $this->AdminModel->all_fetch('category',array('parent_id'=>$value->id));
        if ($level1) {
          foreach ($level1 as $key => $l1) {?>
            
        <tr>
         <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $l1->id; ?>" /></td>
         <td class="text-left"><?php echo $value->name.'  >  '.$l1->name; ?></td>
         <td class="text-right"><?php echo $l1->sort_order; ?></td>
          <td class="text-right"><?php echo $value->status?'Active':'Deactive';; ?></td>
         <td class="text-right">
          <a href="<?php echo base_url('admin/add_category/'.$l1->id); ?>" data-toggle="tooltip" title="Edit" class="btn btn-primary">
           <i class="fa fa-pencil"></i>
          </a>
         </td>
        </tr>

        <?php 
        $level2 = $this->AdminModel->all_fetch('category',array('parent_id'=>$l1->id));
        if ($level2) {
          foreach ($level2 as $key => $l2) {?>
            
        <tr>
         <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $l2->id; ?>" /></td>
         <td class="text-left"><?php echo $value->name.'  >  '.$l1->name.' > '.$l2->name; ?></td>
         <td class="text-right"><?php echo $l2->sort_order; ?></td>
          <td class="text-right"><?php echo $value->status?'Active':'Deactive';; ?></td>
         <td class="text-right">
          <a href="<?php echo base_url('admin/add_category/'.$l2->id); ?>" data-toggle="tooltip" title="Edit" class="btn btn-primary">
           <i class="fa fa-pencil"></i>
          </a>
         </td>
        </tr>


         <?php 
        $level3 = $this->AdminModel->all_fetch('category',array('parent_id'=>$l2->id));
        if ($level3) {
          foreach ($level3 as $key => $l3) {?>
            
        <tr>
         <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $l2->id; ?>" /></td>
         <td class="text-left"><?php echo $value->name.'  >  '.$l1->name.' > '.$l2->name.' > '.$l3->name; ?></td>
         <td class="text-right"><?php echo $l3->sort_order; ?></td>
          <td class="text-right"><?php echo $value->status?'Active':'Deactive';; ?></td>
         <td class="text-right">
          <a href="<?php echo base_url('admin/add_category/'.$l3->id); ?>" data-toggle="tooltip" title="Edit" class="btn btn-primary">
           <i class="fa fa-pencil"></i>
          </a>
         </td>
        </tr>
         <?php } } ?> 

        <?php } } ?>

        <?php } } ?>

       <?php } ?>

       <?php endif ?>
        
         </tbody>
        </table>
       </div>
      </form>

           <div class="row">
                  <div class="col-sm-6 text-left">
        <ul class="pagination">
        <?php if ($pager):?>    
        <?php echo $pager->links(); ?>
         <?php endif; ?>
        </ul>
        </div>
              <div class="col-sm-6 text-right">Showing <?php echo $offset; ?> to <?php echo $offset+count($detail); ?> of <?php echo $total_rows; ?> (<?php echo $pages; ?> Pages)</div>
            </div>
            
     </div>
    </div>
   </div>
  </div>
 </div>


</div>




<?php echo $this->endSection();?>