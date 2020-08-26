<?php 
include "koneksi.php";


mysqli_query($con,"DELETE from tb_hasil");

echo "<script>window.location.replace('?page=nilai');</script>";
 ?>