<div class="card-table">
    <div class="table-responsive-sm">
        <table>
            <thead>
                <tr>
                    <th>Nama Paket</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $order = mysqli_query($koneksi, "SELECT * FROM pemesanan INNER JOIN paket_pernikahan ON pemesanan.kode_paket = paket_pernikahan.kode_paket WHERE status = 'Belum Dibayar' AND id_pelanggan = '" . $_SESSION['id_pelanggan'] . "' GROUP BY id_pemesanan");
                while ($o = mysqli_fetch_array($order)) {
                    $ongkir = $o['ongkir'];
                    $harga = $o['total_harga'];
                    $total = $ongkir + $harga;
                ?>
                    <tr>
                        <td><a href="#"><?= $o['nama_paket'] ?></a></td>
                        <td><?= date('d F Y', strtotime($o['tanggal'])) ?></td>
                        <td><?= $o['status'] ?></td>
                        <td>Rp. <?= number_format($total, 0, ".", ".") ?></td>
                        <td><a href="?page=konfirmasi_pembayaran&id=<?php echo $o['id_pemesanan'] ?>" class="btn btn-primary btn-xs">Konfirmasi Pembayaran</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<div class="card-divider"></div>
<div class="card-footer">
    <ul class="pagination">
        <li class="page-item disabled"><a class="page-link page-link--with-arrow" href="#" aria-label="Previous"><span class="page-link__arrow page-link__arrow--left" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="7" height="11">
                        <path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z" />
                    </svg></span></a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item active" aria-current="page"><span class="page-link">2 <span class="sr-only">(current)</span></span></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">4</a></li>
        <li class="page-item page-item--dots">
            <div class="pagination__dots"></div>
        </li>
        <li class="page-item"><a class="page-link" href="#">9</a></li>
        <li class="page-item">
            <a class="page-link page-link--with-arrow" href="#" aria-label="Next">
                <span class="page-link__arrow page-link__arrow--right" aria-hidden="true">
                    <svg xmlns="http://www.w3.org/2000/svg" width="7" height="11">
                        <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9
    C-0.1,9.8-0.1,10.4,0.3,10.7z" /></svg>
                </span></a></li>
    </ul>
</div>
</div>
</div>
</div>
</div>
</div>