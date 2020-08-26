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
              <div class="content a">
        <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="box-title">Soal 
                                    </h4>
                                    
                                </div>
                                <div class="card-body">
                                        <table id="bootstrap-data-table-export" class="table table-bordered table-hover table-striped" >
                                            <thead>
                                                <tr>
                                                    <th class="serial">No Soal</th>
                                                    <th>Soal</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               <?php 
                                                    $no = 0;
                                                    $sql = mysqli_query($con,"SELECT * from tb_soal");
                                                    while ($data = mysqli_fetch_array($sql)) {
                                                        $no++;
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $no ?></td>
                                                            <td><?php echo $data['soal'] ?></td>
                                                     
                                                    <td class="text-center">
                                                         <button type="button" class="btn btn-xs btn-info" data-toggle="modal" data-target="#myModals<?php echo $data['id_soal'] ?>">
                                                        <i class="fa fa-edit"></i>
                                                        </button>
                                                
                                                         <a  href="?page=hapus-soal&id_soal=<?php echo $data['id_soal'] ?>"><button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button></a>
                                                    </td>
                                                    
                                                </tr>
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
                                                            $soal = @$_POST['soal'];
                                                            $id=@$_POST['data'];
                                                            $change = @$_POST['change'];
                                                            $ktg = @$_POST['ktg'];
                                                            
                                                            if ($change) {
                                                                if ($soal != "" || $ktg =="") {
                                                                    mysqli_query($con, "UPDATE tb_soal set soal = '$soal',kategori_soal='$ktg' where id_soal='$id'");
                                                                    ?>
                                                                    <script type="text/javascript">
                                                                        alertify.alert("Data Berhasil Di Ubah");
                                                                        window.location.replace('index.php?page=edit-soal');
                                                                    </script>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <script type="text/javascript">
                                                                        alertify.alert("Lengkapi Data !");
                                                                    </script>
                                                                    <?php
                                                                }
                                                            }
                                                        ?>
        
    </div>
  <?php 
}
   ?>