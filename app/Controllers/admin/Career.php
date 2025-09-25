<?php

namespace App\Controllers\admin;

use App\Controllers\BaseController;
use App\Models\BackendModel;
use App\Models\CommonModel;
use App\Models\CareerModel;


class Career extends BaseController
{

    public function __construct()
    {

       $session = \Config\Services::session();
        if(empty($session->get('adminLogin'))) {
           return redirect()->to('admin/login'); 
        }
        $this->admin_id = $session->get('adminLogin');
 
    }
    
    
   public function careers()
    {
        $model = new CareerModel();
        $data['page_title'] ='Careers';
        $data['detail'] = $model->asObject()->findAll();
        // print_r($data['detail']); exit;
        echo view('admin/module/careers',$data);
    }


    function add_career($id=false)
     {
    
        $model = new CareerModel();
        if(!empty($id)) {
        
        $data['page_title'] = ' Edit Career';
        $data['form_action'] ='admin/add_career/'.$id;
        $row = $model->asObject()->find($id);
        
        $data['title'] =  $row->title;  
        $data['location'] =  $row->location;  
        $data['description'] = $row->description;
        $data['status'] = $row->status; 
        $data['sort_order'] = $row->sort_order; 
        $data['seo_url'] = $row->seo_url; 
        $data['meta_title'] = $row->meta_title; 
        $data['meta_keyword'] = $row->meta_keyword; 
        $data['meta_description'] = $row->meta_description; 
                     
        }else{

        $data['page_title'] = ' Add Career';
        $data['form_action'] ='admin/add_career';
        $data['title'] = '';    
        $data['location'] = ''; 
        $data['image'] = ''; 
        $data['description'] = ''; 
        $data['status'] = '';
        $data['sort_order'] = ''; 
        $data['seo_url'] = '';
        $data['meta_title'] = ''; 
        $data['meta_keyword'] = ''; 
        $data['meta_description'] = ''; 

        }
        
        if($this->request->getMethod()=='post'){
            
            $rules = [
                'title'=>'required'
            ];
        
         if ($this->validate($rules)==false) {
                $data['validation'] = $this->validator;
          } else{
          $save= array();
          $save['title'] =     $this->request->getVar('title');
          $save['location'] =     $this->request->getVar('location');
          $save['description'] =     $this->request->getVar('description');
          $save['status'] =     $this->request->getVar('status');
          $save['sort_order'] =     $this->request->getVar('sort_order');
          if($this->request->getVar('seo_url')){
            $save['seo_url'] =     sfu($this->request->getVar('seo_url'));  
          }else{
            $save['seo_url'] =     sfu($this->request->getVar('title'));
          }
         
          $save['meta_title'] =     $this->request->getVar('meta_title');
          $save['meta_keyword'] =     $this->request->getVar('meta_keyword');
          $save['meta_description'] =     $this->request->getVar('meta_description');
                                
        $file = $this->request->getFile('image');
          if(!empty($this->request->getFile('image'))){
           if($file->isValid() && !$file->hasMoved()){
               $file_name = $file->getRandomName();
               if($file->move('uploads/images/', $file_name)){
                   $save['info']['image'] = 'uploads/images/'.$file_name;
               }
            }else{
               throw new \RuntimeException($file->getErrorString().'('.$file->getError().')');
               exit;
           }
         }
           

     
          if ($id) {
              $save['modify_date'] = date('Y-m-d H:i:s');
              $result=  $model->update($id,$save);
              if ($result) {
              $this->session->setFlashdata('success','Record Update successfully');
              return redirect()->to('admin/careers');
              }else{
              $this->session->setFlashdata('error','Record not update');
              return redirect()->to('admin/add_career/'.$id);
              }
          }else{
    
             $save['create_date'] = date('Y-m-d H:i:s');
             $save['modify_date'] = date('Y-m-d H:i:s');
             $result=  $model->insert($save);
              if ($result) {
             
              $this->session->setFlashdata('success','Record insert successfully');
              return redirect()->to('admin/careers');
              }else{
              $this->session->setFlashdata('error','Record not insert');
              return redirect()->to('admin/add_career');
              }
    
            }
    
          }
        }
        return view('admin/module/add_career',$data);
    
    }
    
    function delete_career(){
        $model = new CareerModel();
      if ($this->request->getVar()) {
          $id = $this->request->getVar('selected');
         if ($id) {
             
            foreach($id as $value){
                $model->delete($value);
               }
           $this->session->setFlashdata('success','Record Delete successfully');
         }else{
          $this->session->setFlashdata('error','');
         }
         
        }
         
      return redirect()->to('admin/careers');
    }




 public function career_enquiry()
    {
       $model = new CareerModel();
        $data['page_title'] ='Careers Enquiry';
        $data['detail'] = $model->get_all_job_enquiry();
        echo view('admin/module/career_enquiry',$data);
    }
    
    
    
    function delete_career_enquiry(){
       
      if ($this->request->getVar()) {
          $id = $this->request->getVar('selected');
         if ($id) {
             
            foreach($id as $value){
                $this->AdminModel->deleteData('career_enquiry',array('id'=>$value));
               }
           $this->session->setFlashdata('success','Record Delete successfully');
         }else{
          $this->session->setFlashdata('error','');
         }
         
        }
         
      return redirect()->to('admin/career_enquiry');
    }
    
    
}
?>