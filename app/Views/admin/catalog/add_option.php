<div id="content">
 <div class="page-header">
  <div class="container-fluid">
   <div class="pull-right">
    <button type="submit" form="form-option" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa fa-save"></i></button>
    <a href="<?php echo base_url('admin/option'); ?>" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a>
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
      <?php if (validation_errors()): ?>
      <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <strong>Warning: Please check the form carefully for errors!</strong> </a>
    </div>
    <?php endif ?>
   
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
    <h3 class="panel-title"><i class="fa fa-pencil"></i> Add Option</h3>
   </div>
   <div class="panel-body">
 
     <?php echo form_open_multipart($form_action,'id="form-option" class="form-horizontal"'); ?>

     <fieldset>
      <legend>Option</legend>
      <div class="form-group required">
       <label class="col-sm-2 control-label">Option Name</label>
       <div class="col-sm-10">
        <div class="input-group">
         <span class="input-group-addon"></span>
         <input type="text" name="name" value="<?php echo set_value('name',$name); ?>" placeholder="Option Name" class="form-control" required />
        </div>
       </div>
      </div>
      <div class="form-group">
       <label class="col-sm-2 control-label" for="input-type">Type</label>
       <div class="col-sm-10">
        <select name="option_id" id="input-type" class="form-control">
          
          <option value="select">Select</option>
          <?php foreach ($option_list as $key => $value) {?>
          
          <option value="<?php echo $value->id; ?>" <?php echo $option_id==$value->id?'selected':''; ?>><?php echo $value->name; ?></option>

          <?php } ?>
        </select>
       </div>
      </div>
      <div class="form-group">
       <label class="col-sm-2 control-label" for="input-sort-order">Sort Order</label>
       <div class="col-sm-10">
        <input type="text" name="sort_order" value="<?php echo set_value('sort_order',$sort_order); ?>" placeholder="Sort Order" id="input-sort-order" class="form-control" />
       </div>
      </div>
     </fieldset>
     <fieldset>
      <legend>Option Values</legend>

      <table id="option-value" class="table table-striped table-bordered table-hover">
       <thead>
        <tr>
         <td class="text-left required">Option Value Name</td>
         <td class="text-center">Image</td>
         <td class="text-right">Sort Order</td>
         <td></td>
        </tr>
       </thead>
       <tbody>
          
        <?php if (!empty($v_des)) {foreach ($v_des as $key => $row) {?>
          <input type="hidden" name="old_product_image[]" value="<?php echo $row->image; ?>">
          <input type="hidden" name="old_id[]" value="<?php echo $row->id; ?>">
         <tr id="option-value-row<?php echo $row->option_des_id; ?>">  
        <td class="text-left">    
        <div class="input-group">  
            <span class="input-group-addon"></span>
            <input type="text" name="v_name[]" value="<?php echo $row->name; ?>" placeholder="Option Value Name" class="form-control">   
             </div>  
         </td> 
         <td class="text-center">
          <?php if ($row->image): ?>
            <img src="<?php echo base_url($row->image); ?>" width="50" height="50">
          <?php endif ?>
          <input type="file" name="image[]" value="" id="input-image0" class="form-control">
         </td>  
         <td class="text-right"><input type="text" name="v_sort_order[]" value="<?php echo $row->sort_order; ?>" placeholder="Sort Order" class="form-control">
         </td> 
         <td class="text-right"><button type="button" onclick="$('#option-value-row<?php echo $row->option_des_id; ?>').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button>
         </td>
      </tr>

      <?php } } ?>

       </tbody>

       <tfoot>
        <tr>
         <td colspan="3"></td>
         <td class="text-right">
          <button type="button" onclick="addOptionValue();" data-toggle="tooltip" title="Add Option Value" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button>
         </td>
        </tr>
       </tfoot>
      </table>
     </fieldset>
    </form>
   </div>
  </div>
 </div>
 <script type="text/javascript">

$(document).ready(function(){
var value = $('select[name="option_id"]').val();

 if (value == '5' || value == '1' || value == '2' || value == '12') {
      $('#option-value').parent().show();
    } else {
      $('#option-value').parent().hide();
    }

});


  $('select[name="option_id"]').on('change', function() {
    if (this.value == '5' || this.value == '1' || this.value == '2' || this.value == '12') {
      $('#option-value').parent().show();
    } else {
      $('#option-value').parent().hide();
    }
  });

  $('select[name="option_id"]').trigger('change');

  var option_value_row = 0;

  function addOptionValue() {
    html  = '<tr id="option-value-row' + option_value_row + '">';
      html += '  <td class="text-left">';
      html += '    <div class="input-group">';
    html += '      <span class="input-group-addon"></span><input type="text" name="v_name[]" value="" placeholder="Option Value Name" class="form-control" />';
      html += '    </div>';
      html += '  </td>';
      html += '  <td class="text-center"><input type="file" name="image[]" value="" id="input-image' + option_value_row + '" class="form-control" /></td>';
    html += '  <td class="text-right"><input type="text" name="v_sort_order[]" value="" placeholder="Sort Order" class="form-control" /></td>';
    html += '  <td class="text-right"><button type="button" onclick="$(\'#option-value-row' + option_value_row + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
    html += '</tr>';

    $('#option-value tbody').append(html);

    option_value_row++;
  }
  //-->
 </script>
</div>
