<?php
$ambil=$koneksi->query("SELECT * FROM kategori_barang WHERE id_kategori='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM kategori_barang WHERE id_kategori='$_GET[id]' ");


echo "<script> alert(' Data Berhasil Dihapus');</script>";
echo "<script>location='index2.php?halaman=kategori2';</script>";
?>