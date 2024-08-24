<div class="row">
    <div class="col-lg-12">
        <h2>TAMBAH KATEGORI</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />

<form method="post" enctype="multipart/form-data">


	<div class="form-group">
		<label> Id Kategori </label>
		<input type="text" class="form-control" name="idkategori">
	</div>
	
	<div class="form-group">
		<label> Nama Kategori </label>
		<input type="text" class="form-control" name="namakategori">
	</div>
	<button class="btn btn-primary" name="save"> Simpan </button>
</form>
<?php
if (isset ( $_POST['save']))
{
	$koneksi->query("INSERT INTO kategori_barang (id_kategori, nama_kategori) VALUES('$_POST[idkategori]', '$_POST[namakategori]')");
	echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index2.php?halaman=kategori2'>";
}
?>