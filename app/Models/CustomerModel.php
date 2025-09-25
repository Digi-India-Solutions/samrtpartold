<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'customers';
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
	
	
	function get_product_enquiry($filter=false){
	    $query = $this->db->table('product_enquiry pe');
	    $query->select('pe.*,pd.name as product_name');
	    $query->join('product pd','pd.id=pe.product_id','left');

	     if(!empty($filter['name'])){
	     $query->like('pe.name',$filter['name'],'both');
	    }
	     if(!empty($filter['email'])){
	     $query->like('pe.email',$filter['email'],'both');
	    }
	    
	    if(!empty($filter['phone'])){
	     $query->like('pe.phone',$filter['phone'],'both');
	    }

	    $query->orderBy('pe.id','desc');
	    return $query->get()->getResult();
	}
	
	
	
	function get_all_enquiry($filter=false){
	    $query = $this->db->table('enquiry');
	    $query->select('*');
	    if(!empty($filter['name'])){
	     $query->like('name',$filter['name'],'both');
	    }
	     if(!empty($filter['email'])){
	     $query->like('email',$filter['email'],'both');
	    }
	    
	    if(!empty($filter['phone'])){
	     $query->like('phone',$filter['phone'],'both');
	    }
	    $query->orderBy('id','desc');
	    return $query->get()->getResult();
	}	
	
		function get_all_quotationenquiry($filter=false){
	    $query = $this->db->table('quotation');
	    $query->select('*');
	    if(!empty($filter['name'])){
	     $query->like('name',$filter['name'],'both');
	    }
	     if(!empty($filter['email'])){
	     $query->like('email',$filter['email'],'both');
	    }
	    
	    if(!empty($filter['phone'])){
	     $query->like('phone',$filter['phone'],'both');
	    }
	    $query->orderBy('id','desc');
	    return $query->get()->getResult();
	}

	function get_all_users($filter=array(),$limit=false,$offset=false){
	    $query = $this->db->table('user ur');
	    $query->select('ur.*,cg.group_name,cnt.name as country_name');
	    $query->join('customer_group cg','ur.customer_group_id=cg.id','left');
	    $query->join('country cnt','ur.country=cnt.id','left');
	    
	    
	    if(!empty($filter['name'])){
	     $query->like('ur.first_name',$filter['name'],'both');
	    }
	     if(!empty($filter['email'])){
	     $query->like('ur.email',$filter['email'],'both');
	    }	    
	   	
	   	$query->limit($limit,$offset);

	    $query->orderBy('ur.id','desc');
	    return $query->get()->getResult();
	}	
	

	function delete_customer($ids){
    
    if($ids){
    	$query = $this->db->table('user');
        foreach($ids as $value){
        $result =   $query->where('id',$value)->delete();
        }
        if($result){
        return true;
        }else{
        return false;
        }
    }
  }


function get_all_orders($customer_id){
  $query = $this->db->table('order ord');
  $query->select('ord.*,os.name as current_status');
  $query->join('order_status os','ord.order_status=os.id','left');
  $query->where('ord.status',1);
  $query->where('ord.customer_id',$customer_id);
  return $query->get()->getResult();
}

function get_all_review($filter = array(),$limit =false,$offset = false){
 $query = $this->db->table('product_review pr');
  $query->select('pr.*,pd.name as product_name');
  $query->join('product pd','pr.product_id=pd.id','left');

	if (!empty($filter['name'])) {
	 $query->like('pr.fname',$filter['name'],'both');
	}

	if (!empty($filter['product_id'])) {
	$query->where('pr.product_id',$filter['product_id']);
	}

  $query->orderBy('pr.id','desc');
  $query->limit($limit,$offset);
  return $query->get()->getResult();
}



function delete_customer_review($ids){
    
    if($ids){
    	$query = $this->db->table('product_review');
        foreach($ids as $value){
        $result =   $query->where('id',$value)->delete();
        }
        if($result){
        return true;
        }else{
        return false;
        }
    }
}


function get_export_user($array = false){
 $query = $this->db->table('user as ur');
if($array){
  

   $query->select('ur.*');
    
  if (@$array['name']) {
   $query->like('ur.first_name',$array['name'],'both');
  }


if (@$array['email']) {
   $query->where('ur.email',$array['email']);
  }


  if(!empty($array['selected']) && count($array['selected'])){

     $query->whereIn('ur.id',$array['selected']);  
  }

  $query->orderBy('ur.id','desc');
  return  $query->get()->getResult();
    
}
  
  $query->select('ur.*');
  $query->orderBy('ur.id','desc');
  return $query->get()->getResult();
}



	
}
