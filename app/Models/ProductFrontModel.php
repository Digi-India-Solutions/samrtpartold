<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\CommonModel;
use App\Models\FrontModel;

class ProductFrontModel extends Model
{
  protected $DBGroup              = 'default';
  protected $table                = 'product';
  protected $primaryKey           = 'id';
  protected $useAutoIncrement     = true;
  protected $insertID             = 0;
  protected $returnType           = 'array';
  protected $useSoftDeletes       = false;
  protected $protectFields        = true;
  protected $allowedFields        = [];

  // Dates
  protected $useTimestamps        = false;
  protected $dateFormat           = 'datetime';
  protected $createdField         = 'created_at';
  protected $updatedField         = 'updated_at';
  protected $deletedField         = 'deleted_at';

  // Validation
  protected $validationRules      = [];
  protected $validationMessages   = [];
  protected $skipValidation       = false;
  protected $cleanValidationRules = true;

  // Callbacks
  protected $allowCallbacks       = true;
  protected $beforeInsert         = [];
  protected $afterInsert          = [];
  protected $beforeUpdate         = [];
  protected $afterUpdate          = [];
  protected $beforeFind           = [];
  protected $afterFind            = [];
  protected $beforeDelete         = [];
  protected $afterDelete          = [];
  
  
  
  
function get_product($product_id){
     
  $array = array();
   if(!empty($product_id)){
       $AdminModel = new CommonModel();
       $frontModel = new FrontModel();
       $valid = 0;
       if(!empty($user_id =  session()->get('user_id'))){
           $user = $frontModel->get_user_detail($user_id);
           if(!empty($user)  && @$user->price_approval==1){
               $valid =1;
           }
       }else if(!empty(session()->get('adminLogin'))){
           $valid =1;
       }
       
       
        $query = $this->db->table('product as pd');
        $query->select('pd.*,brn.image as brand_image,brn.name as brand_name,mf.name as manufacture_name');
        $query->join('brands brn','pd.brand = brn.id','left');
        $query->join('manufacturer mf','pd.manufacturer_id = mf.id','left');
        $product =  $query->where('pd.id',$product_id)->get()->getRow();
        if(empty($product)){
            return array();
        }
        
        $array['id'] = $product->id;
        $array['name'] = $product->name;
        $array['description'] = $product->description;
        $array['product_description'] = $product->product_description;
        $array['additional_description'] = $product->additional_description;
        $array['tag'] = $product->tag;
        $array['meta_title'] = $product->meta_title;
        $array['meta_description'] = $product->meta_description;
        $array['meta_keyword'] = $product->meta_keyword;
        $array['image'] = $product->image;
        $array['brand_image'] = $product->brand_image;
        $array['brand_name'] = $product->brand_name;
        $array['stock_status_id'] = $product->stock_status_id;
        $array['product_seo_url'] = $product->product_seo_url;
        $array['sort_order'] = $product->sort_order;
        $array['status'] = $product->status;
        $array['quantity'] = $product->quantity;
        $array['sku'] = $product->sku;
        $array['model'] = $product->model;
        $array['part_no'] = $product->part_no;
        $array['origin'] = $product->origin;
        $array['class'] = $product->class;
        $array['manufacture_name'] = $product->manufacture_name; 
        
        if(!empty($valid)){
            $array['price'] = $product->price;
            $special_price = $this->get_special_price($product->id);
            if(!empty($special_price)){
            $array['old_price'] = $product->price;
            $array['price'] = $special_price;
            }
            $array['save_percentage'] = $this->get_save_percentage($product->id,$product->price);
        }else{
         $array['price'] = 0;
        }
        
       
    
        $array['rating'] = $this->get_product_rating($product->id);
        $array['images'] = $this->product_images($product->id);
    }
return $array;
}
  
  
function product_images($product_id){
        $query = $this->db->table('product_image');
        return $query->select('*')->where('product_id',$product_id)->get()->getResult();
    
}
  
	function get_special_price($product_id){
		
			
		$query = $this->db->table("product");
		$query->select('special_price');
		$query->where('date_start <=',date('Y-m-d'));
		$query->where('date_end >=',date('Y-m-d'));
		$query->where('id',$product_id);
		$row = $query->get()->getRow();
		if ($row) {
		return $row->special_price;
		}else{
		
		$query = $this->db->table("product_special");
		$query->select('price');
		$query->where('date_start <=',date('Y-m-d'));
		$query->where('date_end >=',date('Y-m-d'));
		$query->where('product_id',$product_id);
		$row = $query->get()->getRow();
		if ($row) {
		return $row->price;
		}else{
		  return false;
		}
		
		}
		
		}
  
function get_save_percentage($product_id,$old_price){
    $date = date('Y-m-d');
    $percentage = 0;
    $special_price =  $this->get_special_price($product_id);
    if(!empty($special_price)){
     $minus = $old_price - $special_price; 
      @$percentage = $minus*100/$old_price;
    }
   
    return round($percentage);
} 
  
  
  
  
  

 function get_all_product_by_parent_Category($category_id,$filter = false){
    $tblcategory = $this->db->table('category');
    // get all sub category product    
      $tblcategory->select('id');
      $tblcategory->where('id',$category_id);
      $tblcategory->orWhere('parent_id',$category_id);
      $allcatid = $tblcategory->get()->getResult();
        foreach($allcatid as $value){
            $allcat[]=$value->id;
        }
   
       $tblptc = $this->db->table('product_to_category');
       $product_ids = $tblptc->select('product_id')->whereIn('category_id',$allcat)->get()->getResult(); 

    $products = array();
    if ($product_ids) {
      foreach ($product_ids as $key => $value) { 
       $valid_product = $this->get_product($value->product_id);
       if(!empty($valid_product)){
            $products[] =  $valid_product;
       }
     
     }
   }
   return $products;
}

  
function get_all_category_upto_parent_category($category_id){
 
    $query = $this->db->table('category');
    $row = $query->select('*')->where('id',$category_id)->get()->getRow();
    if (empty($row->parent_id)) {
          $query->where('parent_id',$category_id);
           return  $query->orderBy('sort_order','asc')->get()->getResult();
    }else{
        $parent_id =  $this->get_parent_id($category_id);
        $query->where('parent_id',$parent_id);
        return   $query->orderBy('sort_order','asc')->get()->getResult();
    
    }
}


  
function get_parent_id($category_id){
  
    $query = $this->db->table('category');
    $row  = $query->where('id',$category_id)->get()->getRow();

    if (!empty($row->parent_id)){
         return ( $this->get_parent_id($row->parent_id));  
    }  else{
        return $row->id;
    }  
    
}





  
  
// function get_related_product($product_id){
//     $query = $this->db->table('product_related');
//     $related_ids = $query->select('related_id')->where('product_id',$product_id)->get()->getResult();
//     $products = array();
//      if ($related_ids) {
//       foreach ($related_ids as $key => $value) {
//       $valid_product = $this->get_product($value->related_id);
//       if(!empty($valid_product)){
//             $products[] =  $valid_product;
//       }
//       }
//      }
//   return  $products;
//  }
  
  
  function get_related_product($product_id,$brand_id =false){
    $query = $this->db->table('product');
    $related_ids = $query->select('id')->where(array('brand'=>$brand_id,'id <>'=>$product_id))->limit(20)->get()->getResult();

    $products = array();
     if ($related_ids) {
      foreach ($related_ids as $key => $value) {
       $valid_product = $this->get_product($value->id);
       if(!empty($valid_product)){
            $products[] =  $valid_product;
       }
      }
     }
   return  $products;
 } 
  
  
  
 function get_product_attribute($product_id){
 
  $query = $this->db->table('product_attribute as pa');
//   $query->distinct('atrribute_id');
  $query->select('pa.*,atr.name as atrribute_name');
  $query->join('attribute atr','pa.attribute_id=atr.id','left');
  $query->where('pa.product_id',$product_id);
  $query->orderBy('atr.sort_order','asc');
  return $query->get()->getResult();

 }
  
  
  
  
function get_product_attribute2($product_id){
$connect = array();
  $query = $this->db->table('product_attribute');
  $query->distinct('atrribute_id');
  $query->select('attribute_id');
  $query->where('product_id',$product_id);
  $dd = $query->get()->getResult();
  
  if (!empty($dd)) {
    foreach ($dd as $key => $value) {
      $ids[]= $value->attribute_id;
    }
    
    $query = $this->db->table('attribute');
    $query->distinct('attribute_id');
    $query->select('attribute_id');
    $query->whereIn('id',$ids);
    $idss =  $query->get()->getResult();
    if (@$idss) {
       foreach ($idss as $key => $value) {
       $idsss[]= $value->attribute_id;
       }
       
       $query = $this->db->table('attribute_group');
       $query->select('*');
       $atgroup =  $query->whereIn('id',$idsss)->get()->getResult();
    
       foreach ($atgroup as $key => $value) {
        // $connect['group'][] = $value;
        $connect[] =  $this->get_attribute_list($product_id,$value->id); 
      }

    }
    
  return $connect;

  }else{
    return array();
  }

}  
  
function get_attribute_list($product_id,$group_id){
$query = $this->db->table('attribute');
$rr = $query->select('id')->where('attribute_id',$group_id)->get()->getResult();
if ($rr) {
  foreach ($rr as $key => $value) {
    $rrr[] = $value->id;
  }
  if ($rrr) {
      $query = $this->db->table('product_attribute pa');
    $query->select('pa.id,pa.text,at.name');
    $query->join('attribute at','pa.attribute_id=at.id','left');
    // $this->db->order_by('pa.id','asc');
    $query->whereIn('pa.attribute_id',$rrr);
    $query->where('pa.product_id',$product_id);
     $query->orderBy('at.sort_order','asc');
    return  $query->get()->getResult();
   
  }
}

}  


//////////////


function get_popular_product(){
$products = array();    
 $query = $this->db->table('product');
 $result = $query->select('id')->where(array('best_seller'=>1,'status'=>1))->orderBy('sort_order','asc')->get()->getResult();
 if($result){
     foreach($result as $product){
         $valid_product = $this->get_product($product->id);
          if(!empty($valid_product)){
            $products[] =  $valid_product;
       }
         
     }
   }
   
 return $products;
  
}

function get_product_review($product_id,$limit=false,$offset=false){

 $query = $this->db->table('product_review as pr');
 $query->select('pr.*,rt.name as rating_name');
 $query->join('rating rt','pr.rating=rt.id','join');
 $query->where('pr.product_id',$product_id);
 $query->where('pr.status',1);
 
  $review =  $query->orderBy('pr.id','desc')->get()->getResult();
  if(!empty($limit)){
   $offset = $offset==1?1:$offset;
   // for pagination 
   return array_slice($review,$offset,$limit);
  }else{
    return $review;  
  }    
 
   
}

function get_category($keyword){
    
     $query = $this->db->table('category as ct');
     $query->like('ct.name',$keyword,'both');
     return $query->get()->getResult();
}

function get_product_search($keyword){
    
     $query = $this->db->table('product as pd');
     $query->select('pd.name,pd.id,pd.part_no,pd.product_seo_url');
     $query->like('pd.name',$keyword,'both');
     $query->orLike('pd.part_no',$keyword,'both');
     
     return $query->get()->getResult();
}

function get_user_wishlist(){
    $productIds = array();
    $user_id = session()->get('user_id');
    $query = $this->db->table('wishlist');
    $result =  $query->select('product_id')->where('customer_id',$user_id)->get()->getResult();
    if($result){
        foreach($result as $value){
            $productIds[] = $value->product_id;
        }
    }
  return $productIds;
}




function get_filter_option($category_id){
    $filter_array = array();
    $filterId = array();
    $query = $this->db->table('category_filter');
    $result =  $query->select('filter_id')->where('category_id',$category_id)->get()->getResult(); //get filter id
    if($result){
        foreach($result as $value){
            $filterId[] = $value->filter_id;
        }
     $query1 = $this->db->table('filter_description');
     $filter_group_id =  $query1->distinct()->select('filter_id')->whereIn('id',$filterId)->get()->getResult(); // ger filter group id
     if($filter_group_id){
         $query2 = $this->db->table('filter');
         foreach($filter_group_id as $group_id){
             $group = $query2->select('*')->where(array('id'=>$group_id->filter_id,'status'=>1))->get()->getRow();  // get group row detail
             if($group){
                 $filter_array['group'][] =  $group;
                 $filter_array['option'][] =  $query1->select('*')->where('filter_id',$group_id->filter_id)->orderBy('sort_order','asc')->get()->getResult();
                 
             }
             
         }
      }        
    }
  return $filter_array;
}


function get_product_rating($product_id){
$all_review = count($this->get_all_review($product_id));
$total_sum_of_rating = $this->get_total_sum_of_rating($product_id);

return @round($total_sum_of_rating/$all_review);
//   if (!empty($result) && $result >1) {
//     $array = array();
//     $array['star'] = $result;
//     $array['non_star'] = 5-$result;
//     // return $array;
//   }else{
//     return array();
//   }
}

function get_all_review($product_id){
$query = $this->db->table('product_review as pr');
$query->select('pr.*,pd.name as product_name');
$query->where('pr.product_id',$product_id);
$query->where('pr.status',1);
$query->join('product pd','pr.product_id=pd.id','left');
$query->orderBy('pr.id','desc');
return  $query->get()->getResult();

}


function get_total_sum_of_rating($product_id){
$query = $this->db->table('product_review');
$query->selectSum('rating');
$query->where('product_id',$product_id);
$query->where('status',1);
$result =  $query->get()->getRow();
if (!empty($result)) {
  return $result->rating;
}else{
  return false;
}
}



function get_count_most_popular_part($data = array()){
   $date = date('Y-m-d');
   $sql = "SELECT p.id,p.price, (SELECT AVG(rating) AS total FROM cyb_product_review r1 WHERE r1.product_id = p.id AND r1.status = '1' GROUP BY r1.product_id) AS rating, (SELECT price FROM cyb_product_special ps WHERE ps.product_id = p.id  AND ((ps.date_start < $date) AND (ps.date_end > $date)) ORDER BY ps.priority ASC, ps.price ASC LIMIT 1) AS special";
          $sql .=' from cyb_product  p ';
 
        if (!empty($data['filter']['filter_id'])) {
             $sql .= " LEFT JOIN cyb_product_filter pf ON(pf.product_id = p.id)";
            $implode = array();
         
            $filters = explode(',', rtrim($data['filter']['filter_id'],','));
             // $filters =array_slice($filters,0,count($filters)-1); //last filter element will remove 
            foreach ($filters as $filter_id) {
              $implode[] = (int)$filter_id;
            }
            $sql .= " AND pf.filter_id IN (" . implode(',', $implode) . ")";
                 
          }

        $sql .=" WHERE p.best_seller=1";

        if (!empty($data['filter']['max_price'])) {
        $sql .= " and p.price BETWEEN ".$data['filter']['min_price']." AND ".$data['filter']['max_price']."";
        }

          $sql .= " GROUP BY p.id";
        

          if (!empty($data['filter']['sorting'])) {
           // $sql .= " ORDER BY (CASE WHEN special IS NOT NULL THEN special ELSE p.price END)";
            $sql .= " ORDER BY p.price";
          }else{
            $sql .= " ORDER BY p.sort_order";
          }
          // $sql .= " ORDER BY p.price";
          $sql .= " ASC";
       
  
    $products = $this->db->query($sql)->getResult();
    $array = array();
   if(!empty($products)){
      
     $numbers = array_column($products, 'price');
     $array['min'] = min($numbers);
     $array['max'] = max($numbers);
     $array['total'] = count($products);
     }else{
     $array['min'] = 0;
     $array['max'] = 0;
     $array['total'] = 0;
     }
   return $array; 
  
}


 function get_all_most_popular_part($data = array()){
   $date = date('Y-m-d');
   $sql = "SELECT p.id, (SELECT AVG(rating) AS total FROM cyb_product_review r1 WHERE r1.product_id = p.id AND r1.status = '1' GROUP BY r1.product_id) AS rating, (SELECT price FROM cyb_product_special ps WHERE ps.product_id = p.id  AND ((ps.date_start < $date) AND (ps.date_end > $date)) ORDER BY ps.priority ASC, ps.price ASC LIMIT 1) AS special";

        $sql .=' from cyb_product  p ';
       
        if (!empty($data['filter']['filter_id'])) {
            $sql .= " LEFT JOIN cyb_product_filter pf ON(pf.product_id = p.id)";
            $implode = array();
             $filters = explode(',', rtrim($data['filter']['filter_id'],','));
             // $filters =array_slice($filters,0,count($filters)-1); //last filter element will remove 
            foreach ($filters as $filter_id) {
              $implode[] = (int)$filter_id;
            }
            $sql .= " AND pf.filter_id IN (" . implode(',', $implode) . ")";
                 
          }

        $sql .=" WHERE p.best_seller=1";

        if (!empty($data['filter']['max_price'])) {
        $sql .= " and p.price BETWEEN ".$data['filter']['min_price']." AND ".$data['filter']['max_price']."";
        }
        
        
          if (!empty($data['filter']['search'])) {
            $sql .= " AND (";
            $implode = array();

            $words = explode(' ', trim(preg_replace('/\s+/', ' ', $data['filter']['search'])));

            foreach ($words as $word) {
              $implode[] = "p.name LIKE '%" . $word . "%'";
            }

            if ($implode) {
              $sql .= " " . implode(" AND ", $implode) . "";
            }

            if (!empty($data['filter']['search'])) {
              $sql .= " OR p.part_no LIKE '%" . $data['filter']['search'] . "%'";
            }

            $sql .= ")";
          }

          $sql .= " GROUP BY p.id";
        

          if (!empty($data['filter']['sorting'])) {
           // $sql .= " ORDER BY (CASE WHEN special IS NOT NULL THEN special ELSE p.price END)";
            $sql .= " ORDER BY p.price";
          }else{
            $sql .= " ORDER BY p.sort_order";
          }
          // $sql .= " ORDER BY p.price";

       
        if (!empty($data['filter']['sorting'])) {
        if($data['filter']['sorting'] == 'desc') {
          $sql .= "  DESC";
        } else {
          $sql .= " ASC";
        }
      }

        $sql .= " LIMIT ".$data['offset'].", ".$data['limit']." ";


   $result = $this->db->query($sql)->getResult();
  // echo $this->db->getLastQuery();
  // $result = $query->getResult();
  // echo '<pre>';
  // print_r($result);

     $products = array();
      if ($result) {
        foreach ($result as $key => $value) {
         $product = $this->get_product($value->id);
         if(!empty($product)){                         
                 $products[] = $product;
           }
         }   
     }
return $products;


} 
  
//   end most popular
  
  
  
function get_count_product_by_Category($data=array()){

 $date = date('Y-m-d');
  $sql = "SELECT p.id, p.price, (SELECT AVG(rating) AS total FROM cyb_product_review r1 WHERE r1.product_id = p.id AND r1.status = '1' GROUP BY r1.product_id) AS rating, (SELECT price FROM cyb_product_special ps WHERE ps.product_id = p.id  AND ((ps.date_start < $date) AND (ps.date_end > $date)) ORDER BY ps.priority ASC, ps.price ASC LIMIT 1) AS special";


   if (!empty($data['category_id'])) {
        $sql .= " FROM cyb_product_to_category p2c ";

        if (!empty($data['filter']['filter_id'])) {
            $sql .= " LEFT JOIN cyb_product_filter pf ON (p2c.product_id = pf.product_id) LEFT JOIN cyb_product p ON (pf.product_id = p.id)";
            $implode = array();
            $filters = explode(',', rtrim($data['filter']['filter_id'],','));
             // $filters =array_slice($filters,0,count($filters)-1); //last filter element will remove 
            foreach ($filters as $filter_id) {
              $implode[] = (int)$filter_id;
            }
            $sql .= " AND pf.filter_id IN (" . implode(',', $implode) . ")";
                 
          }else {
            $sql .= " LEFT JOIN cyb_product p ON (p2c.product_id = p.id)   where p2c.category_id=".$data['category_id']." ";
          }

         }else{
             $sql .=' from cyb_product  p';
          }

             if (!empty($data['filter']['min_price'])) {
        $sql .= " and p.price BETWEEN ".$data['filter']['min_price']." AND ".$data['filter']['max_price']."";
        }

       if (!empty($data['filter']['search'])) {
            $sql .= " AND (";
            $implode = array();

            $words = explode(' ', trim(preg_replace('/\s+/', ' ', $data['filter']['search'])));

            foreach ($words as $word) {
              $implode[] = "p.name LIKE '%" . $word . "%'";
            }

            if ($implode) {
              $sql .= " " . implode(" AND ", $implode) . "";
            }

            if (!empty($data['filter']['search'])) {
              $sql .= " OR p.part_no LIKE '%" . $data['filter']['search'] . "%'";
            }

            $sql .= ")";
          }

          $sql .= " GROUP BY p.id";

        



          if (!empty($data['filter']['sorting'])) {
           // $sql .= " ORDER BY (CASE WHEN special IS NOT NULL THEN special ELSE p.price END)";
            $sql .= " ORDER BY p.price";
          }else{
            $sql .= " ORDER BY p.sort_order";
          }
          // $sql .= " ORDER BY p.price";

       $sql .= " ASC";
      //   if (!empty($data['filter']['sorting'])) {
       
      //   if($data['filter']['sorting'] == 'desc') {
      //     $sql .= "  DESC";
      //   } else {
      //     $sql .= " ASC";
      //   }
      // }
       
     $query = $this->db->query($sql);
     // echo $this->db->getLastQuery();
     $products = $query->getResult();
     $array = array();
     if(!empty($products)){
     $numbers = array_column($products, 'price');
     $array['min'] = min($numbers);
     $array['max'] = max($numbers);
     $array['total'] = count($products);
     }else{
     $array['min'] = 0;
     $array['max'] =0;
     $array['total'] = 0;
     }
     
  return $array;    
 
}  
  
  

  
  
  
function get_all_product_by_Category($data = array()){
 
  $date = date('Y-m-d');
  $sql = "SELECT p.id, (SELECT AVG(rating) AS total FROM cyb_product_review r1 WHERE r1.product_id = p.id AND r1.status = '1' GROUP BY r1.product_id) AS rating, (SELECT price FROM cyb_product_special ps WHERE ps.product_id = p.id  AND ((ps.date_start < $date) AND (ps.date_end > $date)) ORDER BY ps.priority ASC, ps.price ASC LIMIT 1) AS special";


   if (!empty($data['category_id'])) {
        $sql .= " FROM cyb_product_to_category p2c ";

        if (!empty($data['filter']['filter_id'])) {
            $sql .= " LEFT JOIN cyb_product_filter pf ON (p2c.product_id = pf.product_id) LEFT JOIN cyb_product p ON (pf.product_id = p.id)";
            $implode = array();
            $filters = explode(',', rtrim($data['filter']['filter_id'],','));
             // $filters =array_slice($filters,0,count($filters)-1); //last filter element will remove 
            foreach ($filters as $filter_id) {
              $implode[] = (int)$filter_id;
            }
            $sql .= " AND pf.filter_id IN (" . implode(',', $implode) . ")";
                 
          }else {
            $sql .= " LEFT JOIN cyb_product p ON (p2c.product_id = p.id)   where p2c.category_id=".$data['category_id']." ";
          }

         }else{
             $sql .=' from cyb_product  p';
          }

        if (!empty($data['filter']['max_price'])) {
        $sql .= " and p.price BETWEEN ".$data['filter']['min_price']." AND ".$data['filter']['max_price']."";
        }


        if (!empty($data['filter']['search'])) {
            $sql .= " AND (";
            $implode = array();

            $words = explode(' ', trim(preg_replace('/\s+/', ' ', $data['filter']['search'])));

            foreach ($words as $word) {
              $implode[] = "p.name LIKE '%" . $word . "%'";
            }

            if ($implode) {
              $sql .= " " . implode(" AND ", $implode) . "";
            }

            if (!empty($data['filter']['search'])) {
              $sql .= " OR p.part_no LIKE '%" . $data['filter']['search'] . "%'";
            }

            $sql .= ")";
          }
        



          $sql .= " GROUP BY p.id";
        
             
               
        
          if (!empty($data['filter']['sorting'])) {
           // $sql .= " ORDER BY (CASE WHEN special IS NOT NULL THEN special ELSE p.price END)";
            $sql .= " ORDER BY p.price";
          }else{
            $sql .= " ORDER BY p.sort_order";
          }
          // $sql .= " ORDER BY p.price";

       
        if (!empty($data['filter']['sorting'])) {
        if($data['filter']['sorting'] == 'desc') {
          $sql .= "  DESC";
        } else {
          $sql .= " ASC";
        }
      }
      
    
      
      

        $sql .= " LIMIT ".$data['offset'].", ".$data['limit']." ";


   $result = $this->db->query($sql)->getResult();
  // echo $this->db->getLastQuery();
  // $result = $query->getResult();
  // echo '<pre>';
  // print_r($result);

     $products = array();
      if ($result) {
        foreach ($result as $key => $value) {
         $product = $this->get_product($value->id);
         if($product){                         
                 $products[] = $product;
           }
         }   
     }
return $products;

}


function get_all_filter(){
    $filter_array = array();
     $query = $this->db->table('filter');
     $query1 = $this->db->table('filter_description');

      $filter_group_list =  $query->select('*')->where(array('status'=>1))->get()->getResult();
         
         foreach($filter_group_list as $group){
             $option =  $query1->select('*')->where('filter_id',$group->id)->orderBy('sort_order','asc')->get()->getResult();  // get group row detail
             if($option){
                 $filter_array['group'][] =  $group;
                 $filter_array['option'][] =  $option;
                 
             }
             
         }
         
  return $filter_array;
}

///////////////
// BRAND FILTER


 function get_all_product_by_brand($data = array()){
   $date = date('Y-m-d');
   $sql = "SELECT p.id, (SELECT AVG(rating) AS total FROM cyb_product_review r1 WHERE r1.product_id = p.id AND r1.status = '1' GROUP BY r1.product_id) AS rating, (SELECT price FROM cyb_product_special ps WHERE ps.product_id = p.id  AND ((ps.date_start < $date) AND (ps.date_end > $date)) ORDER BY ps.priority ASC, ps.price ASC LIMIT 1) AS special";

        $sql .=' from cyb_product  p ';
       
        if (!empty($data['filter']['filter_id'])) {
            $sql .= " LEFT JOIN cyb_product_filter pf ON(pf.product_id = p.id)";
            $implode = array();
             $filters = explode(',', rtrim($data['filter']['filter_id'],','));
             // $filters =array_slice($filters,0,count($filters)-1); //last filter element will remove 
            foreach ($filters as $filter_id) {
              $implode[] = (int)$filter_id;
            }
            $sql .= " AND pf.filter_id IN (" . implode(',', $implode) . ")";
           
          }

        $sql .=" WHERE p.brand=".$data['brand_id'];

        if (!empty($data['filter']['max_price'])) {
        $sql .= " and p.price BETWEEN ".$data['filter']['min_price']." AND ".$data['filter']['max_price']."";
        }


        if (!empty($data['filter']['search'])) {
            $sql .= " AND (";
            $implode = array();

            $words = explode(' ', trim(preg_replace('/\s+/', ' ', $data['filter']['search'])));

            foreach ($words as $word) {
              $implode[] = "p.name LIKE '%" . $word . "%'";
            }

            if ($implode) {
              $sql .= " " . implode(" AND ", $implode) . "";
            }

            if (!empty($data['filter']['search'])) {
              $sql .= " OR p.part_no LIKE '%" . $data['filter']['search'] . "%'";
            }

            $sql .= ")";
          }



          $sql .= " GROUP BY p.id";
        

          if (!empty($data['filter']['sorting'])) {
           // $sql .= " ORDER BY (CASE WHEN special IS NOT NULL THEN special ELSE p.price END)";
            $sql .= " ORDER BY p.price";
          }else{
            $sql .= " ORDER BY p.sort_order";
          }
        

       
        if (!empty($data['filter']['sorting'])) {
        if($data['filter']['sorting'] == 'desc') {
          $sql .= "  DESC";
        } else {
          $sql .= " ASC";
        }
      }

        $sql .= " LIMIT ".$data['offset'].", ".$data['limit']." ";


   $result = $this->db->query($sql)->getResult();
//   echo $this->db->getLastQuery();exit;
  // $result = $query->getResult();
  // echo '<pre>';
  // print_r($result);

     $products = array();
      if ($result) {
        foreach ($result as $key => $value) {
         $product = $this->get_product($value->id);
         if(!empty($product)){                         
                 $products[] = $product;
           }
         }   
     }
return $products;


} 




function get_count_brand_product($data = array()){
   $date = date('Y-m-d');
   $sql = "SELECT p.id,p.price, (SELECT AVG(rating) AS total FROM cyb_product_review r1 WHERE r1.product_id = p.id AND r1.status = '1' GROUP BY r1.product_id) AS rating, (SELECT price FROM cyb_product_special ps WHERE ps.product_id = p.id  AND ((ps.date_start < $date) AND (ps.date_end > $date)) ORDER BY ps.priority ASC, ps.price ASC LIMIT 1) AS special";
          $sql .=' from cyb_product  p ';
 
        if (!empty($data['filter']['filter_id'])) {
             $sql .= " LEFT JOIN cyb_product_filter pf ON(pf.product_id = p.id)";
            $implode = array();
            // $filters = explode(',', $data['filter']['filter_id']);
                   $filters = explode(',', rtrim($data['filter']['filter_id'],','));
             // $filters =array_slice($filters,0,count($filters)-1); //last filter element will remove 
            foreach ($filters as $filter_id) {
              $implode[] = (int)$filter_id;
            }
            $sql .= " AND pf.filter_id IN (" . implode(',', $implode) . ")";
                 
          }

          $sql .=" WHERE p.brand=".$data['brand_id'];

        if (!empty($data['filter']['max_price'])) {
        $sql .= " and p.price BETWEEN ".$data['filter']['min_price']." AND ".$data['filter']['max_price']."";
        }


        if (!empty($data['filter']['search'])) {
            $sql .= " AND (";
            $implode = array();

            $words = explode(' ', trim(preg_replace('/\s+/', ' ', $data['filter']['search'])));

            foreach ($words as $word) {
              $implode[] = "p.name LIKE '%" . $word . "%'";
            }

            if ($implode) {
              $sql .= " " . implode(" AND ", $implode) . "";
            }

            if (!empty($data['filter']['search'])) {
              $sql .= " OR p.part_no LIKE '%" . $data['filter']['search'] . "%'";
            }

            $sql .= ")";
          }

          
          $sql .= " GROUP BY p.id";
        

          if (!empty($data['filter']['sorting'])) {
           // $sql .= " ORDER BY (CASE WHEN special IS NOT NULL THEN special ELSE p.price END)";
            $sql .= " ORDER BY p.price";
          }else{
            $sql .= " ORDER BY p.sort_order";
          }
          // $sql .= " ORDER BY p.price";
          $sql .= " ASC";
       
  
    $products = $this->db->query($sql)->getResult();
    $array = array();
   if(!empty($products)){
      
     $numbers = array_column($products, 'price');
     $array['min'] = min($numbers);
     $array['max'] = max($numbers);
     $array['total'] = count($products);
     }else{
     $array['min'] = 0;
     $array['max'] = 0;
     $array['total'] = 0;
     }
   return $array; 
  
}

  
}
