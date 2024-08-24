<div class="row">
    <div class="col-lg-12">
        <h2>TAMBAH JENIS</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> Id Jenis </label>
		<input type="text" class="form-control" name="idjenis">
	</div>
	<div class="form-group">
		<label> Nama Jenis </label>
		<input type="text" class="form-control" name="namajenis">
	</div>
	<button class="btn btn-primary" name="save"> Simpan </button>
</form>
<?php
if (isset ( $_POST['save']))
{
	$koneksi->query("INSERT INTO jenis_barang (id_jenis, nama_jenis) VALUES('$_POST[idjenis]', '$_POST[namajenis]')");
	echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=jenis'>";
}
?>
