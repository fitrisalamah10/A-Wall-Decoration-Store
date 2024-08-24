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


<?php 
$semuadata=array();
if(isset($_POST["lihat"]))
{
	
	$status=$_POST["status"];
	$statuss=$_POST["statuss"];
	$ambil=$koneksi->query("SELECT*FROM faktur
							Join status_proses on faktur.id_statproses=status_proses.id_statproses 
							Join status_bayar on faktur.id_statbayar=status_bayar.id_statbayar
							Join pembayaran on faktur.id_bayar=pembayaran.id_bayar
							WHERE ket_statproses='$status' AND ket_statbayar='$statuss'");
	while($pecah = $ambil->fetch_assoc())
	{
		$semuadata[]=$pecah;
	}
}



?>


<table class="table table-bordered"background="img.jpg">
	<thead>
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
		<?php foreach ($semuadata as $key =>$value):?>
		<tr>
			<td><?php echo $key+1;?></td>
			<td> <?php echo $value['id_faktur']; ?></td>
			<td> <?php echo $value['username']; ?> </td>
			<td> <?php echo $value['id_pengiriman']; ?></td>
			<td><?php echo $value['tgl_beli']; ?></td>
			<td><?php echo $value['nama_bayar']; ?></td>
			<td><?php echo $value['ket_statbayar']; ?></td>
			<td><?php echo $value['ket_statproses']; ?></td>
			<td> Rp.<?php echo number_format($value['total']); ?></td>
			<td> 
				<a href="index.php?halaman=hapusfaktur&id=<?php echo $value['id_faktur'];?>" class="btn-danger btn" >Hapus</a>
				<a href="index.php?halaman=ubahfaktur&id=<?php echo $value['id_faktur'];?>" class="btn btn-warning"> Ubah </a>
				<a href="index.php?halaman=detail&id=<?php echo $value['id_faktur']?>" class="btn btn-info" >Detail</a>
				
				<?php if($value['ket_statproses']=="Selesai"  ):?>
				<a href="index.php?halaman=penilaian&id=<?php echo $value['id_faktur']?>" class="btn btn-primary" >Penilaian</a>
				<?php endif?>
				
				<?php if($value['ket_statbayar']!=="Belum Dibayar"):?>
				<a href="index.php?halaman=bayar&id=<?php echo $value['id_faktur']?>
				" class="btn btn-success"> Lihat Pembayaran</a>
				<?php endif?>
			
		</tr>
		<?php endforeach ?>
	</tbody>
	
</table>	

