  // input angka saja
  function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))

          return false;
      return true;
  }
  //format rupiah
  var rupiah = document.getElementById("rupiah");
  if (rupiah) {
      rupiah.addEventListener("keyup", function (e) {
          // tambahkan 'Rp.' pada saat form di ketik
          // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
          rupiah.value = formatRupiah(this.value, "Rp. ");
      });
  }
  /* Fungsi formatRupiah */
  function formatRupiah(angka, prefix) {
      var number_string = angka.replace(/[^,\d]/g, "").toString(),
          split = number_string.split(","),
          sisa = split[0].length % 3,
          rupiah = split[0].substr(0, sisa),
          ribuan = split[0].substr(sisa).match(/\d{3}/gi);

      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if (ribuan) {
          separator = sisa ? "." : "";
          rupiah += separator + ribuan.join(".");
      }

      rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
      return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
  }
  //format rupiah
  var uang = document.getElementById("uang");
  if (uang) {
      uang.addEventListener("keyup", function (e) {
          // tambahkan 'Rp.' pada saat form di ketik
          // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
          uang.value = formatUang(this.value, "Rp. ");
      });
  }
  /* Fungsi formatRupiah */
  function formatUang(nomor, prefix) {
      var number_string = nomor.replace(/[^,\d]/g, "").toString(),
          split = number_string.split(","),
          lebih = split[0].length % 3,
          uang = split[0].substr(0, lebih),
          rb = split[0].substr(lebih).match(/\d{3}/gi);

      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if (rb) {
          separator = lebih ? "." : "";
          uang += separator + rb.join(".");
      }

      uang = split[1] != undefined ? uang + "," + split[1] : uang;
      return prefix == undefined ? uang : uang ? "Rp. " + uang : "";
  }