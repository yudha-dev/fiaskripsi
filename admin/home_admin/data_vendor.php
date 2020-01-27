    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Data Vendor</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="?page=dashboard"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Vendor</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data Vendor</li>
                            </ol>
                        </nav>
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
                                    <th>Username</th>
                                    <th>Nama Vendor</th>
                                    <th>Alamat</th>
                                    <th>No Hp</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Perulangan data Pelanggan -->
                                <?php include '../../koneksi/koneksi.php';
                                // Nomor urut
                                $no = 1;
                                //Query ambil data dari vendor
                                $data = mysqli_query($koneksi, "SELECT * FROM vendor ");
                                //perulanggan data/looping
                                while ($d = mysqli_fetch_array($data)) {
                                ?>
                                    <!-- Tampilkan ke dalam table -->
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $d['username'] ?></td>
                                        <td><?= $d['nama_vendor'] ?></td>
                                        <td><?= $d['alamat'] ?></td>
                                        <td><?= $d['no_hp'] ?></td>
                                        <td><?= $d['foto'] ?></td>
                                        <td><a href="#" type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal<?= $d['id_vendor']; ?>">Edit</a>
                                            <a href="hapus_vendor.php?id=<?php echo $d['id_vendor'] ?>" class="btn btn-danger btn-xs waves-effect waves-light"> Hapus</a></td>
                                    </tr>

                                    <!-- form modal edit data -->
                                    <div id="myModal<?php echo $d['id_vendor']; ?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit data kategori</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="edit_vendor.php" method="post" role="form">
                                                    <!-- Query ambil data dari tabel vendor -->
                                                    <?php
                                                    $id = $d['id_vendor'];
                                                    $query = mysqli_query($koneksi, "SELECT * FROM vendor WHERE id_vendor = $id");
                                                    // perulangan dari tabel vendor
                                                    while ($vendor = mysqli_fetch_array($query)) {
                                                    ?>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="hidden" name="id_vendor" value="<?php echo $vendor['id_vendor']; ?>">
                                                                    <div class="form-group">
                                                                        <label class="form-control-label" for="input">Username</label>
                                                                        <input class="form-control" type="text" name="username" value="<?= $vendor['username'] ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-control-label" for="input">Nama Vendor</label>
                                                                        <input class="form-control" type="text" name="nama_vendor" value="<?= $vendor['nama_vendor'] ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-control-label" for="input">Alamat</label>
                                                                        <input class="form-control" type="text" name="alamat" value="<?= $vendor['alamat'] ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-control-label" for="input">Nomor HP</label>
                                                                        <input class="form-control" type="text" name="no_hp" value="<?= $vendor['no_hp'] ?>">
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