<?php
//panggil koneksi
require "../../koneksi/koneksi.php";
// post data dari form
$kategori   = $_POST['kategori'];
$vendor     = $_POST['id_vendor'];
$nama_jasa  = strtoupper($_POST['nama_jasa']);
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
        move_uploaded_file($file_tmp, 'foto_jasa/' . $nama_file);
    }
}
//query ke database
$masukan = mysqli_query($koneksi, "INSERT INTO jasa (id_kategori,id_vendor,nama_jasa,harga,keterangan,foto) VALUES ('$kategori','$vendor','$nama_jasa','$harga','$keterangan','$nama_file')");
header('location:index.php?page=data_jasa');
