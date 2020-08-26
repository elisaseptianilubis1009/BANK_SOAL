<?php 
@session_start();

if (@$_SESSION['status'] != "login") {
    header("location:loginku.php");
}else{
?>
<!doctype html>
<html class="no-js" lang="en">

<!--  START DESIGN TAMPILA -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BANK SOALKU</title>
    <meta name="description" content="BANK SOAL KU">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='assets/css/font.css' rel='stylesheet' type='text/css'>
</head>
<!--  END DESIGN TAMPILA -->

<body> 
        <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <!--  START INFORMASI  STATUS-->
            <div id="main-menu" class="main-menu collapse navbar-collapse">          
                <ul class="nav navbar-nav">
                    <li class="active">

                    <?php 
                        if (@$_SESSION['hak'] == "admin" ) {    
                    ?>
                    <a href="index.php"> <i class="menu-icon fa fa-windows"></i><h3><b>ADMIN</b></h3>  </a>
                    <?php 
                    }
                    ?>
                    <?php 
                        if (@$_SESSION['hak'] == "contributor" ) {    
                    ?>
                    <a href="index.php"> <i class="menu-icon fa ffa-windows"></i><h4><b>KONSTRIBUTOR</b></h4> </a>
                    <?php 
                    }
                    ?>
                    <?php 
                        if (@$_SESSION['hak'] == "user" ) {    
                    ?>
                    <a href="index.php"> <i class="menu-icon fa fa-windows"></i><h3><b>USER</b></h3></a>
                    <?php 
                    }
                    ?>
                    </li>
                    <!--  END INFORMASI  STATUS-->


                    <h3 class="menu-title"><b><center>MENU UTAMA</center></b></h3>

                        <li ><a href="index.php" ><i class="menu-icon fa fa-home"></i><b>HOME</b></a></li>

                        <li ><a href="?page=tampilprofil" ><i class="menu-icon fa fa-user"></i><b>PROFIL ADMIN</b></a></li>
                    
                        <li ><a href="?page=tampilsoal" ><i class="menu-icon fa fa-cloud-download"></i><b>DOWNLOAD SOAL</b></a></li>

                    
                    <li class="menu-item-has-children dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i><b>INFORMASI TABLE</b></a>
                        <ul class="sub-menu children dropdown-menu">

                            <?php 
                            if (@$_SESSION['hak'] == "admin" ) {              
                            ?>
                        
                            <li><i class="fa fa-table"></i><a href="?page=TampilUser"><b>DATA USER</b></a></li>
                            <li><i class="fa fa-table"></i><a href="?page=Tampil_Kelas"><b>DATA KELAS</b></a></li>
                            <li><i class="fa fa-table"></i><a href="?page=Tampil_Mapel"><b>MATA PELAJARAN</b></a></li>
                            
                            <li><i class="fa fa-table"></i><a href="?page=Tampil_Status"><b>DATA STATUS</b></a></li>
                            <li><i class="fa fa-table"></i><a href="?page=Tampil_Tema"><b>DATA TEMA</b></a></li>
                            <li><i class="fa fa-table"></i><a href="?page=Tampil_Subtema"><b>DATA SUBTEMA</b></a></li>
                        <?php 
                         }
                        ?>
                        </ul>
                    </li>

                    

                    

                   
                                   </ul>
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
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">5</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have 3 Notification</p>
                                <a class="dropdown-item media bg-flat-color-1" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                                <a class="dropdown-item media bg-flat-color-4" href="#">
                                <i class="fa fa-info"></i>
                                <p>Server #2 overloaded.</p>
                            </a>
                                <a class="dropdown-item media bg-flat-color-5" href="#">
                                <i class="fa fa-warning"></i>
                                <p>Server #3 overloaded.</p>
                            </a>
                            </div>
                        </div>

                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                id="message"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ti-email"></i>
                                <span class="count bg-primary">9</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
                                <p class="red">You have 4 Mails</p>
                                <a class="dropdown-item media bg-flat-color-1" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jonathan Smith</span>
                                    <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                                <a class="dropdown-item media bg-flat-color-4" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jack Sanders</span>
                                    <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                                <a class="dropdown-item media bg-flat-color-5" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Cheryl Wheeler</span>
                                    <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                                <a class="dropdown-item media bg-flat-color-3" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Rachel Santos</span>
                                    <span class="time float-right">15 minutes ago</span>
                                        <p>Lorem ipsum dolor sit  amet, consectetur</p>
                                </span>
                            </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/elisa1.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i> My Profile</a>

                            <a class="nav-link" href="#"><i class="fa fa-user"></i> Notifications <span class="count">13</span></a>

                            <a class="nav-link" href="#"><i class="fa fa-cog"></i> Settings</a>

                            <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-us"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language">
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            
        </header><!-- /header -->
        <!-- Header-->
<div>
        <?php   
            $page=@$_GET['page'];
            if($page=='tampilsoal'){
                include 'tampil_soal/tampil.php';

            }else if($page=='tampilprofil'){
                include 'profil.php';
            }else if($page=='tampilsoal1'){
                include 'tampil_soal/tampil1.php';

            } else if($page=='tampilsoal2'){
                include 'tampil_soal/tampil2.php';

            } else if($page=='tampilsoal3'){
                include 'tampil_soal/tampil3.php';

            } else if($page=='tampilsoal4'){
                include 'tampil_soal/tampil4.php';

            } else if($page=='tampilsoall4'){
                include 'tampil_soal/tampill4.php';

            } else if($page=='download'){
                include 'soal/soal.php';    

            }else if ($page=='tambahsoal'){
                include 'tambah_soal/tambah.php';

            }else if ($page=='editsoal'){
                include 'edit_soal/edit.php';

            }else if ($page=='TampilUser'){
                include 'tables-data.php';

            }else if ($page=='Tampil_Kelas'){
                include 'tables-kelas.php';

            }else if ($page=='Tampil_Mapel'){
                include 'tables-mapel.php';
                
            }else if ($page=='Tampil_Ambil_Soal'){
                include 'tables_ambil_soal.php';    

            }else if ($page=='Tampil_Status'){
                include 'tables_status.php';

            }else if ($page=='Tampil_Subtema'){
                include 'tables_subtema.php';

            }else if ($page=='Tampil_Tema'){
                include 'tables_tema.php';
                                                    
            }else if ($page=='tampilsoal4-tambah'){
                include 'tampil_soal/tampil4-tambah.php';

            }else if($page=='tampilsoal4-hapus'){
                include 'tampil_soal/tampil4-hapus.php';

            }else if($page=='tampilessay_hapus'){
                include 'tampil_soal/tampilessay_hapus.php';

            }else if($page=='tampilessay_tambah'){
                include 'tampil_soal/tampilessay_tambah.php';

            }else if($page=='tambah_pengguna'){
                include 'tambah_pengguna.php';

            }else if($page=='tambah_kelas'){
                include 'tambah_kelas.php';

            }else if($page=='tambah_mapel'){
                include 'tambah_mapel.php';

            }else if($page=='tambah_tema'){
                include 'tambah_tema.php';

            }else if($page=='tambah_subtema'){
                include 'tambah_subtema.php';

            }else if($page=='tambah_status'){
                include 'tambah_status.php';

            }else{
                    include 'dashboard.php';
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
  
        <script type="text/javascript">
        $(document).ready(function(){
            $('#tombol').click(function(){
                $('#modal-kotak , #bg').fadeIn("slow");
            });
            $('#tombol-tutup').click(function(){
                $('#modal-kotak , #bg').fadeOut("slow");
            });
        });
    </script>


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

    <script type="text/javascript">
        $('#myModal').on('shown.bs.modal', function () {
          $('#myInput').focus()
        })
    </script>

    <script type="text/javascript">
        $('#myModalku').on('shown.bs.modal', function () {
          $('#myInput').focus()
        })
    </script>

</body>

</html>
<?php 
}
 ?>