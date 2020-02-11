<?php
include '../koneksi/koneksi.php';
foreach ($_POST['kode_paket'] as $key => $value) {
    $kode = $value;
    $id = $_POST['id_pelanggan'];
    $ongkir = $_POST['ongkir'];

    $add = mysqli_query($koneksi, "INSERT INTO pemesanan (id_pelanggan,kode_paket,ongkir) VALUES ($id,$kode,$ongkir)");
    header('location:index.php?page=checkout');
}
