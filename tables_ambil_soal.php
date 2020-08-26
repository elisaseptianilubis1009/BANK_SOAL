       
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"><h3><b><center>INFORMASI DOWNLOAD</center></b></h3></strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th bgcolor="pink"><center><b>ID PENGGUNA</b></center></th>
                                            <th bgcolor="pink"><center><b>ID SOAL</b></center></th>
                                            <th bgcolor="pink"><center><b>NILAI</b></center></th>
                                            <th bgcolor="pink"><center><b>ACTION</b></center></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php include "koneksi.php" ?>
                                        <?php 
                                        $query_mysql = mysqli_query($conection,"SELECT * FROM tb_pengambilan_soal")or die(mysqli_error()); ?>
                                        <?php while($data = mysqli_fetch_array($query_mysql)) { ?>
                                            <tr>
                                                <td><center><?php echo $data['id_pengguna'] ?></center></td>
                                                <td><center><?php echo $data['id_soal'] ?></center></td>
                                                <td><center><?php echo $data['nilai'] ?></center></td>
                                                <td><center><a href="delete_pengambilan_soal.php?id=<?php echo $data['id_pengguna'] ?>&tb=tb_pengambilan_soal" class="btn btn-danger">Delete</a> <a href="update.php" class="btn btn-success">Update</a></center></td>
                                            
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


