<?php 
$this->extend('layout/master');
$this->section('page');
?>

 <style type="text/css">
     input.required.nofillout{
  border-color: #f70101 !important;
}

select.required.nofillout{
 border-color: #f70101 !important;
}
</style>

<section class="smart-section cart-page-section">
<div class="container">
    <div class="section-head">
        <h2>Check<span>out</span></h2>
    </div>
    <div class="checkout-container">
    <div class="checkout-login-address-div">
        <div class="white-wrapper">
            <div class="login-user-id-div">
                <div class="label">Logged In</div>
                <div class="label-info">Customer | <?php echo $user->first_name.' '.$user->last_name; ?></div>
            </div>
        </div>
        <div class="white-wrapper">
            <div class="checkout-billing-address-div">
                <h3>Billing Address</h3>
                <div class="label-info">Select Address</div>
                <form class="billing-form" id="confirm_form" method="POST">
                   
                    <div class="form-group">
                        <select class="form-select" name="payment_address" id="address">
                          
                            <?php if (!empty($address)): ?>
                                <?php foreach ($address as $key => $value): ?>
                                    <option value="<?php echo $value->id; ?>"><?php echo $value->firstname.' '.$value->lastname.', '.$value->phone.', '.$value->address1.','.$value->city.', '.$value->pincode; ?></option>
                                <?php endforeach ?>
                            <?php endif ?>
                            <option value="new">Add New Address</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control input_clear required" placeholder="First Name" name="firstname" id="firstname" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control input_clear required" placeholder="Last Name" name="lastname"  id="lastname" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control input_clear required" placeholder="Email Id"  name="email" id="email" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="tel" class="form-control input_clear required" placeholder="Phone Number"  name="phone" id="phone" >
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control input_clear required mb-2" placeholder="Address Line 1" name="address1" id="address1"  >
                       
                        <input type="text"  name="address2" id="address2" class="form-control input_clear required" placeholder="Address Line 2">
                    </div>
                    <div class="form-row">
                        <input type="text" name="city"  id="city" class="form-control input_clear required" placeholder="City">

                         <input type="number" id="pincode"  name="pincode" class="form-control input_clear required" placeholder="Postal Code">
                    </div>
                    
                    <input type="hidden" name="txnid" value="<?php echo $txnid; ?>">
                    <input type="hidden" name="payment_method" id="payment_method" value="">


                    <div class="form-row">
                       <div class="col-md-6">
                        <div class="form-group">                      
                        <select name="country_id"  id="country_id" class="form-control required">
                            <option value="0"> Select </option>
                            <?php foreach ($country_list as $key => $value): ?>
                                <option value="<?php echo $value->id; ?>"><?php echo $value->name; ?></option>
                            <?php endforeach ?>
                        </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                       <div class="form-group"> 
                         <select name="state_id"  id="state_id" class="form-control required">
                           <option value=""> Select </option>
                         
                        </select>
                       </div>
                    </div>
                    <div class="col-md-6 col-12">
                      <div class="form-btn">
                        <button type="submit" id="confirm_btn" class="theme-btn full">PLACE ORDER</button>
                    </div>  
                        </div>
                    </div>

                    
                </form>
            </div>
        </div>
        </div>
        <div class="checkout-cart-div">
            <div class="white-wrapper">
                <div class="label">Cart</div>
                <div class="checkout-cart-items-div">
                   
                <?php if (!empty($carts)){
                $cart_count = count($carts);
                $subtotal = 0;
                $save_on = 0;
                $profit = 0;
               foreach ($carts as $key => $product) {
                  $subtotal +=  $product['price']*$product['p_quantity'];
                  $profit = $product['old_price'] - $product['price'];
                  $save_on += $profit*$product['p_quantity'];
                  
                ?>

                    <div class="checkout-cart-item">
                        <div class="checkout-cart-item-info">
                            <div class="checkout-cart-item-name"><?php echo $product['name']; ?></div>
                            <div class="checkout-cart-item-quantity">Quantity  <?php echo $product['p_quantity']; ?></div>
                        </div>
                        <div class="checkout-cart-item-price-div">
                            <div class="checkout-cart-item-price">$ <?php echo  $product['price']*$product['p_quantity']; ?>
                                
                            <?php if (!empty($product['save_percentage'])): ?>
                            <span><strike>MRP $ <?php echo $product['old_price']; ?></strike></span>
                              <?php endif ?>

                            </div>
                        </div>
                    </div>

                <?php } } ?>

                </div>
                
                <div class="checkout-coupon">
                    <form id="coupan_form">
                    <div class="form-group coupon-field">
                        <input type="text" class="form-control" name="code" placeholder="Apply Coupon" required />
                        <img src="assets/frontend/images/checkout-coupon.png" class="coupon-img">
                        <button type="submit"><i class="fa fa-chevron-right"></i></button>
                    </div>
                    </form>
                    
                    <?php if(!empty($discount)){?>
                        <p><?php echo $discount->coupon_code; ?> <a onclick="return confirm('Are you sure to remove coupon?');" href="<?php echo base_url('cancel-coupon/'.encrypt_url($discount->id)); ?>"><i class="fa fa-times"></i></a></p>
                    <?php } ?>
                    
                   <!-- <div class="checkout-coupon-offer">
                        <img src="assets/frontend/images/checkout-coupon.png" class="coupon-img">
                        <p>Apply Coupon</p>
                        
                    </div>-->
                </div>
               

                <div class="checkout-bill-details">
                    <div class="label">Bill Details</div>
                    <div class="checkout-item-total">
                        <p>Item Total</p>
                        <p class="checkout-cart-item-price"><b>$ <?php echo $subtotal; ?></b></p>
                          
                    </div>


                    <?php if (!empty($taxes)){ foreach ($taxes as $key => $tax) {?>
                    <div class="checkout-item-total">
                        <p><?php echo $tax['name'].' ('.$tax['rate'].' '.$tax['type'].')'; ?></p>
                        <p class="checkout-cart-item-price"><b>$ <?php echo $tax['tax_amount']; ?></b></p>
                          
                    </div>
                    <?php } } ?>



                    <?php if (!empty($discount)): ?>
                    <div class="checkout-item-total">
                         <p>Discount (<?php echo $discount->coupon_code; ?>)</p>
                          <p class="checkout-cart-item-price"><b> - $ <?php echo $discount->amount; ?></b></p>   
                    </div>
                     <?php endif ?>
                     
                      <?php if($total < $wconfig['cod_limit']){ $cod_charge = $wconfig['cod_charges']; ?>
                        <div class="checkout-item-total coddiv" style="display: none;" >
                         <p>Shipping Charge</p>
                          <p class="checkout-cart-item-price" id="shipping_charge" data-cod="<?php echo $cod_charge; ?>"><b> + $ <?php echo $wconfig['cod_charges']; ?></b></p>   
                        </div>
                      <?php } ?>


                        <?php if (!empty($wconfig['token_status'])){ ?>
                        <div class="checkout-item-total coddiv" style="display: none;" >
                         <p>Token amount to be paid right now</p>
                          <p class="checkout-cart-item-price item_price" id="token_amount" data-token_amount="<?php echo $token_amount; ?>"><b>  $ <?php echo $token_amount; ?></b></p>   
                        </div>
                      <?php } ?>
                     
                       <div class="label">Payment Method </div>
                       <?php if (!empty($wconfig['cod_status'])){ ?>
                         <div class="checkout-item-total">
                         <p>Cash On Delivery (C.O.D)</p>
                          <p class="checkout-cart-item-price"> <input type="radio" class="form-check-input" name="payment_method" id="cod" value="cod"> </p>   
                        </div>
                       <?php } ?>
                         <?php if (!empty($wconfig['payu_status'])){ ?>
                         <div class="checkout-item-total">
                         <p>Online (Card/Net Banking/UPI) </p>
                          <p class="checkout-cart-item-price"> <input type="radio" class="form-check-input" name="payment_method" id="payumoney" value="payumoney"></p>
                        </div>
                       <?php } ?>
                     
                     
                    <div class="checkout-pay-total">
                        <p id="total_msg">You Pay</p>
                        <p id="total" data-total="<?php echo $total; ?>"><b>$ <?php echo $total; ?></b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>


<script type="text/javascript">


$('#cod').on('click',function(){
   var method =   $('#cod').val();
   $('#payment_method').val(method);
    
  var final = 0;
  var scharge = 0; //shiping charge variable
  
  $('.coddiv').each(function(){
      $(this).show();
  });
  
  $('#shipping_charge').show();
  $('#token_amount').show();

  var real_price = $('#total').data('total');
  var shipping_charge = $('#shipping_charge').data('cod');

  if(shipping_charge){
    scharge = shipping_charge;
    var final = real_price + shipping_charge;
    $('#total').html('$ '+final.toFixed(2));
  }

  
  var token_amount = $('#token_amount').data('token_amount');
  if(token_amount){

    var final = real_price + scharge - token_amount;
    $('#total_msg').html('Pay Pending amount on delivery');
    $('#total').html('$ '+final);
  }

});





$('#payumoney').on('click',function(){
   $('.coddiv').each(function(){
      $(this).hide();
  });    
   var method =   $('#payumoney').val();
    $('#payment_method').val(method);
    
  var real_price = $('#total').data('total');
  $('#total').html('$ '+real_price);
   $('#total_msg').html('You Pay');
  $('#shipping_charge').hide();
  $('#token_amount').hide();
});





$('select#country_id').on('change',function(){
  var country_id = $(this).val();
  if (country_id) {
    $.ajax({
      url:"<?php echo base_url('get_state'); ?>",
      type:"POST",
      data:{country_id:country_id},
      success:function(data){
        $('#state_id').html(data);
      }
    });
  }
});


$('select#address').on('change',function(){
var id = $(this).val();
address_detail(id);
});


$(document).ready(function(){
var id =   $('select#address').val();
address_detail(id);
});


function address_detail(id){

if (id=='new') {
    $('.input_clear').each(function(){
        $(this).val('');
    });
    
      $('#country_id').val(0);
      $('#state_id').html('');
}else{

    $.ajax({
        url:"<?php echo base_url('get_address_detail'); ?>",
        type:"POST",
        data:{address_id:id},
        success:function(data){
            obj = JSON.parse(data);
            if (obj.status==1) {

                 $('#firstname').val(obj.address.firstname);
                 $('#lastname').val(obj.address.lastname);
                 $('#email').val(obj.address.email);
                 $('#phone').val(obj.address.phone);
                 $('#address1').val(obj.address.address1);
                 $('#address2').val(obj.address.address2);
                 $('#city').val(obj.address.city);
                 $('#pincode').val(obj.address.pincode);
                 $('#country_id').val(obj.address.country_id);
                 $('#state_id').html(obj.state_list);
                 $('#state_id').val(obj.address.state_id);
            }else{
                
                 $('.input_clear').each(function(){
                    $(this).val('');
                });
            }
        }
    });


  }
}






</script>







<?php $this->endSection(); ?>