<div class="row">
    <div class="col-lg-12">
        <h2>UBAH TUJUAN PENGIRIMAN</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />

<?php
$ambil=$koneksi->query("SELECT * FROM tujuan_kirim WHERE id_tujuan='$_GET[id]'");
$pecah=$ambil->fetch_assoc();


?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> Id Tujuan </label>
		<input type="text" class="form-control" name="idtujuan" value="<?php echo $pecah['id_tujuan'];?>">
	</div>
	<div class="form-group">
		<label> Nama Tujuan </label>
		<input type="text" class="form-control" name="namatujuan" value="<?php echo $pecah['nama_tujuan'];?>">
	</div>
	<button class="btn btn-primary" name="ubah"> Ubah </button>
</form>

<?php
if(isset($_POST['ubah']))
{
	$koneksi->query("UPDATE tujuan_kirim SET id_tujuan='$_POST[idtujuan]',
	nama_tujuan='$_POST[namatujuan]' WHERE id_tujuan='$_GET[id]'");

echo "<script> alert(' Data Berhasil Diubah');</script>";
echo "<script>location='index.php?halaman=tujuankirim';</script>";
}

?>