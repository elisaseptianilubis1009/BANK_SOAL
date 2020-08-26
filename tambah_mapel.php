<?php 

@session_start();	
$id=@$_GET['id_p=mapel'];
 ?>

 <style type="text/css">
        label {
            margin-top: 15px;
        }    
    </style>

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Tambah Mata Pelajaran</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="?page=dashboard">Dashboard</a></li>
                                    <li class="active">Tambah Mata Pelajaran</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content -->
        <div class="content a">
        <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="box-title">Input Mapel</h4>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <!-- Angka No Member -->
                                        
                                        <label class= "form-control-label">Nama Mata Pelajaran</label>
                                        <input type="text" class="form-control" value="" name="nama_mapel">

                                        <label form-control-label">Kode Kelas</label>
                                        <input type="text" class="form-control" value="" name="kode_kelas">

                                                                            
                                    <input type="submit" class="btn btn-success" name="simpan" value="Simpan">
                                    <input type="reset" class="btn btn-danger" name="batal" value="Batal" onclick="back()" >


							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php 	
$nama_mapel = @$_POST['nama_mapel'];
$kode_kelas = @$_POST['kode_kelas'];
$simpan=@$_POST['simpan'];
$pengguna=@$_SESSION['pengguna'];

if ($simpan){
		INCLUDE 'koneksi.php';
		mysqli_query($conection, "INSERT INTO tb_mapel VALUES ('','$nama_mapel','$kode_kelas')");?>
									<script type="text/javascript">
										alert("Mata Pelajaran berhasil di tambahkan");
										window.location.replace("index.php?page=Tampil_Mapel");
 									</script>




<?php
}

 ?>