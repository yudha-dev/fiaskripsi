    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Data Paket Pernikahan</h6>
              <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                  <li class="breadcrumb-item"><a href="?page=dashboard"><i class="fas fa-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="#">Paket Pernikahan</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data Paket Pernikahan</li>
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
                    <th>Nama Paket</th>
                    <th>Catering</th>
                    <th>Dekorasi</th>
                    <th>Dokumentasi</th>
                    <th>Hiburan</th>
                    <th>Makeup</th>
                    <th>Mc</th>
                    <th>Harga</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Perulangan data Pelanggan -->
                  <?php include '../../koneksi/koneksi.php';
                  $no = 1; // Nomor urut
                  //query join paket dan semua kategori dan vendor
                  $data = mysqli_query($koneksi, "SELECT paket_pernikahan.id_pp,paket_pernikahan.id_catering,paket_pernikahan.id_dekorasi,paket_pernikahan.id_dokumentasi,paket_pernikahan.id_hiburan,paket_pernikahan.id_makeup,paket_pernikahan.id_mc,paket_pernikahan.nama_paket,paket_pernikahan.harga_paket,kategori_catering.id_catering,kategori_catering.id_vendor,kategori_catering.ket AS ket_catering,kategori_dekorasi.id_dekorasi,kategori_dekorasi.id_vendor,kategori_dekorasi.ket AS ket_dekorasi,kategori_dokumentasi.id_dokumentasi,kategori_dokumentasi.id_vendor,kategori_dokumentasi.ket AS ket_dokumentasi,kategori_hiburan.id_hiburan,kategori_hiburan.id_vendor,kategori_hiburan.ket AS ket_hiburan,kategori_makeup.id_makeup,kategori_makeup.id_vendor,kategori_makeup.ket AS ket_makeup,kategori_mc.id_mc,kategori_mc.id_vendor,kategori_mc.ket AS ket_mc,vendor_catering.id_vendor,vendor_catering.nama_vendor AS catering,vendor_dekor.id_vendor,vendor_dekor.nama_vendor AS dekor,vendor_dokumentasi.id_vendor,vendor_dokumentasi.nama_vendor AS dokumentasi,vendor_hiburan.id_vendor,vendor_hiburan.nama_vendor AS hiburan,vendor_makeup.id_vendor,vendor_makeup.nama_vendor AS makeup,vendor_mc.id_vendor,vendor_mc.nama_vendor AS mc FROM paket_pernikahan INNER JOIN kategori_catering ON paket_pernikahan.id_catering = kategori_catering.id_catering INNER JOIN vendor AS vendor_catering ON kategori_catering.id_vendor = vendor_catering.id_vendor INNER JOIN kategori_dekorasi ON paket_pernikahan.id_dekorasi = kategori_dekorasi.id_dekorasi INNER JOIN vendor AS vendor_dekor ON kategori_dekorasi.id_vendor = vendor_dekor.id_vendor INNER JOIN kategori_dokumentasi ON paket_pernikahan.id_dokumentasi = kategori_dokumentasi.id_dokumentasi INNER JOIN vendor AS vendor_dokumentasi ON kategori_dokumentasi.id_vendor = vendor_dokumentasi.id_vendor INNER JOIN kategori_hiburan ON paket_pernikahan.id_hiburan = kategori_hiburan.id_hiburan INNER JOIN vendor AS vendor_hiburan ON kategori_hiburan.id_vendor = vendor_hiburan.id_vendor INNER JOIN kategori_makeup ON paket_pernikahan.id_makeup = kategori_makeup.id_makeup INNER JOIN vendor AS vendor_makeup ON kategori_makeup.id_vendor = vendor_makeup.id_vendor INNER JOIN kategori_mc ON paket_pernikahan.id_mc = kategori_mc.id_mc INNER JOIN vendor AS vendor_mc ON kategori_mc.id_vendor = vendor_mc.id_vendor");
                  while ($d = mysqli_fetch_array($data)) {
                    ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $d['nama_paket'] ?></td>
                      <td><?= "<b>", $d['catering'], "</b> <br/>", "Keterangan : <br/>", nl2br(str_replace(' ', '  ', ($d['ket_catering']))) ?></td>
                      <td><?= "<b>", $d['dekor'], "</b> <br/>", "Keterangan : <br/>", nl2br(str_replace(' ', '  ', ($d['ket_dekorasi']))) ?></td>
                      <td><?= "<b>", $d['dokumentasi'], "</b> <br/>", "Keterangan : <br/>", nl2br(str_replace(' ', '  ', ($d['ket_dokumentasi']))) ?></td>
                      <td><?= "<b>", $d['hiburan'], "</b> <br/>", "Keterangan : <br/>", nl2br(str_replace(' ', '  ', ($d['ket_hiburan']))) ?></td>
                      <td><?= "<b>", $d['makeup'], "</b> <br/>", "Keterangan : <br/>", nl2br(str_replace(' ', '  ', ($d['ket_makeup']))) ?></td>
                      <td><?= "<b>", $d['mc'], "</b> <br/>", "Keterangan : <br/>", nl2br(str_replace(' ', '  ', ($d['ket_mc']))) ?></td>
                      <td>Rp. <?= number_format($d['harga_paket'], 0, ".", ".") ?></td>
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
                  <h5 class="modal-title">Tambah paket pernikahan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="tambah_paket_pernikahan.php" method="post" name="Tambah" role="form">
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="form-control-label" for="input-address">Nama Paket</label>
                          <input class="form-control" name="nama_paket" type="text" placeholder="Masukan nama paket" required>
                        </div>
                      </div>
                    </div>
                    <!-- Catering -->
                    <div class="form-group">
                      <label class="form-control-label" for="input-address">Catering</label>
                      <select class="form-control" name="catering" id="exampleFormControlSelect1" required>
                        <option value="">Pilih Catering</option>
                        <?php
                        //Query ambil data catering
                        $catering = mysqli_query($koneksi, "SELECT kategori_catering.id_catering,kategori_catering.id_vendor,kategori_catering.harga,kategori_catering.ket,kategori_catering.foto_catering,vendor.nama_vendor FROM kategori_catering INNER JOIN vendor ON kategori_catering.id_vendor = vendor.id_vendor");
                        while ($cat = mysqli_fetch_array($catering)) {
                          ?>
                          <option value="<?= $cat['id_catering'] ?>"><?= $cat['nama_vendor'] ?> (List: <?= $cat['ket'] ?>)</option>
                          <input type="hidden" name="harga_catering" value="<?= $cat['harga'] ?>">
                        <?php } ?>
                      </select>
                    </div>
                    <!-- Dekorasi -->
                    <div class="form-group">
                      <label class="form-control-label" for="input-address">Dekorasi</label>
                      <select class="form-control" name="dekorasi" id="exampleFormControlSelect1" required>
                        <option value="">Pilih Dekorasi</option>
                        <?php
                        //Query ambil data Dekorasi
                        $dekor = mysqli_query($koneksi, "SELECT kategori_dekorasi.id_dekorasi,kategori_dekorasi.id_vendor,kategori_dekorasi.harga,kategori_dekorasi.ket,kategori_dekorasi.foto_dekorasi,vendor.nama_vendor FROM kategori_dekorasi INNER JOIN vendor ON kategori_dekorasi.id_vendor = vendor.id_vendor");
                        while ($dek = mysqli_fetch_array($dekor)) {
                          ?>
                          <option value="<?= $dek['id_dekorasi'] ?>"><?= $dek['nama_vendor'] ?> (List: <?= $dek['ket'] ?>)</option>
                          <input type="hidden" name="harga_dekorasi" value="<?= $dek['harga'] ?>">
                        <?php } ?>
                      </select>
                    </div>
                    <!-- Dokumentasi -->
                    <div class="form-group">
                      <label class="form-control-label" for="input-address">Dokumentasi</label>
                      <select class="form-control" name="dokumentasi" id="exampleFormControlSelect1" required>
                        <option value="">Pilih Dokumentasi</option>
                        <?php
                        //Query ambil data dokumentasi
                        $dokumentasi = mysqli_query($koneksi, "SELECT kategori_dokumentasi.id_dokumentasi,kategori_dokumentasi.id_vendor,kategori_dokumentasi.harga,kategori_dokumentasi.ket,kategori_dokumentasi.foto_dokumentasi,vendor.nama_vendor FROM kategori_dokumentasi INNER JOIN vendor ON kategori_dokumentasi.id_vendor = vendor.id_vendor");
                        while ($dok = mysqli_fetch_array($dokumentasi)) {
                          ?>
                          <option value="<?= $dok['id_dokumentasi'] ?>"><?= $dok['nama_vendor'] ?> (List: <?= $dok['ket'] ?>)</option>
                          <input type="hidden" name="harga_dokumentasi" value="<?= $dok['harga'] ?>">
                        <?php } ?>
                      </select>
                    </div>
                    <!-- Hiburan -->
                    <div class="form-group">
                      <label class="form-control-label" for="input-address">Hiburan</label>
                      <select class="form-control" name="hiburan" id="exampleFormControlSelect1" required>
                        <option value="">Pilih Hiburan</option>
                        <?php
                        //Query ambil data hiburan
                        $hiburan = mysqli_query($koneksi, "SELECT kategori_hiburan.id_hiburan,kategori_hiburan.id_vendor,kategori_hiburan.harga,kategori_hiburan.ket,kategori_hiburan.foto_hiburan,vendor.nama_vendor FROM kategori_hiburan INNER JOIN vendor ON kategori_hiburan.id_vendor = vendor.id_vendor");
                        while ($hib = mysqli_fetch_array($hiburan)) {
                          ?>
                          <option value="<?= $hib['id_hiburan'] ?>"><?= $hib['nama_vendor'] ?> (List: <?= $hib['ket'] ?>)</option>
                          <input type="hidden" name="harga_hiburan" value="<?= $hib['harga'] ?>">
                        <?php } ?>
                      </select>
                    </div>
                    <!-- Make Up -->
                    <div class="form-group">
                      <label class="form-control-label" for="input-address">Make Up</label>
                      <select class="form-control" name="makeup" id="exampleFormControlSelect1" required>
                        <option value="">Pilih Makeup</option>
                        <?php
                        //Query ambil data makeup
                        $makeup = mysqli_query($koneksi, "SELECT kategori_makeup.id_makeup,kategori_makeup.id_vendor,kategori_makeup.harga,kategori_makeup.ket,kategori_makeup.foto_makeup,vendor.nama_vendor FROM kategori_makeup INNER JOIN vendor ON kategori_makeup.id_vendor = vendor.id_vendor");
                        while ($m = mysqli_fetch_array($makeup)) {
                          ?>
                          <option value="<?= $m['id_makeup'] ?>"><?= $m['nama_vendor'] ?> (List: <?= $m['ket'] ?>)</option>
                          <input type="hidden" name="harga_makeup" value="<?= $m['harga'] ?>">
                        <?php } ?>
                      </select>
                    </div>
                    <!-- MC -->
                    <div class="form-group">
                      <label class="form-control-label" for="input-address">MC</label>
                      <select class="form-control" name="mc" id="exampleFormControlSelect1" required>
                        <option value="">Pilih Mc</option>
                        <?php
                        //Query ambil data mc
                        $mcd = mysqli_query($koneksi, "SELECT kategori_mc.id_mc,kategori_mc.id_vendor,kategori_mc.harga,kategori_mc.ket,kategori_mc.foto_mc,vendor.nama_vendor FROM kategori_mc INNER JOIN vendor ON kategori_mc.id_vendor = vendor.id_vendor");
                        while ($mc = mysqli_fetch_array($mcd)) {
                          ?>
                          <option value="<?= $mc['id_mc'] ?>"><?= $mc['nama_vendor'] ?> (List: <?= $mc['ket'] ?>)</option>
                          <input type="hidden" name="harga_mc" value="<?= $mc['harga'] ?>">
                        <?php } ?>
                      </select>
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