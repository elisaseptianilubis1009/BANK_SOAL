<?php	INCLUDE 'koneksi.php';
@session_start();
if (@$_SESSION['status'] != "login") {
    header("location:../loginku.php");
}else{
?>

<?php
$ID=@$_GET['id'];
$sub=@$_GET['subtema'];
  mysqli_query($conection, "DELETE FROM  tb_essay where id_essay = $ID");
 		?>
	
	<script type="text/javascript">
			alert("Soal Essay berhasil di hapus");
			window.location.replace("index.php?page=tampilsoall4&subtema=<?php echo $sub ?>");
	</script>

	<?php 
		}
	 ?>
