<?php

namespace App\Controllers;
use App\Models\FrontModel;
use App\Models\CareerModel;
use App\Models\CommonModel;
use App\Models\ProductFrontModel;


class PdfController extends BaseController
{
	
	public function index() 
	{
        return view('frontend/test');
    }

    function pdf(){
        $dompdf = new \Dompdf\Dompdf(); 
        $dompdf->loadHtml(view('frontend/test'));
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();
        $dompdf->stream();
        
       
        // $dompdf->loadHtml(view('frontend/invoice',$data));
        // $dompdf->setPaper('A4', 'portrait');
        // $dompdf->render();
        // $dompdf->stream();
        // $output = $dompdf->output();
        file_put_contents('uploads/invoice/invoice01.pdf', $output);
    //   unlink('uploads/invoice/invoice01.pdf');
        
        
        
    }
	
}

?>