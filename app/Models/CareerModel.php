<?php

namespace App\Models;

use CodeIgniter\Model;

class CareerModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'careers';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['title','location','seo_url','description','status','sort_order','create_date','modify_date','meta_title','meta_keyword','meta_description'];

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



    function get_all_job_enquiry(){
        $query = $this->db->table('career_enquiry ce');
        $query->select('ce.*,cr.title as job_title');
        $query->join('careers cr','ce.job_id=cr.id','left');
        return $query->get()->getResult();
    }
    

}
