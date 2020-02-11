<?php
include '../../koneksi/koneksi.php';
session_start();

if ($_SESSION['level'] == "") {
    $_SESSION["id_user"];
    header("location:../login.php?login-gagal");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>BST project wedding</title>
    <!-- Favicon -->
    <link rel="icon" href="../../assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="../../assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="../../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Data Tables -->
    <link rel="stylesheet" href="../../assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="../../assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="../../assets/css/argon.css?v=1.1.0" type="text/css">
    <!-- Jquery -->
    <script src="../../assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="../../assets/vendor/tinymce/tinymce.min.js"></script>
</head>
<?php
include "../../koneksi/koneksi.php";
$query = mysqli_query($koneksi, "SELECT * FROM admin WHERE id_user='" . $_SESSION['id_user'] . "'");
$data = mysqli_fetch_array($query);
?>

<body>
    <!-- Sidenav -->
    <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header d-flex align-items-center">
                <a class="navbar-brand" href="../pages/dashboards/dashboard.html">
                    <img src="../../assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
                </a>
                <div class="ml-auto">
                    <!-- Sidenav toggler -->
                    <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item" <?php if (isset($_GET['page']) && $_GET['page'] == 'dashboard') {
                                                    echo 'class="active"';
                                                } ?>>
                            <a class="nav-link" href="?page=dashboard">
                                <i class="ni ni-shop text-primary"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-kontrak" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-kontrak">
                                <i class="ni ni-collection text-yellow"></i>
                                <span class="nav-link-text">Kontrak Kerja</span>
                            </a>
                            <div <?php if (isset($_GET['page']) && $_GET['page'] == 'kontrak_kerja') {
                                        echo 'class="collapse show"';
                                    } else {
                                        echo 'class="collapse"';
                                    } ?> id="navbar-kontrak">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                    <li <?php if (isset($_GET['page']) && $_GET['page'] == 'kontrak_kerja') {
                                            echo 'class="active"';
                                        } ?>>
                                        <a href="?page=kontrak_kerja" class="nav-link">Data Kontrak Kerja</a>
                                    </li>
                                </ul>
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                    <li <?php if (isset($_GET['page']) && $_GET['page'] == 'kontrak_vendor') {
                                            echo 'class="active"';
                                        } ?>>
                                        <a href="?page=kontrak_vendor" class="nav-link">Kontrak Vendor</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-verifikasi" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-verifikasi">
                                <i class="ni ni-shop text-green"></i>
                                <span class="nav-link-text">Verifikasi Vendor</span>
                            </a>
                            <div <?php if (isset($_GET['page']) && $_GET['page'] == 'verifikasi') {
                                        echo 'class="collapse show"';
                                    } else {
                                        echo 'class="collapse"';
                                    } ?> id="navbar-verifikasi">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                    <li <?php if (isset($_GET['page']) && $_GET['page'] == 'verifikasi') {
                                            echo 'class="active"';
                                        } ?>>
                                        <a href="?page=verifikasi" class="nav-link">Verifikasi</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                                <i class="ni ni-single-02 text-orange"></i>
                                <span class="nav-link-text">Pelanggan</span>
                            </a>
                            <div <?php if (isset($_GET['page']) && $_GET['page'] == 'data_pelanggan') {
                                        echo 'class="collapse show"';
                                    } else {
                                        echo 'class="collapse"';
                                    } ?> id="navbar-examples">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                    <li <?php if (isset($_GET['page']) && $_GET['page'] == 'data_pelanggan') {
                                            echo 'class="active"';
                                        } ?>>
                                        <a href="?page=data_pelanggan" class="nav-link">Data Pelanggan</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-kategori" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-kategori">
                                <i class="ni ni-bullet-list-67 text-info"></i>
                                <span class="nav-link-text">Kategori</span>
                            </a>
                            <div <?php if (isset($_GET['page']) && $_GET['page'] == 'data_kategori') {
                                        echo 'class="collapse show"';
                                    } else {
                                        echo 'class="collapse"';
                                    } ?> id="navbar-kategori">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                    <li <?php if (isset($_GET['page']) && $_GET['page'] == 'data_kategori') {
                                            echo 'class="active"';
                                        } ?>>
                                        <a href="?page=data_kategori" class="nav-link">Data Kategori</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-paket" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-paket">
                                <i class="ni ni-bag-17 text"></i>
                                <span class="nav-link-text">Paket Pernikahan</span>
                            </a>
                            <div <?php if (isset($_GET['page']) && $_GET['page'] == 'paket_pernikahan') {
                                        echo 'class="collapse show"';
                                    } else {
                                        echo 'class="collapse"';
                                    } ?> id="navbar-paket">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                    <li <?php if (isset($_GET['page']) && $_GET['page'] == 'paket_pernikahan') {
                                            echo 'class="active"';
                                        } ?>>
                                        <a href="?page=paket_pernikahan" class="nav-link">Data Paket Pernikahan</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-jasa_acara" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-paket">
                                <i class="ni ni-archive-2 text-primary"></i>
                                <span class="nav-link-text">jasa_acara</span>
                            </a>
                            <div <?php if (isset($_GET['page']) && $_GET['page'] == 'jasa_acara') {
                                        echo 'class="collapse show"';
                                    } else {
                                        echo 'class="collapse"';
                                    } ?> id="navbar-jasa_acara">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                    <li <?php if (isset($_GET['page']) && $_GET['page'] == 'jasa_acara') {
                                            echo 'class="active"';
                                        } ?>>
                                        <a href="?page=jasa_acara" class="nav-link">Data Jasa Acara</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-vendor" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-vendor">
                                <i class="ni ni-badge text-pink"></i>
                                <span class="nav-link-text">Vendor</span>
                            </a>
                            <div <?php if (isset($_GET['page']) && $_GET['page'] == 'data_vendor') {
                                        echo 'class="collapse show"';
                                    } else {
                                        echo 'class="collapse"';
                                    } ?> id="navbar-vendor">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                    <li <?php if (isset($_GET['page']) && $_GET['page'] == 'data_vendor') {
                                            echo 'class="active"';
                                        } ?>>
                                        <a href="?page=data_vendor" class="nav-link">Data Vendor</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-ongkir" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-vendor">
                                <i class="ni ni-delivery-fast text-orange"></i>
                                <span class="nav-link-text">Ongkos Kirim</span>
                            </a>
                            <div <?php if (isset($_GET['page']) && $_GET['page'] == 'data_ongkir') {
                                        echo 'class="collapse show"';
                                    } else {
                                        echo 'class="collapse"';
                                    } ?> id="navbar-ongkir">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                    <li <?php if (isset($_GET['page']) && $_GET['page'] == 'data_ongkir') {
                                            echo 'class="active"';
                                        } ?>>
                                        <a href="?page=data_ongkir" class="nav-link">Data Ongkos Kirim</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="main-content" id="panel">
        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Search form -->
                    <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                        <div class="form-group mb-0">
                            <div class="input-group input-group-alternative input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input class="form-control" placeholder="Search" type="text">
                            </div>
                        </div>
                        <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </form>
                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center ml-md-auto">
                        <li class="nav-item d-xl-none">
                            <!-- Sidenav toggler -->
                            <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item d-sm-none">
                            <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                                <i class="ni ni-zoom-split-in"></i>
                            </a>
                        </li>
                        <?php
                        $hitung_notif = mysqli_query($koneksi, "SELECT COUNT(id_pemesanan) AS notif FROM pemesanan WHERE status = 'Pembayaran Diverifikasi'");
                        $h = mysqli_fetch_array($hitung_notif);
                        ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <small class="badge badge-sm badge-danger">
                                    <!-- tampilkan notif dari verifikasi pembayaran  -->
                                    <?php if ($h['notif'] == NULL) {
                                        echo '';
                                    } else {
                                        echo '' . $h['notif'] . '';
                                    } ?></small>
                                <i class="ni ni-bell-55"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right py-0 overflow-hidden">
                                <!-- Dropdown header -->
                                <div class="px-3 py-3">
                                    <h6 class="text-sm text-muted m-0">Anda Memiliki <strong class="text-primary"><?= $h['notif'] ?></strong> Pembayaran Yang Belum Di Proses.</h6>
                                </div>
                                <!-- List group -->
                                <?php
                                $data_notif = mysqli_query($koneksi, "SELECT * FROM pemesanan INNER JOIN pelanggan ON pemesanan.id_pelanggan = pelanggan.id_pelanggan INNER JOIN paket_pernikahan ON pemesanan.kode_paket = paket_pernikahan.kode_paket WHERE pemesanan.status = 'Pembayaran Diverifikasi' GROUP BY id_pemesanan");
                                while ($dn = mysqli_fetch_array($data_notif)) {
                                    $ongkir = $dn['ongkir'];
                                    $harga = $dn['total_harga'];
                                    $total = $ongkir + $harga;
                                ?>
                                    <div class="list-group list-group-flush">
                                        <a href="?page=konfirmasi_pembayaran" class="list-group-item list-group-item-action">
                                            <div class="row align-items-center">
                                                <div class="col ml--2">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <h4 class="mb-0 text-sm"><?php echo $dn['nama'] ?></h4>
                                                        </div>
                                                        <div class="text-right text-muted">
                                                            <small><?= date('d F Y', strtotime($dn['tanggal'])) ?></small>
                                                        </div>
                                                    </div>
                                                    <p class="text-sm mb-0"><?= $dn['nama_paket'] ?></p>
                                                    <h5 class="mb-0 text-sm">Rp. <?= number_format($total, 0, ".", ".") ?></h5>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php } ?>
                                <!-- View all -->
                                <a href="?page=konfirmasi_pembayaran" class="dropdown-item text-center text-primary font-weight-bold py-3">Konfirmasi Pembayaran</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ni ni-ungroup"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default dropdown-menu-right">
                                <div class="row shortcuts px-4">
                                    <a href="#!" class="col-4 shortcut-item">
                                        <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                                            <i class="ni ni-calendar-grid-58"></i>
                                        </span>
                                        <small>Calendar</small>
                                    </a>
                                    <a href="#!" class="col-4 shortcut-item">
                                        <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                                            <i class="ni ni-email-83"></i>
                                        </span>
                                        <small>Email</small>
                                    </a>
                                    <a href="#!" class="col-4 shortcut-item">
                                        <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                                            <i class="ni ni-credit-card"></i>
                                        </span>
                                        <small>Payments</small>
                                    </a>
                                    <a href="#!" class="col-4 shortcut-item">
                                        <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                                            <i class="ni ni-books"></i>
                                        </span>
                                        <small>Reports</small>
                                    </a>
                                    <a href="#!" class="col-4 shortcut-item">
                                        <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                                            <i class="ni ni-pin-3"></i>
                                        </span>
                                        <small>Maps</small>
                                    </a>
                                    <a href="#!" class="col-4 shortcut-item">
                                        <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                                            <i class="ni ni-basket"></i>
                                        </span>
                                        <small>Shop</small>
                                    </a>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav align-items-center ml-auto ml-md-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">
                                    <span class="avatar avatar-sm rounded-circle">
                                        <img alt="Image placeholder" src="../../assets/img/theme/team-4.jpg">
                                    </span>
                                    <div class="media-body ml-2 d-none d-lg-block">
                                        <span class="mb-0 text-sm  font-weight-bold"><?php echo $data['nama'] ?></span>
                                    </div>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome!</h6>
                                </div>
                                <a href="?page=profil" class="dropdown-item">
                                    <i class="ni ni-single-02"></i>
                                    <span>Profil</span>
                                </a>
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-settings-gear-65"></i>
                                    <span>Settings</span>
                                </a>
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-calendar-grid-58"></i>
                                    <span>Activity</span>
                                </a>
                                <a href="#!" class="dropdown-item">
                                    <i class="ni ni-support-16"></i>
                                    <span>Support</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="logout.php" class="dropdown-item">
                                    <i class="ni ni-user-run"></i>
                                    <span>Logout</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header -->
        <?php
        require_once "page.php";
        ?>
        <!-- Header -->
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="../../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="../../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="../../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Optional JS -->
    <script src="../../assets/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="../../assets/vendor/chart.js/dist/Chart.extension.js"></script>
    <!-- Demo JS - remove this in your project -->
    <script src="../../assets/js/demo.min.js"></script>
    <!-- Data Tables Js -->
    <script src="../../assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <!-- Argon JS -->
    <script src="../../assets/js/argon.js?v=1.1.0"></script>
    <!-- Custom Js -->
    <script src="fungsi.js"></script>
</body>

</html>