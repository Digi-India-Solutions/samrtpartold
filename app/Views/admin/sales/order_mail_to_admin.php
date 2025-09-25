<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    

<body style="margin: 0 !important; padding: 0 !important; background-color: #eeeeee;width: 830px" bgcolor="#eeeeee">
<section class="extravity_section cart active">
   <div class="container">
      <div class="col-sm-12 px-0" style="
         background-color: #eee;
         padding: 40px;
         ">
         <div class="white_wrapper mb-5" style="
            background-color: #fff;
            padding: 20px 50px 70px;
            margin-top: 50px;
            ">
             <a  href="<?php echo base_url();?>"  style="display: block; text-align: center; padding: 15px 0;background: #1d1d1d;">
                    <img src="<?php echo base_url('assets/frontend/images/logo.png'); ?>" class="img-fluid">
            </a>
            <div class="order-success section-head" style="
               text-align: center;
               margin: 0 auto;
               margin-bottom: 50px;
               max-width: 67%;
               ">
                
               
               <h2 style="background-image: url(<?php echo base_url('assets/frontend/images/emailer.png'); ?>);width: auto;display: inline-block;margin: 0px auto 15px;background-size: contain;padding: 30px 50px;font-weight: 600;color: #5c5c5c;font-size: 40px;">
                  <span style="font-size: 30px;
                     color: #ff834f !important;
                     ">New Order Received </span><br>
                  <p style="
                     font-size: 27px;
                     color: #616161;
                     ">Your have a new order received from lumiford</p>
               </h2>
            </div>
            <div class="order-head" style="
               display: flex;
               justify-content: space-between;
               border-bottom: 1px solid #ddd;
               margin-bottom: 20px;
               padding-bottom: 15px;
               ">
               <h3 style="
                  margin-left: 0;
                  font-size: 27px;
                  color: #5c5c5c;
                  margin-bottom: 0px;
                  font-weight: 600;
                  ">Shipping Detail <span style="
                  font-weight: 400;
                  font-size: 15px;
                  "></span> </h3>
            </div>
            <table class="table table-borderless order-table" style="
               width: 100%;
               margin-bottom: 1rem;
               color: #212529;
               border-collapse: collapse;
               ">
               <tbody>
                    
                 <tr style="font-size:17px">
                   <td>First Name</td>
                   <td><?php echo $order->firstname; ?></td>
                </tr>
                
                  <tr style="font-size:17px">
                   <td>Last Name</td>
                   <td><?php echo $order->lastname; ?></td>
                </tr>
                  <tr style="font-size:17px">
                   <td>Email</td>
                   <td><?php echo $order->email; ?></td>
                </tr>
                  <tr style="font-size:17px">
                   <td>Phone</td>
                   <td><?php echo $order->telephone; ?></td>
                </tr>
                  <tr style="font-size:17px">
                   <td>Shipping Address</td>
                   <td><?php echo $order->payment_address_1.' ,'. $order->payment_address_2 .'<br>'.$order->payment_city.' '.$order->payment_postcode.' '.$order->country_name; ?></td>
                </tr>

                <?php if ($order->payment_method !='cod') {?>
              
                  <tr style="font-size:17px">
                   <td>Transaction ID</td>
                   <td><?php echo $order->txnid; ?></td>
                </tr>

              <?php } ?>
                
                 <tr style="font-size:17px">
                   <td>Status</td>
                   <td><?php echo $order_status_name; ?></td>
                </tr>  
                
               </tbody>
            </table>
            <div class="order-head border-none mt-4 pt-5" style="
               border-bottom: none;
               border-top: 1px solid #ddd;
               margin-bottom: 20px;
               padding-bottom: 15px;
               display: flex;
               justify-content: space-between;
               ">
               <h3 style="
                  margin-left: 0;
                  font-size: 23px;
                  color: #5c5c5c;
                  margin-bottom: 0px;
                  font-weight: 600;
                  ">Order Detail <span style="
                  font-weight: 400;
                  font-size: 15px;
                  ">#<?php echo @$order->id; ?>  </span></h3>
               <h3 class="mr-0" style="
                  margin-left: 20px;
                  font-size: 23px;
                  color: #5c5c5c;
                  margin-bottom: 0px;
                  font-weight: 600;
                  margin-right: 0;
                  "><span style="
                  font-weight: 400;
                  font-size: 15px;
                  "></span></h3>
            </div>
            <div class="order-success-billing" style="
               border: 2px solid #c5c5c5;
               border-radius: 5px;
               ">
               <table class="table table-borderless" style="
                  width: 100%;
                  margin-bottom: 1rem;
                  color: #212529;
                  border-collapse: collapse;
                  border: none;
                  ">
                  <tbody style="
                     border: none;
                     ">
                      <?php
                        $subtotal = 0;
                       foreach($product as $row){ $subtotal += $row->total; ?>
                     <tr style="
                        border-bottom: 1px solid #c5c5c5;
                        ">
                        <td style="
                           padding: 25px 50px;
                           color: #666;
                           font-size: 17px;
                           font-weight: 500;
                           "><?php echo $row->name.' '.$row->option; ?>  -  <?php echo $row->price; ?> X <?php echo $row->quantity; ?></td>
                        <td style="
                           padding: 25px 50px;
                           color: #666;
                           font-size: 17px;
                           font-weight: 500;
                           text-align: right;
                           ">Rs. <?php echo @$row->total; ?>/-</td>
                     </tr>
                     <?php }  ?>
                     
                     
                     <tr class="sub-total">
                        <td style="
                           padding: 25px 50px;
                           color: #666;
                           font-size: 17px;
                           font-weight: 500;
                           padding-bottom: 0;
                           ">Subtotal ( <span><?php echo count($product); ?> Items</span>  ):</td>
                        <td style="
                           padding: 25px 50px;
                           color: #666;
                           font-size: 17px;
                           text-align: right;
                           font-weight: 500;
                           padding-bottom: 0;
                           ">Rs. <?php echo $subtotal; ?>/-</td>
                     </tr>
                       <tr class="sub-total">
                        <td style="
                           padding: 25px 50px;
                           color: #666;
                           font-size: 17px;
                           font-weight: 500;
                           padding-bottom: 0;
                           ">Shipping Charge :</td>
                        <td style="
                           padding: 25px 50px;
                           color: #666;
                           font-size: 17px;
                           text-align: right;
                           font-weight: 500;
                           padding-bottom: 0;
                           ">+ Rs. <?php echo $order->shipping_charge?$order->shipping_charge:0; ?>/-</td>
                     </tr>
                     <tr class="promo-code-order">
                        <td style="
                           color: #ff834f !important;
                           padding: 25px 50px;
                           color: #666;
                           font-size: 17px;
                           font-weight: 500;
                           padding-bottom: 0;
                           ">Promo Code (if applied):</td>
                        <td style="
                           color: #ff834f !important;
                           padding: 25px 50px;
                           color: #666;
                           font-size: 17px;
                           text-align: right;
                           font-weight: 500;
                           padding-bottom: 0;
                           "><?php echo $order->discount?'- Rs. '.$order->discount:'-'; ?></td>
                     </tr>
                     <tr class="summary-total">
                        <td style="
                           padding: 25px 50px;
                           color: #666;
                           font-size: 17px;
                           font-weight: 500;
                           ">Total:</td>
                        <td style="
                           padding: 25px 50px;
                           color: #666;
                           font-size: 17px;
                           text-align: right;
                           font-weight: 500;
                           ">Rs. <?php echo $order->total; ?>/-</td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <div class="pt-5 mt-5 text-center" style="
               text-align: center;
               margin-top: 40px;
               ">
              <a href="<?php echo base_url(); ?>" class="btn theme-btn mb-0" style="
                   margin: 0 auto;
                    border: 1px solid #b30000;
                    border-radius: 30px;
                    color: #fbfbfb!important;
                    padding-right: 45px;
                    padding-left: 30px;
                    padding: 15px 45px 15px 30px;
                    font-size: 14px;
                    text-decoration: none;
                    font-weight: 600;
                    background: #b30000;
                  ">Lumiford </a>
            </div>
         </div>
      </div>
   </div>
</section>

</body>

</html>