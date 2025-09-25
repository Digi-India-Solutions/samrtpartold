<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\SettingModel;

class Store extends BaseController
{
   
	var $data = array();
	var $form_user_id = false;
  
	public function __construct()
	  {
	  if(!session()->get('adminLogin'))
	  {
		return redirect()->to('admin/login');
	  }
   
	  }
	
	public function index()
	{
   
		if(empty($this->AdminModel->permission($this->uri->getSegment(2)))){
		redirect('admin/permission-denied');
		} 
		
	   $data['page_title']  ='Store';
	 
	   $setting = $this->AdminModel->all_fetch('setting',array('code'=>'config'));
	   foreach ($setting as $key => $value) {
		 $all_setting[$value->key] = $value->value;
	   }
   
	   $data['config'] = $all_setting;
   
		return view('admin/setting/store',$data);
	}



	function add_store($id=false)
	{
	   
	   $model = new SettingModel();	
	   $all_setting = array();
	   $data['country_list'] = $this->AdminModel->all_fetch('country',null);
	   $data['state_list'] = $this->AdminModel->all_fetch('state',null);
	   $data['currency_list'] = $this->AdminModel->all_fetch('currency',null);
	   $data['order_status_list'] = $this->AdminModel->all_fetch('order_status',null);
	
	   $data['page_title'] = ' Edit Store';
	   $data['form_action'] ='admin/add_store';
	   $setting = $this->AdminModel->all_fetch('setting',array('code'=>'config'));
	   foreach ($setting as $key => $value) {
		 $all_setting[$value->key] = $value->value;
	   }
   
	   $data['config'] = $all_setting;
   
   
	  if($this->request->getMethod()=='post'){
	 
	   $rules = [
		   'config_name'=>['lable'=>'Store Name','rules'=>'required'],
	   ]; 
   
	   if ($this->validate($rules)==false) {
		$data['validation'] = $this->validator;
		}else{
   
	   $save= array();
	   $save = $this->request->getPost();
	  

     $file = $this->request->getFile('config_logo');
     if(!empty($file->getClientName())){
         if($file->isValid() && !$file->hasMoved()){
              $file_name = $file->getRandomName();
              if($file->move('uploads/images/', $file_name)){
                $save['config_logo'] = 'uploads/images/'.$file_name;
            }
         }else{
			throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
			 exit;
		 }
	    }else{
		$save['config_logo'] = $this->request->getVar('old_config_logo');
		unset($save['old_config_logo']);
		
	  }

	  
	  $file = $this->request->getFile('config_icon');
	  if(!empty($file->getClientName())){
		$file = $this->request->getFile('config_icon');
		if($file->isValid() && !$file->hasMoved()){
			 $file_name = $file->getRandomName();
			 if($file->move('uploads/images/', $file_name)){
			   $save['config_icon'] = 'uploads/images/'.$file_name;
		   }
		}else{
			throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
			exit;
		}
	   }else{
	   $save['config_icon'] = $this->request->getVar('old_config_icon');
	   unset($save['old_config_icon']);
	 }
   
	 $file = $this->request->getFile('config_favicon');
	 if(!empty($file->getClientName())){
		$file = $this->request->getFile('config_favicon');
		if($file->isValid() && !$file->hasMoved()){
			 $file_name = $file->getRandomName();
			 if($file->move('uploads/images/', $file_name)){
			   $save['config_favicon'] = 'uploads/images/'.$file_name;
		   }
		}else{
			throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
			exit;
		}
	   }else{
	   $save['config_favicon'] = $this->request->getVar('old_config_favicon');
	   unset($save['old_config_favicon']);
	 }


	 $file = $this->request->getFile('checkout_image');
	 if(!empty($file->getClientName())){
		$file = $this->request->getFile('checkout_image');
		if($file->isValid() && !$file->hasMoved()){
			 $file_name = $file->getRandomName();
			 if($file->move('uploads/images/', $file_name)){
			   $save['checkout_image'] = 'uploads/images/'.$file_name;
		   }
		}else{
			throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
			exit;
		}
	   }else{
	   $save['checkout_image'] = $this->request->getVar('old_checkout_image');
	   unset($save['old_checkout_image']);
	 }
	 
	 $file = $this->request->getFile('b_signature');
	  if(!empty($_FILES['b_signature']['name'])){
		$file = $this->request->getFile('b_signature');
		if($file->isValid() && !$file->hasMoved()){
			 $file_name = $file->getRandomName();
			 if($file->move('uploads/images/', $file_name)){
			   $save['b_signature'] = 'uploads/images/'.$file_name;
		   }
		}else{
			throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
			exit;
		}
	   }else{
	   $save['b_signature'] = $this->request->getVar('old_b_signature');
	   unset($save['old_b_signature']);
	 }
	  	   
   
	   $result = $model->save_setting($save);
	   
	  if ($result) {
	   $this->session->setFlashdata('success','Record Update successfully');
	   return  redirect()->to('admin/store');
	   }else{
	   $this->session->setFlashdata('error','Record not insert');
	   return redirect()->to('admin/add_store');
	   }
   
	}
   
   }
  return  view('admin/setting/add_store',$data);

}


function get_state_list(){
  if ($this->request->getVar('country_id')) {
    $country_id = $this->request->getVar('country_id');
    $state = $this->AdminModel->all_fetch('state',array('country_id'=>$country_id));

    $ss ='';
    if ($state) {
     foreach ($state as $key => $value) {
        $ss .='<option value='.$value->id.'>'.$value->name.'</option>';
      }
    }else{
      $ss .='<option value=""> Not Available  </option>';
    }

    $array['status'] = 1;
    $array['ss'] = $ss;
    echo json_encode($array);
  }else{
    $array['status'] = 0;
    echo json_encode($array);
  }
  

}









}
