<?php 
$this->extend('layout/master_admin');
$this->section('page');
$validation = \Config\Services::validation(); 
?>
<div id="content">
 <div class="page-header">
  <div class="container-fluid">
   <div class="pull-right">
    <button type="submit" form="form-banner" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa fa-save"></i></button>
    <a href="<?php echo base_url('admin/slider'); ?>" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a>
   </div>
   <h1><?php echo $page_title; ?></h1>
   <ul class="breadcrumb">
 <li><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
<li><a href="javascript:void();"><?php echo $page_title; ?></a></li>
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
  
    <?php echo form_open_multipart($form_action,'id="form-banner" class="form-horizontal"'); ?>

  
      <div class="form-group required">
      <label class="col-sm-2 control-label" for="input-name">Slider Name</label>
      <div class="col-sm-10">
      <input type="text" name="name" value="<?php echo set_value('name',$name); ?>" placeholder="name" class="form-control" />
      
       <?php echo $validation->hasError('name')?$validation->showError('name','my_single'):''; ?>
      </div>
     </div>

        <div class="form-group required">
      <label class="col-sm-2 control-label" for="input-name">Heading on banner </label>
      <div class="col-sm-10">
      <input type="text" name="heading" value="<?php echo set_value('heading',$heading); ?>" placeholder="heading" class="form-control" />
       
      </div>
     </div>

        <div class="form-group required">
      <label class="col-sm-2 control-label" for="input-name">Sub Heading </label>
      <div class="col-sm-10">
      <input type="text" name="sub_heading" value="<?php echo set_value('sub_heading',$sub_heading); ?>" placeholder="sub heading on banner" class="form-control" />
      
      </div>
     </div>

     <div class="form-group required">
      <label class="col-sm-2 control-label" for="input-name">Slider Link</label>
      <div class="col-sm-10">
      <input type="text" name="slider_link" value="<?php echo set_value('slider_link',$slider_link); ?>" placeholder="slider link" class="form-control" />
      
      </div>
     </div>


     <br />
     <ul class="nav nav-tabs" id="language">
      <li>
       <a href="#language1" data-toggle="tab"> English</a>
      </li>
     </ul>
     <div class="tab-content">
      <div class="tab-pane" id="language1">
       <table id="images1" class="table table-striped table-bordered table-hover">
        <thead>
         <tr>
          <td class="text-left">Title</td>
          <td class="text-left">Link</td>
          <td class="text-center">Image</td>
          <td class="text-right">Sort Order</td>
          <td></td>
         </tr>
        </thead>
        <tbody>
          <?php if (!empty($detail)) {foreach ($detail as $key => $row) {?>
           
       <tr id="image-row<?php echo $row->id; ?>">
         <td class="text-left">
          <input type="text" name="title[]" value="<?php echo $row->title; ?>" placeholder="Title" class="form-control" />
         </td>

         <td class="text-left" style="width: 30%;"><input type="text" name="link[]" placeholder="Link" value="<?php echo $row->link; ?>" class="form-control" /></td>
         <td class="text-center">
          <?php if ($row->image): ?>
          <img src="<?php echo base_url($row->image); ?>" width="50" height="50" />
          <?php endif ?>
          <input type="file" class="form-control" name="image[]" id="input-image0" />
          <input type="hidden" name="old_image[]" value="<?php echo $row->image; ?>">
         </td>

         <td class="text-right" style="width: 10%;">
          <input type="text" name="sort_order[]" value="<?php echo $row->sort_order; ?>" placeholder="Sort Order" class="form-control" />
         </td>

         <td class="text-left">
          <button type="button" onclick="$('#image-row<?php echo $row->id; ?>, .tooltip').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
         </td>
        </tr>

        <?php } } ?>


        </tbody>
        <tfoot>
         <tr>
          <td colspan="4"></td>
          <td class="text-left">
           <button type="button" onclick="addImage('1');" data-toggle="tooltip" title="Add Banner" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button>
          </td>
         </tr>
        </tfoot>
       </table>
      </div>
     </div>
    </form>
   </div>
  </div>
 </div>
 <script type="text/javascript">
  <!--
  var image_row = 0;
  function addImage(language_id) {
    html  = '<tr id="image-row' + image_row + '">';
      html += '  <td class="text-left"><input type="text" name="title[]" value="" placeholder="Title" class="form-control" /></td>';
    html += '  <td class="text-left" style="width: 30%;"><input type="text" name="link[]"  placeholder="Link" class="form-control" /></td>';
    html += '  <td class="text-center"><input type="file" class="form-control" name="image[]"  id="input-image' + image_row + '" /></td>';
    html += '  <td class="text-right" style="width: 10%;"><input type="text" name="sort_order[]" value="" placeholder="Sort Order" class="form-control" /></td>';
    html += '  <td class="text-left"><button type="button" onclick="$(\'#image-row' + image_row  + ', .tooltip\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
    html += '</tr>';

    $('#images' + language_id + ' tbody').append(html);

    image_row++;
  }
  //-->
 </script>
 <script type="text/javascript">
  <!--
  $('#language a:first').tab('show');
  //-->
 </script>
</div>
<?php $this->endSection(); ?>