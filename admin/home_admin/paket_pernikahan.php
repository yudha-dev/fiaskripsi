<?php
include '../../koneksi/koneksi.php';
function jasa($con_pdo)
{
  $output = '';
  $query = "SELECT jasa.id_jasa,jasa.id_vendor,jasa.nama_jasa,vendor.id_vendor,vendor.nama_vendor FROM jasa INNER JOIN vendor ON jasa.id_vendor = vendor.id_vendor";
  $statement = $con_pdo->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach ($result as $row) {
    $output .= '<option value="' . $row["id_jasa"] . '">' . $row["nama_jasa"] . ' (' . $row["nama_vendor"] . ')</option>';
  }
  return $output;
}

?>
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
            <span id="error"></span>
            <thead class="thead-light">
              <tr>
                <th>No</th>
                <th>Nama Paket</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <!-- Perulangan data Pelanggan -->
              <?php
              $no = 1; // Nomor urut
              //query join paket dan semua kategori dan vendor
              $data = mysqli_query($koneksi, "SELECT paket_pernikahan.id_pp,paket_pernikahan.id_jasa,paket_pernikahan.kode_paket,paket_pernikahan.nama_paket,jasa.nama_jasa,SUM(jasa.harga) AS total,jasa.keterangan FROM paket_pernikahan INNER JOIN jasa ON paket_pernikahan.id_jasa = jasa.id_jasa GROUP BY nama_paket");
              while ($d = mysqli_fetch_array($data)) {
              ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $d['nama_paket'] ?></td>
                  <td><a href="#" type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal<?= $d['kode_paket']; ?>">Detail</a>
                    <?php include('detail_paket_pernikahan.php'); ?>
                  </td>
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
            <form id="insert_form" method="post" name="Tambah" role="form">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-control-label" for="input-address">Nama Paket</label>
                      <input class="form-control" name="nama_paket" type="text" placeholder="Masukan nama paket" required>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="form-control-label" for="input-address">Pilih Jasa Dan Vendor</label>
                      <select class="form-control" name="jasa[]" required>
                        <option value="">--Pilih Jasa Paket--</option>
                        <?php
                        //Masukan data jasa
                        $jasa = mysqli_query($koneksi, "SELECT jasa.id_jasa,jasa.id_vendor,jasa.nama_jasa,vendor.id_vendor,vendor.nama_vendor FROM jasa INNER JOIN vendor ON jasa.id_vendor = vendor.id_vendor");
                        //perulangan data
                        while ($da = mysqli_fetch_array($jasa)) {
                        ?>
                          <option value="<?= $da['id_jasa'] ?>"><?= $da['nama_jasa'] ?> ( <?= $da['nama_vendor'] ?> )</option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <div id="item_table">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <button type="button" name="add" class="btn btn-success btn-block add"><span class="fas fa-plus"></span> Tambah Jasa</button>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <input type="submit" name="submit" class="btn btn-outline-primary" value="Simpan" id="submit">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>
            </form>
          </div>
        </div>
      </div>
      <script>
        $(document).ready(function() {

          $(document).on('click', '.add', function() {
            var html = '';
            html += '<tr>';
            html += '<td><label class="form-control-label">Tambah Jasa Dan Vendor</label><select name="jasa[]" class="form-control jasa"><option value="">--Pilih Jasa Paket--</option><?php echo jasa($con_pdo); ?></select></td>';
            html += '<td>&nbsp;&nbsp;</td>';
            html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="fa fa-times"></span></button></td></tr>';
            $('#item_table').append(html);
          });

          $(document).on('click', '.remove', function() {
            $(this).closest('tr').remove();
          });
          $('#insert_form').on('submit', function(event) {
            event.preventDefault();
            var error = '';

            $('.jasa').each(function() {
              var count = 1;
              if ($(this).val() == '') {
                error += "<p>Select Unit at " + count + " Row</p>";
                return false;
              }
              count = count + 1;
            });
            var form_data = $(this).serialize();
            if (error == '') {
              $.ajax({
                url: "tambah_paket_pernikahan.php",
                method: "POST",
                data: form_data,
                success: function(data) {
                  if (data == false) {
                    window.location.href = 'index.php?page=paket_pernikahan';
                  } else {
                    $('#error').html(data);
                  }
                }
              });
            } else {
              alert("Jasa tidak boleh kosong");
            }
          });

        });
      </script>