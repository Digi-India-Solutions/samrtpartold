<?php

namespace App\Models;

use CodeIgniter\Model;

class BackendModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'admin';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = ['firstname','lastname','permission','email','username','password','photo','last_login','status','modify_date'];

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



    function get_all_active_order(){
       $query = $this->db->table('order');
       $query->select('order.*');
       $query->where('order.order_status <>',7);
      return $query->get()->getResult();
    }
    
    function get_all_sales(){
        $query = $this->db->table('order');
        $query->selectSum('total')->where('order_status',5);
        $result = $query->get()->getRow();
        $array['sale'] = $result->total;
        
        $query->selectSum('total');
        $result = $query->get()->getRow();
        $array['total'] = $result->total;
        
        return $array;
    }


    function get_latest_order(){
        $query = $this->db->table('product_enquiry as pe');
        $query->select('pe.*,pd.name as product_name');
        $query->join('product pd','pd.id=pe.product_id','left');
    //  $query->join('customer cs','od.customer_id=cs.id','left');
        $query->orderBy('pe.id','desc');
        $query->limit('10');
        return  $query->get()->getResult();
    }
    
    //   function get_latest_order(){
    //     $query = $this->db->table('order as od');
    //     $query->select('od.*,os.name as order_status');
    //     $query->join('order_status os','od.order_status=os.id','left');
    // //  $query->join('customer cs','od.customer_id=cs.id','left');
    //     $query->orderBy('od.id','desc');
    //     $query->limit('10');
    //     return  $query->get()->getResult();
    // }




   public function getwithLimitOrde1rBy($tbl,$start_limit,$end_limit,$col,$order)
    {   
        $query = $this->db->table($tbl);
        $query->select('*');
        $query->limit($start_limit, $end_limit);
        $query->orderBy($col, $order);
        return  $query->get()->getResult();
    }
    
    function get_order_all(){
        $query = $this->db->table('order');    
        $query->select('order.date_added,order.total');
        $query->orderBy('date_added','desc');
        $query->groupBy('DATE(date_added), MONTH(date_added), YEAR(date_added)');
      return  $query->get()->getResult();
    }
    
    function get_order_all_calendar_month(){
        $query = $this->db->table('order');
        $query->select('order.*,sum(total) as total');
        $query->orderBy('date_added','desc');
        $query->groupBy('Month(date_added)');
        return  $query->get()->getResult();
    }
    
    function get_order_all_calendar_year(){
        $query = $this->db->table('order');
        $query->select('order.date_added,sum(total) as total');
        $query->orderBy('date_added','desc');
        $query->groupBy('year(date_added)');
        return  $query->get()->getResult();
    }
    
    function get_order_all_calendar_week(){
        $query = $this->db->table('order');
        $query->select('order.date_added,sum(total) as total');
        $query->orderBy('date_added','desc');
        $query->groupBy('DAYNAME(date_added)');
        return  $query->get()->getResult();
    }
    
    

}
