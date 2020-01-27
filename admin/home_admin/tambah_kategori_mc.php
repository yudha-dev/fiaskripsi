<?php
//panggil koneksi
require "../../koneksi/koneksi.php";
// post data dari form
$vendor     = $_POST['vendor'];
$harga      = preg_replace("/[^0-9]/", "", $_POST['harga']);
$keterangan = ucwords($_POST['keterangan']);
//query input gambar
$ekstensi_diperbolehkan    = array('png', 'jpg', 'jpeg');
$nama_file = $_FILES['foto_mc']['name'];
$x  = explode('.', $nama_file);
$ekstensi = strtolower(end($x));
$ukuran    = $_FILES['foto_mc']['size'];
$file_tmp = $_FILES['foto_mc']['tmp_name'];

if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    if ($ukuran < 1044070) {
        move_uploaded_file($file_tmp, 'foto_kategori/foto_mc/' . $nama_file);
    }
}
//query ke database
$masukan = mysqli_query($koneksi, "INSERT INTO kategori_mc (id_vendor,harga,ket,foto_mc) VALUES ('$vendor','$harga','$keterangan','$nama_file')");
header('location:index.php?page=kategori_mc');
