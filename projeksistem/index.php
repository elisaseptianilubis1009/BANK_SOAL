
<?php 
include "koneksi.php";
@session_start();
if (@$_SESSION['status'] != "login") {
   header("location:login.php");
}else{
 ?>
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
    <title>Sufee Admin - HTML5 Admin Template</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
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
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/boostrap.min.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="?page=dashboard"> <i class="menu-icon fa fa-dashboard"></i>Home </a>
                    </li>
                    <h3 class="menu-title">Fitur</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-book"></i>Question</a>
                        <ul class="sub-menu children dropdown-menu">
                            <?php if(@$_SESSION['level']=="user"){ ?>
                            <li><i class="fa fa-pencil-square"></i><a href="index.php?page=soal">Jawab Soal</a></li>
                            <?php }if (@$_SESSION['level']=="admin"){ ?>
                                
                            <li><i class="fa fa-plus-square"></i><a href="index.php?page=add-soal">Tambahkan Soal</a></li>
                            
                            <li><i class="fa fa-pencil"></i><a href="index.php?page=edit-soal">Daftar Soal</a></li>
                    <?php } ?>
                            
                        </ul>
                    </li>
                    <?php if (@$_SESSION['level'] =="admin"){ ?>
                        
                    <li>
                        <a href="?page=user"> <i class="menu-icon ti-user"></i>Daftar User</a>
                    </li>
                <?php } ?>

                    <?php if (@$_SESSION['level']=="user"){ ?>
                        
                    <li>
                        <a href="?page=hasil"> <i class="menu-icon ti-email"></i>Hasil</a>
                    </li>

                    <?php }if (@$_SESSION['level'] == "admin") {
                        # code...
                     ?>
                    <li>
                        <a href="?page=nilai"> <i class="menu-icon ti-email"></i>Penilaian</a>
                    </li>
                <?php } ?>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        
                        <div class="dropdown for-message">
                            
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                           
                            <div><a style="cursor: pointer;" class="nav-link" data-toggle="modal" data-target="#myModal"><i class="fa fa-key"></i>Change Password</a>

                            <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>

                    
                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->
       <?php 
       $page=@$_GET['page'];

       if ($page== "dashboard") {
           include "dashboard.php";
       }else if ($page =="soal"){
             include "soal/jawab-soal.php";

       }else if ($page =="add-soal"){
             include "soal/add-soal.php";

       }else if ($page =="edit-soal"){
             include "soal/edit-soal.php";

       }else if ($page =="hapus-soal"){
             include "soal/hapus-soal.php";

       }else if ($page =="hasil"){
             include "soal/hasil.php";

       }else if ($page =="nilai"){
             include "soal/nilai.php";

       }else if ($page =="terima"){
             include "soal/terima.php";

       }else if ($page =="tolak"){
             include "soal/tolak.php";

       }else if ($page =="user"){
             include "user.php";

       }else if ($page =="reset"){
             include "soal/reset.php";

       }
       else {
            include "dashboard.php";
     

       }

        ?>
        

        </div> <!-- .content -->
    </div><!-- /#right-panel -->

    <!-- Right Panel -->
<!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                                                      
                                                                <div class="form-group" data-validate = "Password is required">
                                                                    <span>Enter New Password</span>
                                                                    <input class="form-control" type="password" name="pass" id="new" placeholder="Enter password">
                                                                    <span class="focus-input100"></span>
                                                                </div>

                                                                <div class="form-group" data-validate = "Password is required">
                                                                    <span>Confirm Password</span>
                                                                    <input class="form-control" type="password" name="pass2" id="confirm" placeholder="Enter Confirm password">
                                                                    <span class="focus-input100"></span>
                                                                </div>

                                                              </div>
                                                              <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                <input type="submit" class="btn btn-success" name="change" value="Change" style="cursor:pointer;">
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        </form>

                                                        <?php 
                                                            $pass = @$_POST['pass'];
                                                            $pass2 = @$_POST['pass2'];
                                                            $change = @$_POST['change'];
                                                            $id=@$_SESSION['id'];
                                                            if ($change) {
                                                                if ($pass == $pass2 && $pass != "") {
                                                                    mysqli_query($con, "UPDATE tb_login set password = '$pass'where id_login='$id'");
                                                                    ?>
                                                                    <script type="text/javascript">
                                                                        alert("Data Berhasil Di Ubah");
                                                                        window.location.replace('index.php');
                                                                    </script>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <script type="text/javascript">
                                                                        alert("Password Tidak Sama");
                                                                    </script>
                                                                    <?php
                                                                }
                                                            }
                                                        ?>
        
    </div>
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="vendors/jqvmap/dist/jquery.vmap.min.js"></script>
    <script src="vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <script src="vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="alert/alertify.min.js"></script>

    <script>
        (function($) {
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);
    </script>

</body>

</html>
<?php 
}
 ?>