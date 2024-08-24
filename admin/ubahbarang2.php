
<?php
$ambil=$koneksi->query("SELECT * FROM barang WHERE id_barang='$_GET[id]'");
$pecah=$ambil->fetch_assoc();


?>
<form method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label> Id barang </label>
		<input type="text" class="form-control" name="idbarang" value="<?php echo $pecah['id_barang'];?>">
	</div>
	
	
	<div class="form-group">
		<label> Nama Barang </label>
		<input type="text" class="form-control" name="namabarang" value="<?php echo $pecah['nama_barang'];?>">
	</div>
	
	<div class="form-group">
		<label> Jenis Barang </label>
		<select class="form-control" name="idjenis" required>
		<?php $ambil=$koneksi->query("SELECT*FROM jenis_barang ");?>
		<?php while($pecahh=$ambil->fetch_assoc()){?>
	<option value="<?php echo $pecahh['id_jenis'] ?>" > <?php echo $pecahh['id_jenis'] ?>-<?php echo $pecahh['nama_jenis'] ?></option>
	<?php } ?>
	</select>
	</div>
	
	<div class="form-group">
		<label> Kategori Barang</label>
		<select class="form-control" name="idkategori" required>
		<?php $ambil=$koneksi->query("SELECT*FROM kategori_barang ");?>
		<?php while($pecahh=$ambil->fetch_assoc()){?>
	<option value="<?php echo $pecahh['id_kategori'] ?>" > <?php echo $pecahh['id_kategori'] ?>-<?php echo $pecahh['nama_kategori'] ?></option>
	<?php } ?>
	</select>
	</div>
	
	<div class="form-group">
		<label> Id Satuan </label>
		<select class="form-control" name="idsatuan" required>
		<?php $ambil=$koneksi->query("SELECT*FROM satuan_barang ");?>
		<?php while($pecahh=$ambil->fetch_assoc()){?>
	<option value="<?php echo $pecahh['id_satuan'] ?>" > <?php echo $pecahh['id_satuan'] ?>-<?php echo $pecahh['ket_satuan'] ?></option>
		<?php } ?>
	</select>
	</div>
	
	<div class="form-group">
		<label> Id Ukuran </label>
		<select class="form-control" name="idukuran" required>
		<?php $ambil=$koneksi->query("SELECT*FROM ukuran ");?>
		<?php while($pecahh=$ambil->fetch_assoc()){?>
	<option value="<?php echo $pecahh['id_ukuran'] ?>" > <?php echo $pecahh['id_ukuran'] ?>-<?php echo $pecahh['ket_ukuran'] ?></option>
		<?php } ?>
	</select>
	</div>

	<div class="form-group">
		<img src="../photo/<?php echo $pecah['photo']?>" width="200">
	</div>
	<div class="form-group">
		<label> Ganti photo </label>
		<input type="file" name="fotobarang" class="form-control">
	</div>
	<div class="form-group">
		<label> Harga </label>
		<input type="text" class="form-control" name="hargabarang" value="<?php echo $pecah['harga'];?>">
	</div>
		<div class="form-group">
		<label> Stok </label>
		<input autocomplate="off" type="text" class="form-control" name="stokbarang" value="<?php echo $pecah['stok'];?>">
	</div>
	
	
	
	<button class="btn btn-primary" name="ubah"> Ubah </button>
</form>
<?php
if (isset ( $_POST['ubah']))
{
	$namafoto=$_FILES['fotobarang']['name'];
	$lokasifoto=$_FILES['fotobarang']['tmp_name'];
	//jika foto dirubah
	if(!empty($lokasifoto))
		{
			move_uploaded_file($lokasifoto, "../photo/$namafoto");
		
	$koneksi->query("UPDATE barang SET id_barang='$_POST[idbarang]',nama_barang='$_POST[namabarang]', 
	,id_jenis='$_POST[idjenis]'
	,id_kategori='$_POST[idkategori]',id_satuan='$_POST[idsatuan]',id_ukuran='$_POST[idukuran]', photo='$namafoto',
	harga='$_POST[hargabarang]',stok='$_POST[stokbarang]' WHERE id_barang='$_GET[id]'");
		}
	else
	{
		$koneksi->query("UPDATE barang SET id_barang='$_POST[idbarang]',nama_barang='$_POST[namabarang]' 
		,id_jenis='$_POST[idjenis]',id_kategori='$_POST[idkategori]',
		id_satuan='$_POST[idsatuan]',id_ukuran='$_POST[idukuran]',harga='$_POST[hargabarang]',
		stok='$_POST[stokbarang]' WHERE id_barang='$_GET[id]'");
	}
	echo "<script> alert(' Data Berhasil Diubah');</script>";
	echo "<script>location='index2.php?halaman=barang2';</script>";

}
?>
