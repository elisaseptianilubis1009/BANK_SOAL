<?php 

@session_start();	
$id=@$_GET['id_pengguna'];
 ?>

 <style type="text/css">
        label {
            margin-top: 15px;
        }    
    </style>

       
        <!-- Content -->
        <div class="content a">
        <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="box-title"><b><center>TAMBAHKAN PENGGUNA</center></b></h3>
                                </div>
                                <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <!-- Angka No Member -->
                                        
                                        <label class= "form-control-label"  ><b>Nama Pengguna</b></label>
                                        <input type="text" class="form-control" value="" name="nama_pengguna" >

                                        <label form-control-label"><b>Id Status</b></label>
                                        <input type="text" class="form-control" value="" name="id_status">

                                        <label form-control-label"><b>Username</b></label>
                                        <input type="text" class="form-control" value="" name="username">

                                        <label form-control-label"><b>Password</b></label>
                                        <input type="text" class="form-control" value="" name="passwordd">

                                        

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
$nama_pengguna = @$_POST['nama_pengguna'];
$id_status = @$_POST['id_status'];
$username = @$_POST['username'];
$passwordd = @$_POST['passwordd'];
$simpan=@$_POST['simpan'];
$pengguna=@$_SESSION['pengguna'];
$batal=@$_POST['batal'];

if ($simpan){
		INCLUDE 'koneksi.php';
		mysqli_query($conection, "INSERT INTO tb_pengguna VALUES ('','$nama_pengguna','$id_status','$username','$passwordd')");?>
									<script type="text/javascript">
										alert("SOAL BERHASIL DITAMBHAKAN");
										window.location.replace("index.php?page=TampilUser");
 									</script>




<?php
}
?>
 
 <?php

if($batal){
    
    ?>

    <script type="text/javascript">
    confirm("YAKIN INGIN MEMBATALKAN");
    if($cek==true){
        back();
        window.location.replace("index.php?page=TampilUser");
    }
    </script>
<?php 
}
 ?>