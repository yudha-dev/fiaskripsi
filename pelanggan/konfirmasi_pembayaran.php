<?php
$id = isset($_GET['id']) ? $_GET['id'] : 'id_pembayaran';
$pelanggan = mysqli_query($koneksi, "SELECT * FROM pemesanan INNER JOIN pelanggan ON pemesanan.id_pelanggan = pelanggan.id_pelanggan WHERE pelanggan.id_pelanggan = '" . $_SESSION['id_pelanggan'] . "' ");
$p = mysqli_fetch_array($pelanggan);
?>
<div class="block-header block-header--has-breadcrumb block-header--has-title">
    <div class="container">
        <div class="block-header__body">
            <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
            </nav>
            <h1 class="block-header__title">Konfirmasi Pembayaran</h1>
        </div>
    </div>
</div>
<div class="checkout block">
    <div class="container container-xl">
        <form action="proses_pembayaran.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12 col-lg-6 col-xl-7">
                    <input type="hidden" name="id_pemesanan" value="<?= $p['id_pemesanan'] ?>">
                    <input type="hidden" name="id_pelanggan" value="<?= $p['id_pelanggan'] ?>">
                    <div class="card mb-lg-0">
                        <div class="card-body card-body--padding--2">
                            <h3 class="card-title">Masukan Informasi Pembayaran</h3>
                            <div class="form-group">
                                <label for="checkout-company-name">Nama Lengkap</label>
                                <input type="text" class="form-control" value="<?= $p['nama'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="checkout-company-name">Alamat</label>
                                <input type="text" class="form-control" value="<?= $p['alamat'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="checkout-company-name">Nomor Hp</label>
                                <input type="text" class="form-control" value="<?= $p['no_hp'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="checkout-company-name">Nomor Rekening Anda</label>
                                <input type="text" class="form-control" name="nomor_rek" onkeypress="return hanyaAngka(event)" placeholder="Masukan nomor rekening anda" required>
                            </div>
                            <div class="form-group">
                                <label for="checkout-company-name">Nama Rekening Anda</label>
                                <input type="text" class="form-control" name="nama_rek" placeholder="Masukan atas nama rekening anda" required>
                            </div>
                            <div class="form-group"><label for="checkout-country">Bank Anda</label>
                                <select name="nama_bank" class="form-control form-control-select2">
                                    <option>Pilih Bank</option>
                                    <option value="Bank Indonesia (BI)">Bank Indonesia (BI)</option>
                                    <option value="Bank Mandiri">Bank Mandiri</option>
                                    <option value="Bank Negara Indonesia (BNI)">Bank Negara Indonesia (BNI)</option>
                                    <option value="Bank Rakyat Indonesia (BRI)">Bank Rakyat Indonesia (BRI)</option>
                                    <option value="Bank Tabungan Negara (BTN)">Bank Tabungan Negara (BTN)</option>
                                    <option value="Bank Central Asia (BCA)">Bank Central Asia (BCA)</option>
                                    <option value="Bank CIMB Niaga">Bank CIMB Niaga</option>
                                    <option value="Bank Danamon Indonesia">Bank Danamon Indonesia</option>
                                    <option value="Bank Mega">Bank Mega</option>
                                    <option value="Bank Jateng">Bank Jateng</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="checkout-company-name">Jumlah Transfer</label>
                                <input type="text" class="form-control" id="rupiah" name="jumlah_tf" placeholder="Masukan jumlah transfer" required>
                            </div>
                            <div class="form-group">
                                <label for="checkout-company-name">Bukti Transfer</label>
                                <input type="file" class="form-control" name="bukti_tf" required>
                            </div>
                            <div class="form-group">
                                <label for="checkout-company-name">Tanggal Transfer</label>
                                <input type="date" class="form-control" name="tanggal_tf" required>
                            </div>
                        </div>
                        <div class="card-divider"></div>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-xl-5 mt-4 mt-lg-0">
                    <div class="card mb-0">
                        <div class="card-body card-body--padding--2">
                            <h3 class="card-title">Pilih Bank Tujuan</h3>
                            <div class="checkout__payment-methods payment-methods">
                                <ul class="payment-methods__list">
                                    <li class="payment-methods__item payment-methods__item--active">
                                        <label class="payment-methods__item-header">
                                            <span class="payment-methods__item-radio input-radio">
                                                <span class="input-radio__body">
                                                    <input class="input-radio__input" name="checkout_payment_method" value="BCA" type="radio" checked="checked">
                                                    <span class="input-radio__circle">
                                                    </span>
                                                </span>
                                            </span>
                                            <span class="payment-methods__item-title">BCA</span>
                                        </label>
                                        <div class="payment-methods__item-container">
                                            <div class="payment-methods__item-details text-muted">
                                                Nomor Rekening : 9289389 <br> Atas Nama : BST project wedding
                                            </div>
                                        </div>
                                    </li>
                                    <li class="payment-methods__item">
                                        <label class="payment-methods__item-header">
                                            <span class="payment-methods__item-radio input-radio">
                                                <span class="input-radio__body">
                                                    <input class="input-radio__input" name="checkout_payment_method" value="BRI" type="radio">
                                                    <span class="input-radio__circle">
                                                    </span>
                                                </span>
                                            </span>
                                            <span class="payment-methods__item-title">BRI</span>
                                        </label>
                                        <div class="payment-methods__item-container">
                                            <div class="payment-methods__item-details text-muted">
                                                Nomor Rekening : 0784947363782625 <br> Atas Nama : BST project wedding
                                            </div>
                                        </div>
                                    </li>
                                    <li class="payment-methods__item">
                                        <label class="payment-methods__item-header">
                                            <span class="payment-methods__item-radio input-radio">
                                                <span class="input-radio__body">
                                                    <input class="input-radio__input" name="checkout_payment_method" value="MANDIRI" type="radio">
                                                    <span class="input-radio__circle">
                                                    </span>
                                                </span>
                                            </span>
                                            <span class="payment-methods__item-title">MANDIRI</span>
                                        </label>
                                        <div class="payment-methods__item-container">
                                            <div class="payment-methods__item-details text-muted">
                                                Nomor Rekening : 2983963536 <br> Atas Nama : BST project wedding
                                            </div>
                                        </div>
                                    </li>
                                    <li class="payment-methods__item">
                                        <label class="payment-methods__item-header">
                                            <span class="payment-methods__item-radio input-radio">
                                                <span class="input-radio__body">
                                                    <input class="input-radio__input" name="checkout_payment_method" value="CIMB NIAGA" type="radio">
                                                    <span class="input-radio__circle">
                                                    </span>
                                                </span>
                                            </span>
                                            <span class="payment-methods__item-title">CIMB NIAGA</span>
                                        </label>
                                        <div class="payment-methods__item-container">
                                            <div class="payment-methods__item-details text-muted">
                                                Nomor Rekening : 48575943749 <br> Atas Nama : BST project wedding
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <button type="submit" class="btn btn-primary btn-xl btn-block">konfirmasi</button>
                        </div>
        </form>
    </div>
</div>
</div>
</div>
</div>
<div class="block-space block-space--layout--before-footer"></div>