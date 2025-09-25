<?php 
$this->extend('layout/master_admin');
$this->section('page');
$validation = \Config\Services::validation(); 
?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
         <a  href="<?php echo base_url('admin/add_customer'); ?>" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a>
        <button type="button" data-toggle="tooltip" title="Delete" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#form-customer').submit() : false;"><i class="fa fa-trash-o"></i></button>
      </div>
      <h1>Customers</h1>
      <ul class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>
        <li><a href="<?php echo base_url('admin/customer'); ?>">Customers</a></li>
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
            <button type="submit" id="export" class="btn btn-success pull-right" style="padding: 3px;margin-top: -4px;"><i class="fa fa-download"></i> Export Customer</button>
          </div>
          
          <div class="panel-body">
              
             <div class="row">
                 <div class="col-md-4">
                     <div class="form-group">
              <label class="control-label" for="input-name">Customer Name</label>
              <input type="text" name="name" value="<?php echo @$_GET['name']; ?>" placeholder="Customer Name" id="input-name" class="form-control" />
            </div>
                 </div>
                 <div class="col-md-4">
                      <div class="form-group">
              <label class="control-label" for="input-email">E-Mail</label>
              <input type="text" name="email" value="<?php echo @$_GET['email']; ?>" placeholder="E-Mail" id="input-email" class="form-control" />
            </div> 
                 </div>
                 <div class="col-md-4">
                       <div class="form-group">
                          <div><label class="control-label" style="opacity:0">Filter</label></div> 
              <button type="submit" id="button-filter" class="btn btn-default"><i class="fa fa-filter"></i> Filter</button>
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
    
    
            <h3 class="panel-title"><i class="fa fa-list"></i> Customer List</h3>
       </div>



          <div class="panel-body">
            <form action="<?php echo $form_action; ?>" method="post" enctype="multipart/form-data" id="form-customer">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                    <td class="text-left">E-Mail</td>
                    <td class="text-left">First Name</td>
                    <td class="text-left">Last Name</td>
                    <td class="text-left">Mobile</td>
                    <td class="text-left">Customer Group</td>
                    <td class="text-left">Country</td>
                    <td class="text-left">Status</td>
                    <!--<td class="text-left">Ip Address</td>-->
                    <td class="text-right">Date Added</td>
                    <td class="text-right">Action</td>
                  </tr>
                </thead>
                <tbody>
                
                  <?php if (!empty($detail)) {foreach ($detail as $key => $value) {?>
               <tr>   
              <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $value->id; ?>" /></td>
              <td class="text-left"><?php echo $value->email; ?></td>
              <td class="text-left"><?php echo $value->first_name; ?></td>
              <td class="text-left"><?php echo $value->last_name; ?></td>
              <td class="text-left"><?php echo $value->mobile; ?></td>
                  <td class="text-left"><?php echo $value->group_name; ?></td>
                      <td class="text-left"><?php echo $value->country_name?$value->country_name:'N/A'; ?></td>
              <td class="text-left"><?php echo $value->status==1?'Active':'Deactive'; ?></td>
              <!--<td class="text-left"><?php echo $value->ip; ?></td>-->
              <td class="text-left"><?php echo $value->create_date; ?></td>
              <td class="text-left"><a href="<?php echo base_url('admin/add_customer/'.$value->id); ?>"><button type="button" class="btn btn-info"><i class="fa fa-pencil"></i>&nbsp;Edit</button></a></td>
              </tr>
                 
                  <?php } } else{ ?>
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
              <div class="col-sm-6 text-right">Showing <?php echo $offset; ?> to <?php echo $offset+count($detail); ?> of <?php echo $total_rows; ?> (<?php echo $pages; ?> Pages)</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</div>

<script type="text/javascript">
  $('#export').on('click',function(){
    $('form#filter_form').attr('method','POST');
    $('form#filter_form').attr('action','admin/customer_export');
 
  });
</script>
<?php echo $this->endSection();?>