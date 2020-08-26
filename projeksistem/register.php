<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Daftar Akun</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form method="post">
                            <div class="form-group">
                                <label>Nama Anda</label>
                                <input type="text" class="form-control" placeholder="Masukan Nama Anda " name="nama"> 
                            </div>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" placeholder="Masukan Username Anda " name="user">
                            </div>
                        
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Masukan Password" name="pass">
                                </div>
                                <div class="form-group">
                                    <label>Konfirmasi Password</label>
                                    <input type="password" class="form-control" placeholder="Masukan Password" name="pass1">
                                </div>
                                    <input type="submit" name="daftar" class="btn btn-primary btn-flat m-b-30 m-t-30" value="Register" >
                                    <div class="register-link m-t-15 text-center">
                                        <p>Mempunyai Akun ? <a href="login.php">Login</a></p>
                                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>

</html>

<?php 

include "koneksi.php";
$nama=@$_POST['nama'];
$user=@$_POST['user'];
$pass=@$_POST['pass'];
$pass1=@$_POST['pass1'];
$register=@$_POST['daftar'];
$cek = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_login where username = '$user' and password = '$pass'"));            
if ($register) {
    if ($nama == "" || $user == "" || $pass=="" || $pass1 =="") {
        echo "<script>alert('Mohon Lengkapi Data  ! ') </script>";
    }else if($cek >0){
        echo "<script>alert('Maaf Username Sudah Ada   ! ') </script>";
    }else if ($pass != $pass1) {
        echo "<script>alert('Password Tidak Sama  ! ') </script>";
    }else{
        mysqli_query($con,"INSERT INTO tb_login values('','$nama','$user','$pass','user')");
        echo "<script>alert('Registrasi Berhasil');
                window.location.replace('login.php');
         </script>";       
    }
}




 ?>