<?php
if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'dashboard':
            require_once "dashboard.php";
            break;
        case 'profil':
            require_once "profil.php";
            break;
        case 'rincian_paket':
            require_once "rincian_paket.php";
            break;
        case 'pendaftaran':
            require_once "pendaftaran.php";
            break;
        case 'cek_keranjang':
            require_once "cek_keranjang.php";
            break;
        case 'checkout':
            require_once "checkout.php";
            break;
        case 'dashboard':
            require_once "dashboard.php";
            break;
        case 'konfirm_order':
            require_once "konfirm_order.php";
            break;
        case 'paket_pernikahan':
            require_once "paket_pernikahan.php";
            break;
        case 'konfirmasi_pembayaran':
            require_once "konfirmasi_pembayaran.php";
            break;
        case 'vendor':
            require_once "vendor.php";
            break;
        case 'jasa':
            require_once "jasa.php";
            break;
    }
} else {
    require_once "home.php";
}
