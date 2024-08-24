<div class="row">
    <div class="col-lg-12">
        <h2>TAMBAH SATUAN</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />

<form method="post" enctype="multipart/form-data">


	<div class="form-group">
		<label> Id Satuan </label>
		<input type="text" class="form-control" name="idsatuan">
	</div>
	
	<div class="form-group">
		<label> Keterangan Satuan </label>
		<input type="text" class="form-control" name="ketsatuan">
	</div>
	
	<button class="btn btn-primary" name="save"> Simpan </button>
</form>
<?php
if (isset ( $_POST['save']))
{
	$koneksi->query("INSERT INTO satuan_barang (id_satuan, ket_satuan) VALUES('$_POST[idsatuan]', '$_POST[ketsatuan]')");
	echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=satuan'>";
}
?>