<?php
//panggil koneksi
require "../../koneksi/koneksi.php";
// post data dari form
$id_vendor      = $_POST['id_vendor'];
$tanggal        = $_POST['tanggal'];
$keuntungan     = $_POST['keuntungan'];

//query insert ke database
$masukan = mysqli_query($koneksi, "INSERT INTO kontrak_kerja (id_vendor, tanggal , keuntungan) VALUES ('$id_vendor','$tanggal','$keuntungan')");
header('location:index.php?page=data_jasa');
