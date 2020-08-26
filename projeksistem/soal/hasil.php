<?php 
@session_start();
include "koneksi.php";
$id=@$_SESSION['id'];

 ?>
<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Hasil</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="?page=dashboard">Menu Utama</a></li>
                                    <li class="active">Hasil Jawaban</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php 
           $cek=mysqli_num_rows(mysqli_query($con,"SELECT * FROM tb_hasil where id_login='$id' "));
 
         ?>
        <div class="content a">
        <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="box-title">Hasil 
                                    </h4>
                                </div>
                                <?php if ($cek == 0){ ?>
                                <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                       
                                       <p class="text-dark">
                                        Anda Belum Menyelesaikan Question 
                                        </p>     
                                       <hr>
                                       <a href="?page=soal" class="btn btn-success">Kerjakan </a>
                                </div>
                            </div>    
                                <?php }else{ ?>
                                <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                       
                                        <?php                                         
                                        $data=mysqli_query($con,"SELECT * FROM tb_hasil where id_login='$id'");
                                        $datas=mysqli_fetch_array($data);
                                        $hasil=$datas['keputusan'];
                                        if ($hasil == "") {
                                         ?>
                                       <div class="alert alert-danger" role="alert">
                                            Maaf Belum Ada Keputusan Admin diterima Atau Tidaknya. 
                                        </div>
                                        <?php }else if($hasil == "Di Terima"){ ?>
                                        <div class="alert alert-primary" role="alert">
                                            Selamat Anda Diterima!.
                                        </div>
                                       
                                        <?php }else{ ?>
                                        <div class="alert alert-danger" role="alert">
                                            Maaf Anda Tidak Di Terima.
                                        </div>
                                        <div>
                                            <h4>Alasan Tidak Di terima :</h4>
                                            <p>
                                                <?php echo $datas['alasan'] ?>
                                            </p>
                                            <hr>

                                        </div>
                                       <?php } ?>     
                                       <p class="text-dark">
                                        <?php 
                                        
                                        $data=mysqli_query($con,"SELECT * FROM tb_hasil where id_login='$id'");
                                        $datas=mysqli_fetch_array($data);
                                        $hasil=$datas['hasil'];

                                        echo "Hasil Dari Question Anda Adalah : $hasil";

                                         ?>
                                        
                                        </p>     
                                       <hr>
                                </div>
                                    <a href="" class="btn btn-success">
                                        Go To Home     

                                    </a>
                                    
                                </div>
                            </div> <?php } ?><!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->
                    </div>
                </div>
     