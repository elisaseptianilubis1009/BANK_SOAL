        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>User</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="?page=dashboard">Menu Utama</a></li>
                                    <li class="active">Daftar User</li>
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
                                    <h4 class="box-title">Daftar User 
                                    </h4>
                                    
                                </div>
                                <div class="card-body">
                                        <table id="bootstrap-data-table-export" class="table table-bordered table-hover table-striped" >
                                            <thead>
                                                <tr>
                                                    <th class="serial">No</th>
                                                    <th>Nama</th>
                                                    <th>Hasil</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                               <?php 
                                                    $no = 0;
                                                    $sql = mysqli_query($con,"SELECT a.*,b.* FROM tb_login a LEFT JOIN tb_hasil b ON a.id_login= b.id_login ");
                                                    while ($data = mysqli_fetch_array($sql)){
                                                        if ($data['nama'] == "admin"){
                                                            
                                                        }else{
                                                        $no++;
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $no ?></td>
                                                            <td><?php echo $data['nama'] ?></td>
                                                            <td><?php echo $data['hasil'] ?></td>
                                                    
                                                </tr>

                                                        <?php } ?>
                                                    <?php
                                                    }
                                                ?>

                                            </tbody>
                                        </table>
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->
                    </div>
                </div>

                <?php 
                 $sqls = mysqli_query($con,"SELECT * from tb_soal");
                 while ($datas = mysqli_fetch_array($sqls)) {
                                                   

                 ?>
         <div class="modal fade" id="myModals<?php echo $datas['id_soal'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"></h4>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                        <div class="form-group" data-validate = "Password is required">
                                    <label>Kategori Soal :</label>
                                    <input type="text" class="form-control" value="<?php echo $datas['kategori_soal'] ?>" name="ktg">
                                        <br>
                                            <label>Edit Soal &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp :</label>
                                            <textarea rows="10" cols=59 class="form-control" name="soal"><?php echo $datas['soal'] ?></textarea>
                                            <input type="hidden" value="<?php echo $datas['id_soal'] ?>" name="data">                                    
                            
                                        </div>

                                                              <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                <input type="submit" class="btn btn-success" name="change" value="Change" style="cursor:pointer;">
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        </form>
                                                      <?php     
                                        }
                       ?>