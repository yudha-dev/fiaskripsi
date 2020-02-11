<?php
session_start();
$_SESSION['id_pelanggan'];
$_SESSION["username"];

unset($_SESSION['id_pelanggan']);
unset($_SESSION["username"]);

session_unset();
session_destroy();
header('Location: index.php');
exit;
