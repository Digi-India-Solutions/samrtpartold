<?php 
$this->extend('layout/master_admin');
$this->section('page');
$validation = \Config\Services::validation(); 
?>
<div id="content">
    <style>
        .panel-body tr > td:last-child {
            max-width: 105px;
        }
        
        .panel-body tr > td:last-child>div {
            min-width: initial !important;
            text-align: center !important;
            display: flex;
            justify-content: center;
        }
        
        .panel-body tr > td:last-child>div>div {
            display: flex;
            justify-content: center;
        }
        
        .panel-body tr > td:last-child>div a {
            margin: 0 !important;
        }
        
        .panel-body tr > td {
            text-align: center;
        }
    </style>
 <div class="page-header">
  <div class="container-fluid">
   <div class="pull-right">
    <!--<button type="button" data-toggle="tooltip" title="Filter" onclick="$('#filter-order').toggleClass('hidden-sm hidden-xs');" class="btn btn-default hidden-md hidden-lg"><i class="fa fa-filter"></i></button>-->
    <!--<button type="submit" id="button-shipping" form="form-order" formaction="" formtarget="_blank" data-toggle="tooltip" title="Print Shipping List" class="btn btn-info"><i class="fa fa-truck"></i></button>-->
    <!--<button type="submit" id="button-invoice" form="form-order" formaction="" formtarget="_blank" data-toggle="tooltip" title="Print Invoice" class="btn btn-info"><i class="fa fa-print"></i></button>-->

      <button type="button" data-toggle="tooltip" title="Delete" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#form-order').submit() : false;"><i class="fa fa-trash-o"></i></button>
      

    <!--<a href="<?php echo base_url('admin/add_order'); ?>" data-toggle="tooltip" title="Add New" class="btn btn-primary"><i class="fa fa-plus"></i></a>-->
   </div>
   <h1>Orders</h1>
   <ul class="breadcrumb">
    <li><a href="<?php echo base_url('admin/dashboard');?>">Home</a></li>
    <li><a href="<?php echo base_url('admin/order');?>">Orders</a></li>
   </ul>
  </div>
 </div>




 <div class="container-fluid">
  <div class="row">
   <div id="filter-order" class="col-md-3 col-md-push-9 col-sm-12 hidden-sm hidden-xs">
    <form action="" id="filter_form">  
    <div class="panel panel-default">
     <div class="panel-heading">
      <h3 class="panel-title"><i class="fa fa-filter"></i> Filter</h3>
       <button type="button" id="export" class="btn btn-success pull-right" style="padding: 5px;margin-top: -6px;" ><i class="fa fa-download"></i> Export Order</button>
     </div>
     <div class="panel-body">
       <div class="form-group">
       <label class="control-label" for="input-date-added">Date Start</label>
       <div class="input-group date">
        <input type="date" name="date_added" value="<?php echo @$_GET['date_added']; ?>" placeholder="Date Added"   class="form-control" />
        
       </div>
      </div>
       <div class="form-group">
       <label class="control-label" for="input-date-added">Date End</label>
       <div class="input-group date">
        <input type="date" name="date_end" value="<?php echo @$_GET['date_end']; ?>" placeholder="Date End"  class="form-control" />
        
       </div>
      </div>
      <div class="form-group">
       <label class="control-label" for="input-order-id">Order ID</label>
       <input type="text" name="order_id" value="<?php echo @$_GET['order_id']; ?>" placeholder="Order ID" id="input-order-id" class="form-control" />
      </div>
      <div class="form-group">
       <label class="control-label" for="input-customer">Customer</label>
       <input type="text" name="name" value="<?php echo @$_GET['name']; ?>" placeholder="Customer" id="input-customer" class="form-control" />
      </div>

      <div class="form-group">
       <label class="control-label" for="input-customer">Email</label>
       <input type="email" name="email" value="<?php echo @$_GET['email']; ?>" placeholder="Email" id="input-customer" class="form-control" />
      </div>
      <!--<div class="form-group">-->
      <!-- <label class="control-label" for="input-order-status">Status</label>-->
      <!-- <select name="status_id" id="input-order-status" class="form-control">-->
      <!--   <option value="">option</option>-->
      <!--   <?php foreach ($status_list as $key => $value): ?>-->
      <!--      <option value="<?php echo $key; ?>" <?php echo $key==@$_GET['status_id']?'selected':''; ?>><?php echo $value; ?></option>-->
      <!--   <?php endforeach ?>-->
      <!-- </select>-->
      <!--</div>-->
      <div class="form-group">
       <label class="control-label" for="input-total">Total</label>
       <input type="text" name="total" value="<?php echo @$_GET['total']; ?>" placeholder="Total" id="input-total" class="form-control" />
      </div>
     
      <div class="form-group">
       <label class="control-label" for="input-order-status">Order Status</label>
       <select name="order_status_id" id="input-order-status" class="form-control">
         <option value="">select</option>
         <?php foreach ($order_status_list as $key => $value): ?>
            <option value="<?php echo $value->id; ?>" <?php echo $value->id==@$_GET['order_status_id']?'selected':''; ?>><?php echo $value->name; ?></option>
         <?php endforeach ?>
       </select>
      </div>
      <div class="form-group text-right">
        <a href="<?php echo base_url('admin/order'); ?>"><button type="button" class="btn btn-default">Reset</button></a> &nbsp;
       <button type="submit" id="button-filter" class="btn btn-info"><i class="fa fa-filter"></i> Filter</button>
      
      </div>
     </div>
    </div>
    </form>

   </div>
   <div class="col-md-9 col-md-pull-3 col-sm-12">
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
         
         
      <h3 class="panel-title"><i class="fa fa-list"></i> Order List</h3>
       <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#myModal" style="padding: 3px;margin-top: -4px;"><i class="fa fa-upload"></i>&nbsp; Import Orders</button>
   
     </div>
     <div class="panel-body">
         
       <?php echo form_open('admin/delete_orders','id="form-order"'); ?>
     
       <table class="table table-bordered table-hover">
        <thead>
         <tr>
          <td style="width: 1px;" class="text-center"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);" /></td>
          <td class="text-right">Order ID</td>
         
          <td class="text-left" >Customer</td>
          <td class="text-left">Order Status</td>
          <td class="text-right">Total</td>
           <!-- <td class="text-right">Transaction ID</td> -->
          <td class="text-left">Date Added</td>
         
          <td class="text-right">Action</td>
         </tr>
        </thead>
        <tbody>

          <?php if (!empty($detail)) {foreach ($detail as $key => $value) {?>
          <tr>
          <td class="text-center"><input type="checkbox" name="selected[]" value="<?php echo $value->id; ?>" /></td>
          <td class="text-center"><?php echo $wconfig['invoice_prefix']; ?>#<?php echo $value->id; ?></td>
         
          <td class="text-center" width="50px" style="width:50px;"><?php echo strtoupper($value->firstname.' '.$value->lastname); ?></td>
          <td class="text-center"><?php echo $value->current_status; ?></td>
          <td class="text-center"><?php echo $value->total; ?></td>
      
        <!--    <td class="text-center"><?php echo $value->payment_method=='cod'?'N/A':$value->txnid; ?></td> -->
          <td class="text-center"><?php echo date('d-m-Y h:i:A',strtotime($value->date_added)); ?></td>
      
          <td class="text-center">
              <div style="min-width: 120px;">
             

                  <div class="btn-group">
                      <a href="<?php echo base_url('admin/view_order/'.$value->id); ?>" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="View" style="margin-right: 4px;"><i class="fa fa-eye"></i></a>

                      <button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle"><span class="caret"></span></button>
                      <ul class="dropdown-menu dropdown-menu-right">
                      
                         <li><p style="margin-left: 21px;cursor: pointer;"  onclick="edit_order('<?php echo $value->id; ?>')"><i class="fa fa-pencil"></i> Edit</p></li> 
                        <li><a href="<?php echo base_url('admin/delete_order/'.$value->id); ?>" onclick="return confirm('Are You Sure?? You Want to delete ??');" ><i class="fa fa-trash-o"></i> Delete</a></li>
                      </ul>

                       <a target="_blank" href="<?php echo base_url('admin/invoice/'.$value->id); ?>" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="print Invoice" style="margin-right: 4px;"><i class="fa fa-print"></i></a>&nbsp;&nbsp;


                  </div>

                  
                                    
                  
                
              
                </div>
           
           </td>
       </tr>   

          <?php } }else{?>

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

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change Order Status</h4>
      </div>
      <?php echo form_open_multipart('admin/import_orders','class="form-inline"');?>

      <div class="modal-body">
        <div class="row">
          <div class="col-sm-6">
        <p>Follow this steps.</p>

        <p>Step 1: Download csv file</p>
        <p>Step 2: Fill entry</p>
        <p>Step 3: upload fill csv</p>
         <p> <a href="<?php echo ADMIN_CATALOG.'order_import.csv'; ?>"><button type="button" class="btn btn-primary"> Download CSV</button></a></p> 
          </div>
          <div class="col-sm-6">
             <p>Order Status ID</p>
             <?php foreach ($order_status_list as $key => $value): ?>
             <p><?php echo $value->name; ?> : <?php echo $value->id; ?> </p>
            <?php endforeach ?>
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


function edit_order(order_id){

if (order_id) {
    $.ajax({
      url:"<?php echo base_url('admin/move_product'); ?>",
      type:"POST",
      data:{order_id:order_id},
      success:function(data){
          if (data) { 
            window.location.href='admin/add_order/'+order_id;         
          }
       }
    });
  }
}



  $('#export').on('click',function(){
    $('form#filter_form').attr('type','submit',true);
    $('form#filter_form').attr('method','POST');
    $('form#filter_form').attr('action','admin/order_export');
    $('form#filter_form').submit();
  });

 $('#button-filter').on('click',function(){
    $('form#filter_form').attr('method','GET');
    $('form#filter_form').attr('action','admin/order',true);
    $('form#filter_form').submit();
  });


</script>

<?php echo $this->endSection();?>