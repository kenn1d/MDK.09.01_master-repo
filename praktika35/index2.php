<?php 
    require("TCPDF-main/tcpdf.php");

    if(isset($_POST['go']) && !empty($_POST['fName']) && !empty($_POST['lName']) && !empty($_POST['mName'])) {
        $MYFILE = fopen('txt1.txt', 'w');
        $txt = "{$_POST['fName']} {$_POST['lName']} {$_POST['mName']}";
        fwrite($MYFILE, $txt);

        $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();
        $pdf->SetFont('dejavusans', '', 14);
        $pdf->Write(null, @file_get_contents('txt1.txt'));

        $pdf->Output($_SERVER['DOCUMENT_ROOT'] . 'initials.pdf', 'FI');
        fclose($MYFILE);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <input type="text" name="fName">
        <input type="text" name="lName">
        <input type="text" name="mName">
        <input type="submit" name="go" value="ОТПРАВИТЬ!">
    </form>
</body>
</html>