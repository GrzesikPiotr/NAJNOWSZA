<?php
define('FPDF_FONTPATH','font/');
include("../config.php");
require('fpdf/fpdf.php');


$pdf=new FPDF();
$pdf->Open();
$pdf->AddPage();
$pdf->AddFont('Arial_ce','','Arial_ce.php');
$pdf -> SetFont('Arial_ce','', 14);


$wydarzenie = iconv('iso-8859-2','windows-1250//TRANSLIT', $_POST['wydarzenie']);
$pdf -> SetTextColor(255, 0, 0);
$pdf->MultiCell(190,8, $wydarzenie,50,'L',10 );
$pdf -> SetTextColor(0, 0, 0);


$nazwa_organu = iconv('iso-8859-2','windows-1250//TRANSLIT', $_POST['nazwa_organu']);
$pdf->MultiCell(190, 8, "Nazwa szkoly: ", 0 , '', 0);
$pdf -> SetTextColor(255, 0, 0);
$pdf->MultiCell(190,8, $nazwa_organu, 1, 'C');
$pdf -> SetTextColor(0, 0, 0);


$data = iconv('iso-8859-2','windows-1250//TRANSLIT', $_POST['data']);
$pdf->MultiCell(190, 8, "Data wydarzenia: ", 0 , '', 0);
$pdf -> SetTextColor(255, 0, 0);
$pdf->MultiCell(190,8, $data, 1, 'C');
$pdf -> SetTextColor(0, 0, 0);


$godzina = iconv('iso-8859-2','windows-1250//TRANSLIT', $_POST['godzina']);
$pdf->MultiCell(190, 8, "Godzina wydarzenia: ", 0 , '', 0);
$pdf -> SetTextColor(255, 0, 0);
$pdf->MultiCell(190,8, $godzina, 1, 'C');
$pdf -> SetTextColor(0, 0, 0);


$adres = iconv('iso-8859-2','windows-1250//TRANSLIT', $_POST['adres']);
$pdf->MultiCell(190, 8, "Adres: ", 0 , '', 0);
$pdf -> SetTextColor(255, 0, 0);
$pdf->MultiCell(190,8, $adres, 1, 'C');
$pdf -> SetTextColor(0, 0, 0);


$miasto = iconv('iso-8859-2','windows-1250//TRANSLIT', $_POST['miasto']);
$pdf->MultiCell(190, 8, "Miejscowosc: ", 0 , '', 0);
$pdf -> SetTextColor(255, 0, 0);
$pdf->MultiCell(190,8, $miasto, 1, 'C');
$pdf -> SetTextColor(0, 0, 0);


$informacje = iconv('iso-8859-2','windows-1250//TRANSLIT', $_POST['informacje']);
$pdf->MultiCell(190,8, "Dodatkowe informacje:", 0 , '', 0);
$pdf -> SetTextColor(255, 0, 0);
$pdf->MultiCell(190,10, $informacje, 1, 'C');
$pdf -> SetTextColor(0, 0, 0);


$group2 = iconv('iso-8859-2','windows-1250//TRANSLIT', $_POST['group2']);
$pdf->SetXY(1, 160);
$pdf->MultiCell(190,10, $group2, 0,'R');


$pdf->Output();
$pdf->Cose();
?>