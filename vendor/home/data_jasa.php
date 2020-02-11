    <?php
    $id = $_SESSION['id_vendor'];
    ?>
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
                                    <th>Nama Jasa</th>
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
                                //perulangan join 3 table
                                $data = mysqli_query($koneksi, "SELECT jasa.id_jasa,jasa.id_kategori,jasa.id_vendor,jasa.nama_jasa,jasa.harga,jasa.keterangan,jasa.foto,kategori.id_kategori,kategori.nama_kategori,vendor.id_vendor FROM jasa INNER JOIN kategori ON jasa.id_kategori = kategori.id_kategori INNER JOIN vendor ON jasa.id_vendor = vendor.id_vendor WHERE vendor.id_vendor = $id ");
                                while ($d = mysqli_fetch_array($data)) {
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $d['nama_kategori'] ?></td>
                                        <td><?= $d['nama_jasa'] ?></td>
                                        <td>Rp. <?= number_format($d['harga'], 0, ".", ".") ?></td>
                                        <td><?= $d['keterangan'] ?></td>
                                        <td><a href="foto_jasa/<?php echo $d['foto']; ?>" target="blank">
                                                <img src="foto_jasa/<?php echo $d['foto']; ?>" width="100px" height="100px">
                                            </a></td>
                                        <td><a href="#" type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal<?= $d['id_jasa']; ?>">Edit</a></td>
                                    </tr>

                                    <!-- form modal edit data -->
                                    <div id="myModal<?php echo $d['id_jasa']; ?>" class="modal fade" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit jasa</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="edit_jasa.php" method="post" role="form" enctype="multipart/form-data">
                                                    <?php
                                                    $id_jasa = $d['id_jasa'];
                                                    $q = mysqli_query($koneksi, "SELECT jasa.id_jasa,jasa.id_kategori,jasa.id_vendor,jasa.nama_jasa,jasa.harga,jasa.keterangan,jasa.foto,kategori.id_kategori,kategori.nama_kategori,vendor.id_vendor FROM jasa INNER JOIN kategori ON jasa.id_kategori = kategori.id_kategori INNER JOIN vendor ON jasa.id_vendor = vendor.id_vendor WHERE jasa.id_jasa = $id_jasa");
                                                    while ($dd = mysqli_fetch_array($q)) {
                                                    ?>
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <input type="hidden" name="id_jasa" value="<?= $dd['id_jasa'] ?>">
                                                                    <div class="form-group">
                                                                        <label class="form-control-label" for="input-address">Nama Kategori</label>
                                                                        <select class="form-control" name="kategori" required>
                                                                            <option value="<?= $dd['id_kategori'] ?>"><?= $dd['nama_kategori'] ?></option>
                                                                            <?php
                                                                            //Masukan data kategori
                                                                            $data1 = mysqli_query($koneksi, "SELECT * FROM kategori");
                                                                            //perulangan data
                                                                            while ($kat = mysqli_fetch_array($data1)) {
                                                                            ?>
                                                                                <option value="<?= $kat['id_kategori'] ?>"><?= $kat['nama_kategori'] ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="form-control-label" for="input-address">Nama Jasa</label>
                                                                        <input class="form-control" name="nama_jasa" value="<?= $dd['nama_jasa'] ?>" type="text" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="form-control-label" for="input-address">Harga</label>
                                                                        <input class="form-control" id="rupiah" name="harga" type="text" value="Rp. <?= number_format($dd['harga'], 0, ".", ".") ?>" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="form-control-label" for="input-harga">Deskripsi</label>
                                                                        <textarea id="keterangan" class="form-control" name="keterangan" required>
                                                                        <?= $dd['keterangan'] ?>
                                                                        </textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label class="form-control-label">Ganti Foto</label>
                                                                        <div class="card" style="width: 7rem;">
                                                                            <img src="foto_jasa/<?php echo $d['foto']; ?>" width="100px" height="100px">
                                                                        </div>
                                                                        <input type="hidden" name="foto_lama" value="<?php echo $dd['foto']; ?>">
                                                                        <input type="file" class="form-control" name="foto">
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
                                <h5 class="modal-title">Tambah data jasa</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="tambah_jasa.php" method="post" name="Tambah" role="form" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="hidden" name="id_vendor" value="<?= $id ?>">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-address">Nama Kategori</label>
                                                <select class="form-control" name="kategori" required>
                                                    <option value="">--Pilih Kategori--</option>
                                                    <?php
                                                    //Masukan data kategori
                                                    $data = mysqli_query($koneksi, "SELECT * FROM kategori");
                                                    //perulangan data
                                                    while ($kat = mysqli_fetch_array($data)) {
                                                    ?>
                                                        <option value="<?= $kat['id_kategori'] ?>"><?= $kat['nama_kategori'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-address">Nama Jasa</label>
                                                <input class="form-control" name="nama_jasa" placeholder="Nama Jasa Anda" type="text" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-address">Harga</label>
                                                <input class="form-control" id="uang" name="harga" type="text" placeholder="Masukan harga jasa" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-harga">Deskripsi</label>
                                                <textarea id="keterangan" class="form-control" name="keterangan" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label">Foto</label>
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
                        selector: 'textarea#keterangan',
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
                        ]
                    });
                </script>