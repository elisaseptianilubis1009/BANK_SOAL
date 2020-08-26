<?php 
	session_start();
	// if (isset($_GET["id"])) {
		include 'koneksi.php';
		$CEK=$_GET['id'];
	
		$conection->query(" FROM $tb WHERE kode_kelas='$CEK'");		
	// }
	header("location:tables-kelas.php");
	exit();
?>