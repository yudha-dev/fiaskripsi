<div class="block-space block-space--layout--after-header"></div>
<div class="block">
    <div class="container container-xl">
        <div class="row">
            <?php
            include 'navigation.php';
            $data = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_pelanggan = '" . $_SESSION['id_pelanggan'] . "' ");
            $d = mysqli_fetch_array($data);
            ?>
            <div class="col-12 col-lg-9 mt-4 mt-lg-0">
                <div class="dashboard">
                    <div class="dashboard__profile card profile-card">
                        <div class="card-body profile-card__body">
                            <div class="profile-card__avatar"><img src="images/avatars/avatar-4.jpg" alt="">
                            </div>
                            <div class="profile-card__name"><?= $d['username'] ?></div>
                            <div class="profile-card__email"><?= $d['nama'] ?></div>
                            <div class="profile-card__edit"><a href="account-profile.html" class="btn btn-secondary btn-sm">Edit Profile</a></div>
                        </div>
                    </div>
                    <div class="dashboard__address card address-card address-card--featured">
                        <div class="address-card__badge tag-badge tag-badge--theme">Keterangan</div>
                        <div class="address-card__body">
                            <div class="address-card__name"><?= $d['nama'] ?></div>
                            <div class="address-card__row">
                                <div class="address-card__row-title">Alamat</div>
                                <div class="address-card__row-content"><?= $d['alamat'] ?></div>
                            </div>
                            <div class="address-card__row">
                                <div class="address-card__row-title">Nomor Hp</div>
                                <div class="address-card__row-content"><?= $d['no_hp'] ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard__orders card">
                        <div class="card-header">
                            <h5>Histori Order Terakhir</h5>
                        </div>
                        <div class="card-divider"></div>
                        <div class="card-table">
                            <div class="table-responsive-sm">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Nama Paket</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $order = mysqli_query($koneksi, "SELECT * FROM pemesanan INNER JOIN paket_pernikahan ON pemesanan.kode_paket = paket_pernikahan.kode_paket WHERE id_pelanggan = '" . $_SESSION['id_pelanggan'] . "' GROUP BY id_pemesanan");
                                        while ($o = mysqli_fetch_array($order)) {
                                        ?>
                                            <tr>
                                                <td><a href="#"><?= $o['nama_paket'] ?></a></td>
                                                <td><?= date('d F Y', strtotime($o['tanggal'])) ?></td>
                                                <td><?= $o['status'] ?></td>
                                                <td>Rp. <?= number_format($o['total_harga'], 0, ".", ".") ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="block-space block-space--layout--before-footer"></div>