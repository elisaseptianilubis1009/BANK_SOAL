<?php 
@session_start();
 include "koneksi.php";
$tamp=@$_SESSION['no'];

$tamp1=$tamp-1;


 ?>

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Jawab Soal</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="?page=dashboard">Menu Utama</a></li>
                                    <li class="active">Jawab Soal</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php 

    $id=@$_SESSION['id'];

    $cek=mysqli_num_rows(mysqli_query($con,"SELECT * FROM tb_hasil where id_login='$id' "));
 ?>
                   
    <div class="content a">
        <div class="row">
            <?php if ($cek >0){
             ?>
              
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="box-title">Soal 
                                    </h4>
                                    
                                </div>
                                <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                       <p class="text-dark">
                                        Maaf Anda Sudah Mengerjakan Soal.    
                                      </p>
                                      <a href="?page=hasil" class="btn btn-success">Lihat Hasil Anda </a>
                                       
                                </div>
                                </div>                               
                    <?php }else{ ?>

                            <?php 
                                $total=mysqli_num_rows(mysqli_query($con,"SELECT * FROM tb_soal "));
                                $sql=mysqli_query($con,"SELECT * FROM tb_soal limit $tamp1,$tamp");
                                $data=mysqli_fetch_array($sql);
                                
                                 ?>
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="box-title">Soal 
                                        <label class="pull-right">
                                            <a href="#">Soal ke <?php echo $tamp ?> /<?php echo $total ?></a>
                                        </label>
                                    </h4>
                                    <br>
                                    <h9 class="box-title">
                                        Kategori Soal : <?php echo $data['kategori_soal'] ?> 
                                    </h9>
                                    
                                </div>
                                <?php 
                                 ?>
                                <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                       <p class="text-dark">
                                        <?php echo $data['soal'];
                                         ?>
                                     
                                       <hr>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="jawaban" value="4"> Sangat Baik

                                        </label>
                                        <br>
                                        <label>
                                            <input type="radio" name="jawaban" value="3"> Baik

                                        </label>
                                        <br>
                                        <label>
                                            <input type="radio" name="jawaban" value="2"> Cukup Baik

                                        </label>
                                        <br>
                                        <label>
                                            <input type="radio" name="jawaban" value="1"> Cukup

                                        </label>                     
                                       
                                </div>
                                </div>                               
                                    <input type="submit" class="btn btn-success" name="save" value="Jawab">
                                    </form>
                                <?php } ?>
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->
                    </div>
                </div>
        <?php 
        $next=@$_POST['save'];
        $hasil=@$_POST['jawaban'];

        if ($next) {
             if ($tamp!=$total) {
                 @$_SESSION['no']+=1;
                 @$_SESSION['hasil']+=$hasil;
                
                echo "<script>window.location.replace('index.php?page=soal')</script>";

             }else{
                @$_SESSION['hasil']+=$hasil;

                @$_SESSION['hasil']=@$_SESSION['hasil']/$total;
                $tampungan=@$_SESSION['hasil'];
                mysqli_query($con,"INSERT INTO tb_hasil values('','$id','$tampungan','','')");

                echo "<script>window.location.replace('index.php?page=hasil')</script>";

             }
                         
        }


         ?>