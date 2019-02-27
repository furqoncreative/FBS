<?php
include('cekkasir.php');
?>
<?php require "../koneksi/fungsi.php";
if(isset($_POST['tambahjual'])) {

    if(tambahjual($_POST)> 0 ) {

        echo "<script>
             alert('INPUT BERHASIL');
             document.location.href='index.php';
             </script>"; 
         }
        else {
            echo "<script>
             alert('INPUT GAGAL');
             document.location.href='index.php';
             </script>";
        }
    }
?>
<?php
#koneksi
$conn = mysqli_connect("localhost", "root", "", "tokobuku");
#akhir-koneksi
 
#action get barang
if(isset($_GET['action']) && $_GET['action'] == "getHarga") {
	$id_buku = $_GET['id_buku'];
 
	//ambil data barang
	$query = "SELECT * FROM buku WHERE id_buku='$id_buku'";
	$sql = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($sql);
	echo json_encode($row);
	exit;
}
?>
<?php
error_reporting(0);
include_once 'koneksi.php';

if(isset($_POST['save_mul']))
{	
		$id_penjualan = $_POST["id_penjualan"];
		$id_buku = $_POST["id_buku"];
		$id_kasir = $_POST["id_kasir"];
		$jumlah = $_POST["jumlah"];
		$total = $_POST["total"];
		$tanggal = $_POST["tanggal$i"];		
		$sql="INSERT INTO penjualan(id_penjualan,id_buku,id_kasir,jumlah,total,tanggal) VALUES('".$id_penjualan."','".$id_buku."','".$id_kasir."','".$jumlah."','".$total."','".$tanggal."')";
		$sql = $MySQLiconn->query($sql);		

	
	if($sql)
	{
		?>
        <script>
		alert(' Data Telah Terinputkan :)');
		window.location.href='index.php';
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert('Error Saat Menginput , Coba Lagi :(');
		</script>
        <?php
	}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>FURQON BOOKS STORE</title>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/sb-admin-2.css" rel="stylesheet">
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>

</head> 
<body>
   <div class="page-container">
   <!--/content-inner-->
	<div class="left-content">
	   <div class="inner-content">
		<!-- header-starts -->
			<div class="header-section">
			<!-- top_bg -->
						<div class="top_bg">
							
								<div class="header_top">
									<div class="top_right">
										<ul>
											<li><a href="Tentang.php">Tentang</a></li>
										</ul>
									</div>
									<div class="top_left">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li><a href="Logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
									</div>
										<div class="clearfix"> </div>
								</div>
							
						</div>
					<div class="clearfix"></div>
				<!-- /top_bg -->
				</div>
				<div class="header_bg">
						
							<div class="header">
								<div class="head-t">
									<div class="logo">
										<a href="index.php"><img src="images/logo_fbs.png" class="img-responsive" alt=""> </a>
									</div>
										<!-- start header_right -->
									<div class="header_right">
									<div class="clearfix"> </div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					
				</div>


<?php     
session_start();
$a=$_SESSION["username"];
?>

<?php
$Host = "localhost";
$username = "root";
$password = "";
$database = "tokobuku";
$koneksi = new mysqli( $Host, $username, $password, $database );
if ($koneksi->connect_error){
echo 'Gagal koneksi ke database';
} else {
//koneksi berhsil
}
 $carikode = mysqli_query($koneksi, "SELECT max(id_penjualan) from penjualan") or die (mysql_error());
  // menjadikannya array
  $datakode = mysqli_fetch_array($carikode);
  // jika $datakode
  if ($datakode) {
   $nilaikode = substr($datakode[0], 4);
   // menjadikan $nilaikode ( int )
   $kode = (int) $nilaikode;
   // setiap $kode di tambah 1
   $kode = $kode + 1;
   $kode_otomatis = "PNJ-".str_pad($kode, 3, "0", STR_PAD_LEFT);
  } else {
   $kode_otomatis = "PNJ-001";
  }
?>

<script> 
function startCalc(){
interval = setInterval("calc()",1);}
function calc(){
one = document.autoSumForm.harga_jual.value;
two = document.autoSumForm.jumlah.value;
three = document.autoSumForm.id_penjualan.value; 
four = document.autoSumForm.id_penjualan.value; 
five = document.autoSumForm.bayar.value; 
six = document.autoSumForm.tagihan.value;  
document.autoSumForm.total.value = (one * two )
document.autoSumForm.jual.value = (three);
document.autoSumForm.kembali.value = (six - five);}
function stopCalc(){
clearInterval(interval);}
</script>

<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#id_buku').change(function(){
					$.getJSON('index.php',{action:'getHarga', id_buku:$(this).val()}, function(json){
						if (json == null) {
							$('#judul').val('');
							$('#harga_jual').val('');
						} else {
							$('#judul').val(json.judul);
							$('#harga_jual').val(json.harga_jual);
						}
					});
				});
			});
		</script>

					<!-- //header-ends -->
				<!--content-->
<div class="content">
<form method="POST" name="autoSumForm"  action="index.php">

						<!--//area-->
							<div class="col-md-6 chrt-three">
<?php
 $jual     = $_POST['jual'];
$sql=query("SELECT SUM(total) FROM total where id_penjualan='$jual'");
foreach ($sql as $c) :
?>
								<div class="col-md-12 monthly-grid">
									<h4>TOTAL TAGIHAN :</h4> 
									<input class = "form-control1" type ="text"  id="tagihan"  onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo $c["SUM(total)"];?>" autofocus="" readonly />
								</div>
<?php endforeach ; ?>	
								<div class="col-md-6 chrt-two area">
									<h5>BAYAR :</h5>
								 	<input class = "form-control1" type ="text" id="bayar" onFocus="startCalc();" onBlur="stopCalc();" name="bayar" />
								</div>
								<div class="col-md-6 chrt-three">
									<h5>KEMBALIAN :</h5>
									<input class = "form-control1" type ="text" id="kembali"  onchange='tryNumberFormat(this.form.thirdBox);' readonly="" value="0" />
								</div>
							</div>

							<div class="col-md-6 chrt-two area">
							<table class="table">
								<tr>
									<td>ID Penjualan</td>
									<td>:</td>
									<td><input class = "form-control1" type ="text" id="id_penjualan" name = "id_penjualan"  onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo $kode_otomatis;?>" required="" /></td>
									<td><input type="submit" class="btn btn-primary" value='CARI'></td>
								</tr>
<?php
$sql=query("SELECT id_kasir,nama from kasir where username='$a'");
foreach($sql as $name):
?>
								<tr>
									<td>Nama Kasir</td>
									<td>:</td>
									<td><input class = "form-control1" type ="text" required="" value="<?php echo $name['nama'];?>" readonly/></td>
									<input class = "form-control1" type ="hidden" name="id_kasir" required="" value="<?php echo $name['id_kasir'];?>"/>
								</tr>
<?php
endforeach;
?>
<?php
$tgl=date('y/m/d') ;
?>	
								<tr>
									<td>Tanggal</td>
									<td>:</td>
									<td><input class = "form-control1" type ="text" id="tanggal" name = "tanggal" value="<?php echo $tgl;?>"  readonly /></td>
								</tr>
							</table>
							<br><br>
							</div>
							<div class="clearfix"></div>
						<br>

					<div class="monthly-grid">

					<table>
					<tr>
					<td class="col-sm-2">
					<label>ID Buku</label>
					<select class="form-control1"  id="id_buku" name="id_buku" >
					<option>- ID BUKU -</option>
					<?php
      				$sql=query("SELECT * FROM buku");
     				 foreach($sql as $data):
 					 ?>
					<option value="<?php echo $data['id_buku'];?>"><?php echo $data['id_buku'];?></option>
					<?php endforeach; ?>
					</select>
					</td>
					<td class="col-sm-3">
					<label>Judul Buku</label>
					<input class = "form-control1" type ="text" id="judul"  required="" readonly="" />
					</td>
					<td class="col-sm-3">
					<label>Harga</label>
					<input class = "form-control1" type =  "number" id="harga_jual" name = "harga_jual" required="" onFocus="startCalc();" onBlur="stopCalc();" value="0" readonly="" />
					</td>
					<td class="col-sm-1">
					<label>Jumlah</label>
					<input class = "form-control1" type =  "number" name = "jumlah" required="" onFocus="startCalc();" onBlur="stopCalc();" value="1" />
					</td>
					<td class="col-sm-3">
					<label>Subtotal</label>
					<input class = "form-control1" type =  "number" name = "total" required="" onchange='tryNumberFormat(this.form.thirdBox);' value="0" readonly />
					</td class="col-sm-1">
					<td>
					<label>  .</label>
					<input class="btn btn-info" type="submit" name="tambahjual" value="TAMBAH">
					</td>
					</tr>
					</table>
					</div>
					
					<div class="monthly-grid">
						<div class="panel panel-widget">
			<table class="table table-striped table-bordered table-hover">

			<input class = "form-control" type ="hidden" name="jual" onchange='tryNumberFormat(this.form.thirdBox);' required="" />

</form>

<form method="post" action="cetak_struk.php">
			
			<div class="col-xs-12 col-sm-4">
			<input class = "form-control" placeholder="Masukan ID Penjualan" type ="search" id="jual"  name = "jual" required="" />
			</div>
			<div class="col-xs-12 col-sm-3">
			<input type="submit" class="btn btn-primary" value='CETAK'>
			</div>

			<br><br>
				<tr align="center">
					<th>ID Penjualan</th>
					<th>ID Buku</th>
					<th>Judul Buku</th>
					<th>Harga</th>
					<th>Jumlah Buku</th>
					<th>Subtotal</th>
				</tr>
				<tbody> 

			<?php
			$jual     = $_POST['jual'];
      		$sql=query("SELECT * FROM total where id_penjualan ='$jual' ");
     		foreach($sql as $data):
 			?>
    <tr>
      <td><?php echo $data['id_penjualan'];?></td>
      <td><?php echo $data['id_buku'];?></td>
      <td><?php echo $data['judul'];?></td>
      <td><?php echo $data['harga_jual'];?></td>
      <td><?php echo $data['jumlah'];?></td>
      <td><?php echo $data['total'];?></td>
    <?php
    endforeach;
    ?>
		 		</tbody>
</form>
			</table>
						</div>
					</div>

		<div class="fo-top-di">
			<div class="footer">
						<p>© 2017 Furqon Books Store. All Rights Reserved | Design by <a href="https://www.facebook.com/profile.php?id=100009339596491">Deden Muhamad Furqon</a></p>
			</div>
		</div>


</div>
				<!--//content-inner-->
			<!--/sidebar-menu-->
				<div class="sidebar-menu">
					<header class="logo1">
						<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
					</header>
						<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                           <div class="menu">
									<ul id="menu" >
										<li><a href="index.php"><i class="fa fa-shopping-cart"></i> <span>Kasir</span></a></li>
										<li id="menu-academico" ><a href="#"><i class="fa fa-book"></i> <span> Data Buku </span> <span class="fa fa-angle-right" style="float: right"></span></a>
										   <ul id="menu-academico-sub" >
										   <li id="menu-academico-avaliacoes" ><a href="Data_buku.php">Semua</a></li>
										   <li id="menu-academico-avaliacoes" ><a href="buku_novel.php">Novel</a></li>
											<li id="menu-academico-avaliacoes" ><a href="buku_pelajaran.php">Pelajaran</a></li>
											<li id="menu-academico-boletim" ><a href="buku_komputer.php">Komputer</a></li>
										  </ul>
										</li>
										<li id="menu-academico" ><a href="#"><i class="fa fa-user"></i> <span> Profil </span> <span class="fa fa-angle-right" style="float: right"></span></a>
										   <ul id="menu-academico-sub" >
										   <li id="menu-academico-avaliacoes" ><a href="Data_kasir.php">Kasir</a></li>
											<li id="menu-academico-avaliacoes" ><a href="Data_Distributor.php">Distributor</a></li>
										  </ul>
										</li>
								  </ul>
								</div>
							  </div>
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->
  
 <script src="js/menu_jquery.js"></script>
</body>
</html>