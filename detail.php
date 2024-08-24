<?php $koneksi=new mysqli("localhost","root","","awalldecoration_store");
  session_start();
  
 
 $id_barang=$_GET["id"];


$ambildata= $koneksi->query("SELECT * FROM barang JOIN satuan_barang WHERE id_barang='$id_barang' AND barang.id_satuan=satuan_barang.id_satuan");
$detail = $ambildata->fetch_assoc();

 
$ambilldata= $koneksi->query("SELECT * FROM barang JOIN ukuran WHERE id_barang='$id_barang' AND barang.id_ukuran=ukuran.id_ukuran");
$detaill = $ambilldata->fetch_assoc();



?>
 <!DOCTYPE html>
 <html>
 <head>
	<title> Detail Produk </title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>

<br></br>
<BODY STYLE="BACKGROUND-IMAGE:URL(detail.JPG)">

<?php include'menu.php'?>

<section class="kontent">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<img src="photo/<?php echo $detail["photo"];?>" class="img-responsive" >
			</div>
			<div class="col-md-6">
				<h2><?php echo $detail["nama_barang"];?></h2>
				<h4> Ukuran: <?php echo $detaill["ket_ukuran"];?></h4>
				<h4> Harga : Rp. <?php echo number_format($detail["harga"]);?>/<?php echo $detail['ket_satuan'];?></h4>
				
				<h5> Stok : <?php echo $detail["stok"];?></h4>
			<form method="post">
				<div class="form-group">
					<div class="input-group">
						<input type="number" min="1" class="form-control" name="jumlah" max="<?php echo $detail["stok"]?>">
						<div class="input-group-btn">
							<button class="btn btn-primary" name="beli">Beli</button>
						</div>
					</div>
				</div>
			</form>
			
			<?php 
			
			if (isset($_POST["beli"]))
			{
				$jumlah =$_POST["jumlah"];
				//masukkan dikeranjang
				$_SESSION["keranjang"][$id_barang]=$jumlah;
				
				echo "<script>alert('Produk telah masuk ke keranjang belanja');</script>";
				echo "<script>location='keranjang.php';</script>";
			}
			

			
			?>
			</div>
		</div>
	</div>
</section>

</body>
 </html>