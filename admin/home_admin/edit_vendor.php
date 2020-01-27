<?php
//panggil koneksi
require_once "../../koneksi/koneksi.php";
$id = $_POST['id_vendor'];
$username      = ucwords($_POST['username']);
$nama_vendor   = ucwords($_POST['nama_vendor']);
$alamat        = ucwords($_POST['alamat']);
$no_hp         = $_POST['no_hp'];
//Update data vendor
$query = "UPDATE vendor SET username = '$username', nama_vendor = '$nama_vendor', alamat = '$alamat', no_hp = '$no_hp' WHERE id_vendor='$id'";
mysqli_query($koneksi, $query);
echo "<script>window.location='index.php?page=data_vendor';</script>";
