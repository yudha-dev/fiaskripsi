<?php
//panggil koneksi
include '../koneksi/koneksi.php';
//ambil id dari table
$id = $_GET['id'];
//query hapus data
mysqli_query($koneksi, "DELETE FROM keranjang WHERE id_keranjang = '$id'");
header('Location: ' . $_SERVER['HTTP_REFERER']);
