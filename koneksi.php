<?php
	$con="localhost";
	$nm="root";
	$pas="";
	$db="db_bank_soal";
	//$conection=new mysqli($con,$nm,$pas,$db);
	$conection= mysqli_connect($con,$nm,$pas,$db);

	if (!$conection) {
		echo "koneksi eror";
		exit();
	}

?>