    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Data Jasa Acara</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="?page=dashboard"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Jasa Acara</a></li>
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
                                    <th>Nama Jasa Acara</th>
                                    <th>Harga</th>
                                    <th>Keterangan</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Perulangan data Pelanggan -->
                                <?php include '../../koneksi/koneksi.php';
                                $no = 1; // Nomor urut
                                $data = mysqli_query($koneksi, "SELECT * FROM jasa_acara ");
                                while ($d = mysqli_fetch_array($data)) {
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $d['nama_jasa_acara'] ?></td>
                                        <td><?= $d['harga'] ?></td>
                                        <td><a href="#" type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal<?= $d['id_kategori']; ?>">Edit</a></td>
                                    </tr>

                                    <!-- form modal edit data -->
                                    <div id="myModal<?php echo $d['id_kategori']; ?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit data kategori</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="edit_kategori.php" method="post" role="form">
                                                    <?php
                                                    $id = $d['id_kategori'];
                                                    $query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori = $id");
                                                    while ($kategori = mysqli_fetch_array($query)) {
                                                    ?>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="hidden" name="id_kat" value="<?php echo $kategori['id_kategori']; ?>">
                                                                    <div class="form-group">
                                                                        <label class="form-control-label" for="input-address">Nama Kategori</label>
                                                                        <input class="form-control" name="nama_kategori" type="text" value="<?php echo $kategori['nama_kategori']; ?>" required>
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
                                <h5 class="modal-title">Tambah jasa acara</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="tambah_jasa_acara.php" method="post" name="Tambah" role="form" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-harga">Nama Jasa Acara</label>
                                                <input class="form-control" name="nama_jasa" type="text" placeholder="Masukan nama jasa acara" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-harga">Harga</label>
                                                <input class="form-control" id="uang" name="harga" type="text" placeholder="Masukan harga" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-harga">Keterangan</label>
                                                <textarea id="kontrak" class="form-control" name="keterangan"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-harga">Foto</label>
                                                <input class="form-control" name="foto" type="file" required>
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
                <script type='text/javascript'>
                    tinymce.init({
                        selector: 'textarea#kontrak',
                        height: 200,
                        menubar: false,
                        force_br_newlines: true,
                        plugins: [
                            'advlist autolink lists link image charmap print preview anchor',
                            'searchreplace visualblocks code fullscreen',
                            'insertdatetime media table paste code help wordcount'
                        ],
                        toolbar: 'undo redo | formatselect | ' +
                            ' bold italic backcolor | alignleft aligncenter ' +
                            ' alignright alignjustify | bullist numlist outdent indent |' +
                            ' removeformat | help',
                        content_css: [
                            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                            '//www.tiny.cloud/css/codepen.min.css'
                        ],
                    });
                </script>