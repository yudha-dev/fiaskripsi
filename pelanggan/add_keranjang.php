<?php
require '../koneksi/koneksi.php';
$id_pelanggan = $_POST['id_pelanggan'];
$kode_paket = $_POST['kode_paket'];
$tanggal = $_POST['tanggal'];
$harga = $_POST['harga'];
$cek = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(*) FROM pemesanan WHERE tanggal = '$tanggal'"));
if ($cek[0] >= "2") {
    echo "<script>alert('Maaf tanggal tersebut sudah penuh');
    history.go(-1);
        </script>";
} else {
    $insert = mysqli_query($koneksi, "INSERT INTO keranjang (id_pelanggan,kode_paket,tanggal,harga) VALUES ('$id_pelanggan','$kode_paket','$tanggal','$harga')");
    echo "<script>alert('data berhasil ditambahkan ke keranjang');
    history.go(-1);
        </script>";
}
