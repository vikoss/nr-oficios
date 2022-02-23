<?php

namespace App\Http\Controllers;

use App\Mail\NotifiedDepartments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use setasign\Fpdi\Fpdi;

class PDFController extends Controller
{
    public function index(Request $request)
    {   //return $request->file('sign')->path();
        // initiate FPDI
        $pdf = new FPDI();
        // add a page
        $pdf->AddPage();
        // set the source file
        $pdf->setSourceFile($request->file('pdf')->path());
        // import page 1
        $tplIdx = $pdf->importPage(1);
        // use the imported page and place it at position 0,0 with a width of 210 mm (full page)
        $pdf->useTemplate($tplIdx, 0, 0, 210);
        // add signature
        // $pdf->Image($request->file('sign')->path());
        $pdf->Image($request->file('sign')->path(), 95, 185, 20, 0, 'PNG');
        //$pdf->Image('http://chart.googleapis.com/chart?cht=p3&chd=t:60,40&chs=250x100&chl=Hello|World',60,30,90,0,'PNG');


        return $pdf->Output();
    }

    public function notified(Request $request)
    {
        Mail::to('juan@gmail.com')->send(new NotifiedDepartments(['greet' => 'World!']));

        return 'gg';
    }
}
