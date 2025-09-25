<?php

namespace App\Controllers;
use App\Models\FrontModel;
use App\Models\CareerModel;
use App\Models\CommonModel;
use App\Models\SalesModel;


class User extends BaseController
{
  
  
  public function __construct()
  {

     $session = \Config\Services::session();
     helper(['general']);
     $this->user_id = $session->get('userDetail');
     $AdminModel = new CommonModel();
     $default_img = $AdminModel->fs('setting',array('key'=>'config_logo'));
     $this->config_logo = $default_img->value; 
     $user = $AdminModel->fs('user',array('id'=>$this->user_id,'status'=>1));
     if(empty($user)){
         $this->logout();
     }
     
  }


  function dashboard(){

  $data['meta_title'] = 'dashboard | Smart Parts';
  $data['user'] = $this->AdminModel->fs('user',array('id'=>$this->user_id));
  return view('user/dashboard',$data);
  }

  function my_wishlist(){
  $model = new FrontModel();
  $data['meta_title'] = 'My Wishlist | Smart Parts';
  $data['wishlist'] = $model->get_wishlist($this->user_id);
  $data['config_logo'] = $this->config_logo;
  return view('user/my_wishlist',$data);
  }
   
   
   
  function update_user_profile(){

     $rules = array();
     
    if($this->request->getVar('mobile')){
     $rules['mobile'] = ['label'=>'Mobile','rules'=>'required|numeric|min_length[10]|max_length[10]|user_mobile['.$this->user_id.']'];   
    }
    
    if($this->request->getVar('email')){
     $rules['email'] = ['label'=>'Email','rules'=>'required|valid_email|user_email['.$this->user_id.']'];   
    }
    
    $rules['first_name'] = ['label'=>'first name','rules'=>'required|min_length[3]'];
    
    if ($this->validate($rules)==false) {
      $array['status'] = 0;
      $array['first_name'] = $this->validation->getError('first_name');
      $array['email'] = $this->validation->getError('email');
      $array['mobile'] = $this->validation->getError('mobile');
      echo json_encode($array);

    }else{
        
      $save = array();
      $save['first_name'] = $this->request->getVar('first_name');
       $save['last_name'] = $this->request->getVar('last_name');
      if($this->request->getVar('mobile')){
        $save['mobile'] = $this->request->getVar('mobile');    
      }
      if($this->request->getVar('email')){
        $save['email'] = $this->request->getVar('email');    
      }
      
    
      $file = $this->request->getFile('photo');
     if(!empty($_FILES['photo']['name'])){
        if($file->isValid() && !$file->hasMoved()){
         $file_name = $file->getRandomName();
         if($file->move('uploads/images/', $file_name)){
            $save['photo'] = 'uploads/images/'.$file_name;
         }
        }else{
         throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
         exit;
        }
     }
      
      $result = $this->AdminModel->updateData('user',$save,array('id'=>$this->user_id));
      if($result){
          $array['status'] = 1;
          $array['msg'] = 'Record update successfully';
          echo json_encode($array);
      }else{
          $array['status'] = 0;
          $array['msg'] = 'Something Went Wrong';
          echo json_encode($array);
      }
    
      }
    
   }
   
   
   function change_user_password(){
    
     $rules = array();
     $rules['password'] = ['label'=>'Password','rules'=>'required|min_length[6]'];   
     $rules['cpassword'] = ['label'=>'Confirm Password','rules'=>'required|min_length[6]'];    
  
    
    if ($this->validate($rules)==false) {
      $array['status'] = 0;
      $array['password'] = $this->validation->getError('password');
      $array['cpassword'] = $this->validation->getError('cpassword');
      echo json_encode($array);

    }else{
        
      $save = array();
      $save['password'] = md5($this->request->getVar('password'));
        $result = $this->AdminModel->updateData('user',$save,array('id'=>$this->user_id));
      if($result){
          $array['status'] = 1;
          $array['msg'] = 'Password Change Successfully ';
          echo json_encode($array);
      }else{
          $array['status'] = 0;
          $array['msg'] = 'Something Went Wrong';
          echo json_encode($array);
      }
    
      }
    
   }
   




function my_orders(){
 $model = new FrontModel();    
 $data['meta_title'] = 'my_orders | Smart Parts';
 $data['orders'] = $model->get_user_orders($this->user_id);
 $data['config_logo'] = $this->config_logo;
 return view('user/my_orders',$data);
 
}



public function invoice(){
    $order_id = decrypt_url($this->uri->getSegment(3));
  	$model = new SalesModel();
    $data['page_title'] ='Invoice';
    
    $setting = $this->AdminModel->all_fetch('setting',array('code'=>'config'));
    foreach ($setting as $key => $value) {
      $all_setting[$value->key] = $value->value;
    }
    $data['config'] = $all_setting;
    
    $data['order'] = $model->get_order_detail($order_id);
    $products = $model->get_order_product($order_id);
    $product_list = array();
    
     foreach ($products as $key => $value) {
        $product_list['product'][] = $value;
        $product_list['option'][] = $model->get_product_option($value->option);
        
    }
    $data['taxes'] = $model->get_all_order_taxes($order_id);
    $data['product_list'] = $product_list;
    $data['order_status'] = $this->AdminModel->all_fetch('order_status',null);
    $data['order_history'] = $model->get_order_history($order_id);
    return view('user/invoice',$data);
}




 function swift_code(){
       	$model = new SalesModel();
       	
    $order_id = decrypt_url($this->uri->getSegment(3));

    $model = new SalesModel();

    $order1 = $model->get_order_detail($order_id);
    $product = $model->get_order_product($order_id);;

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
   
   
   
   
   
   
    
 function my_address(){
      $data['meta_title'] = 'Address List | Smart Parts';
      $data['page_title'] = 'Address List';
      $data['list'] = $this->AdminModel->all_fetch('address',array('customer_id'=>$this->user_id));
      return view('user/my_address',$data);
  }
    
    
 function add_address($id = false){
     $data['country_list'] = $this->AdminModel->all_fetch('country',array('status'=>1));
     $data['meta_title'] = 'Address List | Smart Parts';
    
     if(!empty($id)){
        $data['id'] = $id;    
        $data['page_title'] = 'Edit Address';  
        $data['form_action'] = 'user/add_address/'.$id;
        $row = $this->AdminModel->fs('address',array('id'=>$id));
        $data['firstname'] = $row->firstname;
        $data['lastname'] = $row->lastname;
        $data['email'] = $row->email;
        $data['company'] = $row->company;
        $data['address1'] = $row->address1;
        $data['address2'] = $row->address2;
        $data['phone'] = $row->phone;
        $data['city'] = $row->city;
        $data['pincode'] = $row->pincode;
        $data['country_id'] = $row->country_id;
        $data['state_id'] = $row->state_id;
        $data['status'] =   $row->status;
        $data['primary_addr'] = $row->primary_addr;
        
        $data['state_list'] = $this->AdminModel->all_fetch('state',array('country_id'=>$row->country_id));
                
        
     }else{
        $data['page_title'] = 'Add New Address'; 
        $data['id'] = '';
        $data['form_action'] = 'user/add_address';
        $data['firstname'] = '';
        $data['lastname'] = '';
        $data['email'] = '';
        $data['company'] = '';
        $data['address1'] = '';
        $data['address2'] = '';
        $data['phone'] = '';
        $data['city'] = '';
        $data['pincode'] = '';
        $data['country_id'] = '';
        $data['state_id'] = '';
        $data['status'] = '';  
        $data['primary_addr'] = '';
        $data['state_list'] = array();
                
     } 
     
     if($this->request->getMethod()=='post'){
         
   
     $rules = [
        'firstname'=> ['lable'=>'First Name','rules'=>'required'],
        'email'=> ['lable'=>'Email','rules'=>'required'],
        'phone'=> ['lable'=>'Telephone','rules'=>'required'],
        'address1'=> ['lable'=>'Address Line1','rules'=>'required'],
        'city'=> ['lable'=>'City','rules'=>'required'],
        'state_id'=> ['lable'=>'State','rules'=>'required'],
        'country_id'=> ['lable'=>'Country','rules'=>'required'],
        'pincode'=> ['lable'=>'Post Code/zipcode','rules'=>'required']
         ]; 
         
     if($this->validate($rules)==false){
      $data['validation'] = $this->validator;  
     }else{
      
      $save = array();
      $save['firstname'] = $this->request->getVar('firstname');
      $save['lastname'] = $this->request->getVar('lastname');
      $save['email'] = $this->request->getVar('email');
      $save['company'] = $this->request->getVar('company');
      $save['address1'] = $this->request->getVar('address1');
      $save['address2'] = $this->request->getVar('address2');
      $save['phone'] = $this->request->getVar('phone');
      $save['city'] = $this->request->getVar('city');
      $save['pincode'] = $this->request->getVar('pincode');
      $save['country_id'] = $this->request->getVar('country_id');
      $save['state_id'] = $this->request->getVar('state_id');
      $save['status'] = $this->request->getVar('status');
      $save['primary_addr'] = $this->request->getVar('primary_addr');
      $save['customer_id'] = $this->user_id;
    
      if (!empty($id)) {
         $save['modify_date'] = date('Y-m-d H:i:s');
         $result = $this->AdminModel->updateData('address',$save,array('id'=>$id));
        if ($result) {
        $this->session->setFlashdata('success','Address Saved successfully');
        return redirect()->to('user/my_address');
        }else{
          $this->session->setFlashdata('error','Address Saved unsuccess');
          return redirect()->to('user/add_address/'.$id);
        }
        
      }else{
        $save['modify_date'] = date('Y-m-d H:i:s');
        $save['create_date'] = date('Y-m-d H:i:s');
        $result = $this->AdminModel->insertData('address',$save);

        if ($result) {
        $this->session->setFlashdata('success','Address Saved Successfully');
          return redirect()->to('user/my_address');
        }else{
          $this->session->setFlashdata('error','Address Saved unsuccess');
          return redirect()->to('user/add_address');
        }
         

      }
                
  }
    
} 
      
return view('user/add_address',$data);
}
    
    
    
    
    
function delete_user_address(){
    
    $id = $this->request->getVar('id');
    if($id){
     $result =  $this->AdminModel->deleteData('address',array('id'=>$id));
    if($result){
        echo true;
    }else{
        echo false;
    }
   }  
}   
       
    
    function logout(){
        session()->remove('user_id');
        session()->remove('userDetail');
      return redirect()->to('home');
    }   
    
    
    
    


//////////////////





}
