<!-- form modal edit data -->
<div id="myModal<?php echo $d['kode_paket']; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">DETAIL DATA <?= $d['nama_paket'] ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-light">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Jasa</th>
                                <th>Harga</th>
                                <th>Vendor</th>
                            </tr>
                        </thead>
                    <tbody>
                        <?php
                        $kode = $d['kode_paket'];
                        $no = 1; // Nomor urut
                        include '../../koneksi/koneksi.php';
                        //query join paket dan semua kategori dan vendor
                        $a = mysqli_query($koneksi, "SELECT paket_pernikahan.id_pp,paket_pernikahan.id_jasa,paket_pernikahan.kode_paket,jasa.id_jasa,jasa.id_vendor,jasa.nama_jasa,jasa.harga,vendor.id_vendor,vendor.nama_vendor FROM paket_pernikahan INNER JOIN jasa ON paket_pernikahan.id_jasa = jasa.id_jasa INNER JOIN vendor ON jasa.id_vendor = vendor.id_vendor WHERE paket_pernikahan.kode_paket = $kode ORDER BY jasa.harga ASC");
                        while ($b = mysqli_fetch_array($a)) {
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $b['nama_jasa'] ?></td>
                                <td>Rp. <?= number_format($b['harga'], 0, ".", ".") ?></td>
                                <td><?= $b['nama_vendor'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th id="total" colspan="2">Total Harga : </th>
                            <td>Rp. <?= number_format($d['total'], 0, ".", ".") ?></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>