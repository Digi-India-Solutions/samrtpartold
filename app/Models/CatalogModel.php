<?php

namespace App\Models;

use CodeIgniter\Model;

class CatalogModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'catalogs';
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
    
    
    	function get_all_category_count($data=array()){
		$query = $this->db->table('category');
		$query->select('*')->where(array('parent_id'=>0));
		
		if(!empty($data['filter']['name'])){
		    $query->like('name',$data['filter']['name'],'both');
		}
		
		if(!empty($data['filter']['status'])){
		    $query->where('status',$data['filter']['status']);
		}
		
		return count($query->get()->getResult()); 
		
		}

	function get_all_category($data=array()){

		$query = $this->db->table('category');
		$query->select('*')->where(array('parent_id'=>0));
		if(!empty($data['filter']['name'])){
		    $query->like('name',$data['filter']['name'],'both');
		}
		
		if(!empty($data['filter']['status'])){
		    if($data['filter']['status']==1){
		        $status =1;
		    }else{
		        $status =0;
		    }
		    $query->where('status',$status);
		}
		if(!empty($data['limit'])){
		    $query->limit($data['limit'],$data['offset']);
		}
		
		return $query->get()->getResult(); 
		
		}


	function save_category_filter($data = array()){

		if ($data) {
			$query = $this->db->table('category_filter');		
			$query->where('category_id',$data['category_id'])->delete();
			$array = array();
			$num = @count($data['filter']);
			if (!empty($data['filter'][0])) {
			for ($i=0; $i < $num ; $i++) { 
			  $array['category_id'] = $data['category_id'];
			  $array['filter_id'] = $data['filter'][$i];
			
			  if ($data['old_id'][$i]) {
			  $query->where('id',$data['old_id'][$i])->update($array);
			  }else{
			  $query->insert($array);
			  }
			  }
			}
			
			return true;
		}
	}


			
    function delete_category($data = array()){
	if ($data) {
		$query = $this->db->table('product_to_category');	
		 foreach ($data as $key => $value) {
		 $check = $query->select('product_id')->where('category_id',$value)->get()->getResult();
		 if($check && count($check) >=1){
		return false;
		die();
		}else{
			$query1 = $this->db->table('category');
		    $query1->where('id',$value)->delete();
		    
		    $query2 = $this->db->table('category_filter');
		    $query2->where('category_id',$value)->delete();
		}
	  }
	  return true;
	}
	
 }

 function get_all_filter(){
	$query = $this->db->table("filter_description as fd");
	$query->select('fd.*,fl.name as group_name');
	$query->join('filter as fl','fd.filter_id=fl.id','left');
	$query->where('fl.status',1);
	return  $query->get()->getResult();
  }

  
  function get_product_list($data = array()){
    $query = $this->db->table("product as p");
	$query->select('p.*,bd.name as brand_name');
	$query->join('brands bd','p.brand=bd.id','left');
	  
	if(!empty($data['filter']['name'])){
		$query->like('p.name',$data['filter']['name'],'both');
	} 
	
	if(!empty($data['filter']['part_no'])){
		$query->where('p.part_no',$data['filter']['part_no']);
	} 
	
	if(@$data['filter']['price'] !=""){
		$query->where('p.price',$data['filter']['price']);
	} 
	
	if(@$data['filter']['brand'] !=""){
		$query->where('p.brand',$data['filter']['brand']);
	} 
	
	
	if(@$data['filter']['quantity'] !=""){
		$query->where('p.quantity',$data['filter']['quantity']);
	} 
	
	if(!empty($data['filter']['status'])){
		$status = 0;
		if($data['filter']['status']==1){
		$status = 1;    
		} else{
		$status = 0;    
		} 
		 $query->where('p.status',$data['filter']['status']);
	} 

	$query->orderBy('p.id','asc');
	if (!empty($data['limit'])) {
		 $query->limit($data['limit'],$data['offset']);
	}
			
	return $query->get()->getResult();
	
	
	
	}
	
	
	
function get_product_count($data = array()){

    $query = $this->db->table("product as p");
	$query->select('p.id');
	  
	if(!empty($data['filter']['name'])){
		$query->like('name',$data['filter']['name'],'both');
	} 
	
     if(!empty($data['filter']['part_no'])){
		$query->where('part_no',$data['filter']['part_no']);
	} 
	
	if(@$data['filter']['price'] !=""){
		$query->where('price',$data['filter']['price']);
	} 
	
	if(@$data['filter']['brand'] !=""){
		$query->where('brand',$data['filter']['brand']);
	} 
	
	
	if(@$data['filter']['quantity'] !=""){
		$query->where('quantity',$data['filter']['quantity']);
	} 
	
	if(!empty($data['filter']['status'])){
		$status = 0;
		if($data['filter']['status']==1){
		$status = 1;    
		} else{
		$status = 0;    
		} 
		 $query->where('status',$data['filter']['status']);
	} 

	$query->orderBy('p.id','asc');
		
	return count($query->get()->getResult());
	
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


		function delete_product($data = array())
		{ 
		  if ($data) {
			  $query = $this->db->table('product');
			  $query1 = $this->db->table('product_to_category');
			  $query2 = $this->db->table('product_filter');
			  $query3 = $this->db->table('product_to_download');
			  $query4 = $this->db->table('product_special');
			  $query5 = $this->db->table('product_related');
			   $query6 = $this->db->table('product_together');
			   $query7 = $this->db->table('product_attribute');
			   $query8 = $this->db->table('product_discount');
			   $query9 = $this->db->table('product_image');

			foreach ($data as $key => $value) {
		
			  $query->where('id',$value)->delete();
			  $query1->where('product_id',$value)->delete();
			  $query2->where('product_id',$value)->delete();
			  $query3->where('product_id',$value)->delete();
			  $query4->where('product_id',$value)->delete();
			  $query5->where('product_id',$value)->delete();
			  $query6->where('product_id',$value)->delete();
			  $query7->where('product_id',$value)->delete();
			  $query8->where('product_id',$value)->delete();
			  $query9->where('product_id',$value)->delete();
			}
			return true;
		  }
		
		}


		function get_attribute(){
			$query = $this->db->table('attribute at');
			$query->select('at.*,atg.name as group_name');
			$query->join('attribute_group  atg','atg.id= at.attribute_id','left');
			$query->orderBy('at.sort_order','asc');
			return $query->get()->getResult();
		}

// poduct save

function save_product($data = array()){

	if (!empty($data)) {
	$query = $this->db->table('product');
	if (@$data['id']) {
	$query->where('id',$data['id'])->update($data['product_info']);
	$product_id = $data['id'];
	}else{
	$query->insert($data['product_info']);
	$product_id = $this->db->insertID(); 
	}
	
	$this->save_product_category($product_id,$data);
	$this->save_product_filter($product_id,$data);
	// $this->save_product_download($product_id,$data);
	$this->save_product_related($product_id,$data);
	$this->save_product_attribute($product_id,$data);
	// $this->save_product_discount($product_id,$data);
	$this->save_product_special($product_id,$data);
	$this->save_product_images($product_id,$data);
	// $this->save_product_option($product_id,$data);
	// $this->save_product_ingredient($product_id,$data);
	// $this->save_product_varient($product_id,$data);
	// $this->save_product_together($product_id,$data);
	return $product_id;
	
	 }
	
	}
	


	function save_product_option($product_id,$data){
	
	 $num = count($data['product_option']['option_description_id']);
	
	for ($i=0; $i < $num ; $i++) { 
	  // opton des id in product opton table
	  $id =  $data['product_option']['option_description_id'][$i];
	  // check option avilable 
	  @$check = count($data['product_option']['option_value_id'][$id]);
	
	  // if ($check) {
		
		// crete product option table value
		$product_option = array();
		$product_option['product_id']= $product_id;
		$product_option['option_des_id'] = $data['product_option']['option_description_id'][$i];
		$product_option['required'] =  $data['product_option']['required'][$i];
		if ($data['product_option']['value'][$i]) {
			$product_option['value'] =  $data['product_option']['value'][$i];
		}
	
	
	
		// check this product is already exit or not 
		$row_exists = $this->AdminModel->fs('product_option',array('product_id'=>$product_id,'option_des_id'=>$id));
		// print_r($row_exists); exit;
		  if (!empty($row_exists)) {
			  // update with old des id in edit mode
			 $des_old_id = $data['product_option']['option_old_des_id'][$i];
			if ($des_old_id) {
			 $this->db->where(array('option_des_id'=>$des_old_id,'product_id'=>$product_id))->update('product_option',$product_option);
			 $row = $this->db->select('id')->where(array('option_des_id'=>$des_old_id,'product_id'=>$product_id))->get('product_option')->row();
			 $product_option_id  = $row->id;
			}else{
			 $this->db->insert('product_option',$product_option);
			 $product_option_id  = $this->db->insert_id();
			} 
		}else{
		  $this->db->insert('product_option',$product_option);
		   $product_option_id  = $this->db->insert_id();
		}
		  
	
		 if ($product_option_id) {
		  $option_value = array();
		
		for ($j=0; $j < count($data['product_option']['quantity'][$id]) ; $j++) { 
			  
	
	
			$option_value['product_option_id'] = $product_option_id;
			$option_value['product_id'] = $product_id;   
			$option_value['option_value_id'] = $data['product_option']['option_value_id'][$id][$j];
			$option_value['price_prefix'] = $data['product_option']['price_prefix'][$id][$j];
			$option_value['price'] = $data['product_option']['price'][$id][$j]; 
			$option_value['quantity'] = $data['product_option']['quantity'][$id][$j];
			$option_value['subtract'] = $data['product_option']['subtract'][$id][$j]; 
			$option_value['points'] = $data['product_option']['points'][$id][$j]; 
			$option_value['color'] = $data['product_option']['color'][$id][$j]; 
			$option_value['name'] = $data['product_option']['name'][$id][$j]; 
			$option_value['sort_order'] = $data['product_option']['sort_order'][$id][$j]; 
			 $option_value['short_des'] = $data['product_option']['short_des'][$id][$j]; 
			
			if($data['product_option']['name'][$id][$j]){
				   $option_value['option_id'] = 12;  // 12 is for variant option id
			}
		
			if (!empty($data['option_image'][$j])) {
			  $option_value['image'] = $data['option_image'][$j]; 
			}else{
			  $option_value['image'] = $data['old_option_image'][$j]; 
			}
		
	
			 @$option_old_id = $data['product_option']['option_old_id'][$id][$j];
			 if ($option_old_id) {
			   $this->db->where('id',$option_old_id)->update('product_option_value',$option_value);
			 }else{
			  $this->db->insert('product_option_value',$option_value);
			 }
		   
	
		   }
		}
		
	  // }
	
	
	}
	
	
	}
	
	
	
	function save_product_category($product_id,$data = array()){
	$array = array();
	$query = $this->db->table('product_to_category');
	@$num = count($data['category']);
	$query->where('product_id',$product_id)->delete();
	if (!empty($num)) {
	  for ($i=0; $i < $num ; $i++) { 
		$array['product_id']= $product_id;
		$array['category_id'] = $data['category'][$i];
		$query->insert($array);
	    }
	  }
	}
	
	function save_product_filter($product_id,$data = array()){
	$array = array();
	$query = $this->db->table('product_filter');
	$query->where('product_id',$product_id)->delete();
	@$num = count($data['filter']);
	if (!empty($num)) {
	  for ($i=0; $i < $num ; $i++) { 
		$array['product_id']= $product_id;
		$array['filter_id'] = $data['filter'][$i];
		$query->insert($array);
	     }
	  }
	}
	
	
	function save_product_related($product_id,$data = array()){
	$array = array();
	@$num = count($data['related']);
	$query = $this->db->table('product_related');
	$query->where('product_id',$product_id)->delete();
	if (!empty($num)) {
	  for ($i=0; $i < $num ; $i++) { 
		$array['product_id']= $product_id;
		$array['related_id'] = $data['related'][$i];
		$query->insert($array);
	    }
	  }
	}
	

	// function save_product_together($product_id,$data = array()){
	// $array = array();
	// @$num = count($data['together']);
	// $this->db->where('product_id',$product_id)->delete('product_together');
	// if (!empty($num)) {
	//   for ($i=0; $i < $num ; $i++) { 
	// 	$array['product_id']= $product_id;
	// 	$array['together_id'] = $data['together'][$i];
	// 	$this->db->insert('product_together',$array);
	//   }
	//   }
	// }
		
	
	
	function save_product_attribute($product_id,$data = array()){
	$array = array();
	@$num = count($data['attribute_id']);
	$query = $this->db->table('product_attribute');
	if (!empty($num)) {
	
	  $query->where('product_id',$product_id)->delete();
	  
	  for ($i=0; $i < $num ; $i++) { 
		$array['product_id']= $product_id;
		$array['attribute_id'] = $data['attribute_id'][$i];
		$array['text'] = $data['attribute_text'][$i];
		$query->insert($array);
	   }
	  }
	}
	
	
	function save_product_special($product_id,$data = array()){
	$query = $this->db->table('product_special');
	$query->where('product_id',$product_id)->delete();
	$array = array();
	@$num = count($data['customer_group_id']);
	
	if (!empty($num)) {
	$query = $this->db->table('product_special');  
	  for ($i=0; $i < $num ; $i++) { 
		$array['product_id']= $product_id;
		$array['customer_group_id'] = $data['customer_group_id'][$i];
		$array['priority'] = $data['special_priority'][$i];
		$array['price'] = $data['special_price'][$i];
		$array['date_start'] = $data['special_date_start'][$i];
		$array['date_end'] = $data['special_date_end'][$i];
		$query->insert($array);
	  }
	  }
	}
	
	function save_product_images($product_id,$data = array()){
	$array = array();
	$query = $this->db->table('product_image');
	$query->where('product_id',$product_id)->delete();
	@$num = count($data['image_sort_order']);
	if (!empty($num)) {
	  
	  for ($i=0; $i < $num ; $i++) { 
		$array['product_id']= $product_id;
		if ($data['product_image'][$i]) {
		$array['image'] = $data['product_image'][$i];
		}else{
		$array['image'] = $data['old_product_image'][$i];
		}

		$array['sort_order'] = $data['image_sort_order'][$i];
			
		   $query->insert($array); 
			  
	     }
	  }
	}
	
	// function save_product_ingredient($product_id,$data = array()){
	
	// $array = array();
	// $this->db->where('product_id',$product_id)->delete('product_ingredient');
	// @$num = count($data['ing_sort_order']);
	// if (!empty($num)) {
	  
	//   for ($i=0; $i < $num ; $i++) { 
	// 	$array['product_id']= $product_id;
	
	// 	if (@$data['ing_image'][$i]) {
	// 	$array['image'] = $data['ing_image'][$i];
	// 	}else{
	// 	$array['image'] = $data['old_ing_image'][$i];
	// 	}
	// 	 $array['sub_heading'] = $data['ing_sub_heading'][$i];
	// 	$array['title'] = $data['ing_title'][$i];
	// 	$array['sort_order'] = $data['ing_sort_order'][$i];
	// 	 $array['bg_color'] = $data['bg_color'][$i];
	// 	 $array['text_color'] = $data['text_color'][$i];
	// 	 $array['img_position'] = $data['img_position'][$i];
	// 	 $array['text_position'] = $data['text_position'][$i];
	// 	 if(@$data['full_bg'][$i]){
	// 		 $array['full_bg'] = $data['full_bg'][$i];
	// 	 }else{
	// 		  $array['full_bg'] = 0;
	// 	 }
		 
			
		   
	// 	$this->db->insert('product_ingredient',$array); 
	
	// 	}
	//   }
	// }
	
// end



function save_filter($data = array()){

	if ($data) {
	$query = $this->db->table('filter');	
	  if ($data['id']) {
		$query->where('id',$data['id'])->update($data['filter']);
	  $filter_id = $data['id'];
	  }else{
		$query->insert($data['filter']);
	  $filter_id = $this->db->insertID();
	  }
	  
	  $query = $this->db->table('filter_description');
	  $num = count($data['filter_name']);
	  if ($num) {
	  $query->where('filter_id',$filter_id)->delete();
	  }
	  for ($i=0; $i <  $num; $i++) { 
	  $array = array();
	  $array['filter_id'] = $filter_id;
	  $array['name'] = $data['filter_name'][$i];
	  $array['sort_order'] = $data['filter_sort_order'][$i];
	  $query->insert($array);
	  }
	  return true;
	
	  
	}
	
	}
	
	
 function get_all_brand_list(){
     $query = $this->db->table('brands bnd');
     $query->select('bnd.*,bc.name as category_name');
     $query->join('brand_category bc','bnd.brand_cat_id=bc.id','left');
     return $query->get()->getResult();
 }	
	
function get_product_seo_url($seo_url){
    $query = $this->db->table('product');
    return $query->select('product_seo_url')->where('product_seo_url',$seo_url)->get()->getResult();
    
}




function batchUpdateData($array = array()){
$query = $this->db->table('product');
$price = array();
$part_no = array();
$special = array();
$brand = array();
$date_start = array();
$date_end = array();


if (!empty($array)) {
	 foreach ($array as $key => $value) {
		$price[] = $value['price'];
		$part_no[] = $value['part_no'];
		$special[] = $value['special_price'];
		$brand[] = $value['brand'];
		$date_start[] = $value['date_start'];
        $date_end[] = $value['date_end'];
        
        // name
        // description
        // sku
        // quantity
        // meta_title
        // meta_keyword
        // meta_description
        // sort_order
        // image
        
	}
	
	  $num = count($part_no);

	  $sql ="UPDATE cyb_product SET "; 
	 
    // 	price case
     $sql .=" price = CASE ";
	 for($i=0; $i < $num; $i++){
	 	$sql .=" WHEN  part_no = '".$part_no[$i]."' AND brand = '".$brand[$i]."'  THEN '".$price[$i]."' ";

	 } 
	  $sql .="ELSE price END ,";
	  
    // special case
	  $sql .=" special_price = CASE ";
	 for($i=0; $i < $num; $i++){
	 	$sql .=" WHEN  part_no = '".$part_no[$i]."' AND brand = '".$brand[$i]."'  THEN '".$special[$i]."' ";
	 } 
	  $sql .="ELSE special_price END ,";
	  
	  // date_start  case
	  $sql .=" date_start = CASE ";
	 for($i=0; $i < $num; $i++){
	 	$sql .=" WHEN  part_no = '".$part_no[$i]."' AND brand = '".$brand[$i]."'  THEN '".$date_start[$i]."' ";
	 } 
	  $sql .="ELSE date_start END ,";
	  
	  // date_end  case
	  $sql .=" date_end = CASE ";
	 for($i=0; $i < $num; $i++){
	 	$sql .=" WHEN  part_no = '".$part_no[$i]."' AND brand = '".$brand[$i]."'  THEN '".$date_end[$i]."' ";
	 } 
	  $sql .="ELSE date_end END";
	  

	 $sql .=" WHERE part_no IN ('" . implode("','", $part_no) . "') ";


   return $this->db->query($sql);

 //    WHEN `part_no` = 'rakesh' THEN 'Avatar' WHEN `part_no` = 'rakesh' THEN 'ryas'    ELSE `name` END,
 // `description` = CASE WHEN `part_no` = 'rakesh' THEN 'Description' WHEN `part_no` = 'rakesh' THEN 'defe3' ELSE `description` END,

}

}


}
