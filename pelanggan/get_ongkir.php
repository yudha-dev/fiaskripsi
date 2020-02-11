<?php
include '../koneksi/koneksi.php';
$id  = $_POST['ongkir'];
$data = "";
if (!empty($id)) {
    $q = mysqli_query($koneksi, "SELECT * FROM ongkir WHERE ongkos_kirim = '$id'");
    while ($hasile = mysqli_fetch_array($q)) {
        $data .= (number_format($hasile['ongkos_kirim'], 0, ".", "."));
    }
    echo 'Rp. ', $data;
} else {
    echo 'Rp. ', "0";
}
