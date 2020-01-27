<?php
include '../../koneksi/koneksi.php';

//ambil id dari data verifikasi
$id = isset($_GET['id']) ? $_GET['id'] : 'id_vendor';
//update database dari table vendor dan set menjadi aktif = 1
$update = mysqli_query($koneksi, "UPDATE vendor SET aktif = 1 WHERE id_vendor = $id ");
//query select untuk hit username dan password ke sms gateway
$new = mysqli_query($koneksi, "SELECT * FROM vendor WHERE id_vendor = $id");
$d = mysqli_fetch_array($new);
$nama = $d['username'];
$password = $d['password'];
$no_hp = $d['no_hp'];
//api sms gateway
$fields_string  =   "";
$fields     =   array(
    'api_key'       =>  'ed1c17f2',
    'api_secret'    =>  'V6uC7Jo40qsc9NWS',
    'to'            =>  $no_hp,
    'from'          =>  "BST PROJECT",
    'text'          =>  "Selamat pendaftaran anda berhasil di verifikasi silahkan login di BST Vendor dengan USERNAME = $nama dan PASSWORD = $password "
);
$url        =   "https://rest.nexmo.com/sms/json";

//url-ify the data for the POST
foreach ($fields as $key => $value) {
    $fields_string .= $key . '=' . $value . '&';
}
rtrim($fields_string, '&');

//open curl
$ch = curl_init();

//set urll curl dan post data
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, count($fields));
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_exec($ch);
//tutup connection
curl_close($ch);
//alihkan page saat selesai proses
echo "<script>alert('Konfirmasi pendaftaran berhasil');</script>";
//redirect halaman
echo "<script>window.location='index.php?page=verifikasi';</script>";
