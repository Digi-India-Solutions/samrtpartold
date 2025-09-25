
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-filter" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo base_url('admin/sale_page'); ?>" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $page_title; ?></h1>
      <ul class="breadcrumb">
       <li><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
<li><a href="javascript:void();"><?php echo $page_title; ?></a></li>
      </ul>
    </div>
  </div>
  <div class="container-fluid">     <div class="panel panel-default">
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
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $page_title; ?></h3>
      </div>
      <div class="panel-body">
  
        <?php echo form_open_multipart($form_action,'id="form-filter" class="form-horizontal"'); ?>  

           <div class="form-group">
              <label class="col-sm-2 control-label" for="input-sort-order">Title</label>
              <div class="col-sm-10">
                <input type="text" name="title" value="<?php echo set_value('title',$title); ?>" class="form-control">
                <?php echo form_error('title'); ?>
              </div>
            </div> 
                
             <div class="form-group">
              <label class="col-sm-2 control-label" for="input-sort-order">Sub Heading</label>
              <div class="col-sm-10">
                <input type="text" name="sub_heading" value="<?php echo set_value('sub_heading',$sub_heading); ?>" class="form-control">
                <?php echo form_error('sub_heading'); ?>
              </div>
            </div>  

             <div class="form-group">
              <label class="col-sm-2 control-label" for="input-sort-order">Description</label>
              <div class="col-sm-10">
               <textarea name="description" class="form-control" data-toggle="summernote"><?php echo set_value('description',$description); ?></textarea>
                <?php echo form_error('description'); ?>
              </div>
            </div>  
            <div class="form-group">
              <label class="col-sm-2 control-label" for="input-sort-order">Banner image</label>
              <div class="col-sm-10">
                <?php if (!empty($banner)): ?>
                  <img src="<?php echo base_url($banner); ?>" width="100" height="100">
                <?php endif ?>
                <input type="file" name="banner" class="form-control">
               </div>
            </div>  

         <div class="form-group">
        <label class="col-sm-2 control-label" for="input-filter"><span data-toggle="tooltip" title="(Autocomplete)">Select Product List</span></label>
        <div class="col-sm-10">
         <select class="multiple form-control" name="product_id[]" multiple>
              <option value="">select option</option>
              <?php foreach ($product_list as $key => $value): ?>
              <option value="<?php echo $value->id; ?>" <?php echo @in_array($value->id, @$products)?'selected':''; ?>><?php echo $value->name; ?></option>
              <?php endforeach ?>
         </select>
        </div>
       </div>

           <div class="form-group">
              <label class="col-sm-2 control-label" for="input-sort-order">Seo Url</label>
              <div class="col-sm-10">
                <input type="text" name="seo_url" value="<?php echo set_value('seo_url',$seo_url); ?>" class="form-control">
                <?php echo form_error('seo_url'); ?>
              </div>
            </div>  
            <div class="form-group">
<label class="col-sm-2 control-label" for="input-sort-order">Meta Title</label>
<div class="col-sm-10">
<input type="text" name="meta_title" value="<?= $meta_title?>" class="form-control">
<?php echo form_error('meta_title'); ?>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label" for="input-sort-order">Meta Keyword</label>
<div class="col-sm-10">
<input type="text" name="meta_keyword" value="<?= $meta_keyword?>" class="form-control">
<?php echo form_error('meta_keyword'); ?>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="input-sort-order">Meta Desciption</label>
<div class="col-sm-10">
<textarea name="meta_description" class="form-control" rows="4" ><?= @$meta_description?></textarea>
</div>
</div>
            
             <div class="form-group">
              <label class="col-sm-2 control-label" for="input-sort-order">Status</label>
              <div class="col-sm-10">
                <select class="form-control" name="status">
                  <option value="1" <?php echo $status==1?'selected':''; ?>>Active</option>
                  <option value="0" <?php echo $status==0?'selected':''; ?>>Deactive</option>
                </select>
                <?php echo form_error('status'); ?>
              </div>
            </div> 

 
        </form>
      </div>
    </div>
  </div>

</div>
