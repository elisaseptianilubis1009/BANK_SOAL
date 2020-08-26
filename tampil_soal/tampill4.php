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
					<center><table border="0" class="btn btn-danger" width="1050px ">
						<tr>
							<td>
							<strong class="card-title" color ="white"><center><h3><b>KUMPULAN SOAL Essay</b></h3></center></strong>
							</td>
						</tr>
					</table></center>
					<br><br>
<!--///////////////////////////////////////  HEADER /////////////////////////////////////////////-->
					<!--tambah dan download untuk PG-->
					<?php
					if (@$_SESSION['hak'] != "user" ){
					?>
						<a href="index.php?page=tampilsoall4-tambah&subtema=<?php echo $sub?>">	
							<button type="button" class="btn btn-success" id="tombol">
								<i class="fa fa-plus-square-o  " > Tambah Soal Essay</i>
							</button>
						</a>
					<?php 
					}
					?>

					<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModall">
						<i class="fa fa-download  "> Download Soal Essay </i>
					</button>

					<a href="?page=tampilsoal4&subtema=<?php echo $sub ?>")>Go to PG</a>
              
					<!-- upload dari excel-->
					<?php 
						if (@$_SESSION['hak'] != "user" ) {
					?>
					<form method="post" action="tampil_soal/to_excel_essay.php?kategori=<?php echo $sub ?>" enctype="multipart/form-data">
							
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
								$sql =mysqli_query($conection,"SELECT * FROM tb_essay where id_subtema = $sub");

								while ($data = mysqli_fetch_array($sql)) {
									?>
									<tr class="soal">
										<td>
											<?php echo $no++?><?php echo ". ".$data['essay']."  ..." ?>
											<br>	
										
											<?php 
											if (@$_SESSION['hak'] =="contributor" && $data['id_pengguna'] =="2" ){ ?>	
												<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal<?php echo $data['id_essay'] ?>">
													<i class="fa fa-edit">Update</i>
												</button>

												<a href="index.php?page=tampillsoal4-hapus&id=<?php echo $data['id_essay']  ?>">
													<button type="button" class="btn btn-primary btn-lg" <?php echo $data['id_essay']?>>
													<i class="fa ti-trash">Delete</i>
													</button><br>
 												</a>

											<?php
											}else if (@$_SESSION['hak'] == "admin"){
											?>
												<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal<?php echo $data['id_essay'] ?>">
													<i class="fa fa-edit">Update</i>
												</button>

												<a href="index.php?page=tampilessay_hapus&id=<?php echo $data['id_essay']  ?>&subtema=$sub">
													<button type="button" class="btn btn-primary btn-lg" <?php echo $data['id_essay'] ?>>
													<i class="fa ti-trash">Delete</i>
													</button><br>
												</a>

											<?php
											}
											?>
										</td>
									</tr>


									<div class="modal fade" id="myModal<?php echo $data['id_essay'] ?>" tabindex="-1" 		role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h4 class="modal-title" id="myModalLabel">Edit Soal Essay</h4>
												</div>
												<div class="modal-body">
													<form action="" method="post">
														<input type="hidden" name="id_essay" value="<?php echo $data['id_essay'] ?>">

														<label>Soal</label>
														<input type="text" name="essay" class="form-control" value="<?php echo $data['essay'] ?>">

														<br>
														<label>Jawaban</label>
														<input type="text" name="jawaban" class="form-control" value="<?php echo $data['jawaban'] ?>">

														
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
									$id_soal = @$_POST['id_essay'];
									$essay = @$_POST['essay'];
									$jawaban=@$_POST['jawaban'];
									$save = @$_POST['save'];

									if ($save) {
										mysqli_query($conection, "UPDATE tb_essay set id_essay=$id_soal, essay = '$essay',jawaban='$jawaban' where id_essay = '$id_soal' ");
										?>
										<script type="text/javascript">
											alert("Soal berhasil di update");
											window.location.replace("index.php?page=tampilsoall4&subtema=1");
										</script>
									<?php
									}
									?>
								<?php 
								}
								?>	
							</table>	

							
							<!-- download untuk ESSAY-->
							<div class="modal fade" id="myModall<?php echo $data['id_essay'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myModalLabel">Download Soal Essay</h4>
										</div>
										<div class="modal-body">
											<form action="tampil_soal/tampil_pdf_essay.php" method="post">
												<label>Masukan Jumlah Soal Yang akan di Cetak</label>
												<input type="text" name="essay" id="inp" class="form-control">

											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
												<input type="submit" name="print" class="btn btn-primary" value="Cetak">
											</form>
										</div>
									</div>
								</div>
							</div>

						

							<!--Random untuk ESSAY-->

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