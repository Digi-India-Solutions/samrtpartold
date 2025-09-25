<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\CommonModel;

class CartModel extends Model
{
  protected $DBGroup              = 'default';
  protected $table                = 'carts';
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
  

  function get_order_by_id($id){
  $query = $this->db->table('order as ord');    
  $query->select('ord.*,cn.name as country_name,cp.coupon_code,os.name as order_status_name');
  $query->join('country cn','ord.payment_country_id=cn.id','left');
  $query->join('order_status os','ord.order_status=os.id','left');
  $query->join('order_coupon cp','ord.coupon_id=cp.id','left');
  $query->where('ord.id',$id);
  return $query->get()->getRow();
      
  }

//  function get_all_order_product($order_id){
//       $query = $this->db->table('order_product as op');  
//    $query->select('op.*,pd.sku,pd.image,pd.name');
//    $query->join('product pd','op.product_id=pd.id','left');
//    $query->where('op.order_id',$order_id);
//    return $query->get()->getResult();
//  }
  
function get_all_order_product($order_id){
  $query = $this->db->table('order_product as op');   
  $query->select('op.*,pd.model,pd.product_seo_url,pd.image,pd.sku,pd.description,pd.part_no,bd.name as brand_name');
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

  
function save_cart($data = array()){

if ($data) {    
      $array = array();
      $array['product_id'] = $data['product_id'];
      $array['quantity'] = $data['quantity'];
      // @$array['option'] = json_encode($data['option']);
      $array['create_date'] = date('Y-m-d H:i:s');
  
    if (!empty(session()->get('session_id'))) {
      $array['session_id'] = session()->get('session_id');
    }else{
      $unique = uniqid(); 
      session()->set('session_id',$unique);
    
      $array['session_id'] = session()->get('session_id');
    }
    if (!empty(session()->get('user_id'))) {
    $array['customer_id '] = session()->get('user_id');
    }
    
      $query = $this->db->table('cart');  
      $query->select('*');
      $query->where(array('product_id'=>$data['product_id']));
      $query->where('session_id',$array['session_id']);
      $check_product_already =  $query->get()->getRow();
    
      $query = $this->db->table('cart');
      if ($check_product_already) {
          $quantity = $check_product_already->quantity;
          $query->set('quantity',$quantity+$data['quantity']);
          return   $query->where(array('product_id'=>$data['product_id'],'session_id'=>$array['session_id']))->update();
      }else{
       return $query->insert($array); 
      }
    }
}


function get_cart_count(){
 $session_id =  session()->get('session_id'); 
   $query = $this->db->table('cart'); 

  $query->select('*');
  $query->where('session_id',$session_id);
  if ($customer_id = session()->get('user_id')) {
  $query->orWhere('customer_id',$customer_id);
  }
  $query = $query->get()->getResult();
  return count($query);
  
}


function get_all_cart_product(){
    
if(!session()->get('session_id')){
      $unique = uniqid(); 
      session()->set('session_id',$unique);
}
    
  $session_id =  session()->get('session_id');
  $query = $this->db->table('cart as ct');
  $query->select('pd.*,ct.quantity as p_quantity,ct.id as cart_id,ct.option as cart_option,brn.image as brand_image');
  $query->join('product pd','ct.product_id=pd.id','left');
  $query->join('brands brn','pd.brand=brn.id','left'); 
  $query->where('ct.session_id',$session_id);
  if ($customer_id = session()->get('user_id')) {
  $query->orWhere('customer_id',$customer_id);
  }
  $product = array();
  $items =  $query->groupBy('ct.product_id')->get()->getResult();
  if ($items) {
    foreach ($items as $key => $value) { 
      $array = array();
      $array['id'] = $value->id;
      $array['name'] = $value->name;
      $array['p_quantity'] = $value->p_quantity;
      $array['preorder'] = $value->preorder;
      $array['cart_id'] = $value->cart_id;
      $array['image'] = $value->image;
      $array['brand_image'] = $value->brand_image;
      $array['product_seo_url'] = $value->product_seo_url;
      $array['sku'] = $value->sku;
      $array['part_no'] = $value->part_no;
      $array['origin'] = $value->origin;
      $array['class'] = $value->class;
      $array['old_price'] = $value->price;  
      $array['save_percentage'] = $this->get_save_percentage($value->id,$value->price);  
    
      $array['option_id'] = $value->cart_option;
      $cart_option = $this->get_cart_option($value->cart_option);
      if(!empty($cart_option)){
      $array['cart_option']= $cart_option;
      }else{
       $array['cart_option']= @$value->color_name;    
      }
      
      $image = @$this->get_cart_option_image($value->cart_option);
      if(!empty($image)){
      $array['image'] = $image;    
      }
      
      $option_price = $this->get_option_price($value->cart_option);
      //flash sale check
   
      $special_price = $this->get_special_price($value->id);
      if (!empty($special_price)) {
      $array['price'] = $special_price+$option_price;
      }else{
      $array['price'] = $value->price+$option_price;
      }    
      
      
      
      $product[]= $array;
      
    }
    return $product;

  }else{
    return $product;
  }

}



// function get_special_price($product_id){
//     $query = $this->db->table('product_special');
//     $date = date('Y-m-d');
//     $query->select('price');
//     $query->where('product_id',$product_id);
//     $query->where('date_start <=',$date);
//     $query->where('date_end >=',$date);
//     $query->orderBy('priority','asc');
//     $row =  $query->get()->getRow();
//     if (!empty($row->price)) {
//       return $row->price;
//     }else{
//     return false;
//     }
// }

	function get_special_price($product_id){
		
			
		$query = $this->db->table("product");
		$query->select('special_price');
		$query->where('date_start <=',date('Y-m-d'));
		$query->where('date_end >=',date('Y-m-d'));
		$query->where('id',$product_id);
		$row = $query->get()->getRow();
		if ($row) {
		return $row->special_price;
		}else{
		
		$query = $this->db->table("product_special");
		$query->select('price');
		$query->where('date_start <=',date('Y-m-d'));
		$query->where('date_end >=',date('Y-m-d'));
		$query->where('product_id',$product_id);
		$row = $query->get()->getRow();
		if ($row) {
		return $row->price;
		}else{
		  return false;
		}
		
		}
		
		}


function get_cart_option($option){
  $query = $this->db->table('product_option_value');
  $option_id = json_decode($option);
  if (!empty($option_id)) {
      $query->select('*');
      $query->whereIn('id',$option_id);
        $result =  $query->get()->getResult();
        foreach($result as $value){
            $array[] = $value->name;
        }
        return @implode('.',$array);
      
     }else{
    return false;
  }
}

function get_cart_option_image($option){
  $query = $this->db->table('product_option_value');
  $option_id = json_decode($option);
  if (!empty($option_id)) {
      $query->select('*');
      $query->whereIn('id',$option_id);
        $result =  $query->get()->getResult();
        foreach($result as $value){
            $image = $value->image; // fetch single image no need for array
        }
        return @$image;
      
     }else{
    return false;
  }
}

function get_option_price($option){
  $query = $this->db->table('product_option_value');
    $price = 0;
    $option_id = json_decode($option);
  if (!empty($option_id)) {
      $query->select('*');
      $query->whereIn('id',$option_id);
        $result =  $query->get()->getResult();
        foreach($result as $value){
            $price  += $value->price;
        }
        return $price;
      
     }else{
    return $price;
  }
}

////////////////////////

function get_order_discount(){
$this->AdminModel = new CommonModel();
if (session()->get('user_id')) {
$customer_id = session()->get('user_id');
}

$query = $this->db->table('order_coupon oc');
$query->select('oc.*');
$query->where(array('oc.session_id'=>session()->get('session_id'),'oc.status'=>0)); 
$query->join('coupon co','oc.coupon_id=co.id','left');
$query->where(array('co.end_date >='=>date('Y-m-d'),'co.status'=>'1'));
$valid_coupon =  $query->get()->getRow();  // order coupon entry
if (!empty($valid_coupon)) {
  $array = array();
  $discount_price = 0;
  $amount = 0;
  $total = $this->get_cart_total();
  $coupon_id = $valid_coupon->coupon_id;
  $coupon = $this->get_coupon_detail($coupon_id);  // coupon detail

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
    $coupon_arr['session_id'] = session()->get('session_id');
   
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


function get_coupon_detail($coupon_id){
         $this->AdminModel = new CommonModel();
  return $this->AdminModel->fs('coupon',array('id'=>$coupon_id));
}


function check_coupan_code($code){
  $query = $this->db->table('coupon');    
  $date = date('Y-m-d');
  $query->select('*');
  $query->where('coupon_code',$code);
  $query->where('start_date <=',$date);
  $query->where('end_date >=',$date);
  $query->where('status','1');
 return  $query->get()->getRow();
}


function check_coupan_allowed_to_user($coupon_id){
    $this->AdminModel = new CommonModel();
    $coupon = $this->get_coupon_detail($coupon_id);

    $query = $this->db->table('order_coupon');  
    $query->select('*');
    $query->where(array('session_id'=>session()->get('session_id'),'coupon_code'=>$coupon->coupon_code,'status'=>1)); 
    $uses = $query->get()->getResult();
    
    if ($coupon->user_coupon > count($uses)) {
    return true;
    }else{
    return false;
    }
}



function get_cart_total(){
  $total = 0;
  $product = $this->get_all_cart_product();
  if ($product) {
    foreach ($product as $key => $value) {
      $total += $value['price'] * $value['p_quantity'];
    }
    return $total;
  }
  return $total;

}


function check_coupan_applied($coupon_id){
  $query = $this->db->table('order_coupon'); 
  $query->select('*');
  $query->where('coupon_id',$coupon_id);
  $query->where('session_id',session()->get('session_id')); 
  $query->where('status',0);
return  $query->get()->getRow();
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


function get_all_order_taxes($order_id){

  $query = $this->db->table('order_taxes');
  return $query->select('*')->where('order_id',$order_id)->get()->getResult();

}


function get_all_taxes_detail(){
  $total = $this->get_cart_total();
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



function get_complete_cart_total(){
  $total = 0;
  $total_tax = 0;

  $total = $this->get_cart_total();
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

function get_save_percentage($product_id,$old_price){
    $date = date('Y-m-d');
    $percentage = 0;
    $special_price =  $this->get_special_price($product_id);
    if(!empty($special_price)){
     $minus = $old_price - $special_price; 
      @$percentage = $minus*100/$old_price;
    }
   
    return round($percentage);
}
///////////////////

function save_order($data = array()){
    
    if(!empty($data)){
      $query =  $this->db->table('order');
      $query->insert($data['info']);
      $order_id = $this->db->insertID(); // insert order detail
    
    
     // insert taxes detail
     if (!empty($data['taxes'])) {
         $querytax =  $this->db->table('order_taxes'); 
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
      for ($i=0; $i < $num ; $i++) { 
      $array = array();
      $array['order_id'] = $order_id;
      $array['product_id'] = $data['products'][$i]['id'];
      $array['name'] = $data['products'][$i]['name'];
      $array['quantity'] = $data['products'][$i]['p_quantity'];
      $array['price'] = $data['products'][$i]['price'];
      $array['part_no'] = $data['products'][$i]['part_no'];
      $array['total'] =  $data['products'][$i]['price']*$data['products'][$i]['p_quantity'];
      // $array['tax'] = $data['products'][$i]['name'];
    //   $array['reward'] = $data['products'][$i]['points'];
      $array['option'] = $data['products'][$i]['cart_option'];
      $array['option_id'] = $data['products'][$i]['option_id'];
      $array['option_image'] = $data['products'][$i]['image'];
      
      $query1->insert($array);
    
      } 
      return $order_id;
    }
  }else{
      return false;
  }
}
    

function get_order_by_trasaction($trax_id){
    $query =  $this->db->table('order as ord'); 
    $query->select('ord.*,cn.name as country_name,os.name as order_status_name,cp.coupon_code');
    $query->join('country cn','ord.payment_country_id=cn.id','left');
    $query->join('order_status os','ord.order_status=os.id','left');
    $query->join('order_coupon cp','ord.coupon_id=cp.id','left');
    $query->where('ord.txnid',$trax_id);
    return $query->get()->getRow();
}




}
