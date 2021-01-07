<?php
// Require composer autoload
require_once __DIR__ . '/vendor/autoload.php';

#unlink('test.txt');

$mpdf = new \Mpdf\Mpdf();

$pagecount = $mpdf->SetSourceFile('test.pdf');
$tplId = $mpdf->ImportPage($pagecount);
$mpdf->UseTemplate($tplId);

$mpdf->AddPage();

$mpdf2 = new \Mpdf\Mpdf();

$mpdf2->SetSourceFile('test.pdf');
$tplId = $mpdf2->ImportPage($pagecount);
$mpdf->UseTemplate($tplId);

$mpdf->Output();
