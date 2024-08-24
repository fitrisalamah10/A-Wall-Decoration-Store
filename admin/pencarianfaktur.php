<?php

if(isset($_POST['cari']))
{
	$_SESSION['session_pencarian'] = $_POST["keyword"];
	$keyword=$_SESSION['session_pencarian'];
}
else
{
	$keyword=$_SESSION['session_pencarian'];
}

$query=mysqli_query($koneksi, "SELECT * FROM faktur  WHERE ket_statproses LIKE '%$keyword%' OR ket_statbayar LIKE '%$keyword%' OR id_faktur LIKE '%$keyword%'")
?>

<div class="row">
    <div class="col-lg-12">
        <h2>DATA FAKTUR</h2>   
</div>
    </div>              
<!-- /. ROW  -->
<hr />
<form class="form-horizontal" role="search" method="post" action="index.php?halaman=pencarianfaktur">
		<div class="col-md-3">
		<div class="form-group">
				<input type="text" class="form-control" name="keyword" placeholder="Masukkan Username" autofocus autocomplete="off">
			</div>
		</div>
		<div class="col-md-2">
			<label></label>
			<button class="btn btn-primary" name="cari">Cari</button>
		</div>
</form> 

<form method="post" action="index.php?halaman=searchfaktur">
	<div >
		
		<div class="col-md-3">
			<div class="form-group">
				<select class="form-control" name="status">
					<option value=" " >Pilih Status Proses</option>
					<option value="Menunggu Pembayaran" >Menunggu Pembayaran</option>
					<option value="Barang Dikemas" >Barang Dikemas</option>
					<option value="Barang Dikirim" >Barang Dikirim</option>
					<option value="Batal" >Batal</option>
					<option value="Barang Diterima" >Barang Diterima</option>
					<option value="Selesai" >Selesai</option>
					<option value="Retur Barang" >Retur Barang</option>
					<option value="Retur Barang diproses" >Retur Barang diproses</option>
				</select>
			</div>
			</div>
			
			<div class="col-md-3">
				<select class="form-control" name="statuss">
					<option value=" " >Pilih Status Bayar</option>
					<option value="Sudah Kirim Pembayaran" >Sudah Kirim Pembayaran</option>
					<option value="Belum Dibayar" >Belum Dibayar</option>
					
				</select>
			</div>
			
		
	
			<button class="btn btn-primary" name="lihat">Lihat</button>
		
</form>

<table class="table table-bordered" background="img.jpg">
	<thead>
		<tr>
			<th> No. </th>
			<th> Id Faktur </th>
			<th> Username </th>
			<th> Id Pengiriman </th>
			<th> Tanggal </th>
			<th> Pembayaran </th>
			<th> Status bayar </th>
			<th> Status Proses </th>
			<th> Total Bayar </th>
			<th> Aksi </th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;?>
		<?php $ambil=$koneksi->query("SELECT*FROM faktur JOIN customer ON faktur.username=customer.username 
		JOIN pembayaran ON faktur.id_bayar=pembayaran.id_bayar JOIN status_bayar ON faktur.id_statbayar=status_bayar.id_statbayar
		JOIN status_proses ON faktur.id_statproses=status_proses.id_statproses 
		WHERE ket_statproses LIKE '%$keyword%' OR ket_statbayar LIKE '%$keyword%' OR id_faktur LIKE '%$keyword%'");?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td> <?php echo $pecah['id_faktur']; ?></td>
			<td> <?php echo $pecah['username']; ?> </td>
			<td> <?php echo $pecah['id_pengiriman']; ?></td>
			<td><?php echo $pecah['tgl_beli']; ?></td>
			<td><?php echo $pecah['nama_bayar']; ?></td>
			<td><?php echo $pecah['ket_statbayar']; ?></td>
			<td><?php echo $pecah['ket_statproses']; ?></td>
			<td> Rp.<?php echo number_format($pecah['total']); ?></td>
			<td> 
				<a href="index.php?halaman=hapusfaktur&id=<?php echo $pecah['id_faktur'];?>" class="btn-danger btn" >Hapus</a>
				<a href="index.php?halaman=ubahfaktur&id=<?php echo $pecah['id_faktur'];?>" class="btn btn-warning"> Ubah </a>
				<a href="index.php?halaman=detail&id=<?php echo $pecah['id_faktur']?>" class="btn btn-info" >Detail</a>
				
				<?php if($pecah['ket_statproses']=="Selesai"  ):?>
				<a href="index.php?halaman=penilaian&id=<?php echo $pecah['id_faktur']?>" class="btn btn-primary" >Penilaian</a>
				<?php endif?>
				
				<?php if($pecah['ket_statbayar']!=="Belum Dibayar"):?>
				<a href="index.php?halaman=bayar&id=<?php echo $pecah['id_faktur']?>
				" class="btn btn-success"> Lihat Pembayaran</a>
				<?php endif?>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>