<?php
define('FPDF_FONTPATH','font/');
include("../config.php");
require('fpdf/fpdf.php');

//Select the Products you want to show in your PDF file
$result=mysql_query ('SELECT * FROM uwaga ORDER BY uczen');
$number_of_products = mysql_numrows($result);
//Initialize the columns and the total
$column_uczen = "";
$column_idnauczyciela = "";
$column_idprzedmiotu = "";
$column_tresc_uwagi = "";
$column_data_dodania = "";
//Create a new PDF file

$pdf=new FPDF();
$pdf->Open();
$pdf->AddPage('L');
$pdf->AddFont('Tahoma','','Tahoma.php');
$pdf -> SetFont('Tahoma','', 10);

$utf = array("\xC4\x85","\xC4\x84","\xC4\x87","\xC4\x86","\xC4\x99","\xC4\x98","\xC5\x82","\xC5\x81","\xC3\xB3","\xC3\x93","\xC5\x9B","\xC5\x9A","\xC5\xBC","\xC5\xBB","\xC5\xBA","\xC5\xB9","\xc5\x84","\xc5\x83");
$iso = array('ą','Ą','ć','Ć','ę','Ę','ł','Ł','ó','Ó','ś','Ś','ż','Ż','ź','Ź','ń','Ń');
$text=str_replace($utf, $iso, $idnauczyciela);
$tekst = iconv("UTF-8","ISO-8859-2");

//Fields Name position
$Y_Fields_Name_position = 20;
//Table position, under Fields Name
$Y_Table_Position = 10;
//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetTextColor(1,0,250);
$pdf->SetTitle("iSWOS");
//$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf -> SetFillColor(255, 132, 132);
$pdf->Cell(50,6,"UCZEN",1);
$pdf->Cell(60,6,"NAUCYCIEL WYSTAWIAJACY",1);
$pdf->Cell(30,6,"PRZEDMIOT",1);
$pdf->Cell(100,6,"TRESC UWAGI",1,0,10);
$pdf->Cell(45,6,"DATA WYSTAWIENIA",1,1);
$pdf -> SetTextColor(0, 0, 0);
//For each row, add the field to the corresponding column
while($row = mysql_fetch_array($result))
{
    $uczen = $row['uczen'];
    $idnauczyciela = $row['idnauczyciela'];
    $idprzedmiotu = $row['idprzedmiotu'];
    $tresc_uwagi = $row['tresc_uwagi'];
    $data_dodania = $row['data_dodania'];

    $column_uczen = $column_uczen.$uczen."";
    $column_idnauczyciela = $column_idnauczyciela.$idnauczyciela."";
    $column_idprzedmiotu = $column_idprzedmiotu.$idprzedmiotu."";
    $column_tresc_uwagi = $column_tresc_uwagi.$tresc_uwagi."";
    $column_data_dodania = $column_data_dodania.$data_dodania."\n";

    $pdf->SetX(5);
    $pdf->Cell(50,6,$uczen,1);
    $pdf->Cell(60,6,$idnauczyciela,1);
    $pdf->Cell(30,6,$idprzedmiotu,1);
    $pdf->Cell(100,6,$tresc_uwagi,1);
    $pdf->Cell(45,6,$data_dodania,1,1);
    $pdf->Ln();
}
$pdf->Output();
$pdf->Close();
?>
