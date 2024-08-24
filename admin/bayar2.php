<div class="row">
    <div class="col-lg-12">
        <h2>DETAIL PEMBAYARAN</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />

<?php

$id_faktur=$_GET['id'];

//mengambildata pmbyrn brdsrkan idfaktur
$ambil=$koneksi->query("SELECT * FROM faktur  
JOIN customer ON faktur.username=customer.username 
		JOIN pembayaran ON faktur.id_bayar=pembayaran.id_bayar JOIN status_bayar ON faktur.id_statbayar=status_bayar.id_statbayar
		JOIN status_proses ON faktur.id_statproses=status_proses.id_statproses WHERE id_faktur='$id_faktur' ");
$detail = $ambil->fetch_assoc();


?>

<table class="table table-bordered" background="img.jpg">
<div class="row">
	<div class="col-md-6"></div>
		
			<tr>
				<td><strong>Nama</strong></td>
				<td><strong>Id Faktur </strong></td>
				<td><strong>Pembayaran </strong></td>
				<td><strong>Jumlah </td>
				<td><strong>Bukti Pembayaran </td>
			</tr>			
			<tr>
				<td><?php echo $detail['nama_customer'];?></td>
				<td><?php echo $detail['id_faktur'];?></td>
				<td><?php echo $detail['nama_bayar'];?></td>
				<td><?php echo number_format($detail['total']);?></td>
<td><img src="../bukti_pembayaran/<?php echo $detail['bukti_pembayaran'];?>" width="200" class="img-responsive"></td>
			</tr>
		
</div>
</table>

<form method="post">
	<div class = "form-group">
	
		<div class="form-group">
		<label> No Resi </label>
		<input type="text" class="form-control" name="noresi">
	</div>
	<div class = "form-group">
		<label> Status Pembelian </label>
		<select class="form-control" name="status">
			<option value="">Pilih Status</option>
			<option value="SP2">Barang Dikemas</option>
			<option value="SP3">Barang Dikirim</option>
			<option value="SP4">Batal</option>
		</select>
	</div>
		<button class="btn btn-primary" name="proses">Proses</button>
</form>
<?php

if(isset($_POST["proses"]))
{
	$status=$_POST["status"];
	$noresi=$_POST["noresi"];
	$koneksi->query(" UPDATE faktur SET no_resi='$noresi', id_statproses='$status' WHERE id_faktur='$id_faktur'");
	
	echo "<script>alert('Status Pembelian Diperbarui');</script>";
	echo "<script>location='index2.php?halaman=faktur2';</script>";
}

?>