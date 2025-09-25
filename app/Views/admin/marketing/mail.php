
<div id="content">
<div class="page-header">
<div class="container-fluid">
<div class="pull-right">
<button type="submit" form="form-coupon" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa fa-envelope"></i></button>

</div>
<h1><?= $page_title; ?></h1>
<ul class="breadcrumb">
<li><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
<li><a href="javascript:void();"><?php echo $page_title; ?></a></li>
</ul>
</div>
</div>
<div class="container-fluid"><div class="panel panel-default">
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
<h3 class="panel-title"><i class="fa fa-envelope"></i><?= $page_title; ?></h3>
</div>
<div class="panel-body">
<?php echo form_open_multipart($form_action,'id="form-coupon" class="form-horizontal"'); ?>

	<div class="form-group">
                        <label class="col-sm-2 control-label" for="input-store">From</label>
                        <div class="col-sm-10">
                            <select name="store_id" id="input-store" class="form-control">
                                <option value="0">Default</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="input-to">To</label>
                        <div class="col-sm-10">
                            <select name="to" id="to" class="form-control">
                                <option value="newsletter">All Newsletter Subscribers</option>
                                <option value="customer_all">All Customers</option>
                                <option value="customer">Customers</option>
                                <option value="product">Products</option>
                            </select>
                        </div>
                    </div>

                     <div class="form-group" id="to_customer" style="display:none;">
                        <label class="col-sm-2 control-label" for="input-parent">Customer</label>
                        <div class="col-sm-10">
                         <select class="multiple form-control" name="customer_id[]" multiple>
                              <option value="1">select option</option>
                              
                              <?php  foreach ($customer_list as $key => $value): ?>
                              <option value="<?php echo $value->id; ?>" ><?php echo $value->first_name.' '.$value->last_name; ?></option>
                              <?php endforeach ?>
                         </select>
                        </div>
                      </div>

                    <div class="form-group to" id="to_product" style="display: none;">
                         <label class="col-sm-2 control-label" for="input-parent">Product</label>
                        <div class="col-sm-10">
                         <select class="multiple form-control" name="product_id[]" multiple>
                              <option value="1">select option</option>
                              
                              <?php  foreach ($product_list as $key => $value): ?>
                              <option value="<?php echo $value->id; ?>" ><?php echo $value->name; ?></option>
                              <?php endforeach ?>
                         </select>
                        </div>
                    </div>

                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-subject">Subject</label>
                        <div class="col-sm-10">
                            <input type="text" name="subject" value="" placeholder="Subject" id="input-subject" class="form-control" required />
                        </div>
                    </div>
                    <div class="form-group required">
                        <label class="col-sm-2 control-label" for="input-message">Message</label>
                        <div class="col-sm-10">
                            <textarea name="message" placeholder="Message" id="input-message" data-toggle="summernote" data-lang="" class="form-control"></textarea>
                        </div>
                    </div>

</div>
</form>
</div>
</div>
</div>


<script type="text/javascript">

$('select#to').on('change',function(){
  var val = $(this).val();
  if (val=='customer'){
    $('#to_customer').show();
    $('#to_product').hide();
  }else if(val=='product'){
    $('#to_customer').hide();
    $('#to_product').show();
    
  }else if(val=='customer_all'){
      $('#to_customer').hide();
      $('#to_product').hide();
  }else{
       $('#to_customer').hide();
      $('#to_product').hide();
  }
});  

</script>
