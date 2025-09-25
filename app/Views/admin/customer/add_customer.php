<?php 
$this->extend('layout/master_admin');
$this->section('page');
$validation = \Config\Services::validation(); 
?>
<div id="content">
<div class="page-header">
<div class="container-fluid">
<div class="pull-right">
<button type="submit" form="form-customer" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa fa-save"></i></button>
<a href="<?php echo base_url('admin/customer');?>" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
<h1>Customers</h1>
<ul class="breadcrumb">
<li><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
<li><a href="javascript:void();"><?php echo $page_title; ?></a></li>
</ul>
</div>
</div>
<div class="container-fluid"> <div class="panel panel-default">
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

  
<h3 class="panel-title"><i class="fa fa-pencil"></i> Edit Customer</h3>
</div>
<div class="panel-body">

<ul class="nav nav-tabs">
<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>

<li><a href="#tab-transaction" data-toggle="tab">Order</a></li>
<!--<li><a href="#tab-reward" data-toggle="tab">Reward Points</a></li>-->
<!--<li><a href="#tab-ip" data-toggle="tab">IP Addresses</a></li>-->

</ul>
<div class="tab-content">
<div class="tab-pane active" id="tab-general">
<div class="row">

<div class="col-sm-10">
<div class="tab-content">
<div class="tab-pane active" id="tab-customer">
<fieldset>
<legend>Customer Details</legend>
<form action="<?php echo $form_action; ?>" method="post" enctype="multipart/form-data" id="form-user" class="form-horizontal">

<div class="form-group">
<label class="col-sm-2 control-label" for="input-status">Customer Group</label>
<div class="col-sm-10">
<select name="customer_group_id"  class="form-control">
  <option value="">Select</option>
  <?php foreach ($customer_group as $key => $value): ?>
    <option value="<?php echo $value->id; ?>" <?php echo $value->id==$customer_group_id?'selected':''; ?>><?php echo $value->group_name; ?></option>
  <?php endforeach ?>
</select>
</div>
</div>


<div class="form-group ">
<label class="col-sm-2 control-label" for="input-firstname">First Name</label>
<div class="col-sm-10">
<input type="text" name="first_name" value="<?php echo set_value('first_name',$first_name); ?>" placeholder="First Name" class="form-control" />
  <?php echo $validation->hasError('first_name')?$validation->showError('first_name','my_single'):''; ?>
</div>
</div>
<div class="form-group ">
<label class="col-sm-2 control-label" for="input-lastname">Last Name</label>
<div class="col-sm-10">
<input type="text" name="last_name" value="<?php echo set_value('last_name',$last_name); ?>" placeholder="Last Name"  class="form-control" />
  <?php echo $validation->hasError('last_name')?$validation->showError('last_name','my_single'):''; ?>
</div>
</div>
<div class="form-group ">
<label class="col-sm-2 control-label" for="input-email">E-Mail</label>
<div class="col-sm-10">
<input type="text" name="email" value="<?php echo set_value('email',$email); ?>" placeholder="E-Mail"  class="form-control" />
  <?php echo $validation->hasError('email')?$validation->showError('email','my_single'):''; ?>
</div>
</div>

<div class="form-group ">
<label class="col-sm-2 control-label" for="input-email">Mobile</label>
<div class="col-sm-10">
<input type="text" name="mobile" value="<?php echo set_value('mobile',$mobile); ?>" placeholder="mobile"  class="form-control" />
  <?php echo $validation->hasError('mobile')?$validation->showError('mobile','my_single'):''; ?>
</div>
</div>


<div class="form-group">
<label class="col-sm-2 control-label" for="input-image">Image</label>
<div class="col-sm-10">
<?php if (@$photo): ?>
<img src="<?php echo base_url($photo); ?>" width="100" height="100">
<?php endif ?>
<input type="file" name="photo"  id="input-image" class="form-control" />
</div>
</div>



<div class="form-group">
<label class="col-sm-2 control-label" for="input-image">Registraion Type</label>
<div class="col-sm-10">
<input type="radio" name="reg_type"  id="input-image" value="bussiness" <?php echo $reg_type=='bussiness'?'checked':''; ?> /> &nbsp; Business Card
<input type="radio" name="reg_type"  id="input-image" value="company" <?php echo $reg_type=='company'?'checked':''; ?> /> &nbsp; Company Name
</div>
</div>


<div class="form-group bussiness">
<label class="col-sm-2 control-label" for="input-image">Business Card</label>
<div class="col-sm-10">
<?php if (@$bussiness_card): ?>
<img src="<?php echo base_url($bussiness_card); ?>" width="100" height="100">
<?php endif ?>
<input type="file" name="bussiness_card"  id="input-image" class="form-control " />
</div>
</div>

<div class="form-group company">
<label class="col-sm-2 control-label" for="input-email">Company Name</label>
<div class="col-sm-10">
<input type="text" name="company_name" value="<?php echo set_value('company_name',$company_name); ?>" placeholder="company name "  class="form-control" />
</div>
</div>

<div class="form-group company">
<label class="col-sm-2 control-label" for="input-email">Company Address</label>
<div class="col-sm-10">
<input type="text" name="company_address" value="<?php echo set_value('company_address',$company_address); ?>" placeholder="company address"  class="form-control " />
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label" for="input-image">Select country</label>
<div class="col-sm-10">
<select name="country" class="form-control">
 
  <?php foreach ($country_list as $key => $value): ?>
    <option value="<?php echo $value->id; ?>" <?php echo $country==$value->id?'selected':''; ?>><?php echo $value->name; ?></option>
  <?php endforeach ?>
</select>
</div>
</div>

<div class="form-group company">
<label class="col-sm-2 control-label" for="input-email">Website Link</label>
<div class="col-sm-10">
<input type="text" name="website_link" value="<?php echo set_value('website_link',$website_link); ?>" placeholder="Website Link "  class="form-control" />
</div>
</div>

<div class="form-group ">
<label class="col-sm-2 control-label" for="input-password">Password</label>
<div class="col-sm-10">
<input type="password" name="password" value="<?php echo set_value('password'); ?>"  placeholder="Enter new password"  class="form-control" autocomplete="off"  />
</div>
</div>
<div class="form-group ">
<label class="col-sm-2 control-label" for="input-confirm">Confirm</label>
<div class="col-sm-10">
<input type="password" name="confirm" value="<?php echo set_value('confirm'); ?>"  placeholder="Confirm password" class="form-control" autocomplete="off" />
  <?php echo $validation->hasError('confirm')?$validation->showError('confirm','my_single'):''; ?>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="input-status">Status</label>
<div class="col-sm-10">
<select name="status"  class="form-control">
<option value="0" <?php echo $status==0?'selected':''; ?>>Disabled</option>
<option value="1" <?php echo $status==1?'selected':''; ?>>Enabled</option>
</select>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
<div class="tab-pane" id="tab-transaction">
<div class="row">

<div class="col-sm-10">
<div class="tab-content">
<div class="tab-pane active" id="tab-customer">
<legend>Order Details</legend>
<table class="table table-bordered table-hover">
<thead>
<tr>
<td class="text-right">Order ID</td>
<td class="text-left">Customer</td>
<td class="text-left">Order Status</td>
<td class="text-right">Total</td>
<td class="text-right">Transaction ID</td>
<td class="text-left">Date Added</td>
<td class="text-left">Status</td>
<td class="text-right">Action</td>
</tr>
</thead>
<tbody>
<?php if (!empty($detail)) {foreach ($detail as $key => $value) {?>
<tr>
<td class="text-center"><?php echo $value->id; ?></td>
<td class="text-center"><?php echo strtoupper($value->firstname.' '.$value->lastname); ?></td>
<td class="text-center"><?php echo $value->current_status; ?></td>
<td class="text-center"><?php echo $value->total; ?></td>
<td class="text-center"><?php echo $value->txnid; ?></td>
<td class="text-center"><?php echo $value->date_added; ?></td>
<td class="text-center"><?php echo $value->status?'Complete':'Failed'; ?></td>
<td class="text-center" style="min-width: 120px;">
<div class="btn-group">
<a href="<?php echo base_url('admin/view_order/'.$value->id); ?>" data-toggle="tooltip" target="_blank" title="view Order" class="btn btn-primary" data-original-title="View"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
<a href="<?php echo base_url('admin/delete_order/'.$value->id); ?>" data-toggle="tooltip" title="delete" class="btn btn-danger" data-original-title="View"  onclick="return confirm('Are you sure to delete');"><i class="fa fa-trash"></i></a>
</div>
</td>
</tr>   
<?php } }else{?>
<tr>
<td class="text-center" colspan="8">No results!</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>

</div>
</div>
</div>
</div>
<div class="tab-pane" id="tab-affiliate">

</div>
<div class="tab-pane" id="tab-reward">


</div>
</div>
</form>
</div>
</div>
</div>
</div>


<script type="text/javascript">
  $(document).ready(function(){
  var val = $('input[name="reg_type"]:checked').val();
  if(val=='bussiness'){
    $('#bussiness_card').attr('required',true);
    $('#company_name').removeClass('required');
    $('#company_address').removeClass('required');
   
       
    $('.bussiness').each(function(){
    $('.bussiness').show();
    $('.company').hide();
    });

  }else{
    $('#bussiness_card').removeClass('required');
    $('#bussiness_card').removeAttr('required',false);
    $('#company_name').addClass('required');
    $('#company_address').addClass('required');
    
      
    
    $('.bussiness').each(function(){
    $('.bussiness').hide();
    $('.company').show();
    });

  }
  
});


$('input[name="reg_type"]').on('click',function(){

 var val = $('input[name="reg_type"]:checked').val();
  if(val=='bussiness'){
    $('#bussiness_card').attr('required',true);
    $('#company_name').removeClass('required');
    $('#company_address').removeClass('required');
   
       
    $('.bussiness').each(function(){
    $('.bussiness').show();
    $('.company').hide();
    });

  }else{
    $('#bussiness_card').removeClass('required');
    $('#bussiness_card').removeAttr('required',false);
    $('#company_name').addClass('required');
    $('#company_address').addClass('required');
    
      
    
    $('.bussiness').each(function(){
    $('.bussiness').hide();
    $('.company').show();
    });

  }

});
</script>

<?php echo $this->endSection();?>