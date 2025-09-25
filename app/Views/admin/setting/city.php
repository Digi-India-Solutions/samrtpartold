<div id="content">
 <div class="page-header">
  <div class="container-fluid">
   <div class="pull-right">
     
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-upload"></i>&nbsp; Import City</button>
   
       
    <a href="<?php echo base_url('admin/add_city'); ?>" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a>
   
    <button type="button" data-toggle="tooltip" title="Delete" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#form-category').submit() : false;"><i class="fa fa-trash-o"></i></button>
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
    
    <h3 class="panel-title"><i class="fa fa-list"></i> Services List</h3>
   </div>
   <div class="panel-body">
    
    <?php echo form_open('admin/delete_city','id="form-category"'); ?>  

     <div class="table-responsive">
      <!-- <table id="example" class="display" style="width:100%"> -->
      <table class="table table-bordered table-hover">
       <thead>
        <tr>
         <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
            <!--<td class="text-left"><a href="" class="asc">Country Name</a></td>-->
            <td class="text-left"><a href="" class="asc">State Name</a></td>
           <td class="text-left"><a href="" class="asc">City Name</a></td>
           <td class="text-left"><a href="" class="asc">Status</a></td>
           <td class="text-right">Action</td>
        </tr>
       </thead>
       <tbody>
   
         <?php foreach ($detail as $key => $value){?>
           
         <tr>
         <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $value->id; ?>" /></td>
         <!--<td class="text-left"><?php echo $value->country_name; ?>  </td>-->
         <td class="text-left"><?php echo $value->state_name; ?>  </td>
         <td class="text-left"><?php echo $value->name; ?>  </td>
          <td class="text-left"><?php echo $value->status==1?'Active':'Deactive'; ?>  </td>
         <td class="text-right">
          <a href="<?php echo base_url('admin/add_city/'.$value->id); ?>" data-toggle="tooltip" title="Edit" class="btn btn-primary">
           <i class="fa fa-pencil"></i>
          </a>
         </td>
        </tr>
       <?php } ?>
      
       </tbody>
      </table>
     </div>
    </form>
    <div class="row">
              <div class="col-sm-6 text-left">
        <ul class="pagination">
        <?php echo $links; ?>
        </ul>
        </div>
              <div class="col-sm-6 text-right">Showing <?php echo $offset; ?> to <?php echo $offset+count($detail); ?> of <?php echo $total_rows; ?> (<?php echo $pages; ?> Pages)</div>
            </div>
   </div>
  </div>
 </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Import City</h4>
      </div>
      <?php echo form_open_multipart('admin/import_city','class="form-inline"');?>

      <div class="modal-body">
        <p>Follow this steps.</p>

        <p>Step 1: Download this csv file <span>&nbsp;&nbsp;&nbsp; <a href="<?php echo ADMIN_CATALOG.'city.csv'; ?>"><button type="button" class="btn btn-primary"> Download</button></a></span></p>
        <p>Step 2: Fill entry</p>
        <p>Step 3: upload fill csv</p>


       <div class="form-group">
          <label class="">Select State </label>
          <select name="state_id" class="form-control" required="required">
          	<option value=""> select option</option>
          	<?php foreach ($state_list as $key => $value): ?>
          		<option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
          	<?php endforeach ?>
          </select>
        </div>
        <div class="form-group">
          <label  for="email">Upload Csv</label>
          <input type="file" name="csv" class="form-control" >
        </div>
       
        
      </div>
      <div class="modal-footer">

        <button type="submit" class="btn btn-success">Submit</button>
      
      </div>
      </form>
    </div>

  </div>
</div>