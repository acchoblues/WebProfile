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
$kode = $_GET['kd'];
/** $result=mysql_query("SELECT nilai.*, pelajaran.nama_pelajaran, pelajaran.kkm, siswa.nama_siswa, siswa.nis, kelas_siswa.jurusan FROM nilai
				LEFT JOIN pelajaran ON nilai.kode_pelajaran = pelajaran.kode_pelajaran
				LEFT JOIN siswa ON nilai.kode_siswa = siswa.kode_siswa
                LEFT JOIN kelas_siswa ON nilai.kode_siswa = kelas_siswa.kode_siswa
				WHERE nilai.id = $kodesaya ORDER BY semester, kode_pelajaran ASC") or die(mysql_error());**/
                
$result = mysqli_query($koneksi, "SELECT jadwal_proyek.id_jadwal, jadwal_proyek.no_po, jadwal_proyek.tgl_proyek, jadwal_proyek.tgl_selesai, jadwal_proyek.report, jadwal_proyek.status, teknisi.nama_teknisi, 
                                                     member.nama_member, jenis.pekerjaan, po.lokasi FROM jadwal_proyek, member, teknisi, jenis, po 
                                                     WHERE member.id_member=jadwal_proyek.id_member AND jenis.id_jenis=jadwal_proyek.id_jenis 
                                                     AND teknisi.id_teknisi=jadwal_proyek.id_teknisi AND po.no_po=jadwal_proyek.no_po AND jadwal_proyek.id_jadwal='$kode'");
                    
            
//Initialize the 3 columns and the total
$column_date = "";
$column_time = "";
$column_standmeter = "";
//$column_factor = "";
//$column_total = "";
$column_nilai = "";
$column_rata = "";

//For each row, add the field to the corresponding column
$no=0;
while($row = mysqli_fetch_array($result))
{ $no++;
	$id_jadwal   = $row["id_jadwal"];
    $no_po       = $row["no_po"];
    $lokasi      = $row["lokasi"];
    $pekerjaan   = $row["pekerjaan"];
    $member      = $row["nama_member"];
    $teknisi     = $row["nama_teknisi"];
	$tgl_proyek  = $row["tgl_proyek"];
    $tgl_selesai = $row["tgl_selesai"];
    $report      = $row["report"];
    $status      = $row["status"];
    

	//$column_date = $column_date.$date."\n";
	//$column_time = $column_time.$time."\n";
	//$column_standmeter = $column_standmeter.$standmeter."\n";
	//$column_factor = $column_factor.$factor."\n";
	//$column_total = $column_total.$total."\n";
    //$column_nilai = $column_nilai.$nilai."\n";
    //$column_rata = $column_rata.$rata."\n";		

            
//mysql_close();

//Create a new PDF file
$pdf = new FPDF('P','mm',array(210,310)); //L For Landscape / P For Portrait
$pdf->AddPage();

$pdf->Image('../image/logo1.png',10,10,-175);
//$pdf->Image('../images/BBRI.png',190,10,-200);
$pdf->SetFont('Arial','B',13);
$pdf->Cell(80);
$pdf->Cell(30,10,'FIELD REPORT',0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(30,10,'No PO.'.$no_po,0,0,'C');
$pdf->Ln();

//Fields Name position
$Y_Fields_Name_position = 40;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'Nama Perusahaan : '.$member,0,0,'L',1);
$pdf->SetX(100);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
//$pdf->Cell(45,8,'Tahun Ajaran : '.$tahun,0,0,'R',1);
$pdf->Ln();

//Field Name Position
$Y_Fields_Name_position = 48;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'Lokasi / Area : '.$lokasi,0,0,'L',1);
$pdf->SetX(100);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
//$pdf->Cell(45,8,'Kelas : '.$kelas,0,0,'R',1);
$pdf->Ln();

//Field Name Position
$Y_Fields_Name_position = 56;
$pdf->SetFillColor(255,255,255);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'Jenis Pekerjaan / JOB : '.$pekerjaan,0,0,'L',1);
$pdf->SetX(100);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
//$pdf->Cell(45,8,'Semester : '.$semester,0,0,'R',1);
$pdf->Ln();

$Y_Fields_Name_position = 64;
$pdf->SetFillColor(255,255,255);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'Tanggal / Date : '.date("d n Y"),0,0,'L',1);
$pdf->SetX(100);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
$pdf->Cell(45,8,'Hari Ke / Day : _______________ ',0,0,'R',1);
$pdf->Ln();

$Y_Fields_Name_position = 64;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
//$pdf->SetFont('Arial','B',10);
//$pdf->SetY($Y_Fields_Name_position);
//$pdf->SetX(5);
//$pdf->Cell(60,8,'Alamat Sekolah : Jl. Raya Rajeg - Mauk Ds. Sukamanah Kec. Sukatani',0,0,'L',1);
//$pdf->SetX(160);
//$pdf->Cell(40,8,'',0,0,'L',1);
//$pdf->SetX(85);
//$pdf->Cell(50,8,'',0,0,'C',1);
//$pdf->SetX(135);
//$pdf->Cell(25,8,'',0,0,'C',1);
//$pdf->SetX(160);
//$pdf->Cell(45,8,'Semester : '.$semester,0,0,'R',1);
$pdf->Ln();
}
//Fields Name position
$Y_Fields_Name_position = 71;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(110,180,230);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(10,8,'No',1,0,'C',1);
$pdf->SetX(15);
$pdf->Cell(50,8,'Nama Pekerja',1,0,'C',1);
$pdf->SetX(65);
$pdf->Cell(25,8,'Mulai',1,0,'C',1);
$pdf->SetX(90);
$pdf->Cell(25,8,'Selesai',1,0,'C',1);
$pdf->SetX(115);
$pdf->Cell(30,8,'Tanda Tangan',1,0,'C',1);
$pdf->SetX(145);
$pdf->Cell(60,8,'Keterangan Lapangan',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 79;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(10,8,'1',1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(15);
$pdf->MultiCell(50,8,$column_time,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(65);
$pdf->MultiCell(25,8,$column_standmeter,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(90);
$pdf->MultiCell(25,8,$column_nilai,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(115);
$pdf->MultiCell(30,8,$column_rata,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(145);
$pdf->MultiCell(60,8,$column_rata,1,'L');

$Y_Table_Position = 87;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(10,8,'2',1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(15);
$pdf->MultiCell(50,8,$column_time,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(65);
$pdf->MultiCell(25,8,$column_standmeter,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(90);
$pdf->MultiCell(25,8,$column_nilai,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(115);
$pdf->MultiCell(30,8,$column_rata,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(145);
$pdf->MultiCell(60,8,$column_rata,1,'L');

$Y_Table_Position = 95;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(10,8,'3',1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(15);
$pdf->MultiCell(50,8,$column_time,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(65);
$pdf->MultiCell(25,8,$column_standmeter,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(90);
$pdf->MultiCell(25,8,$column_nilai,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(115);
$pdf->MultiCell(30,8,$column_rata,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(145);
$pdf->MultiCell(60,8,$column_rata,1,'L');

$Y_Table_Position = 103;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(10,8,'4',1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(15);
$pdf->MultiCell(50,8,$column_time,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(65);
$pdf->MultiCell(25,8,$column_standmeter,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(90);
$pdf->MultiCell(25,8,$column_nilai,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(115);
$pdf->MultiCell(30,8,$column_rata,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(145);
$pdf->MultiCell(60,8,$column_rata,1,'L');

$Y_Table_Position = 111;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(10,8,'5',1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(15);
$pdf->MultiCell(50,8,$column_time,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(65);
$pdf->MultiCell(25,8,$column_standmeter,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(90);
$pdf->MultiCell(25,8,$column_nilai,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(115);
$pdf->MultiCell(30,8,$column_rata,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(145);
$pdf->MultiCell(60,8,$column_rata,1,'L');

$Y_Table_Position = 119;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(10,8,'6',1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(15);
$pdf->MultiCell(50,8,$column_time,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(65);
$pdf->MultiCell(25,8,$column_standmeter,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(90);
$pdf->MultiCell(25,8,$column_nilai,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(115);
$pdf->MultiCell(30,8,$column_rata,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(145);
$pdf->MultiCell(60,8,$column_rata,1,'L');

$Y_Table_Position = 127;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(10,8,'7',1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(15);
$pdf->MultiCell(50,8,$column_time,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(65);
$pdf->MultiCell(25,8,$column_standmeter,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(90);
$pdf->MultiCell(25,8,$column_nilai,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(115);
$pdf->MultiCell(30,8,$column_rata,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(145);
$pdf->MultiCell(60,8,$column_rata,1,'L');

$Y_Table_Position = 135;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(10,8,'8',1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(15);
$pdf->MultiCell(50,8,$column_time,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(65);
$pdf->MultiCell(25,8,$column_standmeter,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(90);
$pdf->MultiCell(25,8,$column_nilai,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(115);
$pdf->MultiCell(30,8,$column_rata,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(145);
$pdf->MultiCell(60,8,$column_rata,1,'L');

$Y_Table_Position = 143;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(10,8,'9',1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(15);
$pdf->MultiCell(50,8,$column_time,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(65);
$pdf->MultiCell(25,8,$column_standmeter,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(90);
$pdf->MultiCell(25,8,$column_nilai,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(115);
$pdf->MultiCell(30,8,$column_rata,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(145);
$pdf->MultiCell(60,8,$column_rata,1,'L');

$Y_Table_Position = 151;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(10,8,'10',1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(15);
$pdf->MultiCell(50,8,$column_time,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(65);
$pdf->MultiCell(25,8,$column_standmeter,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(90);
$pdf->MultiCell(25,8,$column_nilai,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(115);
$pdf->MultiCell(30,8,$column_rata,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(145);
$pdf->MultiCell(60,8,$column_rata,1,'L');

$Y_Table_Position = 159;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(10,8,'11',1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(15);
$pdf->MultiCell(50,8,$column_time,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(65);
$pdf->MultiCell(25,8,$column_standmeter,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(90);
$pdf->MultiCell(25,8,$column_nilai,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(115);
$pdf->MultiCell(30,8,$column_rata,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(145);
$pdf->MultiCell(60,8,$column_rata,1,'L');

$Y_Table_Position = 167;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(10,8,'12',1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(15);
$pdf->MultiCell(50,8,$column_time,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(65);
$pdf->MultiCell(25,8,$column_standmeter,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(90);
$pdf->MultiCell(25,8,$column_nilai,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(115);
$pdf->MultiCell(30,8,$column_rata,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(145);
$pdf->MultiCell(60,8,$column_rata,1,'L');

$Y_Table_Position = 175;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(10,8,'13',1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(15);
$pdf->MultiCell(50,8,$column_time,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(65);
$pdf->MultiCell(25,8,$column_standmeter,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(90);
$pdf->MultiCell(25,8,$column_nilai,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(115);
$pdf->MultiCell(30,8,$column_rata,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(145);
$pdf->MultiCell(60,8,$column_rata,1,'L');

$Y_Table_Position = 183;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(10,8,'14',1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(15);
$pdf->MultiCell(50,8,$column_time,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(65);
$pdf->MultiCell(25,8,$column_standmeter,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(90);
$pdf->MultiCell(25,8,$column_nilai,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(115);
$pdf->MultiCell(30,8,$column_rata,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(145);
$pdf->MultiCell(60,8,$column_rata,1,'L');

$Y_Table_Position = 191;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(10,8,'15',1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(15);
$pdf->MultiCell(50,8,$column_time,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(65);
$pdf->MultiCell(25,8,$column_standmeter,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(90);
$pdf->MultiCell(25,8,$column_nilai,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(115);
$pdf->MultiCell(30,8,$column_rata,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(145);
$pdf->MultiCell(60,8,$column_rata,1,'L');

$Y_Fields_Name_position = 207;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(110,180,230);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(50,8,'UD. KDU',1,0,'C',1);
$pdf->SetX(55);
$pdf->Cell(50,8,'Nama / Name',1,0,'C',1);
$pdf->SetX(105);
$pdf->Cell(30,8,'Sign',1,0,'C',1);
$pdf->Ln();

$Y_Table_Position = 215;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(50,8,'Field Manager',1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(55);
$pdf->MultiCell(50,8,$column_time,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(105);
$pdf->MultiCell(30,8,$column_standmeter,1,'C');

$Y_Table_Position = 223;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(50,8,'Supervisor Area',1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(55);
$pdf->MultiCell(50,8,$column_time,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(105);
$pdf->MultiCell(30,8,$column_standmeter,1,'C');

$Y_Table_Position = 231;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(50,8,'Head Of Group',1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(55);
$pdf->MultiCell(50,8,$column_time,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(105);
$pdf->MultiCell(30,8,$column_standmeter,1,'C');


$Y_Fields_Name_position = 250;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(160);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
$pdf->Cell(45,8,'Diperiksa / Checked By ',0,0,'R',1);
$pdf->Ln();

$Y_Fields_Name_position = 270;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(160);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
$pdf->Cell(45,8,'(___________________)',0,0,'R',1);
$pdf->Ln();

$Y_Fields_Name_position = 278;
$pdf->SetFillColor(255,255,255);
//First create each Field Name
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(160);
$pdf->Cell(40,8,'',0,0,'L',1);
$pdf->SetX(85);
$pdf->Cell(50,8,'',0,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'',0,0,'C',1);
$pdf->SetX(160);
$pdf->Cell(45,2,'Jabatan / Position :                                       ',0,0,'R',1);
$pdf->Ln();

$pdf->Output();
}
?>
