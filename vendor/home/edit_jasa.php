<?php
    //panggil koneksi
    require_once "../../koneksi/koneksi.php";
    $id             = $_POST['id_jasa'];
    $id_kategori    = $_POST['kategori'];
    $keterangan     = $_POST['keterangan'];
    $harga_awal     = preg_replace("/[^0-9]/", "",$_POST['harga']);
    $ppn            = $harga_awal * 0.1;
    $harga          =  $ppn + $harga_awal;
    //Update data kategori
    $query = "UPDATE jasa SET id_kategori = '$id_kategori', keterangan = '$keterangan', harga = '$harga' WHERE id_jasa='$id'";
    mysqli_query($koneksi, $query);
    echo "<script>window.location='index.php?page=data_jasa';</script>";
    ?>