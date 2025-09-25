
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right"><a href="<?php echo base_url('admin/add_product_bundle'); ?>" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        <button type="button" data-toggle="tooltip" title="Delete" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#form-manufacturer').submit() : false;"><i class="fa fa-trash-o"></i></button>
      </div>
      <h1><?php echo $page_title; ?></h1>
      <ul class="breadcrumb">
                <li><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
                <li><a href="<?php echo base_url('admin/product_bundle'); ?>"><?php echo $page_title; ?></a></li>
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
          <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <strong><?php echo $error; ?></strong> </a>
        </div>
        <?php endif ?>
    
        <h3 class="panel-title"><i class="fa fa-list"></i> <?php echo $page_title; ?></h3>
      </div>
      <div class="panel-body">
        <?php echo form_open('admin/delete_product_bundle','id="form-manufacturer"'); ?>
          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                     <td class="text-left">Bundle Name </td>
                     <td class="text-left">Products </td>
                     <td class="text-right">Status </td>
                     <td class="text-right">Sort Order </td>
                  <td class="text-right">Action</td>
                </tr>
              </thead>
              <tbody>

             <?php if (!empty($detail)) {foreach ($detail as $key => $value) {
             $product = $this->Module_model->get_product_list(json_decode($value->bundle_product));
             ?>
              
                <tr>
                  <td class="text-center">    
                    <input type="checkbox" name="selected[]" value="<?php echo $value->id; ?>" />
                  </td>
                  <td class="text-left"><?php echo $value->name; ?></td>
                  <td class="text-left"><?php foreach($product as $row){echo @$row->name.' , '; }; ?></td>
                  <td class="text-left"><?php echo $value->status=='1'?'Enabled':'Disabled'; ?></td>
                  <td class="text-right"><?php echo $value->sort_order; ?></td>
                  <td class="text-right">
                    <a href="<?php echo base_url('admin/add_product_bundle/'.$value->id); ?>" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                  </td>
                </tr>

              <?php } } ?>             
              </tbody>
            </table>
          </div>
        </form>
     
      </div>
    </div>
  </div>
</div>

