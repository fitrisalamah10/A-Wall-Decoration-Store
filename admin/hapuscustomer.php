<?php
$ambil=$koneksi->query("SELECT * FROM customer WHERE username='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM customer WHERE username='$_GET[id]' ");


echo "<script> alert(' Data Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=customer';</script>";
?>