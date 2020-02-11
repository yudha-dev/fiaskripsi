    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Data Kontrak Vendor</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="?page=dashboard"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Kontrak</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Kontrak Vendor</li>
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
                                    <th>Tanggal Daftar</th>
                                    <th>Keuntungan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php include '../../koneksi/koneksi.php';
                                // Nomor urut
                                $no = 1;
                                //Query join dari table  kategori_catering dengan vendor
                                $data = mysqli_query($koneksi, "SELECT kontrak_kerja.id_kontrak_k,kontrak_kerja.id_vendor,kontrak_kerja.tanggal,kontrak_kerja.keuntungan,vendor.id_vendor,vendor.nama_vendor FROM kontrak_kerja INNER JOIN vendor ON kontrak_kerja.id_vendor = vendor.id_vendor");
                                while ($d = mysqli_fetch_array($data)) {
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $d['nama_vendor'] ?></td>
                                        <td><?= date('d F Y', strtotime($d['tanggal'])); ?></td>
                                        <td><?= $d['keuntungan'] ?>%</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>