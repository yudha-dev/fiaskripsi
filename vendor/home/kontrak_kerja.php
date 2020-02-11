<?php
include "../../koneksi/koneksi.php";
$id = $_SESSION['id_vendor'];
?>
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<?php
//ambil data dari table
$query = mysqli_query($koneksi, "SELECT * FROM keuntungan_ks");
$data = mysqli_fetch_array($query);
?>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="align-center">
            <div class="card">
                <div class="card-header bg-transparent">
                    <h3 class="mb-0 badge badge-pill badge-danger"><?= $data['nama_kon'] ?></h3>
                </div>
                <div class="card-body">
                    <div class="timeline-block">
                        <div class="align-center">
                            <h5 id="kontrak"><?= $data['ket'] ?></h5>
                        </div>
                    </div>
                    <div class="col-lg-2 center">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah-modal">Setuju</button>
                        <a href="logout.php"><button type="button" class="btn btn-danger">Tidak</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- form modal tambah data -->
<div id="tambah-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi kontrak kerja</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="tambah_kontrak.php" method="post" name="Tambah" role="form">
                <?php
                $q = mysqli_query($koneksi, "SELECT * FROM vendor WHERE id_vendor = $id");
                // perulangan dari tabel vendor
                $v = mysqli_fetch_array($q);
                ?>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="id_vendor" value="<?= $id ?>">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="input-address">Nama Vendor</label>
                                <input class="form-control" type="text" value="<?= $v['nama_vendor'] ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="input-address">Alamat</label>
                                <textarea class="form-control" rows="3" readonly><?= $v['alamat'] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="input-address">Nomor Hp</label>
                                <input class="form-control" type="text" value="<?= $v['no_hp'] ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="form-control-label" for="input-address">Tanggal</label>
                                <input class="form-control" type="date" id="tanggal" name="tanggal">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-percent"></i></span>
                                    </div>
                                    <input class="form-control" name="keuntungan" placeholder="Masukan fee yang di inginkan" onkeypress="return hanyaAngka(event)" type="text">
                                </div>
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
<!-- Close modal -->
<script type='text/javascript'>
    tinymce.init({
        selector: "kontrak", // tinymce js
        plugins: "fullpage",
        menubar: "file",
        toolbar: "fullpage"
    });
    var today = new Date();
    var dd = ("0" + (today.getDate())).slice(-2);
    var mm = ("0" + (today.getMonth() + 1)).slice(-2);
    var yyyy = today.getFullYear();
    today = yyyy + '-' + mm + '-' + dd;
    $("#tanggal").attr("value", today);
</script>