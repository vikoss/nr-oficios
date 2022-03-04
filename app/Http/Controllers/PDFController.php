<?php

namespace App\Http\Controllers;

use App\Mail\NotifiedDepartments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use setasign\Fpdi\Fpdi;
use PDF;
use Illuminate\Support\Facades\Storage;

class PDFController extends Controller
{

    public function generate()
    {
        $pdf = PDF::loadView('pdf.sign');

        return $pdf->stream('file.pdf');
    }

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

    public function sign(Request $request)
    {
        $pdfSign = PDF::loadView('pdf.sign');
        Storage::put('public/pdf/invoice.pdf', $pdfSign->output());
        $files = [$request->file('pdf')->path(), Storage::path('public/pdf/invoice.pdf')];

        $fpdi = new FPDI;
        foreach ($files as $file) {
            $filename  = $file;
            $count = $fpdi->setSourceFile($filename);
            for ($i=1; $i<=$count; $i++) {
                $template   = $fpdi->importPage($i);
                $size       = $fpdi->getTemplateSize($template);
                $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
                $fpdi->useTemplate($template);
            }

        }
        return $fpdi->Output();
    }
}
