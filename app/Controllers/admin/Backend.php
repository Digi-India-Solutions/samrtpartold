<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\BackendModel;
use App\Models\CommonModel;
use App\Models\SalesModel;

class Backend extends BaseController
{
	
	
	public function __construct()
	{

	    $session = \Config\Services::session();
		$this->admin_id = $session->get('adminLogin');
             
	}


	public function index()
	{ 
	
	$model = new BackendModel();
	$sale = new SalesModel();
	
	$data['product_enquiry'] = count($this->AdminModel->all_fetch('product_enquiry',null));	
    $data['contact_enquiry'] = count($this->AdminModel->all_fetch('enquiry',null));	
	$data['orders'] = count($model->get_all_active_order());
    $data['sales'] = $model->get_all_sales();
    $data['latest_order'] = $model->get_latest_order();
    $data['customer'] = count($this->AdminModel->all_fetch('subscriber',null));
    $data['admin'] = $this->AdminModel->all_fetch('admin',null);
    $data['category'] = $model->getwithLimitOrde1rBy('category','6','0','id','desc');
    $data['product'] = $model->getwithLimitOrde1rBy('product','6','0','id','desc');

    if(!empty($this->request->getVar('calander'))){
        $where = $this->request->getVar('calander');
        if($where=='month'){
        $data['mtotals'] = $model->get_order_all_calendar_month();
        }
        if($where=='year'){
        $data['ytotals'] = $model->get_order_all_calendar_year();
        }
        if($where=='week'){
        $data['wtotals'] = $model->get_order_all_calendar_week();
        }
    }
    
    $data['order_all'] = $sale->get_all_orders();
    $data['page_title'] = 'Dashboard';
	return view('admin/dashboard',$data);
	
	}



	public function profile()
	{
	  $model = new BackendModel();
	  
	  $data['page_title']= 'Profile';
	  $data['detail'] = $this->AdminModel->fs('admin',array('id'=>$this->admin_id));
	  $data['form_action'] ='admin/profile';
	 
	 if($this->request->getMethod()=='post'){

		$rules = [
			'username'=>['label'=>'Username','rules'=>'trim|required|admin_username['.$this->admin_id.']'],
			'password'=>['label'=>'Password','rules'=>'trim'],
			'email'=>['label'=>'Email','rules'=>'required|admin_email['.$this->admin_id.']'],
		];
	
	// 	$this->form_validation->set_rules('password','password','trim'); 
	//   if (!empty($this->input->post('password'))) {
	//    $this->form_validation->set_rules('confirm','Confirm','matches[password]');   
	// 	 }   

	  if ($this->validate($rules)==FALSE) {
		$data['validation'] = $this->validator;
	  }else{
		$save = array();
		$save['username'] = $this->request->getVar('username');
		$save['firstname'] = $this->request->getVar('firstname');
		$save['lastname'] = $this->request->getVar('lastname');
		$save['email'] = $this->request->getVar('email');
		$save['modify_date'] = date('Y-m-d H:i:s');
		
		if (!empty($this->request->getVar('password'))) {
		$save['password'] = password_hash($this->request->getVar('password'),PASSWORD_BCRYPT);
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
	  

		$result = $this->AdminModel->updateData('admin',$save,array('id'=>$this->admin_id));
		if ($result) {
		  $this->session->setFlashdata('success','Record update successfully');
		return   redirect()->to('admin/profile');
		}else{
			$this->session->setFlashdata('error','Record update unsuccessful!');
			redirect()->to('admin/profile');
		}
	   }
	  }
	  return view('admin/profile',$data);
  }



    function permission_denied(){
         $data['page_title']= 'Permision Denied';
         return view('admin/permission_denied',$data);
    }







	function logout(){
		$this->session->remove('adminLogin');
		return redirect()->route('admin_console');
	}




}
