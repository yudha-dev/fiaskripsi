<?php
$hitung = mysqli_query($koneksi, "SELECT COUNT(id_pemesanan) AS htg FROM pemesanan WHERE status = 'Belum Dibayar' AND id_pelanggan = '" . $_SESSION['id_pelanggan'] . "'");
$h = mysqli_fetch_array($hitung);
?>
<div class="col-12 col-lg-3 d-flex">
    <div class="account-nav flex-grow-1">
        <h4 class="account-nav__title">Navigation</h4>
        <ul class="account-nav__list">
            <li <?php if (isset($_GET['page']) && $_GET['page'] == 'dashboard') {
                    echo 'class="account-nav__item account-nav__item--active"';
                } else {
                    echo 'class="account-nav__item"';
                } ?>><a href="?page=dashboard">Dashboard</a></li>
            <li <?php if (isset($_GET['page']) && $_GET['page'] == 'konfirm_order') {
                    echo 'class="account-nav__item account-nav__item--active"';
                } else {
                    echo 'class="account-nav__item"';
                } ?>><a href="?page=konfirm_order">Konfirmasi Order<small class="tag-badge tag-badge--theme"><?= $h['htg'] ?></small></a></li>
            <li class="account-nav__item"><a href="account-profile.html">Edit Profile</a></li>
            <li class="account-nav__item"><a href="account-orders.html">Order History</a></li>
            <li class="account-nav__item"><a href="account-addresses.html">Addresses</a></li>
            <li class="account-nav__item"><a href="account-password.html">Password</a></li>
            <li class="account-nav__divider" role="presentation"></li>
            <li class="account-nav__item"><a href="account-login.html">Logout</a></li>
        </ul>
    </div>
</div>