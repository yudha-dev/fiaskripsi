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
        case 'data_kontrak_vendor':
            require_once "data_kontrak_vendor.php";
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
        case 'kategori_catering':
            require_once "kategori_catering.php";
            break;
        case 'kategori_dekorasi':
            require_once "kategori_dekorasi.php";
            break;
        case 'kategori_dokumentasi':
            require_once "kategori_dokumentasi.php";
            break;
        case 'kategori_hiburan':
            require_once "kategori_hiburan.php";
            break;
        case 'kategori_makeup':
            require_once "kategori_makeup.php";
            break;
        case 'kategori_mc':
            require_once "kategori_mc.php";
            break;
    }
} else {
    require_once "home.php";
}
