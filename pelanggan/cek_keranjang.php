<div class="block-header block-header--has-breadcrumb block-header--has-title">
    <div class="container">
        <div class="block-header__body">
            <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
            </nav>
            <h1 class="block-header__title">Keranjang</h1>
        </div>
    </div>
</div>
<div class="block">
    <div class="container">
        <div class="cart">
            <div class="cart__table cart-table">
                <form action="add_ongkir.php" method="POST">
                    <table class="cart-table__table">
                        <thead class="cart-table__head">
                            <tr class="cart-table__row">
                                <th class="cart-table__column cart-table__column--quantity">Nama Paket</th>
                                <th class="cart-table__column cart-table__column--product">List Paket</th>
                                <th class="cart-table__column cart-table__column--price">Harga</th>
                                <th class="cart-table__column cart-table__column--remove"></th>
                            </tr>
                        </thead>
                        <tbody class="cart-table__body">
                            <?php
                            // ambil queery dari table keranjang
                            $isi = mysqli_query($koneksi, "SELECT * FROM keranjang INNER JOIN paket_pernikahan on keranjang.kode_paket=paket_pernikahan.kode_paket INNER JOIN jasa on paket_pernikahan.id_jasa=jasa.id_jasa WHERE keranjang.id_pelanggan = '" . $_SESSION['id_pelanggan'] . "' GROUP BY keranjang.id_keranjang ");
                            while ($kr = mysqli_fetch_array($isi)) {
                            ?>
                                <input type="hidden" name="kode_paket[]" value="<?= $kr['kode_paket'] ?>">
                                <tr class="cart-table__row">
                                    <td class="cart-table__column cart-table__column--quantity"><?php echo $kr['nama_paket']; ?></td>
                                    <td class="cart-table__column cart-table__column--product">
                                        <?php
                                        // ambil query dari table paket pernikahan
                                        $paket = mysqli_query($koneksi, "SELECT * FROM jasa inner join paket_pernikahan on jasa.id_jasa=paket_pernikahan.id_jasa WHERE paket_pernikahan.kode_paket = '" . $kr['kode_paket'] . "'");
                                        while ($d = mysqli_fetch_array($paket)) {
                                        ?>
                                            <ul class="cart-table__options">
                                                <li><?php echo $d['nama_jasa']; ?></li>
                                            </ul>
                                        <?php } ?>
                                    </td>
                                    <?php
                                    $bb = mysqli_query($koneksi, "SELECT * FROM keranjang WHERE kode_paket = '" . $kr['kode_paket'] . "'");
                                    $zz = mysqli_fetch_array($bb);
                                    ?>
                                    <td class="cart-table__column cart-table__column--price" data-title="Price">
                                        Rp. <?= number_format($zz['harga'], 0, ".", ".") ?></td>
                                    <td class="cart-table__column cart-table__column--remove">
                                        <a href="hapus_keranjang.php?id=<?= $kr['id_keranjang'] ?>" class="cart-table__remove btn btn-sm btn-icon btn-muted">
                                            <i class="far fa-trash-alt" style="font-size: 15px"></i>
                                        </a>

                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        <tbody class="cart-table__body">
                            <?php
                            // ambil queery dari table keranjang
                            $isi1 = mysqli_query($koneksi, "SELECT * FROM keranjang INNER JOIN jasa ON keranjang.kode_jasa = jasa.id_jasa WHERE keranjang.id_pelanggan = '" . $_SESSION['id_pelanggan'] . "'");
                            while ($c = mysqli_fetch_array($isi1)) {
                            ?>
                                <input type="hidden" name="kode_jasa[]" value="<?= $c['kode_jasa'] ?>">
                                <tr class="cart-table__row">
                                    <td class="cart-table__column cart-table__column--quantity"><?php echo $c['nama_jasa']; ?></td>
                                    <td class="cart-table__column cart-table__column--product">
                                    <td class="cart-table__column cart-table__column--price" data-title="Price">
                                        Rp. <?= number_format($c['harga'], 0, ".", ".") ?></td>
                                    <td class="cart-table__column cart-table__column--remove">
                                        <a href="hapus_keranjang.php?id=<?= $c['id_keranjang'] ?>" class="cart-table__remove btn btn-sm btn-icon btn-muted">
                                            <i class="far fa-trash-alt" style="font-size: 15px"></i>
                                        </a>

                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
            </div>
            <!-- form ongkir  -->
            <div class="cart__totals">
                <input type="hidden" name="id_pelanggan" value="<?= $_SESSION['id_pelanggan'] ?>">
                <div class="card">
                    <div class="card-body card-body--padding--2">
                        <h3 class="card-title">CEK ONGKIR</h3>
                        <table class="cart__totals-table">
                            <?php
                            $bb = mysqli_query($koneksi, "SELECT SUM(harga) AS hrg FROM keranjang WHERE id_pelanggan = '" . $_SESSION['id_pelanggan'] . "'");
                            $zz = mysqli_fetch_array($bb);
                            ?>
                            <div class="form-group"><label for="checkout-country">Pilih Kota Anda</label>
                                <select name="ongkir" class="form-control form-control-select2" id="ongkir" required>
                                    <option value="">Pilih Kota</option>
                                    <?php
                                    $ongkir = mysqli_query($koneksi, "SELECT * FROM ongkir");
                                    while ($ong = mysqli_fetch_array($ongkir)) {
                                    ?>
                                        <option value="<?= $ong['ongkos_kirim'] ?>"><?= $ong['nama_kota'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <tfoot>
                                <tr>
                                    <th>Ongkos Kirim</th>
                                    <td id="ongkirnya">Rp. 0</td>
                                </tr>
                            </tfoot>
                        </table>
                        <button type="submit" class="btn btn-primary btn-xl btn-block">Lanjutkan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="block-space block-space--layout--before-footer"></div>
<!-- ajax ongkos kirim  -->
<script>
    $('select[id=ongkir]').change(function() {
        get_ongkir();
    });

    function get_ongkir() {
        var a = $('#ongkir').val();
        $.ajax({
            type: 'POST',
            url: "get_ongkir.php",
            data: "ongkir=" + a,
            success: function(info) {
                $("#ongkirnya").html(info);
            }
        });
        return false;
    }
</script>