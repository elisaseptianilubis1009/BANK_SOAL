<script type="text/javascript" src="chart/chart.js"></script>
<?php 
include "koneksi.php";
 ?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content mt-3">
            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-success">Hallo ! </span> Selamat Datang
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                                        <?php           
                                        $id=@$_SESSIONO['id'];                              
                                        $data=mysqli_query($con,"SELECT * FROM tb_hasil where id_login='$id'");

                                        $cek=mysqli_num_rows(mysqli_query($con,"SELECT * FROM tb_hasil where id_login='$id'"));
                                        $datas=mysqli_fetch_array($data);
                                        $hasil=$datas['keputusan'];
                                if ($cek >0) {
                                    # code...
                                        if ($hasil == "") {
                                         ?>
                                       <div class="alert alert-danger" role="alert">
                                            Maaf Belum Ada Keputusan Admin diterima Atau Tidaknya .
                                        </div>
                                        <?php }else if($hasil == "Di Terima"){ ?>
                                        <div class="alert alert-primary" role="alert">
                                            Selamat Anda Diterima!.
                                        </div>
                                       
                                        <?php }else{ ?>
                                        <div class="alert alert-danger" role="alert">
                                            Maaf Anda Tidak Di Terima.
                                        </div>
                                       <?php }
                                   } ?>     
                                      
            </div>



            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton1" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                         </div>
                        <h4 class="mb-0">
                            <?php 
                        $cekanggota=mysqli_num_rows(mysqli_query($con,"SELECT * FROM tb_login "));
                        $cekanggota-=1;
                             ?>
                            <span class="count"><?php echo $cekanggota ?></span>
                        </h4>
                        <p class="text-light">Total Anggota</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart1"></canvas>
                        </div>

                    </div>

                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-2">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton2" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            </div>
                              <?php 
                        $ceksoal=mysqli_num_rows(mysqli_query($con,"SELECT * FROM tb_soal "));
                             ?>
                      
                        <h4 class="mb-0">
                            <span class="count"><?php echo $ceksoal ?></span>
                        </h4>
                        <p class="text-light">Total Soal</p>

                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>

                    </div>
                </div>
            </div>
            <!--/.col-->

            <!--/.col-->
<!--/.col-->

                <!--/.col-->
           <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Grafik Nilai Terbaik</h4>
                                 <div class="card-body" >
                                        <canvas id="myChart"></canvas>
                                </div>        

                            </div>
                        </div>
                    </div>
            <!--/.col-->

        <!--/social-box-->
            <!--/.col-->

    <?php 
        $sql=mysqli_query($con,"SELECT a.*,b.* FROM tb_hasil a,tb_login b where a.id_login=b.id_login order by a.hasil asc limit 3");

        $hit=mysqli_num_rows(mysqli_query($con,"SELECT a.*,b.* FROM tb_hasil a,tb_login b where a.id_login=b.id_login order by a.hasil asc limit 3"));
        
        $tampungannama=array(4);
        $tampunganisi=array(4);
        
        for ($i=0; $i <4 ; $i++) { 
            $tampungannama[$i]="";
            $tampunganisi[$i]="";
        }

        $a=0;
        while ($data=mysqli_fetch_array($sql)) {
            $tampungannama[$a]=$data['nama'];
            $tampunganisi[$a]=$data['hasil'];
            $a++;
        }


       if ($tampungannama[0] =="" && $tampunganisi[0]=="") {
           $tampungannama[0]="-";
           $tampunganisi[0]=0;
           
       }if ($tampungannama[1] =="" || $tampunganisi[1] =="") {
           $tampungannama[1]="-";
           $tampunganisi[1]=0;
           
       }if ($tampungannama[2] == ""||$tampunganisi[2]=="") {
           $tampungannama[2]="-";
           $tampunganisi[2]=0;
       }

     ?>



        </div> <!-- .content -->
    </div><!-- /#right-panel -->
    <!--  Chart js -->
    
    <script src="vendors/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="assets/js/init-scripts/chart-js/chartjs-init.js"></script>
    <script>

        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["<?php echo $tampungannama[0] ?>","<?php echo $tampungannama[1] ?>","<?php echo $tampungannama[2] ?>"],
                datasets: [{
                    label: 'Ranking <?php echo $hit ?> Teratas',
                    data: [<?php echo $tampunganisi[0]?>,<?php echo $tampunganisi[1] ?>,<?php echo $tampunganisi[2] ?>],
                    backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>