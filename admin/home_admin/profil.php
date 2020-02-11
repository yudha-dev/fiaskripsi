<?php
$data = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user = '" . $_SESSION['id_user'] . "'");
$d = mysqli_fetch_array($data);
?>
<div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(../../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-8"></span>
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
        <div class="row">
            <div class="col-lg-7 col-md-10">
                <h1 class="display-2 text-white">Halo, <?= $d['nama'] ?></h1>
                <p class="text-white mt-0 mb-5">Selamat datang di halaman profil silahkan edit profil anda jika ada data yang salah</p>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-4 order-xl-2">
            <div class="card card-profile">
                <img src="../assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                            <a href="#">
                                <img src="foto_profil/<?php echo $d['foto']; ?>" height="150px" class="rounded-circle">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                    <div class="d-flex justify-content-between">
                        <br><br>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="text-center">
                        <h5 class="h3">
                            <?php echo $d['nama'] ?><span class="font-weight-light"></span>
                        </h5>
                        <div class="h5 font-weight-300">
                            <i class="ni location_pin mr-2"></i><?php echo $d['alamat'] ?>
                        </div>
                        <div class="h5 mt-4">
                            <i class="ni business_briefcase-24 mr-2"></i><?php echo $d['level'] ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 order-xl-1">
            <div class="row">
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Edit profil </h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="" class="btn btn-sm btn-primary">Pengaturan</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="" enctype="multipart/form-data">
                        <h6 class="heading-small text-muted mb-4">Informasi Login</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">Username</label>
                                        <input type="text" name="username" class="form-control" value="<?php echo $d['username'] ?>" required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">Nama Lengkap</label>
                                        <input type="text" name="nama" class="form-control" value="<?php echo $d['nama'] ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <!-- Data Diri -->
                        <h6 class="heading-small text-muted mb-4">Informasi Data Diri</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-address">Alamat</label>
                                        <input id="input-address" class="form-control" name="alamat" value="<?php echo $d['alamat'] ?>" type="text" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-address">Nomor Hp</label>
                                        <input class="form-control" onkeypress="return hanyaAngka(event)" name="no_hp" value="<?php echo $d['no_hp'] ?>" type="text" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Foto -->
                        <h6 class="heading-small text-muted mb-4">Informasi Foto</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-address">Foto Profil</label>
                                        <input type="hidden" name="foto" value="<?php echo $d['foto']; ?>">
                                        <input type="file" class="form-control" name="foto" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-icon btn-primary" type="submit" name="submit">
                            <span class="btn-inner--icon"><i class="ni ni-check-bold"></i></span>
                            <span class="btn-inner--text">Simpan</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    require "../../koneksi/koneksi.php";
    if (isset($_POST['submit'])) {        //Jika tombol submit di klik
        //Kirim data dari form
        $username = $_POST['username'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['no_hp'];
        $foto = $_FILES['foto']['tmp_name'];    //Query update foto
        $foto_name = $_FILES['foto']['name'];
        $acak = rand(1, 99);
        $tujuan_foto = $acak . $foto_name;
        $tempat_foto = '../foto_profil/' . $tujuan_foto;
        if (!$foto == "") {
            $buat_foto = $tujuan_foto;
            $d = '../foto_profil/' . $foto;
            @unlink("$d");
            copy($foto, $tempat_foto);
        } else {
            $buat_foto = $foto;
        }
        //Query update profil
        $query = mysqli_query($koneksi, "UPDATE user SET username = '$username', nama = '$nama', alamat = '$alamat', no_hp='$no_hp', foto = '$buat_foto' WHERE id_user = '" . $_SESSION['id_user'] . "'");
        echo "<script>alert('Profil berhasil di edit');</script>";
        echo "<script>window.location='index.php?page=profil';</script>"; ?>
    <?php } ?>