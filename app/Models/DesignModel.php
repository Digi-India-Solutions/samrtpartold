<?php

namespace App\Models;

use CodeIgniter\Model;

class DesignModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'information';
	protected $primaryKey           = 'information_id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDeletes       = false;
	protected $protectFields        = true;
	protected $allowedFields        = ['title'];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'create_date';
	protected $updatedField         = 'modify_date';
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

	


	function save_pages($data = array())
	{
		if ($data) {
			$query = $this->db->table('information');
			if ($data['id']) {
			$query->update($data['info'],array('information_id'=>$data['id']));
			$info_id = $data['id'];
	
			}else{
			$query->insert($data['info']);
			$info_id = $this->db->insertID();
		
			}
			$query = $this->db->table('information_faq');

			$num = @count($data['question']);
			$query->where('info_id',$info_id)->delete();
			if (!empty($data['question'][0])) {
			for ($i=0; $i < $num; $i++) { 
			$array['info_id'] = $info_id;
			$array['question'] = $data['question'][$i];
			$array['answer'] = $data['answer'][$i];	
			$array['sort_order'] = $data['fsort_order'][$i];	
			$array['status'] = $data['fstatus'][$i];
			$query->insert($array);
			}	
	
		  }
	
		  return true;
	
		}
	
	}


function save_banner($data){
  $array = array();

  $query = $this->db->table('banner');

  if ($data['id']) {
    $query->where('id',$data['id'])->update($data['info']);
    $banner_id = $data['id'];
  }else{
    $query->insert($data['info']);
    $banner_id = $this->db->insertID();
  }

  $query1 = $this->db->table('banner_image');
  $query1->where('banner_id',$banner_id)->delete();

  @$num = count($data['sort_order']);

  if (!empty($num)) {
    
    for ($i=0; $i < $num ; $i++) { 
    $array['banner_id']= $banner_id;
    if (!empty($data['image'][$i])) {
    $array['image'] = $data['image'][$i];
    }else{
    $array['image'] = @$data['old_image'][$i];
    }

    $array['title'] = $data['title'][$i];
    $array['link'] = $data['link'][$i];
    $array['sort_order'] = $data['sort_order'][$i];
      
      $result =  $query1->insert($array); 
        
       }
    
    }
    
    return $result;
    
  }



}
