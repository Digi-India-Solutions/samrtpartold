<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Menu extends BaseController
{
	
	
	public function __construct()
	{

	   $session = \Config\Services::session();
		if(empty($session->get('adminLogin'))) {
		   return redirect()->to('admin/login'); 
		}
		$this->admin_id = $session->get('adminLogin');
             
	}

		
	function page_banner(){

		$data['page_title']= 'All page banner';
		$data['detail'] =  $this->AdminModel->all_fetch('page_banner');
		$this->view('page_banner', $data);
	
	  }
}
