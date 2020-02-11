<?php
session_start();
//panggil koneksi
include '../koneksi/koneksi.php';
//ambil post dari form input
$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password = mysqli_real_escape_string($koneksi, $_POST['password']);
//query login
$masuk = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE username = '$username' AND password = '$password'");
//cek data
$cek = mysqli_num_rows($masuk);
//jika data benar
if ($cek > 0) {
    $data = mysqli_fetch_assoc($masuk);
    //alihkan ke folder admin
    if ($data['username'] == $username and $data['password'] == $password) {
        $_SESSION["id_pelanggan"] = $data["id_pelanggan"];
        $_SESSION['username'] = $username;
        if (isset($_SERVER['HTTP_REFERER'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            header('Location: index.php');
        }
    }
    //jika salah
} else {
    echo "<script>alert('Login gagal cek username password anda');
	window.location.href='index.php';
	</script>";
}
