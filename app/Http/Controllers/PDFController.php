<?php

namespace App\Http\Controllers;

use App\Mail\NotifiedDepartments;
use App\Models\Employee;
use App\Models\Notification;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use setasign\Fpdi\Fpdi;
use PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use setasign\Fpdi\PdfParser\StreamReader;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PDFController extends Controller
{

    public function generate()
    {
        $pdf = PDF::loadView('pdf.validated-email-report');

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
        //return auth()->user()->toArray();
        $employee = Employee::find(auth()->user()->employee_id);
        $pdfSign = PDF::loadView('pdf.sign', [
            'employee'  => $employee,
            'position'  => $employee->position,
            'qrCode'    => base64_encode(QrCode::generate($employee->employee_number)),
        ]);
        $pathRandomTmp = 'notifications/'.Str::uuid().'.pdf';
        Storage::put($pathRandomTmp, $pdfSign->output());
        //return 'https://nr-oficios.s3.us-west-1.amazonaws.com/'.Storage::path($pathRandomTmp);
        $urlFinal = 'https://nr-oficios.s3.us-west-1.amazonaws.com/'.$pathRandomTmp;
        /* return $urlFinal;
        return Storage::download($urlFinal); */
        $files = [$request->file('pdf')->path(), file_get_contents($urlFinal)];

        $fpdi = new FPDI;
        foreach ($files as $key => $file) {
            $filename  = $file;
            if ($key === 1) {
                $count = $fpdi->setSourceFile(StreamReader::createByString($filename));
            } else {
                $count = $fpdi->setSourceFile($filename);
            }
            for ($i=1; $i<=$count; $i++) {
                $template   = $fpdi->importPage($i);
                $size       = $fpdi->getTemplateSize($template);
                $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
                $fpdi->useTemplate($template);
            }

        }
        // store
        //return base64_encode($fpdi->Output('S'));
        $pathF = Storage::put($pathRandomTmp, $fpdi->Output('S'));
        return $urlFinal;
    }

    // Output()
    /*
        I: send the file inline to the browser. The plug-in is used if available. The name given by name is used when one selects the "Save as" option on the link generating the PDF.
        D: send to the browser and force a file download with the name given by name.
        F: save to a local file with the name given by name (may include a path).
        S: return the document as a string. name is ignored.

    */

    public function upload(Request $request)
    {
        $path = Storage::put('notifications', $request->file('file'));
        return Storage::url($path);
    }

    public function validatedEmailsReport(Notification $notification)
    {
        $pdf = PDF::loadView('pdf.validated-email-report', [
            'emails' => $notification->emails()->get()->toArray()
        ]);

        return $pdf->download("notificacion {$notification->name} {$notification->id}.pdf");
    }
}
