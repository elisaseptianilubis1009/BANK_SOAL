<?php 
	session_start();
	// if (isset($_GET["id"])) {
		include 'koneksi.php';
		$CEK=$_GET['id'];
		$tb=$_GET['tb'];
		$conection->query("DELETE FROM $tb WHERE id_soal='$CEK'");		
	// }
	header("location:soal.php");
	exit();
?>