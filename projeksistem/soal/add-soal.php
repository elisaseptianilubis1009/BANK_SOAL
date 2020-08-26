 <link rel="stylesheet" href="alert/css/alertify.min.css" />
    <!-- include a theme -->
    <link rel="stylesheet" href="alert/css/themes/default.min.css" />
      <script src="alert/alertify.min.js"></script>
   
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Jawab Soal</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="?page=dashboard">Menu Utama</a></li>
                                    <li class="active">Input Soal</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
              <div class="content a">
        <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="box-title">Input Soal 
                                        
                                    </h4>
                                    
                                </div>
                                <div class="card-body">
                                	 <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Tambah Soal Melalui Form</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Tambah Soal Import</a>
                                    </li>
                                  </ul>
                                <div class="tab-content pl-3 p-1" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        
                                         <label class="form-control-label">Masukan Kategori Soal</label>
                                            <input type="text" placeholder="Masukan Kategori Soal" name="kategori" class="form-control">                                       
                                        <label class="form-control-label">Masukan Soal</label>
                                         <textarea class="form-control" placeholder="Masukan Soal" name="soal">
										  </textarea>


                                    </div>
                                     <script type="text/javascript">
                                        function back(){
                                            window.location.replace("index.php");
                                        }
                                    </script>
                                    <input type="submit" class="btn btn-success" name="save" value="Simpan">
                                    <input type="reset" class="btn btn-danger" name="" value="Batal" onclick="back()">
                                    </form>


                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <form method="post" enctype="multipart/form-data" >
                                        	<input  name="berkas_excel" type="file" required="required"> 
											<input class="btn btn-success" name="upload" type="submit" value="Import">
                                        </form>
                                    </div>
                                    
                                </div>

                                    
                                </div>
                                
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->
                    </div>
                </div>
<?php 
include "koneksi.php";
$ktg=@$_POST['kategori'];
$soal=@$_POST['soal'];
$save=@$_POST['save'];
$upload=@$_POST['upload'];

require 'vendor/autoload.php';
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

if ($save) {
	if ($soal == "" || $ktg== "") {
        ?>
		<script>
                   alertify.alert('Lengkapi Data Anda');
           </script>
	<?php 
    }else {
		mysqli_query($con,"INSERT INTO tb_soal values('','$soal','$ktg')");
        ?>
		   <script>
                   alertify.alert('Berhasi Di input!');
                   window.location.replace('index.php?page=edit-soal');
           </script>
        <?php  


	}
}else if($upload){
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
			for($i = 1;$i < count($sheetData);$i++)
			{
		        $soal     = $sheetData[$i]['0'];
                $soal2     = $sheetData[$i]['1'];
                
		    //    mysqli_query($con,"insert into tb_soal  values ('','$soal','$soal2')");
		    }
    ?>
                                  <script>
                                            alertify.alert('Berhasi Di import!');
                                            window.location.replace('index.php?page=edit-soal');
                                        </script>
        <?php             
		    //header("Location: form_upload.html"); 
		}
 
}
?>

