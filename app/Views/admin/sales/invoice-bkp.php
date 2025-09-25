<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="UTF-8" />
<title><?php echo $page_title; ?></title>
<base href="http://localhost/opencart/admin/" />
<link href="view/javascript/bootstrap/css/bootstrap.css" rel="stylesheet" media="all" />
<script type="text/javascript" src="view/javascript/jquery/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="view/javascript/bootstrap/js/bootstrap.min.js"></script>
<link href="view/javascript/font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
<link type="text/css" href="view/stylesheet/stylesheet.css" rel="stylesheet" media="all" />
</head>
<body>
<div class="container">
    <div style="page-break-after: always;">
    <h1>Invoice #<?php echo $order->id; ?></h1>
    <table class="table table-bordered">
      <thead>
        <tr>
          <td colspan="2">Order Details</td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td style="width: 50%;"><address>
			<strong>FSAS</strong><br />
			<?php echo $config['config_address']; ?>
			</address>
			<b>Telephone</b> <?php echo $config['config_telephone']; ?><br />
			<b>E-Mail</b> <?php echo $config['config_email']; ?><br />
			<b>Web Site:</b> <a href="<?php echo base_url(); ?>"><?php echo base_url(); ?></a></td>
			<td style="width: 50%;"><b>Date Added</b> <?php echo $order->date_added; ?><br />
			<b>Order ID:</b> #<?php echo $order->id; ?><br />
			<b>Payment Method</b> Prepaid<br />
		
			</td>
        </tr>
      </tbody>
    </table>
    <table class="table table-bordered">
      <thead>
        <tr>
          <td style="width: 50%;"><b>Billing Address</b></td>
          <td style="width: 50%;"><b>Seller Address</b></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
          <address>
           <?php echo $order->firstname.' '.$order->lastname; ?><br>
                <?php echo $order->payment_company; ?><br>
                <?php echo $order->payment_address_1; ?><br>
                <?php echo $order->payment_address_2; ?><br>
                <?php echo $order->payment_city; ?><br>
                <?php echo $order->payment_postcode; ?><br>
                <?php echo $order->country_name; ?><br> </address>
            </td>
          <td> </address>
            <?php echo $config['config_address']; ?>
            </address></td>
        </tr>
      </tbody>
    </table>
    <table class="table table-bordered">
      <thead>
        <tr>
               <td class="text-left">Product</td>
              <td class="text-left">Model</td>
              <td class="text-left">Option</td>
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
            <td class="text-left"><a href="<?php echo base_url('product-detail/'.$value->product_seo_url); ?>" target="_blank"><?php echo $value->name; ?></a> </td>
            <td class="text-left"><?php echo $value->model; ?></td>
            <td class="text-right"><?php foreach ($product_list['option'][$key1] as $key => $row) { echo  $row->name.' , ';
            }; ?></td>
            <td class="text-right"><?php echo $value->quantity; ?></td>
            <td class="text-right"><?php echo round($value->price,2); ?></td>
            <td class="text-right"><?php echo $value->price*$value->quantity; ?></td>
          </tr>
          <?php } } ?> 
                
          <tr>
            <td colspan="5" class="text-right">Sub-Total</td>
            <td class="text-right"><?php echo $subtotal; ?></td>
          </tr>
          <tr>
            <td colspan="5" class="text-right">Discount</td>
            <td class="text-right"><?php echo $order->discount?' - '.$order->discount:'0'; ?></td>
          </tr>
          <tr>
            <td colspan="5" class="text-right">Total</td>
            <td class="text-right"><?php echo $subtotal - $order->discount; ?></td>
          </tr>
         </tbody>
    </table>
      </div>
      <div class="text-center" id="divprint">
      	<button class="btn btn-info" id="print">Print</button>
      </div>
  </div>

<script type="text/javascript">
	$('#print').on('click',function(){
		$('#divprint').hide();
		window.print();

	});
</script>

</body>
</html>



