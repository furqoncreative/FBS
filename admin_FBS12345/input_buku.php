<?php
include('cekadmin.php');
?>
<?php require "../koneksi/fungsi.php";
if(isset($_POST['tambahbuku'])) {

    if(tambahbuku($_POST)> 0 ) {

        echo "<script>
             alert('DATA BUKU BERHASIL DITAMBAH !');
             document.location.href='Data_buku.php';
             </script>"; 
         }
        else {
            echo "<script>
             alert('DATA BUKU GAGAL DITAMBAH !');
             document.location.href='input_buku.php';
             </script>";
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
<script src="js/amcharts.js"></script>	
<script src="js/serial.js"></script>	
<script src="js/light.js"></script>	
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
					<!-- //header-ends -->
<script><!-- 
function startCalc(){
interval = setInterval("calc()",1);}
function calc(){
one = document.autoSumForm.harga_pokok.value;
two = document.autoSumForm.ppn.value; 
three = document.autoSumForm.diskon.value; 
document.autoSumForm.harga_jual.value = (one * 1) + (two * one / 100  * 1) - (three * one / 100 * 1);}
function stopCalc(){
clearInterval(interval);}
</script>

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
 $carikode = mysqli_query($koneksi, "SELECT max(id_buku) from buku") or die (mysql_error());
  // menjadikannya array
  $datakode = mysqli_fetch_array($carikode);
  // jika $datakode
  if ($datakode) {
   $nilaikode = substr($datakode[0], 3);
   // menjadikan $nilaikode ( int )
   $kode = (int) $nilaikode;
   // setiap $kode di tambah 1
   $kode = $kode + 1;
   $kode_otomatis = "BK-".str_pad($kode, 3, "0", STR_PAD_LEFT);
  } else {
   $kode_otomatis = "BK-001";
  }


?>
				<!--content-->
			<div class="content">

<div class="women_main">
	<!-- start content -->
<div class="registration">
		<div class="registration_left">
		<h2><span><i class="fa fa-pencil"></i> Input Data Buku Baru</span></h2>
		<script>
			(function() {
		
			// Create input element for testing
			var inputs = document.createElement('input');
			
			// Create the supports object
			var supports = {};
			
			supports.autofocus   = 'autofocus' in inputs;
			supports.required    = 'required' in inputs;
			supports.placeholder = 'placeholder' in inputs;
		
			// Fallback for autofocus attribute
			if(!supports.autofocus) {
				
			}
			
			// Fallback for required attribute
			if(!supports.required) {
				
			}
		
			// Fallback for placeholder attribute
			if(!supports.placeholder) {
				
			}
			
			// Change text inside send button on submit
			var send = document.getElementById('register-submit');
			if(send) {
				send.onclick = function () {
					this.innerHTML = '...Sending';
				}
			}
		
		})();
		</script>
		 <div class="registration_form">

		 <!-- Form -->
			<form method="POST" action="" name="autoSumForm">
				<div>
					<label>
						<input placeholder="ID Buku :" type="text" name="id_buku" value="<?php echo $kode_otomatis;?>" readonly>
					</label>
				</div>
				<div>
					<label>
						<input placeholder="Judul Buku :" type="text" name="judul" tabindex="1" required="" autofocus="">
					</label>
				</div>
				<div>
					<label>
						<input placeholder="NO ISBN :" type="text" name="noisbn" tabindex="2" required="" >
					</label>
				</div>
				<div>
					<label>
						<input placeholder="Penulis :" type="text" name="penulis" tabindex="3" required="">
					</label>
				</div>
				<div>
					<label>
						<input placeholder="Penerbit :" type="text" name="penerbit" tabindex="4" required="">
					</label>
				</div>						
				<div>
					<label>
						<input placeholder="Tahun :" type="text" name="tahun" tabindex="5" required="">
					</label>
				</div>	
				<div>
					<input type="submit" name="tambahbuku" 	tabindex="11" value="SUBMIT">
					<input type="reset" tabindex="12" value="RESET">
				</div>
			<!-- /Form -->
		</div>
	</div>
	<div class="registration_left">
		<h2> .</h2>
		 <div class="registration_form">
		 <!-- Form -->
				<div>
					<label>
					<select class="form-control" tabindex="6" id="jenis_buku" name="jenis_buku" >
						<option>Jenis Buku</option>
						<option value="Novel">Novel</option>
						<option value="Pelajaran">Pelajaran</option>
						<option value="Komputer">Komputer</option>
					</select>
					</label>
				</div>
				<div>
					<label>
						<input placeholder="Stok :" type="text" name="stok" tabindex="7" required="">
					</label>
				</div>	
				<div >
					<label  class=" input-group" >
						<span class="input-group-addon">Rp.</span>
						<input placeholder="Harga Pokok :" type="text" name="harga_pokok" tabindex="8" required="" onFocus="startCalc();" onBlur="stopCalc();">
					</label>
				</div>
				<div>
					<label class=" input-group">
						<input placeholder="PPN :" type="text" name="ppn" tabindex="9" required="" onFocus="startCalc();" onBlur="stopCalc();">
						<span class="input-group-addon">%</span>
					</label>
				</div>
				<div>
					<label class=" input-group">
						<input placeholder="Diskon :" type="text" name="diskon" tabindex="10" required="" onFocus="startCalc();" onBlur="stopCalc();">
						<span class="input-group-addon">%</span>
					</label>
				</div>
				<div >
					<label  class=" input-group" >
						<span class="input-group-addon">Rp.</span>
						<input placeholder="Harga Jual :" readonly type="text" name="harga_jual" tabindex="11" required=""  onchange='tryNumberFormat(this.form.thirdBox);' readonly>
					</label>
				</div>				
			</form>
			<!-- /Form -->
		</div>
	</div>
	<div class="clearfix"></div>
	</div>


						
		<div class="fo-top-di">
			<div class="footer">
					<div class="clearfix"> </div>
						<p>© 2017 Furqon Books Store. All Rights Reserved | Design by <a href="https://www.facebook.com/profile.php?id=100009339596491">Deden Muhamad Furqon</a></p>
			</div>
		</div>
			</div>

			<!--content-->
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
										<li><a href="index.php"><i class="fa fa-home"></i> <span>Home</span></a></li>
										 <li id="menu-academico" ><a href="#"><i class="fa fa-pencil"></i> <span> Data Baru</span> <span class="fa fa-angle-right" style="float: right"></span></a>
										   <ul id="menu-academico-sub" >
										   <li id="menu-academico-avaliacoes" ><a href="input_buku.php">Buku</a></li>
											<li id="menu-academico-avaliacoes" ><a href="input_pasok.php">Pasok</a></li>
											<li id="menu-academico-boletim" ><a href="Input_kasir.php">Kasir</a></li>
											<li id="menu-academico-boletim" ><a href="input_distributor.php">Distributor</a></li>
										  </ul>
										</li>
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
										   <li id="menu-academico-avaliacoes" ><a href="Data_Kasir.php">Kasir</a></li>
											<li id="menu-academico-avaliacoes" ><a href="Data_Distributor.php">Distributor</a></li>
										  </ul>
										</li>
										<li id="menu-academico" ><a href="#"><i class="fa fa-tags"></i> <span> Laporan </span> <span class="fa fa-angle-right" style="float: right"></span></a>
										   <ul id="menu-academico-sub" >
										   <li id="menu-academico-avaliacoes" ><a href="Laporan_jual.php">Laporan Penjualan</a></li>
											<li id="menu-academico-avaliacoes" ><a href="laporan_pasok.php">Laporan Pemasokan </a></li>
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
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->
  
 <script src="js/menu_jquery.js"></script>
 
</body>
</html>