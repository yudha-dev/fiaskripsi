<?php
require '../koneksi/koneksi.php';
$id_pemesanan = $_POST['id_pemesanan'];
$id_pelanggan = $_POST['id_pelanggan'];
$nomor_rek = $_POST['nomor_rek'];
$nama_rek = $_POST['nama_rek'];
$nama_bank = $_POST['nama_bank'];
$nama_bank_tujuan  = $_POST['checkout_payment_method'];
$jumlah_tf  = preg_replace("/[^0-9]/", "", $_POST['jumlah_tf']);
$tanggal_tf = $_POST['tanggal_tf'];
$foto = $_FILES['bukti_tf']['tmp_name'];    //Query update foto
$foto_name = $_FILES['bukti_tf']['name'];
$acak = rand(1, 99);
$tujuan_foto = $acak . $foto_name;
$tempat_foto = 'bukti_tf/' . $tujuan_foto;
if (!$foto == "") {
    $buat_foto = $tujuan_foto;
    $d = 'bukti_tf/' . $foto;
    @unlink("$d");
    copy($foto, $tempat_foto);
} else {
    $buat_foto = $foto;
}
$insert = mysqli_query($koneksi, "INSERT INTO detail_pemesanan (id_pemesanan,id_pelanggan,nomor_rek,nama_rek,nama_bank,nama_bank_tujuan,jumlah_tf,tanggal_tf,bukti_tf) VALUES ('$id_pemesanan','$id_pelanggan','$nomor_rek','$nama_rek','$nama_bank','$nama_bank_tujuan','$jumlah_tf','$tanggal_tf','$buat_foto')");
$update = mysqli_query($koneksi, "UPDATE pemesanan SET status = 'Pembayaran Diverifikasi' WHERE id_pemesanan = '$id_pemesanan' ");
echo "<script>alert('Pesanan berhasil di proses');
        </script>";
header('location:index.php?page=konfirm_order');
