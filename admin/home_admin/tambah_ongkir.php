<?php
//panggil koneksi
require "../../koneksi/koneksi.php";
// post data dari form
$nama_kota  = strtoupper($_POST['nama_kota']);
$ongkos_kirim      = preg_replace("/[^0-9]/", "", $_POST['ongkos_kirim']);
//query ke database
$masukan = mysqli_query($koneksi, "INSERT INTO ongkir (nama_kota,ongkos_kirim) VALUES ('$nama_kota','$ongkos_kirim')");
header('location:index.php?page=data_ongkir');
