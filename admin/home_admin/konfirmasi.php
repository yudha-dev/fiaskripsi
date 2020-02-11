<?php
include '../../koneksi/koneksi.php';
$id = isset($_GET['id']) ? $_GET['id'] : 'id_pemesanan';
$query = "UPDATE pemesanan SET status= 'Pembayaran Sukses' WHERE id_pemesanan='$id'";
mysqli_query($koneksi, $query);
