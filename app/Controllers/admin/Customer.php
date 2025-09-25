<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\BackendModel;
use App\Models\CommonModel;
use App\Models\CustomerModel;
use App\Models\ProductFrontModel;

class Customer extends BaseController
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
    $model = new CustomerModel();
    $permission = $this->AdminModel->permission($this->uri->getSegment(2));
    if(empty($permission)){
       return redirect()->to('admin/permission-denied');
    }

    $data['page_title']  ='Customers';
    $data['form_action'] = 'admin/delete_customer';
    
    //pagination
    $config["base_url"] = base_url() . "admin/customer";
    $pager= service('pager'); 
    $page =  (int)(($this->request->getVar('page')!==null)?$this->request->getVar('page'):1);  // offset
    $perPage =  20; //limit
    $total = count($this->AdminModel->all_fetch('user',null));
    $pager->makeLinks($page,$perPage,$total);
    $data['pager'] = $pager;
    $data['total_rows'] = $total;
    $data['offset'] = $page==1?0:$page*$perPage-$perPage;
    $data['pages'] = round($total/$perPage);
    $data['detail'] = $model->get_all_users(@$this->request->getVar(),$perPage, $data['offset']);
    // end pagination   

     return view('admin/customer/customer',$data);
}



function check_email($email){
    if ($this->form_user_id) {
      $result = $this->AdminModel->fs('user',array('email'=>$email,'id <>'=>$this->form_user_id));
    }else{
        $result = $this->AdminModel->fs('user',array('email'=>$email));
    }

    if ($result) {
        $this->form_validation->set_message('check_email','Email Already taken');
        return false;
      }else{
        return true;
    }

}


function add_customer($id=false)
 {
    
    $model = new CustomerModel();
    $data['user_ip'] = $this->AdminModel->all_fetch('order',array('id'=>$id));
    $data['rating_list'] = $this->AdminModel->all_fetch('rating',null,'id','desc');
    $data['detail'] = $model->get_all_orders($id);
    // $data['product_list'] = $this->AdminModel->all_fetch('product',null);
    $data['customer_group'] = $this->AdminModel->all_fetch('customer_group',array('status'=>1));
    $data['country_list'] = $this->AdminModel->all_fetch('country',array('status'=>1));
    
    
  if (@$id) {
    $data['page_title'] = ' Edit Customer';
    $data['form_action'] ='admin/add_customer/'.$id;
    $row = $this->AdminModel->fs('user',array('id'=>$id));
  
    $data['first_name'] = $row->first_name;
    $data['last_name'] =$row->last_name;
    $data['email'] =$row->email;
    $data['photo'] = $row->photo;
    $data['mobile'] = $row->mobile;
    $data['country'] = $row->country;
    $data['status']=$row->status;
    $data['reg_type']=$row->reg_type;
    $data['bussiness_card']=$row->bussiness_card;
    $data['company_name']=$row->company_name;
    $data['company_address']=$row->company_address;
    $data['customer_group_id']=$row->customer_group_id;
    $data['website_link']=$row->website_link;
    $this->form_user_id = $id;
            
    }else{
    $data['page_title'] = ' Add Customer';
    $data['form_action'] ='admin/add_customer';
     $data['website_link']='';
    $data['first_name'] =''; 
    $data['last_name'] ='';
    $data['email'] ='';
    $data['photo'] =''; 
    $data['mobile'] =''; 
    $data['status']='';
    $data['customer_group_id']= '';
    $data['country'] =  '';
    $data['reg_type']='';
    $data['bussiness_card']='';
    $data['company_name']='';
    $data['company_address']='';

    }

    if ($this->request->getMethod()=='post') {

    $rules['first_name'] = ['label'=>'First Name','rules'=>'required'];
    if(!empty($this->request->getVar('password'))){
        $rules['password'] = ['label'=>'Password','rules'=>'required|min_length[6]'];
        $rules['confirm'] = ['label'=>'confirm Password','rules'=>'required|min_length[6]|matches[password]'];
    }
    
    $rules['email'] = ['label'=>'email','rules'=>'required|valid_email|user_email['.$id.']'];
   
    if ($this->validate($rules)==false) {
        $data['validation'] = $this->validator;
     } else{

    $save= array();
          
    $save['first_name'] =  $this->request->getVar('first_name');
    $save['last_name'] =  $this->request->getVar('last_name');
    $save['email'] =  $this->request->getVar('email');
    $save['mobile'] =  $this->request->getVar('mobile');
    $save['status'] =  $this->request->getVar('status');
    $save['country'] =  $this->request->getVar('country');
    
    $save['reg_type']= $this->request->getVar('reg_type');
    $save['bussiness_card']= $this->request->getVar('bussiness_card');
    $save['company_name']= $this->request->getVar('company_name');
    $save['company_address']= $this->request->getVar('company_address');
    $save['website_link'] = $this->request->getVar('website_link');

     $save['customer_group_id'] =  $this->request->getVar('customer_group_id');
    if (!empty($this->request->getVar('password'))) {
     $save['password'] =  md5($this->request->getVar('password'));
    }

        
    $file = $this->request->getFile('photo');
    if(!empty($file->getClientName())){
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
  
    $result=  $this->AdminModel->updateData('user',$save,array('id'=>$id));
    if ($result) {
    $this->session->setFlashdata('success','Record Saved successfully');
    return redirect()->to('admin/customer');
    }else{
    $this->session->setFlashdata('error','Record not insert');
    return redirect()->to('admin/add_customer');
    }
  }else{
    $save['create_date'] =  date('Y-m-d');
    $save['modify_date'] =  date('Y-m-d');
    $result=  $this->AdminModel->insertData('user',$save);
    if ($result) {
    $this->session->setFlashdata('success','Record Update successfully');
    return redirect()->to('admin/customer');
    }else{
    $this->session->setFlashdata('error','Record not insert');
    return redirect()->to('admin/add_customer');
    }
     }
  
   }
 }
  return view('admin/customer/add_customer',$data);

}

function delete_customer()
{   $id = $this->request->getVar('selected');
    if(!empty($id)){
     $model = new CustomerModel();   
     $model->delete_customer($id);
     $this->session->setFlashdata('success','Record Delete successfully'); 
    }
   
  return  redirect()->to('admin/customer');
    
}


function customer_export(){
$model = new CustomerModel();    
$data['page_title'] = 'Export Customer';    
$state_list = $this->AdminModel->all_fetch('state',null);
foreach ($state_list as $key => $value) {
  $states[$value->id] = $value->name;
}
$country_list = $this->AdminModel->all_fetch('country',null);
foreach ($country_list as $key => $value) {
  $countries[$value->id] = $value->name;
}
    
$list = $model->get_export_user($this->request->getVar());

header("Content-type: application/csv");
header("Content-Disposition: attachment; filename=\"Export Customer".".csv\"");
header("Pragma: no-cache");
header("Expires: 0");
$handle = fopen('php://output', 'w');

  fputcsv($handle,array(
    
    '0'=>'First name',
    '1'=>'Last Name',
    '2'=>'Email',
    '3'=>'Phone',
    '4'=>'IP',
    '5'=>'Status',
    '6'=>'Create Date'
  
  )
);

foreach ($list as $row) {
      $array = array();
      $array[]= $row->first_name;
      $array[]= $row->last_name;
      $array[]= $row->email;
      $array[]= $row->mobile;
      $array[]= $row->ip;
      $array[]= $row->status==1?'Active':'Deactive';
      $array[]= $row->create_date;

    fputcsv($handle, $array);
}
              
$result =  fclose($handle); 
exit;
}

/////////////////


	
function enquiry()
    {  
        
    $permission = $this->AdminModel->permission($this->uri->getSegment(2));
    if(empty($permission)){
        return redirect()-to('admin/permission-denied');
    }  
      $model = new CustomerModel();
      $data['page_title'] ='Enquiry';
      $data['detail'] = $model->get_all_enquiry(@$_GET);
      echo view('admin/customer/enquiry',$data);
    }
    
    function delete_enquiry()
    {  
        $id = $this->request->getVar('selected');
        if(!empty($id)){
      
          foreach ($id as $key => $value) { 
          $this->AdminModel->deleteData('enquiry',array('id'=>$value));
          }
         
         $this->session->setFlashdata('success','Record Delete successfully'); 
        }
      return redirect()->to('admin/enquiry');
    }


function quatation_enquiry()
    {  
        
    $permission = $this->AdminModel->permission($this->uri->getSegment(2));
    if(empty($permission)){
        return redirect()-to('admin/permission-denied');
    }  
      $model = new CustomerModel();
      $data['page_title'] ='Quatation Enquiry';
      $data['detail'] = $model->get_all_quotationenquiry(@$_GET);
      echo view('admin/customer/quatation_enquiry',$data);
    }
    
    function delete_quatation()
    {  
        $id = $this->request->getVar('selected');
        if(!empty($id)){
      
          foreach ($id as $key => $value) { 
          $this->AdminModel->deleteData('quotation',array('id'=>$value));
          }
         
         $this->session->setFlashdata('success','Record Delete successfully'); 
        }
      return redirect()->to('admin/quatation_enquiry');
    }


   function product_enquiry()
    {  
    
    $model = new CustomerModel();
    $permission = $this->AdminModel->permission($this->uri->getSegment(2));
    if(empty($permission)){
        return redirect()-to('admin/permission-denied');
    }  
    
      $data['page_title'] ='All Product Enquiry';
      $data['detail'] = $model->get_product_enquiry(@$_GET);
      echo view('admin/customer/product_enquiry',$data);
    }
    
    function delete_product_enquiry()
    {  
        $id = $this->request->getVar('selected');
        if(!empty($id)){
      
          foreach ($id as $key => $value) { 
          $this->AdminModel->deleteData('product_enquiry',array('id'=>$value));
          }
         
         $this->session->setFlashdata('success','Record Delete successfully'); 
        }
      return redirect()->to('admin/product_enquiry');
    }

	///////////////////

public function customer_review()
 {
    $model = new CustomerModel();
    $permission = $this->AdminModel->permission($this->uri->getSegment(2));
    if(empty($permission)){
        return redirect()->to('admin/permission-denied');
    }
    $data['page_title']  ='Product Customer Reviews';
    $data['product'] = array();
    $data['form_action'] = 'admin/delete_customer_review';     
    //pagination
    $pager= service('pager'); 
    $page =  (int)(($this->request->getVar('page')!==null)?$this->request->getVar('page'):1);  // offset
    $perPage =  10; //limit
    $total = count($this->AdminModel->all_fetch('product_review',null));
    $pager->makeLinks($page,$perPage,$total);
    $data['pager'] = $pager;
    $data['total_rows'] = $total;
    $data['offset'] = $page==1?0:$page*$perPage-$perPage;
    $data['pages'] = round($total/$perPage);
    $data['detail'] = $model->get_all_review(@$this->request->getVar(),$perPage, $data['offset']);
    // end pagination   

    return view('admin/customer/customer_review',$data);

     }

     function add_customer_review($id=false)
     {
     
        $data['rating_list'] = $this->AdminModel->all_fetch('rating',null,'id','desc');
        $data['product_list'] = array();
      if (@$id) {
        $data['page_title'] = ' Edit Customer Review';
        $data['form_action'] ='admin/add_customer_review/'.$id;
        $row = $this->AdminModel->fs('product_review',array('id'=>$id));
        $data['product_id'] = $row->product_id;
        $data['fname'] = $row->fname;
        $data['lname'] =$row->lname;
        $data['review'] =$row->review;
        $data['rating'] = $row->rating;
        $data['status']=$row->status;
        $data['visible']=$row->visible;  
        $data['title']=$row->title;  
        $data['product'] = $this->AdminModel->fs('product',array('id'=>$row->product_id));
        
        }else{
        $data['page_title'] = ' Add Customer Review';
        $data['form_action'] ='admin/add_customer_review';
        
        $data['product_id'] = '';
        $data['fname'] = '';
        $data['lname'] ='';
        $data['review'] ='';
        $data['rating'] = '';
        $data['status']='';
        $data['visible']= '';
        $data['title']= '';
        $data['product'] = array();
        
        }


        if ($this->request->getMethod()=='post') {

        	$rules = [
        		'fname' =>'required'
        	];

        if ($this->validate($rules)==false) {
          
        	$data['validation'] = $this->validator;
        }else{

        $save= array();
                           
        $save['product_id'] =  $this->request->getVar('product_id');
        $save['fname'] =  $this->request->getVar('fname');
        $save['lname'] =  $this->request->getVar('lname');
        $save['review'] =  $this->request->getVar('review');
        $save['rating'] =  $this->request->getVar('rating');
         $save['title'] =  $this->request->getVar('title');
        $save['status'] =  $this->request->getVar('status');
        $save['visible'] =  $this->request->getVar('visible');

      if ($id) {
         $save['modify_date'] =  date('Y-m-d');
      
        $result=  $this->AdminModel->updateData('product_review',$save,array('id'=>$id));
        if ($result) {
        $this->session->setFlashdata('success','Record Saved successfully');
        return redirect()->to('admin/customer_review');
        }else{
        $this->session->setFlashdata('error','Record not insert');
        return redirect()->to('admin/add_customer_review');
        }
      }else{
        $save['create_date'] =  date('Y-m-d');
        $save['modify_date'] =  date('Y-m-d');
        $result=  $this->AdminModel->insertData('product_review',$save);
        if ($result) {
        $this->session->setFlashdata('success','Record Update successfully');
        return redirect()->to('admin/customer_review');
        }else{
        $this->session->setFlashdata('error','Record not insert');
        return redirect()->to('admin/add_customer_review');
        }
      }
      
     }
    }	
     return  view('admin/customer/add_customer_review',$data);

    }

    function delete_customer_review()
    {   $id = $this->request->getVar('selected');
        if(!empty($id)){
          $model = new CustomerModel();      
         $model->delete_customer_review($id);
         $this->session->setFlashdata('success','Record Delete successfully'); 
        }
       
      return redirect()->to('admin/customer_review');
        
    }


function get_ajax_product(){
    $model = new ProductFrontModel();
    
    $search = $this->request->getVar('search');
    $ss = '';
    
    if($search){
        $product =  $model->get_product_search($search);
        if (!empty($product)) {
        	 foreach ($product as $key => $value) {
        	$ss .='<option value='.$value->id.'>'.$value->name.' - '.$value->part_no.'</option>';
	    }
	        
	  }else{
	      $ss .='<option value="">No Result found</option>';
	  }  
    }else{
        $ss .='<option value="">No Result found</option>';
    }
    echo $ss;
    
    
    
    
}






//////////////////

   public function customer_group()
   {
    $model = new CustomerModel();
    $permission = $this->AdminModel->permission($this->uri->getSegment(2));
    if(empty($permission)){
        return redirect()->to('admin/permission-denied');
    }
    $data['page_title']  ='Customer Groups List';
    $data['list'] = $this->AdminModel->all_fetch('customer_group',null);
    $data['form_action'] = 'admin/delete_customer_group';     
    return view('admin/customer/customer_group',$data);

     }

     function add_customer_group($id=false)
     {
     

      if (@$id) {
        $data['page_title'] = ' Edit Customer Group';
        $data['form_action'] ='admin/add_customer_group/'.$id;
        $row = $this->AdminModel->fs('customer_group',array('id'=>$id));
        $data['group_name'] = $row->group_name;
        $data['description'] = $row->description;
        $data['approval'] =$row->approval;
        $data['price_approval'] =$row->price_approval;
        $data['sort_order']=$row->sort_order;
        $data['status']=$row->status;
        }else{ 
        $data['page_title'] = ' Add Customer Group';
        $data['form_action'] ='admin/add_customer_group';
        
        $data['group_name'] = '';
        $data['description'] = '';
        $data['approval'] ='';
        $data['sort_order'] ='';
        $data['status'] = '';
        $data['price_approval'] = '';
   
        }


        if ($this->request->getMethod()=='post') {
       
       	$rules =[
       		'group_name' =>'required'
       	];

       	if ($this->validate($rules) ==false) {
       		$data['validation'] = $this->validator;
       	}else{

        $save= array();
        $save['group_name'] =  $this->request->getVar('group_name');
        $save['description'] =  $this->request->getVar('description');
        $save['approval'] =  $this->request->getVar('approval');
        $save['sort_order'] =  $this->request->getVar('sort_order');
        $save['status'] =  $this->request->getVar('status');
       $save['price_approval'] =  $this->request->getVar('price_approval');
     
      if ($id) {
         $save['modify_date'] =  date('Y-m-d');
      
        $result=  $this->AdminModel->updateData('customer_group',$save,array('id'=>$id));
        if ($result) {
        $this->session->setFlashdata('success','Record Saved successfully');
        return redirect()->to('admin/add_customer_group/'.$id);
        }else{
        $this->session->setFlashdata('error','Record not insert');
        return redirect()->to('admin/add_customer_group');
        }
      }else{
        $save['create_date'] =  date('Y-m-d');
        $save['modify_date'] =  date('Y-m-d');
        $result=  $this->AdminModel->insertData('customer_group',$save);
        if ($result) {
        $this->session->setFlashdata('success','Record Update successfully');
        return redirect()->to('admin/customer_group');
        }else{
        $this->session->setFlashdata('error','Record not insert');
        return redirect()->to('admin/add_customer_group');
        }
        }
      
       }
     }
    return view('admin/customer/add_customer_group',$data);

    }

    function delete_customer_group()
    {   $id = $this->request->getVar('selected');
        if(!empty($id)){
          $model = new CustomerModel();      
           foreach($id as $value){
               $this->AdminModel->deleteData('customer_group',array('id'=>$value));
           }     
         $this->session->setFlashdata('success','Record Delete successfully'); 
        }
       
      return redirect()->to('admin/customer_group');
        
    }
	
	
}
