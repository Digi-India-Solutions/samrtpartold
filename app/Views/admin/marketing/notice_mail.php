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
                     "> <?php echo $subject; ?></span><br>
                  <!--<p style="-->
                  <!--   font-size: 27px;-->
                  <!--   color: #616161;-->
                  <!--   ">Your Order have been <?php echo $order->order_status_name; ?></p>-->
               </h2>
            </div>
         
            <table class="table table-borderless order-table" style="
               width: 100%;
               margin-bottom: 1rem;
               color: #212529;
               border-collapse: collapse;
               ">
               <tbody>
                    
                 <tr style="font-size:17px">
                   <td>Message</td>
                   <td><?php echo $message; ?></td>
                </tr>
                
              
                 <tr style="font-size:17px">
                   <td>Date </td>
                   <td><?php echo date('d-M-Y :H:i A'); ?></td>
                </tr>                  
               </tbody>
            </table>
           
           
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
                  ">Continue Shopping </a>
            </div>
         </div>
      </div>
   </div>
</section>

</body>

</html>