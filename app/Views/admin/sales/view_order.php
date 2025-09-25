<?php 
$this->extend('layout/master_admin');
$this->section('page');
$validation = \Config\Services::validation(); 
?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right"><a href="<?php echo base_url('admin/invoice/'.$order->id); ?>" target="_blank" data-toggle="tooltip" title="Print Invoice" class="btn btn-info"><i class="fa fa-print"></i></a>
      <a href="<?php echo base_url('admin/swift_code/'.$order->id); ?>" data-toggle="tooltip" title="Swift Code" class="btn btn-info"><i class="fa fa-download"></i> Swift Code</a>
      
      <a href="<?php echo base_url('admin/order'); ?>" data-toggle="tooltip" title="Cancel" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1>Orders</h1>
      <ul class="breadcrumb">
                <li><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
                 <li><a href="javascript:void();"><?php echo $page_title; ?></a></li>
              </ul>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-shopping-cart"></i> Order Details</h3>
          </div>
          <table class="table">
            <tbody>
            
              <tr>
                <td><button data-toggle="tooltip" title="Date Added" class="btn btn-info btn-xs"><i class="fa fa-calendar fa-fw"></i></button></td>
                <td><?php echo date('d-m-Y h:i:A',strtotime($order->date_added)); ?></td>
              </tr>
              <tr>
                <td><button data-toggle="tooltip" title="Payment Method" class="btn btn-info btn-xs"><i class="fa fa-credit-card fa-fw"></i></button></td>
                <td><?php echo @$order->payment_method; ?></td>
              </tr>
              <tr>
              <td><button data-toggle="tooltip" title="Shipping Method" class="btn btn-info btn-xs"><i class="fa fa-truck fa-fw"></i></button></td>
              <td><?php echo $order->order_status_name; ?></td>
            </tr>

           </tbody>
            
          </table>
        </div>
      </div>
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-user"></i> Customer Details</h3>
          </div>
          <table class="table">
            <tr>
              <td style="width: 1%;"><button data-toggle="tooltip" title="Customer" class="btn btn-info btn-xs"><i class="fa fa-user fa-fw"></i></button></td>
              <td> <a href="" target="_blank"><?php echo $order->firstname.' '.$order->lastname; ?></a> </td>
            </tr>
          
            <tr>
              <td><button data-toggle="tooltip" title="E-Mail" class="btn btn-info btn-xs"><i class="fa fa-envelope-o fa-fw"></i></button></td>
              <td><a href="mailto:<?php echo $order->email; ?>"><?php echo $order->email; ?></a></td>
            </tr>
            <tr>
              <td><button data-toggle="tooltip" title="Telephone" class="btn btn-info btn-xs"><i class="fa fa-phone fa-fw"></i></button></td>
              <td><?php echo $order->telephone; ?></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><i class="fa fa-cog"></i> Options</h3>
          </div>
          <table class="table">
            <tbody>
              <tr>
                <td>Order ID</td>
                <td id="invoice" class="text-right">LF#<?php echo $order->id; ?></td>
               
              </tr>
                <tr>
                <td>Transaction ID</td>
                <td class="text-right"><?php echo $order->txnid; ?></td>
              </tr>
         
              <tr>
                <td>Payu Transaction ID</td>
                <td class="text-right"><?php echo $order->payu_id?$order->payu_id:'N/A'; ?></td>
              </tr>
       
              <?php if (!empty($order->discount) && $order->discount >0): ?>
              <tr>
                <td>Discount Coupon (<?php echo $order->coupon_code; ?>)</td>
                <td class="text-right">- <?php echo  $order->discount; ?></td>
               
              </tr>
              <?php endif ?>
             
           

             <!--  <tr>
                <td>Affiliate
                  </td>
                <td class="text-right">$0.00</td>
                <td class="text-center">
                  <button disabled="disabled" class="btn btn-success btn-xs"><i class="fa fa-plus-circle"></i></button>
                  </td>
              </tr> -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-info-circle"></i> Order (#<?php echo $order->id; ?>)</h3>
      </div>
      <div class="panel-body">
        <table class="table table-bordered">
          <thead>
            <tr>
              <td style="width: 50%;" class="text-left">Billing Address</td>
               <td style="width: 50%;" class="text-left">Seller Address</td>
              </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-left">
                <?php echo $order->firstname.' '.$order->lastname; ?><br>
                <?php echo $order->payment_company; ?><br>
                <?php echo $order->payment_address_1; ?><br>
                <?php echo $order->payment_address_2; ?><br>
                <?php echo $order->payment_city; ?><br>
                <?php echo $order->payment_postcode; ?><br>
                <?php echo $order->country_name; ?><br>
                
                 <?php echo $order->payment_note?'Comment: '.$order->payment_note:''; ?><br>
                </td>
                 <td class="text-left"><?php echo $config['config_address']; ?></td>
                
            </tr>
          </tbody>
        </table>
        <table class="table table-bordered">
          <thead>
            <tr>
              <td class="text-left">Product</td>
               <td class="text-left">Image</td>
              <td class="text-left">Part No.</td>
              <td class="text-left">Brand</td>
              <td class="text-right">Quantity</td>
              <td class="text-right">Unit Price</td>
              <td class="text-right">Total</td>
            </tr>
          </thead>
          <tbody>
          <?php if (!empty($product_list)) {
            $subtotal = 0;
            foreach ($product_list['product'] as $key1 => $value) { $subtotal += $value->price*$value->quantity; ?>
          
          <tr>
            <td class="text-left"><a title="click to view product" target="_blank" href="<?php echo base_url('product/'.$value->product_seo_url); ?>" target="_blank"><?php echo $value->name; ?></a> </td>
            <td class="text-left"><img src="<?php echo $value->option_image || $value->image?base_url($value->image):base_url($config_icon); ?>" width="80" height="80"></td>
            <td class="text-left"><?php echo $value->part_no; ?></td>

        
             <td class="text-right"><?php echo $value->brand_name?$value->brand_name:''; ?></td>
            
            <td class="text-right"><?php echo $value->quantity; ?></td>
            <td class="text-right"><?php echo round($value->price,2); ?></td>
            <td class="text-right">$ <?php echo $value->price*$value->quantity; ?></td>
          </tr>
          <?php } } ?>     
          <tr>
            <td colspan="6" class="text-right">Sub-Total</td>
            <td class="text-right">$ <?php echo $subtotal; ?></td>
          </tr>

           <?php if (!empty($taxes)){foreach ($taxes as $key => $tax){?>
          
            <tr>
            <td colspan="6" class="text-right"><?php echo $tax->name; ?></td>
            <td class="text-right">+ $ <?php echo $tax->tax; ?></td>
          </tr>
          <?php } } ?>


           <?php if (!empty($order->shipping_charge)): ?>
            <tr>
            <td colspan="6" class="text-right">Shipping Charge</td>
            <td class="text-right">+ $ <?php echo $order->shipping_charge; ?></td>
          </tr>
          <?php endif ?>
          <?php if (!empty($order->discount) && $order->discount>0): ?>
            <tr>
            <td colspan="6" class="text-right">Discount</td>
            <td class="text-right">- $ <?php echo $order->discount; ?></td>
          </tr>
          <?php endif ?>
           <?php if (!empty($order->token_amount) && $order->token_amount>0): ?>
            <tr>
            <td colspan="6" class="text-right">Token Amount</td>
            <td class="text-right">- $ <?php echo $order->token_amount; ?></td>
          </tr>
          <?php endif ?>
          <tr>
            <td colspan="6" class="text-right">Total</td>
            <td class="text-right">$ <?php echo $order->total; ?></td>
          </tr>
        </tbody>
          
        </table>
         </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-comment-o"></i> Order History</h3>
      </div>
      <div class="panel-body">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab-history" data-toggle="tab">History</a></li>
          <!-- <li><a href="#tab-additional" data-toggle="tab">Additional</a></li> -->
                  </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab-history">
            <div id="history">
              <?php if (!empty($order_history)) { ?>
                
              <div class="table-responsive">
               <table class="table table-bordered">
                <thead>
                  <tr>
                    <td class="text-left">Date Added</td>
                    <td class="text-left">Comment</td>
                    <td class="text-left">Status</td>
                    <td class="text-left">Customer Notified</td>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($order_history as $key => $value) {?>
                   
                 <tr>
                    <td class="text-left"><?php echo $value->date_added; ?></td>
                    <td class="text-left"><?php echo $value->comment; ?></td>
                    <td class="text-left"><?php echo $value->name; ?></td>
                    <td class="text-left"><?php echo $value->notify?'Yes':'NO'; ?></td>
                  </tr>
                  <?php } ?> 
                
              </tbody>
              </table>
               </div>
             <?php } ?>
            </div>
            <br />
            <fieldset>
              <legend>Add Order History</legend>
              <form class="form-horizontal" id="order_history">
                <input type="hidden" name="order_id" value="<?php echo $order->id; ?>">
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-order-status">Order Status</label>
                  <div class="col-sm-10">
                    <select name="order_status_id" id="input-order-status" class="form-control">
                      
                      <?php foreach ($order_status as $key => $value): ?>
                              <option value="<?php echo $value->id; ?>" <?php echo $value->id==$order->order_status?'selected':''; ?>><?php echo $value->name; ?></option>
                      <?php endforeach ?>
                                     
                    </select>
                  </div>
                </div>
              
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-notify">Notify Customer</label>
                  <div class="col-sm-10">
                    <input type="checkbox" name="notify" value="1" id="input-notify" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label" for="input-comment">Comment</label>
                  <div class="col-sm-10">
                    <textarea name="comment" rows="4" id="comment" class="form-control"><?php echo @$order->comment; ?></textarea>
                  </div>
                </div>

              
            </fieldset>
            <div class="text-right">
              <button class="btn btn-primary" type="submit">Submit</button>
            </div>
          </div>
          </form>

          <div class="tab-pane" id="tab-additional">                                     <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <td colspan="2">Browser</td>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>IP Address</td>
                    <td>::1</td>
                  </tr>
                                <tr>
                  <td>User Agent</td>
                  <td>Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36</td>
                </tr>
                <tr>
                  <td>Accept Language</td>
                  <td>en-US,en;q=0.9</td>
                </tr>
                  </tbody>
                
              </table>
            </div>
          </div>
           </div>
      </div>
    </div>
  </div>
  
</div>

 
 <script type="text/javascript">
   $('form#order_history').submit(function(e){
    var form = $(this);
    e.preventDefault();
    $.ajax({
      url:"<?php echo base_url('admin/add_history'); ?>",
      type:"POST",
      data:form.serialize(),
      success:function(data){
       if (data) {
           $('#comment').val('');
        $("#history").load(location.href + " #history"); 
        toastr.success('Status update success');
       }
      }
    });

   });
 </script>
 <?php echo $this->endSection();?>