    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Data Ongkos Kirim</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="?page=dashboard"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Ongkos Kirim</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data Ongkos Kirim</li>
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
                                    <th>Nama Kota</th>
                                    <th>Ongkos Kirim</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Perulangan data Pelanggan -->
                                <?php include '../../koneksi/koneksi.php';
                                $no = 1; // Nomor urut
                                $data = mysqli_query($koneksi, "SELECT * FROM ongkir ");
                                while ($d = mysqli_fetch_array($data)) {
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $d['nama_kota'] ?></td>
                                        <td>Rp. <?= number_format($d['ongkos_kirim'], 0, ".", ".") ?></td>
                                        <td><a href="#" type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal<?= $d['id_ongkir']; ?>">Edit</a></td>
                                    </tr>

                                    <!-- form modal edit data -->
                                    <div id="myModal<?php echo $d['id_ongkir']; ?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit data ongkir</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="edit_ongkir.php" method="post" role="form">
                                                    <?php
                                                    $id = $d['id_ongkir'];
                                                    $query = mysqli_query($koneksi, "SELECT * FROM ongkir WHERE id_ongkir = $id");
                                                    while ($kota = mysqli_fetch_array($query)) {
                                                    ?>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="hidden" name="id_ongkir" value="<?php echo $kota['id_ongkir']; ?>">
                                                                    <div class="form-group">
                                                                        <label class="form-control-label" for="input-address">Nama Kota</label>
                                                                        <input class="form-control" name="nama_kota" type="text" value="<?php echo $kota['nama_kota']; ?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-control-label" for="input-address">Ongkos Kirim</label>
                                                                        <input class="form-control" id="uang" name="ongkos_kirim" type="text" value="Rp. <?= number_format($kota['ongkos_kirim'], 0, ".", ".") ?>" required>
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
                                <h5 class="modal-title">Tambah data ongkos kirim</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="tambah_ongkir.php" method="post" name="Tambah" role="form">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-harga">Nama Kota</label>
                                                <input class="form-control" name="nama_kota" type="text" placeholder="Masukan nama kota" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-harga">Ongkos Kirim</label>
                                                <input class="form-control" id="uang" name="ongkos_kirim" type="text" placeholder="Masukan ongkos kirim" required>
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