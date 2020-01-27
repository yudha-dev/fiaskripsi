    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Data Kategori Catering</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="?page=dashboard"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Kategori</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data Kategori Catering</li>
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
                                    <th>Nama Vendor</th>
                                    <th>Harga</th>
                                    <th>Keterangan</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php include '../../koneksi/koneksi.php';
                                // Nomor urut
                                $no = 1;
                                //Query join dari table  kategori_catering dengan vendor
                                $data = mysqli_query($koneksi, "SELECT kategori_catering.id_catering,kategori_catering.id_vendor,kategori_catering.harga,kategori_catering.ket,kategori_catering.foto_catering,vendor.nama_vendor FROM kategori_catering INNER JOIN vendor ON kategori_catering.id_vendor = vendor.id_vendor");
                                while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $d['nama_vendor'] ?></td>
                                        <td>Rp. <?= number_format($d['harga'], 0, ".", ".") ?></td>
                                        <td><?= nl2br(str_replace(' ', '  ', ($d['ket']))) ?></td>
                                        <td><a href="foto_kategori/foto_catering/<?php echo $d['foto_catering']; ?>" target="blank">
                                                <img src="foto_kategori/foto_catering/<?php echo $d['foto_catering']; ?>" width="100px" height="60px">
                                            </a></td>
                                        <td><a href="hapus_catering.php?id=<?php echo $d['id_catering'] ?>" type="button" class="btn btn-danger btn-xs">Hapus</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- form modal tambah data -->
                <div id="tambah-modal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah data kategori catering</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="tambah_kategori_catering.php" method="post" name="Tambah" role="form" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-address">Nama Vendor</label>
                                                <select class="form-control" name="vendor" id="exampleFormControlSelect1" required>
                                                    <option value="">Pilih Vendor</option>
                                                    <?php
                                                    //Query ambil data vendor
                                                    $vendor = mysqli_query($koneksi, "SELECT * FROM vendor WHERE aktif = 1");
                                                    while ($vd = mysqli_fetch_array($vendor)) {
                                                        ?>
                                                        <option value="<?= $vd['id_vendor'] ?>"><?= $vd['nama_vendor'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-harga">Harga</label>
                                                <input class="form-control" id="uang" name="harga" type="text" placeholder="Masukan harga jasa" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-harga">Keterangan</label>
                                                <textarea class="form-control" name="keterangan" id="exampleFormControlTextarea1" placeholder="Contoh :&#13;&#10;-Makanan&#13;&#10;-Minuman" rows="4" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-harga">Foto</label>
                                                <input class="form-control" name="foto_catering" type="file" required>
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