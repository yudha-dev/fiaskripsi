<?php
// query paket dari keranjang
$isi = mysqli_query($koneksi, "SELECT * FROM keranjang INNER JOIN paket_pernikahan ON keranjang.kode_paket=paket_pernikahan.kode_paket INNER JOIN jasa ON paket_pernikahan.id_jasa=jasa.id_jasa WHERE keranjang.id_pelanggan = '" . $_SESSION['id_pelanggan'] . "' group by keranjang.id_keranjang ");
while ($kr = mysqli_fetch_array($isi)) {
?>
    <div class="dropcart">
        <ul class="dropcart__list">
            <h6>JASA PAKET</h6>
            <li class="dropcart__item">
                <div class="dropcart__item-image">
                    <a href="">
                        <img src="images/products/product-4-70x70.jpg" alt="">
                    </a></div>
                <div class="dropcart__item-info">
                    <div class="dropcart__item-name"><a href="index.php?page=rincian_paket&id=<?= $kr['kode_paket'] ?>"><?php echo $kr['nama_paket']; ?></a>
                    </div>
                    <ul class="dropcart__item-features">
                        <li>List Jasa:</li>
                        <?php
                        // query paket table pernikahan
                        $paket = mysqli_query($koneksi, "SELECT * FROM jasa inner join paket_pernikahan on jasa.id_jasa=paket_pernikahan.id_jasa WHERE paket_pernikahan.kode_paket = '" . $kr['kode_paket'] . "'");
                        while ($d = mysqli_fetch_array($paket)) {
                        ?>
                            <li><?php echo $d['nama_jasa']; ?></li>
                        <?php } ?>
                    </ul>
                    <div class="dropcart__item-meta">
                        <?php
                        // jumlah total harga paket
                        $bb = mysqli_query($koneksi, "SELECT * FROM keranjang WHERE kode_paket = '" . $kr['kode_paket'] . "'");
                        $zz = mysqli_fetch_array($bb);
                        ?>
                        <div class="dropcart__item-price">Rp. <?= number_format($zz['harga'], 0, ".", ".") ?></div>
                    </div>
                </div>
                <a href="hapus_keranjang.php?id=<?= $kr['id_keranjang'] ?>" class="dropcart__item-remove">
                    <i class="far fa-trash-alt" style="font-size: 15px"></i>
                </a>
            </li>
    </div>
<?php } ?>
<div class="dropcart">
    <h6>JASA CUSTOM</h6>
    <p></p>
    <?php
    // query paket table pernikahan
    $keranjang = mysqli_query($koneksi, "SELECT * FROM keranjang INNER JOIN jasa ON keranjang.kode_jasa = jasa.id_jasa WHERE keranjang.id_pelanggan = '" . $_SESSION['id_pelanggan'] . "'");
    while ($kr1 = mysqli_fetch_array($keranjang)) {
    ?>
        <ul class="dropcart__list">
            <li class="dropcart__item">
                <div class="dropcart__item-image">
                    <a href="">
                        <img src="images/products/product-4-70x70.jpg" alt="">
                    </a></div>
                <div class="dropcart__item-info">
                    <div class="dropcart__item-name"><?php echo $kr1['nama_jasa']; ?>
                    </div>
                    <div class="dropcart__item-meta">
                        <div class="dropcart__item-price">Rp. <?= number_format($kr1['harga'], 0, ".", ".") ?></div>
                    </div>
                </div>
                <a href="hapus_keranjang.php?id=<?= $kr1['id_keranjang'] ?>" class="dropcart__item-remove">
                    <i class="far fa-trash-alt" style="font-size: 15px"></i>
                </a>
            </li>
        </ul>
        <br>
    <?php } ?>
</div>
<div class="dropcart">
    <div class="dropcart__totals">
        <?php
        // total semua harga paket
        $bb = mysqli_query($koneksi, "SELECT SUM(harga) AS hrg FROM keranjang WHERE id_pelanggan = '" . $_SESSION['id_pelanggan'] . "'");
        $zz = mysqli_fetch_array($bb);
        ?>
        <table>
            <tr>
                <th>Pengiriman</th>
                <td>Belum Dipilih</td>
            </tr>
            <tr>
                <th>Total Belanja</th>
                <td>Rp. <?= number_format($zz['hrg'], 0, ".", ".") ?></td>
            </tr>
        </table>
    </div>
    <div class="dropcart__actions"><a href="index.php?page=cek_keranjang" class="btn btn-secondary">Lihat Keranjang</a>
        <a href="index.php?page=checkout" class="btn btn-primary">Bayar</a></div>
</div>