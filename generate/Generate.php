<?php 
class Generate
{
    public static function Soal(int $n = 0, string $result = "", bool $cek = true )
    // n=banyak digit  angka, result=soal yang dihasilkan sama method, cek=buat random angka(true) //dan opertaor (false)
    {
        if( $n>0 )//kondisi rekursif
        {
            if ($cek) //kondisi random, true = angka, false = operator
            {
                $temp = '';
                do {
                    $temp = $result;
                    $number = rand(1,100);//random dari 1 sampai 100
                    $temp .= $number;//concate/menggabungkan string, tipe data string
                    $tes = eval('return '.$temp.';');//mendapatkan hasil operasi dari string yg berisi operasi perhitungan
                    //echo $tes."<br>";//echo buat tracing hasil operasi operator
                } while ( !(is_int($tes)));//cek apakah hasil operasi bernilai int atau tidak
                $result = $temp;
                return self::Soal( $n-1, $result, false);
            } 
            else
                return self::Soal( $n, self::Operator($result), true);//penambahan operator
        }
        else
            return $result;//mengembalikan soal yg telah jadi
    }



    private static function Operator(string $soal="")//soal yg dikirim
    {
        $opr = ['+','-','/','*'];//jenis operator
        $oprPick = $opr[rand(0,3)];//random index array operator
        $soal.=$oprPick;//digabung soal sama operator yang terpilih
        return $soal;//dikembalikan hasil gabungan, tipe string
    }
    public static function Jawaban(string $soal)//soal yg dikirim
    {
        return eval('return '.$soal.';');//mendapatkan hasil operasi dari string yg berisi operasi perhitungan
    }
}
?>