<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
     
        <button type="button" data-toggle="tooltip" title="Delete" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#form-customer').submit() : false;"><i class="fa fa-trash-o"></i></button>
      </div>
      <h1>Complaints</h1>
      <ul class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>
        <li><a href="<?php echo base_url('admin/complaint'); ?>">Complaints</a></li>
      </ul>
    </div>
  </div>
  <div class="container-fluid">  
    <div class="row">
      <div id="filter-customer" class="col-md-3 col-md-push-9 col-sm-12 hidden-sm hidden-xs">
        <form action="" id="filter_form" method="GET">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-filter"></i> Filters</h3>
            <!--<button type="submit" id="export" class="btn btn-success pull-right" style="padding: 3px;margin-top: -4px;"><i class="fa fa-download"></i> Export Customer</button>-->
          </div>
          <div class="panel-body">
            <div class="form-group">
              <label class="control-label" for="input-name">Customer Name</label>
              <input type="text" name="name" value="<?php echo @$_GET['name']; ?>" placeholder="Customer Name" id="input-name" class="form-control" />
            </div>
            <div class="form-group">
              <label class="control-label" for="input-email">E-Mail</label>
              <input type="text" name="email" value="<?php echo @$_GET['email']; ?>" placeholder="E-Mail" id="input-email" class="form-control" />
            </div>
         
                
        
            <div class="form-group text-right">
              <button type="submit" id="button-filter" class="btn btn-default"><i class="fa fa-filter"></i> Filter</button>
            </div>
          </div>
        </div>
      </form>
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
    
    
            <h3 class="panel-title"><i class="fa fa-list"></i> Customer List</h3>
          </div>




          <div class="panel-body">
            <form action="<?php echo $form_action; ?>" method="post" enctype="multipart/form-data" id="form-customer">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
                    <td class="text-left">Name</td>
                    <td class="text-left">E-Mail</td>
                    <td class="text-left">Mobile</td>
                    <td class="text-left">Purchase Date</td>
                    <!--<td class="text-left">Channel ID</td>-->
                    <td class="text-left">Product</td>
                    <td class="text-right">Date Added</td>
                    <td class="text-right">Action</td>
                  </tr>
                </thead>
                <tbody>
                
                  <?php if (!empty($detail)) {foreach ($detail as $key => $value) {?>
               <tr>   
              <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $value->id; ?>" /></td>
              <td class="text-center"><?php echo $value->name; ?></td>
              <td class="text-center"><?php echo $value->email; ?></td>
              <td class="text-center"><?php echo $value->phone; ?></td>
              <td class="text-center"><?php echo $value->purchase_date; ?></td>
              <!--<td class="text-center"><?php echo $value->channel_name; ?></td>-->
              <td class="text-center"><?php echo $value->product_name; ?></td>
              <td class="text-center"><?php echo $value->create_date; ?></td>
          
              <td class="text-center"><a href="<?php echo base_url('admin/view_complain/'.$value->id); ?>"><button type="button" class="btn btn-info"><i class="fa fa-eye"></i>&nbsp;View</button></a></td>
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
			  <?php echo $links; ?>
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
    $('form#filter_form').attr('action','admin/Customer/export');
 
  });
</script>
