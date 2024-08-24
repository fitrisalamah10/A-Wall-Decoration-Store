<div class="row">
    <div class="col-lg-12">
        <h2>UBAH JENIS</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />

<?php
$ambil=$koneksi->query("SELECT * FROM jenis_barang WHERE id_jenis='$_GET[id]'");
$pecah=$ambil->fetch_assoc();


?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> Id Jenis </label>
		<input type="text" class="form-control" name="idjenis" value="<?php echo $pecah['id_jenis'];?>">
	</div>
	<div class="form-group">
		<label> Nama Jenis </label>
		<input type="text" class="form-control" name="namajenis" value="<?php echo $pecah['nama_jenis'];?>">
	</div>
	<button class="btn btn-primary" name="ubah"> Ubah </button>
</form>

<?php
if(isset($_POST['ubah']))
{
	$koneksi->query("UPDATE jenis_barang SET id_jenis='$_POST[idjenis]',
	nama_jenis='$_POST[namajenis]' WHERE id_jenis='$_GET[id]'");

echo "<script> alert(' Data Berhasil Diubah');</script>";
echo "<script>location='index2.php?halaman=jenis2';</script>";
}

?>