<?php
$ambil=$koneksi->query("SELECT * FROM status_bayar WHERE id_statbayar='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM status_bayar WHERE id_statbayar='$_GET[id]' ");


echo "<script> alert(' Data Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=statusbayar';</script>";
?>