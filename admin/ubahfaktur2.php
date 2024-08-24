<div class="row">
    <div class="col-lg-12">
        <h2>UBAH FAKTUR</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />
<?php
$ambil=$koneksi->query("SELECT * FROM faktur WHERE id_faktur='$_GET[id]'");
$pecah=$ambil->fetch_assoc();


?>
<form method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label> Id faktur </label>
		<input type="text" class="form-control" name="idfaktur" value="<?php echo $pecah['id_faktur'];?>">
	</div>
	
	
	<div class="form-group">
		<label> Username </label>
		<input type="text" class="form-control" name="username" value="<?php echo $pecah['username'];?>">
	</div>
	
	<div class="form-group">
		<label> Id Pengiriman </label>
		<select class="form-control" name="idpengiriman" required>
		<?php $ambil=$koneksi->query("SELECT*FROM pengiriman ");?>
		<?php while($pecahh=$ambil->fetch_assoc()){?>
	<option value="<?php echo $pecahh['id_pengiriman'] ?>" > <?php echo $pecahh['id_pengiriman'] ?></option>
	<?php } ?>
	</select>
	</div>
	
	<div class="form-group">
		<label> Tanggal </label>
		<input type="date" class="form-control" name="tanggal" value="<?php echo $pecah['tgl_beli'];?>">
	</div>
	
	<div class="form-group">
		<label> Id Pembayaran</label>
		<select class="form-control" name="idpembayaran" required>
		<?php $ambil=$koneksi->query("SELECT*FROM pembayaran ");?>
		<?php while($pecahh=$ambil->fetch_assoc()){?>
	<option value="<?php echo $pecahh['id_bayar'] ?>" > <?php echo $pecahh['id_bayar'] ?>-<?php echo $pecahh['nama_bayar'] ?></option>
	<?php } ?>
	</select>
	</div>
	
	<div class="form-group">
		<label> Id Status Bayar </label>
		<select class="form-control" name="idstatbayar" required>
		<?php $ambil=$koneksi->query("SELECT*FROM status_bayar ");?>
		<?php while($pecahh=$ambil->fetch_assoc()){?>
		<option value="<?php echo $pecahh['id_statbayar'] ?>" > <?php echo $pecahh['id_statbayar'] ?>-<?php echo $pecahh['ket_statbayar'] ?></option>
		<?php } ?>
	</select>
	</div>
	
	<div class="form-group">
		<label> Id Status Proses </label>
		<select class="form-control" name="idstatproses" required>
		<?php $ambil=$koneksi->query("SELECT*FROM status_proses ");?>
		<?php while($pecahh=$ambil->fetch_assoc()){?>
		<option value="<?php echo $pecahh['id_statproses'] ?>" > <?php echo $pecahh['id_statproses'] ?>-<?php echo $pecahh['ket_statproses'] ?></option>
		<?php } ?>
	</select>
	</div>

	<div class="form-group">
		<label> Total Bayar </label>
		<input type="text" class="form-control" name="total" value="<?php echo $pecah['total'];?>">
	</div>
		
	<button class="btn btn-primary" name="ubah"> Ubah </button>
</form>
<?php
if(isset($_POST['ubah']))
{
		$koneksi->query("UPDATE faktur SET id_faktur='$_POST[idfaktur]', username='$_POST[username]' 
		,id_pengiriman='$_POST[idpengiriman]',tgl_beli='$_POST[tanggal]',
		id_pembayaran='$_POST[idpembayaran]',id_statbayar='$_POST[idstatbayar]',id_statproses='$_POST[id_statproses]',
		total='$_POST[total]' WHERE id_faktur='$_GET[id]'");
		
	echo "<script> alert(' Data Berhasil Diubah');</script>";
	echo "<script>location='index.php?halaman=faktur';</script>";

}?>