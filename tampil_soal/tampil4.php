<?php 	   
@session_start();
$sub=@$_GET['subtema'];
if  (@$_SESSION['status'] != "login") {
    header("location:../loginku.php");  
}else{
?>
	<div class="row" onload="soal()">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<center><table border="5" class="btn btn-danger" width="1050px">
						<tr>
							<td>
							<strong class="card-title" color ="white"><center><h3><b>KUMPULAN SOAL</b></h3></center></strong>
							</td>
						</tr>
					</table></center>
					<br><br>
<!--///////////////////////////////////////  HEADER ///////////////////////////////////////-->				 

					<!--tambah dan download untuk PG-->
					<?php
					if (@$_SESSION['hak'] != "user" ){
					?>
						<a href="index.php?page=tampilsoal4-tambah&subtema=<?php echo$sub?>">	
							<button type="button" class="btn btn-success" id="tombol">
								<i class="fa fa-plus-square-o  " > Tambah Soal PG</i>
							</button>
						</a>
					<?php 
					}
					?>



					<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
						<i class="fa fa-download  "> Download Soal PG </i>
					</button>


					<a href="?page=tampilsoall4&subtema=<?php echo $sub ?>")>Go to Essai</a>

					<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#generate">
					<i class="fa fa-download  "> Generate Soal </i>
					</button>
              

					<!-- upload dari excel-->
					<?php 
						if (@$_SESSION['hak'] != "user" ) {
					?>
					<form method="post" action="tampil_soal/to_excel.php?kategori=<?php echo $sub ?>" enctype="multipart/form-data">
							
					<br>
						<input type="file" name="berkas_excel" value="file" class="btn btn-success">
						<input type="submit" name="kirim" value="Upload File" class="btn btn-primary">			
					</form>

					<?php 
					}
					?>
				</div>




						<!--Tampilkan Soal PG -->
						<div class="card-body">
							<table id="bootstrap-data-table-export" class="table">
								<?php 
								include 'koneksi.php';
								$no=1;
								//echo $sub;
								$sql =mysqli_query($conection,"SELECT * FROM tb_soal where id_subtema = '$sub'");
								if(!$sql){
									printf("Error : %s\n",mysqli_error($conection));
									exit; 	
								}
								
								while ($data = mysqli_fetch_array($sql)) {
									?>
									<tr class="soal">
										<td>
											<?php echo $no++?><?php echo ". ".$data['soal']." = ..." ?>
											<br>	
											<?php echo "\t A.  ".$data['pilih_a'] ?>
											<br>	
											<?php echo "\t B.  ".$data['pilih_b'] ?>
											<br>	
											<?php echo "\t C.  ".$data['pilih_c'] ?>
											<br>	
											<?php echo "\t D.  ".$data['pilih_d'] ?>
											<br> 

											<?php 
											if (@$_SESSION['hak'] =="contributor" && $data['id_pengguna'] =="2" ){ ?>	
												<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal<?php echo $data['id_soal'] ?>">
													<i class="fa fa-edit">Update</i>
												</button>

												<a href="index.php?page=tampilsoal4-hapus&id=<?php echo $data['id_soal']?>&subtema=$sub">
													<button type="button" class="btn btn-primary btn-lg" <?php echo $data['id_soal']?>>
													<i class="fa ti-trash">Delete</i>
													</button><br>
 												</a>

											<?php
											}else if (@$_SESSION['hak'] == "admin"){
											?>
												<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal<?php echo $data['id_soal'] ?>">
													<i class="fa fa-edit">Update</i>
												</button>

												<a href="index.php?page=tampilsoal4-hapus&id=<?php echo $data['id_soal']  ?>&subtema=<?php echo $sub ?>">
													<button type="button" class="btn btn-primary btn-lg" <?php echo $data['id_soal'] ?>>
													<i class="fa ti-trash">Delete</i>
													</button><br>
												</a>

											<?php
											}
											?>
										</td>
									</tr>



									<div class="modal fade" id="myModal<?php echo $data['id_soal'] ?>" tabindex="-1" 		role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title" id="myModalLabel">Edit Soal</h4>
												</div>
												<div class="modal-body">
													<form action="" method="post">
														<input type="hidden" name="id_soal" value="<?php echo $data['id_soal'] ?>">

														<label>Soal</label>
														<input type="text" name="soal" class="form-control" value="<?php echo $data['soal'] ?>">

														<label>A</label>
														<input type="text" name="pilih_a" class="form-control" value="<?php echo $data['pilih_a'] ?>">

														<label>B</label>
														<input type="text" name="pilih_b" class="form-control" value="<?php echo $data['pilih_b'] ?>">

														<label>C</label>
														<input type="text" name="pilih_c" class="form-control" value="<?php echo $data['pilih_c'] ?>">

														<label>D</label>
														<input type="text" name="pilih_d" class="form-control" value="<?php echo $data['pilih_d'] ?>">
														
												</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														<input type="submit" name="save" class="btn btn-primary" value="Save changes">
													</form>
													</div>
											</div>
										</div>
									</div>


									<?php
									$id_soal = @$_POST['id_soal'];
									$soal = @$_POST['soal'];
									$pilih_a = @$_POST['pilih_a'];
									$pilih_b = @$_POST['pilih_b'];
									$pilih_c = @$_POST['pilih_c'];
									$pilih_d = @$_POST['pilih_d'];
									$save = @$_POST['save'];

									if ($save) {
										mysqli_query($conection, "UPDATE tb_soal set id_soal=$id_soal, soal = '$soal', pilih_a = '$pilih_a', pilih_b = '$pilih_b', pilih_c  = '$pilih_c', pilih_d = '$pilih_d' where id_soal = '$id_soal' ");
										?>
										<script type="text/javascript">
											alert("Soal berhasil di update");
											window.location.replace("index.php?page=tampilsoal4&subtema=<?php echo $sub ?>");
										</script>
									<?php
									}
									?>
								<?php 
								}
								?>	
							</table>	






							<!-- download untuk PG-->
							
							<div class="modal fade" id="myModal<?php echo $data['id_soal'] ?>" tabindex="-1" role="		dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myModalLabel">Download Soal</h4>
										</div>
										<div class="modal-body">
											<form action="tampil_soal/tampil-pdf.php" method="post">
												<label>Masukan Jumlah Soal Yang akan di Cetak</label>
												<input type="text" name="soal" id="inp" class="form-control">
										</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												<input type="submit" name="simpan" class="btn btn-primary" value="Cetak">
											</form>
											</div>
									</div>
								</div>
							</div>

							

							<!--Random untuk PG-->
							
<?php 
//untuk random generate soal
 ?>

 <div class="modal fade" id="generate<?php echo $data['id_soal'] ?>" tabindex="-1" role="		dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myModalLabel">Edit Soal</h4>
										</div>
										<div class="modal-body">
											<form action="tampil_soal/tampil-pdf.php" method="post">
												<label>Masukan Jumlah Soal Yang akan di Cetak</label>
												<input type="text" name="soal" id="inp" class="form-control">
										</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												<input type="submit" name="simpan" class="btn btn-primary" value="Cetak">
											</form>
											</div>
									</div>
								</div>
							</div>

							

							<!--Random untuk PG-->
						
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

	
<?php 
	}
 ?>