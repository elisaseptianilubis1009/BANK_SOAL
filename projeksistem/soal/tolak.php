<?php 
include "koneksi.php";

$id=@$_GET['id'];


mysqli_query($con,"UPDATE tb_hasil set keputusan='Di Tolak' where id_login='$id'");

echo "<script>window.location.replace('?page=nilai');</script>";

 ?>