<div class="row">
    <div class="col-lg-12">
        <h2>TAMBAH UKURAN</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />

<form method="post" enctype="multipart/form-data">


	<div class="form-group">
		<label> Id Ukuran </label>
		<input type="text" class="form-control" name="idukuran">
	</div>
	
	<div class="form-group">
		<label> Keterangan Ukuran </label>
		<input type="text" class="form-control" name="ketukuran">
	</div>
	<button class="btn btn-primary" name="save"> Simpan </button>
</form>
<?php
if (isset ( $_POST['save']))
{
	$koneksi->query("INSERT INTO ukuran (id_ukuran, ket_ukuran) VALUES('$_POST[idukuran]', '$_POST[ketukuran]')");
	echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=ukuran'>";
}
?>