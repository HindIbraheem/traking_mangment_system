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



    public function personalVacation()
    {





//         $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);


//         $pdf::SetAuthor('Your Name');
//         $pdf::SetTitle('Document Title');
//         $pdf::SetSubject('Document Subject');
//         $pdf::SetKeywords('keywords, here');

//         $pdf::SetFontSize(10);
//         $pdf::SetFont('aefurat', '', 18);
//         $pdf::Ln();
//          $pdf::setRTL(true);
//          $pdf::AddPage('P', 'A4');
//    // set default header data
// $pdf::SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 061', PDF_HEADER_STRING);

// // set header and footer fonts
// $pdf::setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
// $pdf::setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

//         $html = view('pdf.personalVacation')->render();
//         $pdf::writeHTML($html, true, false, true, false, '');
//         $pdf::Output('document.pdf', 'I');









$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information

$pdf::SetAuthor('Nicola Asuni');
$pdf::SetTitle('TCPDF Example 061');
$pdf::SetSubject('TCPDF Tutorial');
$pdf::SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf::SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 061', PDF_HEADER_STRING);

// set header and footer fonts
$pdf::setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf::setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf::SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf::SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf::SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf::SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf::setImageScale(PDF_IMAGE_SCALE_RATIO);


// set font
$pdf::SetFont('aefurat', '', 10);
$pdf::setRTL(true);




$html = view('pdf.personalVacation')->render();


// add some pages and bookmarks
for ($i = 1; $i < 4; $i++) {
    $pdf::AddPage();

    $pdf::Cell(0, 10, 'الشعبة  '.$i, 0, 1, 'R');


    $pdf::writeHTML($html, true, false, true, false, '');

}

$pdf::Output('document.pdf', 'I');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -






// ---------------------------------------------------------000



//============================================================+
// END OF FILE
//============================================================+
    }
}

