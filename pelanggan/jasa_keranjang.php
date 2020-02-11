<?php
require '../koneksi/koneksi.php';
$id_pelanggan = $_POST['id_pelanggan'];
$id_jasa = $_POST['id_jasa'];
$harga = $_POST['harga'];
$cek = mysqli_query($koneksi, "SELECT * FROM keranjang WHERE id_pelanggan = $id_pelanggan");
$c = mysqli_fetch_array($cek);
if (empty($c['kode_paket'])) {
    echo "<script>alert('Anda harus memilih paket terlebih dahulu')</script>";
    echo "<script>window.location='index.php?page=paket_pernikahan';</script>";
} else {
    $insert = mysqli_query($koneksi, "INSERT INTO keranjang (id_pelanggan,kode_jasa,harga) VALUES ('$id_pelanggan','$id_jasa','$harga')");
    echo "<script>alert('data berhasil ditambahkan ke keranjang');
    history.go(-1);
        </script>";
}
