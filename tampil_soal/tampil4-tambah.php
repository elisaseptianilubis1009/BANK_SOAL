<?php
@session_start();	
$subtema=@$_GET['subtema'];
if (@$_SESSION['status'] != "login") {
    header("location:../loginku.php");
}else{
?>

<style type="text/css">
    
    </style>
        <div class="breadcrumbs">    
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Input Soal</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="?page=dashboard">Dashboard</a></li>
                                    <li class="active">Input Soal</li>
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
                                    <h4 class="box-title">Input Soal</h4>
                                </div>
                                <div class="card-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <!-- Angka No Member -->
                                        
                                        <label class= "form-control-label">SOAL</label>
                                        <input type="text" class="form-control" value="" name="soal">

                                        <label form-control-label">OPTION  A </label>
                                        <input type="text" class="form-control" value="" name="a">

                                        <label form-control-label">OPTION  B </label>
                                        <input type="text" class="form-control" value="" name="b">

                                        <label form-control-label">OPTION  C </label>
                                        <input type="text" class="form-control" value="" name="c">

                                        <label form-control-label">OPTION  D </label>
                                        <input type="text" class="form-control" value="" name="d">

                                        <label form-control-label">JAWABAN </label>
                                        <input type="text" class="form-control" value="" name="jawaban">

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
$soal = @$_POST['soal'];
$a = @$_POST['a'];
$b = @$_POST['b'];
$c = @$_POST['c'];
$d = @$_POST['d'];
$jawab = @$_POST['jawaban'];

$simpan=@$_POST['simpan'];
$pengguna=@$_SESSION['pengguna'];

if ($simpan){
		INCLUDE 'koneksi.php';
		mysqli_query($conection, "INSERT INTO tb_soal VALUES ('','$soal','$a','$b','$c','$d','$subtema','$jawab')");?>
									<script type="text/javascript">
										alert("Soal Berhasil Ditambahkan !");
										window.location.replace("index.php?page=tampilsoal4&subtema=<?php echo $subtema ?>");
 									</script>
<?php
}
?>

<?php 
    }
 ?>