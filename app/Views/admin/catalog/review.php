
<div id="content">
 <div class="page-header">
  <div class="container-fluid">
   <div class="pull-right">
   
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>&nbsp; Review Heading
    </button>
    

    <a href="<?php echo base_url('admin/add_review'); ?>" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a>
   
    <button type="button" data-toggle="tooltip" title="Delete" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#form-review').submit() : false;"><i class="fa fa-trash-o"></i></button>
   </div>
   <h1><?php echo $page_title; ?></h1>
   <ul class="breadcrumb">
    <li><a href="">Home</a></li>
    <li><a href=""><?php echo $page_title; ?></a></li>
   </ul>
  </div>
 </div>
 <div class="container-fluid">
  <div class="row">
   <div id="filter-review" class="col-md-3 col-md-push-9 col-sm-12 hidden-sm hidden-xs">
    <div class="panel panel-default">
     <div class="panel-heading">
      <h3 class="panel-title"><i class="fa fa-filter"></i> Filter</h3>
     </div>
     <div class="panel-body">
      <div class="form-group">
       <label class="control-label" for="input-product">Product</label>
       <input type="text" name="filter_product" value="" placeholder="Product" id="input-product" class="form-control" />
      </div>
      <div class="form-group">
       <label class="control-label" for="input-author">Author</label>
       <input type="text" name="filter_author" value="" placeholder="Author" id="input-author" class="form-control" />
      </div>
      <div class="form-group">
       <label class="control-label" for="input-status">Status</label>
       <select name="filter_status" id="input-status" class="form-control">
        <option value=""></option>

        <option value="1">Enabled</option>

        <option value="0">Disabled</option>
       </select>
      </div>
      <div class="form-group">
       <label class="control-label" for="input-date-added">Date Added</label>
       <div class="input-group date">
        <input type="text" name="filter_date_added" value="" placeholder="Date Added" data-date-format="YYYY-MM-DD" id="input-date-added" class="form-control" />
        <span class="input-group-btn">
         <button type="button" class="btn btn-default"><i class="fa fa-calendar"></i></button>
        </span>
       </div>
      </div>
      <div class="form-group text-right">
       <button type="button" id="button-filter" class="btn btn-default"><i class="fa fa-filter"></i> Filter</button>
      </div>
     </div>
    </div>
   </div>
   <div class="col-md-9 col-md-pull-3 col-sm-12">
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


      <h3 class="panel-title"><i class="fa fa-list"></i> Review List</h3>
     </div>
     <div class="panel-body">
   
     <?php echo form_open_multipart('admin/delete_review','id="form-review"'); ?>   

       <div class="table-responsive">
        <table class="table table-bordered table-hover">
         <thead>

        
          
          <tr>
           <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
           <td class="text-left"><a href="">Product</a></td>
           <td class="text-left"><a href="">Author</a></td>
           <td class="text-right"><a href="">Rating</a></td>
           <td class="text-left"><a href="C">Status</a></td>
           <td class="text-left"><a href="" class="desc">Date Added</a></td>
           <td class="text-right">Action</td>
          </tr>

      
         </thead>
         <tbody>
           <?php if (!empty($detail)) {foreach ($detail as $key => $value) {?>
                  
              <tr>
                  <td class="text-center">           
                    <input type="checkbox" name="selected[]" value="<?php echo $value->id; ?>" />
                  </td>
                  <td class="text-left"><?php echo $value->name; ?></td>
                  <td class="text-left"><?php echo $value->author; ?></td>
                   <td class="text-left"><?php echo $value->rating; ?></td>
                    <td class="text-left"><?php echo $value->status==1?'Enabled':'Disabled'; ?></td>
                <td class="text-left"><?php echo $value->create_date; ?></td>
                  <td class="text-right"><a href="<?php echo base_url('admin/add_review/'.$value->id); ?>" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
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
 </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Review Heading</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url('admin/save_review_heading'); ?>" method="POST">
      <div class="modal-body">
        
      <div class="form-group">
       <label class="control-label" for="input-product">Title</label>
       <input type="text" name="title" value="<?php echo $heading->title; ?>" placeholder="Title" id="input-product" class="form-control" />
      </div>

      <div class="form-group">
       <label class="control-label" for="input-product">Short Description</label>
       <textarea class="form-control" rows="5" name="sort_des"> <?php echo $heading->sort_des; ?></textarea>

      </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>

      </form>

    </div>
  </div>
</div>



 
 <script type="text/javascript">
  <!--
  $('#button-filter').on('click', function() {
    url = 'index.php?route=catalog/review&user_token=F1lrAk3QFDfydDnkb9qmHuALlhG1aTcW';

    var filter_product = $('input[name=\'filter_product\']').val();

    if (filter_product) {
      url += '&filter_product=' + encodeURIComponent(filter_product);
    }

    var filter_author = $('input[name=\'filter_author\']').val();

    if (filter_author) {
      url += '&filter_author=' + encodeURIComponent(filter_author);
    }

    var filter_status = $('select[name=\'filter_status\']').val();

    if (filter_status !== '') {
      url += '&filter_status=' + encodeURIComponent(filter_status);
    }

    var filter_date_added = $('input[name=\'filter_date_added\']').val();

    if (filter_date_added) {
      url += '&filter_date_added=' + encodeURIComponent(filter_date_added);
    }

    location = url;
  });
  //-->
 </script>
 <script type="text/javascript">
  <!--
  $('.date').datetimepicker({
    language: 'en-gb',
    pickTime: false
  });
  //-->
 </script>
</div>
