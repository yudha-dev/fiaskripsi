<?php 
	session_start();
	$_SESSION["id_user"];
	$_SESSION["username"];
	$_SESSION["level"];

	unset($_SESSION["id_user"]);
	unset($_SESSION["username"]);
	unset($_SESSION["level"]);

	session_unset();
	session_destroy();

	header("location:../index.php");
 ?>