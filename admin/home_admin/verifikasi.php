    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Verifikasi Vendor</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="?page=dashboard"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Verifikasi</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data Verifikasi</li>
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
                                    <th>Nama vendor</th>
                                    <th>Alamat</th>
                                    <th>Nomor HP</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Perulangan data Pelanggan -->
                                <?php include '../../koneksi/koneksi.php';
                                $no = 1; // Nomor urut
                                $data = mysqli_query($koneksi, "SELECT * FROM vendor WHERE aktif = 0");
                                while ($d = mysqli_fetch_array($data)) {
                                    ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $d['username'] ?></td>
                                        <td><?= $d['nama_vendor'] ?></td>
                                        <td><?= $d['alamat'] ?></td>
                                        <td><?= $d['no_hp'] ?></td>
                                        <td>
                                            <a href="terima_vendor.php?id=<?php echo $d['id_vendor'] ?>" class="btn btn-primary btn-xs">Terima</a>
                                            <a href="tolak_vendor.php?id=<?php echo $d['id_vendor'] ?>" class="btn btn-danger btn-xs waves-effect waves-light"> Tolak</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>