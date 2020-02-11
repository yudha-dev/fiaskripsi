<?php
//panggil koneksi
require "../../koneksi/koneksi.php";
// post data dari form
$nama_kategori = strtoupper($_POST['nama_kategori']);
//query ke database
$masukan = mysqli_query($koneksi, "INSERT INTO kategori (nama_kategori) VALUES ('$nama_kategori')");
header('location:index.php?page=data_kategori');
