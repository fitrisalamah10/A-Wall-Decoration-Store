<div class="row">
    <div class="col-lg-12">
        <h2>TAMBAH ADMIN</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> Username </label>
		<input type="text" class="form-control" name="username">
	</div>
	<div class="form-group">
		<label> Password </label>
		<input type="text" class="form-control" name="password">
	</div>
	<div class="form-group">
		<label> Level </label>
		<input type="text" class="form-control" name="level">
	</div>


	<button class="btn btn-primary" name="save"> Simpan </button>
</form>
<?php
if (isset ( $_POST['save']))
{
	$koneksi->query("INSERT INTO user (username, password, level) VALUES('$_POST[username]', '$_POST[password]', '$_POST[level]')");
	echo "<div class='alert alert-info'> Data Berhasil Ditambahkan </div>";
	echo "<meta http-equiv='refresh' content='1;url=index2.php?halaman=user'>";
}
?>
