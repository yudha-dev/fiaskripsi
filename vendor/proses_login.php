<?php
session_start();
//panggil koneksi
include '../koneksi/koneksi.php';
//ambil post dari form input
$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password = mysqli_real_escape_string($koneksi, $_POST['password']);
//query login
$masuk = mysqli_query($koneksi, "SELECT * FROM vendor WHERE username = '$username' AND password = '$password'");
//cek data
$cek = mysqli_num_rows($masuk);
//jika data benar
if ($cek > 0) {
    $data = mysqli_fetch_assoc($masuk);
    //jika database benar dari vendor buat session
    if ($data == true) {
        $_SESSION["id_vendor"] = $data["id_vendor"];
        $_SESSION['username'] = $username;
        //alihkan ke folder vendor
        header("location:home?page=dashboard");
    }
} else {
    //jika data salah
    echo "<script>alert('Login gagal cek username password anda');
	window.location.href='index.php';
	</script>";
}
