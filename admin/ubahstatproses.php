<div class="row">
    <div class="col-lg-12">
        <h2>UBAH STATUS PROSES</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />

<?php
$ambil=$koneksi->query("SELECT * FROM status_proses WHERE id_statproses='$_GET[id]'");
$pecah=$ambil->fetch_assoc();


?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label> Id Status Proses </label>
		<input type="text" class="form-control" name="idstatproses" value="<?php echo $pecah['id_statproses'];?>">
	</div>
	<div class="form-group">
		<label> Keterangan Status Proses </label>
		<input type="text" class="form-control" name="ketstatproses" value="<?php echo $pecah['ket_statproses'];?>">
	</div>
	<button class="btn btn-primary" name="ubah"> Ubah </button>
</form>

<?php
if(isset($_POST['ubah']))
{
	$koneksi->query("UPDATE status_proses SET id_statproses='$_POST[idstatproses]',
	ket_statproses='$_POST[ketstatproses]' WHERE id_statproses='$_GET[id]'");

echo "<script> alert(' Data Berhasil Diubah');</script>";
echo "<script>location='index.php?halaman=statusproses';</script>";
}

?>