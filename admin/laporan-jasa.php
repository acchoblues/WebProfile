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

$result=mysqli_query($koneksi, "SELECT * FROM jenis ORDER BY id_jenis ASC") or die(mysql_error());

//Initialize the 3 columns and the total
$column_nik = "";
$column_nama = "";
//$column_alamat = "";
//$column_no_hp = "";
//$column_status = "";


//For each row, add the field to the corresponding column
while($row = mysqli_fetch_array($result))
{
	$nik = $row["id_jenis"];
    $nama = $row["pekerjaan"];
    //$alamat = $row["komentar"];
    //$no_hp = $row["rating"];
    //$status = $row["email"];
    

	$column_nik = $column_nik.$nik."\n";
    $column_nama = $column_nama.$nama."\n";
    //$column_alamat = $column_alamat.$alamat."\n";
    //$column_no_hp = $column_no_hp.$no_hp."\n";
    //$column_status = $column_status.$status."\n";

			
//mysql_close();

//Create a new PDF file
$pdf = new FPDF('P','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

$pdf->Image('../image/logo1.png',10,10,-175);
//$pdf->Image('../images/BBRI.png',190,10,-200);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(80);
$pdf->Cell(30,10,'DATA PRODUK',0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(30,10,'List Data Produk dan Layanan Jasa',0,0,'C');
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
$pdf->Cell(40,8,'ID',1,0,'C',1);
$pdf->SetX(45);
$pdf->Cell(160,8,'Pekerjaan',1,0,'C',1);
//$pdf->SetX(70);
//$pdf->Cell(120,8,'Komentar',1,0,'C',1);
//$pdf->SetX(190);
//$pdf->Cell(15,8,'Rating',1,0,'C',1);
//$pdf->SetX(185);
//$pdf->Cell(20,8,'Email',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 38;

//Now show the columns
$pdf->SetFont('Arial','',9);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(40,6,$column_nik,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(45);
$pdf->MultiCell(160,6,$column_nama,1,'L');

//$pdf->SetY($Y_Table_Position);
//$pdf->SetX(70);
//$pdf->MultiCell(120,6,$column_alamat,1,'L');

//$pdf->SetY($Y_Table_Position);
//$pdf->SetX(190);
//$pdf->MultiCell(15,6,$column_no_hp,1,'C');

//$pdf->SetY($Y_Table_Position);
//$pdf->SetX(185);
//$pdf->MultiCell(20,6,$column_status,1,'C');

$pdf->Output();
}
?>
