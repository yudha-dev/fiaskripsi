<?php
$kode = $d['kode_paket'];
include '../koneksi/koneksi.php';
//query join paket dan semua kategori dan vendor
$a = mysqli_query($koneksi, "SELECT paket_pernikahan.id_pp,paket_pernikahan.id_jasa,paket_pernikahan.kode_paket,jasa.id_jasa,jasa.id_vendor,jasa.nama_jasa,jasa.harga,vendor.id_vendor,vendor.nama_vendor FROM paket_pernikahan INNER JOIN jasa ON paket_pernikahan.id_jasa = jasa.id_jasa INNER JOIN vendor ON jasa.id_vendor = vendor.id_vendor WHERE paket_pernikahan.kode_paket = $kode ORDER BY jasa.harga ASC");
while ($b = mysqli_fetch_array($a)) {
?>
    <li><?= $b['nama_jasa'] ?></li>
<?php } ?>