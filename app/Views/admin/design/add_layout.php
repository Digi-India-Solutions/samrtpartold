<div id="content">
 <div class="page-header">
  <div class="container-fluid">
   <div class="pull-right">
    <button type="submit" form="form-layout" data-toggle="tooltip" title="Save" class="btn btn-primary"><i class="fa fa-save"></i></button>
    <a href="<?php echo base_url('admin/layout'); ?>" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a>
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
    <h3 class="panel-title"><i class="fa fa-pencil"></i> Add Layout</h3>
   </div>
   <div class="panel-body">
    <form action="http://localhost/opencart/admin/index.php?route=design/layout/add&amp;user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT" method="post" enctype="multipart/form-data" id="form-layout" class="form-horizontal">
     <fieldset>
      <legend>Choose the store and routes to be used with this layout</legend>
      <div class="form-group required">
       <label class="col-sm-2 control-label" for="input-name">Layout Name</label>
       <div class="col-sm-10">
        <input type="text" name="name" value="" placeholder="Layout Name" id="input-name" class="form-control" />
       </div>
      </div>
      <table id="route" class="table table-striped table-bordered table-hover">
       <thead>
        <tr>
         <td class="text-left">Store</td>
         <td class="text-left">Route</td>
         <td></td>
        </tr>
       </thead>
       <tbody></tbody>
       <tfoot>
        <tr>
         <td colspan="2"></td>
         <td class="text-left">
          <button type="button" onclick="addRoute();" data-toggle="tooltip" title="Add Route" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button>
         </td>
        </tr>
       </tfoot>
      </table>
     </fieldset>
     <fieldset>
      <legend>Choose the position of the modules</legend>
      <div class="row">
       <div class="col-lg-3 col-md-4 col-sm-12">
        <table id="module-column-left" class="table table-striped table-bordered table-hover">
         <thead>
          <tr>
           <td class="text-center">Column Left</td>
          </tr>
         </thead>
         <tbody></tbody>
         <tfoot>
          <tr>
           <td class="text-left">
            <div class="input-group">
             <select class="form-control input-sm">
              <option value=""></option>
              <optgroup label="Account">
               <option value="account">Account</option>
              </optgroup>
              <optgroup label="Banner">
               <option value="banner.31">Banner 1</option>
               <option value="banner.30">Category</option>
              </optgroup>
              <optgroup label="Carousel">
               <option value="carousel.29">Home Page</option>
              </optgroup>
              <optgroup label="Category">
               <option value="category">Category</option>
              </optgroup>
              <optgroup label="Featured">
               <option value="featured.28">Home Page</option>
              </optgroup>
              <optgroup label="Slideshow">
               <option value="slideshow.27">Home Page</option>
              </optgroup>
             </select>
             <div class="input-group-btn">
              <button type="button" onclick="addModule('column-left');" data-toggle="tooltip" title="Add Module" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i></button>
             </div>
            </div>
           </td>
          </tr>
         </tfoot>
        </table>
       </div>
       <div class="col-lg-6 col-md-4 col-sm-12">
        <table id="module-content-top" class="table table-striped table-bordered table-hover">
         <thead>
          <tr>
           <td class="text-center">Content Top</td>
          </tr>
         </thead>
         <tbody></tbody>
         <tfoot>
          <tr>
           <td class="text-left">
            <div class="input-group">
             <select class="form-control input-sm">
              <option value=""></option>
              <optgroup label="Account">
               <option value="account">Account</option>
              </optgroup>
              <optgroup label="Banner">
               <option value="banner.31">Banner 1</option>
               <option value="banner.30">Category</option>
              </optgroup>
              <optgroup label="Carousel">
               <option value="carousel.29">Home Page</option>
              </optgroup>
              <optgroup label="Category">
               <option value="category">Category</option>
              </optgroup>
              <optgroup label="Featured">
               <option value="featured.28">Home Page</option>
              </optgroup>
              <optgroup label="Slideshow">
               <option value="slideshow.27">Home Page</option>
              </optgroup>
             </select>
             <div class="input-group-btn">
              <button type="button" onclick="addModule('content-top');" data-toggle="tooltip" title="Add Module" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i></button>
             </div>
            </div>
           </td>
          </tr>
         </tfoot>
        </table>
        <table id="module-content-bottom" class="table table-striped table-bordered table-hover">
         <thead>
          <tr>
           <td class="text-center">Content Bottom</td>
          </tr>
         </thead>
         <tbody></tbody>
         <tfoot>
          <tr>
           <td class="text-left">
            <div class="input-group">
             <select class="form-control input-sm">
              <option value=""></option>
              <optgroup label="Account">
               <option value="account">Account</option>
              </optgroup>
              <optgroup label="Banner">
               <option value="banner.31">Banner 1</option>
               <option value="banner.30">Category</option>
              </optgroup>
              <optgroup label="Carousel">
               <option value="carousel.29">Home Page</option>
              </optgroup>
              <optgroup label="Category">
               <option value="category">Category</option>
              </optgroup>
              <optgroup label="Featured">
               <option value="featured.28">Home Page</option>
              </optgroup>
              <optgroup label="Slideshow">
               <option value="slideshow.27">Home Page</option>
              </optgroup>
             </select>
             <div class="input-group-btn">
              <button type="button" onclick="addModule('content-bottom');" data-toggle="tooltip" title="Add Module" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i></button>
             </div>
            </div>
           </td>
          </tr>
         </tfoot>
        </table>
       </div>
       <div class="col-lg-3 col-md-4 col-sm-12">
        <table id="module-column-right" class="table table-striped table-bordered table-hover">
         <thead>
          <tr>
           <td class="text-center">Column Right</td>
          </tr>
         </thead>
         <tbody></tbody>
         <tfoot>
          <tr>
           <td class="text-left">
            <div class="input-group">
             <select class="form-control input-sm">
              <option value=""></option>
              <optgroup label="Account">
               <option value="account">Account</option>
              </optgroup>
              <optgroup label="Banner">
               <option value="banner.31">Banner 1</option>
               <option value="banner.30">Category</option>
              </optgroup>
              <optgroup label="Carousel">
               <option value="carousel.29">Home Page</option>
              </optgroup>
              <optgroup label="Category">
               <option value="category">Category</option>
              </optgroup>
              <optgroup label="Featured">
               <option value="featured.28">Home Page</option>
              </optgroup>
              <optgroup label="Slideshow">
               <option value="slideshow.27">Home Page</option>
              </optgroup>
             </select>
             <div class="input-group-btn">
              <button type="button" onclick="addModule('column-right');" data-toggle="tooltip" title="Add Module" class="btn btn-primary btn-sm"><i class="fa fa-plus-circle"></i></button>
             </div>
            </div>
           </td>
          </tr>
         </tfoot>
        </table>
       </div>
      </div>
     </fieldset>
    </form>
   </div>
  </div>
 </div>
 <script type="text/javascript">
  <!--
  var route_row = 0;

  function addRoute() {
    html  = '<tr id="route-row' + route_row + '">';
    html += '  <td class="text-left"><select name="layout_route[' + route_row + '][store_id]" class="form-control">';
    html += '  <option value="0">Default</option>';
      html += '  </select></td>';
    html += '  <td class="text-left"><input type="text" name="layout_route[' + route_row + '][route]" value="" placeholder="Route" class="form-control" /></td>';
    html += '  <td class="text-left"><button type="button" onclick="$(\'#route-row' + route_row + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
    html += '</tr>';

    $('#route tbody').append(html);

    route_row++;
  }

  var module_row = 0;

  function addModule(type) {
    html  = '<tr id="module-row' + module_row + '">';
      html += '  <td class="text-left"><div class="input-group"><select name="layout_module[' + module_row + '][code]" class="form-control input-sm">';
      html += '    <optgroup label="Account">';
      html += '      <option value="account">Account</option>';
      html += '    </optgroup>';
      html += '    <optgroup label="Banner">';
        html += '      <option value="banner.31">Banner\x201</option>';
      html += '      <option value="banner.30">Category</option>';
        html += '    </optgroup>';
      html += '    <optgroup label="Carousel">';
        html += '      <option value="carousel.29">Home\x20Page</option>';
        html += '    </optgroup>';
      html += '    <optgroup label="Category">';
      html += '      <option value="category">Category</option>';
      html += '    </optgroup>';
      html += '    <optgroup label="Featured">';
        html += '      <option value="featured.28">Home\x20Page</option>';
        html += '    </optgroup>';
      html += '    <optgroup label="Slideshow">';
        html += '      <option value="slideshow.27">Home\x20Page</option>';
        html += '    </optgroup>';
      html += '  </select>';
      html += '  <input type="hidden" name="layout_module[' + module_row + '][position]" value="' + type.replace('-', '_') + '" />';
      html += '  <input type="hidden" name="layout_module[' + module_row + '][sort_order]" value="" />';
    html += '  <div class="input-group-btn"><a href="" target="_blank" type="button" data-toggle="tooltip" title="Edit" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a><button type="button" onclick="$(\'#module-row' + module_row + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger btn-sm"><i class="fa fa fa-minus-circle"></i></button></div></div></td>';
    html += '</tr>';

    $('#module-' + type + ' tbody').append(html);

    $('#module-' + type + ' tbody select[name=\'layout_module[' + module_row + '][code]\']').val($('#module-' + type + ' tfoot select').val());

    $('#module-' + type + ' select[name*=\'code\']').trigger('change');

    $('#module-' + type + ' tbody input[name*=\'sort_order\']').each(function(i, element) {
      $(element).val(i);
    });

    module_row++;
  }

  $('#module-column-left, #module-column-right, #module-content-top, #module-content-bottom').delegate('select[name*=\'code\']', 'change', function() {
    var part = this.value.split('.');

    if (!part[1]) {
      $(this).parent().find('a').attr('href', 'index.php?route=extension/module/' + part[0] + '&user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT');
    } else {
      $(this).parent().find('a').attr('href', 'index.php?route=extension/module/' + part[0] + '&user_token=D7qoRKWCMr9uZKWdb9dLc9olJtfRjGLT&module_id=' + part[1]);
    }
  });

  $('#module-column-left, #module-column-right, #module-content-top, #module-content-bottom').trigger('change');
  //-->
 </script>
</div>
