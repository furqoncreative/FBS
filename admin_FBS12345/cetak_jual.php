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

$result=mysqli_query($db,"SELECT * FROM total ORDER BY id_penjualan ASC") or die(mysqli_error());

//Inisiasi untuk membuat header kolom
$column_id_penjualan = "";
$column_id_buku = "";
$column_judul = "";
$column_harga_jual = "";
$column_jumlah = "";
$column_total = "";
$column_tanggal = "";


//For each row, add the field to the corresponding column
while($row = mysqli_fetch_array($result))
{
	$id_penjualan = $row["id_penjualan"];
    $id_buku = $row["id_buku"];
    $judul = $row["judul"];
    $harga_jual = $row["harga_jual"];
    $jumlah = $row["jumlah"];
	$total = $row["total"];
    $tanggal = $row["tanggal"];
 
	$column_id_penjualan = $column_id_penjualan.$id_penjualan."\n";
    $column_id_buku = $column_id_buku.$id_buku."\n";
    $column_judul = $column_judul.$judul."\n";
    $column_harga_jual = $column_harga_jual.$harga_jual."\n";
    $column_jumlah = $column_jumlah.$jumlah."\n";
    $column_total = $column_total.$total."\n";
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
$pdf->Cell(35,2,'Jalan Tanjung Manunggal V Situraja Sukatali',0,0,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(30,8,'___________________________________________________________________________',0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(35,8,'LAPORAN PENJUALAN',0,0,'C');
$pdf->Ln();

}
//Fields Name position
$Y_Fields_Name_position = 40;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(78,180,200);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(10);
$pdf->Cell(25,8,'ID Penjualan',1,0,'C',1);
$pdf->SetX(35);
$pdf->Cell(15,8,'ID Buku',1,0,'C',1);
$pdf->SetX(50);
$pdf->Cell(60,8,'Judul Buku',1,0,'C',1);
$pdf->SetX(110);
$pdf->Cell(25,8,'Harga Jual',1,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(15,8,'Jumlah',1,0,'C',1);
$pdf->SetX(150);
$pdf->Cell(16,8,'Total',1,0,'C',1);
$pdf->SetX(166);
$pdf->Cell(35,8,'Tanggal',1,0,'C',1);
$pdf->Ln();


//Table position, under Fields Name
$Y_Table_Position = 48;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(10);
$pdf->MultiCell(25,6,$column_id_penjualan,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(35);
$pdf->MultiCell(15,6,$column_id_buku,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(50);
$pdf->MultiCell(60,6,$column_judul,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(110);
$pdf->MultiCell(25,6,$column_harga_jual,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(135);
$pdf->MultiCell(15,6,$column_jumlah,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(150);
$pdf->MultiCell(16,6,$column_total,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(166);
$pdf->MultiCell(35,6,$column_tanggal,1,'C');


$pdf->Output();