<?php
    include 'Generate.php';
    //$obj = Generate();
    $soal = Generate::Soal(5);
    $jawaban = Generate::Jawaban($soal);
    echo $soal." = ".$jawaban;

?>