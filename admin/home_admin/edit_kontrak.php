<?php
//panggil koneksi
require_once "../../koneksi/koneksi.php";
$id = $_POST['id_keuntungan_ks'];
$nama_kontrak     = $_POST['nama_kon'];
$keterangan      = $_POST['keterangan'];
//Update data kontrak
$query = "UPDATE keuntungan_ks SET nama_kon = '$nama_kontrak', keterangan = '$keterangan' WHERE id_keuntungan_ks='$id'";
mysqli_query($koneksi, $query);
echo "<script>window.location='index.php?page=kontrak_kerja';</script>";
