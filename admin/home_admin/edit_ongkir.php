<?php
//panggil koneksi
require_once "../../koneksi/koneksi.php";
// post data dari form
$id             = $_POST['id_ongkir'];
$nama_kota      = strtoupper($_POST['nama_kota']);
$ongkos_kirim          = preg_replace("/[^0-9]/", "", $_POST['ongkos_kirim']);
//Update data kategori
$query = "UPDATE ongkir SET nama_kota = '$nama_kota', ongkos_kirim = '$ongkos_kirim' WHERE id_ongkir ='$id' ";
mysqli_query($koneksi, $query);
echo "<script>window.location='index.php?page=data_ongkir';</script>";
