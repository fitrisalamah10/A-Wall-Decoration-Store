<?php
$ambil=$koneksi->query("SELECT * FROM lama_kirim WHERE id_lamakirim='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM lama_kirim WHERE id_lamakirim='$_GET[id]' ");


echo "<script> alert(' Data Berhasil Dihapus');</script>";
echo "<script>location='index2.php?halaman=lamakirim2';</script>";
?>