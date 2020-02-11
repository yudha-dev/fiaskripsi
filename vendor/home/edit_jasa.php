<?php
//panggil koneksi
require_once "../../koneksi/koneksi.php";
// post data dari form
$id             = $_POST['id_jasa'];
$id_kategori    = $_POST['kategori'];
$nama_jasa      = strtoupper($_POST['nama_jasa']);
$harga          = preg_replace("/[^0-9]/", "", $_POST['harga']);
$keterangan     = $_POST['keterangan'];
//query input gambar
$x              = $_POST['foto_lama'];
$foto           = $_FILES['foto']['tmp_name'];    //Query update foto
$foto_name      = $_FILES['foto']['name'];
$acak           = rand(1, 99);
$tujuan_foto    = $acak . $foto_name;
$tempat_foto    = 'foto_jasa/' . $tujuan_foto;
if (!$foto == "") {
    $buat_foto  = $tujuan_foto;
    $d          = 'foto_jasa/' . $foto;
    @unlink("$d");
    copy($foto, $tempat_foto);
} else {
    $buat_foto = $x;
}
//Update data kategori
$query = "UPDATE jasa SET id_kategori = '$id_kategori', nama_jasa = '$nama_jasa', harga = '$harga',  keterangan = '$keterangan', foto = '$buat_foto' WHERE id_jasa ='$id' ";
mysqli_query($koneksi, $query);
echo "<script>window.location='index.php?page=data_jasa';</script>";
