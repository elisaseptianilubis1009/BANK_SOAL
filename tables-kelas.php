        
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><h3><b><center>INFORMASI KELAS</center></b></h3></strong>

                                <a href="index.php?page=tambah_kelas">   
                                <button type="button" class="btn btn-primary " id="tombol"><i class="fa fa-plus"></i> Tambahkan Kelas
                                </button>
                                </a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th bgcolor="pink"><center><b>KODE  KELAS</b></center></th>
                                            <th bgcolor="pink"><center><b>NAMA KELAS</b></center></th>
                                            <th bgcolor="pink"><center><b>ACTION</b></center></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php include "koneksi.php" ?>
                                        <?php 
                                        $query_mysql = mysqli_query($conection,"SELECT * FROM tb_kelas")or die(mysqli_error()); ?>
                                        <?php while($data = mysqli_fetch_array($query_mysql)) { ?>
                                            <tr>
                                                <td><center><?php echo $data['kode_kelas'] ?></center></td>
                                                <td><center><?php echo $data['nama_kelas'] ?></center></td>
                                                <td><center><a href="delete_kelas.php?id=<?php echo $data['kode_kelas'] ?>&tb=tb_kelas" class="btn btn-danger">Delete</a> 

                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalku<?php echo $data['kode_kelas'] ?>">Update
                                                </button></center>

                                                <?php } ?>

                                            </td>
                                            
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->

<?php   
            $query_mysql = mysqli_query($conection,"SELECT * FROM tb_kelas");
            while($datas = mysqli_fetch_array($query_mysql)) { 
 ?>
    <div class="modal fade" id="myModalku<?php echo $datas['kode_kelas'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Edit Kelas</h4>
                                
                              </div>
                              <div class="modal-body">
                                <form action="" method="post">
                                    <input type="hidden" name="kode_kelas" value="<?php echo $datas['kode_kelas'] ?>">

                                    <label>Nama Mata Kelas</label>
                                    <input type="text" name="nama_kelas" class="form-control" value="<?php echo $datas['nama_kelas'] ?>">

                                    
                                                                    
                              </div>

                                <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <input type="submit" name="save" class="btn btn-primary" value="Save changes">
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>

                          <?php     } ?>
                            
                        <?php
                            $kode_kelas = @$_POST['kode_kelas'];
                            $nama_kelas = @$_POST['nama_kelas'];
                            $save = @$_POST['save'];

                            if ($save) {
                                mysqli_query($conection, "UPDATE tb_kelas set nama_kelas = '$nama_kelas' where kode_kelas = '$kode_kelas' ");
                                ?>
                                    <script type="text/javascript">
                                        alert("Kelas  berhasil di update");
                                        window.location.replace("index.php?page=Tampil_Kelas");
                                    </script>

                                <?php

                            }
                        ?>


                            <?php
                                    
                             ?>
                                    
                                </table>

                            


                        

                            </div>
                        </div>
                    </div>




                            </div>
                        </div>
                    </div>

                </div>

<!-- SAMPAI SINI YA-->

    <div>
        <?php   
            $page=@$_GET['page'];
            if($page=='tampilsoal'){
                include 'tampil_soal/tampil.php';
            }

                ?>

    </div> 




   