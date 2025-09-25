<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\CmsModel;
use App\Models\CommonModel;
use App\Models\BlogModel;

class Cms extends BaseController
{

		
	public function __construct()
	{

	   $session = \Config\Services::session();
		if(empty($session->get('adminLogin'))) {
		   return redirect()->to('admin/login'); 
		}
		
		$this->admin_id = $session->get('adminLogin');
		$AdminModel = new CommonModel();
        $default_img = $AdminModel->fs('setting',array('key'=>'config_logo'));
        $this->config_logo = $default_img->value;     
	}



	public function index()
	{
		//
	}



// ADDDRESS


	function address(){
		$permission = $this->AdminModel->permission($this->uri->getSegment(2));
		if(empty($permission)){
			return redirect()->to('admin/permission-denied');
		}
		  $data['page_title'] = 'Heading';
		  $data['detail'] = $this->AdminModel->all_fetch('contact_address',null);
		  echo view('admin/cms/address',$data);
		}


		function add_address($id=false)
		{  
		 if(@$id) {  
		   $data['page_title'] = 'Edit Heading';
		   $data['form_action'] ='admin/add_address/'.$id;
		   $row = $this->AdminModel->fs('contact_address',array('id'=>$id));
		   $data['address'] = $row->address;
		   $data['title'] = $row->title;
		   $data['map'] = $row->map;
		   $data['sort_order'] = $row->sort_order;    
		   $data['status'] = $row->status;     
		   }else{
		   $data['page_title'] = 'Add Heading';
		   $data['form_action'] ='admin/add_address';
		   $data['address'] = '';
		   $data['map'] = '';
		   $data['sort_order'] = '';    
		   $data['status'] = '';
		   $data['title'] = '';
		   
		   }
		 		   
		   if($this->request->getMethod()=='post'){

			$rules = [
				'title' =>'required',
			];

		   if ($this->validate($rules)==false) {
			  
			   $data['validation'] = $this->validator;
			} else{
			 $save= array();
			 $save['title'] =     $this->request->getVar('title');
			 $save['address'] =     $this->request->getVar('address');
			 $save['map'] =     htmlspecialchars_decode($this->request->getVar('map'));
			 $save['sort_order'] =     $this->request->getVar('sort_order');
			 $save['status'] =     $this->request->getVar('status');
			 if ($id) {
				 $save['modify_date'] = date('Y-m-d H:i:s');
				 $result=  $this->AdminModel->updateData('contact_address',$save,array('id'=>$id));
				 if ($result) {
			   
				 $this->session->setFlashdata('success','Record Update successfully');
				 return redirect()->to('admin/add_address/'.$id);
				 }else{
				 $this->session->setFlashdata('error','Record not update');
				 return redirect()->to('admin/add_address/'.$id);
				 }
			 }else{
				$save['create_date'] = date('Y-m-d H:i:s');
				$save['modify_date'] = date('Y-m-d H:i:s');
				$result=  $this->AdminModel->insertData('contact_address',$save);
				 if ($result) {
				
				 $this->session->setFlashdata('success','Record insert successfully');
				 return redirect()->to('admin/address');
				 }else{
				 $this->session->setFlashdata('error','Record not insert');
				 return redirect()->to('admin/add_address');
				 }
			 }
		  }
	   }
	  return view('admin/cms/add_address',$data);
	}



	   function delete_address()
	   {
		   $model = new CmsModel();
		   if ($this->request->getVar()) {
			 $id = $this->request->getVar('selected');
			 $check = $model->delete_address($id);
			if ($check) {
			  $this->session->setFlashdata('success','Record Delete successfully');
			}else{
			 $this->session->setFlashdata('error','');
			}
		   }
		return  redirect()->to('admin/address');
	   }

/////////////////////////

  function upload_image()
	 {
		$file = $this->request->getFile('image');
		if(!empty($file->getClientName())){
			if($file->isValid() && !$file->hasMoved()){
				$file_name = $file->getRandomName();
				if($file->move('uploads/images/', $file_name)){
					$image =  base_url().'/uploads/images/'.$file_name;
				}
			}else{
				throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
				exit;
			}
		   echo $image;	
		}
	}
		
////////////////

function banner(){
    
	$permission = $this->AdminModel->permission($this->uri->getSegment(2));
	if(empty($permission)){
		return redirect()->to('admin/permission-denied');
	}
	
	$data['page_title'] = 'Banner - Home page';
	$data['config_logo'] = $this->config_logo;
	$data['banner'] = $this->AdminModel->all_fetch('home_banner',null);
	echo view('admin/cms/banner',$data);
	}
	
	function add_banner($id=false)
	{    
	if(@$id) {
	$data['page_title'] = ' Edit Banner';
	$data['form_action'] ='admin/add_banner/'.$id;
	$row = $this->AdminModel->fs('home_banner',array('id'=>$id));
	$data['title'] = $row->title;
	$data['subtitle'] = $row->subtitle;
	$data['content'] = $row->content;
	$data['status'] = $row->status;
	$data['image'] = $row->image; 
	$data['p_link'] = $row->p_link; 
	$data['sort_order'] = $row->sort_order; 
	}else{
	$data['page_title'] = ' Add Banner';
	$data['form_action'] ='admin/add_banner';
	$data['title'] = '';
	$data['subtitle'] = '';
	$data['content'] = '';
	$data['status'] = '';
	$data['image'] =  '';
	$data['p_link'] =  '';
	$data['sort_order'] = '';
	}
	// $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
	// $this->form_validation->set_rules('status','Status','trim|required'); 

	if($this->request->getMethod()=='post'){
		
	$rules = [
		'status'=>'required'
	];


	if ($this->validate($rules)==false) {
		$data['validation'] = $this->validator;
	
	} else{

	$save= array();
	$save['title'] = $this->request->getVar('title');
	$save['p_link'] = $this->request->getVar('p_link');
	$save['subtitle'] = $this->request->getVar('subtitle');
	$save['content'] = $this->request->getVar('content');
	$save['status'] = $this->request->getVar('status');
	$save['sort_order'] = $this->request->getVar('sort_order');
	$file = $this->request->getFile('image');
	if(!empty($file->getClientName())){
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
		$save['modify_date'] = date('Y-m-d H:i:s');
		$result=  $this->AdminModel->updateData('home_banner',$save,array('id'=>$id));
		if ($result) {
		$this->session->setFlashdata('success','Record Update successfully');
		return redirect()->to('admin/add_banner/'.$id);
		}else{
		$this->session->setFlashdata('error','Record not update');
		return redirect()->to('admin/add_banner/'.$id);
		}
	}else{

		$save['create_date'] = date('Y-m-d H:i:s');
		$save['modify_date'] = date('Y-m-d H:i:s');
		$result=  $this->AdminModel->insertData('home_banner',$save);
		if ($result) {
		$this->session->setFlashdata('success','Record insert successfully');
		return redirect()->to('admin/banner');
		}else{
		$this->session->setFlashdata('error','Record not insert');
		return redirect()->to('admin/add_banner');
		}
	  }
	}
   }	

     return  view('admin/cms/add_banner',$data);

  }


	function delete_banner()
	{
	$model = new CommonModel();		
	if ($this->request->getVar()){
	$id = $this->request->getVar('selected');
	if ($id) {
	foreach($id as $value){
		$model->deleteData('home_banner',array('id'=>$value));
	}	
	$this->session->setFlashdata('success','Record Delete successfully');
	}else{
	$this->session->setFlashdata('error','');
	}
	}
	return redirect()->to('admin/banner');
	}


//////////////////////



function flip(){
    
	$permission = $this->AdminModel->permission($this->uri->getSegment(2));
	if(empty($permission)){
		return redirect()->to('admin/permission-denied');
	}
	
	$data['page_title'] = 'Flip Article ';
	$data['config_logo'] = $this->config_logo;
	$data['result'] = $this->AdminModel->all_fetch('home_flip',null);
	echo view('admin/cms/flip',$data);
	}
	
	function add_flip($id=false)
	{    
	if(@$id) {
	$data['page_title'] = ' Edit flip';
	$data['form_action'] ='admin/add_flip/'.$id;
	$row = $this->AdminModel->fs('home_flip',array('id'=>$id));
	$data['title'] = $row->title;
	$data['subtitle'] = $row->subtitle;
	$data['btitle'] = $row->btitle;
	$data['bsubtitle'] = $row->bsubtitle;
	$data['bimage'] = $row->bimage;
	$data['status'] = $row->status;
	$data['image'] = $row->image; 
	$data['sort_order'] = $row->sort_order; 
	}else{
	$data['page_title'] = ' Add flip';
	$data['form_action'] ='admin/add_flip';
	$data['title'] = '';
	$data['subtitle'] = '';
	$data['btitle'] = '';
	$data['bsubtitle'] = '';
	$data['bimage'] = '';
	$data['status'] = '';
	$data['image'] =  '';
	$data['p_link'] =  '';
	$data['sort_order'] = '';
	}
	// $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
	// $this->form_validation->set_rules('status','Status','trim|required'); 

	if($this->request->getMethod()=='post'){
		
	$rules = [
		'title'=>'required'
	];


	if ($this->validate($rules)==false) {
		$data['validation'] = $this->validator;
	
	} else{

	$save= array();
	$save['title'] = $this->request->getVar('title');
	$save['subtitle'] = $this->request->getVar('subtitle');
	$save['status'] = $this->request->getVar('status');
	$save['sort_order'] = $this->request->getVar('sort_order');
	
	$save['btitle'] = $this->request->getVar('btitle');
	$save['bsubtitle'] = $this->request->getVar('bsubtitle');
	$save['bimage'] = $this->request->getVar('bimage');
	
	
	$file = $this->request->getFile('image');
	if(!empty($_FILES['image']['name'])){
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

    $file = $this->request->getFile('bimage');
	if(!empty($_FILES['bimage']['name'])){
		if($file->isValid() && !$file->hasMoved()){
			$file_name = $file->getRandomName();
			if($file->move('uploads/images/', $file_name)){
				$save['bimage'] = 'uploads/images/'.$file_name;
			}
		}else{
			throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
			exit;
		}
	}



	if ($id) {
		$save['modify_date'] = date('Y-m-d H:i:s');
		$result=  $this->AdminModel->updateData('home_flip',$save,array('id'=>$id));
		if ($result) {
		$this->session->setFlashdata('success','Record Update successfully');
		return redirect()->to('admin/add_flip/'.$id);
		}else{
		$this->session->setFlashdata('error','Record not update');
		return redirect()->to('admin/add_flip/'.$id);
		}
	}else{

		$save['create_date'] = date('Y-m-d H:i:s');
		$save['modify_date'] = date('Y-m-d H:i:s');
		$result=  $this->AdminModel->insertData('home_flip',$save);
		if ($result) {
		$this->session->setFlashdata('success','Record insert successfully');
		return redirect()->to('admin/flip');
		}else{
		$this->session->setFlashdata('error','Record not insert');
		return redirect()->to('admin/add_flip');
		}
	  }
	}
   }	

     return  view('admin/cms/add_flip',$data);

  }


	function delete_flip()
	{
	$model = new CommonModel();		
	if ($this->request->getVar()){
	$id = $this->request->getVar('selected');
	if ($id) {
	foreach($id as $value){
		$model->deleteData('home_flip',array('id'=>$value));
	}	
	$this->session->setFlashdata('success','Record Delete successfully');
	}else{
	$this->session->setFlashdata('error','');
	}
	}
	return redirect()->to('admin/flip');
	}

///////////////


function testimonial(){
	$permission = $this->AdminModel->permission($this->uri->getSegment(2));
	if(empty($permission)){
		return redirect()->to('admin/permission-denied');
	}   
		
	$data['page_title'] = 'Testimonial';
	$data['testimonial'] = $this->AdminModel->all_fetch('testimonial',null);
	echo view('admin/cms/manage_testimonial',$data);
	}


	function add_testimonial($id=false)
	{    
	if(!empty($id)) {
	$data['page_title'] = ' Edit Testimonial';
	$data['form_action'] ='admin/add_testimonial/'.$id;
	$row = $this->AdminModel->fs('testimonial',array('id'=>$id));
	$data['image'] = $row->image; 
	$data['name'] = $row->name;
	$data['designation'] = $row->designation;
	$data['description'] = $row->description;
	$data['sort_order'] = $row->sort_order;
	$data['url_link'] = $row->url_link; 
	$data['status'] = $row->status;    
	}else{
	$data['page_title'] = ' Add Testimonial';
	$data['form_action'] ='admin/add_testimonial';
	$data['image'] = ''; 
	$data['name'] = '';
	$data['designation'] = '';
	$data['description'] = '';
	$data['sort_order'] = '';
	$data['url_link'] = ''; 
	$data['status'] = '';
	}
	
	if($this->request->getMethod()=='post'){
		
		$rules = [
			'status'=>'required'
		];
	
	 if ($this->validate($rules)==false) {
			$data['validation'] = $this->validator;
		
	} else{
	
	$save= array();
	$save['name'] = $this->request->getVar('name');
	$save['url_link'] = $this->request->getVar('url_link');
	$save['designation'] = $this->request->getVar('designation');
	$save['description'] = $this->request->getVar('description');
	$save['sort_order'] = $this->request->getVar('sort_order');
	$save['status'] = $this->request->getVar('status');
	
		
	$file = $this->request->getFile('image');
	if(!empty($file->getClientName())){
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
		$save['modify_date'] = date('Y-m-d H:i:s');
		$result=  $this->AdminModel->updateData('testimonial',$save,array('id'=>$id));
		if ($result) {
		$this->session->setFlashdata('success','Record Update successfully');
		return redirect()->to('admin/add_testimonial/'.$id);
		}else{
		$this->session->setFlashdata('error','Record not update');
		return redirect()->to('admin/add_testimonial/'.$id);
		}
	}else{
		$save['create_date'] = date('Y-m-d H:i:s');
		$save['modify_date'] = date('Y-m-d H:i:s');
		$result=  $this->AdminModel->insertData('testimonial',$save);
		if ($result) {
		$this->session->setFlashdata('success','Record insert successfully');
		return redirect()->to('admin/testimonial');
		}else{
		$this->session->setFlashdata('error','Record not insert');
		return redirect()->to('admin/add_testimonial');
		}
		}
	  }
    }
   return view('admin/cms/add_testimonial',$data);
}

	function delete_testimonial()
	{
	if ($this->request->getVar()) {
	$id = $this->request->getVar('selected');
	if ($id) {
		foreach($id as $value){
			$this->AdminModel->deleteData('testimonial',array('id'=>$value));
		}
	$this->session->setFlashdata('success','Record Delete successfully');
	}else{
	$this->session->setFlashdata('error','');
	}
	}
	return redirect()->to('admin/testimonial');
	}

	//////////////

	function manage_logo(){
    
		$permission = $this->AdminModel->permission($this->uri->getSegment(2));
		if(empty($permission)){
	     return redirect()->to('admin/permission-denied');
		}    
			
		$data['page_title'] = 'Client Logo';
		$data['logo'] = $this->AdminModel->all_fetch('client_logo',null);
		$data['config_logo'] = $this->config_logo;
		echo view('admin/cms/manage_logo',$data);
		}


		function add_logo($id=false)
		{    
		if(@$id) {
		$data['page_title'] = ' Edit Logo';
		$data['form_action'] ='admin/add_logo/'.$id;
		$row = $this->AdminModel->fs('client_logo',array('id'=>$id));
		$data['status'] = $row->status;
		$data['title'] = $row->title;
		$data['image'] = $row->image;  
		$data['link'] = $row->link;  
		}else{
		$data['page_title'] = ' Add Logo';
		$data['form_action'] ='admin/add_logo';
		$data['title'] = '';
		$data['status'] = '';
		$data['image'] =  '';
		$data['link'] = ''; 
		}
			
		if($this->request->getMethod()=='post'){
			$rules = [
				'status'=>'required'
			];
		
			if ($this->validate($rules)==false) {
				$data['validation'] = $this->validator;
		} else{

		$save= array();
		$save['title'] = $this->request->getVar('title');
		$save['status'] = $this->request->getVar('status');
		$save['link'] = $this->request->getVar('link');
	
	  $file = $this->request->getFile('image');
	   if(!empty($file->getClientName())){
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

			$save['modify_date'] = date('Y-m-d H:i:s');
			$result=  $this->AdminModel->updateData('client_logo',$save,array('id'=>$id));
			if ($result) {
			$this->session->setFlashdata('success','Record Update successfully');
			return redirect()->to('admin/add_logo/'.$id);
			}else{
			$this->session->setFlashdata('error','Record not update');
			return redirect()->to('admin/add_logo/'.$id);
			}

		}else{

			$save['create_date'] = date('Y-m-d H:i:s');
			$save['modify_date'] = date('Y-m-d H:i:s');
			$result=  $this->AdminModel->insertData('client_logo',$save);
			if ($result) {
			$this->session->setFlashdata('success','Record insert successfully');
			return redirect()->to('admin/manage_logo');
			}else{
				$this->session->setFlashdata('error','Record not insert');
				return redirect()->to('admin/add_logo');
				}
			}
		 }
	 }
	  return view('admin/cms/add_logo',$data);
	}

	
	function delete_logo()
		{
		if ($this->request->getVar()) {
		$id = $this->request->getVar('selected');
		if ($id) {
			foreach($id as $value){
			$this->AdminModel->deleteData('client_logo',array('id'=>$value));
		   }
		 $this->session->setFlashdata('success','Record Delete successfully');
		}else{
		  $this->session->setFlashdata('error','');
		}
	  }
	  return redirect()->to('admin/manage_logo');
	}

///////////////////////


function photos(){

	$permission = $this->AdminModel->permission($this->uri->getSegment(2));
	if(empty($permission)){
		return redirect()->to('admin/permission-denied');
	} 
	  $type_list = array('1'=>'photos','2'=>'About Levan Living','3'=>'Covered Industries');
	  foreach($type_list as $key => $value){
		 $typeid[$key]=$value;
	  }
	  $data['type_list'] = $typeid;
	  $data['page_title'] = 'About Photos';
	  $data['detail'] = $this->AdminModel->all_fetch('about_photo',null);
	 
	  echo view('admin/cms/photos',$data);
	}
	  
	 
	
	function add_photos($id=false)
	 {
		$data['type_list'] = array('1'=>'photos','2'=>'About Levan Living','3'=>'Covered Industries');
	 
	  if(@$id) {
		
		$data['page_title'] = ' Edit Photo';
		$data['form_action'] ='admin/add_photos/'.$id;
		$row = $this->AdminModel->fs('about_photo',array('id'=>$id));
		$data['photo'] =  $row->photo;   
		$data['sort_order'] = $row->sort_order;  
		$data['status'] = $row->status;
		$data['type'] = $row->type;
		$data['title'] = $row->title;  
			 
		}else{
		  $data['page_title'] = ' Add Photo';
		  $data['form_action'] ='admin/add_photos';
		  $data['photo'] =  '';   
		  $data['sort_order'] =  ''; 
		  $data['status'] =  '';
		  $data['type'] = '';
		  $data['title'] = '';
		}
		
		if($this->request->getMethod()=='post'){
		    
			$rules = [
				'sort_order'=>'required'
			];
		
		 if ($this->validate($rules)==false) {
				$data['validation'] = $this->validator;
		  } else{
		  $save= array();
		  $save['sort_order'] =     $this->request->getVar('sort_order');
		  $save['status'] =     $this->request->getVar('status');
		  $save['type'] =     $this->request->getVar('type');		 
		  $save['title'] =     $this->request->getVar('title');
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
			  $save['id'] =  $id;
			  $save['modify_date'] = date('Y-m-d H:i:s');
			  $result=  $this->AdminModel->updateData('about_photo',$save,array('id'=>$id));
			  if ($result) {
			  $this->session->setFlashdata('success','Record Update successfully');
			  return redirect()->to('admin/photos');
			  }else{
			  $this->session->setFlashdata('error','Record not update');
			  return redirect()->to('admin/add_photos/'.$id);
			  }
		  }else{
	
			 $save['create_date'] = date('Y-m-d H:i:s');
			 $save['modify_date'] = date('Y-m-d H:i:s');
			 $result=  $this->AdminModel->insertData('about_photo',$save);
			  if ($result) {
			 
			  $this->session->setFlashdata('success','Record insert successfully');
			  return redirect()->to('admin/photos');
			  }else{
			  $this->session->setFlashdata('error','Record not insert');
			  return redirect()->to('admin/add_photos');
			  }
	
		    }
	
	      }
		}
		return view('admin/cms/add_photos',$data);
	
	}
	
	function delete_photo(){
	  if ($this->request->getVar()) {
		  $id = $this->request->getVar('selected');
		 if ($id) {
			foreach($id as $value){
				$this->AdminModel->deleteData('about_photo',array('id'=>$value));
			   }
		   $this->session->setFlashdata('success','Record Delete successfully');
		 }else{
		  $this->session->setFlashdata('error','');
		 }
		 
		}
		 
	  return redirect()->to('admin/photos');
	}

//////////////////////


function heading(){
	$permission = $this->AdminModel->permission($this->uri->getSegment(2));
	if(empty($permission)){
		return redirect()->to('admin/permission-denied');
	}
	  $data['page_title'] = 'About Heading';
	  $data['detail'] = $this->AdminModel->all_fetch('about_heading',null);
	  echo view('admin/cms/about_heading',$data);
	}
	  
	 
	
	function add_heading($id=false)
	 {
	
	 
	  if(@$id) {
		
		$data['page_title'] = ' Edit Heading';
		$data['form_action'] ='admin/add_heading/'.$id;
		$row = $this->AdminModel->fs('about_heading',array('id'=>$id));
	
		$data['heading'] =  $row->heading; 
		$data['description'] = $row->description;
 		$data['vtitle'] = $row->vtitle; 
		$data['heading1'] = $row->heading1; 
		$data['oheading'] = $row->oheading;  
		$data['odescription'] =  $row->odescription; 
		$data['wheading'] =  $row->wheading;
		$data['wdescription'] =  $row->wdescription;
        $data['mheading'] =  $row->mheading;
        $data['cheading'] =  $row->cheading;
		$data['status'] =  $row->status; 
		$data['video'] =  $row->video;  
		$data['oimage'] =  $row->oimage; 
		$data['wimage'] =  $row->wimage; 
        $data['thumbnail'] =  $row->thumbnail; 
		  
		}else{
		
		$data['page_title'] = ' Add Heading';
		$data['form_action'] ='admin/add_heading';
		$data['heading'] = '';
		$data['description'] = '';
 		$data['vtitle'] = '';
		$data['heading1'] = '';
		$data['oheading'] = ''; 
		$data['odescription'] = ''; 
		$data['wheading'] = '';
		$data['wdescription'] = '';
        $data['mheading'] = '';
        $data['cheading'] = '';
		$data['status'] = ''; 
		$data['video'] = '';
		$data['oimage'] = ''; 
		$data['wimage'] = '';
        $data['thumbnail'] =  '';
		}


		if($this->request->getMethod()=='post'){
		    
			$rules = [
				'heading'=>'required'
			];
		
		 if ($this->validate($rules)==false) {
				$data['validation'] = $this->validator;
		  } else{
			
		$save= array();
		$save['heading'] = $this->request->getVar('heading');
		$save['description'] = $this->request->getVar('description');
 		$save['vtitle'] =   $this->request->getVar('vtitle');
		$save['heading1'] = $this->request->getVar('heading1');
		$save['oheading'] = $this->request->getVar('oheading'); 
		$save['odescription'] = $this->request->getVar('odescription'); 
		$save['wheading'] = $this->request->getVar('wheading');
		$save['wdescription'] = $this->request->getVar('wdescription');
        $save['mheading'] = $this->request->getVar('mheading');
        $save['cheading'] = $this->request->getVar('cheading');
		$save['status'] =  $this->request->getVar('status'); 
	  
				 
		  $file = $this->request->getFile('video');
		  if(!empty($_FILES['video']['name'])){
		   if($file->isValid() && !$file->hasMoved()){
			   $file_name = $file->getRandomName();
			   if($file->move('uploads/images/', $file_name)){
				   $save['video'] = 'uploads/images/'.$file_name;
			   }
			}else{
			   throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
			   exit;
		   }
		 }

	   $file = $this->request->getFile('oimage');
	   if(!empty($_FILES['oimage']['name'])){
		if($file->isValid() && !$file->hasMoved()){
			$file_name = $file->getRandomName();
			if($file->move('uploads/images/', $file_name)){
				$save['oimage'] = 'uploads/images/'.$file_name;
			}
		 }else{
			throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
			exit;
		}
	   }

	   $file = $this->request->getFile('wimage');
	   if(!empty($_FILES['wimage']['name'])){
		if($file->isValid() && !$file->hasMoved()){
			$file_name = $file->getRandomName();
			if($file->move('uploads/images/', $file_name)){
				$save['wimage'] = 'uploads/images/'.$file_name;
			}
		 }else{
			throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
			exit;
		}
	   }

	   $file = $this->request->getFile('thumbnail');
	   if(!empty($_FILES['thumbnail']['name'])){
		if($file->isValid() && !$file->hasMoved()){
			$file_name = $file->getRandomName();
			if($file->move('uploads/images/', $file_name)){
				$save['thumbnail'] = 'uploads/images/'.$file_name;
			}
		 }else{
			throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
			exit;
		}
	   }
	 
		  if ($id) {
			  $save['id'] =  $id;
			  $save['modify_date'] = date('Y-m-d H:i:s');
			  $result=  $this->AdminModel->updateData('about_heading',$save,array('id'=>$id));
			  if ($result) {
			  $this->session->setFlashdata('success','Record Update successfully');
			  return redirect()->to('admin/add_heading/'.$id);
			  }else{
			  $this->session->setFlashdata('error','Record not update');
			  return redirect()->to('admin/add_heading/'.$id);
			  }
		  }else{
	
			 $save['create_date'] = date('Y-m-d H:i:s');
			 $save['modify_date'] = date('Y-m-d H:i:s');
			 $result=  $this->AdminModel->insertData('about_heading',$save);
			  if ($result) {
			 
			  $this->session->setFlashdata('success','Record insert successfully');
			  return redirect()->to('admin/heading');
			  }else{
			  $this->session->setFlashdata('error','Record not insert');
			  return redirect()->to('admin/add_heading');
			  }
	
		  }
	
	   }
	 }
	return view('admin/cms/add_heading',$data);

	}
	

	function delete_heading(){
	  if ($this->request->getVar()) {
		  $id = $this->request->getVar('selected');
		 if ($id) {
			foreach($id as $value){
				$this->AdminModel->deleteData('about_heading',array('id'=>$value));
			   }
		   $this->session->setFlashdata('success','Record Delete successfully');
		 }else{
		  $this->session->setFlashdata('error','');
		 }
		}
	  return redirect()->to('admin/heading');
	}
	
///////////////////////////////////

function home_heading(){
	$permission = $this->AdminModel->permission($this->uri->getSegment(2));
	if(empty($permission)){
		return redirect()->to('admin/permission-denied');
	}
	  $data['page_title'] = 'Home Heading';
	  $data['detail'] = $this->AdminModel->all_fetch('home_heading',null);
	  echo view('admin/cms/home_heading',$data);
	}
	  
	 
	
	function add_home_heading($id=false)
	 {
	
	 
	  if(@$id) {
		
		$data['page_title'] = ' Edit Heading';
		$data['form_action'] ='admin/add_home_heading/'.$id;
		$row = $this->AdminModel->fs('home_heading',array('id'=>$id));
	
		$data['heading'] =  $row->heading; 
		$data['step1title'] =  $row->step1title;    
		$data['step1des'] =  $row->step1des;   
		$data['step2title'] = $row->step2title; 
		$data['step2des'] = $row->step2des; 
		$data['step3title'] = $row->step3title;  
		$data['step3des'] = $row->step3des;
		$data['heading2'] =  $row->heading2;
		$data['heading3'] =  $row->heading3;  
		$data['heading4'] =  $row->heading4;
		$data['heading5'] =  $row->heading5;
        $data['icon1'] =  $row->icon1;
		$data['icon2'] =  $row->icon2;
		$data['icon3'] =  $row->icon3;
		$data['side_image'] =  $row->side_image;
		$data['smart_heading'] =  $row->smart_heading; 
		$data['smart_des'] =  $row->smart_des; 
		$data['cv1'] =  $row->cv1; 
		$data['ch1'] =  $row->ch1; 
		$data['cv2'] = $row->cv2;  
		$data['ch2'] = $row->ch2;
		$data['cv3'] = $row->cv3; 
		$data['ch3'] = $row->ch3; 
		$data['sup_heading'] = $row->sup_heading; 
		$data['sup_sub_heading'] = $row->sup_sub_heading; 
		$data['sup_des'] = $row->sup_des; 
		$data['sup_image'] = $row->sup_image; 
		$data['link'] = $row->link; 
		$data['blog_heading'] = $row->blog_heading; 
		$data['news_heading'] = $row->news_heading;
		$data['news_sub_heading'] = $row->news_sub_heading; 
		$data['news_image'] = $row->news_image; 
		$data['status'] = $row->status; 
		
        $data['t_heading'] = $row->t_heading; 
        $data['t_sub_heading'] = $row->t_sub_heading; 
        $data['btn_name'] = $row->btn_name; 
        $data['btn_link'] = $row->btn_link; 
        $data['icon4'] = $row->icon4; 
        $data['step4title'] = $row->step4title; 
        $data['icon5'] = $row->icon5; 
        $data['step5title'] = $row->step5title;
        $data['icon6'] = $row->icon6; 
        $data['step6title'] = $row->step6title;
        
        $data['india_heading'] = $row->india_heading;
        $data['india_des'] = $row->india_des;

		}else{
		
		$data['page_title'] = ' Add Heading';
		$data['form_action'] ='admin/add_home_heading';
		$data['heading'] =  '';
		$data['step1title'] =  '';   
		$data['step1des'] =  '';
		$data['step2title'] =  '';
		$data['step2des'] = '';
		$data['step3title'] =  '';
		$data['step3des'] = '';
		$data['heading2'] =  '';
		$data['heading3'] =  '';
		$data['heading4'] =  '';
		$data['heading5'] = '';
		$data['smart_heading'] =  ''; 
		$data['smart_des'] = '';
		$data['cv1'] =  '';
		$data['ch1'] =  '';
		$data['cv2'] ='';
		$data['ch2'] = '';
		$data['cv3'] = '';
		$data['ch3'] = '';
		$data['sup_heading'] ='';
		$data['sup_sub_heading'] = '';
		$data['sup_des'] =  '';
		$data['link'] = '';
		$data['blog_heading'] = '';
		$data['news_heading'] = '';
		$data['news_sub_heading'] = '';
		$data['status'] = '';


		$data['icon1'] =  '';
		$data['icon2'] =  '';
		$data['icon3'] =  '';
		$data['side_image'] =  '';
		$data['sup_image'] =  '';
		$data['news_image'] ='';
		
		$data['t_heading'] = '';
        $data['t_sub_heading'] = '';
        $data['btn_name'] = ''; 
        $data['btn_link'] = '';
        $data['icon4'] = '';
        $data['step4title'] = ''; 
		$data['icon5'] = ''; 
        $data['step5title'] = '';
        $data['icon6'] = '';
        $data['step6title'] = '';
		         
        $data['india_heading'] = '';
        $data['india_des'] = '';

		}


		if($this->request->getMethod()=='post'){
		    
			$rules = [
				'heading'=>'required'
			];
		
		 if ($this->validate($rules)==false) {
				$data['validation'] = $this->validator;
		  } else{
			
		  $save= array();
		

		$save['heading'] =   $this->request->getVar('heading');
		$save['step1title'] =   $this->request->getVar('step1title');   
		$save['step1des'] =   $this->request->getVar('step1des');
		$save['step2title'] =   $this->request->getVar('step2title');
		$save['step2des'] =  $this->request->getVar('step2des');
		$save['step3title'] =   $this->request->getVar('step3title');
		$save['step3des'] =  $this->request->getVar('step3des');
		$save['heading2'] =   $this->request->getVar('heading2');
		$save['heading3'] =   $this->request->getVar('heading3');
		$save['heading4'] =   $this->request->getVar('heading4');
		$save['heading5'] =  $this->request->getVar('heading5');
		$save['smart_heading'] =   $this->request->getVar('smart_heading'); 
		$save['smart_des'] =  $this->request->getVar('smart_des');
		$save['cv1'] =   $this->request->getVar('cv1');
		$save['ch1'] =   $this->request->getVar('ch1');
		$save['cv2'] = $this->request->getVar('cv2');
		$save['ch2'] =  $this->request->getVar('ch2');
		$save['cv3'] =  $this->request->getVar('cv3');
		$save['ch3'] =  $this->request->getVar('ch3');
		$save['sup_heading'] = $this->request->getVar('sup_heading');
		$save['sup_sub_heading'] =  $this->request->getVar('sup_sub_heading');
		$save['sup_des'] =   $this->request->getVar('sup_des');
		$save['link'] =  $this->request->getVar('link');
		$save['blog_heading'] =  $this->request->getVar('blog_heading');
		$save['news_heading'] =  $this->request->getVar('news_heading');
		$save['news_sub_heading'] =  $this->request->getVar('news_sub_heading');
		$save['status'] =  $this->request->getVar('status');


    	$save['t_heading'] = $this->request->getVar('t_heading');
        $save['t_sub_heading'] = $this->request->getVar('t_sub_heading');
        $save['btn_name'] = $this->request->getVar('btn_name');
        $save['btn_link'] = $this->request->getVar('btn_link');

        $save['step4title'] = $this->request->getVar('step4title');
        $save['step5title'] = $this->request->getVar('step5title');
        $save['step6title'] = $this->request->getVar('step6title');
        $save['india_heading'] = $this->request->getVar('india_heading');
       $save['india_des'] = $this->request->getVar('india_des');
	  
	
		  $file = $this->request->getFile('icon1');
		  if(!empty($_FILES['icon1']['name'])){
		   if($file->isValid() && !$file->hasMoved()){
			   $file_name = $file->getRandomName();
			   if($file->move('uploads/images/', $file_name)){
				   $save['icon1'] = 'uploads/images/'.$file_name;
			   }
			}else{
			   throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
			   exit;
		   }
		 }

	    $file = $this->request->getFile('icon2');
		  if(!empty($_FILES['icon2']['name'])){
		   if($file->isValid() && !$file->hasMoved()){
			   $file_name = $file->getRandomName();
			   if($file->move('uploads/images/', $file_name)){
				   $save['icon2'] = 'uploads/images/'.$file_name;
			   }
			}else{
			   throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
			   exit;
		   }
		 }

		   $file = $this->request->getFile('icon3');
		  if(!empty($_FILES['icon3']['name'])){
		   if($file->isValid() && !$file->hasMoved()){
			   $file_name = $file->getRandomName();
			   if($file->move('uploads/images/', $file_name)){
				   $save['icon3'] = 'uploads/images/'.$file_name;
			   }
			}else{
			   throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
			   exit;
		   }
		 }

    	  $file = $this->request->getFile('icon4');
		  if(!empty($_FILES['icon4']['name'])){
		   if($file->isValid() && !$file->hasMoved()){
			   $file_name = $file->getRandomName();
			   if($file->move('uploads/images/', $file_name)){
				   $save['icon4'] = 'uploads/images/'.$file_name;
			   }
			}else{
			   throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
			   exit;
		   }
		 }
		 
    	  $file = $this->request->getFile('icon5');
		  if(!empty($_FILES['icon5']['name'])){
		   if($file->isValid() && !$file->hasMoved()){
			   $file_name = $file->getRandomName();
			   if($file->move('uploads/images/', $file_name)){
				   $save['icon5'] = 'uploads/images/'.$file_name;
			   }
			}else{
			   throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
			   exit;
		   }
		 }

    	  $file = $this->request->getFile('icon6');
		  if(!empty($_FILES['icon6']['name'])){
		   if($file->isValid() && !$file->hasMoved()){
			   $file_name = $file->getRandomName();
			   if($file->move('uploads/images/', $file_name)){
				   $save['icon6'] = 'uploads/images/'.$file_name;
			   }
			}else{
			   throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
			   exit;
		   }
		 }



		   $file = $this->request->getFile('side_image');
		  if(!empty($_FILES['side_image']['name'])){
		   if($file->isValid() && !$file->hasMoved()){
			   $file_name = $file->getRandomName();
			   if($file->move('uploads/images/', $file_name)){
				   $save['side_image'] = 'uploads/images/'.$file_name;
			   }
			}else{
			   throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
			   exit;
		   }
		 }

		   $file = $this->request->getFile('sup_image');
		  if(!empty($_FILES['sup_image']['name'])){
		   if($file->isValid() && !$file->hasMoved()){
			   $file_name = $file->getRandomName();
			   if($file->move('uploads/images/', $file_name)){
				   $save['sup_image'] = 'uploads/images/'.$file_name;
			   }
			}else{
			   throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
			   exit;
		   }
		 }
	 
		 $file = $this->request->getFile('news_image');
		  if(!empty($_FILES['news_image']['name'])){
		   if($file->isValid() && !$file->hasMoved()){
			   $file_name = $file->getRandomName();
			   if($file->move('uploads/images/', $file_name)){
				   $save['news_image'] = 'uploads/images/'.$file_name;
			   }
			}else{
			   throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
			   exit;
		   }
		 }

		  if ($id) {
			  $save['id'] =  $id;
			  $save['modify_date'] = date('Y-m-d H:i:s');
			  $result=  $this->AdminModel->updateData('home_heading',$save,array('id'=>$id));
			  if ($result) {
			  $this->session->setFlashdata('success','Record Update successfully');
			  return redirect()->to('admin/add_home_heading/'.$id);
			  }else{
			  $this->session->setFlashdata('error','Record not update');
			  return redirect()->to('admin/add_home_heading/'.$id);
			  }
		  }else{
	
			 $save['create_date'] = date('Y-m-d H:i:s');
			 $save['modify_date'] = date('Y-m-d H:i:s');
			 $result=  $this->AdminModel->insertData('home_heading',$save);
			  if ($result) {
			 
			  $this->session->setFlashdata('success','Record insert successfully');
			  return redirect()->to('admin/home_heading');
			  }else{
			  $this->session->setFlashdata('error','Record not insert');
			  return redirect()->to('admin/add_home_heading');
			  }
	
		  }
	
	   }
	 }
	return view('admin/cms/add_home_heading',$data);

	}
	

	function delete_home_heading(){
	  if ($this->request->getVar()) {
		  $id = $this->request->getVar('selected');
		 if ($id) {
			foreach($id as $value){
				$this->AdminModel->deleteData('home_heading',array('id'=>$value));
			   }
		   $this->session->setFlashdata('success','Record Delete successfully');
		 }else{
		  $this->session->setFlashdata('error','');
		 }
		}
	  return redirect()->to('admin/home_heading');
	}


	////////////////


	function career_gallery(){
	 
		$permission = $this->AdminModel->permission($this->uri->getSegment(2));
		if(empty($permission)){
			return redirect()->to('admin/permission-denied');
		} 
		 
	
		  $data['page_title'] = 'Career Gallery';
		  $data['detail'] = $this->AdminModel->all_fetch('career_gallary',null);
		 
		  echo view('admin/cms/career_gallery',$data);
		}
		  
		 
		
		function add_career_gallery($id=false)
		 {
		
		  if(@$id) {
			
			$data['page_title'] = ' Edit Career Gallery';
			$data['form_action'] ='admin/add_career_gallery/'.$id;
			$row = $this->AdminModel->fs('career_gallary',array('id'=>$id));
			$data['image'] =  $row->image;   
			$data['sort_order'] = $row->sort_order;  
			$data['status'] = $row->status;
// 			$data['title'] = $row->title;  
				 
			}else{

			  $data['page_title'] = ' Add Career Gallery';
			  $data['form_action'] ='admin/add_career_gallery';
			  $data['image'] =  '';   
			  $data['sort_order'] =  ''; 
			  $data['status'] =  '';
			 // $data['title'] = '';

			}
			
			if($this->request->getMethod()=='post'){
				
				$rules = [
					'sort_order'=>'required'
				];
			
			 if ($this->validate($rules)==false) {
					$data['validation'] = $this->validator;
			  } else{
			  $save= array();
			  $save['sort_order'] =     $this->request->getVar('sort_order');
			  $save['status'] =     $this->request->getVar('status');
			 // $save['title'] =     $this->request->getVar('title');
			 
			  $file = $this->request->getFile('image');
			  if(!empty($file->getClientName())){
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
				  $save['id'] =  $id;
				  $save['modify_date'] = date('Y-m-d H:i:s');
				  $result=  $this->AdminModel->updateData('career_gallary',$save,array('id'=>$id));
				  if ($result) {
				  $this->session->setFlashdata('success','Record Update successfully');
				  return redirect()->to('admin/career_gallery');
				  }else{
				  $this->session->setFlashdata('error','Record not update');
				  return redirect()->to('admin/add_career_gallery/'.$id);
				  }
			  }else{
		
				 $save['create_date'] = date('Y-m-d H:i:s');
				 $save['modify_date'] = date('Y-m-d H:i:s');
				 $result=  $this->AdminModel->insertData('career_gallary',$save);
				  if ($result) {
				 
				  $this->session->setFlashdata('success','Record insert successfully');
				  return redirect()->to('admin/career_gallery');
				  }else{
				  $this->session->setFlashdata('error','Record not insert');
				  return redirect()->to('admin/add_career_gallery');
				  }
		
				}
		
			  }
			}
			return view('admin/cms/add_career_gallery',$data);
		
		}
		
		function delete_career_gallery(){
		  if ($this->request->getVar()) {
			  $id = $this->request->getVar('selected');
			 if ($id) {
				foreach($id as $value){
					$this->AdminModel->deleteData('career_gallary',array('id'=>$value));
				   }
			   $this->session->setFlashdata('success','Record Delete successfully');
			 }else{
			  $this->session->setFlashdata('error','');
			 }
			 
			}
			 
		  return redirect()->to('admin/career_gallery');
		}

////////////////////////



function career_heading(){

	$permission = $this->AdminModel->permission($this->uri->getSegment(2));
	if(empty($permission)){
		return redirect()->to('admin/permission-denied');
	} 
	 

	  $data['page_title'] = 'Career heading';
	  $data['detail'] = $this->AdminModel->all_fetch('career_heading',null);
	 
	  echo view('admin/cms/career_heading',$data);
	}
	  
	 
	
	function add_career_heading($id=false)
	 {
	
		$model = new CmsModel();
	  if(!empty($id)) {
		
		$data['page_title'] = ' Edit career heading';
		$data['form_action'] ='admin/add_career_heading/'.$id;
		$row = $this->AdminModel->fs('career_heading',array('id'=>$id));
		$data['heading'] =  $row->heading;  
		$data['cv1'] =  $row->cv1;  
		$data['ch1'] = $row->ch1;  
		$data['cv2'] = $row->cv2;
		$data['ch2'] = $row->ch2; 
		$data['cv3'] = $row->cv3; 
		$data['ch3'] = $row->ch3; 
		$data['cv4'] = $row->cv4; 
		$data['ch4'] = $row->ch4; 
        $data['status'] = $row->status; 
		
			 
		}else{

		$data['page_title'] = ' Add career heading';
		$data['form_action'] ='admin/add_career_heading';
		$data['heading'] =   ''; 
		$data['cv1'] =  ''; 
		$data['ch1'] =   ''; 
		$data['cv2'] =  ''; 
		$data['ch2'] = ''; 
		$data['cv3'] =  ''; 
		$data['ch3'] =   ''; 
		$data['cv4'] =  ''; 
		$data['ch4'] =  ''; 
        $data['status'] =  ''; 

		}
		
		if($this->request->getMethod()=='post'){
			
			$rules = [
				'heading'=>'required'
			];
		
		 if ($this->validate($rules)==false) {
				$data['validation'] = $this->validator;
		  } else{
		  $save= array();
	
		$save['heading'] =   $this->request->getVar('heading');
		$save['cv1'] =  $this->request->getVar('cv1');
		$save['ch1'] =   $this->request->getVar('ch1');
		$save['cv2'] =  $this->request->getVar('cv2');
		$save['ch2'] = $this->request->getVar('ch2');
		$save['cv3'] =  $this->request->getVar('cv3');
		$save['ch3'] =   $this->request->getVar('ch3');
		$save['cv4'] =  $this->request->getVar('cv4');
		$save['ch4'] =  $this->request->getVar('ch4');
        $save['status'] =  $this->request->getVar('status');				
		
		  if ($id) {
			  $save['id'] =  $id;
			  $save['modify_date'] = date('Y-m-d H:i:s');
			  $result=  $this->AdminModel->updateData('career_heading',$save,array('id'=>$id));
			  if ($result) {
			  $this->session->setFlashdata('success','Record Update successfully');
			  return redirect()->to('admin/career_heading');
			  }else{
			  $this->session->setFlashdata('error','Record not update');
			  return redirect()->to('admin/add_career_heading/'.$id);
			  }
		  }else{
	
			 $save['create_date'] = date('Y-m-d H:i:s');
			 $save['modify_date'] = date('Y-m-d H:i:s');
			  $result=  $this->AdminModel->insertData('career_heading',$save);
			  if ($result) {
			 
			  $this->session->setFlashdata('success','Record insert successfully');
			  return redirect()->to('admin/career_heading');
			  }else{
			  $this->session->setFlashdata('error','Record not insert');
			  return redirect()->to('admin/add_career_heading');
			  }
	
			}
	
		  }
		}
		return view('admin/cms/add_career_heading',$data);
	
	}
	
	function delete_career_heading(){
	  if ($this->request->getVar()) {
		  $id = $this->request->getVar('selected');
		 if ($id) {
			foreach($id as $value){
				$this->AdminModel->deleteData('career_heading',array('id'=>$value));
			   }
		   $this->session->setFlashdata('success','Record Delete successfully');
		 }else{
		  $this->session->setFlashdata('error','');
		 }
		 
		}
		 
	  return redirect()->to('admin/career_heading');
	}


/////////////////////



function subscribe(){
		
	$data['page_title'] = 'Subscriber';
	$data['detail'] = $this->AdminModel->all_fetch('subscriber',null,'id','desc');
	echo view('admin/cms/subscribe',$data);

}



function delete_subscribe()
{
    if ($this->request->getVar()) {
      $id = $this->request->getVar('selected');
      if ($id) {
      	foreach ($id as $key => $value) {
      		$this->AdminModel->deleteData('subscriber',array('id'=>$value));
      	}
         $this->session->setFlashdata('success','Record Delete successfully');
      }
     }
 return redirect()->to('admin/subscribe');

}
/////////////////////////

	function product_gallery(){

		$permission = $this->AdminModel->permission($this->uri->getSegment(2));
		if(empty($permission)){
			return redirect()->to('admin/permission-denied');
		} 
		 
	
		  $data['page_title'] = 'Product Gallery';
		  $data['detail'] = $this->AdminModel->all_fetch('product_gallery',null);
		 
		  echo view('admin/cms/product_gallery',$data);
		}
		  	
		 
		
		function add_product_gallery($id=false)
		 {
		
		  if(@$id) {
			
			$data['page_title'] = ' Edit Product Gallery';
			$data['form_action'] ='admin/add_product_gallery/'.$id;
			$row = $this->AdminModel->fs('experience_center',array('id'=>$id));
			$data['image'] =  $row->image;   
			$data['sort_order'] = $row->sort_order;  
			$data['status'] = $row->status;
			$data['title'] = $row->title;  
				 
			}else{

			  $data['page_title'] = ' Add Product Gallery';
			  $data['form_action'] ='admin/add_product_gallery';
			  $data['image'] =  '';   
			  $data['sort_order'] =  ''; 
			  $data['status'] =  '';
			  $data['title'] = '';

			}
			
			if($this->request->getMethod()=='post'){
				
				$rules = [
					'sort_order'=>'trim'
				];
			
			 if ($this->validate($rules)==false) {
					$data['validation'] = $this->validator;
			  } else{
			  $save= array();
			  $save['sort_order'] =     $this->request->getVar('sort_order');
			  $save['status'] =     $this->request->getVar('status');
			  $save['title'] =     $this->request->getVar('title');
			 
			  $file = $this->request->getFile('image');
			  if(!empty($file->getClientName())){
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
				  $save['id'] =  $id;
				  $save['modify_date'] = date('Y-m-d H:i:s');
				  $result=  $this->AdminModel->updateData('product_gallery',$save,array('id'=>$id));
				  if ($result) {
				  $this->session->setFlashdata('success','Record Update successfully');
				  return redirect()->to('admin/product_gallery');
				  }else{
				  $this->session->setFlashdata('error','Record not update');
				  return redirect()->to('admin/add_product_gallery/'.$id);
				  }
			  }else{
		
				 $save['create_date'] = date('Y-m-d H:i:s');
				 $save['modify_date'] = date('Y-m-d H:i:s');
				 $result=  $this->AdminModel->insertData('product_gallery',$save);
				  if ($result) {
				 
				  $this->session->setFlashdata('success','Record insert successfully');
				  return redirect()->to('admin/product_gallery');
				  }else{
				  $this->session->setFlashdata('error','Record not insert');
				  return redirect()->to('admin/add_product_gallery');
				  }
		
				}
		
			  }
			}
			return view('admin/cms/add_product_gallery',$data);
		
		}
		
		function delete_product_gallery(){
		  if ($this->request->getVar()) {
			  $id = $this->request->getVar('selected');
			 if ($id) {
				foreach($id as $value){
					$this->AdminModel->deleteData('product_gallery',array('id'=>$value));
				   }
			   $this->session->setFlashdata('success','Record Delete successfully');
			 }else{
			  $this->session->setFlashdata('error','');
			 }
			 
			}
			 
		  return redirect()->to('admin/product_gallery');
		}
		
///////////////////////////

// BLOG


	function blog_category(){
		$permission = $this->AdminModel->permission($this->uri->getSegment(2));
		if(empty($permission)){
			return redirect()->to('admin/permission-denied');
		}
		  $data['page_title'] = 'Blog Category List';
		  $data['detail'] = $this->AdminModel->all_fetch('blog_category',null);
		  echo view('admin/cms/blog_category',$data);
		}


		function add_blog_category($id=false)
		{  
		 if(@$id) {  
		   $data['page_title'] = 'Edit Blog Category';
		   $data['form_action'] ='admin/add_blog_category/'.$id;
		   $row = $this->AdminModel->fs('blog_category',array('id'=>$id));

		   $data['name'] = $row->name;

		   $data['sort_order'] = $row->sort_order;    
		   $data['status'] = $row->status;     
		   }else{
		   $data['page_title'] = 'Add Blog Category';
		   $data['form_action'] ='admin/add_blog_category';
		   $data['name'] = '';
		   $data['sort_order'] = '';    
		   $data['status'] = '';

		   }
		 		   
		   if($this->request->getMethod()=='post'){

			$rules = [
				'name' =>'required',
			];

		   if ($this->validate($rules)==false) {
			  
			   $data['validation'] = $this->validator;
			} else{
			 $save= array();
			 $save['name'] =     $this->request->getVar('name');
		    $save['link'] =     sfu($this->request->getVar('name'));
			 $save['sort_order'] =     $this->request->getVar('sort_order');
			 $save['status'] =     $this->request->getVar('status');
			 if ($id) {
				 $save['modify_date'] = date('Y-m-d H:i:s');
				 $result=  $this->AdminModel->updateData('blog_category',$save,array('id'=>$id));
				 if ($result) {
			   
				 $this->session->setFlashdata('success','Record Update successfully');
				 return redirect()->to('admin/add_blog_category/'.$id);
				 }else{
				 $this->session->setFlashdata('error','Record not update');
				 return redirect()->to('admin/add_blog_category/'.$id);
				 }
			 }else{
				$save['create_date'] = date('Y-m-d H:i:s');
				$save['modify_date'] = date('Y-m-d H:i:s');
				$result=  $this->AdminModel->insertData('blog_category',$save);
				 if ($result) {
				
				 $this->session->setFlashdata('success','Record insert successfully');
				 return redirect()->to('admin/blog_category');
				 }else{
				 $this->session->setFlashdata('error','Record not insert');
				 return redirect()->to('admin/add_blog_category');
				 }
			 }
		  }
	   }
	  return view('admin/cms/add_blog_category',$data);
	}



  function delete_blog_category()
   {
	
	   if ($this->request->getVar()) {
		 $id = $this->request->getVar('selected');
		if ($id) {
		   foreach($id as $value){
		       $this->AdminModel->deleteData('blog_category',array('id'=>$value));
		   } 
		  $this->session->setFlashdata('success','Record Delete successfully');
		}else{
		 $this->session->setFlashdata('error','Record Delete unsuccess');
		}
	   }
	return  redirect()->to('admin/blog_category');
   }
   
	   
/////////////////



	function blogs(){
		$model = new BlogModel();
		$data['page_title'] ='Blogs List';
		 $data['categoryList'] = $this->AdminModel->all_fetch('blog_category',array('status'=>1),'sort_order','asc');
		
		$where = array();
		if(!empty($this->request->getVar('category'))){
		    $where['category_id'] = $this->request->getVar('category');
		}
		
		$like = array();
			if(!empty($this->request->getVar('name'))){
		    $like['title'] = $this->request->getVar('name');
		}
		
		
		$data['perPage'] = 10;
		$data['detail'] = $model->asObject()->where($where)->like($like)->orderBy('id','desc')->paginate($data['perPage']);
		
		$data['page'] = isset($_GET['page']) ? $_GET['page'] : 0;

		$data['total'] = $model->where($where)->like($like)->countAllResults();

		$data['data'] = $model->paginate($data['perPage']);
		$data['pager'] = $model->pager;

		$data['pages'] = round($data['total']/$data['perPage']);
		$data['offset'] = $data['page'] <=1?0:$data['page']*$data['perPage']-$data['perPage'];
		
		
		
		
		
		$blog_category = $this->AdminModel->all_fetch('blog_category',null);
		foreach($blog_category as $value){
		    $category[$value->id] = $value->name;
		}
		$data['category'] = $category;
		
		$data['config_logo'] = $this->config_logo;
		return  view('admin/cms/blogs',$data);
	}


	public function add_blogs($id = false){
        $data['blog_category'] = $this->AdminModel->all_fetch('blog_category',array('status'=>1),'sort_order','asc');
		$model = new BlogModel();
		
		
		$data['blogList'] = $model->asObject()->select('id,title')->where('status',1)->orderBy('title','asc')->findAll();
		
		
		
		if(!empty($id)) {
		$data['page_title'] = 'Edit Blog';
		$data['form_action'] = 'admin/add_blogs/'.$id;	
		$row = 	$model->asObject()->find($id);
		$data['featured'] =  $row->featured;
		$data['title'] = $row->title;
		$data['descri'] = $row->descri;
		$data['status'] = $row->status;
		$data['image'] = $row->image; 
		$data['link'] = $row->link; 
		$data['note'] = $row->note; 
		$data['category_id'] = $row->category_id; 
		$data['description2'] = $row->description2; 
		$data['meta_title'] = $row->meta_title; 
		$data['meta_description'] = $row->meta_description; 
		$data['meta_keyword'] = $row->meta_keyword; 
		$data['related'] = json_decode($row->related); 
		
		
		}else{
		$data['page_title'] = 'Add Blogs';
		$data['form_action'] ='admin/add_blogs';
		$data['featured'] =  '';
		$data['title'] = '';
		$data['descri'] = '';
		$data['status'] = '';
		$data['image'] =  '';
		$data['link'] = ''; 
		$data['meta_title'] = '';
		$data['meta_description'] = '';
		$data['meta_keyword'] = '';
		$data['note'] = '';
		$data['description2'] =  '';
		$data['category_id'] = '';
		$data['related'] = array();  
		
		}


		$rules =[
			'title'=>['lable'=>'Title','rules'=>'required']
		];
		if($this->request->getMethod()=='post'){

		if($this->validate($rules)==false){
			$data['validation'] = $this->validator;
		}else{	
		$save = array();
		$save['featured'] =     $this->request->getVar('featured');
		$save['title'] =     $this->request->getVar('title');
        $save['category_id'] =     $this->request->getVar('category_id');
	
		if($this->request->getVar('link')){
		$save['link'] =     sfu($this->request->getVar('link'));
		}else{
		$save['link'] =     sfu($this->request->getVar('title'));
		} 
		$save['descri'] =     $this->request->getVar('descri');
		$save['status'] =     $this->request->getVar('status');
		$save['meta_title'] = $this->request->getVar('meta_title');
		$save['meta_description'] = $this->request->getVar('meta_description');
		$save['meta_keyword'] = $this->request->getVar('meta_keyword');
		$save['note'] = $this->request->getVar('note');
		$save['description2'] = $this->request->getVar('description2');
		$save['related'] =  json_encode($this->request->getVar('related'));
		
		
		
			
		if(!empty($_FILES['image']['name'])){
			$file = $this->request->getFile('image');
			if($file->isValid() && !$file->hasMoved()){
				$file_name = $file->getRandomName();
				if($file->move('uploads/images/', $file_name)){
					$save['image'] =  'uploads/images/'.$file_name;
				}
			}else{
				throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
				exit;
			}
		}
// 		echo '<pre>';
// 		print_r($save); exit;
		if(!empty($id)){
			$save['modify_date'] = date('Y-m-d H:i:s');
			$result = $model->update($id,$save);
			if($result){
				session()->setFlashdata('success','Record update success');
				return redirect()->to('admin/add_blogs/'.$id);
			}else{
				session()->setFlashdata('error','Record update unsuccess');
				return redirect()->to('admin/add_blogs/'.$id);
			}
		}else{
			$save['create_date'] = date('Y-m-d H:i:s');
			$save['modify_date'] = date('Y-m-d H:i:s');
			$result = $model->save($save); // work for both mehtod // $model->insert($save);
			if($result){
				session()->setFlashdata('success','Record Insert success');
				return redirect()->to('admin/blogs');
			}else{
				session()->setFlashdata('error','Record update unsuccess');
				return redirect()->to('admin/add_blogs');
			}

		   }

		  }
	   
	    }
		return view('admin/cms/add_blogs',$data);

	}



function delete_blogs(){
	$model = new BlogModel();
	$ids = $this->request->getVar('selected');
	if($ids){
		foreach($ids as $key => $value){
			$model->delete($value);
		}
		$this->session->setFlashdata('success','Record Delete success');
	}
	return redirect()->to('admin/blogs');
}


/////////////////


function media(){
	$permission = $this->AdminModel->permission($this->uri->getSegment(2));
	if(empty($permission)){
		return redirect()->to('admin/permission-denied');
	}
	  $data['page_title'] = 'Media Stuff List';
	  $data['detail'] = $this->AdminModel->all_fetch('media',null);
	  echo view('admin/cms/media',$data);
	}


	function add_media($id=false)
	{  
	 if(@$id) {  
	   $data['page_title'] = 'Edit Media';
	   $data['form_action'] ='admin/add_media/'.$id;
	   $row = $this->AdminModel->fs('media',array('id'=>$id));

	   $data['image'] = $row->image;
	   $data['status'] = $row->status;     
	  
	   }else{
	       
	   $data['page_title'] = 'Add Media';
	   $data['form_action'] ='admin/add_media';
	   $data['image'] = '';
	   $data['status'] = '';

	   }
	 		   
	   if($this->request->getMethod()=='post'){

		$rules = [
			'status' =>'required',
		];

	   if ($this->validate($rules)==false) {
		  
		   $data['validation'] = $this->validator;
		} else{
		    
		 $save= array();
		 
		$uploadimageoption = array();

		 if ($this->request->getFileMultiple('image')) {
 			foreach($this->request->getFileMultiple('image') as $file)
			{  
				if($file->isValid() && !$file->hasMoved()){
				$file_name = $file->getRandomName();
				if($file->move('uploads/media/', $file_name)){
					$uploadimageoption[] = 'uploads/media/'.$file_name;
				}	 
		      }
			}
	   }

	    $image = $uploadimageoption;  
		$status =     $this->request->getVar('status');
    	$old_image =     $this->request->getVar('old_image');	

		
		 if ($id) {
		     
			 $save['modify_date'] = date('Y-m-d H:i:s');
			 
		    $array = array();
		    if(!empty($image)){
		    $array['image'] = $image[0];      
		    }else{
		    $array['image'] = $old_image;   
		    }
			$array['status'] = $status;    
			 
			 $result=  $this->AdminModel->updateData('media',$array,array('id'=>$id));
			 if ($result) {
		   
			 $this->session->setFlashdata('success','Record Update successfully');
			 return redirect()->to('admin/add_media/'.$id);
			 }else{
			 $this->session->setFlashdata('error','Record not update');
			 return redirect()->to('admin/add_media/'.$id);
			 }
		 }else{
		
			
			if(!empty($image)){ 
			    foreach($image as $value ){
			        $array = array();
			        $array['image'] = $value;
			        $array['status'] = $status;
			        $array['create_date'] = date('Y-m-d H:i:s');
		        	$array['modify_date'] = date('Y-m-d H:i:s');
		        	$result =  $this->AdminModel->insertData('media',$array);
			    }
			}
			
			 if ($result) {
			
			 $this->session->setFlashdata('success','Record insert successfully');
			 return redirect()->to('admin/media');
			 }else{
			 $this->session->setFlashdata('error','Record not insert');
			 return redirect()->to('admin/add_media');
			 }
		 }
	  }
   }
  return view('admin/cms/add_media',$data);
}



  function delete_media()
   {
	
	   if ($this->request->getVar()) {
		 $id = $this->request->getVar('selected');
		if ($id) {
		   foreach($id as $value){
		       $this->AdminModel->deleteData('media',array('id'=>$value));
		   } 
		  $this->session->setFlashdata('success','Record Delete successfully');
		}else{
		 $this->session->setFlashdata('error','Record Delete unsuccess');
		}
	   }
	return  redirect()->to('admin/media');
   }
  /////////////////


function timeline(){

$permission = $this->AdminModel->permission($this->uri->getSegment(2));
if(empty($permission)){
   return  redirect()->to('admin/permission-denied');
} 
    
  $data['page_title'] = 'All Timeline';
  $data['detail'] = $this->AdminModel->all_fetch('timeline',null);
  echo view('admin/cms/timeline',$data);
}
  
 

function add_timeline($id=false)
 {

 
  if(@$id) {
    
    $data['page_title'] = ' Edit Timeline';
    $data['form_action'] ='admin/add_timeline/'.$id;
    $row = $this->AdminModel->fs('timeline',array('id'=>$id));
    $data['photo'] =  $row->photo;   
    $data['status'] = $row->status;
    $data['title'] = $row->title;
    $data['year'] = $row->year;
    $data['description'] = $row->description;
    $data['sno'] = $row->sno;
    $data['status'] = $row->status;
    $data['sort_order'] = $row->sort_order; 
         
    }else{
    
    $data['page_title'] = ' Add Timeline';
    $data['form_action'] ='admin/add_timeline';
    $data['photo'] = '';   
    $data['status'] = '';
    $data['title'] = '';
    $data['year'] = '';
    $data['description'] = '';
    $data['sno'] = '';
    $data['status'] ='';
    $data['sort_order'] = '';
      

    }


    if ($this->request->getMethod()=='post') {

    $rules = [
    	'title' =>'required'
    ]; 	   
        
    if ($this->validate($rules)==false) {
        $data['validation'] = $this->validator;
     } else{
    
      $save= array();
      $save['sort_order'] =     $this->request->getVar('sort_order');
      $save['status'] =     $this->request->getVar('status');
      $save['title'] =     $this->request->getVar('title');
      $save['description'] =     $this->request->getVar('description');
  
             
    if(!empty($_FILES['photo']['name'])){
			$file = $this->request->getFile('photo');
			if($file->isValid() && !$file->hasMoved()){
				$file_name = $file->getRandomName();
				if($file->move('uploads/images/', $file_name)){
					$save['photo'] =  'uploads/images/'.$file_name;
				}
			}else{
				throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
				exit;
			}
		}


 
      if ($id) {
          $save['id'] =  $id;
          $save['modify_date'] = date('Y-m-d H:i:s');
          $result=  $this->AdminModel->updateData('timeline',$save,array('id'=>$id));
          if ($result) {
          $this->session->setFlashdata('success','Record Update successfully');
          return redirect()->to('admin/add_timeline/'.$id);
          }else{
          $this->session->setFlashdata('error','Record not update');
          return redirect()->to('admin/add_timeline/'.$id);
          }
      }else{

         $save['create_date'] = date('Y-m-d H:i:s');
         $save['modify_date'] = date('Y-m-d H:i:s');
         $result=  $this->AdminModel->insertData('timeline',$save);
          if ($result) {
         
          $this->session->setFlashdata('success','Record insert successfully');
          return redirect()->to('admin/timeline');
          }else{
          $this->session->setFlashdata('error','Record not insert');
          return redirect()->to('admin/add_timeline');
          }

      }

  }

  }
 echo view('admin/cms/add_timeline',$data);

}

function delete_timeline(){
  if ($this->request->getVar()) {
      $id = $this->request->getVar('selected');
      
     if ($id) {
     	foreach ($id as $key => $value) {
     	$this->AdminModel->deleteData('timeline',array('id'=>$value));
     	$this->session->setFlashdata('success','Record Delete successfully');
     	}      
     }else{
      $this->session->setFlashdata('error','');
     }
     
    }
     
  return redirect()->to('admin/timeline');
}

///////////////


function team(){

$permission = $this->AdminModel->permission($this->uri->getSegment(2));
if(empty($permission)){
   return  redirect()->to('admin/permission-denied');
} 
    
  $data['page_title'] = 'All Leadership List';
  $data['detail'] = $this->AdminModel->all_fetch('team',null);
  echo view('admin/cms/team',$data);
}
  
 

function add_team($id=false)
 {

 
  if(@$id) {
    
    $data['page_title'] = ' Edit team';
    $data['form_action'] ='admin/add_team/'.$id;
    $row = $this->AdminModel->fs('team',array('id'=>$id));
    $data['photo'] =  $row->photo;   
    $data['status'] = $row->status;
    $data['name'] = $row->name;
    $data['designation'] = $row->designation;


    $data['status'] = $row->status;
    $data['sort_order'] = $row->sort_order; 
         
    }else{
    
    $data['page_title'] = ' Add team';
    $data['form_action'] ='admin/add_team';
    $data['photo'] = '';   
    $data['status'] = '';
    $data['name'] = '';
    $data['designation'] = '';
  
    $data['status'] ='';
    $data['sort_order'] = '';
      

    }


    if ($this->request->getMethod()=='post') {

    $rules = [
    	'name' =>'required'
    ]; 	   
        
    if ($this->validate($rules)==false) {
        $data['validation'] = $this->validator;
     } else{
    
      $save= array();
      $save['sort_order'] =     $this->request->getVar('sort_order');
      $save['status'] =     $this->request->getVar('status');
      $save['name'] =     $this->request->getVar('name');
      $save['designation'] =     $this->request->getVar('designation');
  
             
    if(!empty($_FILES['photo']['name'])){
			$file = $this->request->getFile('photo');
			if($file->isValid() && !$file->hasMoved()){
				$file_name = $file->getRandomName();
				if($file->move('uploads/images/', $file_name)){
					$save['photo'] =  'uploads/images/'.$file_name;
				}
			}else{
				throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
				exit;
			}
		}


 
      if ($id) {
          $save['id'] =  $id;
          $save['modify_date'] = date('Y-m-d H:i:s');
          $result=  $this->AdminModel->updateData('team',$save,array('id'=>$id));
          if ($result) {
          $this->session->setFlashdata('success','Record Update successfully');
          return redirect()->to('admin/add_team/'.$id);
          }else{
          $this->session->setFlashdata('error','Record not update');
          return redirect()->to('admin/add_team/'.$id);
          }
      }else{

         $save['create_date'] = date('Y-m-d H:i:s');
         $save['modify_date'] = date('Y-m-d H:i:s');
         $result=  $this->AdminModel->insertData('team',$save);
          if ($result) {
         
          $this->session->setFlashdata('success','Record insert successfully');
          return redirect()->to('admin/team');
          }else{
          $this->session->setFlashdata('error','Record not insert');
          return redirect()->to('admin/add_team');
          }

      }

  }

  }
 echo view('admin/cms/add_team',$data);

}

function delete_team(){
  if ($this->request->getVar()) {
      $id = $this->request->getVar('selected');
      
     if ($id) {
     	foreach ($id as $key => $value) {
     	$this->AdminModel->deleteData('team',array('id'=>$value));
     	$this->session->setFlashdata('success','Record Delete successfully');
     	}      
     }else{
      $this->session->setFlashdata('error','');
     }
     
    }
     
  return redirect()->to('admin/team');
}
//////////////

function reviews(){

$permission = $this->AdminModel->permission($this->uri->getSegment(2));
if(empty($permission)){
   return  redirect()->to('admin/permission-denied');
} 

  $data['config_logo'] = $this->config_logo;    
  $data['page_title'] = 'All Reviews List';
  $data['detail'] = $this->AdminModel->all_fetch('reviews',null);
  echo view('admin/cms/reviews',$data);
}
  
 

function add_reviews($id=false)
 {

 
  if(@$id) {
    
    $data['page_title'] = ' Edit reviews';
    $data['form_action'] ='admin/add_reviews/'.$id;
    $row = $this->AdminModel->fs('reviews',array('id'=>$id));
    $data['photo'] =  $row->photo;   
    $data['status'] = $row->status;
    $data['name'] = $row->name;
    $data['description'] = $row->description;


    $data['status'] = $row->status;
    $data['sort_order'] = $row->sort_order; 
         
    }else{
    
    $data['page_title'] = ' Add reviews';
    $data['form_action'] ='admin/add_reviews';
    $data['photo'] = '';   
    $data['status'] = '';
    $data['name'] = '';
    $data['description'] = '';
  
    $data['status'] ='';
    $data['sort_order'] = '';
      

    }


    if ($this->request->getMethod()=='post') {

    $rules = [
    	'name' =>'required'
    ]; 	   
        
    if ($this->validate($rules)==false) {
        $data['validation'] = $this->validator;
     } else{
    
      $save= array();
      $save['sort_order'] =     $this->request->getVar('sort_order');
      $save['status'] =     $this->request->getVar('status');
      $save['name'] =     $this->request->getVar('name');
      $save['description'] =     $this->request->getVar('description');
  
             
    if(!empty($_FILES['photo']['name'])){
			$file = $this->request->getFile('photo');
			if($file->isValid() && !$file->hasMoved()){
				$file_name = $file->getRandomName();
				if($file->move('uploads/images/', $file_name)){
					$save['photo'] =  'uploads/images/'.$file_name;
				}
			}else{
				throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
				exit;
			}
		}


 
      if ($id) {
          $save['id'] =  $id;
          $save['modify_date'] = date('Y-m-d H:i:s');
          $result=  $this->AdminModel->updateData('reviews',$save,array('id'=>$id));
          if ($result) {
          $this->session->setFlashdata('success','Record Update successfully');
          return redirect()->to('admin/add_reviews/'.$id);
          }else{
          $this->session->setFlashdata('error','Record not update');
          return redirect()->to('admin/add_reviews/'.$id);
          }
      }else{

         $save['create_date'] = date('Y-m-d H:i:s');
         $save['modify_date'] = date('Y-m-d H:i:s');
         $result=  $this->AdminModel->insertData('reviews',$save);
          if ($result) {
         
          $this->session->setFlashdata('success','Record insert successfully');
          return redirect()->to('admin/reviews');
          }else{
          $this->session->setFlashdata('error','Record not insert');
          return redirect()->to('admin/add_reviews');
          }

      }

  }

  }
 echo view('admin/cms/add_reviews',$data);

}

function delete_reviews(){
  if ($this->request->getVar()) {
      $id = $this->request->getVar('selected');
      
     if ($id) {
     	foreach ($id as $key => $value) {
     	$this->AdminModel->deleteData('reviews',array('id'=>$value));
     	$this->session->setFlashdata('success','Record Delete successfully');
     	}      
     }else{
      $this->session->setFlashdata('error','');
     }
     
    }
     
  return redirect()->to('admin/reviews');
}



///////////


function trending_search(){

$permission = $this->AdminModel->permission($this->uri->getSegment(2));
if(empty($permission)){
   return  redirect()->to('admin/permission-denied');
} 

  $data['config_logo'] = $this->config_logo;    
  $data['page_title'] = 'All Trending Search';
  $data['detail'] = $this->AdminModel->all_fetch('trending_keyword',null);
  echo view('admin/cms/trending_search',$data);
}
  
 

function add_trending_search($id=false)
 {

 
  if(@$id) {
    
    $data['page_title'] = ' Edit Trending Search';
    $data['form_action'] ='admin/add_trending_search/'.$id;
    $row = $this->AdminModel->fs('trending_keyword',array('id'=>$id));
    $data['status'] = $row->status;
    $data['name'] = $row->name;
    $data['url'] = $row->url;
    $data['sort_order'] = $row->sort_order; 
         
    }else{
    
    $data['page_title'] = ' Add Trending Search';
    $data['form_action'] ='admin/add_trending_search';
    $data['status'] = '';
    $data['name'] = '';
    $data['url'] = '';
    $data['sort_order'] = '';
      

    }


    if ($this->request->getMethod()=='post') {

    $rules = [
    	'name' =>'required'
    ]; 	   
        
    if ($this->validate($rules)==false) {
        $data['validation'] = $this->validator;
     } else{
    
      $save= array();
      $save['sort_order'] =     $this->request->getVar('sort_order');
      $save['status'] =     $this->request->getVar('status');
      $save['name'] =     $this->request->getVar('name');
      $save['url'] =     $this->request->getVar('url');
  
             

 
      if ($id) {
          $save['id'] =  $id;
          $save['modify_date'] = date('Y-m-d H:i:s');
          $result=  $this->AdminModel->updateData('trending_keyword',$save,array('id'=>$id));
          if ($result) {
          $this->session->setFlashdata('success','Record Update successfully');
          return redirect()->to('admin/add_trending_search/'.$id);
          }else{
          $this->session->setFlashdata('error','Record not update');
          return redirect()->to('admin/add_trending_search/'.$id);
          }
      }else{

         $save['create_date'] = date('Y-m-d H:i:s');
         $save['modify_date'] = date('Y-m-d H:i:s');
         $result=  $this->AdminModel->insertData('trending_keyword',$save);
          if ($result) {
         
          $this->session->setFlashdata('success','Record insert successfully');
          return redirect()->to('admin/trending_search');
          }else{
          $this->session->setFlashdata('error','Record not insert');
          return redirect()->to('admin/add_trending_search');
          }

      }

  }

  }
 echo view('admin/cms/add_trending_search',$data);

}

function delete_trending_search(){
  if ($this->request->getVar()) {
      $id = $this->request->getVar('selected');
      
     if ($id) {
     	foreach ($id as $key => $value) {
     	$this->AdminModel->deleteData('trending_keyword',array('id'=>$value));
     	$this->session->setFlashdata('success','Record Delete successfully');
     	}      
     }else{
      $this->session->setFlashdata('error','');
     }
     
    }
     
  return redirect()->to('admin/trending_search');
}


//////////////


function oem_brands(){

		$permission = $this->AdminModel->permission($this->uri->getSegment(2));
		if(empty($permission)){
			return redirect()->to('admin/permission-denied');
		}
		
		$data['page_title'] = 'OEM Brands List';
		$data['config_logo'] = $this->config_logo;
		$data['detail'] = $this->AdminModel->all_fetch('oem_brands',null);
		echo view('admin/cms/oem_brands',$data);
		
		}
		
		 function add_oem_brands($id=false)
		 {
				  
		
		  if(@$id) {
			
			$data['page_title'] = ' Edit OEM Brand';
			$data['form_action'] ='admin/add_oem_brands/'.$id;
			$row = $this->AdminModel->fs('oem_brands',array('id'=>$id));
			$data['name'] = $row->name;
			$data['sort_order'] = $row->sort_order; 
			$data['image'] = $row->image;
			$data['seo_url'] = $row->seo_url;
			$data['status'] = $row->status;
			}else{
			
			$data['page_title'] = ' Add OEM Brand';
			$data['form_action'] ='admin/add_oem_brands';
			$data['name'] = '';
			$data['sort_order'] = '';
			$data['image'] = '';
			$data['seo_url'] = '';
			$data['status'] = '';
			
			}
				
			if($this->request->getMethod()=='post'){
			
				$rules = [
					'name'=>'required',
				];
	
			if ($this->validate($rules)==false) {
				$data['validation'] = $this->validator;
	
			 } else{
		
			  $save= array();
			  $save['id'] = '';
			  $save['name'] =   $this->request->getVar('name');
			  $save['sort_order'] =  $this->request->getVar('sort_order');
			  
			  if(!empty($this->request->getVar('seo_url'))){
			       $save['seo_url'] =   sfu($this->request->getVar('seo_url'));
			  }else{
			       $save['seo_url'] =   sfu($this->request->getVar('name'));
			  }
			  
			 
			  $save['status'] =   $this->request->getVar('status');		 
	
			   $file = $this->request->getFile('image');
			   if(!empty($file->getClientName())){
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
				 $save['id'] = $id;
				  $result=  $this->AdminModel->updateData('oem_brands',$save,array('id'=>$id));
				  if ($result) {
			   
				  $this->session->setFlashdata('success','Record Update successfully');
				  return redirect()->to('admin/add_oem_brands/'.$id);
				  }else{
				  $this->session->setFlashdata('error','Record not Update!');
				  return redirect()->to('admin/add_oem_brands/'.$id);
				  }
			  }else{
				 
				 $result=  $this->AdminModel->insertData('oem_brands',$save);
				  if ($result) {          
				  $this->session->setFlashdata('success','Record Insert successfully');
				  return redirect()->to('admin/oem_brands');
				  }else{
				  $this->session->setFlashdata('error','Record not insert');
				  return redirect()->to('admin/add_oem_brands');
				  }
		
			  }
		
		   }
		 }
		return view('admin/cms/add_oem_brands',$data);
		}
		
		
function delete_oem_brands()
{
	if ($this->request->getVar()) {
		$id = $this->request->getVar('selected');
		if($id){
		foreach($id as $value){ 
			$this->AdminModel->deleteData('oem_brands',array('id'=>$value));
		}
			$this->session->setFlashdata('success','Record Delete successfully');
		}
	}
return redirect()->to('admin/oem_brands');
}


//////////////////

function aftermarket_brands(){

		$permission = $this->AdminModel->permission($this->uri->getSegment(2));
		if(empty($permission)){
			return redirect()->to('admin/permission-denied');
		}
		
		$data['page_title'] = 'Aftermarkets Brands List';
		$data['config_logo'] = $this->config_logo;
		$data['detail'] = $this->AdminModel->all_fetch('aftermarket_brands',null);
		echo view('admin/cms/aftermarket_brands',$data);
		
		}
		
		 function add_aftermarket_brands($id=false)
		 {
				  
		
		  if(@$id) {
			
			$data['page_title'] = ' Edit Aftermarket Brand';
			$data['form_action'] ='admin/add_aftermarket_brands/'.$id;
			$row = $this->AdminModel->fs('aftermarket_brands',array('id'=>$id));
			$data['name'] = $row->name;
			$data['sort_order'] = $row->sort_order; 
			$data['image'] = $row->image;
			$data['seo_url'] = $row->seo_url;
			$data['status'] = $row->status;
			}else{
			
			$data['page_title'] = ' Add Aftermarket Brand';
			$data['form_action'] ='admin/add_aftermarket_brands';
			$data['name'] = '';
			$data['sort_order'] = '';
			$data['image'] = '';
			$data['seo_url'] = '';
			$data['status'] = '';
			
			}
				
			if($this->request->getMethod()=='post'){
			
				$rules = [
					'name'=>'required',
				];
	
			if ($this->validate($rules)==false) {
				$data['validation'] = $this->validator;
	
			 } else{
		
			  $save= array();
			  $save['id'] = '';
			  $save['name'] =   $this->request->getVar('name');
			  $save['sort_order'] =  $this->request->getVar('sort_order');
			  
			  if(!empty($this->request->getVar('seo_url'))){
			       $save['seo_url'] =   sfu($this->request->getVar('seo_url'));
			  }else{
			       $save['seo_url'] =   sfu($this->request->getVar('name'));
			  }
			  
			 
			  $save['status'] =   $this->request->getVar('status');		 
	
			   $file = $this->request->getFile('image');
			   if(!empty($file->getClientName())){
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
				 $save['id'] = $id;
				  $result=  $this->AdminModel->updateData('aftermarket_brands',$save,array('id'=>$id));
				  if ($result) {
			   
				  $this->session->setFlashdata('success','Record Update successfully');
				  return redirect()->to('admin/add_aftermarket_brands/'.$id);
				  }else{
				  $this->session->setFlashdata('error','Record not Update!');
				  return redirect()->to('admin/add_aftermarket_brands/'.$id);
				  }
			  }else{
				 
				 $result=  $this->AdminModel->insertData('aftermarket_brands',$save);
				  if ($result) {          
				  $this->session->setFlashdata('success','Record Insert successfully');
				  return redirect()->to('admin/aftermarket_brands');
				  }else{
				  $this->session->setFlashdata('error','Record not insert');
				  return redirect()->to('admin/add_aftermarket_brands');
				  }
		
			  }
		
		   }
		 }
		return view('admin/cms/add_aftermarket_brands',$data);
		}
		
		
function delete_aftermarket_brands()
{
	if ($this->request->getVar()) {
		$id = $this->request->getVar('selected');
		if($id){
		foreach($id as $value){ 
			$this->AdminModel->deleteData('aftermarket_brands',array('id'=>$value));
		}
			$this->session->setFlashdata('success','Record Delete successfully');
		}
	}
return redirect()->to('admin/aftermarket_brands');
}



function twowheeler_brands(){

		$permission = $this->AdminModel->permission($this->uri->getSegment(2));
		if(empty($permission)){
			return redirect()->to('admin/permission-denied');
		}
		
		$data['page_title'] = '2/3 Wheeler Brands List';
		$data['config_logo'] = $this->config_logo;
		$data['detail'] = $this->AdminModel->all_fetch('twowheeler_brands',null);
		echo view('admin/cms/twowheeler_brands',$data);
		
		}
		
		 function add_twowheeler_brands($id=false)
		 {
				  
		
		  if(@$id) {
			
			$data['page_title'] = ' Edit 2/3 Wheeler Brand';
			$data['form_action'] ='admin/add_twowheeler_brands/'.$id;
			$row = $this->AdminModel->fs('twowheeler_brands',array('id'=>$id));
			$data['name'] = $row->name;
			$data['sort_order'] = $row->sort_order; 
			$data['image'] = $row->image;
			$data['seo_url'] = $row->seo_url;
			$data['status'] = $row->status;
			}else{
			
			$data['page_title'] = ' Add 2/3 Wheeler Brand';
			$data['form_action'] ='admin/add_twowheeler_brands';
			$data['name'] = '';
			$data['sort_order'] = '';
			$data['image'] = '';
			$data['seo_url'] = '';
			$data['status'] = '';
			
			}
				
			if($this->request->getMethod()=='post'){
			
				$rules = [
					'name'=>'required',
				];
	
			if ($this->validate($rules)==false) {
				$data['validation'] = $this->validator;
	
			 } else{
		
			  $save= array();
			  $save['id'] = '';
			  $save['name'] =   $this->request->getVar('name');
			  $save['sort_order'] =  $this->request->getVar('sort_order');
			  
			  if(!empty($this->request->getVar('seo_url'))){
			       $save['seo_url'] =   sfu($this->request->getVar('seo_url'));
			  }else{
			       $save['seo_url'] =   sfu($this->request->getVar('name'));
			  }
			  
			 
			  $save['status'] =   $this->request->getVar('status');		 
	
			   $file = $this->request->getFile('image');
			   if(!empty($file->getClientName())){
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
				 $save['id'] = $id;
				  $result=  $this->AdminModel->updateData('twowheeler_brands',$save,array('id'=>$id));
				  if ($result) {
			   
				  $this->session->setFlashdata('success','Record Update successfully');
				  return redirect()->to('admin/add_twowheeler_brands/'.$id);
				  }else{
				  $this->session->setFlashdata('error','Record not Update!');
				  return redirect()->to('admin/add_twowheeler_brands/'.$id);
				  }
			  }else{
				 
				 $result=  $this->AdminModel->insertData('twowheeler_brands',$save);
				  if ($result) {          
				  $this->session->setFlashdata('success','Record Insert successfully');
				  return redirect()->to('admin/twowheeler_brands');
				  }else{
				  $this->session->setFlashdata('error','Record not insert');
				  return redirect()->to('admin/add_twowheeler_brands');
				  }
		
			  }
		
		   }
		 }
		return view('admin/cms/add_twowheeler_brands',$data);
		}
		
		
function delete_twowheeler_brands()
{
	if ($this->request->getVar()) {
		$id = $this->request->getVar('selected');
		if($id){
		foreach($id as $value){ 
			$this->AdminModel->deleteData('twowheeler_brands',array('id'=>$value));
		}
			$this->session->setFlashdata('success','Record Delete successfully');
		}
	}
return redirect()->to('admin/twowheeler_brands');
}
//////////////

function lifeat(){

		$permission = $this->AdminModel->permission($this->uri->getSegment(2));
		if(empty($permission)){
			return redirect()->to('admin/permission-denied');
		}
		
		$data['page_title'] = 'Life at smart parts';
		$data['config_logo'] = $this->config_logo;
		$data['detail'] = $this->AdminModel->all_fetch('lifeat',null);
		echo view('admin/cms/lifeat',$data);
		
		}
		
	function add_lifeat($id=false)
		 {
				  
		
		  if(@$id) {
			
			$data['page_title'] = ' Edit Life';
			$data['form_action'] ='admin/add_lifeat/'.$id;
			$row = $this->AdminModel->fs('lifeat',array('id'=>$id));
			$data['title'] = $row->title;
			$data['description'] = $row->description;
			$data['sort_order'] = $row->sort_order; 
		    $data['status'] = $row->status;
			}else{
			
			$data['page_title'] = ' Add life';
			$data['form_action'] ='admin/add_lifeat';
			$data['title'] = '';
			$data['description'] = '';
			$data['sort_order'] = '';
			$data['status'] = '';
			
			}
				
			if($this->request->getMethod()=='post'){
			
				$rules = [
					'title'=>'required',
				];
	
			if ($this->validate($rules)==false) {
				$data['validation'] = $this->validator;
	
			 } else{
		
			  $save= array();
			  $save['title'] =   $this->request->getVar('title');
			  $save['description'] =  $this->request->getVar('description');
			  $save['sort_order'] =  $this->request->getVar('sort_order');
			  $save['status'] =   $this->request->getVar('status');		 
	
				  
			  if ($id) {

				  $result=  $this->AdminModel->updateData('lifeat',$save,array('id'=>$id));
				  if ($result) {
			   
				  $this->session->setFlashdata('success','Record Update successfully');
				  return redirect()->to('admin/add_lifeat/'.$id);
				  }else{
				  $this->session->setFlashdata('error','Record not Update!');
				  return redirect()->to('admin/add_lifeat/'.$id);
				  }
			  }else{
				 
				 $result=  $this->AdminModel->insertData('lifeat',$save);
				  if ($result) {          
				  $this->session->setFlashdata('success','Record Insert successfully');
				  return redirect()->to('admin/lifeat');
				  }else{
				  $this->session->setFlashdata('error','Record not insert');
				  return redirect()->to('admin/add_lifeat');
				  }
		
			  }
		
		   }
		 }
		return view('admin/cms/add_lifeat',$data);
		}
		
		
function delete_lifeat()
{
	if ($this->request->getVar()) {
		$id = $this->request->getVar('selected');
		if($id){
		foreach($id as $value){ 
			$this->AdminModel->deleteData('lifeat',array('id'=>$value));
		}
			$this->session->setFlashdata('success','Record Delete successfully');
		}
	}
return redirect()->to('admin/lifeat');
}


}
