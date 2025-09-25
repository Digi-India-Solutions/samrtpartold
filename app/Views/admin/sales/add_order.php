<?php
$this->extend('layout/master_admin');
$this->section('page');
$validation = \Config\Services::validation(); 

use  App\Models\CommonModel;
$this->AdminModel = new CommonModel();
?>


<div id="content">
 <div class="page-header">
  <div class="container-fluid">
   <div class="pull-right">
    <a href="<?php echo base_url('admin/order'); ?>"><i class="fa fa-reply"></i> Cancel</a>
   </div>
   <h1>Orders</h1>
   <ul class="breadcrumb">
  <li><a href="<?php echo base_url('admin/dashboard'); ?>">Home</a></li>
    <li><a href="<?php echo base_url('admin/order'); ?>">Orders</a></li>
   </ul>
  </div>
 </div>
 <div class="container-fluid">

  <style>
    header{
        background:#1d1d1d;
        position:relative;
    }


 input.required1.nofillout{
  border-color: #f70101 !important;
}

select.required1.nofillout{
 border-color: #f70101 !important;
}

</style>
  <div class="panel panel-default">
   <div class="panel-heading">
    <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $page_title; ?></h3>
   </div>
   <div class="panel-body">
    <form class="form-horizontal" id="admin_confirm">

    <input type="hidden" name="order_id" value="<?php echo @$order->id; ?>" id="order_id">    
    <input type="hidden" name="customer_id" value="<?php echo @$order->customer_id?$order->customer_id:''; ?>" id="customer_id">  
     <input type="hidden" name="discount" value="<?php echo @$order->discount; ?>" >
     <input type="hidden" name="txnid" value="<?php echo @$order->txnid?$order->txnid:$txnid; ?>" >
     
     
     

     <ul id="order" class="nav nav-tabs nav-justified">
      <li class="active"><a href="#tab-customer" data-toggle="tab">1. Customer Details</a></li>
      <li><a href="#tab-cart" data-toggle="tab">2. Products</a></li>
      <li><a href="#tab-payment" data-toggle="tab">3. Billing Details</a></li>
    <!--   <li><a href="#tab-shipping" data-toggle="tab">4. Shipping Details</a></li> -->
      <li><a href="#tab-total" data-toggle="tab">4. Totals</a></li>
     </ul>
     <div class="tab-content">
      
      <div class="tab-pane active" id="tab-customer">
       


       <div class="form-group required">
        <label class="col-sm-2 control-label" for="input-firstname">First Name</label>
        <div class="col-sm-10">
         <input type="text" name="firstname" value="<?php echo @$order->firstname; ?>" id="input-firstname" class="form-control required1 txtOnly" />
        </div>
       </div>

       <div class="form-group required">
        <label class="col-sm-2 control-label" for="input-lastname">Last Name</label>
        <div class="col-sm-10">
         <input type="text" name="lastname" value="<?php echo @$order->lastname; ?>" id="input-lastname" class="form-control txtOnly" />
        </div>
       </div>

       <div class="form-group required">
        <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
        <div class="col-sm-10">
         <input type="text" name="email" value="<?php echo @$order->email; ?>" id="input-email" class="form-control required1" />
        </div>
       </div>

       <div class="form-group required">
        <label class="col-sm-2 control-label" for="input-telephone">Telephone</label>
        <div class="col-sm-10">
         <input type="text" name="telephone" value="<?php echo @$order->telephone; ?>" id="input-telephone" class="form-control required1 isnumber" />
        </div>
       </div>
      
     
  
      </div>

<!-- end customer -->

      <div class="tab-pane" id="tab-cart">
       <div class="table-responsive main_cart_div" >
        <table class="table table-bordered">
         <thead>
          <tr>
            <td class="text-left">Image</td>
           <td class="text-left">Product</td>
            <td class="text-left">Part No</td>
             <td class="text-left">Brand</td>
           <td class="text-left">Quantity</td>
           <td class="text-left">Unit Price</td>
           <td class="text-left">Total</td>
           <td>Action</td>
          </tr>
         </thead>
         <tbody id="cart" >
           <?php if ($cart_product) { foreach ($cart_product as $key => $value) {?>
          
             <tr>
               <input type="hidden" name="product[product_id][]" value="<?php echo $value['id']; ?>" />
               
                <td class="text-left">
                   <img src="<?php echo $value['image']?base_url($value['image']):base_url($config_logo); ?>" width="50" height="50">

                </td>
                <td class="text-left">
                    <?php echo $value['name']; ?> <br />
                   
                </td>
                <td class="text-left"><?php echo $value['part_no']; ?></td>
                <td class="text-left"><?php echo $value['brand_name']; ?></td>
                <td class="text-left" style="width:15%;">
                    <div class="input-group btn-block" style="max-width: 200px;">
                      <input type="text" name="product[quantity][]" value="<?php echo $value['p_quantity']; ?>" class="form-control" id="item<?php echo $value['cart_id']; ?>"  /> <span onclick="update_cart(<?php echo $value['cart_id']; ?>);">  <i class="fa fa-refresh fa-2x" title="update Quantity" style="cursor: pointer;"></i></span>
                    </div>
                </td>
                <td class="text-right">$ <?php echo $value['price']; ?></td>
                <td class="text-right">$ <?php echo $value['price']*$value['p_quantity']; ?></td>
                <td class="text-center" style="width: 3px;">
                    <button type="button"  class="btn btn-danger" onclick="remove_cart_item(<?php echo $value['cart_id']; ?>)"><i class="fa fa-minus-circle"></i></button>
                </td>
            </tr>
          <?php }}else{ ?>             
          <tr>
           <td class="text-center" colspan="6">No results!</td>
          </tr>
         <?php } ?>
         </tbody>
        </table>
       </div>
       <ul class="nav nav-tabs nav-justified">
        <li class="active"><a href="#tab-product" data-toggle="tab">Products</a></li>
        <!-- <li><a href="#tab-voucher" data-toggle="tab">Vouchers</a></li> -->
       </ul>
       <div class="tab-content">
        <div class="tab-pane active" id="tab-product">
         <fieldset>
          <legend>Add Product(s)</legend>
          <div class="form-group">
           <label class="col-sm-2 control-label" for="input-product">Choose Product</label>
           <div class="col-sm-10">
            <input type="text" id="product_text" placeholder="Type product name min 3 character" class="form-control" name="product_text">

            <select name="product_id" class="form-control"  id="product_id">
              <option value="">Select product</option>
              
            </select>
           </div>
          </div>
        
          <div class="form-group">
           <label class="col-sm-2 control-label" for="input-quantity">Quantity</label>
           <div class="col-sm-10">
            <input type="number" name="quantity" value="1" id="quantity" class="form-control " /> 
           </div>
          </div>
          
          <div id="option" style="display: none;">
            <fieldset>  
              <legend>Choose Option(s)</legend>
              <div class="form-group"> 
               <label class="col-sm-2 control-label" for="input-option232">Variant</label> 
                 <div class="col-sm-10"> 
                  <select name="option_id" id="option_id" class="form-control">    
                    <option value=""> --- Please Select --- </option>
                    </select>
                  </div>
                </div>
              </fieldset>
          </div>

         </fieldset>
         <div class="text-right">
          <button type="button" id="button-product-add" data-loading-text="Loading..." class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add Product</button>
         </div>
        </div>
       </div>
       <br />
      </div>

      <div class="tab-pane" id="tab-payment">
     
       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-payment-address">Choose Address</label>
        <div class="col-sm-10">
         <select name="payment_address" id="address" class="form-control">
          <?php 
          if (@$address_list) { foreach (@$address_list as $key => $value) {?>
               <option value="<?php echo $value->id; ?>"> <?php echo $value->address1.' '.$value->address1.' '.$value->firstname.' '.$value->lastname.' '.$value->phone.' '.$value->email; ?> </option>
           <?php }} ?>
              <option value="new">Add New Address</option>
         </select>
        </div>
       </div>

       <div class="form-group required">
        <label class="col-sm-2 control-label" for="input-payment-firstname">First Name</label>
        <div class="col-sm-10">
         <input type="text" name="payment_firstname" value="<?php echo @$order->payment_firstname; ?>" id="payment_firstname"  class="form-control input_clear required1 txtOnly" />
        </div>
       </div>

       <div class="form-group required">
        <label class="col-sm-2 control-label" for="input-payment-lastname">Last Name</label>
        <div class="col-sm-10">
         <input type="text" name="payment_lastname" value="<?php echo @$order->payment_lastname; ?>" id="payment_lastname" class="form-control input_clear txtOnly" />
        </div>
       </div>
   
       <div class="form-group required">
        <label class="col-sm-2 control-label" for="input-payment-payment-1">Address 1</label>
        <div class="col-sm-10">
         <input type="text" name="payment_address_1" value="<?php echo @$order->payment_address_1; ?>" id="payment_address_1" class="form-control input_clear required1" />
        </div>
       </div>
       <div class="form-group">
        <label class="col-sm-2 control-label" for="input-payment-address-2">Address 2</label>
        <div class="col-sm-10">
         <input type="text" name="payment_address_2" value="<?php echo @$order->payment_address_2; ?>" id="payment_address_2" class="form-control input_clear" />
        </div>
       </div>
      
    
       <div class="form-group required">
        <label class="col-sm-2 control-label" for="input-payment-country">Country</label>
        <div class="col-sm-10">
         <select name="payment_country_id" id="country_id" class="form-control required1">
          <option value=""> --- Please Select --- </option>
          <?php foreach ($country_list as $key => $value): ?>
            <option value="<?php echo $value->id; ?>" <?php echo @$order->payment_country_id==$value->id?'selected':''; ?> ><?php echo $value->name; ?></option>
          <?php endforeach ?>
         </select>
        </div>
       </div>

       <div class="form-group required">
        <label class="col-sm-2 control-label" for="input-payment-zone">Region / State</label>
        <div class="col-sm-10">
         <select name="payment_zone_id" id="state_id" class="form-control required1"> 
          <?php 
         $state = $this->AdminModel->all_fetch('state',array('country_id'=>$order->payment_country_id));
         if(!empty($state)){ foreach ($state as $key => $value) {?>
         <option value="<?php echo $value->id; ?>" <?php echo @$value->id==$order->payment_zone_id?'selected':''; ?>><?php echo $value->name; ?></option>
         <?php } } ?>
         <option value="">select option </option>
        
         </select>
        </div>
       </div>
       <div class="form-group required">
        <label class="col-sm-2 control-label" for="input-payment-zone">City</label>
        <div class="col-sm-10">
          <input type="text" name="payment_city" value="<?php echo @$order->payment_city; ?>" id="payment_city" class="form-control input_clear required1" />
        </div>
       </div>
        
     
       
        <div class="form-group required">
        <label class="col-sm-2 control-label" for="input-payment-postcode">Postcode</label>
        <div class="col-sm-10">
         <input type="text" name="payment_postcode" value="<?php echo @$order->payment_postcode; ?>"  id="payment_postcode" class="form-control isnumber input_clear required1" />
        </div>
       </div>

      </div>
       


      <div class="tab-pane" id="tab-total">
       <div class="table-responsive main_cart_div1">
        <table class="table table-bordered">
         <thead>
          <tr>
           <td class="text-left">Image</td>
           <td class="text-left">Product</td>
           <td class="text-left">Part no</td>
               <td class="text-left">Brand</td>
           <td class="text-right">Quantity</td>
           <td class="text-right">Unit Price</td>
           <td class="text-right">Total</td>
          </tr>
         </thead>
         <tbody id="total">
         <?php if ($cart_product) {
      
          $subtotal = 0;
          foreach ($cart_product as $key => $value) {
            $subtotal += $value['price']*$value['p_quantity'];
          ?>
              <tr>
              
               <td class="text-left">
                   <img src="<?php echo $value['image']?base_url($value['image']):base_url($config_logo); ?>" width="50" height="50">

                </td>
                <td class="text-left">
                    <?php echo $value['name']; ?> <br />
                   
                </td>
                <td class="text-left"><?php echo $value['part_no']; ?></td>
                <td class="text-left"><?php echo $value['brand_name']; ?></td>

                <td class="text-right">
                    <?php echo $value['p_quantity']; ?>
                </td>
                <td class="text-right">$ <?php echo $value['price']; ?></td>
                <td class="text-right">$ <?php echo $value['price']*$value['p_quantity']; ?></td>
               
            </tr>
          <?php } ?>
               <tr>  <td class="text-right" colspan="6">Sub-Total:</td>  <td class="text-right">$ <?php echo $subtotal; ?></td></tr>
               
                <?php if (!empty($taxes)){ foreach ($taxes as $key => $tax) {?>
                      <tr>  <td class="text-right" colspan="6"><?php echo $tax['name'].' ('.$tax['rate'].' '.$tax['type'].')'; ?>:</td>  <td class="text-right"> + $ <?php echo $tax['tax_amount']; ?></td></tr>
                    
                    <?php } } ?>
               
               
                <?php if (!empty($order->shipping_charge)): ?>
                <tr>  <td class="text-right" colspan="6">Shipping Charge:</td>  <td class="text-right"> + $ <?php echo $order->shipping_charge; ?></td></tr>
               <?php endif ?>
               
               <?php if (!empty($discount->amount)): ?>
                <tr>  <td class="text-right" colspan="6">Discount(<?php echo $discount->coupon_code; ?>):</td>  <td class="text-right"> - $  <?php echo $discount->amount; ?></td></tr>
               <?php endif ?>
              
             
               <?php if (!empty($order->token_amount)): ?>
                <tr>  <td class="text-right" colspan="6">Token Amount (<?php echo $order->token_amount; ?>):</td>  <td class="text-right"> - $ <?php echo $order->token_amount; ?></td>
                </tr>
               <?php endif ?>

                <tr> 
                 <td class="text-right" colspan="6">Total:</td>  <td class="text-right" > $ <?php echo $total?$total:$subtotal-@$discount->amount; ?></td>
               </tr>

      <?php }else{ ?>
          <tr>
           <td class="text-center" colspan="6">No results!</td>
          </tr>
        <?php } ?>
         </tbody>
        </table>
       </div>
       <fieldset>
        <legend>Order Details</legend>
       
           
       <div class="form-group">
         <label class="col-sm-2 control-label" for="input-order-status">Payment Method</label>
         <div class="col-sm-10">
          <select name="payment_method" id="payment_method" class="form-control required1" >
           <option value="">Select option</option>
            <option value="cod" <?php echo @$order->payment_method=='cod'?'selected':''; ?>>Cash On Delivery</option>
            <option value="payumoney" <?php echo @$order->payment_method=='payumoney'?'selected':''; ?>>Payumoney</option>
          </select>
         </div>
        </div>


        <?php if (empty($order->id)) {?>
     
        <div class="form-group">
         <label class="col-sm-2 control-label" for="input-coupon">Coupon</label>
         <div class="col-sm-10">
          <div class="input-group">
           <input type="text" name="coupon" value="<?php echo @$discount->coupon_code; ?>" id="coupon" class="form-control" />
            <span class="input-group-btn">
            <button type="button" id="button-coupon" class="btn btn-primary">Apply</button>
           </span>
          </div>
         </div>
        </div>
      
      <?php } ?>

        <div class="form-group">
         <label class="col-sm-2 control-label" for="input-order-status">Order Status</label>
         <div class="col-sm-10">
          <select name="order_status" id="input-order-status" class="form-control required1" >
           <option value="">Select option</option>
            <?php foreach ($order_status as $key => $value): ?>
               <option value="<?php echo $value->id; ?>" <?php echo @$order->order_status==$value->id?'selected':''; ?>><?php echo $value->name; ?></option>
            <?php endforeach ?>
          </select>
         </div>
        </div>

        <div class="form-group">
         <label class="col-sm-2 control-label" for="input-comment">Comment</label>
         <div class="col-sm-10">
          <textarea name="comment" rows="5" id="input-comment" class="form-control"><?php echo @$order->payment_note; ?></textarea>
         </div>
        </div>
      
       </fieldset>
       <div class="row">
        <div class="col-sm-6 text-left">
         </div>
        <div class="col-sm-6 text-right">
   
         <button type="submit" id="button-save" class="btn btn-primary"><i class="fa fa-check-circle"></i> Save</button>
        </div>
       </div>
      </div>
     </div>
    </form>
   </div>
  </div>
 </div>
 <script type="text/javascript">


 

$('#button-product-add').on('click',function(){

var product_id = $('#product_id').val();  
var quantity = $('#quantity').val();
var option = $('#option_id').val();
var order_id = $('input[name="order_id"]').val();

if(quantity<1){
   toastr.error('Quantity Cannot be emtpy');
   return false;
}
if(!product_id){
   toastr.error('Please selected product');
   return false;
}

  $.ajax({
      url:"<?php echo base_url('admin/add_to_cart'); ?>",
      type:"POST",
      data:{product_id:product_id,quantity:quantity,option:option,order_id:order_id},
      success:function(data){
          var obj = JSON.parse(data);
          if (obj.status==1) {
             $(".main_cart_div").load(location.href + " .main_cart_div");
              $(".main_cart_div1").load(location.href + " .main_cart_div1");
            toastr.success(obj.msg);
          }else{
            toastr.error(obj.msg);
          }
       
       }
    });

})

function remove_cart_item(cart_id){
if (cart_id) {
    $.ajax({
      url:"<?php echo base_url('admin/remvoe_cart'); ?>",
      type:"POST",
      data:{cart_id:cart_id},
      success:function(data){
          if (data) { 
             $(".main_cart_div").load(location.href + " .main_cart_div");
             $(".main_cart_div1").load(location.href + " .main_cart_div1");
            toastr.success('Item Remove success');
          }
       
       }
    });
  }
}


function update_cart(id){

  var quantity = $('#item'+id).val();

  if (quantity >=1) {
    $.ajax({
     url:"<?php echo base_url('admin/update_cart'); ?>",    
    type:"POST",
    data:{cart_id:id,quantity:quantity},
    success:function(data){
      var obj = JSON.parse(data);
      if (obj.status==1) {
        $(".main_cart_div").load(location.href + " .main_cart_div");
         $(".main_cart_div1").load(location.href + " .main_cart_div1");
      }else{
         toastr.error(obj.msg);
      }
    }
    });

  }else{
       $('#item'+id).val(1);
  }

}


$('#button-coupon').on('click',function(){
var code = $('input[name="coupon"]').val();

$.ajax({
url:"<?php echo base_url('admin/check_coupan'); ?>",      
type:"POST",
data:{code:code},
success:function(data){
  var obj = JSON.parse(data);
  if (obj.status==1) {
      toastr.success('You apply coupan code success');
    $(".main_cart_div1").load(location.href + " .main_cart_div1");
  }else{
    toastr.error(obj.msg);
  
  }
},
error:function(data){
    toastr.error('error posting feed');
}
});
});


$(".isnumber").on("keypress keyup blur",function (event) {    
$(this).val($(this).val().replace(/[^\d].+/, ""));
if ((event.which < 48 || event.which > 57)) {
    event.preventDefault();
    return false;
}
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



$('.txtOnly').keypress(function (e) {
      var regex = new RegExp("^[a-zA-Z]+$");
      var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
      if (regex.test(str)) {
        return true;
      }
      else
      {
      e.preventDefault();
      return false;
      }
  });




 $('form#admin_confirm').submit(function(e){
  e.preventDefault();
  var form = $(this);
   var missing =0;
 
 email = $('input[name="email"]').val();
  if (email) {
   var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (email) {
     if(!regex.test(email)){
      toastr.error('Invalid Email Address');
   
      return false;

      }
    }
  }


$(this).find('.required1').each(function(){
  if ($(this).val().length <1 || $(this).val()=='') {
    $(this).addClass('nofillout');
    missing++;
  
  }
});

$('.nofillout').each(function(){
  if ($(this).val().length >1 ) {
    $(this).removeClass('nofillout');
  }
});


if (missing >=1) {
   toastr.error('Please check form carefully and fill all requird field');
  return false;
}

$.ajax({
      url:"<?php echo base_url('admin/confirm'); ?>",  
      type:"POST",
      data:form.serialize(),
      beforeSend:function(){
          $('#button-save').attr('type', 'button');
          $('#button-save').html('Processing...');
      },
      success:function(data){
        var obj = JSON.parse(data);
        if(obj.status==1){
             toastr.success('Order submit success');
             setTimeout(function(){
                    window.location.href="admin/order"; 
                },2000)

        }else{
            $('#button-save').attr('type', 'submit');  
         	$('#button-save').html('Save');
            toastr.error(obj.msg);
        }
      },
      error:function(){
          toastr.error('Something went wrong please retry');
      }
    });


 }); 



  $("#product_text").keypress(function() {
    var search = $('#product_text').val();
        if(search.length < 2){
            exit;
        }
        $.ajax({
            url:"<?php echo base_url('admin/get_ajax_product'); ?>",
            type:"post",
            data:{search:search},
            success:function(data){
                if(data){
                    $('#product_id').html(data);
                }
            }
        });
   
});



$('select#address').on('change',function(){
var id = $(this).val();
var customer_id = $('#customer_id').val();
if(customer_id !=''){
address_detail(id);
}

});


$(document).ready(function(){
var id =   $('select#address').val();
var customer_id = $('#customer_id').val();
if(customer_id !=''){
address_detail(id);
}
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

                 $('#payment_firstname').val(obj.address.firstname);
                 $('#payment_lastname').val(obj.address.lastname);
                 // $('#email').val(obj.address.email);
                 // $('#phone').val(obj.address.phone);
                 $('#payment_address_1').val(obj.address.address1);
                 $('#payment_address_2').val(obj.address.address2);
                 $('#payment_city').val(obj.address.city);
                 $('#payment_postcode').val(obj.address.pincode);
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


</div>
<?php echo $this->endSection();?>
