<?php
session_start();
$id_barang=$_GET["id"];
unset($_SESSION["keranjang"][$id_barang]);

	echo "<script>alert('Produk Berhasil Dihapus dari Keranjang');</script>";
	echo "<script>location='keranjang.php';</script>";


?>