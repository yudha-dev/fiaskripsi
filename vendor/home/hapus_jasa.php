<?php
//panggil koneksi
include '../../koneksi/koneksi.php';
//ambil id dari table
$id = $_GET['id'];
//query hapus data
mysqli_query($koneksi,"DELETE FROM jasa WHERE id_jasa = '$id'");
                    echo "<script>alert('Hapus Data Berhasil');</script>";
                    echo "<script>window.location='index.php?page=data_jasa';</script>";
?>