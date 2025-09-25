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
    <a href="<?php echo base_url('admin/add_blogs'); ?>" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a>
   
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
       <label class="control-label" for="input-name">Name</label>
       <input type="text" name="name" value="<?php echo @$_GET['name']; ?>" placeholder="Category Name" id="input-name" class="form-control" />
      </div>
  
      <div class="form-group">
       <label class="control-label" for="input-status">Category</label>
       <select name="category" id="input-status" class="form-control">
          <option value="" >Select</option>
        <?php if (!empty($categoryList)){ foreach ($categoryList as $key => $value) {?>
      <option value="<?php echo $value->id;  ?>"><?php echo $value->name; ?></option>
        <?php } } ?>
        
       </select>
      </div>
      <div class="form-group text-right">
       <button type="submit" id="button-filter" class="btn btn-info"><i class="fa fa-filter"></i> Filter</button>&nbsp;
       <a href="<?php echo base_url('admin/blogs'); ?>"> <button type="button" id="button-filter" class="btn btn-default"><i class="fa fa-reply"></i> Reset</button></a>
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

    <?php echo form_open_multipart('admin/delete_blogs','id="form-product"'); ?>  
       <div class="table-responsive">
        <table class="table table-bordered table-hover">
         <thead>
          <tr>
         
         <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
         <td class="text-left"><a href="" class="asc">#</a></td>
         <td class="text-left"><a href="" class="asc">Image</a></td>
         <td class="text-right"><a href="">Title</a></td>
         <td class="text-right"><a href="">Category</a></td>
         
         <td class="text-right"><a href="">Status</a></td>
         <td class="text-right">Action</td>
        </tr>
         </thead>
         <tbody>
         
       <?php if (!empty($detail)){ foreach ($detail as $key => $value){  ?>
           
         <tr>
         <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $value->id; ?>" /></td>
         <td class="text-left"><?php echo $key+1; ?></td>
         <td class="text-left">
          <img src="<?php echo $value->image?base_url($value->image):base_url($config_logo); ?>" width="100" height="100">
         </td>
         <td class="text-left"><?php echo $value->title; ?></td>
                 <td class="text-left"><?php echo $category[$value->category_id]; ?></td>
         <td class="text-right"><?php echo $value->status==1?'Active':'Deactive'; ?></td>
         <td class="text-right">
          <a href="<?php echo base_url('admin/add_blogs/'.$value->id); ?>" data-toggle="tooltip" title="Edit" class="btn btn-primary">
           <i class="fa fa-pencil"></i>
          </a>
         </td>
        </tr>

        <?php } } ?>
        
         </tbody>
        </table>
       </div>
      </form>

          <div class="row">
               
          <div class="col-sm-6 text-left">
            <ul class="pagination">
            <?php if ($pager):?>    
              <?= $pager->makeLinks($page,$perPage, $total) ?>
             <?php endif; ?>
            </ul>
           </div>
          <div class="col-sm-6 text-end">Showing <?php echo $offset; ?> to <?php echo $offset+count($detail); ?> of <?php echo $total; ?> (<?php echo $pages; ?> Pages)
          </div>
        </div>
            
     </div>
    </div>
   </div>
  </div>
 </div>


</div>




<?php echo $this->endSection();?>