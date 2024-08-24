<div class="row">
    <div class="col-lg-12">
        <h2>UBAH PENGIRIMAN</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />

<?php
$ambil=$koneksi->query("SELECT * FROM pengiriman WHERE id_pengiriman='$_GET[id]'");
$pecah=$ambil->fetch_assoc();


?>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> Id Pengiriman </label>
		<?php $ambilll=$koneksi->query("SELECT*FROM pengiriman WHERE id_pengiriman='$_GET[id]' ");?>
		<?php $pecah=$ambilll->fetch_assoc()?>
		<input type="text" class="form-control" name="idpengiriman" value="<?php echo $pecah['id_pengiriman'];?>">
	</div>
	<div class="form-group">
		<label> Id Jasa Kirim </label>
		<select class="form-control" name="idjasakirim" required>
		<?php $ambil=$koneksi->query("SELECT*FROM jasa_kirim ");?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
	<option value="<?php echo $pecah['id_jasakirim'] ?>" > <?php echo $pecah['id_jasakirim'] ?>-<?php echo $pecah['nama_jasakirim'] ?></option>
		<?php } ?>
	</select>
	</div>
	
	<div class="form-group">
		<label> Id Lama Kirim </label>
		<select class="form-control" name="idlamakirim" required>
		<?php $ambil=$koneksi->query("SELECT*FROM lama_kirim ");?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
	<option value="<?php echo $pecah['id_lamakirim'] ?>" > <?php echo $pecah['id_lamakirim'] ?>-<?php echo $pecah['nama_lamakirim'] ?></option>
		<?php } ?>
	</select>
	</div>	
	<div class="form-group">
		<label> Id Tujuan Kirim </label>
		<select class="form-control" name="idtujuan" required>
		<?php $ambil=$koneksi->query("SELECT*FROM tujuan_kirim ");?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
	<option value="<?php echo $pecah['id_tujuan'] ?>" > <?php echo $pecah['id_tujuan'] ?>-<?php echo $pecah['nama_tujuan'] ?></option>
		<?php } ?>
	</select>
	</div>	
	<div class="form-group">
		<label> Tarif </label>
		<?php $ambilll=$koneksi->query("SELECT*FROM pengiriman WHERE id_pengiriman='$_GET[id]' ");?>
		<?php $pecah=$ambilll->fetch_assoc()?>
		<input type="text" class="form-control" name="tarif" value="<?php echo $pecah['tarif'];?>">
	</div>
	<button class="btn btn-primary" name="ubah"> Ubah </button>
</form>
<?php
if(isset($_POST['ubah']))
{
	$koneksi->query("UPDATE pengiriman SET id_pengiriman='$_POST[idpengiriman]',
	id_jasakirim='$_POST[idjasakirim]',id_lamakirim='$_POST[idlamakirim]',id_tujuan='$_POST[idtujuan]',
	tarif='$_POST[tarif]' WHERE id_pengiriman='$_GET[id]'");

echo "<script> alert(' Data Berhasil Diubah');</script>";
echo "<script>location='index2.php?halaman=pengiriman2';</script>";
}

?>