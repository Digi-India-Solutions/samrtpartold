<html style=""><head>
<meta charset="utf-8">
<title>Invoice</title>
<link rel="icon" type="image/x-icon" href="<?php echo base_url($config['config_favicon']); ?>">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body onafterprint="print_action()" style="background: rgb(249, 249, 249);margin: 0px;font-family: sans-serif;font-size: 13px;">
<div class="mail-body" style="
    width: 900px;
    max-width: 95%;
    margin: 0 auto;
    background: #fff;
">
    <header style="
    padding: 20px 20px;
    border-bottom: 1px solid #090c421c;
">
<div class="row">
    <div class="col-md-6" style="
    width: 30%;
    display: inline-block;
">
        <img src="<?php echo base_url('assets/frontend/images/logo.png'); ?>" alt="logo" title="Smart Parts" style="
    display: block;
    width: 200px;
">
    </div>
    <div class="col-md-6" style="
    font-size: 11px;
    width: 69%;
    display: inline-block;
    text-align: right;
">
<b style="
    font-size: 14px;
"> <?php echo $config['b_name']; ?></b>
<p style="
    line-height: 17px;
    margin-top: 2px;
">
<?php echo $config['b_address']; ?><br>
MOB: <?php echo $config['b_mobile']; ?><br>
GST: <?php echo $config['b_gst']; ?><br>
EMAIL: <?php echo $config['b_email']; ?>
</p>
    </div>
</div>
        
    </header>


    <article style="
    padding: 40px 50px;

">
<h2 style="
    font-size: 16px;
    margin-top: 0;
    color: #090c42;
">Shipping Detail:</h2>

<table border="1" cellpadding="10" width="100%" style="
    border-collapse: collapse;
    text-align: left;
    font-size: 13px;
    border-color: #e1e1e1 !important;
    margin-bottom: 30px;
">
            <tbody><tr>
                <th>Place &amp; Date :</th>
                <td><?php echo $order->payment_city; ?> , <?php echo date('d M Y',strtotime($order->date_added)); ?></td>
            </tr>
            <tr>
                <th>Sold To :</th>
                <td><?php echo ucwords($order->firstname.' '.$order->lastname); ?> </td>
            </tr>
            <tr>
                <th>Address :</th>
                <td><?php echo $order->payment_company.' '.$order->payment_address_1.' '.$order->payment_address_2.' '.$order->payment_city.' '.$order->payment_postcode.' '.$order->country_name; ?></td>
            </tr>
            <tr>
                <th>Phone No. :</th>
                <td><?php echo $order->telephone; ?></td>
            </tr>
            <!-- <tr>
                <th>Order :</th>
                <td>Auto Parts</td>
            </tr> -->
        </tbody></table>
<h2 style="
    font-size: 16px;
    margin-top: 0;
    color: #090c42;
">Order Detail: SPE#<?php echo $order->id; ?></h2>

<table border="1" cellpadding="10" width="100%" style="
    border-collapse: collapse;
    text-align: left;
    font-size: 13px;
    border-color: #e1e1e1 !important;
    margin-bottom: 20px;
">
            <tbody>

                <tr>
                    <th>S.no</th>
                    <th>Part No.</th>
                    <th>Product Name</th>
                    <th style="text-align: center;">Brand</th>
                    <th style="text-align: center;">Qty</th>
                    <th style="text-align: center;">USD (EXW) Price</th>
                    <th style="text-align: center;">Total USD (EXW) Price</th>
                </tr>

                <?php if (!empty($product_list)) {
                    $i=1;
                    $subtotal = 0;
                    $t_qty = 0;
                    foreach ($product_list['product'] as $key1 => $value) {
                     $subtotal += $value->price*$value->quantity;
                     $t_qty += $value->quantity;
                      ?>

                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $value->part_no; ?></td>
                    <td><?php echo $value->name; ?></td>
                    <td><?php echo $value->brand_name; ?></td>
                    <td style="text-align: center;"><?php echo $value->quantity; ?></td>
                    <td style="text-align: center;"><?php echo $value->price; ?></td>
                    <td style="text-align: center;"><?php echo $value->total; ?></td>
                </tr>
              <?php } } ?>

           
                <tr>
                    <th colspan="5" style="text-align: right;">Sub Total</th>
                    <td style="text-align: center;"></td>
                    <td style="text-align: center;"><?php echo $subtotal; ?></td>
                </tr>
             

                <?php if (!empty($taxes)){foreach ($taxes as $key => $tax){?>
                <tr>
                    <th colspan="5" style="text-align: right;"><?php echo $tax->name; ?> <?php echo $tax->description; ?> </th>
                    <td style="text-align: center;"></td>
                    <td style="text-align: center;">+ <?php echo $tax->tax; ?></td>
                </tr>
               <?php } } ?>


              <?php if (!empty($order->shipping_charge)) {?>
                <tr>
                    <th colspan="5" style="text-align: right;">Shipping Charge</th>
                    <td style="text-align: center;"></td>
                    <td style="text-align: center;">+ <?php echo $order->shipping_charge; ?></td>
                </tr>
              <?php } ?>
               <?php if (!empty($order->discount) && $order->discount >0) {?>
                <tr>
                    <th colspan="5" style="text-align: right;">Discount</th>
                    <td style="text-align: center;"></td>
                    <td style="text-align: center;">- <?php echo $order->discount; ?></td>
                </tr>
              <?php } ?>

                <tr>
                    <th colspan="5" style="text-align: right;">Total</th>
                    <td style="text-align: center;"></td>
                    <td style="text-align: center;"><?php echo $order->total; ?></td>
                </tr>

        </tbody></table>
        <b style="
    font-size: 12px;
">AMOUNT IN USD (EXW)  :  <?php echo convert_number($order->total); ?></b>



<h2 style="
    font-size: 16px;
    margin-top: 0;
    color: #090c42;
    margin-top: 30px;
">Addtional Details:</h2>

<table border="1" cellpadding="10" width="100%" style="
    border-collapse: collapse;
    text-align: left;
    font-size: 13px;
    border-color: #e1e1e1 !important;
    margin-bottom: 30px;
">
            <tbody>
                <tr>
                    <th>Terms of Payment</th>
                    <td><?php echo $config['b_terms']; ?></td>
                </tr>
                <tr>
                    <th>Dispatch Time</th>
                    <td><?php echo $config['b_dispatch']; ?></td>
                </tr>
                <tr>
                    <th>Validity</th>
                    <td><?php echo $config['b_validity']; ?></td>
                </tr>
                
        </tbody></table>


        <h2 style="
    font-size: 16px;
    margin-top: 0;
    color: #090c42;
">Beneficiary Details:</h2>

<table border="1" cellpadding="10" width="100%" style="
    border-collapse: collapse;
    text-align: left;
    font-size: 11px;
    border-color: #e1e1e1 !important;
">
            <tbody>
                <tr>
                    <th>Name of the recipient :</th>
                    <td><?php echo $config['b_name']; ?></td>
                    <th>Address :</th>
                    <td><?php echo $config['b_address']; ?></td>
                </tr>
                <tr>
                    <th>Bank Account number :</th>
                    <td><?php echo $config['b_account_no']; ?></td>
                    <th>Beneficiary Bank :</th>
                    <td><?php echo $config['b_bank']; ?></td>
                </tr>
                <tr>
                    <th>Bank address :</th>
                    <td><?php echo $config['b_bank_address']; ?></td>
                    <th>Swift Code :</th>
                    <td><?php echo $config['b_swift_code']; ?></td>
                </tr>
                <tr>
                    <th>IFSC Code :</th>
                    <td><?php echo $config['b_ifse']; ?></td>
                    <th>Purpose of remittance :</th>
                    <td><?php echo $config['b_purpose']; ?></td>
                </tr>
                <tr>
                    <th>Amount of remittance :</th>
                    <td colspan="3"><?php echo $order->total; ?></td>
                </tr>
               
                
        </tbody></table>

        <table cellpadding="10" width="100%" style="
    border-collapse: collapse;
    text-align: left;
    font-size: 12px;
    line-height: 17px;
">
            <tbody>
                <tr>
                    <td><?php echo $config['b_declaration']; ?><br><b> <?php echo $config['b_name']; ?></b></td>
                    <td>Date<br><b><?php echo date('d M Y',strtotime($order->date_added)); ?></b></td>
                </tr>
                
               
        </tbody></table>

        <div class="stamp" style="background-image: url('<?php echo base_url('assets/frontend/images/spe-stamp.jpg'); ?>');height: 100px;background-repeat: no-repeat;background-position: right;"></div>


                  <div class="text-center" id="divprint">
                    <button class="btn btn-info" id="print">Print</button>
                  </div> 
             


    
    </article>

 
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