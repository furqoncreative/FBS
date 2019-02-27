<?php 
//fungsi untuk koneksi database
function koneksi(){
 
	$con=mysqli_connect("localhost","root","");
	mysqli_select_db($con,"tokobuku");

	return $con ;
}


//fungsi untuk menampilkan data
function query($string) {
$con=koneksi();
$hasil=mysqli_query($con,$string);
$bariss= array();
while ($baris=mysqli_fetch_assoc($hasil)) {
	$bariss[]=$baris;
}
return $bariss;
}


function tambahbuku($data){
	$con=koneksi();
	$id_buku=htmlspecialchars($data["id_buku"]);
	$judul=htmlspecialchars($data["judul"]);
	$noisbn=htmlspecialchars($data["noisbn"]);
	$penulis=htmlspecialchars($data["penulis"]);
	$penerbit=htmlspecialchars($data["penerbit"]);
	$tahun=htmlspecialchars($data["tahun"]);
	$jenis_buku=htmlspecialchars($data["jenis_buku"]);
	$stok=htmlspecialchars($data["stok"]);
	$harga_pokok=htmlspecialchars($data["harga_pokok"]);
	$harga_jual=htmlspecialchars($data["harga_jual"]);
	$ppn=htmlspecialchars($data["ppn"]);
	$diskon=htmlspecialchars($data["diskon"]);
	$query="INSERT into buku VALUES('$id_buku','$judul','$noisbn','$penulis','$penerbit','$tahun','$jenis_buku','$stok','$harga_pokok','$harga_jual','$ppn','$diskon')";
	mysqli_query($con,$query);
	return mysqli_affected_rows($con); 
}

function tambahpasok($data){
	$con=koneksi();
	$id_pasok=htmlspecialchars($data["id_pasok"]);
	$id_distributor=htmlspecialchars($data["id_distributor"]);
	$id_buku=htmlspecialchars($data["id_buku"]);
	$jumlah=htmlspecialchars($data["jumlah"]);
	$tanggal=htmlspecialchars($data["tanggal"]);
	$query="INSERT into pasok VALUES('$id_pasok','$id_distributor','$id_buku','$jumlah','$tanggal')";
	mysqli_query($con,$query);
	return mysqli_affected_rows($con); 
}

function tambahkasir($data){
	$con=koneksi();
	$id_kasir=htmlspecialchars($data["id_kasir"]);
	$nama=htmlspecialchars($data["nama"]);
	$alamat=htmlspecialchars($data["alamat"]);
	$telepon=htmlspecialchars($data["telepon"]);
	$status=htmlspecialchars($data["status"]);
	$username=htmlspecialchars($data["username"]);
	$password=htmlspecialchars($data["password"]);
	$akses=htmlspecialchars($data["akses"]);
	$query="INSERT into kasir VALUES('$id_kasir','$nama','$alamat','$telepon','$status','$username','$password','$akses')";
	mysqli_query($con,$query);
	return mysqli_affected_rows($con); 
}

function tambahdistributor($data){
	$con=koneksi();
	$id_distributor=htmlspecialchars($data["id_distributor"]);
	$nama_distributor=htmlspecialchars($data["nama_distributor"]);
	$alamat=htmlspecialchars($data["alamat"]);
	$telepon=htmlspecialchars($data["telepon"]);
	$query="INSERT into distributor VALUES('$id_distributor','$nama_distributor','$alamat','$telepon')";
	mysqli_query($con,$query);
	return mysqli_affected_rows($con); 
}

function tambahjual($data){
	$con=koneksi();
	$id_penjualan=htmlspecialchars($data["id_penjualan"]);
	$id_buku=htmlspecialchars($data["id_buku"]);
	$id_kasir=htmlspecialchars($data["id_kasir"]);
	$jumlah=htmlspecialchars($data["jumlah"]);
	$total=htmlspecialchars($data["total"]);
	$tanggal=htmlspecialchars($data["tanggal"]);
	$query="INSERT into penjualan VALUES('$id_penjualan','$id_buku','$id_kasir','$jumlah','$total','$tanggal')";
	mysqli_query($con,$query);
	return mysqli_affected_rows($con); 
}


try
{
	$con = new PDO('mysql:host=localhost;dbname=tokobuku', 'root', '', array(PDO::ATTR_PERSISTENT => true));
}
catch(PDOException $e)
{
	echo $e->getMessage();
}
?>


