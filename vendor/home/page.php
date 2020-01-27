<?php
if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'profil':
            require_once "profil.php";
            break;
        case 'data_jasa':
            require_once "data_jasa.php";
            break;
        case 'dashboard':
            require_once "dashboard.php";
            break;
        case 'kontrak_kerja':
            require_once "kontrak_kerja.php";
            break;
    }
} else {
    require_once "home.php";
}
