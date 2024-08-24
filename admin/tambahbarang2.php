<div class="row">
    <div class="col-lg-12">
        <h2>TAMBAH BARANG</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />


<form method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label> Id Barang </label>
		<input type="text" class="form-control" name="idbarang">
	</div>
	
	<div class="form-group">
		<label> Nama Barang </label>
		<input type="text" class="form-control" name="namabarang">
	</div>
	
	<div class="form-group">
		<label> Jenis Barang </label>
		<select class="form-control" name="idjenis" required>
		<?php $ambill=$koneksi->query("SELECT*FROM jenis_barang ");?>
		<?php while($pecah=$ambill->fetch_assoc()){?>
	<option value="<?php echo $pecah['id_jenis'] ?>" > <?php echo $pecah['id_jenis'] ?>-<?php echo $pecah['nama_jenis'] ?></option>
		<?php } ?>
		</select>
	</div>
	
	<div class="form-group">
		<label> Kategori Barang </label>
		<select class="form-control" name="idkategori" required>
		<?php $ambill=$koneksi->query("SELECT*FROM kategori_barang ");?>
		<?php while($pecah=$ambill->fetch_assoc()){?>
	<option value="<?php echo $pecah['id_kategori'] ?>" > <?php echo $pecah['id_kategori'] ?>-<?php echo $pecah['nama_kategori'] ?></option>
		<?php } ?>
		</select>
	</div>
	
	<div class="form-group">
		<label> Id Satuan </label>
		<select class="form-control" name="idsatuan" required>
		<?php $ambil=$koneksi->query("SELECT*FROM satuan_barang ");?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
	<option value="<?php echo $pecah['id_satuan'] ?>" > <?php echo $pecah['id_satuan'] ?>-<?php echo $pecah['ket_satuan'] ?></option>
	<?php } ?>
		</select>
	</div>
	
	<div class="form-group">
		<label> Id Ukuran </label>
		<select class="form-control" name="idukuran" required>
		<?php $ambil=$koneksi->query("SELECT*FROM ukuran ");?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
	<option value="<?php echo $pecah['id_ukuran'] ?>" > <?php echo $pecah['id_ukuran'] ?>-<?php echo $pecah['ket_ukuran'] ?></option>
	<?php } ?>
		</select>
	</div>
	
	<div class="form-group">
		<label> photo </label>
		<input type="file" class="form-control" name="foto">
	</div>
		<div class="form-group">
		<label> Harga </label>
		<input type="text" class="form-control" name="harga">
	</div>
		<div class="form-group">
		<label> Stok </label>
		<input type="text" class="form-control" name="stok">
	</div>
	<button class="btn btn-primary" name="savee"> Simpan </button>
</form>
<?php
if (isset ( $_POST['savee']))
{
	$nama = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi, "../photo/".$nama);
	$koneksi->query("INSERT INTO barang (id_barang, nama_barang, id_jenis,id_kategori, id_satuan, id_ukuran, photo, harga, stok)
	VALUES('$_POST[idbarang]','$_POST[namabarang]','$_POST[idjenis]','$_POST[idkategori]','$_POST[idsatuan]','$_POST[idukuran]','$nama',
	'$_POST[harga]', '$_POST[stok]')");
	
	echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index2.php?halaman=barang2'>";

}
?>