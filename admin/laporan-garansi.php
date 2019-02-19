<?php
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../conn.php";
require('../fpdf17/fpdf.php');
require('../conn.php');


//Select the Products you want to show in your PDF file
//$result=mysql_query("SELECT * FROM daily_bbri where date like '%$periode%' ");

$result=mysqli_query($koneksi, "SELECT * FROM garansi ORDER BY id_garansi ASC") or die(mysql_error());

//Initialize the 3 columns and the total
$column_nik = "";
$column_nama = "";
$column_alamat = "";
$column_no_hp = "";
$column_status = "";


//For each row, add the field to the corresponding column
while($row = mysqli_fetch_array($result))
{
	$nik = $row["no_po"];
    $nama = $row["tgl_order"];
    $alamat = $row["tgl_expire"];
    $no_hp = $row["masa"];
    $status = $row["status"];
    

	$column_nik = $column_nik.$nik."\n";
    $column_nama = $column_nama.$nama."\n";
    $column_alamat = $column_alamat.$alamat."\n";
    $column_no_hp = $column_no_hp.$no_hp."\n";
    $column_status = $column_status.$status."\n";

			
//mysql_close();

//Create a new PDF file
$pdf = new FPDF('P','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

$pdf->Image('../image/logo1.png',10,10,-175);
//$pdf->Image('../images/BBRI.png',190,10,-200);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(80);
$pdf->Cell(30,10,'DATA LAPORAN GARANSI',0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(30,10,'List Data Garansi Ansul',0,0,'C');
$pdf->Ln();

}
//Fields Name position
$Y_Fields_Name_position = 30;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(110,180,230);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(45,8,'No PO',1,0,'C',1);
$pdf->SetX(50);
$pdf->Cell(40,8,'Order',1,0,'C',1);
$pdf->SetX(90);
$pdf->Cell(40,8,'Expire',1,0,'C',1);
$pdf->SetX(130);
$pdf->Cell(40,8,'Masa Berlaku',1,0,'C',1);
$pdf->SetX(170);
$pdf->Cell(35,8,'Status',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 38;

//Now show the columns
$pdf->SetFont('Arial','',9);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(45,6,$column_nik,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(50);
$pdf->MultiCell(40,6,$column_nama,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(90);
$pdf->MultiCell(40,6,$column_alamat,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(130);
$pdf->MultiCell(40,6,$column_no_hp,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(170);
$pdf->MultiCell(35,6,$column_status,1,'C');

$pdf->Output();
}
?>
