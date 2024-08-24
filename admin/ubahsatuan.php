<div class="row">
    <div class="col-lg-12">
        <h2>UBAH SATUAN</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />

<?php
$ambil=$koneksi->query("SELECT * FROM satuan_barang WHERE id_satuan='$_GET[id]'");
$pecah=$ambil->fetch_assoc();


?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> Id Satuan </label>
		<input type="text" class="form-control" name="idsatuan" value="<?php echo $pecah['id_satuan'];?>">
	</div>
	<div class="form-group">
		<label> Keterangan Satuan  </label>
		<input type="text" class="form-control" name="ketsatuan" value="<?php echo $pecah['ket_satuan'];?>">
	</div>
	
	<button class="btn btn-primary" name="ubah"> Ubah </button>
</form>

<?php
if(isset($_POST['ubah']))
{
	$koneksi->query("UPDATE satuan_barang SET id_satuan='$_POST[idsatuan]',
	ket_satuan='$_POST[ketsatuan]' WHERE id_satuan='$_GET[id]'");

echo "<script> alert(' Data Berhasil Diubah');</script>";
echo "<script>location='index.php?halaman=satuan';</script>";
}

?>