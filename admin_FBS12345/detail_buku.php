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
        header("Location: Data_buku.php");
    }
    else
    {
        // read data
        
        $query = "SELECT * FROM buku where id_buku = '$id_buku'";
		$res    = mysqli_query($con,$query);
		$data=mysqli_fetch_array($res);
		
       
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
				
				<!--content-->
			<div class="content">
					<div class="monthly-grid">
		<div class="container">
    <div class="col-sm-12">
        <div class="row">
            <h3>Detail Buku <?php echo $data['judul'];?> </h3>
        </div>
            
        <div class="form-group col-sm-12">
            <label class="col-sm-2 control-label">ID BUKU</label>
            <div class="col-sm-10">
              <p class="form-control-status-bar">: <?php echo $data['id_buku'];?></p>
            </div>
        </div>
        <div class="form-group col-sm-12">
            <label class="col-sm-2 control-label">JUDUL BUKU</label>
            <div class="col-sm-10">
              <p class="form-control-status-bar">: <?php echo $data['judul'];?></p>
            </div>
        </div>
        <div class="form-group col-sm-12">
            <label class="col-sm-2 control-label">NO ISBN</label>
            <div class="col-sm-10">
              <p class="form-control-status-bar">: <?php echo $data['noisbn'];?></p>
            </div>
        </div>
        <div class="form-group col-sm-12">
            <label class="col-sm-2 control-label">PENULIS</label>
            <div class="col-sm-10">
              <p class="form-control-status-bar">: <?php echo $data['penulis'];?></p>
            </div>
        </div>
        <div class="form-group col-sm-12">
            <label class="col-sm-2 control-label">PENERBIT</label>
            <div class="col-sm-10">
              <p class="form-control-status-bar">: <?php echo $data['penerbit'];?></p>
            </div>
        </div>
        <div class="form-group col-sm-12">
            <label class="col-sm-2 control-label">TAHUN TERBIT</label>
            <div class="col-sm-10">
              <p class="form-control-status-bar">: <?php echo $data['tahun'];?></p>
            </div>
        </div>
        <div class="form-group col-sm-12">
            <label class="col-sm-2 control-label">JENIS BUKU</label>
            <div class="col-sm-10">
              <p class="form-control-status-bar">: <?php echo $data['jenis_buku'];?></p>
            </div>
        </div>
        <div class="form-group col-sm-12">
            <label class="col-sm-2 control-label">STOK</label>
            <div class="col-sm-10">
              <p class="form-control-status-bar">: <?php echo $data['stok'];?></p>
            </div>
        </div>
        <div class="form-group col-sm-12">
            <label class="col-sm-2 control-label">HARGA POKOK </label>
            <div class="col-sm-10">
              <p class="form-control-status-bar">: <?php echo $data['harga_pokok'];?></p>
            </div>
        </div>
        <div class="form-group col-sm-12">
            <label class="col-sm-2 control-label">HARGA JUAL</label>
            <div class="col-sm-10">
              <p class="form-control-status-bar">: <?php echo $data['harga_jual'];?> </p>
            </div>
        </div>
        <div class="form-group col-sm-12">
            <label class="col-sm-2 control-label">PPN</label>
            <div class="col-sm-10">
              <p class="form-control-status-bar">: <?php echo $data['ppn'];?> %</p>
            </div>
        </div>
        <div class="form-group col-sm-12">
            <label class="col-sm-2 control-label">DISKON</label>
            <div class="col-sm-10">
              <p class="form-control-status-bar">: <?php echo $data['diskon'];?> %</p>
            </div>
        </div>
        <div class="form-group col-sm-12">
            <a class="btn btn btn-danger" href="Data_buku.php">Back</a>
        </div>
    </div>                
</div>
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