    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Data Pelanggan</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="?page=dashboard"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Pelanggan</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data Pelanggan</li>
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
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Nomor HP</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Perulangan data Pelanggan -->
                  <?php include '../../koneksi/koneksi.php';
                  $no = 1; // Nomor urut
                  $data = mysqli_query($koneksi, "SELECT * FROM pelanggan ");
                  while ($d = mysqli_fetch_array($data)) {
                  ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $d['nama'] ?></td>
                      <td><?= $d['alamat'] ?></td>
                      <td><?= $d['no_hp'] ?></td>
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
                  <h5 class="modal-title">Tambah data pelanggan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="tambah_pelanggan.php" method="post" name="Tambah" role="form">
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="form-control-label" for="input-address">Nama Lengkap</label>
                          <input class="form-control" name="nama" type="text" placeholder="Masukan nama lengkap" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="form-control-label" for="input-address">Alamat</label>
                          <textarea class="form-control" name="alamat" placeholder="Masukan alamat lengkap" rows="3"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="form-control-label" for="input-address">Nomor Hp</label>
                          <input class="form-control" onkeypress="return hanyaAngka(event)" name="no_hp" placeholder="Masukan nomor hp" type="text" required>
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