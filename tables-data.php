<!--<link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>-->

    
        <div class="content mt-3" >
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title" ><h3><b><center>INFORMASI PENGGUNA</center></b></h3></strong>

                                <a href="index.php?page=tambah_pengguna">   
                                <button type="button" class="btn btn-primary" id="tombol"><i class="fa fa-plus"></i>
                                Tambahkan Data
                                </button>
                                </a>

                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th bgcolor="pink"><b><center>ID PENGGUNA</center></b></th>
                                            <th bgcolor="pink"><b><center>NAMA PENGGUNA</center></b></th>
                                            <th bgcolor="pink"><b><center>ID STATUS</center></b></th>
                                            <th bgcolor="pink"><b><center>USERNAME</center></b></th>
                                            <th bgcolor="pink"><b><center>PASSWORD</center></b></th>
                                            <th bgcolor="pink"><b><center>ACTION</center></b></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php include "koneksi.php" ?>
                                        <?php 
                                        $query_mysql = mysqli_query($conection,"SELECT * FROM tb_pengguna")or die(mysqli_error()); ?>
                                        <?php while($data = mysqli_fetch_array($query_mysql)) { ?>
                                            <tr>
                                                <td><center><?php echo $data['id_pengguna'] ?></center></td>
                                                <td><center><?php echo $data['nama_pengguna'] ?></center></td>
                                                <td><center><?php echo $data['id_status'] ?></center></td>
                                                <td><center><?php echo $data['username'] ?></center></td>
                                                <td><center><?php echo $data['passwordd'] ?></center></td>
                                                
                                                <td><center><a href="delete.php?id=<?php echo $data['id_pengguna'] ?>&tb=tb_pengguna" class="btn btn-danger">Delete</a>

                                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModalku<?php echo     $data['id_pengguna'] ?>">Update
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
<!-- //MULAI DARI SINI -->
<?php   
            $query_mysql = mysqli_query($conection,"SELECT * FROM tb_pengguna");
            while($datas = mysqli_fetch_array($query_mysql)) { 
 ?>
    <div class="modal fade" id="myModalku<?php echo $datas['id_pengguna'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="myModalLabel">Edit Soal</h4>
                                
                              </div>
                              <div class="modal-body">
                                <form action="" method="post">
                                    <input type="hidden" name="id_pengguna" value="<?php echo $datas['id_pengguna'] ?>">

                                    <label>Nama Pengguna</label>
                                    <input type="text" name="nama_pengguna" class="form-control" value="<?php echo $datas['nama_pengguna'] ?>">

                                    <label>Id Status</label>
                                    <input type="text" name="id_status" class="form-control" value="<?php echo $datas['id_status'] ?>">

                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" value="<?php echo $datas['username'] ?>">

                                    <label>Password</label>
                                    <input type="text" name="passwordd" class="form-control" value="<?php echo $datas['passwordd'] ?>">                                
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
                            $id_pengguna = @$_POST['id_pengguna'];
                            $nama_pengguna = @$_POST['nama_pengguna'];
                            $id_status = @$_POST['id_status'];
                            $username = @$_POST['username'];
                            $passwordd = @$_POST['passwordd'];
                            $save = @$_POST['save'];

                            if ($save) {
                                mysqli_query($conection, "UPDATE tb_pengguna set nama_pengguna = '$nama_pengguna', id_status = '$id_status', username = '$username', passwordd = '$passwordd' where id_pengguna = '$id_pengguna' ");
                                ?>
                                    <script type="text/javascript">
                                        alert("Soal berhasil di update");
                                        window.location.replace("index.php?page=TampilUser");
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
        
    </div>          
