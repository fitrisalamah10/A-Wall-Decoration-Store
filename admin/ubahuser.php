<div class="row">
    <div class="col-lg-12">
        <h2>UBAH ADMIN</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />
<?php
$ambil=$koneksi->query("SELECT * FROM user WHERE username='$_GET[id]'");
$pecah=$ambil->fetch_assoc();


?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> Username </label>
		<input type="text" class="form-control" name="username" value="<?php echo $pecah['username'];?>">
	</div>
	<div class="form-group">
		<label> Passwword </label>
		<input type="text" class="form-control" name="password" value="<?php echo $pecah['password'];?>">
	</div>
	<div class="form-group">
		<label> Level </label>
		<input type="text" class="form-control" name="level" value="<?php echo $pecah['level'];?>">
	</div>
	<button class="btn btn-primary" name="ubah"> Ubah </button>
</form>

<?php
if(isset($_POST['ubah']))
{
	$koneksi->query("UPDATE user SET username='$_POST[username]', password='$_POST[password]',
	level='$_POST[level]' WHERE username='$_GET[id]'");

echo "<script> alert(' Data Berhasil Diubah');</script>";
echo "<script>location='index2.php?halaman=user';</script>";
}

?>