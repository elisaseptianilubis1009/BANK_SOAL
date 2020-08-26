<!-- include the style -->
    <link rel="stylesheet" href="alert/css/alertify.min.css" />
    <!-- include a theme -->
    <link rel="stylesheet" href="alert/css/themes/default.min.css" />
      <script src="alert/alertify.min.js"></script>
   
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Penilaian</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="?page=dashboard">Menu Utama</a></li>
                                    <li class="active">Penilaian</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
              <div class="content a">
        <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="box-title">Penilaian 
                                        <label class="pull-right">
                                                    <a href="?page=reset">
                     <form method="post">                   
                                                            <input type="submit" value="reset" name="reset"  class="btn btn-danger">
                                                             
                                                        </a>
                                        </label>
                                        <script type="text/javascript">
                                                var unchec=0;


                                                function selec() {
                                                    var pilih=document.getElementsByTagName('input');
                                                    if (unchec == 0) {
                                                    var cek=0;
                                                    for (i = 1; i < pilih.length; i++){
                                                        if (pilih[i].type== 'checkbox') {
                                                            if (cek==0) {
                                                                cek++;
                                                            }else{
                                                                pilih[i].checked = true ;
                                                          

                                                            }
                                                        }

                                                    
                                                    }
                                                    unchec=1;
                                                }else{
                                                    var ceks=0;
                                                    for (i = 1; i < pilih.length; i++){
                                                        if (pilih[i].type== 'checkbox') {
                                                            if (ceks==0) {
                                                                ceks++;
                                                            }else{
                                                                pilih[i].checked = false ;
                                                          

                                                            }
                                                        }

                                                    
                                                    }
                                                    unchec=0;
                                                }

                                            }
                                               
                                               </script>

                                        <div class="checkbox" id="selectall">
                                            <br>
                                            
                                        <label>
                                            <input type="checkbox" id="pilihsemua" name="pilihsemua" value="4" onclick="selec();">&nbspPilih Semua
                                        </label>
                                        <br>
                                       
                                </div>
                                
                                    </h4>
                                    
                                </div>
                                <div class="card-body">
                                        <table id="bootstrap-data-table-export" class="table table-bordered table-hover table-striped" >
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th class="serial">No</th>
                                                    <th>Nama</th>
                                                    <th>Nilai</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               <?php 
                                                    $no = 0;
                                                    $sql = mysqli_query($con,"SELECT a.*,b.* from tb_hasil a,tb_login b where a.id_login=b.id_login and a.keputusan=''");
                                                    while ($data = mysqli_fetch_array($sql)) {
                                                        $no++;
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <input type="checkbox" value="<?php echo $data['id_login'] ?>" id="<?php echo $no ?>" name="<?php echo $no ?>"></td>
                                                            <td><?php echo $no ?></td>
                                                            <td><?php echo $data['nama'] ?></td>
                                                            <td><?php echo $data['hasil'] ?></td>
                                                    
                                                    <td class="text-center">
                                                         <a href="?page=terima&id=<?php echo $data['id_login']?>">
                                                             <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModals<?php echo $data['id_soal'] ?>">
                                                                <i>Terima</i>
                                                            </button>
                                                        </a>
                                                    
                                                             <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModalstolak<?php echo $data['id_login'] ?>  ">
                                                                <i>Tolak</i>
                                                            </button>
                                                    
                                                    
                                                    </td>
                                                    
                                                </tr>
                                                    <?php
                                                    }
                                                ?>
                            </form>
                                            </tbody>
                                        </table>
                                        
            <?php 
            $sqls = mysqli_query($con,"SELECT a.*,b.* from tb_hasil a,tb_login b where a.id_login=b.id_login and a.keputusan=''");
            while ($datas = mysqli_fetch_array($sqls)) {
                                             
             ?>
            <div class="modal fade" id="myModalstolak<?php echo $datas['id_login'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                                        <input type="hidden" value="<?php echo $datas['id_login'] ?>" name="id">                                  
                                        <label>Masukan Alasan Ditolak  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp :</label>
                                            <textarea rows="10" cols=59 class="form-control" name="soal"></textarea>
                                            <input type="hidden" value="Masukan Alasan Di Tolak" name="data">                                    
                            
                                        </div>

                                                              <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                <input type="submit" class="btn btn-success" name="change" value="Change" style="cursor:pointer;">
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                        </form>
                            <?php } ?>            

                              <?php 
                            $id=@$_POST['id'];                                
                            $buton=@$_POST['change'];
                            $soal=@$_POST['soal'];

                            $reset=@$_POST['reset'];
                            $cek=0;
   
                            if ($buton) {
                                mysqli_query($con,"UPDATE tb_hasil set keputusan='Di Tolak',alasan='$soal' where id_login='$id'");
                                echo "<script>window.location.replace('?page=nilai');</script>";
       
                            }else if ($reset) {
                                $leng = mysqli_num_rows(mysqli_query($con,"SELECT a.*,b.* from tb_hasil a,tb_login b where a.id_login=b.id_login and a.keputusan=''"));
                                    
                                
                                for ($i=1; $i <=$leng; $i++) {
                                    $tam=@$_POST[$i];
                                    if ($tam){
                                         mysqli_query($con,"DELETE FROM tb_hasil where id_login='$tam'"); 
                                        $cek=1;
                                        
                                    }
                          
                        }
                        if ($cek==1) {
                            $cek=0;
                            ?>
                                        <script>
                                            alertify.alert('Berhasi Di reset');
                                             window.location.replace('index.php?page=nilai');
                                        </script>
                             <?php         
                        }
                                                   

                    }

                      ?>
        
                </div>
                <?php 
                   
                    

                ?>

                  