<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FrontModel;
use App\Models\CartModel;
use App\Models\CommonModel;

class Cart extends BaseController
{
    
    public function __construct()
  {

     $AdminModel = new CommonModel();
     $default_img = $AdminModel->fs('setting',array('key'=>'config_icon'));
     $this->config_logo = $default_img->value; 

  }

 public function cart()
  { 
     $frontModel = new FrontModel();  
     if(empty(session()->get('user_id')))   {
      if(empty(session()->get('adminLogin'))){
          return redirect()->to('home');
      }
   }
       
    $model = new CartModel();
    $meta = $this->AdminModel->fs('front_menu',array('link'=>$this->uri->getSegment(1)));
    $data['meta_title'] = 'Cart | Smart Parts';
    $data['meta_description'] =  'Cart | Smart Parts';
    $data['meta_keyword'] =  'Cart | Smart Parts';
    $data['carts'] = $model->get_all_cart_product();
    $data['discount'] = $model->get_order_discount();
    $data['total'] = $model->get_complete_cart_total();
    $data['config_logo'] = $this->config_logo;
    return view('frontend/cart',$data); 
  }




function add_to_cart(){
    $model = new CartModel();
    $array = array();
    $save = array();
         
    $product_id = decrypt_url($this->request->getVar('p_id'));
    
    // check quantity is available

    $check_qty = $this->AdminModel->fs('product',array('id'=>$product_id));
      if($check_qty->quantity < 1){
         $array['status']= 0;
         $array['msg'] = 'Product quantity is out of stock';
         $array['out_of_stock'] = 1; 
         echo json_encode($array);
         exit;
      } 

    $save['product_id'] =$product_id;
    if (!empty($this->request->getVar('quantity'))) {
    $save['quantity'] = $this->request->getVar('quantity');
    }else{
    $save['quantity'] =1;
    }

    $result = $model->save_cart($save);
    if ($result) {
      $array['status'] = 1;
      $array['msg'] = 'Product added to cart successfully';  
      $array['p_id'] = $product_id;
      // $array['option_id'] = $save['option'];
      $array['cart_count'] = $model->get_cart_count();
      echo json_encode($array);   
    }else{
      $array['status'] = 0;
      $array['msg'] = 'Something getting wrong please retry';
      echo json_encode($array);
    }
      
}

function update_cart()
{
  if($this->request->getVar()){
    $array = array();
    $id = $this->request->getVar('id');
    $quantity = $this->request->getVar('quantity');
    $result = $this->AdminModel->updateData('cart',array('quantity'=>$quantity),array('id'=>$id));
    if ($result) {
    $array['status'] =1;
    echo json_encode($array);
    }else{
    $array['status'] = 0;
    $array['msg'] = 'Error in  updating quantity of this product please retry';
    echo json_encode($array);
    }
  }
}

function delete_cart_item(){
  
  if($this->request->getVar()){
    $array = array();
    $id = $this->request->getVar('id');
    if ($id) {
        $row = $this->AdminModel->fs('cart',array('id'=>$id));
        $result = $this->AdminModel->deleteData('cart',array('id'=>$id));
        if ($result) {
        $array['status'] = 1;
        echo json_encode($array);
       }else{
        $array['status'] = 0;
        $array['msg'] = 'Something getting wrong please retry';
        echo json_encode($array);
      }
    }
  }
}


//////////////////

// COUPON


function check_coupan(){  
$model = new CartModel();
if ($this->request->getVar('code')) {

$array = array();
$code = $this->request->getVar('code');
$valid = $model->check_coupan_code($code); // coupon is valid and coupon detail
$discount_price = 0;
$amount = 0;
  
   if (!empty($valid)) {
    
   if (!empty($this->session->get('user_id'))) {
       $allowed = $model->check_coupan_allowed_to_user($valid->id);
      if (empty($allowed)) {
       $array['status'] = 0;
       $array['msg'] = 'Limit of uses this coupon is exceed';
       echo json_encode($array);
       die();
      }
    } 

    if (empty($this->session->get('user_id'))) {
      if(!empty($valid->user_login)){ // check coupon is for login user or not
       $array['status'] = 0;
       $array['msg'] = 'This coupon is allowed only after login';
       echo json_encode($array);
       die();
      }
    }
    // echo "<pre>";
    
  // check coupon product is not null
    $coupon_to_product = $this->AdminModel->all_fetch('coupon_to_product',array('coupon_id'=>$valid->id));

     // check coupon category is not null
     $coupon_to_category = $this->AdminModel->all_fetch('coupon_to_category',array('coupon_id'=>$valid->id));

    if (!empty($coupon_to_product) || !empty($coupon_to_category)) {
 
          $product = $model->get_all_cart_product();
          
          
          foreach ($product as $key => $pp) { 

          $check_coupon_to_product = $this->AdminModel->fs('coupon_to_product',array('product_id'=>$pp['id'],'coupon_id'=>$valid->id));

            $get_category = $this->AdminModel->fs('product_to_category',array('product_id'=>$pp['id']));

            $check_coupon_to_category = $this->AdminModel->fs('coupon_to_category',array('category_id'=>$get_category->category_id,'coupon_id'=>$valid->id));

            if (!empty($check_coupon_to_product) || !empty($check_coupon_to_category)) {
            
               if ($valid->coupon_type=='P') {
               $amount = $pp['price']*$pp['p_quantity'];
               $discount_price  += $amount*$valid->coupon_discount/100;
               }else{
               $discount_price  += $valid->coupon_discount; 
               }

            }

          }

          if (!empty($discount_price)) {
            $array['status'] = 1;
            $array['discount'] = $discount_price;
            }else{
               $array['status'] = 0;
               $array['msg'] = 'This Product is not valid for discount';
              echo json_encode($array);    die();
          }
     
    }else{
       
          // this discount for all cart total in absenace of coupon product or category 
           $array['status'] = 1;
           $total_amount = $model->get_cart_total();  

           if ($valid->coupon_type=='P') {
           $array['discount'] = $total_amount*$valid->coupon_discount/100;
           }else{
           $array['discount'] = $valid->coupon_discount; 
           }
   
       }

   if (!empty($array['discount'])) {
    $coupon = array();
    $coupon['coupon_id'] = $valid->id;
    $coupon['amount'] = $array['discount'];
    $coupon['coupon_code'] = $valid->coupon_code;
    $coupon['session_id'] = $this->session->get('session_id');
   
    if (!empty($this->session->get('user_id'))) {
    $coupon['customer_id'] = $this->session->get('user_id');
    }
    $coupon['create_date'] = date('Y-m-d H:i:s');

   $check_already_applied = $model->check_coupan_applied($valid->id);  

   if (!empty($check_already_applied)) {
   
    $this->AdminModel->updateData('order_coupon',$coupon,array('session_id'=>$this->session->get('session_id')));
   }else{

    $this->AdminModel->insertData('order_coupon',$coupon);
   }

   }

   echo json_encode($array);
   }else{
   $array['status'] = 0;
   $array['msg'] = 'Coupon is Invalid/Expired';
   echo json_encode($array);
   }
  }else{
   $array['status'] = 0;
   $array['msg'] = 'Error posting feed';
   echo json_encode($array);  
  } 
}

///////////////////

function get_address_detail(){
    $array = array();
    $id = $this->request->getVar('address_id');
    if($id){
        $address = $this->AdminModel->fs('address',array('id'=>$id));
        $array['status'] = 1;
        $array['address'] = $address;
        $array['state_list'] = $this->get_state($address->country_id);
        echo json_encode($array);
        
    }else{
        $array['status'] = 0;
        $array['address'] = array();
        echo json_encode($array);
    }
}


function get_state($country_id){
   $ss = '';
   if ($country_id) {
     $state_list = $this->AdminModel->all_fetch('state',array('country_id'=>$country_id));
     if ($state_list) {
         $ss .='<option value="">Select option </option>';
        foreach ($state_list as $key => $value) {
          $ss .="<option value=".$value->id."  > ".$value->name."</option>";
        }
     }else{
        $ss .='<option value="">Not Available</option>';
     }
   }
return $ss;

}

///////////////////


 public function checkout()
  { 
      
     $user = $this->AdminModel->fs('user',array('id'=>$this->session->get('user_id'),'status'=>1));
     if(empty($user)){
         return redirect()->to('logout');
     } 
      
      
    $model = new CartModel();
    
    $data['carts'] = $model->get_all_cart_product();
    if(empty($data['carts'])){
        return redirect()->to('cart');
    }
    
    $meta = $this->AdminModel->fs('front_menu',array('link'=>$this->uri->getSegment(1)));
    $data['meta_title'] = 'Checkout | Smart Parts';
    $data['meta_description'] =  'Checkout | Smart Parts';
    $data['meta_keyword'] =  'Checkout | Smart Parts';
    $data['user'] = $this->AdminModel->fs('user',array('id'=>$this->session->get('user_id')));
    $data['address'] = $this->AdminModel->all_fetch('address',array('customer_id'=>$this->session->get('user_id')));
    
    $data['discount'] = $model->get_order_discount();
    $data['total'] = $model->get_complete_cart_total();
    $data['taxes'] = $model->get_all_taxes_detail();
    $data['config_logo'] = $this->config_logo;
    $data['country_list'] = $this->AdminModel->all_fetch('country',array('status'=>1));
    $data['txnid'] = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
    $data['token_amount'] = $this->get_token_amount($data['total']);
    $setting = $this->AdminModel->all_fetch('setting',array('code'=>'config'));
    foreach ($setting as $key => $value) {
      $wconfig[$value->key]= $value->value;
    } 
    $data['wconfig'] =$wconfig;
    return view('frontend/checkout',$data); 
  }

function get_token_amount($total){
$setting = $this->AdminModel->all_fetch('setting',array('code'=>'config'));
foreach ($setting as $key => $value) {
  $wconfig[$value->key]= $value->value;
} 

if($total < $wconfig['cod_limit']){
 $total  =  $total + $wconfig['cod_charges'];
}

$amount = 0;
$token_type = $wconfig['token_type'];
$token_charges = $wconfig['token_charges'];

if(!empty($token_charges)){
    
    if($token_type=='P'){
    $amount = $total*$token_charges/100;
        
    }else{
        if($total < $token_charges){
              $amount =  0; 
        }else{
              $amount =   $token_charges; 
        }
   
    }
}

return   round($amount);

}

///////////

// order confirm


function confirm(){

if($this->request->getMethod()=='post'){

    $model = new CartModel();
    $array = array();
    $order = array();
    $address = array();
    $existing =0;

    $setting = $this->AdminModel->all_fetch('setting',array('code'=>'config'));
    foreach ($setting as $key => $value) {
      $stconfig[$value->key]= $value->value;
    } 
        
 

   
    if ($this->request->getVar('payment_address') =='new') {

        $address['firstname'] = $this->request->getVar('firstname');
        $address['lastname'] = $this->request->getVar('lastname');
        $address['phone'] = $this->request->getVar('phone');
        $address['email'] = $this->request->getVar('email');
        $address['company'] = $this->request->getVar('company');
        $address['address1'] = $this->request->getVar('address1');
        $address['address2'] = $this->request->getVar('address2');
        $address['landmark'] = $this->request->getVar('landmark');
        $address['pincode'] = $this->request->getVar('pincode');
        $address['country_id'] = $this->request->getVar('country_id');
        $address['city'] = $this->request->getVar('city');
        $address['state_id'] = $this->request->getVar('state_id');
        $address['create_date'] = date('Y-m-d');
        $address['modify_date'] = date('Y-m-d');


      if (!empty($this->session->get('user_id'))) {
       $address['customer_id'] = $this->session->get('user_id');
       // save logged user address
       $this->AdminModel->insertData('address',$address);
      }

     }

    $order['info']['payment_firstname'] = $this->request->getVar('firstname');
    $order['info']['payment_lastname'] = $this->request->getVar('lastname');      
    $order['info']['firstname'] = $this->request->getVar('firstname');
    $order['info']['lastname'] = $this->request->getVar('lastname');
    $order['info']['telephone'] = $this->request->getVar('phone');
    $order['info']['email'] = $this->request->getVar('email');
    $order['info']['payment_company'] = $this->request->getVar('company');
    $order['info']['payment_address_1'] = $this->request->getVar('address1');
    $order['info']['payment_address_2'] = $this->request->getVar('address2');
    $order['info']['payment_landmark'] = $this->request->getVar('landmark');
    $order['info']['payment_postcode'] = $this->request->getVar('pincode');
    $order['info']['payment_country_id'] = $this->request->getVar('country_id');
    $order['info']['payment_city'] = $this->request->getVar('city');
    $order['info']['payment_note'] = $this->request->getVar('note');
    $order['info']['payment_zone_id'] = $this->request->getVar('state_id');
    
  

    // verify pincode

    // $pincode = trim($order['info']['payment_postcode']);
    // $check_pincode = $this->AdminModel->fs('verify_pincode',array('pincode'=>$pincode,'status'=>1));
    // if(empty($check_pincode) && !$check_pincode){
    // $array['status'] = 0;
    // $array['msg'] = 'Delivery to ('.$pincode.') is currently not available';
    // echo json_encode($array);
    // exit();
    // }

    $order['info']['ip'] = $_SERVER['REMOTE_ADDR'];
    $order['info']['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
    $order['info']['payment_method'] = $this->request->getVar('payment_method');

    $order['info']['session_id'] = $this->session->get('session_id');
    $order['info']['txnid'] = $this->request->getVar('txnid');
    $order['info']['order_status'] = 7;
    $total = $model->get_complete_cart_total();

    $token_amount = 0;

    // check token status
    if (!empty($stconfig['token_status'])) {
    $token_amount = @$this->get_token_amount($total);
    }


    if($total < $stconfig['cod_limit'] && $order['info']['payment_method'] !='payumoney' && !empty($stconfig['cod_status'])){

     $order['info']['total'] =  $total + $stconfig['cod_charges'] - $token_amount;
     $order['info']['shipping_charge'] =  $stconfig['cod_charges']; 
     $order['info']['token_amount'] =  $token_amount; 
     
      // swap token amount to total amount for cod
       if (!empty($stconfig['token_status']) && !empty($token_amount) ) {
         $total = $token_amount;
      }else{
        $total  = $order['info']['total'];
      }
     
    }else if($order['info']['payment_method'] =='cod' && !empty($stconfig['cod_status']) && !empty($token_amount) ){
      $order['info']['total'] = $total - $token_amount;
      $order['info']['token_amount'] =  $token_amount; 
      // swap token amount to total amount for cod
       if (!empty($stconfig['token_status'])) {
         $total = $token_amount ;
       }
    }else{

    $order['info']['total'] = $total; 

    }



    if (!empty($this->session->get('user_id'))) {
    $order['info']['customer_id'] = $this->session->get('user_id');
    }else{
    $order['info']['customer_id'] = 0;
    }

    $order['info']['date_added'] = date('Y-m-d H:i:s');
    $order['info']['date_modified'] = date('Y-m-d H:i:s');


    // check coupon discount
    $coupon = $model->get_order_discount();
    if (!empty($coupon)) {

      $order['info']['discount'] = $coupon->amount;
      $order['info']['coupon_id'] = $coupon->id;
      $order['info']['coupon_code'] = $coupon->coupon_code;
      
    }else{
    $order['info']['discount'] = '';
    $order['info']['coupon_id'] = ''; 
    }
    
    $taxes = $model->get_all_taxes_detail();
    if(!empty($taxes)){
        $tax_amount = 0;
        foreach($taxes as $tax){
            $tax_amount += $tax['tax_amount'];
        }
     $order['info']['tax'] = $tax_amount; 
     $order['taxes'] = $taxes;
     
    }

    // check bundle discount
    // $bundle_discount = $this->Cart_model->get_order_bundle_discount($this->session->get('user_id'));
    // if (!empty($bundle_discount)) {
    //   $order['info']['bundle_discount'] = $bundle_discount;
    // }


    $order['products'] = $model->get_all_cart_product();

    if($total<1){
    $array['status'] = 0;    
    $array['msg'] = 'Token amount must not be zero if you choose place order on cod , you can choose payumoney option';
    echo json_encode($array);
    exit();  
    }

    if($total< $stconfig['cod_amount']){
    $array['status'] = 0;    
    $array['msg'] = 'Order can only be placed after total cart amount is greater than or equal to '.$stconfig['cod_amount'];
    echo json_encode($array);
    exit();  
    }




    if(empty($order['products']) ||  $total<1 || empty($total)){
    $array['status'] = 0;
    $array['msg'] = 'Order Can`t be place without any product';
    echo json_encode($array);
    exit();
    }

    // otp check and validate addon

    $result =  $model->save_order($order);

    if ($result) {
        
    $array['status'] =1; // its for json status only

    // payu
    $MERCHANT_KEY = ""; 
    $SALT = "";

    // $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
    $txnid = $this->request->getVar('txnid');

    $udf1 = '';
    $udf2 = '';
    $udf3 = '';
    $udf4 = '';
    $udf5 = '';
    $udf6 = '';
    $udf7 = '';
    $udf8 = '';
    $udf9 = '';
    $udf10 = '';

    $product_info = 'order';

    $customer_name = $order['info']['firstname'];
    $customer_email= $order['info']['email'];
    $phone =         $order['info']['telephone'];

    $hashstring = $MERCHANT_KEY . '|' . $txnid . '|' . $total . '|' . $product_info . '|' . $customer_name . '|' . $customer_email . '|' . $udf1 . '|' . $udf2 . '|' . $udf3 . '|' . $udf4 . '|' . $udf5 . '|' . $udf6 . '|' . $udf7 .'|' . $udf8 . '|' . $udf9 .'|' . $udf10 . '|' . $SALT;
    $hash = strtolower(hash('sha512', $hashstring));

    $success = base_url('order-success'); 
    $fail = base_url('order-fail');
    $cancel = base_url('order-fail');


    $array['Mkey'] = $MERCHANT_KEY;
    $array['hash'] = $hash;
    $array['txnid'] = $txnid;
    $array['amount'] = $total;
    $array['productinfo'] = $product_info;
    $array['firstname'] = $customer_name;
    $array['email'] = $customer_email;
    $array['phone'] = $phone;
    $array['surl'] = $success;
    $array['furl'] = $fail;
    $array['curl'] = $cancel;
    $array['existing'] = $existing;
    $array['payment_method'] = $this->request->getVar('payment_method');
    $array['token_status'] =  $stconfig['token_status']?$stconfig['token_status']:0;
    $array['product'] = $order['products'];
    // end
    echo json_encode($array);
    }else{
    $array['status'] = 0;
    $array['msg'] = 'Something getting wrong please retry';
    echo json_encode($array);
    }

    }
}


//////////////////



function order_success(){

$data['meta_title'] = 'Order success';
$data['meta_keyword'] = 'Order success';
$data['meta_description'] = 'Order success';
$setting = $this->AdminModel->all_fetch('setting',array('code'=>'config'));
foreach ($setting as $key => $value) {
  $wconfig[$value->key]= $value->value;
} 


if($this->request->getMethod()=='post'){
    
  $model = new CartModel();  
  // $payu_id = $this->request->getVar('payuMoneyId');  
  $txnid = $this->request->getVar('txnid');
  $order = $model->get_order_by_trasaction($txnid);

  if (!empty($order)) {
    // sms
      
      // update order
   $date = date('Y-m-d H:i:s');
      // update order
   $this->AdminModel->updateData('order',array('status'=>1,'order_status'=>1,'date_added'=>$date,'date_modified'=>$date),array('txnid'=>$txnid));

   // update coupon
   if (!empty($order->coupon_id)) {
     $this->AdminModel->updateData('order_coupon',array('status'=>1,'order_id'=>$order->id),array('id'=>$order->coupon_id));
   }

   // remove cart

   $this->AdminModel->deleteData('cart',array('customer_id'=>$order->customer_id));
   $this->AdminModel->deleteData('cart',array('session_id'=>$order->session_id));

   // regenerate login
   $result = $this->AdminModel->fs('user',array('id'=>$order->customer_id));
   if (!empty($result) && empty($this->session->get('user_id'))) {
    $this->session->set('user_id',$result->id); 
    $this->session->set('session_id',$order->session_id);
   }


   // shiprocket
  $ship = array();
  $ship['order_id'] = $order->id;
  $ship['order_date'] = date('Y-m-d H:i');
  $ship['pickup_location'] ='Delhi';
  $ship['channel_id'] ='1340476';
  $ship['comment'] = $order->payment_note;
  $ship['billing_customer_name'] = $order->firstname;
  $ship['billing_last_name'] = $order->lastname;
  $ship['billing_address'] = $order->payment_address_1;
  $ship['billing_address_2'] = $order->payment_address_2;
  $ship['billing_city'] = $order->payment_city;
  $ship['billing_pincode'] = $order->payment_postcode;
  $ship['billing_state'] = $order->payment_city;
  $ship['billing_country'] = $order->payment_country_id;
  $ship['billing_email'] = $order->email;
  $ship['billing_phone'] = $order->telephone;
  $ship['shipping_is_billing'] = true;
  $ship['shipping_customer_name'] ='';
  $ship['shipping_last_name'] ='';
  $ship['shipping_address'] ='';
  $ship['shipping_address_2'] ='';
  $ship['shipping_city'] ='';
  $ship['shipping_pincode'] ='';
  $ship['shipping_country'] ='';
  $ship['shipping_state'] ='';
  $ship['shipping_email'] ='';
  $ship['shipping_phone'] ='';
  $ship['shipping_address'] ='';

  // SHIPROCEKT ADD ITIEM AND SUBTRACT PRODUCT QTY IN DB
  $product = $model->get_all_order_product($order->id);

   foreach ($product as $key => $value) {
   
       $option_id = json_decode($value->option_id);
      if (!empty($option_id[0])) {
      $subtract = $this->AdminModel->fs('product_option_value',array('id'=>$option_id[0]));
      if(!empty($subtract->subtract)){
        $qty1 = $subtract->quantity-$value->quantity;
         $this->AdminModel->updateData('product_option_value',array('quantity'=>$qty1),array('id'=>$option_id[0]));
         }
     

      }else{

         $is_subtract_quantity =  $this->AdminModel->fs('product',array('id'=>$value->product_id));
        
         if (!empty($is_subtract_quantity->subtract)) {

            $qty = $is_subtract_quantity->quantity-$value->quantity;
            $this->AdminModel->updateData('product',array('quantity'=>$qty),array('id'=>$is_subtract_quantity->id));
          }
      }

    $array = array();
    $array['name'] = $value->name;
    $array['sku'] = $value->sku;
    $array['units'] = $value->quantity;
    $array['selling_price'] = $value->price;
    $array['discount'] = '';
    $array['tax'] = '';
    $array['hsn'] = '';

    $ship['order_items'][] = $array; 
  }
   
  $ship['payment_method'] = @$order->payment_method;
  $ship['shipping_charges'] = 0;
  $ship['giftwrap_charges'] = 0;
  $ship['transaction_charges'] =0;
  $ship['total_discount'] = $order->discount;
  $ship['sub_total'] = $order->total;
  $ship['length'] = 10;
  $ship['breadth'] = 10;
  $ship['height'] = 10;
  $ship['weight'] = 10;

  // $feed =  $this->shiprocket->generateOrder($ship);
  // $up = array();
  // @$up['order_id'] = $feed['order_id'];
  // @$up['shipment_id'] = $feed['shipment_id'];
  // $this->AdminModel->update('order',$up,array('txnid'=>$txnid));

   // end
   
   $data['txnid'] = $this->request->getVar('txnid');
   $data['amount'] = $this->request->getVar('amount');
   $data['order'] = $order;
   $data['product'] = $product;
   $data['order_status_name'] ='Pending';
   $data['wconfig'] = $wconfig;
   $data['taxes'] = $model->get_all_order_taxes($order->id);
   
//   pdf incoive
   $invoice = array();
   $invoice['order'] =  $order;
   $invoice['config'] = $wconfig;
   $invoice['taxes'] =  $data['taxes'];
   
    $product_list = array();
     foreach ($product as $key => $value) {
        $product_list['product'][] = $value;
        $product_list['option'][] = $model->get_product_option($value->option);
        
    }
    $invoice['product_list'] = $product_list;
   
   $file_name = 'invoice_'.$order->txnid.'.pdf';
    $dompdf = new \Dompdf\Dompdf(); 
    $dompdf->loadHtml(view('frontend/invoice',$invoice));
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    // $dompdf->stream();
    $output = $dompdf->output();
    file_put_contents('uploads/invoice/'.$file_name, $output);
//   end pdf

   // mail start
    $email = \Config\Services::email();
    $config['mailType'] = 'html';
    $config['wordWrap'] = true;
    $email->initialize($config);
    $email->setFrom($wconfig['sending_email'], $wconfig['config_name']);
    $email->setTo($order->email);
    $email->setSubject('Order placed successfully');
    $path = base_url('uploads/invoice/'.$file_name);
    $email->attach($path);
    $message = view('frontend/order_mail_to_user',$data);
    $email->setMessage($message);
    $email->send();
   // end mail
   
   //   Admin Email

    $email->setFrom($wconfig['sending_email'], $wconfig['config_name']);
    $email->setTo($wconfig['config_email']);
    $email->setSubject('One New Order Received');
    $message = view('frontend/order_mail_to_admin',$data);
    $email->setMessage($message);
    $email->send();
    unlink('uploads/invoice/'.$file_name);
       
  }
     
   return view('frontend/order_success',$data);
   
   }else{
     return  redirect()->to('home');
   } 

 }




function order_fail(){
    
    $data['meta_title'] = 'Order fail';
    $data['meta_keyword'] = 'Order fail';
    $data['meta_description'] = 'Order fail';
    return view('frontend/order_fail',$data);
}




function add_wishlist(){
  if($this->request->getVar('p_id')){
    $save = array();
    $array = array();
    $save['product_id'] = decrypt_url($this->request->getVar('p_id'));
    $save['create_date'] = date('Y-m-d H:i:s');
    $save['customer_id'] = $this->session->get('user_id');
    
    if (empty($save['customer_id'])) {
      $array['status'] = 0;
      $array['msg'] = 'You must login or create an account to save your wish list!';
      $array['redirect'] ='login';
      echo json_encode($array); exit();
    }
    
    $check = $this->AdminModel->fs('wishlist',array('product_id'=>$save['product_id'],'customer_id'=>$save['customer_id']));

    if (!empty($check)) {
      $result = $this->AdminModel->updateData('wishlist',$save,array('id'=>$check->id));  
    }else{
       $result = $this->AdminModel->insertData('wishlist',$save);  
    }
    
    $array['wishlist'] = count($this->AdminModel->all_fetch('wishlist',array('customer_id'=>$this->session->get('user_id'))));       
             
    if ($result) {
      $array['status'] =1;
      $array['msg'] ='Product added to wishlist';
      echo json_encode($array);
    }else{
       $array['status'] =0;
      $array['msg'] ='Something getting wrong';
      echo json_encode($array);
    }

  }
}


function remove_wishlist(){
  if($this->request->getVar()){
    $save = array();
    $array = array();
    $product_id = decrypt_url($this->request->getVar('p_id'));
   
    $result = $this->AdminModel->deleteData('wishlist',array('product_id'=>$product_id,'customer_id'=>$this->session->get('user_id')));
    
    if ($result) {
      $array['status'] =1;
      $array['msg'] ='Wishlist remove successfully';
      echo json_encode($array);
    }else{
       $array['status'] =0;
      $array['msg'] ='Something getting wrong';
      echo json_encode($array);
    }

  }
}


function cancel_coupon(){
    $id = decrypt_url($this->uri->getSegment(2));
   if(!empty($id)){
       $result = $this->AdminModel->deleteData('order_coupon',array('id'=>$id));
      if($result){
          
      }else{
          
      }   
      return redirect()->to('checkout');
   }
}




}
