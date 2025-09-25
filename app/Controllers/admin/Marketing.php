<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\MarketingModel;

class Marketing extends BaseController
{
	public function index()
	{
		//
	}

public function coupon()
{
    $model = new MarketingModel();
	$data['page_title']  ='coupon';

	if(empty($this->AdminModel->permission($this->uri->getSegment(2)))){
	return redirect()->to('admin/permission-denied');
	}   

	//pagination
	$config["base_url"] = base_url() . "admin/coupon";
	$config["total_rows"] = count($this->AdminModel->all_fetch('coupon',null));
	//pagination
	$pager= service('pager'); 
	$page =  (int)(($this->request->getVar('page')!==null)?$this->request->getVar('page'):1);  // offset
	$perPage =  10; //limit
	$total = count($this->AdminModel->all_fetch('coupon',null));
	$pager->makeLinks($page,$perPage,$total);
	$data['pager'] = $pager;
	$data['total_rows'] = $total;
    $data['offset'] = $page==1?0:$page*$perPage-$perPage;
    $data['pages'] = round($total/$perPage);
	$data['coupon'] = $model->get_all_coupon($perPage, $data['offset'],@$this->request->getVar());

	// end pagination	  
	return view('admin/marketing/coupon',$data);
 }



public function add_coupon($id=false)
{
	$model = new MarketingModel();
	$data['coupon'] = $this->AdminModel->all_fetch('coupon',null);
	$data['product_list'] = array(); // $model->get_product_name_list();
	$data['category_list'] = $this->AdminModel->all_fetch('category',null);

	
	if(!empty($id)){

	$row = $this->AdminModel->fs('coupon',array('id'=>$id));
	$data['coupon_name'] = $row->coupon_name;
	$data['coupon_code'] = $row->coupon_code;
	$data['coupon_type'] = $row->coupon_type;
	$data['coupon_discount'] = $row->coupon_discount;
	$data['total_amount'] = $row->total_amount;
	$data['user_login'] = $row->user_login;
	$data['free_shiping'] = $row->free_shiping;
	// $data['uses_coupon'] = $row->uses_coupon;
	$data['user_coupon'] = $row->user_coupon;
	$data['start_date'] = $row->start_date;
	$data['end_date'] = $row->end_date;
	$data['status'] = $row->status;
	$data['prepay'] = $row->prepay;
	$category= $this->AdminModel->all_fetch('coupon_to_category',array('coupon_id'=>$id));
	    foreach ($category as $key => $value) {
	    $aa[] = $value->category_id;
	    }
	$data['category'] = @$aa;
	$product= $this->AdminModel->all_fetch('coupon_to_product',array('coupon_id'=>$id));
	    foreach ($product as $key => $value) {
	    $bb[] = $value->product_id;
	    }
	$data['product'] = @$bb;
	$data['page_title'] = 'Edit Coupon';
	$data['form_action'] = 'admin/add_coupon/'.$id;
	$data['id'] = $id;
	}else{
	$data['page_title'] = 'Add Coupon';
	$data['form_action'] = 'admin/add_coupon';
	$data['coupon_name'] = '';
	$data['coupon_code'] = '';
	$data['coupon_type'] = '';
	$data['coupon_discount'] = '';
	$data['total_amount'] = '';
	$data['user_login'] = '';
	$data['uses_coupon'] = '';
	$data['user_coupon'] = '';
	$data['free_shiping'] = '';
	$data['start_date'] = '';
	$data['end_date'] ='';
	$data['status'] = '';
	$data['prepay'] = '';
	$data['id'] = '';
	}
	
	
	// $this->form_validation->set_rules('coupon_name','Coupon Name','trim|required|callback_check_coupon_name');
	// $this->form_validation->set_rules('coupon_code','Coupon Code','trim|required|callback_check_coupon_code');
	if ($this->request->getMethod()=='post') {
		
	$rules = [
		'coupon_name'=>['label'=>'Coupon Name','rules'=>'required'],
		'coupon_code'=>['label'=>'Coupon Code','rules'=>'required'],
	];

	if($this->validate($rules)==false) {
	$data['validation'] = $this->validator;
	}
	else{  
	$save['coupon_info']['coupon_name'] = $this->request->getVar('coupon_name');
	$save['coupon_info']['coupon_code'] = $this->request->getVar('coupon_code');
	$save['coupon_info']['coupon_type'] = $this->request->getVar('coupon_type');
	$save['coupon_info']['coupon_discount'] = $this->request->getVar('coupon_discount');
	$save['coupon_info']['user_login'] = $this->request->getVar('user_login');
	$save['coupon_info']['free_shiping'] = $this->request->getVar('free_shiping');
	$save['coupon_info']['start_date'] = $this->request->getVar('start_date');
	$save['coupon_info']['end_date'] = $this->request->getVar('end_date');
	// $save['coupon_info']['uses_coupon'] = $this->request->getVar('uses_coupon');
	$save['coupon_info']['user_coupon'] = $this->request->getVar('user_coupon');
	$save['coupon_info']['status'] = $this->request->getVar('status');
	$save['coupon_info']['prepay'] = $this->request->getVar('prepay');
	$save['product'] = $this->request->getVar('product');
	$save['category'] = $this->request->getVar('category');
	if(!empty($id)){
	$save['id'] = $id;
	$result=$model->insert_coupon($save);
	if($result){
	$this->session->setFlashdata('success','Record Update successfully');
	return redirect()->to('admin/add_coupon/'.$id);
	}else{
	$this->session->setFlashdata('error','Record not update');
	return redirect()->to('admin/add_coupon/'.$id);
	}
	}else{
	$result=$model->insert_coupon($save);
	if($result){
	$this->session->setFlashdata('success','Record insert successfully');
	return redirect()->to('admin/coupon');
	}else{
	$this->session->setFlashdata('error','Record not insert');
	return redirect()->to('admin/add_coupon');
	}
	}
  }
 }
 return view('admin/marketing/add_coupon',$data);
}


function delete_coupon()
{
	if ($this->request->getVar()) {
		$model = new MarketingModel();
	   $id = $this->request->getVar('selected');
	   $model->delete_coupon($id);
	   $this->session->setFlashdata('success','Record Delete successfully');
	}
	return redirect()->to('admin/coupon');
}


}
