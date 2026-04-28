<?php 

    require("TCPDF-main/tcpdf.php");
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    
    $pdf->AddPage();
    $pdf->SetFont('dejavusans', '', 10);
    $pdf->setTextColor(0,0,0);
    $text = @file_get_contents('1.txt');
    $pdf->Write(null, $text);

    $pdf->Output($_SERVER['DOCUMENT_ROOT'] . 'test.pdf', 'FI');
?>