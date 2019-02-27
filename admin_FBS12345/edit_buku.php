<?php
include('cekadmin.php');
?>
<?php 
    require '../koneksi/koneksi.php';
    $id_buku = null;
    if(!empty($_GET['id_buku']))
    {
        $id_buku = $_GET['id_buku'];
    }
    if($id_buku == null)
    {
        header("Location: data_buku.php");
    }
	if ( !empty($_POST))
    {
              
        // post values
        $id_buku     = $_POST['id_buku'];
        $judul       = $_POST['judul'];
        $noisbn      = $_POST['noisbn'];
        $penulis     = $_POST['penulis'];
        $penerbit    = $_POST['penerbit'];
        $tahun       = $_POST['tahun'];
        $jenis_buku  = $_POST['jenis_buku'];
        $stok        = $_POST['stok'];
        $harga_pokok = $_POST['harga_pokok'];
        $harga_jual  = $_POST['harga_jual'];
        $ppn         = $_POST['ppn'];
        $diskon      = $_POST['diskon'];
		
		// Update data
        $query = "Update buku SET id_buku='$id_buku',judul='$judul', noisbn='$noisbn', penulis='$penulis', penerbit='$penerbit', tahun='$tahun', jenis_buku='$jenis_buku', stok='$stok', harga_pokok='$harga_pokok', harga_jual='$harga_jual', ppn='$ppn', diskon='$diskon' where id_buku='$id_buku'";
        mysqli_query($con,$query);
		 header("Location: data_buku.php");
    }
	else
	{
		
		$query = "SELECT * FROM buku where id_buku = '$id_buku'";
		$res    = mysqli_query($con,$query);	
		$data=mysqli_fetch_array($res);
		
		$id_buku     = $data['id_buku'];
        $judul       = $data['judul'];
        $noisbn      = $data['noisbn'];
        $penulis     = $data['penulis'];
        $penerbit    = $data['penerbit'];
        $tahun       = $data['tahun'];
        $jenis_buku  = $data['jenis_buku'];
        $stok        = $data['stok'];
        $harga_pokok = $data['harga_pokok'];
        $harga_jual  = $data['harga_jual'];
        $ppn         = $data['ppn'];
        $diskon      = $data['diskon'];
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
				<!--content-->
			<div class="content">

<div class="women_main">
	<!-- start content -->
<div class="registration">
		<div class="registration_left">
		<h2><span><i class="fa fa-pencil"></i> Update Data Buku</span></h2>
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
			<form method="POST" action="edit_buku.php?id_buku=<?php echo $id_buku;?>" name="autoSumForm">
				<div>
					<label>
						<input placeholder="ID Buku :" type="text" name="id_buku"  value="<?php echo !empty($id_buku)?$id_buku:'';?>" readonly>
					</label>
				</div>
				<div>
					<label>
						<input placeholder="Judul Buku :" type="text" name="judul" tabindex="1" required="" autofocus="" value="<?php echo !empty($judul)?$judul:'';?>">
					</label>
				</div>
				<div>
					<label>
						<input placeholder="NO ISBN :" type="text" name="noisbn" tabindex="2" required="" value="<?php echo !empty($noisbn)?$noisbn:'';?>">
					</label>
				</div>
				<div>
					<label>
						<input placeholder="Penulis :" type="text" name="penulis" tabindex="3" required="" value="<?php echo !empty($penulis)?$penulis:'';?>">
					</label>
				</div>
				<div>
					<label>
						<input placeholder="Penerbit :" type="text" name="penerbit" tabindex="4" required="" value="<?php echo !empty($penerbit)?$penerbit:'';?>">
					</label>
				</div>						
				<div>
					<label>
						<input placeholder="Tahun :" type="text" name="tahun" tabindex="5" required="" value="<?php echo !empty($tahun)?$tahun:'';?>">
					</label>
				</div>	
				<div>
					<input type="submit" tabindex="11" value="UPDATE">
					<a href="data_buku.php" class="btn btn-primary" >BACK</a>
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
						<option value="Novel"<?php echo $jenis_buku == 'Novel'?'selected':'';?> >Novel</option>
						<option value="Pelajaran" <?php echo $jenis_buku == 'Pelajaran'?'selected':'';?> >Pelajaran</option>
						<option value="Komputer" <?php echo $jenis_buku == 'Komputer'?'selected':'';?> >Komputer</option>
					</select>
					</label>
				</div>
				<div>
					<label>
						<input placeholder="Stok :" type="text" name="stok" tabindex="7" required="" value="<?php echo !empty($stok)?$stok:'';?>">
					</label>
				</div>	
				<div >
					<label  class=" input-group" >
						<span class="input-group-addon">Rp.</span>
						<input placeholder="Harga Pokok :" type="text" name="harga_pokok" tabindex="8" required="" value="<?php echo !empty($harga_pokok)?$harga_pokok:'';?>" onFocus="startCalc();" onBlur="stopCalc();">
					</label>
				</div>
				<div>
					<label class=" input-group">
						<input placeholder="PPN :" type="text" name="ppn" tabindex="9" required="" value="<?php echo !empty($ppn)?$ppn:'';?>" onFocus="startCalc();" onBlur="stopCalc();">
						<span class="input-group-addon">%</span>
					</label>
				</div>
				<div>
					<label class=" input-group">
						<input placeholder="Diskon :" type="text" name="diskon" tabindex="10" required="" value="<?php echo !empty($diskon)?$diskon:'';?>" onFocus="startCalc();" onBlur="stopCalc();">
						<span class="input-group-addon">%</span>
					</label>
				</div>
				<div >
					<label  class=" input-group" >
						<span class="input-group-addon">Rp.</span>
						<input readonly type="text" name="harga_jual" tabindex="8" required=""  value='<?php echo !empty($harga_jual)?$harga_jual:'';?>' onchange='tryNumberFormat(this.form.thirdBox);' readonly>
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