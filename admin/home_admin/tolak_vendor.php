<?php
include '../../koneksi/koneksi.php';

//ambil id dari data verifikasi
$id = isset($_GET['id']) ? $_GET['id'] : 'id_vendor';
//query select untuk hit username dan password ke sms gateway
$new = mysqli_query($koneksi, "SELECT * FROM vendor WHERE id_vendor = $id");
$d = mysqli_fetch_array($new);
$nama = $d['nama_vendor'];
$no_hp = $d['no_hp'];
//api sms gateway
$fields_string  =   "";
$fields     =   array(
    'api_key'       =>  'ed1c17f2',
    'api_secret'    =>  'V6uC7Jo40qsc9NWS',
    'to'            =>  $no_hp,
    'from'          =>  "BST PROJECT",
    'text'          =>  "Mohon maaf vendor $nama belum bisa kami terima,silahkan melakukan pendaftaran ulang"
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
//hapus dari database
$update = mysqli_query($koneksi, "DELETE FROM vendor WHERE id_vendor = '$id'");
//alihkan page saat selesai proses
echo "<script>alert('Tolak pendaftaran berhasil');</script>";
//redirect halaman
echo "<script>window.location='index.php?page=verifikasi';</script>";
