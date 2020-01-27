<?php
    //panggil koneksi
    require_once "../../koneksi/koneksi.php";
    $id = $_POST['id_kat'];
    $nama_kategori   = strtoupper($_POST['nama_kategori']);
    //Update data kategori
    $query = "UPDATE kategori SET nama_kategori = '$nama_kategori' WHERE id_kategori='$id'";
    mysqli_query($koneksi, $query);
    echo "<script>window.location='index.php?page=data_kategori';</script>";
    ?>