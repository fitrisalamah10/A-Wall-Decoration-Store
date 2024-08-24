<?php
$ambil=$koneksi->query("SELECT * FROM jenis_barang WHERE id_jenis='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM jenis_barang WHERE id_jenis='$_GET[id]' ");


echo "<script> alert(' Data Berhasil Dihapus');</script>";
echo "<script>location='index2.php?halaman=jenis2';</script>";
?>