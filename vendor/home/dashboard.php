<?php
include '../../koneksi/koneksi.php';
$data = mysqli_query($koneksi, "SELECT * FROM kontrak_kerja WHERE id_vendor = '" . $_SESSION['id_vendor'] . "'");
$cek = mysqli_num_rows($data);
if ($cek > 0) {
    $data = mysqli_fetch_assoc($data);
    if ($data == true) {
        //alihkan ke folder vendor
        echo "<script>window.location='?page=kontrak_kerja';</script>";
    }
} else {
    //jika data salah
    echo "<script>window.location='index.php?page=bb';</script>";
}
