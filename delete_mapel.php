<?php 
	session_start();
	// if (isset($_GET["id"])) {
		include 'koneksi.php';
		$CEK=$_GET['id'];
		$tb=$_GET['tb'];
		$conection->query("DELETE FROM $tb WHERE id_mapel='$CEK'");		
	// }
	header("location:index.php?page=Tampil_Mapel");
	exit();
?>