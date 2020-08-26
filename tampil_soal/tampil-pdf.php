<?php 
@session_start();
@ob_start();
 if (@$_SESSION['status']!="login"){
    header("location:../loginku.php");
}else{
$soal = $_POST['soal'];
?>
 
<!DOCTYPE html>
<html>
<head>
	<title>Download</title>
</head>
<body>
                                    <h1>BANK SOAL KU</h1>                      
                                    <?php 
                                	// untuk menampilkan soal di tabel dengan format penulisan soal
                            		include '../koneksi.php';
                                    ?>
                                    <?php 
                            		$no=1;
                                    $idP=$_SESSION['id_pengguna'];
                                    $sqll = mysqli_query($conection,"SELECT * FROM tb_soal WHERE id_soal NOT IN(SELECT id_soal FROM tb_pengambilan_soal WHERE id_pengguna='$idP') ORDER BY RAND() LIMIT ".$soal."");
                                

                                    //$id = [];
                                    $dapat = mysqli_num_rows($sqll);
                                    if ($dapat  - $soal) {
                                        mysqli_query($conection,"DELETE FROM tb_pengambilan_soal WHERE id_pengguna='$idP'");

                                        $sqll = mysqli_query($conection, "SELECT * FROM tb_soal WHERE id_soal NOT IN(SELECT id_soal FROM tb_pengambilan_soal WHERE id_pengguna='$idP') ORDER BY RAND() LIMIT ".$soal."");
                                    }
                            		while ($data1 =mysqli_fetch_array($sqll)) {
                            			?>
                                                
                                                    
                            						<?php echo $no++?><?php echo ". ".$data1['soal'] ?>
                            						<br>	
                            						<?php echo "A. ".$data1['pilih_a'] ?>
                            						<br>	
                            						<?php echo "B. ".$data1['pilih_b'] ?>
                            						<br>	
                            						<?php echo "C. ".$data1['pilih_c'] ?>
                            						<br>	
                            						<?php echo "D. ".$data1['pilih_d'] ?>          
                                                    <?php 
                                                    $idSoal = $data1['id_soal'];
                                                    mysqli_query($conection, "INSERT INTO tb_pengambilan_soal VALUES('$idP','$idSoal')");
                                                     ?>

     								<?php } ?>
     							<!-- </table>  -->   
</body>
</html


<?php
$filename="soal.pdf";
$content = ob_get_clean();
$content = '<page style="font-family: freeserif"><br />'.nl2br($content).'</page>';
// conversion HTML => PDF
require_once('../html2pdf/html2pdf.class.php'); // arahkan ke folder html2pdf
try
{
$html2pdf = new HTML2PDF('P','A4','fr',false,'ISO-8859-15',array(30, 10, 20, 10)); //setting ukuran kertas dan margin pada dokumen anda
//$html2pdf->setModeDebug();

$html2pdf->setDefaultFont('Arial');
$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
$html2pdf->Output($filename);
// $html2pdf->Output($filename, 'D');
}
catch(HTML2PDF_exception $e) { echo $e; }
?>

<?php 
}
?> 