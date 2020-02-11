<?php
date_default_timezone_set('Asia/Jakarta');

///koneksi
$koneksi = mysqli_connect("localhost", "root", "", "bst");
$con_pdo = new PDO("mysql:host=localhost;dbname=bst", "root", "");
if (mysqli_connect_errno()) {
	echo mysqli_connect_error();
}
