<?php
   session_start();
   if(isset($_SESSION['username'])) {
   header(''); }
   require_once("koneksi.php");
?>
<?php


//jk ada tombol login(login) ditekan
if(isset($_POST["login"]))
{
	
	$nama = $_POST["username"];
	$pas = $_POST["password"];
	$level = $_POST["level"];
	
	//lakukan query ngecek akun di tabel user di db
	$ambil=$koneksi->query("SELECT * FROM user WHERE username='$nama' AND password='$pas' AND level='$level'");
	
	//itung akun yg terambil
	$akunyangcocok=$ambil->num_rows;
	
	//jika 1 akun yg cocok, maka diloginkan
	if($akunyangcocok==1)
	{
		//sukses  login
		$akun = $ambil->fetch_assoc();
		$_SESSION["user"]=$akun;
		echo "<script> alert('Login Berhasil');</script>";
		
		//
		if($level!='admin')
		{
			echo "<script> location='index2.php';</script>";
		}
		else
		{
			echo "<script> location='index.php';</script>";	
		}
	}
	else
	{
		//gagal login
		echo "<script> alert('anda gagal login, periksa kembali data Anda');</script>";
		echo "<script> location ='login.php';</script>";
	}
}

?>