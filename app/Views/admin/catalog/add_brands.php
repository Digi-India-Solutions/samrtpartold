<?php 
$this->extend('layout/master_admin');
$this->section('page');
$validation = \Config\Services::validation(); 
?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-manufacturer" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo base_url('admin/brands'); ?>" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $page_title; ?></h1>
      <ul class="breadcrumb">
                <li><a href="">Home</a></li>
                <li><a href=""><?php echo $page_title; ?></a></li>
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
        
        <?php echo form_open_multipart($form_action,'id="form-manufacturer" class="form-horizontal"'); ?>
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
            <li><a href="#tab-seo" data-toggle="tab">SEO</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab-general">
             


			
              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-name">Brand Category</label>
                <div class="col-sm-10">
                  <select class="form-control required" name="brand_cat_id" required="required">
                  	<option value="">Select</option>
                  	<?php foreach ($brand_categories as $key => $value): ?>
                  		<option value="<?php echo $value->id; ?>" <?php echo $brand_cat_id==$value->id?'selected':''; ?>><?php echo $value->name; ?></option>
                  	<?php endforeach ?>
                  </select>
                  <?php echo $validation->hasError('brand_cat_id')?$validation->showError('brand_cat_id','my_single'):''; ?>
                  </div>
              </div>


              <div class="form-group required">
                <label class="col-sm-2 control-label" for="input-name">Brand Name</label>
                <div class="col-sm-10">
                  <input type="text" name="name" value="<?php echo set_value('name',$name); ?>" placeholder="Brand Name" id="input-name" class="form-control" />
                  <?php echo $validation->hasError('name')?$validation->showError('name','my_single'):''; ?>
                  </div>
              </div>
          
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-image">Thumbnail</label>
                <div class="col-sm-10">
                  <?php if ($image): ?>
                    <img src="<?php echo base_url($image); ?>" alt="" width="100" height="100"  />
                  <?php endif ?>
                                     
                  <input type="file" name="image" value="" id="input-image" class="form-control" />
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-image">Banner Title</label>
                <div class="col-sm-10">
                                                      
                  <input type="text" name="banner_title" value="<?php echo set_value('banner_title',$banner_title); ?>" class="form-control" />
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label" for="input-image">Banner</label>
                <div class="col-sm-10">
                  <?php if ($banner): ?>
                    <img src="<?php echo base_url($banner); ?>" alt="" width="100" height="100"  />
                  <?php endif ?>
                                     
                  <input type="file" name="banner" value="" id="input-image" class="form-control" />
                </div>
              </div>

            
              <legend>Brand Detail</legend>

                <div class="form-group">
                <label class="col-sm-2 control-label" for="input-image">Top Heading</label>
                <div class="col-sm-10">
                                                      
                  <input type="text" name="top_title" value="<?php echo set_value('top_title',$top_title); ?>" class="form-control" />
                </div>
              </div>

           <div class="form-group">
          <label class="col-sm-2 control-label" for="input-meta-keyword1">Top Description</label>
          <div class="col-sm-10">
           <textarea name="top_des" rows="5" placeholder="Short Description"  class="form-control"><?php echo set_value('top_des',$top_des); ?></textarea>
          </div>
         </div>


          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-image">Link</label>
            <div class="col-sm-10">                          
              <input type="text" name="link" value="<?php echo set_value('link',$link); ?>" class="form-control" />
            </div>
          </div>

           <div class="form-group">
            <label class="col-sm-2 control-label" for="input-image">Button Title</label>
            <div class="col-sm-10">                          
              <input type="text" name="btn_title" value="<?php echo set_value('btn_title',$btn_title); ?>" class="form-control" />
            </div>
          </div>

            <div class="form-group">
            <label class="col-sm-2 control-label" for="input-image">Button Link</label>
            <div class="col-sm-10">                          
              <input type="text" name="btn_link" value="<?php echo set_value('btn_link',$btn_link); ?>" class="form-control" />
            </div>
          </div>



          <div class="form-group">
          <label class="col-sm-2 control-label" for="input-meta-keyword1">Bottom Description</label>
          <div class="col-sm-10">
           <textarea name="b_des" data-toggle="summernote" placeholder="Short Description"  class="form-control"><?php echo set_value('b_des',$b_des); ?></textarea>
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

            </div>
            <div class="tab-pane" id="tab-seo">
              


               <div class="form-group">
          <label class="col-sm-2 control-label" for="input-meta-title1">Meta Title</label>
          <div class="col-sm-10">
           <input type="text" name="meta_title" value="<?php echo set_value('meta_title',$meta_title); ?>" placeholder="Meta Tag Title" id="input-meta-title1" class="form-control" />
          </div>
         </div>

         <div class="form-group">
          <label class="col-sm-2 control-label" for="input-meta-description1">Meta Description</label>
          <div class="col-sm-10">
           <textarea name="meta_description" rows="5" placeholder="Meta Tag Description" id="input-meta-description1" class="form-control"><?php echo set_value('meta_description',$meta_description); ?></textarea>
          </div>
         </div>
         <div class="form-group">
          <label class="col-sm-2 control-label" for="input-meta-keyword1">Meta Keywords</label>
          <div class="col-sm-10">
           <textarea name="meta_keyword" rows="5" placeholder="Meta Tag Keywords" id="input-meta-keyword1" class="form-control"><?php echo set_value('meta_keyword',$meta_keyword); ?></textarea>
          </div>
         </div>



            	
           <div class="form-group">
          <label class="col-sm-2 control-label" for="input-meta-title1">Seo Url (optional)</label>
          <div class="col-sm-10">
           <input type="text"name="seo_url" value="<?php echo set_value('seo_url',$seo_url); ?>" placeholder="Seo url" id="input-meta-title1" class="form-control" />
          </div>
         </div>

             
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php echo $this->endSection();?>