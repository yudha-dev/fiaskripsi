<?php
$pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE id_pelanggan = '" . $_SESSION['id_pelanggan'] . "' ");
$p = mysqli_fetch_array($pelanggan);
?>
<div class="site__body">
    <div class="block-header block-header--has-breadcrumb block-header--has-title">
        <div class="container">
            <div class="block-header__body">
                <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
                </nav>
                <h1 class="block-header__title">Checkout</h1>
            </div>
        </div>
    </div>
    <div class="checkout block">
        <div class="container container-xl">
            <form action="pembayaran.php" method="post">
                <input type="hidden" name="id_pelanggan" value="<?= $_SESSION['id_pelanggan'] ?>">
                <div class="row">
                    <div class="col-12 col-lg-6 col-xl-7">
                        <div class="card mb-lg-0">
                            <div class="card-body card-body--padding--2">
                                <h3 class="card-title">Detail Pelanggan</h3>
                                <div class="form-group"><label for="checkout-company-name">Nama Lengkap</label>
                                    <input type="text" class="form-control" value="<?= $p['nama'] ?>" readonly>
                                </div>
                                <div class="form-group"><label for="checkout-street-address">Alamat</label>
                                    <input type="text" class="form-control" value="<?= $p['alamat'] ?>" readonly>
                                </div>
                                <div class="form-group"><label for="checkout-street-address">Nomor Hp</label>
                                    <input type="text" class="form-control" value="<?= $p['no_hp'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-5 mt-4 mt-lg-0">
                        <div class="card mb-0">
                            <div class="card-body card-body--padding--2">
                                <h3 class="card-title">Pesanan Anda</h3>
                                <table class="checkout__totals">
                                    <thead class="checkout__totals-header">
                                        <tr>
                                            <th>Nama Paket</th>
                                            <th>Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody class="checkout__totals-products">
                                        <?php
                                        // ambil queery dari table keranjang
                                        $isi = mysqli_query($koneksi, "SELECT * FROM keranjang INNER JOIN paket_pernikahan on keranjang.kode_paket=paket_pernikahan.kode_paket INNER JOIN jasa on paket_pernikahan.id_jasa=jasa.id_jasa WHERE keranjang.id_pelanggan = '" . $_SESSION['id_pelanggan'] . "' GROUP BY keranjang.id_keranjang ");
                                        while ($kr = mysqli_fetch_array($isi)) {
                                        ?>
                                            <input type="hidden" name="kode_paket[]" value="<?= $kr['kode_paket'] ?>">
                                            <input type="hidden" value="<?= $zz['harga'] ?>" onkeyup="sum();" id="paket">
                                            <?php
                                            $bb = mysqli_query($koneksi, "SELECT * FROM keranjang WHERE kode_paket = '" . $kr['kode_paket'] . "'");
                                            $zz = mysqli_fetch_array($bb);
                                            ?>
                                            <tr>
                                                <td><?php echo $kr['nama_paket']; ?></td>
                                                <td>Rp. <?= number_format($zz['harga'], 0, ".", ".") ?></td>
                                            </tr>
                                            <input type="hidden" name="tanggal" value="<?= $zz['tanggal'] ?>">
                                            <input type="hidden" name="id_keranjang" value="<?= $zz['id_keranjang'] ?>">
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                    <tbody class="checkout__totals-subtotals">
                                        <?php
                                        $bb = mysqli_query($koneksi, "SELECT SUM(harga) AS hrg FROM keranjang WHERE id_pelanggan = '" . $_SESSION['id_pelanggan'] . "'");
                                        $zz = mysqli_fetch_array($bb);
                                        $cek_ongkir = mysqli_query($koneksi, "SELECT * FROM pemesanan WHERE id_pelanggan = '" . $_SESSION['id_pelanggan'] . "'");
                                        $cek = mysqli_fetch_array($cek_ongkir);
                                        $total = $zz['hrg'] + $cek['ongkir'];
                                        $pemesanan = mysqli_query($koneksi, "SELECT * FROM pemesanan ORDER BY id_pemesanan desc LIMIT 1");
                                        $p = mysqli_fetch_array($pemesanan);
                                        ?>
                                        <input type="hidden" name="id_pemesanan" value="<?= $p['id_pemesanan'] ?>">
                                        <tr>
                                            <th>Ongkos Kirim</th>
                                            <td>Rp. <?= number_format($cek['ongkir'], 0, ".", ".") ?></td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="checkout__totals-footer">
                                        <tr>
                                            <th>Total</th>
                                            <td>Rp. <?= number_format($total, 0, ".", ".") ?></td>
                                        </tr>
                                    </tfoot>
                                    <input type="hidden" name="total_harga" value="<?= $zz['hrg'] ?>">
                                </table>
                                <div class="checkout__payment-methods payment-methods">
                                    <ul class="payment-methods__list">
                                        <li class="payment-methods__item payment-methods__item--active">
                                            <label class="payment-methods__item-header">
                                                <span class="payment-methods__item-radio input-radio">
                                                    <span class="input-radio__body">
                                                        <input class="input-radio__input" name="checkout_payment_method" value="Lunas" type="radio" checked="checked">
                                                        <span class="input-radio__circle">
                                                        </span>
                                                    </span>
                                                </span>
                                                <span class="payment-methods__item-title">Pembayaran Penuh</span>
                                            </label>
                                            <div class="payment-methods__item-container">
                                                <div class="payment-methods__item-details text-muted">Pilih methode ini untuk pembayaran lunas.</div>
                                            </div>
                                        </li>
                                        <li class="payment-methods__item">
                                            <label class="payment-methods__item-header">
                                                <span class="payment-methods__item-radio input-radio">
                                                    <span class="input-radio__body">
                                                        <input class="input-radio__input" name="checkout_payment_method" value="Dp" type="radio">
                                                        <span class="input-radio__circle">
                                                        </span>
                                                    </span>
                                                </span>
                                                <span class="payment-methods__item-title">Pembayaran Dp</span>
                                            </label>
                                            <div class="payment-methods__item-container">
                                                <div class="payment-methods__item-details text-muted">Dp minimal adalah 50% dari harga total,silahkan pilih methode ini jika ingin membayar dp.
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="checkout__agree form-group">
                                </div>
                                <button type="submit" class="btn btn-primary btn-xl btn-block">Buat Pesanan</button>
                            </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
<div class="block-space block-space--layout--before-footer"></div>
</div>