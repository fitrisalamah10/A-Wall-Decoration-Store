<?php
$ambil=$koneksi->query("SELECT * FROM ukuran WHERE id_ukuran='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM ukuran WHERE id_ukuran='$_GET[id]' ");


echo "<script> alert(' Data Berhasil Dihapus');</script>";
echo "<script>location='index2.php?halaman=ukuran2';</script>";
?>