<div class="row">
    <div class="col-lg-12">
        <h2>UBAH CUSTOMER</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />

<?php
$ambil=$koneksi->query("SELECT * FROM customer WHERE username='$_GET[id]'");
$pecah=$ambil->fetch_assoc();


?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> Username </label>
		<input type="text" class="form-control" name="username" value="<?php echo $pecah['username'];?>">
	</div>
	<div class="form-group">
		<label> Password </label>
		<input type="text" class="form-control" name="pass" value="<?php echo $pecah['pass'];?>">
	</div>
	<div class="form-group">
		<label> Nama Customer </label>
		<input type="text" class="form-control" name="namacustomer" value="<?php echo $pecah['nama_customer'];?>">
	</div>
	<div class="form-group">
		<label> Alamat </label>
		<input type="text" class="form-control" name="alamat" value="<?php echo $pecah['alamat'];?>">
	</div>
	<div class="form-group">
		<label> Kota </label>
		<input type="text" class="form-control" name="kota" value="<?php echo $pecah['kota'];?>">
	</div>
	<div class="form-group">
		<label> No HP </label>
		<input type="text" class="form-control" name="no_hp" value="<?php echo $pecah['no_hp'];?>">
	</div>
	<button class="btn btn-primary" name="ubah"> Ubah </button>
</form>

<?php
if(isset($_POST['ubah']))
{
	$koneksi->query("UPDATE customer SET username='$_POST[username]',pass='$_POST[pass]',
	nama_customer='$_POST[namacustomer]', alamat='$_POST[alamat]',kota='$_POST[kota]',no_hp='$_POST[no_hp]' WHERE username='$_GET[id]'");

echo "<script> alert(' Data Berhasil Diubah');</script>";
echo "<script>location='index.php?halaman=customer';</script>";
}

?>