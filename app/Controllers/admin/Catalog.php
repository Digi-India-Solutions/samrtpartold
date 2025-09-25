<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\BackendModel;
use App\Models\CommonModel;
use App\Models\CatalogModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Catalog extends BaseController
{

    public function __construct()
    {

       $session = \Config\Services::session();
        if(empty($session->get('adminLogin'))) {
           return redirect()->to('admin/login'); 
        }
        $this->admin_id = $session->get('adminLogin');
        $AdminModel = new CommonModel();
        $default_img = $AdminModel->fs('setting',array('key'=>'config_icon'));
        $this->config_logo = $default_img->value; 
    }

    
    public  function index()
    {
        $model = new CatalogModel();
        $permission = $this->AdminModel->permission($this->uri->getSegment(2));
        if(empty($permission)){
            return redirect()->to('admin/permission-denied');
        }
        
        $data['page_title']  ='Category';
        
        $pager=service('pager'); 
        $config["base_url"] = base_url() . "admin/category";
        $page = (int)(($this->request->getVar('page')!==null)?$this->request->getVar('page'):1);  // offset
        $perPage = 10; // limit
        $data['offset'] = $page <=1?0:$page*$perPage-$perPage; //offset
        $data['filter'] = @$this->request->getVar();
        $data['limit'] = $perPage;
        $total = $model->get_all_category_count($data);
        $data['total_rows'] = $total;
        $data['pages'] = @round($total/$perPage);
        $pager->makeLinks($page,$perPage,$total);
        $data['pager'] = $pager;
        $data['detail'] = $model->get_all_category($data);
        echo view('admin/catalog/category',$data);
    }

    
    function add_category($id=false)
    {   
        $model = new CatalogModel();
        
        $data['category_list'] = $model->get_all_category();
        $data['filter_list'] = $model->get_all_filter(); 
        $data['banner_list'] = $this->AdminModel->all_fetch('banner',null); 
    
     if(!empty($id)) {
       
       $data['page_title'] = ' Edit Category';
       $data['form_action'] ='admin/add_category/'.$id;
       $data['id'] = $id;
   
       $row = $this->AdminModel->fs('category',array('id'=>$id));
       $data['name'] = $row->name;
       $data['description'] = $row->description; 
       $data['meta_title'] = $row->meta_title;
       $data['meta_description'] = $row->meta_description;
       $data['meta_keyword'] = $row->meta_keyword;
       $data['parent_id'] = $row->parent_id;
       $data['image'] = $row->image;
         $data['thumbnail'] = $row->thumbnail;
         $data['icon'] = $row->icon;
       $data['popular_category'] = $row->popular_category;
       $data['trending_category'] = $row->trending_category;
         $data['top'] = $row->top;
       $data['banner_id'] = $row->banner_id;
       $data['sort_order']=$row->sort_order;
       $data['status']=$row->status;
       $data['keyword']=$row->keyword;
       $data['banner_heading']=$row->banner_heading;
       $filter = $this->AdminModel->all_fetch('category_filter',array('category_id'=>$id));
       foreach ($filter as $key => $value) {
         $ss[] = $value->filter_id;
       }   
       $data['filter_id'] = @$ss;
       
       $this->form_user_id = $id;
          
       }else{
       
       $data['page_title'] = ' Add Category';
       $data['form_action'] ='admin/add_category';
       $data['id'] = '';
       $data['trending_category'] = '';
       $data['name'] = '';
       $data['description'] = ''; 
       $data['meta_title'] = '';
       $data['meta_description'] = '';
       $data['meta_keyword'] = '';
       $data['parent_id'] = '';
       $data['image'] = '';
       $data['top'] = '';
       $data['banner_id'] = '';
       $data['sort_order']='';
       $data['status']='';
       $data['keyword']='';
       $data['icon'] = '';
       $data['thumbnail'] = '';
       $data['popular_category'] = '';
       $data['banner_heading']= '';
       $data['filter_id'] = array();
   
       }
   
     
       if($this->request->getMethod()=='post'){
        $rules = [
            'name'=>'required',
        ];

       if ($this->validate($rules)==FALSE) {
          $data['validation'] = $this->validator;
          
        } else{
   
         $save= array();
         $array = array();
   
         $save['name'] =     $this->request->getVar('name');
         
         if(!empty($this->request->getVar('keyword'))){
           $keyword =  sfu($this->request->getVar('keyword'));
         }else{
          $keyword =  sfu($this->request->getVar('name'));
         }

         if (!empty($id)) {
            $existkeyword  = $this->AdminModel->all_fetch('category',array('keyword'=>$keyword,'id <>'=>$id));
         }else{
            $existkeyword  = $this->AdminModel->all_fetch('category',array('keyword'=>$keyword));
         }
         if (!empty($existkeyword)) {
            $keyword = $keyword.count($existkeyword);
         }
         $save['keyword'] = $keyword;

         
         $save['description'] =  $this->request->getVar('description');
         $save['meta_title'] =  $this->request->getVar('meta_title');
         $save['meta_description'] =  $this->request->getVar('meta_description');
         $save['meta_keyword'] =  $this->request->getVar('meta_keyword');
         $save['parent_id'] =  $this->request->getVar('parent_id');
         $save['sort_order'] =  $this->request->getVar('sort_order');
         $save['status'] =  $this->request->getVar('status');
        
         $save['popular_category'] =  $this->request->getVar('popular_category');
         $save['trending_category'] =  $this->request->getVar('trending_category');
         $save['banner_heading'] =  $this->request->getVar('banner_heading');
         $save['top'] =  $this->request->getVar('top');
         $save['banner_id'] =  json_encode($this->request->getVar('banner_id'));
          
        

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

          $file = $this->request->getFile('icon');
          if(!empty($_FILES['icon']['name'])){
           if($file->isValid() && !$file->hasMoved()){
               $file_name = $file->getRandomName();
               if($file->move('uploads/images/', $file_name)){
                   $save['icon'] = 'uploads/images/'.$file_name;
               }
            }else{
               throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
               exit;
           }
          }
          
          $file = $this->request->getFile('thumbnail');
          if(!empty($file->getClientName())){
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
         
        
        
          // filter array
   
          $array['filter'] = $this->request->getVar('filter');
          $array['old_id'] = $this->request->getVar('old_id');
   
         if ($id) {
             $save['modify_date'] = date('Y-m-d H:i:s');
             $result=  $this->AdminModel->updateData('category',$save,array('id'=>$id));
             if ($result) {
             $array['category_id'] = $id;
             $model->save_category_filter($array);
             $this->session->setFlashdata('success','Record Update successfully');
             return redirect()->to('admin/add_category/'.$id);
             }else{
             $this->session->setFlashdata('error','Record not update');
             return redirect()->to('admin/add_category/'.$id);
             }
         }else{
            $save['create_date'] = date('Y-m-d H:i:s');
            $save['modify_date'] = date('Y-m-d H:i:s');
            $result=  $this->AdminModel->insertData('category',$save);
             if ($result) {
             $array['category_id'] = $this->db->insertID();
             $model->save_category_filter($array);
             $this->session->setFlashdata('success','Record insert successfully');
             return redirect()->to('admin/category');
             }else{
             $this->session->setFlashdata('error','Record not insert');
             return redirect()->to('admin/add_category');
             }
   
         }
   
     }
 
  }
     return view('admin/catalog/add_category',$data);
   
}
   
   function delete_category()
   {
       $model = new CatalogModel();
       if ($this->request->getVar()) {
         $id = $this->request->getVar('selected');
         $check =  $model->delete_category($id);
        if ($check) {
          $this->session->setFlashdata('success','Record Delete successfully');
        }else{
         $this->session->setFlashdata('error','Category can not be deleted it assign with a product');
        }
        
       }
        
     return redirect()->to('admin/category');
       
   }

////////////////

function product()
 {
    
    $permission = $this->AdminModel->permission($this->uri->getSegment(2));
    if(empty($permission)){
    return  redirect()->to('admin/permission-denied');
    }
    
    $brand_category = $this->AdminModel->all_fetch('brand_category',array('status'=>1),'sort_order','asc');
    $brand_list = array();
    foreach($brand_category as $bc){
        $arr = array();
        $arr['category'] = $bc;
        $arr['list'] = $this->AdminModel->all_fetch('brands',array('brand_cat_id'=>$bc->id,'status'=>1));
        $brand_list[] = $arr;
    }
    $data['brand_list'] = $brand_list;

    $products = array();
    $model = new CatalogModel();
    $data['page_title']  ='Product';

  // pagination
    $pager=service('pager'); 
    $page = (int)(($this->request->getVar('page')!==null)?$this->request->getVar('page'):1);  // offset
    $perPage =  15; //limt
        
    $data['offset'] = $page <=1?0:$page*$perPage-$perPage;
    $data['filter'] = @$this->request->getVar();
    $data['limit'] = $perPage;

    $total = $model->get_product_count(@$data); 
    $data['total_rows'] = $total;
    $data['pages'] = round($total/$perPage);
    $pager->makeLinks($page,$perPage,$total);
    $data['pager'] = $pager;

    $detail = $model->get_product_list(@$data);
   
    foreach ($detail as $key => $value) {
    $product['id'] = $value->id;
    $product['image'] = $value->image;
    $product['name'] = $value->name;
    $product['part_no'] = $value->part_no;
    $product['price'] = $value->price;
    $product['quantity'] = $value->quantity;
    $product['brand_name'] = $value->brand_name;
    $product['special_price'] = $model->get_special_price($value->id);
    $product['status'] = $value->status;
    $product['seo_url'] = $value->product_seo_url;
    $products[] = $product;
    }

    @$data['detail'] = $products;
    $data['config_logo'] = $this->config_logo;
    
    return view('admin/catalog/product',$data);
 }

 function delete_product()
 {
   
 if ($this->request->getMethod()=='post') {
     $model = new CatalogModel();
    $id = $this->request->getVar('selected');
    $model->delete_product($id);
    $this->session->setFlashdata('success','Record Delete successfully');
 }
 return redirect()->to('admin/product');
 }
 /////////////////


 function add_product($id=false)
 {
     
  $model = new CatalogModel();   
 
  $data['stock_status'] = $this->AdminModel->all_fetch('stock_status',null);
  $data['weight_class'] = $this->AdminModel->all_fetch('weight_class',null);
  $data['length_class'] = $this->AdminModel->all_fetch('length_class',null);
  $data['tax_class'] =     $this->AdminModel->all_fetch('tax_class',null);
  $data['brand_category'] = $this->AdminModel->all_fetch('brand_category',array('status'=>1),'sort_order','asc');
  
  $brand_category = $this->AdminModel->all_fetch('brand_category',array('status'=>1),'sort_order','asc');
        $brands = array();
        if(!empty($brand_category)){
            foreach($brand_category as $category){
                $array = array();
                $array['id']= $category->id;
                $array['name']= $category->name;
                $array['seo_url']= $category->seo_url;
                $array['brand_list'] = $this->AdminModel->all_fetch('brands',array('brand_cat_id'=>$category->id),'sort_order','asc');
                
                $brands[] = $array;
            }
        }
  $data['brands_list'] = $brands;
  
  
//   $data['brands'] =     $this->AdminModel->all_fetch('brands',null);
//   $data['aftermarket_brands'] =     $this->AdminModel->all_fetch('aftermarket_brands',array('status'=>1));
//   $data['twowheeler_brands'] =     $this->AdminModel->all_fetch('twowheeler_brands',array('status'=>1));
//   $data['oem_brands'] =     $this->AdminModel->all_fetch('oem_brands',array('status'=>1));
  $data['manufacturer_list'] = $this->AdminModel->all_fetch('manufacturer',null);
  $data['download_list'] = $this->AdminModel->all_fetch('download',null);
  $data['product_list'] = array();
  $data['option_list'] = $this->AdminModel->all_fetch('option_description',null,'sort_order','asc');
  $data['category_list'] = $model->get_all_category();
  $data['filter_list'] = $model->get_all_filter(); 
  $data['attribute_list'] = $model->get_attribute(); 

  if (@$id) {

    $data['page_title'] = ' Edit product';
    $data['form_action'] ='admin/add_product/'.$id;
     
    $product = $this->AdminModel->fs('product',array('id'=>$id));  

    $data['id'] =  $product->id;
    $data['name'] = $product->name;
    $data['description'] = $product->description; 
    $data['product_description'] = $product->product_description; 
    $data['additional_description'] = $product->additional_description; 
    $data['meta_title'] = $product->meta_title;
    $data['meta_description'] = $product->meta_description;
    $data['meta_keyword'] = $product->meta_keyword;
    $data['tag'] = $product->tag;
    $data['best_seller'] = $product->best_seller;
    $data['feature_product'] = $product->feature_product;
    $data['model'] =$product->model;
    $data['sku'] =$product->sku;
    $data['upc'] = $product->upc;
    $data['ean']=$product->ean;
    $data['jan']= $product->jan;
    $data['isbn']= $product->isbn;
    $data['mpn']= $product->mpn;
    $data['location']= $product->location;
    $data['price']= $product->price;
    $data['tax_class_id']= $product->tax_class_id;
    $data['quantity']= $product->quantity;
    $data['minimum']= $product->minimum;
    $data['subtract']= $product->subtract;
    $data['stock_status_id']= $product->stock_status_id;
    $data['shipping']= $product->shipping;
    $data['date_available']= $product->date_available;
    $data['length']= $product->length;
    $data['width']= $product->width;
    $data['height']= $product->height;
    $data['length_class_id']= $product->length_class_id;
    $data['weight']= $product->weight;
    $data['weight_class_id']= $product->weight_class_id;
    $data['status']= $product->status;
    $data['sort_order']= $product->sort_order;
    $data['manufacturer_id']= $product->manufacturer_id;
    $data['points']= $product->points;
    $data['product_reward']= $product->product_reward;
    $data['product_seo_url']= $product->product_seo_url;
    $data['product_layout']= $product->product_layout;
    $data['image'] = $product->image;
    $data['strip_img'] = $product->strip_img;
    $data['s_img'] = $product->s_img;
    $data['p_video'] = $product->p_video;
    $data['gift'] = $product->gift;
    $data['trending'] = $product->trending;
    $data['return_policy'] = $product->return_policy;
    $data['warranty'] = $product->warranty;
    $data['preorder'] = $product->preorder;
    $data['color_code'] = $product->color_code; 
    $data['color_name'] = $product->color_name;
    $data['best_seller_img'] = $product->best_seller_img;
    
    $data['together_status'] = $product->together_status;
    $data['together_type'] = $product->together_type;
    $data['together_discount'] = $product->together_discount;
    
    $data['part_no'] = $product->part_no;
    $data['origin'] = $product->origin;
    $data['class'] = $product->class;
    $data['brand'] = $product->brand;   
    
    $data['special_price'] =    $product->special_price;   
    $data['date_start'] =     $product->date_start;   
    $data['date_end'] =     $product->date_end;   
    
    $category= $this->AdminModel->all_fetch('product_to_category',array('product_id'=>$id),'product_id');
    foreach ($category as $key => $value) {
    $aa[] = $value->category_id;
    }
    $data['category'] = @$aa;

   $filter = $this->AdminModel->all_fetch('product_filter',array('product_id'=>$id),'product_id');
    foreach ($filter as $key => $value) {
      $bb[] = $value->filter_id;
      }   
    $data['filter'] = @$bb;
   
  
    $related = $this->AdminModel->all_fetch('product_related',array('product_id'=>$id),'product_id');
    foreach ($related as $key => $value) {
      $dd[]= $value->related_id;
    }
    @$data['related'] = @$dd;
   
    $data['attribute'] = $this->AdminModel->all_fetch('product_attribute',array('product_id'=>$id));
    $data['special']= $this->AdminModel->all_fetch('product_special',array('product_id'=>$id));
    $data['product_image']= $this->AdminModel->all_fetch('product_image',array('product_id'=>$id),'id','asc');
    // $data['ing_image']= $this->AdminModel->all_fetch('product_ingredient',array('product_id'=>$id),'id','asc');
    // varient image
    // $data['v_image']= $this->AdminModel->all_fetch('product_varient',array('product_id'=>$id),'id','asc');
    //  $data['product_option'] = $this->AdminModel->all_fetch('product_option',array('product_id'=>$id));
      

    }else{

    $data['page_title'] = ' Add product';
    $data['form_action'] ='admin/add_product';
    $data['id'] = '';
    $data['name'] = '';
    $data['description'] = ''; 
    $data['product_description'] = ''; 
    $data['additional_description'] = ''; 
    $data['meta_title'] = '';
    $data['meta_description'] = '';
    $data['meta_keyword'] = '';
    $data['tag'] = '';
    $data['tag'] = '';
    $data['best_seller'] = '';
    $data['feature_product'] = '';
    $data['model'] ='';
    $data['sku'] ='';
    $data['upc'] = '';
    $data['ean']='';
    $data['jan']= '';
    $data['isbn']= '';
    $data['mpn']= '';
    $data['location']= '';
    $data['price']= '';
    $data['tax_class_id']= '';
    $data['quantity']= '';
    $data['minimum']= '';
    $data['subtract']= '';
    $data['stock_status_id']= '';
    $data['shipping']= '';
    $data['date_available']= '';
    $data['length']= '';
    $data['width']= '';
    $data['height']= '';
    $data['length_class_id']= '';
    $data['weight']= '';
    $data['weight_class_id']= '';
    $data['status']= '';
    $data['sort_order']= '';
    $data['manufacturer_id']= '';
    $data['points']= '';
    $data['product_reward']= '';
    $data['product_seo_url']= '';
    $data['product_layout']= '';
    $data['image'] = '';
    $data['strip_img'] = '';
    $data['s_img'] = '';
    $data['p_video'] = '';
    $data['best_seller_img'] = '';
    $data['gift'] = '';
    $data['trending'] = '';
    $data['return_policy'] = '';
    $data['warranty'] = '';
    $data['preorder'] = '';
    $data['color_code'] =  '';
    $data['color_name'] = '';
    $data['together_status'] = '';
    $data['together_type'] = '';
    $data['together_discount'] = '';
    
    $data['part_no'] ='';
    $data['origin'] ='';
    $data['class'] ='';
    $data['brand'] ='';
    $data['special_price'] =    '';  
    $data['date_start'] =    '';  
    $data['date_end'] =    '';
    
    $data['category']= array();
    $data['filter']= array();
    $data['download']=array();
    $data['related']=array();
    $data['together']=array();
    $data['attribute']=array();
    $data['discount']=array();
    $data['special']=array();
    $data['product_image']=array();
    $data['ing_image']=array();
    $data['product_option']=array();
   
   }



    if($this->request->getMethod()=='post'){

    $rules = [
        'name'=>['label'=>'Name','rules'=>'required'],
    ];

    if ($this->validate($rules)==FALSE) {
        $data['validation'] = $this->validator;
     
     } else{
    
    $save= array();
    
    $save['product_info']['name'] = $this->request->getVar('name');
    $save['product_info']['description'] = $this->request->getVar('description'); 
    $save['product_info']['product_description'] = $this->request->getVar('product_description');
    $save['product_info']['additional_description'] = $this->request->getVar('additional_description');
    $save['product_info']['meta_title'] = $this->request->getVar('meta_title');
    $save['product_info']['meta_description'] = $this->request->getVar('meta_description');
    $save['product_info']['meta_keyword'] = $this->request->getVar('meta_keyword');
    $save['product_info']['tag'] = $this->request->getVar('tag');
    $save['product_info']['best_seller'] = $this->request->getVar('best_seller');
    $save['product_info']['feature_product'] = $this->request->getVar('feature_product');
    $save['product_info']['model'] =$this->request->getVar('model');
    $save['product_info']['sku'] =$this->request->getVar('sku');
    $save['product_info']['upc'] = $this->request->getVar('upc');
    $save['product_info']['ean']=$this->request->getVar('ean');
    $save['product_info']['jan']= $this->request->getVar('jan');
    $save['product_info']['isbn']= $this->request->getVar('isbn');
    $save['product_info']['mpn']= $this->request->getVar('mpn');
  
    $save['product_info']['part_no']= $this->request->getVar('part_no');
    $save['product_info']['origin']= $this->request->getVar('origin');
    $save['product_info']['class']= $this->request->getVar('class');
    $save['product_info']['brand']= $this->request->getVar('brand');
    

    $save['product_info']['special_price']= $this->request->getVar('special_price');
    $save['product_info']['date_start']= $this->request->getVar('date_start');
    $save['product_info']['date_end']= $this->request->getVar('date_end');
    

    $save['product_info']['price']= $this->request->getVar('price');
    // $save['product_info']['tax_class_id']= $this->request->getVar('tax_class_id');
    $save['product_info']['quantity']= $this->request->getVar('quantity');
    $save['product_info']['minimum']= $this->request->getVar('minimum');
    $save['product_info']['subtract']= $this->request->getVar('subtract');
    // $save['product_info']['stock_status_id']= $this->request->getVar('stock_status_id');
    // $save['product_info']['shipping']= $this->request->getVar('shipping');
    // $save['product_info']['date_available']= $this->request->getVar('date_available');
    $save['product_info']['length']= $this->request->getVar('length');
    $save['product_info']['width']= $this->request->getVar('width');
    $save['product_info']['height']= $this->request->getVar('height');
    // $save['product_info']['length_class_id']= $this->request->getVar('length_class_id');
    $save['product_info']['weight']= $this->request->getVar('weight');
    // $save['product_info']['weight_class_id']= $this->request->getVar('weight_class_id');
    $save['product_info']['status']= $this->request->getVar('status');
    $save['product_info']['sort_order']= $this->request->getVar('sort_order');
    $save['product_info']['manufacturer_id']= $this->request->getVar('manufacturer_id');
    // $save['product_info']['points']= $this->request->getVar('points');
    // $save['product_info']['product_reward']= $this->request->getVar('product_reward');
    $save['product_info']['gift']= $this->request->getVar('gift');
    $save['product_info']['trending']= $this->request->getVar('trending');
    // $save['product_info']['p_video'] = $this->request->getVar('p_video');
    $save['product_info']['return_policy'] = $this->request->getVar('return_policy');
    $save['product_info']['warranty'] = $this->request->getVar('warranty');
    // $save['product_info']['color_code'] = $this->request->getVar('color_code');
    // $save['product_info']['color_name'] = $this->request->getVar('color_name');
    
    
    $save['product_info']['together_status'] = $this->request->getVar('together_status'); 
    $save['product_info']['together_type'] = $this->request->getVar('together_type');
    $save['product_info']['together_discount'] = $this->request->getVar('together_discount');

    if(!empty($this->request->getVar('product_seo_url'))){
      $save['product_info']['product_seo_url']= sfu($this->request->getVar('product_seo_url'));    
    }else{
      $save['product_info']['product_seo_url'] = sfu($this->request->getVar('name'));
    }

  
    // array list
    $save['category']= $this->request->getVar('category');
    $save['filter']= $this->request->getVar('filter');
    $save['related']=$this->request->getVar('related');
    // $save['together']=$this->request->getVar('together');
  
    // attribute table
    $save['attribute_id']=$this->request->getVar('attribute_id');
    $save['attribute_text']=$this->request->getVar('attribute_text');


    // special table
   
    $save['special_price']=$this->request->getVar('special_price');
    $save['special_date_start']=$this->request->getVar('special_date_start');
    $save['special_date_end']=$this->request->getVar('special_date_end');
    $save['special_priority']=$this->request->getVar('special_priority');
     $save['customer_group_id']=$this->request->getVar('customer_group_id');
    // $save['product_option'] = $this->request->getVar('product_option');
                   
    //   $save['option_image'] = @$uploadimageoption;
    //   $save['old_option_image'] = $this->request->getVar('old_option_image');
    // $save['option_old_des_id'] = $this->request->getVar('option_old_des_id');
 
          
       $file = $this->request->getFile('image');
       if(!empty($file->getClientName())){
        if($file->isValid() && !$file->hasMoved()){
            $file_name = $file->getRandomName();
            if($file->move('uploads/product/', $file_name)){
                $save['product_info']['image'] = 'uploads/product/'.$file_name;
            }
         }else{
            throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
            exit;
        }
       }

  
      if ($this->request->getFileMultiple('product_image')) {
        foreach($this->request->getFileMultiple('product_image') as $key => $file)
       {  
           if($file->isValid() && !$file->hasMoved()){
           $file_name = $file->getRandomName();
           if($file->move('uploads/product/', $file_name)){
               $uploadImgData[$key] = 'uploads/product/'.$file_name;
           }     
         }
       }
     }
                     
          
      $save['product_image'] = @$uploadImgData;
      $save['image_sort_order'] = $this->request->getVar('image_sort_order');
      $save['old_product_image'] = $this->request->getVar('old_product_image');
      $save['image_id'] = $this->request->getVar('image_id');
  

      //////////////////////////


         if ($id) {
          $save['product_info']['modify_date'] = date('Y-m-d H:i:s');
          $save['id'] = $id;
          $result =  $model->save_product($save);
          if ($result) {
          $this->session->setFlashdata('success','Product Update successfully');
          return redirect()->to('admin/add_product/'.$id);
          }else{
          $this->session->setFlashdata('error','Product not Update!');
          return redirect()->to('admin/add_product/'.$id);
          }
        }else{
         $save['product_info']['create_date'] = date('Y-m-d H:i:s');
         $save['product_info']['modify_date'] = date('Y-m-d H:i:s');
         $result = $model->save_product($save);
      
          if ($result) {
          $this->session->setFlashdata('success','Product Insert successfully');
          return redirect()->to('admin/product');
          }else{
          $this->session->setFlashdata('error','Product not insert');
          return redirect()->to('admin/add_product');
          }

        }
  

      }

    }
 return view('admin/catalog/add_product',$data);

}


///////////////////////////



function manufactures(){

    $permission = $this->AdminModel->permission($this->uri->getSegment(2));
    if(empty($permission)){
        return redirect()->to('admin/permission-denied');
    }
    
    $data['page_title'] = 'Manufactures';
    $data['detail'] = $this->AdminModel->all_fetch('manufacturer',null);
    echo view('admin/catalog/manufacture',$data);
    
    }
    
     function add_manufacture($id=false)
     {
              
    
      if(@$id) {
        
        $data['page_title'] = ' Edit Manufactures';
        $data['form_action'] ='admin/add_manufacture/'.$id;
        $row = $this->AdminModel->fs('manufacturer',array('id'=>$id));
        $data['name'] = $row->name;
        $data['sort_order'] = $row->sort_order; 
        $data['image'] = $row->image;
        $data['seo_url'] = $row->seo_url;
    
        }else{
        
        $data['page_title'] = ' Add Manufactures';
        $data['form_action'] ='admin/add_manufacture';
        $data['name'] = '';
        $data['sort_order'] = '';
        $data['image'] = '';
        $data['seo_url'] = '';
        
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
          $save['seo_url'] =   $this->request->getVar('seo_url');
                 

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
              $result=  $this->AdminModel->updateData('manufacturer',$save,array('id'=>$id));
              if ($result) {
           
              $this->session->setFlashdata('success','Record Update successfully');
              return redirect()->to('admin/add_manufacture/'.$id);
              }else{
              $this->session->setFlashdata('error','Record not Update!');
              return redirect()->to('admin/add_manufacture/'.$id);
              }
          }else{
             
             $result=  $this->AdminModel->insertData('manufacturer',$save);
              if ($result) {          
              $this->session->setFlashdata('success','Record Insert successfully');
              return redirect()->to('admin/add_manufacture');
              }else{
              $this->session->setFlashdata('error','Record not insert');
              return redirect()->to('admin/add_manufacture');
              }
    
          }
    
       }
     }
    return view('admin/catalog/add_manufacture',$data);
    }
    
    
    function delete_manufacture()
    {
        if ($this->request->getVar()) {
            $id = $this->request->getVar('selected');
            if($id){
            foreach($id as $value){ 
                $this->AdminModel->deleteData('manufacturer',array('id'=>$value));
            }
                $this->session->setFlashdata('success','Record Delete successfully');
            }
        }
    return redirect()->to('admin/manufactures');
    }

////////////////


function filter(){
    $permission = $this->AdminModel->permission($this->uri->getSegment(2));
    if(empty($permission)){
        return redirect()->to('admin/permission-denied');
    }
    $data['page_title'] = 'Filter';
    $data['detail'] = $this->AdminModel->all_fetch('filter',null);
    echo view('admin/catalog/filter',$data);
    
    }
    
     function add_filter($id=false)
     {
        $model = new CatalogModel();
           
      if(@$id) {
        
        $data['page_title'] = ' Edit Filter';
        $data['form_action'] ='admin/add_filter/'.$id;
        $row = $this->AdminModel->fs('filter',array('id'=>$id));
        $data['name'] = $row->name;
        $data['sort_order'] = $row->sort_order; 
        $data['detail'] = $this->AdminModel->all_fetch('filter_description',array('filter_id'=>$id),'id','asc');
     
        }else{
        
        $data['page_title'] = ' Add Filter';
        $data['form_action'] ='admin/add_filter';
        $data['name'] = '';
        $data['sort_order'] = '';
        $data['detail'] = array();
        
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
          $save['filter']['name'] =   $this->request->getVar('name');
          $save['filter']['sort_order'] =  $this->request->getVar('sort_order');
          $save['filter_name'] =   $this->request->getVar('filter_name');  
          $save['filter_sort_order'] =   $this->request->getVar('filter_sort_order');
    
          
          if ($id) {
             $save['id'] = $id;
              $result=  $model->save_filter($save);
              if ($result) {
           
              $this->session->setFlashdata('success','Record Update successfully');
              return redirect()->to('admin/add_filter/'.$id);
              }else{
              $this->session->setFlashdata('error','Record not Update!');
              return redirect()->to('admin/add_filter/'.$id);
              }
          }else{
             
             $result=  $model->save_filter($save);
              if ($result) {
              
              $this->session->setFlashdata('success','Record Insert successfully');
              return redirect()->to('admin/add_filter');
              }else{
              $this->session->setFlashdata('error','Record not insert');
              return redirect()->to('admin/add_filter');
              }
    
          }
    
      }
     }
    return view('admin/catalog/add_filter',$data);
    }
  
    
    function delete_filter()
    {
        if ($this->request->getVar()) {
          $id = $this->request->getVar('selected');
          if($id){
            foreach($id as $value){ 
                $this->AdminModel->deleteData('filter',array('id'=>$value));
                $this->AdminModel->deleteData('filter_description',array('filter_id',$value));
             }
            }
          $this->session->setFlashdata('success','Record Delete successfully');
        }
        
    return redirect()->to('admin/filter');
    }

//////////////////////


function attribute_group(){
    $permission = $this->AdminModel->permission($this->uri->getSegment(2));
    if(empty($permission)){
        return redirect()->to('admin/permission-denied');
    }
    $data['page_title'] = 'Attribute Group';
    $data['detail'] = $this->AdminModel->all_fetch('attribute_group',null);
    echo view('admin/catalog/attribute_group',$data);
    
    }
    
    
    
    function check_attribute_name($name){
    
     if ($this->form_user_id) {
       $result = $this->AdminModel->fs('attribute_group',array('name'=>$name,'id <>'=>$this->form_user_id));
      }else{
          $result = $this->AdminModel->fs('attribute_group',array('name'=>$name));
      }
      if ($result) {
       $this->form_validation->set_message('check_attribute_name','Attribute Name Already Exits');
       return false;
       }else{
        return true;
      }
    }
    
    
     function add_attribute_group($id=false)
     {
         
       
        
      if(@$id) {
        
        $data['page_title'] = ' Edit Attribute Group';
        $data['form_action'] ='admin/add_attribute_group/'.$id;
        $data['id'] = $id;
    
        $row = $this->AdminModel->fs('attribute_group',array('id'=>$id));
        $data['name'] = $row->name;
        $data['sort_order'] = $row->sort_order; 
        $this->form_user_id = $id;
           
        }else{
        
        $data['page_title'] = ' Add Attribute Group';
        $data['form_action'] ='admin/add_attribute_group';
        $data['id'] = '';
        $data['name'] = '';
        $data['sort_order'] = '';
        }
    
        if($this->request->getMethod()=='post'){
        
            $rules = [
                'name'=>'required',
            ];

        if ($this->validate($rules)==false) {
            $data['validation'] = $this->validator;

         } else{
    
          $save= array();
          $save['name'] =   $this->request->getVar('name');
          $save['sort_order'] =  $this->request->getVar('sort_order');
        
              
          if ($id) {
             
              $result=  $this->AdminModel->updateData('attribute_group',$save,array('id'=>$id));
              if ($result) {
           
              $this->session->setFlashdata('success','Record Update successfully');
              return redirect()->to('admin/add_attribute_group/'.$id);
              }else{
              $this->session->setFlashdata('error','Record not Update!');
              return redirect()->to('admin/add_attribute_group/'.$id);
              }
          }else{
             
             $result=  $this->AdminModel->insertData('attribute_group',$save);
              if ($result) {
              
              $this->session->setFlashdata('success','Record Insert successfully');
              return redirect()->to('admin/add_attribute_group');
              }else{
              $this->session->setFlashdata('error','Record not insert');
              return redirect()->to('admin/add_attribute_group');
              }
    
          }
    
       }
    }

    return view('admin/catalog/add_attribute_group',$data);

}
    
    function delete_attribute_group()
    {
    
        if ($this->request->getVar()) {
           $id = $this->request->getVar('selected');
           if($id){
            foreach($id as $value){ 
                $this->AdminModel->deleteData('attribute_group',array('id'=>$value));
             }
             $this->session->setFlashdata('success','Record Delete successfully');
            }
        }
        return redirect()->to('admin/attribute_group');
    }


    //////////////////


    function attribute(){
        $permission = $this->AdminModel->permission($this->uri->getSegment(2));
        if(empty($permission)){
            return redirect()->to('admin/permission-denied');
        }
        $model = new CatalogModel();
        $data['page_title'] = 'attribute';
        $data['detail'] = $model->get_attribute();
        echo view('admin/catalog/attribute',$data);
        
        }
        
         function add_attribute($id=false)
         {
            $model = new CatalogModel();
            
            $data['attribute'] = $this->AdminModel->all_fetch('attribute_group',null); 
           
          if(@$id) {
            
            $data['page_title'] = ' Edit Attribute';
            $data['form_action'] ='admin/add_attribute/'.$id;
            $row = $this->AdminModel->fs('attribute',array('id'=>$id));
            $data['name'] = $row->name;
            $data['attribute_id'] = $row->attribute_id; 
            $data['sort_order'] = $row->sort_order; 
               
            }else{
            
            $data['page_title'] = ' Add Attribute';
            $data['form_action'] ='admin/add_attribute';
            $data['name'] = '';
            $data['sort_order'] = '';
            $data['attribute_id'] = '';
            
            }
        
                
            if($this->request->getMethod()=='post'){
    
                $rules = [
                    'name'=>'required',
                    'attribute_id'=>'required',
                ];
    
            if ($this->validate($rules)==false) {
                $data['validation'] = $this->validator;
    
                } else{
        
              $save= array();
              $save['name'] =   $this->request->getVar('name');
              $save['attribute_id'] =   $this->request->getVar('attribute_id');
              $save['sort_order'] =  $this->request->getVar('sort_order');
                
          
              if ($id) {
                 
                  $result=  $this->AdminModel->updateData('attribute',$save,array('id'=>$id));
                  if ($result) {
               
                  $this->session->setFlashdata('success','Record Update successfully');
                  return redirect()->to('admin/add_attribute/'.$id);
                  }else{
                  $this->session->setFlashdata('error','Record not Update!');
                  return redirect()->to('admin/add_attribute/'.$id);
                  }
              }else{
                 
                 $result=  $this->AdminModel->insertData('attribute',$save);
                  if ($result) {
                  
                  $this->session->setFlashdata('success','Record Insert successfully');
                  return redirect()->to('admin/add_attribute');
                  }else{
                  $this->session->setFlashdata('error','Record not insert');
                  return redirect()->to('admin/add_attribute');
                  }
        
              }
        
             }
           }
        return view('admin/catalog/add_attribute',$data);
        }
        
        
        function delete_attribute()
        {
            if ($this->request->getVar()) {
              $id = $this->request->getVar('selected');
              if($id){
                foreach($id as $value){ 
                    $this->AdminModel->deleteData('attribute',array('id'=>$value));
               }
              $this->session->setFlashdata('success','Record Delete successfully');
            }
          }
        return redirect()->to('admin/attribute');
        }


    /////////////////////

    function brands(){
        $model = new CatalogModel();
        $permission = $this->AdminModel->permission($this->uri->getSegment(2));
        if(empty($permission)){
            return redirect()->to('admin/permission-denied');
        }
        
        $data['page_title'] = 'Brands List';
        $data['config_logo'] = $this->config_logo;
        $data['list'] = $model->get_all_brand_list();
        echo view('admin/catalog/brands',$data);
        
        }
        
  
   function add_brands($id=false)
         {
            $data['brand_categories'] = $this->AdminModel->all_fetch('brand_category',array('status'=>1));    
        
          if(@$id) {
            
            $data['page_title'] = ' Edit Brand';
            $data['form_action'] ='admin/add_brands/'.$id;
            $row = $this->AdminModel->fs('brands',array('id'=>$id));
            $data['name'] = $row->name;
            $data['sort_order'] = $row->sort_order; 
            $data['image'] = $row->image;
            $data['seo_url'] = $row->seo_url;
            $data['status'] = $row->status;
            $data['brand_cat_id'] = $row->brand_cat_id;
            $data['banner'] = $row->banner;
            $data['meta_title'] = $row->meta_title;
            $data['meta_description'] = $row->meta_description;
            $data['meta_keyword'] = $row->meta_keyword;

            $data['banner_title'] = $row->banner_title;
            $data['top_title'] = $row->top_title;
            $data['top_des'] = $row->top_des;
            $data['link'] = $row->link;
            $data['btn_title'] = $row->btn_title;
            $data['btn_link'] = $row->btn_link;
            $data['b_des'] = $row->b_des;


            }else{
            
            $data['page_title'] = ' Add Brand';
            $data['form_action'] ='admin/add_brands';
            $data['name'] = '';
            $data['sort_order'] = '';
            $data['image'] = '';
            $data['seo_url'] = '';
            $data['status'] = '';
            $data['brand_cat_id'] = '';
            $data['banner'] = '';
            $data['meta_title'] = '';
            $data['meta_description'] = '';
            $data['meta_keyword'] = '';


            $data['banner_title'] = '';
            $data['top_title'] = '';
            $data['top_des'] = '';
            $data['link'] = '';
            $data['btn_title'] = '';
            $data['btn_link'] = '';
            $data['b_des'] = '';
            
            }
                
            if($this->request->getMethod()=='post'){
            
                $rules = [
                    'name'=>'required',
                    'brand_cat_id'=>'required', 
                ];
    
            if ($this->validate($rules)==false) {
                $data['validation'] = $this->validator;
    
             } else{
        
              $save= array();
              $save['id'] = '';
              $save['name'] =   $this->request->getVar('name');
              $save['sort_order'] =  $this->request->getVar('sort_order');
              $save['status'] =   $this->request->getVar('status'); 
              $save['brand_cat_id'] = $this->request->getVar('brand_cat_id');
              $save['meta_title'] = $this->request->getVar('meta_title');
              $save['meta_description'] = $this->request->getVar('meta_description');
              $save['meta_keyword'] = $this->request->getVar('meta_keyword');
            
            $save['banner_title'] = $this->request->getVar('banner_title');
            $save['top_title'] = $this->request->getVar('top_title');
            $save['top_des'] = $this->request->getVar('top_des');
            $save['link'] = $this->request->getVar('link');
            $save['btn_title'] = $this->request->getVar('btn_title');
            $save['btn_link'] = $this->request->getVar('btn_link');
            $save['b_des'] = $this->request->getVar('b_des');


               
               if(!empty($this->request->getVar('seo_url'))){
                $seo_url =   sfu($this->request->getVar('seo_url'));
                }else{
                $seo_url =   sfu($this->request->getVar('name')); 
                } 
                
                if (!empty($id)) {
                $existkeyword  = $this->AdminModel->all_fetch('brands',array('seo_url'=>$seo_url,'id <>'=>$id));
                 }else{
                    $existkeyword  = $this->AdminModel->all_fetch('brands',array('seo_url'=>$seo_url));
                 }
                 if (!empty($existkeyword)) {
                    $keyword = $seo_url.count($existkeyword);
                 }
                 $save['seo_url'] = $seo_url;
                        
                
    
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
               
                $file = $this->request->getFile('banner');
               if(!empty($_FILES['banner']['name'])){
                if($file->isValid() && !$file->hasMoved()){
                    $file_name = $file->getRandomName();
                    if($file->move('uploads/images/', $file_name)){
                        $save['banner'] = 'uploads/images/'.$file_name;
                    }
                 }else{
                    throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
                    exit;
                }
               }
    
              
              if ($id) {
                 $save['id'] = $id;
                  $result=  $this->AdminModel->updateData('brands',$save,array('id'=>$id));
                  if ($result) {
               
                  $this->session->setFlashdata('success','Record Update successfully');
                  return redirect()->to('admin/add_brands/'.$id);
                  }else{
                  $this->session->setFlashdata('error','Record not Update!');
                  return redirect()->to('admin/add_brands/'.$id);
                  }
              }else{
                 
                 $result=  $this->AdminModel->insertData('brands',$save);
                  if ($result) {          
                  $this->session->setFlashdata('success','Record Insert successfully');
                  return redirect()->to('admin/brands');
                  }else{
                  $this->session->setFlashdata('error','Record not insert');
                  return redirect()->to('admin/add_brands');
                  }
        
              }
        
           }
         }
        return view('admin/catalog/add_brands',$data);
        }
        
        
function delete_brands()
{
    if ($this->request->getVar()) {
        $id = $this->request->getVar('selected');
        if($id){
        foreach($id as $value){ 
            $this->AdminModel->deleteData('brands',array('id'=>$value));
        }
            $this->session->setFlashdata('success','Record Delete successfully');
        }
    }
return redirect()->to('admin/brands');
}
    



function brand_category(){

        $permission = $this->AdminModel->permission($this->uri->getSegment(2));
        if(empty($permission)){
            return redirect()->to('admin/permission-denied');
        }
        
        $data['page_title'] = 'Brand Category List';
        $data['config_logo'] = $this->config_logo;
        $data['detail'] = $this->AdminModel->all_fetch('brand_category',null);
        echo view('admin/catalog/brand_category',$data);
        
        }
        
         function add_brand_category($id=false)
         {
                  
        
          if(@$id) {
            
            $data['page_title'] = ' Edit Brand Category';
            $data['form_action'] ='admin/add_brand_category/'.$id;
            $row = $this->AdminModel->fs('brand_category',array('id'=>$id));
            $data['name'] = $row->name;
            $data['sort_order'] = $row->sort_order; 
            $data['image'] = $row->image;
            $data['seo_url'] = $row->seo_url;
            $data['status'] = $row->status;
            $data['show_home'] = $row->show_home;
            $data['meta_title'] = $row->meta_title;
            $data['meta_keyword'] = $row->meta_keyword;
            $data['meta_description'] = $row->meta_description;
            
            }else{
            
            $data['page_title'] = ' Add Brand Category';
            $data['form_action'] ='admin/add_brand_category';
            $data['name'] = '';
            $data['sort_order'] = '';
            $data['image'] = '';
            $data['seo_url'] = '';
            $data['status'] = '';
            $data['show_home'] = '';
            $data['meta_title'] = '';
            $data['meta_keyword'] = '';
            $data['meta_description'] = '';
            
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
                
                $save['status'] =   $this->request->getVar('status');        
                $save['show_home'] =   $this->request->getVar('show_home');
                $save['meta_title'] = $this->request->getVar('meta_title');
                $save['meta_keyword'] = $this->request->getVar('meta_keyword');
                $save['meta_description'] = $this->request->getVar('meta_description');
                if(!empty($this->request->getVar('seo_url'))){
                $save['seo_url'] =   sfu($this->request->getVar('seo_url'));
                }else{
                $save['seo_url'] =   sfu($this->request->getVar('name')); 
                }

                
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
              
              if ($id) {
                 $save['id'] = $id;
                  $result=  $this->AdminModel->updateData('brand_category',$save,array('id'=>$id));
                  if ($result) {
               
                  $this->session->setFlashdata('success','Record Update successfully');
                  return redirect()->to('admin/add_brand_category/'.$id);
                  }else{
                  $this->session->setFlashdata('error','Record not Update!');
                  return redirect()->to('admin/add_brand_category/'.$id);
                  }
              }else{
                 
                 $result=  $this->AdminModel->insertData('brand_category',$save);
                  if ($result) {          
                  $this->session->setFlashdata('success','Record Insert successfully');
                  return redirect()->to('admin/brand_category');
                  }else{
                  $this->session->setFlashdata('error','Record not insert');
                  return redirect()->to('admin/add_brand_category');
                  }
        
              }
        
           }
         }
        return view('admin/catalog/add_brand_category',$data);
        }
        
        
function delete_brand_category()
{
    if ($this->request->getVar()) {
        $id = $this->request->getVar('selected');
        if($id){
        foreach($id as $value){ 
            $this->AdminModel->deleteData('brand_category',array('id'=>$value));
        }
            $this->session->setFlashdata('success','Record Delete successfully');
        }
    }
return redirect()->to('admin/brand_category');
}


//////////////////////  

// only insert for use

function import_products2(){
ini_set('memory_limit', '-1');
ini_set('post_max_size', '64G');
ini_set('upload_max_filesize', '64G');
ini_set('max_execution_time', '300000');  

$model = new CatalogModel();
$sms = array();

 if(empty($_FILES['csv']['name'])){
    return redirect()->to('admin/product');
 }
 
 
if (!empty($_FILES['csv']['tmp_name'])) {
  $file = $_FILES['csv']['tmp_name'];
  $handle = fopen($file, "r");
  $c = 0;//
  while(($filesop = fgetcsv($handle, 90000, ",")) !== false)
  {
      
        $array = array();

        $name = $filesop[0];
        $description = $filesop[1];
        $price = trim($filesop[2]);
        $part_no = $filesop[3];
        $sku = $filesop[4];
        $quantity = $filesop[5];
        $brand = trim($filesop[6]);
        $special = trim($filesop[7]);
        $end_date = trim($filesop[8]);
        $image = $filesop[9];
        $meta_title = $filesop[10]; 
        $meta_keyword = $filesop[11]; 
        $meta_description = $filesop[12]; 
        $status = $filesop[13]; 
        $category = '' ;
        

    if($c<>0){   //SKIP THE FIRST ROW

  
        $array['name'] = $name;
        $array['description'] = $description;
        if(is_numeric($price)){
           $array['price'] = $price;
        }else{
          $array['price'] = '';  
        }
        
        $array['part_no'] = $part_no;
        $array['sku'] = $sku;
        $array['quantity'] = $quantity;
        $array['brand'] = $brand;
        $array['image'] = $image;
        $array['meta_title'] = $meta_title;
        $array['meta_keyword'] = $meta_keyword;
        $array['meta_description'] = $meta_description;
        $array['status'] = $status;
        $array['create_date'] = date('Y-m-d H:i:s');
        $array['modify_date'] = date('Y-m-d H:i:s');
        $product_seo_url = sfu($name);
        
        $existkeyword  = $model->get_product_seo_url($product_seo_url);
        if(!empty($existkeyword)){
        $array['product_seo_url'] = sfu($product_seo_url.'-'.$array['part_no']);
        }else{
        $array['product_seo_url'] =$product_seo_url;
        }

        if(!empty($end_date) && is_numeric($end_date)){
            $end_date = $end_date;
        }else{
           $end_date = '365'; 
        }
      
        $strtotime = '+'.$end_date.' days';
        
       if ($array) {
           
           if(!empty($image)){
            $array['sort_order'] = 0;   
           }else{
             $array['sort_order'] = 1;   
           }
          
            $product_id = $this->AdminModel->insertData('product',$array);
            
               if (!empty($special) && is_numeric($special)) {
                $arr = array();
                $arr['priority'] = 1;
                $arr['price'] = $special;
                $arr['date_start'] = date('Y-m-d');
                $arr['date_end'] =  date('Y-m-d',strtotime($strtotime));;
                $arr['product_id'] = $product_id; 
                $this->AdminModel->insertData('product_special',$arr);                  
           }
            
      
            
    //      if (!empty($special)) {
    //         $special  = explode(',', $special);
    //          foreach($special as  $price) {
    //              $arr = array();
    //              $arr['priority'] = 1;
    //              $arr['price'] = $price;
    //              $arr['date_start'] = date('Y-m-d');
    //              $arr['date_end'] =  date('Y-m-d',strtotime("+365 days"));;
    //              $arr['product_id'] = $product_id; 
    //              $this->AdminModel->insertData('product_special',$arr);                  
              
    //          }
    //        }
            
            
            
        //     if (!empty($special)) {
        //     $special  = explode('@', $special);
            // foreach($special as  $row) {
            
            //   $spcommaseprater = explode(',', $row);
            //      $arr = array();
            //  $arr['priority'] = 1;
            //  $arr['price'] = $spcommaseprater[0];
            //  $arr['date_start'] = $spcommaseprater[1]?$spcommaseprater[1]:date('Y-m-d');
            //  $arr['date_end'] = $spcommaseprater[2]?$spcommaseprater[2]:date('Y-m-d',strtotime("+60 days"));;
            //  $arr['product_id'] = $product_id; 
            //  $this->AdminModel->insertData('product_special',$arr);                  
              
            // }
         // }
          
          if (!empty($category)) {
            $category  = explode(',', $category);
            foreach($category as  $id) {
                $ptc = array();
                $ptc['product_id'] = $product_id;
                $ptc['category_id'] = $id;
                $this->AdminModel->insertData('product_to_category',$ptc);                  
              
            }
          }
          
          
       
       }
    }
    $c = $c + 1;

  }

  if (@$product_id) {
      
    $this->session->setFlashdata('success','Record saved successfully');
   return redirect()->to('admin/product');
  }else{
    $this->session->setFlashdata('error','Record saved unsuccess!');
    return redirect()->to('admin/product');
  }

 } 
}


//  insert and update both can use

function import_products(){
ini_set('memory_limit', '-1');
ini_set('post_max_size', '64G');
ini_set('upload_max_filesize', '64G');
ini_set('max_execution_time', '300000');    
    
    
    
$model = new CatalogModel();
$sms = array();

 if(empty($_FILES['csv']['name'])){
    return redirect()->to('admin/product');
 }
 
 
if (!empty($_FILES['csv']['tmp_name'])) {
  $file = $_FILES['csv']['tmp_name'];
  $handle = fopen($file, "r");
  $c = 0;//
  while(($filesop = fgetcsv($handle, 100000, ",")) !== false)
  {
      
        $array = array();

        $name = $filesop[0];
        $description = $filesop[1];
        $price = trim($filesop[2]);
        $part_no = $filesop[3];
        $sku = $filesop[4];
        $quantity = $filesop[5];
        $brand = trim($filesop[6]);
        $special = trim($filesop[7]);
        $end_date = trim($filesop[8]);
        $image = $filesop[9];
        $meta_title = $filesop[10]; 
        $meta_keyword = $filesop[11]; 
        $meta_description = $filesop[12]; 
        $status = $filesop[13]; 
        $category = '' ;
        

    if($c<>0){   //SKIP THE FIRST ROW

  
        $array['name'] = $name;
        $array['description'] = $description;
        if(is_numeric($price)){
           $array['price'] = $price;
        }else{
          $array['price'] = '';  
        }
        
        $array['part_no'] = $part_no;
        $array['sku'] = $sku;
        $array['quantity'] = $quantity;
        $array['brand'] = $brand;
        $array['image'] = $image;
       
        $array['meta_title'] = $meta_title;
        $array['meta_keyword'] = $meta_keyword;
        $array['meta_description'] = $meta_description;
        $array['status'] = $status;
        $product_seo_url = sfu($name);
        
        
        $check_already = $this->AdminModel->fs('product',array('part_no'=>$part_no,'brand'=>$brand));
        if(!empty($check_already)){
         $array['product_seo_url'] =$check_already->product_seo_url;   
        }else{
            
            $existkeyword  = $model->get_product_seo_url($product_seo_url);
            if(!empty($existkeyword)){
            $array['product_seo_url'] = sfu($product_seo_url.$array['brand'].'-'.$array['part_no']);
            }else{
            $array['product_seo_url'] =$product_seo_url;
            }
        }
        
        
        if(!empty($end_date) && is_numeric($end_date)){
            $end_date = $end_date;
        }else{
           $end_date = '365'; 
        }
      
        $strtotime = '+'.$end_date.' days';
        
       if ($array) {
           
               if(!empty($image)){
                $array['sort_order'] = 0;   
               }else{
                 $array['sort_order'] = 1;   
               }
            
                if($check_already){
                    $this->AdminModel->updateData('product',$array,array('id'=>$check_already->id));
                    $product_id = $check_already->id;
                }else{
                    $product_id = $this->AdminModel->insertData('product',$array);
                }
            
               if (!empty($special) && is_numeric($special)) {
                $arr = array();
                $arr['priority'] = 1;
                $arr['price'] = $special;
                $arr['date_start'] = date('Y-m-d');
                $arr['date_end'] =  date('Y-m-d',strtotime($strtotime));;
                $arr['product_id'] = $product_id; 
                
                $check_special = $this->AdminModel->fs('product_special',array('product_id'=>$product_id));
                if(!empty($check_special)){
                    $this->AdminModel->updateData('product_special',$arr,array('id'=>$check_special->id));  
                }else{
                   $this->AdminModel->insertData('product_special',$arr);   
                }
                
           }
            
      
            
    //      if (!empty($special)) {
    //         $special  = explode(',', $special);
    //          foreach($special as  $price) {
    //              $arr = array();
    //              $arr['priority'] = 1;
    //              $arr['price'] = $price;
    //              $arr['date_start'] = date('Y-m-d');
    //              $arr['date_end'] =  date('Y-m-d',strtotime("+365 days"));;
    //              $arr['product_id'] = $product_id; 
    //              $this->AdminModel->insertData('product_special',$arr);                  
              
    //          }
    //        }
            
            
            
        //     if (!empty($special)) {
        //     $special  = explode('@', $special);
            // foreach($special as  $row) {
            
            //   $spcommaseprater = explode(',', $row);
            //      $arr = array();
            //  $arr['priority'] = 1;
            //  $arr['price'] = $spcommaseprater[0];
            //  $arr['date_start'] = $spcommaseprater[1]?$spcommaseprater[1]:date('Y-m-d');
            //  $arr['date_end'] = $spcommaseprater[2]?$spcommaseprater[2]:date('Y-m-d',strtotime("+60 days"));;
            //  $arr['product_id'] = $product_id; 
            //  $this->AdminModel->insertData('product_special',$arr);                  
              
            // }
         // }
          
          if (!empty($category)) {
              $this->AdminModel->deleteData('product_to_category',array('product_id'=>$product_id)); // first delete all record of this prodcut id in product category table
              $category  = explode(',', $category);
                foreach($category as  $id) {
                $ptc = array();
                $ptc['product_id'] = $product_id;
                $ptc['category_id'] = $id;
                $this->AdminModel->insertData('product_to_category',$ptc);                  
              
            }
          }
          
          
       
       }
    }
    $c = $c + 1;

  }

  if (@$product_id) {
      
    $this->session->setFlashdata('success','Record saved successfully');
   return redirect()->to('admin/product');
  }else{
    $this->session->setFlashdata('error','Record saved unsuccess!');
    return redirect()->to('admin/product');
  }

 } 
}
    
function storeDataInSpecial()
{
    
}
    
//batch import
function import_products_batch(){
   
$model = new CatalogModel();
$sms = array();

 if(empty($_FILES['csv']['name'])){
    return redirect()->to('admin/product');
 }
 
 
if (!empty($_FILES['csv']['tmp_name'])) {
  $file = $_FILES['csv']['tmp_name'];
  $handle = fopen($file, "r");
  $c = 0;//
 // $new_array = array($data_array);
  $final_array = array();
  $spl_product_array = array();
  while(($filesop = fgetcsv($handle, 90000, ",")) !== false)
  {
      
        
        $name = $filesop[0];
        $description = $filesop[1];
        $price = trim($filesop[2]);
        $part_no = $filesop[3];
        $sku = $filesop[4];
        $quantity = $filesop[5];
        $brand = trim($filesop[6]);
        $special = trim($filesop[7]);
        $end_date = trim($filesop[8]);
        $image = $filesop[9];
        $meta_title = $filesop[10]; 
        $meta_keyword = $filesop[11]; 
        $meta_description = $filesop[12]; 
        $status = $filesop[13]; 
        $category = '' ;
        

    if($c<>0){   //SKIP THE FIRST ROW

        
        $data_array['name'] = $name;
        $data_array['description'] = $description;
        if(is_numeric($price)){
           $data_array['price'] = $price;
        }else{
          $data_array['price'] = '';  
        }
        
        $data_array['part_no'] = $part_no;
        $data_array['sku'] = $sku;
        $data_array['quantity'] = $quantity;
        $data_array['brand'] = $brand;
        $data_array['image'] = $image;
        $data_array['meta_title'] = $meta_title;
        $data_array['meta_keyword'] = $meta_keyword;
        $data_array['meta_description'] = $meta_description;
        $data_array['status'] = $status;
        $data_array['create_date'] = date('Y-m-d H:i:s');
        $data_array['modify_date'] = date('Y-m-d H:i:s');
        $data_array['product_seo_url'] = sfu($name.'-'.$data_array['part_no']);
       
      
        // $existkeyword  = $model->get_product_seo_url($data_array['product_seo_url']);
        // if(!empty($existkeyword)){
        // $data_array['product_seo_url'] = $data_array['product_seo_url'].'-'.$brand; // adding brand id
        // }else{
        // $data_array['product_seo_url'] = $data_array['product_seo_url'];
        // }

       
        if(!empty($end_date) && is_numeric($end_date)){
            $end_date = $end_date;
        }else{
           $end_date = '365'; 
        }
        
        if(!empty($special)){
           $data_array['special_price'] = $special;
           $strtotime = '+'.$end_date.' days';
           $data_array['date_start'] = date('Y-m-d');
           $data_array['date_end'] =  date('Y-m-d',strtotime($strtotime));;
        }
      
     
     
      if ($data_array) {
           
          if(!empty($image)){
            $data_array['sort_order'] = 0;   
          }else{
             $data_array['sort_order'] = 1;   
          }
          

      }
    
        //  $spl_product_array[] = $arr_spl;
         $final_array[] = $data_array;
    }
    $c = $c + 1;
   
  }
  
//   echo "<pre>";
//   echo $this->request->getVar('type'); 
//   print_r($final_array);exit();
//   $result = $this->AdminModel->batchInsertData('product',$final_array);
//   $result = $this->AdminModel->batchUpdateData('product_test',$final_array);
    // $result = $model->batchUpdateData($final_array);
    
     if($this->request->getVar('type')=='update'){
            	$result = $model->batchUpdateData($final_array);
     }else{
    	$result = $this->AdminModel->batchInsertData('product',$final_array);
    }
 // print_r($result);exit();
  if (@$result) {
    $this->session->setFlashdata('success','Record saved successfully');
   return redirect()->to('admin/product');
  }else{
    $this->session->setFlashdata('error','Record saved unsuccess!');
    return redirect()->to('admin/product');
  }

 } 
}



    
  
 function import_produt_excel()
   {


    if($this->request->getMethod()=='post'){
        $rules = [
            'csv'=>['label'=>'File','rules'=>'uploaded[csv]|ext_in[csv,csv,xls,xlsx]']
          ];
if ($this->validate($rules)==FALSE) {
    $data['validation'] = $this->validator;
     $this->session->setFlashdata('error',$this->validation->hasError('csv')?$this->validation->getError('csv'):'');
    } else{

        $file = $this->request->getFile("csv");
        $path = 'uploads/excel/';
        $file_name ='';
        if (!is_dir($path)){
                mkdir($path, 0777, TRUE);
            if ($file->isValid() && ! $file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move($path, $newName);
                $file_name = $path.$file->getName();
            }
        }else{
            if ($file->isValid() && ! $file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move($path, $newName);
                $file_name = $path.$file->getName();
            }
        }
        $arr_file       = explode('.', $file_name);
        $extension      = end($arr_file);
        if('csv' == $extension) {
            $reader     = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        } else {
            $reader     = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $spreadsheet    = $reader->load($file_name);
        $sheet_data     = $spreadsheet->getActiveSheet()->toArray();
        foreach($sheet_data as $key => $line) {
            if($key != 0) {
            
        if(!empty($line[0])) { 
        $name = $line[0];
        $description = $line[1];
        $price = trim($line[2]);
        $part_no = $line[3];
        $sku = $line[4];
        $quantity = $line[5];
        $brand = trim($line[6]);
        $special = trim($line[7]);
        $end_date = trim($line[8]);
        $image = $line[9];
        $meta_title = $line[10]; 
        $meta_keyword = $line[11]; 
        $meta_description = $line[12]; 
        $status = $line[13]; 
        $category = '' ;    


        	$final_array = array();
            $save = array();             
            $save['name'] = $name;
            $save['description'] = $description;
            $save['price'] = $price;
            // if(is_numeric($price)){
            //   $save['price'] = $price;
            // }else{
            //   $save['price'] = '';  
            // }
            
            $save['part_no'] = $part_no;
            $save['sku'] = $sku;
            $save['quantity'] = $quantity;
            $save['brand'] = $brand;
            $save['image'] = $image;
           
            $save['meta_title'] = $meta_title;
            $save['meta_keyword'] = $meta_keyword;
            $save['meta_description'] = $meta_description;
            $save['status'] = $status;
            $product_seo_url = sfu($name);
            
            
            $check_already = $this->AdminModel->fs('product',array('part_no'=>$part_no,'brand'=>$brand));
            if(!empty($check_already)){
             $save['product_seo_url'] =$check_already->product_seo_url;   
            }else{
               
                $save['product_seo_url'] = sfu($product_seo_url.$save['brand'].'-'.$save['part_no']);

                // $existkeyword  = $model->get_product_seo_url($product_seo_url);
                // if(!empty($existkeyword)){
                // $save['product_seo_url'] = sfu($product_seo_url.$save['brand'].'-'.$save['part_no']);
                // }else{
                // $save['product_seo_url'] =$product_seo_url;
                // }
            }
            
            
            if(!empty($end_date) && is_numeric($end_date)){
                $end_date = $end_date;
            }else{
               $end_date = '365'; 
            }
          
            $strtotime = '+'.$end_date.' days';
            
              if(!empty($special)){
               $save['special_price'] = $special;
               $strtotime = '+'.$end_date.' days';
               $save['date_start'] = date('Y-m-d');
               $save['date_end'] =  date('Y-m-d',strtotime($strtotime));;
              }
                   
              if ($save) {

                   if(!empty($image)){
                    $save['sort_order'] = 0;   
                   }else{
                     $save['sort_order'] = 1;   
                   }
                
                    // if($check_already){
                    //     $this->AdminModel->updateData('product',$save,array('id'=>$check_already->id));
                    //     $product_id = $check_already->id;
                    // }else{
                    //     $product_id = $this->AdminModel->insertData('product',$save);
                    // }
                   $final_array[] = $save;

                  }
                }else{
                    
                    $this->session->setFlashdata('error','Product Name, Required');
                     return redirect()->to('admin/product');
                }                        
                
              }
            }
            echo '<pre>';
            print_r($final_array);
            echo $this->request->getVar('type'); exit;
            if($this->request->getVar('type')=='update'){
            	$result = $model->batchUpdateData($final_array);
            }else{
            	$result = $this->AdminModel->batchInsertData('product',$final_array);
            }
            

            if(file_exists($file_name)){
                unlink($file_name);
            }

          if($result){
                 $this->session->setFlashdata('success','Record update successfully');
            }else{
            $this->session->setFlashdata('error','Record not insert');
         
         }            

    }       
  }
  return redirect()->to('admin/product');

}
   
        
    
    
    

}
