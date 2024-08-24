<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "awalldecoration_store";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
?>
<?php
$keyword=$_GET["keyword"];

$semuadata=array();
$ambil=$koneksi->query("SELECT barang.*, barang.nama_barang,kategori_barang.nama_kategori, kategori.id_kategori,
				 jenis_barang.nama_jenis, ukuran.ket_ukuran FROM barang, 
				 kategori_barang, jenis_barang, ukuran WHERE barang.id_kategori=kategori_barang.id_kategori AND
				 barang.id_jenis=jenis_barang.id_jenis AND
				 barang.id_ukuran=ukuran.id_ukuran
				 and(nama_barang LIKE '%$keyword%' OR nama_kategori
				 LIKE '%$keyword%' OR nama_jenis LIKE '%$keyword%' OR ket_ukuran LIKE '%$keyword%')
				 ORDER BY barang.nama_barang ASC");
while($pecah=$ambil->fetch_assoc())
{
	$semuadata[]=$pecah;
}	

?>

<!DOCTYPE html>
<html>
<head>
	<title>Pencarian</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<BODY STYLE="BACKGROUND-IMAGE:URL(pencarian.JPG)">
<?php include'menu.php'?>
	<div class="container">
		
		<?php if(empty($semuadata)):?>
			<div class="alert alert-danger">Produk <strong><?php echo $keyword?></strong> tidak ditemukan</div>
		<?php endif?>
		
		
		<div class="row">
		
		
			<?php foreach ($semuadata as $key =>$value):?>
			
			<div class="col-md-3">
				<div class="thumbnail">
					<img src="photo/<?php echo $value["photo"]?>" alt="" class="img-responsive">
					<div class="caption">
						<h3><?php echo $value["nama_barang"];?></h3>
						<h5><?php echo number_format($value['harga'])?></h5>
						<a href="beli.php?id=<?php echo $value["id_barang"];?>" class="btn btn-primary">Beli</a>
						<a href="detail.php?id=<?php echo $value["id_barang"];?>" class="btn btn-default">Detail</a>
					</div>
				</div>
			</div>
			<?php endforeach?>
			
		</div>
	</div>
</body>
</html>