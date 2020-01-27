<?php
require "../../koneksi/koneksi.php";
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    //query ke database
    $masukan = mysqli_query($koneksi, "INSERT INTO pelanggan (nama_lengkap, alamat, no_hp) VALUES ('$nama','$alamat', '$no_hp')");
    header('location:index.php?page=data_pelanggan');
