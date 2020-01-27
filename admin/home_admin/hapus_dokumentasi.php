<?php
include '../../koneksi/koneksi.php';
//ambil id dari button
$id = $_GET['id'];
//query hapus kategori catering
mysqli_query($koneksi, "DELETE FROM kategori_dokumentasi WHERE id_dokumentasi = '$id'");
echo "<script>alert('Hapus Data Berhasil');</script>";
echo "<script>window.location='index.php?page=kategori_dokumentasi';</script>";
