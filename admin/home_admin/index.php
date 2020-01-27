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
                                    <li <?php if (isset($_GET['page']) && $_GET['page'] == 'data_kontrak_vendor') {
                                            echo 'class="active"';
                                        } ?>>
                                        <a href="?page=data_kontrak_vendor" class="nav-link">Data Kontrak Kerja Vendor</a>
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
                            <div <?php if (isset($_GET['page']) && $_GET['page'] == 'kategori_catering' || isset($_GET['page']) && $_GET['page'] == 'kategori_makeup' || isset($_GET['page']) && $_GET['page'] == 'kategori_mc' || isset($_GET['page']) && $_GET['page'] == 'kategori_dokumentasi' || isset($_GET['page']) && $_GET['page'] == 'kategori_dekorasi' || isset($_GET['page']) && $_GET['page'] == 'kategori_hiburan') {
                                        echo 'class="collapse show"';
                                    } else {
                                        echo 'class="collapse"';
                                    } ?> id="navbar-kategori">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                    <li <?php if (isset($_GET['page']) && $_GET['page'] == 'kategori_catering') {
                                            echo 'class="active"';
                                        } ?>>
                                        <a href="?page=kategori_catering" class="nav-link">Kategori Catering</a>
                                    </li>
                                    <li <?php if (isset($_GET['page']) && $_GET['page'] == 'kategori_dekorasi') {
                                            echo 'class="active"';
                                        } ?>>
                                        <a href="?page=kategori_dekorasi" class="nav-link">Kategori Dekorasi</a>
                                    </li>
                                    <li <?php if (isset($_GET['page']) && $_GET['page'] == 'kategori_dokumentasi') {
                                            echo 'class="active"';
                                        } ?>>
                                        <a href="?page=kategori_dokumentasi" class="nav-link">Kategori Dokumentasi</a>
                                    </li>
                                    <li <?php if (isset($_GET['page']) && $_GET['page'] == 'kategori_hiburan') {
                                            echo 'class="active"';
                                        } ?>>
                                        <a href="?page=kategori_hiburan" class="nav-link">Kategori Hiburan</a>
                                    </li>
                                    <li <?php if (isset($_GET['page']) && $_GET['page'] == 'kategori_makeup') {
                                            echo 'class="active"';
                                        } ?>>
                                        <a href="?page=kategori_makeup" class="nav-link">Kategori Makeup</a>
                                    </li>
                                    <li <?php if (isset($_GET['page']) && $_GET['page'] == 'kategori_mc') {
                                            echo 'class="active"';
                                        } ?>>
                                        <a href="?page=kategori_mc" class="nav-link">Kategori MC</a>
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
                            <a class="nav-link" href="#navbar-forms" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-forms">
                                <i class="ni ni-single-copy-04 text-pink"></i>
                                <span class="nav-link-text">Forms</span>
                            </a>
                            <div class="collapse" id="navbar-forms">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="../pages/forms/elements.html" class="nav-link">Elements</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../pages/forms/components.html" class="nav-link">Components</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../pages/forms/validation.html" class="nav-link">Validation</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-tables" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-tables">
                                <i class="ni ni-align-left-2 text-default"></i>
                                <span class="nav-link-text">Tables</span>
                            </a>
                            <div class="collapse" id="navbar-tables">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="../pages/tables/tables.html" class="nav-link">Tables</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../pages/tables/sortable.html" class="nav-link">Sortable</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../pages/tables/datatables.html" class="nav-link">Datatables</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-maps" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-maps">
                                <i class="ni ni-map-big text-primary"></i>
                                <span class="nav-link-text">Maps</span>
                            </a>
                            <div class="collapse" id="navbar-maps">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="../pages/maps/google.html" class="nav-link">Google</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="../pages/maps/vector.html" class="nav-link">Vector</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../pages/widgets.html">
                                <i class="ni ni-archive-2 text-green"></i>
                                <span class="nav-link-text">Widgets</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../pages/charts.html">
                                <i class="ni ni-chart-pie-35 text-info"></i>
                                <span class="nav-link-text">Charts</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../pages/calendar.html">
                                <i class="ni ni-calendar-grid-58 text-red"></i>
                                <span class="nav-link-text">Calendar</span>
                            </a>
                        </li>
                    </ul>
                    <!-- Divider -->
                    <hr class="my-3">
                    <!-- Heading -->
                    <h6 class="navbar-heading p-0 text-muted">Documentation</h6>
                    <!-- Navigation -->
                    <ul class="navbar-nav mb-md-3">
                        <li class="nav-item">
                            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html" target="_blank">
                                <i class="ni ni-spaceship"></i>
                                <span class="nav-link-text">Getting started</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html" target="_blank">
                                <i class="ni ni-palette"></i>
                                <span class="nav-link-text">Foundation</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html" target="_blank">
                                <i class="ni ni-ui-04"></i>
                                <span class="nav-link-text">Components</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/plugins/charts.html" target="_blank">
                                <i class="ni ni-chart-pie-35"></i>
                                <span class="nav-link-text">Plugins</span>
                            </a>
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
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ni ni-bell-55"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right py-0 overflow-hidden">
                                <!-- Dropdown header -->
                                <div class="px-3 py-3">
                                    <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">13</strong> notifications.</h6>
                                </div>
                                <!-- List group -->
                                <div class="list-group list-group-flush">
                                    <a href="#!" class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <!-- Avatar -->
                                                <img alt="Image placeholder" src="../../assets/img/theme/team-1.jpg" class="avatar rounded-circle">
                                            </div>
                                            <div class="col ml--2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="mb-0 text-sm"><?php echo $data['nama'] ?></h4>
                                                    </div>
                                                    <div class="text-right text-muted">
                                                        <small>2 hrs ago</small>
                                                    </div>
                                                </div>
                                                <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#!" class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <!-- Avatar -->
                                                <img alt="Image placeholder" src="../assets/img/theme/team-2.jpg" class="avatar rounded-circle">
                                            </div>
                                            <div class="col ml--2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="mb-0 text-sm">John Snow</h4>
                                                    </div>
                                                    <div class="text-right text-muted">
                                                        <small>3 hrs ago</small>
                                                    </div>
                                                </div>
                                                <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#!" class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <!-- Avatar -->
                                                <img alt="Image placeholder" src="../assets/img/theme/team-3.jpg" class="avatar rounded-circle">
                                            </div>
                                            <div class="col ml--2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="mb-0 text-sm">John Snow</h4>
                                                    </div>
                                                    <div class="text-right text-muted">
                                                        <small>5 hrs ago</small>
                                                    </div>
                                                </div>
                                                <p class="text-sm mb-0">Your posts have been liked a lot.</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#!" class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <!-- Avatar -->
                                                <img alt="Image placeholder" src="../assets/img/theme/team-4.jpg" class="avatar rounded-circle">
                                            </div>
                                            <div class="col ml--2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="mb-0 text-sm">John Snow</h4>
                                                    </div>
                                                    <div class="text-right text-muted">
                                                        <small>2 hrs ago</small>
                                                    </div>
                                                </div>
                                                <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                                            </div>
                                        </div>
                                    </a>
                                    <a href="#!" class="list-group-item list-group-item-action">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <!-- Avatar -->
                                                <img alt="Image placeholder" src="../assets/img/theme/team-5.jpg" class="avatar rounded-circle">
                                            </div>
                                            <div class="col ml--2">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <h4 class="mb-0 text-sm">John Snow</h4>
                                                    </div>
                                                    <div class="text-right text-muted">
                                                        <small>3 hrs ago</small>
                                                    </div>
                                                </div>
                                                <p class="text-sm mb-0">A new issue has been reported for Argon.</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <!-- View all -->
                                <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
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