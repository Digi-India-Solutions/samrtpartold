<?php

namespace App\Models;

use CodeIgniter\Model;

class CmsModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'cms';
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




	function delete_address($data = array()){
		if ($data) {
			$query = $this->db->table('contact_address');
			   foreach ($data as $key => $value) {
			   $query->where('id',$value)->delete();
			}
			return true;
		   }
		
		}



		

	
		function save_moodboard($data = array())
		{
			if ($data) {
				$query = $this->db->table('moodboards');
				if (!empty($data['info']['id'])) {
				$query->update($data['info'],array('id'=>$data['info']['id']));
				$mood_id = $data['info']['id'];
		
				}else{
				$query->insert($data['info']);
				$mood_id = $this->db->insertID();
			
				}
				$query = $this->db->table('moodboard_detail');
	
				$num = count($data['ing_image']);
				if (!empty($data['ing_image'])) {
				for ($i=0; $i < $num; $i++) { 
				$array['mood_id'] = $mood_id;
				$array['sort_order'] = $data['ing_sort_order'][$i];
				$array['image'] = $data['ing_image'][$i];
				$query->insert($array);

				}	
		
			  }
		
			  return true;
		
			}
		
		}	


}
