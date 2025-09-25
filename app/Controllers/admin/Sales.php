<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\SalesModel;
use App\Models\CartModel;
use App\Models\CommonModel;


class Sales extends BaseController
{

  public function __construct()
  {

      $session = \Config\Services::session();
    $this->admin_id = $session->get('adminLogin');
     $AdminModel = new CommonModel();
     $default_img = $AdminModel->fs('setting',array('key'=>'config_icon'));
     $this->config_logo = $default_img->value; 
             
  }


 public function index()
 {
     
  $model = new SalesModel();
  $permission = $this->AdminModel->permission($this->uri->getSegment(2));
  if(empty($permission)){
    return redirect()->to('admin/permission-denied');
  }

//pagination
  $pager= service('pager'); 
  $config["base_url"] = base_url() . "admin/order";
  $page =  (int)(($this->request->getVar('page')!==null)?$this->request->getVar('page'):1);  // offset
  $perPage =  10; //limit
  $total = $model->get_all_orders_count(@$_GET);
  $pager->makeLinks($page,$perPage,$total);
  $data['pager'] = $pager;
  $data['total_rows'] = $total;
  $data['offset'] = $page <=1?0:$page*$perPage-$perPage; 
  $data['pages'] = round($total/$perPage);
  $data['detail'] = $model->get_all_orders(@$_GET,$perPage,$data['offset']);

  // end pagination

  $data['page_title']  ='Order';
  $data['order_status_list'] = $this->AdminModel->all_fetch('order_status',null);
  $data['status_list'] = array('0'=>'Missing Orders','1'=>'Paids Orders');
  
  $setting = $this->AdminModel->all_fetch('setting',array('code'=>'config'));
    foreach ($setting as $key => $value) {
      $wconfig[$value->key]= $value->value;
    } 
   $data['wconfig'] =$wconfig;
  
  return view('admin/sales/order',$data);
   
  }


function delete_order($id)
{   
    if($id){
      $model = new SalesModel();
      $model->delete_order($id);
     $this->session->setFlashdata('success','Record Delete successfully');
    }else{
        $this->session->setFlashdata('error','Record Delete unsuccessful!');   
    }

  return redirect()->to('admin/order');
    
}


function delete_orders()
{  
    $model = new SalesModel();
    if ($this->request->getVar()) {
      $id = $this->request->getVar('selected');
      if($id){
      foreach($id as $value){ 
         $model->delete_order($value);
      }
        $this->session->setFlashdata('success','Record Delete successfully');
      }else{
                $this->session->setFlashdata('error','Record Delete unsuccessful!');   
            }
      }
    
  return redirect()->to('admin/order');
    
}




 function view_order($order_id){

    $model = new SalesModel();
    $data['page_title'] ='View Order';
    $data['order'] = $model->get_order_detail($order_id);
    $products = $model->get_order_product($order_id);
    $product_list = array();
    
     foreach ($products as $key => $value) {
        $product_list['product'][] = $value;
        if(!empty(json_decode($value->option))){
           $product_list['option'][] = $model->get_product_option($value->option); 
        }
    }

    $data['product_list'] = $product_list;
    $data['order_status'] = $this->AdminModel->all_fetch('order_status',null);
    $data['order_history'] = $model->get_order_history($order_id);
    $data['taxes'] = $model->get_all_order_taxes($order_id);
      
    $setting = $this->AdminModel->all_fetch('setting',array('code'=>'config'));
    foreach ($setting as $key => $value) {
      $all_setting[$value->key] = $value->value;
    }
    $data['config'] = $all_setting;
    $data['config_icon'] = $all_setting['config_icon'];
    
    return view('admin/sales/view_order',$data);
}






 function swift_code($order_id){

    $cart = new CartModel();
    $model = new SalesModel();

   $order1 = $cart->get_order_by_id($order_id);
   $product = $cart->get_all_order_product($order1->id);

    $setting = $this->AdminModel->all_fetch('setting',array('code'=>'config'));
    foreach ($setting as $key => $value) {
      $stconfig[$value->key] = $value->value;
    }
   
   //   pdf incoive
   $invoice = array();
   $invoice['order'] =  $order1;
   $invoice['config'] = $stconfig;
   $invoice['taxes'] =  $model->get_all_order_taxes($order1->id);
   $invoice['order_status_name'] = $order1->order_status_name;
      
    $product_list = array();
     foreach ($product as $key => $value) {
        $product_list['product'][] = $value;
        $product_list['option'][] = $model->get_product_option($value->option);
        
    }
    $invoice['product_list'] = $product_list;
   
    // $file_name = 'swiftcode_'.$order1->txnid.'.pdf';
    $dompdf = new \Dompdf\Dompdf(); 
    $dompdf->loadHtml(view('frontend/swift_code',$invoice));
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    // $dompdf->stream();
    $output = $dompdf->output();
    // file_put_contents('uploads/swift_code/'.$file_name, $output);
    $dompdf->stream();

   
}

function add_history(){
    $model = new SalesModel();
    if (!empty($this->request->getVar())) {

      $save = array();
      $save['order_id'] = $this->request->getVar('order_id');
      $save['order_status_id'] = $this->request->getVar('order_status_id');
      if($this->request->getVar('notify')){
       $save['notify'] = $this->request->getVar('notify');
      }
  
      $save['comment'] = $this->request->getVar('comment');
      $save['date_added'] = date('Y-m-d H:i:s');

      $result =   $this->AdminModel->insertData('order_history',$save);
      if ($result) {
        $cart = new CartModel();
    //   sms
        $order = $cart->get_order_by_id($save['order_id']);
        $mobile = $order->telephone;
        // send_order_sms($order);
      
        $this->AdminModel->updateData('order',array('order_status'=>$save['order_status_id'],'date_modified'=>date('Y-m-d H:i:s')),array('id'=>$save['order_id']));
      
    //   restock quantity  if order status is  7 = cancel
      if($save['order_status_id']=='7'){
          $product = $model->get_order_product($save['order_id']);
        //   start
        
         foreach ($product as $key => $value) {
   
          $option_id = json_decode($value->option_id);
          if (!empty($option_id[0])) {
            $subtract = $this->AdminModel->fs('product_option_value',array('id'=>$option_id[0]));
            if(!empty($subtract->subtract)){
            $qty1 = $subtract->quantity+$value->quantity;
             $this->AdminModel->updateData('product_option_value',array('quantity'=>$qty1),array('id'=>$option_id[0]));
             }
         
    
          }else{
    
             $is_subtract_quantity =  $this->AdminModel->fs('product',array('id'=>$value->product_id));
            
             if (!empty($is_subtract_quantity->subtract)) {
    
                $qty = $is_subtract_quantity->quantity+$value->quantity;
                $this->AdminModel->updateData('product',array('quantity'=>$qty),array('id'=>$is_subtract_quantity->id));
              }
          }
       }
          
        //   end
              
     }

  // mail send
  if (@$save['notify'] ==1) {
      
      $setting = $this->AdminModel->all_fetch('setting',array('code'=>'config'));
    foreach ($setting as $key => $value) {
      $wconfig[$value->key]= $value->value;
    } 
         $order = $cart->get_order_by_id($save['order_id']);
         
        $data['order'] = $order;
        $data['product'] = $cart->get_all_order_product($save['order_id']);
        $data['order_status_name'] = $order->order_status_name;
        $data['wconfig'] =$wconfig;
         $data['taxes'] = $model->get_all_order_taxes($save['order_id']);
        
        $email = \Config\Services::email();
       // email send

        $email = \Config\Services::email();
        $config['mailType'] = 'html';
        $config['wordWrap'] = true;
        $email->initialize($config);
        $email->setFrom($wconfig['sending_email'], $wconfig['config_name']);
        $email->setTo($order->email);
        $email->setSubject('Track Order Status mail');
        $message = view('frontend/order_mail_to_user',$data);
        $email->setMessage($message);
        $email->send();

    // end

      }
                  
       echo true;
      }else{
        echo false;
      }
    }
}
/////////////////

public function invoice($order_id){
    helper('number');
    $model = new SalesModel();
    $data['page_title'] ='Invoice';
    $data['order'] = $model->get_order_detail($order_id);
    $products = $model->get_order_product($order_id);
    $product_list = array();
    
     foreach ($products as $key => $value) {
        $product_list['product'][] = $value;
        $product_list['option'][] = $model->get_product_option($value->option);
        
    }

    $data['product_list'] = $product_list;
    $data['order_status'] = $this->AdminModel->all_fetch('order_status',null);
    $data['order_history'] = $model->get_order_history($order_id);
    $data['taxes'] = $model->get_all_order_taxes($order_id);
    
    $setting = $this->AdminModel->all_fetch('setting',array('code'=>'config'));
    foreach ($setting as $key => $value) {
      $all_setting[$value->key] = $value->value;
    }
    $data['config'] = $all_setting;
    
    return view('admin/sales/invoice',$data);
}



///////////////////

function order_export(){
error_reporting(0);
$model = new SalesModel();     
$list = $model->get_all_orders($this->request->getVar());

header("Content-type: application/csv");
header("Content-Disposition: attachment; filename=\"Export order report".".csv\"");
header("Pragma: no-cache");
header("Expires: 0");
$handle = fopen('php://output', 'w');

  fputcsv($handle,array(
    
    '0'=>'Order Id',
    '1'=>'Order Date',
    '2'=>'Part No.',
    '4'=>'Qty',
    '5'=>'Customer Name',
    '6'=>'Email address',
    '7'=>'Mobile',
    '8' =>'State Name',
    '9'=>'City',
    '10'=>'Address',
    '11'=>'Pincode',
    '12'=>'Sale amount',
    '13'=>'Mode Of Payment',
    '14'=>'Transaction Id',      
    '15'=>'Cod Charges',
    '16'=>'Coupon Code Detail',
    '17'=>'Discount',
    '18'=>'Order Status',
   )
);

 foreach ($list as $row) {
 $array = array();

$products = $model->get_order_product($row->id);
$product_list = array();
foreach ($products as $key => $value) {
  $product_list['product'][] = $value;
  if(!empty(json_decode($value->option))){
     $product_list['option'][] = $model->get_product_option($value->option); 
  }
}

$qty = '';
foreach ($product_list['product'] as $key => $value) {
  $qty .= $value->name.' - '.$value->quantity.', '; 
}

$part_no = '';
foreach ($product_list['product'] as $key => $value) {
  if(@$value->sku){
    $part_no .= $value->name.' - '.$value->part_no.', '; 
  }
  
}

$option = '';
foreach ($product_list['product'] as $key => $value) {
  if(@$value->option){
      $option .= $value->name.' - '.$value->option.', '; 
  }

}




          $array[]= $row->id;
          $array[]= $row->date_added;
          $array[]= $part_no?$part_no:'';
          $array[]= $qty?$qty:'';
          $array[]= $row->firstname.' '.$row->lastname;
          $array[]= $row->email?$row->email:'';
          $array[]= $row->telephone?$row->telephone:'';
          $array[]= $row->state_name?$row->state_name:'';
          $array[]= $row->payment_city?$row->payment_city:'';
          $array[]= $row->payment_address_1.' '.$row->payment_address_2.' '.$row->city_name.' '.$row->country_name;
          $array[]= $row->payment_postcode?$row->payment_postcode:'';
          $array[]= $row->total;
          $array[]=  $row->payment_method?$row->payment_method:'';
          $array[]=  $row->payu_id?$row->payu_id:$row->txnid;
          $array[]= $row->shipping_charge?$row->shipping_charge:'';
          $array[]= $row->coupon_code?$row->coupon_code:'';
         
          $array[]= $row->discount?$row->discount:'';
          $array[]= $row->current_status?$row->current_status:''; 


          fputcsv($handle, $array);
       }
               

$result =  fclose($handle); 
exit;
}


/////////////////////////


 function return_order()
 {
    $model = new SalesModel();
    if(empty($this->AdminModel->permission($this->uri->getSegment(2)))){
    return redirect()->to('admin/permission-denied');
    } 
    
    $data['page_title']  ='return';
    $data['returns'] = $model->get_all_return_order(@$this->request->getVar());
    echo view('admin/sales/return',$data);

 }
 
 
function add_return($id=false)
 { 
     
  if (@$id) {
    $data['page_title'] = ' Edit Return';
    $data['form_action'] ='admin/add_return/'.$id;  
    $row = $this->AdminModel->fs('return',array('id'=>$id));
    $data['order_id'] = $row->order_id;
    $data['date_ordered'] = $row->date_ordered;
    $data['customer'] = $row->customer_id; 
    $data['firstname'] = $row->firstname;
    $data['lastname'] = $row->lastname;
    $data['email'] = $row->email;
    $data['telephone'] = $row->telephone;
    $data['product'] =$row->product;
    $data['model'] =$row->model;
    $data['quantity'] = $row->quantity;
    $data['return_reason_id'] = $row->return_reason_id;
    $data['opened'] = $row->opened;
    $data['comment'] = $row->comment;
    $data['return_action_id'] = $row->return_action_id;
    $data['return_status_id'] = $row->return_status_id;
    }else{
    $data['page_title'] = ' Add Return';
    $data['form_action'] ='admin/add_return';
    $data['order_id'] = '';
    $data['date_ordered'] = '';
    $data['customer'] = ''; 
    $data['firstname'] = '';
    $data['lastname'] = '';
    $data['email'] = '';
    $data['telephone'] = '';
    $data['product'] ='';
    $data['model'] ='';
    $data['quantity'] = '';
    $data['return_reason_id'] = '';
    $data['opened'] = '';
    $data['comment'] = '';
    $data['return_action_id'] = '';
    $data['return_status_id'] = '';
    }


    if ($this->request->getMethod()=='post') {

      $rules =[
        'product'=>'required'
      ];
    if ($this->validate($rules)==false) {
     $data['validation'] = $this->validator;
    } else{

    $save= array();    
    $save['order_id'] =  $this->request->getVar('order_id');
    $save['date_ordered'] =  $this->request->getVar('date_ordered');
    $save['customer_id'] =  $this->request->getVar('customer');
    $save['firstname'] =  $this->request->getVar('firstname');
    $save['lastname'] =  $this->request->getVar('lastname');
    $save['email'] =  $this->request->getVar('email');
    $save['telephone'] =  $this->request->getVar('telephone');
    $save['product'] =  $this->request->getVar('product');
    $save['model'] =  $this->request->getVar('model');
    $save['quantity'] =  $this->request->getVar('quantity');
    $save['return_reason_id'] =  $this->request->getVar('return_reason_id');
    $save['opened'] =  $this->request->getVar('opened');
    $save['comment'] =  $this->request->getVar('comment');
    $save['return_action_id'] =  $this->request->getVar('return_action_id');
    $save['return_status_id'] =  $this->request->getVar('return_status_id');
  if ($id) {
     $save['date_modified'] =  date('Y-m-d');
    $result=  $this->AdminModel->updateData('return',$save,array('id'=>$id));
    if ($result) {
    $this->session->setFlashdata('success','Record Saved successfully');
    return redirect()->to('admin/return_order');
    }else{
    $this->session->setFlashdata('error','Record not insert');
    return redirect()->to('admin/add_return');
    }
  }else{
    $save['date_added'] =  date('Y-m-d');
    $save['date_modified'] =  date('Y-m-d');
    $result=  $this->AdminModel->insertData('return',$save);
    if ($result) {
    $this->session->setFlashdata('success','Record Update successfully');
    return redirect()->to('admin/return_order');
    }else{
    $this->session->setFlashdata('error','Record not insert');
    return redirect()->to('admin/add_return');
    }
    }
   }
  }

  echo view('admin/sales/add_return',$data);


}



function delete_return_order()
{
    if ($this->request->getVar('selected')) {
      $id = $this->request->getVar('selected');
  
     if ($id) {
         foreach($id as $value){
             $this->AdminModel->deleteData('return',array('id'=>$value));
         }
       $this->session->setFlashdata('success','Record Delete successfully');
     }else{
      $this->session->setFlashdata('error','Record delete unsuccessful!');
     }
     
    }
     
  return redirect()->to('admin/return_order');
    
}

// REPORT SECTION

function order_report()
 {
     if(empty($this->AdminModel->permission($this->uri->getSegment(2)))){
    return redirect()->to('admin/permission-denied');
    } 
     $model = new SalesModel();   
     $data['page_title']  ='Order Reports';
     $data['order_status_list'] = $this->AdminModel->all_fetch('order_status',null);
     $data['status_list'] = array('0'=>'Missing Orders','1'=>'Paids Orders');
     $data['detail'] = $model->get_all_orders_report(@$_GET);
    echo view('admin/sales/order_report',$data);
 }



function export_order_report(){

$model = new SalesModel();     
$list = $model->get_all_orders_report($this->request->getVar());

header("Content-type: application/csv");
header("Content-Disposition: attachment; filename=\"Export order report".".csv\"");
header("Pragma: no-cache");
header("Expires: 0");
$handle = fopen('php://output', 'w');

  fputcsv($handle,array(
    
    '0'=>'Date',
    '1'=>'Orders',
    '2'=>'Products',
    '3'=>'Gross sales',
    '4'=>'Discounts',
    '5'=>'Total sales'
   )
);

 foreach ($list as $row) {
         $product = $this->AdminModel->fs('order_product', array('order_id'=> $row->id));
          $array = array();
          $array[]= date('d M Y',strtotime($row->date_added));
          $array[]= $row->tdate;
          $array[]= $product->name;
          $array[]= $row->ttotall;
          $array[]= $row->tdiscount;
          $array[]=  $row->ttotall-$row->tdiscount;
         

          fputcsv($handle, $array);
       }
               

$result =  fclose($handle); 
exit;
     
 }



/////////////////////

 function inventory_reports()
 {
     if(empty($this->AdminModel->permission($this->uri->getSegment(2)))){
      return redirect()->to('admin/permission-denied');
     } 
      $model = new SalesModel();   
     $data['page_title']  ='Inventory Reports';
     $data['order_status_list'] = $this->AdminModel->all_fetch('order_status',null);
     $data['status_list'] = array('0'=>'Missing Orders','1'=>'Paids Orders');
     $data['detail'] = $model->get_all_inventory(@$_GET);
    echo view('admin/sales/inventory_report',$data);
 } 
 
 
function export_inventory_report(){
$model = new SalesModel(); 
$list = $model->get_all_inventory($this->request->getVar());

header("Content-type: application/csv");
header("Content-Disposition: attachment; filename=\"Export Inventory report".".csv\"");
header("Pragma: no-cache");
header("Expires: 0");
$handle = fopen('php://output', 'w');

  fputcsv($handle,array(
    
    '0'=>'Date',
    '1'=>'Product Name',
    '2'=>'Variant title',
    '3'=>'Variant SKU',
    '4'=>'Quantity sold',
    '5'=>'Current quantity',
    '6'=>'Percent sold'
   )
);

 foreach ($list as $value) {
     
          $array = array();
          $array[]= date('d M Y',strtotime($value->date_added));
          $array[]= $value->p_name;
          $array[]= strtoupper($value->option);
          $array[]= $value->sku;
          $array[]=  $value->quantity; 
          if(!empty($option_id[0])){
          $row = $this->AdminModel->fs('product_option_value',array('id'=>$option_id[0])); 
          $qty =  @$row->quantity; 
          }  else {
          $qty =  $value->product_qty;
          }  

          $array[]=  $qty;
          $array[]=  round($value->quantity * 100 / $value->product_qty,1);

          fputcsv($handle, $array);
       }
               
$result =  fclose($handle); 
exit;
     
 }
 
 //////////////////////

function average_inventory_reports()
 {
     if(empty($this->AdminModel->permission($this->uri->getSegment(2)))){
      return redirect()->to('admin/permission-denied');
     } 
      $model = new SalesModel();   
     $data['page_title']  ='Average Inventory Reports';
     $data['order_status_list'] = $this->AdminModel->all_fetch('order_status',null);
     $data['detail'] = $model->get_all_average_inventory(@$_GET);
     
    echo view('admin/sales/average_inventory_reports',$data);
 }


function export_inventory_average_report(){
$model = new SalesModel();   
$list = $model->get_all_average_inventory($this->request->getVar());

header("Content-type: application/csv");
header("Content-Disposition: attachment; filename=\"Export Inventory Average Report".".csv\"");
header("Pragma: no-cache");
header("Expires: 0");
$handle = fopen('php://output', 'w');

  fputcsv($handle,array(
    
    '0'=>'Date',
    '1'=>'Product Name',
    '2'=>'Variant title',
    '3'=>'Variant SKU',
    '4'=>'Current quantity',
    '5'=>'Quantity sold per day'
   )
);

 foreach ($list as $value) {
          $qty = 0;
          $array = array();
          $array[]= date('d M Y',strtotime($value->date_added));
          $array[]= $value->p_name;
          $array[]= strtoupper($value->option);
          $array[]= $value->sku;
          $option_id = json_decode($value->option_id);
          if(!empty($option_id[0])){
          $row = $this->AdminModel->fs('product_option_value',array('id'=>$option_id[0])); 
          $qty =  @$row->quantity; 
         }  else {
          $qty =  $value->product_qty;
         }  

          $array[]=  $qty;
          $array[]=  $value->quantity; 

          fputcsv($handle, $array);
       }
               

$result =  fclose($handle); 
exit;
     
 }
 
 ////////////////////

 
 function payment_finance_report()
 {
     
     if(empty($this->AdminModel->permission($this->uri->getSegment(2)))){
      return redirect()->to('admin/permission-denied');
     } 
      $model = new SalesModel();   
     $data['page_title']  ='Payment Finance Reports';
     $data['order_status_list'] = $this->AdminModel->all_fetch('order_status',null);
     $data['detail'] = $model->get_payment_finance_report(@$_GET);
     //print_r($data['detail']); exit();
    echo view('admin/sales/payment_finance_report',$data);
 }

function export_payment_report(){
$model = new SalesModel();      
$list = $model->get_payment_finance_report($this->request->getVar());

header("Content-type: application/csv");
header("Content-Disposition: attachment; filename=\"Export Payment Finacial Report".".csv\"");
header("Pragma: no-cache");
header("Expires: 0");
$handle = fopen('php://output', 'w');

  fputcsv($handle,array(
    
    '0'=>'Date',
    '1'=>'User Name',
    '2'=>'Payment Methods',
    '3'=>'Product Price',
    '4'=>'Quantity',
    '5'=>'Total Amount'
   )
);

 foreach ($list as $value) {
     
          $array = array();
          $array[]= date('d M Y',strtotime($value->date_added));
          $array[]= $value->firstname.' '.$value->lastname;
          $array[]= $value->payment_method;
          $array[]= $value->tprice;
          $array[]=  $value->tquantity;
          $array[]=  $value->tamount; 

          fputcsv($handle, $array);
       }
               

$result =  fclose($handle); 
exit;
     
 }
 
 
 
 ///////////////////




 function abc_analysis_product()
 { 
     if(empty($this->AdminModel->permission($this->uri->getSegment(2)))){
      return redirect()->to('admin/permission-denied');
     } 
      $model = new SalesModel();   
     $data['page_title']  ='ABC Analysis Product Reports';
     $data['order_status_list'] = $this->AdminModel->all_fetch('order_status',null);
     $data['detail'] = $model->get_abc_analysis_product(@$_GET);
     //print_r($data['detail']);exit();
   echo view('admin/sales/abc_analysis_product',$data);
 }
 
 
 
function export_abc_report(){
 $model = new SalesModel();        
$list = $model->get_abc_analysis_product($this->request->getVar());

header("Content-type: application/csv");
header("Content-Disposition: attachment; filename=\"Export ABC Report".".csv\"");
header("Pragma: no-cache");
header("Expires: 0");
$handle = fopen('php://output', 'w');

  fputcsv($handle,array(
    
    '0'=>'Date',
    '1'=>'Product Name',
    '2'=>'Variant title',
    '3'=>'Variant SKU',
    '4'=>'Total quantity',
    '5'=>'Quantity sold',
    '6'=>'Total value'
    
   )
);

 foreach ($list as $value) {
     
          $array = array();
          $array[]= date('d M Y',strtotime($value->date_added));
          $array[]= $value->p_name;
          $array[]= strtoupper($value->option); 
          $array[]= $value->sku;
          
          $option_id = json_decode($value->option_id); 
         if(!empty($option_id[0])){
         $row = $this->AdminModel->fs('product_option_value',array('id'=>$option_id[0])); 
          $qty =  @$row->quantity; 
         }  else {
          $qty =  $value->product_qty;
         }  

          $array[]=  $qty;
          $array[]=  $value->tquantity;
          $array[]=  $value->tamount; 

          fputcsv($handle, $array);
       }
               

$result =  fclose($handle); 
exit;
     
 }
 
 /////////////

function move_product(){
    $order_id = $this->request->getVar('order_id');
    
    // add order product to admin cart
    $order_product = $this->AdminModel->all_fetch('order_product',array('order_id'=>$order_id));

    if(!empty($order_product)){
      if($this->session->get('session_cart')){
          $session = $this->session->get('session_cart'); 
      }else{
          $unique = uniqid(); 
          $this->session->set('session_cart',$unique);
          $session =  $this->session->get('session_cart');
      }
        
        
      $this->AdminModel->deleteData('admin_cart',array('order_id'=>$order_id));
       $this->AdminModel->deleteData('admin_cart',array('session_id'=>$this->session->get('session_cart')));
      
      
        foreach($order_product as $value){
            $array = array();
            $array['order_id'] = $value->order_id;
            $array['product_id'] = $value->product_id;
            $array['quantity'] = $value->quantity;
            $array['session_id'] = $session;
            $this->AdminModel->insertData('admin_cart',$array);
          }
          echo true;
   }else{
       
       echo false;
   }
}

function add_order($id=false)
 {
     
     
    $model = new SalesModel();
    
    $data['product_list'] = $this->AdminModel->all_fetch('product',array('status'=>1),'name','asc',10);
    $data['order_status'] = $this->AdminModel->all_fetch('order_status',null,'name','asc');
    $data['country_list'] = $this->AdminModel->all_fetch('country',null);
    $data['config_logo'] = $this->config_logo;
    // error_reporting(0);
    
  if (!empty($id)) {

    $data['order'] = $this->AdminModel->fs('order',array('id'=>$id));
    $data['taxes'] = $model->get_all_taxes_detail($id);
    
    $this->session->set('user_id',$data['order']->customer_id);
    // $this->session->set('session_id',$this->session->get('session_cart'));
    $this->session->set('order_id',$id);
    
    $data['page_title'] = ' Edit Order';
    $data['form_action'] ='admin/add_order/'.$id;
    
    $data['address_list'] = $this->AdminModel->all_fetch('address',array('customer_id'=>$data['order']->customer_id));
   
    $data['cart_product'] = $model->get_all_cart_product($id);
    
    $data['discount'] = $this->AdminModel->fs('order_coupon',array('id'=>$data['order']->coupon_id));
    
    $data['total'] = $model->get_complete_cart_total($id)+$data['order']->shipping_charge-$data['order']->token_amount-$data['order']->discount; 

    }else{
    
    $data['txnid'] = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
    
      if($this->session->get('session_cart')){
          $session = $this->session->get('session_cart'); 
      }else{
          $unique = uniqid(); 
          $this->session->set('session_cart',$unique);
          $session =  $this->session->get('session_cart');
      }
      
    $this->session->remove('order_id');
    $this->session->remove('user_id');
 
    $data['page_title'] = ' Add Order';
    $data['form_action'] ='admin/add_order';
    $data['cart_product'] = $model->get_all_cart_product();
    $data['discount'] = $model->get_order_discount(); // order customer_id
    $data['total'] = $model->get_complete_cart_total(); 
    $data['taxes'] = $model->get_all_taxes_detail();
   
  }
  
 echo view('admin/sales/add_order',$data);
 
}




function add_to_cart(){
   $array = array();
   $product = array();
   $error_quantity = 0;
   
   $product_id = $this->request->getVar('product_id');
   $quantity =  $this->request->getVar('quantity');
//   $option =  json_encode([$this->input->getVar('option')]);
   $order_id =  $this->request->getVar('order_id');
 
    $p_qty = $this->AdminModel->fs('product',array('id'=>$product_id));
    if($p_qty->quantity < $quantity ){
    $error_quantity =1;    
    }
    // if($this->input->post('option')){
    //  $op_qty = $this->AdminModel->fs('product_option_value',array('id'=>$this->input->post('option'))); 
    //  if($op_qty->quantity < $quantity ){
    //  $error_quantity =1;    
    //  }
    // }
    
    if($error_quantity){
        $array['status'] = 0;
        $array['msg'] = 'This Product is out of stock';
        echo json_encode($array); 
        return false;
        exit();
        
    }
 
 $query = $this->db->table('admin_cart');
 
  $query->select('*');
  
  $query->where('product_id',$product_id);
    
  if(@$order_id){
   $query->where('order_id',$order_id);    
  }
  
//   if(@$option){
//   $this->db->where('option',$option);    
//   }
 
  $check_product_already =  $query->get()->getRow();
    if ($check_product_already) {
        $qty = $check_product_already->quantity;
        $query->set('quantity',$qty+$quantity);
        $query->where('product_id',$product_id);
     
       if(@$order_id){
        $query->where('order_id',$order_id);    
       }
       
       $query->where('session_id',$this->session->get('session_cart'));    

    //   if(@$option){
    //   $this->db->where('option',$option);    
    //   }
       
     $result = $query->update();
    }else{
        $product['product_id'] = $product_id;
        $product['quantity'] = $quantity;
        $product['order_id'] = $order_id;
        $product['session_id'] = $this->session->get('session_cart');
        $product['create_date'] = date('Y-m-d H:i:s');
     $result = $query->insert($product); 
    }

    if($result){
        $array['status'] = 1;
        $array['msg'] = 'Product Added success';
        echo json_encode($array);
    }else{
        $array['status'] = 0;
        $array['msg'] = 'Somthing getting wrong please retry';
        echo json_encode($array); 
    }
}

function remvoe_cart(){
    $id = $this->request->getVar('cart_id');
    if($id){
    echo   $this->AdminModel->deleteData('admin_cart',array('id'=>$id));
    }
}

function update_cart()
{
  if($this->request->getMethod()=='post'){
    $array = array();
    $id = $this->request->getVar('cart_id');
    $quantity = $this->request->getVar('quantity');
    $result = $this->AdminModel->updateData('admin_cart',array('quantity'=>$quantity),array('id'=>$id));
    if ($result) {
    $array['status'] =1;
    echo json_encode($array);
    }else{
    $array['status'] = 0;
    $array['msg'] = 'Error in  udating quantity of this product please retry';
    echo json_encode($array);
    }
  }
}




function check_coupan(){  
$cart = new CartModel();
$model = new SalesModel();

if ($this->request->getVar('code')) {

$array = array();
$code = $this->request->getVar('code');
$valid = $cart->check_coupan_code($code); // coupon is valid and coupon detail
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
    $coupon['session_id'] = $this->session->get('session_cart');
   
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

///////






function confirm(){

if($this->request->getMethod()=='post'){
    $cart = new CartModel();
    $model = new SalesModel();
    $array = array();
    $order = array();
    $address = array();
    $existing =0;
    $token_amount = 0;
    $order_id = 0;

    $setting = $this->AdminModel->all_fetch('setting',array('code'=>'config'));
    foreach ($setting as $key => $value) {
      $stconfig[$value->key]= $value->value;
    } 
        
 
   
    if ($this->request->getVar('payment_address') =='new') {

        $address['firstname'] = $this->request->getVar('payment_firstname');
        $address['lastname'] = $this->request->getVar('payment_lastname');
        $address['phone'] = $this->request->getVar('telephone');
        $address['email'] = $this->request->getVar('email');
        $address['address1'] = $this->request->getVar('payment_address_1');
        $address['address2'] = $this->request->getVar('payment_address_2');
        $address['pincode'] = $this->request->getVar('payment_postcode');
        $address['country_id'] = $this->request->getVar('payment_country_id');
        $address['city'] = $this->request->getVar('payment_city');
        $address['state_id'] = $this->request->getVar('payment_zone_id');
        $address['create_date'] = date('Y-m-d');
        $address['modify_date'] = date('Y-m-d');


      if (!empty($this->request->getVar('customer_id'))) {
       $address['customer_id'] = $this->request->getVar('customer_id');
       // save logged user address
       $this->AdminModel->insertData('address',$address);
      }

    }

    $order['info']['payment_firstname'] = $this->request->getVar('payment_firstname');
    $order['info']['payment_lastname'] = $this->request->getVar('payment_lastname');      
    $order['info']['firstname'] = $this->request->getVar('firstname');
    $order['info']['lastname'] = $this->request->getVar('lastname');
    $order['info']['telephone'] = $this->request->getVar('telephone');
    $order['info']['email'] = $this->request->getVar('email');
    $order['info']['payment_address_1'] = $this->request->getVar('payment_address_1');
    $order['info']['payment_address_2'] = $this->request->getVar('payment_address_2');
    $order['info']['payment_postcode'] = $this->request->getVar('payment_postcode');
    $order['info']['payment_country_id'] = $this->request->getVar('payment_country_id');
    $order['info']['payment_city'] = $this->request->getVar('payment_city');
    $order['info']['payment_note'] = $this->request->getVar('comment');
    $order['info']['payment_zone_id'] = $this->request->getVar('payment_zone_id');
    
  
    $order['info']['order_id'] = $this->request->getVar('order_id');
    $order['info']['ip'] = $_SERVER['REMOTE_ADDR'];
    $order['info']['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
    $order['info']['payment_method'] = $this->request->getVar('payment_method');

    $order['info']['session_id'] = $this->session->get('session_id');
    $order['info']['order_status'] = $this->request->getVar('order_status');

   

  $order_id = $this->request->getVar('order_id');

  if(!empty($order_id)){
   $original_order = $this->AdminModel->fs('order',array('id'=>$order_id));    
        
   $total = $model->get_complete_cart_total($order_id)+$original_order->shipping_charge-$original_order->token_amount-$original_order->discount;
    
  $order['info']['token_amount'] =  $original_order->token_amount;
  $order['info']['shipping_charge'] = $original_order->shipping_charge;    
  $order['info']['total'] = $total; 
  $order['info']['date_modified'] = date('Y-m-d H:i:s');
  $order['info']['customer_id'] = $this->request->getVar('customer_id');

  }else{

       $total = $model->get_complete_cart_total();   // this price is already discount deducted

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

      if (!empty($this->session->get('user_id'))) {
      $order['info']['customer_id'] = $this->session->get('user_id');
      }else{
      $order['info']['customer_id'] = 0;
      } 
      $order['info']['txnid'] = $this->request->getVar('txnid');
  }
 


   
    $taxes = $model->get_all_taxes_detail($order_id);

    if(!empty($taxes)){
        $tax_amount = 0;
        foreach($taxes as $tax){
            $tax_amount += $tax['tax_amount'];
        }
     $order['info']['tax'] = $tax_amount; 
     $order['taxes'] = $taxes;
     
    }


    $order['products'] = $model->get_all_cart_product($order_id);

    // if($total<1){
    // $array['status'] = 0;    
    // $array['msg'] = 'Token amount must not be zero if you choose place order on cod , you can choose payumoney option';
    // echo json_encode($array);
    // exit();  
    // }

    // if($total< $stconfig['cod_amount']){
    // $array['status'] = 0;    
    // $array['msg'] = 'Order can only be placed after total cart amount is greater than or equal to '.$stconfig['cod_amount'];
    // echo json_encode($array);
    // exit();  
    // }




    if(empty($order['products']) ||  $total<1 || empty($total)){
    $array['status'] = 0;
    $array['msg'] = 'Order Can`t be place without any product';
    echo json_encode($array);
    exit();
    }


    $result =  $model->save_order($order);

    if ($result) {
  
     if($order['info']['order_id']){
     $this->AdminModel->deleteData('admin_cart',array('order_id'=>$order['info']['order_id']));    
     }
    
    $this->AdminModel->deleteData('admin_cart',array('session_id'=>$order['info']['session_id']));
    
    // update coupon
    if (!empty($order['info']['discount'])) {
    $this->AdminModel->updateData('order_coupon',array('status'=>1),array('id'=>$order['info']['coupon_id']));
    }


   $order1 = $cart->get_order_by_id($result);
   $data['order'] = $order1;
   $data['product'] = $cart->get_all_order_product($order1->id);
   $data['order_status_name'] = $order1->order_status_name;
   $data['wconfig'] = $stconfig;
   $data['taxes'] = $model->get_all_order_taxes($order1->id);
    
   if(empty($order['info']['order_id'])) {
       
   //   pdf incoive
   $invoice = array();
   $invoice['order'] =  $order1;
   $invoice['config'] = $stconfig;
   $invoice['taxes'] =  $data['taxes'];
   
    $product_list = array();
     foreach ($data['product'] as $key => $value) {
        $product_list['product'][] = $value;
        $product_list['option'][] = $model->get_product_option($value->option);
        
    }
    $invoice['product_list'] = $product_list;
   
   $file_name = 'invoice_'.$order1->txnid.'.pdf';
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
    $email->setFrom($stconfig['sending_email'], $stconfig['config_name']);
    $email->setTo($order1->email);
    $email->setSubject('Order placed successfully');
    $path = base_url('uploads/invoice/'.$file_name);
    $email->attach($path);
    $message = view('frontend/order_mail_to_user',$data);
    $email->setMessage($message);
    $email->send();
   // end mail
   
   //   Admin Email

    // $email->setFrom($stconfig['sending_email'], $stconfig['config_name']);
    // $email->setTo($stconfig['config_email']);
    // $email->setSubject('One New Order Received');
    // $message = view('frontend/order_mail_to_admin',$data);
    // $email->setMessage($message);
    // $email->send();
    unlink('uploads/invoice/'.$file_name);
 
    }   
    // end

    $this->session->remove('order_id');
    $this->session->remove('user_id');
    $this->session->remove('session_cart');
    $array['status'] =1; // its for json status only
    $array['msg'] = 'Record Save successfully';
    echo json_encode($array);
    }else{
    $array['status'] =0;
    $array['msg'] = 'Something went wrong please retry';
    echo json_encode($array);
    }
  
  }
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
/////////////////////




 function import_orders(){

$sms = array();

 if(empty($_FILES['csv']['name'])){
    return redirect()->to('admin/order');
 }
 
 
if (@$_FILES['csv']['tmp_name']) {
  $file = $_FILES['csv']['tmp_name'];
  $handle = fopen($file, "r");
  $c = 0;//
  while(($filesop = fgetcsv($handle, 1000, ",")) !== false)
  {
      
        $array = array();

        $txnid = trim($filesop[0]);
        $order_status = trim($filesop[1]); 
        $customer_id = $filesop[2];
        $first_name = $filesop[3];
        $last_name = $filesop[4];
        $email = $filesop[5];
        $mobile = $filesop[6];
        $address1 = $filesop[7];
        $address2 = $filesop[8];
        $city = $filesop[9];
        $pincode = $filesop[10];
        $country = $filesop[11];
        $total = $filesop[12];
        $discount = $filesop[13];
        $shipping_charge = $filesop[14]; 
        $coupon_id = $filesop[15];
        $tax = $filesop[16];
        $payment_method = $filesop[17]; 
        $order_date = $filesop[18];
        $products =  $filesop[19];
      
       

    if($c<>0){   //SKIP THE FIRST ROW
                  
         $array['txnid'] = $txnid ;
         $array['order_status'] = $order_status ;
         $array['customer_id'] = $customer_id ;
         $array['firstname'] = $first_name ;
         $array['lastname'] = $last_name ;
         $array['email'] = $email ;
         $array['telephone'] = $mobile;
         $array['payment_address_1'] = $address1;
         $array['payment_address_2'] = $address2 ;
         $array['payment_city'] = $city ;
         $array['payment_postcode'] = $pincode ;
         $array['payment_country_id'] = $country ;
         $array['total'] = $total ;
         $array['discount'] = $discount ;
         $array['shipping_charge'] = $shipping_charge ;
         $array['coupon_id'] = $coupon_id ;
         $array['tax'] = $tax ;
         $array['payment_method'] = $payment_method ;
         
         if(!empty($coupon_id)){
          $coupon = $this->AdminModel->fs('coupon',array('id'=>$coupon_id));
          $array['coupon_code'] = $coupon->coupon_code;    
         }


       if ($array) {
          
            $check = $this->AdminModel->fs('order',array('txnid'=>$txnid));

            if (!empty($check)) {
                  // update code
                $array['date_modified'] = date('Y-m-d H:i:s');
                $this->AdminModel->updateData('order',$array,array('id'=>$check->id));
                $order_id = $check->id;

            }else{
                
              $array['date_added'] = $order_date;
              $array['date_modified'] = $order_date;
              $order_id =   $this->AdminModel->insertData('order',$array);
               
            }
               
              // order product

              if (!empty($products)) {

                if(!empty($check)){
                  $this->AdminModel->deleteData('order_product',array('order_id'=>$check->id));
                }
               
                $product  = explode('@', $products);
                foreach($product as  $row) {
                  $commaseprater = explode(',', $row);
                  $detail = $this->AdminModel->fs('product',array('id'=>$commaseprater[0]));
                
                  $arr = array();
                  $arr['order_id'] = $order_id;
                  $arr['product_id'] = $commaseprater[0];
                  $arr['quantity'] = trim($commaseprater[1]);         
                  $arr['price'] = trim($commaseprater[2]); 
                  $arr['name'] = $detail->name;
                  $arr['part_no'] = $detail->part_no;
                  $arr['option_image'] = $detail->image;
                  $arr['total'] =    $arr['price'] * $arr['quantity']; 
                  $result =  $this->AdminModel->insertData('order_product',$arr);  
   
                }

            }
            
       }
    }
    $c = $c + 1;

  }

  if (@$result) {
      
    $this->session->setFlashdata('success','Record saved successfully');
    return redirect()->to('admin/order');
  }else{
    $this->session->setFlashdata('error','Order and status id must be only numeric');
    return redirect()->to('admin/order');
  }

 } 
}


}
