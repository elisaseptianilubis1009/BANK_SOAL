<?php
    include "koneksi.php";

    $user = @$_GET['id_pengguna'];
    $sql = mysqli_query($conection, "select * from tb_pengguna where id_pengguna = '$user'");
    $data = mysqli_fetch_array($sql);
    $myJSON = json_encode($data);

    echo $myJSON;

?>