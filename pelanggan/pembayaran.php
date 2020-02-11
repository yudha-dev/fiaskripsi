<?php
require '../koneksi/koneksi.php';
$id_keranjang = $_POST['id_keranjang'];
$id_pesan = $_POST['id_pemesanan'];
$id_pelanggan = $_POST['id_pelanggan'];
$kode_paket = $_POST['kode_paket'];
$harga = $_POST['total_harga'];
$tanggal = $_POST['tanggal'];
$metode  = $_POST['checkout_payment_method'];
$update = mysqli_query($koneksi, "UPDATE pemesanan SET kode_paket = '$kode_paket', total_harga = '$harga', tanggal = '$tanggal', metode_pembayaran = '$metode', status = 'Belum Dibayar' WHERE id_pemesanan = '$id_pesan'");
$hapus = mysqli_query($koneksi, "DELETE FROM keranjang WHERE id_keranjang = '$id_keranjang'");
echo "<script>alert('Pesanan berhasil di proses');
        </script>";
header('location:index.php?page=konfirm_order');
