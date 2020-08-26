<?php
    include "koneksi.php";


    $nama = @$_GET['nama_pengguna'];
    $sql = mysqli_query($conection, "select * from tb_pengguna where nama_pengguna like '%$nama%'");
    $return_arr = array();

    while($row = mysqli_fetch_array($sql)){
        $row_array['id_pengguna'] = $row['id_pengguna'];
        $row_array['nama_pengguna'] = $row['nama_pengguna'];
        $row_array['username'] = $row['username'];
        $row_array['passwordd'] = $row['passwordd'];
        

        array_push($return_arr, $row_array);
    }
    echo"{'user':".json_encode($return_arr)."}";
    
?>