<?php
$ambil=$koneksi->query("SELECT * FROM pengiriman WHERE id_pengiriman='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM pengiriman WHERE id_pengiriman='$_GET[id]' ");


echo "<script> alert(' Data Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=pengiriman';</script>";
?>