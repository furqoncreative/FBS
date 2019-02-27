<?php
session_start();
if($_SESSION){
	if($_SESSION['akses']=="admin")
	{
		header("Location: admin_FBS12345/index.php");
	}
	if($_SESSION['akses']=="kasir")
	{
		header("Location: kasir_FBS12345/index.php");
	}
}

include('login.php'); 

?>
<!doctype html>
<html lang="en">
<head>
<title>FBS - LOGIN</title>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- css -->
<link href="css/style.css" rel='stylesheet' type='text/css' media="all" /> 
<!-- /css -->
</head>
<body>
<h1 class="header-agileits w3layouts w3 w3l w3ls">Login to Furqon Books Store</h1>
<div class="content-w3ls agileits agileinfo wthree">
	<form action="#" method="post">
			<div class="form-control"> 
				<label class="header">Username <span>:</span></label>
				<input type="text" id="city" name="username" placeholder="Username Anda" title="Masukan Username" required="" autofocus="">
			</div>
			<div class="form-control"> 
				<label class="header">Password <span>:</span></label>
				<input type="password" id="zip" name="password" placeholder="Password Anda" title="Masukan Password" required="">
			</div>
		<div class="form-wthree w3-agile w3-agileits agileits-w3layouts">
			<div class="form-control">
				<label class="header">Akses <span>:</span></label>
				<select name="akses">
					<option value="Pilih AKses" selected>Pilih Akses</option>
					<option value="1">Admin</option>
					<option value="2">Kasir</option>
				</select>
			</div>
		</div>
		<div class="form-control last">
			<input type="submit" name="submit" class="register" value="LOGIN">
			<input type="reset" class="reset" value="Reset">
			<div class="clear"></div>
		</div>	
	</form>
	<br>
	<br>
	<center><label ><?php echo $error; ?></label></center>
</div>


<p class="copyright w3layouts w3 w3l w3ls">© 2017 Furqon Books Store. All Rights Reserved | Design by <a href="https://www.facebook.com/profile.php?id=100009339596491" target="_blank">Deden Muhamad Furqon</a></p>
</body>
</html>