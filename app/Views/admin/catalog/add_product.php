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
    <button type="submit" form="form-product" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa fa-save"></i></button>
    <a href="<?php echo base_url('admin/product'); ?>" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a>
   </div>
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
    
 <?php echo form_open_multipart($form_action,'id="form-product" class="form-horizontal"'); ?>
     <ul class="nav nav-tabs">
      <li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
      <li><a href="#tab-data" data-toggle="tab">Data</a></li>
      <li><a href="#tab-links" data-toggle="tab">Links</a></li>
      <li><a href="#tab-attribute" data-toggle="tab">Attribute</a></li>
      <!-- <li><a href="#tab-option" data-toggle="tab">Option</a></li> -->
      <!-- <li><a href="#tab-varient" data-toggle="tab">variant</a></li> -->
      <!-- <li><a href="#tab-discount" data-toggle="tab">Discount</a></li> -->
       <li><a href="#tab-special" data-toggle="tab">Special</a></li> 
      <li><a href="#tab-image" data-toggle="tab">Image</a></li>
      <!-- <li><a href="#tab-design" data-toggle="tab">Product Info</a></li> -->
      <!-- <li><a href="#tab-reward" data-toggle="tab">Reward Points</a></li> -->
      <li><a href="#tab-seo" data-toggle="tab">SEO</a></li>
      <!-- <li><a href="#tab-design" data-toggle="tab">Design</a></li> -->
     </ul>
     <div class="tab-content">
      <div class="tab-pane active" id="tab-general">
       <ul class="nav nav-tabs" id="language">
        <li>
         <a href="#language1" data-toggle="tab">English</a>
        </li>
       </ul>
       <div class="tab-content">
        <div class="tab-pane" id="language1">
         <div class="form-group required">
          <label class="col-sm-2 control-label" for="input-name1">Product Name</label>
          <div class="col-sm-10">
           <input type="text" name="name" value="<?php echo set_value('name',$name); ?>" placeholder="Product Name" id="input-name1" class="form-control" />
           <?php echo $validation->hasError('name')?$validation->showError('name','my_single'):''; ?>
          </div>
         </div>
         <div class="form-group">
          <label class="col-sm-2 control-label" for="input-description1">Short Description</label>
          <div class="col-sm-10">
           <textarea name="description" placeholder="Description" id="input-description1" data-toggle="summernote"  class="form-control"><?php echo set_value('description',$description); ?></textarea>
          </div>
         </div>
         
        <div class="form-group">
          <label class="col-sm-2 control-label" for="input-description1">Product Description</label>
          <div class="col-sm-10">
           <textarea name="product_description" placeholder="Description" id="input-description1" data-toggle="summernote"  class="form-control"><?php echo set_value('product_description',$product_description); ?></textarea>
          </div>
         </div>

         <!-- <div class="form-group">
          <label class="col-sm-2 control-label" for="input-description1">Additional Description</label>
          <div class="col-sm-10">
           <textarea name="additional_description" placeholder="Description" id="input-description1" data-toggle="summernote"  class="form-control"><?php echo set_value('additional_description',$additional_description); ?></textarea>
          </div>
         </div> -->
         
<!--          
         <div class="form-group required">
          <label class="col-sm-2 control-label" for="input-tag1"><span data-toggle="tooltip" title="Enter your default color name">Default Color Name</span></label>
          <div class="col-sm-10">
           <input type="text" name="color_name" value="<?php echo set_value('color_name',$color_name); ?>" placeholder="Ex Black,Red" id="input-tag1" class="form-control" required />
          </div>
         </div>
          
         <div class="form-group required">
          <label class="col-sm-2 control-label" for="input-tag1"><span data-toggle="tooltip" title="slecect your default color">Default Color</span></label>
          <div class="col-sm-3">
           <input type="color" name="color_code" value="<?php echo set_value('color_code',$color_code); ?>" placeholder="default color code" id="input-tag1" class="form-control" required />
          </div>
         </div> -->
         
        <div class="form-group">
          <label class="col-sm-2 control-label" for="input-tag1"><span data-toggle="tooltip" title="enter return no of day">Return Days</span></label>
          <div class="col-sm-10">
           <input type="number" name="return_policy" value="<?php echo set_value('return_policy',$return_policy); ?>" placeholder="Return Days" id="input-tag1" class="form-control" />
          </div>
         </div>
        
         <div class="form-group">
          <label class="col-sm-2 control-label" for="input-tag1"><span data-toggle="tooltip" title="Warranty detail">Warranty </span></label>
          <div class="col-sm-10">
           <input type="text" name="warranty" value="<?php echo set_value('warranty',$warranty); ?>" placeholder="Ex: 1 Year Warranty" id="input-tag1" class="form-control" />
          </div>
         </div>
        
        <!-- <div class="form-group">
          <label class="col-sm-2 control-label" for="input-tag1"><span data-toggle="tooltip" title="if check then cod option is hide for this product purchasing">Only for Preorder type  </span></label>
          <div class="col-sm-10">
           <input type="checkbox" name="preorder" value="1" <?php echo $preorder?'checked':''; ?>  />
          </div>
         </div> -->

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
         <div class="form-group">
          <label class="col-sm-2 control-label" for="input-tag1"><span data-toggle="tooltip" title="Comma separated">Product Tags (comma (,) separated )</span></label>
          <div class="col-sm-10">
           <input type="text" name="tag" value="<?php echo set_value('tag',$tag); ?>" placeholder="Product Tags" id="input-tag1" class="form-control" />
          </div>
         </div>
        </div>
       </div>
      </div>
     

      <div class="tab-pane" id="tab-data">
       <div class="form-group required">
        <label class="col-sm-2 control-label" for="input-model">Model</label>
        <div class="col-sm-10">
         <input type="text" name="model" value="<?php echo set_value('model',$model); ?>" placeholder="Model" id="input-model" class="form-control" />
        </div>
       </div>
       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-sku"><span data-toggle="tooltip" title="Stock Keeping Unit">SKU</span></label>
        <div class="col-sm-10">
         <input type="text" name="sku" value="<?php echo set_value('sku',$sku); ?>" placeholder="SKU" id="input-sku" class="form-control" />
        </div>
       </div>
       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-upc"><span data-toggle="tooltip" title="Universal Product Code">UPC</span></label>
        <div class="col-sm-10">
         <input type="text" name="upc" value="<?php echo set_value('upc',$upc); ?>" placeholder="UPC" id="input-upc" class="form-control" />
        </div>
       </div>
       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-ean"><span data-toggle="tooltip" title="European Article Number">EAN</span></label>
        <div class="col-sm-10">
         <input type="text" name="ean" value="<?php echo set_value('ean',$ean); ?>" placeholder="EAN" id="input-ean" class="form-control" />
        </div>
       </div>
     

         <div class="form-group">
        <label class="col-sm-2 control-label" for="input-mpn"><span data-toggle="tooltip" title="Manufacturer Part Number">Part No.</span></label>
        <div class="col-sm-10">
         <input type="text" name="part_no" value="<?php echo set_value('part_no',$part_no); ?>" placeholder="Port No." class="form-control" />
        </div>
       </div>
      
       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-location">Origin</label>
        <div class="col-sm-10">
         <input type="text" name="origin" value="<?php echo set_value('origin',$origin); ?>" placeholder="Origin" id="input-location" class="form-control" />
        </div>
       </div>

      <div class="form-group">
        <label class="col-sm-2 control-label" for="input-location">Class</label>
        <div class="col-sm-10">
         <input type="text" name="class" value="<?php echo set_value('class',$origin); ?>" placeholder="Class" id="input-location" class="form-control" />
        </div>
       </div>

       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-price">Price</label>
        <div class="col-sm-10">
         <input type="text" name="price" value="<?php echo set_value('price',$price); ?>" placeholder="Price" id="input-price" class="form-control" />
        </div>
       </div>

        <div class="form-group">
        <label class="col-sm-2 control-label" for="input-jan"><span data-toggle="tooltip" title="Show Discount Price">Specail Price</span></label>
        <div class="col-sm-10">
         <input type="text" name="special_price" value="<?php echo set_value('special_price',$special_price); ?>" placeholder="JAN" id="input-jan" class="form-control" />
        </div>
       </div>
      
       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-isbn">Special Date Start</label>
        <div class="col-sm-4">
         <input type="date" name="date_start" value="<?php echo set_value('date_start',$date_start); ?>" placeholder="" id="input-isbn" class="form-control" />
        </div>
         <label class="col-sm-2 control-label" for="input-mpn">Special Date End</label>
        <div class="col-sm-4">
         <input type="date" name="date_end" value="<?php echo set_value('date_end',$date_end); ?>" placeholder="" id="input-mpn" class="form-control" />
        </div>
       </div>
            

       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-quantity">Quantity</label>
        <div class="col-sm-10">
         <input type="number" name="quantity" value="<?php echo set_value('quantity',$quantity); ?>" placeholder="Quantity" id="input-quantity" class="form-control" />
        </div>
       </div>

        <div class="form-group">
        <label class="col-sm-2 control-label" for="input-minimum"><span data-toggle="tooltip" title="Force a minimum ordered amount">Minimum Quantity</span></label>
        <div class="col-sm-10">
         <input type="number" name="minimum" value="<?php echo set_value('minimum',$minimum); ?>" placeholder="Minimum Quantity" id="input-minimum" class="form-control" />
        </div>
       </div> 

       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-subtract">Subtract Stock</label>
        <div class="col-sm-10">
         <select name="subtract" id="input-subtract" class="form-control">
          <option value="1" <?php echo $subtract?"selected":''; ?>>Yes</option>
          <option value="0" <?php echo $subtract==""?'selected':''; ?>>No</option>
         </select>
        </div>
       </div>

       <!-- <div class="form-group">
        <label class="col-sm-2 control-label" for="input-stock-status"><span data-toggle="tooltip" title="Status shown when a product is out of stock">Out Of Stock Status</span></label>
        <div class="col-sm-10">
         <select name="stock_status_id" id="input-stock-status" class="form-control">
          <?php foreach ($stock_status as $key => $value): ?>
            <option value="<?php echo $value->id; ?>" <?php echo $stock_status_id==$value->id?'selected':''; ?>><?php echo $value->name; ?></option>
          <?php endforeach ?>
           
         </select>
        </div>
       </div> -->

       <div class="form-group">
        <label class="col-sm-2 control-label">Requires Shipping</label>
        <div class="col-sm-10">
         <label class="radio-inline">
          <input type="radio" name="shipping" value="1" <?php echo $shipping?'checked':''; ?> checked="checked" />
          Yes
         </label>
         <label class="radio-inline">
          <input type="radio" name="shipping" value="0" <?php echo $shipping==""?'checked':''; ?> />
          No
         </label>
        </div>
       </div>


       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-length">Dimensions (L x W x H)</label>
        <div class="col-sm-10">
         <div class="row">
          <div class="col-sm-4">
           <input type="text" name="length" value="<?php echo set_value('length',$length); ?>" placeholder="Length" id="input-length" class="form-control" />
          </div>
          <div class="col-sm-4">
           <input type="text" name="width" value="<?php echo set_value('width',$width); ?>" placeholder="Width" id="input-width" class="form-control" />
          </div>
          <div class="col-sm-4">
           <input type="text" name="height" value="<?php echo set_value('height',$height); ?>" placeholder="Height" id="input-height" class="form-control" />
          </div>
         </div>
        </div>
       </div>

       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-length-class">Length Class</label>
        <div class="col-sm-10">
         <select name="length_class_id" id="input-length-class" class="form-control">
          <?php foreach ($length_class as $key => $value): ?>
            <option value="<?php echo $value->id; ?>" <?php echo $length_class_id==$value->id?'selected':''; ?>><?php echo $value->title; ?></option>
          <?php endforeach ?>

         </select>
        </div>
       </div>

       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-weight">Weight</label>
        <div class="col-sm-10">
         <input type="text" name="weight" value="<?php echo set_value('weight',$weight); ?>" placeholder="Weight" id="input-weight" class="form-control" />
        </div>
       </div>

       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-weight-class">Weight Class</label>
        <div class="col-sm-10">
         <select name="weight_class_id" id="input-weight-class" class="form-control">
           <?php foreach ($weight_class as $key => $value): ?>
            <option value="<?php echo $value->id; ?>" <?php echo $weight_class_id==$value->id?'selected':''; ?>><?php echo $value->title; ?></option>
          <?php endforeach ?>

         </select>
        </div>
       </div>

       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-status">Status</label>
        <div class="col-sm-10">
         <select name="status" id="input-status" class="form-control">
          <option value="1"  <?php echo $status==1?'selected':''; ?>>Enabled</option>
          <option value="0" <?php echo $status=="0"?'selected':''; ?>>Disabled</option>
         </select>
        </div>
       </div>

       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-sort-order">Sort Order</label>
        <div class="col-sm-10">
         <input type="number" name="sort_order" value="<?php echo set_value('sort_order',$sort_order); ?>" placeholder="Sort Order" id="input-sort-order" class="form-control" />
        </div>
       </div>
      </div>
    
      <div class="tab-pane" id="tab-links">
      
       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-manufacturer"><span data-toggle="tooltip" title="(Autocomplete)">Manufacturer</span></label>
        <div class="col-sm-10">
        
           <select class="select2 form-control" name="manufacturer_id">
              <option value="">select option</option>
              
              <?php foreach ($manufacturer_list as $key => $value): ?>
              <option value="<?php echo $value->id; ?>" <?php echo @$manufacturer_id==$value->id?'selected':''; ?>><?php echo @$value->name; ?></option>
              <?php endforeach ?>
         </select>
        </div>
       </div>


       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-manufacturer"><span data-toggle="tooltip" title="(Autocomplete)">Select Brand</span></label>
        <div class="col-sm-10">
        
           <select class="select2 form-control" name="brand">
              <option value="">select option</option>
              
              <?php foreach ($brands_list as $key => $brand_category){
                  if(!empty($brand_category['brand_list'])){ foreach ($brand_category['brand_list'] as $key => $row) {  ?>
              
              <option value="<?php echo $row->id; ?>" <?php echo $brand==$row->id?'selected':''; ?>><?php echo $brand_category['name'].' > '.$row->name; ?></option>


              <?php } } } ?>
         </select>
        </div>
       </div>

    
  

      

       

       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-category"><span data-toggle="tooltip" title="(Autocomplete)">Categories</span></label>
        <div class="col-sm-10">
          <select class="multiple form-control" name="category[]"  multiple>
          <option value="">select option</option>
          
          <?php
          if(!empty($category_list)){

           foreach ($category_list as $key => $value){ ?>
            <option value="<?php echo $value->id; ?>" <?php echo @in_array($value->id, $category)?'selected':''; ?> class="parent" ><?php echo $value->name; ?></option>
            
             <?php 
             $level1 = $this->AdminModel->all_fetch('category',array('parent_id'=>$value->id));
            if ($level1) {
            foreach ($level1 as $key => $l1) {?>

                <option value="<?php echo @$l1->id; ?>" <?php echo @in_array($l1->id, $category)?'selected':''; ?> ><?php echo $value->name.' > '.@$l1->name; ?></option>


           <?php 
           $level2 = $this->AdminModel->all_fetch('category',array('parent_id'=>$l1->id));
           if ($level2) {
          foreach ($level2 as $key => $l2) {?>     

            <option value="<?php echo $l2->id; ?>" <?php echo @in_array($l2->id, $category)?'selected':''; ?>><?php echo $value->name.' > '.$l1->name.' > '.$l2->name; ?></option>

        <?php 
        $level3 = $this->AdminModel->all_fetch('category',array('parent_id'=>$l2->id));
        if ($level3) {
          foreach ($level3 as $key => $l3) {?>

          <option value="<?php echo $l3->id; ?>" <?php echo @in_array($l3->id, $category)?'selected':''; ?> ><?php echo $value->name.' > '.$l1->name.' > '.$l2->name.' > '.$l3->name;; ?></option>


        <?php } } ?>

        <?php }} ?>

        <?php }} ?> 


        <?php }} ?>


         </select>
        </div>
       </div>

       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-filter"><span data-toggle="tooltip" title="(Autocomplete)">Filters</span></label>
        <div class="col-sm-10">
         <select class="multiple form-control" name="filter[]" multiple>
              <option value="1">select option</option>
              
              <?php foreach ($filter_list as $key => $value): ?>
              <option value="<?php echo $value->id; ?>" <?php echo @in_array($value->id, @$filter)?'selected':''; ?>><?php echo $value->group_name.' > '.$value->name; ?></option>
              <?php endforeach ?>
         </select>
        </div>
       </div>

    

       <!-- <div class="form-group" style="display: none;"> 
        <label class="col-sm-2 control-label" for="input-download"><span data-toggle="tooltip" title="(Autocomplete)">Downloads</span></label>
        <div class="col-sm-10">
          <select class="multiple form-control" name="download[]" multiple>
              <option value="1">select option</option>
              
              <?php foreach ($download_list as $key => $value): ?>
              <option value="<?php echo $value->id; ?>" <?php echo @in_array($value->id, $download)?'selected':''; ?> ><?php echo $value->name; ?></option>
              <?php endforeach ?>
         </select>
        </div>
       </div>  -->


     

       <!-- <div class="form-group">
        <label class="col-sm-2 control-label" for="input-related"><span data-toggle="tooltip" title="(Autocomplete)">Frequently bought together </span></label>
        <div class="col-sm-10">
        
          <select class="multiple form-control" name="together[]" multiple>
              <option value="1">select option</option>
              
              <?php foreach ($product_list as $key => $value): ?>
              <option value="<?php echo $value->id; ?>" <?php echo @in_array($value->id, $together)?'selected':''; ?> ><?php echo $value->name; ?></option>
              <?php endforeach ?>
         </select>
        </div>
       </div> -->



       <!--<div class="form-group">-->
       <!-- <label class="col-sm-2 control-label" for="input-related"><span data-toggle="tooltip" title="(Autocomplete)">Related Products</span></label>-->
       <!-- <div class="col-sm-10">-->
        
       <!--   <select class="multiple form-control" name="related[]" multiple>-->
       <!--       <option value="1">select option</option>-->
              
       <!--       <?php foreach ($product_list as $key => $value): ?>-->
       <!--       <option value="<?php echo $value->id; ?>" <?php echo @in_array($value->id, $related)?'selected':''; ?> ><?php echo $value->name; ?></option>-->
       <!--       <?php endforeach ?>-->
       <!--  </select>-->
       <!-- </div>-->
       <!--</div>-->


      <div class="form-group">
        <label class="col-sm-2 control-label" for="input-manufacturer"><span data-toggle="tooltip" title="if check then this product is show in Best Seller">Show in Best Seller</span></label>
        <div class="col-sm-10">
         <input type="checkbox" name="best_seller" value="1" id="input-sort-order" class="" <?php echo $best_seller==1?'checked="checked"':''; ?> /> 
          
        </div>
       </div>


       <!-- <div class="form-group" id="best_seller_img" <?php echo $best_seller_img?'':'style="display: none;"'; ?> >
        <label class="col-sm-2 control-label" for="input-manufacturer"><span data-toggle="tooltip" title="upload best seller image">Upload Best Seller Image</span></label>
         <div class="col-sm-10">
        <?php if (!empty($best_seller_img)): ?>
          <img src="<?php echo base_url($best_seller_img); ?>" width="100" height="100">
        <?php endif ?>
         <input type="file" name="best_seller_img" class="form-control"/> 
        </div>
       </div> -->

       
        <div class="form-group">
        <label class="col-sm-2 control-label" for="input-manufacturer"><span data-toggle="tooltip" title="if check then this product is show in Best Seller">Show in Feature Product</span></label>
        <div class="col-sm-10">
         <input type="checkbox" name="feature_product" value="1" id="input-sort-order" class="" <?php echo $feature_product==1?'checked':''; ?> /> 
          
        </div>
       </div>


   <!--      <div class="form-group">
        <label class="col-sm-2 control-label" for="input-manufacturer"><span data-toggle="tooltip" title="if check then this product is show in Gift wrpping">This Product is GiftWrapping</span></label>
        <div class="col-sm-10">
         <input type="checkbox" name="gift" value="1" id="input-sort-order" class="" <?php echo $gift==1?'checked':''; ?> /> 
          
        </div>
       </div> -->


        <div class="form-group">
        <label class="col-sm-2 control-label" for="input-manufacturer"><span data-toggle="tooltip" title="if check then this product is show in Trending">This Product is Trending</span></label>
        <div class="col-sm-10">
         <input type="checkbox" name="trending" value="1" id="input-sort-order" class="" <?php echo $trending==1?'checked':''; ?> /> 
          
        </div>
       </div>
      </div>

      <div class="tab-pane" id="tab-attribute">
       <div class="table-responsive">
        <table id="attribute" class="table table-striped table-bordered table-hover">
         <thead>
          <tr>
           <td class="text-left">Attribute</td>
           <td class="text-left">Text</td>
           <td></td>
          </tr>
         </thead>
         <tbody>

         
     <?php if (!empty($attribute)) { foreach ($attribute as $key => $row) {?>
         
      <tr id="attribute-row<?php echo $row->id; ?>">
       <td class="text-left" style="width: 20%;"> <select class="form-control" name="attribute_id[]"> <option value="">select option</option> <?php foreach ($attribute_list as $key => $value){ ?> <option value="<?php echo $value->id; ?>" <?php echo $row->attribute_id==$value->id?'selected':''; ?> ><?php echo $value->group_name.' > '.$value->name; ?></option> <?php } ?> </select> </td>
       <td class="text-left">
       <div class="input-group"><textarea name="attribute_text[]" rows="5" placeholder="Text" class="form-control"><?php echo $row->text?$row->text:''; ?></textarea></div>
       </td>
         <td class="text-right"><button type="button" onclick="$('#attribute-row<?php echo $row->id; ?>').remove();" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Remove"><i class="fa fa-minus-circle"></i></button></td>
      </tr>

    <?php } } ?>
           </tbody>

          <tfoot>
          <tr>
           <td colspan="2"></td>
           <td class="text-right">
            <button type="button" onclick="addAttribute();" data-toggle="tooltip" title="Add Attribute" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button>
           </td>
          </tr>
         </tfoot>

          <select id="option-attribute" style="display: none;">
                     <option value="">select option</option>
                      <?php foreach ($attribute_list as $key => $value){ ?>
                      
                       <option value="<?php echo $value->id; ?>"> 
                        <?php echo $value->group_name.' > '.$value->name; ?>
                        </option> 
       
                    <?php }  ?>
            </select>

        </table>
       </div>
      </div>

          <div class="tab-pane d-none" id="tab-option">
              <div class="row">
                <div class="col-sm-2">
                  <ul class="nav nav-pills nav-stacked" id="option">
                  <?php if (!empty($option_list)) {foreach ($option_list as $key => $value) {?>
                  
                   <li><a href="#tab-option<?php echo $value->id; ?>" data-toggle="tab"> <?php echo $value->name; ?></a></li>

                 <?php } } ?>

                 <!--   <li><a href="#tab-option1" data-toggle="tab"><i class="fa fa-minus-circle" onclick="$('a[href=\'#tab-option1\']').parent().remove(); $('#tab-option1').remove(); $('#option a:first').tab('show');"></i> scent</a></li> -->
                                                          
                  </ul>
                </div>
                <div class="col-sm-10">
              <div class="tab-content">

           <?php if (!empty($option_list)) {foreach ($option_list as $key => $value)       {
                  $option = $this->AdminModel->all_fetch('option_value_description',array('option_des_id'=>$value->id),'sort_order','asc');

                  $product_option = $this->AdminModel->fs('product_option',array('product_id'=>$id,'option_des_id'=>$value->id));
                ?>

              <!-- condition start here -->  

         <?php if ($value->option_id=='1'  || $value->option_id=='2'  || $value->option_id=='5') {?>
                                                    
        
        <!-- radio  and select option -->
         <div class="tab-pane" id="tab-option<?php echo $value->id; ?>">
           <input type="hidden" name="product_option[option_description_id][]" value="<?php echo $value->id; ?>" />
           
            <input type="hidden" name="product_option[option_old_des_id][]" value="<?php echo $value->id; ?>" />

           <input type="hidden" name="product_option[value][]" value=""  class="form-control">  

            <div class="form-group">
              <label class="col-sm-2 control-label" for="input-required1">Required</label>
              <div class="col-sm-10">
                <select name="product_option[required][]" id="input-required1" class="form-control">
                  <option value="">select option</option>
                  <option value="1" <?php echo @$product_option->required==1?'selected':''; ?>>Yes</option>
                  <option value="0" <?php echo @$product_option->required==0?'selected':''; ?>>No</option>
                </select>
              </div>
            </div>
            <div class="table-responsive">
              <table id="option-value<?php echo $value->id; ?>" class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <td class="text-left">Option Value</td>
                    <td class="text-right">Quantity</td>
                    <td class="text-left">Subtract Stock</td>
                    <td class="text-right">Price</td>
                    <td class="text-right">Points</td>
                  <td></td>
                                           
                  </tr>
                </thead>
                <tbody>
           <?php 
           @$option_value = $this->AdminModel->all_fetch('product_option_value',array('product_option_id'=>$product_option->id),'id','asc');
           if (!empty($option_value)) {foreach ($option_value as $key => $opt) {?>
               
          <tr id="option-value-row<?php echo $opt->id; ?>"> 
            <input type="hidden" name="product_option[option_old_id][<?php echo $value->id; ?>][]" value="<?php echo  $opt->id;  ?>"> 
              <td class="text-left">
                <select name="product_option[option_value_id][<?php echo $value->id; ?>][]" class="form-control" required="">
                      <?php foreach ($option as $key => $val) {?>
                        
                          <option value="<?php echo $val->id; ?>" <?php echo @$opt->option_value_id==$val->id?'selected':''; ?>><?php echo @$val->name; ?></option>
                        <?php } ?>
                  </select>
                   </td>  
                   <td class="text-left">
                  <input type="number" name="product_option[quantity][<?php echo $value->id; ?>][]" value="<?php echo $opt->quantity; ?>"  class="form-control">   
                  </td>
                    <td class="text-left">
                    <select name="product_option[subtract][<?php echo $value->id; ?>][]" class="form-control">
                    <option value="1" <?php echo $opt->subtract?'selected':''; ?>>Yes</option>
                    <option value="0" <?php echo $opt->subtract==0?'selected':''; ?> >NO</option> 
                    </select>
              </td>
                   <td class="text-right">
                      <select name="product_option[price_prefix][<?php echo $value->id; ?>][]" class="form-control"> 
                      <option value="+" <?php echo @$opt->price_prefix=='+'?'selected':''; ?>>+</option> 
                      <option value="-" <?php echo @$opt->price_prefix=='-'?'selected':''; ?>>-</option> 
                    </select>  
                     <input type="text" name="product_option[price][<?php echo $value->id; ?>][]" value="<?php echo $opt->price; ?>" placeholder="Price" class="form-control">
                 </td> 
                   <td class="text-left">
                  <input type="number" name="product_option[points][<?php echo $value->id; ?>][]" value="<?php echo $opt->points; ?>"  class="form-control">   
                  </td>
                 <td class="text-left"><button type="button" onclick="return confirm('Are you sure to remove this option permanentaly') && remove_option(<?php echo $opt->id; ?>);" data-toggle="tooltip" rel="tooltip" title="" class="btn btn-danger" data-original-title="Remove"><i class="fa fa-minus-circle"></i></button>
                 </td>
                </tr>

                  <?php } } ?>   

                   </tbody>
                          <tfoot>
                            <tr>
                              <td colspan="5"></td>
                              <td class="text-left"><button type="button" onclick="addOptionValue(<?php echo $value->id; ?>);" data-toggle="tooltip" title="Add Option Value" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>
                            </tr>
                          </tfoot>
                        </table>
                      </div>

                       <select id="option-values<?php echo $value->id; ?>" style="display: none;">
                      <?php if (!empty($option)) {foreach ($option as $key => $row) {?>
                      
                       <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
       
                    <?php } } ?>
                        </select>
                      </div>
                

                    <!-- end here -->
                  
              <!-- variant -->
              <?php  } elseif($value->option_id=='12'){?>
                 
            <div class="tab-pane" id="tab-option<?php echo $value->id; ?>">
            <input type="hidden" name="product_option[option_description_id][]" value="<?php echo $value->id; ?>" />
           
            <input type="hidden" name="product_option[option_old_des_id][]" value="<?php echo $value->id; ?>" />
             <input type="hidden" name="product_option[value][]" value=""  class="form-control">  
                                                   
            <div class="form-group">
              <label class="col-sm-2 control-label" for="input-required1">Required</label>
              <div class="col-sm-10">
                <select name="product_option[required][]" id="input-required1" class="form-control">
                  <option value="">select option</option>
                  <option value="1" <?php echo @$product_option->required==1?'selected':''; ?>>Yes</option>
                  <option value="0" <?php echo @$product_option->required==0?'selected':''; ?>>No</option>
                </select>
              </div>
            </div>
            <div class="table-responsive">
              <table id="option-value<?php echo $value->id; ?>" class="table table-striped table-bordered table-hover">
               <thead>
                  <tr>
                    <td class="text-left">variant Image</td>
                    <td class="text-left">Name</td>
                     <td class="text-left">Short Description</td>
                    <td class="text-left">Color/code</td>
                    <td class="text-right">Quantity</td>
                    <td class="text-left">Subtract Stock</td>
                    <td class="text-right">Price</td>
                    <td class="text-right">Sort Order</td>
                  <td></td>
                 </tr>
                </thead>
                <tbody>
           <?php 
           @$option_value = $this->AdminModel->all_fetch('product_option_value',array('product_option_id'=>$product_option->id),'id','asc');
           if (!empty($option_value)) {foreach ($option_value as $key => $opt) {?>
               
          <tr id="option-value-row<?php echo $opt->id; ?>"> 

            <input type="hidden" name="product_option[option_old_id][<?php echo $value->id; ?>][]" value="<?php echo  $opt->id;  ?>"> 

             <td class="text-left">
                <?php if (!empty($opt->image)): ?>
                  <img src="<?php echo base_url($opt->image); ?>" width="50" height="50">
                <?php endif ?>
                <input type="hidden" name="old_option_image[]" value="<?php echo $opt->image; ?>">
                  <input type="file" name="option_image[]" class="form-control">
              </td> 
              <td class="text-left">
                  <input type="text" name="product_option[name][<?php echo $value->id; ?>][]"  placeholder="Name" class="form-control" value="<?php echo $opt->name; ?>"> 
              </td> 
               <td class="text-left">
                  <input type="text" name="product_option[short_des][<?php echo $value->id; ?>][]"  placeholder="Short Description" class="form-control" value="<?php echo $opt->short_des; ?>"> 
              </td>
               <td class="text-left">
                  <input type="text" name="product_option[color][<?php echo $value->id; ?>][]" value="<?php echo $opt->color; ?>" placeholder="Color" class="form-control"> 
              </td> 
               <td class="text-left">
                  <input type="number" name="product_option[quantity][<?php echo $value->id; ?>][]" value="<?php echo $opt->quantity; ?>" placeholder="Quantity" class="form-control">
              </td> 

               <td class="text-left">
                    <select name="product_option[subtract][<?php echo $value->id; ?>][]" class="form-control">
                    <option value="1" <?php echo $opt->subtract?'selected':''; ?>>Yes</option>
                    <option value="0" <?php echo $opt->subtract==0?'selected':''; ?> >NO</option> 
                    </select>
              </td>
               <td class="text-right">
                      <select name="product_option[price_prefix][<?php echo $value->id; ?>][]" class="form-control"> 
                      <option value="+" <?php echo $opt->prefix=='+'?'selected':''; ?>>+</option> 
                      <option value="-" <?php echo $opt->prefix=='-'?'selected':''; ?>>-</option> 
                    </select>  
                     <input type="text" name="product_option[price][<?php echo $value->id; ?>][]" value="<?php echo $opt->price; ?>" placeholder="Price" class="form-control">
                 </td> 
              <td class="text-left">
                  <input type="number" name="product_option[sort_order][<?php echo $value->id; ?>][]" value="<?php echo $opt->sort_order; ?>"  class="form-control">   
              </td>
                 
                 <td class="text-left"><button type="button" onclick="return confirm('Are you sure to remove this option permanentaly') && remove_option1(<?php echo $opt->id; ?>);" data-toggle="tooltip" rel="tooltip" title="" class="btn btn-danger" data-original-title="Remove"><i class="fa fa-minus-circle"></i></button>
                 </td>

                </tr>

                  <?php } } ?>   

                   </tbody>
                          <tfoot>
                            <tr>
                              <td colspan="8"></td>
                              <td class="text-left"><button type="button" onclick="addOptionValue1(<?php echo $value->id; ?>);" data-toggle="tooltip" title="Add Option Value" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>
                            </tr>
                          </tfoot>
                        </table>
                      </div>

                       <select id="option-values<?php echo $value->id; ?>" style="display: none;">
                      <?php if (!empty($option)) {foreach ($option as $key => $row) {?>
                      
                       <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
       
                    <?php } } ?>
                        </select>
                      </div>
                

                    <!-- condition end here -->


              <?php }elseif ($value->option_id =='8') {?>
               <!-- for  date  form -->

            <div class="tab-pane" id="tab-option<?php echo $value->id; ?>">
  
             <input type="hidden" name="product_option[option_description_id][]" value="<?php echo $value->id; ?>" />
             <input type="hidden" name="product_option[option_old_des_id][]" value="<?php echo $value->id; ?>" />                     



              <div class="form-group">
              <label class="col-sm-2 control-label" for="input-required1">Required</label>
              <div class="col-sm-10">
                <select name="product_option[required][]" id="input-required1" class="form-control">
                  <option value="">select option</option>
                  <option value="1" <?php echo @$product_option->required==1?'selected':''; ?>>Yes</option>
                  <option value="0" <?php echo @$product_option->required==0?'selected':''; ?>>No</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label" for="input-value0">Option Value</label>
              <div class="col-sm-10">
                <div class="input-group datetime">
                  <input type="date" name="product_option[value][]" value="<?php echo $product_option->value; ?>" placeholder="Option Value"  class="form-control" />
                  
                </div>
              </div>
            </div>
          </div> 
           
          <!-- end textbox -->

             <?php }elseif ($value->option_id =='6') {?>
               <!-- for text box  -->

            <div class="tab-pane" id="tab-option<?php echo $value->id; ?>">
               <input type="hidden" name="product_option[option_description_id][]" value="<?php echo $value->id; ?>" />
             <input type="hidden" name="product_option[option_old_des_id][]" value="<?php echo $value->id; ?>" />                     



              <div class="form-group">
              <label class="col-sm-2 control-label" for="input-required1">Required</label>
              <div class="col-sm-10">
                <select name="product_option[required][]" id="input-required1" class="form-control">
                  <option value="">select option</option>
                  <option value="1" <?php echo @$product_option->required==1?'selected':''; ?>>Yes</option>
                  <option value="0" <?php echo @$product_option->required==0?'selected':''; ?>>No</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label" for="input-value0">Option Value</label>
              <div class="col-sm-10">
                <div class="input-group datetime">
                    <textarea rows="4" name="product_option[value][]" class="form-control" placeholder="Option value"><?php echo $product_option->value; ?>
                  </textarea>
                </div>
              </div>
            </div>
          </div> 
           
           <!-- end textbox -->


             <?php }elseif ($value->option_id =='4') {?>
               <!-- for text box  -->

            <div class="tab-pane" id="tab-option<?php echo $value->id; ?>">
  
             <input type="hidden" name="product_option[option_description_id][]" value="<?php echo $value->id; ?>" />
             <input type="hidden" name="product_option[option_old_des_id][]" value="<?php echo $value->id; ?>" />                     

              <div class="form-group">
              <label class="col-sm-2 control-label" for="input-required1">Required</label>
              <div class="col-sm-10">
                <select name="product_option[required][]" id="input-required1" class="form-control">
                  <option value="">select option</option>
                  <option value="1" <?php echo @$product_option->required==1?'selected':''; ?>>Yes</option>
                  <option value="0" <?php echo @$product_option->required==0?'selected':''; ?>>No</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label" for="input-value0">Option Value</label>
              <div class="col-sm-10">
                <div class="input-group datetime">
                  <input type="text" name="product_option[value][]" value="<?php echo $product_option->value; ?>" placeholder="Option Value"  class="form-control" />
                  
                </div>
              </div>
            </div>
          </div> 
           
             <!-- end text -->

       
             <?php }elseif ($value->option_id =='9') {?>
               <!-- for time box  -->

            <div class="tab-pane" id="tab-option<?php echo $value->id; ?>">
  
             <input type="hidden" name="product_option[option_description_id][]" value="<?php echo $value->id; ?>" />
             <input type="hidden" name="product_option[option_old_des_id][]" value="<?php echo $value->id; ?>" />                     

              <div class="form-group">
              <label class="col-sm-2 control-label" for="input-required1">Required</label>
              <div class="col-sm-10">
                <select name="product_option[required][]" id="input-required1" class="form-control">
                  <option value="">select option</option>
                  <option value="1" <?php echo @$product_option->required==1?'selected':''; ?>>Yes</option>
                  <option value="0" <?php echo @$product_option->required==0?'selected':''; ?>>No</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label" for="input-value0">Option Value</label>
              <div class="col-sm-10">
                <div class="input-group datetime">
                  <input type="time" name="product_option[value][]" value="<?php echo $product_option->value; ?>" placeholder="Option Value"  class="form-control" />
                  
                </div>
              </div>
            </div>
          </div> 
           
             <!-- end text -->

             <?php }elseif ($value->option_id =='7') {?>
               <!-- for file box  -->

            <div class="tab-pane" id="tab-option<?php echo $value->id; ?>">
  
             <input type="hidden" name="product_option[option_description_id][]" value="<?php echo $value->id; ?>" />
             <input type="hidden" name="product_option[option_old_des_id][]" value="<?php echo $value->id; ?>" />     

               <input type="hidden" name="product_option[value][]" value=""  class="form-control">                

              <div class="form-group">
              <label class="col-sm-2 control-label" for="input-required1">Required</label>
              <div class="col-sm-10">
                <select name="product_option[required][]" id="input-required1" class="form-control">
                  <option value="">select option</option>
                  <option value="1" <?php echo @$product_option->required==1?'selected':''; ?>>Yes</option>
                  <option value="0" <?php echo @$product_option->required==0?'selected':''; ?>>No</option>
                </select>
              </div>
            </div>

           
          </div> 
           
             <!-- end file -->

            <?php }elseif ($value->option_id =='10') {?>
               <!-- for date or time box  -->

            <div class="tab-pane" id="tab-option<?php echo $value->id; ?>">
  
             <input type="hidden" name="product_option[option_description_id][]" value="<?php echo $value->id; ?>" />
             <input type="hidden" name="product_option[option_old_des_id][]" value="<?php echo $value->id; ?>" />                     

              <div class="form-group">
              <label class="col-sm-2 control-label" for="input-required1">Required</label>
              <div class="col-sm-10">
                <select name="product_option[required][]" id="input-required1" class="form-control">
                  <option value="">select option</option>
                  <option value="1" <?php echo @$product_option->required==1?'selected':''; ?>>Yes</option>
                  <option value="0" <?php echo @$product_option->required==0?'selected':''; ?>>No</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label" for="input-value0">Option Date & Time</label>
              <div class="col-sm-10">
                <div class="input-group datetime">
               <input type="datetime-local" name="product_option[value][]" value="<?php echo $product_option->value; ?>" placeholder="Option Value"   class="form-control">
                </div>
              </div>
            </div>
          </div> 
           
             <!-- end file -->

            <?php } ?>






          <?php } } ?>
                 </div>
                </div>
              </div>
            </div>

<!-- end option -->

<!-- start varient -->

 <div class="tab-pane d-none" id="tab-varient">
  <div class="row">
    <div class="col-sm-12">
      <div class="tab-content">
       <div class="table-responsive">
        <table id="option-varient" class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <td class="text-left">variant Image</td>
              <td class="text-left">Name</td>
              <td class="text-left">Color/code</td>
              <td class="text-right">Quantity</td>
              <td class="text-left">Subtract Stock</td>
              <td class="text-right">Price</td>
                  <td class="text-right">Sort Order</td>
            <td></td>
           </tr>
          </thead>
         <tbody>
           
           <?php if (!empty($v_image)) {foreach ($v_image as $key => $value) {?>
                
              <tr id="option-varient-row<?php echo $value->id;?>"> 
              <input type="hidden" name="v_old_img[]" value="<?php echo $value->image; ?>">
              <input type="hidden" name="old_id[]"  value="<?php echo $value->id; ?>">
              <td class="text-left">
                <?php if (!empty($value->image)): ?>
                  <img src="<?php echo base_url($value->image); ?>" width="50" height="50">
                <?php endif ?>
                  <input type="file" name="v_img[]" class="form-control">
              </td> 
              <td class="text-left">
                  <input type="text" name="v_name[]"  placeholder="Name" class="form-control" value="<?php echo $value->name; ?>"> 
              </td> 
               <td class="text-left">
                  <input type="text" name="v_color[]" value="<?php echo $value->color; ?>" placeholder="Color" class="form-control"> 
              </td> 
               <td class="text-left">
                  <input type="text" name="v_quantity[]" value="<?php echo $value->quantity; ?>" placeholder="Quantity" class="form-control">
              </td> 

               <td class="text-left">
                    <select name="v_subtract[]" class="form-control">
                    <option value="1" <?php echo $value->subtract?'selected':''; ?>>Yes</option>
                    <option value="0" <?php echo $value->subtract==0?'selected':''; ?> >NO</option> 
                    </select>
              </td>
               <td class="text-right">
                      <select name="v_prefix[]" class="form-control"> 
                      <option value="+" <?php echo $value->prefix=='+'?'selected':''; ?>>+</option> 
                      <option value="-" <?php echo $value->prefix=='-'?'selected':''; ?>>-</option> 
                    </select>  
                     <input type="text" name="v_price[]" value="<?php echo $value->price; ?>" placeholder="Price" class="form-control">
                 </td> 
                  <td class="text-left">
                  <input type="number" name="v_sort[]" value="<?php echo $value->sort_order; ?>"  class="form-control">   
              </td>
                 <td class="text-left"><button type="button" onclick="return confirm('Are you sure to remove this option permanentaly') &amp;&amp; remove_varient(<?php echo $value->id; ?>);" data-toggle="tooltip" rel="tooltip" title="" class="btn btn-danger" data-original-title="Remove"><i class="fa fa-minus-circle"></i></button>
                 </td>
             </tr>

            

            <?php } } ?> 
           </tbody>
                <tfoot>
                  <tr>
                    <td colspan="7"></td>
                    <td class="text-left"><button type="button" onclick="addVarient();" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Add variant"><i class="fa fa-plus-circle"></i></button></td>
                  </tr>
                </tfoot>
              </table>
            </div>
                        
     </div>
  </div>
</div>
</div>



<!-- end varient -->


     
      <div class="tab-pane" id="tab-discount">
       <div class="table-responsive">
        <table id="discount" class="table table-striped table-bordered table-hover">
         <thead>
          <tr>
           <td class="text-left">Customer Group</td>
           <td class="text-right">Quantity</td>
           <td class="text-right">Priority</td>
           <td class="text-right">Price</td>
           <td class="text-left">Date Start</td>
           <td class="text-left">Date End</td>
           <td></td>
          </tr>
         </thead>
         <tbody>

        
  <?php if (!empty($discount)) {foreach ($discount as $key => $row) {?>
          
      <tr id="discount-row<?php echo $row->id; ?>">  
       <td class="text-left">
         <select name="discount_customer_group_id[]" class="form-control">
         <option value="1">Default</option>
         </select>
       </td> 
       <td class="text-right">
        <input type="number" name="discount_quantity[]" value="<?php echo $row->quantity; ?>" placeholder="Quantity" class="form-control">
        </td> 
       <td class="text-right">
        <input type="text" name="discount_priority[]" value="<?php echo $row->priority; ?>" placeholder="Priority" class="form-control">
        </td> 
         <td class="text-right">
          <input type="number" name="discount_price[]" value="<?php echo $row->price; ?>" placeholder="Price" class="form-control">
        </td>  
        <td class="text-left" style="width: 20%;">
          <div class="input-group date">
            <input type="text" name="discount_date_start[]" value="<?php echo $row->date_start; ?>" placeholder="Date Start" data-date-format="YYYY-MM-DD" class="form-control"><span class="input-group-btn"><button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button></span></div>
          </td> 
           <td class="text-left" style="width: 20%;"><div class="input-group date"><input type="text" name="discount_date_end[]" value="<?php echo $row->date_end; ?>" placeholder="Date End" data-date-format="YYYY-MM-DD" class="form-control"><span class="input-group-btn"><button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button></span></div>
           </td>
           <td class="text-left"><button type="button" onclick="$('#discount-row<?php echo $row->id; ?>').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
           </td>
         </tr>
      </tbody>

    <?php } } ?>



      <tfoot>
          <tr>
           <td colspan="6"></td>
           <td class="text-left">
            <button type="button" onclick="addDiscount();" data-toggle="tooltip" title="Add Discount" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button>
           </td>
          </tr>
         </tfoot>
        </table>
       </div>
      </div>


      <div class="tab-pane d-none" id="tab-special">
       <div class="table-responsive">
        <table id="special" class="table table-striped table-bordered table-hover">
         <thead>
          <tr>
           <td class="text-left">Customer Group</td>
           <td class="text-right">Priority</td>
           <td class="text-right">Price</td>
           <td class="text-left">Date Start</td>
           <td class="text-left">Date End</td>
           <td></td>
          </tr>
         </thead>
         <tbody>
         <?php if (!empty($special)){ foreach ($special as $key => $row) {?>
         
         <tr id="special-row<?php  echo $row->id; ?>">  
         <td class="text-left">
          <select name="customer_group_id[]" class="form-control">  
          <option value="1">Default</option> 
         </select>
       </td>  
       <td class="text-right"><input type="text" name="special_priority[]" value="<?php  echo $row->priority; ?>" placeholder="Priority" class="form-control">
       </td> 
        <td class="text-right"><input type="number" name="special_price[]" value="<?php  echo $row->price; ?>" placeholder="Price" class="form-control">
        </td> 
         <td class="text-left" style="width: 20%;">
          <div class="input-group date"><input type="text" name="special_date_start[]" value="<?php  echo $row->date_start; ?>" placeholder="Date Start" data-date-format="YYYY-MM-DD" class="form-control"><span class="input-group-btn"><button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button></span>
          </div>
        </td> 
         <td class="text-left" style="width: 20%;"><div class="input-group date"><input type="text" name="special_date_end[]" value="<?php  echo $row->date_end; ?>" placeholder="Date End" data-date-format="YYYY-MM-DD" class="form-control"><span class="input-group-btn"><button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button></span>
         </div>
       </td>  
       <td class="text-left"><button type="button" onclick="$('#special-row<?php  echo $row->id; ?>').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
       </td>
     </tr>  



        <?php } } ?>  



         </tbody>

         <tfoot>
          <tr>
           <td colspan="5"></td>
           <td class="text-left">
            <button type="button" onclick="addSpecial();" data-toggle="tooltip" title="Add Special" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button>
           </td>
          </tr>
         </tfoot>
        </table>
       </div>
      </div>
      <div class="tab-pane" id="tab-image">
       <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
         <thead>
          <tr>
           <td class="text-left">Product Thumbnail Image</td>
            <!-- <td class="text-left">Product Strip Image</td>
              <td class="text-left">Product Specification Image</td> -->
              <!-- <td class="text-left">Product video (Youtube link) https://www.youtube.com/watch?v=qx7KlthbXvk </td> -->
          </tr>

         </thead>
         <tbody>
          <tr>
           <td class="text-left">
            <?php if ($image): ?>
              <img src="<?php echo base_url($image); ?>" width="100" height="100">
            <?php endif ?>
           <input type="file" name="image" class="form-control">
            
           </td>
          
             
           <!-- <td class="text-left">
            <?php if ($strip_img): ?>
              <img src="<?php echo base_url($strip_img); ?>" width="100" height="100">
            <?php endif ?>
           <input type="file" name="strip_img" class="form-control">
            
           </td>
             <td class="text-left">
            <?php if ($s_img): ?>
              <img src="<?php echo base_url($s_img); ?>" width="100" height="100">
            <?php endif ?>
           <input type="file" name="s_img" class="form-control">
            
           </td>

           <td class="text-left">
            <?php if ($p_video){ $channel_id = substr($p_video,-11); ?>
             <iframe width="150" height="100" src="https://www.youtube.com/embed/<?php echo $channel_id; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <?php } ?>
           <input type="text" name="p_video" class="form-control" value="<?php echo $p_video; ?>">
            
           </td> -->

          </tr>
         </tbody>
        </table>
       </div>
       <div class="table-responsive">
        <table id="images" class="table table-striped table-bordered table-hover">
         <thead>
          <tr>
           <td class="text-left">Product Additional Images</td>
           <!-- <td class="text-left">Variant(option)</td> -->
           <td class="text-right">Sort Order</td>
           <td></td>
          </tr>
         </thead>
         <tbody>
           
          <?php if (!empty($product_image)){foreach ($product_image as $key => $row) {?>
          
        <tr id="image-row<?php echo $row->id; ?>">
         <td class="text-left">
          <?php if ($row->image): ?>
            <img src="<?php echo base_url($row->image); ?>" width="100" height="100">
          <?php endif ?>
          <input type="file" name="product_image[]" value="" id="input-image0" class="form-control">
          <input type="hidden" name="old_product_image[]" value="<?php echo $row->image; ?>">
          <input type="hidden" name="image_id[]" value="<?php echo $row->id; ?>">
        </td>  

          <!-- <td class="text-right">
         <select name="product_vaiant[]" class="form-control">
           <option value="">Default</option>
           <?php foreach ($option_value as $key => $value): ?>
              <option value="<?php echo $value->id; ?>" <?php echo $value->id==$row->variant_id?'selected':''; ?>><?php echo $value->name; ?></option>
           <?php endforeach ?>
      
         </select>
        </td>   -->

        <td class="text-right">
          <input type="text" name="image_sort_order[]" value="<?php echo $row->sort_order; ?>" placeholder="Sort Order" class="form-control">
        </td>  
        <td class="text-left">
          <button type="button" onclick="$('#image-row<?php echo $row->id; ?>').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
        </td>
      </tr>
            
          <?php } } ?>
         </tbody>

         <tfoot>
          <tr>
           <td colspan="2"></td>
           <td class="text-left">
            <button type="button" onclick="addImage();" data-toggle="tooltip" title="Add Image" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button>
           </td>
          </tr>
         </tfoot>
        </table>
       </div>

        <select id="product-variant" style="display: none;">
          <option value="">Default</option>
          <?php if (!empty($option_value)) {foreach ($option_value as $key => $row) {?>
           <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
        <?php } } ?>
        </select>


      </div>
      <div class="tab-pane" id="tab-reward">
       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-points"><span data-toggle="tooltip" title="Number of points needed to buy this item. If you don't want this product to be purchased with points leave as 0.">Points</span></label>
        <div class="col-sm-10">
         <input type="text" name="points" value="<?php echo $points?$points:''; ?>" placeholder="Points" id="input-points" class="form-control" />
        </div>
       </div>
       <div class="table-responsive">
        <table class="table table-bordered table-hover">
         <thead>
          <tr>
           <td class="text-left">Customer Group</td>
           <td class="text-right">Reward Points</td>
          </tr>
         </thead>
         <tbody>
          <tr>
           <td class="text-left">Default</td>
           <td class="text-right"><input type="text" name="product_reward" value="<?php echo $product_reward?$product_reward:''; ?>" class="form-control" /></td>
          </tr>
         </tbody>
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
             <input type="text" name="product_seo_url" value="<?php echo $product_seo_url?$product_seo_url:''; ?>" placeholder="Keyword" class="form-control" />
            </div>
           </td>
          </tr>
         </tbody>
        </table>
       </div>
      </div>
       
      <div class="tab-pane" id="tab-design">
    
       <div class="table-responsive">
        <table id="ingredient" class="table table-striped table-bordered table-hover">
         <thead>
          <tr>
           <td class="text-left">Images</td>
           <td class="text-left">Title </td>
           <td class="text-left">Sub Heading </td>
           <td class="text-left">Background Color</td>
           <td class="text-left">Text Color(Optional)</td>
           <td class="text-left">Img Position</td>
           <td class="text-left">Text Position</td>
           <td class="text-left">Feature</td>
           <td class="text-right">Sort Order</td>
           <td></td>
          </tr>
         </thead>
         <tbody>
           
          <?php if (!empty($ing_image)){foreach ($ing_image as $key => $row) {?>
          
        <tr id="image-ing<?php echo $row->id; ?>">
         <td class="text-left">
          <?php if ($row->image): ?>
            <img src="<?php echo base_url($row->image); ?>" width="100" height="100">
          <?php endif ?>
          <input type="file" name="ing_image[]" value="" id="input-image0" class="form-control">
          <input type="hidden" name="old_ing_image[]" value="<?php echo $row->image; ?>">
       
        </td>  
         <td class="text-right">

          <input type="text" name="ing_title[]" value="<?php echo $row->title; ?>" placeholder="Title" class="form-control">
        </td>
          <td class="text-right">
          <input type="text" name="ing_sub_heading[]" value="<?php echo $row->sub_heading; ?>" placeholder="Title" class="form-control">
        </td>  
          
        <td class="text-right">
          <input type="color" name="bg_color[]" value="<?php echo $row->bg_color; ?>" placeholder="Background color" class="form-control">
        </td> 

         <td class="text-right">
          <input type="color" name="text_color[]" value="<?php echo $row->text_color; ?>" class="form-control">
        </td> 

        <td class="text-right">
          <select class="form-control" name="img_position[]" style="padding: 0px;">
            <option value="1" <?php echo $row->img_position==1?'selected':'' ;?>>Left</option>
            <option value="2" <?php echo $row->img_position==2?'selected':'' ;?>>Right</option>
          </select>
         
        </td>  

        <td class="text-right">
          <select class="form-control" name="text_position[]" style="padding: 0px;">
            <option value="1" <?php echo $row->text_position==1?'selected':'' ;?>>Left</option>
            <option value="2" <?php echo $row->text_position==2?'selected':'' ;?>>Right</option>
          </select>
         
        </td>  

        <td class="text-right">
        
         <input type="checkbox" name="full_bg[<?php echo $key; ?>]]" value="1" <?php echo $row->full_bg?'checked':''; ?>>&nbsp; Full Background (Image)
         
        </td>  

        <td class="text-right">
          <input type="number" name="ing_sort_order[]" value="<?php echo $row->sort_order; ?>" placeholder="Sort Order" class="form-control">
        </td> 

        <td class="text-left">
          <button type="button" onclick="$('#image-ing<?php echo $row->id; ?>').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
        </td>
      </tr>
            
          <?php } } ?>
         </tbody>

         <tfoot>
          <tr>
           <td colspan="9"></td>
           <td class="text-left">
            <button type="button" onclick="addingredient();" data-toggle="tooltip" title="Add Ingredient Image" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button>
           </td>
          </tr>
         </tfoot>
        </table>
       </div>
      </div>

     </div>
    </form>
   </div>
  </div>
 </div>
 <link href="<?php echo base_url('assets/backend/'); ?>javascript/codemirror/lib/codemirror.css" rel="stylesheet" />
 <link href="<?php echo base_url('assets/backend/'); ?>javascript/codemirror/theme/monokai.css" rel="stylesheet" />
 <script type="text/javascript" src="<?php echo base_url('assets/backend/'); ?>javascript/codemirror/lib/codemirror.js"></script>
 <script type="text/javascript" src="<?php echo base_url('assets/backend/'); ?>javascript/codemirror/lib/xml.js"></script>
 <script type="text/javascript" src="<?php echo base_url('assets/backend/'); ?>javascript/codemirror/lib/formatting.js"></script>
 <script type="text/javascript" src="<?php echo base_url('assets/backend/'); ?>javascript/summernote/summernote.js"></script>
 <link href="<?php echo base_url('assets/backend/'); ?>javascript/summernote/summernote.css" rel="stylesheet" />
 <script type="text/javascript" src="<?php echo base_url('assets/backend/'); ?>javascript/summernote/summernote-image-attributes.js"></script>
 <script type="text/javascript" src="<?php echo base_url('assets/backend/'); ?>javascript/summernote/opencart.js"></script>



<script type="text/javascript">
// attribute block
  var attribute_row = 0;

  function addAttribute() {
      html  = '<tr id="attribute-row' + attribute_row + '">';
   
 

    html += '  <td class="text-left" style="width: 20%;"><select name="attribute_id[]" class="form-control" required>';
    html += $('#option-attribute').html();
    html += '  </select></td>';
   

    html += '  <td class="text-left">';
      html += '<div class="input-group"><textarea name="attribute_text[]" rows="5" placeholder="Text" class="form-control"></textarea></div>';
        html += '  </td>';
    html += '  <td class="text-right"><button type="button" onclick="$(\'#attribute-row' + attribute_row + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
      html += '</tr>';

    $('#attribute tbody').append(html);

    // attributeautocomplete(attribute_row);

    attribute_row++;
  }

</script>



 <script type="text/javascript">
  <!--
  var option_row = 0;

  $('input[name=\'option\']').autocomplete({
    'source': function(request, response) {
      $.ajax({
        url: 'index.php?route=catalog/option/autocomplete&user_token=SiEdwcWXTO6jCPS733fH6AKhH2QFeIfp&filter_name=' +  encodeURIComponent(request),
        dataType: 'json',
        success: function(json) {
          response($.map(json, function(item) {
            return {
              category: item['category'],
              label: item['name'],
              value: item['option_id'],
              type: item['type'],
              option_value: item['option_value']
            }
          }));
        }
      });
    },
    'select': function(item) {
      html  = '<div class="tab-pane" id="tab-option' + option_row + '">';
      html += ' <input type="hidden" name="product_option[' + option_row + '][product_option_id]" value="" />';
      html += ' <input type="hidden" name="product_option[' + option_row + '][name]" value="' + item['label'] + '" />';
      html += ' <input type="hidden" name="product_option[' + option_row + '][option_id]" value="' + item['value'] + '" />';
      html += ' <input type="hidden" name="product_option[' + option_row + '][type]" value="' + item['type'] + '" />';

      html += ' <div class="form-group">';
      html += '   <label class="col-sm-2 control-label" for="input-required' + option_row + '">Required</label>';
      html += '   <div class="col-sm-10"><select name="product_option[' + option_row + '][required]" id="input-required' + option_row + '" class="form-control">';
      html += '       <option value="1">Yes</option>';
      html += '       <option value="0">No</option>';
      html += '   </select></div>';
      html += ' </div>';

      if (item['type'] == 'text') {
        html += ' <div class="form-group">';
        html += '   <label class="col-sm-2 control-label" for="input-value' + option_row + '">Option Value</label>';
        html += '   <div class="col-sm-10"><input type="text" name="product_option[' + option_row + '][value]" value="" placeholder="Option Value" id="input-value' + option_row + '" class="form-control" /></div>';
        html += ' </div>';
      }

      if (item['type'] == 'textarea') {
        html += ' <div class="form-group">';
        html += '   <label class="col-sm-2 control-label" for="input-value' + option_row + '">Option Value</label>';
        html += '   <div class="col-sm-10"><textarea name="product_option[' + option_row + '][value]" rows="5" placeholder="Option Value" id="input-value' + option_row + '" class="form-control"></textarea></div>';
        html += ' </div>';
      }

      if (item['type'] == 'file') {
        html += ' <div class="form-group" style="display: none;">';
        html += '   <label class="col-sm-2 control-label" for="input-value' + option_row + '">Option Value</label>';
        html += '   <div class="col-sm-10"><input type="text" name="product_option[' + option_row + '][value]" value="" placeholder="Option Value" id="input-value' + option_row + '" class="form-control" /></div>';
        html += ' </div>';
      }

      if (item['type'] == 'date') {
        html += ' <div class="form-group">';
        html += '   <label class="col-sm-2 control-label" for="input-value' + option_row + '">Option Value</label>';
        html += '   <div class="col-sm-3"><div class="input-group date"><input type="text" name="product_option[' + option_row + '][value]" value="" placeholder="Option Value" data-date-format="YYYY-MM-DD" id="input-value' + option_row + '" class="form-control" /><span class="input-group-btn"><button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button></span></div></div>';
        html += ' </div>';
      }

      if (item['type'] == 'time') {
        html += ' <div class="form-group">';
        html += '   <label class="col-sm-2 control-label" for="input-value' + option_row + '">Option Value</label>';
        html += '   <div class="col-sm-10"><div class="input-group time"><input type="text" name="product_option[' + option_row + '][value]" value="" placeholder="Option Value" data-date-format="HH:mm" id="input-value' + option_row + '" class="form-control" /><span class="input-group-btn"><button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button></span></div></div>';
        html += ' </div>';
      }

      if (item['type'] == 'datetime') {
        html += ' <div class="form-group">';
        html += '   <label class="col-sm-2 control-label" for="input-value' + option_row + '">Option Value</label>';
        html += '   <div class="col-sm-10"><div class="input-group datetime"><input type="text" name="product_option[' + option_row + '][value]" value="" placeholder="Option Value" data-date-format="YYYY-MM-DD HH:mm" id="input-value' + option_row + '" class="form-control" /><span class="input-group-btn"><button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button></span></div></div>';
        html += ' </div>';
      }

      if (item['type'] == 'select' || item['type'] == 'radio' || item['type'] == 'checkbox' || item['type'] == 'image') {
        html += '<div class="table-responsive">';
        html += '  <table id="option-value' + option_row + '" class="table table-striped table-bordered table-hover">';
        html += '    <thead>';
        html += '      <tr>';
        html += '        <td class="text-left">Option Value</td>';
        html += '        <td class="text-right">Quantity</td>';
        html += '        <td class="text-left">Subtract Stock</td>';
        html += '        <td class="text-right">Price</td>';
        html += '        <td class="text-right">Points</td>';
        html += '        <td class="text-right">Weight</td>';
        html += '        <td></td>';
        html += '      </tr>';
        html += '    </thead>';
        html += '    <tbody>';
        html += '    </tbody>';
        html += '    <tfoot>';
        html += '      <tr>';
        html += '        <td colspan="6"></td>';
        html += '        <td class="text-left"><button type="button" onclick="addOptionValue(' + option_row + ');" data-toggle="tooltip" title="Add Option Value" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>';
        html += '      </tr>';
        html += '    </tfoot>';
        html += '  </table>';
        html += '</div>';

              html += '  <select id="option-values' + option_row + '" style="display: none;">';

              for (i = 0; i < item['option_value'].length; i++) {
          html += '  <option value="' + item['option_value'][i]['option_value_id'] + '">' + item['option_value'][i]['name'] + '</option>';
              }

              html += '  </select>';
        html += '</div>';
      }

      $('#tab-option .tab-content').append(html);

      $('#option > li:last-child').before('<li><a href="#tab-option' + option_row + '" data-toggle="tab"><i class="fa fa-minus-circle" onclick=" $(\'#option a:first\').tab(\'show\');$(\'a[href=\\\'#tab-option' + option_row + '\\\']\').parent().remove(); $(\'#tab-option' + option_row + '\').remove();"></i>' + item['label'] + '</li>');

      $('#option a[href=\'#tab-option' + option_row + '\']').tab('show');

      $('[data-toggle=\'tooltip\']').tooltip({
        container: 'body',
        html: true
      });

      $('.date').datetimepicker({
        language: 'en-gb',
        pickTime: false
      });

      $('.time').datetimepicker({
        language: 'en-gb',
        pickDate: false
      });

      $('.datetime').datetimepicker({
        language: 'en-gb',
        pickDate: true,
        pickTime: true
      });

      option_row++;
    }
  });
  //-->
 </script>


<!-- option start -->
 <script type="text/javascript">

// function get_option(option_id){
//   $('#tab-option'+option_id).show();

// }


  var option_value_row = 0;
  function addOptionValue(option_row) {

    html  = '<tr id="option-value-row' + option_value_row + '">';
   
    html += '  <td class="text-left"><select name="product_option[option_value_id]['+option_row+'][]" class="form-control" required>';
    html += $('#option-values' + option_row).html();
    html += '  </select></td>';
       html += ' <td class="text-left"> <input type="number" name="product_option[quantity]['+option_row+'][]"  placeholder="Quantity" class="form-control"> </td> ';
    html += ' <td class="text-left"> <select name="product_option[subtract]['+option_row+'][]" class="form-control"> <option value="1">Yes</option> <option value="0">NO</option> </select> </td>';    
 
    html += '  <td class="text-right"><select name="product_option[price_prefix]['+option_row+'][]" class="form-control">';
    html += '    <option value="+">+</option>';
    html += '    <option value="-">-</option>';
    html += '  </select>';
    html += '  <input type="text" name="product_option[price]['+option_row+'][]" value="" placeholder="Price" class="form-control" /></td>';

   html += ' <td class="text-left"> <input type="number" name="product_option[points]['+option_row+'][]"   class="form-control"> </td> ';

    html += '  <td class="text-left"><button type="button" onclick="$(this).tooltip(\'destroy\');$(\'#option-value-row' + option_value_row + '\').remove();" data-toggle="tooltip" rel="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
    html += '</tr>';

    $('#option-value' + option_row + ' tbody').append(html);
    $('[rel=tooltip]').tooltip();

    option_value_row++;
  }


function remove_option(id){
if (id) {
  $.ajax({
    url:"<?php echo base_url('admin/catalog/remove_product_option_value'); ?>",
    type:"POST",
    data:{id:id,token:$('input[name="token"]').val()},
    success:function(data){
      var obj = JSON.parse(data);
        if (obj.status==1) {
          $('input[name="token"]').val(obj.token);
          $('tr#option-value-row'+id).remove();
        }else{  
           $('input[name="token"]').val(obj.token);
           toastr.error(obj.msg);
        }
      }
  });
 }
}





  var option_value_row = 0;
  function addOptionValue1(option_row) {

    html  = '<tr id="option-value-row' + option_value_row + '">';
   
    html += '<td class="text-left"> <input type="file" name="option_image[]" class="form-control"> </td>';
     html += '<td class="text-left"> <input type="text" name="product_option[name]['+option_row+'][]" value="" placeholder="Name" class="form-control"> </td> ';

   html += '<td class="text-left"> <input type="text" name="product_option[short_des]['+option_row+'][]"  placeholder="Short Descritpion" class="form-control"> </td> ';
   html += ' <td class="text-left"> <input type="text" name="product_option[color]['+option_row+'][]" value="" placeholder="Color" class="form-control"> </td>';
     html += ' <td class="text-left"> <input type="number" name="product_option[quantity]['+option_row+'][]"  placeholder="Quantity" class="form-control"> </td> ';
  

     html += ' <td class="text-left"> <select name="product_option[subtract]['+option_row+'][]" class="form-control"> <option value="1">Yes</option> <option value="0">NO</option> </select> </td>';

      html += '<td class="text-right"> <select name="product_option[price_prefix]['+option_row+'][]" class="form-control"> <option value="+" selected="">+</option> <option value="-">-</option> </select> <input type="text" name="product_option[price]['+option_row+'][]" value="" placeholder="Price" class="form-control"> </td> ';

    html += ' <td class="text-left"> <input type="number" name="product_option[sort_order]['+option_row+'][]" value="" class="form-control"> </td> ';

    html += '  <td class="text-left"><button type="button" onclick="$(this).tooltip(\'destroy\');$(\'#option-value-row' + option_value_row + '\').remove();" data-toggle="tooltip" rel="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
    html += '</tr>';

    $('#option-value' + option_row + ' tbody').append(html);
    $('[rel=tooltip]').tooltip();

    option_value_row++;
  }


function remove_option1(id){
if (id) {
  $.ajax({
    url:"<?php echo base_url('admin/catalog/remove_product_option_value'); ?>",
    type:"POST",
    data:{id:id,token:$('input[name="token"]').val()},
    success:function(data){
      var obj = JSON.parse(data);
        if (obj.status==1) {
          $('input[name="token"]').val(obj.token);
          $('tr#option-value-row'+id).remove();
        }else{  
           $('input[name="token"]').val(obj.token);
           toastr.error(obj.msg);
        }
      }
  });
 }
}


 </script>









<!-- varient start-->
<script type="text/javascript">
  
    var option_varient_row = 0;

  function addVarient(option_row) {

    html  = '<tr id="option-varient-row' + option_varient_row + '">';

    html += '<td class="text-left"> <input type="file" name="v_img[]" class="form-control"> </td>';
     html += '<td class="text-left"> <input type="text" name="v_name[]" value="" placeholder="Name" class="form-control"> </td> ';
   html += ' <td class="text-left"> <input type="text" name="v_color[]" value="" placeholder="Color" class="form-control"> </td>';
     html += ' <td class="text-left"> <input type="text" name="v_quantity[]" value="" placeholder="Quantity" class="form-control"> </td> ';
  

     html += ' <td class="text-left"> <select name="v_subtract[]" class="form-control"> <option value="1">Yes</option> <option value="0">NO</option> </select> </td>';

      html += '<td class="text-right"> <select name="v_prefix[]" class="form-control"> <option value="+" selected="">+</option> <option value="-">-</option> </select> <input type="text" name="v_price[]" value="" placeholder="Price" class="form-control"> </td> ';

    html += ' <td class="text-left"> <input type="number" name="v_sort[]" value="" class="form-control"> </td> ';
    
    html += '  <td class="text-left"><button type="button" onclick="$(this).tooltip(\'destroy\');$(\'#option-varient-row' + option_varient_row + '\').remove();" data-toggle="tooltip" rel="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
    html += '</tr>';

    $('#option-varient tbody').append(html);
    $('[rel=tooltip]').tooltip();

    option_varient_row++;
  }

function remove_varient(id){
if (id) {
  $.ajax({
    url:"<?php echo base_url('admin/catalog/remove_product_varient'); ?>",
    type:"POST",
    data:{id:id},
    success:function(data){
      var obj = JSON.parse(data);
        if (obj.status==1) {
        
          $('tr#option-varient-row'+id).remove();
        }else{  
           toastr.error(obj.msg);
        }
      }
  });
 }
}
</script>

<!-- end varient -->






 <script type="text/javascript">
  <!--
  var discount_row = 0;

  function addDiscount() {
    html  = '<tr id="discount-row' + discount_row + '">';
      html += '  <td class="text-left"><select name="discount_customer_group_id[]" class="form-control">';
          html += '    <option value="1">Default</option>';
          html += '  </select></td>';
      html += '  <td class="text-right"><input type="text" name="discount_quantity[]" value="" placeholder="Quantity" class="form-control" /></td>';
      html += '  <td class="text-right"><input type="text" name="discount_priority[]" value="" placeholder="Priority" class="form-control" /></td>';
    html += '  <td class="text-right"><input type="number" name="discount_price[]" value="" placeholder="Price" class="form-control" /></td>';
      html += '  <td class="text-left" style="width: 20%;"><div class="input-group date"><input type="text" name="discount_date_start[]" value="" placeholder="Date Start" data-date-format="YYYY-MM-DD" class="form-control" /><span class="input-group-btn"><button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button></span></div></td>';
    html += '  <td class="text-left" style="width: 20%;"><div class="input-group date"><input type="text" name="discount_date_end[]" value="" placeholder="Date End" data-date-format="YYYY-MM-DD" class="form-control" /><span class="input-group-btn"><button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button></span></div></td>';
    html += '  <td class="text-left"><button type="button" onclick="$(\'#discount-row' + discount_row + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
    html += '</tr>';

    $('#discount tbody').append(html);

    $('.date').datetimepicker({
      pickTime: false
    });

    discount_row++;
  }
  //-->
 </script>
 <script type="text/javascript">
  <!--
  var special_row = 0;

  function addSpecial() {
    html  = '<tr id="special-row' + special_row + '">';
      html += '  <td class="text-left"><select name="customer_group_id[]" class="form-control">';
          html += '      <option value="1">Default</option>';
          html += '  </select></td>';
      html += '  <td class="text-right"><input type="text" name="special_priority[]" value="" placeholder="Priority" class="form-control" /></td>';
    html += '  <td class="text-right"><input type="number" name="special_price[]" value="" placeholder="Price" class="form-control" /></td>';
      html += '  <td class="text-left" style="width: 20%;"><div class="input-group date"><input type="text" name="special_date_start[]" value="" placeholder="Date Start" data-date-format="YYYY-MM-DD" class="form-control" /><span class="input-group-btn"><button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button></span></div></td>';
    html += '  <td class="text-left" style="width: 20%;"><div class="input-group date"><input type="text" name="special_date_end[]" value="" placeholder="Date End" data-date-format="YYYY-MM-DD" class="form-control" /><span class="input-group-btn"><button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button></span></div></td>';
    html += '  <td class="text-left"><button type="button" onclick="$(\'#special-row' + special_row + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
    html += '</tr>';

    $('#special tbody').append(html);

    $('.date').datetimepicker({
      language: 'en-gb',
      pickTime: false
    });

    special_row++;
  }
  //-->
 </script>
 <script type="text/javascript">
  <!--
  var image_row = 0;

  function addImage() {
    html  = '<tr id="image-row' + image_row + '">';
    html += '  <td class="text-left"><input type="file" name="product_image[]" value="" id="input-image' + image_row + '" class="form-control" /></td>';
   
    
    // html += '  <td class="text-left"><select name="product_vaiant[]" class="form-control" >';
    // html += $('#product-variant').html();
    // html += '  </select></td>';

    html += '  <td class="text-right"><input type="number" name="image_sort_order[]" value="1" placeholder="Sort Order" class="form-control" required /></td>';
    html += '  <td class="text-left"><button type="button" onclick="$(\'#image-row' + image_row  + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
    html += '</tr>';

    $('#images tbody').append(html);
    image_row++;

  }
  //-->

// add ingrdeitns

  var room = 0;

  function addingredient() {
    html  = '<tr id="image-ing' + room + '">';
    html += '  <td class="text-left"><input type="file" name="ing_image[]" value="" id="input-ing' + room + '" class="form-control" /></td>';
     html += '  <td class="text-right"><input type="text" name="ing_title[]" value="" placeholder="Title" class="form-control" /></td>';

     html += '  <td class="text-right"><input type="text" name="ing_sub_heading[]" value="" placeholder="Descritpion" class="form-control" /></td>';
 
    html += '  <td class="text-right"><input type="color" name="bg_color[]" class="form-control" /></td>';
     html += '  <td class="text-right"><input type="color" name="text_color[]" class="form-control" /></td>';


   html +='<td class="text-right"> <select class="form-control" name="text_position[]" style="padding: 0px;"> <option value="1" >Left</option> <option value="2" >Right</option> </select> </td> ';

    html +='<td class="text-right"> <select class="form-control" name="text_position[]" style="padding: 0px;"> <option value="1" >Left</option> <option value="2" >Right</option> </select> </td> ';

     html +=' <td class="text-right"><input type="checkbox" name="full_bg[]" value="1">&nbsp; Full Background (Image) </td> ';

    html += '  <td class="text-right"><input type="number" name="ing_sort_order[]" placeholder="Sort Order" value="1" class="form-control" required /></td>';
    html += '  <td class="text-left"><button type="button" onclick="$(\'#image-ing' + room  + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
    html += '</tr>';

    $('#ingredient tbody').append(html);
    room++;

  }
  //-->



 </script>
 <script type="text/javascript">
  <!--
  var recurring_row = 0;

  function addRecurring() {
    html  = '<tr id="recurring-row' + recurring_row + '">';
    html += '  <td class="left">';
    html += '    <select name="product_recurring[' + recurring_row + '][recurring_id]" class="form-control">>';
      html += '    </select>';
    html += '  </td>';
    html += '  <td class="left">';
    html += '    <select name="product_recurring[' + recurring_row + '][customer_group_id]" class="form-control">>';
      html += '      <option value="1">Default</option>';
      html += '    <select>';
    html += '  </td>';
    html += '  <td class="left">';
    html += '    <a onclick="$(\'#recurring-row' + recurring_row + '\').remove()" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></a>';
    html += '  </td>';
    html += '</tr>';

    $('#tab-recurring table tbody').append(html);

    recurring_row++;
  }
  //-->
 </script>
 <script type="text/javascript">
  <!--
  $('.date').datetimepicker({
    language: 'en-gb',
    pickTime: false
  });

  $('.time').datetimepicker({
    language: 'en-gb',
    pickDate: false
  });

  $('.datetime').datetimepicker({
    language: 'en-gb',
    pickDate: true,
    pickTime: true
  });
  //-->
 </script>
 <script type="text/javascript">
  <!--
  $('#language a:first').tab('show');
  $('#option a:first').tab('show');
  //-->

$('input[name="best_seller"]').on('click',function(){
  $('#best_seller_img').show();
});

 </script>

</div>

<?php echo $this->endSection();?>