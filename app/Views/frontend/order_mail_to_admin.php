<html style=""><head>
<meta charset="utf-8">
<title>New Order</title>
</head>
<body style="background: rgb(249, 249, 249); margin: 0px; font-family: sans-serif;">
<div class="mail-body" style="
    width: 700px;
    max-width: 95%;
    margin: 0 auto;
    background: #fff;
">
    <header style="
    padding: 20px 20px;
    border-bottom: 1px solid #090c421c;
">
        <img src="<?php echo base_url('assets/frontend/images/logo.png'); ?>" alt="logo" title="Smart Parts" style="
    display: block;
    width: 200px;
    margin: 0 auto;
">
    </header>

    <div class="fillbox" style="
    background-image: url('<?php echo base_url('uploads/images/1638957440_562f1e0e81876794c06b.png') ?>');
    background-color: #090c42;
    color: #fff;
    text-align: center;
    padding: 60px 0;
    background-size: cover;
">
        <h1 style="
    margin: 0;
    font-size: 25px;
    text-shadow: 2px 1px black;
">New Order Received</h1>
    </div>

    <article style="
    padding: 40px 50px;

">
    <h1 style="
    margin-top: 0;
    font-size: 20px;
    line-height: 27px;
    margin-bottom: 10px;
">Your have a new order received from <?php echo $wconfig['config_name'];?></h1>
  
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
">
            <tbody><tr>
                <th>First Name :</th>
                <td><?php echo $order->firstname; ?></td>
            </tr>
            <tr>
                <th>Last Name :</th>
                <td><?php echo $order->lastname; ?></td>
            </tr>
            <tr>
                <th>Email :</th>
                <td><?php echo $order->email; ?></td>
            </tr>
            <tr>
                <th>Phone :</th>
                <td><?php echo $order->telephone; ?></td>
            </tr>
            <tr>
                <th>Shipping Address :</th>
                <td><?php echo $order->payment_address_1.' ,'. $order->payment_address_2 .'<br>'.$order->payment_city.' '.$order->payment_postcode.' '.$order->country_name; ?></td>
            </tr>
            <tr>
                <th>Status :</th>
                <td><?php echo $order_status_name; ?></td>
            </tr>
        </tbody></table>
    <hr style="
    margin: 30px 0 30px 0px;
    background: aliceblue;
    opacity: 0.5;
">
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
">
            <tbody>
                <tr>
                    <th>S.no</th>
                    <th>Product Name</th>
                    <th style="text-align: center;">USD Price</th>
                    <th style="text-align: center;">Qty</th>
                    <th style="text-align: center;">Subtotal</th>
                </tr>

                  <?php
                        $subtotal = 0;
                       foreach($product as $row){ $subtotal += $row->total; ?>
                
                <tr>
                    <td>1</td>
                    <td><?php echo $row->name; ?></td>
                    <td style="text-align: center;"><?php echo $row->price; ?></td>
                    <td style="text-align: center;"><?php echo $row->quantity; ?></td>
                    <td style="text-align: center;"><?php echo @$row->total; ?></td>
                </tr>
               
               <?php } ?>
                <tr>
                    <th colspan="3" style="text-align: right;">Subtotal</th>
                    <td style="text-align: center;"><?php echo count($product); ?></td>
                    <td style="text-align: center;"><?php echo $subtotal; ?></td>
                </tr>
                
                 <?php if (!empty($taxes)){foreach ($taxes as $key => $tax) {?>
               
                  <tr>
                    <th colspan="3" style="text-align: right;"><?php echo $tax->name; ?></th>
                    <td style="text-align: center;"></td>
                    <td style="text-align: center;">+ <?php echo $tax->tax; ?></td>
                </tr>   
                <?php }} ?>
                
                
                <?php if (!empty($order->shipping_charge)): ?>
                  <tr>
                    <th colspan="3" style="text-align: right;">Shippping Charge</th>
                    <td style="text-align: center;"></td>
                    <td style="text-align: center;">+ <?php echo $order->shipping_charge; ?></td>
                </tr>   
                <?php endif ?>
               <?php if(!empty($order->discount)){?>
                <tr>
                    <th colspan="3" style="text-align: right;    color: #1f93ff;">Coupon Code (<?php echo $order->coupon_code; ?>)</th>
                    <td style="text-align: center;"></td>
                    <td style="text-align: center;">- <?php echo $order->discount; ?></td>
                </tr>
            <?php } ?>

             <?php if(!empty($order->token_amount) && $order->token_amount>0 ){?>
                <tr>
                    <th colspan="3" style="text-align: right;    color: #1f93ff;">Token Amount</th>
                    <td style="text-align: center;"></td>
                    <td style="text-align: center;">-<?php echo $order->token_amount; ?></td>
                </tr>
            <?php } ?>

                <tr>
                    <th colspan="3" style="text-align: right;">Total</th>
                    <td style="text-align: center;"></td>
                    <td style="text-align: center;"><?php echo $order->total; ?></td>
                </tr>

        </tbody></table>
      <a href="<?php echo base_url(); ?>" target="_blank" style="
    text-decoration: none;
    background-color: #1f93ff;
    color: #fff;
    border-radius: 7px;
    padding: 15px 10px;
    display: block;
    width: 130px;
    text-align: center;
    margin: 50px auto 0 auto;
    font-size: 14px;
">Continue Shopping</a>

    
    </article>

    <footer style="
    background: #090c42;
    padding: 10px 20px;
">
        <div class="row">
            <div class="col-md-6" style="
    width: 49%;
    display: inline-block;
">
                <p style="
    margin: 0;
    color: #ffffff;
    font-size: 12px;
"><?php echo $wconfig['config_copywrite'];  ?></p>
            </div>

  <div class="col-md-6" style="
    width: 49%;
    display: inline-block;
    text-align: right;
">

<?php if (!empty($wconfig['config_facebook'])): ?>
 <a href="<?php echo $wconfig['config_facebook']; ?>" target="_blank" style="padding-right: 5px;"><img src="<?php echo base_url('assets/frontend/images/facebook-icon.png'); ?>" style="
    width: 20px;
    vertical-align: bottom;
"></a>
 <?php endif ?>


 <?php if (!empty($wconfig['config_instagram'])): ?>
<a href="<?php echo $wconfig['config_instagram']; ?>" target="_blank" style="
    padding-right: 5px;
"><img src="<?php echo base_url('assets/frontend/images/instagram-icon.png'); ?>" style="
    width: 20px;
    vertical-align: bottom;
"></a>
<?php endif ?>  


<?php if (!empty($wconfig['config_linkedin'])): ?>
    <a href="<?php echo $wconfig['config_linkedin']; ?>" target="_blank" style="
    padding-right: 5px;
"><img src="<?php echo base_url('assets/frontend/images/linkedin-icon.png'); ?>" style="
    width: 20px;
    vertical-align: bottom;
"></a>
<?php endif ?>  


 <?php if (!empty($wconfig['config_twitter'])): ?>
    <a href="<?php echo $wconfig['config_twitter']; ?>" target="_blank" style="
    padding-right: 5px;
"><img src="<?php echo base_url('assets/frontend/images/twitter-icon.png'); ?>" style="
    width: 20px;
    vertical-align: bottom;
"></a>
<?php endif ?> 
                
                
<?php if (!empty($wconfig['config_pinterest'])): ?>
 <a href="<?php echo $wconfig['config_pinterest']; ?>" target="_blank" style="
    padding-right: 5px;
"><img src="<?php echo base_url('assets/frontend/images/pinterest-icon.png'); ?>" style="
    width: 20px;
    vertical-align: bottom;
"></a>
<?php endif ?>   


 <?php if (!empty($wconfig['whatsapp'])): ?>
 <a href="https://api.whatsapp.com/send?phone=<?php echo $wconfig['whatsapp']; ?>&amp;text=Welcome To Smart Parts Exports" target="_blank"><img src="<?php echo base_url('assets/frontend/images/whatsapp-icon.png'); ?>" style="
    width: 20px;
    vertical-align: bottom;
"></a>
                   
<?php endif ?>  

                
                
            </div>
        </div>
    </footer>
</div>


</body></html>