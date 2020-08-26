<?php
@session_start(); 	
	$username = $_POST['username'];
	$password = $_POST['pass'];

	require_once "koneksi.php";
	$cek = mysqli_query($conection, "SELECT * FROM tb_pengguna where username = '$username'");
	$data = mysqli_fetch_array($cek);

	if ($data['username'] =="") {
		?>
			<script type="text/javascript">alert("Username tidak terdaftar")
			window.location.replace("loginku.php");</script>			
		<?php  
	}else{
		$_SESSION['id_pengguna']=$data['id_pengguna'];
		if ($password == $data['passwordd'] && $data['id_status']== 1) {
			
			@$_SESSION['hak']="admin";
			@$_SESSION['status']="login";
		?> 
			<script type="text/javascript">alert("Login Sukses Admin")
			window.location.replace("index.php");</script>

		<?php  	
		}else if ($password == $data['passwordd'] && $data['id_status']== 2){
			
			@$_SESSION['status']="login";
			@$_SESSION['hak']="contributor";
		?>
			<script type="text/javascript">alert("Login Sukses Contributor")
			window.location.replace("index.php");</script>
		<?php	
		}else if ($password == $data['passwordd'] && $data['id_status']== 3){
			@$_SESSION['hak']="user";
			@$_SESSION['status']="login";
				
		?>
			<script type="text/javascript">alert("Login Sukses User")
			window.location.replace("index.php");</script>
		<?php	
		}else{
		?>
			<script type="text/javascript">alert("password Salah");
			window.location.replace("loginku.php");</script>

		<?php	
		}
	}
	?>