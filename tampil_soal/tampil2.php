
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>PILIH TEMA MATA PELAJARAN</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Soal</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

            <div class="col-xl-12">
                <form action="" method="post">
                    <select name="tema" class="form-control">
                        <?php 
                            include 'koneksi.php';
                            $mapel = @$_GET['mapel'];
                            $sql = mysqli_query($conection, "SELECT * FROM tb_tema where id_mapel = $mapel");
                            while ($data = mysqli_fetch_array($sql)) {
                                ?>
                                <option value="<?php echo $data['id_tema'] ?>"><?php echo $data['nama_tema'] ?></option>
                            <?php
                            }
                        ?>
                        
                    </select>
                    <br><input type="submit" name="next" value="Next" class="btn btn-danger">
                    <a href="index.php" class="btn btn-success">Back</a>
                </form>

                <?php 
                    $tema = @$_POST['tema'];
                    if (@$_POST['next']) {
                        ?>
                            <script type="text/javascript">
                                window.location.replace("?page=tampilsoal3&tema=<?php echo $tema ?>");
                            </script>
                        <?php
                    }
                ?>
            </div>
         
