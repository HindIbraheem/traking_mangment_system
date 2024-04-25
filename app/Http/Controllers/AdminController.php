<?php

namespace App\Http\Controllers;

use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Http\Request;
use PDF;

class AdminController extends Controller
{
    //
       function index(){
        return view('dashboards.admins.index');
    }
    function profile(){
        return view('dashboards.admins.profile');
    }
    function settings(){
        return view('dashboards.admins.settings');
    }



    public function viewPdf()
    {

;



        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);


        $pdf::SetAuthor('Your Name');
        $pdf::SetTitle('Document Title');
        $pdf::SetSubject('Document Subject');
        $pdf::SetKeywords('keywords, here');

        $pdf::AddPage();
        $pdf::SetFontSize(10);


        $pdf::SetFont('aefurat', '', 18);
        $pdf::Ln();


         $pdf::setRTL(true);




        $html = view('pdf.document')->render();

        $pdf::writeHTML($html, true, false, true, false, '');

        $pdf::Output('document.pdf', 'I');



    }
}

