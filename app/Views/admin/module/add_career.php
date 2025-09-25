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
    <button type="submit" form="form-category" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa fa-save"></i></button>
    <a href="<?php echo base_url('admin/careers'); ?>" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a>
   </div>
   <h1><?php echo $page_title; ?></h1>
   <ul class="breadcrumb">
    <li><a href="">Home</a></li>
    <li><a href="#"><?php echo $page_title; ?></a></li>
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

    <?php echo form_open_multipart($form_action,'id="form-category" class="form-horizontal"'); ?>

     <ul class="nav nav-tabs">
      <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
      <!-- <li><a href="#tab-data" data-toggle="tab">Data</a></li> -->
      <!-- <li><a href="#tab-seo" data-toggle="tab">SEO</a></li> -->
      <!-- <li><a href="#tab-design" data-toggle="tab">Design</a></li> -->
     </ul>
     <div class="tab-content">
      <div class="tab-pane active" id="tab-general">
       <ul class="nav nav-tabs" id="language">
        <li>
         <a href="#language1" data-toggle="tab"><img src="<?php echo base_url('assets/backend/image/en-gb.png'); ?>" title="English" /> English</a>
        </li>
       </ul>
       <div class="tab-content">
        <div class="tab-pane" id="language1">

        <div class="form-group required">
          <label class="col-sm-2 control-label" for="input-name1">Job Title</label>
          <div class="col-sm-10">
           <input type="text" name="title" value="<?php echo set_value('title',$title); ?>" placeholder="Title" class="form-control"  />
           <?php echo $validation->hasError('title')?$validation->showError('title','my_single'):''; ?>
          </div>
          
         </div>

         <div class="form-group required">
          <label class="col-sm-2 control-label" for="input-name1">Location</label>
          <div class="col-sm-10">
           <input type="text" name="location" value="<?php echo set_value('location',$location); ?>" placeholder="Bawal, Haryana" class="form-control"  />
           </div>
         </div>


         <div class="form-group">
          <label class="col-sm-2 control-label" for="input-description1">Description</label>
          <div class="col-sm-10">
           <textarea name="description" placeholder="Description" data-toggle="summernote" id="summernote" rows="6"  class="form-control"><?php echo set_value('description',$description); ?></textarea>
          </div>
         </div>
      
    

       
       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-sort-order">Sort Order</label>
        <div class="col-sm-10">
         <input type="text" name="sort_order" value="<?php echo set_value('sort_order',$sort_order); ?>" placeholder="Sort Order" id="input-sort-order" class="form-control" />
        </div>
       </div>

       
       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-status">Status</label>
        <div class="col-sm-10">
         <select name="status" id="input-status" class="form-control">
          <option value="1" <?php echo $status==1?'selected':''; ?>>Enabled</option>
          <option value="0" <?php echo $status=="0"?'selected':''; ?>>Disabled</option>
         </select>
        </div>
       </div>

         <div class="form-group required">
          <label class="col-sm-2 control-label" for="input-meta-title1">Meta Tag Title</label>
          <div class="col-sm-10">
           <input type="text" name="meta_title" value="<?php echo set_value('meta_title',$meta_title); ?>" placeholder="Meta Tag Title" id="input-meta-title1" class="form-control" />
          </div>
         </div>
         <div class="form-group">
          <label class="col-sm-2 control-label" for="input-meta-description1">Meta Tag Description</label>
          <div class="col-sm-10">
           <textarea name="meta_description" rows="5" placeholder="Meta Tag Description" id="input-meta-description1" class="form-control"><?php echo set_value('meta_description',$meta_description); ?></textarea>
          </div>
         </div>
         <div class="form-group">
          <label class="col-sm-2 control-label" for="input-meta-keyword1">Meta Tag Keywords</label>
          <div class="col-sm-10">
           <textarea name="meta_keyword" rows="5" placeholder="Meta Tag Keywords" id="input-meta-keyword1" class="form-control"><?php echo set_value('meta_keyword',$meta_keyword); ?></textarea>
          </div>
         </div>
        </div>
       </div>
      </div>
      
                     
       
      <div class="tab-pane" id="tab-data">
    
       <div class="table-responsive">
        <table id="ingredient" class="table table-striped table-bordered table-hover">
         <thead>
          <tr>
           <td class="text-left">Images</td>
           <td class="text-right">Sort Order</td>
           <td></td>
          </tr>
         </thead>
         <tbody>
           
          <?php if (!empty($detail)){foreach ($detail as $key => $row) {?>
          
        <tr id="image-ing<?php echo $row->id; ?>">
         <td class="text-left">
          <?php if ($row->image): ?>
            <img src="<?php echo base_url($row->image); ?>" width="100" height="100">
          <?php endif ?>
          <input type="file" name="ing_image[]" id="input-image0" class="form-control">
         
        </td>  
       
        <td class="text-right">
          <input type="number" name="ing_sort_order[]" value="<?php echo $row->sort_order; ?>" placeholder="Sort Order" class="form-control">
        </td> 

        <td class="text-left">
          <button type="button" onclick="return confirm('Are you sure to delete?') && remove_image(<?php echo $row->id; ?>)" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
        </td>
      </tr>
            
          <?php } } ?>
         </tbody>

         <tfoot>
          <tr>
           <td colspan="2"></td>
           <td class="text-left">
            <button type="button" onclick="addingredient();" data-toggle="tooltip" title="Add Ingredient Image" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button>
           </td>
          </tr>
         </tfoot>
        </table>
       </div>
      </div>
     
     
     
      <div class="tab-pane" id="tab-seo">
       <div class="alert alert-info"><i class="fa fa-info-circle"></i> Do not use spaces, instead replace spaces with - and make sure the SEO URL is globally unique.</div>
       <div class="table-responsive">
        <table class="table table-bordered table-hover">
         <thead>
          <tr>
           <td class="text-left">Stores</td>
           <td class="text-left">Keyword</td>
          </tr>
         </thead>
         <tbody>
          <tr>
           <td class="text-left">Default</td>
           <td class="text-left">
            <div class="input-group">
             <span class="input-group-addon">
             <input type="text" name="seo_url" value="<?php echo set_value('seo_url',$seo_url); ?>" placeholder="Keyword" class="form-control" />
            </div>
           </td>
          </tr>
         </tbody>
        </table>
       </div>
      </div>
 
 <link href="<?php echo base_url('assets/'); ?>javascript/codemirror/lib/codemirror.css" rel="stylesheet" />
 <link href="<?php echo base_url('assets/'); ?>javascript/codemirror/theme/monokai.css" rel="stylesheet" />
 <script type="text/javascript" src="<?php echo base_url('assets/'); ?>javascript/codemirror/lib/codemirror.js"></script>
 <script type="text/javascript" src="<?php echo base_url('assets/'); ?>javascript/codemirror/lib/xml.js"></script>
 <script type="text/javascript" src="<?php echo base_url('assets/'); ?>javascript/codemirror/lib/formatting.js"></script>

 


 <script type="text/javascript">
  <!--
  $('#language a:first').tab('show');
  //-->


  var room = 0;

  function addingredient() {
        html  = '<tr id="image-ing' + room + '">';
   
        html += '  <td class="text-left"><input type="file" name="ing_image[]"  id="input-ing' + room + '" class="form-control" /></td>';

   
        html += '  <td class="text-right"><input type="number" name="ing_sort_order[]" placeholder="Sort Order" value="1" class="form-control" required /></td>';
        html += '  <td class="text-left"><button type="button" onclick="$(\'#image-ing' + room  + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
        html += '</tr>';

        $('#ingredient tbody').append(html);
        room++;

  }
  //-->


 </script>
  </div>

<script>
    function remove_image(id){
        if(id){
            $.ajax({
                url:"<?php echo base_url('admin/cms/remove_moods_image'); ?>",
                type:"post",
                data:{id:id},
                success:function(data){ 
                    if(data){
                        $('#image-ing'+id).fadeOut(1000);
                    }else{
                        toastr.error('something went wrong');
                    }
                   
                }
            });
        }

      
    }
</script>
  <?php echo $this->endSection();?>