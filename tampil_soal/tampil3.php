        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>PILIH SUBTEMA </h1>
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

            <!--/.col-->

            
            <!--/.col-->
            <div class="col-xl-12">
                <form action="" method="post">
                    <select name="subtema" class="form-control">
                        <?php 
                            include 'koneksi.php';
                            $tema = @$_GET['tema'];
                            $sql = mysqli_query($conection, "SELECT * FROM tb_subtema where id_tema = $tema");
                            while ($data = mysqli_fetch_array($sql)) {
                                ?>
                                <option value="<?php echo $data['id_subtema'] ?>"><?php echo $data['nama_subtema']?></option>
                                <?php
                            }
                        ?>
                    </select>
                    <br><input type="submit" name="next" value="Next" class="btn btn-danger">
                    <a href="index.php" class="btn btn-success">Back</a>
                </form>


                <?php 
                    $subtema = @$_POST['subtema'];
                    if (@$_POST['next']) { ?>
                            <script type="text/javascript">
                                window.location.replace("?page=tampilsoal4&subtema=<?php echo $subtema ?>");
                            </script>
                        <?php
                    }
                ?>
            </div>
    