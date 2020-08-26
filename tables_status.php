        
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><h3><b><center>INFORMASI STATUS</center></b></h3></strong>

                                <a href="index.php?page=tambah_status">   
                                <button type="button" class="btn btn-primary" id="tombol"><i class="fa fa-plus"></i>Tambahakan Status
                                </button>
                                </a>

                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th bgcolor="pink"><b><center>ID STATUS</center></b></th>
                                            <th bgcolor="pink"><b><center>NAMA STATUS</center></b></th>
                                            <th bgcolor="pink"><b><center>ACTION</center></b></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php include "koneksi.php" ?>
                                        <?php 
                                        $query_mysql = mysqli_query($conection,"SELECT * FROM tb_status")or die(mysqli_error()); ?>
                                        <?php while($data = mysqli_fetch_array($query_mysql)) { ?>
                                            <tr>
                                                <td><center><?php echo $data['id_status'] ?></center></td>
                                                <td><center><?php echo $data['nama_status'] ?></center></td>
                                                <td><center><a href="delete_status.php?id=<?php echo $data['id_status'] ?>&tb=tb_status" class="btn btn-danger">Delete</a>

                                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalku<?php echo $data['id_status'] ?>">Update
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
            $query_mysql = mysqli_query($conection,"SELECT * FROM tb_status");
            while($datas = mysqli_fetch_array($query_mysql)) { 
 ?>
    <div class="modal fade" id="myModalku<?php echo $datas['id_status'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Edit Status</h4>
                                
                              </div>
                              <div class="modal-body">
                                <form action="" method="post">
                                    <input type="hidden" name="id_status" value="<?php echo $datas['id_status'] ?>">

                                    <label>Nama Status</label>
                                    <input type="text" name="nama_status" class="form-control" value="<?php echo $datas['nama_status'] ?>">

                                    
                                                                    
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
                            $id_status = @$_POST['id_status'];
                            $nama_status = @$_POST['nama_status'];
                            $save = @$_POST['save'];

                            if ($save) {
                                mysqli_query($conection, "UPDATE tb_status set nama_status = '$nama_status' where id_status = '$id_status' ");
                                ?>
                                    <script type="text/javascript">
                                        alert("Status  berhasil di update");
                                        window.location.replace("index.php?page=Tampil_Status");
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


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    