<?php
include "../koneksi/fungsi.php";
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
$jual   = $_POST['jual'];
$result=mysqli_query($db,"SELECT * FROM total where id_penjualan='$jual'" )or die(mysqli_error());

//Inisiasi untuk membuat header kolom
$column_id_buku = "";
$column_judul = "";
$column_harga_jual = "";
$column_jumlah = "";
$column_total = "";
$column_tanggal = "";


//For each row, add the field to the corresponding column
while($row = mysqli_fetch_array($result))
{
    $id_buku = $row["id_buku"];
    $judul = $row["judul"];
    $harga_jual = $row["harga_jual"];
    $jumlah = $row["jumlah"];
    $total = $row["total"];
    $tanggal = $row["tanggal"];

   
 
    $column_id_buku = $column_id_buku.$id_buku."\n";
    $column_judul = $column_judul.$judul."\n";
    $column_harga_jual = $column_harga_jual.$harga_jual."\n";
    $column_jumlah = $column_jumlah.$jumlah."\n";
    $column_total = $column_total."Rp. ".$total."\n";
    $column_tanggal = $column_tanggal.$tanggal."\n";


  
$tgl=date('d-m-Y') ;
    

//Create a new PDF file
$pdf = new FPDF('P','mm',array(150,150)); //L For Landscape / P For Portrait
$pdf->AddPage();


//Menambahkan Gambar
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Image('logo.png',12,4,-290);

$pdf->SetFont('Arial','B',11);
$pdf->Ln();
$pdf->Cell(50);
$pdf->Cell(35,10,'- FURQON BOOKS STORE -',0,0,'C');
$pdf->Ln();
$pdf->Cell(50);
$pdf->Cell(35,2,'Jalan Tanjung Manunggal V Situraja Sukatali',0,0,'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(50);
$pdf->Cell(30,8,'___________________________________________________________',0,0,'C');
$pdf->Ln();
$pdf->Cell(50);
$pdf->Cell(35,8,'STRUK PENJUALAN',0,0,'C');
$pdf->Ln();


$pdf->Cell(90);
$pdf->Cell(34,2,$tgl,0,0,'C');

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();


}
//Fields Name position
$Y_Fields_Name_position = 52;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(255,255,255);
//Bold Font for Field Name
$pdf->SetFont('Arial','',8);
$pdf->SetY($Y_Fields_Name_position);

$pdf->SetX(10);
$pdf->Cell(15,8,'ID Buku',1,0,'C',1);

$pdf->SetX(25);
$pdf->Cell(35,8,'Judul Buku',1,0,'C',1);

$pdf->SetX(60);
$pdf->Cell(25,8,'Harga',1,0,'C',1);

$pdf->SetX(85);
$pdf->Cell(10,8,'Jumlah',1,0,'C',1);

$pdf->SetX(95);
$pdf->Cell(25,8,'Tanggal',1,0,'C',1);

$pdf->SetX(120);
$pdf->Cell(20,8,'Subtotal',1,0,'C',1);



$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 60;

//Now show the columns
$pdf->SetFont('Arial','',9);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(10);
$pdf->MultiCell(15,6,$column_id_buku,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(25);
$pdf->MultiCell(35,6,$column_judul,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(60);
$pdf->MultiCell(25,6,$column_harga_jual,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(85);
$pdf->MultiCell(10,6,$column_jumlah,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(95);
$pdf->MultiCell(25,6,$column_tanggal,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(120);
$pdf->MultiCell(20,6,$column_total,1,'L');

$pdf->SetY(80);
$pdf->SetX(95);
$pdf->MultiCell(25,6,'TOTAL :',1,'C');


$pdf->Ln();
$pdf->Cell(15);
$pdf->Cell(100,2,'_____________________________________________________',0,0,'C');

$pdf->Ln();
$pdf->Cell(15);
$pdf->Cell(100,2,'*** TERIMA KASIH SUDAH BELANJA DI FURQON BOOKS STORE ***',0,0,'C');

$pdf->Ln();
$pdf->Cell(15);
$pdf->Cell(100,2,'_____________________________________________________',0,0,'C');

?>
<?php
 $jual     = $_POST['jual'];
$sql=query("SELECT SUM(total) FROM total where id_penjualan='$jual'");
foreach ($sql as $c) :
?>
<?php

$pdf->SetY(80);
$pdf->SetX(120);
$pdf->MultiCell(20,6,'Rp. '.$c["SUM(total)"],1,'L');

 endforeach;

$pdf->Output(); 