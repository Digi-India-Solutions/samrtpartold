<?php 
$this->extend('layout/master_admin'); $this->section('page'); $validation = \Config\Services::validation(); ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-filter" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo base_url('admin/customer_review'); ?>" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $page_title; ?></h1>
      <ul class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>
        <li><a href="<?php echo base_url('admin/add_customer_review'); ?>"><?php echo $page_title; ?></a></li>
      </ul>
    </div>
  </div>
  <div class="container-fluid">     <div class="panel panel-default">
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
  
        <?php echo form_open_multipart($form_action,'id="form-filter" class="form-horizontal"'); ?>  


          <fieldset id="option-value">
         
            

            <div class="form-group required">
              <label class="col-sm-2 control-label">First Name</label>
              <div class="col-sm-10">
              
                <div class="input-group"><span class="input-group-addon"></span>
                 <input type="text" name="fname" value="<?php echo set_value('fname',$fname); ?>" class="form-control" />
                </div>
                   <?php echo $validation->hasError('fname')?$validation->showError('fname','my_single'):''; ?>
               </div>
            </div>


            <div class="form-group">
              <label class="col-sm-2 control-label">Last Name</label>
              <div class="col-sm-10">
              
                <div class="input-group"><span class="input-group-addon"></span>
                 <input type="text" name="lname" value="<?php echo set_value('lname',$lname); ?>" class="form-control" />
                </div>
              
               </div>
            </div>
            
            
             <div class="form-group required">
              <label class="col-sm-2 control-label">Review Title</label>
              <div class="col-sm-10">
              
                <div class="input-group"><span class="input-group-addon"></span>
                 <input type="text" name="title" value="<?php echo set_value('title',$title); ?>" class="form-control" />
                </div>
              
               </div>
            </div>
            
            
                <div class="form-group">
              <label class="col-sm-2 control-label">Review</label>
              <div class="col-sm-10">
              
                <div class="input-group"><span class="input-group-addon"></span>
                  <textarea class="form-control" name="review" rows="5"><?php echo set_value('review',$review); ?></textarea>
                </div>
              
               </div>
            </div>

              <div class="form-group required">
              <label class="col-sm-2 control-label">Rating</label>
              <div class="col-sm-10">
              
                <select class="form-control" name="rating">
                  <option value="">select option</option>
                  <?php foreach ($rating_list as $key => $value): ?>
                    <option value="<?php echo $value->id; ?>" <?php echo $rating==$value->id?'selected':'';?>><?php echo $value->name; ?></option>
                  <?php endforeach ?>
                </select>
              
               </div>
            </div>
            
            <div class="form-group required">
              <label class="col-sm-2 control-label"><span data-toggle="tooltip" title="Type product name/part no then select">Product</span>  </label>
              <div class="col-sm-10">
                <input type="text" id="product_text" class="form-control" name="product_text">
              
                <select class="form-control" name="product_id" id="product_id">
                  <option value="">select option</option>
                  <?php if($product){ ?>
                    <option value="<?php echo $product->id; ?>" selected><?php echo $product->name; ?></option>
                  <?php } ?>
                </select>
              
               </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">Show on Home page</label>
              <div class="col-sm-10">
              
                <div class="input-group">
                 <input type="checkbox" name="visible" value="1"  <?php echo $visible?'checked':''; ?> />
                </div>
              
               </div>
            </div>


            <div class="form-group">
              <label class="col-sm-2 control-label" for="input-sort-order">Status</label>
              <div class="col-sm-10">
                <select class="form-control" name="status" id="status" required="required">
                  <option value=""> Select option </option>
                  <option value="1" <?php echo $status==1?'selected':''; ?>> Active </option>
                  <option value="0" <?php echo $status==0?'selected':''; ?>> Deactive </option>

                </select>
                <?php echo $validation->hasError('status')?$validation->showError('status','my_single'):''; ?>
              </div>
            </div>
          </fieldset>
          
        </form>
      </div>
    </div>
  </div>

</div>

<script type="text/javascript">

  $("#product_text").keypress(function() {
    var search = $('#product_text').val();
 
        $.ajax({
            url:"<?php echo base_url('admin/get_ajax_product'); ?>",
            type:"post",
            data:{search:search},
            success:function(data){
                if(data){
                    $('#product_id').html(data);
                }
            }
        });
   
});
 
</script>



 <?php echo $this->endSection();?>