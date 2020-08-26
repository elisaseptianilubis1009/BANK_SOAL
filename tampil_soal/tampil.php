        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1><b>PILIH KELAS</b></h1>
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

            
            <!-- Menampilkan Combo Box table kelas-->

            <div class="col-xl-12">
                <form action="" method="post">
                    <select name="kelas" class="form-control">

                        <?php 
                            include 'koneksi.php';
                            $sql= mysqli_query($conection,"SELECT * FROM tb_kelas");
                            while ($data = mysqli_fetch_array($sql)) {
                                ?>

                                <option value="<?php echo $data['kode_kelas'] ?>">
                                    <?php echo $data['nama_kelas'] ?>
                                </option>
                                
                            <?php
                            }
                            ?>
                        
                    </select>
                    <br><input type="submit" name="next" value="Next" class="btn btn-danger">
                    <a href="index.php" class=" btn btn-success">Back</a>
                </form>


                <!-- untuk mendapatkan value yang berNAME kelsa dan Name next -->
                <?php 
                    $kelas = @$_POST['kelas'];
                    if (@$_POST['next']) {
                        ?>
                            <script type="text/javascript">
                                window.location.replace("?page=tampilsoal1&kode=<?php echo $kelas ?>");
                            </script>
                        <?php
                    }
                ?>
            </div>


        