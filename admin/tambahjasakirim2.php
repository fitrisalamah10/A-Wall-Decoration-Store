<div class="row">
    <div class="col-lg-12">
        <h2>TAMBAH JASA PENGIRIMAN</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />

<form method="post" enctype="multipart/form-data">


	<div class="form-group">
		<label> Id Jasa Kirim </label>
		<input type="text" class="form-control" name="idjasakirim">
	</div>
	
	<div class="form-group">
		<label> Nama Jasa Kirim </label>
		<input type="text" class="form-control" name="namajasakirim">
	</div>
	<button class="btn btn-primary" name="save"> Simpan </button>
</form>
<?php
if (isset ( $_POST['save']))
{
	$koneksi->query("INSERT INTO jasa_kirim (id_jasakirim, nama_jasakirim) VALUES('$_POST[idjasakirim]', '$_POST[namajasakirim]')");
	echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index2.php?halaman=jasakirim2'>";
}
?>