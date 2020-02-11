<?php
//ambil file koneksi php
require "../koneksi/koneksi.php";
//jika di klik submit jalankan method post
$username = $_POST['username'];
$password = $_POST['password'];
$nama = ucwords($_POST['nama']);
$alamat = ucwords($_POST['alamat']);
$no_hp = $_POST['no_hp'];
$cek = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE username = '$username'"));
if ($cek > 0) {
    echo "<script>alert('Username sudah terdaftar');
        window.location.href='index.php?page=pendaftaran';
        </script>";
} else {
    $masukan = mysqli_query($koneksi, "INSERT INTO pelanggan (username, password, nama, alamat,  no_hp) VALUES ('$username','$password','$nama','$alamat','$no_hp')");
    echo "<script>alert('Pendaftaran berhasil silahkan login');
        window.location.href='index.php';
        </script>";
}
