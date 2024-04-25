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
        $data = [
            'foo' => 'bar'
        ];

        // $pdf = PDF::loadView('pdf.document', $data);

        // return $pdf->stream('document.pdf');


//     	$pdf = new TCPDF;
//         $pdf::SetTitle('Hello World');
//         $pdf::AddPage();
//         $pdf::SetFont('aealarabiya', '', 18);

// $pdf::SetFontSize(10);
// // // print newline
// $pdf::Ln();


// // // Restore RTL direction
// $pdf::setRTL(true);

// // // set font
// $pdf::SetFont('aefurat', '', 18);

// // // print newline
// $pdf::Ln();

// // // Arabic and English content
// $pdf::Cell(0, 12, 'بِسْمِ اللهِ الرَّحْمنِ الرَّحِيمِ',0,1,'C');

// $pdf::WriteHTML($htmlcontent, true, 0, true, 0);

// $pdf::Output('hello_world.pdf');
// $pdf::setRTL(false);


// $pdf::Ln();

// $pdf::SetFont('aealarabiya', '', 18);

//         $pdf::AddPage();
//         $pdf::SetFont('aealarabiya', '', 18);



$style='<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>'
;




$htmlcontent = $style.'


<table>
  <tr>
    <th>Company</th>
    <th>Contact</th>
    <th>Country</th>
  </tr>
  <tr>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Centro comercial Moctezuma</td>
    <td>Francisco Chang</td>
    <td>Mexico</td>
  </tr>
  <tr>
    <td>Ernst Handel</td>
    <td>Roland Mendel</td>
    <td>Austria</td>
  </tr>
  <tr>
    <td>Island Trading</td>
    <td>Helen Bennett</td>
    <td>UK</td>
  </tr>
  <tr>
    <td>Laughing Bacchus Winecellars</td>
    <td>Yoshi Tannamuri</td>
    <td>Canada</td>
  </tr>
  <tr>
    <td>Magazzini Alimentari Riuniti</td>
    <td>Giovanni Rovelli</td>
    <td>Italy</td>
  </tr>
</table>


تمَّ بِحمد الله حلّ مشكلة الكتابة باللغة العربية في ملفات الـ<span color="#FF0000">PDF</span> مع دعم الكتابة <span color="#0000FF">من اليمين إلى اليسار</span> و<span color="#009900">الحركَات</span> .<br />تم الحل بواسطة <span color="#993399">صالح المطرفي و Asuni Nicola</span>



. ';
        $pdf = new TCPDF();
        $pdf::SetTitle('Hello World');
        $pdf::AddPage();
        $pdf::SetFontSize(10);

        // $pdf::SetFont('aealarabiya', '', 18);
        $pdf::SetFont('aefurat', '', 18);


// // print newline
$pdf::Ln();


// // Restore RTL direction
$pdf::setRTL(true);

// // set font

// // print newline
$pdf::Ln();

// // Arabic and English content
        $pdf::Cell(0, 12, 'بِسْمِ اللهِ الرَّحْمنِ الرَّحِيمِ',0,1,'C');
        // $pdf::writeHTML($htmlcontent, true, false, true, false, '');












        // $pdf::Output('hello_world.pdf');





        // return view('pdf.document');
        $pdf::writeHTML(view('pdf.document')->render());





    }
}

