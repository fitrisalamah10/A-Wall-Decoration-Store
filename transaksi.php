<?php
session_start();
//mendapatkan id_barang dari url
$id_barang = $_GET['id'];


// jika sudah ada produk itu dikeranjang maka produk itu jumlahnya ditambah 1
if(isset($_SESSION['keranjang'][$id_barang]))
{
	$_SESSION['keranjang'][$id_barang]+=1;
}
if(isset($_SESSION['checkout'][$id_barang]))
{
	$_SESSION['checkout'][$id_barang]=$jumlah;
}
//selain itu(blm ada dikeranjang, maka produk dianggap dibeli 1
else
{
	$_SESSION['keranjang'][$id_barang]=1;
}

//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";


//larikan ke halaman keranjang
echo "<script>alert('Barang telah masuk ke keranjang belanja!');</script>";
echo "<script>location='keranjang.php';</script>";

?>