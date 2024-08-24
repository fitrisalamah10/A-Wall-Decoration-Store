<div class="row">
    <div class="col-lg-12">
        <h2>UBAH STATUS PEMBAYARAN</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />

<?php
$ambil=$koneksi->query("SELECT * FROM status_bayar WHERE id_statbayar='$_GET[id]'");
$pecah=$ambil->fetch_assoc();


?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> Id Status Bayar </label>
		<input type="text" class="form-control" name="idstatbayar" value="<?php echo $pecah['id_statbayar'];?>">
	</div>
	<div class="form-group">
		<label> Keterangan Status Bayar  </label>
		<input type="text" class="form-control" name="ketstatbayar" value="<?php echo $pecah['ket_statbayar'];?>">
	</div>
	<button class="btn btn-primary" name="ubah"> Ubah </button>
</form>

<?php
if(isset($_POST['ubah']))
{
	$koneksi->query("UPDATE status_bayar SET id_statbayar='$_POST[idstatbayar]',
	ket_statbayar='$_POST[ketstatbayar]' WHERE id_statbayar='$_GET[id]'");

echo "<script> alert(' Data Berhasil Diubah');</script>";
echo "<script>location='index.php?halaman=statusbayar';</script>";
}

?>