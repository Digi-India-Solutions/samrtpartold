<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\ProductFrontModel;
use App\Models\CartModel;
use App\Models\CommonModel;


class SalesModel extends Model
{
  protected $DBGroup              = 'default';
  protected $table                = 'sales';
  protected $primaryKey           = 'id';
  protected $useAutoIncrement     = true;
  protected $insertID             = 0;
  protected $returnType           = 'array';
  protected $useSoftDeletes       = false;
  protected $protectFields        = true;
  protected $allowedFields        = [];

  // Dates
  protected $useTimestamps        = false;
  protected $dateFormat           = 'datetime';
  protected $createdField         = 'created_at';
  protected $updatedField         = 'updated_at';
  protected $deletedField         = 'deleted_at';

  // Validation
  protected $validationRules      = [];
  protected $validationMessages   = [];
  protected $skipValidation       = false;
  protected $cleanValidationRules = true;

  // Callbacks
  protected $allowCallbacks       = true;
  protected $beforeInsert         = [];
  protected $afterInsert          = [];
  protected $beforeUpdate         = [];
  protected $afterUpdate          = [];
  protected $beforeFind           = [];
  protected $afterFind            = [];
  protected $beforeDelete         = [];
  protected $afterDelete          = [];



  function get_all_orders($filter=false,$limit=false, $offset=false){

  $query = $this->db->table("order as ord");

    $query->select('ord.*,os.name as current_status, st.name as state_name');
    $query->join('order_status os','ord.order_status=os.id','left');
    $query->join('state st','ord.payment_zone_id=st.id','left');
    
  if(empty($filter)){
     $query->where('ord.order_status <>',7); 
      
    }
    if(!empty($limit)){
    $query->limit($limit,$offset); 
    }
    
    if (@$filter['order_status_id']) { 
    $query->where('ord.order_status',$filter['order_status_id']);
    }
    
    if (@$filter['name']) {
    $query->like('ord.firstname',$filter['name'],'both');
    }
    
    if (@$filter['date_added']) {
    $query->where('ord.date_added >=',$filter['date_added']);
    }
    
    if (@$filter['date_end']) {
    
    $stop_date = date('Y-m-d', strtotime($filter['date_end'] . ' +1 day')); 
    $query->where('ord.date_added <=',$stop_date);
    }
    
    if (@$filter['order_id']) {
    $query->where('ord.id',$filter['order_id']);
    }
    if (@$filter['email']) {
    $query->where('ord.email',$filter['email']);
    }
    
    if (@$filter['total']) {
    $query->where('ord.total',$filter['total']);
    }  
     $query->orderBy('ord.id','desc');
   
  return $query->get()->getResult();
}

  function get_all_orders_count($filter=false){

  $query = $this->db->table("order as ord");

    $query->select('ord.*,os.name as current_status, st.name as state_name');
    $query->join('order_status os','ord.order_status=os.id','left');
    $query->join('state st','ord.payment_zone_id=st.id','left');
    
    if(empty($filter)){
     $query->where('ord.order_status <>',7); 
      
    }
   
    
    if (@$filter['order_status_id']) { 
    $query->where('ord.order_status',$filter['order_status_id']);
    }
    
    if (@$filter['name']) {
    $query->like('ord.firstname',$filter['name'],'both');
    }
    
    if (@$filter['date_added']) {
    $query->where('ord.date_added >=',$filter['date_added']);
    }
    
    if (@$filter['date_end']) {
    
    $stop_date = date('Y-m-d', strtotime($filter['date_end'] . ' +1 day')); 
    $query->where('ord.date_added <=',$stop_date);
    }
    
    if (@$filter['order_id']) {
    $query->where('ord.id',$filter['order_id']);
    }
    if (@$filter['email']) {
    $query->where('ord.email',$filter['email']);
    }
    
    if (@$filter['total']) {
    $query->where('ord.total',$filter['total']);
    }  
    $query->orderBy('ord.id','desc');
   
  return $query->countAllResults();
}


function get_order_detail($order_id){
  $query = $this->db->table('order as ord');  
  $query->select('ord.*,os.name as order_status_name,cnt.name as country_name');
  $query->where('ord.id',$order_id);
  $query->join('user ur','ord.customer_id=ur.id','left');
  $query->join('order_status os','ord.order_status=os.id','left');
//   $query->join('coupon cp','ord.coupon_id=cp.id','left');
     $query->join('country cnt','ord.payment_country_id=cnt.id','left');
  return $query->get()->getRow();

}

function get_order_product($order_id){
  $query = $this->db->table('order_product as op');   
  $query->select('op.*,pd.model,pd.product_seo_url,pd.image,pd.sku,pd.description,pd.part_no,bd.name as brand_name,bd.image as brand_image');
  $query->where('op.order_id',$order_id);
  $query->join('product pd','op.product_id=pd.id','left');
  $query->join('brands bd','pd.brand=bd.id','left');
  $query->orderBy('op.id','asc');
return $query->get()->getResult();
}

function get_product_option($option){
  // $this->db->select('ovd.*')->from('product_option_value pov');
  if(!empty(json_decode($option))){
  $query = $this->db->table('product_option_value as pov');   
  $query->select('pov.*');
  $query->where_in('pov.id',json_decode($option));
  // $query->join('option_value_description ovd','pov.option_value_id=ovd.id');
  return $query->get()->getResult();
  }else{
    return array();
  }
}

function get_order_history($order_id){
  $query = $this->db->table('order_history as oh'); 
  $query->select('oh.*,os.name');
  $query->where('oh.order_id',$order_id);
  $query->join('order_status os','oh.order_status_id=os.id');
  $query->orderBy('oh.id','asc');
  return $query->get()->getResult();

}

function delete_order($order_id){
    if($order_id){

      $query = $this->db->table('order'); 
        $result = $query->where('id',$order_id)->delete();

        $query1 = $this->db->table('order_product');
            $query1->where('order_id',$order_id)->delete();
        if($result){
            return true;
        }else{
            return false;
        }
        
    }
}

function get_all_return_order($filter = array()){
        $query = $this->db->table('return');  
        $query->select('*');
        if(!empty($filter['id'])){
            $query->where('id',$filter['id']);
        }

         if(!empty($filter['order_id'])){
            $query->where('order_id',$filter['order_id']);
        }
        
         if(!empty($filter['customer'])){
            $query->like('firstname',$filter['customer'],'both');
        }
        
         if(!empty($filter['product'])){
            $query->like('product_id',$filter['product'],'both');
        }
          if(!empty($filter['model'])){
            $query->like('model',$filter['model'],'both');
        }
          if(!empty($filter['return_status_id'])){
            $query->where('return_status_id',$filter['return_status_id']);
        }
        
        return $query->get()->getResult();
}


//////////
// report section

function get_abc_analysis_product($filter=false){
  $query = $this->db->table('order_product as op');

  $query->select('ord.*,sum(op.price) as tprice,op.name as p_name,op.product_id,op.option,op.option_id,sum(op.quantity) as tquantity,sum(ord.total) as tamount,pd.sku,pd.model,pd.quantity as product_qty');
  $query->join('order ord','op.order_id=ord.id','left');
  $query->groupBy('op.product_id');
  $query->orderBy('ord.id','desc');
  $query->join('product pd','op.product_id=pd.id','left');
  
    if (@$filter['name']) {
    $query->where("op.name =",$filter['name']);
    }
    if (@$filter['date_added']) {
    $query->where("DATE_FORMAT(ord.date_added, '%Y-%m-%d') =",date('Y-m-d', strtotime($filter['date_added'])));
    }

  return $query->get()->getResult();
}

function get_all_orders_report($filter = false){
      $query = $this->db->table('order as ord');
$query->select('ord.*,count(date_added) as tdate,sum(total) as ttotall,sum(discount) as tdiscount,os.name as current_status');
$query->groupBy('DATE(date_added), MONTH(date_added), YEAR(date_added)');
$query->join('order_status os','ord.order_status=os.id','left');
 
if (@$filter['start_date']) {
$query->where("ord.date_added >=",$filter['start_date']);
}

if (@$filter['end_date']) {
   $stop_date = date('Y-m-d', strtotime($filter['end_date'] . ' +1 day'));
   $query->where("ord.date_added <=",$stop_date);
}
  $query->orderBy('ord.id','desc');
  return $query->get()->getResult();
}


function get_all_inventory($filter=false){
    $query = $this->db->table('order_product as op');
  $query->select('ord.*,op.quantity as tquantity,op.name as p_name,op.product_id,op.option_id,op.option,sum(op.quantity) as quantity,pd.sku,pd.model,pd.quantity as product_qty');
  $query->join('order ord','op.order_id=ord.id','left');
  $query->groupBy('op.product_id');
  $query->orderBy('ord.id','desc');
  $query->join('product pd','op.product_id=pd.id','left');
 
 
 
if (@$filter['name']) {
$query->where("op.name =",$filter['name']);
}
if (@$filter['date_added']) {
 $query->where("DATE_FORMAT(ord.date_added, '%Y-%m-%d') =",date('Y-m-d', strtotime($filter['date_added'])));
}
  
  
  return $query->get()->getResult();
}


function get_all_average_inventory($filter=false){
    $query = $this->db->table('order_product as op');
  $query->select('ord.*,op.quantity as tquantity,op.name as p_name,op.product_id,op.option_id,op.option,sum(op.quantity) as quantity,pd.sku,pd.model,pd.quantity as product_qty');
  $query->join('order ord','op.order_id=ord.id','left');
  $query->groupBy('op.product_id');
  $query->orderBy('ord.id','desc');
  $query->join('product pd','op.product_id=pd.id','left');
 
if (@$filter['name']) {
$query->where("op.name=",$filter['name']);
}
if (@$filter['date_added']) {
$query->where("DATE_FORMAT(ord.date_added, '%Y-%m-%d') =",date('Y-m-d', strtotime($filter['date_added'])));
}
   
   
   
  return $query->get()->getResult();
}

function get_payment_finance_report($filter=false){
    $query = $this->db->table('order_product as op');
  $query->select('ord.*,sum(op.price) as tprice,op.name as p_name,op.product_id,op.option,sum(op.quantity) as tquantity,sum(ord.total) as tamount');
  $query->join('order ord','op.order_id=ord.id','left');
  $query->groupBy('ord.firstname');
  
    if (@$filter['f_name']) {
    $query->like("ord.firstname",$filter['f_name']);
    }
    if (@$filter['l_name']) {
    $query->like("ord.lastname",$filter['l_name']);
    }
    if (@$filter['date_added']) {
    $query->where("DATE_FORMAT(ord.date_added, '%Y-%m-%d') =",date('Y-m-d', strtotime($filter['date_added'])));
    }
    $query->orderBy('ord.id','desc');
  return $query->get()->getResult();
}



function get_export_orders($array = false){
   $query = $this->db->table('order as ord');
$query->select('ord.*,os.name as current_status,cp.coupon_code,cnt.name as country_name,st.name as state_name');
$query->join('order_status os','ord.order_status=os.id','left');
$query->join('order_coupon cp','ord.coupon_id=cp.id','left');
$query->join('country cnt','ord.payment_country_id=cnt.id','left'); 
$query->join('state st','ord.payment_zone_id=st.id','left'); 
// $query->join('city cy','ord.payment_city_id=cy.id','left');
// $query->where('ord.order_status <>',7);
if($array){
      
    if (@$array['order_status_id']) { 
      $query->where('ord.order_status',$array['order_status_id']);
  }

  if (@$array['name']) {
   $query->like('ord.firstname',$array['name'],'both');
  }

if (@$array['date_added']) {
   $query->where('ord.date_added >=',$array['date_added']);
  }

  if (@$array['date_end']) {

   $stop_date = date('Y-m-d', strtotime($array['date_end'] . ' +1 day')); 
   $query->where('ord.date_added <=',$stop_date);
  }

if (@$array['order_id']) {
   $query->where('ord.id',$array['order_id']);
  }

if (@$array['total']) {
   $query->where('ord.total',$array['total']);
  }

    if(!empty($array['selected']) && count($array['selected'])){

     $query->whereIn('ord.id',$array['selected']);  
  }


  $query->orderBy('ord.id','desc');
  return  $query->get()->getResult();
    
}


//   $this->db->where('ord.status',1);
   $this->db->orderBy('ord.id','desc');
  return $query->get()->getResult();
}


function get_all_order_taxes($order_id){

  $query = $this->db->table('order_taxes');
  return $query->select('*')->where('order_id',$order_id)->get()->getResult();

}


//////////

// admin cart


function get_all_cart_product($order_id = false){
    $model = new CartModel();
    
    
  $query = $this->db->table('admin_cart ct');    
  $query->select('pd.*,ct.quantity as p_quantity,ct.id as cart_id,ct.option as cart_option,brn.image as brand_image,brn.name as brand_name');
  $query->join('product pd','ct.product_id=pd.id','left');
    $query->join('brands brn','pd.brand=brn.id','left'); 

  if (@$order_id) {
  $query->where('ct.order_id',$order_id);
  }else{
    // $query->where('ct.order_id','0');  
    $query->where('ct.session_id',session()->get('session_cart'));   
  }
  
  $product = array();
  $items =  $query->get()->getResult();
  
  if ($items) {
    foreach ($items as $key => $value) { 
     $array = array();
      $array['id'] = $value->id;
      $array['name'] = $value->name;
      $array['p_quantity'] = $value->p_quantity;
      $array['cart_id'] = $value->cart_id;
      $array['image'] = $value->image;
      $array['brand_image'] = $value->brand_image;
      $array['brand_name'] = $value->brand_name;
      $array['product_seo_url'] = $value->product_seo_url;
      $array['sku'] = $value->sku;
      $array['part_no'] = $value->part_no;
      $array['origin'] = $value->origin;
      $array['class'] = $value->class;

      $special_price = $model->get_special_price($value->id);
      if (!empty($special_price)) {
      $array['price'] = $special_price;
      }else{
      $array['price'] = $value->price;
      }    
          
      
      $product[]= $array;
      
    }
    return $product;

  }else{
    return $product;
  }

}

function get_order_discount(){
$this->cart = new CartModel();   
$this->AdminModel = new CommonModel();


if (session()->get('user_id')) {
$customer_id = session()->get('user_id');
}

$query = $this->db->table('order_coupon oc');
$query->select('oc.*');
$query->where(array('oc.session_id'=>session()->get('session_cart'),'oc.status'=>0)); 
$query->join('coupon co','oc.coupon_id=co.id','left');
$query->where(array('co.end_date >='=>date('Y-m-d'),'co.status'=>'1'));
$valid_coupon =  $query->get()->getRow();  // order coupon entry
if (!empty($valid_coupon)) {
  $array = array();
  $discount_price = 0;
  $amount = 0;
  $total = $this->get_cart_total();
  $coupon_id = $valid_coupon->coupon_id;
  $coupon = $this->cart->get_coupon_detail($coupon_id);  // coupon detail

 // check coupon product is not null
    $coupon_to_product = $this->AdminModel->all_fetch('coupon_to_product',array('coupon_id'=>$coupon_id));

     // check coupon category is not null
     $coupon_to_category = $this->AdminModel->all_fetch('coupon_to_category',array('coupon_id'=>$coupon_id));

    if (!empty($coupon_to_product) || !empty($coupon_to_category)) {
 
      $product = $this->get_all_cart_product();
      
      
      foreach ($product as $key => $pp) { 

      $check_coupon_to_product = $this->AdminModel->fs('coupon_to_product',array('product_id'=>$pp['id'],'coupon_id'=>$coupon_id));

        $get_category = $this->AdminModel->fs('product_to_category',array('product_id'=>$pp['id']));

        $check_coupon_to_category = $this->AdminModel->fs('coupon_to_category',array('category_id'=>$get_category->category_id,'coupon_id'=>$coupon_id));

        if (!empty($check_coupon_to_product) || !empty($check_coupon_to_category)) {
        
           if ($coupon->coupon_type=='P') {
            $amount = $pp['price']*$pp['p_quantity'];
           $discount_price  += $amount*$coupon->coupon_discount/100;
           }else{
           $discount_price  += $coupon->coupon_discount; 
           }

        }

      }

      if (!empty($discount_price)) {
        $array['status'] = 1;
        $array['discount'] = $discount_price;
      }else{
        // it is only for when proudct valid for discount (means coupon is created for product/category base but coupon is expired)
        $this->AdminModel->delete('order_coupon',array('id'=>$valid_coupon->id));
      }

      
    }else{
     
      // this discount for all cart total in absenace of coupon product or category 
       $array['status'] = 1;
       $total_amount = $this->get_cart_total();  

       if ($coupon->coupon_type=='P') {
       $array['discount'] = $total_amount*$coupon->coupon_discount/100;
       }else{
       $array['discount'] = $coupon->coupon_discount; 
       }
   
    }

     if (!empty($array['discount'])) {
    $coupon_arr = array();
    $coupon_arr['coupon_id'] = $coupon_id; 
    $coupon_arr['amount'] = $array['discount'];
    $coupon_arr['coupon_code'] = $coupon->coupon_code;
    $coupon_arr['session_id'] = session()->get('session_cart');
   
    if (!empty(session()->get('user_id'))) {
    $coupon_arr['customer_id'] = session()->get('user_id');
    }
   
    $coupon_arr['create_date'] = date('Y-m-d H:i:s');
    $check_already_applied = $this->check_coupan_applied($coupon_id);  

   if (!empty($check_already_applied)) {
    $this->AdminModel->updateData('order_coupon',$coupon_arr,array('session_id'=>session()->get('session_id')));
   }else{
    $this->AdminModel->insertData('order_coupon',$coupon_arr);
     }

   }

return  $this->AdminModel->fs('order_coupon',array('id'=>$valid_coupon->id));
}else{
return array();
}

}


function check_coupan_applied($coupon_id){
  $query = $this->db->table('order_coupon'); 
  $query->select('*');
  $query->where('coupon_id',$coupon_id);
  $query->where('session_id',session()->get('session_cart')); 
  $query->where('status',0);
return  $query->get()->getRow();
}


function check_coupan_allowed_to_user($coupon_id){
    $this->cart = new CartModel();  
    $this->AdminModel = new CommonModel();
    $coupon =  $this->cart->get_coupon_detail($coupon_id);

    $query = $this->db->table('order_coupon');  
    $query->select('*');
    $query->where(array('session_id'=>session()->get('session_cart'),'coupon_code'=>$coupon->coupon_code,'status'=>1)); 
    $uses = $query->get()->getResult();
    
    if ($coupon->user_coupon > count($uses)) {
    return true;
    }else{
    return false;
    }
}


function get_cart_total($order_id = false){
    $total = 0;
  $product = $this->get_all_cart_product($order_id);
  if ($product) {
    foreach ($product as $key => $value) {
      $total += $value['price'] * $value['p_quantity'];
    }
    return $total;
  }
  return $total;

}


function get_complete_cart_total($order_id=false){
  $total = 0;
  $total_tax = 0;

  $total = $this->get_cart_total($order_id);
  if(!empty($total)){
   $taxes = $this->get_all_taxes();
    if(!empty($taxes)){
      
      foreach ($taxes as $key => $value) {
         
         if ($value->type=='P') {
            $total_tax += $total*$value->rate/100;

         }else{
            $total_tax += $value->rate;
         }
      }

      $total = $total + $total_tax;
    }

   
   $discount =   $this->get_order_discount();
    if(@$discount){
      $total = $total - $discount->amount;  
    }
         
    return round($total,2);
  }
  return $total;

}


function get_all_taxes(){
  $query = $this->db->table('tax_rate');
  $result =  $query->select('*')->where('status',1)->get()->getResult();
  if ($result) {
    return $result;
  }else{
    return array();
  }
}

function get_all_taxes_detail($order_id = false){
  $total = $this->get_cart_total($order_id);
  $tax_array = array();
  $total_tax = 0;

  $query = $this->db->table('tax_rate');
  $result =  $query->select('*')->where('status',1)->get()->getResult();
  if (!empty($result) && !empty($total)) {
      foreach ($result as $key => $value) {
          $array = array();
          $array['name'] = $value->name;
          $array['description'] = $value->description;
          $array['rate'] = round($value->rate,2);


         if ($value->type=='P') {
            $total_tax = $total*$value->rate/100;
            $array['type'] = '%';
         }else{
            $total_tax = $value->rate;
             $array['type'] = '$';
         }

         $array['tax_amount'] = round($total_tax,2);

         $tax_array[] = $array;
      }

    }  
    return $tax_array;
}

//////////////

function save_order($data = array()){

    if(!empty($data)){
    $query =  $this->db->table('order');
      
    $order_id = $data['info']['order_id'];
    if(!empty($order_id)){
    $query->where('id',$order_id)->update($data['info']);
    }else{
    $query->insert($data['info']);
    $order_id = $this->db->insertID(); // insert order detail
    }


     // insert taxes detail
     if (!empty($data['taxes'])) {
       $querytax =  $this->db->table('order_taxes'); 
       $querytax->where('order_id',$order_id)->delete(); // delete all taxes
         
         foreach($data['taxes'] as $tax){
       $array = array();
       $array['order_id'] = $order_id;
       $array['name'] = $tax['name'];  
       $array['rate'] = $tax['rate']; 
       $array['description'] = $tax['description']; 
       $array['type'] = $tax['type'];  
       $array['tax'] = $tax['tax_amount'];  
       $querytax->insert($array);
      }
    }
    
    
    // insert product detail
    
     $num = count($data['products']);
     if (!empty($num)) {
     $query1 =  $this->db->table('order_product'); 
     $query1->where('order_id',$order_id)->delete(); // delete all product 
     
      for ($i=0; $i < $num ; $i++) { 
      $array = array();
      $array['order_id'] = $order_id;
      $array['product_id'] = $data['products'][$i]['id'];
      $array['name'] = $data['products'][$i]['name'];
      $array['quantity'] = $data['products'][$i]['p_quantity'];
      $array['price'] = $data['products'][$i]['price'];
      $array['part_no'] = $data['products'][$i]['part_no'];
      $array['total'] =  $data['products'][$i]['price']*$data['products'][$i]['p_quantity'];
    //   $array['option'] = $data['products'][$i]['cart_option'];
    //   $array['option_id'] = $data['products'][$i]['option_id'];
      $array['option_image'] = $data['products'][$i]['image'];
      
      $query1->insert($array);
    
      } 
      return $order_id;
    }
  }else{
      return false;
  }
}






}
