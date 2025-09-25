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
    <a href="<?php echo base_url('admin/category'); ?>" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a>
   </div>
   <h1>Categories</h1>
   <ul class="breadcrumb">
    <li><a href="">Home</a></li>
    <li><a href="#">Categories</a></li>
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
      <li><a href="#tab-data" data-toggle="tab">Data</a></li>
      <li><a href="#tab-seo" data-toggle="tab">SEO</a></li>
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
          <label class="col-sm-2 control-label" for="input-name1">Category Name</label>
          <div class="col-sm-10">
           <input type="text" name="name" value="<?php echo set_value('name',$name); ?>" placeholder="Category Name" id="input-name1" class="form-control"  />
           <?php echo $validation->hasError('name')?$validation->showError('name','my_single'):''; ?>
          </div>
          
         </div>

         <div class="form-group">
          <label class="col-sm-2 control-label" for="input-description1">Description</label>
          <div class="col-sm-10">
           <textarea name="description" placeholder="Description" id="input-description1" data-toggle="summernote" class="form-control"><?php echo set_value('description',$description); ?></textarea>
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

       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-parent">Parent</label>
        <div class="col-sm-10">
        
          <select name="parent_id" id="input-status" class="form-control">
          <option value="0">select option</option>
          
          <?php
          if(!empty($category_list)){

           foreach ($category_list as $key => $value){ ?>
            <option value="<?php echo $value->id; ?>" <?php echo $value->id==$parent_id?'selected':''; ?>><?php echo $value->name; ?></option>
             <?php 
             $level1 = $this->AdminModel->all_fetch('category',array('parent_id'=>$value->id));

            if ($level1) {
            foreach ($level1 as $key => $l1) {?>

                <option value="<?php echo @$l1->id; ?>" <?php echo $l1->id==$parent_id?'selected':''; ?>><?php echo $value->name.' > '.@$l1->name; ?></option>


           <?php 
           $level2 = $this->AdminModel->all_fetch('category',array('parent_id'=>$l1->id));
           if ($level2) {
          foreach ($level2 as $key => $l2) {?>     

            <option value="<?php echo $l2->id; ?>" <?php echo $l2->id==$parent_id?'selected':''; ?>><?php echo $value->name.' > '.$l1->name.' > '.$l2->name; ?></option>

        <?php 
        $level3 = $this->AdminModel->all_fetch('category',array('parent_id'=>$l2->id));
        if ($level3) {
          foreach ($level3 as $key => $l3) {?>

          <option value="<?php echo @$l3->id; ?>" <?php echo @$l3->id==$parent_id?'selected':''; ?>><?php echo $value->name.' > '.$l1->name.' > '.$l2->name.' > '.@$l3->name; ?></option>


        <?php } } ?>

        <?php }} ?>

        <?php }} ?> 

        <?php }} ?>


         </select>

        </div>
       </div>
                     
       

   <div class="form-group">
        <label class="col-sm-2 control-label" for="input-parent">Filter</label>
        <div class="col-sm-10">
         <select class="multiple form-control" name="filter[]" multiple>
              <option value="1">select option</option>
              
              <?php  foreach ($filter_list as $key => $value): ?>
              <option value="<?php echo $value->id; ?>" <?php echo  @in_array($value->id, @$filter_id)?'selected':''; ?>><?php echo $value->group_name.' > '.$value->name; ?></option>
              <?php endforeach ?>
         </select>
        </div>
       </div>

       <div class="form-group">
        <label class="col-sm-2 control-label">Category Banner Image</label>
        <div class="col-sm-10">
          <?php if ($image): ?>
            <img src="<?php echo base_url($image); ?>" width="100" height="100">
          <?php endif ?>
         
         <input type="file" name="image" id="input-image" class="form-control" />
        </div>
       </div>

        <div class="form-group">
        <label class="col-sm-2 control-label">Banner Heading</label>
        <div class="col-sm-10">
                   
         <input type="text" name="banner_heading" id="input-image" class="form-control" value="<?php echo set_value('banner_heading',$banner_heading); ?>" />
        </div>
       </div>


      <!--<div class="form-group">-->
      <!--  <label class="col-sm-2 control-label">Category top icon Image</label>-->
      <!--  <div class="col-sm-10">-->
      <!--    <?php if ($icon): ?>-->
      <!--      <img src="<?php echo base_url($icon); ?>" width="100" height="100">-->
      <!--    <?php endif ?>-->
         
      <!--   <input type="file" name="icon" id="input-image" class="form-control" />-->
      <!--  </div>-->
      <!-- </div>-->

     <div class="form-group">
        <label class="col-sm-2 control-label">Category Thumbnail Image</label>
        <div class="col-sm-10">
          <?php if ($thumbnail): ?>
            <img src="<?php echo base_url($thumbnail); ?>" width="100" height="100">
          <?php endif ?>
         
         <input type="file" name="thumbnail" id="input-image" class="form-control" />
        </div>
       </div>


       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-top"><span data-toggle="tooltip" title="Display on home page.">Show Home Page</span></label>
        <div class="col-sm-10">
         <div class="checkbox">
          <label>
           <input type="checkbox" name="top" value="1" <?php echo $top==1?'checked':''; ?>  id="input-top" />
           &nbsp;
          </label>
         </div>
        </div>
       </div>

        <div class="form-group">
        <label class="col-sm-2 control-label" for="input-top"><span data-toggle="tooltip" title="if this is checked then this category show in collection category">Show in Collection Category</span></label>
        <div class="col-sm-10">
         <div class="checkbox">
          <label>
           <input type="checkbox" name="popular_category" value="1"  <?php echo $popular_category==1?'checked':''; ?>  id="input-top" />
           &nbsp;
          </label>
         </div>
        </div>
       </div>
<div class="form-group">
        <label class="col-sm-2 control-label" for="input-top"><span data-toggle="tooltip" title="if this is checked then this category show in tending category">Show in Trending Category</span></label>
        <div class="col-sm-10">
         <div class="checkbox">
          <label>
           <input type="checkbox" name="trending_category" value="1"  <?php echo $trending_category==1?'checked':''; ?>  id="input-top" />
           &nbsp;
          </label>
         </div>
        </div>
       </div>
       <!--<div class="form-group">-->
       <!-- <label class="col-sm-2 control-label" for="input-parent">Select Banner</label>-->
       <!-- <div class="col-sm-10">-->
       <!--  <select class="multiple form-control" name="banner_id[]" multiple>-->
       <!--       <option value="">select option</option>-->
              
       <!--       <?php  foreach ($banner_list as $key => $value): ?>-->
       <!--       <option value="<?php echo $value->id; ?>" <?php echo  @in_array($value->id, json_decode($banner_id))?'selected':''; ?>><?php echo $value->name; ?></option>-->
       <!--       <?php endforeach ?>-->
       <!--  </select>-->
       <!-- </div>-->
       <!--</div>-->

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
             <input type="text" name="keyword" value="<?php echo set_value('keyword',$keyword); ?>" placeholder="Keyword" class="form-control" />
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
 </script>
  </div>


  <?php echo $this->endSection();?>