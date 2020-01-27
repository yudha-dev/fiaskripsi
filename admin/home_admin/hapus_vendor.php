<?php
//panggil koneksi
include '../../koneksi/koneksi.php';
//ambil id dari table
$id = $_GET['id'];
//query hapus data
mysqli_query($koneksi,"DELETE FROM vendor WHERE id_vendor = '$id'");
                    echo "<script>alert('Hapus Data Berhasil');</script>";
                    echo "<script>window.location='index.php?page=data_vendor';</script>";
