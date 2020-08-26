<?php 
@session_start();
@ob_start();

if (@$_SESSION['status'] != "login") {
    header("location:../loginku.php");
}else{
    $subtema=@$_GET['sub'];
    $id=@$_GET['id'];
    $waktunow=@$_GET['waktu'];

?>
 

<!DOCTYPE html>
<html>
<head>
	<title>Download</title>
</head>
<body>
                                    <h1>BANK SOAL KU</h1>
								<!--<table id="bootstrap-data-table-export" class="table">-->

                                	<?php 

                                	// untuk menampilka soal di tabel dengan format penulisan soal
                            		include '../koneksi.php';
                            		$no=1;
                            		$sql = mysqli_query($conection, "SELECT a.*,b.* FROM tb_essay a,tb_pengambilan_essay b where a.id_essay=b.id_essay and b.id_pengguna='$id' and a.id_subtema = '$subtema' and b.waktu='$waktunow'");

                            		while ($data = mysqli_fetch_array($sql)) {
                            			?>
                            				<!--<tr>
                            					<td>-->

                            						<?php echo $no++?><?php echo ". ".$data['essay'] ?>
                            						
                            							

     										<!--</td>
     									</tr> -->              

     								<?php } ?>

     							<!--</table>-->    
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