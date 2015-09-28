<?php
//SHOW A DATABASE ON A PDF FILE
//CREATED BY: Carlos Vasquez S.
//E-MAIL: cvasquez@cvs.cl
//CVS TECNOLOGIA E INNOVACION
//SANTIAGO, CHILE

require('fpdf.php');

//Connect to your database
include("model/Model.php");
$dbconnect = NEW Model('pharma', 'root', '');

//Select the Products you want to show in your PDF file
$result = mysql_query("select item_code,item_name from item");
$number_of_products = mysql_numrows($result);

//Initialize the 3 columns and the total
$column_item_code = "";
$column_item_name = "";


//For each row, add the field to the corresponding column
while($row = mysql_fetch_array($result))
{
	$code = $row["item_Code"];
	$name = substr($row["item_Name"],0,20);

	$column_item_code = $column_item_code.$code."\n";
	$column_item_name = $column_item_name.$name."\n";
}
mysql_close();

//Convert the Total Price to a number with (.) for thousands, and (,) for decimals.

//Create a new PDF file
$pdf=new FPDF();
$pdf->AddPage();

//Fields Name position
$Y_Fields_Name_position = 20;
//Table position, under Fields Name
$Y_Table_Position = 26;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(232,232,232);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',12);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(45);
$pdf->Cell(20,6,'item_code',1,0,'L',1);
$pdf->SetX(65);
$pdf->Cell(100,6,'item_name',1,0,'L',1);
$pdf->Ln();

//Now show the 3 columns
$pdf->SetFont('Arial','',12);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(45);
$pdf->MultiCell(20,6,$column_item_code,1);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(65);
$pdf->MultiCell(100,6,$column_item_name,1);
$pdf->SetY($Y_Table_Position);

//Create lines (boxes) for each ROW (Product)
//If you don't use the following code, you don't create the lines separating each row
$i = 0;
$pdf->SetY($Y_Table_Position);
while ($i < $number_of_products)
{
	$pdf->SetX(45);
	$pdf->MultiCell(120,6,'',1);
	$i = $i +1;
}

$pdf->Output();
?>
