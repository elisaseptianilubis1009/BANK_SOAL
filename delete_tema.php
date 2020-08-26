		<script type="text/javascript">
			alert("Tema Terhapus");
 		</script>
<?php 
	session_start(); ?>

		<script type="text/javascript">
			alert("Tema Terhapus");
 		</script>


<?php
	// if (isset($_GET["id"])) {
		include 'koneksi.php';
		$CEK=$_GET['id'];
		$tb=$_GET['tb'];
		$conection->query("DELETE FROM $tb WHERE id_tema='$CEK'");		
	// }
	header("location:index.php?page=Tampil_Tema");
	exit();
?>