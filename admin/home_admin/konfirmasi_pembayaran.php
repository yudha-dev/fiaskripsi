  <!-- Header -->
  <div class="header bg-primary pb-6">
      <div class="container-fluid">
          <div class="header-body">
              <div class="row align-items-center py-4">
                  <div class="col-lg-6 col-7">
                      <h6 class="h2 text-white d-inline-block mb-0">Konfirmasi Pembayaran</h6>
                      <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                          <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                              <li class="breadcrumb-item"><a href="?page=dashboard"><i class="fas fa-home"></i></a></li>
                              <li class="breadcrumb-item"><a href="#">konfirmasi</a></li>
                              <li class="breadcrumb-item active" aria-current="page">Data Pembayaran</li>
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
                                  <th>Nama Pelanggan</th>
                                  <th>Nama Paket</th>
                                  <th>Nomor Rekening Pelanggan</th>
                                  <th>Nama Rekening Pelanggan</th>
                                  <th>Nama Bank Pelanggan</th>
                                  <th>Nama Bank Tujuan</th>
                                  <th>Jumlah Transfer</th>
                                  <th>Tanggal Transfer</th>
                                  <th>Bukti Transfer</th>
                                  <th>Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              <!-- Perulangan data Pelanggan -->
                              <?php include '../../koneksi/koneksi.php';
                                $no = 1; // Nomor urut
                                // query join table detai pemesanan,pemesanan,pelanggan,paket pernikahan
                                $data = mysqli_query($koneksi, "SELECT * FROM detail_pemesanan INNER JOIN pemesanan ON detail_pemesanan.id_pemesanan = pemesanan.id_pemesanan INNER JOIN pelanggan ON detail_pemesanan.id_pelanggan = pelanggan.id_pelanggan INNER JOIN paket_pernikahan ON pemesanan.kode_paket = paket_pernikahan.kode_paket WHERE pemesanan.status = 'Pembayaran Diverifikasi' GROUP BY detail_pemesanan.id_detailp ");
                                while ($d = mysqli_fetch_array($data)) {
                                ?>
                                  <tr>
                                      <td><?= $no++; ?></td>
                                      <td><?= $d['nama'] ?></td>
                                      <td><?= $d['nama_paket'] ?></td>
                                      <td><?= $d['nomor_rek'] ?></td>
                                      <td><?= $d['nama_rek'] ?></td>
                                      <td><?= $d['nama_bank'] ?></td>
                                      <td><?= $d['nama_bank_tujuan'] ?></td>
                                      <td>Rp. <?= number_format($d['jumlah_tf'], 0, ".", ".") ?></td>
                                      <td><?= date('d F Y', strtotime($d['tanggal_tf'])) ?></td>
                                      <td><a href="../../pelanggan/bukti_tf/<?php echo $d['bukti_tf']; ?>" target="blank">
                                              <img src="../../pelanggan/bukti_tf/<?php echo $d['bukti_tf']; ?>" width="70px" height="70px">
                                          </a>
                                      </td>
                                      <td>
                                          <a href="konfirmasi.php?id=<?php echo $d['id_pemesanan'] ?>" type="button" class="btn btn-success btn-xs">Konfirmasi</a>
                                      </td>
                                  </tr>
                              <?php } ?>
                          </tbody>
                      </table>
                  </div>
              </div>