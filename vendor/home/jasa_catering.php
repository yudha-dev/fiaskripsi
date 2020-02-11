    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Data Jasa</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="?page=dashboard"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Jasa</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data Jasa</li>
                            </ol>
                        </nav>
                    </div>
                    <div id="tambah_data" class="col-lg-6 col-5 text-right">
                        <button type="button" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#tambah-modal">Tambah Data</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <!-- Table -->
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="table-responsive py-4">
                        <table class="table table-flush" id="datatable-basic">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Keterangan</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Perulangan data Pelanggan -->
                                <?php include '../../koneksi/koneksi.php';
                                // Nomor urut
                                $no = 1;
                                //Query join jasa, kategori, vendor panggil kondisi dengan where session
                                $data = mysqli_query($koneksi, "SELECT jasa.id_jasa,jasa.id_kategori,jasa.id_vendor,jasa.keterangan,jasa.harga,kategori.id_kategori,kategori.nama_kategori,vendor.id_vendor FROM jasa INNER JOIN kategori ON jasa.id_kategori = kategori.id_kategori INNER JOIN vendor ON jasa.id_vendor = vendor.id_vendor WHERE vendor.id_vendor = '" . $_SESSION['id_vendor'] . "' ");
                                //perulanggan data/looping
                                while ($d = mysqli_fetch_array($data)) {
                                ?>
                                    <!-- Tampilkan ke dalam table -->
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $d['nama_kategori'] ?></td>
                                        <td><?= nl2br(htmlspecialchars($d['keterangan'])) ?></td>
                                        <td>Rp <?= number_format($d['harga'], 0, ".", ".") ?></td>
                                        <td><a href="#" type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal<?= $d['id_jasa']; ?>">Edit</a>
                                            <a href="hapus_jasa.php?id=<?php echo $d['id_jasa'] ?>" class="btn btn-danger btn-xs waves-effect waves-light"> Hapus</a></td>
                                    </tr>

                                    <!-- form modal edit data -->
                                    <div id="myModal<?php echo $d['id_jasa']; ?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit data jasa</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="edit_jasa.php" method="post" role="form">
                                                    <!-- Query ambil data dari tabel jasa -->
                                                    <?php
                                                    $id = $d['id_jasa'];
                                                    $query = mysqli_query($koneksi, "SELECT jasa.id_jasa,jasa.id_kategori,jasa.id_vendor,jasa.keterangan,jasa.harga,kategori.id_kategori,kategori.nama_kategori,vendor.id_vendor FROM jasa INNER JOIN kategori ON jasa.id_kategori = kategori.id_kategori INNER JOIN vendor ON jasa.id_vendor = vendor.id_vendor WHERE vendor.id_vendor = '" . $_SESSION['id_vendor'] . "' AND id_jasa = $id");
                                                    // perulangan dari tabel jasa
                                                    while ($jasa = mysqli_fetch_array($query)) {
                                                    ?>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="hidden" name="id_jasa" value="<?php echo $jasa['id_jasa']; ?>">
                                                                    <div class="form-group">
                                                                        <label class="form-control-label" for="exampleFormControlSelect1">Kategori</label>
                                                                        <select name="kategori" class="form-control" id="exampleFormControlSelect1">
                                                                            <option value="<?= $jasa['id_kategori'] ?>"><?= $jasa['nama_kategori'] ?></option>
                                                                            <?php
                                                                            $query = mysqli_query($koneksi, "SELECT * FROM kategori");
                                                                            while ($kategori = mysqli_fetch_array($query)) {
                                                                            ?>
                                                                                <option value="<?= $kategori['id_kategori'] ?>"> <?= $kategori['nama_kategori'] ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-control-label" for="exampleFormControlTextarea1">Keterangan</label>
                                                                        <textarea class="form-control" name="keterangan" id="exampleFormControlTextarea1" rows="3"><?= htmlspecialchars($jasa['keterangan']) ?></textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-control-label" for="input-address">Harga</label>
                                                                        <input class="form-control" id="rupiah" name="harga" type="text" value="Rp. <?= number_format($jasa['harga'], 0, ".", ".") ?>" required>
                                                                        <small><b>Harga yang anda masukan akan ditambah ppn 10%</b></small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-outline-primary">Simpan</button>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                                        </div>
                                                    <?php } ?>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- form modal tambah data -->
                <div id="tambah-modal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah data Jasa</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="tambah_jasa.php" method="post" name="Tambah" role="form">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="exampleFormControlSelect1">Kategori</label>
                                                <select name="kategori" class="form-control" id="exampleFormControlSelect1">
                                                    <option value="">Pilih Kategori</option>
                                                    <?php
                                                    $query = mysqli_query($koneksi, "SELECT * FROM kategori");
                                                    while ($kategori = mysqli_fetch_array($query)) {
                                                    ?>
                                                        <option value="<?= $kategori['id_kategori'] ?>"> <?= $kategori['nama_kategori'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="exampleFormControlTextarea2">Keterangan</label>
                                                <textarea class="form-control" name="keterangan" id="exampleFormControlTextarea2" rows="3"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-address">Harga</label>
                                                <input class="form-control" id="uang" name="harga" type="text" placeholder="Masukan harga jasa" required>
                                                <small><b>Harga yang anda masukan akan ditambah ppn 10%</b></small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-outline-primary" value="Simpan" id="submit">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>