<?php
if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'dashboard':
            require_once "dashboard.php";
            break;
        case 'profil':
            require_once "profil.php";
            break;
        case 'verifikasi':
            require_once "verifikasi.php";
            break;
        case 'kontrak_kerja':
            require_once "kontrak_kerja.php";
            break;
        case 'kontrak_vendor':
            require_once "kontrak_vendor.php";
            break;
        case 'data_pelanggan':
            require_once "data_pelanggan.php";
            break;
        case 'data_kategori':
            require_once "data_kategori.php";
            break;
        case 'data_vendor':
            require_once "data_vendor.php";
            break;
        case 'paket_pernikahan':
            require_once "paket_pernikahan.php";
            break;
        case 'konfirmasi_pembayaran':
            require_once "konfirmasi_pembayaran.php";
            break;
        case 'data_ongkir':
            require_once "data_ongkir.php";
            break;
        case 'jasa_acara':
            require_once "jasa_acara.php";
            break;
    }
} else {
    require_once "home.php";
}
