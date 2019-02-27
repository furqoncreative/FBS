<?php
include('cekadmin.php');
?>
<?php
include "../koneksi/coba.php";
require('fpdf17/fpdf.php');
/**
 Judul  : Laporan PDF (portait):
 Level  : Menengah
 Author : Venus-Multimedia
 Blog   : www.download-source-code.blogspot.com
 Web    : www.venus-multimedia.com
 Email  : dj_anton16@yahoo.com
 
 Untuk tutorial yang lainnya silahkan berkunjung ke www.download-source-code.blogspot.com
 
 Butuh jasa pembuatan website, aplikasi, pembuatan program TA dan Skripsi.? Hubungi Venus-Multimedia ==>> 0896 9155 2441
 
 **/
//Menampilkan data dari tabel di database

$result=mysqli_query($db,"SELECT * FROM pasok ORDER BY id_pasok ASC") or die(mysqli_error());

//Inisiasi untuk membuat header kolom
$column_id_pasok = "";
$column_id_distributor = "";
$column_id_buku = "";
$column_jumlah = "";
$column_tanggal = "";


//For each row, add the field to the corresponding column
while($row = mysqli_fetch_array($result))
{
	$id_pasok = $row["id_pasok"];
    $id_distributor = $row["id_distributor"];
    $id_buku = $row["id_buku"];
    $jumlah = $row["jumlah"];
    $tanggal = $row["tanggal"];
 
	$column_id_pasok = $column_id_pasok.$id_pasok."\n";
    $column_id_distributor= $column_id_distributor.$id_distributor."\n";
    $column_id_buku = $column_id_buku.$id_buku."\n";
    $column_jumlah = $column_jumlah.$jumlah."\n";
    $column_tanggal = $column_tanggal.$tanggal."\n";
    

//Create a new PDF file
$pdf = new FPDF('P','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

//Menambahkan Gambar
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Image('logo.png',20,2,-250);

$pdf->SetFont('Arial','B',13);
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(35,10,'- FURQON BOOKS STORE -',0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(35,2,'Jalan Tanjung paManunggal V Situraja Sukatali',0,0,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(30,8,'___________________________________________________________________________',0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(35,8,'LAPORAN PEMASOKAN',0,0,'C');
$pdf->Ln();

}
//Fields Name position
$Y_Fields_Name_position = 52;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(78,180,200);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(35);
$pdf->Cell(25,8,'ID Pasok',1,0,'C',1);
$pdf->SetX(60);
$pdf->Cell(30,8,'ID Distributor',1,0,'C',1);
$pdf->SetX(90);
$pdf->Cell(30,8,'ID Buku',1,0,'C',1);
$pdf->SetX(120);
$pdf->Cell(20,8,'Jumlah',1,0,'C',1);
$pdf->SetX(140);
$pdf->Cell(35,8,'Tanggal',1,0,'C',1);
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();


//Table position, under Fields Name
$Y_Table_Position = 60;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(35);
$pdf->MultiCell(25,6,$column_id_pasok,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(60);
$pdf->MultiCell(30,6,$column_id_distributor,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(90);
$pdf->MultiCell(30,6,$column_id_buku,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(120);
$pdf->MultiCell(20,6,$column_jumlah,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(140);
$pdf->MultiCell(35,6,$column_tanggal,1,'C');


$pdf->Output();