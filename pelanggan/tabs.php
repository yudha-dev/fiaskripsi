<?php
include '../koneksi/koneksi.php';
$categori = mysqli_query($koneksi, "SELECT paket_pernikahan.id_pp,paket_pernikahan.id_jasa,paket_pernikahan.kode_paket,jasa.id_jasa,jasa.id_vendor,jasa.id_kategori,kategori.id_kategori,kategori.nama_kategori,jasa.nama_jasa,jasa.harga,vendor.id_vendor,vendor.nama_vendor FROM paket_pernikahan INNER JOIN jasa ON paket_pernikahan.id_jasa = jasa.id_jasa INNER JOIN vendor ON jasa.id_vendor = vendor.id_vendor INNER JOIN kategori ON jasa.id_kategori = kategori.id_kategori WHERE paket_pernikahan.kode_paket = $id");
$active_class = 0;
$category_html = '';
$keterangan_html = '';
while ($row = mysqli_fetch_assoc($categori)) {
    $current_tab = "";
    $current_content = "";
    if (!$active_class) {
        $active_class = 1;
        $current_tab = '--active';
        $current_content = 'in active';
    }
    $category_html .= ' <li class="product-tabs__item product-tabs__item' . $current_tab . '"><a href="#' . $row["id_kategori"] . '">' . $row["nama_kategori"] . '</a></li>';
    $keterangan_html .= '<div id=" ' . $row["id_kategori"] . ' " class="product-tabs__pane' . $current_content . '" >';
    $sql = mysqli_query($koneksi, "SELECT * FROM jasa WHERE id_kategori =" . $row["id_kategori"]);
    if (!mysqli_num_rows($sql)) {
        $keterangan_html .= '<br> Data tidak ada';
    }
    while ($keterangan = mysqli_fetch_assoc($sql)) {
        $keterangan_html .= '<br>';
        $keterangan_html .= '<h6>' . $keterangan["keterangan"] . '</h6>';
        $keterangan_html .= '</div>';
    }
}
