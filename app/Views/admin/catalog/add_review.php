<div id="content">
 <div class="page-header">
  <div class="container-fluid">
   <div class="pull-right">
    <button type="submit" form="form-review" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa fa-save"></i></button>
    <a href="<?php echo base_url('admin/reviews'); ?>" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a>
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

    <h3 class="panel-title"><i class="fa fa-pencil"></i> Add Review</h3>
   </div>
   <div class="panel-body">
    
    <?php echo form_open_multipart($form_action,'id="form-review" class="form-horizontal"'); ?>  
      
     <div class="form-group required">
      <label class="col-sm-2 control-label" for="input-author">Author</label>
      <div class="col-sm-10">
       <input type="text" name="author" value="<?php echo set_value('author',$author); ?>" placeholder="Author" id="input-author" class="form-control" />
      </div>
     </div>

       <div class="form-group ">
      <label class="col-sm-2 control-label" for="input-author">Designation</label>
      <div class="col-sm-10">
       <input type="text" name="designation" value="<?php echo set_value('designation',$designation); ?>" placeholder="Author" id="input-author" class="form-control" />
      </div>
     </div>
      <div class="form-group ">
      <label class="col-sm-2 control-label" for="input-author">Author Image</label>
      <div class="col-sm-10">
          <?php if ($image): ?>
            <img src="<?php echo base_url($image); ?>" width="100" height="100">
          <?php endif ?>
       <input type="file" name="image" class="form-control" />
      </div>
     </div>
     
     <div class="form-group required">
      <label class="col-sm-2 control-label" for="input-product"><span data-toggle="tooltip" title="(Autocomplete)">Product</span></label>
      <div class="col-sm-10">

        <select name="product_id" id="input-product" class="form-control">

          <option>select product</option>
          <?php foreach ($product_list as $key => $value): ?>
          <option value="<?php echo $value->id; ?>" <?php echo $product_id==$value->id?'selected':''; ?>><?php echo $value->name; ?></option>
          <?php endforeach ?>
        </select>
           
      </div>
     </div>
     <div class="form-group required">
      <label class="col-sm-2 control-label" for="input-text">Text</label>
      <div class="col-sm-10">
       <textarea name="text" cols="60" rows="8" placeholder="Text" id="input-text" class="form-control"><?php echo set_value('text',$text); ?></textarea>
      </div>
     </div>
     <div class="form-group required">
      <label class="col-sm-2 control-label" for="input-name">Rating</label>
      <div class="col-sm-10">
       <label class="radio-inline">
        <input type="radio" name="rating" value="1" <?php echo $rating==1?'checked':''; ?> />
        1
       </label>
       <label class="radio-inline">
        <input type="radio" name="rating" value="2" <?php echo $rating==2?'checked':''; ?> />
        2
       </label>
       <label class="radio-inline">
        <input type="radio" name="rating" value="3" <?php echo $rating==3?'checked':''; ?> />
        3
       </label>
       <label class="radio-inline">
        <input type="radio" name="rating" value="4" <?php echo $rating==4?'checked':''; ?> />
        4
       </label>
       <label class="radio-inline">
        <input type="radio" name="rating" value="5" <?php echo $rating==5?'checked':''; ?> />
        5
       </label>
      </div>
     </div>
     <div class="form-group">
      <label class="col-sm-2 control-label" for="input-date-added">Date Added</label>
      <div class="col-sm-3">
       <div class="input-group datetime">
        <input type="text" name="create_date" value="<?php echo set_value('create_date',$create_date); ?>" placeholder="Date Added" data-date-format="YYYY-MM-DD HH:mm:ss" id="input-date-added" class="form-control" />
        <span class="input-group-btn">
         <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
        </span>
       </div>
      </div>
     </div>
     <div class="form-group">
      <label class="col-sm-2 control-label" for="input-status">Status</label>
      <div class="col-sm-10">
       <select name="status" id="input-status" class="form-control">
        <option value="1" <?php echo $status==1?'selected':''; ?>>Enabled</option>
        <option value="0" <?php echo $status==""?'selected':''; ?>>Disabled</option>
       </select>
      </div>
     </div>
    </form>
   </div>
  </div>
 </div>
 <script type="text/javascript">
  <!--
  $('.datetime').datetimepicker({
    language: 'en-gb',
    pickDate: true,
    pickTime: true
  });
  //-->
 </script>
 <script type="text/javascript">
  <!--
  $('input[name=\'product\']').autocomplete({
    'source': function(request, response) {
      $.ajax({
        url: 'index.php?route=catalog/product/autocomplete&user_token=F1lrAk3QFDfydDnkb9qmHuALlhG1aTcW&filter_name=' +  encodeURIComponent(request),
        dataType: 'json',
        success: function(json) {
          response($.map(json, function(item) {
            return {
              label: item['name'],
              value: item['product_id']
            }
          }));
        }
      });
    },
    'select': function(item) {
      $('input[name=\'product\']').val(item['label']);
      $('input[name=\'product_id\']').val(item['value']);
    }
  });
  //-->
 </script>
</div>
