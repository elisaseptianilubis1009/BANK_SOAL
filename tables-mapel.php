        
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><h3><b><center>INFORMASI MATA PELAJARAN</center></b></h3></strong>
                                <a href="index.php?page=tambah_mapel">   
                                <button type="button" class="btn btn-primary " id="tombol"><i class="fa fa-plus"></i>Tambahkan Mapel
                                </button>
                                </a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th bgcolor="pink"><center><b>ID MAPEL</b></center></th>
                                            <th bgcolor="pink"><center><b>NAMA MAPEL</b></center></th>
                                            <th bgcolor="pink"><center><b>KODE KELAS</b></center></th>
                                            <th bgcolor="pink"><center><b>ACTION</b></center></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php include "koneksi.php" ?>
                                        <?php 
                                        $query_mysql = mysqli_query($conection,"SELECT * FROM tb_mapel")or die(mysqli_error()); ?>
                                        <?php while($data = mysqli_fetch_array($query_mysql)) { ?>
                                            <tr>
                                                <td><center><?php echo $data['id_mapel'] ?></center></td>
                                                <td><center><?php echo $data['nama_mapel'] ?></center></td>
                                                <td><center><?php echo $data['kode_kelas'] ?></center></td>

                                                <td><center>
                                                <a href="delete_mapel.php?id=<?php echo $data['id_mapel'] ?>&tb=tb_mapel" class="btn btn-danger">Delete</a>

                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalku<?php echo $data['id_mapel'] ?>">Update
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
            $query_mysql = mysqli_query($conection,"SELECT * FROM tb_mapel");
            while($datas = mysqli_fetch_array($query_mysql)) { 
 ?>
    <div class="modal fade" id="myModalku<?php echo $datas['id_mapel'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Edit Mata Pelajaran</h4>
                                
                              </div>
                              <div class="modal-body">
                                <form action="" method="post">
                                    <input type="hidden" name="id_mapel" value="<?php echo $datas['id_mapel'] ?>">

                                    <label>Nama Mata Pelajaran</label>
                                    <input type="text" name="nama_mapel" class="form-control" value="<?php echo $datas['nama_mapel'] ?>">

                                    <label>Tingkatan Kelas</label>
                                    <input type="text" name="kode_kelas" class="form-control" value="<?php echo $datas['kode_kelas'] ?>">

                                                                    
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
                            $id_mapel = @$_POST['id_mapel'];
                            $nama_mapel = @$_POST['nama_mapel'];
                            $kode_kelas = @$_POST['kode_kelas'];
                            $save = @$_POST['save'];

                            if ($save) {
                                mysqli_query($conection, "UPDATE tb_mapel set nama_mapel = '$nama_mapel', kode_kelas = '$kode_kelas' where id_mapel = '$id_mapel' ");
                                ?>
                                    <script type="text/javascript">
                                        alert("Soal berhasil di update");
                                        window.location.replace("index.php?page=Tampil_Mapel");
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
            // else{
            //     include 'dashboard.php';
            // }

         ?>
            

    </div><!-- /#right-panel -->

    <!-- Right Panel -->


