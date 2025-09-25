<?php

namespace App\Controllers;
use App\Models\FrontModel;
use App\Models\ProductFrontModel;
use App\Models\CommonModel;


class Product extends BaseController
{
   
   
   public function __construct()
   {
      $session = \Config\Services::session();
      helper(['general']);
      $AdminModel = new CommonModel();
         $setting = $AdminModel->all_fetch('setting',array('code'=>'config'));
         foreach($setting as $value){
             $wconfig[$value->key] = $value->value;
         }
       $this->config_logo = $wconfig['config_icon']; 
       $this->store_breadcum = $wconfig['store_breadcum'];   
   }



function categories(){
       $meta = $this->AdminModel->fs('front_menu',array('link'=>'categories'));    
      $data['meta_title'] = $meta->meta_title;
      $data['meta_keyword'] = $meta->meta_keyword;
      $data['meta_description'] = $meta->meta_description;
      $data['meta'] = $meta;
      $data['list'] = $this->AdminModel->all_fetch('category',array('status'=>1),'sort_order','asc'); 
      
      $data['breadcrumbs'] = array();
       $data['breadcrumbs'][] = array(
      'href' => base_url(),
      'text' => $this->store_breadcum
    );
    
    $data['breadcrumbs'][] = array(
      'href' => current_url(),
      'text' => 'Categories'
     );

      return view('frontend/categories',$data);
}


  // product category page
 function product_category(){

   $data['config_logo'] = $this->config_logo;    
   $model = new ProductFrontModel();
   $keyword = $this->uri->getSegment(2); // category_url
   $category = $this->AdminModel->fs('category',array('keyword'=>$keyword));  
   $data['category'] = $category;
   $data['meta_description']= $category->meta_description;
   $data['meta_keyword']= $category->meta_keyword;
   $data['meta_title']= $category->meta_title;
   $data['meta'] = $category;
  // pagination
  $pager= service('pager'); 
  $page =  (int)(($this->request->getVar('page')!==null)?$this->request->getVar('page'):0);  // offset
  $perPage =  12; //limit
  $filter_data = array();
  $filter_data['category_id'] = $category->id;
  $filter_data['filter'] = $this->request->getVar();
  $filter_data['limit'] = $perPage;
  $filter_data['offset'] = $page;

   $data['product'] = $model->get_all_product_by_Category($filter_data);
   $statics = $model->get_count_product_by_Category($filter_data);
 
  $total = $statics['total'];
  $data['min'] = $statics['min'];
  $data['max'] = $statics['max'];
      
  $pager->makeLinks($page,$perPage,$total);
  $data['pager'] = $pager;
    
    $data['total_rows'] = $total;
    $data['offset'] = $perPage; // $page 
     // end

   $data['record_upto'] = $total;
   
    
    $data['breadcrumbs'] = array();
       $data['breadcrumbs'][] = array(
      'href' => base_url(),
      'text' => $this->store_breadcum
    );
    
     if(!empty($category)){
         $data['breadcrumbs'][] = array(
      'href' => base_url('categories'),
      'text' => 'Categories'
     );
     
    $data['breadcrumbs'][] = array(
      'href' => base_url('category/'.$category->keyword),
      'text' => $category->name
     );
     }
     

   $data['wishlist'] = $model->get_user_wishlist();
   
   $data['filter'] =array(); //$model->get_filter_option($category->id);
   $data['home_heading'] = $this->AdminModel->fs('home_heading',array('status'=>1));
   return view('frontend/product',$data);
}



function get_product_ajax(){

    $model = new ProductFrontModel();
    $category_id = $this->request->getVar('category_id'); 
    $data['config_logo'] = $this->config_logo;
    $page =  (int)(($this->request->getVar('offset')!==null)?$this->request->getVar('offset'):1);  // offset
    $perPage =  12; //limit
   
    $filter_data = array();
    $filter_data['category_id'] = $category_id;
    $filter_data['filter'] = $this->request->getVar();
    $filter_data['limit'] = $perPage;
    $filter_data['offset'] = $page;
    $data['product'] = $model->get_all_product_by_Category($filter_data); 

    $data['category'] = $this->AdminModel->fs('category',array('id'=>$category_id));  
    $data['wishlist'] = $model->get_user_wishlist();
    $ss = '';
    if(!empty($data['product'])){
     $ss .= view('frontend/includes/product_ajax',$data); 
     $array['status'] = 1;
     $array['ss'] = $ss;
     $array['offset'] = $page+$perPage;
     echo json_encode($array);
    }else{
    
      if(!empty($this->request->getVar('type')=='filter')){
        $array['clear'] =1;
      }         
        
     $array['status'] = 0;
     $array['msg'] = 'No More Available';
     echo json_encode($array);
    }
}

////////////////



public function product_detail()
   {  
       
     if($this->uri->getSegment(1)=='categories'){
         $product_seo_url = $this->uri->getSegment(3);
         $cat_seo_url = $this->uri->getSegment(2);
     } else if($this->uri->getSegment(1)=='brand'){
         $product_seo_url = $this->uri->getSegment(4);
         $brad_seo_url = $this->uri->getSegment(3);
         $brad_cat_seo_url = $this->uri->getSegment(2);
       } else{
           $product_seo_url = $this->uri->getSegment(2);
           $keyword = '';
       }
       
        $model = new ProductFrontModel();
        $row = $this->AdminModel->fs('product',array('product_seo_url'=>$product_seo_url));
        $data['product'] = $model->get_product($row->id);
        $data['product_images'] = $this->AdminModel->all_fetch('product_image',array('product_id'=>$row->id),'sort_order','asc');
        $data['product_attribute']  = $model->get_product_attribute($row->id);
       $data['related_product']  = $model->get_related_product($row->id,$row->brand);
        $data['meta_title'] = $row->meta_title;
        $data['meta_keyword'] = $row->meta_keyword;
        $data['meta_description'] = $row->meta_description;
        $data['meta'] = $row;
          
        $data['config_logo'] = $this->config_logo; 
       
       
       $data['breadcrumbs'] = array();
       $data['breadcrumbs'][] = array(
      'href' => base_url(),
      'text' => $this->store_breadcum
      );
    
     
    
     if(!empty($cat_seo_url)){
     $category = $this->AdminModel->fs('category',array('keyword'=>$cat_seo_url));      
       $data['breadcrumbs'][] = array(
      'href' => base_url('#categories'),
      'text' => 'Categories'
       );
     
      $data['breadcrumbs'][] = array(
      'href' => base_url('category/'.$category->keyword),
      'text' => $category->name
      );
      
     }
     
     
    if(!empty($brad_cat_seo_url)){
     $brand_category = $this->AdminModel->fs('brand_category',array('seo_url'=>$brad_cat_seo_url));      
       $data['breadcrumbs'][] = array(
      'href' => base_url('#'.$brand_category->seo_url),
      'text' => $brand_category->name
       );
      $brand = $this->AdminModel->fs('brands',array('seo_url'=>$brad_seo_url)); 
      $data['breadcrumbs'][] = array(
      'href' => base_url('brands/'.$brand_category->seo_url.'/'.$brand->seo_url),
      'text' => $brand->name
      );
      
      $data['brand_category'] =$brand_category;
      $data['brand'] =$brand;
      
     }
     
     
     
     $data['breadcrumbs'][] = array(
    'href' => current_url(),
    'text' => $data['product']['name']
     );

     $data['rating_list'] = $this->AdminModel->all_fetch('rating',null,'id','desc');  
     
     $data['product_review'] = $model->get_product_review($row->id,2);
     $data['review_total'] = $model->get_product_review($row->id);
     $data['offset'] = 4;

      return view('frontend/product_detail',$data);   
   }
   
   
   function get_product_review(){
 
    $model = new ProductFrontModel();
    $product_id = decrypt_url($this->request->getVar('p_id')); 
    $page =  (int)(($this->request->getVar('offset')!==null)?$this->request->getVar('offset'):1);  // offset
    $perPage =  10; //limit
    $total = count($model->get_product_review($product_id)); 
    $data['product_review'] = $model->get_product_review($product_id,$perPage,$page); 
    $ss = '';
    if(!empty($data['product_review'])){
     $ss .= view('frontend/includes/review_ajax',$data); 
     $array['status'] = 1;
     $array['ss'] = $ss;
     $array['offset'] = $page+$perPage;
       $array['msg'] = 'Load More';
     echo json_encode($array);
    }else{
     $array['status'] = 0;
     $array['msg'] = 'No More Available';
     echo json_encode($array);
    }
}
   
//////////


public function send_product_enquiry()
   {
       $email = \Config\Services::email();
      $array = array(); 
               
       $rules = [
         'p_id' =>['label'=>'Product','rules'=>'required'],
         'name' =>['label'=>'Name','rules'=>'required'],
         'email' =>['label'=>'Email','rules'=>'required|valid_email'],
         'phone' =>['label'=>'Phone','rules'=>'required|min_length[10]|max_length[11]'],
        ];

        if ($this->validate($rules)==FALSE) {
         $array['status'] =0;
         $array['product_id'] = $this->validation->getError('p_id');
         $array['name'] = $this->validation->getError('name');
         $array['email'] = $this->validation->getError('email');
         $array['phone'] = $this->validation->getError('phone');
         echo json_encode($array);

        }else{
         $save = array();
         $save['product_id'] = $this->request->getVar('p_id');
         $save['name'] = $this->request->getVar('name');
         $save['email'] = $this->request->getVar('email');
         $save['phone'] = $this->request->getVar('phone');
         $save['message'] = $this->request->getVar('message');
         $save['create_date'] = date('Y-m-d H:i:s');
         $check = $this->AdminModel->fs('product_enquiry',array('product_id'=>$save['product_id'],'email'=>$save['email']));

         if (!empty($check)) {
         $result = $this->AdminModel->updateData('product_enquiry',$save,array('product_id'=>$save['product_id'],'email'=>$save['email']));
         }else{
         $result = $this->AdminModel->insertData('product_enquiry',$save); 
         }

         if($result){
         

           $setting = $this->AdminModel->all_fetch('setting',array('code'=>'config'));
             foreach ($setting as $key => $value) {
               $wconfig[$value->key] = $value->value;
             }
            $product = $this->AdminModel->fs('product',array('id'=>$save['product_id'])); 
          $save['product_name'] = $product->name; 
          $save['config_name'] = $wconfig['config_name'];
          $to = strtolower($wconfig['config_email']);

             // mail send
            $config['mailType'] = 'html';
            $config['wordWrap'] = true;
            $email->initialize($config);

            $email->setFrom('Smart parts@support.com', $save['config_name']);
            $email->setTo($to);
            $email->setCC('rakesh@cyberworx.in');
            $email->setSubject('New Product Enquiry From Smart parts product page');
            $message = view('frontend/product_enquiry',$save);
            $email->setMessage($message);
            $email->send();

               // end
               $array['status'] =1;
               $array['msg'] = 'Product Enqury Submitted successfully';
               echo json_encode($array);
            }else{
               $array['status'] =0;
               $array['msg'] = 'Something went wrong';
               echo json_encode($array);
            }
        }
   }
////////////////

 function send_review(){
     $array = array();
     
      if(empty($this->session->get('user_id'))){
        $array['status'] = 0;
        $array['msg'] = 'Please Login first !!';
        $array['redirect'] = 'login';
        echo json_encode($array);
        exit;
    }
     
  if($this->request->getVar()){
    $save = array();
    $save['product_id'] = decrypt_url($this->request->getVar('p_id'));
    $save['fname'] = $this->request->getVar('fname');
    $save['title'] = $this->request->getVar('title');
    $save['lname'] = $this->request->getVar('lname');
    $save['rating'] = $this->request->getVar('rating');
    $save['review'] = $this->request->getVar('review');
    $save['create_date'] = date('Y-m-d H:i:s');
    $save['modify_date'] = date('Y-m-d H:i:s');
    $save['customer_id'] = $this->session->get('user_id');
    $result = $this->AdminModel->insertData('product_review',$save);            
    if ($result) {
         $array['status'] = 1;
        $array['msg'] = 'Review Submitted successfully it will be show after administration verify !!';
        echo json_encode($array);
    }else{
      $array['status'] = 0;
        $array['msg'] = 'something went wrong please retry';
        echo json_encode($array);
    }

  }
}


function search(){
    $data['meta_title'] = 'Search Page';
    echo view('frontend/search',$data);
}



function most_popular_part(){
    $model = new ProductFrontModel();
    $meta = $this->AdminModel->fs('front_menu',array('link'=>$this->uri->getSegment(1)));    
    $data['meta_title'] = $meta->meta_title;
    $data['meta_keyword'] = $meta->meta_keyword;
    $data['meta_description'] = $meta->meta_description;
    $data['meta'] = $meta;
    $data['config_logo'] = $this->config_logo;    

  // pagination
  $pager= service('pager'); 
  $page =  (int)(($this->request->getVar('page')!==null)?$this->request->getVar('page'):0);  // offset
  $perPage =  12; //limit

  $filter_data = array();
  $filter_data['filter'] = @$this->request->getVar();
  $filter_data['limit'] = $perPage;
  $filter_data['offset'] = $page;

  $data['product'] =  $model->get_all_most_popular_part($filter_data);
  $statics =  $model->get_count_most_popular_part($filter_data);
  $total = $statics['total'];
  $data['min'] = $statics['min'];
  $data['max'] = $statics['max'];

  $pager->makeLinks($page,$perPage,$total);
  $data['pager'] = $pager;
  $data['total_rows'] = $total;
  $data['offset'] = $perPage; // $page 
  // end
 
  $data['record_upto'] = count($data['product']);
       
    $data['breadcrumbs'] = array();
       $data['breadcrumbs'][] = array(
      'href' => base_url(),
      'text' => $this->store_breadcum
    );
    
  
     $data['breadcrumbs'][] = array(
      'href' => current_url(),
      'text' => 'most popular part',
     );
     

   $data['wishlist'] = $model->get_user_wishlist();
   
  $data['filter'] = $model->get_all_filter();
   $data['home_heading'] = $this->AdminModel->fs('home_heading',array('status'=>1));
   return view('frontend/most_popular_part',$data);
}


function get_most_product_part_ajax(){

    $model = new ProductFrontModel();
    $page =  (int)(($this->request->getVar('offset')!==null)?$this->request->getVar('offset'):1);  // offset
    $perPage =  12; //limit

    $filter_data = array();
    $filter_data['filter'] = @$this->request->getVar();
    $filter_data['limit'] = $perPage;
    $filter_data['offset'] = $page;

    $data['product'] =  $model->get_all_most_popular_part($filter_data);
    $data['wishlist'] = $model->get_user_wishlist();
    $data['config_logo'] = $this->config_logo;
    $ss = '';
    if(!empty($data['product'])){
     $ss .= view('frontend/includes/most_popular_part_ajax',$data); 
     $array['status'] = 1;
     $array['ss'] = $ss;
     $array['offset'] = $page+$perPage;
     echo json_encode($array);
    }else{
        
       if(!empty($this->request->getVar('type')=='filter')){
        $array['clear'] =1;
      }               
     $array['status'] = 0;
     $array['msg'] = 'No More Available';
     echo json_encode($array);
    }
}

/////////////////////

// BRAND PRODCUT


  public function brand_category()
  { 

     $model = new ProductFrontModel();

     $category = $this->uri->getSegment(2); // brand category
     $brand_seo = $this->uri->getSegment(3); // brand
    
    $brand_category = $this->AdminModel->fs('brand_category',array('seo_url'=>$category));
    
    
    $brand = $this->AdminModel->fs('brands',array('seo_url'=>$brand_seo,'brand_cat_id'=>$brand_category->id));
    
    if(empty($brand_category)){
      return redirect()->to('home');
    }
    
    $data['meta_title'] = $brand->meta_title;
    $data['meta_description'] =  $brand->meta_description;
    $data['meta_keyword'] =  $brand->meta_keyword;
    $data['meta'] = $brand;
  
  
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
      'href' => base_url('#'.$brand_category->seo_url),
      'text' => $brand_category->name
     );
     
      $data['breadcrumbs'][] = array(
      'href' => current_url(),
      'text' => $brand->name
     );
      
 
  // pagination
  $pager= service('pager'); 
  $page =  (int)(($this->request->getVar('page')!==null)?$this->request->getVar('page'):0);  // offset
  $perPage =  12; //limit

  $filter_data = array();
  $filter_data['filter'] = @$this->request->getVar();
  $filter_data['limit'] = $perPage;
  $filter_data['offset'] = $page;
  $filter_data['brand_id'] = $brand->id;
  $searchKey = "";
  if(strlen($this->request->getVar('search')) > 0 || 
    strlen($this->request->getVar('sorting')) > 0 || 
    strlen($this->request->getVar('smart_honeypot')) > 0 
    ){
      $searchKey = "active";
  }
  
  if($offset > 0 || $searchKey=='active'){
      $data['product'] =  $model->get_all_product_by_brand($filter_data);
  }else{
       $data['product'] = array();
  }
  $data['searchKey'] =$searchKey;
  $statics =  $model->get_count_brand_product($filter_data);
  $total = $statics['total'];
  $data['min'] = $statics['min'];
  $data['max'] = $statics['max'];
  $data['brand_id'] = $brand->id;
  $pager->makeLinks($page,$perPage,$total);
  $data['pager'] = $pager;
  $data['total_rows'] = $total;
  $data['offset'] = $perPage; // $page 
  // end
 
  $data['record_upto'] = count($data['product']);
       
  $data['config_logo'] = $this->config_logo; 
  $data['wishlist'] = $model->get_user_wishlist();
  $data['filter'] = $model->get_all_filter();
  $data['brand_category'] =  $brand_category;
  $data['brand'] =  $brand;
  $data['home_heading'] = $this->AdminModel->fs('home_heading',array('status'=>1));
  return view('frontend/brand_category',$data);   
  
 }


function get_brand_product_ajax(){

    $model = new ProductFrontModel();
    $page =  (int)(($this->request->getVar('offset')!==null)?$this->request->getVar('offset'):1);  // offset
    $perPage =  12; //limit

    $filter_data = array();
    $filter_data['filter'] = @$this->request->getVar();
    $filter_data['limit'] = $perPage;
    $filter_data['offset'] = $page;
    $filter_data['brand_id'] = $this->request->getVar('brand_id');
    $data['product'] =  $model->get_all_product_by_brand($filter_data);
    $data['wishlist'] = $model->get_user_wishlist();
    $data['config_logo'] = $this->config_logo;
    
    $data['brand_category'] = $this->AdminModel->fs('brand_category',array('seo_url'=>$this->request->getVar('brand_cat_seo_url')));
    $data['brand'] = $this->AdminModel->fs('brands',array('seo_url'=>$this->request->getVar('brand_seo_url')));
    
    $ss = '';
    if(!empty($data['product'])){
     $ss .= view('frontend/includes/brand_product_ajax',$data); 
     $array['status'] = 1;
     $array['ss'] = $ss;
     $array['offset'] = $page+$perPage;
     echo json_encode($array);
    }else{
        
      if(!empty($this->request->getVar('type')=='filter')){
        $array['clear'] =1;
      }              
     $array['status'] = 0;
     $array['msg'] = 'No More Available';
     echo json_encode($array);
    }
}










}

?>
