<?php
$ambil=$koneksi->query("SELECT * FROM satuan_barang WHERE id_satuan='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM satuan_barang WHERE id_satuan='$_GET[id]' ");


echo "<script> alert(' Data Berhasil Dihapus');</script>";
echo "<script>location='index.php?halaman=satuan';</script>";
?>