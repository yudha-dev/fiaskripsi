<?php
//panggil koneksi
require "../../koneksi/koneksi.php";
// post data dari form
$nama_kontrak     = $_POST['nama_kon'];
$keterangan      = $_POST['keterangan'];
//query ke database
$masukan = mysqli_query($koneksi, "INSERT INTO keuntungan_ks (nama_kon,keterangan) VALUES ('$nama_kontrak','$keterangan')");
header('location:index.php?page=kontrak_kerja');
