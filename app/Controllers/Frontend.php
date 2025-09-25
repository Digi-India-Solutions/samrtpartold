<?php

namespace App\Controllers;
use App\Models\FrontModel;
use App\Models\CareerModel;
use App\Models\CommonModel;
use App\Models\ProductFrontModel;

// MS Change  >> Manish - 7903437601 
class Frontend extends BaseController
{
	
	
	public function __construct()
	{

	   $session = \Config\Services::session();
	   helper(['general','cookie']);
	   $AdminModel = new CommonModel();
	  
	   $setting = $AdminModel->all_fetch('setting',array('code'=>'config'));
         foreach($setting as $value){
             $wconfig[$value->key] = $value->value;
         }
       $this->config_logo = $wconfig['config_icon']; 
       $this->store_breadcum = $wconfig['store_breadcum'];  

	}

    public function index()
	{	
	    $model = new ProductFrontModel();
	    
	    $meta = $this->AdminModel->fs('front_menu',array('link'=>'home'));
		$data['meta_title'] = $meta->meta_title;
		$data['meta_description'] =  $meta->meta_description;
		$data['meta_keyword'] =  $meta->meta_keyword;
		$data['meta'] =  $meta;
		//$data['home_banner'] = $this->AdminModel->all_fetch('home_banner',array('status'=>1),'sort_order','asc'); // MS Change
		$data['heading'] = $this->AdminModel->fs('home_heading',array('status'=>1));
		//$data['home_slider'] = $this->AdminModel->all_fetch('home_banner',array('status'=>1),'sort_order','asc'); // MS Change
	    $data['home_slider'] = array("status"=>1); 
	    
		$blog_list_rows = array("link",'image','title','descri');// MS Change
        $data['blogs'] = $this->AdminModel->all_fetch_rows('blogs',array('status'=>1,'featured'=>1),'sort_order','desc',$blog_list_rows,4,0);// MS Change
		 
		$cat_list_rows  = array("keyword","thumbnail","name");// MS Change
		$data['category'] = $this->AdminModel->all_fetch_rows('category',array('status'=>1,'top'=>1),'sort_order','asc',$cat_list_rows);// MS Change
		
		$flip_list_rows  = array("title","subtitle","image","bimage","btitle");// MS Change
	    $data['flip'] = $this->AdminModel->all_fetch_rows('home_flip',array('status'=>1),'sort_order','asc',$flip_list_rows);// MS Change
	    	
		$data['config_logo'] = $this->config_logo;
		
		if(!empty($this->session->get('userDetail'))){
		    $user = $this->AdminModel->fs('user',array('id'=>$this->session->get('userDetail')));
		    if(!empty($user)){
		          $is_subscribe = $this->AdminModel->fs('subscriber',array('email'=>$user->email));
		          if(!empty($is_subscribe)){
		             $data['is_cancel'] = 1; 
		          }
		    }else{
		        return redirect()->to('logout');
		    }
		}
		
		 $check_newletter_cookie = get_cookie('newsletter');
		if(!empty($this->session->get('newsletter'))){
		    $data['is_cancel'] = 1;
		}
		
		
		$getRows_cat_home = array("id",'name','seo_url'); // MS Change
		$brand_list_rows = array('seo_url','image','name'); // MS Change
        $brand_category = $this->AdminModel->all_fetch_rows('brand_category',array('status'=>1),'sort_order','asc',$getRows_cat_home);
		$brands = array();
		if(!empty($brand_category)){
		    foreach($brand_category as $category){
		        
		        $array = array();
		        $array['id']= $category->id;
		        $array['name']= $category->name;
		        $array['seo_url']= $category->seo_url;
		        $array['brand_list'] = $this->AdminModel->all_fetch_rows('brands',array('brand_cat_id'=>$category->id,'status'=>1),'sort_order','asc',$brand_list_rows);
		        
		        $brands[] = $array;
		    }
		}  
	    $data['popular_product'] = $model->get_popular_product(); 
		$data['brands_list'] = $brands;
 
		return view('frontend/home',$data);	
	}


    public function pre_test_function(){
        $product_list_rows =  array("id","product_seo_url","image","description","name","part_no","price");
        
        $result = $this->AdminModel->all_fetch_rows('product',array('best_seller'=>1,'status'=>1),'sort_order','asc',$product_list_rows); 
	    echo "<pre>";
		print_r($result);
        
    }

	public function about($id=false)
	{	
	
        $meta = $this->AdminModel->fs('front_menu',array('link'=>$this->uri->getSegment(1)));
		$data['meta_title'] = $meta->meta_title;
		$data['meta_description'] =  $meta->meta_description;
		$data['meta_keyword'] =  $meta->meta_keyword;
		$data['meta'] = $meta;
        $data['heading'] = $this->AdminModel->fs('about_heading',array('status'=>1));
        $data['reviews'] = $this->AdminModel->all_fetch('reviews',array('status'=>1),'sort_order','asc');
        $data['team'] = $this->AdminModel->all_fetch('team',array('status'=>1),'sort_order','asc');
        $setting = $this->AdminModel->all_fetch('setting',array('code'=>'config'));
        foreach ($setting as $key => $value) {
        $wconfig[$value->key] = $value->value;
        }	
        $data['wconfig'] = $wconfig;
        $data['config_logo'] = $this->config_logo;
        $data['timeline'] = $this->AdminModel->all_fetch('timeline',array('status'=>1),'sort_order','asc');
        $data['testimonial'] = $this->AdminModel->all_fetch('testimonial',array('status'=>1),'sort_order','asc');
        $data['home_heading'] = $this->AdminModel->fs('home_heading',array('status'=>1));
        return view('frontend/about',$data);	
	}
	
	
	public function brands()
	{	

        $meta = $this->AdminModel->fs('front_menu',array('link'=>$this->uri->getSegment(1)));
     
		$data['meta_title'] = $meta->meta_title;
		$data['meta_description'] =  $meta->meta_description;
		$data['meta_keyword'] =  $meta->meta_keyword;
		$data['meta'] = $meta;
	
        $setting = $this->AdminModel->all_fetch('setting',array('code'=>'config'));
        foreach ($setting as $key => $value) {
        $wconfig[$value->key] = $value->value;
        }
        $data['wconfig'] = $wconfig;
        $data['config_logo'] = $this->config_logo;
        
       $data['breadcrumbs'] = array();
       $data['breadcrumbs'][] = array(
			'href' => base_url(),
			'text' => $this->store_breadcum
		);
		
		$data['breadcrumbs'][] = array(
			'href' => current_url(),
			'text' => 'Brands'
		 );
		
		$data['brands'] = $this->AdminModel->all_fetch('brands',array('status'=>1),'sort_order','asc'); 
        return view('frontend/brands',$data);	
	}
	
	
	

	function quotation(){
	   

    $array = array();
    $rules =[
		'name'=>['label'=>'Name','rules'=>'trim|htmlspecialchars|required'],
		'email'=>['label'=>'Email','rules'=>'trim|htmlspecialchars|required|valid_email'],
		'phone'=>['label'=>'Phone','rules'=>'trim|htmlspecialchars|numeric|max_length[11]|min_length[10]'],
    ];

   if ($this->validate($rules)==FALSE) {
      $array['status'] = 0;
      $array['name'] = $this->validation->getError('name');
      $array['email'] = $this->validation->getError('email');
      $array['phone'] = $this->validation->getError('phone');
      echo json_encode($array);
    }else
    {
    
    $setting = $this->AdminModel->all_fetch('setting',array('code'=>'config'));
    foreach ($setting as $key => $value) {
      $wconfig[$value->key] = $value->value;
    }

		$save = array();
		$save['name'] = $this->request->getVar('name');
		$save['email'] = $this->request->getVar('email');
		$save['phone'] = $this->request->getVar('phone');
		$save['phone_code'] = $this->request->getVar('phone_code');
		$save['create_date'] = date('Y-m-d H:i:A'); // for email date
		$result = $this->AdminModel->insertData('quotation',$save);
		if(!empty($result)){
		$save['subject'] = 'New Enquiry for quotation '.$wconfig['config_name'].' ';
		$save['logo'] = $wconfig['config_logo'];
		$save['wconfig'] = $wconfig;
		$to = strtolower($wconfig['config_email']);
  
       // email send
       	$email = \Config\Services::email();
		$config['mailType'] = 'html';
		$config['wordWrap'] = true;
		$email->initialize($config);

		$email->setFrom($wconfig['sending_email'], $wconfig['config_name']);
		$email->setTo($to);
		$email->setSubject($save['subject']);
		$message = view('frontend/enquiry_template',$save);
		$email->setMessage($message);
		$email->send();

		// end
      $array['status'] = 1;
      $array['msg'] ='Enquiry Sent Successfully';
      $this->session->set('newsletter',1);
      
      echo json_encode($array);
      }else{
          $array['status'] = 0;
      $array['msg'] ='Something getting wrong please retry';
      echo json_encode($array); 
      }

   }
}
	
	
	
	
	
	
	


	public function contact(){
		
     	$meta = $this->AdminModel->fs('front_menu',array('link'=>$this->uri->getSegment(1)));
		$data['meta_title'] = $meta->meta_title;
		$data['meta_description'] =  $meta->meta_description;
		$data['meta_keyword'] =  $meta->meta_keyword;
		$data['meta'] = $meta;
		$data['detail'] = $this->AdminModel->fs('contact_address',array('status'=>1));
		$setting = $this->AdminModel->all_fetch('setting',array('code'=>'config'));
        foreach ($setting as $key => $value) {
        $wconfig[$value->key] = $value->value;
        }	
        $data['wconfig'] = $wconfig;
        $data['config_logo'] = $this->config_logo;
		return view('frontend/contact',$data);

	}



   function info(){

    $meta = $this->AdminModel->fs('information',array('slug'=>$this->uri->getSegment(1)));
    
	$data['meta_title'] = $meta->m_title;
	$data['meta_description'] =  $meta->m_description;
	$data['meta_keyword'] =  $meta->m_keyword;

	$data['detail'] = $meta;

    $data['faq'] = $this->AdminModel->all_fetch('information_faq',array('info_id'=>$data['detail']->information_id,'status'=>1),'sort_order','asc');
    
    return view('frontend/info',$data);
    
  }


// subscriber
 function subscribe(){
	 $array = array();
	 $rules = [
	 	'email' =>['label'=>'Email','rules'=>'required|valid_email'],
	 ];

	  if ($this->validate($rules)==FALSE) {
	      $array['status'] = 0;
	      $array['msg'] = $this->validation->getError('email');
	      echo json_encode($array);
	    }else{
	      $save = array();
	      $save['email'] = $this->request->getVar('email');
	      $save['create_date'] = date('Y-m-d H:i:s');
	      $check_already = $this->AdminModel->fs('subscriber',array('email'=>$save['email']));
	      if(@$check_already){
	       //$this->AdminModel->updateData('subscriber',array('email'=>$save['email']),$save);   
	        $array['status']=1;
	        $array['msg'] = 'You have already subscribe';
	        echo json_encode($array);
	       
	      }else{
	       $result =  $this->AdminModel->insertData('subscriber',$save);
	       if($result){
	           $array['status']=1;
	           $array['msg'] = 'Thanks for subscribing';
	           echo json_encode($array);
	       }else{
	            $array['status']=0;
	            $array['msg'] = 'Something went wrong please retry';
	            echo json_encode($array);
	       }
	       
	      }
	    } 
	}


// contact send enquiry  
function send_enquiry(){

    $array = array();
    $rules =[
		'name'=>['label'=>'Name','rules'=>'trim|htmlspecialchars|required'],
		'email'=>['label'=>'Email','rules'=>'trim|htmlspecialchars|required|valid_email'],
		'message'=>['label'=>'message','rules'=>'trim|htmlspecialchars'],
		'phone'=>['label'=>'Phone','rules'=>'trim|htmlspecialchars|numeric|max_length[11]|min_length[10]'],
    ];

   if ($this->validate($rules)==FALSE) {
      $array['status'] = 0;
      $array['name'] = $this->validation->getError('name');
      $array['email'] = $this->validation->getError('email');
      $array['phone'] = $this->validation->getError('phone');
      echo json_encode($array);
    }else
    {
    
    $setting = $this->AdminModel->all_fetch('setting',array('code'=>'config'));
    foreach ($setting as $key => $value) {
      $wconfig[$value->key] = $value->value;
    }

		$save = array();
		$save['name'] = $this->request->getVar('name');
		$save['email'] = $this->request->getVar('email');
		$save['phone'] = $this->request->getVar('phone');
		$save['subject'] = $this->request->getVar('subject');
		$save['message'] = $this->request->getVar('message');
		$save['city'] = $this->request->getVar('city');
		$save['create_date'] = date('Y-m-d H:i:A'); // for email date
		$result = $this->AdminModel->insertData('enquiry',$save);
		if(!empty($result)){
		$save['subject'] = 'New Enquiry From '.$wconfig['config_name'].' contact page';
		$save['logo'] = $wconfig['config_logo'];
		$save['wconfig'] = $wconfig;
		$to = strtolower($wconfig['config_email']);
  
       // email send
       	$email = \Config\Services::email();
		$config['mailType'] = 'html';
		$config['wordWrap'] = true;
		$email->initialize($config);

		$email->setFrom($wconfig['sending_email'], $wconfig['config_name']);
		$email->setTo($to);
		$email->setSubject($save['subject']);
		$message = view('frontend/enquiry_template',$save);
		$email->setMessage($message);
		$email->send();

		// end
      $array['status'] = 1;
      $array['msg'] ='Enquiry Sent Successfully';
      echo json_encode($array);
      }else{
          $array['status'] = 0;
      $array['msg'] ='Something getting wrong please retry';
      echo json_encode($array); 
      }

   }
}

//////////////////////////////

function login(){
    if(!empty($this->session->get('userDetail'))){
        return redirect('user');
    }
	$meta = $this->AdminModel->fs('front_menu',array('link'=>$this->uri->getSegment(1)));
	$data['meta_title'] = $meta->meta_title;
	$data['meta_description'] =  $meta->meta_description;
	$data['meta_keyword'] =  $meta->meta_keyword;
	$data['meta'] = $meta;
	return view('frontend/login',$data);
}

function sign_up(){
     if(!empty($this->session->get('user_id'))){
        return redirect('user');
    }
   	$meta = $this->AdminModel->fs('front_menu',array('link'=>$this->uri->getSegment(1)));
	$data['meta_title'] = $meta->meta_title;
	$data['meta_description'] =  $meta->meta_description;
	$data['meta_keyword'] =  $meta->meta_keyword;
	$data['meta'] = $meta;
	return view('frontend/sign_up',$data);
}


function save_user_registration(){

    $array = array();	
    
    $rules = array();
    
    $rules['first_name'] = ['label'=>'First Name','rules'=>'required|min_length[3]'];
    $rules['last_name'] = ['label'=>'Last Name','rules'=>'required|min_length[3]'];
    $rules['email'] = ['label'=>'Email','rules'=>'required|valid_email|is_unique[user.email]'];  
    $rules['mobile'] = ['label'=>'Mobile','rules'=>'required|numeric|min_length[10]|max_length[10]'];  
    $rules['password'] = ['label'=>'password','rules'=>'required|min_length[6]'];
    $rules['cpassword'] = ['label'=>'Confirm password','rules'=>'required|min_length[6]|matches[password]'];
    $rules['phone_code'] = ['label'=>'phone code','rules'=>'required'];
    $rules['reg_type'] = ['label'=>'Select an option','rules'=>'required'];
    if($this->request->getVar('reg_type')=='company'){
     $rules['company_name'] = ['label'=>'Company Name','rules'=>'required']; 
     $rules['company_address'] = ['label'=>'Company Address','rules'=>'required']; 
    }
    
    
    
    
    if ($this->validate($rules)==false) {
    	$array['status'] = 0;
    	$array['first_name'] = $this->validation->getError('first_name');
    	$array['last_name'] = $this->validation->getError('last_name');
    	$array['email'] = $this->validation->getError('email');
    	$array['mobile'] = $this->validation->getError('mobile');
    	$array['password'] = $this->validation->getError('password');
    	$array['cpassword'] = $this->validation->getError('cpassword');
    	$array['phone_code'] = $this->validation->getError('phone_code');
    	$array['company_name'] = $this->validation->getError('company_name');
    	$array['company_address'] = $this->validation->getError('company_address');
        $array['reg_type'] = $this->validation->getError('reg_type');
    	echo json_encode($array);

    }else{
        
        
    	$save = array();
    	$save['first_name'] = $this->request->getVar('first_name');
    	$save['last_name'] = $this->request->getVar('last_name'); 
    	$save['mobile'] = $this->request->getVar('mobile');	
    	$save['email'] = $this->request->getVar('email'); 
    	$save['password'] = md5($this->request->getVar('password'));
    	$save['phone_code'] = $this->request->getVar('phone_code');
	  	$save['company_name'] = $this->request->getVar('company_name');
	  	$save['company_address'] = $this->request->getVar('company_address');
	  	$save['reg_type'] = $this->request->getVar('reg_type');
    	
    	  $file = $this->request->getFile('bussiness_card');
		  if(!empty($_FILES['bussiness_card']['name'])){
		   if($file->isValid() && !$file->hasMoved()){
			   $file_name = $file->getRandomName();
			   if($file->move('uploads/images/', $file_name)){
				   $save['bussiness_card'] = 'uploads/images/'.$file_name;
			   }
			}else{
			    
			    	$array['status'] = 0;
			    	$array['msg'] = 'invalid type of image';
			  	echo json_encode($array); exit;
			   
		   }
		  }
    	
    	$save['status'] = 1; 
   
        $ip = getIp();
        $country = getUserCountry($ip); 
        $cnt = $this->AdminModel->fs('country',array('name'=>$country));
        $save['country'] = $cnt->id;
    	
    	if($cnt->id==99){
    	    $save['customer_group_id'] = 3; // default
    	}else{
    	     $save['customer_group_id'] = 5; // premium
    	}
    	
    	$result = $this->AdminModel->insertData('user',$save);
    	if (!empty($result)) {
    	    
    	$setting = $this->AdminModel->all_fetch('setting',array('code'=>'config'));
        foreach ($setting as $key => $value) {
          $wconfig[$value->key] = $value->value;
        }    
        	    
    	$save['wconfig'] =  $wconfig; 
    	$save['create_date'] = date('Y-m-d H:i:s');    
    	$save['link'] = 'account-verify/'.encrypt_url($save['email']);    
    	   // email
    	$email = \Config\Services::email();
    	$config['mailType'] = 'html';
		$config['wordWrap'] = true;
		$email->initialize($config);

		$email->setFrom($wconfig['sending_email'], $wconfig['config_name']);
		$email->setTo($save['email']);
		$email->setSubject('Registration Verificaton from smartparts exports');
		$message = view('frontend/registration_template',$save);
		$email->setMessage($message);
		$email->send();
    	    
    	    
    	   //end 
    	$this->session->setFlashdata('success','Please activate your account we have send a verification link on your registered email address.');    
    	    
    	$array['status'] = 1;
    	$array['msg'] = 'Registration successfull';
    	$array['redirect'] = 'login';
    	echo json_encode($array);
    	}else{
        $array['status'] = 0;
    	$array['msg'] = 'Something went wrong';	    
        echo json_encode($array);
    	}
    
    }
}


function account_verify(){
    $email = decrypt_url($this->uri->getSegment(2));
    
    $check = $this->AdminModel->fs('user',array('email'=>$email));
    if(empty($check)){
           $this->session->setFlashdata('error','This Link is invalid');
    }else{
        $this->AdminModel->updateData('user',array('verify'=>1),array('email'=>$email));
        $this->session->setFlashdata('success','Your Account is now verified');
    }
     return redirect()->to('login');
    
}








////////////////

function user_login(){

    $array = array();	
    
    $rules = array();
    $rules['email'] = ['label'=>'Email','rules'=>'required|valid_email'];   
    $rules['password'] = ['label'=>'password','rules'=>'required'];
    
    if ($this->validate($rules)==false) {
    	$array['status'] = 0;
     	$array['email'] = $this->validation->getError('email');
    	$array['password'] = $this->validation->getError('password');
    	echo json_encode($array);

    }else{
        $save = array();
        $email = $this->request->getVar('email');
    	$password = md5($this->request->getVar('password'));
    	$check_email = $this->AdminModel->fs('user',array('email'=>$email));     
    	if(empty($check_email)){
    	    $array['status'] = 0;
            $array['msg'] = 'Email do not match';
           echo json_encode($array); exit;
     	}
		
    	$check_password = $this->AdminModel->fs('user',array('email'=>$email,'password'=>$password));     
    
    	if(empty($check_password)){
    	    $array['status'] = 0;
            $array['msg'] = 'Password do not match';
           echo json_encode($array); exit;
     	}

    	$verify = $this->AdminModel->fs('user',array('email'=>$email,'password'=>$password,'verify'=>1));   
    	if(empty($verify)){
    	    $array['status'] = 0;
            $array['msg'] = 'Your Account is not verify';
           echo json_encode($array); exit;
     	}
     	
    	$row = $this->AdminModel->fs('user',array('email'=>$email,'password'=>$password,'status'=>1));   
  
        if(empty($row)){
    	    $array['status'] = 0;
            $array['msg'] = 'Your Account is deactived';
            echo json_encode($array); exit;
    	 }else{
    	     
    	     if(empty($row->reg_type)){
    	          $array['status'] = 1;
    	          $array['user_id'] = encrypt_url($row->id);
    	          $array['type']='new';
    	     }else{
    	     
    	      $array['status'] = 1;
    	      $array['msg'] = 'Login success';
    	      $this->session->set('user_id',$row->id);
    	      $this->session->set('userDetail',$row->id);
               if (!empty($curl = $this->session->get('curl'))) {
                 $array['redirect'] = $curl;
              }else{
                $array['redirect'] = 'dashboard'; 
              }  
    	     }
              echo json_encode($array);
    	 }
        
      }
	
}


//////////////////



function product_listing(){
	$data['meta_title'] = 'booking | Smart Parts';
	return view('frontend/product_listing',$data);
}


function product_detail(){
	$data['meta_title'] = 'product_detail | Smart Parts';
	return view('frontend/product_detail',$data);
}



function blogs(){
    
    $model = new FrontModel();
    
	$data['meta_title'] = 'Blogs | Smart Parts';
	$meta = $this->AdminModel->fs('front_menu',array('link'=>$this->uri->getSegment(1)));
	$data['meta_title'] = $meta->meta_title;
	$data['meta_keyword'] = $meta->meta_keyword;
	$data['meta_keyword'] = $meta->meta_keyword;
	$data['meta'] = $meta;
	$data['blog_category'] = $this->AdminModel->all_fetch('blog_category',array('status'=>1),'sort_order','asc');
	$data['recent'] = $this->AdminModel->all_fetch('blogs',array('status'=>1),'id','desc',4);
		
	 // pagination
    $pager= service('pager'); 
	$page =  (int)(($this->request->getVar('page')!==null)?$this->request->getVar('page'):1);  // offset
	$perPage =  4; //limit
	$total = count($model->get_all_blogs($this->request->getVar('category')));
	$pager->makeLinks($page,$perPage,$total);
	$data['pager'] = $pager;
    
    $data['total_rows'] = $total;
    $data['offset'] = $page; // $page 
    // end	
		
	$data['blogs'] = $model->get_all_blogs(@$this->request->getVar('category'),$perPage,$page);
	
	return view('frontend/blog',$data);
}

function blog_detail(){
    $model = new FrontModel();
    $link = $this->uri->getSegment(2); 
    $data['detail'] = $this->AdminModel->fs('blogs',array('link'=>$link,'status'=>1));
    if(empty($data['detail'])){
        return redirect()->to('blogs');
    }
    
	$data['meta_title'] = $data['detail']->meta_title;
	$data['meta_keyword'] = $data['detail']->meta_keyword;
	$data['meta_description'] = $data['detail']->meta_description;
	$data['meta'] = $data['detail'];
	$data['config_logo'] = $this->config_logo;
	
	
	
	if(!empty(json_decode($data['detail']->related))){
	 	$data['recent'] = $model->get_realted_blogs(json_decode($data['detail']->related));   
	}else{
	    $data['recent'] = $this->AdminModel->all_fetch('blogs',array('status'=>1,'id <>'=>$data['detail']->id),'id','desc',6);
	}


// 	$data['recent'] = $this->AdminModel->all_fetch('blogs',array('status'=>1,'id <>'=>$data['detail']->id),'id','desc',6);
	
	
	
	$pre = array();
	$next = array();
	
	
	  $pre = $this->AdminModel->fs('blogs',array('id <'=>$data['detail']->id,'status'=>1));
	  if(!empty($pre)){
	    $data['pre'] = $pre;  
	  }else{
	       $data['pre'] =  end($data['recent']);
	  }
	  $next = $this->AdminModel->fs('blogs',array('id >'=>$data['detail']->id,'status'=>1));
	   if(!empty($next)){
	    $data['next'] = $next;  
	  }else{
	    $data['next'] = $data['recent'][0]; 
	  }
	
	return view('frontend/blog_detail',$data);
	
}


function careers(){
    $meta = $this->AdminModel->fs('front_menu',array('link'=>$this->uri->getSegment(1)));
	$data['meta_title'] = $meta->meta_title;
	$data['meta_keyword'] = $meta->meta_keyword;
	$data['meta_keyword'] = $meta->meta_keyword;
	$data['meta'] = $meta;
	$data['config_logo'] = $this->config_logo;
	$data['heading'] = $this->AdminModel->fs('career_heading',array('status'=>1));
	$data['career_gallery'] = $this->AdminModel->all_fetch('career_gallary',array('status'=>1),'sort_order','asc');
	$data['lifeat'] = $this->AdminModel->all_fetch('lifeat',array('status'=>1),'sort_order','asc');
	return view('frontend/careers',$data);
}




function notfound(){
    $meta = $this->AdminModel->fs('front_menu',array('link'=>$this->uri->getSegment(1)));
	$data['meta_title'] = 'Page Not Found';
	$data['meta_keyword'] = 'Page Not Found';
	$data['meta_keyword'] = 'Page Not Found';
	$data['meta'] = array();;
	$data['config_logo'] = $this->config_logo;

	return view('frontend/404',$data);
}








function save_career_enquiry(){
  $array = array();
    if ($this->request->getMethod()=='post') {

    	$rules = [
    		'name' =>['label'=>'Name','rules'=>'required|min_length[3]'],
			'phone' =>['label'=>'Mobile','rules'=>'required|min_length[10]|max_length[11]'],
    		'email' =>['label'=>'Email','rules'=>'required|valid_email'],
    		'designation' =>['label'=>'Desgination','rules'=>'required'],
    	];

    	if ($this->validate($rules)==false) {
    		$array['status']=0;
    		$array['name'] = $this->validation->getError('name');
    		$array['email'] = $this->validation->getError('email');
    		$array['phone'] = $this->validation->getError('phone');
    		$array['designation'] = $this->validation->getError('designation');

    	}else{

    	$save = array();
    	$save['name'] = $this->request->getVar('name');
    	$save['email'] = $this->request->getVar('email');
    	$save['phone'] = $this->request->getVar('phone');
    	$save['designation'] = $this->request->getVar('designation');
    	$save['create_date'] = date('Y-m-d H:i:s');

    	$file = $this->request->getFile('resume');
		  if(!empty($_FILES['resume']['name'])){
		   if($file->isValid() && !$file->hasMoved()){
			   $file_name = $file->getRandomName();
			   if($file->move('uploads/images/', $file_name)){
				   $save['resume'] = 'uploads/images/'.$file_name;
			   }
			}else{
			  
		   }
		  }

		  $result = $this->AdminModel->insertData('career_enquiry',$save);
		  if ($result) {
		  	$array['status'] = 1;
		  	$array['msg']= 'Request send successfully';
		  	echo json_encode($array);
		  }else{
		  	$array['status'] = 0;
		  	$array['msg']= 'Something went wrong please retry';
		  	echo json_encode($array);
		  }

		}
    }
}



function faq(){
	$data['meta_title'] = 'faq | Smart Parts';
	return view('frontend/faq',$data);
}


function search(){
	$data['meta_title'] = 'search | Smart Parts';
	return view('frontend/search',$data);
}

// function thank_you(){
// 	$data['meta_title'] = 'thanks you | Smart Parts';
// 	return view('frontend/thank_you',$data);
// }

// function products(){
// 	$data['meta_title'] = 'thanks you | Smart Parts';
// 	return view('frontend/product_listing',$data);
// }

function forgot(){
	$data['meta_title'] = 'forgot password | Smart Parts exports';
	return view('frontend/forgot',$data);
}


function forget_send(){
$array = array();
if(!empty($this->request->getMethod()=='post')){
    
$setting = $this->AdminModel->all_fetch('setting',array('code'=>'config'));
foreach ($setting as $key => $value) {
  $wconfig[$value->key] = $value->value;
}

$email = $this->request->getVar('email');
$check = $this->AdminModel->fs('user',array('email'=>$email));
if(empty($check)) {
$array['status'] = 0;
$array['msg'] = 'This Email doesn`t exists';
echo json_encode($array);
}else{
    
    $save = array();
    $save['email'] = $email;
    $save['logo'] = $wconfig['config_logo'];

    $token = rand(1111,9999);
    
    $this->AdminModel->updateData('user',array('token'=>$token),array('email'=>$email));
    $row = $this->AdminModel->fs('user',array('email'=>$email));
    $save['first_name'] = $row->first_name;
    $save['wconfig'] = $wconfig;
    $save['link']= base_url('reset-password/'.encrypt_url($email).'/'.encrypt_url($row->token));    
    
    $save['create_date'] = date('Y-m-d H:i:s A');
      
        $email = \Config\Services::email();

        // email send
		$config['mailType'] = 'html';
		$config['wordWrap'] = true;
		$email->initialize($config);
		$email->setFrom($wconfig['sending_email'], $wconfig['config_name']);
		$email->setTo($save['email']);
		// $email->setCC('rakesh@cyberworx.in');
		$email->setSubject('Password recovery email from '.$wconfig['config_name']);
		$message = view('frontend/forget_template',$save);
		$email->setMessage($message);
		$email->send();
      
      $array['status'] = 1;
      $array['msg'] ='Password recovery email has been shared to your registered email address.';
      echo json_encode($array);
  }  
    
 }
}


function reset_password(){
    $valid = 0;
    $data['meta_title'] ='Smart parts - Reset password';
    $email = decrypt_url($this->uri->getSegment(2));
    $token = decrypt_url($this->uri->getSegment(3));
    $check = $this->AdminModel->fs('user',array('email'=>$email,'token'=>$token));

    if(empty($check)){
     $valid = 1; 
    }
    $data['valid'] = $valid;
    $data['email'] = $this->uri->getSegment(2);       
    echo view('frontend/reset_password',$data);
}


function reset_save(){
	$array = array();
	if ($this->request->getMethod()=='post') {
	 $rules = [
	 	'password'=>['label'=>'Passowrd','rules'=>'required|min_length[6]'],
	 	'c_pass'=>['label'=>'Confirm Passowrd','rules'=>'required|min_length[6]|matches[password]'],
	 ];

	if($this->validate($rules)==FALSE){
	$array['status'] = 0;
	$array['password'] = $this->validation->getError('password');
	$array['c_pass'] = $this->validation->getError('c_pass');
	echo json_encode($array);
	}else{

	$email = decrypt_url($this->request->getVar('email'));
	$result = $this->AdminModel->updateData('user',array('password'=>md5($this->request->getVar('password'))),array('email'=>$email));
	if($result){
	$this->AdminModel->updateData('user',array('token'=>''),array('email'=>$email));  
	$array['status'] =1;
	$array['msg'] ='Password reset successfully';
	echo json_encode($array);
	}else{
	$array['status'] =0;
	$array['msg'] ='Something getting wrong please retry';
	echo json_encode($array);
	    
	}    
	    
	}
   
   }

}
///////////////////


function get_state(){
   $country_id = $this->request->getVar('country_id');
   $ss = '';
   if ($country_id) {
     $state_list = $this->AdminModel->all_fetch('state',array('country_id'=>$country_id));
     if ($state_list) {
         $ss .='<option value="">Select option </option>';
        foreach ($state_list as $key => $value) {
          $ss .="<option value=".$value->id."  > ".$value->name."</option>";
        }
     }else{
        $ss .='<option value="">Not Available</option>';
     }
   }
echo $ss;

}



function search_result(){
	$model = new ProductFrontModel();

	$keyword = $this->request->getVar('keyword');

	$ss = '';
	$ss .='<div class="list-group">';
	if ($keyword) {
	    
	$category = $model->get_category($keyword);
	if (!empty($category)) {
	 foreach ($category as $key => $value) {
	$ss .='<a href="'.base_url('category/'.$value->keyword).'" class="list-group-item list-group-item-action">'.$value->name.' - Category</a>';
	     }
	        
	 }     
	// product
	$product = $model->get_product_search($keyword);
	if (!empty($product)) {
	 foreach ($product as $key => $value) {
	$ss .='<a href="'.base_url('product/'.$value->product_seo_url).'" class="list-group-item list-group-item-action">'.$value->name.' - '.$value->part_no.' - Product</a>';
	    }
	        
	 }  


	}

	$ss .='</div>';

	 echo $ss;
   }

////////////////////////

// GOOGLE LOGIN

function google_login(){
$array = array();

  $name = $this->request->getVar('name');
  $email = $this->request->getVar('email');
  $gpicture = $this->request->getVar('gpicture');
  $oauth_uid = $this->request->getVar('oauth_uid');
  $oauth_provider = 'google';
  $where = array('oauth_provider'=>$oauth_provider,'oauth_uid'=>$oauth_uid);
  $user = $this->AdminModel->fs('user',$where);
  if(!empty($user)){
      
      if(empty($user->reg_type)){
             $array['status'] = 1;
              $array['type'] = 'new';
              $array['user_id'] = encrypt_url($user->id); 
             echo json_encode($array);  
      }else{
      
      $this->session->set('user_id',$user->id);
      $this->session->set('userDetail',$user->id);
      $this->session->setFlashdata("succ_msg","Login Succesfully !!");
      if (!empty($curl = $this->session->get('curl'))) {
            $array['status'] =1;
            $array['url'] = $curl;
           echo json_encode($array);
          }else{
             $array['status'] =1;
             $array['url'] = 'home';
             echo json_encode($array);  
        }
      }
      
    }
else{
    

  $user = $this->AdminModel->fs('user',array('email'=>$email));
  if($user){
       $arr = array('oauth_provider'=>$oauth_provider,'oauth_uid'=>$oauth_uid);
        $this->AdminModel->updateData('user',$arr,array('email'=>$email));
    
      if(empty($user->reg_type)){
             $array['status'] = 1;
             $array['type'] = 'new';
             $array['user_id'] = encrypt_url($user->id); 
             echo json_encode($array);  
      }else{   
          
        $this->session->set('user_id',$user->id);
        $this->session->set('userDetail',$user->id);
        $this->session->setFlashdata("succ_msg","Login Succesfully !!");
       if (!empty($curl = $this->session->get('curl'))) {
            $array['status'] =1;
            $array['url'] = $curl;
           echo json_encode($array);
          }else{
             $array['status'] =1;
             $array['url'] = 'home';
             echo json_encode($array);  
          } 
      }

  }else{
    $ip = getIp();
    $country = getUserCountry($ip); 
    $cnt = $this->AdminModel->fs('country',array('name'=>$country));
    $country = $cnt->id; 
    if($cnt->id==99){
        $customer_group_id = 3;
    }else{
        $customer_group_id = 5;
    }
    
    $data1 = array('first_name'=>$name,'email'=>$email,'fphoto'=>$gpicture,'oauth_uid'=>$oauth_uid,'oauth_provider'=>$oauth_provider,'status'=>1,'verify'=>1,'country'=>$country,'customer_group_id'=>$customer_group_id);
    $this->AdminModel->insertData('user',$data1);
    $user_data = array('email'=>$email);
    $user = $this->AdminModel->fs('user',$user_data);
    $array['type'] = 'new';
    $array['user_id'] = encrypt_url($user->id); 
    
     if (!empty($curl = $this->session->get('curl'))) {
            $array['status'] =1;
            $array['url'] = $curl;
           echo json_encode($array);
          }else{
             $array['status'] =1;
             $array['url'] = 'home';
             echo json_encode($array);  
          }
    
  } 
  
 }
}


// facebook_login

function facebook_login(){
$array = array();

  $first_name = $this->request->getVar('first_name');
  $last_name = $this->request->getVar('last_name');
  $email = $this->request->getVar('email');
//   $gpicture = $this->request->getVar('fphoto');
  $oauth_uid = $this->request->getVar('oauth_uid');
  $oauth_provider = 'facebook';
  $where = array('oauth_provider'=>$oauth_provider,'oauth_uid'=>$oauth_uid);
  $user = $this->AdminModel->fs('user',$where);
  if(!empty($user)){
      
       if(empty($user->reg_type)){
             $array['status'] = 1;
             $array['type'] = 'new';
             $array['user_id'] = encrypt_url($user->id); 
             echo json_encode($array);  
      }else{   
      $this->session->set('user_id',$user->id);
      $this->session->set('userDetail',$user->id);
      $this->session->setFlashdata("succ_msg","Login Succesfully !!");
      if (!empty($curl = $this->session->get('curl'))) {
            $array['status'] =1;
            $array['url'] = $curl;
           echo json_encode($array);
          }else{
             $array['status'] =1;
             $array['url'] = 'home';
             echo json_encode($array);  
        }
      }
      
    }
else{
    

  $user = $this->AdminModel->fs('user',array('email'=>$email));
  if($user){
       $arr = array('oauth_provider'=>$oauth_provider,'oauth_uid'=>$oauth_uid);
        $this->AdminModel->updateData('user',$arr,array('email'=>$email));
         if(empty($user->reg_type)){
             $array['status'] = 1;
             $array['type'] = 'new';
             $array['user_id'] = encrypt_url($user->id); 
             echo json_encode($array);  
      }else{   
          
        $this->session->set('user_id',$user->id);
        $this->session->set('userDetail',$user->id);
        $this->session->setFlashdata("succ_msg","Login Succesfully !!");
       if (!empty($curl = $this->session->get('curl'))) {
            $array['status'] =1;
            $array['url'] = $curl;
           echo json_encode($array);
          }else{
             $array['status'] =1;
             $array['url'] = 'home';
             echo json_encode($array);  
          }  
      }

  }else{
    $ip = getIp();
    $country = getUserCountry($ip); 
    $cnt = $this->AdminModel->fs('country',array('name'=>$country));
    $country = $cnt->id; 
      
    $data1 = array('first_name'=>$first_name,'last_name'=>$last_name,'email'=>$email,'oauth_uid'=>$oauth_uid,'oauth_provider'=>$oauth_provider,'status'=>1,'verify'=>1,'country'=>$country,'customer_group_id'=>3);
    $this->AdminModel->insertData('user',$data1);
    $user = $this->AdminModel->fs('user',array('email'=>$email));
    
    $array['type'] = 'new';
    $array['user_id'] = encrypt_url($user->id); 
             
     if (!empty($curl = $this->session->get('curl'))) {
            $array['status'] =1;
            $array['url'] = $curl;
           echo json_encode($array);
          }else{
             $array['status'] =1;
             $array['url'] = 'home';
             echo json_encode($array);  
        }
    
    } 
  
 }
}


///////////////

function mail(){
    
    $setting = $this->AdminModel->all_fetch('setting',array('code'=>'config'));
foreach ($setting as $key => $value) {
  $wconfig[$value->key]= $value->value;
} 

     // email send
       	$email = \Config\Services::email();
		$config['mailType'] = 'html';
		$config['wordWrap'] = true;
		$email->initialize($config);
		$email->setFrom($wconfig['sending_email'], $wconfig['config_name']);
		$email->setTo('rakesh@cyberworx.in');
		$email->setSubject('Email test');
		$email->setMessage('Testing');
	echo	$email->send();

}


function cancel_newsletter(){
    $this->session->set('newsletter',1);
   $ip =  $this->request->getIPAddress();
  echo set_cookie('newsletter',encrypt_url($ip),3600);
}

function ip(){
    
    $ip = getIp();
    $detail = getUserCountry($ip);
    print_r($detail);

}


////////////

function update_company_info(){
  
    $array = array();
    $rules = array();
    
   
    $rules['mobile'] = ['label'=>'Whatsapp number','rules'=>'required|numeric|min_length[10]|max_length[10]'];
    // $rules['whatsapp'] = ['label'=>'whatsapp','rules'=>'required|numeric|min_length[10]|max_length[10]'];
    if($this->request->getVar('reg_type')=='company'){
        $rules['company_name'] = ['label'=>'Company Name','rules'=>'required'];
        $rules['company_address'] = ['label'=>'Company Address','rules'=>'required'];
    }
    
   
    if ($this->validate($rules)==false) {
    	$array['status'] = 0;
    
    	$array['mobile'] = $this->validation->getError('mobile');
    	$array['whatsapp'] = $this->validation->getError('whatsapp');
    	echo json_encode($array);

    }else{
    	$save = array();
    
    	$save['mobile'] = $this->request->getVar('mobile');	
        $save['whatsapp'] = $this->request->getVar('whatsapp'); 
        $save['website_link'] = $this->request->getVar('website_link'); 
        $save['company_address'] = $this->request->getVar('company_address'); 
        $save['company_name'] = $this->request->getVar('company_name'); 
        $save['reg_type'] = $this->request->getVar('reg_type');
        $save['phone_code'] = $this->request->getVar('phone_code'); 
    	$save['status'] = 1; 
    	
    	$user_id = decrypt_url($this->request->getVar('auth_id'));
    	
      	$file = $this->request->getFile('bussiness_card');
		   if(!empty($_FILES['bussiness_card']['name'])){
		   if($file->isValid() && !$file->hasMoved()){
			   $file_name = $file->getRandomName();
			   if($file->move('uploads/images/', $file_name)){
				   $save['bussiness_card'] = 'uploads/images/'.$file_name;
			   }
			}
		  }
    	
    	$result = $this->AdminModel->updateData('user',$save,array('id'=>$user_id));
    	if (!empty($result)) {
    	    $user = $this->AdminModel->fs('user',array('id'=>$user_id));
    	    
    	     $this->session->set('user_id',$user->id);
             $this->session->set('userDetail',$user->id);
    	    $array['status'] =1;
    	    $array['msg'] = 'Registration successfully';
    	     if (!empty($curl = $this->session->get('curl'))) {
            $array['redirect'] = $curl;
             }else{
             $array['redirect'] = 'home';
             }
    	    echo json_encode($array);
          }else{
            $array['status'] = 0;
    	    $array['msg'] = 'Something went wrong please retry';
    	    echo json_encode($array);
        }
    }
}

}
