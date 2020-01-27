<?php
session_start();
//panggil koneksi
require "../../koneksi/koneksi.php";
$query = mysqli_query($koneksi, "SELECT * FROM vendor WHERE id_vendor ='" . $_SESSION['id_vendor'] . "'");
$data =  mysqli_fetch_array($query);
?>
<?php
//panggil koneksi
require "../../koneksi/koneksi.php";
// post data dari form
    $id_vendor      = $data['id_vendor'];
    $id_kategori    = $_POST['kategori'];
    $keterangan     = $_POST['keterangan'];
    $harga_awal     = preg_replace("/[^0-9]/", "",$_POST['harga']);
    $ppn            = $harga_awal * 0.1;
    $harga          =  $ppn + $harga_awal;

    //query insert ke database
    $masukan = mysqli_query($koneksi, "INSERT INTO jasa (id_vendor, id_kategori , keterangan , harga) VALUES ('$id_vendor','$id_kategori','$keterangan','$harga')");
    header('location:index.php?page=data_jasa');
?>