<?php
//panggil koneksi
require "../../koneksi/koneksi.php";
// post data dari form
$nama_paket         = strtoupper($_POST['nama_paket']);
$catering           = $_POST['catering'];
$dekorasi           = $_POST['dekorasi'];
$dokumentasi        = $_POST['dokumentasi'];
$hiburan            = $_POST['hiburan'];
$makeup             = $_POST['makeup'];
$mc                 = $_POST['mc'];
//masukan harga per categori
$harga_cat          = $_POST['harga_catering'];
$harga_dek          = $_POST['harga_dekorasi'];
$harga_dok          = $_POST['harga_dokumentasi'];
$harga_hib          = $_POST['harga_hiburan'];
$harga_mak          = $_POST['harga_makeup'];
$harga_mc           = $_POST['harga_mc'];
//jumlahkan semua harga dalam satu variable
$ttl_hrg = $harga_cat + $harga_dek + $harga_dok + $harga_hib + $harga_mak + $harga_mc;
//query ke database
$masukan = mysqli_query($koneksi, "INSERT INTO paket_pernikahan (id_catering,id_dekorasi,id_dokumentasi,id_hiburan,id_makeup,id_mc,nama_paket,harga_paket) VALUES ('$catering','$dekorasi','$dokumentasi','$hiburan','$makeup','$mc','$nama_paket','$ttl_hrg')");
header('location:index.php?page=paket_pernikahan');
