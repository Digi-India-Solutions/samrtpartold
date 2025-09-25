<html>
<head>
<title>Invoice</title>
<style type="text/css">
body {
    background-color: #eee;
    font-family: sans-serif;
}
	#page-wrap {
		width: 850px;
		margin: 0 auto;
        padding: 10px;
        background: #fff;
	}
	.center-justified {
		text-align: justify;
		margin: 0 auto;
		width: 30em;
	}
	table.outline-table {
		/* border: 1px solid; */
		border-spacing: 0;
	}
	tr.border-bottom td, td.border-bottom {
		border-bottom: 1px solid;
	}
	tr.border-top td, td.border-top {
		border-top: 1px solid;
	}
	tr.border-right td, td.border-right {
		border-right: 1px solid;
	}
	tr.border-right td:last-child {
		border-right: 0px;
	}
	tr.center td, td.center {
		text-align: center;
		vertical-align: text-top;
	}
	td.pad-left {
		padding-left: 5px;
	}
	tr.right-center td, td.right-center {
		text-align: right;
		padding-right: 50px;
	}
	tr.right td, td.right {
		text-align: right;
	}
	.blue-bg {
		background:#6d9eeb;
	}    
	.blue-color {
		color:#6d9eeb;
	}
    td {
        padding: 5px ;
        font-size: 14px;
    }
	.order_id p{
		margin: 5px 0 ;
	}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body onafterprint="print_action()">
	<div id="page-wrap">
		<table width="100%" class="outline-table">
			<tbody>
				<tr>
					<td colspan="3" align="center" style=" padding-top: 6px; font-size: 20px;position: relative;">
						<strong>Tax Invoice</strong>
						<p style="border: 1px solid;padding: 3px;position: absolute;font-size: 12px;right: 0;
						top: -10px;	"><strong style="  font-weight: 800;">Invoice Number </strong>LF#<?php echo $order->id; ?></p>
					</td>
				</tr>
				<tr>
					<td width="100%" style="vertical-align: middle;">
						<strong >Sold By: <?php echo $config['config_name']; ?></strong>
					</td>
				</tr>
				<tr>
					<td style="font-size: 11px;"><i><strong >Ship-from Address:</strong> <?php echo $config['config_address']; ?></i></td>
				</tr>
				<tr>
					<td><strong>GSTIN </strong>- <?php echo strtoupper($config['gstin']); ?></td>
				</tr>

				<table  width="100%" class="outline-table" style="	padding: 10px 0;">
					<tr class="border-top order_id">
						<td style="width: 30%;	vertical-align: top;" >
							<strong>Order ID: LF#<?php echo $order->id; ?></strong>
							<p><strong>Order Date:</strong> <?php echo date('d-m-Y H:i A',strtotime($order->date_added)); ?></p>
							<p><strong>Invoice Date:</strong> <?php echo date('d-m-Y H:i A'); ?></p>
							<p><strong>PAN:</strong> <?php echo strtoupper($config['pan']); ?></p>
						</td>
						<td style="width: 25%;">
							<strong>Bill To<br>	<?php echo ucwords($order->firstname.' '.$order->lastname); ?></strong>
							<p> 
					<?php echo $order->payment_company; ?>
                    <?php echo $order->payment_address_1; ?>
                    <?php echo $order->payment_address_2; ?>
                    <?php echo $order->payment_city; ?> 
                    <?php echo $order->payment_postcode; ?>
                    <?php echo $order->country_name; ?><br>
					Phone: <?php echo $order->telephone; ?></p>
						</td>
						<td style="width: 25%;">
							<strong>Ship To	<br><?php echo ucwords($order->firstname.' '.$order->lastname); ?></strong>
							<p> 
					 <?php echo $order->payment_company; ?>
                    <?php echo $order->payment_address_1; ?>
                    <?php echo $order->payment_address_2; ?>
                    <?php echo $order->payment_city; ?> 
                    <?php echo $order->payment_postcode; ?>
                    <?php echo $order->country_name; ?><br>
					Phone: <?php echo $order->telephone; ?></p>
						</td>
						<td style="width: 20%;text-align: center;padding: 0 10px;"><i style="font-size: 11px;">*Keep this invoice and
							manufacturer box for
							warranty purposes.</i></td>
					</tr>
				</table>
                
			</tbody>
		</table>
		<table width="100%" class="outline-table" style=" border-top: none;">
			<tbody>
				<tr class="border-top border-bottom" style="vertical-align: top;">
					<td width="18%" style="padding-bottom: 25px;"><strong>Product</strong></td>
					<td width="32%"  style="padding-bottom: 25px;"><strong>Title </strong></td>
					<td width="10%"   style="text-align: center;"> <strong>Variant</strong></td>
					<td width="1%"  style="text-align: center;"><strong>Qty</strong></td>
					
					<!-- <td width="10%" style="padding-bottom: 25px;text-align: center;"><strong>Discount $ </strong></td> -->
					<!-- <td width="10%"  style="padding-bottom: 25px;text-align: center;"><strong>Taxable	Value ₹  </strong></td> -->
					<!-- <td  width="10%"  style="padding-bottom: 25px;text-align: center;"><strong>Total Tax ₹</strong></td> -->
					<td width="10%"  style="padding-bottom: 25px;text-align: center;"> <strong>Total $</strong></td>
				</tr>

				 <?php if (!empty($product_list)) {
                    $subtotal = 0;
                    $t_qty = 0;
                    foreach ($product_list['product'] as $key1 => $value) {
                     $subtotal += $value->price*$value->quantity;
                     $t_qty += $value->quantity;
                      ?>

				<tr class="order_id">

				<td style="	font-size: 11px;"><?php echo $value->name; ?></td>
				<td style="	vertical-align: baseline;">
				 <strong><?php echo strip_tags($value->description); ?></strong>		
					</td>
					<td style="text-align: center;vertical-align: baseline;"><?php echo @$value->option?$value->option:'-'; ?></td>
					<td style="text-align: center;vertical-align: baseline;"><?php echo $value->quantity; ?></td>
					
					<td style="text-align: center;vertical-align: baseline;"><?php echo $value->total; ?></td>
				</tr>
				<?php } } ?>

           <!--      <tr class="">
					<td class="pad-left"></td>
					<td class=""><strong>Shipping Charge</strong></td>
					<td style="text-align: center;vertical-align: baseline;">1</td>
					<td style="text-align: center;vertical-align: baseline;">40.00</td>
					<td style="text-align: center;vertical-align: baseline;">-40.00</td>
					<td style="text-align: center;vertical-align: baseline;">0.00</td>
					<td style="text-align: center;vertical-align: baseline;">0.00</td>
					<td style="text-align: center;vertical-align: baseline;">0.00</td>
				</tr> -->
            <!--     <tr class="border-top" style="font-weight: 600;">
					<td ></td>
					<td class="center">Total</td>
					<td style="	padding: 10px 0;text-align: center;vertical-align: baseline;">1</td>
					<td style="text-align: center;">179.00</td>
					<td style="text-align: center;">-40.00</td>
					<td style="text-align: center;">117.80</td>
					<td style="text-align: center;">21.20</td>
					<td style="text-align: center;">139.00</td>
				</tr> -->

		<tr class="border-top" style="font-weight: 600;">
          <td colspan="2"></td>
          
          <td  colspan="2" style="text-align: left;font-size: 12px; padding-left: 40px;">Sub Total</td>             
          <td style="text-align: center;" ><?php echo $subtotal; ?></td>
        </tr>
      

        <?php if (!empty($order->discount)) {?>
         <tr class="border-top" style="font-weight: 600;">
          <td colspan="2"></td>
        
          <td  colspan="2" style="text-align: left;font-size: 12px; padding-left: 40px;">Discount</td> 
          <td style="text-align: center;"> - <?php echo $order->discount; ?></td>
        </tr>
         <?php } ?>
         <?php if (!empty($order->token_amount)) {?>
         <tr class="border-top" style="font-weight: 600;">
          <td colspan="2"></td>

          <td  colspan="2" style="text-align: left;font-size: 12px; padding-left: 40px;">Token Amount</td>
              
          <td style="text-align: center;"> - <?php echo $order->token_amount; ?></td>
        </tr>
        <?php } ?>

         <tr class="border-top" style="font-weight: 600;">
          <td colspan="2"></td>
        
          <td  colspan="2" style="text-align: left;font-size: 12px; padding-left: 40px;">Shipping Charge</td>  
          <td style="text-align: center;" > <?php echo $order->shipping_charge?' + '.$order->shipping_charge:'Free'; ?></td>
        </tr>



                <tr class="border-top">
					<td class="right-center" colspan="3" style="font-size: 18px;padding: 15px 0;" >Grand Total</td>
					<td class="right" colspan="2"  style="font-size: 18px;"><strong>$ <?php echo $order->total; ?></strong></td>
				</tr>
				
			</tbody>
		</table>
		<table style="height: 150px;display: block;"></table>
        <table width="100%" class="outline-table" style=" border-top: none;">
			<tbody>
				<tr>
					<td><img src="<?php echo base_url('uploads/images/1637142279_35c0a0d0073e1f336558.png'); ?>" style="    float: right;padding: 10px;	width: 100px;"></td>
				</tr>
				<tr >
					<td style="	font-size: 11px; ;line-height: 1.5;">
						<strong style="	font-size: 14px; ">Returns Policy:</strong> <i>At <?php echo $config['config_name']; ?> we try to deliver perfectly each and every time. But in the off-chance that you need to return the item, please do so with the </i>
						<strong style="	font-size: 14px; "> Brand box/pricetag, original packing and invoice</strong><i> without which it will be really difficult for us to act on your request. Please help us in helping you. Terms and conditions apply.</i>
					</td>
				</tr>   
			<tr>
              <td colspan="6" class="text-center">
                  <div class="text-center" id="divprint">
                    <button class="btn btn-info" id="print">Print</button>
                  </div> 
              </td>
          </tr>
			</tbody>
		</table>
	</div>



<script type="text/javascript">
$('#print').on('click',function(){
$('#divprint').hide();
window.print();

});

function print_action() {
$('#divprint').show();
}
</script>
</body>
</html>