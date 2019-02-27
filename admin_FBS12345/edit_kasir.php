<?php
include('cekadmin.php');
?>
<?php 
    require '../koneksi/koneksi.php';
    $id_kasir = null;
    if(!empty($_GET['id_kasir']))
    {
        $id_kasir = $_GET['id_kasir'];
    }
    if($id_kasir == null)
    {
        header("Location: data_kasir.php");
    }
	if ( !empty($_POST))
    {
              
        // post values
        $id_kasir  = $_POST['id_kasir'];
        $nama      = $_POST['nama'];
        $alamat    = $_POST['alamat'];
        $telepon   = $_POST['telepon'];
        $status    = $_POST['status'];
        $username  = $_POST['username'];
        $password  = $_POST['password'];
        $akses     = $_POST['akses'];
		
		// Update data
        $query = "Update kasir SET id_kasir='$id_kasir', nama='$nama', alamat='$alamat', telepon='$telepon', status='$status', username='$username', password='$password', akses='$akses' where id_kasir = '$id_kasir'";
        mysqli_query($con,$query);
		 header("Location: data_kasir.php");
    }
	else
	{
		
		$query = "SELECT * FROM kasir where id_kasir = '$id_kasir'";
		$res    = mysqli_query($con,$query);	
		$data=mysqli_fetch_array($res);
		
		$id_kasir  = $data['id_kasir'];
        $nama      = $data['nama'];
        $alamat    = $data['alamat'];
        $telepon   = $data['telepon'];
        $status    = $data['status'];
        $username  = $data['username'];
        $password  = $data['password'];
        $akses     = $data['akses'];

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
<div class="women_main">
	<!-- start content -->
<div class="registration">
		<div class="registration_left">
		<h2><span><i class="fa fa-pencil"></i> Update Data Kasir</span></h2>
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
			<form method="POST" action="edit_kasir.php?id_kasir=<?php echo $id_kasir;?>">
				<div>
					<label>
						<input placeholder="ID Kasir :" type="text" name="id_kasir" tabindex="1" required="" autofocus="" value="<?php echo !empty($id_kasir)?$id_kasir:'';?>" readonly>
					</label>
				</div>
				<div>
					<label>
						<input placeholder="Nama :" type="text" name="nama" tabindex="1" required="" autofocus="" value="<?php echo !empty($nama)?$nama:'';?>">
					</label>
				</div>
				<div>
					<label>
						<input placeholder="Alamat :" type="text" name="alamat" tabindex="2" required="" value="<?php echo !empty($alamat)?$alamat:'';?>">
					</label>
				</div>
				<div>
					<label>
						<input placeholder="No Telepon :" type="text" name="telepon" tabindex="3" required="" value="<?php echo !empty($telepon)?$telepon:'';?>">
					</label>
				</div>
						
				<div>
					<input type="submit" tabindex="8" value="SUBMIT">
					<a href="Data_Kasir.php" class="btn btn-primary" > BACK</a>
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
						<input placeholder="Status :" type="text" name="status" tabindex="4" required="" value="<?php echo !empty($status)?$status:'';?>">
					</label>
				</div>	
				<div>
					<label>
						<input placeholder="Username :" type="text" name="username" tabindex="5" required="" value="<?php echo !empty($username)?$username:'';?>">
					</label>
				</div>	
				<div >
					<label>
						<input placeholder="Password :" type="Password" name="password" tabindex="6" required="" value="">
					</label>
				</div>
				<div>
					<label>
					<select class="form-control" tabindex="7" id="akses" name="akses" >
						<option>Akses</option>
						<option value="admin" <?php echo $akses == 'admin'?'selected':'';?>  >Admin</option>
						<option value="kasir" <?php echo $akses == 'kasir'?'selected':'';?>  >Kasir</option>
					</select>
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
										   <li id="menu-academico-avaliacoes" ><a href="data_buku.php">Semua</a></li>
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