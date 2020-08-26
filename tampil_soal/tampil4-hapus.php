<?php 
@session_start();
 ?>


<?php	
INCLUDE 'koneksi.php';

$ID=@$_GET['id'];
$sub=@$_GET['subtema'];
  mysqli_query($conection, "DELETE FROM tb_soal where id_soal = $ID");
 		?>
	
	<script type="text/javascript">
			alert("Soal berhasil di hapus");
			window.location.replace("index.php?page=tampilsoal4&subtema=<?php echo $sub ?>");
	</script>

