
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right"><a href="<?php echo base_url('admin/add_download'); ?>" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        <button type="button" data-toggle="tooltip" title="Delete" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#form-download').submit() : false;"><i class="fa fa-trash-o"></i></button>
      </div>
      <h1><?php echo $page_title; ?></h1>
      <ul class="breadcrumb">
                <li><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
                <li><a href="<?php echo base_url('admin/downloads'); ?>"><?php echo $page_title; ?></a></li>
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
        <h3 class="panel-title"><i class="fa fa-list"></i> Download List</h3>
      </div>
      <div class="panel-body">

        <?php echo form_open_multipart('admin/delete_download','id="form-download"'); ?>  

          <div class="table-responsive">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                   <td class="text-left">   
                    Download Name
                   </td>
                  <td class="">  
                    File  
                  </td>
                   <td class="">  
                    Date Added
                  </td>
                  <td class="">Action</td>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($detail)) {foreach ($detail as $key => $value) {?>
                  
                  <tr>
                  <td class="text-center">           
                    <input type="checkbox" name="selected[]" value="<?php echo $value->id; ?>" />
                  </td>
                  <td class="text-left"><?php echo $value->name; ?></td>
                  <td class="text-left"><?php echo $value->file; ?></td>
                <td class="text-left"><?php echo $value->create_date; ?></td>
                  <td class="text-right"><a href="<?php echo base_url('admin/add_download/'.$value->id); ?>" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
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

