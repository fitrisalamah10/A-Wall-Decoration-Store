<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "awalldecoration_store";

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
session_start();

$id_faktur=$_GET['id'];
$ambil=$koneksi->query("SELECT *FROM faktur JOIN status_proses ON faktur.id_statproses=status_proses.id_statproses
WHERE id_faktur='$id_faktur'");
$detpem=$ambil->fetch_assoc();

$idpemygbeli=$detpem["username"];
$idpemyglogin=$_SESSION["customer"]["username"];
if ($idpemyglogin!==$idpemygbeli)
{
	echo "<script>alert('Tidak dapat diproses ');</script>";
	echo "<script>location='riwayat.php';</script>";
}
?>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
</head>
<head>
	<title> Penilaian </title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
<div class="container">
    <div class="row">
<BODY STYLE="BACKGROUND-IMAGE:URL(penilaian.JPG)">
<?php include'menu.php'?>
<form method="post">
	<br>
	<br>
	<br>
    <h2>Penilaian Barang</h2>
	<div class="alert alert-info"> <strong>Terimakasih telah berbelanja di toko kami!</strong></div>

    <div class="form-group">
			<label> Silahkan beri penilaian anda ! </label>
			<textarea class="form-control" name="penilaian" placeholder="Berikan Penilaian Anda"></textarea>
		</div>

         <div class="rateyo" id= "rating"
         data-rateyo-rating="4"
         data-rateyo-num-stars="5"
         data-rateyo-score="3">
         </div>

    <span class='result'>0</span>
    <input type="hidden" name="rating">

    </div>

    <button class="btn btn-primary" name="kirim"> Kirim</button>

</form>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

<script>


    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('rating :'+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });

</script>
</body>

</html>
<?php

//jk tombol kirim diklik
if(isset($_POST["kirim"]))
{
	

	$nilai =$_POST["penilaian"];
	$rating =$_POST["rating"];
	$koneksi->query("UPDATE faktur SET penilaian_produk='$nilai', bintang='$rating' WHERE id_faktur='$id_faktur'");			
	//update status pembayaran
	$koneksi->query("UPDATE faktur SET id_statproses='SP6' WHERE id_faktur='$id_faktur'");
	
	echo "<script>alert('Terimakasih sudah memberi penilaian ');</script>";
	echo "<script>location='riwayat.php';</script>";
}



?>
