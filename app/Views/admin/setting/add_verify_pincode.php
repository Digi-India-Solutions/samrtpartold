<?php 

$this->extend('layout/master_admin');
$this->section('page');
$validation = \Config\Services::validation(); 
?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-filter" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo base_url('admin/verify_pincode'); ?>" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $page_title; ?></h1>
      <ul class="breadcrumb">
       <li><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
<li><a href="javascript:void();"><?php echo $page_title; ?></a></li>
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

                        
            <div class="form-group">
              <label class="col-sm-2 control-label" for="input-sort-order">State</label>
              <div class="col-sm-10">
                <select name="state_id" id="state_id" class="form-control" required="required">
                     <option value="">select option</option>
                  <?php foreach ($state_list as $key => $value): ?>
                    <option value="<?php echo @$value->id; ?>" <?php echo @$state_id==$value->id?'selected':''; ?>><?php echo $value->name; ?></option>
                  <?php endforeach ?>
                  
                </select>
                 <?php echo $validation->hasError('state_id')?$validation->showError('state_id','my_single'):''; ?>
              </div>
            </div> 
            
              <div class="form-group">
              <label class="col-sm-2 control-label" for="input-sort-order">Pincode</label>
              <div class="col-sm-10">
               
                <div class="well well-sm" style="height: 250px; overflow: auto;" id="pincode">
                <?php if (!empty($pincode_list)) {foreach ($pincode_list as $key => $value) {?>
                
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="pincode_id[]" value="<?php echo $value->name; ?>" <?php echo in_array($value->name, $vpincode)?'checked':''; ?> /> <?php echo $value->name; ?>
                  </label>
                </div>

                <?php } }else{ ?>

                <div class="checkbox">
                    <label>
                     Please select state first
                  </label>
                </div>
                
                <?php } ?>
             
                </div>
                 <button type="button" onclick="$(this).parent().find(':checkbox').prop('checked', true);" class="btn btn-link">select all</button> / <button type="button" onclick="$(this).parent().find(':checkbox').prop('checked', false);" class="btn btn-link">Unselect all</button>
               
              </div>
            </div>           
            
             <div class="form-group">
              <label class="col-sm-2 control-label" for="input-sort-order">Status</label>
              <div class="col-sm-10">
                <select class="form-control" name="status">
                  <option value="1" <?php echo $status==1?'selected':''; ?>>Active</option>
                  <option value="0" <?php echo $status==0?'selected':''; ?>>Deactive</option>
                </select>
     
              </div>
            </div> 

 
        </form>
      </div>
    </div>
  </div>

</div>


<script type="text/javascript">
  $('select#state_id').on('change',function(){
  var state_id = $(this).val();

   if (state_id) {
    $.ajax({
      url:"<?php echo base_url('admin/get_pincode'); ?>",
      type:"POST",
      data:{state_id:state_id},
      success:function(data){  
        $('#pincode').html(data);
      }
    });
  }
});
</script>

<?php $this->endSection(); ?>