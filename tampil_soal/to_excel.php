<?php 
@session_start();
if (@$_SESSION['status']!= "login") {
    header("location:../loginku.php");
}else{

$tampsa=@$_SESSION['pengguna'];

$kirim=@$_POST['kirim'];
include "../koneksi.php";

$sub=@$_GET['kategori'];

	require '../vendor/autoload.php';
 
						// use PhpOffice\PhpSpreadsheet\Spreadsheet;
						// use PhpOffice\PhpSpreadsheet\Reader\Csv;
						// use PhpOffice\PhpSpreadsheet\Reader\Xlsx;


if($kirim){

							$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
							if(isset($_FILES['berkas_excel']['name']) && in_array($_FILES['berkas_excel']['type'], $file_mimes)) {
					
							    $arr_file = explode('.', $_FILES['berkas_excel']['name']);
							    $extension = end($arr_file);
							 
							    if('csv' == $extension) {
							        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
							    } else {
							        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
							    }
							 
							    $spreadsheet = $reader->load($_FILES['berkas_excel']['tmp_name']);
							     
 								$sheetData = $spreadsheet->getActiveSheet()->toArray();
							    //echo "masuk proses";
								for($i = 0;$i < count($sheetData);$i++)
								{
							        $soal2     = $sheetData[$i]['0'];
					                $soal3     = $sheetData[$i]['1'];
					                $soal4     = $sheetData[$i]['2'];
					                $soal5     = $sheetData[$i]['3'];
					                $soal6     = $sheetData[$i]['4'];
					                $soal7     = $sheetData[$i]['5'];
					                $soal8     = $sheetData[$i]['7'];

					                //echo "$soal2-$soal3-$soal4-$soal5-$soal6-$soal7";

					               	mysqli_query($conection,"insert into tb_soal values ('','$soal3','$soal4','$soal5','$soal6','$soal7','$sub','$soal8')");

					               	
 								
							   
							    }
							    ?>

							    <script type="text/javascript">
											alert("Soal berhasil di update");
											window.location.replace("../index.php?page=tampilsoal4&subtema=1");
										</script>
							    
							    <?php  
							}
						}

 ?>
 <?php 
}
  ?>