 <link rel="stylesheet" href="alert/css/alertify.min.css" />
    <!-- include a theme -->
    <link rel="stylesheet" href="alert/css/themes/default.min.css" />
      <script src="alert/alertify.min.js"></script>
   
<?php 
include "koneksi.php";

$id=@$_GET['id_soal'];
mysqli_query($con,"DELETE FROM tb_soal where id_soal='$id'");

?>
	<script type="text/javascript">
		alertify.alert('Sukses Di Hapus ');
		window.location.replace('index.php?page=edit-soal');
	</script>

<?php 

 ?>

