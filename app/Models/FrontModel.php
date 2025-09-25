<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\ProductFrontModel;

class FrontModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'fronts';
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
	
	
	function get_all_blogs($category = false,$limit = false, $offset=false){
	    
	    if(!empty($category)){
	        $query = $this->db->table('blog_category');
	        $row = $query->select('*')->where('link',$category)->get()->getRow();
	        $category_id = $row->id;
	    }
	    
	    
	    $query = $this->db->table('blogs as bg');
	    $query->select('bg.*,bc.name as blog_category');
	    $query->join('blog_category bc','bg.category_id=bc.id','left');
	    $query->where('bg.status',1);
	    
       if(!empty($category_id)){
        $query->where('bg.category_id',$category_id);  
       }
       
       if(!empty($limit)){
           $offset = $offset==1?0:$offset;
           $query->limit($limit,$offset);   
       }
	   // $query->orderBy('bg.id','asc');
	   
   
	    return  $query->get()->getResult();
	    
	}
	
	
	function get_user_orders($customer_id){
	    
	    $query = $this->db->table('order as ord');
	    $query->select('ord.*,os.name as order_status_name');
	    $query->join('order_status os','ord.order_status=os.id','left');
	    $query->where('ord.status',1);
	     $query->where('ord.customer_id',$customer_id);
	    $query->orderBy('ord.id','desc');
	    return  $query->get()->getResult();
	    
	}	
	
	function get_wishlist($customer_id){
	    $obj = new ProductFrontModel;
	    $products = array();
	    $query = $this->db->table('wishlist');
	    $result =  $query->select('product_id')->where('customer_id',$customer_id)->get()->getResult();
	  
	    if($result){
	        foreach($result as $value){
	            $products[] = $obj->get_product($value->product_id);
	        }
	    }
	 return $products;
	    
	}
	
	
	function get_user_detail($customer_id){
	    $query = $this->db->table('user as ur');
	    $query->select('ur.*,cg.price_approval');
	    $query->join('customer_group cg','ur.customer_group_id=cg.id','left');
	    $query->where('ur.id',$customer_id);
	    $query->where('ur.status',1);
	    $query->where('cg.status',1);
	    return $query->get()->getRow();
	    
	    
	}
	
	function get_realted_blogs($ids = array()){
	    if(!empty($ids)){
	         $query = $this->db->table('blogs as bg');
	    $query->select('bg.*');
	    $query->whereIn('bg.id',$ids);
	    $query->where('bg.status',1);
	    return $query->get()->getResult();
	    
	    }else{
	        return array();
	    }
	   
	    
	}
	
	
	
}
