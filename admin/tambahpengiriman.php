<div class="row">
    <div class="col-lg-12">
        <h2>TAMBAH PENGIRIMAN</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> Id Pengiriman </label>
		<input type="text" class="form-control" name="idpengiriman">
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
		<?php $ambill=$koneksi->query("SELECT*FROM tujuan_kirim ");?>
		<?php while($pecah=$ambill->fetch_assoc()){?>
	<option value="<?php echo $pecah['id_tujuan'] ?>" > <?php echo $pecah['id_tujuan'] ?>-<?php echo $pecah['nama_tujuan'] ?></option>
	<?php } ?>
	</select>
	</div>	
	<div class="form-group">
		<label> Tarif </label>
		<input type="text" class="form-control" name="tarif">
	</div>
	<button class="btn btn-primary" name="save"> Simpan </button>
</form>
<?php
if (isset ( $_POST['save']))
{
	$koneksi->query("INSERT INTO pengiriman (id_pengiriman,id_jasakirim,id_lamakirim,id_tujuan,tarif) VALUES ('$_POST[idpengiriman]',
	'$_POST[idjasakirim]','$_POST[idlamakirim]','$_POST[idtujuan]','$_POST[tarif]')");
	
	echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pengiriman'>";
}
?>
