<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\DesignModel;


class Design extends BaseController
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


	function index()
	{
	
    $permission = $this->AdminModel->permission($this->request->uri->getSegment(2));
     if(empty($permission)){
	   redirect('admin/permission-denied');
    }
	
		$model = new DesignModel();
		// return $this->asArray()->findAll();
		// return $this->asObject()->findAll();

		$data['page_title']  = 'Pages';
		$data['detail'] = $model->asObject()->findAll();
		return view('admin/design/pages',$data);
	}

	function add_pages($id=false)
	{
		$model = new DesignModel();

   	 if ($id) {
	   $data['page_title'] = ' Edit Page';
	   $data['form_action'] ='admin/add_pages/'.$id;
	   $row = $this->AdminModel->fs('information',array('information_id'=>$id));
	   $data['title'] = $row->title; 
	   $data['slug'] = $row->slug; 
	   $data['description'] = $row->description; 
	   $data['m_title'] = $row->m_title; 
	   $data['m_description'] = $row->m_description; 
	   $data['m_keyword'] = $row->m_keyword; 
	   $data['store'] = $row->store; 
	   $data['bottom'] = $row->bottom; 
	   $data['sort_order'] = $row->sort_order;
	   $data['keyword'] = $row->keyword; 
	   $data['layout_id'] = $row->layout_id;
	   $data['sort_des'] = $row->sort_des;
	   $data['status'] = $row->status;
	   $data['top_image'] = $row->top_image;
	   $data['detail'] = $this->AdminModel->all_fetch('information_faq',array('info_id'=>$id));
		  
	   }else{
	   $data['page_title'] = ' Add Page';
	   $data['form_action'] ='admin/add_pages';
	   $data['title'] = '';
	   $data['slug'] = '';
	   $data['description'] = '';
	   $data['m_title'] = '';
	   $data['m_description'] = '';
	   $data['m_keyword'] = ''; 
	   $data['store'] = '';
	   $data['bottom'] = '';
	   $data['sort_order'] = '';
	   $data['keyword'] = ''; 
	   $data['layout_id'] = '';
	   $data['sort_des'] ='';
	   $data['status'] ='';
	   $data['top_image'] = '';
	   }
   
	  if($this->request->getMethod() == "post"){

	  $rules = [
		'title'=>['label' => 'Title', 'rules' => 'required'],
	    ];

		if ($this->validate($rules) == FALSE)
		{

		$data['validation'] = $this->validator;

	   }else{
		  	 
	   $save= array();
	   $save['id']= '';
	   $save['info']['title'] = $this->request->getVar('title');
	   $save['info']['description'] = $this->request->getVar('description');
	   $save['info']['m_title'] = $this->request->getVar('m_title');
	   $save['info']['m_description'] = $this->request->getVar('m_description');
	   if(!empty($this->request->getVar('keyword'))){
		   $save['info']['slug'] = sfu($this->request->getVar('keyword'));   
	   }else{
			$save['info']['slug'] = sfu($this->request->getVar('title'));
	   }
	   $save['info']['m_keyword'] = $this->request->getVar('m_keyword'); 
	   $save['info']['store'] = $this->request->getVar('store');
	   $save['info']['bottom'] = $this->request->getVar('bottom');
	   $save['info']['sort_order'] = $this->request->getVar('sort_order');
	 
	   $save['info']['layout_id'] = $this->request->getVar('layout_id');
	   $save['info']['sort_des'] = $this->request->getVar('sort_des');
	   $save['info']['status'] = $this->request->getVar('status');
	   $save['question'] = $this->request->getVar('question');
	   $save['answer'] = $this->request->getVar('answer');
	   $save['fsort_order'] = $this->request->getVar('fsort_order');
	   $save['fstatus'] = $this->request->getVar('fstatus');
	  
	   $file = $this->request->getFile('top_image');
	   if(!empty($file->getClientName())){
		if($file->isValid() && !$file->hasMoved()){
			$file_name = $file->getRandomName();
			if($file->move('uploads/images/', $file_name)){
				$save['info']['top_image'] = 'uploads/images/'.$file_name;
			}
		 }else{
			throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
			exit;
		}
	  }
   
	   if ($id) {
	   $save['id']= $id;
	   $save['info']['modify_date'] = date('Y-m-d H:i:s');
	   $result = $model->save_pages($save);
		 if ($result) {
		   $this->session->setFlashdata('success','Record Update successfully');
		   return  redirect()->to('admin/pages');
		 }else{
		   $this->session->setFlashdata('error','Error in Update ');
		   return  redirect()->to('admin/add_pages/'.$id);
		 }
	   }else{
	   $save['info']['modify_date'] = date('Y-m-d H:i:s');
	   $save['info']['create_date'] = date('Y-m-d H:i:s');

	   $result = $model->save_pages($save);
		 if ($result) {
		   $this->session->setFlashdata('success','Record Insert successfully');
		 return  redirect()->to('admin/pages');
		 }else{
		   $this->session->setFlashdata('success','Error Inserting Record');
		   return  redirect()->to('admin/add_pages');
		 }
	   }
   
	}
   }
   // end post
   return view('admin/design/add_pages',$data);
}
   


   function delete_pages()
   {
   
	$array =  $this->request->getVar('selected');

	if (!empty($array)) {
		$model = new DesignModel();
	 foreach ($array as $key => $value) {
	   $model->delete(array('information_id'=>$value));
	   $this->AdminModel->deleteData('information_faq',array('info_id'=>$value));
	 }
	 $this->session->setFlashdata('success','Record Delete successfully');
	 return  redirect()->to('admin/pages');
	}   
   }


//////////////////////

function slider()
 {
     
    $permission = $this->AdminModel->permission($this->uri->getSegment(2));
    if(empty($permission)){
       return  redirect()->to('admin/permission-denied');
    }
    
     $data['page_title']  ='Slider List';
     $data['detail'] = $this->AdminModel->all_fetch('banner',null);
    
    echo view('admin/design/banner',$data);
 }



 function add_slider($id=false)
 {
   $model = new DesignModel(); 
    
  if ($id) {
    $data['page_title'] = ' Edit Slider';
    $data['form_action'] ='admin/add_slider/'.$id;
    $row = $this->AdminModel->fs('banner',array('id'=>$id));
    $data['name'] = $row->name; 
    $data['heading'] = $row->heading; 
    $data['sub_heading'] = $row->sub_heading; 
    $data['slider_link'] = $row->slider_link; 
    $data['detail'] = $this->AdminModel->all_fetch('banner_image',array('banner_id'=>$row->id),'id','asc');
       
    }else{
    $data['page_title'] = ' Add Slider';
    $data['form_action'] ='admin/add_slider';
    $data['name'] = '';
    $data['heading'] = '';
    $data['sub_heading'] = '';
    $data['slider_link'] = '';
    $data['detail'] = array();
   
    }

 
	if($this->request->getMethod()=='post'){

	$rules =[
		'name'=>'required'
	];

    if ($this->validate($rules)==false) {

		$data['validation'] = $this->validator;
     } else{
  
    $save= array();
    $save['info']['name'] = $this->request->getVar('name');
    $save['info']['heading'] = $this->request->getVar('heading');
    $save['info']['sub_heading'] = $this->request->getVar('sub_heading');
    $save['info']['slider_link'] = $this->request->getVar('slider_link');
       
      $uploadImgData = array();
	  if ($this->request->getFileMultiple('image')) {
		foreach($this->request->getFileMultiple('image') as $key => $file)
	   {  
		   if($file->isValid() && !$file->hasMoved()){
		   $file_name = $file->getRandomName();
		   if($file->move('uploads/product/', $file_name)){
			   $uploadImgData[$key] = 'uploads/product/'.$file_name;
		   }	 
		 }
	   }
     }
                 
        
    $save['image'] = @$uploadImgData;
    $save['old_image'] = $this->request->getVar('old_image');

    $save['title'] = $this->request->getVar('title'); 
    $save['link'] = $this->request->getVar('link');
    $save['sort_order'] = $this->request->getVar('sort_order');   

    if ($id) {
    $save['id'] = $id;
    $result = $model->save_banner($save);
      if ($result) {
        $this->session->setFlashdata('success','Record Update successfully');
        return redirect()->to('admin/add_slider/'.$id);
      }else{
        $this->session->setFlashdata('error','Error in Update ');
        return redirect()->to('admin/add_slider/'.$id);
      }
    }else{
     $save['id'] = '';
      $result = $model->save_banner($save);
      if ($result) {
        $this->session->setFlashdata('success','Record Insert successfully');
        return redirect()->to('admin/slider');
      }else{
        $this->session->setFlashdata('success','Record not inserted');
         return redirect()->to('admin/add_slider');
      }
    }

   }
 }
  return view('admin/design/add_banner',$data);
}


function delete_slider()
{

 $array =  $this->request->getVar('selected');
if (!empty($array)) {
  
  foreach ($array as $key => $value) {
    $this->AdminModel->deleteData('banner',array('id'=>$value));
    $this->AdminModel->deleteData('banner_image',array('banner_id'=>$value));
  }
  $this->session->setFlashdata('success','Record Delete successfully');
   return   redirect()->to('admin/slider');
 }   
}





}
