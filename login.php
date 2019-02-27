<?php

$error=''; 

include "koneksi/koneksi.php";
if(isset($_POST['submit']))
{				
	$username	= $_POST['username'];
	$password	= $_POST['password'];
	$akses		= $_POST['akses'];
					
	$query = mysqli_query($con, "SELECT * FROM kasir WHERE username='$username' AND password='$password'");
	if(mysqli_num_rows($query) == 0)
	{
		$error = "Username atau Password Salah";
	}
	else
	{
		$row = mysqli_fetch_assoc($query);
		$_SESSION['username']=$row['username'];
		$_SESSION['akses'] = $row['akses'];
		
		if($row['akses'] == "admin" && $akses=="1")
		{
			header("Location: admin_FBS12345/index.php");
		}
		else if($row['akses'] =="kasir" && $akses=="2")
		{
			header("Location: kasir_FBS12345/index.php");
		}
		else
		{
			$error = "Login Gagal";
		}
	}
}

			
?>