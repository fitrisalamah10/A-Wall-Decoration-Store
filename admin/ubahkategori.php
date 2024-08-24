<div class="row">
    <div class="col-lg-12">
        <h2>UBAH KATEGORI</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />

<?php
$ambil=$koneksi->query("SELECT * FROM kategori_barang WHERE id_kategori='$_GET[id]'");
$pecah=$ambil->fetch_assoc();


?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> Id Kategori </label>
		<input type="text" class="form-control" name="idkategori" value="<?php echo $pecah['id_kategori'];?>">
	</div>
	<div class="form-group">
		<label> Nama Kategori  </label>
		<input type="text" class="form-control" name="namakategori" value="<?php echo $pecah['nama_kategori'];?>">
	</div>
	<button class="btn btn-primary" name="ubah"> Ubah </button>
</form>

<?php
if(isset($_POST['ubah']))
{
	$koneksi->query("UPDATE kategori_barang SET id_kategori='$_POST[idkategori]',
	nama_kategori='$_POST[namakategori]' WHERE id_kategori='$_GET[id]'");

echo "<script> alert(' Data Berhasil Diubah');</script>";
echo "<script>location='index.php?halaman=kategori';</script>";
}

?>