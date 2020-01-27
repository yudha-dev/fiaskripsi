<?php
date_default_timezone_set('Asia/Jakarta');

///koneksi
$koneksi = mysqli_connect("localhost", "root", "", "fia");
if (mysqli_connect_errno()) {
	echo mysqli_connect_error();
}
