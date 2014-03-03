<?php
    $_SESSION['dzien']=$_POST['dzien'];
?>
<?php
define('FPDF_FONTPATH','font/');
include("../config.php");
require('fpdf/fpdf.php');

//Select the Products you want to show in your PDF file
$result=mysql_query ('SELECT * FROM ocena_s2 ORDER BY data_oceny');
$number_of_products = mysql_numrows($result);
//Initialize the columns and the total
$column_iducznia = "";
$column_idnauczyciela = "";
$column_idprzedmiotu = "";
$column_ocena = "";
$column_data_dodania = "";
//Create a new PDF file
$pdf=new FPDF();
$pdf->AddFont('Tahoma','','Tahoma.php');
$pdf -> SetFont('Tahoma','', 10);

//Fields Name position
$Y_Fields_Name_position = 20;
//Table position, under Fields Name
$Y_Table_Position = 10;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(12,232,232);
//Bold Font for Field Name

$pdf->AddPage('L');
//$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);

$pdf->Cell(50,6,"UCZEN",1);
$pdf->Cell(60,6,"NAUCYCIEL WYSTAWIAJACY",1);
$pdf->Cell(30,6,"PRZEDMIOT",1);
$pdf->Cell(100,6,"OCENA",1);
$pdf->Cell(45,6,"DATA WYSTAWIENIA",1,1);
//For each row, add the field to the corresponding column
while($row = mysql_fetch_array($result))
{
    $iducznia = $row['iducznia'];
    $idnauczyciela = $row['idnauczyciela'];
    $idprzedmiotu = $row['idprzedmiotu'];
    $ocena = $row['ocena'];
    $data_oceny = $row['data_oceny'];

    $column_iducznia = $column_iducznia.$iducznia."";
    $column_idnauczyciela = $column_idnauczyciela.$idnauczyciela."";
    $column_idprzedmiotu = $column_idprzedmiotu.$idprzedmiotu."";
    $column_ocena = $column_ocena.$ocena."";
    $column_data_oceny = $column_data_oceny.$data_oceny."\n";

    $pdf->SetX(5);
    $pdf->Cell(50,6,$iducznia,1);
    $pdf->Cell(60,6,$idnauczyciela,1);
    $pdf->Cell(30,6,$idprzedmiotu,1);
    $pdf->Cell(100,6,$ocena,1);
    $pdf->Cell(45,6,$data_oceny,1,1);
    $pdf->Ln();
}
$pdf->Output();
?>
