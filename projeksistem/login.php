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
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

     <!-- include the style -->
    <link rel="stylesheet" href="alert/css/alertify.min.css" />
    <!-- include a theme -->
    <link rel="stylesheet" href="alert/css/themes/default.min.css" />
   
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
                <div class="login-form">
                    <form method="post">
                        <div class="form-group">
                            <label>Ussername</label>
                            <input type="text" class="form-control" placeholder="Ussername" name="user">
                        </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="pass">
                        </div>
                                <input type="submit"  class="btn btn-success btn-flat m-b-30 m-t-30" value="Login" name="login">
                                <div class="register-link m-t-15 text-center">
                                    <p>Tidak Punya Akun ?  <a href="register.php"> Daftar Disini</a></p>
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
    <script src="alert/alertify.min.js"></script>


</body>

</html>
<?php 
include "koneksi.php";


$user=@$_POST['user'];
$pass=@$_POST['pass'];
$login=@$_POST['login'];
if ($login) {
            $cek = mysqli_num_rows(mysqli_query($con, "SELECT * FROM tb_login where username = '$user' and password = '$pass'"));
            if ($cek > 0) {
                @session_start();
                $data = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM tb_login where username = '$user' and password = '$pass'"));
                @$_SESSION['nama'] = $data['nama'];
                @$_SESSION['level']=$data['level'];
                @$_SESSION['status'] = "login";
                @$_SESSION['no']=1;
                @$_SESSION['id']=$data['id_login'];
                ?>
                <script type="text/javascript">
                    alertify.alert('Login Sukses');
                    window.location.replace("index.php?page=dashboard");
                </script>
                <?php
            } else {
                ?>
                    <script type="text/javascript">
                     alertify.alert("Username atau Password salah !");
                    </script>
                <?php
            }

        }

 ?>

