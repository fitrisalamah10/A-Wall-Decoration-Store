<div class="row">
    <div class="col-lg-12">
        <h2>UBAH PEMBAYARAN</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />

<?php
$ambil=$koneksi->query("SELECT * FROM pembayaran WHERE id_bayar='$_GET[id]'");
$pecah=$ambil->fetch_assoc();


?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> Id Bayar </label>
		<input type="text" class="form-control" name="idbayar" value="<?php echo $pecah['id_bayar'];?>">
	</div>
	<div class="form-group">
		<label> Nama Bayar  </label>
		<input type="text" class="form-control" name="namabayar" value="<?php echo $pecah['nama_bayar'];?>">
	</div>
	<div class="form-group">
		<label> Ket Bayar  </label>
		<input type="text" class="form-control" name="ketbayar" value="<?php echo $pecah['ket_bayar'];?>">
	</div>
	<button class="btn btn-primary" name="ubah"> Ubah </button>
</form>

<?php
if(isset($_POST['ubah']))
{
	$koneksi->query("UPDATE pembayaran SET id_bayar='$_POST[idbayar]',
	nama_bayar='$_POST[namabayar]',ket_bayar='$_POST[ketbayar]' WHERE id_bayar='$_GET[id]'");

echo "<script> alert(' Data Berhasil Diubah');</script>";
echo "<script>location='index.php?halaman=pembayaran';</script>";
}

?>