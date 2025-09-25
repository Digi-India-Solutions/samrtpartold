<?php
namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\SettingModel;
use App\Models\CommonModel;

class Setting extends BaseController
{



  public function __construct()
  {

     $session = \Config\Services::session();
    if(empty($session->get('adminLogin'))) {
       return redirect()->to('admin/login'); 
    }
    $this->admin_id = $session->get('adminLogin');
             
  }



  public function index()
  {
    //
  }



  function menu()
  {
    if(empty($this->AdminModel->permission($this->uri->getSegment(2)))){
    redirect('admin/permission-denied');
    } 

    $data['menu'] = $this->AdminModel->all_fetch('menu',array('parent_id'=>0,'status'=>1,'visible'=>1));
    $data['page_title']  ='Menu Managment';
    echo view('admin/setting/menu',$data);

  }

  /////////////////


function add_menu($id=false)
{

   $data['menu_list'] = $this->AdminModel->all_fetch('menu',array('parent_id'=>'0'));

 if(@$id) {
   
   $data['page_title'] = ' Edit Menu ';
   $data['form_action'] ='admin/add_menu/'.$id;
   $row = $this->AdminModel->fs('menu',array('id'=>$id));
   $data['name'] =  $row->name;   
  $data['fafa'] =  $row->fafa; 
  $data['link'] =  $row->link; 
  $data['sort_order'] =  $row->sort_order; 
  $data['status'] =  $row->status; 
  $data['parent_id'] =  $row->parent_id; 
   }else{
   
   $data['page_title'] = ' Add Menu';
   $data['form_action'] ='admin/add_menu';
   $data['name'] =  '';   
   $data['fafa'] =  ''; 
   $data['link'] =  '';  
   $data['sort_order'] =  '';  
   $data['status'] =  '';  
   $data['parent_id'] =  '';
   }

 
   if ($this->request->getMethod()=='post') {

  $rules = [
    'name'=>'required',
  ];
  
    if ($this->validate($rules)==false) {
     $data['validation'] = $this->validator;
  } else{
   

   $save= array();
   $save['name'] =     $this->request->getVar('name');
   $save['fafa'] =     $this->request->getVar('fafa');
   $save['link'] =     $this->request->getVar('link');
   $save['sort_order'] =     $this->request->getVar('sort_order');
   $save['status'] =     $this->request->getVar('status');
   $save['parent_id'] =     $this->request->getVar('parent_id');
    
    
   if ($id) {
     $save['modify_date'] =   date('Y-m-d H:i:s');
     $save['id'] =  $id;
     $result=  $this->AdminModel->updateData('menu',$save,array('id'=>$id));
     if ($result) {
     $this->session->setFlashdata('success','Record Update successfully');
     redirect()->to('admin/add_menu/'.$id);
     }else{
     $this->session->setFlashdata('error','Record not update');
     redirect()->to('admin/add_menu/'.$id);
     }
   }else{
     $save['create_date'] =   date('Y-m-d H:i:s');
     $save['modify_date'] =   date('Y-m-d H:i:s');
    $result=  $this->AdminModel->insertData('menu',$save);
     if ($result) {
    
     $this->session->setFlashdata('success','Record insert successfully');
     redirect()->to('admin/menu');
     }else{
     $this->session->setFlashdata('error','Record not insert');
     redirect()->to('admin/add_menu');
     }

   }

   }
  
 }
 return  view('admin/setting/add_menu',$data);
}


// function delete_menu(){
//    $ids = $this->request->getVar('selected');
//    foreach($ids as $value){
//    $this->AdminModel->delete('menu',array('id'=>$value));    
//    }
//    $this->session->setFlashdata('success','Record Delete successfully');
//    redirect('admin/menu');
   
// }

///////////////////////////////

// user

function users()
 {
    if(empty($this->AdminModel->permission($this->uri->getSegment(2)))){
     return redirect()->to('admin/permission-denied');
    } 
    
     $data['detail'] = $this->AdminModel->all_fetch('admin',null);
     $users = $this->AdminModel->all_fetch('admin_group',null);
     foreach ($users as $key => $value) {
       $urlist[$value->id] = $value->name;
     }
     $data['user_list'] = $urlist;
     $data['page_title']  ='Users List';
     echo view('admin/setting/user',$data);

 }


 function add_user($id=false)
 {

 $data['user_list'] = $this->AdminModel->all_fetch('admin_group',null);
  
  if(!empty($id)) {
    
    $data['page_title'] = ' Edit User';
    $data['form_action'] ='admin/add_user/'.$id;
    $row = $this->AdminModel->fs('admin',array('id'=>$id));
    $data['menu_id'] = json_decode($row->permission);
    $data['firstname'] =  $row->firstname;   
    $data['lastname'] =  $row->lastname; 
    $data['username'] =  $row->username; 
    $data['email'] =  $row->email; 
    $data['photo'] =  $row->photo; 
    $data['status'] =  $row->status; 
    $data['user_group_id'] =  $row->user_group_id; 
    
    $this->form_user_id = $id;
    }else{
    
     $data['page_title'] = ' Add User';
     $data['form_action'] ='admin/add_user';
     $data['firstname'] =  '';   
     $data['lastname'] =  '';
     $data['username'] = '';   
     $data['email'] = '';   
     $data['photo'] = '';   
     $data['status'] = '';   
     $data['menu_id'] = ''; 
     $data['user_group_id'] = ''; 

    }


  if($this->request->getMethod()=='post'){

  $rules = [
    'username'=>['label'=>'Username','rules'=>'trim|required|admin_username['.$id.']'],
    'email'=>['label'=>'Email','rules'=>'trim|required'],
  ];  


    if ($this->validate($rules)==false) {
       
    $data['validation'] = $this->validator;
     } else{


      $save= array();
      $save['firstname'] =     $this->request->getVar('firstname');
      $save['lastname'] =     $this->request->getVar('lastname');
      $save['email'] =     $this->request->getVar('email');
      $save['status'] =     $this->request->getVar('status');
      $save['username'] =     $this->request->getVar('username');
       // $save['permission'] =     json_encode($this->request->getVar('permission'));
      $save['user_group_id'] =     $this->request->getVar('user_group_id');
      
       if (!empty($this->request->getVar('password'))) {
      $save['password'] = password_hash(trim($this->request->getVar('password')),PASSWORD_BCRYPT);
      }
         

     $file = $this->request->getFile('photo');
     if(!empty($file->getClientName())){
      $file = $this->request->getFile('photo');
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

  
             
      if ($id) {
          $save['modify_date'] =  date('Y-m-d');
    
          $result=  $this->AdminModel->updateData('admin',$save,array('id'=>$id));
          if ($result) {
          $this->session->setFlashdata('success','Record Update successfully');
          redirect()->to('admin/user');
          }else{
          $this->session->setFlashdata('error','Record not update');
          redirect()->to('admin/add_user/'.$id);
          }
      }else{
         $save['create_date'] =  date('Y-m-d');
          $save['modify_date'] =  date('Y-m-d');
         $result=  $this->AdminModel->insertData('admin',$save);
          if ($result) {
         
          $this->session->setFlashdata('success','Record insert successfully');
          redirect()->to('admin/user');
          }else{
          $this->session->setFlashdata('error','Record not insert');
          redirect()->to('admin/add_user');
          }

      }

   }
  }
return view('admin/setting/add_user',$data);
}



function delete_users()
{ 
  $model = new SettingModel();
    if ($this->request->getPost()) {
      $id = $this->request->getVar('selected');
     $last_record = $this->AdminModel->all_fetch('admin',null); 
     if (count($last_record) >= 2) {
     
      $check =  $model->delete_users($id);
     if ($check=1) {
       $this->session->setFlashdata('success','Record Delete successfully');
     }else{
      $this->session->setFlashdata('error','User can not be deleted ');
     }
    }else{
      $this->session->setFlashdata('error','Last User can not be deleted');
     
    }     
   }
  return redirect()->to('admin/user');
    
}


//////////////


function front_menu()
 {
    if(empty($this->AdminModel->permission($this->uri->getSegment(2)))){
    redirect('admin/permission-denied');
    } 

     $data['detail'] = $this->AdminModel->all_fetch('front_menu',array('parent_id'=>0));
     $data['page_title']  ='Frontend Menu Managment';
    return view('admin/setting/front_menu',$data);

 }

function add_front_menu($id=false)
 {

    $data['menu_list'] = $this->AdminModel->all_fetch('front_menu',array('parent_id'=>'0'));
 
  if(@$id) {
    
    $data['page_title'] = ' Edit Front Menu ';
    $data['form_action'] ='admin/add_front_menu/'.$id;
    $row = $this->AdminModel->fs('front_menu',array('id'=>$id));
    $data['name'] =  $row->name;   
    $data['sub_heading'] =  $row->sub_heading; 
     $data['image'] =  $row->image; 
    $data['link'] =  $row->link; 
    $data['sort_order'] =  $row->sort_order; 
    $data['status'] =  $row->status; 
    $data['parent_id'] =  $row->parent_id; 
    $data['header'] =  $row->header; 
    $data['footer'] =  $row->footer; 
    $data['position'] =  $row->position;
    $data['sort_order_footer'] =  $row->sort_order_footer;
    $data['meta_title'] =  $row->meta_title;
    $data['meta_keyword'] =  $row->meta_keyword;
    $data['meta_description'] =  $row->meta_description;
    }else{
    
    $data['page_title'] = ' Add Front Menu';
    $data['form_action'] ='admin/add_front_menu';
    $data['name'] =  '';   
    $data['sub_heading'] =  ''; 
    $data['link'] =  '';  
    $data['sort_order'] =  '';  
    $data['status'] =  '';  
    $data['parent_id'] =  '';
    $data['header'] =  '';
    $data['footer'] =  '';
    $data['position'] =  '';
    $data['sort_order_footer'] =  '';
    $data['meta_title'] =  '';
    $data['meta_keyword'] =  '';
    $data['meta_description'] = '';
    $data['image'] = '';    
    }

    
    if ($this->request->getMethod()=='post') {   
   
    $rules = [
      'name'=>'required'
    ];    

    if ($this->validate($rules)==false) {
      $data['validation'] = $this->validator;
    } else{

 
        $save= array();
        $save['name'] =     $this->request->getVar('name');
        $save['sub_heading'] =     $this->request->getVar('sub_heading');
        $save['link'] =     $this->request->getVar('link');
        $save['sort_order'] =  $this->request->getVar('sort_order');
        $save['status'] =     $this->request->getVar('status');
        $save['parent_id'] =     $this->request->getVar('parent_id');
        $save['header'] =     $this->request->getVar('header');
        $save['footer'] =     $this->request->getVar('footer');
        $save['position'] =     $this->request->getVar('position');
        $save['meta_title'] =     $this->request->getVar('meta_title');
        $save['meta_keyword'] =     $this->request->getVar('meta_keyword');
        $save['meta_description'] =     $this->request->getVar('meta_description');
        $save['sort_order_footer'] =     $this->request->getVar('sort_order_footer');  
        
       $file = $this->request->getFile('image');
     if(!empty($_FILES['image']['name'])) {
      $file = $this->request->getFile('image');
      if($file->isValid() && !$file->hasMoved()){
         $file_name = $file->getRandomName();
         if($file->move('uploads/images/', $file_name)){
         $save['image'] = 'uploads/images/'.$file_name;
       }
      }else{
        throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
        exit;
      }
    }
        
        
      if ($id) {
          $save['modify_date'] =   date('Y-m-d H:i:s');
          $save['id'] =  $id;
          $result=  $this->AdminModel->updateData('front_menu',$save,array('id'=>$id));
          if ($result) {
          $this->session->setFlashdata('success','Record Update successfully');
          return redirect()->to('admin/add_front_menu/'.$id);
          }else{
          $this->session->setFlashdata('error','Record not update');
          return redirect()->to('admin/add_front_menu/'.$id);
          }
      }else{
        $save['create_date'] =   date('Y-m-d H:i:s');
        $save['modify_date'] =   date('Y-m-d H:i:s');
         $result=  $this->AdminModel->insertData('front_menu',$save);
          if ($result) {
         
          $this->session->setFlashdata('success','Record insert successfully');
          return redirect()->to('admin/front_menu');
          }else{
          $this->session->setFlashdata('error','Record not insert');
          return redirect()->to('admin/add_front_menu');
          }

      }
    }
   }
    return view('admin/setting/add_front_menu',$data);
}



function delete_front_menu(){
    $ids = $this->request->getVar('selected');
    foreach($ids as $value){
    $this->AdminModel->deleteData('front_menu',array('id'=>$value));    
    }
    $this->session->setFlashdata('success','Record Delete successfully');
    return redirect()->to('admin/front_menu');
    
}

/////////////////////


function user_group()
 {
    if(empty($this->AdminModel->permission($this->uri->getSegment(2)))){
     return redirect()->to('admin/permission-denied');
    } 
    
     $data['detail'] = $this->AdminModel->all_fetch('admin_group',null);
     $data['page_title']  ='User Groups';
     echo view('admin/setting/user_group',$data);

 }


 function add_user_group($id=false)
 {

 $data['menu_list'] = $this->AdminModel->all_fetch('menu',array('parent_id'=>0,'status'=>1),'sort_order','asc');
  
  if(!empty($id)) {
    
    $data['page_title'] = ' Edit User Group';
    $data['form_action'] ='admin/add_user_group/'.$id;
    $row = $this->AdminModel->fs('admin_group',array('id'=>$id));
    $data['menu_id'] = json_decode($row->permission);
    $data['name'] =  $row->name;   
    $this->form_user_id = $id;
    }else{
    
     $data['page_title'] = ' Add User Group';
     $data['form_action'] ='admin/add_user_group';
     $data['name'] =  '';   
     $data['menu_id'] = ''; 
     
    }

 

  if($this->request->getMethod()=='post'){

  $rules = [
    'name'=>['label'=>'Name','rules'=>'trim|required'],
  ];  


    if ($this->validate($rules)==false) {
       
    $data['validation'] = $this->validator;
     } else{


      $save= array();
      $save['name'] =     $this->request->getVar('name');
      $save['permission'] =     json_encode($this->request->getVar('permission'));
 
                       
      if ($id) {
         
          $save['modify_date'] =  date('Y-m-d');
          $result=  $this->AdminModel->updateData('admin_group',$save,array('id'=>$id));
          if ($result) {
          $this->session->setFlashdata('success','Record Update successfully');
         return redirect()->to('admin/user_group');
          }else{
          $this->session->setFlashdata('error','Record not update');
         return redirect()->to('admin/add_user_group/'.$id);
          }
      }else{
         $save['create_date'] =  date('Y-m-d');
         $save['modify_date'] =  date('Y-m-d');
         $result=  $this->AdminModel->insertData('admin_group',$save);
          if ($result) {
         
          $this->session->setFlashdata('success','Record insert successfully');
          return redirect()->to('admin/user_group');
          }else{
          $this->session->setFlashdata('error','Record not insert');
         return redirect()->to('admin/add_user_group');
          }

      }

   }
  }
return view('admin/setting/add_user_group',$data);
}



function delete_user_group()
{ 
  $model = new SettingModel();
    if ($this->request->getPost()) {
      $id = $this->request->getVar('selected');
     $last_record = $this->AdminModel->all_fetch('admin_group',null); 
     if (count($last_record) >= 2) {
     
      $check =  $model->delete_users($id);
     if ($check=1) {
       $this->session->setFlashdata('success','Record Delete successfully');
     }else{
      $this->session->setFlashdata('error','User can not be deleted ');
     }
    }else{
      $this->session->setFlashdata('error','Last User can not be deleted');
     
    }     
   }
  return redirect()->to('admin/user_group');
    
}


////////////////////////


function stock_status()
 {
     if(empty($this->AdminModel->permission($this->uri->getSegment(2)))){
     return redirect()->to('admin/permission-denied');
     } 
     $data['detail'] = $this->AdminModel->all_fetch('stock_status',null);
     $data['page_title']  ='Stock Status';
     echo view('admin/setting/stock_status',$data);

 }

function add_stock_status($id=false)
 {

 
  if(@$id) {
    
    $data['page_title'] = ' Edit Stock Status';
    $data['form_action'] ='admin/add_stock_status/'.$id;
    $row = $this->AdminModel->fs('stock_status',array('id'=>$id));
    $data['name'] =  $row->name;   

    }else{
    
      $data['page_title'] = ' Add Stock Status';
      $data['form_action'] ='admin/add_stock_status';
      $data['name'] =  '';   
   
    }

    if ($this->request->getMethod()=='post') {
   
   
     $rules = ['name'=>'required']; 

    if ($this->validate($rules)==false) {
       $data['validation'] = $this->validator;
     } else{ 

      $save= array();
      $save['name'] =     $this->request->getVar('name');

             
      if ($id) {
          $save['id'] =  $id;
   
          $result=  $this->AdminModel->updateData('stock_status',$save,array('id'=>$id));
          if ($result) {
          $this->session->setFlashdata('success','Record Update successfully');
          return redirect()->to('admin/add_stock_status/'.$id);
          }else{
          $this->session->setFlashdata('error','Record not update');
          return redirect()->to('admin/add_stock_status/'.$id);
          }
      }else{

         $result=  $this->AdminModel->insertData('stock_status',$save);
          if ($result) {
         
          $this->session->setFlashdata('success','Record insert successfully');
          return redirect()->to('admin/stock_status');
          }else{
          $this->session->setFlashdata('error','Record not insert');
          return redirect()->to('admin/add_stock_status');
          }

      }

   }
  }
   echo view('admin/setting/add_stock_status',$data);
}


function delete_stock_status(){
    $ids = $this->request->getVar('selected');
    foreach($ids as $value){
    $this->AdminModel->deleteData('stock_status',array('id'=>$value));    
    }
    $this->session->setFlashdata('success','Record Delete successfully');
    return redirect()->to('admin/stock_status');
    
}

///////////


function order_status()
 { 
    if(empty($this->AdminModel->permission($this->uri->getSegment(2)))){
     return redirect()->to('admin/permission-denied');
     } 

     $data['detail'] = $this->AdminModel->all_fetch('order_status',null);
     $data['page_title']  ='Order Status';
     echo view('admin/setting/order_status',$data);

 }

function add_order_status($id=false)
 {

 
  if(@$id) {
    
    $data['page_title'] = ' Edit Order Status';
    $data['form_action'] ='admin/add_order_status/'.$id;
    $row = $this->AdminModel->fs('order_status',array('id'=>$id));
    $data['name'] =  $row->name;   

    }else{
    
      $data['page_title'] = ' Add Order Status';
      $data['form_action'] ='admin/add_order_status';
      $data['name'] =  '';   
   
    }

  if ($this->request->getMethod()=='post') {
   
   
     $rules = ['name'=>'required']; 

    if ($this->validate($rules)==false) {
       $data['validation'] = $this->validator;
     } else{ 
    


      $save= array();
      $save['name'] =     $this->request->getVar('name');

             
      if ($id) {
          $save['id'] =  $id;
   
          $result=  $this->AdminModel->updateData('order_status',$save,array('id'=>$id));
          if ($result) {
          $this->session->setFlashdata('success','Record Update successfully');
          return redirect()->to('admin/add_order_status/'.$id);
          }else{
          $this->session->setFlashdata('error','Record not update');
          return redirect()->to('admin/add_order_status/'.$id);
          }
      }else{

         $result=  $this->AdminModel->insertData('order_status',$save);
          if ($result) {
         
          $this->session->setFlashdata('success','Record insert successfully');
          return redirect()->to('admin/order_status');
          }else{
          $this->session->setFlashdata('error','Record not insert');
          return redirect()->to('admin/add_order_status');
          }

      }
   }
 }
 echo view('admin/setting/add_order_status',$data);
}


function delete_order_status(){
    $ids = $this->request->getVar('selected');
    foreach($ids as $value){
    $this->AdminModel->deleteData('order_status',array('id'=>$value));    
    }
    $this->session->setFlashdata('success','Record Delete successfully');
    return redirect()->to('admin/order_status');
    
}

////////////

function country()
 {
 
 if(empty($this->AdminModel->permission($this->uri->getSegment(2)))){
  return redirect()->to('admin/permission-denied');
 } 

$data['page_title']  ='Country';

//pagination
$config["base_url"] = base_url() . "admin/country";
$pager= service('pager'); 
$page =  (int)(($this->request->getVar('page')!==null)?$this->request->getVar('page'):1);  // offset
$perPage =  10; //limit
$total = count($this->AdminModel->all_fetch('country',null));
$pager->makeLinks($page,$perPage,$total);
$data['pager'] = $pager;
$data['total_rows'] = $total;
$data['offset'] = $page==1?0:$page*$perPage-$perPage;
$data['pages'] = round($total/$perPage);
$data['detail'] =  $this->AdminModel->all_fetch('country',null,'','',$perPage, $data['offset']);

// end pagination   

echo view('admin/setting/country',$data);

 }

function add_country($id=false)
 {

 
  if(@$id) {
    
    $data['page_title'] = ' Edit Country';
    $data['form_action'] ='admin/add_country/'.$id;
    $row = $this->AdminModel->fs('country',array('id'=>$id));
    $data['name'] =  $row->name;   
     $data['status'] =  $row->status; 
    }else{
    
      $data['page_title'] = ' Add Country';
      $data['form_action'] ='admin/add_country';
      $data['name'] =  '';   
      $data['status'] =  '';  
    }

    if ($this->request->getMethod()=='post') {
   
   
     $rules = ['name'=>'required']; 

     if ($this->validate($rules)==false) {
       $data['validation'] = $this->validator;
     } else{     

      $save= array();
      $save['name'] =     $this->request->getVar('name');
      $save['status'] =     $this->request->getVar('status');
             
      if ($id) {
          $save['id'] =  $id;
   
          $result=  $this->AdminModel->updateData('country',$save,array('id'=>$id));
          if ($result) {
          $this->session->setFlashdata('success','Record Update successfully');
          return redirect()->to('admin/add_country/'.$id);
          }else{
          $this->session->setFlashdata('error','Record not update');
          return redirect()->to('admin/add_country/'.$id);
          }
      }else{

         $result=  $this->AdminModel->insertData('country',$save);
          if ($result) {
         
          $this->session->setFlashdata('success','Record insert successfully');
          return redirect()->to('admin/country');
          }else{
          $this->session->setFlashdata('error','Record not insert');
          return redirect()->to('admin/add_country');
          }

      }
    }
  }
 echo view('admin/setting/add_country',$data);
}


function delete_country(){
    $ids = $this->request->getVar('selected');
    foreach($ids as $value){
    $this->AdminModel->deleteData('country',array('id'=>$value));    
    }
    $this->session->setFlashdata('success','Record Delete successfully');
    return redirect()->to('admin/country');
    
}

/////////////


function state()
 {
     
$data['page_title']  ='state ';
$country = $this->AdminModel->all_fetch('country',null);
foreach ($country as $key => $value) {
 $country_list[$value->id] = $value->name;
}
$data['country_list'] = $country_list;


// pagintion
$config["base_url"] = base_url() . "admin/state";
$pager= service('pager'); 
$page =  (int)(($this->request->getVar('page')!==null)?$this->request->getVar('page'):1);  // offset
$perPage =  10; //limit
$total = count($this->AdminModel->all_fetch('state',null));
$pager->makeLinks($page,$perPage,$total);
$data['pager'] = $pager;
$data['total_rows'] = $total;
$data['offset'] = $page==1?0:$page*$perPage-$perPage;
$data['pages'] = round($total/$perPage);
$data['detail'] =  $this->AdminModel->all_fetch('state',null,'','',$perPage, $data['offset']);
// end
echo view('admin/setting/state',$data);

 }

function add_state($id=false)
 {

    $data['country'] = $this->AdminModel->all_fetch('country',array('status'=>1));
 
  if(@$id) {
    
    $data['page_title'] = ' Edit state ';
    $data['form_action'] ='admin/add_state/'.$id;
    $row = $this->AdminModel->fs('state',array('id'=>$id));
    $data['name'] =  $row->name;   
    $data['status'] =  $row->status; 
    $data['country_id'] =  $row->country_id; 
    }else{
    
      $data['page_title'] = ' Add state ';
      $data['form_action'] ='admin/add_state';
      $data['name'] =  '';   
      $data['status'] =  '';  
      $data['country_id'] =  '';  
    }

   if ($this->request->getMethod()=='post') {
   
   
     $rules = ['name'=>'required']; 

     if ($this->validate($rules)==false) {
       $data['validation'] = $this->validator;
     } else{   
    
      $save= array();
      $save['name'] =    $this->request->getVar('name');
      $save['status'] =    $this->request->getVar('status');
      $save['country_id'] =   $this->request->getVar('country_id');   
      
      if ($id) {
          
          $save['id'] =  $id;
          $result=  $this->AdminModel->updateData('state',$save,array('id'=>$id));
          if ($result) {
          $this->session->setFlashdata('success','Record Update successfully');
          return redirect()->to('admin/add_state/'.$id);
          }else{
          $this->session->setFlashdata('error','Record not update');
          return redirect()->to('admin/add_state/'.$id);
          }
      }else{

         $result=  $this->AdminModel->insertData('state',$save);
          if ($result) {
         
          $this->session->setFlashdata('success','Record insert successfully');
          return redirect()->to('admin/state');
          }else{
          $this->session->setFlashdata('error','Record not insert');
          return redirect()->to('admin/add_state');
          }

      }

 }
}
echo view('admin/setting/add_state',$data);
}


function delete_state(){
    $ids = $this->request->getVar('selected');
    foreach($ids as $value){
    $this->AdminModel->deleteData('state',array('id'=>$value));    
    }
    $this->session->setFlashdata('success','Record Delete successfully');
    return redirect()->to('admin/state');
    
}

//////////////////

function pincode()
{

$model = new SettingModel();
$data['page_title']  ='Pincodes ';
$data['state_list'] = $this->AdminModel->all_fetch('state',array('status'=>1,'country_id'=>99),'name','asc');
foreach($data['state_list'] as $value){
    $states[$value->id]= $value->name;
}
$data['states'] = $states;
$data['detail'] = $model->get_all_pincode();
echo view('admin/setting/pincode',$data);

}

function add_pincode($id=false)
 {
   

  if(@$id) {
    
    $data['page_title'] = ' Edit pincode ';
    $data['form_action'] ='admin/add_pincode/'.$id;
    $row = $this->AdminModel->fs('pincode',array('id'=>$id));
    $data['name'] =  $row->name;   
    $data['status'] =  $row->status; 
    }else{
    
     $data['page_title'] = ' Add pincode ';
     $data['form_action'] ='admin/add_pincode';
     $data['name'] =  '';
     $data['status'] =    '';
    }

    if ($this->request->getMethod()=='post') {
   
   
     $rules = ['name'=>'required']; 

     if ($this->validate($rules)==false) {
       $data['validation'] = $this->validator;
     }else{       
    
      $save= array();
      $save['name'] =     $this->request->getVar('name');
    //   $save['country_id'] =     $this->request->getVar('country_id');
    //   $save['state_id'] =     $this->request->getVar('state_id');
      $save['status'] =     $this->request->getVar('status');
             
      if ($id) {
          $save['id'] =  $id;
          $result=  $this->AdminModel->updateData('pincode',$save,array('id'=>$id));
          if ($result) {
          $this->session->setFlashdata('success','Record Update successfully');
          return redirect()->to('admin/add_pincode/'.$id);
          }else{
          $this->session->setFlashdata('error','Record not update');
          return redirect()->to('admin/add_pincode/'.$id);
          }
      }else{

         $result=  $this->AdminModel->insertData('pincode',$save);
          if ($result) {
         
          $this->session->setFlashdata('success','Record insert successfully');
          return redirect()->to('admin/pincode');
          }else{
          $this->session->setFlashdata('error','Record not insert');
          return redirect()->to('admin/add_pincode');
          }
      }
    }
 }
 echo view('admin/setting/add_pincode',$data);
}


function delete_pincode(){
    $ids = $this->request->getVar('selected');
    foreach($ids as $value){
    $this->AdminModel->deleteData('pincode',array('id'=>$value));    
    }
    $this->session->setFlashdata('success','Record Delete successfully');
    return redirect()->to('admin/pincode');
    
}

////////////////


function verify_pincode()
{
     
$model = new SettingModel();     
$data['page_title']  ='Shipping Pincodes ';
$data['detail'] = $model->get_all_verify_pincode();
    
echo view('admin/setting/verify_pincode',$data);

 }

function add_verify_pincode($id=false)
 {
   $model = new SettingModel();
   $data['state_list'] = $this->AdminModel->all_fetch('state',array('status'=>1,'country_id'=>99));

  if(@$id) {
    
    $data['page_title'] = ' Edit pincode ';
    $data['form_action'] ='admin/add_verify_pincode/'.$id;
    $row = $this->AdminModel->fs('verify_pincode',array('id'=>$id));
    $vpincode = $this->AdminModel->all_fetch('verify_pincode',array('state_id'=>$row->state_id));
    foreach($vpincode as $value){
        $array[]= $value->pincode;
    }
   
    $data['vpincode'] = $array;
    $data['pincode_list'] = $this->AdminModel->all_fetch('pincode',array('state_id'=>$row->state_id));
    $data['state_id'] =  $row->state_id; 
    $data['status'] =  $row->status; 
    
    }else{
    
     $data['page_title'] = ' Add pincode ';
     $data['form_action'] ='admin/add_verify_pincode';
     $data['vpincode'] =   array();
     $data['pincode_list'] =   array();
     $data['state_id'] =    '';
     $data['status'] =    '';
    }


    if ($this->request->getMethod()=='post') {
   
   
     $rules = ['state_id'=>'required']; 

     if ($this->validate($rules)==false) {
       $data['validation'] = $this->validator;
     }else{      

  
      $save= array();
      $save['pincode_id'] =     $this->request->getVar('pincode_id');
      $save['state_id'] =     $this->request->getVar('state_id');
      $save['status'] =     $this->request->getVar('status');
             
      if ($id) {
          $save['id'] =  $id;
   
          $result=  $model->save_pincode($save);
          if ($result) {
          $this->session->setFlashdata('success','Record Update successfully');
          return redirect()->to('admin/verify_pincode');
          }else{
          $this->session->setFlashdata('error','Record not update');
          return redirect()->to('admin/verify_pincode');
          }
      }else{

       $result=  $model->save_pincode($save);
          if ($result) {
         
          $this->session->setFlashdata('success','Record insert successfully');
          return redirect()->to('admin/verify_pincode');
          }else{
          $this->session->setFlashdata('error','Record not insert');
          return redirect()->to('admin/add_verify_pincode');
          }

      }
    }
 }
  echo view('admin/setting/add_verify_pincode',$data);
}


function delete_verify_pincode(){
    $ids = $this->request->getVar('selected');
    foreach($ids as $value){
    $this->AdminModel->deleteData('verify_pincode',array('id'=>$value));    
    }
    $this->session->setFlashdata('success','Record Delete successfully');
    return redirect()->to('admin/verify_pincode');
    
}


function get_pincode(){
   $state_id = $this->request->getVar('state_id');
   $ss = '';
   if ($state_id) {
     $pincodelist = $this->AdminModel->all_fetch('pincode',array('state_id'=>$state_id));
     if ($pincodelist) {
        foreach ($pincodelist as $key => $value) {
          $ss .='<div class="checkbox"><label>
                    <input type="checkbox" name="pincode_id[]" value='.$value->name.' /> '.$value->name.'
                  </label></div>';
        }
     }else{
        $ss .='<option value="">Not Available</option>';
     }
   }
echo $ss;

}

/////////////////


function length_class()
 {
     if(empty($this->AdminModel->permission($this->uri->getSegment(2)))){
     return redirect()->to('admin/permission-denied');
     } 
     
     $data['detail'] = $this->AdminModel->all_fetch('length_class',null);
     $data['page_title']  ='Length class';
     echo view('admin/setting/length_class',$data);

 }

function add_length_class($id=false)
 {

 
  if(@$id) {
    
    $data['page_title'] = ' Edit length class';
    $data['form_action'] ='admin/add_length_class/'.$id;
    $row = $this->AdminModel->fs('length_class',array('id'=>$id));
    $data['title'] =  $row->title;   
     $data['unit'] =  $row->unit; 
    }else{
    
      $data['page_title'] = ' Add length class';
      $data['form_action'] ='admin/add_length_class';
      $data['title'] =  '';   
      $data['unit'] =  '';  
    }

     if ($this->request->getMethod()=='post') {
   
   
     $rules = ['title'=>'required']; 

     if ($this->validate($rules)==false) {
       $data['validation'] = $this->validator;
     }else{      


      $save= array();
      $save['title'] =     $this->request->getVar('title');
      $save['unit'] =     $this->request->getVar('unit');
             
      if ($id) {
          $save['id'] =  $id;
   
          $result=  $this->AdminModel->updateData('length_class',$save,array('id'=>$id));
          if ($result) {
          $this->session->setFlashdata('success','Record Update successfully');
          return redirect()->to('admin/add_length_class/'.$id);
          }else{
          $this->session->setFlashdata('error','Record not update');
          return redirect()->to('admin/add_length_class/'.$id);
          }
      }else{

         $result=  $this->AdminModel->insertData('length_class',$save);
          if ($result) {
         
          $this->session->setFlashdata('success','Record insert successfully');
          return redirect()->to('admin/length_class');
          }else{
          $this->session->setFlashdata('error','Record not insert');
          return redirect()->to('admin/add_length_class');
          }

      }
    }
 }
 echo view('admin/setting/add_length_class',$data);
}


function delete_length_class(){
    $ids = $this->request->getVar('selected');
    foreach($ids as $value){
    $this->AdminModel->deleteData('length_class',array('id'=>$value));    
    }
    $this->session->setFlashdata('success','Record Delete successfully');
    return redirect()->to('admin/length_class');
    
}

//////////////////


function weight_class()
 {
     $data['detail'] = $this->AdminModel->all_fetch('weight_class',null);
     $data['page_title']  ='Weight class';
     echo view('admin/setting/weight_class',$data);

 }

function add_weight_class($id=false)
 {

 
  if(@$id) {
    
    $data['page_title'] = ' Edit Weight class';
    $data['form_action'] ='admin/add_weight_class/'.$id;
    $row = $this->AdminModel->fs('weight_class',array('id'=>$id));
    $data['title'] =  $row->title;   
     $data['unit'] =  $row->unit; 
    }else{
    
      $data['page_title'] = ' Add Weight class';
      $data['form_action'] ='admin/add_weight_class';
      $data['title'] =  '';   
      $data['unit'] =  '';  
    }

    if ($this->request->getMethod()=='post') {
   
     $rules = ['title'=>'required']; 

     if ($this->validate($rules)==false) {
       $data['validation'] = $this->validator;
     }else{      
    
      $save= array();
      $save['title'] =     $this->request->getVar('title');
      $save['unit'] =     $this->request->getVar('unit');
             
      if ($id) {
          $save['id'] =  $id;
   
          $result=  $this->AdminModel->updateData('weight_class',$save,array('id'=>$id));
          if ($result) {
          $this->session->setFlashdata('success','Record Update successfully');
          return redirect()->to('admin/add_weight_class/'.$id);
          }else{
          $this->session->setFlashdata('error','Record not update');
          return redirect()->to('admin/add_weight_class/'.$id);
          }
      }else{

         $result=  $this->AdminModel->insertData('weight_class',$save);
          if ($result) {
         
          $this->session->setFlashdata('success','Record insert successfully');
          return redirect()->to('admin/weight_class');
          }else{
          $this->session->setFlashdata('error','Record not insert');
          return redirect()->to('admin/add_weight_class');
          }

      }
    }
 }
 echo view('admin/setting/add_weight_class',$data);
}


function delete_weight_class(){
    $ids = $this->request->getVar('selected');
    foreach($ids as $value){
    $this->AdminModel->deleteData('weight_class',array('id'=>$value));    
    }
    $this->session->setFlashdata('success','Record Delete successfully');
    return redirect()->to('admin/weight_class');
    
}
/////////////////////




function tax_rate()
 {
     $data['detail'] = $this->AdminModel->all_fetch('tax_rate',null);
     $data['page_title']  ='All Taxes';
     echo view('admin/setting/tax_rate',$data);

 }

function add_tax_rate($id=false)
 {

 
  if(@$id) {
    
    $data['page_title'] = ' Edit Taxes';
    $data['form_action'] ='admin/add_tax_rate/'.$id;
    $row = $this->AdminModel->fs('tax_rate',array('id'=>$id));
    $data['name'] =  $row->name;   
    $data['description'] =  $row->description; 
    $data['rate'] =  $row->rate; 
    $data['type'] =  $row->type; 
    $data['status'] =  $row->status; 

    }else{
    
      $data['page_title'] = ' Add Taxes';
      $data['form_action'] ='admin/add_tax_rate';
      $data['name'] = ''; 
      $data['description'] = '';
      $data['description'] = ''; 
      $data['rate'] = ''; 
      $data['type'] = ''; 
      $data['status'] = '';



    }

    if ($this->request->getMethod()=='post') {
   
     $rules = ['name'=>'required','rate'=>'required']; 

     if ($this->validate($rules)==false) {
       $data['validation'] = $this->validator;
     }else{      
    
        $save= array();
        $save['name'] = $this->request->getVar('name'); 
        $save['description'] = $this->request->getVar('description');
        $save['rate'] = $this->request->getVar('rate'); 
        $save['type'] = $this->request->getVar('type'); 
        $save['status'] = $this->request->getVar('status');
             
      if ($id) {
  
          $result=  $this->AdminModel->updateData('tax_rate',$save,array('id'=>$id));
          if ($result) {
          $this->session->setFlashdata('success','Record Update successfully');
          return redirect()->to('admin/add_tax_rate/'.$id);
          }else{
          $this->session->setFlashdata('error','Record not update');
          return redirect()->to('admin/add_tax_rate/'.$id);
          }
      }else{

         $result=  $this->AdminModel->insertData('tax_rate',$save);
          if ($result) {
         
          $this->session->setFlashdata('success','Record insert successfully');
          return redirect()->to('admin/tax_rate');
          }else{
          $this->session->setFlashdata('error','Record not insert');
          return redirect()->to('admin/add_tax_rate');
          }

      }
    }
 }
 echo view('admin/setting/add_tax_rate',$data);
}


function delete_tax_rate(){
    $ids = $this->request->getVar('selected');
    foreach($ids as $value){
    $this->AdminModel->deleteData('tax_rate',array('id'=>$value));    
    }
    $this->session->setFlashdata('success','Record Delete successfully');
    return redirect()->to('admin/tax_rate');
    
}
////////////






function currency()
 {
     $data['detail'] = $this->AdminModel->all_fetch('currency',null);
     $data['page_title']  ='All Currency ';
     echo view('admin/setting/currency',$data);

 }

function add_currency($id=false)
 {

 
  if(@$id) {
    
    $data['page_title'] = ' Edit Currency';
    $data['form_action'] ='admin/add_currency/'.$id;
    $row = $this->AdminModel->fs('currency',array('id'=>$id));
    $data['title'] =  $row->title;   
    $data['code'] =  $row->code; 
    $data['symbol_left'] =  $row->symbol_left; 
    $data['symbol_right'] =  $row->symbol_right; 
    $data['decimal_place'] =  $row->decimal_place; 
    $data['value'] =  $row->value; 
    $data['status'] =  $row->status; 

    }else{
    
      $data['page_title'] = ' Add Currency';
      $data['form_action'] ='admin/add_currency';
    $data['title'] = '';
    $data['code'] =  ''; 
    $data['symbol_left'] =  '';
    $data['symbol_right'] =  '';
    $data['decimal_place'] =  '';
    $data['value'] =  '';
    $data['status'] =  '';



    }

    if ($this->request->getMethod()=='post') {
   
     $rules = ['title'=>'required']; 

     if ($this->validate($rules)==false) {
       $data['validation'] = $this->validator;
     }else{      
    
        $save= array();
    $save['title'] =  $this->request->getVar('title'); 
    $save['code'] =   $this->request->getVar('code'); 
    $save['symbol_left'] =   $this->request->getVar('symbol_left'); 
    $save['symbol_right'] =   $this->request->getVar('symbol_right'); 
    $save['decimal_place'] =   $this->request->getVar('decimal_place'); 
    $save['value'] =   $this->request->getVar('value'); 
    $save['status'] =   $this->request->getVar('status'); 
             
      if ($id) {
  
          $result=  $this->AdminModel->updateData('currency',$save,array('id'=>$id));
          if ($result) {
          $this->session->setFlashdata('success','Record Update successfully');
          return redirect()->to('admin/add_currency/'.$id);
          }else{
          $this->session->setFlashdata('error','Record not update');
          return redirect()->to('admin/add_currency/'.$id);
          }
      }else{

         $result=  $this->AdminModel->insertData('currency',$save);
          if ($result) {
         
          $this->session->setFlashdata('success','Record insert successfully');
          return redirect()->to('admin/currency');
          }else{
          $this->session->setFlashdata('error','Record not insert');
          return redirect()->to('admin/add_currency');
          }

      }
    }
 }
 echo view('admin/setting/add_currency',$data);
}


function delete_currency(){
    $ids = $this->request->getVar('selected');
    foreach($ids as $value){
    $this->AdminModel->deleteData('currency',array('id'=>$value));    
    }
    $this->session->setFlashdata('success','Record Delete successfully');
    return redirect()->to('admin/currency');
    
}




}
