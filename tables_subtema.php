        
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><h3><center><b>SUBTEMA SOAL</b></center></h3></strong>
                                <a href="index.php?page=tambah_tema">   
                                <button type="button" class="btn btn-primary" id="tombol">
                                <i class="fa fa-plus" ></i> Tambah Subtema Mapel
                                </button>
                                </a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th bgcolor="pink"><b><center>ID SUBTEMA</center></b></th>
                                            <th bgcolor="pink"><b><center>NAMA SUBTEMA</center></b></th>
                                            <th bgcolor="pink"><b><center> SUBTEMA</center></b></th>
                                            <th bgcolor="pink"><b><center>ACTION</center></b></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php include "koneksi.php" ?>
                                        <?php 
                                        $query_mysql = mysqli_query($conection,"SELECT * FROM tb_subtema")or die(mysqli_error()); ?>
                                        <?php while($data = mysqli_fetch_array($query_mysql)) { ?>
                                            <tr>
                                                <td><center><?php echo $data['id_subtema'] ?></center></td>
                                                <td><center><?php echo $data['nama_subtema'] ?></center></td>
                                                <td><center><?php echo $data['id_tema'] ?></center></td>
                                                <td><center><a href="delete_subtema.php?id=<?php echo $data['id_subtema'] ?>&tb=tb_subtema" class="btn btn-danger">Delete</a>

                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalku<?php echo $data['id_subtema'] ?>">Update
                                                </button> </center>

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
            $query_mysql = mysqli_query($conection,"SELECT * FROM tb_subtema");
            while($datas = mysqli_fetch_array($query_mysql)) { 
 ?>
    <div class="modal fade" id="myModalku<?php echo $datas['id_subtema'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Edit Subtema</h4>
                                
                              </div>
                              <div class="modal-body">
                                <form action="" method="post">
                                    <input type="hidden" name="id_subtema" value="<?php echo $datas['id_subtema'] ?>">

                                    <label>Nama Subtema Pelajaran</label>
                                    <input type="text" name="nama_subtema" class="form-control" value="<?php echo $datas['nama_subtema'] ?>">

                                    <label>Id Tema</label>
                                    <input type="text" name="id_tema" class="form-control" value="<?php echo $datas['id_tema'] ?>">

                                                                    
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
                            $id_subtema = @$_POST['id_subtema'];
                            $nama_subtema = @$_POST['nama_subtema'];
                            $id_tema = @$_POST['id_tema'];
                            $save = @$_POST['save'];

                            if ($save) {
                                mysqli_query($conection, "UPDATE tb_subtema set nama_subtema = '$nama_subtema', id_tema = '$id_tema' where id_subtema = '$id_subtema' ");
                                ?>
                                    <script type="text/javascript">
                                        alert("Subtema berhasil di update");
                                        window.location.replace("index.php?page=Tampil_Subtema");
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


