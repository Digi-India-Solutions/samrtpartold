<?php

namespace App\Models;

use CodeIgniter\Model;

class SettingModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'settings';
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

	
	
	
	function save_setting($data = array()){
		if ($data) {
		$query = $this->db->table('setting');	
		$code ='config';
		$array = array();
		$query->where('code',$code)->delete();
		foreach ($data as $key => $value) {
		  $array['code'] = $code;
		  $array['key'] = $key;
		  if (is_array($value)) {
		  $array['value'] = json_encode($value);
		  }else{
		  $array['value'] = $value;
		  }
		  
		  $query->insert($array);
		   }
		  }
		 return true;
	}





	function delete_users($ids){
		$query = $this->db->table('admin');
		if ($ids) {
		foreach ($ids as $key => $value) {
		  $query->where('id',$value)->delete();
		}
		return true;
		}
		
 }

function get_all_pincode($limit=false,$offset=false){
    $query = $this->db->table('pincode as c');
    
    $query->select('c.*,s.name as state_name , cn.name as country_name');
    $query->join('state s','c.state_id=s.id','left');
    $query->join('country cn','c.country_id=cn.id','left'); 
    $query->limit($limit,$offset);
    return $query->get()->getResult();
}



function save_pincode($data){
   $result = 0;
  $num = count($data['pincode_id']);
  if (!empty($num)) {
        $query = $this->db->table('verify_pincode');
     $query->where('state_id',$data['state_id'])->delete();
     $query1 = $this->db->table('verify_pincode');
     for ($i=0; $i < $num ; $i++) { 
      $array = array();
      $array['state_id'] = $data['state_id'];
      $array['pincode'] = $data['pincode_id'][$i];
      $array['status'] = $data['status'];
     $result =  $query1->insert($array);
       
    }
  }

return $result ;
}

function get_all_verify_pincode($limit=false,$offset=false){
      $query = $this->db->table('verify_pincode as c');
     $query->select('c.*,s.name as state_name,pn.name as pincode_name,cn.name as country_name');
    $query->join('state s','c.state_id=s.id','left');

    $query->join('pincode pn','c.pincode=pn.id','left');
          $query->join('country cn','pn.country_id=cn.id','left');
    $query->limit($limit,$offset);
     $query->groupBy('c.state_id');
    $query->orderBy('c.id','asc'); 
    return $query->get()->getResult();
}


}
