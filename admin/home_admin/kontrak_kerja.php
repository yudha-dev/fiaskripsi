    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Data Kontrak</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="?page=dashboard"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Kontrak</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data Kontrak</li>
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
                                    <th>Nama Kontrak</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php include '../../koneksi/koneksi.php';
                                // Nomor urut
                                $no = 1;
                                //Query join dari table  kategori_catering dengan vendor
                                $data = mysqli_query($koneksi, "SELECT * FROM keuntungan_ks");
                                while ($d = mysqli_fetch_array($data)) {
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $d['nama_kon'] ?></td>
                                        <td><?= nl2br(str_replace(' ', '  ', ($d['keterangan']))) ?></td>
                                        <td><a href="#" type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal<?= $d['id_keuntungan_ks']; ?>">Edit</a></td>
                                    </tr>
                                    <!-- form modal edit data -->
                                    <div id="myModal<?php echo $d['id_keuntungan_ks']; ?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit kontrak kerja</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="edit_kontrak.php" method="post" role="form">
                                                    <!-- Query ambil data dari tabel vendor -->
                                                    <?php
                                                    $id = $d['id_keuntungan_ks'];
                                                    $query = mysqli_query($koneksi, "SELECT * FROM keuntungan_ks WHERE id_keuntungan_ks = $id");
                                                    // perulangan dari tabel vendor
                                                    while ($kontrak = mysqli_fetch_array($query)) {
                                                    ?>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="hidden" name="id_keuntungan_ks" value="<?php echo $kontrak['id_keuntungan_ks']; ?>">
                                                                    <div class="form-group">
                                                                        <label class="form-control-label" for="input">Nama kontrak</label>
                                                                        <input class="form-control" type="text" name="nama_kon" value="<?= $kontrak['nama_kon'] ?>">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="form-control-label" for="input-harga">Keterangan Kontrak</label>
                                                                        <textarea id="kontrak" class="form-control" name="keterangan" required>
                                                                            <?= $kontrak['keterangan'] ?>
                                                                        </textarea>
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
                                <h5 class="modal-title">Tambah kontrak kerja</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="tambah_kontrak.php" method="post" name="Tambah" role="form" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-harga">Nama Kontrak Kerja</label>
                                                <input class="form-control" name="nama_kon" type="text" placeholder="Masukan nama kontrak kerja" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-harga">Keterangan Kontrak</label>
                                                <textarea id="kontrak" class="form-control" name="keterangan" required>
                                                <p style="text-align: center;">
                                                    <a href="https://imgbb.com/"><img src="https://i.ibb.co/3f9T4yQ/blue.png" alt="blue"  width="110" height="70" style="opacity:0.5;filter:alpha(opacity=50);" border="0"></a>
                                                </p>

                                                <h2 style="text-align: center;"><b>PERJANJIAN KERJA BST PROJECT DAN VENDOR (KONTRAK)</b></h2>
                                                <h6><b>Kudus, </b></h6>
                                                </textarea>
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
                        height: 300,
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
                        ]
                    });
                </script>