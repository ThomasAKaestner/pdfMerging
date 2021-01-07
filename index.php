<?php
// Require composer autoload
use Mpdf\Output\Destination;

require_once __DIR__ . '/vendor/autoload.php';


 function mergePdfs($basePdfPath, array $pdfPaths)
{
    $mpdf = new \Mpdf\Mpdf();
    $pagecount = $mpdf->SetSourceFile($basePdfPath);
    $tplId = $mpdf->ImportPage($pagecount);
    $mpdf->UseTemplate($tplId);

    foreach ($pdfPaths as $pdfPath) {
        $mpdf->AddPage();

        $tempMpdf = new \Mpdf\Mpdf();
        $tempMpdf->SetSourceFile($pdfPath);
        $tplId = $tempMpdf->ImportPage($pagecount);
        $mpdf->UseTemplate($tplId);
    }

    $mpdf->Output();
}

mergePdfs('test.pdf', ['test.pdf']);
