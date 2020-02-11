<?php
include "../../koneksi/koneksi.php";
$q = "SELECT max(kode_paket) as maxKode FROM paket_pernikahan";
$hasil = mysqli_query($koneksi, $q);
$dt = mysqli_fetch_array($hasil);
if ($dt['maxKode'] == NULL) {
    $kode = '1';
} else {
    $kode = $dt['maxKode'] + 1;
}
$cek_nama = $_POST['nama_paket'];
$cek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM paket_pernikahan WHERE nama_paket = '$cek_nama'"));
if ($cek > 0) {
    echo "<script>alert('Nama paket sudah terdaftar');</script>";
} else {

    foreach ($_POST['jasa'] as $key => $value) {
        $jasa = $value;
        $nama_paket = strtoupper($_POST['nama_paket']);

        $insert = mysqli_query($koneksi, "INSERT INTO paket_pernikahan VALUES (NULL, '$jasa', '$kode', '$nama_paket')");
    }
}
