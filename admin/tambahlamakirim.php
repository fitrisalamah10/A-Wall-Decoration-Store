<div class="row">
    <div class="col-lg-12">
        <h2>TAMBAH DURASI PENGIRIMAN</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />

<form method="post" enctype="multipart/form-data">


	<div class="form-group">
		<label> Id Lama Kirim </label>
		<input type="text" class="form-control" name="idlamakirim">
	</div>
	
	<div class="form-group">
		<label> Nama Lama Kirim </label>
		<input type="text" class="form-control" name="namalamakirim">
	</div>
	
	<div class="form-group">
		<label> Keterangan Lama Kirim </label>
		<input type="text" class="form-control" name="ketlamakirim">
	</div>
	<button class="btn btn-primary" name="save"> Simpan </button>
</form>
<?php
if (isset ( $_POST['save']))
{
	$koneksi->query("INSERT INTO lama_kirim (id_lamakirim, nama_lamakirim,ket_lamakirim) VALUES('$_POST[idlamakirim]','$_POST[namalamakirim]','$_POST[ketlamakirim]')");
	echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=lamakirim'>";
}
?>