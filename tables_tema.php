
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><h3><b><center> TEMA MATA PELAJARAN</center></b></h3></strong>
                                <a href="index.php?page=tambah_tema">   
                                <button type="button" class="btn btn-primary" id="tombol">
                                <i class="fa fa-plus" ></i> Tambahkam Tema Mapel
                                </button>
                                </a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th bgcolor="pink"><b><center>ID TEMA</center></b></th>
                                            <th bgcolor="pink"><b><center>NAMA TEMA</center></b></th>
                                            <th bgcolor="pink"><b><center>ID MAPEL</center></b></th>
                                            <th bgcolor="pink"><b><center>ACTION</center></b></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php include "koneksi.php" ?>
                                        <?php 
                                        $query_mysql = mysqli_query($conection,"SELECT * FROM tb_tema")or die(mysqli_error()); ?>
                                        <?php while($data = mysqli_fetch_array($query_mysql)) { ?>
                                            <tr>
                                                <td><center><?php echo $data['id_tema'] ?></center></td>
                                                <td><center><?php echo $data['nama_tema'] ?></center></td>
                                                <td><center><?php echo $data['id_mapel'] ?></center></td>
                                                <td><center><a href="delete_tema.php?id=<?php echo $data['id_tema'] ?>&tb=tb_tema" class="btn btn-danger">Delete</a> 

                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalku<?php echo $data['id_tema'] ?>">Update
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
            $query_mysql = mysqli_query($conection,"SELECT * FROM tb_tema");
            while($datas = mysqli_fetch_array($query_mysql)) { 
 ?>
    <div class="modal fade" id="myModalku<?php echo $datas['id_tema'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Edit Tema Pelajaran</h4>
                                
                              </div>
                              <div class="modal-body">
                                <form action="" method="post">
                                    <input type="hidden" name="id_tema" value="<?php echo $datas['id_tema'] ?>">

                                    <label>Nama Mata Tema Pelajaran</label>
                                    <input type="text" name="nama_tema" class="form-control" value="<?php echo $datas['nama_tema'] ?>">

                                    <label>Id Mapel</label>
                                    <input type="text" name="id_mapel" class="form-control" value="<?php echo $datas['id_mapel'] ?>">

                                                                    
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
                            $id_tema = @$_POST['id_tema'];
                            $nama_tema = @$_POST['nama_tema'];
                            $id_mapel = @$_POST['id_mapel'];
                            $save = @$_POST['save'];

                            if ($save) {
                                mysqli_query($conection, "UPDATE tb_tema set nama_tema = '$nama_tema', id_mapel = '$id_mapel' where id_tema = '$id_tema' ");
                                ?>
                                    <script type="text/javascript">
                                        alert("Tema berhasil di update");
                                        window.location.replace("index.php?page=Tampil_Tema");
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

    </div><!-- /#right-panel -->

    <!-- Right Panel -->


