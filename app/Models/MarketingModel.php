<?php

namespace App\Models;

use CodeIgniter\Model;

class MarketingModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'marketing';
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


	function get_all_coupon($limit=false,$offset=false,$filter = false){
	$query = $this->db->table('coupon');
	$query->select('*');
	$query->limit($limit,$offset);

	if(@$filter['name']){
	 $query->like('coupon_name',$filter['name'],'both'); 
	}

	if(@$filter['code']){
	 $query->like('coupon_code',$filter['code'],'both'); 
	}

	return $query->get()->getResult();

	}

 function insert_coupon($data){
	if (!empty($data)) {
	$query = $this->db->table('coupon');  
	if (!empty($data['id'])) {
	$query->where('id',$data['id'])->update($data['coupon_info']);
	$coupon_id = $data['id'];
	}else{
	$query->insert($data['coupon_info']);
	$coupon_id = $this->db->insertId();  
	}
	$this->save_coupon_category($coupon_id,$data);
	$this->save_coupon_product($coupon_id,$data);
	return true;
	}
	}



	function save_coupon_category($coupon_id,$data){
	$query = $this->db->table('coupon_to_category');  
	$query->where('coupon_id',$coupon_id)->delete();
	echo $num = @count($data['category']);

	if(@$data['category'][0]){
	    if (!empty($num)) {
	        
	        if($data['category'][0]=='all'){
	           $all_Category = $this->AdminModel->all_fetch('category',array('status'=>1));
	         
	           foreach ($all_Category as $value) { 
	            $array['coupon_id']= $coupon_id;
	            $array['category_id'] = $value->id;
	            $query->insert($array);
	            } 
	           
	           
	        }else{
	           
	           for ($i=0; $i < $num ; $i++) { 
	            $array['coupon_id']= $coupon_id;
	            $array['category_id'] = $data['category'][$i];
	            $query->insert($array);
	            }  
	        }
	        
	        
	       
	    }
	}
	return true;
	}



	function save_coupon_product($coupon_id,$data){
	$query = $this->db->table('coupon_to_product');  
	$query->where('coupon_id',$coupon_id)->delete();
	$num = @count($data['product']);
	if (!empty($num)) {
	if($data['product'][0]){

	for ($i=0; $i < $num ; $i++) { 
	$array['coupon_id']= $coupon_id;
	$array['product_id'] = $data['product'][$i];
	$query->insert($array);
	}
	}
	}
	return true;
	}
	function delete_coupon($data = array())
	{ 
	  if ($data) {
	    foreach ($data as $key => $value) {
	      $query1 = $this->db->table('coupon'); 
	      $query2 = $this->db->table('coupon_to_category'); 
	      $query3 = $this->db->table('coupon_to_product');  
	      $query1->where('id',$value)->delete();
	      $query2->where('coupon_id',$value)->delete();
	      $query3->where('coupon_id',$value)->delete();
	    }
	    return true;
	  }

	}
	
	
	
	function get_product_name_list(){
	    $query = $this->db->table('product');
        return $query->select('id,name')->where('status',1)->get()->getResult();

	}


}
