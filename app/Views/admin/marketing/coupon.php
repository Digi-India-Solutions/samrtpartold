<?php 
$this->extend('layout/master_admin');
$this->section('page');
$validation = \Config\Services::validation(); 
?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
         <a  href="<?php echo base_url('admin/add_coupon'); ?>" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        <button type="submit" data-toggle="tooltip" title="Delete" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#form-customer').submit() : false;"><i class="fa fa-trash-o"></i></button>
      </div>
      <h1>Coupons</h1>
      <ul class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>
        <li><a href="<?php echo base_url('admin/customer'); ?>"><?php echo $page_title; ?></a></li>
      </ul>
    </div>
  </div>
  <div class="container-fluid">  
    <div class="row">
      <div id="filter-customer" class="col-md-12 col-sm-12 hidden-sm hidden-xs">
        <form action="" id="filter_form" method="GET">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-filter"></i> Filters</h3>
            <!--<button type="submit" id="export" class="btn btn-success pull-right" style="padding: 3px;margin-top: -4px;"><i class="fa fa-download"></i> Export Coupon</button>-->
          </div>
          
          <div class="panel-body">
              <div class="row">
                  <div class="col-md-4">
                      <div class="form-group">
                      <label class="control-label" for="input-name">Coupon Name</label>
                      <input type="text" name="name" value="<?php echo @$_GET['name']; ?>" placeholder="Customer Name" id="input-name" class="form-control" />
                    </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                      <label class="control-label" for="input-email">Coupon Code</label>
                      <input type="text" name="code" value="<?php echo @$_GET['code']; ?>" placeholder="Coupon Code" id="input-email" class="form-control" />
                    </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                          <div><label class="control-label" style="opacity:0">Actions</label></div>
                          <a href="<?php echo base_url('admin/coupon'); ?>"><button type="button" class="btn btn-default"><i class="fa fa-filter"></i> Reset</button></a>&nbsp;
                          <button type="submit" id="button-filter" class="btn btn-success"><i class="fa fa-filter"></i> Filter</button>
                        </div>
                  </div>
              </div>
            
            

            
          </div>

        </div>
      </form>
      </div>
      <div class="col-md-12 col-sm-12">
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
    
            <h3 class="panel-title"><i class="fa fa-list"></i> Coupon List</h3>
             <!--<button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#myModal" style="padding: 3px;margin-top: -4px;"><i class="fa fa-upload"></i>&nbsp; Import coupon</button>-->
    
          </div>




          <div class="panel-body">
           <?php echo form_open('admin/delete_coupon','id="form-coupon"'); ?> 
              <table class="table table-bordered table-hover">
                <thead>
                 <tr>
                    <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                    <td class="text-left">Coupon Name</td>
                    <td class="text-left">Coupon Code</td>
                    <td class="text-right">Discount</td>
                    <td class="text-left">Date Start</td>
                    <td class="text-left">Date End</td>
                    <td class="text-left">Status</td>
                    <td class="text-right">Action</td>
                    </tr>
                </thead>
                <tbody>
                
                <?php if(!empty($coupon)){
                foreach ($coupon as $key => $value) { ?>
                <tr>
                <td class="text-center"><input type="checkbox" name="selected[]" value="<?= $value->id; ?>"/>
                </td>
                <td class="text-left"><?= $value->coupon_name; ?></td>
                <td class="text-left"><?= $value->coupon_code; ?></td>
                <td class="text-right"><?= $value->coupon_discount; ?></td>
                <td class="text-left"><?= $value->start_date; ?></td>
                <td class="text-left"><?= $value->end_date; ?></td>
                <td class="text-left"><?= $value->status?'Enabled':'Disabled'; ?></td>
                <td class="text-right"><a href="<?= base_url(); ?>/admin/add_coupon/<?= $value->id; ?>" data-toggle="tooltip" title="Edit" class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                </tr>
                <?php }} else{ ?>
               <tr>
                  <td class="text-center" colspan="8">No results!</td>
                </tr>
                  <?php } ?>
                  
             </tbody>
                
              </table>
            </form>
            <div class="row">
              <div class="col-sm-6 text-left">
        <ul class="pagination">
        <?php if ($pager):?>    
        <?php echo $pager->links(); ?>
         <?php endif; ?>
        </ul>
        </div>
              <div class="col-sm-6 text-right">Showing <?php echo $offset; ?> to <?php echo $offset+count($coupon); ?> of <?php echo $total_rows; ?> (<?php echo $pages; ?> Pages)</div>
            </div>
          </div>
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
        <h4 class="modal-title">Import Coupon</h4>
      </div>
      <?php echo form_open_multipart('admin/Marketing/import_coupon','class="form-inline"');?>

      <div class="modal-body">
        <div class="row">
          <div class="col-sm-6">
        <p>Follow this steps.</p>

        <p>Step 1: Download csv file</p>
        <p>Step 2: Fill entry</p>
        <p>Step 3: upload fill csv</p>
        <p> <a href="<?php echo ADMIN_CATALOG.'coupon_import.csv'; ?>"><button type="button" class="btn btn-primary"> Download CSV</button></a></p>
          </div>
             
        </div>
        
        <div class="form-group">
          <label  for="email">Upload Csv</label>
          <input type="file" name="csv" class="form-control" required >
        </div>
 
      </div>
      <div class="modal-footer">

        <button type="submit" class="btn btn-success">Submit</button>
      
      </div>
      </form>
    </div>

  </div>
</div>


<script type="text/javascript">
  $('#export').on('click',function(){
    $('form#filter_form').attr('method','POST');
    $('form#filter_form').attr('action','admin/Marketing/export_coupon');
 
  });
</script>
<?php echo $this->endSection();?>