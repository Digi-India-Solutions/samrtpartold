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
        <a href="<?php echo base_url('admin/filter'); ?>" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $page_title; ?></h1>
      <ul class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href=""><?php echo $page_title; ?></a></li>
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
            <legend>Filter Group</legend>
            <div class="form-group required">
              <label class="col-sm-2 control-label">Filter Group Name</label>
              <div class="col-sm-10"> 

                <div class="input-group"><span class="input-group-addon"></span>
                  <input type="text" name="name"  value="<?php echo set_value('name',$name); ?>" placeholder="Filter Group Name" class="form-control"  required />
                </div>
                <?php echo $validation->hasError('naem')?$validation->showError('name','my_single'):''; ?>
               </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label" for="input-sort-order">Sort Order</label>
              <div class="col-sm-10">
                <input type="number" name="sort_order" value="<?php echo set_value('sort_order',$sort_order); ?>" placeholder="Sort Order" id="input-sort-order" class="form-control" />
              </div>
            </div>
          </fieldset>
          <fieldset id="option-value">
            <legend>Filter Values</legend>
            <table id="filter" class="table table-striped table-bordered table-hover">
              <thead>
                <tr>
                  <td class="text-left required">Filter Name</td>
                  <td class="text-right">Sort Order</td>
                  <td></td>
                </tr>
              </thead>
              <tbody>
              <?php if (!empty($detail)) { foreach ($detail as $key => $row) {?>
               <tr id="filter-row<?php echo $row->id;?>">
                 <td class="text-left" style="width: 70%;">
              
                  <div class="input-group"> 
                     <span class="input-group-addon"></span>
                     <input type="text" name="filter_name[]" value="<?php echo $row->name; ?>" placeholder="Filter Name" class="form-control">  
                  </div>  
                 </td>  
                <td class="text-right">
                  <input type="text" name="filter_sort_order[]" value="<?php echo $row->sort_order;?>" placeholder="Sort Order" id="input-sort-order" class="form-control">
                 </td> 
                 <td class="text-right">
                    <button type="button" onclick="$('#filter-row<?php echo $row->id;?>').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
                </td>
               </tr>

               <?php } } ?>
              </tbody>
              
              <tfoot>
                <tr>
                  <td colspan="2"></td>
                  <td class="text-right"><button type="button" onclick="addFilterRow();" data-toggle="tooltip" title="Add Filter" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>
                </tr>
              </tfoot>
            </table>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
  <script type="text/javascript"><!--
var filter_row = 0;

function addFilterRow() {
	html  = '<tr id="filter-row' + filter_row + '">';
    html += '  <td class="text-left" style="width: 70%;"><input type="hidden" name="filter[' + filter_row + '][filter_id]" value="" />';
		html += '  <div class="input-group">';
	html += '    <span class="input-group-addon"></span><input type="text" name="filter_name[]" value="" placeholder="Filter Name" class="form-control" />';
    html += '  </div>';
		html += '  </td>';
	html += '  <td class="text-right"><input type="text" name="filter_sort_order[]" value="" placeholder="Sort Order" id="input-sort-order" class="form-control" /></td>';
	html += '  <td class="text-right"><button type="button" onclick="$(\'#filter-row' + filter_row + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
	html += '</tr>';

	$('#filter tbody').append(html);

	filter_row++;
}
//--></script></div>

<?php echo $this->endSection();?>