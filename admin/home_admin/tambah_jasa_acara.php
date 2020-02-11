<?php
//panggil koneksi
require "../../koneksi/koneksi.php";
// post data dari form
$nama_jasa   = $_POST['nama_jasa'];
$harga      = preg_replace("/[^0-9]/", "", $_POST['harga']);
$keterangan = $_POST['keterangan'];
//query input gambar
$ekstensi_diperbolehkan    = array('png', 'jpg', 'jpeg');
$nama_file = $_FILES['foto']['name'];
$x  = explode('.', $nama_file);
$ekstensi = strtolower(end($x));
$ukuran    = $_FILES['foto']['size'];
$file_tmp = $_FILES['foto']['tmp_name'];

if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    if ($ukuran < 1044070) {
        move_uploaded_file($file_tmp, 'foto_jasa_acara/' . $nama_file);
    }
}
//query ke database
$masukan = mysqli_query($koneksi, "INSERT INTO jasa_acara (nama_jasa_acara,harga,ket,foto) VALUES ('$nama_jasa','$harga','$keterangan','$nama_file')");
header('location:index.php?page=jasa_acara');
